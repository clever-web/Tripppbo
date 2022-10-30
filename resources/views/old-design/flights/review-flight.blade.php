@extends('layout')
@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">
    <link href="/css-r/home/all-booking.css" rel="stylesheet">

    <style>
        .height_fit_content {
            max-height: fit-content !important;
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

        .body-content,
        .body-content * {
            border-radius: 15px !important;
        }

        .timeline-accordion,
        .timeline-accordion * {
            border-radius: 0px !important;
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

        .extra-services {
            margin-bottom: 10px;
            flex-direction: column;
        }

        @media all and (min-width:768px) {
            .extra-services {
                flex-direction: row;
            }

        }

    </style>
@endsection

@section('content')
    <div id="flights_app" class="body-content">
        <section class="pb-5">
            <div class="wrapper">
                <div class="breadcrumb_ mb-4">
                    <ol class="">
                        <li class="breadcrumb-item">
                            <a>Flight</a>
                        </li>
                        <li class="breadcrumb-item active">Review</li>
                    </ol>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div><i class="fa fa-angle-left font-26 text-23242c mr-3"></i></div>
                    <div>
                        <h4 class="gilroy-semi font-30 text-23242c mb-0">Review your flight</h4>
                    </div>
                </div>
                {{-- <div class="img-block bg-000941 p-4 mb-3 ml-3">
                    <div><i class="fa fa-exclamation-triangle font-20 text-white"></i></div>
                    <div>
                        <p class="gilroy-regular font-12 text-white mb-0">COVID-19 alert: Travel requirements are changing
                            rapidly, including need for pre-travel COVID-19 testing and quarantine on arrival.</p>
                        <p class="mb-0"><a
                                class="btn btn-link gilroy-semi font-12 text-decoration-underline text-white p-0"
                                href="#">Check restrictions for your trip</a></p>
                    </div>
                </div>
                <div class="img-block bg-fafafa border-d2d2d2 p-4 mb-3 ml-3">
                    <div><img src="/image/double-check-circle.png"></div>
                    <div>
                        <p class="gilroy-semi font-16 text-1f2223 mb-0">No change fees for all flights</p>
                        <p class="gilroy-regular font-14 text-1f2223 mb-0">You can change these flights without paying a fee
                            if plans change. Because flexibility matters.</p>
                    </div>
                </div> --}}
                <div class="row mx-0">
                    <div class="col-sm-12 col-lg-8">
                        <div class="mb-3 border-d2d2d2 p-4">


                            <ul class="flight-available">
                                <div class="col-12  pt-0">
                                    <div class="row">
                                        <div v-for="(segment, segmentIndex) in flight" :key="segmentIndex"
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
                                                                                width="30px">
                                                                            @{{ stop.flight.OperatorName }}
                                                                        </button>
                                                                        <div class="accordion-content">


                                                                            <p class="mb-0"><span
                                                                                    class="font-size-11">
                                                                                    @{{ stop.flight.OperatorCode }}
                                                                                    @{{ stop.flight.FlightNumber }}</span>
                                                                            </p>
                                                                            <p class="mb-0"><img
                                                                                    src="/img/seat.png" width="15px"
                                                                                    height="15px"><span
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
                                                                                width="30px">
                                                                            @{{ stop.nextFlight.OperatorName }}
                                                                        </button>
                                                                        <div class="accordion-content">


                                                                            <p class="mb-0"><span
                                                                                    class="font-size-11">@{{ stop.nextFlight.OperatorCode }}
                                                                                    @{{ stop.nextFlight.FlightNumber }}</span>
                                                                            </p>

                                                                            <p class="mb-0"><img
                                                                                    src="/img/seat.png" width="15px"
                                                                                    height="15px"><span
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
                                                    <div v-if="segment.length == 1" class="stop">
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
                                                                                width="30px">
                                                                            @{{ segment[0].OperatorName }}
                                                                        </button>
                                                                        <div class="accordion-content">
                                                                            <p class="mb-0"><span
                                                                                    class="font-size-11">@{{ segment[0].OperatorCode }}
                                                                                    @{{ segment[0].FlightNumber }}</span>
                                                                            </p>

                                                                            <p class="mb-0"><img
                                                                                    src="/img/seat.png" width="15px"
                                                                                    height="15px"><span
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
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div>
                                            <div v-if="flight.refundable"><button type="button"
                                                    class="btn gilroy-medium btn-000941 font-14 px-3 mb-2">Refundable</button>
                                            </div>
                                            {{-- <div>
                                            <p class="gilroy-regular font-12 mb-0">5 cleaning and safety practices for
                                                Etihad Airways</p>
                                        </div> --}}
                                        </div>
                                        <div>
                                            <h4 class="gilroy-semi font-22 mb-0 text-align-right">
                                                {{-- $@{{ extractFlightPrice(flight) }}</h4> --}} {{-- <p class="gilroy-regular font-12 mb-0">@{{ flight_trip_type }} per traveler</p> --}}
                                                {{-- <button v-on:click="reserveFlight"  class="btn btn-block gilroy-medium btn-fe2f70">Book</button> --}}
                                        </div>
                                    </div>
                                </div>





                            </ul>
                            {{-- <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <h4 class="gilroy-semi font-28 text-23242c mb-2">Lahore to Dubai</h4>
                                <p class="gilroy-regular font-14 text-23242c">Tue, Jun 15</p>
                            </div>
                            <div><img class="icon-60px" src="/image/etihad.png" /></div>
                        </div>
                        <div class="d-flex mb-3">
                            <div><img class="icon-24px mr-3" src="/image/plane-up.png"></div>
                            <div>
                                <h4 class="gilroy-semi font-16 mb-1 mt-1">3:50am - Lahore</h4>
                                <p class="font-12 text-black gilroy-regular mb-3">Allam Iqbal Intl. (LHE)</p>
                                <p class="font-12 text-black gilroy-regular mb-2">3h 45m flight Qatar Airways 621 BOEING 777-300ER</p>
                                <div class="d-flex align-items-center mb-2">
                                    <div><img class="icon-28px mr-3" src="/image/wifi.png"></div>
                                    <div><img class="icon-28px mr-3" src="/image/switch.png"></div>
                                    <div><img class="icon-28px" src="/image/play.png"></div>
                                </div>
                                <p class="font-12 text-black gilroy-regular mb-3">Economy/Coach (Y)</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div><img class="icon-24px mr-3" src="/image/plane-down.png"></div>
                            <div>
                                <h4 class="gilroy-semi font-16 mb-1 mt-1">5:35am - Doha</h4>
                                <p class="font-12 text-black gilroy-regular mb-3">Hamad Intl. (DOH)</p>
                                <hr />
                                <p class="font-14 text-black gilroy-regular mb-3">Layover: 13h 25m in Doha</p>
                                <hr />
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div><img class="icon-24px mr-3" src="/image/plane-up.png"></div>
                            <div>
                                <h4 class="gilroy-semi font-16 mb-1 mt-1">7;00am - Doha</h4>
                                <p class="font-12 text-black gilroy-regular mb-3">Hamad Intl. (DOH)</p>
                                <p class="font-12 text-black gilroy-regular mb-2">1h 10m flight Qatar Airways 1018</p>
                                <div class="d-flex align-items-center mb-2">
                                    <div><img class="icon-28px mr-3" src="/image/wifi.png"></div>
                                    <div><img class="icon-28px mr-3" src="/image/switch.png"></div>
                                    <div><img class="icon-28px" src="/image/play.png"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div><img class="icon-24px mr-3" src="/image/plane-down.png"></div>
                            <div>
                                <h4 class="gilroy-semi font-16 mb-1 mt-1">Arrival9:10pm - Dubai</h4>
                                <p class="font-12 text-black gilroy-regular mb-4">Dubai Intl. (DXB)</p>
                                <div><a class="btn btn-link gilroy-semi font-16 text-decoration-underline text-fe2f70 p-0" href="#">Hide details</a></div>
                            </div>
                        </div> --}}
                        </div>

                        <div class="mb-3 border-d2d2d2 bg-fafafa p-4">

                            <div class="row">
                                <div class="row pt-3">
                                    <div class="col-12">
                                        <h4 class="font-weight-bold gilroy-medium">Flight Travelers
                                            Information</h4>
                                        <div class="font-13">Traveler names must match
                                            government-issued
                                            photo ID exactly.
                                        </div>
                                    </div>
                                </div>


                                <div class="section-2 w-100 px-3 mt-3"
                                    v-for="(passenger, passengerIndex) in passengers_break_up" :key="passengerIndex">

                                    <form :id="'passenger' + passengerIndex" method="POST" action="/flights/addPassengers">

                                        <div class="row px-2">
                                            <div class="col-12 px-1">
                                                <div class="w-50 d-flex flex-row justify-content-start align-items-center">
                                                    <div><span
                                                            style="font-weight: 900;font-size:18px;">@{{ passenger.type == 1 ? 'Adult' : (passenger.type == 2 ? 'Child' : 'Infant') }}
                                                            @{{ beautifyPassengerIndex(passengerIndex) }}</span></div>

                                                </div>




                                            </div>


                                            <hr>

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


                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                <input name="FirstName" type="text" class="form-control input-control"
                                                    placeholder="First name" required>
                                            </div>

                                            <div class="col-sm-12 col-md-6 pt-2 px-1">
                                                <input name="LastName" type="text" class="form-control input-control"
                                                    placeholder="Last name" required>
                                            </div>

                                            <input name="IsLeadPax" type="hidden" :value="passengerIndex == 0">




                                            <div class="col-12 m-0 px-1">
                                                Date Of Birth:

                                            </div>

                                            <div class="col-sm-12 col-md-6 pt-0 px-1">

                                                <select required class="form-control input-control" name="DateOfBirthYear">
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

                                                <select required class="form-control input-control" name="DateOfBirthDay">
                                                    <option value="" disabled selected>
                                                        Day
                                                    </option>
                                                    @for ($x = 1; $x <= 31; $x++)
                                                        <option value="{{ $x }}">
                                                            {{ $x }}</option>

                                                    @endfor
                                                </select>
                                            </div>



                                            <input type="hidden" name="PaxType" :value="passenger.type">



                                            <div
                                                class="d-flex extra-services  justify-content-center align-items-center w-100">



                                                <div v-if="baggage_options.length > 1">
                                                    <button type="button" class="btn btn-back w-100 ml-2 px-2 py-2 font-12"
                                                        style="margin:0px !important;"
                                                        v-on:click="hidePanels(passenger);passenger.show_add_more_baggage_panel = !passenger.show_add_more_baggage_panel">
                                                        Baggage Included <i class="fas fa-suitcase"></i>
                                                        @{{ flight[0][0].Attr.Baggage }}
                                                        <span class="p-2"
                                                            style="background: white;color:black"><i
                                                                class="fas fa-suitcase"></i>
                                                            <span>
                                                                @{{ baggage_options[passenger.selected_baggage_index].Weight }}
                                                            </span>
                                                        </span>
                                                    </button>
                                                </div>


                                                <div v-if="meal_options.length > 1">
                                                    <button type="button" class="btn btn-back w-100 ml-2 px-2 py-2 font-12"
                                                        style="margin:0px !important;"
                                                        v-on:click="hidePanels(passenger);passenger.show_select_meal_panel = !passenger.show_select_meal_panel">
                                                        Meal Excluded
                                                        <span class="p-2"
                                                            style="background: white;color:black"><i
                                                                class="fas fa-utensils"></i>
                                                            <span>
                                                                @{{ getMealDescription(meal_options[passenger.selected_meal_index], true) }}


                                                            </span>
                                                        </span>
                                                    </button>
                                                </div>


                                                <div v-if="meal_preference_options.length > 1">
                                                    <button type="button" class="btn btn-back w-100 ml-2 px-2 py-2 font-12"
                                                        style="margin:0px !important;"
                                                        v-on:click="hidePanels(passenger);passenger.show_meal_preference_panel = !passenger.show_meal_preference_panel">
                                                        Meal Included
                                                        <span class="p-2"
                                                            style="background: white;color:black"><i
                                                                class="fas fa-utensils"></i>
                                                            <span>
                                                                @{{ getMealDescription(meal_preference_options[passenger.selected_meal_preference_id], true) }}


                                                            </span>
                                                        </span>
                                                    </button>

                                                </div>

                                            </div>
                                            <div class="col-12" class="m-0 mb-1"
                                                v-if="passenger.show_add_more_baggage_panel == true || passenger.show_select_meal_panel == true || passenger.show_meal_preference_panel == true">
                                                <transition name="fade">


                                                    <div class="row pt-2 px-1 mb-3 "
                                                        v-if="passenger.show_add_more_baggage_panel == true">


                                                        <div class="col-lg-2 d-flex baggage_option flex-column justify-content-center align-items-center "
                                                            v-for="(baggage, baggageIndex) in baggage_options"
                                                            :key="baggageIndex"
                                                            v-on:click="passenger.selected_baggage_index = baggageIndex ; passenger.show_add_more_baggage_panel = false;addBaggage(passenger.passenger_id, baggage.BaggageId)"
                                                            :class="{'selected' : passenger.selected_baggage_index == baggageIndex}">
                                                            <div><i class="fas fa-suitcase"></i>
                                                                @{{ baggage.Weight }} </div>

                                                            <div class="price  w-100 text-center">
                                                                @{{ baggage.Price }}
                                                                @{{ baggage.Currency }} </div>


                                                        </div>
                                                    </div>
                                                </transition>
                                                <transition name="fade">


                                                    <div class="row pt-2 px-1 mb-3 "
                                                        v-if="passenger.show_select_meal_panel == true">


                                                        <div class="col-lg-2 d-flex baggage_option flex-column justify-content-center align-items-center "
                                                            v-for="(meal, mealIndex) in meal_options" :key="mealIndex"
                                                            v-on:click="passenger.selected_meal_index = mealIndex ; passenger.show_select_meal_panel = false; addMeal(passenger.passenger_id, meal.MealId)"
                                                            :class="{'selected' : passenger.selected_meal_index == mealIndex}">
                                                            <div><i class="fas fa-utensils"></i>

                                                                <span>
                                                                    @{{ getMealDescription(meal) }}
                                                                    <span
                                                                        v-on:click.stop="meal.Show_full_description = true"
                                                                        v-if="meal.Show_full_description == false && meal.Description.length > 15"
                                                                        style="color: #FE2F70;">

                                                                        ...
                                                                        <i class="fas fa-plus"
                                                                            style="color: #FE2F70;"></i>
                                                                    </span>


                                                                    <i v-on:click.stop="meal.Show_full_description = false"
                                                                        v-if="meal.Show_full_description == true"
                                                                        class="fas fa-minus" style="color: #FE2F70;"></i>

                                                                </span>

                                                            </div>

                                                            <div class="price  w-100 text-center">
                                                                @{{ meal.Price }}
                                                                @{{ meal.Currency }} </div>


                                                        </div>
                                                    </div>
                                                </transition>
                                                <transition name="fade">


                                                    <div class="row pt-2 px-1 mb-3 "
                                                        v-if="passenger.show_meal_preference_panel == true">


                                                        <div class="col-lg-2 d-flex baggage_option flex-column justify-content-center align-items-center "
                                                            v-for="(mealPreference, mealPreferenceIndex) in meal_preference_options"
                                                            :key="mealPreferenceIndex"
                                                            v-on:click="passenger.selected_meal_preference_id = mealPreferenceIndex ; passenger.show_meal_preference_panel = false; selectMeal(passenger.passenger_id, mealPreference.MealId)"
                                                            :class="{'selected' : passenger.selected_meal_preference_id == mealPreferenceIndex}">


                                                            <div>


                                                                <i class="fas fa-utensils"></i>

                                                                <span>
                                                                    @{{ getMealDescription(mealPreference) }}
                                                                    <span
                                                                        v-on:click.stop="mealPreference.Show_full_description = true"
                                                                        v-if="mealPreference.Show_full_description == false && mealPreference.Description.length > 15"
                                                                        style="color: #FE2F70;">

                                                                        ...
                                                                        <i class="fas fa-plus"
                                                                            style="color: #FE2F70;"></i>
                                                                    </span>


                                                                    <i v-on:click.stop="mealPreference.Show_full_description = false"
                                                                        v-if="mealPreference.Show_full_description == true"
                                                                        class="fas fa-minus" style="color: #FE2F70;"></i>

                                                                </span>

                                                            </div>

                                                            <div class="price  w-100 text-center">
                                                                Included </div>



                                                        </div>
                                                    </div>
                                                </transition>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>




                            {{-- <div class="col-12">
                                    <button id="confirm_passengers_details" onclick="confirmPassengersDetails()"
                                        class="btn btn-back w-100 px-4 py-2 mt-3">
                                        Confirm Passengers Details
                                    </button>
                                </div> --}}



                            {{-- <div class="row pb-3">

                                </div> --}}
                        </div>

                        <div class="mb-3 border-d2d2d2 bg-fafafa p-4">
                            <h3 style="font-size:18px;">Contact Details</h3>
                            <div class="section-2 mt-3">

                                <div class="row px-2">


                                    <div class="col-sm-12 col-md-4 pt-2 px-1">
                                        <label for="Country">Country</label>
                                        <select id="country" required class="form-control input-control" name="Country">

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
                    <div class="col-sm-12 col-lg-4">
                        <div class="reserve-card bg-fafafa mb-3">
                            <div class="p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <h4 class="gilroy-semi font-22 text-23242c mb-0">Price summary</h4>
                                    </div>
                                    {{-- <div><a class="btn btn-link gilroy-semi font-14 text-decoration-underline text-000941 p-0"
                                            href="#">Change Flight</a></div> --}}
                                </div>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                <div v-for="(passengerType, passengerTypeIndex) in price_breakup" :key="passengerTypeIndex">

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div>
                                            <p class="gilroy-medium font-14 mb-0">
                                                @{{ passengerType.passengers_type }}
                                                x @{{ passengerType.passengers_count }}</p>
                                        </div>
                                        <div><span class="gilroy-regular font-14">@{{ passengerType.passengers_cost }}
                                                @{{ currency }}</span></div>
                                    </div>



                                </div>
                                <div>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div>
                                            <p class="gilroy-medium font-14 mb-0">
                                                @{{ flightSupportPackage.package_name }}</p>
                                        </div>
                                        <div><span class="gilroy-regular font-14">@{{ calculateSupportPackagePrice() }}
                                                @{{ currency }}</span></div>
                                    </div>



                                </div>
                                <div v-for="(passenger, passengerIndex) in passengers_break_up" :key="passengerIndex">
                                    <div v-if="passenger.selected_baggage_index !== 0"
                                        class="d-flex align-items-center justify-content-between mb-3">

                                        <div>
                                            <p class="gilroy-medium font-14 mb-0">
                                                @{{ passenger.type == 1 ? 'Adult' : (passenger.type == 2 ? 'Child' : 'Infant') }}
                                                @{{ beautifyPassengerIndex(passengerIndex) }} : <i class="fas fa-suitcase"></i>
                                                @{{ baggage_options[passenger.selected_baggage_index].Weight }}
                                            </p>
                                        </div>
                                        <div><span class="gilroy-regular font-14">
                                                @{{ baggage_options[passenger.selected_baggage_index].Price }}
                                                @{{ baggage_options[passenger.selected_baggage_index].Currency }}
                                            </span></div>
                                    </div>
                                    <div v-if="passenger.selected_meal_index !== 0"
                                        class="d-flex align-items-center justify-content-between mb-3">

                                        <div>
                                            <p class="gilroy-medium font-14 mb-0">
                                                @{{ passenger.type == 1 ? 'Adult' : (passenger.type == 2 ? 'Child' : 'Infant') }}
                                                @{{ beautifyPassengerIndex(passengerIndex) }} : <i class="fas fa-utensils"></i>
                                                @{{ getMealDescription(meal_options[passenger.selected_meal_index], true) }}
                                            </p>
                                        </div>
                                        <div><span class="gilroy-regular font-14">
                                                @{{ meal_options[passenger.selected_meal_index].Price }}
                                                @{{ meal_options[passenger.selected_meal_index].Currency }}
                                            </span></div>
                                    </div>
                                    <div v-if="passenger.selected_meal_preference_id !== 0"
                                        class="d-flex align-items-center justify-content-between mb-3">

                                        <div>
                                            <p class="gilroy-medium font-14 mb-0">
                                                @{{ passenger.type == 1 ? 'Adult' : (passenger.type == 2 ? 'Child' : 'Infant') }}
                                                @{{ beautifyPassengerIndex(passengerIndex) }} : <i class="fas fa-utensils"></i>
                                                @{{ getMealDescription(meal_preference_options[passenger.selected_meal_preference_id], true) }}
                                            </p>
                                        </div>
                                        <div><span class="gilroy-regular font-14">
                                                Included
                                            </span></div>
                                    </div>
                                </div>

                                <span>Includes taxes and fees.</span>
                                {{-- <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <div><p class="gilroy-medium font-14 mb-0">Flight</p></div>
                                                    <div><span class="gilroy-regular font-14">$500</span></div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <div><p class="gilroy-medium font-14 mb-0">Taxes</p></div>
                                                    <div><span class="gilroy-regular font-14">$100</span></div>
                                                </div> --}}
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <div><span class="gilroy-semi font-20 text-23242c"> Total</span></div>
                                    <div><span class="gilroy-semi font-20 text-23242c">@{{ calculateTotal() }}
                                            @{{ currency }}</span></div>
                                </div <hr />
                                <div><button type="button" @click="redirectToCheckout"
                                        class="btn btn-fe2f70 btn-block px-5">Check
                                        out</button></div>
                            </div>
                        </div>

                        {{-- @if ($flight['attr']['IsRefundable'])
                                                <div class="img-block bg-fafafa border-d2d2d2 p-4 mb-3">
                                                    <div><img src="/image/calender.png"></div>
                                                    <div>
                                                        <p class="gilroy-semi font-16 text-1f2223 mb-0">Free Cancelation</p>
                                                        <p class="gilroy-regular font-14 text-1f2223 mb-0">There's no fee to cancel within 24
                                                            hours of booking.</p>
                                                    </div>
                                                </div>
                                            @endif --}}
                    </div>
                </div>
                {{-- <h4 class="gilroy-semi font-28 text-23242c mb-3">Qatar Airways cleaning and safety practices
                            </h4>
                            <p class="font-14 text-black gilroy-semi mb-3">4 cleaning and safety practices for Ukraine
                                International Airlines</p>
                            <div class="d-flex align-items-center mb-2"><img class="icon-20px mr-2"
                                    src="/image/disinfactor.png"><span class="gilroy-regular font-12 text-23242c">Cleaned
                                    with disinfectants</span></div>
                            <div class="d-flex align-items-center mb-2"><img class="icon-20px mr-2"
                                    src="/image/mask.png"><span class="gilroy-regular font-12 text-23242c">Mask</span></div>
                            <div class="d-flex align-items-center mb-3"><img class="icon-20px mr-2"
                                    src="/image/temperature.png"><span
                                    class="gilroy-regular font-12 text-23242c">Temperature</span></div>
                            <p class="font-12 text-black gilroy-regular">This information is provided by our partners.</p> --}}

            </div>

    </div>

    </div>
    </div>
    </section>

    </div>
@endsection


@section('scripts')
    <script src="js/custom.js"></script>
    <script>
        $('#myTab a').on('click', function(event) {
            event.preventDefault()
            $(this).tab('show')
        });

        let CancelToken = axios.CancelToken;
        const source = CancelToken.source();

        const v = new Vue({
            el: "#flights_app",
            data: {
                isPackage: '{{ $isPackage }}',
                flight: @json($flight['details']),
                price_breakup: @json($flight['price']),
                currency: "{{ $flight['currency'] }}",
                baggage_options: [{
                    Weight: 'No Extra',
                    Price: 0,
                    BaggageId: '',
                    Currency: '{{ $currency }}'
                }, ...@json($pendingFlight['extras']['Baggage'])],

                meal_options: [{
                    Description: 'Add Meal',
                    Price: 0,
                    MealId: '',
                    Show_full_description: false,
                    Currency: '{{ $currency }}'
                }, ...@json($pendingFlight['extras']['Meals'])],
                meal_preference_options: [{
                    Description: 'Add Meal',
                    MealId: '',
                    Show_full_description: false,
                }, ...@json($pendingFlight['extras']['MealPreference'])],
                passengers: @json($passengers),
                passengers_break_up: {},
                selected_baggage: {
                    Weight: 'No Extra',
                    Price: 0,
                    BaggageId: '',
                    Currency: '{{ $currency }}'
                },
                add_more_baggage: false,
                show_add_more_baggage_panel: false,
                flightSupportPackage: @json($flightSupportPackage),


            },
            mounted: function() {

                let counter = 0;
                let passengers_count = {{ $passengers_count }};
                for (const [key, value] of Object.entries(this.passengers)) {

                    let passenger = {
                        selected_baggage_index: 0,
                        show_add_more_baggage_panel: false,
                        type: value.PaxType,
                        selected_meal_index: 0,
                        show_select_meal_panel: false,
                        selected_meal_preference_id: 0,
                        show_meal_preference_panel: false,
                        passenger_id: value.id,

                    }
                    this.$set(this.passengers_break_up, counter, passenger)
                    counter++;

                }


            },
            methods: {
                addPassengers: async function() {
                    let country = $("#country").val();
                    let city = $("#city").val();
                    let pincode = $("#pincode").val();
                    let addressline1 = $("#addressline1").val();
                    let email = $("#email").val();
                    let contactno = $("#contactno").val();


                    for (const [key, value] of Object.entries(this.passengers_break_up)) {
                        let form = document.getElementById("passenger" + key)
                        let data = new FormData(form)
                        data.append("Country", country);
                        data.append("City", city);
                        data.append("PinCode", pincode);
                        data.append("AddressLine1", addressline1);
                        data.append("Email", email);
                        data.append("ContactNo", contactno);
                        data.append("passenger_id", value.passenger_id)
                        if (this.isPackage) {
                            data.append("isPackage", '1');
                        }
                        try {
                            let response = await axios.post('/flights/addPassengers', data);

                        } catch (ex) {
                            return;
                        }


                    }
                },

                calculateTotal: function() {
                    let total = 0;
                    let flightBasePrice = 0;

                    for (const [key, value] of Object.entries(this.price_breakup)) {
                        flightBasePrice += value.passengers_cost;
                    }
                    for (const [key, value] of Object.entries(this.passengers_break_up)) {
                        if (value.selected_baggage_index !== 0) {
                            total += this.baggage_options[value.selected_baggage_index].Price;
                        }
                        if (value.selected_meal_index !== 0) {
                            total += this.meal_options[value.selected_meal_index].Price;
                        }
                    }
                    let supportPackagePrice = Math.ceil(flightBasePrice * (this.flightSupportPackage
                        .price_percentage / 100))
                    return flightBasePrice + total + supportPackagePrice;

                },

                calculateSupportPackagePrice: function() {
                    let flightBasePrice = 0;

                    for (const [key, value] of Object.entries(this.price_breakup)) {
                        flightBasePrice += value.passengers_cost;
                    }
                    let supportPackagePrice = Math.ceil(flightBasePrice * (this.flightSupportPackage
                        .price_percentage / 100))

                    return supportPackagePrice;

                },
                addBaggage: async function(passenger_id, baggage_id) {
                    let response = await axios.post('/flights/add_baggage', {
                        baggage_id: baggage_id,
                        passenger_id: passenger_id
                    });

                },
                addMeal: async function(passenger_id, meal_id) {
                    let response = await axios.post('/flights/add_meal', {
                        meal_id: meal_id,
                        passenger_id: passenger_id
                    });

                },
                selectMeal: async function(passenger_id, meal_id) {
                    let response = await axios.post('/flights/select_meal', {
                        meal_id: meal_id,
                        passenger_id: passenger_id
                    });

                },
                hidePanels: function(passenger) {
                    passenger.show_select_meal_panel = false;
                    passenger.show_add_more_baggage_panel = false;
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
                getMealDescription: function(meal, enforce_short_description = false) {
                    if (enforce_short_description) {
                        return meal.Description.substr(0, 15);
                    }
                    if (meal.Show_full_description) {
                        return meal.Description;
                    } else {
                        return meal.Description.substr(0, 15);
                    }
                },
                beautifyPassengerIndex: function(currentIndex) {
                    let index = parseInt(currentIndex) + 1;
                    return index;
                },
                async redirectToCheckout() {
                    try {
                        await this.addPassengers();
                    } catch ($ex) {
                        abort(422, 'Couldnt Add Passengers')
                    }

                    window.location = '/checkout'
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
                extractFlightNumOfStops: function(segment) {
                    let flight_stops = segment.length - 1;
                    return flight_stops;
                },
                extractFlightDepartureTime: function(segment) {

                    return moment(segment[0]['Origin']['DateTime']).format('HH:mm')
                },
                extractFlightArrivalTime: function(segment) {
                    let flight_stops = segment.length - 1;
                    return moment(segment[flight_stops]['Destination']['DateTime']).format(
                        'HH:mm')
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
                extractFlightArrivalDate: function(segment) {
                    let flight_stops = segment.length - 1;
                    return moment(segment[flight_stops]['Destination']['DateTime']).format(
                        'DD MMM')
                },
                extractFlightTotalTime: function(segment) {
                    let flight_stops = segment.length - 1;
                    let minutes = segment[flight_stops].AccumulatedDuration
                    let hours = Math.floor(minutes / 60);
                    minutes = minutes - (hours * 60)
                    return `${hours}h${minutes}m`;
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



            }
        })
    </script>
@endsection
