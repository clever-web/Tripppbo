@extends('layout')


@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">
    <link href="/css-r/home/tickets-lottery.css" rel="stylesheet">
    <!-- checkout-popup CSS -->
    <link href="/css-n/trip-solo-popup.css" rel="stylesheet">
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!--  New Checkout Modal -->
    <div class="modal fade" id="myModal" method="POST">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content  p-3 add-border-radius">
                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <h4 class="modal-title gilroy-semi font-22">Buy a ticket</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body pt-0">
                    {{-- <div class="d-flex bg-f9f9f9 p-3 mb-2 add-border-radius">
                       <div class="mr-3"><img class="border border-white icon-50px"
                                src="{{ $trip->user->profile->picture_url ? asset('storage/' . $trip->user->profile->picture_url) : $default_profile_picture }}"
                                alt=""></div>
                        <div class="flex-fill">
                            <p class="gilroy-semi text-fe2f70 font-14 mb-0">{{ $trip->user->name }}</p>
                            <p class="gilroy-regular font-14 mb-0">{{ $trip->title }}</p>
                        </div>
                    </div> --}}
                    <form id="solo_checkout_form" method="POST"
                        action="{{ route('checkPaymentSuccess-Ticket-Lottery') }}">
                        @csrf
                        <input type="hidden" id="trip_order_id" name="trip_order_id" value="" />


                        <p id="amount_validation" class="invisible">Amount Must Be A Positive Number
                            Between 1 and 10,000.
                        </p>
                        @if (Auth::check() && $payment_methods->count() > 0)
                            <p class="gilroy-medium font-12 mb-2">Select Payment Method</p>
                            @foreach ($payment_methods as $payment_method)

                                <div class="d-flex align-items-center mb-2">
                                    <div class="mr-3"><label class="custom-radio-btn"
                                            for="paymentMethodRadio{{ $loop->index }}"><input type="radio"
                                                value="{{ $payment_method->id }}" name="paymentMethodRadio"
                                                id="paymentMethodRadio{{ $loop->index }}"
                                                onchange=" updatePaymentMethod()"
                                                {{ $loop->index == 0 ? 'checked' : '' }}><span
                                                class=" checkmark"></span></label></div>
                                    <div onclick="markAsChecked('paymentMethodRadio{{ $loop->index }}')"
                                        class="flex-fill">
                                        <div class="position-relative icon-left"><input type="text"
                                                class="inputField inputField-withicon pl-3 gilroy-medium font-14 px-4 text-right"
                                                placeholder="**** **** **** {{ $payment_method->card->last4 }}">
                                            <img class="icon-20px"
                                                src="/images-n/{{ $payment_method->card->brand }}.svg"
                                                style="border-radius: 0px !important;" />
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @endif

                        <div
                            class="d-flex align-items-center mb-2 {{ Auth::check() && $payment_methods->count() > 0 ? '' : 'invisible' }}">
                            <div class="mr-3"><label class="custom-radio-btn" for="new_payment_method"><input
                                        name="paymentMethodRadio" id="new_payment_method" value="new_payment_method"
                                        onchange="updatePaymentMethod()"
                                        {{ Auth::check() == false || $payment_methods->count() == 0 ? 'checked' : '' }}
                                        type="radio"><span class="checkmark"></span></label></div>
                            <div class="flex-fill">
                                <p class="gilroy-bold text-fe2f70 font-12 mb-0" style="padding: 10px 10px 10px 0;">Add New
                                    Payment Method</p>
                            </div>
                        </div>
                        @guest
                            <div class="d-flex align-items-center mb-2 new-card-component">


                                <input class="form-control" id="checkout_email" type="email"
                                    placeholder="john.doe@trippbo.com" name="email" required />

                            </div>
                        @endguest

                        <div class="position-relative icon-right mb-2">
                            <div id="paymentContainer" class="mt-4 gilroy-medium font-14"></div>
                        </div>

                      {{--   @if (Auth::check())
                            <div class="mb-5"><label class="trippbo-checkbox gilroy-regular"
                                    style="font-size: 12px;"><input type="checkbox" name="future_payments"
                                        id="customCheck1">Save
                                    for future payments</label></div>
                            <div>
                        @endif --}}
                        @guest


                            <div class="mb-5"><label class="trippbo-checkbox gilroy-regular">I agree
                                    <input type="checkbox" name="future_payments" name="agreed_to_terms"><span></span></label>
                            </div>
                            <div>
                            @endguest
                            <button id="card-button" type="button"
                                class="btn btn-block gilroy-bold btn-fe2f70 font-14 d-flex justify-content-between"><span>$
                                    20.00</span> <span>Pay Now</span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>





    <div class="body-content">
        <div class="wrapper">
            <div class="breadcrumb_ my-3">
                <ol class="">
                    <li class="breadcrumb-item"><a>Tickets Lottery</a></li>
                    <li class="breadcrumb-item active">{{ $lottery->title }}</li>
                </ol>
            </div>
            <div class="grid-1 mb-3">
                <div style="border-top-left-radius: 15px; border-bottom-left-radius:15px;">
                    <span class="tr"></span>
                    <span class="br"></span>
                    <div class="grid-1-card"
                        style="border-top-left-radius: 15px; border-bottom-left-radius:15px;height:100%;">
                        <span class="corner tr"></span>
                        <span class="corner br"></span>
                        <span class="grid-1-badge gilroy-semi font-20">{{ number_format($lottery->entry_fee, 2) }}
                            $</span>
                        <p class="gilroy-regular font-12 mb-1">{{ $lottery->title }}</p>
                        <h4 class="gilroy-semi text-fe2f70 font-20 mb-4">{{ $lottery->city }}</h4>
                        <p class="gilroy-semi font-12 mb-1">Description</p>
                        <p class="gilroy-regular font-10 mb-4">{{ $lottery->description }}</p>
                        <div class="d-flex flex-row align-content-center justify-content-center mt-5">
                            @if (Auth::check())


                                <div class="w-75"><button type="button" role="button" data-toggle="modal"
                                        data-target="#myModal"
                                        class="btn w-100 gilroy-medium btn-fe2f70 box-shadow-fe2f70 font-12 btn-block"
                                        style="border-radius: 15px !important;">Buy
                                        Ticket</button></div>
                            @else
                                <div class="w-75"><button type="button" role="button" data-toggle="modal"
                                        data-target="#sign-in-required-popup"
                                        class="btn w-100 gilroy-medium btn-fe2f70 box-shadow-fe2f70 font-12 btn-block"
                                        style="border-radius: 15px !important;">Buy
                                        Tickets</button></div>
                            @endif
                        </div>

                    </div>
                </div>
                <div style="border-top-right-radius: 15px;border-bottom-right-radius:15px;">
                    <span class="tl"></span>
                    <span class="bl"></span>
                    <img style="border-top-right-radius: 15px;border-bottom-right-radius:15px;"
                        src="/image/subtraction-5.png" alt="" />
                </div>
            </div>

        </div>


    </div>









    <!-- Footer Start -->

    {{-- <div class="jumbotron">
        <h1 class="display-4">{{$lottery->title}}</h1>
        <p class="lead"><a href="#">{{$lottery->city}}</a></p>
        <hr class="my-4">
        <p>{{$lottery->description}}</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{route('ticket-lottery-buy', $lottery->id)}}" role="button">Buy Ticket</a>
        </p>
    </div> --}}


