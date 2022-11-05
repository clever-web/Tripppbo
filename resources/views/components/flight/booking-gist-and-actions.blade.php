    <section class="container-all-booking mb-3">
        <header class="bg-56d18f p-4">
            <div class="d-flex align-items-center mb-2">
                <div class="mr-2"><h4 class="gilroy-semi text-white font-26 mb-0">{{ $bookingInfo->BookingDetails->OriginAirport }}</h4></div>
                <div class="mr-2"><img class="icon-20px" src="/image/plane-circle.svg" /></div>
                <div><h4 class="gilroy-semi text-white font-26 mb-0">{{ $bookingInfo->BookingDetails->DestinationAirport }}</h4></div>
            </div>
            <p class="gilroy-medium text-white font-14 mb-0">
                {{ date('d M', strtotime($bookingInfo->BookingDetails->OriginBoardingTime)) }}
                -
                {{ date('d M Y', strtotime($bookingInfo->BookingDetails->DestinationBoardingTime)) }}
                ,
                {{ count($bookingInfo->BookingDetails->PassengerDetails) }} Passenger
                {{ $bookingInfo->BookingDetails->BookingClass }}
            </p>
        </header>
        <div>
            <div class="rounded-lg p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div><img class="icon-30px mr-2" src="/image/etihad.png" /></div>
                    <div>
                        <p class="gilroy-semi font-14 mb-1">Booking Number : {{ $bookingInfo->BookingDetails->BookingId }}</p>
                        <p class="gilroy-semi font-14 mb-0">Airline refernce : {{ $bookingInfo->BookingDetails->PNR }}</p>
                    </div>
                </div>
                <hr />
                <div class="d-flex mb-3">
                    <div class="mr-3">
                        <b class="gilroy-bold font-14">{{ $bookingInfo->BookingDetails->OriginAirport }}</b>
                        <span class="gilroy-bold opacity-0-5 ">({{ $bookingInfo->BookingDetails->OriginAirportCode }})</span>
                    </div>
                    <div class="mr-3"><img class="icon-26px" src="/image/planes.png" /></div>
                    <div>
                        <b class="gilroy-bold font-14">{{ $bookingInfo->BookingDetails->DestinationAirport }}</b>
                        <span class="gilroy-bold opacity-0-5 ">({{ $bookingInfo->BookingDetails->DestinationAirportCode }})</span>
                    </div>
                </div>
                <div class="d-flex flex-row-responsive mb-3">
                    <div class="mr-3">
                        <b class="gilroy-bold font-14 mr-2">Outbound</b> <span class="font-14">Mon 23 Aug (12:55h)</span>
                    </div>
                    <div>
                        <b class="gilroy-bold font-14 mr-2">Inbound</b> <span class="font-14 ">Mon 6 Sep (07:55h)</span>
                    </div>
                </div>
                <hr />
                <ul class="d-flex flex-wrap list-6">
                    <li><button class="btn">Ticket</button></li>
                    <li><button class="btn" onclick="openTab(event, 'search-flight');">Flight schedule</button></li>
                    <li><button class="btn">Online check-in</button></li>
                    <li><button class="btn" onclick="openTab(event, 'change-flight');">Flight Change</button></li>
                    <li><button class="btn">Make Ticket Open-ended</button></li>
                    <li><button class="btn">Flight Cancellation</button></li>
                </ul>
            </div>
        </div>
    </section>
