@extends('layout')


@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">
    <link href="/css-r/home/home.css" rel="stylesheet">

    <link href="/home/css/style.css" rel="stylesheet">

    <link href="/home/css/responsive.css" rel="stylesheet">


    <style>
        @font-face {
            font-family: Rubrik;
            src: url(/fonts/Rubrik.otf);
        }

        @font-face {
            font-family: Rubrik_bold;
            src: url(/fonts/Rubrik-Bold.otf);
        }

        @font-face {
            font-family: Rubrik_light;
            src: url(/fonts/Rubrik-ExtraLight.otf);
        }

        @font-face {
            font-family: vag_rounded_bold;
            src: url(/fonts/vag-rounded-bold.ttf);
        }

        .rubrik_bold {
            font-family: Rubrik_bold !important;
        }

        .sec_grids,
        .sec_grids * {
            font-family: Rubrik_light !important;
            text-transform: inherit !important;
        }

        .trippbo_section,
        .trippbo_section * {
            font-family: Rubrik_light !important;
            text-transform: inherit !important;
        }

        .field-connector {
            position: absolute;
            width: 34px;
            height: 34px;
            left: calc(-34px / 2);
            top: calc((100% /2) - (34px / 2));
            z-index: 10;
        }

        .invisible {
            display: none;
        }

        .pink {
            color: #FE2F70;
        }

        .trippbo-dropdown-active {
            color: #FE2F70;
            background-color: #fcbacf;
        }

        .responsive-width {
            width: 100%
        }

        @media screen and (min-width:1400px) {
            .responsive-width {
                width: 75%
            }
        }

        @media (max-width: 1200px) {
            .cover {

                object-fit: cover;
                object-position: center;
                overflow: hidden;
                display: block;
            }

            .my-grid {
                grid-template-rows: 100%;
            }
        }

        .add-border-radius {
            border-radius: 15px !important;
        }

        .inputField-box span {
            position: initial;
            top: initial;
            left: initial;
            background-color: initial;
            padding: initial;
        }

        .trippbo-btn-active {
            background-color: #ff6898 !important;
            color: white !important;
            border-radius: 15px;
        }

    </style>
