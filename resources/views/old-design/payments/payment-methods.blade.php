@extends('layout')
@section('head')
    <!-- payment CSS -->
    <link href="/css-n/payment.css" rel="stylesheet">

    <!-- account Responsive CSS -->
    <link href="/css-n/payment-responsive.css" rel="stylesheet">

@endsection
@section('content')
    <!-- Account Start -->
    <section class="account-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><img src="/images-n/icons/small-arrow.png" alt=""></li>
                            <li><a href="#">Payment Method</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-cols">
                        <div class="account-left-col">
                            <div class="account-menu">
                                <p>Account Settings</p>
                                <ul>
                                    <li><a href="{{ route('profile-personal-information') }}"><img
                                                src="/images-n/icons/icon-1.png" alt=""> Personal
                                            Information</a></li>
                                    <li><a href="{{ route('profile-my-tickets') }}"><img src="/images-n/icons/icon-2.png"
                                                alt=""> My Balance</a></li>
                               <li><a href="{{ route('profile-my-coupons') }}"><img src="/images-n/icons/icon-3.png"
                                                alt=""> My Gift Card</a></li>
                            {{--         <li><a href="{{ route('payment-methods-home') }}" class="active"><img
                                                src="/images-n/icons/icon-4.png" alt=""> Payment
                                            Method</a></li> --}}
                                    <li><a href="{{ route('profile-change-password') }}"><img
                                                src="/images-n/icons/icon-5.png" alt=""> Change Password</a>
                                    </li>
                                    <li><a href="{{ route('profile-account-verification') }}"><img
                                                src="/images-n/icons/icon-6.png" alt=""> Account
                                            Verification</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="account-right-col">
                            <p class="box-heading">Payment Method</p>
                            <div class="account-content">
                                <div class="payment-content">
                                    @if (!$payment_methods->isEmpty())
                                        <p>Default Payment Methods</p>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if ($payment_methods->isEmpty())


                                                You don't have any payment methods yet.
                                            @else

                                                @foreach ($payment_methods as $payment_method)

                                                    {{-- Your payment methods:   <div class="d-flex align-items-center justify-content-center"> <i class="fab fa-cc-visa fa-2x"></i> </span>  &emsp; &emsp;   {{ " **** **** **** " . $payment_method->card->last4}} </div> --}}

                                                    <div class="payment-form">
                                                        <div class="form-group">
                                                            <div
                                                                class="input-group d-flex justify-content-center align-items-center">
                                                                <div class="input-group-prepend">
                                                                    <div
                                                                        class="input-group-text d-flex flex-row align-items-center justify-content-center">
                                                                        <div><img
                                                                            @if ($payment_method->card->brand == 'visa')
                                                                            src="/images-n/visa.svg"
                                                                               @elseif($payment_method->card->brand=="mastercard")
                                                                                   src="/images-n/mastercard.svg"

                                                                                   @endif alt="" class="img-fluid"
                                                                                width="50px" height="40px"> </div>
                                                                    </div>
                                                                </div>
                                                                <input class="form-control" type="text" disabled
                                                                    value="**** {{ $payment_method->card->last4 }}">
                                                            </div>
                                                        </div>
                                                        {{-- <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="customCheck1">
                                                                <label class="custom-control-label"
                                                                       for="customCheck1">1</label>
                                                            </div> --}}
                                                        <form id="{{ $payment_method->id }}"
                                                            action="{{ route('payment-methods-delete') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="payment_method_id"
                                                                value="{{ $payment_method->id }}">
                                                        </form>
                                                        <div class="delete-icon">
                                                            <a href="#"
                                                                onclick="submitForm('{{ $payment_method->id }}')"><img
                                                                    src="/images-n/icons/delete.png" alt=""></a>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            @endif
                                            {{-- <div class="payment-form">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text"><img src="/images-n/icons/paypal.png" alt=""></div>
                                                                    </div>
                                                                    <input class="form-control" type="text" placeholder="**** **** **** *368">
                                                                </div>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                                <label class="custom-control-label" for="customCheck2">1</label>
                                                            </div>
                                                            <div class="delete-icon">
                                                                <a href="#"><img src="/images-n/icons/delete.png" alt=""></a>
                                                            </div>
                                                        </div> --}}
                                            <div class="add-btn">
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal">Add New</a>

                                            </div>
                                            {{-- <div class="form-btns">
                                                    <button class="btn btn-primary" type="submit">Discard</button>
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                </div> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add New Modal -->
    <div class="modal fade add-new-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Add New Payment Method</p>
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                aria-controls="pills-home" aria-selected="true"><img src="/images-n/icons/card-black.png"
                                    alt="" class="icon-black"> <img src="/images-n/icons/card-pink.png" alt=""
                                    class="icon-pink"> Credit / Debit
                                Card</a>
                        </li>
                     {{--    <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                aria-controls="pills-profile" aria-selected="false"><img
                                    src="/images-n/icons/paypal-black.png" alt="" class="icon-black"> <img
                                    src="/images-n/icons/paypal-pink.png" alt="" class="icon-pink"> Paypal</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">

                            <div class="row">

                                {{-- <div class="col-lg-12">
                                        <input class="form-control" type="text" placeholder="Card Number">
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" placeholder="Expiration">
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" placeholder="CVV">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tab-buttons">
                                            <button type="button" class="btn btn-primary">Discard</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div> --}}

                                {{-- <div class="container p-5 m-3" style="width: 400px;background-color: navajowhite;border-radius: 10px;">
                                                <input id="card-holder-name" placeholder="Name" class="m-3 p-3" type="text">

                                                <!-- Stripe Elements Placeholder -->
                                                <div id="card-element" style="background-color: white;" class="m-3 p-3"></div>

                                                <button class="btn btn-primary" id="card-button" class="p-3 m-3"
                                                        data-secret="{{ $intent->client_secret }}">
                                                    Add Payment Method
                                                </button>


                                                <form id="payment_form" action="{{route('payment-methods-store')}}" method="POST">
                                                    @csrf
                                                    <input id="payment_id" type="hidden" name="payment_method_id" value=""/>
                                                </form>
                                            </div> --}}


                                <div class="col-lg-12">
                                    <div id="card-number" class="p-4" style="width: 100%;border: #e4e4e4 solid 1px"></div>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <div id="card-expiry" class="p-4" style="width: 100%;border: #e4e4e4 solid 1px"></div>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <div id="card-cvc" class="p-4" style="width: 100%;border: #e4e4e4 solid 1px"></div>
                                </div>
                                <form id="my_form" action="{{ route('payment-methods-store') }}" method="POST">
                                    @csrf
                                    <input id="payment_id" type="hidden" name="payment_method_id" value="">
                                </form>
                                <!-- Stripe Elements Placeholder -->
                                {{-- <div class="col-lg-12" style="background-color: #718096;">
                                            <div id="card-element" style="background-color: white;" class="m-3 p-3"></div>
                                        </div> --}}
                                <div class="col-lg-12">
                                    <div class="tab-buttons">
                                        <button type="button" data-dismiss="modal" class="btn btn-primary">Discard
                                        </button>
                                        <button id="card-button" data-secret="{{ $intent->client_secret }}"
                                            class="btn btn-primary">Save
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                       {{--  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="paypal-content">
                                <p>Important: You will be redirected to PayPal's website to securely complete your
                                    payment.</p>
                                <div class="confirm-btn mt-2">
                                    <button class="btn btn-primary" type="submit">Confirm And Pay</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
          @if ($payment_methods->isEmpty())
              <div class="container p-5 m-3" style="width: 400px;background-color: navajowhite;border-radius: 10px;">
                  <input id="card-holder-name" placeholder="Name" class="m-3 p-3" type="text">

                  <!-- Stripe Elements Placeholder -->
                  <div id="card-element" style="background-color: white;" class="m-3 p-3"></div>

                  <button class="btn btn-primary" id="card-button" class="p-3 m-3"
                          data-secret="{{ $intent->client_secret }}">
                      Add Payment Method
                  </button>


                  <form id="payment_form" action="{{route('payment-methods-store')}}" method="POST">
                      @csrf
                      <input id="payment_id" type="hidden" name="payment_method_id" value=""/>
                  </form>
              </div>



          @else
              <div class="container p-5 m-3 " style="background-color: navajowhite;border-radius: 10px;">


                  @foreach ($payment_methods as $payment_method)

                  Your payment methods:   <div class="d-flex align-items-center justify-content-center"> <i class="fab fa-cc-visa fa-2x"></i> </span>  &emsp; &emsp;   {{ " **** **** **** " . $payment_method->card->last4}} </div>

                  @endforeach
              </div>

          @endif


      </div> --}}
@endsection





@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        $(document).ready(function() {
            const stripe = Stripe('pk_test_vcaFIAmCgaRUXFtdayPIqifR');

            const elements = stripe.elements();


            var cardNumber = elements.create('cardNumber');

            cardNumber.mount('#card-number');


            var cardExpiry = elements.create('cardExpiry');
            cardExpiry.mount('#card-expiry');

            var cardCvc = elements.create('cardCvc');
            cardCvc.mount('#card-cvc');


            /*
                    const cardElement = elements.create('card');
                    cardElement.mount('#card-element');
            */


            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;
            var form = document.getElementById("my_form");
            console.log(form);
            cardButton.addEventListener('click', async (e) => {
                const {
                    setupIntent,
                    error
                } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardNumber

                        }
                    }
                );

                if (error) {
                    alert(error.message)
                    // Display "error.message" to the user...
                } else {
                    // The card has been verified successfully...

                    $("#payment_id").val(setupIntent.payment_method);
                    form.submit();
                }
            });
        })

        function submitForm(id) {
            var elementx = document.getElementById(id);
            console.log(id)
            elementx.submit()
        }
    </script>
    <script type="text/javascript">
        // Datepicker Active Script
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });


        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function() {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }


        // Back To Top
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function() {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function() {
                backToTop();
            });
            $('#back-to-top').on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 1000);
            });
        }
    </script>

@endsection
