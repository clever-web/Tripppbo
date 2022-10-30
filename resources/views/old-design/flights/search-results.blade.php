@extends('layout')
@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">
    <link href="/css-r/home/all-booking.css" rel="stylesheet">
    <link href="/css-r/home/flights.css" rel="stylesheet">
    <style>
        .scrollbarDate {
            background: #e8e9ee;
            border-radius: 15px !important;
            color: #23242C;
            padding: 10px 10px;
            cursor: pointer;
            font-size: 12px;

        }

        .scrollbarDate:hover {
            border: #FE2F70 solid 2px;

        }

        .scrollbarDateActive {
            border: #FE2F70 solid 2px;
        }

        .flight_element:hover {
            background-color: rgb(209, 209, 209);
            cursor: pointer;
        }

        .height_fit_content {
            max-height: fit-content !important;
        }

        .height_zero {
            max-height: 0px;
        }

        .border {
            background-color: #fff;
            padding: 1rem;
            border: 1px solid #d2d2d2;
            margin-bottom: 1rem;
        }

        .inputField-box span {
            position: initial;
            top: initial;
            left: initial;
            background-color: initial;
            padding: initial;
        }

        .timeline>div.stop>div>div.timeline-container>div:nth-of-type(2)::before {
            content: '';
            position: absolute;
            background-color: transparent;
            width: 2px;
            border-right: 2px solid #000941;
            top: 0;
            height: calc(100% + 1.5rem);
            left: 50%;
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
        }

        .font-size-11 {
            font-size: 11px !important;
        }

        .add-border-radius {
            border-radius: 15px !important;
        }

        .add-border-radius-image {
            border-radius: 5px !important;
        }



        .selected {
            background-color: #000941;
            color: white;

        }

        .selected-image {
            filter: brightness(255)
        }

        .time-filter {
            cursor: pointer;
        }

        .trippbo-radio {
            display: block;
            position: relative;
            padding-left: 30px;
            margin-bottom: 0;
            cursor: pointer;
            font-size: 12px;
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none;
        }

        .trippbo-radio>input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .trippbo-radio>span {
            position: absolute;
            top: 0;
            left: 0;
            height: 16px;
            width: 16px;
            background-color: #fff;
            border: 1px solid #000941;
            border-radius: 50%;
        }

        .trippbo-radio>input:checked~span:after {
            display: block;
        }

        .trippbo-radio>span:after {
            left: 2px;
            top: 3px;
            width: 9px;
            height: 9px;
            background-color: #000941;
            border-radius: 50%;
        }

        .trippbo-radio>span:after {
            content: "";
            position: absolute;
            display: none;
        }

        .btn-selected {
            background-color: #000941;
            border-color: #000941;
            color: white;
        }

        .trippbo-btn-active {
            background-color: #ff6898 !important;
            color: white !important;
            border-radius: 15px;
        }

    </style>