@endsection
@section('content')
    <div id="homepage_app" class="body-content">
        <div class="hero-image" style="height: calc(100vh - 78px);">
            <div class="d-flex flex-column justify-content-center align-items-center hero-contents h-100">

                <div class="responsive-width p-lg-5">
                    <div class="bg-white p-3" style="border-radius: 15px;box-shadow: rgb(0 0 0 / 35%) 0px 0px 25px;">
                        <div class="trippbo-bar trippbo-bar-padding gilroy-regular font-14">
                            <button class="tablink d-flex flex-row-responsive align-items-center trippbo-active"
                                onclick="openCity(event,'hotels');"><i class="far fa-building"></i>
                                <span>Hotels</span></button>
                            <button class="tablink d-flex flex-row-responsive align-items-center"
                                onclick="openCity(event,'flights');"><i class="fas fa-plane-departure"></i>
                                <span>Flights</span></button>
                            <button style="display: none !important;"
                                class="tablink d-flex flex-row-responsive align-items-center"
                                onclick="openCity(event,'car');"><i class="fas fa-car"></i> <span>Car</span></button>
                            <button class="tablink d-flex flex-row-responsive align-items-center"
                                onclick="openCity(event,'packages');"><i class="fas fa-suitcase-rolling"></i>
                                <span>Packages</span></button>
                            <button class="tablink d-flex flex-row-responsive align-items-center"
                                onclick="openCity(event,'things');"><i class="fas fa-clipboard-list"></i> <span>Activities
                                </span></button>
                        </div>
                        <div id="hotels" class="pt-3 city">
                            <div class="d-flex justify-content-end-responsive-left mb-3">
                                <div class="d-flex justify-content-end w-100">
                                    <div @mouseover="hotels_travelers_count_display = 'block'"
                                        @mouseleave="hotels_travelers_count_display = 'none'" class="trippbo-dropdown">
                                        <button class="gilroy-medium text-000941 font-12">@{{ hotels_number_of_rooms }}
                                            Room(s), @{{ hotelNumberOfTravelers }} Traveler(s)
                                            <i class="fa fa-angle-down font-14 font-weight-bold ml-1"></i></button>
                                        <div class="d-flex flex-column"
                                            :style="{display: hotels_travelers_count_display == 'block' ? 'flex !important' : 'none' +   ' !important'} ">
                                            <div v-for="(room, roomIndex) in hotels_rooms"
                                                v-if="roomIndex < hotels_number_of_rooms" :key="roomIndex"
                                                :style="{display: hotels_travelers_count_display}" class="w-100">
                                                <p class="gilroy-medium font-12 mb-2"
                                                    v-on:click='hotels_travelers_count_display = "none"'><img
                                                        class="icon-10px mr-2 hlg" src="/image/close.png" /> Room
                                                    @{{ roomIndex + 1 }}</p>
                                                {{-- <p class="gilroy-medium font-10 mb-2 text-23242c opacity-0-5">Room 1</p> --}}
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="w-60"><span
                                                            class="gilroy-medium font-12">Adult</span>
                                                    </div>
                                                    <div class="w-40">
                                                        <div class="increamentor">
                                                            <div
                                                                v-on:click="room.hotels_number_of_adults > 1 ? room.hotels_number_of_adults -=1 : '' ">
                                                                <i class="fa fa-minus-circle increamentor-minus"
                                                                    :class="{'increamentor-not-allowed' : room.hotels_number_of_adults < 2 , 'increamentor-opacity' : room.hotels_number_of_adults < 2}"></i>
                                                            </div>
                                                            <div><input type="text" class="increamentor-number "
                                                                    :class="{ 'increamentor-opacity' : room.hotels_number_of_adults < 1}"
                                                                    :value="room.hotels_number_of_adults"
                                                                    readonly="readonly">
                                                            </div>
                                                            <div
                                                                v-on:click="room.hotels_number_of_adults < 4 ? room.hotels_number_of_adults +=1 : '' ">
                                                                <i class="fa fa-plus-circle increamentor-plus"
                                                                    :class="{'increamentor-not-allowed' : room.hotels_number_of_adults == 4 , 'increamentor-opacity' : room.hotels_number_of_adults == 4}"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="w-60">
                                                        <span class="gilroy-medium font-12">Children
                                                            <span
                                                                style="    font-size: 10px;
                                                                                                                            color: rgb(35, 36, 44);
                                                                                                                            opacity: 0.7;">(Ages
                                                                0
                                                                to
                                                                11+)
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="w-40">
                                                        <div class="increamentor">
                                                            <div
                                                                v-on:click="room.hotels_number_of_children > 0 ? room.hotels_number_of_children -=1 : '' ">
                                                                <i class="fa fa-minus-circle increamentor-minus"
                                                                    :class="{'increamentor-not-allowed' : room.hotels_number_of_children < 1 , 'increamentor-opacity' : room.hotels_number_of_children < 1}"></i>
                                                            </div>
                                                            <div><input type="text" class="increamentor-number "
                                                                    :class="{ 'increamentor-opacity' : room.hotels_number_of_children< 1}"
                                                                    :value="room.hotels_number_of_children"
                                                                    readonly="readonly">
                                                            </div>
                                                            <div
                                                                v-on:click="room.hotels_number_of_children < 2 ? room.hotels_number_of_children +=1 : '' ">
                                                                <i class="fa fa-plus-circle increamentor-plus"
                                                                    :class="{'increamentor-not-allowed' : room.hotels_number_of_children == 2 , 'increamentor-opacity' : room.hotels_number_of_children == 2}"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2"
                                                    v-if="roomIndex == 0 ">
                                                    <div class="w-60"><span
                                                            class="gilroy-medium font-12">Rooms</span>
                                                    </div>
                                                    <div class="w-40">
                                                        <div class="increamentor">
                                                            <div
                                                                v-on:click="hotels_number_of_rooms > 1 ? hotels_number_of_rooms -=1 : '' ">
                                                                <i class="fa fa-minus-circle increamentor-minus"
                                                                    :class="{'increamentor-not-allowed' : hotels_number_of_rooms < 2 , 'increamentor-opacity' : hotels_number_of_rooms < 2}"></i>
                                                            </div>
                                                            <div><input type="text" class="increamentor-number "
                                                                    :class="{ 'increamentor-opacity' : hotels_number_of_rooms< 1}"
                                                                    :value="hotels_number_of_rooms" readonly="readonly">
                                                            </div>
                                                            <div
                                                                v-on:click="hotels_number_of_rooms < 3 ? hotels_number_of_rooms +=1 : '' ">
                                                                <i class="fa fa-plus-circle increamentor-plus"
                                                                    :class="{'increamentor-not-allowed' : hotels_number_of_rooms == 3 , 'increamentor-opacity' : hotels_number_of_rooms == 3}"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div v-for="n in room.hotels_number_of_children"
                                                    class="mb-1 d-flex flex-row justify-content-between align-items-center">
                                                    <div class="w-100"> Child @{{ n }} Age</div>

                                                    <input v-model="room.child_ages[n - 1]" type="number" value="0" min="1"
                                                        max="11" class="w-100 form-control" />

                                                </div>
                                                {{-- <div class="d-flex align-items-center justify-content-end mb-2">
                                                <div><span class="gilroy-semi font-12 text-fe2f70">Add Room</span></div>
                                            </div> --}}
                                                <div v-if="roomIndex == hotels_number_of_rooms - 1 "
                                                    v-on:click="hotels_travelers_count_display = 'none'"><button
                                                        type="button" class="btn btn-block btn-000941 font-12">Done</button>
                                                </div>
                                            </div>


                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="form-group row px-2">
                                <div :class="{'show' : hotelValidationError, 'invisible' : !hotelValidationError}"
                                    class="alert alert-danger alert-dismissible fade  w-100" role="alert">
                                    <strong>No Destination Selected!</strong> Please select a destination first.
                                    <button type="button" v-on:click="hotelValidationError = false" class="close"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="col-sm-12 col-lg-6 px-1 mb-2 position-relative">

                                    <div class="flex-grow-1">
                                        <div class="position-relative inputField-box w-100"><img class="icon-18px mr-1"
                                                src="/image/location.png"><input type="text" autocomplete="off"
                                                v-model="hotelDestination"
                                                v-on:input="hotelDestination = $event.target.value"
                                                class="inputField inputField-withicon add-border-radius"
                                                placeholder="Destination" name="hotel_destination_name" />
                                            <button v-on:click="clearHotel" v-if="hotelCityId !== ''"
                                                style="position: absolute; right:20px; top : 12px;" type="button"
                                                class="close" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div style="position: absolute;z-index:10;background-color:white;"
                                        class="w-100">
                                        <autocomplete-by-city @autocomplete_result_selected="selectHotelResult($event)"
                                            :keyword="hotelDestination"></autocomplete-by-city>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-6 px-1 mb-2 position-relative">
                                    <div class="position-relative inputField-box">
                                        <vc-date-picker v-model="selectedHotelRange" :min-date='new Date()' color="pink"
                                            is-range :masks="{iso: 'YYYY-MM-DD',input: ['MMM, DD'] }">
                                            <template v-slot="{ inputValue, inputEvents }">
                                                <div class="flex justify-center items-center">
                                                    <img class="icon-18px mr-1" src="/image/policy.png"><input
                                                        :value="inputValue.start + ' To ' + inputValue.end"
                                                        v-on="inputEvents.start"
                                                        class="inputField inputField-withicon add-border-radius w-100" />


                                                </div>
                                            </template>
                                        </vc-date-picker>

                                    </div>



                                </div>

                            </div>
                            {{-- <div class="d-flex align-items-center mb-3">
                                <div class="mr-3"><label class="trippbo-checkbox gilroy-regular">Add Flight<input
                                            type="checkbox" checked="checked" name=""><span></span></label></div>
                                <div><label class="trippbo-checkbox gilroy-regular">Add Car<input type="checkbox"
                                            checked="checked" name=""><span></span></label></div>
                            </div> --}}
                            <div v-on:click="searchHotels"><button type="button"
                                    class="btn btn-block gilroy-medium btn-fe2f70 px-5 add-border-radius">Find</button>
                            </div>
                        </div>
                        <div id="flights" class="pt-3 city" style="display:none">
                            <div
                                class="d-flex flex-row-responsive align-items-center-responsive-left justify-content-between mb-3">
                                <div>
                                    <div class="trippbo-btn-bar gilroy-medium font-12">
                                        <button :class="{'trippbo-btn-active' : flight_trip_type == 'round trip'}"
                                            v-on:click="flight_trip_type = 'round trip'" {{-- onclick="openFlights(event,'one-trip');" --}}>Roundtrip
                                        </button>
                                        <button :class="{'trippbo-btn-active' : flight_trip_type == 'one way'}"
                                            v-on:click="flight_trip_type = 'one way'" {{-- onclick="openFlights(event,'one-way');" --}}>One Way</button>
                                        <!--         <button :class="{'trippbo-btn-active' : flight_trip_type == 'multi city'}"
                                                                                                                v-on:click="flight_trip_type = 'multi city'"
                                                                                                                {{-- onclick="openFlights(event,'multi-city');" --}}>Multi-City</button> -->
                                    </div>
                                </div>
                                <div>
                                    <div @mouseover="flights_travelers_count_display = 'block'"
                                        @mouseleave="flights_travelers_count_display = 'none'" class="trippbo-dropdown">
                                        <button class="gilroy-medium text-000941 font-12">@{{ flights_number_of_adults + flights_number_of_children + flights_number_of_babies }}
                                            Traveller(s) <i
                                                class="fa fa-angle-down font-14 font-weight-bold ml-1"></i></button>
                                        <div :style="{display: flights_travelers_count_display}">
                                            <p v-on:click='flights_travelers_count_display = "none"'
                                                class="gilroy-medium font-12 mb-2"><img class="icon-10px mr-2 hlg"
                                                    src="{{ asset('image/close.PNG') }}" /> Travelers</p>
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
                                                <div class="w-60"><span class="gilroy-medium font-12">Child
                                                        <span
                                                            style="    font-size: 10px;
                                                                                                                    color: rgb(35, 36, 44);
                                                                                                                    opacity: 0.7;">(Ages
                                                            2
                                                            to
                                                            11+)
                                                        </span></span>
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
                                                <div class="w-60"><span class="gilroy-medium font-12">Infant
                                                        <span
                                                            style="    font-size: 10px;
                                                                                                                    color: rgb(35, 36, 44);
                                                                                                                    opacity: 0.7;">(Ages
                                                            0
                                                            to
                                                            1+)
                                                        </span></span>
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
                                            <div v-on:click="flights_travelers_count_display = 'none'"><button type="button"
                                                    class="btn btn-block btn-000941 font-12">Done</button></div>
                                        </div>
                                    </div>
                                    <div class="trippbo-dropdown" @mouseenter="flight_class_type_display = 'block'"
                                        @mouseleave="flight_class_type_display = 'none'">
                                        <button class="gilroy-medium text-000941 font-12">@{{ flights_class }} <i
                                                class="fa fa-angle-down font-14 font-weight-bold ml-1"></i></button>
                                        <div :style="{display: flight_class_type_display}" class="p-0 min-width-175px">
                                            <button v-on:click="flight_class_type_display = 'none'" type="button"
                                                class="btn btn-block text-left hlg"><img class="icon-10px mr-2 hlg"
                                                    src="{{ asset('image/close.PNG') }}" /></button>

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
                            <div id="one-trip" class="flight">
                                <div class="trippbo-flights-input-bar">
                                    <div>
                                        <div :class="{'show' : flightDepartureCityValidation, 'invisible' : !flightDepartureCityValidation}"
                                            class="alert alert-danger alert-dismissible fade show  w-100" role="alert">
                                            <strong>No Departure City Selected!</strong> Please select a city first.
                                            <button type="button" v-on:click="flightDepartureCityValidation = false"
                                                class="close" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div :class="{'show' : flightDestinationCityValidation, 'invisible' : !flightDestinationCityValidation}"
                                            class="alert alert-danger alert-dismissible fade show  w-100" role="alert">
                                            <strong>No Destination City Selected!</strong> Please select a city first.
                                            <button type="button" v-on:click="flightDestinationCityValidation = false"
                                                class="close" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="d-flex flex-row-responsive">
                                            <div class="flex-grow-1 mb-2 mr-1-lg position-relative">
                                                <div class="position-relative inputField-box w-100"><img
                                                        class="icon-18px mr-1" src="/image/location.png"><input
                                                        v-model="flightOrigin"
                                                        v-on:input="flightOrigin = $event.target.value" type="text"
                                                        class="inputField inputField-withicon add-border-radius"
                                                        placeholder="Departure city">
                                                    <button v-on:click="clearFlightOrigin"
                                                        v-if="flightOriginAirportCode !== ''"
                                                        style="position: absolute; right:20px; top : 12px;" type="button"
                                                        class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>

                                                </div>
                                                <div class="w-100"
                                                    style="position: absolute;z-index:10;background-color:white;">
                                                    <autocomplete-airport-component
                                                        @autocomplete_result_selected="selectFlightOriginResult"
                                                        :keyword="flightOrigin">
                                                    </autocomplete-airport-component>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 mb-2 mr-1-lg position-relative">
                                                <img src="/image/arrow-right-shadow.svg" class="field-connector">
                                                <div class="position-relative inputField-box w-100"><img
                                                        class="icon-18px mr-1" src="/image/location.png"><input
                                                        v-model="flightDestination"
                                                        v-on:input="flightDestination = $event.target.value" type="text"
                                                        class="inputField inputField-withicon add-border-radius"
                                                        placeholder="Destination city">
                                                    <button v-on:click="clearFlightDestination"
                                                        v-if="flightDestinationAirportCode !== ''"
                                                        style="position: absolute; right:20px; top : 12px;" type="button"
                                                        class="close" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="w-100"
                                                    style="position: absolute;z-index:10;background-color:white;">
                                                    <autocomplete-airport-component
                                                        @autocomplete_result_selected="selectFlightDestinationResult"
                                                        :keyword="flightDestination">
                                                    </autocomplete-airport-component>
                                                </div>

                                            </div>






                                            <div class="position-relative inputField-box">


                                                <vc-date-picker v-if="flight_trip_type == 'round trip'"
                                                    v-model="selectedFlightRange" :min-date='new Date()' color="pink"
                                                    is-range :masks="{iso: 'YYYY-MM-DD',input: ['MMM, DD'] }">
                                                    <template v-slot="{ inputValue, inputEvents }">
                                                        <div class="flex justify-center items-center">
                                                            <img class="icon-18px mr-1" src="/image/policy.png"><input
                                                                :value="inputValue.start + ' To ' + inputValue.end"
                                                                v-on="inputEvents.start"
                                                                class="inputField inputField-withicon add-border-radius w-100" />


                                                        </div>
                                                    </template>
                                                </vc-date-picker>
                                                <vc-date-picker v-if="flight_trip_type == 'one way'"
                                                    v-model="selectedFlightOnewayDate" :min-date='new Date()' color="pink"
                                                    :masks="{iso: 'YYYY-MM-DD',input: ['MMM, DD'] }">
                                                    <template v-slot="{ inputValue, inputEvents }">
                                                        <div class="flex justify-center items-center">
                                                            <img class="icon-18px mr-1" src="/image/policy.png"><input
                                                                :value="inputValue" v-on="inputEvents"
                                                                class="inputField inputField-withicon add-border-radius w-100" />


                                                        </div>
                                                    </template>
                                                </vc-date-picker>
                                            </div>

                                            <div style="position:absolute;">
                                                <v-app>
                                                    <template>
                                                        <v-row justify="space-around">
                                                            <v-overlay :dark='isDark' :value="showFlightCalendar">
                                                                <v-date-picker :allowed-dates="availableDates"
                                                                    :range='flight_trip_type == "one way" ? false : true'
                                                                    elevation="15" v-model="selectedFlightRange"
                                                                    color="pink">
                                                                </v-date-picker>
                                                                <v-col style="background-color:white;"
                                                                    class="mt-0 p-0 d-flex justify-content-end" cols="12">


                                                                    <div class="p-3 m-2 pink--text"
                                                                        style="font-size:18px;cursor: pointer"
                                                                        v-on:click="showFlightCalendar = false">
                                                                        Done
                                                                    </div>

                                                                </v-col>

                                                            </v-overlay>
                                                        </v-row>
                                                    </template>
                                                </v-app>
                                            </div>
                                            <div style="position:absolute;">
                                                <v-app>
                                                    <template>
                                                        <v-row justify="space-around">
                                                            <v-overlay :dark='isDark' :value="showFlightOneWayCalendar">
                                                                <v-date-picker :allowed-dates="availableDates"
                                                                    elevation="15" v-model="selectedFlightOnewayDate"
                                                                    color="pink">
                                                                </v-date-picker>
                                                                <v-col style="background-color:white;"
                                                                    class="mt-0 p-0 d-flex justify-content-end" cols="12">


                                                                    <div class="p-3 m-2 pink--text"
                                                                        style="font-size:18px;cursor: pointer"
                                                                        v-on:click="showFlightOneWayCalendar = false">
                                                                        Done
                                                                    </div>

                                                                </v-col>

                                                            </v-overlay>
                                                        </v-row>
                                                    </template>
                                                </v-app>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="one-way" class="flight" style="display: none;">
                                <h2>One Way</h2>
                            </div>
                            <div id="multi-city" class="flight" style="display: none;">
                                <h2>Multi-City</h2>
                            </div>

                            <div><button type="button" v-on:click="searchFlights"
                                    class="btn btn-block gilroy-medium btn-fe2f70 px-5 add-border-radius">Find</button>
                            </div>
                        </div>
                        <div id="car" class="pt-3 city" style="display:none">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <div class="trippbo-btn-bar gilroy-medium font-12">
                                        <button class="trippbo-btn-active" onclick="openCars(event,'trips');">Rental
                                            Trips</button>
                                        <button onclick="openCars(event,'transportation');">Airport transportation</button>
                                    </div>
                                </div>
                            </div>
                            <div id="trips" class="car">
                                <div class="trippbo-car-input-bar">
                                    <div>
                                        <div class="d-flex flex-row-responsive">
                                            <div class="flex-grow-1 mb-2-sm mr-1-lg">
                                                <div class="position-relative inputField-box w-100"><img
                                                        class="icon-18px mr-1" src="/image/location.png"><input type="text"
                                                        class="inputField inputField-withicon" placeholder="Pickup"></div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="position-relative inputField-box w-100"><img
                                                        src="/image/icon-arrow-right.svg" class="field-connector"><img
                                                        class="icon-18px mr-1" src="/image/location.png"><input type="text"
                                                        class="inputField inputField-withicon add-border-radius"
                                                        placeholder="Destination">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="position-relative inputField-box">
                                            <img src="/image/policy.png" class="icon-18px mr-1">
                                            <input type="text" id="DateFrom"
                                                class="inputField inputField-withicon add-border-radius"
                                                placeholder="Pickup Date">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="position-relative inputField-box">
                                            <img src="/image/policy.png" class="icon-18px mr-1">
                                            <input type="text" id="DateTo" class="inputField inputField-withicon"
                                                placeholder="Drop Off Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="trippbo-car-input-bar-2">
                                    <div>
                                        <div class="position-relative inputField-box">
                                            <img src="/image/clock.png" class="icon-18px mr-1">
                                            <input type="text" id="DateFrom" class="inputField inputField-withicon"
                                                placeholder="Pickup Time">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="position-relative inputField-box">
                                            <img src="/image/clock.png" class="icon-18px mr-1">
                                            <input type="text" id="DateTo" class="inputField inputField-withicon"
                                                placeholder="Drop off Time">
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="d-flex flex-row-responsive align-items-center-responsive-left justify-content-between mb-3">
                                    <div>
                                        <div><label class="trippbo-checkbox gilroy-medium">Include AARP member
                                                rates<br /><b class="gilroy-regular font-10">Membership is required and
                                                    verified at pick-up.</b><input type="checkbox" checked="checked"
                                                    name=""><span></span></label></div>
                                    </div>
                                    <div>
                                        <div class="trippbo-dropdown">
                                            <button class="gilroy-medium text-000941 font-12">I have a discount code <i
                                                    class="fa fa-angle-down font-14 font-weight-bold ml-1"></i></button>
                                            <div>
                                                <p class="gilroy-medium font-12 mb-2"
                                                    onclick="this.parentElement.style.display = 'none';"><img
                                                        class="icon-10px mr-2 hlg" src="/image/close.png" /> Travelers</p>
                                                <p class="gilroy-medium font-10 mb-2 text-23242c opacity-0-5">Room 1</p>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="w-60"><span
                                                            class="gilroy-medium font-12">Adult</span></div>
                                                    <div class="w-40">
                                                        <div id="children-increament" class="increamentor">
                                                            <div><i class="fa fa-minus-circle increamentor-minus"></i>
                                                            </div>
                                                            <div><input type="text" class="increamentor-number" value="1"
                                                                    readonly="readonly"></div>
                                                            <div><i class="fa fa-plus-circle increamentor-plus"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="w-60"><span
                                                            class="gilroy-medium font-12">Children</span></div>
                                                    <div class="w-40">
                                                        <div id="children-increament" class="increamentor">
                                                            <div><i
                                                                    class="fa fa-minus-circle increamentor-minus increamentor-opacity increamentor-not-allowed"></i>
                                                            </div>
                                                            <div><input type="text"
                                                                    class="increamentor-number increamentor-opacity"
                                                                    value="0" readonly="readonly"></div>
                                                            <div><i class="fa fa-plus-circle increamentor-plus"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-end mb-2">
                                                    <div><span class="gilroy-semi font-12 text-fe2f70">Add Room</span>
                                                    </div>
                                                </div>
                                                <div><button type="button"
                                                        class="btn btn-block btn-000941 font-12">Done</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="transportation" class="car" style="display: none;">
                                <h2>Airport transportation</h2>
                            </div>
                            <div><button type="button" class="btn btn-block gilroy-medium btn-fe2f70 px-5">Find</button>
                            </div>
                        </div>
                        <div id="packages" class="pt-3 city" style="display:none">
                            {{-- <p class="gilroy-regular font-12">Choose one or more items to build your trip:</p> --}}
                            <div class=" gilroy-regular mb-3 d-flex justify-content-between">
                                <div>
                                    <button class="btn font-12 trippbo-btn-active">Flight</button>
                                    <span style="font-weight: bold"> + </span>
                                    <button class="btn font-12 trippbo-btn-active">Hotel</button>
                                </div>
                                <div>
                                    <div @mouseover="package_travelers_count_display = 'block'"
                                        @mouseleave="package_travelers_count_display = 'none'" class="trippbo-dropdown">
                                        <button class="gilroy-medium text-000941 font-12">@{{ package_number_of_adults + package_number_of_children + package_number_of_babies }}
                                            Traveller(s) <i
                                                class="fa fa-angle-down font-14 font-weight-bold ml-1"></i></button>
                                        <div :style="{display: package_travelers_count_display}">
                                            <div v-for="(package, packageIndex) in package_rooms "
                                                v-if="packageIndex < package_number_of_rooms">
                                                <p v-on:click='package_travelers_count_display = "none"'
                                                    class="gilroy-medium font-12 mb-2"><img class="icon-10px mr-2 hlg"
                                                        src="{{ asset('image/close.PNG') }}" /> Travelers</p>
                                                {{-- <p class="gilroy-medium font-10 mb-2 text-23242c opacity-0-5">Room 1</p> --}}
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="w-60"><span
                                                            class="gilroy-medium font-12">Adult</span>
                                                    </div>
                                                    <div class="w-40">
                                                        <div class="increamentor">
                                                            <div
                                                                v-on:click="package.number_of_adults > 1 ? package.number_of_adults -=1 : '' ">
                                                                <i class="fa fa-minus-circle increamentor-minus"
                                                                    :class="{'increamentor-not-allowed' : package.number_of_adults < 2 , 'increamentor-opacity' : package.number_of_adults < 2}"></i>
                                                            </div>
                                                            <div><input type="text" class="increamentor-number "
                                                                    :class="{ 'increamentor-opacity' : package.number_of_adults < 1}"
                                                                    :value="package.number_of_adults" readonly="readonly">
                                                            </div>
                                                            <div
                                                                v-on:click="package.number_of_adults < 4 ? package.number_of_adults +=1 : '' ">
                                                                <i class="fa fa-plus-circle increamentor-plus"
                                                                    :class="{'increamentor-not-allowed' : package.number_of_adults == 4 , 'increamentor-opacity' : package.number_of_adults == 4}"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="w-60"><span class="gilroy-medium font-12">Child
                                                            <span
                                                                style="    font-size: 10px;
                                                                                                                        color: rgb(35, 36, 44);
                                                                                                                        opacity: 0.7;">(Ages
                                                                2
                                                                to
                                                                11+)
                                                            </span></span>
                                                    </div>
                                                    <div class="w-40">
                                                        <div id="children-increament" class="increamentor">
                                                            <div
                                                                v-on:click="package.number_of_children > 0 ? package.number_of_children -=1 : '' ">
                                                                <i class="fa fa-minus-circle increamentor-minus"
                                                                    :class="{'increamentor-not-allowed' : package.number_of_children < 1 , 'increamentor-opacity' : package.number_of_children < 1}"></i>
                                                            </div>
                                                            <div><input type="text" class="increamentor-number "
                                                                    :class="{ 'increamentor-opacity' : package.number_of_children < 1}"
                                                                    :value="package.number_of_children" readonly="readonly">
                                                            </div>
                                                            <div
                                                                v-on:click="package.number_of_children < 2 ? package.number_of_children +=1 : '' ">
                                                                <i class="fa fa-plus-circle increamentor-plus"
                                                                    :class="{'increamentor-not-allowed' : package.number_of_children == 2 , 'increamentor-opacity' : package.number_of_children == 2}"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="w-60"><span class="gilroy-medium font-12">Infant
                                                            <span
                                                                style="    font-size: 10px;
                                                                                                                        color: rgb(35, 36, 44);
                                                                                                                        opacity: 0.7;">(Ages
                                                                0
                                                                to
                                                                1+)
                                                            </span></span>
                                                    </div>
                                                    <div class="w-40">
                                                        <div id="baby-increament" class="increamentor">
                                                            <div
                                                                v-on:click="package.number_of_babies > 0 ? package.number_of_babies -=1 : '' ">
                                                                <i class="fa fa-minus-circle increamentor-minus"
                                                                    :class="{'increamentor-not-allowed' : package.number_of_babies < 1 , 'increamentor-opacity' : package.number_of_babies < 1}"></i>
                                                            </div>
                                                            <div><input type="text" class="increamentor-number "
                                                                    :class="{ 'increamentor-opacity' : package.number_of_babies < 1}"
                                                                    :value="package.number_of_babies" readonly="readonly">
                                                            </div>
                                                            <div
                                                                v-on:click="package.number_of_babies < 2 ? package.number_of_babies +=1 : '' ">
                                                                <i class="fa fa-plus-circle increamentor-plus"
                                                                    :class="{'increamentor-not-allowed' : package.number_of_babies == 2 , 'increamentor-opacity' : package.number_of_babies == 2}"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div v-if="packageIndex == 0"
                                                    class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="w-60"><span
                                                            class="gilroy-medium font-12">Rooms</span>
                                                    </div>
                                                    <div class="w-40">
                                                        <div class="increamentor">
                                                            <div
                                                                v-on:click="package_number_of_rooms > 1 ? package_number_of_rooms -=1 : '' ">
                                                                <i class="fa fa-minus-circle increamentor-minus"
                                                                    :class="{'increamentor-not-allowed' : package_number_of_rooms < 2 , 'increamentor-opacity' : package_number_of_rooms < 2}"></i>
                                                            </div>
                                                            <div><input type="text" class="increamentor-number "
                                                                    :class="{ 'increamentor-opacity' : package_number_of_rooms < 1}"
                                                                    :value="package_number_of_rooms" readonly="readonly">
                                                            </div>
                                                            <div
                                                                v-on:click="package_number_of_rooms < 3 ? package_number_of_rooms +=1 : '' ">
                                                                <i class="fa fa-plus-circle increamentor-plus"
                                                                    :class="{'increamentor-not-allowed' : package_number_of_rooms == 3 , 'increamentor-opacity' : package_number_of_rooms == 3}"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div v-for="n in package.number_of_children"
                                                    class="mb-1 d-flex flex-row justify-content-between align-items-center">
                                                    <div class="w-100"> Child @{{ n }} Age</div>

                                                    <select v-model="package.child_ages[n - 1]" class="w-100 form-control">
                                                        <option value="2" class="text-center">2</option>
                                                        <option value="3" class="text-center">3</option>
                                                        <option value="4" class="text-center">4</option>
                                                        <option value="5" class="text-center">5</option>
                                                        <option value="6" class="text-center">6</option>
                                                        <option value="7" class="text-center">7</option>
                                                        <option value="8" class="text-center">8</option>
                                                        <option value="9" class="text-center">9</option>
                                                        <option value="10" class="text-center">10</option>
                                                        <option value="11" class="text-center">11</option>

                                                    </select>

                                                </div>
                                                <div v-for="n in package.number_of_babies"
                                                    class="mb-1 d-flex flex-row justify-content-between align-items-center">
                                                    <div class="w-100"> Infant @{{ n }} Age</div>

                                                    <select v-model="package.baby_ages[n - 1]" class="w-100 form-control">
                                                        <option value="0" class="text-center">0</option>
                                                        <option value="1" class="text-center">1</option>
                                                    </select>

                                                </div>
                                            </div>

                                            {{-- <div class="d-flex align-items-center justify-content-end mb-2">
                                                <div><span class="gilroy-semi font-12 text-fe2f70">Add Room</span></div>
                                            </div> --}}
                                            <div v-on:click="package_travelers_count_display = 'none'"><button type="button"
                                                    class="btn btn-block btn-000941 font-12">Done</button></div>
                                        </div>
                                    </div>
                                    <div class="trippbo-dropdown" @mouseenter="package_class_type_display = 'block'"
                                        @mouseleave="package_class_type_display = 'none'">
                                        <button class="gilroy-medium text-000941 font-12">@{{ package_class }} <i
                                                class="fa fa-angle-down font-14 font-weight-bold ml-1"></i></button>
                                        <div :style="{display: package_class_type_display}" class="p-0 min-width-175px">
                                            <button v-on:click="package_class_type_display = 'none'" type="button"
                                                class="btn btn-block text-left hlg"><img class="icon-10px mr-2 hlg"
                                                    src="{{ asset('image/close.PNG') }}" /></button>

                                            <ul>


                                                <li><a class="btn gilroy-medium font-12"
                                                        :class="{'trippbo-dropdown-active' : package_class == 'Economy' }"
                                                        v-on:click=" package_class = 'Economy'">Economy</a></li>
                                                <li><a class="btn gilroy-medium font-12"
                                                        :class="{'trippbo-dropdown-active' : package_class == 'Business' }"
                                                        v-on:click=" package_class = 'Business'">Business</a></li>
                                                <li><a class="btn gilroy-medium font-12"
                                                        :class="{'trippbo-dropdown-active' : package_class == 'First' }"
                                                        v-on:click=" package_class = 'First'">First</a></li>
                                                <li><a class="btn gilroy-medium font-12"
                                                        :class="{'trippbo-dropdown-active' : package_class == 'Premium Economy' }"
                                                        v-on:click=" package_class = 'Premium Economy'"> Premium Economy</a>
                                                </li>
                                                <li><a class="btn gilroy-medium font-12"
                                                        :class="{'trippbo-dropdown-active' : package_class == 'Premium Business' }"
                                                        v-on:click=" package_class = 'Premium Business'"> Premium
                                                        Business</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{-- <button class="btn font-12">Car added</button> --}}


































                            </div>
                            <div class="w-100">
                                <div :class="{'show' : packageDepartureCityValidation, 'invisible' : !packageDepartureCityValidation}"
                                    class="alert alert-danger alert-dismissible fade show  w-100" role="alert">
                                    <strong>No Departure City Selected!</strong> Please select a city first.
                                    <button type="button" v-on:click="packageDepartureCityValidation = false"
                                        class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div :class="{'show' : packageDestinationCityValidation, 'invisible' : !packageDestinationCityValidation}"
                                    class="alert alert-danger alert-dismissible fade show  w-100" role="alert">
                                    <strong>No Destination City Selected!</strong> Please select a city first.
                                    <button type="button" v-on:click="packageDestinationCityValidation = false"
                                        class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="trippbo-packages-input-bar">

                                <div>

                                    <div class="d-flex flex-row-responsive">

                                        <div class="flex-grow-1 mb-2 mr-1-lg">
                                            <div class="position-relative inputField-box w-100"><img
                                                    class="icon-18px mr-1" src="/image/location.png"><input
                                                    v-model="packageOrigin"
                                                    v-on:change="packageOrigin = $event.target.value" type="text"
                                                    class="inputField inputField-withicon add-border-radius "
                                                    placeholder="Leaving">
                                                <button v-on:click="clearPackageOrigin"
                                                    v-if="packageOriginAirportCode !== ''"
                                                    style="position: absolute; right:20px; top : 12px;" type="button"
                                                    class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                                <div class="w-100"
                                                    style="position: absolute;z-index:10;background-color:white;">
                                                    <autocomplete-airport-component
                                                        @autocomplete_result_selected="selectPackageOriginResult"
                                                        :keyword="packageOrigin">
                                                    </autocomplete-airport-component>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="position-relative inputField-box w-100"><img
                                                    src="/image/arrow-right-shadow.svg" class="field-connector"><img
                                                    class="icon-18px mr-1" src="/image/location.png"><input
                                                    v-model="packageDestination"
                                                    v-on:change="packageDestination = $event.target.value" type="text"
                                                    class="inputField inputField-withicon add-border-radius "
                                                    placeholder="Going">
                                                <button v-on:click="clearPackageDestination"
                                                    v-if="packageDestinationAirportCode !== ''"
                                                    style="position: absolute; right:20px; top : 12px;" type="button"
                                                    class="close" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                                <div class="w-100"
                                                    style="position: absolute;z-index:10;background-color:white;">
                                                    <autocomplete-airport-component
                                                        @autocomplete_result_selected="selectPackageDestinationResult"
                                                        :keyword="packageDestination">
                                                    </autocomplete-airport-component>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative inputField-box">
                                        <vc-date-picker v-model="selectedPackageRange" :min-date='new Date()' color="pink"
                                            is-range :masks="{iso: 'YYYY-MM-DD',input: ['MMM, DD'] }">
                                            <template v-slot="{ inputValue, inputEvents }">
                                                {{-- <img src="/image/policy.png" class="icon-18px mb-2"><input type="text"
                                                id="DateFrom" class="inputField inputField-withicon" placeholder="Departing"> --}}
                                                <div class="flex justify-center items-center">
                                                    <img class="icon-18px mr-1" src="/image/policy.png"><input
                                                        :value="inputValue.start + ' To ' + inputValue.end"
                                                        v-on="inputEvents.start"
                                                        class="inputField inputField-withicon add-border-radius w-100" />


                                                </div>
                                            </template>
                                        </vc-date-picker>
                                        {{-- <img src="/image/policy.png" class="icon-18px mb-2"><input type="text"
                                            id="DateFrom" class="inputField inputField-withicon" placeholder="Departing"> --}}
                                    </div>
                                </div>
                                {{-- <div>
                                    <div class="position-relative inputField-box">
                                        <img src="/image/policy.png" class="icon-18px mr-1"><input type="text" id="DateTo"
                                            class="inputField inputField-withicon" placeholder="Returning">
                                    </div>
                                </div> --}}
                            </div>
                            <div><button type="button"
                                    class="btn btn-block gilroy-medium btn-fe2f70 px-5 add-border-radius "
                                    v-on:click="packageSearch">Find</button>
                            </div>
                        </div>
                        <div id="things" class="pt-3 city" style="display:none">
                            {{-- <div class="d-flex mb-3">
                                <p class="gilroy-medium font-12">Looking for sports, concerts, or music festivals? <a
                                        class="btn btn-link gilroy-semi font-12 text-fe2f70 p-0" href="#">Search event
                                        tickets</a></p>
                            </div> --}}
                            <div :class="{'show' : activityValidationError, 'invisible' : !activityValidationError}"
                                class="alert alert-danger alert-dismissible fade  w-100" role="alert">
                                <strong>No Destination Selected!</strong> Please select a destination first.
                                <button type="button" v-on:click="activityValidationError = false" class="close"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="form-group row px-2">
                                <div class="col-sm-12 col-lg-6 px-1 mb-2">
                                    <div class="flex-grow-1 position-relative">
                                        <div class="position-relative inputField-box w-100">
                                            <img class="icon-18px mr-1" src="/image/location.png">
                                            <input type="text" class="inputField inputField-withicon add-border-radius"
                                                placeholder="Destination" v-model="activityDestination"
                                                v-on:input="activityDestination = $event.target.value" />
                                            <button v-on:click="clearActivity" v-if="activityCityId !== ''"
                                                style="position: absolute; right:20px; top : 12px;" type="button"
                                                class="close" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div style="position: absolute;z-index:10;background-color:white;"
                                            class="w-100">
                                            <autocomplete-activity-component
                                                @autocomplete_result_selected="selectActivityResult($event)"
                                                :keyword="activityDestination"></autocomplete-activity-component>
                                        </div>


                                    </div>

                                </div>
                                <div class="col-sm-12 col-lg-6 px-1 mb-2 position-relative">
                                    <div class="position-relative inputField-box add-border-radius">


                                        <vc-date-picker v-model="selectedRange" :min-date='new Date()' color="pink" is-range
                                            :masks="{iso: 'YYYY-MM-DD',input: ['MMM, DD'] }">
                                            <template v-slot="{ inputValue, inputEvents }">
                                                <div class="flex justify-center items-center">
                                                    <img class="icon-18px mr-1" src="/image/policy.png"><input
                                                        :value="inputValue.start + ' To ' + inputValue.end"
                                                        v-on="inputEvents.start"
                                                        class="inputField inputField-withicon add-border-radius w-100" />


                                                </div>
                                            </template>
                                        </vc-date-picker>
                                    </div>

                                </div>

                            </div>
                            <div><button v-on:click="findActivities" type="button"
                                    class="btn btn-block gilroy-medium btn-fe2f70 px-5 add-border-radius">Find</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="position: relative">
            <div style="position: relative">
                <section class="trippbo_section mt-2 section_padding d-flex flex-row align-items-center"
                    style="height: 400px;">
                    <div class="container-lg">
                        <div class="row">
                            <div class="col-lg-10 m-auto">
                                <h2 class="section_heading mb-3" style="font-family: vag_rounded_bold !important;">trippbo
                                </h2>
                                <div class="trippbo_texts">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                    <p>when an unknown printer took a galley.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- SECTION GRIDS -->
                <div class="sec_grids section_padding">
                    <div class="container-lg">
                        <div class="box_grids">
                            <!-- gird 1 -->
                            <div class="box_grid box_grid_1">
                                <a href="#" class="btn btn_primary" style="font-family: rubrik_bold !important;">Fund my
                                    Trip</a>
                            </div>
                            <!-- grid 2 -->
                            <div class="box_grid box_grid_2">
                                <div class="box_grid_2_child box_grid_child">
                                    <h5 class="fw_normal_w grid_text_s_a g_text_shadow_r">It's time to make a chance. Have
                                        your
                                    </h5>
                                    <h2 class="grid_h2 g_c_light" style="font-family: rubrik_bold !important;color:white;">
                                        next trip funded by</h2>
                                    <h5 class="fw_normal_w grid_text_s_a g_text_shadow_r">supporters from around the world.
                                    </h5>
                                </div>
                                <a href="#" class="btn_explore" style="font-family: rubrik_bold !important;">Explore
                                    &nbsp;<span>&#62;</span></a>
                            </div>
                            <!-- grid 3 -->
                            <div class="box_grid box_grid_3">
                                <a href="#" class="btn btn_primary" style="font-family: rubrik_bold !important;">Tickets
                                    Lottery</a>
                            </div>
                            <!-- grid 4 -->
                            <div class="box_grid box_grid_4">
                                <div class="box_grid_2_child box_grid_child">
                                    <h3 class="fw_normal_w grid_text_s_a">The best time to</h3>
                                    <h2 class="grid_h2 g_c_light" style="font-family: rubrik_bold !important;color:white;">
                                        travel is now.</h2>
                                </div>
                                <a href="#" class="btn_explore" style="font-family: rubrik_bold !important;">Explore
                                    &nbsp;<span>&#62;</span></a>
                            </div>
                            <!-- gird 2 -->
                            <div class="box_grid box_grid_5">
                                <div class="box_grid_5_child box_grid_child">
                                    <h5 class="fw_normal grid_text_s_a">A shared experience is</h5>
                                    <h2 class="grid_h2 g_c_black " style="font-family: rubrik_bold !important;">double the
                                        fun.</h2>
                                    <h6 class="fw_normal grid_text_s_b">Meet your new adventure buddies <br> with Trippbo.
                                    </h6>
                                </div>
                                <a href="#" class="btn_explore" style="font-family: rubrik_bold !important;">Explore
                                    &nbsp;<span>&#62;</span></a>
                            </div>
                            <!-- grid 6 -->
                            <div class="box_grid box_grid_6">
                                <a href="#" class="btn btn_primary" style="font-family: rubrik_bold !important;">Fund my
                                    Trip Solo</a>
                            </div>
                            <!-- grid 7 -->
                            <div class="box_grid box_grid_7">
                                <div class="box_grid_2_child box_grid_child">
                                    <h3 class="fw_normal_w grid_text_s_a">Try your luck to</h3>
                                    <h2 class="grid_h2 g_c_light" style="font-family: rubrik_bold !important;color:white;">
                                        win your<br>dream trip.</h2>
                                </div>
                                <a href="#" class="btn_explore" style="font-family: rubrik_bold !important;">Explore
                                    &nbsp;<span>&#62;</span></a>
                            </div>
                            <!-- grid 8 -->
                            <div class="box_grid box_grid_8">
                                <a href="#" class="btn btn_primary" style="font-family: rubrik_bold !important;">Book a
                                    Trip</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SECTION GRDS END -->

    </div>

