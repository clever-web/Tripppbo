@php
use Carbon\Carbon;
@endphp
@extends('layout')
@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet" />

    <script src="https://js.stripe.com/v3"></script>
    <style>
        .hide {}

        .invisible {
            display: none !important;
        }

        .body-content,
        .body-content * {
            border-radius: 15px !important;
        }

        .input-control {
            border-radius: 15px !important;
        }

        .section-2 .nav-tabs .nav-link.active {
            border-radius: 0px !important;
        }



        .baggage_option {
            cursor: pointer;
            font-size: 12px;
        }

        .baggage_option:hover {
            cursor: pointer;
            font-size: 12px;
            border: #FE2F70 solid 2px;
        }

        .selected {
            border: #FE2F70 solid 2px;
            border-radius: 15px;
            font-size: 12px;
        }

        .price {
            background: #FE2F70;
            font-size: 12px;
            color: white;
        }


        .fade-enter-active,
        .fade-leave-active {
            transition: opacity .2s;

        }

        .fade-enter,
        .fade-leave-to

        /* .fade-leave-active below version 2.1.8 */
            {
            opacity: 0;
        }

    </style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
@section('content')
    <div class="body-content px-1">
        <section class="mb-5 pb-5">
            <div class="wrapper">
                <div class="breadcrumb_">
                    <ol class="">
                        <li class="breadcrumb-item">
                            <a>Checkout</a>
                        </li>
                        <li class="breadcrumb-item active">Review and check out</li>
                    </ol>
                    <div class="row pt-3">
                        <div class="col-12  d-flex flex-row">

                            <h4 class="gilroy-medium pl-3 font-weight-bold">Secure booking — only takes 2 minutes!
                            </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ">
                            <div class="row">
                                {{-- <div class="col-12 toast-full">
                                    <div class="toast toast-full d-flex flex-row" data-autohide="false">
                                        <div class="warinng pl-1">
                                            <i class="fa fa-warning font-20 text-white"></i>
                                        </div>
                                        <div class="wv-100">
                                            <div class="d-flex justify-content-between">
                                                <div class="text-white font-12">COVID-19 alert: Travel requirements are
                                                    changing rapidly, including need for pre-travel COVID-19 testing and
                                                    quarantine on arrival.</div>
                                                <div><button type="button" class="close"
                                                        data-dismiss="toast">Dismiss</button></div>
                                            </div>
                                            <div class="toast-body px-0 pb-0">
                                                <a class="font-12 text-white gilroy-medium">Check restrictions for your
                                                    trip</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-12 pt-2">
                                    <div class="font-12 pink ">
                                        <img src="image/red-double-check.png" width="17" />
                                        Free cancellation before <a class="font-weight-bold pink"><u>Wed, Oct 13</u></a>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row px-2 pt-2">
                                <div class="col-sm-12 col-md-7 pb-2 px-3 pr-5">

                                    @if ($hotelbeds_hotel)
                                        <div class="row">
                                            <div class="section-2 w-100 px-3">
                                                <div class="row pt-3">
                                                    <div class="col-12">
                                                        <h4 class="font-weight-bold gilroy-medium">Hotel Travelers
                                                            Information</h4>
                                                        <div class="font-13">Traveler names must match
                                                            government-issued
                                                            photo ID exactly.
                                                        </div>
                                                    </div>
                                                </div>
                                                <form method="POST" class="passengerForm needs-validation" novalidate
                                                    action="/hotel/addPassengers_2">
                                                    <div class="row px-2">

                                                        <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                            <input name="FirstName" type="text"
                                                                class="form-control input-control" placeholder="First name"
                                                                required>
                                                        </div>

                                                        <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                            <input name="LastName" type="text"
                                                                class="form-control input-control" placeholder="Last name"
                                                                required>
                                                        </div>

                                                    </div>
                                                    <div class="row mt-3 p-3">

                                                        <div class="row p-2">


                                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                                <label for="Email">Email</label>
                                                                <input id="contact_information_email" required type="email"
                                                                    name="Email" class="form-control input-control" />
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                                <label for="ContactNo">Contact Phone Number</label>
                                                                <input id="contact_information_phone_number" required
                                                                    type="text" name="ContactNo"
                                                                    class="form-control input-control" />
                                                            </div>
                                                            <div class="col-12">
                                                                <button id="confirm_passengers_details"
                                                                    onclick="confirmHotelPassengersDetails_2()"
                                                                    class="btn btn-back w-100 px-4 py-2 mt-3">
                                                                    Confirm Passengers Details
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>


                                            </div>
                                        </div>






                                        {{-- <div class="row pb-1">
                                                    <div class="col-12 pt-4">
                                                        <div class="gilroy-medium font-18">Free Cancelation</div>
                                                        <div class="font-13">Your tour operator can pick you up from your arrival location or hotel</div>
                                                    </div>
                                                    <div class="col-12 pt-3 gilroy-medium">
                                                        <div class="font-13">pick up from</div>
                                                        <div class="pt-2">
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="rd_1" name="rd" class="custom-control-input" checked>
                                                                <label class="custom-control-label red" for="rd_1">Arrival pickup location</label>
                                                              </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="rd_2" name="rd" class="custom-control-input">
                                                                <label class="custom-control-label red" for="rd_2">Hotel</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="rd_2" name="rd" class="custom-control-input">
                                                                <label class="custom-control-label red" for="rd_2">Don't need pickup for this activity</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 pt-3 gilroy-medium">
                                                        <div class="font-13">You are arriving by*</div>
                                                        <div class="pt-2">
                                                            <select class="form-control input-control">
                                                                <option selected disabled>Select Mode</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                    @endif




                                    @if ($pendingHotel !== null && $pendingFlight == null)
                                        <div class="row">
                                            <div class="section-2 w-100 px-3">
                                                <div class="row pt-3">
                                                    <div class="col-12">
                                                        <h4 class="font-weight-bold gilroy-medium">Hotel Travelers
                                                            Information</h4>
                                                        <div class="font-13">Traveler names must match
                                                            government-issued
                                                            photo ID exactly.
                                                        </div>
                                                    </div>
                                                </div>


                                                @php
                                                    $first_loop_index = 0;
                                                    $second_loop_index = 0;
                                                    $third_loop_index = 0;
                                                @endphp
                                                @foreach ($hotel_passengers as $room_index => $room_passengers)
                                                    <h4> Room {{ $room_index + 1 }} </h4>
                                                    @foreach ($room_passengers as $passenger_type => $passenger_count)
                                                        @if ($passenger_type == 'ChildAge')
                                                        @break
                                                    @endif
                                                    @for ($y = 0; $y < $passenger_count; $y++)
                                                        <form method="POST" class="passengerForm needs-validation"
                                                            novalidate action="/hotel/addPassengers">
                                                            <div class="row px-2">
                                                                <div class="col-12 px-1">
                                                                    <div> <span
                                                                            style="font-weight: 900;font-size:18px;">{{ $passenger_type == 'NoOfAdults' ? 'Adult' : 'Child' }}
                                                                            {{ $y + 1 }} {{-- of
                                                                            {{ $passenger_count }} --}}
                                                                        </span></div>

                                                                </div>
                                                                <hr>
                                                                <div class="col-sm-12 col-md-12 pt-2 px-1">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="mr-3"><label
                                                                                class="d-flex align-items-center radio-container gilroy-semi font-20 m-0 ">Male<input
                                                                                    class="mx-2" type="radio"
                                                                                    checked="checked" name="Gender"
                                                                                    value="1"><span
                                                                                    class="checkmark">

                                                                                </span></label>
                                                                        </div>
                                                                        <div><label
                                                                                class="d-flex align-items-center radio-container gilroy-semi font-20 m-0">Female<input
                                                                                    class="mx-2" type="radio"
                                                                                    value="2" name="Gender"><span
                                                                                    class="checkmark"></span></label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                                    <input name="FirstName" type="text"
                                                                        class="form-control input-control"
                                                                        placeholder="First name" required>
                                                                </div>

                                                                <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                                    <input name="LastName" type="text"
                                                                        class="form-control input-control"
                                                                        placeholder="Last name" required>
                                                                </div>

                                                                <input name="IsLeadPax" type="hidden"
                                                                    value="{{ $first_loop_index == 0 && ($second_loop_index == 0) & ($third_loop_index == 0) ? 'true' : 'false' }}">
                                                                <input name="RoomId" type="hidden"
                                                                    value="{{ $room_index }}">




                                                                <div class="col-12 m-0 px-1">
                                                                    Date Of Birth:
                                                                </div>

                                                                <div class="col-sm-12 col-md-6 pt-0 px-1">

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
                                                                <div class="col-sm-12 col-md-3 pt-0 px-1">

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
                                                                <div class="col-sm-12 col-md-3 pt-0 px-1">

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




                                                                <input type="hidden" name="PaxType"
                                                                    value="{{ $passenger_type == 'NoOfAdults' ? 1 : 2 }}">

                                                            </div>
                                                            <hr>
                                                        </form>
                                                        @php
                                                            $third_loop_index += 1;
                                                        @endphp
                                                    @endfor
                                                    @php
                                                        $second_loop_index += 1;
                                                    @endphp
                                                @endforeach
                                                @php
                                                    $first_loop_index += 1;
                                                @endphp
                                            @endforeach
                                        </div>
                                    </div>



                                    <form class="passengerForm">
                                        <div class="row mt-3 p-3">
                                            <div class="section-2 w-100 px-3">
                                                <div class="row p-2">
                                                    <div class="col-12 px-1">
                                                        <div> <span style="font-weight: 900;font-size:18px;">
                                                                Contact Information

                                                            </span></div>

                                                    </div>
                                                    <div class="col-sm-12 col-md-4 pt-2 px-1">
                                                        <label for="Country">Country</label>
                                                        <select id="contact_information_country" required
                                                            class="form-control input-control" name="Country">

                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->code }}">
                                                                    {{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 pt-2 px-1">
                                                        <label for="City">City</label>
                                                        <input id="contact_information_city" required type="text"
                                                            name="City" class="form-control input-control" />
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 pt-2 px-1">
                                                        <label for="PinCode">Post Code</label>
                                                        <input id="contact_information_postcode" required type="text"
                                                            name="PinCode" class="form-control input-control" />
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 pt-2 px-1">
                                                        <label for="AddressLine1">Address Line</label>
                                                        <input id="contact_information_address" required type="text"
                                                            name="AddressLine1" class="form-control input-control" />
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                        <label for="Email">Email</label>
                                                        <input id="contact_information_email" required type="email"
                                                            name="Email" class="form-control input-control" />
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                        <label for="ContactNo">Contact Phone Number</label>
                                                        <input id="contact_information_phone_number" required
                                                            type="text" name="ContactNo"
                                                            class="form-control input-control" />
                                                    </div>
                                                    <div class="col-12">
                                                        <button id="confirm_passengers_details"
                                                            onclick="confirmHotelPassengersDetails()"
                                                            class="btn btn-back w-100 px-4 py-2 mt-3">
                                                            Confirm Passengers Details
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>



                                    {{-- <div class="row pb-1">
                                        <div class="col-12 pt-4">
                                            <div class="gilroy-medium font-18">Free Cancelation</div>
                                            <div class="font-13">Your tour operator can pick you up from your arrival location or hotel</div>
                                        </div>
                                        <div class="col-12 pt-3 gilroy-medium">
                                            <div class="font-13">pick up from</div>
                                            <div class="pt-2">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="rd_1" name="rd" class="custom-control-input" checked>
                                                    <label class="custom-control-label red" for="rd_1">Arrival pickup location</label>
                                                  </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="rd_2" name="rd" class="custom-control-input">
                                                    <label class="custom-control-label red" for="rd_2">Hotel</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="rd_2" name="rd" class="custom-control-input">
                                                    <label class="custom-control-label red" for="rd_2">Don't need pickup for this activity</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-3 gilroy-medium">
                                            <div class="font-13">You are arriving by*</div>
                                            <div class="pt-2">
                                                <select class="form-control input-control">
                                                    <option selected disabled>Select Mode</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                @endif




                                @if ($pendingActivity !== null)
                                    <div class="row">
                                        <div class="section-2 w-100 px-3">
                                            <div class="row pt-3">
                                                <div class="col-12">
                                                    <h4 class="font-weight-bold gilroy-medium">Activity Travelers
                                                        Information</h4>
                                                    <div class="font-13">Traveler names must match
                                                        government-issued
                                                        photo ID exactly.
                                                    </div>
                                                </div>
                                            </div>


                                            @php
                                                $activity_passener_types = [$pendingActivity['adult_count'], $pendingActivity['child_count'], $pendingActivity['infant_count']];
                                            @endphp
                                            @foreach ($activity_passener_types as $pax_type => $passenger_type)
                                                @for ($type_index = 0; $type_index < $passenger_type; $type_index++)
                                                    <form method="POST" class="passengerForm needs-validation"
                                                        novalidate action="/activities/addPassengers">
                                                        <div class="row px-2">
                                                            <div class="col-12 px-1">
                                                                <div> <span
                                                                        style="font-weight: 900;font-size:18px;">{{ $pax_type == 0 ? 'Adult' : ($pax_type == 1 ? 'Child' : 'Infant') }}
                                                                        {{ $type_index + 1 }}</span></div>

                                                            </div>
                                                            <hr>
                                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                                <input name="FirstName" type="text"
                                                                    class="form-control input-control"
                                                                    placeholder="First name" required>
                                                            </div>
                                                            {{-- <div class="col-sm-12 col-md-4 pt-4 px-1">
                                        <input type="text" class="form-control input-control" placeholder="Middle name">
                                    </div> --}}
                                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                                <input name="LastName" type="text"
                                                                    class="form-control input-control"
                                                                    placeholder="Last name" required>
                                                            </div>

                                                            <input name="IsLeadPax" type="hidden"
                                                                value="{{ $loop->index == 0 ? 'true' : 'false' }}">

                                                            {{-- <div class="col-sm-12 col-md-6 pt-4 px-1">
                                                        <label for="Gender">Gender:</label>
                                                        <select class="form-control input-control" name="Gender">
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>

                                                        </select>
                                                    </div> --}}


                                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                                <label for="Email">Email</label>
                                                                <input required type="email" name="Email"
                                                                    class="form-control input-control" />
                                                            </div>
                                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                                <label for="ContactNo">Contact Phone Number</label>
                                                                <input required type="text" name="ContactNo"
                                                                    class="form-control input-control" />
                                                            </div>

                                                            <input type="hidden" name="PaxType"
                                                                value="{{ $pax_type + 1 }}">
                                                            {{-- <div class="col-sm-12 pt-4 px-1">
                                        <select class="form-control input-control">
                                            <option value="" selected disabled>Select Country</option>
                                        </select>
                                    </div> --}}
                                                            {{-- <div class="col-sm-12 pt-4 px-1">
                                        <input type="text" class="form-control input-control" placeholder="Phone Number">
                                    </div> --}}
                                                            {{-- <div class="col-sm-12 pt-4 px-1">
                                        <select class="form-control input-control">
                                            <option value="" selected disabled>Select Country</option>
                                        </select>
                                    </div> --}}
                                                        </div>
                                                        <hr>
                                                    </form>
                                                @endfor
                                            @endforeach
                                            <div class="col-12">
                                                <button id="confirm_passengers_details"
                                                    onclick="confirmPassengersDetails()"
                                                    class="btn btn-back w-100 px-4 py-2 mt-3">
                                                    Confirm Passengers Details
                                                </button>
                                            </div>


                                            {{-- <div class="row pb-1">
                                        <div class="col-12 pt-4">
                                            <div class="gilroy-medium font-18">Free Cancelation</div>
                                            <div class="font-13">Your tour operator can pick you up from your arrival location or hotel</div>
                                        </div>
                                        <div class="col-12 pt-3 gilroy-medium">
                                            <div class="font-13">pick up from</div>
                                            <div class="pt-2">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="rd_1" name="rd" class="custom-control-input" checked>
                                                    <label class="custom-control-label red" for="rd_1">Arrival pickup location</label>
                                                  </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="rd_2" name="rd" class="custom-control-input">
                                                    <label class="custom-control-label red" for="rd_2">Hotel</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="rd_2" name="rd" class="custom-control-input">
                                                    <label class="custom-control-label red" for="rd_2">Don't need pickup for this activity</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 pt-3 gilroy-medium">
                                            <div class="font-13">You are arriving by*</div>
                                            <div class="pt-2">
                                                <select class="form-control input-control">
                                                    <option selected disabled>Select Mode</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                            <div class="row pb-3">
                                                {{-- <div class="col-12 pt-3">
                                            <div class="gilroy-medium font-18">Dropoff Information</div>
                                            <div class="font-13">Your tour operator can pick you up from your arrival location or hotel</div>
                                        </div> --}}
                                                {{-- <div class="col-12 pt-3 gilroy-medium">
                                            <div class="font-13">pick up from</div>
                                            <div class="pt-2">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="rd_1" name="rd" class="custom-control-input" checked>
                                                    <label class="custom-control-label red" for="rd_1">Arrival pickup location</label>
                                                  </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="rd_2" name="rd" class="custom-control-input">
                                                    <label class="custom-control-label red" for="rd_2">Hotel</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="rd_2" name="rd" class="custom-control-input">
                                                    <label class="custom-control-label red" for="rd_2">Don't need pickup for this activity</label>
                                                </div>
                                            </div>
                                        </div> --}}
                                                {{-- <div class="col-12 pt-3 gilroy-medium">
                                            <div class="font-13">You are arriving by*</div>
                                            <div class="pt-2">
                                                <input type="text" class="form-control input-control" placeholder="Phone Number">
                                            </div>
                                        </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- <div  class="row pt-3 passengers-required hide">
                                        <div class="section-2 px-3 wv-100">
                                            <div class="row pt-3">
                                                <div class="col-12">
                                                    <h4 class="font-weight-bold gilroy-medium">Manage your booking</h4> --}}{{-- <div class="font-13 gilroy-medium">gilroy-medium</div> --}}{{-- <div class="font-13 pt-2">Please enter the email address where you
                                                        would like to receive your confirmation
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-12 pt-3 gilroy-medium">
                                                    <div class="pt-2">
                                                        <input type="email" class="form-control input-control"
                                                               placeholder="john.doe@domain.com">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- <div class="mt-4">
                                    <h4 class="font-weight-bold gilroy-medium">Do you have a gift card or a
                                        coupon code?
                                    </h4>
                                </div> --}}
                                <div
                                    class="row passengers-required my-2 mt-4 mb-0  {{ ($pendingFlight !== null && $pendingHotel == null) || ($pendingFlight !== null && $pendingHotel !== null)? '': 'hide' }} {{ $trippbo_balance_enabled ? 'invisible' : '' }}">
                                    <div class="section-2 w-100 px-3">
                                        <div class="row">
                                            <div class="col-12">

                                                {{-- <div class="font-13 pt-1"><img src="image/double-check.svg"
                                                            width="17" /> We use secure
                                                        transmission
                                                    </div>
                                                    <div class="font-13 pt-1"><img src="image/double-check.svg"
                                                            width="17" /> We protect your
                                                        personal
                                                        information
                                                    </div> --}}
                                            </div>
                                        </div>

                                        <div class="row pb-3 ">
                                            <div class="col-12 pt-4">
                                                <h4 class="font-weight-bold gilroy-medium">Got A Coupon Or Gift Card ?
                                                </h4>
                                                {{-- <div class="font-13">Traveler names must match government-issued photo ID exactly.</div> --}}
                                            </div>
                                            <div class="col-12 pt-3  px-1">
                                                <div class="nav-title gilroy-medium">
                                                    <ul class="nav nav-tabs pl-2 gilroy-semi">
                                                        <li class="nav-item">
                                                            <a class="nav-link active px-2 font-12" data-toggle="tab"
                                                                href="#second_menu1"><img src="image/card.svg"
                                                                    width="18px" />&nbsp;
                                                                Gift Card</a>
                                                        </li>
                                                        <li class="nav-item ml-3">
                                                            <a class="nav-link px-2 font-12" data-toggle="tab"
                                                                href="#second_menu2"><i
                                                                    class="fas fa-percentage"></i>&nbsp;Coupon Code</a>
                                                        </li>
                                                        {{-- <li class="nav-item ml-3">
                                                            <a class="nav-link px-2 font-12" data-toggle="tab"
                                                                href="#second_menu3">&nbsp; Trippbo Balance</a>
                                                        </li> --}}
                                                    </ul>
                                                </div>

                                                <div class="nav-body">
                                                    <div class="tab-content">
                                                        <div id="second_menu1" class="container tab-pane active">
                                                            <form action="/checkout/add_gift_card" method="POST">
                                                                <div class="row px-3 mt-2">
                                                                    <div class="col-md-8"><input
                                                                            id="gift_card_number" type="text"
                                                                            class="form-control input-control w-100"
                                                                            placeholder="xxxx-xxxx-xxxx-xxxx"></div>
                                                                    <div class="col-md-4"><button
                                                                            style="margin-top: 0px !important"
                                                                            id="add_gift_card_button" type="button"
                                                                            class="btn btn-back w-100 px-4 py-2">Add</button>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div id="gift_card_recaptcha"
                                                                            class="g-recaptcha"
                                                                            data-sitekey="{{ config('services.invisible-recaptcha.key') }}"
                                                                            data-callback="submitGiftCard"
                                                                            data-size="invisible"></div>

                                                                    </div>
                                                                    {{-- <div class="col-sm-12 pt-3 px-1 px-1">
                                                                    <select class="form-control input-control">
                                                                        <option value="" selected disabled>
                                                                            Country/Territory Code</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-12 pt-3 px-1">
                                                                    <input type="text"
                                                                        class="form-control input-control"
                                                                        placeholder="Billing address 1">
                                                                </div>
                                                                <div class="col-sm-12 pt-3 px-1">
                                                                    <input type="text"
                                                                        class="form-control input-control"
                                                                        placeholder="Billing address 2">
                                                                </div>
                                                                <div class="col-sm-6 pt-3 px-1">
                                                                    <input type="text"
                                                                        class="form-control input-control"
                                                                        placeholder="City">
                                                                </div>
                                                                <div class="col-sm-6 pt-3 px-1 px-1">
                                                                    <select class="form-control input-control">
                                                                        <option value="" selected disabled>State
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6 pt-3 px-1">
                                                                    <input type="text"
                                                                        class="form-control input-control"
                                                                        placeholder="Zip Code">
                                                                </div> --}}
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div id="second_menu2" class="container tab-pane fade">
                                                            <div class="row px-3 mt-2">
                                                                <div class="col-md-8"><input type="text"
                                                                        class="form-control input-control w-100"
                                                                        placeholder="xxxx" id="coupon_code"></div>
                                                                <div class="col-md-4"><button
                                                                        id="add_coupon_code_button"
                                                                        style="margin-top: 0px !important" type="button"
                                                                        class="btn btn-back w-100 px-4 py-2">Add</button>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div id="coupon-code-recaptcha" class="g-recaptcha"
                                                                    data-sitekey="{{ config('services.invisible-recaptcha.key') }}"
                                                                    data-callback="submitCouponCode"
                                                                    data-size="invisible">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div id="second_menu3" class="container tab-pane fade">
                                                            <h3>Menu 3</h3>
                                                        </div>
                                                        <div id="menu4" class="container tab-pane fade">
                                                            <h3>Menu 4</h3>
                                                        </div>
                                                        <div id="menu5" class="container tab-pane fade">
                                                            <h3>Menu 5</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="manage_booking"
                                    class="row passengers-required  mt-4 mb-0 {{ ($pendingFlight !== null && $pendingHotel == null) || ($pendingFlight !== null && $pendingHotel !== null)? '': 'hide' }}">
                                    <div class="section-2 w-100 px-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="font-weight-bold gilroy-medium">How would you like to
                                                    pay?
                                                </h4>
                                                <div class="font-13 pt-1"><img src="image/double-check.svg"
                                                        width="17" />
                                                    We
                                                    use secure
                                                    transmission
                                                </div>
                                                <div class="font-13 pt-1"><img src="image/double-check.svg"
                                                        width="17" />
                                                    We
                                                    protect your
                                                    personal
                                                    information
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pb-3">
                                            <div class="col-12 pt-4">
                                                <h4 class="font-weight-bold gilroy-medium">Pay with</h4>
                                                {{-- <div class="font-13">Traveler names must match government-issued photo ID exactly.</div> --}}
                                            </div>
                                            <div class="col-12 pt-3  px-1">
                                                <div ID="paymentContainer" class="nav-body">
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>








                                <div
                                    class="row pt-3 passengers-required  {{ ($pendingFlight !== null && $pendingHotel == null) || ($pendingFlight !== null && $pendingHotel !== null)? '': 'hide' }}">
                                    <div class="section-2 px-3 wv-100 bg-white-grey">
                                        <div class="row pt-3">
                                            <div class="col-12">
                                                <h4 class="font-weight-bold gilroy-medium">Confirm</h4>
                                            </div>

                                            <div class="col-12 font-12 line-height-1">
                                                By selecting to complete this booking I acknowledge that I have
                                                read
                                                and
                                                accept the <span class="pink">Rules &
                                                    Restrictions</span> ,
                                                <span class="pink">Terms of Use </span> and <span
                                                    class="pink">Privacy Policy</span> .
                                            </div>
                                            <div class="col-12">
                                                <button id="card-button" onclick="submitOrder()"
                                                    class="btn btn-back px-4 mt-0">Complete
                                                    Booking
                                                </button>
                                            </div>
                                            <div class="col-12 pt-3 pb-3">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                <span class="font-12">&nbsp;
                                                    We use secure transmission and encrypted storage to protect
                                                    your
                                                    personal information.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="order_details" class="col-sm-12  col-md-5 p-0">
                                <div class="section-2 bg-white-grey">
                                    @if ($pendingFlight !== null && $pendingHotel == null)

                                        <div class="row pt-3 px-2">
                                            @if (count($pendingFlight['details']) == 1)
                                                @foreach ($pendingFlight['details'] as $trip)
                                                    @php
                                                        $totalDuration = 0;
                                                        $airlines = [];
                                                        foreach ($trip as $value) {
                                                            $totalDuration += $value['Duration'];
                                                            $airlines[] = $value['OperatorName'] . ' ' . $value['FlightNumber'];
                                                        }

                                                        $totalHours = floor($totalDuration / 60);
                                                        $totalMinutes = $totalDuration - $totalHours * 60;
                                                    @endphp



                                                    <div class="col-4">
                                                        <img src="image/phone.svg" width="30">
                                                    </div>
                                                    <div class="col-8 blue font-16 font-weight-bold pt-3">
                                                        Departing flight
                                                    </div>
                                                    <div class="col-12 font-13 pt-3">

                                                        <div>{{ $trip[0]['Origin']['CityName'] }}
                                                            ({{ $trip[0]['Origin']['AirportCode'] }})
                                                            To
                                                            {{ $trip[count($trip) - 1]['Destination']['CityName'] }}
                                                            ({{ $trip[count($trip) - 1]['Destination']['AirportCode'] }})
                                                        </div>


                                                        @php

                                                            $departureDate = new Carbon($trip[0]['Origin']['DateTime']);
                                                            $arrivalDate = new Carbon($trip[count($trip) - 1]['Destination']['DateTime']);

                                                        @endphp
                                                        <div class="gilroy-medium">
                                                            {{ $departureDate->toDateString() }}
                                                        </div>
                                                        <div class="gilroy-medium">

                                                            {{ $departureDate->format('H:i ') . '-' . $arrivalDate->format('H:i ') }}
                                                        </div>

                                                        <div class="gilroy-medium">{{ $totalHours }}h
                                                            {{ $totalMinutes }}m</div>

                                                        @foreach ($airlines as $airline)
                                                            <div class="gilroy-medium">
                                                                {{ $airline }}
                                                            </div>
                                                        @endforeach

                                                        {{-- <div class="pt-1">{{Lahbab}}</div> --}}
                                                    </div>
                                                    {{-- <div class="col-12 d-flex justify-content-between pt-3">
                                                                <div class="font-weight-bold font-14">
                                                                    <i class="fa fa-map-marker"></i>
                                                                    Destination
                                                                </div>
                                                                <div class="font-weight-bold font-14 grey">
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                    Duration
                                                                </div>
                                                            </div>
                                                            <div class="col-12 pt-2">
                                                                <hr>
                                                            </div> --}}
                                                @endforeach
                                                <div class="col-12">
                                                    <div class="gilroy-medium pt-2">Your price summary</div>
                                                    {{-- <div class="d-flex justify-content-between gilroy-medium font-13 pt-3">
                                                            <div>Total Due</div>
                                                            <div>$65</div>
                                                        </div> --}}
                                                    @foreach ($pendingFlight['price'] as $pass_type => $pass)
                                                        <div class="d-flex justify-content-between font-13 pt-3">
                                                            <div>{{ $pass['passengers_type'] }} x
                                                                {{ $pass['passengers_count'] }}</div>
                                                            <div>{{ $pass['passengers_cost'] }}
                                                                {{ $pendingFlight['currency'] }}</div>
                                                        </div>
                                                    @endforeach
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>{{ $flightSupportPackage->package_name }}</div>
                                                        <div>{{ $flightSupportPackagePrice / 100 }}
                                                            {{ $pendingFlight['currency'] }}</div>
                                                    </div>
                                                    @foreach ($pendingFlight['selectedExtrasPerPassenger'] as $extra)
                                                        @if (array_key_exists('baggage_weight', $extra))
                                                            <div class="d-flex justify-content-between font-13 pt-3">
                                                                <div>Extra Baggage: {{ $extra['baggage_weight'] }}
                                                                </div>
                                                                <div>{{ $extra['baggage_price'] }} </div>
                                                            </div>
                                                        @endif
                                                        @if (array_key_exists('meal_price', $extra))
                                                            <div class="d-flex justify-content-between font-13 pt-3">
                                                                <div>{{ $extra['meal_description'] }}</div>
                                                                <div>{{ $extra['meal_price'] }} </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>Taxes And Fees</div>
                                                        <div>Included</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pt-2">
                                                    <hr>
                                                </div>
                                                <div
                                                    class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4">
                                                    <div>Total</div>
                                                    <div>{{ ceil($total / 100) }} {{ $pendingFlight['currency'] }}
                                                    </div>
                                                </div>
                                            @endif
                                            @if (count($pendingFlight['details']) == 2)
                                                @foreach ($pendingFlight['details'] as $trip)
                                                    @php
                                                        $totalDuration = 0;
                                                        $airlines = [];
                                                        foreach ($trip as $value) {
                                                            $totalDuration += $value['Duration'];
                                                            $airlines[] = $value['OperatorName'] . ' ' . $value['FlightNumber'];
                                                        }

                                                        $totalHours = floor($totalDuration / 60);
                                                        $totalMinutes = $totalDuration - $totalHours * 60;
                                                    @endphp



                                                    <div class="col-4">
                                                        <img src="image/phone.svg" width="30">
                                                    </div>
                                                    <div class="col-8 blue font-16 font-weight-bold pt-3">
                                                        @if ($loop->index == 0)
                                                            Deprating Flight
                                                        @else
                                                            Returning Flight
                                                        @endif
                                                    </div>
                                                    <div class="col-12 font-13 pt-3">

                                                        <div>{{ $trip[0]['Origin']['CityName'] }}
                                                            ({{ $trip[0]['Origin']['AirportCode'] }})
                                                            To
                                                            {{ $trip[count($trip) - 1]['Destination']['CityName'] }}
                                                            ({{ $trip[count($trip) - 1]['Destination']['AirportCode'] }})
                                                        </div>


                                                        @php

                                                            $departureDate = new Carbon($trip[0]['Origin']['DateTime']);
                                                            $arrivalDate = new Carbon($trip[count($trip) - 1]['Destination']['DateTime']);

                                                        @endphp
                                                        <div class="gilroy-medium">
                                                            {{ $departureDate->toDateString() }}
                                                        </div>
                                                        <div class="gilroy-medium">

                                                            {{ $departureDate->format('H:i ') . '-' . $arrivalDate->format('H:i ') }}
                                                        </div>

                                                        <div class="gilroy-medium">{{ $totalHours }}h
                                                            {{ $totalMinutes }}m</div>

                                                        @foreach ($airlines as $airline)
                                                            <div class="gilroy-medium">
                                                                {{ $airline }}
                                                            </div>
                                                        @endforeach

                                                        {{-- <div class="pt-1">{{Lahbab}}</div> --}}
                                                    </div>
                                                    {{-- <div class="col-12 d-flex justify-content-between pt-3">
                                                            <div class="font-weight-bold font-14">
                                                                <i class="fa fa-map-marker"></i>
                                                                Destination
                                                            </div>
                                                            <div class="font-weight-bold font-14 grey">
                                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                Duration
                                                            </div>
                                                        </div>
                                                        <div class="col-12 pt-2">
                                                            <hr>
                                                        </div> --}}
                                                @endforeach
                                                <div class="col-12">
                                                    <div class="gilroy-medium pt-2">Your price summary</div>
                                                    {{-- <div class="d-flex justify-content-between gilroy-medium font-13 pt-3">
                                                        <div>Total Due</div>
                                                        <div>$65</div>
                                                    </div> --}}
                                                    @foreach ($pendingFlight['price'] as $passenger_type)
                                                        <div class="d-flex justify-content-between font-13 pt-3">

                                                            <div>{{ $passenger_type['passengers_type'] }} x
                                                                {{ $passenger_type['passengers_count'] }} </div>
                                                            <div>{{ $passenger_type['passengers_cost'] }}
                                                                {{ $pendingFlight['currency'] }}</div>
                                                        </div>
                                                    @endforeach
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>{{ $flightSupportPackage->package_name }}</div>
                                                        <div>{{ $flightSupportPackagePrice / 100 }}
                                                            {{ $pendingFlight['currency'] }}</div>
                                                    </div>
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>Taxes And Fees</div>
                                                        <div>Included</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pt-2">
                                                    <hr>
                                                </div>
                                                {{-- <div
                                                        class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4">
                                                        <div>Total</div>
                                                        <div>{{ ceil($total / 100) }} {{ $pendingFlight['currency'] }}
                                                        </div>
                                                    </div> --}}
                                                <div id="gift_card_flight_div"
                                                    class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4 {{ $discount == 0 ? 'invisible' : '' }}">
                                                    <div id="gift_card_type_flight_div" style="font-weight: 900">Gift
                                                        Card
                                                        Redeemed
                                                        <span onclick="removeGiftCard()"
                                                            style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>
                                                    </div>
                                                    <div id="gift_card_flight_value" style="font-weight: 900">
                                                        - {{ $discount / 100 }} {{ $currency }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4">
                                                    <div style="font-weight: 900">Total</div>
                                                    <div id="flight_total_price" style="font-weight: 900">
                                                        {{ ceil($total / 100) - $discount / 100 }}
                                                        {{ $pendingFlight['currency'] }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    @if ($pendingFlight == null && $pendingHotel !== null)
                                        <div class="row pt-3 px-2">

                                            <div class="col-12 d-flex flex-column justify-content-between pt-3">
                                                <div class="font-weight-bold font-14">
                                                    {{-- <i class="fa fa-map-marker"></i> --}}
                                                    {{ $pendingHotel['hotelName'] }}
                                                </div>
                                                <div class="font-weight-bold font-14">
                                                    {{-- <i class="fa fa-map-marker"></i> --}}
                                                    @for ($star_rating = 0; $star_rating < $pendingHotel['rating']; $star_rating++)
                                                        <i class="fa fa-star yellow"></i>
                                                    @endfor

                                                </div>
                                                <div class="font-12">
                                                    {{-- <i class="fa fa-map-marker"></i> --}}
                                                    {{ $pendingHotel['address'] }}
                                                </div>

                                            </div>
                                            <div class="col-12 pt-2">
                                                <hr>
                                            </div>
                                            <div class="col-12 d-flex justify-content-between pt-3">
                                                <div class="font-weight-bold font-14">
                                                    {{-- <i class="fa fa-map-marker"></i> --}}
                                                    {!! $pendingHotel['RoomDescription'] !!}
                                                </div>
                                                <div class="font-weight-bold font-14 grey">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    {{ $pendingHotel['noOfNights'] }} Nights
                                                </div>
                                            </div>
                                            <div class="p-3 w-100">
                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>Check-in Date</div>
                                                    <div style="font-weight: 900">{{ $pendingHotel['checkInDate'] }}
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>Check-out Date</div>
                                                    <div style="font-weight: 900">{{ $pendingHotel['checkOutDate'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <hr>
                                            </div>

                                            <div class="col-12">
                                                <div class="gilroy-medium pt-2" style="font-weight: 900">Your price
                                                    summary</div>
                                                {{-- <div class="d-flex justify-content-between gilroy-medium font-13 pt-3">
                                                        <div>Total Due</div>
                                                        <div>$65</div>
                                                    </div> --}}

                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>{{ $pendingHotel['noOfNights'] }} Nights</div>
                                                    <div style="font-weight: 900">{{ ceil($total / 100) }}
                                                        {{ $pendingHotel['Currency'] }}</div>
                                                </div>
                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>Taxes And Fees</div>
                                                    <div style="font-weight: 900">Included</div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <hr>
                                            </div>
                                            <div id="gift_card_hotel_div"
                                                class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4 {{ $discount == 0 ? 'invisible' : '' }}">
                                                <div id="gift_card_type_hotel_div" style="font-weight: 900">Gift Card
                                                    Redeemed
                                                    <span onclick="removeGiftCard()"
                                                        style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>
                                                </div>
                                                <div id="gift_card_hotel_value" style="font-weight: 900">
                                                    - {{ $discount / 100 }} {{ $currency }}
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4">
                                                <div style="font-weight: 900">Total</div>
                                                <div id="hotel_total_price" style="font-weight: 900">
                                                    {{ ceil($total / 100) - $discount / 100 }}
                                                    {{ $pendingHotel['Currency'] }}
                                                </div>
                                            </div>


                                        </div>
                                    @endif
                                        @if ($pendingFlight == null && $hotelbeds_hotel)
                                            <div class="row pt-3 px-2">

                                                <div class="col-12 d-flex flex-column justify-content-between pt-3">
                                                    <div class="font-weight-bold font-14">
                                                        {{-- <i class="fa fa-map-marker"></i> --}}
                                                       {{$hotelbeds_hotel['media']['name']['content']}}
                                                    </div>
                                                    <div class="font-weight-bold font-14">
                                                        {{-- <i class="fa fa-map-marker"></i> --}}
                                                        @for ($star_rating = 0; $star_rating < (int)substr($hotelbeds_hotel['media']['categoryCode'],0,1); $star_rating++)
                                                            <i class="fa fa-star yellow"></i>
                                                        @endfor

                                                    </div>
                                                    <div class="font-12">
                                                        {{-- <i class="fa fa-map-marker"></i> --}}
                                                        {{$hotelbeds_hotel['media']['address']['content']}}
                                                    </div>

                                                </div>
                                                <div class="col-12 pt-2">
                                                    <hr>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between pt-3">
                                                    <div class="font-weight-bold font-14">
                                                        {{-- <i class="fa fa-map-marker"></i> --}}
                                                        {{$hotelbeds_hotel['booked_room']['name']}}
                                                        <br>
                                                        {{$hotelbeds_hotel['booked_room']['trippbo_room_description']}}
                                                        {{$hotelbeds_hotel['booked_room']['trippbo_room_type']}}

                                                    </div>
                                                    <div class="font-weight-bold font-14 grey">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                   {{$hotelbeds_hotel['numberOfNights']}}   Nights
                                                    </div>
                                                </div>
                                                <div class="p-3 w-100">
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>Check-in Date</div>
                                                        <div style="font-weight: 900">
                                                            {{$hotelbeds_hotel['checkinDate']}}
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>Check-out Date</div>
                                                        <div style="font-weight: 900">
                                                            @php
                                                                $c = new \Carbon\Carbon($hotelbeds_hotel['checkinDate']);
                                                                $c = $c->addDays($hotelbeds_hotel['numberOfNights'])->toDateString();
                                                            @endphp
                                                            {{$c}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pt-2">
                                                    <hr>
                                                </div>

                                                <div class="col-12">
                                                    <div class="gilroy-medium pt-2" style="font-weight: 900">Your price
                                                        summary</div>
                                                    {{-- <div class="d-flex justify-content-between gilroy-medium font-13 pt-3">
                                                            <div>Total Due</div>
                                                            <div>$65</div>
                                                        </div> --}}

                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div> Nights</div>
                                                        <div style="font-weight: 900">    {{$hotelbeds_hotel['numberOfNights']}}
                                                         </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>Taxes And Fees</div>
                                                        <div style="font-weight: 900">Included</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pt-2">
                                                    <hr>
                                                </div>
                                                <div id="gift_card_hotel_div"
                                                     class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4 {{ $discount == 0 ? 'invisible' : '' }}">
                                                    <div id="gift_card_type_hotel_div" style="font-weight: 900">Gift Card
                                                        Redeemed
                                                        <span onclick="removeGiftCard()"
                                                              style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>
                                                    </div>
                                                    <div id="gift_card_hotel_value" style="font-weight: 900">
                                                        - {{ $discount / 100 }} {{ $currency }}
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4">
                                                    <div style="font-weight: 900">Total</div>
                                                    <div id="hotel_total_price" style="font-weight: 900">

                                                        {{ ceil($total / 100) - $discount / 100 }}

                                                    </div>
                                                </div>


                                            </div>
                                        @endif
                                    @if ($pendingFlight !== null && $pendingHotel !== null)

                                        <div class="row pt-3 px-2">
                                            @if (count($pendingFlight['details']) == 1)
                                                @foreach ($pendingFlight['details'] as $trip)
                                                    @php
                                                        $totalDuration = 0;
                                                        $airlines = [];
                                                        foreach ($trip as $value) {
                                                            $totalDuration += $value['Duration'];
                                                            $airlines[] = $value['OperatorName'] . ' ' . $value['FlightNumber'];
                                                        }

                                                        $totalHours = floor($totalDuration / 60);
                                                        $totalMinutes = $totalDuration - $totalHours * 60;
                                                    @endphp



                                                    <div class="col-4">
                                                        <img src="image/phone.svg" width="30">
                                                    </div>
                                                    <div class="col-8 blue font-16 font-weight-bold pt-3">
                                                        Departing flight
                                                    </div>
                                                    <div class="col-12 font-13 pt-3">

                                                        <div>{{ $trip[0]['Origin']['CityName'] }}
                                                            ({{ $trip[0]['Origin']['AirportCode'] }})
                                                            To
                                                            {{ $trip[count($trip) - 1]['Destination']['CityName'] }}
                                                            ({{ $trip[count($trip) - 1]['Destination']['AirportCode'] }})
                                                        </div>


                                                        @php

                                                            $departureDate = new Carbon($trip[0]['Origin']['DateTime']);
                                                            $arrivalDate = new Carbon($trip[count($trip) - 1]['Destination']['DateTime']);

                                                        @endphp
                                                        <div class="gilroy-medium">
                                                            {{ $departureDate->toDateString() }}
                                                        </div>
                                                        <div class="gilroy-medium">

                                                            {{ $departureDate->format('H:i ') . '-' . $arrivalDate->format('H:i ') }}
                                                        </div>

                                                        <div class="gilroy-medium">{{ $totalHours }}h
                                                            {{ $totalMinutes }}m</div>

                                                        @foreach ($airlines as $airline)
                                                            <div class="gilroy-medium">
                                                                {{ $airline }}
                                                            </div>
                                                        @endforeach

                                                        {{-- <div class="pt-1">{{Lahbab}}</div> --}}
                                                    </div>
                                                    {{-- <div class="col-12 d-flex justify-content-between pt-3">
                                                            <div class="font-weight-bold font-14">
                                                                <i class="fa fa-map-marker"></i>
                                                                Destination
                                                            </div>
                                                            <div class="font-weight-bold font-14 grey">
                                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                Duration
                                                            </div>
                                                        </div>
                                                        <div class="col-12 pt-2">
                                                            <hr>
                                                        </div> --}}
                                                @endforeach
                                                <div class="col-12">
                                                    <div class="gilroy-medium pt-2">Your price summary</div>
                                                    {{-- <div class="d-flex justify-content-between gilroy-medium font-13 pt-3">
                                                        <div>Total Due</div>
                                                        <div>$65</div>
                                                    </div> --}}
                                                    @foreach ($pendingFlight['price'] as $pass_type => $pass)
                                                        <div class="d-flex justify-content-between font-13 pt-3">
                                                            <div>{{ $pass['passengers_type'] }} x
                                                                {{ $pass['passengers_count'] }}</div>
                                                            <div class="font-weight-bold">
                                                                {{ $pass['passengers_cost'] }}
                                                                {{ $pendingFlight['currency'] }}</div>
                                                        </div>
                                                    @endforeach
                                                    @foreach ($pendingFlight['selectedExtrasPerPassenger'] as $extra)
                                                        @if (array_key_exists('baggage_weight', $extra))
                                                            <div class="d-flex justify-content-between font-13 pt-3">
                                                                <div>Extra Baggage: {{ $extra['baggage_weight'] }}
                                                                </div>
                                                                <div class="font-weight-bold">
                                                                    {{ $extra['baggage_price'] }} </div>
                                                            </div>
                                                        @endif
                                                        @if (array_key_exists('meal_price', $extra))
                                                            <div class="d-flex justify-content-between font-13 pt-3">
                                                                <div>{{ $extra['meal_description'] }}</div>
                                                                <div class="font-weight-bold">
                                                                    {{ $extra['meal_price'] }} </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>{{ $flightSupportPackage->package_name }}</div>
                                                        <div>{{ $flightSupportPackagePrice / 100 }}
                                                            {{ $pendingFlight['currency'] }}</div>
                                                    </div>
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>Taxes And Fees</div>
                                                        <div class="font-weight-bold">Included</div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (count($pendingFlight['details']) == 2)
                                                @foreach ($pendingFlight['details'] as $trip)
                                                    @php
                                                        $totalDuration = 0;
                                                        $airlines = [];
                                                        foreach ($trip as $value) {
                                                            $totalDuration += $value['Duration'];
                                                            $airlines[] = $value['OperatorName'] . ' ' . $value['FlightNumber'];
                                                        }

                                                        $totalHours = floor($totalDuration / 60);
                                                        $totalMinutes = $totalDuration - $totalHours * 60;
                                                    @endphp



                                                    <div class="col-4">
                                                        <img src="image/phone.svg" width="30">
                                                    </div>
                                                    <div class="col-8 blue font-16 font-weight-bold pt-3">
                                                        @if ($loop->index == 0)
                                                            Deprating Flight
                                                        @else
                                                            Returning Flight
                                                        @endif
                                                    </div>
                                                    <div class="col-12 font-13 pt-3">

                                                        <div>{{ $trip[0]['Origin']['CityName'] }}
                                                            ({{ $trip[0]['Origin']['AirportCode'] }})
                                                            To
                                                            {{ $trip[count($trip) - 1]['Destination']['CityName'] }}
                                                            ({{ $trip[count($trip) - 1]['Destination']['AirportCode'] }})
                                                        </div>


                                                        @php

                                                            $departureDate = new Carbon($trip[0]['Origin']['DateTime']);
                                                            $arrivalDate = new Carbon($trip[count($trip) - 1]['Destination']['DateTime']);

                                                        @endphp
                                                        <div class="gilroy-medium">
                                                            {{ $departureDate->toDateString() }}
                                                        </div>
                                                        <div class="gilroy-medium">

                                                            {{ $departureDate->format('H:i ') . '-' . $arrivalDate->format('H:i ') }}
                                                        </div>

                                                        <div class="gilroy-medium">{{ $totalHours }}h
                                                            {{ $totalMinutes }}m</div>

                                                        @foreach ($airlines as $airline)
                                                            <div class="gilroy-medium">
                                                                {{ $airline }}
                                                            </div>
                                                        @endforeach

                                                        {{-- <div class="pt-1">{{Lahbab}}</div> --}}
                                                    </div>
                                                    {{-- <div class="col-12 d-flex justify-content-between pt-3">
                                                        <div class="font-weight-bold font-14">
                                                            <i class="fa fa-map-marker"></i>
                                                            Destination
                                                        </div>
                                                        <div class="font-weight-bold font-14 grey">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            Duration
                                                        </div>
                                                    </div>
                                                    <div class="col-12 pt-2">
                                                        <hr>
                                                    </div> --}}
                                                @endforeach
                                                <div class="col-12">
                                                    <div class="gilroy-medium pt-2">Your price summary</div>
                                                    {{-- <div class="d-flex justify-content-between gilroy-medium font-13 pt-3">
                                                    <div>Total Due</div>
                                                    <div>$65</div>
                                                </div> --}}
                                                    @foreach ($pendingFlight['price'] as $passenger_type)
                                                        <div class="d-flex justify-content-between font-13 pt-3">

                                                            <div>{{ $passenger_type['passengers_type'] }} x
                                                                {{ $passenger_type['passengers_count'] }} </div>
                                                            <div class="font-weight-bold">
                                                                {{ $passenger_type['passengers_cost'] }}
                                                                {{ $pendingFlight['currency'] }}</div>
                                                        </div>
                                                    @endforeach
                                                    @foreach ($pendingFlight['selectedExtrasPerPassenger'] as $extra)
                                                        @if (array_key_exists('baggage_weight', $extra))
                                                            <div class="d-flex justify-content-between font-13 pt-3">
                                                                <div>Extra Baggage: {{ $extra['baggage_weight'] }}
                                                                </div>
                                                                <div class="font-weight-bold">
                                                                    {{ $extra['baggage_price'] }} </div>
                                                            </div>
                                                        @endif
                                                        @if (array_key_exists('meal_price', $extra))
                                                            <div class="d-flex justify-content-between font-13 pt-3">
                                                                <div>{{ $extra['meal_description'] }}</div>
                                                                <div class="font-weight-bold">
                                                                    {{ $extra['meal_price'] }} </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>{{ $flightSupportPackage->package_name }}</div>
                                                        <div>{{ $flightSupportPackagePrice / 100 }}
                                                            {{ $pendingFlight['currency'] }}</div>
                                                    </div>
                                                    <div class="d-flex justify-content-between font-13 pt-3">
                                                        <div>Taxes And Fees</div>
                                                        <div class="font-weight-bold">Included</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 pt-2">
                                                    <hr>
                                                </div>

                                                <div
                                                    class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4">
                                                    <div>Total</div>
                                                    <div>{{ ceil($total / 100) }}
                                                        {{ $pendingFlight['currency'] }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-12 pt-2">
                                            <hr>
                                        </div>
                                        <div class="row pt-3 px-2">

                                            <div class="col-12 d-flex flex-column justify-content-between pt-3">
                                                <div class="font-weight-bold font-14">
                                                    {{-- <i class="fa fa-map-marker"></i> --}}
                                                    {{ $pendingHotel['hotelName'] }}
                                                </div>
                                                <div class="font-weight-bold font-14">
                                                    {{-- <i class="fa fa-map-marker"></i> --}}
                                                    @for ($star_rating = 0; $star_rating < $pendingHotel['rating']; $star_rating++)
                                                        <i class="fa fa-star yellow"></i>
                                                    @endfor

                                                </div>
                                                <div class="font-12">
                                                    {{-- <i class="fa fa-map-marker"></i> --}}
                                                    {{ $pendingHotel['address'] }}
                                                </div>

                                            </div>

                                            <div class="col-12 d-flex justify-content-between pt-3">
                                                <div class="font-weight-bold font-14">
                                                    {{-- <i class="fa fa-map-marker"></i> --}}
                                                    {!! $pendingHotel['RoomDescription'] !!}
                                                </div>
                                                <div class="font-weight-bold font-14 grey">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    {{ $pendingHotel['noOfNights'] }} Nights
                                                </div>
                                            </div>
                                            <div class="p-3 w-100">
                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>Check-in Date</div>
                                                    <div style="font-weight: 900">{{ $pendingHotel['checkInDate'] }}
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>Check-out Date</div>
                                                    <div style="font-weight: 900">
                                                        {{ $pendingHotel['checkOutDate'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <hr>
                                            </div>

                                            <div class="col-12">
                                                <div class="gilroy-medium pt-2" style="font-weight: 900">Your price
                                                    summary</div>
                                                {{-- <div class="d-flex justify-content-between gilroy-medium font-13 pt-3">
                                                    <div>Total Due</div>
                                                    <div>$65</div>
                                                </div> --}}

                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>{{ $pendingHotel['noOfNights'] }} Nights</div>
                                                    <div style="font-weight: 900">{{ $pendingHotel['Price'] }}
                                                        {{ $pendingHotel['Currency'] }}</div>
                                                </div>
                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>Taxes And Fees</div>
                                                    <div style="font-weight: 900">Included</div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <hr>
                                            </div>
                                            <div id="gift_card_package_div"
                                                class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4 {{ $discount == 0 ? 'invisible' : '' }}">
                                                <div id="gift_card_type_flight_div" style="font-weight: 900">Gift
                                                    Card
                                                    Redeemed
                                                    <span onclick="removeGiftCard()"
                                                        style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>
                                                </div>
                                                <div id="gift_card_package_value" style="font-weight: 900">
                                                    - {{ $discount / 100 }} {{ $currency }}
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4">
                                                <div style="font-weight: 900">Total</div>
                                                <div id="package_total_price" style="font-weight: 900">
                                                    {{ ceil($total / 100) - $discount / 100 }}
                                                    {{ $pendingHotel['Currency'] }}
                                                </div>
                                            </div>



                                        </div>
                                    @endif
                                    @if ($pendingActivity !== null)
                                        <div class="row pt-3 px-2">
                                            <div class="col-12">
                                                <img src="image/phone.svg" width="30">
                                            </div>
                                            <div class="col-12 blue font-16 font-weight-bold pt-3">
                                                {{ $pendingActivity['ProductName'] }}
                                            </div>
                                            <div class="col-12 font-13 pt-3">
                                                <div>{{ $pendingActivity['Destination'] }}</div>
                                                <div class="gilroy-medium">{{ $pendingActivity['BookingDate'] }}
                                                </div>
                                                <div class="gilroy-medium">
                                                    {{ $pendingActivity['adult_count'] + $pendingActivity['child_count'] + $pendingActivity['infant_count'] }}
                                                    Travelers
                                                </div>
                                                {{-- <div class="pt-1">{{Lahbab}}</div> --}}
                                            </div>
                                            <div class="col-12 d-flex justify-content-between pt-3">
                                                <div class="font-weight-bold font-14">
                                                    <i class="fa fa-map-marker"></i>
                                                    {{ $pendingActivity['Destination'] }}
                                                </div>
                                                <div class="font-weight-bold font-14 grey">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    {{ $pendingActivity['Duration'] }}
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <hr>
                                            </div>
                                            <div class="col-12">
                                                <div class="gilroy-medium pt-2">Your price summary</div>

                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>
                                                        {{ $pendingActivity['adult_count'] }} Adult
                                                        @if ($pendingActivity['child_count'] > 0)
                                                            {{ $pendingActivity['child_count'] }} Child
                                                        @endif
                                                        @if ($pendingActivity['infant_count'] > 0)
                                                            {{ $pendingActivity['infant_count'] }} Infant
                                                        @endif
                                                    </div>
                                                    <div>
                                                        {{ $pendingActivity['Price'] }}
                                                        {{ $pendingActivity['Currency'] }}
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between font-13 pt-3">
                                                    <div>Taxes And Fees</div>
                                                    <div>Included</div>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <hr>
                                            </div>


                                            <div id="gift_card_activity_div"
                                                class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4 {{ $discount == 0 ? 'invisible' : '' }}">
                                                <div id="gift_card_type_activity_div" style="font-weight: 900">Gift Card
                                                    Redeemed
                                                    <span onclick="removeGiftCard()"
                                                        style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>
                                                </div>
                                                <div id="gift_card_activity_value" style="font-weight: 900">
                                                    - {{ $discount / 100 }} {{ $currency }}
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-between gilroy-medium pt-2 pb-4">
                                                <div style="font-weight: 900">Total</div>
                                                <div id="activity_total_price" style="font-weight: 900">
                                                    {{ ceil($total / 100) - $discount / 100 }}
                                                    {{ $pendingActivity['Currency'] }}
                                                </div>
                                            </div>




                                        </div>
                                    @endif

                                    {{-- <div class="section-2 mt-3">
                                        <div class="col-12 d-flex flex-row">
                                            <div>
                                                <img src="image/check expiration.png" width="55" height="55">
                                            </div>
                                            <div class="pl-3 line-height-1-5 pt-2">
                                                <div class="font-13 gilroy-medium font-weight-bold">Free Cancelation</div>
                                                <div class="grey font-11 gilroy-medium">20 April 2021</div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>


</div>




@endsection
@section('scripts')
<script>
    window.stripe = Stripe('{{ config('services.stripe.key') }}');
    let tripId = '{{ $tripId }}'
    let passengers_count = $(".passengerForm").length;
    let successful_saves = 0;
    let orderTotal = {{ $total }};
    let local_hotel_order_id = '{{$local_hotel_order_id}}';
    let discount = {{ $discount }};
    let currency = '{{ $currency }}';
    let gift_card_enabled = {{ $gift_card_enabled ? 'true' : 'false' }}
    let coupon_enabled = {{ $coupon_enabled ? 'true' : 'false' }};
    let trippbo_balance_enabled = {{ $trippbo_balance_enabled ? 'true' : 'false' }};
    var add_gift_card_button = document.getElementById('add_gift_card_button');
    add_gift_card_button.onclick = validateGiftCard;


    console.log(discount);
    var add_coupon_code_button = document.getElementById('add_coupon_code_button');
    add_coupon_code_button.onclick = validateCouponCode;

    function validateCouponCode(event) {

        grecaptcha.execute(1);
        event.preventDefault();
        return;

    }

    function validateGiftCard(event) {

        grecaptcha.execute(0);
        event.preventDefault();
        return;

    }

    function updateGiftCardDOM() {
        if (discount > 0) {

            $("#hotel_total_price").text((orderTotal - discount) / 100 + ' ' + currency)
            $("#gift_card_hotel_div").removeClass('invisible')
            if (gift_card_enabled == true) {
                $("#gift_card_type_hotel_div").html(
                    `Gift Card Redeemed <span
                                                    onclick="removeGiftCard()"
                                                    style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>`
                )
            } else if (coupon_enabled == true) {
                $("#gift_card_type_hotel_div").html(
                    `Coupon <span
                                                    onclick="removeCoupon()"
                                                    style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>`
                )
            } else if (trippbo_balance_enabled == true) {
                $("#gift_card_type_hotel_div").html(`Available Trippbo Balance `)
            }

            $("#gift_card_hotel_value").text("-" + discount / 100 + ' ' + currency)
        } else {
            $("#hotel_total_price").text((orderTotal) / 100 + ' ' + currency)
            $("#gift_card_hotel_div").addClass('invisible')
            $("#gift_card_number").val('')
            $("#add_gift_card_button").prop('disabled', false);
        }


        if (discount > 0) {

            $("#activity_total_price").text((orderTotal - discount) / 100 + ' ' + currency)
            $("#gift_card_activity_div").removeClass('invisible')
            if (gift_card_enabled == true) {
                $("#gift_card_type_activity_div").html(`Gift Card Redeemed <span
                                    onclick="removeGiftCard()"
                                    style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>`)
            } else if (coupon_enabled == true) {
                $("#gift_card_type_activity_div").html(`Coupon <span
                                    onclick="removeCoupon()"
                                    style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>`)
            } else if (trippbo_balance_enabled == true) {
                $("#gift_card_type_activity_div").html(`Available Trippbo Balance `)
            }

            $("#gift_card_activity_value").text("-" + discount / 100 + ' ' + currency)
        } else {
            $("#activity_total_price").text((orderTotal) / 100 + ' ' + currency)
            $("#gift_card_activity_div").addClass('invisible')
            $("#gift_card_number").val('')
            $("#add_gift_card_button").prop('disabled', false);
        }

        if (discount > 0) {

            $("#flight_total_price").text((orderTotal - discount) / 100 + ' ' + currency)
            $("#gift_card_flight_div").removeClass('invisible')
            if (gift_card_enabled == true) {
                $("#gift_card_type_flight_div").html(`Gift Card Redeemed <span
                    onclick="removeGiftCard()"
                    style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>`)
            } else if (coupon_enabled == true) {
                $("#gift_card_type_flight_div").html(`Coupon <span
                    onclick="removeCoupon()"
                    style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>`)
            } else if (trippbo_balance_enabled == true) {
                $("#gift_card_type_flight_div").html(`Available Trippbo Balance `)
            }

            $("#gift_card_flight_value").text("-" + discount / 100 + ' ' + currency)
        } else {
            $("#flight_total_price").text((orderTotal) / 100 + ' ' + currency)
            $("#gift_card_flight_div").addClass('invisible')
            $("#gift_card_number").val('')
            $("#add_gift_card_button").prop('disabled', false);
        }
        if (discount > 0) {

            $("#package_total_price").text((orderTotal - discount) / 100 + ' ' + currency)
            $("#gift_card_package_div").removeClass('invisible')
            if (gift_card_enabled == true) {
                $("#gift_card_type_package_div").html(`Gift Card Redeemed <span
    onclick="removeGiftCard()"
    style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>`)
            } else if (coupon_enabled == true) {
                $("#gift_card_type_package_div").html(`Coupon <span
    onclick="removeCoupon()"
    style="font-weight: normal;color:#FE2F70;cursor:pointer;">Remove</span>`)
            } else if (trippbo_balance_enabled == true) {
                $("#gift_card_type_package_div").html(`Available Trippbo Balance `)
            }

            $("#gift_card_package_value").text("-" + discount / 100 + ' ' + currency)
        } else {
            $("#package_total_price").text((orderTotal) / 100 + ' ' + currency)
            $("#gift_card_package_div").addClass('invisible')
            $("#gift_card_number").val('')
            $("#add_gift_card_button").prop('disabled', false);
        }
    }

    async function submitCouponCode(token) {
        let code = $("#coupon_code").val();
        $("#add_coupon_code_button").prop('disabled', true);
        let formdata = new FormData();
        formdata.append('code', code)
        formdata.append('g-recaptcha-response', token)
        try {
            let response = await axios.post('/checkout/add_coupon', formdata)
            coupon_enabled = true;
            gift_card_enabled = false;
            trippbo_balance_enabled = false;
            orderTotal = response.data.total;
            discount = response.data.discount;
            updateGiftCardDOM();
            renderCheckout();


        } catch (ex) {
            $("#add_coupon_code_button").prop('disabled', false);

        }
    }
    async function submitGiftCard(token) {
        let code = $("#gift_card_number").val();
        $("#add_gift_card_button").prop('disabled', true);

        let formdata = new FormData();
        formdata.append('code', code)
        formdata.append('g-recaptcha-response', token)
        try {
            let response = await axios.post('/checkout/add_gift_card', formdata)
            gift_card_enabled = true;
            coupon_enabled = false;
            trippbo_balance_enabled = false;
            orderTotal = response.data.total;
            discount = response.data.discount;
            updateGiftCardDOM();
            renderCheckout();


        } catch (ex) {
            $("#add_gift_card_button").prop('disabled', false);

        }

    }


    async function removeGiftCard() {
        let response = await axios.post('/checkout/remove_gift_card');
        gift_card_enabled = false;
        grecaptcha.reset(0);
        discount = 0;
        renderCheckout();
        updateGiftCardDOM();


    }


    async function removeCoupon() {
        let response = await axios.post('/checkout/remove_coupon');
        coupon_enabled = false;
        grecaptcha.reset(1);
        discount = 0;
        renderCheckout();
        updateGiftCardDOM();


    }
    const order_details = new Vue({
        el: "#order_details",
        data: {
            orderTotalPrice: {{ $total }},
            giftCardNumber: '',
        },
        methods: {
            applyGiftCard: async function() {
                let f = new FormData();
                f.append('code', this.giftCardNumber)
                let gift_card_response = await axios.post('/checkout/add_gift_card')
            }
        }
    })




    $(document).on('submit', 'form.passengerForm', function() {

        let formData = new FormData(this);
        let contact_information_country = $("#contact_information_country").val()
        let contact_information_city = $("#contact_information_city").val()
        let contact_information_postcode = $("#contact_information_postcode").val()
        let contact_information_address = $("#contact_information_address").val()
        let contact_information_email = $("#contact_information_email").val()
        let contact_information_phone_number = $("#contact_information_phone_number").val()

        formData.append('Country', contact_information_country)
        formData.append('City', contact_information_city)
        formData.append('PinCode', contact_information_postcode)
        formData.append('AddressLine1', contact_information_address)
        formData.append('Email', contact_information_email)
        formData.append('ContactNo', contact_information_phone_number)



        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (successful_saves == passengers_count - 1) {
                    revealCheckout();
                } else {
                    successful_saves += 1;
                }
            },
            error: function(xhr, err) {

            }
        });
        return false;
    });

    let orderDone = false;

    function confirmPassengersDetails() {

        let error = false;
        var forms = document.getElementsByClassName('passengerForm');
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

        const confirmButton = document.getElementById('confirm_passengers_details');
        confirmButton.disabled = true;
        confirmButton.textContent = 'Please Wait...';

        $(".passengerForm").submit();
    }

    function confirmHotelPassengersDetails() {


        let error = false;
        var forms = document.getElementsByClassName('passengerForm');
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

        const confirmButton = document.getElementById('confirm_passengers_details');
        confirmButton.disabled = true;
        confirmButton.textContent = 'Please Wait...';

        $(".passengerForm").submit();
    }

    function confirmHotelPassengersDetails_2() {


        let error = false;
        var forms = document.getElementsByClassName('passengerForm');
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

        const confirmButton = document.getElementById('confirm_passengers_details');
        confirmButton.disabled = true;
        confirmButton.textContent = 'Please Wait...';

        $(".passengerForm").submit();
    }

    function revealCheckout() {
        $(".passengers-required").removeClass('hide');
        const confirmButton = document.getElementById('confirm_passengers_details');

        confirmButton.textContent = 'Passenger Details Has Been Saved';
        document.getElementById('manage_booking').scrollIntoView();
    }

    async function prepareCheckout() {
        try {
            let data = new FormData();
            data.append('local_hotel_order_id', local_hotel_order_id);
            axios_response = await axios.post('{{ route('book-trip-payment-intent-secret') }}', data)
        } catch (error) {
            /* console.log(error)
            $("#amount_validation").text(String(error));
            $("#amount_validation").removeClass('invisible') */

        }
        /* /checkout/process_order */

        if (axios_response.data.status == 'success') {
            paymentIntentsecret = axios_response.data.client_secret;

            if (paymentIntentsecret == '') {
                orderTotal = axios_response.data.total;
                discount = axios_response.data.discount;
                $("#manage_booking").addClass('invisible');
                return true;
            } else {
                $("#manage_booking").removeClass('invisible');
            }


            /*         future_payments_js = axios_response.data.future_payments; */

        } else if (axios_response.data.status == "verification") {
            /*  window.location.href = "/verification/solo/" + currentTripOrder; */
        } else if (axios_response.data.status == "done") {
            orderDone = true;

        }


    }





    /*  const cardButton = document.getElementById('card-button');


     const elements = stripe.elements();

     const cardElement = elements.create('cardNumber', {
         style: {
             base: {}
         }
     });
     const cardExpDateElement = elements.create('cardExpiry', {
         style: {
             base: {}
         }
     });

     const cardCVCElement = elements.create('cardCvc', {
         style: {
             base: {}
         }
     });

     cardElement.mount('#cardNumber');
     cardExpDateElement.mount("#cardExpDate");
     cardCVCElement.mount("#cardCVC") */




    let parentPaymentElement = null;
    async function renderCheckout() {

        let orderTotalIsZero = await prepareCheckout();
        if (!orderTotalIsZero) {
            const options = {
                clientSecret: paymentIntentsecret,
            };
            const elements = stripe.elements(options);


            const paymentElement = elements.create("payment");
            paymentElement.mount("#paymentContainer");
            parentPaymentElement = elements;
        }

    }



    async function submitOrder() {
        if (orderTotal - discount > 0) {
            const {
                error
            } = await stripe.confirmPayment({
                elements: parentPaymentElement,
                confirmParams: {
                    return_url: 'https://my-site.com/order/123/complete',
                },

            });
        } else {
            let r = axios.post('/checkout/process_order');
        }

    }
    renderCheckout();
    updateGiftCardDOM();
</script>
@endsection