@endsection
@section('content')
    <div id="flights_app" class="body-content">
        <!--Packages Modal -->
        <div class="modal fade" id="flight_support_packages" tabindex="-1" role="dialog"
            aria-labelledby="flight_support_packages_title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="flight_support_packages_title">Support Packages</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div v-for="(flight_service_package, flight_service_package_index) in flight_service_packages"
                                :key="flight_service_package_index" class="col-md-4">
                                <div
                                    class="bg-white border-d2d2d2 p-4 h-100 mb-4 d-flex flex-column justify-content-between">

                                    <div>
                                        <h4 class="gilroy-semi">@{{ flight_service_package.package_name }}</h4>
                                        <h4 v-if="currentFlight != null" class="gilroy-semi font-24 mb-2">
                                            @{{ generateServicePackagePrice(flight_service_package) }}</h4>
                                        <p class="gilroy-regular font-12 mb-2">per flight</p>
                                    </div>
                                    {{-- <p class="gilroy-semi text-000941 font-12 mb-2">Cabin: Economy</p> --}}
                                    <div>
                                        <div class="d-flex align-items-center mb-2"><img src="/image/double-check.png"
                                                class="icon-16px mr-2"><span
                                                class="gilroy-regular font-12 text-23242c">Customer Support

                                            </span></div>
                                        <div v-if="flight_service_package.makes_flight_change_available"
                                            class="d-flex align-items-center mb-2"><img src="/image/doller.png"
                                                class="icon-16px mr-2"><span
                                                class="gilroy-regular font-12 text-23242c">Change Flight
                                            </span></div>
                                        <div v-if="flight_service_package.makes_flight_cancellation_available"
                                            class="d-flex align-items-center mb-2"><img src="/image/close.png"
                                                class="icon-14px mr-2"><span
                                                class="gilroy-regular font-12 text-23242c">Cancel
                                                Flight
                                            </span></div>
                                        <div v-if="flight_service_package.makes_airport_help_available"
                                            class="d-flex align-items-center mb-2"><img src="/image/double-check.png"
                                                class="icon-16px mr-2"><span
                                                class="gilroy-regular font-12 text-23242c">Airport
                                                Help
                                            </span></div>
                                    </div>
                                    {{-- <div class="d-flex align-items-center mb-3"><a href="#"
                                            class="btn btn-link gilroy-semi font-12 text-fe2f70 p-0">Show less</a></div> --}}

                                    {{-- <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div><span class="gilroy-regular font-12">Show less</span></div>
                                        <div><span class="gilroy-regular font-12">Included up to 7 kg</span></div>
                                    </div> --}}
                                    <div>
                                        <hr>
                                        <button type="button"
                                            v-on:click="selectFlightSupportPackage(flight_service_package)"
                                            class="btn  btn-block font-12"
                                            :class="{'btn-selected' : selected_flight_service_package_id == flight_service_package.id, 'btn-fe2f70' : selected_flight_service_package_id != flight_service_package.id , ' box-shadow-fe2f70' : selected_flight_service_package_id != flight_service_package.id}">@{{ selected_flight_service_package_id == flight_service_package.id ? 'Selected' : 'Select' }}
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        <button v-on:click="reserveFlight" type="button" class="btn btn-fe2f70 box-shadow-fe2f70  font-12"
                            style="border-radius: 15px !important;">Continue</button>
                    </div>
                </div>
            </div>
        </div>
        <section class="pb-5">
            <div class="wrapper">
                <div class="breadcrumb_ mb-4">
                    <ol class="">
                        <li class="breadcrumb-item">
                            <a>Flights</a>
                        </li>
                        <li class="breadcrumb-item active">Choose Flight</li>
                    </ol>
                </div>
                <div id="sidepanel" class="sidepanel">
                    <div class="mb-3">
                        <button class="closebtn" v-on:click="close_sidepanel"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="gilroy-semi font-22 mb-3">London to Dubai</h4>
                            <p class="gilroy-medium font-14 mb-3">Etihad Airways • Sat, May 15</p>
                            <p class="gilroy-regular font-12 mb-2">3:20am - 10:55am</p>
                            <p class="gilroy-regular font-12 mb-2">10h 35m (1 stop)</p>
                            <p class="gilroy-regular font-12">1h 20m in Kyiv (KBP)</p>
                        </div>
                        <div><img class="icon-50px" src="/image/emirates.png" /></div>
                    </div>
                    <p class="gilroy-semi font-18 mb-3">Selected fare to London</p>
                    <p class="gilroy-regular font-12">Your selection applies to all flights</p>
                    <div class="bg-white border-d2d2d2 p-4 mb-4">
                        <h4 class="gilroy-semi font-24 mb-2">$622</h4>
                        <p class="gilroy-regular font-12 mb-2">Roundtrip per traveler</p>
                        <p class="gilroy-semi text-000941 font-12 mb-2">Cabin: Economy</p>
                        <div class="d-flex align-items-center mb-2"><img class="icon-16px mr-2"
                                src="/image/doller.png"><span class="gilroy-regular font-12 text-23242c">Seat choice</span>
                        </div>
                        <div class="d-flex align-items-center mb-2"><img class="icon-14px mr-2" src="/image/close.png"><span
                                class="gilroy-regular font-12 text-23242c">Seat choice</span></div>
                        <div class="d-flex align-items-center mb-2"><img class="icon-16px mr-2"
                                src="/image/double-check.png"><span class="gilroy-regular font-12 text-23242c">Seat
                                choice</span></div>
                        <div class="d-flex align-items-center mb-3"><a
                                class="btn btn-link gilroy-semi font-12 text-fe2f70 p-0" href="#">Show less</a></div>
                        <hr />
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div><span class="gilroy-regular font-12">Show less</span></div>
                            <div><span class="gilroy-regular font-12">Included up to 7 kg</span></div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-fe2f70 box-shadow-fe2f70 btn-block font-12">Check
                            </button>
                        </div>
                    </div>
                    <p class="gilroy-regular font-12 mb-3">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                        diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                        vero
                        eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                        sanctus
                        est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                        diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                        vero
                        eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                        sanctus
                        est Lorem ipsum dolor sit amet.orem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                        vero
                        eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                        sanctus
                        est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                        diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed di</p>
                    <p class="gilroy-semi font-14 mb-2">4 cleaning and safety practices for Ukraine International
                        Airlines
                    </p>
                    <div class="d-flex align-items-center mb-2"><img class="icon-16px mr-2"
                            src="/image/disinfactor.png"><span class="gilroy-regular font-12 text-23242c">Cleaned with
                            disinfectants</span></div>
                    <div class="d-flex align-items-center mb-2"><img class="icon-16px mr-2" src="/image/mask.png"><span
                            class="gilroy-regular font-12 text-23242c">Mask</span></div>
                    <div class="d-flex align-items-center mb-2"><img class="icon-16px mr-2"
                            src="/image/temperature.png"><span class="gilroy-regular font-12 text-23242c">Temperature</span>
                    </div>
                    <p class="gilroy-regular font-12 mb-0">This information is provided by our partners.</p>
                </div>
                <div id="container-1" class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <div class="trippbo-btn-bar gilroy-medium font-12">
                            <button style="border-radius: 15px !important"
                                :class="{'trippbo-btn-active' : flight_trip_type == 'round trip'}"
                                v-on:click="flight_trip_type = 'round trip'" {{-- onclick="openFlights(event,'one-trip');" --}}>Roundtrip
                            </button>
                            <button style="border-radius: 15px !important"
                                :class="{'trippbo-btn-active' : flight_trip_type == 'one way'}"
                                v-on:click="flight_trip_type = 'one way'" {{-- onclick="openFlights(event,'one-way');" --}}>One Way</button>
                            <button style="display:none !important"
                                :class="{'trippbo-btn-active' : flight_trip_type == 'multi city'}"
                                v-on:click="flight_trip_type = 'multi city'" {{-- onclick="openFlights(event,'multi-city');" --}}>Multi-City</button>
                        </div>
                    </div>
                    <div>
                        <div @mouseover="flights_travelers_count_display = 'block'"
                            @mouseleave="flights_travelers_count_display = 'none'" class="trippbo-dropdown">
                            <button class="gilroy-medium text-000941 font-12 ">@{{ flights_number_of_adults + flights_number_of_children + flights_number_of_babies }}
                                Traveler(s) <i class="fa fa-angle-down font-14 font-weight-bold ml-1"></i></button>
                            <div :style="{display: flights_travelers_count_display}">
                                <p v-on:click='flights_travelers_count_display = "none"' class="gilroy-medium font-12 mb-2">
                                    <img class="icon-10px mr-2 hlg" src="{{ asset('image/close.PNG') }}" />
                                    Travelers
                                </p>
                                {{-- <p class="gilroy-medium font-10 mb-2 text-23242c opacity-0-5">Room 1</p> --}}
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="w-60"><span class="gilroy-medium font-12">Adult</span>
                                    </div>
                                    <div class="w-40">
                                        <div class="increamentor">
                                            <div
                                                v-on:click="flights_number_of_adults > 1 ? flights_number_of_adults -=1 : '' ">
                                                <i class="fa fa-minus-circle increamentor-minus"
                                                    :class="{'increamentor-not-allowed' : flights_number_of_adults < 2 , 'increamentor-opacity' : flights_number_of_adults < 2}"></i>
                                            </div>
                                            <div><input type="text" class="increamentor-number "
                                                    :class="{ 'increamentor-opacity' : flights_number_of_adults < 1}"
                                                    :value="flights_number_of_adults" readonly="readonly">
                                            </div>
                                            <div
                                                v-on:click="flights_number_of_adults < 9 ? flights_number_of_adults +=1 : '' ">
                                                <i class="fa fa-plus-circle increamentor-plus"
                                                    :class="{'increamentor-not-allowed' : flights_number_of_adults == 9 , 'increamentor-opacity' : flights_number_of_adults == 9}"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="w-60"><span class="gilroy-medium font-12">Child <span
                                                style="    font-size: 10px;
                                                                                                                            color: rgb(35, 36, 44);
                                                                                                                            opacity: 0.7;">(Ages 2
                                                to
                                                11)</span></span>
                                    </div>
                                    <div class="w-40">
                                        <div id="children-increament" class="increamentor">
                                            <div
                                                v-on:click="flights_number_of_children > 0 ? flights_number_of_children -=1 : '' ">
                                                <i class="fa fa-minus-circle increamentor-minus"
                                                    :class="{'increamentor-not-allowed' : flights_number_of_children < 1 , 'increamentor-opacity' : flights_number_of_children < 1}"></i>
                                            </div>
                                            <div><input type="text" class="increamentor-number "
                                                    :class="{ 'increamentor-opacity' : flights_number_of_children < 1}"
                                                    :value="flights_number_of_children" readonly="readonly">
                                            </div>
                                            <div
                                                v-on:click="flights_number_of_children < 9 ? flights_number_of_children +=1 : '' ">
                                                <i class="fa fa-plus-circle increamentor-plus"
                                                    :class="{'increamentor-not-allowed' : flights_number_of_children == 9 , 'increamentor-opacity' : flights_number_of_children == 9}"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="w-60"><span class="gilroy-medium font-12">Baby <span
                                                style="    font-size: 10px;
                                                                                                                        color: rgb(35, 36, 44);
                                                                                                                        opacity: 0.7;">(Younger
                                                than
                                                2)</span></span>
                                    </div>
                                    <div class="w-40">
                                        <div id="baby-increament" class="increamentor">
                                            <div
                                                v-on:click="flights_number_of_babies > 0 ? flights_number_of_babies -=1 : '' ">
                                                <i class="fa fa-minus-circle increamentor-minus"
                                                    :class="{'increamentor-not-allowed' : flights_number_of_babies < 1 , 'increamentor-opacity' : flights_number_of_babies < 1}"></i>
                                            </div>
                                            <div><input type="text" class="increamentor-number "
                                                    :class="{ 'increamentor-opacity' : flights_number_of_babies < 1}"
                                                    :value="flights_number_of_babies" readonly="readonly">
                                            </div>
                                            <div
                                                v-on:click="flights_number_of_babies < 9 ? flights_number_of_babies +=1 : '' ">
                                                <i class="fa fa-plus-circle increamentor-plus"
                                                    :class="{'increamentor-not-allowed' : flights_number_of_babies == 9 , 'increamentor-opacity' : flights_number_of_babies == 9}"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-end mb-2">
                                    <div><span class="gilroy-semi font-12 text-fe2f70">Add Room</span></div>
                                </div> --}}
                                <div v-on:click="flights_travelers_count_display = 'none'">
                                    <button type="button" class="btn btn-block btn-000941 font-12">Done
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="trippbo-dropdown" @mouseenter="flight_class_type_display = 'block'"
                            @mouseleave="flight_class_type_display = 'none'">
                            <button class="gilroy-medium text-000941 font-12">@{{ flights_class }} <i
                                    class="fa fa-angle-down font-14 font-weight-bold ml-1"></i></button>
                            <div :style="{display: flight_class_type_display}" class="p-0 min-width-175px">
                                <button v-on:click="flight_class_type_display = 'none'" type="button"
                                    class="btn btn-block text-left hlg"><img class="icon-10px mr-2 hlg"
                                        src="{{ asset('image/close.PNG') }}" />
                                </button>

                                <ul>


                                    <li><a class="btn gilroy-medium font-12"
                                            :class="{'trippbo-dropdown-active' : flights_class == 'Economy' }"
                                            v-on:click=" flights_class = 'Economy'">Economy</a></li>
                                    <li><a class="btn gilroy-medium font-12"
                                            :class="{'trippbo-dropdown-active' : flights_class == 'Business' }"
                                            v-on:click=" flights_class = 'Business'">Business</a></li>
                                    <li><a class="btn gilroy-medium font-12"
                                            :class="{'trippbo-dropdown-active' : flights_class == 'First' }"
                                            v-on:click=" flights_class = 'First'">First</a></li>
                                    <li><a class="btn gilroy-medium font-12"
                                            :class="{'trippbo-dropdown-active' : flights_class == 'Premium Economy' }"
                                            v-on:click=" flights_class = 'Premium Economy'"> Premium Economy</a>
                                    </li>
                                    <li><a class="btn gilroy-medium font-12"
                                            :class="{'trippbo-dropdown-active' : flights_class == 'Premium Business' }"
                                            v-on:click=" flights_class = 'Premium Business'"> Premium
                                            Business</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="container-2" class="form-group row px-2">
                    <div class="col-sm-6 px-1 mb-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="position-relative inputField-box w-100"><img class="icon-18px mr-1"
                                        src="/image/location.png"><input v-model="flightOrigin"
                                        v-on:input="flightOrigin = $event.target.value" type="text"
                                        class="inputField inputField-withicon add-border-radius" placeholder="Leaving" />

                                    <div class="w-100"
                                        style="position: absolute;z-index:10;background-color:white;">
                                        <autocomplete-airport-component
                                            @autocomplete_result_selected="selectFlightOriginResult"
                                            :keyword="flightOrigin">
                                        </autocomplete-airport-component>
                                    </div>

                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="position-relative inputField-box w-100"><img
                                        src="/image/arrow-right-shadow.svg" class="field-connector" /><img
                                        class="icon-18px mr-1" src="/image/location.png"><input type="text"
                                        v-model="flightDestination" v-on:input="flightDestination = $event.target.value"
                                        class="inputField inputField-withicon add-border-radius" placeholder="Going" />
                                    <div class="w-100"
                                        style="position: absolute;z-index:10;background-color:white;">
                                        <autocomplete-airport-component
                                            @autocomplete_result_selected="selectFlightDestinationResult"
                                            :keyword="flightDestination">
                                        </autocomplete-airport-component>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 px-1 mb-2">
                        <div class="position-relative inputField-box">

                            <vc-date-picker v-if="flight_trip_type == 'round trip'" v-model="selectedFlightRange"
                                :min-date='new Date()' color="pink" is-range
                                :masks="{iso: 'YYYY-MM-DD',input: ['MMM, DD'] }">
                                <template v-slot="{ inputValue, inputEvents }">
                                    <div class="flex justify-center items-center">
                                        <img class="icon-18px mr-1" src="/image/policy.png"><input
                                            :value="inputValue.start + ' To ' + inputValue.end" v-on="inputEvents.start"
                                            class="inputField inputField-withicon add-border-radius w-100" />


                                    </div>
                                </template>
                            </vc-date-picker>
                            <vc-date-picker v-if="flight_trip_type == 'one way'" v-model="selectedFlightOnewayDate"
                                :min-date='new Date()' color="pink" :masks="{iso: 'YYYY-MM-DD',input: ['MMM, DD'] }">
                                <template v-slot="{ inputValue, inputEvents }">
                                    <div class="flex justify-center items-center">
                                        <img class="icon-18px mr-1" src="/image/policy.png"><input :value="inputValue"
                                            v-on="inputEvents"
                                            class="inputField inputField-withicon add-border-radius w-100" />


                                    </div>
                                </template>
                            </vc-date-picker>
                        </div>
                    </div>


                    <div class="col-sm-2 px-1 mb-2">
                        <button class="btn_search add-border-radius" v-on:click="updateResults()">Search</button>
                    </div>
                </div>
                <v-app v-if="loading">
                    <v-progress-linear indeterminate color="pink"></v-progress-linear>
                </v-app>
                <div class="row">
                    <aside id="aside" class="col-sm-12 col-lg-4">
                        <div id="container-3" class="d-flex align-items-center justify-content-between my-3">
                            <div>
                                <button class="btn font-16" v-on:click="close_aside"><i class="fa fa-times mr-1"></i>
                                    <span>Sort & Filter</span></button>
                            </div>
                            <div>
                                <button class="btn gilroy-semi font-16 text-fe2f70">Clear</button>
                            </div>
                        </div>

                        <h4 v-if="!loading" id="h4-1" class="gilroy-medium font-22 mb-3">Filter by</h4>
                        <v-app v-if="loading">
                            <v-skeleton-loader type="list-item-two-line"></v-skeleton-loader>
                        </v-app>
                        {{-- <p class="gilroy-medium font-16 mb-2">Flexible change policies</p>
                        <div class="mb-4"><label class="trippbo-checkbox gilroy-regular">No change fee<input
                                    type="checkbox" checked="checked" name="change" /><span></span></label></div> --}}
                        <hr v-if="!loading" class="mb-4" />
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <div v-if="!loading">
                                <h4 class="gilroy-medium font-22">Stops</h4>
                            </div>

                            <div v-if="!loading"><span class="gilroy-medium font-16">From</span></div>
                        </div>
                        <div v-if="!loading && stopFilter.numOfFlights > 0"
                            v-for="(stopFilter, stopFilterIndex) in stopsFilter" :key="stopFilterIndex"
                            v-on:click="stopFilter.enabled = !stopFilter.enabled;applyFilters()"
                            class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">@{{ stopFilter.name }}
                                    (@{{ stopFilter.numOfFlights }})<input :checked="stopFilter.enabled" type="checkbox"
                                        disabled /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">@{{ stopFilter.currency }}
                                    @{{ stopFilter.cheapestFlight }}</span>
                            </div>
                        </div>


                        <hr v-if="!loading" class="mb-4" />
                        {{-- <h4 v-if="!loading" class="gilroy-medium font-22 mb-3">Budget</h4>
                        <div v-if="!loading" v-for="(budget, key, index) in budgetFilter" v-on:click="activateBudget(index)"
                            :key="index">

                            <label class="trippbo-radio gilroy-regular"
                                style="font-size:0.75rem !important; margin-bottom:0.25rem !important"><input type="radio"
                                    :checked="budget.enabled" name="budget" />
                                @{{ index == 0 ? 'Any' : (index < 3 ? budget.min + String(' ' + currency) + ' - ' + budget.max + String(' ' + currency) : budget.min + String(' ' + currency) + ' or greater') }}<span></span></label>
                        </div> --}}

                        <h4 v-if="!loading" class="gilroy-medium font-22 mb-3">Budget</h4>
                        <div v-if="!loading" v-for="(budget, key, index) in budgetFilter" v-on:click="activateBudget(index)"
                            :key="index" class="mb-1"><label
                                class="trippbo-radio gilroy-regular">@{{ index == 0 ? 'Any' : (index < 3 ? budget.min + String(' ' + currency) + ' - ' + budget.max + String(' ' + currency) : budget.min + String(' ' + currency) + ' or greater') }}<input type="radio"
                                    :checked="budget.enabled" name="budget" /><span></span></label>
                        </div>
                        {{-- <div class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">1 Stop (33)<input type="checkbox"
                                        checked="checked" name="stops" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$681</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">2+ Stops (27)<input type="checkbox"
                                        name="stops" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$713</span></div>
                        </div> --}}
                        <hr v-if="!loading" class="mb-4" />
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <div v-if="!loading">
                                <h4 class="gilroy-medium font-22">Airlines</h4>
                            </div v-if="!loading">
                            <div v-if="!loading"><span class="gilroy-medium font-16">From</span></div>
                        </div>
                        <div v-if="!loading" v-for="(airlineFilter, airlineFilterIndex) in airlinesFilter"
                            :key="airlineFilterIndex" @mouseover="setMouseOver(airlineFilterIndex, true)"
                            @mouseleave="setMouseOver(airlineFilterIndex ,false)"
                            v-on:click="airlineFilter.enabled = !airlineFilter.enabled; applyFilters()"
                            class="d-flex align-items-center justify-content-between mb-1">
                            <div><label
                                    class="trippbo-checkbox gilroy-regular font-12 d-flex flex-row">@{{ airlineFilter.name }}
                                    (@{{ airlineFilter.numOfFlights }}) <div v-if="airlineFilter.mouseOver" style="color:#fe2f70"
                                        class="ml-2"
                                        v-on:click.stop="activateOnlyThisAirlineFilter(airlineFilterIndex)">Only This</div>
                                    <input type="checkbox" :checked="airlineFilter.enabled" disabled
                                        name="line" /><span></span></label>
                            </div>
                            <div><span class="gilroy-regular font-12">@{{ airlineFilter.currency }}
                                    @{{ airlineFilter.cheapestFlight }}</span></div>
                        </div>


                        {{-- <div class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">Air France (11)<input
                                        type="checkbox" name="lines" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$858</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">Gulf Air (8)<input type="checkbox"
                                        name="lines" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$722</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">Turkish Airlines (6)<input
                                        type="checkbox" name="lines" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$722</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">British Airways (3)<input
                                        type="checkbox" name="lines" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$722</span></div>
                        </div>
                        <p class="mb-4"><a
                                class="btn btn-link gilroy-semi font-12 text-decoration-underline text-fe2f70 p-0"
                                href="#">See more</a></p> --}}
                        <hr v-if="!loading" class="mb-4" />
                        <h4 v-if="!loading" class="gilroy-medium font-22 mb-3">Departure time</h4>
                        <div v-if="!loading" class="departure-grid mb-3">
                            <div v-for="(time, timeIndex) in timeFilter" :key="timeIndex" class="time-filter "
                                :class="{'selected' : time.enabled}"
                                v-on:click="time.enabled = !time.enabled;applyFilters()">
                                <div class="d-flex flex-column align-items-center">
                                    <div><img class="icon-30px mr-2 " :class="{'selected-image' : time.enabled}"
                                            src="/image/morning.svg"></div>
                                    <div><span class="gilroy-medium font-12 " :class="{'selected' : time.enabled}">
                                            @{{ time.text }}</span></div>
                                    <div><span class="gilroy-regular font-10 "
                                            :class="{'selected' : time.enabled}">@{{ time.fromTime }}:00 to
                                            @{{ time.toTime }}:00</span></div>
                                </div>
                            </div>

                        </div>

                        <hr v-if="!loading" class="mb-4" />
                        <h4 v-if="!loading" class="gilroy-medium font-22 mb-3">Arrival time</h4>
                        <div v-if="!loading" class="departure-grid mb-3">
                            <div v-for="(time, timeIndex) in arrivalTimeFilter" :key="timeIndex" class="time-filter "
                                :class="{'selected' : time.enabled}"
                                v-on:click="time.enabled = !time.enabled;applyFilters()">
                                <div class="d-flex flex-column align-items-center">
                                    <div><img class="icon-30px mr-2 " :class="{'selected-image' : time.enabled}"
                                            src="/image/morning.svg"></div>
                                    <div><span class="gilroy-medium font-12 "
                                            :class="{'selected' : time.enabled}">@{{ time.text }}
                                        </span></div>
                                    <div><span class="gilroy-regular font-10 "
                                            :class="{'selected' : time.enabled}">@{{ time.fromTime }}:00 to
                                            @{{ time.toTime }}:00</span></div>
                                </div>
                            </div>

                        </div>
                        {{-- <h4 class="gilroy-medium font-22 mb-3">Departure time in London</h4>
                        <div class="departure-grid mb-4">
                            <div>
                                <div class="d-flex flex-column align-items-center">
                                    <div><img class="icon-30px mr-2" src="/image/morning.svg"></div>
                                    <div><span class="gilroy-medium font-12">Early Morning</span></div>
                                    <div><span class="gilroy-regular font-10">12:00 Am to 4:59 Am</span></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex flex-column align-items-center">
                                    <div><img class="icon-30px mr-2" src="/image/sun.png"></div>
                                    <div><span class="gilroy-medium font-12">Early Morning</span></div>
                                    <div><span class="gilroy-regular font-10">12:00 Am to 4:59 Am</span></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex flex-column align-items-center">
                                    <div><img class="icon-30px mr-2" src="/image/afternoon.svg"></div>
                                    <div><span class="gilroy-medium font-12">Early Morning</span></div>
                                    <div><span class="gilroy-regular font-10">12:00 Am to 4:59 Am</span></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex flex-column align-items-center">
                                    <div><img class="icon-30px mr-2" src="/image/evening.svg"></div>
                                    <div><span class="gilroy-medium font-12">Early Morning</span></div>
                                    <div><span class="gilroy-regular font-10">12:00 Am to 4:59 Am</span></div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4" /> --}}
                        {{-- <div class="d-flex align-items-center justify-content-between mb-1">
                            <div>
                                <h4 class="gilroy-medium font-22">Arrival airports</h4>
                            </div>
                            <div><span class="gilroy-medium font-16">From</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">KLM (34)<input type="checkbox"
                                        checked="checked" name="airports" /><span></span></label>
                            </div>
                            <div><span class="gilroy-regular font-12">$695</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">LHR (London) (52)<input
                                        type="checkbox" name="airports" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$858</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">LCY (London) (6)<input
                                        type="checkbox" name="airports" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$722</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">LGW (London) (2)<input
                                        type="checkbox" name="airports" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$722</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">Turkish Airlines (6)<input
                                        type="checkbox" name="airports" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$722</span></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div><label class="trippbo-checkbox gilroy-regular font-12">British Airways (3)<input
                                        type="checkbox" name="airports" /><span></span></label></div>
                            <div><span class="gilroy-regular font-12">$722</span></div>
                        </div> --}}
                    </aside>
                    <main class="col-sm-12 col-lg-8">
                        {{-- <div class="trippbo-date-dropdown hsm">
                            <section id="flexible-dates" class="flexible-dates bg-white border-d2d2d2 px-4 py-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div>
                                            <p class="gilroy-semi font-16 text-align-left mb-1">Flexible Dates</p>
                                        </div>
                                        <div>
                                            <p class="gilroy-regular font-12 mb-0">Compare cheapest prices for near by days
                                            </p>
                                        </div>
                                    </div>
                                    <div><i class="fa fa-angle-down font-22 font-weight-bold"></i></div>
                                </div>
                            </section>
                            <div>
                                <div class="calender-container">
                                    <div class="calender-head"><span>Departure<span> <i class="fa fa-arrow-right"></i>
                                    </div>
                                    <div class="calender-head"><span>Sat<br />May 8</span></div>
                                    <div class="calender-head"><span>Sun<br />May 9</span></div>
                                    <div class="calender-head"><span>Mon<br />May 10</span></div>
                                    <div class="calender-head"><span>Tue<br />May 11</span></div>
                                    <div class="calender-head"><span>Wed<br />May 12</span></div>
                                    <div class="calender-head"><span>Thu<br />May 13</span></div>
                                    <div class="calender-head"><span>Fri<br />May 14</span> <button><i
                                                class="fa fa-arrow-right"></i></button></div>

                                    <div class="date-grid-head-column"><span>Sat<br />May 8</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>

                                    <div class="date-grid-head-column"><span>Sun<br />May 9</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>

                                    <div class="date-grid-head-column"><span>Mon<br />May 10</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>

                                    <div class="date-grid-head-column"><span>Tue<br />May 11</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>
                                    <div><span>$300</span></div>

                                    <div class="date-grid-head-column"><span>Wed<br />May 12</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>
                                    <div><span>$200</span></div>

                                    <div class="date-grid-head-column"><span>Thu<br />May 13</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>

                                    <div class="date-grid-head-column"><span>Fri<br />May 14</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>
                                    <div><span>$80</span></div>

                                    <div id="rotate"
                                        class="align-items-center bg-white d-flex flex-column justify-content-between py-3 rotate">
                                        <div><img src="/image/return.png" /></div>
                                        <div>
                                            <div class="d-flex flex-column">
                                                <button class="mb-2"><i class="fa fa-arrow-up"></i></button>
                                                <button><i class="fa fa-arrow-down"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}
                        <div v-if="!loading && flight_trip_type == 'one way'"
                            class="d-flex flex-row justify-content-between mt-2 align-items-center">
                            <div v-for="(scrollbarDate, scrollbarDateIndex) in scrollbarDateRange"
                                :key="scrollbarDateIndex">
                                <div v-on:click="selectDateFromScrollBar(scrollbarDate)" class="scrollbarDate"
                                    :class="{'scrollbarDateActive' : scrollbarDate == selectedFlightOnewayDateOrdered}">
                                    @{{ scrollbarDate }}
                                </div>
                            </div>
                        </div>
                        <div v-if="!loading && flight_trip_type == 'round trip'" class="trippbo-date-dropdown hsm mt-2">
                            <section id="flexible-dates" class="flexible-dates bg-white border-d2d2d2 px-4 py-3" style="border-radius: 15px !important;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div>
                                            <p class="gilroy-semi font-16 text-align-left mb-1">Flexible Dates</p>
                                        </div>
                                        <div>
                                            <p class="gilroy-regular font-12 mb-0">Compare cheapest prices for near by days
                                            </p>
                                        </div>
                                    </div>
                                    <div><i class="fa fa-angle-down font-22 font-weight-bold" aria-hidden="true"></i></div>
                                </div>
                            </section>
                            <div >
                                <div class="calender-container">
                                    <div class="calender-head"><span>Departure<span> <i class="fa fa-arrow-right"
                                                    aria-hidden="true"></i></span></span></div>

                                    <div v-for="(date, dateIndex) in tableDateRange" :key="dateIndex"
                                        class="calender-head">
                                        {{-- <span>Sat<br>May 8</span> --}}@{{ date[dateIndex].departure_date }} </div>


                                    <template v-for="(date, dateIndex) in tableDateRange">
                                        <div class="date-grid-head-column">@{{ date[dateIndex].return_date }} {{-- <span>Sat<br>May 8</span> --}}
                                        </div>
                                        <div
                                            v-on:click="selectDateFromDateTable(date[0].departure_date, date[dateIndex].return_date)">
                                            <span>Search</span>
                                        </div>
                                        <div v-on:click="selectDateFromDateTable(date[1].departure_date, date[dateIndex].return_date)"><span>Search</span></div>
                                        <div v-on:click="selectDateFromDateTable(date[2].departure_date, date[dateIndex].return_date)"><span>Search</span></div>
                                        <div v-on:click="selectDateFromDateTable(date[3].departure_date, date[dateIndex].return_date)"><span>Search</span></div>
                                        <div v-on:click="selectDateFromDateTable(date[4].departure_date, date[dateIndex].return_date)"><span>Search</span></div>
                                        <div v-on:click="selectDateFromDateTable(date[5].departure_date, date[dateIndex].return_date)"><span>Search</span></div>
                                        <div v-on:click="selectDateFromDateTable(date[6].departure_date, date[dateIndex].return_date)"><span>Search</span></div>
                                    </template>



                                    <div id="rotate"
                                        class="align-items-center bg-white d-flex flex-column justify-content-between py-3 px-1 rotate">
                                        <div><img src="/image/return.png"></div>
                                        {{-- <div>
											<div class="d-flex flex-column">
												<button class="mb-2"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
												<button><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
											</div>
										</div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="container-total-flight" class="my-3">
                            <div class="d-flex align-items-center bg-fafafa px-3 add-border-radius">
                                <div><span class="gilroy-semi text-fe2f70 font-14 mr-1">@{{ flights.length }}</span>
                                    <span class="gilroy-regular font-14">Flights available</span>
                                </div>
                            </div>
                            <div>
                                <div class="position-relative inputField-box">
                                    <select v-model="sortByFilter" v-on:input="sortByFilterUpdated"
                                        class="inputField inputField-withicon add-border-radius pl-3">
                                        <option value="1" selected="">Lowest Price</option>
                                        <option value="2">Highest Price</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div id="container-filter" class="mb-3">
                            <div class="d-flex align-items-center justify-content-between bg-fafafa p-3">
                                {{-- <div>
                                    <div class="gilroy-medium font-12"><span>Dubai (DXB)</span> - <span>London (LHR)</span>
                                    </div>
                                    <p class="gilroy-regular font-10 opacity-0-37 mb-0">Aug 21 - Aug 22</p>
                                </div> --}}
                                <div>
                                    <button id="btn-filter" v-on:click="open_aside"
                                        class="btn gilroy-semi font-12 text-fe2f70 d-flex align-items-center justify-content-between p-0">
                                        <img class="icon-14px mr-1" src="/image/filter.png" />
                                        <span>Filter</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-show="loading" class="w-100">
                            <img src="/image/loading.gif" class="img-fluid w-100" />
                        </div>
                        <div v-if="loading" class="mt-4">
                            <div style="border: 1px solid #d2d2d2;" class="mb-4 add-border-radius">
                                <div class="p-2">
                                    <v-app>
                                        <v-skeleton-loader type="list-item-two-line"></v-skeleton-loader>
                                    </v-app>
                                </div>
                            </div>
                            <div style="border: 1px solid #d2d2d2;" class="mb-4 add-border-radius">
                                <div class="p-2">
                                    <v-app>
                                        <v-skeleton-loader type="list-item-two-line"></v-skeleton-loader>
                                    </v-app>
                                </div>
                            </div>
                            <div style="border: 1px solid #d2d2d2;" class="mb-4 add-border-radius">
                                <div class="p-2">
                                    <v-app>
                                        <v-skeleton-loader type="list-item-two-line"></v-skeleton-loader>
                                    </v-app>
                                </div>
                            </div>
                        </div>

                        <ul class="flight-available">
                            <div v-for="(flight, index) in flights.slice(0,number_of_displayed_results) " :key="index"
                                class="col-12 border pt-0 add-border-radius">
                                <div class="row">
                                    <div v-for="(segment, segmentIndex) in flight.details" :key="segmentIndex"
                                        class="col-md-6">

                                        <div class="d-flex align-items-center mb-2 justify-content-center mt-2">
                                            <div class="d-flex mr-2"><img class="icon-20px"
                                                    src="/image/plane-circle.svg"></div>
                                            <div>
                                                <h4 class="gilroy-semi text-fe2f70 text-center font-16 mb-0">
                                                    @{{ segmentIndex == 0 ? 'Departing Flight' : 'Returning Flight' }}
                                                    <span class="gilroy-regular">-
                                                        @{{ extractFlightDepartureDateHeaderFormat(segment) }}</span>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2 justify-content-center mt-2">

                                            <h4 class="font-12 opacity-0-5 ">

                                                <span class="gilroy-medium">
                                                    @{{ calculateFlightTotalTime(segment) }}</span>
                                            </h4>

                                        </div>

                                        <div class="rounded-lg p-3">
                                            <div class="timeline">
                                                <div>
                                                    <div class="timeline-container">
                                                        <div>
                                                            <p class="gilroy-medium font-16 mb-0">
                                                                @{{ extractFlightDepartureTime(segment) }}</p>
                                                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                @{{ extractFlightDepartureDate(segment) }}</p>
                                                        </div>
                                                        <div></div>
                                                        <div>
                                                            <h4 class="gilroy-bold font-16 mb-0">
                                                                @{{ extractFlightOrigin(segment) }}</h4>
                                                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                @{{ extractFlightOriginAirport(segment) }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div v-for="(stop, stopIndex) in extractFlightStops(segment)"
                                                    :key="stopIndex" class="stop">
                                                    <div>
                                                        <div class="timeline-container">
                                                            <div>
                                                                <p class="gilroy-medium font-12 opacity-0-5 mb-0 pt-4">
                                                                    @{{ extractStoptFlyTime(stop.flight.Duration) }}
                                                                </p>
                                                            </div>
                                                            <div></div>
                                                            <div>
                                                                <div v-on:click="toggleTimelineAccordion($event)"
                                                                    class="timeline-accordion w-100 rounded-lg mb-4">
                                                                    <button
                                                                        class="gilroy-semi font-size-11 timeline-accordion-button">
                                                                        <img :src="'/images-n/airline_logo/' + stop.flight.OperatorCode + '.gif'"
                                                                            width="30px" class="add-border-radius-image">
                                                                        @{{ stop.flight.OperatorName }}
                                                                    </button>
                                                                    <div class="accordion-content">


                                                                        <p class="mb-0"><span
                                                                                class="font-size-11">
                                                                                @{{ stop.flight.OperatorCode }}
                                                                                @{{ stop.flight.FlightNumber }}</span>
                                                                        </p>
                                                                        <p class="mb-0"><img src="/img/seat.png"
                                                                                width="15px" height="15px"><span
                                                                                class="font-size-11">@{{ stop.flight.Attr.AvailableSeats }}
                                                                                Available Seats</span>
                                                                        </p>

                                                                        <p class="mb-0"><i
                                                                                class="fas fa-suitcase-rolling mr-2"></i><span
                                                                                class="font-size-11">Checked Baggage
                                                                                @{{ stop.flight.Attr.Baggage }}</span>
                                                                        </p>
                                                                        <p class="mb-0"><i
                                                                                class="fas fa-suitcase"></i> <span
                                                                                class="font-size-11">Cabin
                                                                                Baggage @{{ stop.flight.Attr.CabinBaggage ?? '0 KG' }}</span>
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="transferred">
                                                        <div>
                                                            <div class="transferred-container">
                                                                <div>
                                                                    <p class="gilroy-medium font-16 mb-0">
                                                                        @{{ formatStopTime(stop.flight.Destination.DateTime) }}
                                                                    </p>
                                                                    <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                        @{{ formatStopDate(stop.flight.Destination.DateTime) }}
                                                                    </p>
                                                                </div>
                                                                <div></div>
                                                                <div>
                                                                    <h4 class="gilroy-bold font-16 mb-0">
                                                                        @{{ stop.flight.Destination.CityName }}
                                                                    </h4>
                                                                    <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                        @{{ stop.flight.Destination.AirportName }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="transferred-container">
                                                                <div>
                                                                    <p class="gilroy-medium font-16 text-ff0000 mb-0">
                                                                        @{{ extractDifferenceInTime(stop.flight.Destination.DateTime, stop.nextFlight.Origin.DateTime) }}
                                                                    </p>
                                                                </div>
                                                                <div></div>
                                                                <div>
                                                                    <p class="gilroy-medium font-16 text-ff0000 mb-0">
                                                                        transferred
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="transferred-container">
                                                                <div>
                                                                    <p class="gilroy-medium font-16 mb-0">
                                                                        @{{ formatStopTime(stop.nextFlight.Origin.DateTime) }}
                                                                    </p>
                                                                    <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                        @{{ formatStopDate(stop.nextFlight.Origin.DateTime) }}

                                                                    </p>
                                                                </div>
                                                                <div></div>
                                                                <div>
                                                                    <h4 class="gilroy-bold font-16 mb-0">
                                                                        @{{ stop.nextFlight.Origin.CityName }}
                                                                    </h4>
                                                                    <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                        @{{ stop.nextFlight.Origin.AirportName }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div v-once v-if="stop.isLast == true">
                                                        <div class="timeline-container">
                                                            <div>
                                                                <p class="gilroy-medium font-12 opacity-0-5 mb-0 pt-4">
                                                                    @{{ extractStoptFlyTime(stop.nextFlight.Duration) }}
                                                                </p>
                                                            </div>
                                                            <div></div>
                                                            <div>
                                                                <div v-on:click="toggleTimelineAccordion($event)"
                                                                    class="timeline-accordion mb-4 w-100 rounded-lg">
                                                                    <button
                                                                        class="gilroy-semi font-size-11 timeline-accordion-button">
                                                                        <img :src="'/images-n/airline_logo/' + stop.nextFlight.OperatorCode + '.gif'"
                                                                            width="30px" class="add-border-radius-image">
                                                                        @{{ stop.nextFlight.OperatorName }}
                                                                    </button>
                                                                    <div class="accordion-content">


                                                                        <p class="mb-0"><span
                                                                                class="font-size-11">@{{ stop.nextFlight.OperatorCode }}
                                                                                @{{ stop.nextFlight.FlightNumber }}</span>
                                                                        </p>

                                                                        <p class="mb-0"><img src="/img/seat.png"
                                                                                width="15px" height="15px"><span
                                                                                class="font-size-11">@{{ stop.nextFlight.Attr.AvailableSeats }}
                                                                                Available Seats</span>
                                                                        </p>

                                                                        <p class="mb-0"><i
                                                                                class="fas fa-suitcase-rolling mr-2"></i><span
                                                                                class="font-size-11">Checked Baggage
                                                                                @{{ stop.nextFlight.Attr.Baggage }}</span>
                                                                        </p>
                                                                        <p class="mb-0"><i
                                                                                class="fas fa-suitcase"></i> <span
                                                                                class="font-size-11">Cabin
                                                                                Baggage @{{ stop.nextFlight.Attr.CabinBaggage ?? '0 KG' }}</span>
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div v-if="extractFlightStops(segment) == 0" class="stop">
                                                    <div>
                                                        <div class="timeline-container">
                                                            <div>
                                                                <p class="gilroy-medium font-12 opacity-0-5 mb-0 pt-4">
                                                                    @{{ extractStoptFlyTime(segment[0].Duration) }}
                                                                </p>
                                                            </div>
                                                            <div></div>
                                                            <div>
                                                                <div v-on:click="toggleTimelineAccordion($event)"
                                                                    class="timeline-accordion w-100 rounded-lg mb-4">
                                                                    <button
                                                                        class="gilroy-semi font-size-11 timeline-accordion-button">
                                                                        <img :src="'/images-n/airline_logo/' + segment[0].OperatorCode + '.gif'"
                                                                            width="30px" class="add-border-radius-image">
                                                                        @{{ segment[0].OperatorName }}
                                                                    </button>
                                                                    <div class="accordion-content">
                                                                        <p class="mb-0"><span
                                                                                class="font-size-11">@{{ segment[0].OperatorCode }}
                                                                                @{{ segment[0].FlightNumber }}</span>
                                                                        </p>

                                                                        <p class="mb-0"><img src="/img/seat.png"
                                                                                width="15px" height="15px"><span
                                                                                class="font-size-11">@{{ segment[0].Attr.AvailableSeats }}
                                                                                Available Seats</span>
                                                                        </p>

                                                                        <p class="mb-0"><i
                                                                                class="fas fa-suitcase-rolling mr-2"></i><span
                                                                                class="font-size-11">Checked Baggage
                                                                                @{{ segment[0].Attr.Baggage }}</span>
                                                                        </p>
                                                                        <p class="mb-0"><i
                                                                                class="fas fa-suitcase"></i> <span
                                                                                class="font-size-11">Cabin
                                                                                Baggage @{{ segment[0].Attr.CabinBaggage ?? '0 KG' }}</span>
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div>
                                                    <div class="timeline-container">
                                                        <div>
                                                            <p class="gilroy-medium font-16 mb-0">
                                                                @{{ extractFlightArrivalTime(segment) }}</p>
                                                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                @{{ extractFlightArrivalDate(segment) }}</p>
                                                        </div>
                                                        <div></div>
                                                        <div>
                                                            <h4 class="gilroy-bold font-16 mb-0">
                                                                @{{ extractFlightDestination(segment) }}</h4>
                                                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                @{{ extractFlightDestinationAirport(segment) }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end justify-content-center mb-3">
                                    <div>
                                        {{-- <div v-if="flight.refundable">
                                            <button type="button"
                                                class="btn gilroy-medium btn-000941 font-14 px-3 mb-2">Refundable
                                            </button>
                                        </div> --}}
                                        {{-- <div>
                                            <p class="gilroy-regular font-12 mb-0">5 cleaning and safety practices for
                                                Etihad Airways</p>
                                        </div> --}}
                                    </div>
                                    <div>
                                        <h4 class="gilroy-semi font-22 mb-0 text-align-right">
                                            @{{ flight.priceTotalCurrency }} @{{ extractFlightPrice(flight) }}</h4>
                                        <p class="gilroy-regular font-12 mb-0">Total price for @{{ flight_trip_type }}
                                        </p>


                                    </div>
                                    <div>
                                        <button v-on:click="selectServicePackage(flight)"
                                            class="btn btn-block gilroy-medium btn-fe2f70 add-border-radius">Book
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </ul>
                        <div v-if="flights.length > number_of_displayed_results"
                            class="d-flex justify-content-center text-center">
                            <div style="width:220px;">
                                <button class="btn btn-block gilroy-medium btn-fe2f70 add-border-radius"
                                    v-on:click='showMoreResults'>Show More Results
                                </button>
                            </div>
                        </div>
                        {{-- <ul class="trippbo-pagination">
                            <li><a class="trippbo-pagination-disabled" href="javascript:void(0)"><i
                                        class="fa fa-angle-left"></i></a></li>
                            <li><a class="trippbo-pagination-active" href="javascript:void(0)">1</a></li>
                            <li><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">4</a></li>
                            <li><a href="javascript:void(0)">5</a></li>
                            <li><a class="trippbo-pagination-dots" href="javascript:void(0)">...</a></li>
                            <li><a href="javascript:void(0)">25</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
                        </ul> --}}
                    </main>
                </div>
            </div>
        </section>

    </div>
@endsection
@section('scripts')
    <script src="/js/home/custom.js"></script>
    <script src="/js/home/flights.js"></script>
    <script>
        var timelineAccordionBtn = document.querySelectorAll(".timeline-accordion > button");
        for (var i = 0; i < timelineAccordionBtn.length; i++) {
            timelineAccordionBtn[i].addEventListener("click", function() {
                this.classList.toggle("timeline-accordion-active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = "fit-content";
                }
            });
        }
        $('#myTab a').on('click', function(event) {
            event.preventDefault()
            $(this).tab('show')
        });

        let CancelToken = axios.CancelToken;
        const source = CancelToken.source();

        const v = new Vue({
            el: "#flights_app",
            vuetify: new Vuetify(),
            data: {
                isPackage: "{{ $isPackage }}",
                number_of_displayed_results: 20,
                sortByFilter: "1",
                reveresed: false,
                arrivalTimeFilter: {
                    first: {
                        enabled: true,
                        fromTime: 0,
                        toTime: 6,
                        text: 'Night',
                    },
                    second: {
                        enabled: true,
                        fromTime: 6,
                        toTime: 12,
                        text: 'Morning',
                    },
                    third: {
                        enabled: true,
                        fromTime: 12,
                        toTime: 18,
                        text: 'Afternoon',
                    },
                    forth: {
                        enabled: true,
                        fromTime: 18,
                        toTime: 0,
                        text: 'Evening',
                    },
                },
                timeFilter: {
                    first: {
                        enabled: true,
                        fromTime: 0,
                        toTime: 6,
                        text: 'Night',
                    },
                    second: {
                        enabled: true,
                        fromTime: 6,
                        toTime: 12,
                        text: 'Morning',
                    },
                    third: {
                        enabled: true,
                        fromTime: 12,
                        toTime: 18,
                        text: 'Afternoon',
                    },
                    forth: {
                        enabled: true,
                        fromTime: 18,
                        toTime: 0,
                        text: 'Evening',
                    },
                },
                exchangeRate: 0,
                currency: '',
                budgetFilter: {
                    any: {
                        enabled: true,
                        min: 0,
                        max: 999999999,
                    },
                    first: {
                        enabled: false,
                        min: 0,
                        max: 100,
                    },
                    second: {
                        enabled: false,
                        min: 100,
                        max: 250,
                    },
                    third: {
                        enabled: false,
                        min: 250,
                        max: 999999999,

                    },

                },
                airlinesFilter: {},
                stopsFilter: {
                    direct: {
                        minNoOfStops: 0,
                        maxNoOfStops: 0,
                        name: 'Direct Flights',
                        cheapestFlight: 0,
                        numOfFlights: 0,
                        currency: '',
                        enabled: true,

                    },
                    oneStop: {
                        minNoOfStops: 1,
                        maxNoOfStops: 1,
                        name: 'One Stop',
                        cheapestFlight: 0,
                        numOfFlights: 0,
                        currency: '',
                        enabled: true,

                    },
                    TwoStopsOrMore: {
                        minNoOfStops: 2,
                        maxNoOfStops: 9,
                        name: '2+ Stops',
                        cheapestFlight: 0,
                        numOfFlights: 0,
                        currency: '',
                        enabled: true,

                    },
                },
                isDark: false,
                loading: false,
                allFlights: [],
                flights: [],
                showFlightCalendar: false,
                showFlightOneWayCalendar: false,
                selectedFlightRange: {
                    start: '{{ $departureDate }}',
                    end: '{{ $returnDate }}'
                },
                selectedFlightRangeOrdered: {
                    start: '{{ $departureDate }}',
                    end: '{{ $returnDate }}'
                },
                selectedFlightOnewayDate: '{{ $departureDate }}',
                selectedFlightOnewayDateOrdered: '{{ $departureDate }}',
                flights_number_of_adults: {{ $adultCount }},
                flights_number_of_children: {{ $childCount }},
                flights_number_of_babies: {{ $infantCount }},
                flights_class: '{{ $flight_class }}',
                flightDestinationAirportCode: '{{ $destination }}',
                flight_trip_type: '{{ $flightType }}',
                flightOriginAirportCode: '{{ $origin }}',
                tripId: '{{ $tripId }}',
                directFlightsFilter: {
                    enabled: false,
                    flightsAmount: 0,
                    cheapestFlight: 0
                },
                sidepanelFlight: {},
                flight_service_packages: @json($flightSupportPackages),
                selected_flight_service_package_id: 1,
                flights_travelers_count_display: 'none',
                flight_class_type_display: 'none',
                flightDestination: '{{ $flight_destination_name }}',
                flightOrigin: '{{ $flight_origin_name }}',
                currentFlight: null,
                scrollbarDateRange: [],
                tableDateRange: [],
                tableDepartureDates: [],
                tableReturnDates: [],



            },
            mounted: async function() {
                let url = '/getExchangeRate';
                let resp = await axios.get(url)
                let exchange_rate = resp.data.exchangeRate;
                this.exchangeRate = exchange_rate;
                this.currency = resp.data.currency;

                for (const [key, value] of Object.entries(this.budgetFilter)) {
                    value.min = Math.round(value.min * exchange_rate);
                    value.max = Math.round(value.max * exchange_rate);

                }

                if (this.tripId == '') {
                    this.getFlights();
                }

                this.updateScrollBarData()
                this.tableDateRangeData();
            },
            methods: {
                selectDateFromDateTable: async function(departure_date, return_date) {
                    console.log(departure_date + ',' + return_date)
                    this.selectedFlightRange.start = departure_date;
                    this.selectedFlightRangeOrdered.start = departure_date;
                    this.selectedFlightRange.end = return_date;
                    this.selectedFlightRangeOrdered.end = return_date;


                    await this.updateResults();
                },
                selectDateFromScrollBar: function(value) {

                    this.selectedFlightOnewayDate = value;
                    this.selectedFlightOnewayDateOrdered = value;
                    this.updateResults();
                },
                updateScrollBarData: function() {
                    this.scrollbarDateRange = [];
                    for (let v = -3; v < 4; v++) {
                        if (v < 0) {
                            this.scrollbarDateRange.push(moment(this.selectedFlightOnewayDateOrdered).subtract(
                                v * -1, 'days').format('YYYY-MM-DD'))
                        } else if (v == 0) {
                            this.scrollbarDateRange.push(moment(this.selectedFlightOnewayDateOrdered).format(
                                'YYYY-MM-DD'))

                        } else {
                            this.scrollbarDateRange.push(moment(this.selectedFlightOnewayDateOrdered).add(v,
                                'days').format('YYYY-MM-DD'))
                        }

                    }
                },
                tableDateRangeData: function() {
                    this.tableDateRange = [];

                    let departure_date = '';
                    let return_date = '';
                    let index_of_week = 0;
                    let week_dates = [];


                    for (let r = -3; r < 4; r++) {
                        week_dates = [];
                        if (r < 0) {
                            return_date = moment(this.selectedFlightRangeOrdered.end).subtract(r * -1,
                                'days').format('YYYY-MM-DD')
                        } else if (r == 0) {
                            return_date = moment(this.selectedFlightRangeOrdered.end).format('YYYY-MM-DD')
                        } else {
                            return_date = moment(this.selectedFlightRangeOrdered.end).add(r, 'days').format(
                                'YYYY-MM-DD')
                        }


                        for (let d = -3; d < 4; d++) {

                            if (d < 0) {
                                departure_date = moment(this.selectedFlightRangeOrdered.start).subtract(d * -1,
                                        'days')
                                    .format('YYYY-MM-DD')
                            } else if (d == 0) {
                                departure_date = moment(this.selectedFlightRangeOrdered.start).format(
                                    'YYYY-MM-DD')
                            } else {
                                departure_date = moment(this.selectedFlightRangeOrdered.start).add(d, 'days')
                                    .format(
                                        'YYYY-MM-DD')
                            }



                            week_dates.push({
                            departure_date,
                            return_date
                        });



                        }
                        this.tableDateRange.push(week_dates);
                    }

                },
                selectFlightSupportPackage: function(flightPackage) {
                    this.selected_flight_service_package_id = flightPackage.id;
                },
                sortByFilterUpdated: function() {
                    this.allFlights = this.allFlights.reverse();
                    this.applyFilters();
                },
                selectFlightDestinationResult: function(result) {

                    this.flightDestinationAirportCode = result.Code;
                    this.flightDestination = result.AirportName + ', ' + result.CityName;
                },
                availableDates: function(val) {

                    let date = moment(val, 'YYYY-MM-DD')
                    let today = moment()

                    if (date.diff(today, 'days') > -1) {
                        return true
                    }
                    return false


                },
                open_aside() {
                    let aside = document.getElementById("aside");

                    aside.style.right = "0%";
                },
                close_aside() {
                    let aside = document.getElementById("aside");
                    aside.style.right = "-100%";

                },
                close_sidepanel() {
                    let sidepanel = document.getElementById("sidepanel");
                    sidepanel.style.right = "-100%";
                },
                open_sidepanel(flight) {
                    let sidepanel = document.getElementById("sidepanel");
                    const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)
                    if (vw < 768) {
                        $("#sidepanel").addClass('w-100')
                    } else {
                        $("#sidepanel").removeClass('w-100')
                    }
                    sidepanel.style.right = "0%";
                },


                extractFlightOriginAirport: function(segment) {
                    return segment[0]['Origin']['AirportName']
                },
                extractFlightOrigin: function(segment) {
                    return segment[0]['Origin']['CityName']
                },
                extractFlightDestination: function(segment) {
                    let flight_stops = segment.length - 1;
                    return segment[flight_stops]['Destination']['CityName']
                },
                extractFlightDestinationAirport: function(segment) {
                    let flight_stops = segment.length - 1;
                    return segment[flight_stops]['Destination']['AirportName']
                },
                extractFlightNumOfStops: function(flight) {
                    let flight_stops = flight.details[0].length - 1;
                    return flight_stops;
                },
                extractFlightDepartureTime: function(segment) {

                    return moment(segment[0]['Origin']['DateTime']).format('HH:mm')
                },
                extractFlightArrivalTime: function(segment) {
                    let flight_stops = segment.length - 1;
                    return moment(segment[flight_stops]['Destination']['DateTime']).format('HH:mm')
                },
                extractFlightOperatorLogo: function(segment) {
                    return segment[0].OperatorCode;
                },
                extractFlightOperatorName: function(segment) {
                    return segment[0].OperatorName;
                },
                extractFlightPrice: function(flight) {
                    return flight.priceTotal;
                },
                extractFlightDepartureDate: function(segment) {

                    return moment(segment[0]['Origin']['DateTime']).format('DD MMM')
                },
                extractSegmentCabinBaggage: function(stop) {
                    return stop.Attr.CabinBaggage ?? 0;
                },
                extractFlightArrivalDate: function(segment) {
                    let flight_stops = segment.length - 1;
                    return moment(segment[flight_stops]['Destination']['DateTime']).format('DD MMM')
                },
                extractFlightTotalTime: function(segment) {
                    let flight_stops = segment.length - 1;
                    let minutes = segment[flight_stops].AccumulatedDuration
                    let hours = Math.floor(minutes / 60);
                    minutes = minutes - (hours * 60)
                    return `${hours}h${minutes}mm`;
                },
                extractStoptFlyTime: function(stop) {


                    let minutes = stop;
                    let hours = Math.floor(minutes / 60);
                    minutes = minutes - (hours * 60)
                    return `${hours}h${minutes}m`;
                },
                formatStopTime: function(stopDate) {


                    return moment(stopDate).format('HH:mm')


                },
                formatStopDate: function(stopDate) {


                    return moment(stopDate).format('DD MMM')
                },
                extractDifferenceInTime: function(second, first) {


                    let firstFlight = moment(first);
                    let secondFlight = moment(second);

                    let difference = firstFlight.diff(second, 'minutes')
                    let minutes = difference;
                    let hours = Math.floor(minutes / 60);
                    minutes = minutes - (hours * 60)
                    return `${hours}h${minutes}m`;
                },
                extractFlightDepartureDateHeaderFormat: function(segment) {

                    return moment(segment[0]['Origin']['DateTime']).format('ddd DD MMM')
                },


                extractFlightStops: function(segment) {
                    let flight_stops = segment.length - 1;
                    if (flight_stops == 0) {
                        return [];
                    }
                    let stops = [];
                    for (let i = 0; i < flight_stops; i++) {
                        let minutes = segment[i].Duration
                        let hours = Math.floor(minutes / 60);
                        let lastone = i + 1 == flight_stops ? true : false

                        minutes = minutes - (hours * 60)
                        stops.push({
                            flight: segment[i],
                            duration: `${hours}h${minutes}m`,
                            isLast: lastone,
                            nextFlight: segment[i + 1],


                        })

                    }

                    return stops;
                },
                toggleTimelineAccordion: function(element) {
                    let container = element.currentTarget;
                    let content = $(container).find(".accordion-content")[0]
                    let button = $(container).find('.timeline-accordion-button')[0]

                    if ($(content).hasClass('height_fit_content')) {
                        $(content).removeClass('height_fit_content')
                        $(button).removeClass('timeline-accordion-active')

                    } else {
                        $(content).addClass('height_fit_content')
                        $(button).addClass('timeline-accordion-active')

                    }
                },
                updateResults: async function() {
                    await this.getFlights();
                },
                getFlights: async function() {

                    this.loading = true;
                    let url = '/flights/get';
                    url += '?origin=' + this.flightOriginAirportCode
                    url += '&destination=' + this.flightDestinationAirportCode
                    if (this.flight_trip_type == 'one way') {
                        url += '&departureDate=' + this.selectedFlightOnewayDateOrdered
                    } else {
                        url += '&departureDate=' + this.selectedFlightRangeOrdered.start
                        url += '&returnDate=' + this.selectedFlightRangeOrdered.end
                    }

                    url += '&adultCount=' + this.flights_number_of_adults
                    url += '&childCount=' + this.flights_number_of_children
                    url += '&infantCount=' + this.flights_number_of_babies
                    url += '&flight_class=' + this.flights_class
                    url += '&flightType=' + this.flight_trip_type
                    this.flights.splice(0)
                    this.allFlights.splice(0)
                    resp = await axios.get(url, {
                        cancelToken: new CancelToken(function executor(c) {
                            cancel = c;

                        })

                    }).catch(function(thrown) {

                        if (axios.isCancel(thrown)) {

                        } else {

                        }
                    });
                    console.log(resp.data)
                    this.loading = false;


                    this.allFlights.splice(0)
                    this.allFlights.push(...resp.data)

                    this.applyFilters()
                    // this.setupFilters(resp.data)
                },
                calculateFlightTotalTime: function(segment) {

                    let total_time = 0;
                    for (let x = 0; x < segment.length; x++) {
                        total_time += parseInt(segment[x].Duration);
                        if (x + 1 in segment) {
                            let arrival_time = moment(segment[x].Destination.DateTime);
                            let departure_time = moment(segment[x + 1].Origin.DateTime)

                            let difference = departure_time.diff(arrival_time, 'minutes');

                            total_time += difference;

                        }
                    }
                    let hours = Math.floor(total_time / 60);
                    let minutes = total_time - (hours * 60)
                    return `Duration: ${hours}h ${minutes}m`;
                },
                updateFilters: function() {


                    let defaultAirlineFilters = this.airlinesFilter;

                    for (const [key, value] of Object.entries(this.stopsFilter)) {
                        value.cheapestFlight = 0;
                        value.numOfFlights = 0;
                    }

                    for (const [key, value] of Object.entries(this.airlinesFilter)) {
                        value.numOfFlights = 0;

                    }
                    this.allFlights.forEach(el => {
                        let noOfStops = this.extractFlightNumOfStops(el)
                        for (const [key, value] of Object.entries(this.stopsFilter)) {
                            if (value.minNoOfStops <= noOfStops && value.maxNoOfStops >= noOfStops) {
                                value.numOfFlights += 1;
                                if (el.priceTotal < value.cheapestFlight || value.cheapestFlight == 0) {
                                    value.cheapestFlight = el.priceTotal;
                                    value.currency = el.priceTotalCurrency;
                                }
                            }
                        }
                        el.details[0].forEach(elm => {
                            if (!this.airlinesFilter.hasOwnProperty(elm.OperatorCode)) {

                                this.$set(this.airlinesFilter, elm.OperatorCode, {
                                    name: elm.OperatorName,
                                    numOfFlights: 1,
                                    cheapestFlight: el.priceTotal,
                                    currency: el.priceTotalCurrency,
                                    enabled: true,
                                    mouseOver: false,
                                })

                            } else {
                                this.airlinesFilter[elm.OperatorCode].numOfFlights += 1;
                                this.airlinesFilter[elm.OperatorCode].cheapestFlight > el
                                    .priceTotal ? this.airlinesFilter[elm.OperatorCode]
                                    .cheapestFlight = el.priceTotal : '';

                            }
                        })

                    });
                    console.log(defaultAirlineFilters);




                },

                activateOnlyThisAirlineFilter: function(airlineIndex) {


                    for (const [key, value] of Object.entries(this.airlinesFilter)) {
                        if (key == airlineIndex) {
                            value.enabled = true;

                        } else {
                            value.enabled = false;
                        }


                    }


                    this.applyFilters();
                },

                setMouseOver: function(index, value) {
                    this.airlinesFilter[index].mouseOver = value;



                },

                applyFilters: function() {

                    let toRemove = [];
                    let temp = [];



                    for (const [key, value] of Object.entries(this.stopsFilter)) {
                        temp = this.allFlights.filter((el) => {
                            if (value.enabled == false) {

                                return this.extractFlightNumOfStops(el) <= value.maxNoOfStops && this
                                    .extractFlightNumOfStops(el) >= value.minNoOfStops;
                            }
                        })
                        toRemove.push(...temp);
                    }







                    for (const [key, value] of Object.entries(this.airlinesFilter)) {

                        temp = this.allFlights.filter((el) => {
                            if (value.enabled == false) {
                                let exists = false;

                                el.details[0].forEach(item => {

                                    if (key == item.OperatorCode) {
                                        exists = true;
                                    } else {
                                        exists = false;
                                    }
                                })

                                return exists;
                            }
                        })


                        toRemove.push(...temp);
                    }


                    for (const [key, value] of Object.entries(this.budgetFilter)) {
                        if (value.enabled) {
                            temp = this.allFlights.filter((el) => {
                                return el.priceTotal < value.min || el.priceTotal > value.max
                            })
                        }
                    }
                    toRemove.push(...temp);


                    for (const [key, value] of Object.entries(this.timeFilter)) {
                        if (value.enabled == false) {
                            temp = this.allFlights.filter((el) => {
                                let time = moment(el.details[0][0].Origin.DateTime);
                                let hour = time.hours();

                                return hour >= value.fromTime && hour <= value.toTime;
                            })
                            toRemove.push(...temp);
                        }
                    }

                    for (const [key, value] of Object.entries(this.arrivalTimeFilter)) {
                        if (value.enabled == false) {
                            temp = this.allFlights.filter((el) => {
                                let time = moment(el.details[0][el.details[0].length - 1].Destination
                                    .DateTime);
                                let hour = time.hours();

                                return hour >= value.fromTime && hour <= value.toTime;
                            })
                            toRemove.push(...temp);
                        }
                    }

                    this.flights = [];
                    this.flights = this.allFlights.filter((el) => {
                        return toRemove.indexOf(el) < 0;
                    })
                    this.updateFilters();
                },
                showMoreResults: function() {
                    this.number_of_displayed_results += 20;
                },
                activateBudget(index) {
                    let index2 = 0;
                    for (const [key, value] of Object.entries(this.budgetFilter)) {
                        if (index2 == index) {
                            value.enabled = true
                        } else {
                            value.enabled = false
                        }
                        index2++;
                    }

                    this.applyFilters();
                },
                selectServicePackage: function(flight) {
                    this.currentFlight = flight;
                    console.log(flight);
                    $("#flight_support_packages").modal('show');
                },
                generateServicePackagePrice: function(package) {
                    let percentage = package.price_percentage / 100;

                    let price = Math.ceil(this.currentFlight.priceTotal * percentage);
                    return `${price} ${this.currentFlight.priceTotalCurrency}`;

                },
                reserveFlight: async function() {

                    let flight = this.currentFlight;
                    console.log(flight);
                    let url = '';
                    if (this.tripId !== '') {
                        url = "/flights/reserve?resultToken=" + flight.ResultToken + '&tripId=' + this.tripId +
                            '&departure_date=' + this.selectedFlightRangeOrdered.start +
                            '&return_date=' + this.selectedFlightRangeOrdered.end +
                            '&origin=' + this.flightOriginAirportCode +
                            '&destination=' + this.flightDestinationAirportCode;
                        let operator_codes = '';
                        let flight_numbers = '';
                        for (let x = 0; x < flight.details[0].length; x++) {
                            operator_codes += flight.details[0][x].OperatorCode + ','
                            flight_numbers += flight.details[0][x].FlightNumber + ','
                        }

                        url += "&operator_code=" + operator_codes
                        url += "&flight_number=" + flight_numbers

                        operator_codes = ''
                        flight_numbers = ''
                        for (let x = 0; x < flight.details[1].length; x++) {
                            operator_codes += flight.details[1][x].OperatorCode + ','
                            flight_numbers += flight.details[1][x].FlightNumber + ','
                        }

                        url += "&return_operator_code=" + operator_codes
                        url += "&return_flight_number=" + flight_numbers


                        url += '&flightSupportPackage=' + this.selected_flight_service_package_id;
                        url += "&trip_1_time=" + moment(flight.details[0][0].Origin.DateTime).format('HH:mm')
                        url += "&trip_1_arrival_time=" + moment(flight.details[0][flight.details[0].length - 1]
                            .Destination.DateTime).format('HH:mm')

                        url += "&trip_2_time=" + moment(flight.details[1][0].Origin.DateTime).format('HH:mm')
                        url += "&trip_2_arrival_time=" + moment(flight.details[1][flight.details[1].length - 1]
                            .Destination.DateTime).format('HH:mm')



                    } else if (this.isPackage == '0') {
                        url = "/flights/reserve?resultToken=" + flight.ResultToken + '&tripId=' + this.tripId +
                            '&flightSupportPackage=' + this.selected_flight_service_package_id;

                    } else {
                        url = "/flights/reserve?resultToken=" + flight.ResultToken + '&tripId=' + this.tripId +
                            "&isPackage=1" + '&flightSupportPackage=' + this
                            .selected_flight_service_package_id;;


                    }
                    let error = false;
                    try {
                        resp = await axios.get(url).catch(function(thrown) {

                            if (axios.isCancel(thrown)) {

                            } else {

                            }
                        });
                    } catch (ex) {
                        error = true;
                    }
                    if (error == true) {
                        return;
                    }
                    if (this.tripId !== '') {
                        window.location = "/trips/trip/" + this.tripId

                    } else if (this.isPackage == '0') {
                        window.location = "/flights/review"
                    } else {
                        window.location = "/flights/review?isPackage=1"
                    }

                },
                selectFlightOriginResult: function(result) {

                    this.flightOriginAirportCode = result.Code;
                    this.flightOrigin = result.AirportName + ', ' + result.CityName;
                },
            },
            computed: {
                formattedFlightFromDate: function() {

                    return moment(this.selectedFlightRangeOrdered.start).format('MMM, DD');

                },
                formattedFlightToDate: function() {
                    return moment(this.selectedFlightRangeOrdered.end).format('MMM, DD');
                },
                formattedSelectedFlightOnewayDate: function() {
                    return moment(this.selectedFlightOnewayDate).format('MMM, DD');

                }
            },
            watch: {
                selectedFlightRange: function(val) {
                    this.selectedFlightRangeOrdered.start = moment(val.start).format('YYYY-MM-DD')
                    this.selectedFlightRangeOrdered.end = moment(val.end).format('YYYY-MM-DD')


                },

                selectedFlightOnewayDate: function(val) {
                    this.selectedFlightOnewayDateOrdered = moment(val).format('YYYY-MM-DD')
                }
            },
        })
    </script>
@endsection