@endsection
@section('scripts')

    <script src="/js/home/custom.js"></script>
    <script src="/js/home/home.js"></script>

    <script>
        const v = new Vue({
            el: '#homepage_app',
            vuetify: new Vuetify(),
            data: {

                showCalendar: false,
                showHotelCalendar: false,
                showFlightCalendar: false,
                showFlightOneWayCalendar: false,
                hotelValidationError: false,



                selectedRange: {
                    start: moment().add(14, 'days').format('YYYY-MM-DD'),
                    end: moment().add(21, 'days').format(
                        'YYYY-MM-DD')
                },
                selectedRangeOrdered: {
                    start: moment().add(14, 'days').format('YYYY-MM-DD'),
                    end: moment().add(21, 'days').format(
                        'YYYY-MM-DD')
                },
                selectedHotelRange: {
                    start: moment().add(14, 'days').format('YYYY-MM-DD'),
                    end: moment().add(21, 'days').format('YYYY-MM-DD'),
                },
                selectedHotelRangeOrdered: {
                    start: moment().add(14, 'days').format('YYYY-MM-DD'),
                    end: moment().add(21, 'days').format('YYYY-MM-DD'),
                },

                selectedFlightRange: {
                    start: moment().add(14, 'days').format('YYYY-MM-DD'),
                    end: moment().add(21, 'days').format('YYYY-MM-DD')
                },

                selectedFlightRangeOrdered: {
                    start: moment().add(14, 'days').format('YYYY-MM-DD'),
                    end: moment().add(21, 'days').format('YYYY-MM-DD')
                },
                selectedPackageRange: {
                    start: moment().add(14, 'days').format('YYYY-MM-DD'),
                    end: moment().add(21, 'days').format('YYYY-MM-DD')
                },
                selectedFlightOnewayDate: moment().add(14, 'days').format('YYYY-MM-DD'),
                selectedFlightOnewayDateOrdered: moment().add(14, 'days').format('YYYY-MM-DD'),

                isDark: false,
                activityDestination: '',
                activityCityId: '',

                hotelDestination: '',
                hotelCityId: '',
                hotels_number_of_rooms: 1,
                hotels_rooms: [{
                        enabled: true,
                        hotels_number_of_adults: 2,
                        hotels_number_of_children: 0,
                        child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],

                    },
                    {
                        enabled: false,
                        hotels_number_of_adults: 1,
                        hotels_number_of_children: 0,
                        child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],

                    },
                    {
                        enabled: false,
                        hotels_number_of_adults: 1,
                        hotels_number_of_children: 0,
                        child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],

                    }
                ],

                hotels_travelers_count_display: 'none',

                packageDestinationCity: '',
                packageOriginCity: '',
                packageDestinationCountry: '',
                packageOriginCountry: '',
                packageDestination: '',
                packageOrigin: '',
                packageOriginAirportCode: '',
                packageDestinationAirportCode: '',
                package_number_of_rooms: 1,
                package_rooms: [{
                        enabled: true,
                        number_of_adults: 2,
                        number_of_children: 0,
                        number_of_babies: 0,

                        child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                        baby_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                    },
                    {
                        enabled: false,
                        number_of_adults: 1,
                        number_of_children: 0,
                        number_of_babies: 0,
                        child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                        baby_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                    },
                    {
                        enabled: false,
                        number_of_adults: 1,
                        number_of_children: 0,
                        number_of_babies: 0,
                        child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                        baby_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                    }
                ],

                flightDestination: '',
                flightDestinationAirportCode: '',
                flightOrigin: '',
                flightOriginAirportCode: '',
                flights_number_of_adults: 1,
                flights_number_of_children: 0,
                flights_number_of_babies: 0,
                flights_travelers_count_display: 'none',
                flights_class: 'Economy',
                flight_class_type_display: 'none',
                flight_trip_type: 'round trip',


                package_number_of_adults: 1,
                package_number_of_children: 0,
                package_number_of_babies: 0,
                package_travelers_count_display: 'none',
                package_class: 'Economy',
                package_class_type_display: 'none',
                package_number_of_rooms: 1,
                flightDestinationCityValidation: false,
                flightDepartureCityValidation: false,
                packageDestinationCityValidation: false,
                packageDepartureCityValidation: false,
                activityValidationError: false,


            },
            methods: {
                packageSearch: function() {
                    if (this.packageOriginAirportCode == '') {
                        this.packageDepartureCityValidation = true;
                        return;
                    } else {
                        this.packageDepartureCityValidation = false;
                    }
                    if (this.packageDestinationAirportCode == '') {
                        this.packageDestinationCityValidation = true;
                        return;
                    } else {
                        this.packageDestinationCityValidation = false;
                    }
                    let url = '/hotels/search';

                    url += '?isPackage=1'
                    url += '&originCity=' + this.packageOriginCity
                    url += '&destinationCity=' + this.packageDestinationCity
                    url += '&originCountry=' + this.packageOriginCountry
                    url += '&destinationCountry=' + this.packageDestinationCountry
                    url += '&originAirportCode=' + this.packageOriginAirportCode
                    url += '&destinationAirportCode=' + this.packageDestinationAirportCode
                    url += '&package_class=' + this.package_class
                    url += '&CheckInDate=' + this.selectedPackageRange.start
                    url += '&CheckOutDate=' + this.selectedPackageRange.end

                    for (let roomCount = 0; roomCount < package_number_of_rooms; roomCount++) {
                        url += '&adultCount' + roomCount + '=' + this.package_rooms[roomCount].number_of_adults
                        url += '&childCount'  + roomCount + '=' + this.package_rooms[roomCount].number_of_children
                        url += '&infantCount'  + roomCount + '=' + this.package_rooms[roomCount].number_of_babies

                        let childAges = ''
                        for (let childAgeCount = 0;childAgeCount < this.package_rooms[roomCount].number_of_children; childAgeCount++)
                        {
                            childAges += this.package_rooms[roomCount].child_ages[childAgeCount] + ",";
                        }
                        let infantAges = ''
                        for (let infantAgeCount = 0;infantAgeCount < this.package_rooms[roomCount].number_of_babies; infantAgeCount++)
                        {
                            infantAges += this.package_rooms[roomCount].baby_ages[infantAgeCount] + ",";
                        }
                        url += '&childAges'  + roomCount + '=' + childAges
                        url += '&infantAges'  + roomCount + '=' + infantAges


                    }


                    url += '&roomCount=' + this.package_number_of_rooms
                    url += '&hotel_destination_name=' + this.packageDestination


                    window.location = url;
                },
                availableDates: function(val) {

                    let date = moment(val, 'YYYY-MM-DD')
                    let today = moment()

                    if (date.diff(today, 'days') > -1) {
                        return true
                    }
                    return false




                },
                selectPackageDestinationResult: function(event) {

                    this.packageDestinationCity = event.CityName
                    this.packageDestinationCountry = event.CountryName
                    this.packageDestinationAirportCode = event.Code;
                    this.packageDestination = this.packageDestinationCity + ', ' + this
                        .packageDestinationCountry

                },
                selectPackageOriginResult: function(event) {
                    this.packageOriginCity = event.CityName
                    this.packageOriginCountry = event.CountryName
                    this.packageOrigin = this.packageOriginCity + ', ' + this.packageOriginCountry
                    this.packageOriginAirportCode = event.Code;
                },
                findActivities: function() {
                    if (this.activityCityId !== '') {
                        window.location = 'activities?city_id=' + this.activityCityId + '&date_from=' + this
                            .selectedRangeOrdered.start + '&date_to=' + this.selectedRangeOrdered.end +
                            '&activity_destination_name=' + this.activityDestination;
                    } else {
                        this.activityValidationError = true;
                    }

                },
                selectActivityResult: function(result) {

                    this.activityCityId = result.city_code;
                    this.activityDestination = result.country_name + ', ' + result.city_name;
                },
                selectHotelResult: function(result) {
                    this.hotelDestination = result.country + ', ' + result.name;
                    this.hotelCityId = result.id;
/*
                    this.hotelCityId = result.city_code;
                    this.hotelDestination = result.country_name + ', ' + result.city_name; */
                },
                clearHotel: function() {
                    this.hotelCityId = '';
                    this.hotelDestination = '';

                },
                clearActivity: function() {
                    this.activityCityId = '';
                    this.activityDestination = '';
                },
                selectFlightOriginResult: function(result) {

                    this.flightOriginAirportCode = result.Code;
                    this.flightOrigin = result.AirportName + ', ' + result.CityName;
                },
                selectFlightDestinationResult: function(result) {

                    this.flightDestinationAirportCode = result.Code;
                    this.flightDestination = result.AirportName + ', ' + result.CityName;
                },
                searchFlights: function() {
                    if (this.flightOriginAirportCode == '') {
                        this.flightDepartureCityValidation = true;
                        return;
                    } else {
                        this.flightDepartureCityValidation = false;
                    }
                    if (this.flightDestinationAirportCode == '') {
                        this.flightDestinationCityValidation = true;
                        return;
                    } else {
                        this.flightDestinationCityValidation = false;
                    }
                    let url = '/flights/search';
                    if (this.flight_trip_type == 'mutli city') {
                        return;
                    }


                    if (this.flight_trip_type == 'round trip') {
                        url += '?origin=' + this.flightOriginAirportCode
                        url += '&destination=' + this.flightDestinationAirportCode
                        url += '&departureDate=' + this.selectedFlightRangeOrdered.start
                        url += '&returnDate=' + this.selectedFlightRangeOrdered.end
                        url += '&adultCount=' + this.flights_number_of_adults
                        url += '&childCount=' + this.flights_number_of_children
                        url += '&infantCount=' + this.flights_number_of_babies
                        url += '&flight_class=' + this.flights_class
                        url += '&flightType=' + this.flight_trip_type
                        url += '&flight_origin_name=' + this.flightOrigin
                        url += '&flight_destination_name=' + this.flightDestination

                    }
                    if (this.flight_trip_type == 'one way') {
                        url += '?origin=' + this.flightOriginAirportCode
                        url += '&destination=' + this.flightDestinationAirportCode
                        url += '&departureDate=' + this.selectedFlightOnewayDateOrdered
                        url += '&returnDate='
                        url += '&adultCount=' + this.flights_number_of_adults
                        url += '&childCount=' + this.flights_number_of_children
                        url += '&infantCount=' + this.flights_number_of_babies
                        url += '&flight_class=' + this.flights_class
                        url += '&flightType=' + this.flight_trip_type
                        url += '&flight_origin_name=' + this.flightOrigin
                        url += '&flight_destination_name=' + this.flightDestination
                    }

                    window.location = url;
                },
                validateHotelForm: function() {
                    if (this.hotelCityId !== '') {
                        return true;
                    } else {
                        this.hotelValidationError = true;
                    }
                },
                clearFlightDestination: function() {
                    this.flightDestinationAirportCode = ''
                    this.flightDestination = ''
                },
                clearFlightOrigin: function() {
                    this.flightOriginAirportCode = ''
                    this.flightOrigin = ''
                },
                clearPackageDestination: function() {
                    this.packageDestinationAirportCode = ''
                    this.packageDestination = ''
                },
                clearPackageOrigin: function() {
                    this.packageOrigin = ''
                    this.packageOriginAirportCode = ''
                },
                searchHotels: function() {

                    if (this.validateHotelForm()) {
                        let url = '/hotels/search';

                        url += '?cityId=' + this.hotelCityId
                        url += '&CheckInDate=' + this.selectedHotelRangeOrdered.start
                        url += '&CheckOutDate=' + this.selectedHotelRangeOrdered.end

                        for (let x = 0; x < this.hotels_number_of_rooms; x++) {
                            url += '&adultCount' + x + '=' + this.hotels_rooms[x].hotels_number_of_adults
                            url += '&childCount' + x + '=' + this.hotels_rooms[x].hotels_number_of_children
                            let ages = '';
                            for (let y = 0; y < this.hotels_rooms[x].hotels_number_of_children; y++) {
                                ages += this.hotels_rooms[x].child_ages[y] + ',';
                            }
                            url += '&childAges' + x + '=' + ages;
                        }

                        url += '&roomCount=' + this.hotels_number_of_rooms
                        url += '&hotel_destination_name=' + this.hotelDestination


                        window.location = url;
                    } else {

                    }

                },

            },
            mounted: function() {

            },
            computed: {
                formattedActivityFromDate: function() {
                    return moment(this.selectedRangeOrdered.start).format('MMM, DD');
                },
                formattedActivityToDate: function() {
                    return moment(this.selectedRangeOrdered.end).format('MMM, DD');
                },
                formattedHotelFromDate: function() {
                    return moment(this.selectedHotelRangeOrdered.start).format('MMM, DD');
                },
                formattedHotelToDate: function() {
                    return moment(this.selectedHotelRangeOrdered.end).format('MMM, DD');
                },
                formattedFlightFromDate: function() {

                    return moment(this.selectedFlightRangeOrdered.start).format('MMM, DD');

                },
                formattedFlightToDate: function() {
                    return moment(this.selectedFlightRangeOrdered.end).format('MMM, DD');
                },
                formattedSelectedFlightOnewayDate: function() {
                    return moment(this.selectedFlightOnewayDateOrdered).format('MMM, DD');

                },
                hotelNumberOfTravelers: function() {

                    let total = 0;
                    for (let x = 0; x < this.hotels_number_of_rooms; x++) {
                        total += this.hotels_rooms[x].hotels_number_of_adults;
                        total += this.hotels_rooms[x].hotels_number_of_children;
                    }
                    return total;
                }
            },
            watch: {
                selectedFlightRange: function(val) {

                    this.selectedFlightRangeOrdered.start = moment(val.start).format('YYYY-MM-DD')
                    this.selectedFlightRangeOrdered.end = moment(val.end).format('YYYY-MM-DD')


                },
                selectedHotelRange: function(val) {

                    this.selectedHotelRangeOrdered.start = moment(val.start).format('YYYY-MM-DD')
                    this.selectedHotelRangeOrdered.end = moment(val.end).format('YYYY-MM-DD')



                },
                selectedFlightOnewayDate: function(val) {
                    this.selectedFlightOnewayDateOrdered = moment(val).format('YYYY-MM-DD');
                },
                selectedRange: function(val) {
                    this.selectedRangeOrdered.start = moment(val.start).format('YYYY-MM-DD')
                    this.selectedRangeOrdered.end = moment(val.end).format('YYYY-MM-DD')
                }

            }
        })
    </script>
@endsection
