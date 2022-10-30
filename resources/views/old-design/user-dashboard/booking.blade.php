@extends('layout')

@section('head')
    <title>All Booking</title>
    <link href="{{ asset('css/user-dashboard/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user-dashboard/all-booking.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="body-content">
        <div class="container-with-background">
            <div>
                <section>
                    <div class="d-flex align-items-center mb-3">
                        <div><img class="icon-60px mr-2" src="/image/moon.svg" /></div>
                        <div class="position-relative"><h4 class="gilroy-semi text-white font-68 mb-0">28</h4> <span class="gilroy-semi text-white font-36 zero">o</span></div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="mr-2"><h4 class="gilroy-semi text-white font-34 mb-0">Dubai</h4></div>
                        <div class="mr-2"><img class="icon-26px" src="/image/64398.png" /></div>
                        <div><h4 class="gilroy-semi text-white font-34 mb-0">Saudi Arabia</h4></div>
                    </div>
                    <p class="gilroy-medium text-white font-18 mb-5">
                        {{ date('d M', strtotime($flightBookingDetail->BookingDetails->OriginBoardingTime)) }}
                        -
                        {{ date('d M Y', strtotime($flightBookingDetail->BookingDetails->DestinationBoardingTime)) }}
                        ,
                        {{ count($flightBookingDetail->BookingDetails->PassengerDetails) }} Passenger
                        {{ $flightBookingDetail->BookingDetails->BookingClass }}
                    </p>
                </section>				
                <aside>
                    <ul class="trippbo-booking-aside bg-white">
                        <li>
                            <a href="{{ url('/fascia') }}" class="bg-000941 text-white">
                                <i class="fas fa-chevron-left mr-2"></i>All Bookings
                            </a>
                        </li>
                        <li id="defaultOpen" class="tablink" onclick="openTab(event, 'upcoming-booking');">
                            <a href="javascript:void(0)">
                                <i class="fas fa-plane mr-2"></i>Upcoming Booking
                            </a>
                        </li>
                        <li class="tablink" onclick="openTab(event, 'all-flights');">
                            <a href="javascript:void(0)">
                                <i class="fas fa-user-friends mr-2"></i>All Flight
                            </a>
                        </li>
                        <li class="tablink" onclick="openTab(event, 'documents-and-passenger');">
                            <a href="javascript:void(0)">
                                <i class="fas fa-file-alt mr-2"></i>Documents & Passenger
                            </a>
                        </li>
                        <li class="tablink" onclick="openTab(event, 'flight-info');">
                            <a href="javascript:void(0)">
                                <i class="fas fa-clock mr-2"></i>Flight Info
                            </a>
                        </li>
                        <li class="tablink" onclick="openTab(event, 'purchase-extras');">
                            <a href="javascript:void(0)">
                                <i class="fas fa-cog mr-2"></i>Purchase Extras
                            </a>
                        </li>
                        <li class="tablink" onclick="openTab(event, 'payment-method');">
                            <a href="javascript:void(0)">
                                <i class="fas fa-credit-card mr-2"></i>Payment Method
                            </a>
                        </li>
                        <li class="tablink" onclick="openTab(event, 'contact-us');">
                            <a href="javascript:void(0)">
                                <i class="fas fa-comment-alt mr-2"></i>Contact Us
                            </a>
                        </li>
                    </ul>				
                </aside>			
                <main id="main">
                    <button type="button" onclick="close_main();" class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg">
                        <i class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Manage Your Account
                    </button>
                    <div class="trippbo-booking-main">
                        <div id="upcoming-booking" class="trippbo-tabcontent">
                            <x-flight.booking-detail-section :flightBookingDetail="$flightBookingDetail"/>
                            <x-hotel.search-widget />
                            <x-car.advert-widget />
                            <x-util.timeline-information :timelineInfo="$timelineInfo"/>
                            <x-flight.luggage-information />
                            <x-flight.seat-information />
                            <x-util.weather-forecast />
                            <x-util.currency-converter />
                        </div>
                        <!-- All Flights -->
                        <div id="all-flights" class="trippbo-tabcontent">	
                            <x-flight.booking-gist-and-actions :bookingInfo="$flightBookingDetail" />
                            <x-util.important-information :info="$flightSummaryInfo" />
                            <x-hotel.search-widget />
                            <x-car.advert-widget />
                            <x-flight.services-booked />							
                            <x-util.weather-forecast />
                            <x-util.currency-converter />
                        </div>														
                        <!-- Change Flight -->
                        <div id="change-flight" class="trippbo-tabcontent">
                            <x-flight.segment-change-widget />	
                        </div>
                        <!-- Search Flight -->
                        <div id="search-flight" class="trippbo-tabcontent">
                            <x-flight.search-widget />
                        </div>
                        <!-- Documents & Passenger -->
                        <div id="documents-and-passenger" class="trippbo-tabcontent">
                            <x-flight.booking-summary />
                            <x-flight.passenger-information />
                            <x-util.important-information :info="$paxAndDocInfo" />
                        </div>
                        <!-- Documents & Passenger 2 -->
                        <div id="documents-and-passenger-2" class="trippbo-tabcontent">
                            <x-flight.luggage-details />
                            <x-flight.seat-and-luggage-detail />
                        </div>
                        <!-- Flight Info -->
                        <div id="flight-info" class="trippbo-tabcontent">
                            <x-flight.itinerary-summary-card />	
                            <x-util.important-information :info="$flightInfo" />
                        </div>
                        <!-- Purchase Extras -->
                        <div id="purchase-extras" class="trippbo-tabcontent">
                            <x-flight.services-booked-details />
                        </div>
                        <!-- Payment Method -->
                        <div id="payment-method" class="trippbo-tabcontent">
                            <x-util.payment-overview />	
                        </div>
                        <!-- Contact Us -->
                        <div id="contact-us" class="trippbo-tabcontent">
                            <x-util.service-messages />
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/user-dashboard/custom.js') }}"></script>
    <script src="{{ asset('js/user-dashboard/all-booking.js') }}"></script>	
    <script>
        $('#myTab a').on('click', function (event) {
            event.preventDefault()
            $(this).tab('show')
        });
    </script>
@endsection
