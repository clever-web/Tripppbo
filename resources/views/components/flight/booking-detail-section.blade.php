<section class="container-all-booking mb-3">
    <header class="bg-56d18f p-4">
        <div class="d-flex align-items-center mb-2">
            <div class="mr-2">
                <h4 class="gilroy-semi text-white font-26 mb-0">{{ $flightBookingDetail->BookingDetails->OriginAirport }}</h4>
            </div>
            <div class="d-flex mr-2"><img class="icon-20px" src="/image/64398.png" /></div>
            <div>
                <h4 class="gilroy-semi text-white font-26 mb-0">{{ $flightBookingDetail->BookingDetails->DestinationAirport }}</h4>
            </div>
        </div>
        <p class="gilroy-medium text-white font-14 mb-0">
            {{ date('d M', strtotime($flightBookingDetail->BookingDetails->OriginBoardingTime)) }}
            -
            {{ date('d M Y', strtotime($flightBookingDetail->BookingDetails->DestinationBoardingTime)) }}
            ,
            {{ count($flightBookingDetail->BookingDetails->PassengerDetails) }} Passenger
            {{ $flightBookingDetail->BookingDetails->BookingClass }}
        </p>
    </header>
    <div>
        <div class="rounded-lg">
            <div class="grid-1">
                <div>
                    <p class="gilroy-semi font-14 mb-1">Booking Number : {{ $flightBookingDetail->BookingDetails->BookingId }}</p>
                    <p class="gilroy-semi font-14 mb-0">Airline refernce : {{ $flightBookingDetail->BookingDetails->PNR }}</p>
                    <hr />
                    <ul class="list-1 bg-fafafa">
                        <li>
                            <div class="d-flex justify-content-between">
                                <div><span class="gilroy-medium font-12">Flight Number</span></div>
                                <div><span class="gilroy-bold font-12">{{ $flightBookingDetail->BookingDetails->JourneyList->FlightDetails->Details[0][0]->FlightNumber }}</span></div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between">
                                <div><span class="gilroy-medium font-12">Terminal</span></div>
                                <div>
                                    <span class="gilroy-bold font-12">{{ $flightBookingDetail->BookingDetails->OriginTerminal == '' ? 'Not yet available' : $flightBookingDetail->BookingDetails->OriginTerminal}}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between">
                                <div><span class="gilroy-medium font-12">Gate</span></div>
                                <div>
                                    <span class="gilroy-bold font-12">{{ $flightBookingDetail->BookingDetails->OriginGate == ''? 'Not yet available' : $flightBookingDetail->BookingDetails->OriginGate }}</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="gilroy-semi font-14 mb-1">
                                From : {{ $flightBookingDetail->BookingDetails->OriginAirport }}
                                <span class="text-1f222350">{{ $flightBookingDetail->BookingDetails->OriginAirportCode }}</span>
                            </p>
                            <p class="gilroy-semi font-14 mb-0">
                                To : {{ $flightBookingDetail->BookingDetails->DestinationAirport }}
                                <span class="text-1f222350">{{ $flightBookingDetail->BookingDetails->DestinationAirportCode }}</span>
                            </p>
                        </div>
                        <div><img class="icon-30px mr-2" src="/image/etihad.png" /></div>
                    </div>
                    <hr />
                    <ul class="list-1 bg-fafafa">
                        <li>
                            <div class="d-flex">
                            <div><span class="gilroy-medium font-12 mr-5">Checkin Available</span></div>
                            <div><span class="gilroy-bold font-12">PC1212</span></div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between">
                            <div><span class="gilroy-medium font-12">E Ticket</span></div>
                            <div><a href="javascript:void(0)" class="btn gilroy-bold text-fe2f70 font-12 p-0"><span>View & Print open<span> <i class="fas fa-chevron-right mr-2" aria-hidden="true"></i></a></div>
                            </div>
                        </li>												
                        <li>
                            <div class="d-flex justify-content-between">
                                <div><span class="gilroy-medium font-12">Booking Request Acknowledgement</span></div>
                                <div>
                                    <span class="gilroy-bold font-12"><a href="javascript:void(0)" class="btn gilroy-bold text-fe2f70 font-12 p-0"><span>View & Print open<span> <i class="fas fa-chevron-right mr-2" aria-hidden="true"></i></a></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
