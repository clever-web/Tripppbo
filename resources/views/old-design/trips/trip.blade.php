@php
use Carbon\Carbon;
@endphp
@extends('layout')
@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">


    <link href="/css-r/home/fund-my-trip-overview.css" rel="stylesheet">
    <style>
        .was-validated input:invalid {
            border: 1px solid red;

        }

        .was-validated textarea:invalid {
            border: 1px solid red;

        }

        .disabled {
            pointer-events: none;
            transition: opacity 0.3s;
            -webkit-transition: opacity 0.3s;
            opacity: 0.5;
        }

        .invisible {
            display: none;
        }

        .body-content,
        .body-content * {
            border-radius: 15px !important;
        }

        .modal-body,
        .modal-body * {
            border-radius: 15px !important;
        }

        .trippbo-active {
            border-radius: 0px !important;
        }

        .dropdown-menu-custom:hover {
            color: white;
        }


        .dropdown-menu-custom {
            color: #23242C;
        }

        @media (max-width: 768px) {



            .grid-4-custom {
                display: grid;
                grid-template-columns: auto;
                row-gap: 10px;
            }

            .grid-4-custom>div:nth-of-type(2) {
                height: 400px;
                background-image: url(../../image/63044.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
        }

        @media (min-width: 769px) {


            .grid-4-custom {
                display: grid;
                grid-template-columns: 50% auto;
                column-gap: 50px;
            }

            .grid-4-custom>div:nth-of-type(2) {
                background-image: url(../../image/63044.png);
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }

        }

    </style>
@endsection
@section('content')
    @if (Auth::check() && $trip->host_id == Auth::id())
        {
        <!--  New Checkout Modal -->
        <div class="modal fade" id="myModal" method="POST">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content  p-3 add-border-radius">
                    <!-- Modal Header -->
                    <div class="modal-header border-0">
                        <h4 class="modal-title gilroy-semi font-22">Checkout</h4>
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
                            @if (Auth::check() && Auth::id() == $trip->host_id && $payment_methods->count() > 0)
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
                                    <p class="gilroy-bold text-fe2f70 font-12 mb-0" style="padding: 10px 10px 10px 0;">Add
                                        New
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
                                <div id="paymentContainer" class="mt-4 gilroy-medium font-14">

                                </div>
                            </div>

                            {{-- @if (Auth::check())
                                <div class="mb-5"><label class="trippbo-checkbox gilroy-regular"
                                        style="font-size: 12px;"><input type="checkbox" name="future_payments"
                                            id="customCheck1">Save
                                        for future payments</label></div>
                                <div>
                            @endif --}}
                            @guest


                                <div class="mb-5"><label class="trippbo-checkbox gilroy-regular">I agree
                                        <input type="checkbox" name="future_payments"
                                            name="agreed_to_terms"><span></span></label>
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
    @endif

    <div class="body-content" id="vue_app">
        <v-app>
            <template>
                <div class="text-center ma-2">

                    <v-snackbar v-model="snackbar">
                        <span class="white--text">@{{ snackbar_text }}</span>


                        <template v-slot:action="{ attrs }">
                            <v-btn color="pink" v-bind="attrs" @click="snackbar = false">
                                Close
                            </v-btn>
                        </template>
                    </v-snackbar>
                </div>
            </template>
        </v-app>
        <v-app>
            <template>
                <div class="text-center ma-2">

                    <v-snackbar v-model="snackbar2">
                        <span class="white--text">@{{ snackbar_text2 }}</span>


                        <template v-slot:action="{ attrs }">
                            <v-btn color="pink" v-bind="attrs" @click="snackbar2 = false">
                                Close
                            </v-btn>
                        </template>
                    </v-snackbar>
                </div>
            </template>
        </v-app>


        @if ($is_member == true)

            <form id="add_passenger_form" method="POST" class="needs-validation" novalidate action="/trips/addPassenger">
                <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                <!-- Modal -->
                <div class="modal fade" id="personal_information_modal" tabindex="-1" role="dialog"
                    aria-labelledby="personal_information_modal_title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="personal_information_modal_title">Add Passenger
                                    Information
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row px-2">








                                    <div class="mb-3 border-d2d2d2 bg-fafafa p-4">

                                        <div class="px-1">
                                            <div class="col-sm-12 col-md-12 pt-2 px-1">
                                                <div class="d-flex align-items-center">
                                                    <div class="mr-3"><label
                                                            class="d-flex align-items-center radio-container gilroy-semi font-20 m-0 ">Male<input
                                                                class="mx-2" type="radio" checked="checked"
                                                                name="Gender" value="1"><span class="checkmark">

                                                            </span></label>
                                                    </div>
                                                    <div><label
                                                            class="d-flex align-items-center radio-container gilroy-semi font-20 m-0">Female<input
                                                                class="mx-2" type="radio" value="2"
                                                                name="Gender"><span class="checkmark"></span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 py-3 px-1">
                                                    <input name="FirstName" type="text" class="form-control input-control"
                                                        placeholder="First name" required>
                                                </div>

                                                <div class="col-sm-12 col-md-6 py-3 px-1">
                                                    <input name="LastName" type="text" class="form-control input-control"
                                                        placeholder="Last name" required>
                                                </div>
                                            </div>





                                            <div class="col-12 m-0 px-1">
                                                Date Of Birth:
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 py-3 px-1">

                                                    <select required class="form-control input-control"
                                                        name="DateOfBirthYear">
                                                        <option disabled selected value="">
                                                            Year
                                                        </option>
                                                        @for ($x = 1900; $x < date('Y') + 1; $x++)
                                                            <option value="{{ $x }}">
                                                                {{ $x }}</option>

                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-3 py-3 px-1">

                                                    <select required class="form-control input-control"
                                                        name="DateOfBirthMonth">
                                                        <option value="" disabled selected>
                                                            Month
                                                        </option>
                                                        @for ($x = 1; $x <= 12; $x++)
                                                            <option value="{{ $x }}">
                                                                {{ $x }}</option>

                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-3 py-3 px-1">

                                                    <select required class="form-control input-control"
                                                        name="DateOfBirthDay">
                                                        <option value="" disabled selected>
                                                            Day
                                                        </option>
                                                        @for ($x = 1; $x <= 31; $x++)
                                                            <option value="{{ $x }}">
                                                                {{ $x }}</option>

                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 style="font-size:18px; " class="mt-2">Contact Details</h3>


                                        <div class="row px-2">


                                            <div class="col-sm-12 col-md-4 pt-2 px-1">
                                                <label for="Country">Country</label>
                                                <select id="country" required class="form-control input-control"
                                                    name="Country">

                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->code }}">
                                                            {{ $country->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12 col-md-4 pt-2 px-1">
                                                <label for="City">City</label>
                                                <input id="city" required type="text" name="City"
                                                    class="form-control input-control" />
                                            </div>
                                            <div class="col-sm-12 col-md-4 pt-2 px-1">
                                                <label for="PinCode">Post Code</label>
                                                <input id="pincode" required type="text" name="PinCode"
                                                    class="form-control input-control" />
                                            </div>
                                            <div class="col-sm-12 col-md-12 pt-2 px-1">
                                                <label for="AddressLine1">Address Line</label>
                                                <input id="addressline1" required type="text" name="AddressLine1"
                                                    class="form-control input-control" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                <label for="Email">Email</label>
                                                <input id="email" required type="email" name="Email"
                                                    class="form-control input-control" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                <label for="ContactNo">Contact Phone Number</label>
                                                <input id="contactno" required type="text" name="ContactNo"
                                                    class="form-control input-control" />
                                            </div>

                                        </div>

                                    </div>





                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn gilroy-medium  rounded-0 font-10 px-3"
                                    style="background-color:#000941; color:white;" data-dismiss="modal">Close</button>
                                <button type="button" class="btn gilroy-medium  rounded-0 font-10 px-3"
                                    style="background-color: rgb(254, 47, 112);color:white;" v-on:click="addPassenger">Add
                                    Information</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif

        <div class="wrapper">
            <div class="breadcrumb_ my-3">
                <ol>
                    <li class="breadcrumb-item"><a>Fund my trip</a></li>
                    <li class="breadcrumb-item active">{{ $trip->title }}</li>
                </ol>
            </div>
            <div class="grid-2 mb-3">
                <div class="mr-1">
                    <div class="grid-2-card">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="flex-fill mr-2">
                                <h4 class="gilroy-semi text-white font-30 mb-0">{{ $trip->title }}</h4>
                                <div class="gilroy-medium text-white font-10 mb-3"><span
                                        class="opacity-0-5 mr-2">Posted</span> <span>
                                        @include('custom-components.remaining-time', ['date' => $trip->created_at ])</span>
                                </div>
                                <div class="d-flex  mb-3 mr-2">
                                    <div class="mr-3"><img class="border border-white icon-50px"
                                            style="border-radius: 26px !important;"
                                            src="{{ $trip->user->profile->picture_url? asset('storage/' . $trip->user->profile->picture_url): $default_profile_picture }}"
                                            alt="" /></div>
                                    <div class="flex-fill">
                                        <p class="gilroy-semi text-fe2f70 font-14 mb-0">{{ $trip->user->name }}</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="gilroy-regular text-white font-14 mb-0">{{ $trip->title }}
                                                </p>
                                            </div>
                                            {{-- <div class="d-flex">
                                                <img class="icon-20px mr-1" src="/image/group-15.png" alt="" />
                                                <span class="gilroy-regular text-white font-12 mb-0">Male</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <hr class="border-white" />
                                <div class="d-flex align-items-end justify-content-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <p class="gilroy-medium text-white font-10 mb-0">Starts</p>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex mr-2"><img style="border-radius: 0px !important"
                                                    src="/image/expiration.png" class="icon-16px" /></div>
                                            <div><span
                                                    class="gilroy-medium text-white font-12 mr-2">{{ $trip->tripDate() }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <div class="grid-2-dropdown" style="border-radius: 0px !important">
                                    <i class="fas fa-ellipsis-v text-white dropbtn"></i>
                                    <div style="border-radius: 0px !important">

                                        @if (Auth::check() && Auth::id() === $trip->user_id && $trip->completed == false)
                                            <div style="border-radius: 0px !important">

                                                <a style="border-radius: 0px !important" class="gilroy-regular font-12"
                                                    href="javascript:void(0);"><i class="far fa-trash-alt"></i> Delete</a>
                                            </div>
                                        @endif
                                        @if (Auth::check() && Auth::id() !== $trip->user_id)
                                            <div style="border-radius: 0px !important" class="dropdown-menu-custom">
                                                <a style="border-radius: 0px !important" href="#" data-toggle="modal"
                                                    data-target="#reportModal" class="dropdown-menu-custom"
                                                    data-violating-object="trip"
                                                    data-violating-object-id="{{ $trip->id }}">
                                                    <span style="border-radius: 0px !important"> <i
                                                            class="far fa-flag"></i> Report
                                                    </span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div><img src="/image/mask-group-4.png" alt="" />
                    @if (Auth::id() !== $trip->user_id)
                        <button v-if="!guest" class="portfolio-badge gilroy-medium font-14" data-toggle="modal"
                            {{ $trip->isMemeber(Auth::id()) ? '' : 'data-target=#myModal-2' }}>{{ $trip->isMemeber(Auth::id()) ? 'Joined' : 'Request to join' }}</button>
                        <button v-if="guest" class="portfolio-badge gilroy-medium font-14"
                            v-on:click="showSignInRequiredModal">Request to Join</button>
                    @endif
                </div>
            </div>
            <div class="border mb-3">
                <div class="trippbo-bar px-3">
                    <button class="gilroy-regular font-16 tablink trippbo-active" onclick="openCity(event, 'overview')">
                        Overview
                    </button>
                    @if ($owner)
                        <button class="gilroy-regular font-16 tablink" onclick="openCity(event, 'join-request')">Join
                            Requests <span class="text-1f222350 ml-2">{{ $unanswered_requests->count() }}</span>
                        </button>
                    @endif
                    @if ($owner || $is_member)
                        <button class="gilroy-regular font-16 tablink" onclick="openCity(event, 'trip-members')">Trip
                            Members <span class="text-1f222350 ml-2">{{ $trip_members->count() }}</span></button>
                        <button class="gilroy-regular font-16 tablink" onclick="openCity(event, 'plan-trips')">Trip
                            Plan

                        </button>
                    @endif
                </div>
                <div id="overview" class="trippbo-container city p-3">
                    <div class="grid-3">
                        <div>
                            <h4 class="gilroy-semi font-22">{{ $trip->title }}</h4>
                            <p class="gilroy-regular font-16">{{ $trip->description }}</p>
                        </div>
                        <div><img src="/image/map.png" alt="" /></div>
                    </div>
                </div>
                @if ($owner)
                    <div id="join-request" class="trippbo-container city p-3" style="display:none">
                        <div class="grid-3">
                            @if ($unanswered_requests->count() == 0)
                                There's no join requests yet.
                            @endif
                            @foreach ($unanswered_requests as $r)
                                <div>
                                    <div class="join-request-card  h-100">
                                        <div class="join-request-grid mb-3">
                                            <div><img class="avatar"
                                                    src="{{ $r->user->profile->picture_url? asset('storage/' . $r->user->profile->picture_url): $default_profile_picture }}"
                                                    alt="" /></div>
                                            <div>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-end justify-content-between mb-2">
                                                    <div>
                                                        <h4 class="gilroy-semi font-26 mb-0">{{ $r->user->name }}
                                                        </h4>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium font-10 mb-0"><span
                                                                class="text-1f222350 mr-2">Recevied</span> <span>
                                                                @include('custom-components.remaining-time', ['date' =>
                                                                $r->created_at])</span></p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-end justify-content-between">
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            {{-- <div class="mr-3"> --}}
                                                            {{-- <p class="gilroy-medium font-10 opacity-0-5 mb-2">Cost of the trip</p> --}}
                                                            {{-- <div class="d-flex align-items-end"> --}}
                                                            {{-- <div class="mr-2"><img class="icon-16px" src="/image/63032.png" alt="" /></div> --}}
                                                            {{-- <div><span class="gilroy-semi text-000941 font-16 mb-0">1200$</span></div> --}}
                                                            {{-- </div> --}}
                                                            {{-- </div> --}}
                                                            <div>
                                                                <p class="gilroy-medium font-10 opacity-0-5 mb-2">
                                                                    Origin
                                                                    Country</p>
                                                                <div class="d-flex align-items-end">
                                                                    <div class="mr-2"><img
                                                                            class="icon-16px" src="/image/63029.png"
                                                                            alt="" />
                                                                    </div>
                                                                    <div><span
                                                                            class="gilroy-semi text-000941 font-16 mb-0">{{ $r->country }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button id="accept-{{ $r->id }}"
                                                            v-on:click="acceptJoinRequest({{ $r->id }})"
                                                            type="button"
                                                            class="btn gilroy-medium btn-56d18f rounded-0 font-10">
                                                            Accept
                                                        </button>
                                                        <button id="decline-{{ $r->id }}"
                                                            v-on:click="rejectJoinRequest({{ $r->id }})"
                                                            type="button"
                                                            class="btn gilroy-medium btn-ff0000 rounded-0 font-10">
                                                            Reject
                                                        </button>
                                                        <button id="accepted-{{ $r->id }}" type="button"
                                                            class="btn gilroy-medium btn-56d18f rounded-0 font-10 invisible">
                                                            Accepted
                                                        </button>
                                                        <button id="declined-{{ $r->id }}" type="button"
                                                            class="btn gilroy-medium btn-ff0000 rounded-0 font-10 invisible">
                                                            Rejected
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="gilroy-medium font-12 mb-2">Message</h4>
                                        <p class="gilroy-regular font-12 mb-3">{{ $r->message }}</p>
                                        <button onclick="start_chat({{ $r->user->id }})" type="button"
                                            class="btn gilroy-medium btn-fe2f70 box-shadow-fe2f70 font-14"><i
                                                class="far fa-comment-dots mr-2"></i> <span>Start Chat</span></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if ($owner || $is_member)
                    <div id="trip-members" class="trippbo-container city p-3" style="display:none">

                        <div class="grid-3">
                            @foreach ($trip_members as $member)
                                <div class="{{ 'request_card_' . $member->id }}">
                                    <div class="join-request-card h-100">
                                        <div class="join-request-grid mb-3">
                                            <div><img class="avatar"
                                                    src="{{ $member->user->profile->picture_url? asset('storage/' . $member->user->profile->picture_url): $default_profile_picture }}"
                                                    alt="" /></div>
                                            <div>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-end justify-content-between mb-2">
                                                    <div>
                                                        <h4 class="gilroy-semi font-26 mb-0">
                                                            {{ $member->user->name }}
                                                        </h4>
                                                    </div>
                                                    {{-- <div><p class="gilroy-medium font-10 mb-0"><span --}}
                                                    {{-- class="text-1f222350 mr-2">Accepted on</span> --}}
                                                    {{-- <span>2 Hours Ago</span></p></div> --}}
                                                </div>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-end justify-content-between">
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            {{-- <div class="mr-3"> --}}
                                                            {{-- <p class="gilroy-medium font-10 opacity-0-5 mb-2">Cost of --}}
                                                            {{-- the --}}
                                                            {{-- trip</p> --}}
                                                            {{-- <div class="d-flex align-items-end"> --}}
                                                            {{-- <div class="mr-2"><img class="icon-16px" --}}
                                                            {{-- src="/image/63032.png" alt=""/> --}}
                                                            {{-- </div> --}}
                                                            {{-- <div><span class="gilroy-semi text-000941 font-16 mb-0">1200$</span> --}}
                                                            {{-- </div> --}}
                                                            {{-- </div> --}}
                                                            {{-- </div> --}}
                                                            <div>
                                                                <p class="gilroy-medium font-10 opacity-0-5 mb-2">
                                                                    Origin
                                                                    Country</p>
                                                                <div class="d-flex align-items-end">
                                                                    <div class="mr-2"><img
                                                                            class="icon-16px" src="/image/63029.png"
                                                                            alt="" />
                                                                    </div>
                                                                    <div><span
                                                                            class="gilroy-semi text-000941 font-16 mb-0">{{ $member->country }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        @if (Auth::check() && Auth::id() !== $member->user_id)
                                                            <button type="button"
                                                                class="btn gilroy-medium btn-23242c rounded-0 font-10">
                                                                Accepted
                                                            </button>
                                                        @endif
                                                        @if (Auth::check() && Auth::id() === $trip->user_id && $member->user_id !== $trip->user_id && $trip->completed == false)
                                                            <button type="button"
                                                                v-on:click="deleteJoinRequest({{ $member->id }})"
                                                                class="btn gilroy-medium btn-ff000010 rounded-0 font-10"><i
                                                                    class="far fa-trash-alt"></i></button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="gilroy-medium font-12 mb-2">Message</h4>
                                        <p class="gilroy-regular font-12 mb-3">{{ $member->message }}</p>
                                        <button onclick="start_chat({{ $member->user->id }})" type="button"
                                            class="btn gilroy-medium btn-fe2f70 box-shadow-fe2f70 font-14"><i
                                                class="far fa-comment-dots mr-2"></i> <span>Start Chat</span></button>
                                    </div>

                                </div>
                            @endforeach
                        </div>



                    </div>

                    <div id="plan-trips" class="trippbo-container city p-3" style="display:none">
                        <div id="trip_plan_members" class="grid-3 mb-3" :class="{'disabled' : finalizing}">
                            @foreach ($trip_members as $member)

                                <div>
                                    <div class="join-request-card">
                                        <div class="join-request-grid">
                                            <div><img class="avatar"
                                                    src="{{ $member->user->profile->picture_url? asset('storage/' . $member->user->profile->picture_url): $default_profile_picture }}"
                                                    alt="" /></div>
                                            <div>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-end justify-content-between mb-2">
                                                    <div>
                                                        <h4 class="gilroy-semi font-26 mb-0">
                                                            {{ $member->user->name }}
                                                        </h4>
                                                    </div>
                                                    {{-- <div><p class="gilroy-medium font-10 mb-0"><span --}}
                                                    {{-- class="text-1f222350 mr-2">Accepted on</span> --}}
                                                    {{-- <span>2 Hours Ago</span></p></div> --}}
                                                </div>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-end justify-content-between">
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            {{-- <div class="mr-3"> --}}
                                                            {{-- <p class="gilroy-medium font-10 opacity-0-5 mb-2">Cost of --}}
                                                            {{-- the --}}
                                                            {{-- trip</p> --}}
                                                            {{-- <div class="d-flex align-items-end"> --}}
                                                            {{-- <div class="mr-2"><img class="icon-16px" --}}
                                                            {{-- src="/image/63032.png" alt=""/> --}}
                                                            {{-- </div> --}}
                                                            {{-- <div><span class="gilroy-semi text-000941 font-16 mb-0">1200$</span> --}}
                                                            {{-- </div> --}}
                                                            {{-- </div> --}}
                                                            {{-- </div> --}}
                                                            <div>
                                                                <p class="gilroy-medium font-10 opacity-0-5 mb-2">
                                                                    Origin
                                                                    Country</p>
                                                                <div class="d-flex align-items-end">
                                                                    <div class="mr-2"><img
                                                                            class="icon-16px" src="/image/63029.png"
                                                                            alt="" />
                                                                    </div>
                                                                    <div><span
                                                                            class="gilroy-semi text-000941 font-10 mb-0">{{ $member->country }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (Auth::check() && Auth::id() === $member->user_id)
                                                        <div>
                                                            <div>
                                                                @if ($trip->completed == false)
                                                                    @if ($member->passenger())
                                                                        <a href="" role="button" data-toggle="modal"
                                                                            data-target="#personal_information_modal"
                                                                            class="btn gilroy-medium  rounded-0 font-10 px-3 w-100"
                                                                            style="background-color: #fe2f70;color:white; ">
                                                                            Edit Information
                                                                        </a>
                                                                    @else
                                                                        <a href="" role="button" data-toggle="modal"
                                                                            data-target="#personal_information_modal"
                                                                            class="btn gilroy-medium  rounded-0 font-10 px-3 w-100"
                                                                            style="background-color: #fe2f70;color:white; ">
                                                                            <i class="fas fa-plus mr-1"></i> Add Passenger
                                                                            Information
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <div class="mt-1">
                                                                @if ($trip->completed == false)
                                                                    @if ($member->hotel())
                                                                        <a href="/hotels/search?cityId={{ $trip->destination_city_code }}&tripId={{ $trip->id }}"
                                                                            class="btn gilroy-medium btn-56d18f rounded-0 font-10 px-3">
                                                                            Hotel Added
                                                                        </a>
                                                                    @else
                                                                        <a href="/hotels/search?cityId={{ $trip->destination_city_code }}&tripId={{ $trip->id }}"
                                                                            class="btn gilroy-medium btn-56d18f rounded-0 font-10 px-3">
                                                                            <i class="fas fa-plus mr-1"></i> Add Hotel
                                                                        </a>
                                                                    @endif
                                                                    @if ($member->flight())
                                                                        <a href="/flights/search?tripId={{ $trip->id }}"
                                                                            class="btn gilroy-medium btn-56d18f rounded-0 font-10 px-3">
                                                                            Flight Added
                                                                        </a>
                                                                    @else
                                                                        <a href="/flights/search?tripId={{ $trip->id }}"
                                                                            class="btn gilroy-medium btn-56d18f rounded-0 font-10 px-3">
                                                                            <i class="fas fa-plus mr-1"></i> Add Flight
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @if ($member->flight())
                                            <div
                                                class="e-ticket-grid mt-4 {{ Auth::id() === $member->user_id ? 'member-own-flight' : '' }}">
                                                <div class="     d-flex justify-content-between mb-1">
                                                    <div class="flex-fill">
                                                        <h4
                                                            class="gilroy-semi text-fe2f70 font-16 d-flex align-items-center mb-0">
                                                            <span
                                                                class="mr-3">{{ $member->flight()->getOrigin()->CityName }}
                                                                ({{ $member->flight()->getOrigin()->Code }})</span>
                                                            <img class="icon-16px mr-3"
                                                                src="/image/Icon ionic-ios-airplane.png" alt="" />
                                                            <span>{{ $member->flight()->getDestination()->CityName }}
                                                                ({{ $member->flight()->getDestination()->Code }})</span>
                                                        </h4>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <h4
                                                            class="gilroy-medium text-000941 font-16 mb-0 text-uppercase mr-4">
                                                            {{ $member->flight()->getOperatorName() }}</h4>
                                                        @if (Auth::id() === $member->user_id)
                                                            <div class="grid-2-dropdown">

                                                                @if ($trip->completed == false)
                                                                    <i class="fas fa-ellipsis-v dropbtn"
                                                                        aria-hidden="true"></i>
                                                                    <div>
                                                                        <div>
                                                                            <a class="gilroy-regular font-12"
                                                                                href="/flights/search?tripId={{ $trip->id }}"><i
                                                                                    class="far fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                                Edit</a>
                                                                            <a class="gilroy-regular font-12"
                                                                                v-on:click="deleteFlight({{ $trip->id }})"><i
                                                                                    class="far fa-calendar-times"></i>
                                                                                Cancel
                                                                                Booking</a>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- <h4 class="gilroy-medium opacity-0-45 font-10 mb-4">Booking ID #5185454</h4> --}}
                                                <div class="grid-4 mb-4">
                                                    <div>
                                                        <div><span class="th">Passenger</span></div>
                                                        <div><span
                                                                class="td">{{ $member->passenger() ? $member->passenger()->FirstName . ' *****' : 'waiting for information' }}
                                                                {{-- <span
                                                                    class="qty">(2 Adults, 1
                                                                    Child)</span> --}}</span>
                                                        </div>
                                                    </div>
                                                    {{-- <div>
                                                        <div><span class="th">Class</span></div>
                                                        <div><span class="td">Economy</span></div>
                                                    </div> --}}
                                                    <div>
                                                        <div><span class="th">Flight No.</span></div>
                                                        <div><span
                                                                class="td">{{ $member->flight()->getFirstFlightInformation()[0] }}
                                                                {{ $member->flight()->getFirstFlightInformation()[1] }}</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div><span class="th">Time</span></div>
                                                        <div><span
                                                                class="td">{{ $member->flight()->trip_1_time }}
                                                                - {{ $member->flight()->trip_1_arrival_time }}</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div><span class="th">Flight Date</span></div>
                                                        <div><span
                                                                class="td">{{ $member->flight()->departure_date }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="flex-fill">
                                                        {{-- <button type="button"
                                                        class="btn gilroy-medium btn-fe2f70 box-shadow-fe2f70 rounded-0 font-14 px-3 text-capitalize">
                                                        Download E Ticket
                                                    </button> --}}
                                                    </div>
                                                    <div>
                                                        <h4 class="gilroy-bold text-000941 font-26 mb-0"></h4>
                                                    </div>
                                                </div>

                                                <hr />
                                                <div class="e-ticket-grid">
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <div class="flex-fill">
                                                            <h4
                                                                class="gilroy-semi text-fe2f70 font-16 d-flex align-items-center mb-0">
                                                                <span
                                                                    class="mr-3">{{ $member->flight()->getDestination()->CityName }}
                                                                    ({{ $member->flight()->getDestination()->Code }})</span>
                                                                <img class="icon-16px mr-3"
                                                                    src="/image/Icon ionic-ios-airplane.png" alt="" />
                                                                <span>{{ $member->flight()->getOrigin()->CityName }}
                                                                    ({{ $member->flight()->getOrigin()->Code }})</span>
                                                            </h4>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <h4
                                                                class="gilroy-medium text-000941 font-16 mb-0 text-uppercase mr-4">
                                                                {{ $member->flight()->getReturnOperatorName() }}</h4>



                                                            {{-- <div class="grid-2-dropdown">
                                                                <i class="fas fa-ellipsis-v dropbtn"
                                                                    aria-hidden="true"></i>
                                                                <div>
                                                                    <div>
                                                                        <a class="gilroy-regular font-12"
                                                                            href="javascript:void(0);"><i
                                                                                class="far fa-edit"
                                                                                aria-hidden="true"></i>
                                                                            Edit</a>
                                                                        <a class="gilroy-regular font-12"
                                                                            href="javascript:void(0);"><i
                                                                                class="far fa-calendar-times"></i> Cancel
                                                                            Booking</a>
                                                                    </div>
                                                                </div>
                                                            </div> --}}

                                                        </div>
                                                    </div>
                                                    {{-- <h4 class="gilroy-medium opacity-0-45 font-10 mb-4">Booking ID #5185454</h4> --}}
                                                    <div class="grid-4 mb-4">
                                                        <div>
                                                            <div><span class="th">Passenger</span></div>
                                                            <div><span
                                                                    class="td">{{ $member->passenger() ? $member->passenger()->FirstName . ' *****' : 'waiting for information' }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        {{-- <div>
                                                        <div><span class="th">Class</span></div>
                                                        <div><span class="td">Economy</span></div>
                                                    </div> --}}
                                                        <div>
                                                            <div><span class="th">Flight No.</span></div>
                                                            <div><span
                                                                    class="td">{{ $member->flight()->getFirstFlightReturnInformation()[0] }}
                                                                    {{ $member->flight()->getFirstFlightReturnInformation()[1] }}</span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div><span class="th">Time</span></div>
                                                            <div><span
                                                                    class="td">{{ $member->flight()->trip_2_time }}
                                                                    - {{ $member->flight()->trip_2_arrival_time }}</span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div><span class="th">Flight Date</span></div>
                                                            <div><span
                                                                    class="td">{{ $member->flight()->return_date }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="flex-fill">
                                                            {{-- <button type="button"
                                                        class="btn gilroy-medium btn-fe2f70 box-shadow-fe2f70 rounded-0 font-14 px-3 text-capitalize">
                                                        Download E Ticket
                                                    </button> --}}
                                                        </div>
                                                        <div id="flight_price_for_{{ $member->user_id }}">
                                                            @if (!$member->flight()->last_price)
                                                                <v-app>
                                                                    <v-progress-circular indeterminate color="pink">
                                                                    </v-progress-circular>
                                                                </v-app>
                                                            @endif
                                                            <h4 class="gilroy-bold text-000941 font-26 mb-0">
                                                                {{ $member->flight()->last_price }}
                                                                {{ $member->flight()->last_price_currency }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />

                                        @endif

                                        @if ($member->hotel())
                                            <div
                                                class="e-ticket-grid {{ Auth::id() === $member->user_id ? 'member-own-hotel' : '' }}">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <div class="flex-fill">
                                                        <h4 class="gilroy-semi text-fe2f70 font-16 mb-0">
                                                            {{ $member->hotel()->hotel_name }}
                                                        </h4>
                                                    </div>
                                                    @if (Auth::id() === $member->user_id)
                                                        <div>
                                                            <div class="grid-2-dropdown">

                                                                @if ($trip->completed == false)
                                                                    <i class="fas fa-ellipsis-v dropbtn"
                                                                        aria-hidden="true"></i>
                                                                    <div>
                                                                        <div>
                                                                            <a class="gilroy-regular font-12"
                                                                                href="/hotels/search?cityId={{ $trip->destination_city_code }}&tripId={{ $trip->id }}"><i
                                                                                    class="far fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                                Edit</a>
                                                                            <a class="gilroy-regular font-12"
                                                                                v-on:click="deleteHotel({{ $trip->id }})"><i
                                                                                    class="far fa-calendar-times"></i>
                                                                                Cancel
                                                                                Booking</a>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                {{-- <h4 class="gilroy-medium opacity-0-45 font-10 mb-4">Booking ID #5185454
                                                </h4> --}}
                                                <div class="grid-4 mb-4">
                                                    <div>
                                                        <div><span class="th">Passenger</span></div>
                                                        <div><span
                                                                class="td">{{ $member->passenger() ? $member->passenger()->FirstName . ' *****' : 'waiting for information' }}</span>
                                                        </div>
                                                    </div>
                                                    {{-- <div>
                                                        <div><span class="th">Room Type</span></div>
                                                        <div><span class="td">Standard</span></div>
                                                    </div> --}}
                                                    {{-- <div>
                                                        <div><span class="th">Room No.</span></div>
                                                        <div><span class="td">1245</span></div>
                                                    </div> --}}
                                                    <div>
                                                        <div><span class="th">Check in</span></div>
                                                        <div><span
                                                                class="td">{{ $member->hotel()->checkin_date }}</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div><span class="th">Check out</span></div>
                                                        <div><span
                                                                class="td">{{ $member->hotel()->checkout_date }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div class="flex-fill">
                                                        {{-- <button type="button"
                                                        class="btn gilroy-medium btn-fe2f70 box-shadow-fe2f70 rounded-0 font-14 px-3 text-capitalize">
                                                        Download E Ticket
                                                    </button> --}}
                                                    </div>
                                                    <div id="hotel_price_for_{{ $member->user_id }}">

                                                        @if (!$member->hotel()->last_price)
                                                            <v-app>
                                                                <v-progress-circular indeterminate color="pink">
                                                                </v-progress-circular>
                                                            </v-app>
                                                        @endif
                                                        <h4 class="gilroy-bold text-000941 font-26 mb-0">

                                                            {{ $member->hotel()->last_price }}
                                                            {{ $member->hotel()->last_price_currency }}
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            @endforeach

                        </div>
                        @php
                            if ($trip->tripOrder && $trip->tripOrder->last_finalized) {
                                $last_finalized = $member->trip->tripOrder->last_finalized;
                                $last_finalized_carbon = new Carbon($last_finalized);
                                $now = Carbon::now();
                                $difference = $now->diffInSeconds($last_finalized_carbon);
                                $seconds_left = 10 * 60 - $difference;
                            } else {
                                $seconds_left = -1;
                            }

                        @endphp
                        @if (Auth::check() && Auth::id() == $trip->host_id && $trip->completed == false)

                            <div class="d-flex justify-content-end" v-on:click="finalizeTrip">
                                <button v-if="!finalizing && seconds_left < 0" role="button"
                                    class="btn gilroy-medium  rounded-0 font-12 px-3 "
                                    style="background-color: rgb(254, 47, 112); color: white;"> Prepare Trip For
                                    Checkout

                                </button>
                                <v-app v-if="finalizing && seconds_left < 0">
                                    <v-progress-circular indeterminate color="pink">
                                    </v-progress-circular>
                                </v-app>

                            </div>


                            <div class="d-flex justify-content-end">
                                <button v-if="seconds_left > 0" role="button" data-toggle="modal" data-target="#myModal"
                                    class="btn gilroy-medium  rounded-0 font-12 px-3 "
                                    style="background-color: rgb(254, 47, 112); color: white;"> Checkout
                                    @{{ getTimeLeft() }}

                                </button>
                            </div>

                        @endif

                        {{-- <div class="grid-3 px-4 py-3">
                            <div>
                                <h4 class="gilroy-bold font-16 mb-3">Plan Activities</h4>
                                <div class="mb-5">
                                    <h4 class="gilroy-bold font-20 mb-3 days">Day 1</h4>
                                    <div class="timeline">
                                        <div>
                                            <div class="timeline-container">
                                                <div>
                                                    <p class="gilroy-regular font-14 mb-0">Start & End Time</p>
                                                    <p class="gilroy-regular font-12 mb-0">14:30 - 16:00</p>
                                                </div>
                                                <div></div>
                                                <div>
                                                    <div class="timeline-card">
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="flex-fill">
                                                                <h4 class="gilroy-semi font-14 mb-2">Lorem Ipousm</h4>
                                                                <p class="gilroy-regular font-10 mb-0">Lorem ipsum dolor
                                                                    sit
                                                                    amet, consetetur sadipscing elitr, sed diam nonumy
                                                                    eirmod</p>
                                                            </div>
                                                            <div><i class="fas fa-ellipsis-v dropbtn"
                                                                    aria-hidden="true"></i></div>
                                                        </div>
                                                        <div><img class="avatar" src="/image/images2.png" alt="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="timeline-container">
                                                <div>
                                                    <p class="gilroy-regular font-14 mb-0">Start & End Time</p>
                                                    <p class="gilroy-regular font-12 mb-0">14:30 - 16:00</p>
                                                </div>
                                                <div></div>
                                                <div>
                                                    <div class="timeline-card mb-4">
                                                        <div class="d-flex justify-content-between mb-0">
                                                            <div class="flex-fill">
                                                                <h4 class="gilroy-semi font-14 mb-2">Lorem Ipousm</h4>
                                                                <p class="gilroy-regular font-10 mb-0">Lorem ipsum dolor
                                                                    sit
                                                                    amet, consetetur sadipscing elitr, sed diam nonumy
                                                                    eirmod</p>
                                                            </div>
                                                            <div><i class="fas fa-ellipsis-v dropbtn"
                                                                    aria-hidden="true"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-btn-grid">
                                                        <div>
                                                            <button type="button"
                                                                class="btn btn-block gilroy-medium btn-56d18f box-shadow-56d18f rounded-0 font-16 text-capitalize">
                                                                add New Activity
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="btn btn-block gilroy-medium btn-000941 box-shadow-000941 rounded-0 font-16 text-capitalize">
                                                                add Day
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h4 class="gilroy-bold font-20 mb-3 days">Day 2</h4>
                                    <div class="timeline">
                                        <div>
                                            <div class="timeline-container">
                                                <div>
                                                    <p class="gilroy-regular font-14 mb-0">Start & End Time</p>
                                                    <p class="gilroy-regular font-12 mb-0">14:30 - 16:00</p>
                                                </div>
                                                <div></div>
                                                <div>
                                                    <div class="timeline-card mb-4">
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="flex-fill">
                                                                <h4 class="gilroy-semi font-14 mb-2">Lorem Ipousm</h4>
                                                                <p class="gilroy-regular font-10 mb-0">Lorem ipsum dolor
                                                                    sit
                                                                    amet, consetetur sadipscing elitr, sed diam nonumy
                                                                    eirmod</p>
                                                            </div>
                                                            <div><i class="fas fa-ellipsis-v dropbtn"
                                                                    aria-hidden="true"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-btn-grid">
                                                        <div>
                                                            <button type="button"
                                                                class="btn btn-block gilroy-medium btn-56d18f box-shadow-56d18f rounded-0 font-16 text-capitalize"
                                                                data-toggle="modal" data-target="#myModal">add New
                                                                Activity
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <button type="button"
                                                                class="btn btn-block gilroy-medium btn-000941 box-shadow-000941 rounded-0 font-16 text-capitalize">
                                                                add Day
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content rounded-0 p-3">
                                            <!-- Modal Header -->
                                            <div class="modal-header border-0">
                                                <h4 class="modal-title gilroy-semi font-22">Add New Activity</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body pt-0">
                                                <div class="grid-5">
                                                    <div>
                                                        <div class="position-relative icon-right"><input type="text"
                                                                class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                                                placeholder="Select Time From" />
                                                            <img src="/image/64386.png" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="position-relative icon-right"><input type="text"
                                                                class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                                                placeholder="Select Time To" />
                                                            <img src="/image/64386.png" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="position-relative icon-right"><input type="text"
                                                                class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                                                placeholder="Enter Title" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="position-relative inputField-box">
                                                            <textarea
                                                                class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                                                name="" id="" rows="5"
                                                                placeholder="Add Description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="grid-6">
                                                            <div class="d-flex align-items-center border-0"><input
                                                                    type="text"
                                                                    class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                                                    placeholder="Enter Title" /></div>
                                                            <div><label class="btn-upload gilroy-medium"><i
                                                                        class="fas fa-link"></i></label></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="grid-6">
                                                            <div class="d-flex align-items-center"><span
                                                                    class="upload-text gilroy-medium pl-3">Upload
                                                                    Image</span><input type="file" id="upload" hidden />
                                                            </div>
                                                            <div><label class="btn-upload gilroy-medium"
                                                                    for="upload">Upload
                                                                    Image</label></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-block gilroy-medium btn-fe2f70 box-shadow-fe2f70 font-14">
                                                            Add
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
            </div>
            @endif
        </div>

    </div>

    <form id="request_to_join_form">
        <input id="trip_id" type="hidden" name="trip_id" value="{{ $trip->id }}">
        <div class="modal fade" id="myModal-2">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-0 p-3">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="grid-4-custom" style="gap: 4px;">
                            <div>
                                <h4 class="gilroy-semi font-22 mb-3">Send Trip Request</h4>
                                <div class="mb-2" style="position: relative;">
                                    <input id="originCountryVue" v-on:input="originCountry = $event.target.value" required
                                        type="text" class="inputField  pl-3 gilroy-medium font-14" name="country"
                                        placeholder="Origin Country" />
                                    <div style="position: absolute; background-color:white;z-index:10;"
                                        class="w-100">
                                        <autocomplete-component :keyword="originCountry"
                                            @autocomplete_result_selected="selectOriginCountry($event)">
                                        </autocomplete-component>
                                    </div>
                                </div>
                                <div>
                                    {{-- <div class="position-relative icon-right"><input type="text"
                                            class="inputField inputField-withicon pl-3 gilroy-medium font-14"
                                            placeholder="Cost of Trip">
                                        <img src="/image/dollar-pink.png" />
                                    </div> --}}
                                </div>
                                <div class="mb-2">
                                    <div class="position-relative inputField-box">
                                        <textarea name="message" required
                                            class="inputField inputField-withicon pl-3 gilroy-medium font-14" id=""
                                            rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                {{-- <div class="mb-2">
                                    <label class="trippbo-checkbox gilroy-regular">I want the Trip creator to fund my Flight
                                        expenses.<input type="checkbox" checked="checked"
                                            name="change"><span></span></label>
                                </div>
                                <div>
                                    <label class="trippbo-checkbox gilroy-regular">I want the Trip creator to fund my Hotel
                                        expenses.<input type="checkbox" checked="checked"
                                            name="change"><span></span></label>
                                </div> --}}
                            </div>
                            <div class="d-flex align-items-end justify-content-end p-2">
                                <div class="mr-2">
                                    <button type="button" data-dismiss="modal"
                                        class="btn btn-outline-light rounded-0 gilroy-medium font-12 px-4">Close
                                    </button>
                                </div>
                                <div>
                                    <button v-on:click="send_join_request" type="button"
                                        class="btn gilroy-medium btn-white font-12 px-4">Send
                                        Request
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection
@section('scripts')
    <script src="/js/home/custom.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $('#myTab a').on('click', function(event) {
            event.preventDefault()
            $(this).tab('show')
        });
        const vue_app_fund_my_trip = new Vue({
            el: "#vue_app",
            vuetify: new Vuetify(),
            data: {
                originCountry: '',
                guest: {{ Auth::check() ? 'false' : 'true' }},
                snackbar: false,
                snackbar_text: 'Your Request Has Been Sent!',
                snackbar2: false,
                snackbar_text2: 'At least one member should have a hotel or flight booking and their personal information entered.',
                finalizing: false,
                canFinalize: false,
                @if ($is_member)
                    seconds_left: {{ $seconds_left }},
                @else
                    seconds_left: -1,
                @endif

            },
            mounted: function() {
                setInterval(() => {
                    if (this.seconds_left > -1) {
                        this.seconds_left -= 1;
                        this.getTimeLeft();
                    }

                }, 1000);
            },
            methods: {
                selectOriginCountry(result) {
                    $("#originCountryVue").val(result.country_name + ', ' + result.city_name)
                },
                updateHotelPrice: function(user_id, hotel_price, hotel_price_currency) {
                    $("#hotel_price_for_" + user_id).html(
                        `  <h4 class="gilroy-bold text-000941 font-26 mb-0">${hotel_price} ${hotel_price_currency}</h4>`
                    )

                },
                updateFlightPrice: function(user_id, flight_price, flight_price_currency) {
                    $("#flight_price_for_" + user_id).html(
                        `  <h4 class="gilroy-bold text-000941 font-26 mb-0">${flight_price} ${flight_price_currency}</h4>`
                    )
                },
                finalizingDone: function() {
                    this.seconds_left = 600;
                    this.finalizing = false;
                },

                showSignInRequiredModal() {
                    $("#sign-in-required-popup").modal('show')
                },
                async send_join_request() {

                    $("#request_to_join_form").addClass('was-validated')
                    if ($("#request_to_join_form")[0].checkValidity() === false) {
                        return;
                    }
                    let data = new FormData(document.getElementById('request_to_join_form'))

                    try {
                        $('#myModal-2').modal('hide');

                        let response = await axios.post('/trips/ask-to-join', data)

                        this.snackbar = true;
                    } catch (e) {

                    }



                },
                rejectJoinRequest: async function(request_id) {
                    data = new FormData();
                    data.append('join_request_id', request_id);
                    try {

                        let response = await axios.post('/rejectJoinRequest', data);
                        $('#accept-' + request_id).addClass('invisible');
                        $('#decline-' + request_id).addClass('invisible');
                        $('#declined-' + request_id).removeClass('invisible');


                    } catch (e) {

                    }

                },
                acceptJoinRequest: async function(request_id) {
                    data = new FormData();
                    data.append('join_request_id', request_id);
                    try {

                        let response = await axios.post('/acceptJoinRequest', data);
                        $('#accept-' + request_id).addClass('invisible');
                        $('#decline-' + request_id).addClass('invisible');
                        $('#accepted-' + request_id).removeClass('invisible');


                    } catch (e) {

                    }
                },

                deleteJoinRequest: async function(request_id) {
                    data = new FormData();
                    data.append('join_request_id', request_id);
                    try {

                        let response = await axios.post('/deleteJoinRequest', data);
                        $(".request_card_" + request_id).addClass("invisible");


                    } catch (e) {

                    }
                },
                deleteHotel: async function(trip_id) {
                    data = new FormData();
                    data.append('trip_id', trip_id);
                    try {

                        let response = await axios.post('/deleteHotel', data);
                        $(".member-own-hotel").addClass("invisible");



                    } catch (e) {

                    }

                },

                deleteFlight: async function(trip_id) {

                    data = new FormData();
                    data.append('trip_id', trip_id);
                    try {

                        let response = await axios.post('/deleteFlight', data);
                        $(".member-own-flight").addClass("invisible");



                    } catch (e) {

                    }

                },
                addPassenger: async function() {

                    let error = false;
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {

                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                            error = true;
                        }
                        form.classList.add('was-validated');

                    });
                    if (error) {
                        return;
                    }

                    let form = document.getElementById('add_passenger_form');

                    let data = new FormData(form);

                    try {
                        let response = await axios.post('/trips/addPassenger', data);
                        $("#personal_information_modal").modal('hide');
                    } catch (ex) {
                        alert(ex);
                    }

                },
                finalizeTrip: async function() {

                    this.finalizing = true;
                    let data = new FormData();
                    data.append('trip_id', '{{ $trip->id }}')
                    try {
                        let response = await axios.post('/trips/finalize', data);
                    } catch (ex) {
                        this.snackbar_text2 =
                            'At least one member should have a hotel or flight booking and their personal information entered.';
                        this.snackbar2 = true;
                        this.finalizing = false;
                    }


                },
                getTimeLeft: function() {
                    let minutes_left = Math.floor(this.seconds_left / 60);
                    let seconds_left = this.seconds_left - minutes_left * 60;
                    let seconds_left_string = seconds_left.toString();
                    if (seconds_left_string.length < 2) {
                        seconds_left_string = "0" + seconds_left_string
                    }
                    return `${minutes_left}:${seconds_left_string}`;
                }
            }
        })
    </script>
    <script>
        let paymentIntentsecret = '';
        currentTripOrder = '';
        orderDone = false;
        let elements_copy = null;
        future_payments_js = false;
        new_amount = '{{ $trip->tripOrder ? $trip->tripOrder->getTotalPriceInUSD() : 0 }}'
        $("#card-button").html(`<span>$ ${new_amount}.00</span> <span class="to-right">Pay
                                Now</span>`)
        const stripe = Stripe('{{ config('services.stripe.key') }}');



        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');


        $("#myModal").on('show.bs.modal', async () => {
            await prepareCheckout();
        });



        async function prepareCheckout() {
            try {

                axios_response = await axios.post('/prepareCheckout/FundMyTrip', {

                    trip_id: '{{ $trip->id }}',
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
                window.location.href = "/verification/fund_my_trip/" + currentTripOrder;
            } else if (axios_response.data.status == "done") {
                orderDone = true;
                $("#trip_order_id").val(currentTripOrder);
            }
            const options = {
                clientSecret: paymentIntentsecret,
            };

            const elements = stripe.elements(options);
            elements_copy = elements;
            const paymentElement = elements.create("payment");
            paymentElement.mount("#paymentContainer");

        }

        if (cardButton !== null) {


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




                cardButton.disabled = true;
                cardButton.textContent = "Processing..."


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
                        return_url: '{{ route('checkPaymentSuccess-fund-my-trip') }}' +
                            '?trip_order_id=' +
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

                    /*        $("#solo_checkout_form").submit(); */

                    // The card has been verified successfully...

                    /*    $("#payment_id").val(paymentMethod.id);
                                    var am = $("#amount").val();
                                    $("#payment_amount").val(am);


                                    document.getElementById("payment_form").submit();
                     */
                }



            });
        }





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

        @if (Auth::check() && Auth::id() == $trip->host_id && $payment_methods->count() > 0)

            updatePaymentMethod();
        @endif
    </script>


@endsection
