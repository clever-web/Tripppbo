@extends('layout')


@section('head')
<link rel="stylesheet" href="{{asset('css-n/lottery-sub.css')}}">
<link rel="stylesheet" href="{{asset('css-n/lottery-sub-responsive.css')}}">
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
        <!-- Checkout Modal -->
        <div class="modal fade" id="checkout-popup" tabindex="-1" aria-labelledby="checkout-popupLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="checkout-popupLabel">Buy a Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body tripsolo-popup-body">

         {{--                <div class="tripmember">


                            <img src="{{ $trip->user->profile->picture_url ? asset('storage/' . $trip->user->profile->picture_url) : $default_profile_picture }}"
                                alt="" class="img-fluid"
                                style="width: 70px;height:70px;display:block;object-fit:cover;object-position:center;">
                            <p>{{ $trip->user->name }}</p>
                            <span>Posted @include('custom-components.remaining-time', ['date' => $trip->created_at])</span>
                        </div>
     --}}
                        <form id="solo_checkout_form" method="POST" action="{{ route('checkPaymentSuccess-Ticket-Lottery') }}">
                            @csrf
                            <input type="hidden" id="trip_order_id" name="trip_order_id" value="" />
                  {{--           <label for="amount">
                                Amount In USD
                            </label>
                            <div class="input-group input-group-usd">

                                <input id="amount" required pattern="[0-9]+" class="form-control" type="text" value="10"
                                    placeholder="Amount">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="/images-n/icons/usd.png" alt="">
                                    </div>
                                </div>
                            </div>
     --}}
                            <p id="amount_validation" class="invisible">Amount Must Be A Positive Number Between 1 and 10,000.
                            </p>

                            @if (Auth::check() && $payment_methods->count() > 0)
                                <p>Select Payment Method</p>

                                @foreach ($payment_methods as $payment_method)


                                    <div class="cardnumber-box">
                                        <div class="cardselect">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" onchange="updatePaymentMethod()"
                                                    id="paymentMethodRadio{{ $loop->index }}"
                                                    value="{{ $payment_method->id }}" name="paymentMethodRadio"
                                                    class="custom-control-input" {{ $loop->index == 0 ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="paymentMethodRadio{{ $loop->index }}"></label>
                                            </div>
                                        </div>
                                        <div class="cardinputfield"
                                            onclick="markAsChecked('paymentMethodRadio{{ $loop->index }}')">
                                            <img width="50px" height="40px"
                                                src="/images-n/{{ $payment_method->card->brand }}.svg" alt=""
                                                class="img-fluid">
                                            <input class="form-control" disabled type="text"
                                                placeholder="**** **** **** {{ $payment_method->card->last4 }}">
                                        </div>
                                    </div>
                                @endforeach

                            @endif

                            <div class="custom-control custom-radio custom-control-inline {{(Auth::check() && $payment_methods->count() > 0) ? '' : 'invisible'}}">
                                <input type="radio"
                                    {{ Auth::check() == false || $payment_methods->count() == 0 ? 'checked' : '' }}
                                    onchange="updatePaymentMethod()" id="new_payment_method" value="new_payment_method"
                                    name="paymentMethodRadio" class="custom-control-input">
                                <label class="custom-control-label" for="new_payment_method">Add New Payment Method</label>
                            </div>

                            <div class="row mycardnumberfield">
                                @guest
                                    <div class="col-lg-12 new-card-component">

                                        <label for="checkout_email">Email Address (Confirmation will be sent to this email)</label>
                                        <input class="form-control" id="checkout_email" type="email"
                                            placeholder="john.doe@trippbo.com" name="email" required />

                                    </div>
                                @endguest

                                <div class="col-lg-12 {{ Auth::check() ? '' : 'mt-2' }} new-card-component">
                                    <label for="cardNumber">Card Details</label>

                                    <div id="cardNumber" class="form-control p-3">
                                    </div>
                                </div>
                                <div class="col-lg-6 new-card-component">


                                    <div id="cardExpDate" class="form-control p-3">
                                    </div>
                                </div>

                                <div class="col-lg-6 new-card-component">
                                    <div id="cardCVC" class="form-control p-3">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    @if (Auth::check())
                                        <div class="custom-control custom-checkbox new-card-component">
                                            <input type="checkbox" name="future_payments" class="custom-control-input"
                                                id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Save for future
                                                payments</label>
                                        </div>
                                    @endif
                                    <button id="card-button" class="btn btn-primary btn-block" type="button"><span>$
                                            10.00</span> <span class="to-right">Pay
                                            Now</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



  <!-- Lottery Sub Start -->
  <section class="lottery-sub-area">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <div class="page-name">
                      <ul>
                          <li><a href="#">Tickets Lottery</a></li>
                          <li><img src="{{asset('images-n/icons/small-arrow.png')}}" alt=""></li>
                          <li><a href="#">{{$lottery->city}}</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12">
                  <div class="lottery-sub-col">
                      <div class="lottery-sub-discribe">
                          <div class="lottery-price">
                              <h3>$ {{number_format($lottery->entry_fee, 2) }}</h3>
                          </div>
                          <span>{{$lottery->title}}</span>
                          <h2>{{$lottery->city}}</h2>
                          <h4>Description</h4>
                          <p>{{$lottery->description}}</p>
                          @if (Auth::check())
                          <a class="btn btn-primary btn-lg btn-block" href="#" role="button"  data-toggle="modal" data-target="#checkout-popup">Buy a Ticket</a>
                      @else
                      <a class="btn btn-primary btn-lg btn-block" href="#" role="button"  data-toggle="modal" data-target="#sign-in-required-popup">Buy a Ticket</a>

                      @endif
                        </div>
                      <div class="lottery-sub-discribe-banner">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>



  <section class="lottery-area">
      <div class="container-fluid custom-container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <div class="lottery-slider-col">
                      <h4>Similar Lotteries</h4>
                      <div class="lottery-slider">
                          <div class="lottery-item">
                              <div class="lottery-col">
                                  <div class="lottery-img">
                                      <img src="{{asset('images-n/lottery/1.jpg')}}" alt="" class="img-fluid">
                                      <img src="{{asset('images-n/lottery/trippbo-logo.jpg')}}" alt="" class="img-fluid trippbo-logo">
                                  </div>
                                  <div class="lottery-content">
                                      <span>Trip To</span>
                                      <h3>Dubai <span>$10.00</span></h3>
                                      <a href="#">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                      <img src="{{asset('images-n/icons/half-round-left.png')}}" alt="" class="half-round-left">
                                      <img src="{{asset('images-n/icons/half-round-right.png')}}" alt="" class="half-round-right">
                                  </div>
                              </div>
                          </div>
                          <div class="lottery-item">
                              <div class="lottery-col">
                                  <div class="lottery-img">
                                      <img src="{{asset('images-n/lottery/1.jpg')}}" alt="" class="img-fluid">
                                      <img src="{{asset('images-n/lottery/trippbo-logo.jpg')}}" alt="" class="img-fluid trippbo-logo">
                                  </div>
                                  <div class="lottery-content">
                                      <span>Trip To</span>
                                      <h3>Dubai <span>$10.00</span></h3>
                                      <a href="#">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                      <img src="{{asset('images-n/icons/half-round-left.png')}}" alt="" class="half-round-left">
                                      <img src="{{asset('images-n/icons/half-round-right.png')}}" alt="" class="half-round-right">
                                  </div>
                              </div>
                          </div>
                          <div class="lottery-item">
                              <div class="lottery-col">
                                  <div class="lottery-img">
                                      <img src="{{asset('images-n/lottery/1.jpg')}}" alt="" class="img-fluid">
                                      <img src="{{asset('images-n/lottery/trippbo-logo.jpg')}}" alt="" class="img-fluid trippbo-logo">
                                  </div>
                                  <div class="lottery-content">
                                      <span>Trip To</span>
                                      <h3>Dubai <span>$10.00</span></h3>
                                      <a href="#">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                      <img src="{{asset('images-n/icons/half-round-left.png')}}" alt="" class="half-round-left">
                                      <img src="{{asset('images-n/icons/half-round-right.png')}}" alt="" class="half-round-right">
                                  </div>
                              </div>
                          </div>
                          <div class="lottery-item">
                              <div class="lottery-col">
                                  <div class="lottery-img">
                                      <img src="{{asset('images-n/lottery/1.jpg')}}" alt="" class="img-fluid">
                                      <img src="{{asset('images-n/lottery/trippbo-logo.jpg')}}" alt="" class="img-fluid trippbo-logo">
                                  </div>
                                  <div class="lottery-content">
                                      <span>Trip To</span>
                                      <h3>Dubai <span>$10.00</span></h3>
                                      <a href="#">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                      <img src="{{asset('images-n/icons/half-round-left.png')}}" alt="" class="half-round-left">
                                      <img src="{{asset('images-n/icons/half-round-right.png')}}" alt="" class="half-round-right">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>



  <!-- Footer Start -->

  <a href="#" id="back-to-top" title="Back to top"><img src="{{asset('images-n/icons/top-arrow.png')}}" alt=""></a>

{{--    <div class="jumbotron">
        <h1 class="display-4">{{$lottery->title}}</h1>
        <p class="lead"><a href="#">{{$lottery->city}}</a></p>
        <hr class="my-4">
        <p>{{$lottery->description}}</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{route('ticket-lottery-buy', $lottery->id)}}" role="button">Buy Ticket</a>
        </p>
    </div>--}}


@endsection
@section("scripts")
<script src="https://js.stripe.com/v3/"></script>
<script>
    let paymentIntentsecret = '';
    currentTripOrder = '';
    orderDone = false;
    future_payments_js = false;
    new_amount = '{{$lottery->entry_fee}}'
    $("#card-button").html(`<span>$ ${new_amount}.00</span> <span class="to-right">Pay
                                    Now</span>`)
    const stripe = Stripe('{{ config('services.stripe.key') }}');

    const elements = stripe.elements();
    const cardElement = elements.create('cardNumber', {
        style: {
            base: {

            }
        }
    });
    const cardExpDateElement = elements.create('cardExpiry', {
        style: {
            base: {

            }
        }
    });

    const cardCVCElement = elements.create('cardCvc', {
        style: {
            base: {

            }
        }
    });

    cardElement.mount('#cardNumber');
    cardExpDateElement.mount("#cardExpDate");
    cardCVCElement.mount("#cardCVC")

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');



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

            await prepareCheckout();
            if (orderDone == true) {

                $("#solo_checkout_form").submit();
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
                paymentIntent,
                error
            } = await stripe.confirmCardPayment(
                paymentIntentsecret, {
                    payment_method: {
                        card: cardElement,

                    },
                    ...future_usage
                },
            );

            if (error) {

                cardButton.disabled = false;
                cardButton.textContent = "Try Again"
                $("#amount_validation").text(error.message);
                $("#amount_validation").removeClass('invisible')
                // Display "error.message" to the user...
            } else {

                $("#solo_checkout_form").submit();

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
    <script type="text/javascript">


        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function () {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }

        // lottery-slider
       if($('.lottery-slider').length){
            $('.lottery-slider').owlCarousel({
                loop: true,
                margin: 15,
                dots: true,
                nav: true,
                autoplayHoverPause: false,
                autoplay: true,
                autoplayTimeout: 4000,
                smartSpeed: 800,
                center: false,
                navText: [
                    '<img src="{{asset('images-n/icons/left-arrow-white.png')}}" alt="">',
                    '<img src="{{asset('images-n/icons/right-arrow-white.png')}}" alt="">'
                ],
                responsive: {
                    0: {
                        items: 1,
                        center: false
                    },
                    480:{
                        items:1,
                        center: false
                    },
                    600: {
                        items: 1,
                        center: false
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            })
        }


        // Back To Top
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('#back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 1000);
            });
        }
    </script>

@endsection
