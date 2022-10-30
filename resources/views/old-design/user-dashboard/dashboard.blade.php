@extends('layout')

@section('head')
    <title>Dashboard</title>
    <link href="{{ asset('css/user-dashboard/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user-dashboard/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content') 
    <div class="body-content">
        <div class="hero-image-container">
            <div>
                <aside>
                    <h4 class="gilroy-semi font-34 text-white mb-5 hsm">My Account</h4>
                    <ul class="trippbo-dashboard-aside bg-white">
                        <li>
                            <h3 class="gilroy-semi text-000941 font-20">Dashboard</h3>
                            <p class="gilroy-regular text-000941 font-14 mb-0">Manage Account</p>
                        </li>
                        <li><a href="javascript:void(0)" onclick="open_upcomingFlights(this);" class="trippbo-dashboard-aside-active"><i class="fas fa-plane-departure mr-2"></i>Upcoming Flights</a></li>
                        <li><a href="javascript:void(0)" onclick="open_pastFlights(this);"><i class="fas fa-plane-departure mr-2"></i>Past Flights</a></li>
                        <li><a href="javascript:void(0)" onclick="open_upcomingHotelStays(this);"><i class="fas fa-hotel mr-2"></i>Upcoming Hotel Stays</a></li>
                        <li><a href="javascript:void(0)" onclick="open_pastHotelStays(this);"><i class="fas fa-hotel mr-2"></i>Past Hotel Stays</a></li>
                        <li><a href="javascript:void(0)" onclick="open_upcomingActivities(this);"><i class="fas fa-hiking mr-2"></i>Upcoming Activities</a></li>
                        <li><a href="javascript:void(0)" onclick="open_pastActivities(this);"><i class="fas fa-hiking mr-2"></i>Past Activities</a></li>
                    </ul>
                </aside>
                <main id="upcomingFlights" class="trippbo-asset-card visible-card">
                    <button type="button" onclick="close_upcomingFlights();" class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg">
                        <i class="fas fa-arrow-left mr-1"></i>Manage Your Account
                    </button>
                    <h4 class="gilroy-semi">My Upcoming Bookings</h4>
                    <div class="trippbo-dashboard-main">
                        <p class="gilroy-semi font-14">An Overview Of Upcoming Trips</p>
                        <ul class="trippbo-dashboard-main-card">
                            @foreach ($data['upcomingFlightBookings'] as $flightBooking)
                                <li><x-flight.booking-detail-card :bookingInfo="$flightBooking" /></li>
                            @endForeach
                        </ul>
                    </div>
                </main>
                <main id="pastFlights" class="trippbo-asset-card">
                    <button type="button" onclick="close_pastFlights();" class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg">
                        <i class="fas fa-arrow-left mr-1"></i>Manage Your Account
                    </button>
                    <h4 class="gilroy-semi">My Past Bookings</h4>
                    <div class="trippbo-dashboard-main">
                        <p class="gilroy-semi font-14">An Overview Of Past Trips</p>
                        <ul class="trippbo-dashboard-main-card">
                            @foreach ($data['pastFlightBookings'] as $flightBooking)
                                <li><x-flight.booking-detail-card :bookingInfo="$flightBooking" /></li>
                            @endForeach
                        </ul>
                    </div>
                </main>
                <main id="upcomingHotelStays" class="trippbo-asset-card">
                    <button type="button" onclick="close_upcomingHotelStays();" class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg">
                        <i class="fas fa-arrow-left mr-1"></i>Manage Your Account
                    </button>
                    <h4 class="gilroy-semi">My Upcoming Hotel Stays</h4>
                    <div class="trippbo-dashboard-main">
                        <p class="gilroy-semi font-14">An Overview Of Upcoming Hotel Stays</p>
                        <ul class="trippbo-dashboard-main-card">
                            @foreach ($data['upcomingHotelBookings'] as $flightBooking)
                                <li><x-hotel.booking-detail-card :bookingInfo="$flightBooking" /></li>
                            @endForeach
                        </ul>
                    </div>
                </main>
                <main id="pastHotelStays" class="trippbo-asset-card">
                    <button type="button" onclick="close_pastHotelStays();" class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg">
                        <i class="fas fa-arrow-left mr-1"></i>Manage Your Account
                    </button>
                    <h4 class="gilroy-semi">My Past Hotel Stays</h4>
                    <div class="trippbo-dashboard-main">
                        <p class="gilroy-semi font-14">An Overview Of Past Hotel Stays</p>
                        <ul class="trippbo-dashboard-main-card">
                            @foreach ($data['pastHotelBookings'] as $flightBooking)
                                <li><x-hotel.booking-detail-card :bookingInfo="$flightBooking" /></li>
                            @endForeach
                        </ul>
                    </div>
                </main>
                <main id="upcomingActivities" class="trippbo-asset-card">
                    <button type="button" onclick="close_upcomingActivities();" class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg">
                        <i class="fas fa-arrow-left mr-1"></i>Manage Your Account
                    </button>
                    <h4 class="gilroy-semi">My Upcoming Activities</h4>
                    <div class="trippbo-dashboard-main">
                        <p class="gilroy-semi font-14">An Overview Of Upcoming Activities</p>
                        <ul class="trippbo-dashboard-main-card">
                            @foreach ($data['upcomingActivityBookings'] as $flightBooking)
                                <li><x-activity.booking-detail-card :bookingInfo="$flightBooking" /></li>
                            @endForeach
                        </ul>
                    </div>
                </main>
                <main id="pastActivities" class="trippbo-asset-card">
                    <button type="button" onclick="close_pastActivities();" class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg">
                        <i class="fas fa-arrow-left mr-1"></i>Manage Your Account
                    </button>
                    <h4 class="gilroy-semi">My Past Activities</h4>
                    <div class="trippbo-dashboard-main">
                        <p class="gilroy-semi font-14">An Overview Of Past Activities</p>
                        <ul class="trippbo-dashboard-main-card">
                            @foreach ($data['pastActivityBookings'] as $flightBooking)
                                <li><x-activity.booking-detail-card :bookingInfo="$flightBooking" /></li>
                            @endForeach
                        </ul>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/user-dashboard/custom.js') }}"></script>
    <script src="{{ asset('js/user-dashboard/dashboard.js') }}"></script>	
    <script>
        $('#myTab a').on('click', function (event) {
            event.preventDefault();
            $(this).tab('show');
        });
    </script>
@endsection
