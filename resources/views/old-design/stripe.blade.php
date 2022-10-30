<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ __('Payment Confirmation') }} - {{ config('app.name', 'Laravel') }}</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
    <script src="https://js.stripe.com/v3"></script>
</head>

<body class="font-sans text-gray-600 bg-gray-100 leading-normal p-4 h-full">
    <div id="app" class="h-full md:flex md:justify-center md:items-center">
        <div class="w-full max-w-lg">
            <!-- Status Messages -->
            <p class="flex items-center bg-red-100 border border-red-200 px-5 py-2 rounded-lg text-red-500"
                v-if="errorMessage">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6">
                    <path class="fill-current text-red-300" d="M12 2a10 10 0 1 1 0 20 10 10 0 0 1 0-20z" />
                    <path class="fill-current text-red-500"
                        d="M12 18a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm1-5.9c-.13 1.2-1.88 1.2-2 0l-.5-5a1 1 0 0 1 1-1.1h1a1 1 0 0 1 1 1.1l-.5 5z" />
                </svg>

                <span class="ml-3">@{{ errorMessage }}</span>
            </p>

            <p class="flex items-center bg-green-100 border border-green-200 px-5 py-4 rounded-lg text-green-700"
                v-if="paymentProcessed && successMessage">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6">
                    <circle cx="12" cy="12" r="10" class="fill-current text-green-300" />
                    <path class="fill-current text-green-500"
                        d="M10 14.59l6.3-6.3a1 1 0 0 1 1.4 1.42l-7 7a1 1 0 0 1-1.4 0l-3-3a1 1 0 0 1 1.4-1.42l2.3 2.3z" />
                </svg>

                <span class="ml-3">@{{ successMessage }}</span>
            </p>

            <div class="bg-white rounded-lg shadow-xl p-4 sm:p-6 mt-4">
                @if ($payment->isSucceeded())
                    <h1 class="text-xl mb-4 text-gray-600">
                        {{ __('Payment Successful') }}
                    </h1>

                    <p class="mb-6">
                        {{ __('This payment was already successfully confirmed.') }}
                    </p>
                @elseif ($payment->isCancelled())
                    <h1 class="text-xl mb-4 text-gray-600">
                        {{ __('Payment Cancelled') }}
                    </h1>

                    <p class="mb-6">{{ __('This payment was cancelled.') }}</p>
                @else
                    <div id="payment-elements" v-if="! paymentProcessed">
                        <!-- Payment Method Form -->
                        <div v-show="requiresPaymentMethod">
                            <!-- Instructions -->
                            <h1 class="text-xl mb-4 text-gray-600">
                                {{ __('Confirm your :amount payment', ['amount' => $payment->amount()]) }}
                            </h1>

                            <p class="mb-6">
                                {{ __('Extra confirmation is needed to process your payment. Please confirm your payment by filling out your payment details below.') }}
                            </p>

                            <!-- Name -->
                            <label for="cardholder-name" class="inline-block text-sm text-gray-700 font-semibold mb-2">
                                {{ __('Full name') }}
                            </label>

                            <input id="cardholder-name" type="text" placeholder="{{ __('Jane Doe') }}" required
                                class="inline-block bg-gray-100 border border-gray-300 rounded-lg w-full px-4 py-3 mb-3 focus:outline-none"
                                v-model="name" />

                            <!-- Card -->
                            <label for="card-element" class="inline-block text-sm text-gray-700 font-semibold mb-2">
                                {{ __('Card') }}
                            </label>

                            <div id="card-element" class="bg-gray-100 border border-gray-300 rounded-lg p-4 mb-6"></div>

                            <!-- Pay Button -->
                            <button id="card-button"
                                class="inline-block w-full px-4 py-3 mb-4 text-white rounded-lg hover:bg-blue-500"
                                :class="{ 'bg-blue-400': paymentProcessing, 'bg-blue-600': ! paymentProcessing }"
                                @click="addPaymentMethod" :disabled="paymentProcessing">
                                {{ __('Pay :amount', ['amount' => $payment->amount()]) }}
                            </button>
                        </div>

                        <!-- Confirm Payment Method Button -->
                        <div v-show="requiresAction || requiresConfirmation">
                            <button id="card-button"
                                class="inline-block w-full px-4 py-3 mb-4 text-white rounded-lg hover:bg-blue-500"
                                :class="{ 'bg-blue-400': paymentProcessing, 'bg-blue-600': ! paymentProcessing }"
                                @click="confirmPaymentMethod" :disabled="paymentProcessing">
                                {{ __('Confirm your :amount payment', ['amount' => $payment->amount()]) }}
                            </button>
                        </div>
                    </div>
                @endif

                <button @click="goBack" ref="goBackButton" data-redirect="{{ $redirect }}"
                    class="inline-block w-full px-4 py-3 bg-gray-100 hover:bg-gray-200 text-center text-gray-600 rounded-lg">
                    {{ __('Go back') }}
                </button>
            </div>

            <p class="text-center text-gray-500 text-sm mt-4 pb-4">
                © {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
            </p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.stripe = Stripe('{{ config('services.stripe.key') }}');

        var app = new Vue({
            el: '#app',

            data: {
                name: '',
                cardElement: null,
                paymentProcessing: false,
                paymentProcessed: false,
                requiresPaymentMethod: @json($payment->requiresPaymentMethod()),
                requiresAction: @json($payment->requiresAction()),
                requiresConfirmation: @json($payment->requiresConfirmation()),
                successMessage: '',
                errorMessage: '',
                processing: false,
            },

            @if (!$payment->isSucceeded() && !$payment->isCancelled() && !$payment->requiresAction())
                mounted: function () {
                this.configureStripe();
                },
            @endif

            methods: {
                addPaymentMethod: function() {
                    var self = this;

                    this.paymentProcessing = true;
                    this.paymentProcessed = false;
                    this.successMessage = '';
                    this.errorMessage = '';

                    stripe.confirmCardPayment(
                        '{{ $payment->clientSecret() }}', {
                            payment_method: {
                                card: this.cardElement,
                                billing_details: {
                                    name: this.name
                                }
                            }
                        }
                    ).then(function(result) {
                        

                        if (result.error) {
                            if (result.error.code ===
                                '{{ Stripe\ErrorObject::CODE_PARAMETER_INVALID_EMPTY }}' &&
                                result.error.param === 'payment_method_data[billing_details][name]'
                            ) {
                                self.errorMessage = '{{ __('Please provide your name.') }}';
                            } else {
                                self.errorMessage = result.error.message;
                            }
                        } else {

                            var self2 = self;
                            return axios.post('{{ route('checkPaymentSuccess') }}', {
                                    trip_order_id: '{{ $order->id }}'
                                })
                                .then(function(response) {
                                  
                                    self2.paymentProcessed = true;

                                    self2.successMessage =
                                        '{{ __('The payment was successful.') }}';

                                })
                                .catch(function(error) {
                                    
                                });


                        }
                        self.paymentProcessing = false;
                    });
                },

                confirmPaymentMethod: function() {
                    var self = this;

                    this.paymentProcessing = true;
                    this.paymentProcessed = false;
                    this.successMessage = '';
                    this.errorMessage = '';

                    stripe.confirmCardPayment(
                        '{{ $payment->clientSecret() }}', {
                            payment_method: '{{ $payment->payment_method }}'
                        }
                    ).then(function(result) {
                     

                        if (result.error) {
                            self.errorMessage = result.error.message;

                            if (result.error.code ===
                                '{{ Stripe\ErrorObject::CODE_PAYMENT_INTENT_AUTHENTICATION_FAILURE }}'
                            ) {
                                self.requestPaymentMethod();
                            }
                        } else {
                            var self2 = self;
                            return axios.post('{{ route('checkPaymentSuccess') }}', {
                                    trip_order_id: '{{ $order->id }}'
                                })
                                .then(function(response) {

                                    self2.paymentProcessed = true;
                                    self2.successMessage =
                                        '{{ __('The payment was successful.') }}';

                                })
                                .catch(function(error) {
                                    
                                }) }
                                self.paymentProcessing = false;
                    });
                },

                requestPaymentMethod: function() {
                    this.configureStripe();

                    this.requiresPaymentMethod = true;
                    this.requiresAction = false;
                },

                configureStripe: function() {
                    const elements = stripe.elements();

                    this.cardElement = elements.create('card');
                    this.cardElement.mount('#card-element');
                },

                goBack: function() {
                    var self = this;
                    var button = this.$refs.goBackButton;
                    var redirect = new URL(button.dataset.redirect);

                    if (self.successMessage || self.errorMessage) {
                        /*                      redirect.searchParams.append('message', self.successMessage ? self.successMessage : self.errorMessage);
                                             redirect.searchParams.append('success', !! self.successMessage);
                                         */
                    }

                    window.location.href = redirect;
                }
            },
        })
    </script>
</body>

</html>