@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let paymentIntentsecret = '';
        currentTripOrder = '';
        orderDone = false;
        future_payments_js = false;
        new_amount = '{{ $lottery->entry_fee }}'
        $("#card-button").html(`<span>$ ${new_amount}.00</span> <span class="to-right">Pay
                                    Now</span>`)
        const stripe = Stripe('{{ config('services.stripe.key') }}');


        let elements_copy = null;
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        (async function() {
            await prepareCheckout('{{ $lottery->entry_fee }}');
            const options = {
                clientSecret: paymentIntentsecret,
            };

            const elements = stripe.elements(options);
            elements_copy = elements;
            const paymentElement = elements.create("payment");
            paymentElement.mount("#paymentContainer");
        })();

        async function prepareCheckout() {
            try {

                axios_response = await axios.post('{{ route('getPaymentIntentSecret-Ticket-Lottery') }}', {

                    trip_id: '{{ $lottery->id }}',
                    paymentMethodRadio: $("input[name='paymentMethodRadio']:checked").val(),
                    future_payments: $("input[name='future_payments']:checked").prop('checked')
                })
            } catch (error) {
                /* console.log(error)
                $("#amount_validation").text(String(error));
                $("#amount_validation").removeClass('invisible') */

            }


            currentTripOrder = axios_response.data.trip_order_id;
            if (axios_response.data.status == 'success') {
                paymentIntentsecret = axios_response.data.client_secret;
                future_payments_js = axios_response.data.future_payments;
                $("#trip_order_id").val(currentTripOrder);
            } else if (axios_response.data.status == "verification") {
                window.location.href = "/verification/lottery/" + currentTripOrder;
            } else if (axios_response.data.status == "done") {
                orderDone = true;
                $("#trip_order_id").val(currentTripOrder);
            }


        }
        cardButton.addEventListener('click', async (e) => {


            let future_usage = [];


            let form = document.getElementById("solo_checkout_form");

            if (!form.checkValidity()) {

                $.each($("#solo_checkout_form :input"), function(index, value) {

                    if (value.checkValidity() == false) {
                        console.log("test");
                        $(value).addClass("red-border");
                    }
                })

                return;

            }



            if (true) {
                cardButton.disabled = true;
                cardButton.textContent = "Processing..."


                if (orderDone == true) {

                    /*       $("#solo_checkout_form").submit(); */
                    return;
                }
                if (future_payments_js == true) {
                    future_usage = {
                        setup_future_usage: 'on_session'
                    }
                } else {
                    future_usage = {}
                }

                const {
                    error
                } = await stripe.confirmPayment({
                    elements: elements_copy,
                    confirmParams: {
                        return_url: '{{ route('checkPaymentSuccess-Ticket-Lottery') }}' + '?trip_order_id=' +
                            currentTripOrder,
                    },
                });

                if (error) {

                    cardButton.disabled = false;
                    cardButton.textContent = "Try Again"
                    $("#amount_validation").text(error.message);
                    $("#amount_validation").removeClass('invisible')
                    // Display "error.message" to the user...
                } else {
                    /*
                                        $("#solo_checkout_form").submit(); */

                    // The card has been verified successfully...

                    /*    $("#payment_id").val(paymentMethod.id);
                                    var am = $("#amount").val();
                                    $("#payment_amount").val(am);


                                    document.getElementById("payment_form").submit();
                     */
                }
            }


        });






        function markAsChecked(idofcheckbox) {
            $("#" + idofcheckbox).prop("checked", true);

        }

        function updatePaymentMethod() {
            if ($("#new_payment_method").prop('checked') == true) {
                $(".new-card-component").removeClass("invisible")
            } else {
                $(".new-card-component").addClass("invisible")

            }
        }

        @if (Auth::check() && $payment_methods->count() > 0)

            updatePaymentMethod();
        @endif
    </script>


@endsection
