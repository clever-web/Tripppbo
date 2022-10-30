@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{ asset('css-n/trip-solo.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-n/trip-solo-responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-n/trip-solo-sub.css') }}" />
    <link rel="stylesheet" href="{{ asset('css-n/trip-solo-sub-responsive.css') }}" />
    <!-- checkout-popup CSS -->
    <link href="/css-n/trip-solo-popup.css" rel="stylesheet">
    <style>
        .red-border {
            border-width: 2px !important;
            border-style: solid !important;
            border-color: red !important;
        }

    </style>
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


    <!--End Funding Confiramtion Modal -->
    <div class="modal fade" id="confirmEndFunding" tabindex="-1" role="dialog" aria-labelledby="confirmEndFundingTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmEndFundingTitle">END FUNDING</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    By ending this, other users won't be able to fund this trip anymore and any collected funds will be
                    transfered to your account balance.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button onclick="endFunding()" type="button" class="btn btn-danger">End Funding</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Modal -->
    <div class="modal fade" id="checkout-popup" tabindex="-1" aria-labelledby="checkout-popupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkout-popupLabel">Fund This Trip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body tripsolo-popup-body">

                    <div class="tripmember">


                        <img src="{{ $trip->user->profile->picture_url ? asset('storage/' . $trip->user->profile->picture_url) : $default_profile_picture }}"
                            alt="" class="img-fluid"
                            style="width: 70px;height:70px;display:block;object-fit:cover;object-position:center;">
                        <p>{{ $trip->user->name }}</p>
                        <span>Posted @include('custom-components.remaining-time', ['date' => $trip->created_at])</span>
                    </div>

                    <form id="solo_checkout_form" method="POST" action="{{ route('checkPaymentSuccess') }}">
                        @csrf
                        <input type="hidden" id="trip_order_id" name="trip_order_id" value="" />
                        <label for="amount">
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

                        <div
                            class="custom-control custom-radio custom-control-inline {{ Auth::check() && $payment_methods->count() > 0 ? '' : 'invisible' }}">
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




    <!-- edit Your Trip Modal -->
    <div class="modal fade creat-trip-modal" id="createSoloTrip" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-xl">
            <form method="post" enctype="multipart/form-data" action="{{ route('solos-create') }}">
                @csrf
                <input type="hidden" name="trip_id" value="{{ $trip->id }}" />
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Create Trip <span>SOLO</span></h4>

                        <div class="create-trip-body">
                            <div class="create-trip-col">

                                <div class="row">
                                    <div class="col-xl-12">
                                        <input class="form-control" name="title" type="text" placeholder="Title"
                                            value="{{ $trip->title }}">
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="input-group">
                                            <input required type="text" class="form-control m-0" name="destination"
                                                value="{{ $trip->destination }}" placeholder="Destination">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img src="/images-n/icons/location-pink.png"
                                                        alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-group">
                                            <input required type="text" class="form-control m-0"
                                                placeholder="How much to raise?" name="cost" value="{{ $trip->goal }}">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><img src="/images-n/icons/usd.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <select disabled name="fund_duration" required class="form-control">
                                            <option>@include('custom-components.remaining-time-solo' , ['date' =>
                                                $trip->enddate])</option>


                                        </select>
                                    </div>
                                    {{-- <div class="col-xl-6">
                                 <input class="datepicker form-control" id="popup-datepicker" value="Check In"
                                     name="startdate">
                             </div>
                             <div class="col-xl-6">
                                 <input class="datepicker form-control" id="popup-datepicker-two" value="Check Out"
                                     name="enddate">
                             </div> --}}
                                    <div class="col-xl-12">
                                        <textarea class="form-control" rows="3" placeholder="Description"
                                            name="description">{{ $trip->description }}</textarea>
                                    </div>
                                    {{-- <div class="col-xl-12">
                                  <div class="form-group form-check mb-0">
                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                      <label class="form-check-label" for="exampleCheck1">I want to book my trip
                                          through Trippbo (Select this if you haven't booked your trip through other
                                          providers yet)</label>
                                  </div>
                              </div> --}}
                                </div>
                            </div>


                            <div class="create-trip-col">
                                <div class="upload-field">
                                    <div id="msg"></div>
                                    <div id="image-form">
                                        <input type="file" name="trip_img" id="fileInput" class="file" accept="image/*">
                                        <div class="input-group">
                                            <input type="text" class="form-control" disabled placeholder="Upload Image"
                                                id="file">
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn btn-primary">Upload Image
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-box">
                                    <img src="{{ $trip->picture_url ? asset('storage/' . $trip->picture_url) : '/images-n/upload.png' }}"
                                        id="preview" alt="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </form>
        </div>





    </div>






    <section class="trip-banner-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">Fund my trip solo</a></li>
                            <li><img src="{{ asset('images-n/icons/small-arrow.png') }}" alt=""></li>
                            <li><a href="#">{{ $trip->title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="trip-banner-col">
                        <div class="trip-left-box">
                            <div class="trip-left-box-content">
                                <div style="position: relative">
                                    <h2>{{ $trip->destination }} <a data-toggle="collapse" href="#collapseExample"
                                            role="button" aria-expanded="false" aria-controls="collapseExample"><img
                                                src="{{ asset('/images-n/dot.png') }}" alt="" class="img-fluid"></a></h2>
                                    <div class="collapse" id="collapseExample"
                                        style="position: absolute; top: 50px; right: 20px;">
                                        <div class="card card-body" style="border-radius:0px;">

                                            @if (Auth::check() && ($trip->user->id === Auth::id() || Auth::user()->isAdmin))
                                                <div>
                                                    <a href="#" role="button" data-toggle="modal"
                                                        data-target="#createSoloTrip" role="button"> <span
                                                            style="color:#23242C;"> <img style="width: 21px;"
                                                                src="{{ asset('images-n/icons-2/edit.png') }}"> Edit
                                                        </span>
                                                    </a>
                                                </div>
                                                <hr>
                                                <div>
                                                    <a href="#"> <span style="color:#23242C;"> <img style="width: 21px;"
                                                                src="{{ asset('images-n/icons-2/delete.png') }}"> Delete
                                                        </span>
                                                    </a>
                                                </div>
                                            @elseif(Auth::check())


                                                <div>
                                                    <a href="#" data-toggle="modal" data-target="#reportModal"
                                                        data-violating-object="soloTrip"
                                                        data-violating-object-id="{{ $trip->id }}"> <span
                                                            style="color:#23242C;"> <i class="far fa-flag"></i> Report
                                                        </span>
                                                    </a>
                                                </div>


                                                <hr>
                                            @endif

                                            <div>
                                                <a href="#" data-toggle="modal" data-target="#socialMediaShare"
                                                    data-link="{{ url()->full() }}">
                                                    <span style="color: #23242C"> <i style="color: #23242C"
                                                            class="fas fa-share-alt"></i> Share </span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <p><span>Posted</span>
                                    @include('custom-components.remaining-time', ['date' => $trip->created_at])
                                </p>
                                <div class="tourist-name">
                                    <div class="tourist-pic">
                                        <img src="{{ $trip->user->profile->picture_url ? asset('storage/' . $trip->user->profile->picture_url) : $default_profile_picture }}"
                                            alt="" class="img-fluid"
                                            style="width: 70px;height:70px;display:block;object-fit:cover;object-position:center;">
                                        <a href="{{ route('profile-home', $trip->user->id) }}"
                                            style="  color: #FE2F70;
                                                                                                                        margin-top: 10px;
                                                                                                                        font-size: 18px;
                                                                                                                        margin-bottom: 2px;display:block;">{{ $trip->user->name }}</a>
                                        <span>{{ $trip->title }}</span>
                                    </div>
                                    <h3>${{ $trip->goal }}</h3>
                                </div>
                                <div class="date-boxs justify-content-center">

                                    <div class="date-box text-center">

                                        <span><img src="{{ asset('images-n/icons/date-pink.png') }}" alt="">
                                            @include("custom-components.remaining-time-solo" , ['date' =>
                                            $trip->enddate])</span>
                                    </div>
                                    {{-- <div class="date-box">
                                        <p>From</p>
                                        <span><img src="{{ asset('images-n/icons/date-pink.png') }}" alt="">
                                            {{ \Carbon\Carbon::parse($trip->startdate)->format('Y-m-d') }}</span>
                                    </div>
                                    <div class="date-box">
                                        <img src="{{ asset('images-n/icons/right-arrow-white.png') }}" alt="">
                                    </div>
                                    <div class="date-box">
                                        <p>To</p>
                                        <span><img src="{{ asset('images-n/icons/date-pink.png') }}" alt="">
                                            {{ \Carbon\Carbon::parse($trip->enddate)->format('Y-m-d') }}</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="dis-block-991">
                            <img src="{{ asset('images-n/bg/2.jpg') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="overview-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overview-col">
                        <h5>Overview</h5>
                        <div class="inside-content">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="overview-content">
                                        <h4>{{ $trip->title }}</h4>
                                        <p>{{ $trip->description }}</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="overview-content">
                                        <div class="fund-box">
                                            <p>Fund Collected</p>
                                            <h3>$ {{ $trip->totalAmountRaised() }} <span>out of $
                                                    {{ $trip->goal }}</span></h3>
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ ($trip->totalAmountRaised() / $trip->goal) * 100 }}%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            @if ($trip->ended == false)

                                                @if (Auth::check() && $trip->user->id === Auth::id())

                                                    <a href="#" data-toggle="modal" data-target="#confirmEndFunding"
                                                        class="btn btn-primary btn-lg btn-block">End Funding (Collect Raised
                                                        Funds)</a>
                                                @else

                                                    <a href="#" data-toggle="modal" data-target="#checkout-popup"
                                                        class="btn btn-primary btn-lg btn-block">Fund this trip</a>
                                                @endif
                                            @else

                                                <a class="btn btn-primary btn-lg btn-block">Trip Ended</a>

                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="overview-content">
                                        <div class="overview-map">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3387.9998252687506!2d34.80370561452169!3d31.879421436515305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502b76deb98ee23%3A0xde654c9bb5440708!2sRaoul+Wallenberg+St+8%2C+Rehovot%2C+Israel!5e0!3m2!1sen!2sbd!4v1534417481016"
                                                width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen
                                                class="google-map"></iframe>
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
    <section class="trips-slider-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trips-slider-col">
                        <h4>Similar Trips</h4>
                        <div class="trips-slider">
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{ asset('/images-n/trips/5.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p>
                                        </h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{ asset('images-n/icons/date.png') }}" alt=""
                                                    class="img-fluid">
                                                24/05/2021
                                            </li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img
                                            src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{ asset('/images-n/trips/5.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p>
                                        </h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{ asset('images-n/icons/date.png') }}" alt=""
                                                    class="img-fluid">
                                                24/05/2021
                                            </li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img
                                            src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{ asset('/images-n/trips/5.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p>
                                        </h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{ asset('images-n/icons/date.png') }}" alt=""
                                                    class="img-fluid">
                                                24/05/2021
                                            </li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img
                                            src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{ asset('/images-n/trips/5.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p>
                                        </h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{ asset('images-n/icons/date.png') }}" alt=""
                                                    class="img-fluid">
                                                24/05/2021
                                            </li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img
                                            src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{ asset('/images-n/trips/5.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p>
                                        </h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{ asset('images-n/icons/date.png') }}" alt=""
                                                    class="img-fluid">
                                                24/05/2021
                                            </li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img
                                            src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{ asset('/images-n/trips/5.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p>
                                        </h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{ asset('images-n/icons/date.png') }}" alt=""
                                                    class="img-fluid">
                                                24/05/2021
                                            </li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img
                                            src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{ asset('/images-n/trips/5.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p>
                                        </h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{ asset('images-n/icons/date.png') }}" alt=""
                                                    class="img-fluid">
                                                24/05/2021
                                            </li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img
                                            src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{ asset('/images-n/trips/5.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p>
                                        </h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{ asset('images-n/icons/date.png') }}" alt=""
                                                    class="img-fluid">
                                                24/05/2021
                                            </li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img
                                            src="{{ asset('images-n/icons/right-arrow.png') }}" alt=""></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->

    {{-- <div class="p-5" style="background-color: #e9ecef;">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                       aria-selected="true">Overview</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact" aria-selected="false">Settings</a>
                </li>

            </ul>
            <div class="tab-content p-lg-5 p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="jumbotron">
                        <h1 class="display-4">{{$trip->title}}</h1>
                        <p class="lead">Posted by <a href="#">{{$trip->user->name}}</a> - {{$trip->destination}}</p>
                        <hr class="my-4">
                        <p>{{$trip->description}}</p>
                        <p><span style="font-weight: bolder">{{$trip->donations}}$</span> has been collected from a total of <span style="font-weight: bolder">{{$trip->goal}}</span></p>

                    </div>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="{{route('solo-fund', $trip->id)}}" role="button">Fund this trip</a>
                    </p>
                </div>

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </div> --}}

@endsection
@section('scripts')
    <script>
        function endFunding() {
            axios.post('{{ route('solo-end-funding') }}', {
                trip_id: {{ $trip->id }}
            }).then(() => {
                $("#confirmEndFunding").modal('hide')
                location.reload();
            })
        }
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let paymentIntentsecret = '';
        currentTripOrder = '';
        orderDone = false;
        future_payments_js = false;
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



        async function prepareCheckout(amount_to_charge) {
            try {

                axios_response = await axios.post('{{ route('getPaymentIntentSecret') }}', {
                    amount: amount_to_charge,
                    trip_id: '{{ $trip->id }}',
                    paymentMethodRadio: $("input[name='paymentMethodRadio']:checked").val(),
                    future_payments: $("input[name='future_payments']:checked").prop('checked'),
                    @if(Auth::check() == false)
                    email: $('#checkout_email').val(),
                    @endif
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
                window.location.href = "/verification/solo/" + currentTripOrder;
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


            let amount = $("#amount").val()

            if (isNaN(amount) == false && amount > 0) {
                cardButton.disabled = true;
                cardButton.textContent = "Processing..."

                await prepareCheckout(amount);
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
            } else {
                $("#amount").addClass('red-border');
                $("#amount_validation").removeClass('invisible')

            }


        });


        $("#amount").change(function() {
            let new_amount = $("#amount").val()
            $("#card-button").html(`<span>$ ${new_amount}.00</span> <span class="to-right">Pay
                                        Now</span>`)
        })

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


    <script>
        // Upload Image
        $(document).on("click", ".browse", function() {
            var file = $('#fileInput');
            file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });



        function copy() {
            /* Get the text field */
            var copyText = document.getElementById("pageLink");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */

        }

        $(document).click(function(event) {
            var $target = $(event.target);
            if (!$target.closest('#collapseExample').length &&
                $('#collapseExample').is(":visible")) {
                $('#collapseExample').collapse('hide')
            }
        });

        $('#collapseExample').on('shown.bs.collapse', function() {


        })
    </script>
    <script type="text/javascript">
        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function() {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }

        // trips-slider
        if ($('.trips-slider').length) {
            $('.trips-slider').owlCarousel({
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
                    '<img src="{{ asset('images-n/icons/left-arrow-white.png') }}" alt="">',
                    '<img src="{{ asset('images-n/icons/right-arrow-white.png') }}" alt="">'
                ],
                0: {
                    items: 1,
                    center: false
                },
                480: {
                    items: 1,
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

            })
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
