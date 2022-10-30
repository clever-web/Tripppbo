@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{ asset('css-r/home/style.css') }}" />

    <link rel="stylesheet" href="{{ asset('css-r/home/fund-my-trip-solo-overview.css') }}" />

    <style>
        #solo_checkout_form * {
            border-radius: 15px !important;
        }

        .btn-upload {
            display: inline-block;
            color: white;
            background-color: #ef1e60 !important;
            padding: 10px;
            font-family: sans-serif;
            cursor: pointer;
            margin: 0;
            border: 1px solid #d2d2d2;
            width: 100%;
            text-align: center;
            font-size: 14px;
        }

        .red-border {
            border-width: 2px !important;
            border-style: solid !important;
            border-color: red !important;
        }

        .add-border-radius {
            border-radius: 15px !important;
        }

        .grid-2 {
            border-radius: 15px;
        }

        .grid-2>div>* {
            border-radius: 15px;
        }

        .upload-text {
            font-size: 14px;
            padding: 10px;
        }

        .grid-3-custom>div:nth-of-type(1) {
            grid-column: 1 / span 2;
            border: 1px solid #d2d2d2;
        }

        .grid-3-custom {
            display: grid;
            grid-template-columns: 30% 30% auto;
        }



        .grid-2-custom * {
            border-radius: 15px;
        }

        @media (max-width: 768px) {
            .grid-2-custom {
                display: grid;
                grid-template-columns: 50% auto;
                column-gap: 5px;
                row-gap: 5px;
            }

            .grid-2-custom>div:nth-of-type(7),
            .grid-2-custom>div:nth-of-type(8),
            .grid-2-custom>div:nth-of-type(9),
            .grid-2-custom>div:nth-of-type(10),
            .grid-2-custom>div:nth-of-type(11) {
                grid-column: 1 / span 2;
            }
        }

        @media (min-width: 769px) {



            .grid-2-custom {
                display: grid;
                grid-template-columns: 25% 25% auto auto;
                grid-template-rows: auto auto auto auto auto auto auto auto;
                column-gap: 10px;
                row-gap: 10px;
            }

            .grid-2-custom>div:nth-of-type(1) {
                grid-area: 1 / 1 / span 1 / span 2;
            }

            .grid-2-custom>div:nth-of-type(2) {
                grid-area: 2 / 1 / span 1 / span 2;
            }

            .grid-2-custom>div:nth-of-type(3) {
                grid-area: 3 / 1 / span 1 / span 1;
            }

            .grid-2-custom>div:nth-of-type(4) {
                grid-area: 3 / 2 / span 1 / span 1;
            }

            .grid-2-custom>div:nth-of-type(5) {
                grid-area: 4 / 1 / span 1 / span 1;
            }

            .grid-2-custom>div:nth-of-type(6) {
                grid-area: 4 / 2 / span 1 / span 1;
            }

            .grid-2-custom>div:nth-of-type(7) {
                grid-area: 5 / 1 / span 3 / span 2;
            }

            .grid-2-custom>div:nth-of-type(8) {
                grid-area: 8 / 1 / span 1 / span 2;
            }

            .grid-2-custom>div:nth-of-type(9) {
                grid-area: 1 / 3 / span 1 / span 2;
            }

            .grid-2-custom>div:nth-of-type(10) {
                grid-area: 2 / 3 / span 6 / span 2;
                position: relative;
            }

            .grid-2-custom>div:nth-of-type(11) {
                grid-area: 8 / 3 / span 1 / span 2;
            }

            .grid-2-custom>div:nth-of-type(10)>div {
                position: absolute;
                border: 1px solid #d2d2d2;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }

            .grid-2-custom>div:nth-of-type(10)>div>img {
                /*   height: 150px; */
            }

        }

    </style>


@endsection


@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}


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






    <form method="post" enctype="multipart/form-data" action="{{ route('solos-create') }}">
        @csrf
        <input type='hidden' name="trip_id" value="{{ $trip->id }}">
        <!-- The Modal -->
        <div class="modal fade" id="edit_trip_modal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content  p-3 add-border-radius">
                    <!-- Modal Header -->
                    <div class="modal-header border-0">
                        <h4 class="modal-title gilroy-semi font-22"><span class="mr-3">Create Trip</span>
                            <span class="gilroy-regular solo">SOLO</span>
                        </h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body pt-0">
                        <div class="grid-2-custom">
                            <div>
                                <div class="position-relative inputField-box"><input type="text"
                                        class="inputField inputField-withicon pl-3 gilroy-medium font-14" name="title"
                                        placeholder="Title"></div>
                            </div>
                            <div>
                                <div id="fund_my_trip_solo_app" class="position-relative icon-right"><input  autocomplete="off"
                                        id="trip_destination" type="text" v-on:input="destination = $event.target.value"
                                        v-model="destination"
                                        class="inputField inputField-withicon pl-3 gilroy-medium font-14" name="destination"
                                        placeholder="Destination"> <img src="/image/location-pink.png" />
                                    <div style="position: absolute;z-index:12;background-color:white;" class="w-100">
                                        <autocomplete-component :keyword="destination"
                                            @autocomplete_result_selected="selectDestination($event)">
                                        </autocomplete-component>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="position-relative icon-right"><input type="text"
                                        class="inputField inputField-withicon pl-3 gilroy-medium font-14" name="cost"
                                        placeholder="Amount to raise"> <img src="/image/dollar-pink.png" /></div>
                            </div>
                            <div>
                                <div class="inputField-box">
                                    <select name="fund_duration" class="inputField">
                                        <option value="" disabled selected>Select Fund Duration</option>
                                        <option value='1'>1 week</option>
                                        <option value='2'>2 weeks</option>
                                        <option value='3'>1 month</option>
                                        <option value='4'>2 months</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                {{-- <div class="position-relative icon-right"><input type="text"
                                        class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                        placeholder="Check In"> <img src="image/expiration.png" /></div> --}}
                            </div>
                            <div>
                                {{-- <div class="position-relative icon-right"><input type="text"
                                        class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                        placeholder="Check Out"> <img src="image/expiration.png" /></div> --}}
                            </div>
                            <div>
                                <div class="position-relative inputField-box">
                                    <textarea class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                        name="description" rows="5" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div>{{-- <label class="trippbo-checkbox gilroy-regular">I want to book my trip through Trippbo
                                    (Select this if you haven't booked your trip through other providers yet)<input
                                        type="checkbox" checked="checked" name="change"><span></span></label> --}}</div>
                            <div>
                                <div class="grid-3-custom">
                                    <div class="d-flex align-items-center"><span
                                            class="upload-text gilroy-medium pl-3">Upload Image</span><input name="trip_img"
                                            type="file" id="upload" onchange="showPreview(event);" hidden /></div>
                                    <div class="ml-1"><label class="btn-upload gilroy-medium" for="upload">Upload
                                            Image</label></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img id="create_trip_pic_review" src="/image/63171.png" />

                                </div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-end">
                                    <div class="mr-2"><button type="button" data-dismiss="modal"
                                            class="btn btn-outline-dark  gilroy-medium font-12 px-4  add-border-radius">Close</button>
                                    </div>
                                    <div><button type="submit"
                                            class="btn gilroy-medium btn-fe2f70 font-12 px-4 add-border-radius">Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>


    <div class="body-content">
        <div class="wrapper">
            <div class="breadcrumb_ my-3">
                <ol>
                    <li class="breadcrumb-item"><a>Fund my trip solo</a></li>
                    <li class="breadcrumb-item active">{{ $trip->title }}</li>
                </ol>
            </div>
            <div class="grid-2 mb-3">
                <div>
                    <div class="grid-2-card" style="height: 100%">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="flex-fill">
                                <h4 class="gilroy-semi text-white font-30 mb-0">{{ $trip->title }}</h4>
                                <div class="gilroy-medium text-white font-10 mb-3"><span class="opacity-0-5 mr-2">Remaining
                                        Time:</span> <span>@include("custom-components.remaining-time-solo" , ['date' =>
                                        $trip->enddate])</span></div>
                                <div class="d-flex mb-3">
                                    <div class="mr-3"><img class="border border-white icon-50px"
                                            src="{{ $trip->user->profile->picture_url ? asset('storage/' . $trip->user->profile->picture_url) : $default_profile_picture }}"
                                            alt="" /></div>
                                    <div class="flex-fill">
                                        <p class="gilroy-semi text-fe2f70 font-14 mb-0">{{ $trip->user->name }}</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="gilroy-regular text-white font-14 mb-0">{{ $trip->title }}</p>
                                            </div>
                                            {{-- <div class="d-flex">
                                                <img class="icon-20px mr-1" src="/image/group-15.png" alt="" />
                                                <span class="gilroy-regular text-white font-12 mb-0">Male</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <hr class="border-white" />


                                {{-- <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <p class="gilroy-medium text-white font-10 mb-0">From</p>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex mr-2"><img src="/image/expiration.png" class="icon-16px" /></div>
                                            <div><span class="gilroy-medium text-white font-12 mr-2">24/05/2021</span></div>
                                        </div>
                                    </div>
                                    <div><i class="fas fa-arrow-right text-white font-14"></i></div>
                                    <div>
                                        <p class="gilroy-medium text-white font-10 mb-0">To</p>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex mr-2"><img src="/image/expiration.png" class="icon-16px" /></div>
                                            <div><span class="gilroy-medium text-white font-12">24/05/2021</span></div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div>
                                <div class="grid-2-dropdown">

                                    @if (Auth::check() && $trip->user->id === Auth::id())
                                        <i class="fas fa-ellipsis-v text-white dropbtn"></i>
                                        <div>
                                            <div>
                                                <a role="button" data-toggle="modal" data-target="#edit_trip_modal"
                                                    class="gilroy-regular font-12" href="#"><i class="far fa-edit"></i>
                                                    Edit</a>
                                                <a class="gilroy-regular font-12" href="javascript:void(0);"><i
                                                        class="far fa-trash-alt"></i> Delete</a>
                                            </div>
                                        </div>
                                    @elseif(Auth::check())
                                        <i class="fas fa-ellipsis-v text-white dropbtn"></i>
                                        <div>
                                            <div>
                                                <a role="button" data-toggle="modal" data-target="#reportModal"
                                                    data-violating-object="soloTrip"
                                                    data-violating-object-id="{{ $trip->id }}"
                                                    class="gilroy-regular font-12" href="#"><i class="far fa-flag"></i>
                                                    Report</a>

                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-1"><img src="/image/mask-group-4.png" alt="" /></div>
            </div>
            <div class="border mb-3 add-border-radius">
                <div class="trippbo-bar px-3 add-border-radius">
                    <button class="gilroy-regular font-16 tablink trippbo-active"
                        onclick="openCity(event, 'overview')">Overview</button>
                </div>
                <div id="overview" class="trippbo-container city p-3">
                    <div class="grid-3">
                        <div>
                            <h4 class="gilroy-semi text-000941 font-22">{{ $trip->title }}</h4>
                            <p class="gilroy-regular font-14">{{ $trip->description }}</p>
                        </div>
                        <div>
                            <div class="grid-4">
                                <div>
                                    <div class="progress-card py-4 add-border-radius">
                                        <h4 class="gilroy-regular font-14 mb-5">Fund Collected</h4>
                                        {{-- <div class="d-flex align-items-center justify-content-between">
                                            <div><span class="gilroy-semi font-22">$
                                                    {{ $trip->totalAmountRaised() }}</span></div>
                                            <div><span class="gilroy-regular font-16">out of ${{ $trip->goal }}</span>
                                            </div>
                                        </div> --}}
                                        <div class="mt-3">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div><span class="gilroy-semi font-22">
                                                        {{ $trip->totalAmountRaised() }}€</span></div>

                                            </div>
                                            <div id="myProgress" class="mb-3 add-border-radius">
                                                <div class="add-border-radius"
                                                    style="width: {{ ($trip->totalAmountRaised() / $trip->goal) * 100 }}%;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row justify-content-around align-items-center mb-3">
                                            <div class="d-flex flex-column">
                                                <div class="text-center" style="font-weight:900">
                                                    {{ ceil(($trip->totalAmountRaised() / $trip->goal) * 100) }}%</div>
                                                <div class="text-center">Funded</div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="text-center" style="font-weight:900">{{ $trip->goal }}€
                                                </div>
                                                <div class="text-center">To Raise</div>
                                            </div>
                                            @include("custom-components.remaining-time-solo-only-time"
                                            , ['date' => $trip->enddate])
                                        </div>
                                        @if ($trip->ended == false)
                                            @if (Auth::check() && Auth::id() == $trip->user->id)
                                                <div><button type="button"
                                                        class="btn btn-block gilroy-medium btn-fe2f70 box-shadow-fe2f70  font-12 text-capitalize add-border-radius"
                                                        data-toggle="modal" data-target="#confirmEndFunding">End
                                                        trip</button>
                                                </div>
                                            @else
                                                <div><button type="button"
                                                        class="btn btn-block gilroy-medium btn-fe2f70 box-shadow-fe2f70 font-12 text-capitalize add-border-radius"
                                                        data-toggle="modal" data-target="#myModal">Fund this trip</button>
                                                </div>
                                            @endif
                                        @else
                                            <div><button type="button"
                                                    class="btn btn-block gilroy-medium btn-fe2f70 box-shadow-fe2f70  font-12 text-capitalize add-border-radius">Trip
                                                    has ended</button>
                                        @endif

                                    </div>
                                </div>
                                <div class="add-border-radius" style="overflow: hidden"> <iframe width="100%" height="100%"
                                        style="border:0" loading="lazy" allowfullscreen
                                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC-UXF45L_ttfT3aecmRQiP-_dHFMfEEpM
                                                                                                          &q=Space+Needle,Seattle+WA">
                                    </iframe></div>
                            </div>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content  p-3 add-border-radius">
                                <!-- Modal Header -->
                                <div class="modal-header border-0">
                                    <h4 class="modal-title gilroy-semi font-22">Fund This Trip</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body pt-0">
                                    <div class="d-flex bg-f9f9f9 p-3 mb-2 add-border-radius">
                                        <div class="mr-3"><img class="border border-white icon-50px"
                                                src="{{ $trip->user->profile->picture_url ? asset('storage/' . $trip->user->profile->picture_url) : $default_profile_picture }}"
                                                alt=""></div>
                                        <div class="flex-fill">
                                            <p class="gilroy-semi text-fe2f70 font-14 mb-0">{{ $trip->user->name }}</p>
                                            <p class="gilroy-regular font-14 mb-0">{{ $trip->title }}</p>
                                        </div>
                                    </div>
                                    <form id="solo_checkout_form">
                                        @csrf
                                        <input type="hidden" id="trip_order_id" name="trip_order_id" value="" />

                                        <div class="position-relative icon-right mb-2"><input value="10" type="text"
                                                class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                                placeholder="Amount" id="amount" required pattern="[0-9]+"><span
                                                class="gilroy-bold text-fe2f70 font-20">€</span></div>
                                        <p id="amount_validation" class="invisible">Amount Must Be A Positive Number
                                            Between 1 and 10,000.
                                        </p>
                                        @if (Auth::check() && $payment_methods->count() > 0)
                                            <p class="gilroy-medium font-12 mb-2">Select Payment Method</p>
                                            @foreach ($payment_methods as $payment_method)

                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="mr-3"><label class="custom-radio-btn"
                                                            for="paymentMethodRadio{{ $loop->index }}"><input
                                                                type="radio" value="{{ $payment_method->id }}"
                                                                name="paymentMethodRadio"
                                                                id="paymentMethodRadio{{ $loop->index }}"
                                                                onchange="
                                                                                                                                            updatePaymentMethod()"
                                                                {{ $loop->index == 0 ? 'checked' : '' }}><span
                                                                class="checkmark"></span></label></div>
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
                                            <div class="mr-3"><label class="custom-radio-btn"
                                                    for="new_payment_method"><input name="paymentMethodRadio"
                                                        id="new_payment_method" value="new_payment_method"
                                                        onchange="updatePaymentMethod()"
                                                        {{ Auth::check() == false || $payment_methods->count() == 0 ? 'checked' : '' }}
                                                        type="radio"><span class="checkmark"></span></label></div>
                                            <div class="flex-fill">
                                                <p class="gilroy-bold text-fe2f70 font-12 mb-0"
                                                    style="padding: 10px 10px 10px 0;">Add New Payment Method</p>
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

                                        {{-- @if (Auth::check())
                                            <div class="mb-5"><label class=" gilroy-regular"
                                                    style="font-size: 12px;"><input type="checkbox" name="future_payments"
                                                        id="customCheck1">Save
                                                    for future payments</label></div>
                                            <div>
                                        @endif --}}
                                        @guest


                                            <div class="mb-5"><label class="trippbo-checkbox gilroy-regular">I agree
                                                    <input type="checkbox" name="future_payments"
                                                        name="agreed_to_terms"><span></span></label></div>
                                            <div>
                                            @endguest
                                            <button id="card-button" type="button"
                                                class="btn btn-block gilroy-bold btn-fe2f70 font-14 d-flex justify-content-between"><span>€
                                                    10.30 <span
                                                        style='font-size:12px;font-weight:600;font-family: "Gilroy"'>(Including
                                                        transaction fees)</span></span> <span>Pay Now</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- splide -->
        {{-- <div class="splide">
                <div class="splide__arrows d-flex align-items-center justify-content-between mb-3 section-1">
                    <div><h4 class="gilroy-medium font-22 mb-0">Similar Trips</h4></div>
                    <div>
                        <div class="portfolio-1-navigation d-flex align-items-center justify-content-end">
                            <div><button class="splide__arrow splide__arrow--prev navigation-prev"><i class="fas fa-arrow-left" aria-hidden="true"></i></button></div>
                            <div><button class="splide__arrow splide__arrow--next navigation-next"><i class="fas fa-arrow-right" aria-hidden="true"></i></button></div>
                        </div>
                    </div>
                </div>
                <div class="splide__track">
                    <div class="splide__list portfolio-1 mb-3">
                        <div class="splide__slide">
                            <a href="javascript:void(0)">
                                <figure>
                                    <div>
                                        <div>
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                                <i class="fas fa-share-alt fa-stack-1x"></i>
                                            </span>
                                        </div>
                                        <img src="/image/mask-group.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div><h4 class="gilroy-semi font-20 mb-1">Dubai</h4></div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <span class="gilroy-semi text-fe2f70">Alina</span></p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                            <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                            <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                            <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <span class="gilroy-semi text-000941 font-18">View More</span>
                                                <img class="arrow" src="/image/arrow-right.png" alt="">
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="splide__slide">
                            <a href="javascript:void(0)">
                                <figure>
                                    <div>
                                        <div>
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                                <i class="fas fa-share-alt fa-stack-1x"></i>
                                            </span>
                                        </div>
                                        <img src="/image/mask-group.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div><h4 class="gilroy-semi font-20 mb-1">Dubai</h4></div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <span class="gilroy-semi text-fe2f70">Alina</span></p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                            <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                            <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                            <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <span class="gilroy-semi text-000941 font-18">View More</span>
                                                <img class="arrow" src="/image/arrow-right.png" alt="">
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="splide__slide">
                            <a href="javascript:void(0)">
                                <figure>
                                    <div>
                                        <div>
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                                <i class="fas fa-share-alt fa-stack-1x"></i>
                                            </span>
                                        </div>
                                        <img src="/image/mask-group.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div><h4 class="gilroy-semi font-20 mb-1">Dubai</h4></div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <span class="gilroy-semi text-fe2f70">Alina</span></p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                            <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                            <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                            <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <span class="gilroy-semi text-000941 font-18">View More</span>
                                                <img class="arrow" src="/image/arrow-right.png" alt="">
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="splide__slide">
                            <a href="javascript:void(0)">
                                <figure>
                                    <div>
                                        <div>
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                                <i class="fas fa-share-alt fa-stack-1x"></i>
                                            </span>
                                        </div>
                                        <img src="/image/mask-group.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div><h4 class="gilroy-semi font-20 mb-1">Dubai</h4></div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <span class="gilroy-semi text-fe2f70">Alina</span></p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                            <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                            <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                            <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <span class="gilroy-semi text-000941 font-18">View More</span>
                                                <img class="arrow" src="/image/arrow-right.png" alt="">
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="splide__slide">
                            <a href="javascript:void(0)">
                                <figure>
                                    <div>
                                        <div>
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                                <i class="fas fa-share-alt fa-stack-1x"></i>
                                            </span>
                                        </div>
                                        <img src="/image/mask-group.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div><h4 class="gilroy-semi font-20 mb-1">Norway</h4></div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <span class="gilroy-semi text-fe2f70">Alina</span></p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                            <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                            <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                            <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <span class="gilroy-semi text-000941 font-18">View More</span>
                                                <img class="arrow" src="/image/arrow-right.png" alt="">
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="splide__slide">
                            <a href="javascript:void(0)">
                                <figure>
                                    <div>
                                        <div>
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                                <i class="fas fa-share-alt fa-stack-1x"></i>
                                            </span>
                                        </div>
                                        <img src="/image/mask-group.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div><h4 class="gilroy-semi font-20 mb-1">Norway</h4></div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <span class="gilroy-semi text-fe2f70">Alina</span></p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                            <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                            <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                            <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <span class="gilroy-semi text-000941 font-18">View More</span>
                                                <img class="arrow" src="/image/arrow-right.png" alt="">
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="splide__slide">
                            <a href="javascript:void(0)">
                                <figure>
                                    <div>
                                        <div>
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                                <i class="fas fa-share-alt fa-stack-1x"></i>
                                            </span>
                                        </div>
                                        <img src="/image/mask-group.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div><h4 class="gilroy-semi font-20 mb-1">Norway</h4></div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <span class="gilroy-semi text-fe2f70">Alina</span></p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                            <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                            <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                            <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <span class="gilroy-semi text-000941 font-18">View More</span>
                                                <img class="arrow" src="/image/arrow-right.png" alt="">
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="splide__slide">
                            <a href="javascript:void(0)">
                                <figure>
                                    <div>
                                        <div>
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                                <i class="fas fa-share-alt fa-stack-1x"></i>
                                            </span>
                                        </div>
                                        <img src="/image/mask-group.png" alt="">
                                    </div>
                                    <figcaption>
                                        <div><h4 class="gilroy-semi font-20 mb-1">Norway</h4></div>
                                        <p class="font-16 mb-1"><span class="gilroy-medium text-1f222350">by</span> <span class="gilroy-semi text-fe2f70">Alina</span></p>
                                        <div class="d-flex align-items-center mb-3">
                                            <div><img src="/image/policy.png" class="icon-16px mr-1" /></div>
                                            <div><span class="gilroy-medium text-000941 font-14 mr-2">24/05/2021</span></div>
                                            <div><span class="gilroy-medium text-1f222350 font-14 mr-2">to</span></div>
                                            <div><span class="gilroy-medium text-000941 font-14">10/06/2021</span></div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div>
                                                <span class="gilroy-semi text-000941 font-18">View More</span>
                                                <img class="arrow" src="/image/arrow-right.png" alt="">
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>

    </div>





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

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let paymentIntentsecret = '';
        currentTripOrder = '';
        orderDone = false;
        future_payments_js = false;
        const stripe = Stripe('{{ config('services.stripe.key') }}');

        let elements_copy = null;


        (async function() {
            await prepareCheckout(10.3);
            const options = {
                clientSecret: paymentIntentsecret,
            };
            const elements = stripe.elements(options);
            elements_copy = elements;
            const paymentElement = elements.create("payment");
            paymentElement.mount("#paymentContainer");
        })();

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');



        async function prepareCheckout(amount_to_charge) {
            try {

                axios_response = await axios.post('{{ route('getPaymentIntentSecret') }}', {
                    amount: amount_to_charge,
                    trip_id: '{{ $trip->id }}',
                    paymentMethodRadio: $("input[name='paymentMethodRadio']:checked").val(),
                    future_payments: $("input[name='future_payments']:checked").prop('checked'),
                    @if (Auth::check() == false)
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
            let transaction_fee = amount * 3 / 100;

            if (isNaN(amount) == false && amount > 0) {
                cardButton.disabled = true;
                cardButton.textContent = "Processing..."




                if (orderDone == true) {

                    /*   $("#solo_checkout_form").submit(); */
                    return;
                }
                if (future_payments_js == true) {
                    future_usage = {
                        setup_future_usage: 'on_session'
                    }
                } else {
                    future_usage = {}
                }

                let order_id = currentTripOrder;

                const {
                    error
                } = await stripe.confirmPayment({
                    elements: elements_copy,
                    confirmParams: {
                        return_url: '{{ route('checkPaymentSuccess') }}' + '?trip_order_id=' +
                            order_id,
                    },
                });

                if (error) {
                    console.log(error);
                    cardButton.disabled = false;
                    cardButton.textContent = "Try Again"
                    $("#amount_validation").text(error.message);
                    $("#amount_validation").removeClass('invisible')
                    // Display "error.message" to the user...
                } else {

                    /*  $("#solo_checkout_form").submit(); */

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


        $("#amount").change(async function() {
            let new_amount = $("#amount").val()
            let transaction_fee = new_amount * 3 / 100;
            new_amount = parseFloat(new_amount) + parseFloat(transaction_fee);
            console.log(new_amount)
            let formatted_number = new Intl.NumberFormat('en-EU', {
                style: 'currency',
                currency: 'EUR'
            }).format(new_amount)

            $("#card-button").html(`<span> ${formatted_number} <span style='font-size:12px;font-weight:600;font-family: "Gilroy"'>(Including transaction fees)</span></span> <span class="to-right">Pay
                                        Now</span>`)

            await prepareCheckout(new_amount);
            const options = {
                clientSecret: paymentIntentsecret,
            };
            const elements = stripe.elements(options);
            elements_copy = elements;
            const paymentElement = elements.create("payment");
            paymentElement.mount("#paymentContainer");




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
        // Upload /image
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
            // read the /image file as a data URL.
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


    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("create_trip_pic_review");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
    <script>
        const fund_my_trip_solo = new Vue({
            el: "#fund_my_trip_solo_app",

            data: {

                destination: "",

            },
            methods: {
                selectDestination(result) {
                    $("#trip_destination").val(result.country_name + ', ' + result.city_name)
                },
            },


        });

        function endFunding() {
            axios.post('{{ route('solo-end-funding') }}', {
                trip_id: {{ $trip->id }}
            }).then(() => {
                $("#confirmEndFunding").modal('hide')
                location.reload();
            })
        }
    </script>

@endsection
