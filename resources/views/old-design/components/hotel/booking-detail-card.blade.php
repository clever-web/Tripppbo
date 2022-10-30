<header>
    <div><p class="gilroy-semi font-14 mb-0">Booking Number : {{ $bookingInfo['bookingNumber'] ?? '' }}</p></div>
    <div><span class="gilroy-medium font-12">{{ $bookingInfo['timeToGo'] ?? '' }}</span></div>
</header>
<figure>
    <img src="image/images2.png" />
    <figcaption class="gilroy-semi font-16">
        <h4 class="gilroy-semi font-14 mb-0">{{ $bookingInfo['destination']['cityName'] ?? '' }}</h4>
        <p class="gilroy-medium font-14 mb-0">{{ $bookingInfo['origin']['date'] ?? '' }} - {{ $bookingInfo['destination']['date'] ?? '' }}, {{ $bookingInfo['paxNum'] ?? '' }} Passenger {{ $bookingInfo['class'] ?? '' }}</p>
    </figcaption>
</figure>
<footer>
    <div><p class="gilroy-semi font-14 mb-0">From: {{ $bookingInfo['origin']['cityName'] ?? '' }} <span>{{ $bookingInfo['origin']['airportCode'] ?? '' }}</span></p></div>
    <div><p class="gilroy-semi font-14 mb-0">To: {{ $bookingInfo['destination']['cityName'] ?? '' }} <span>{{ $bookingInfo['destination']['airportCode'] ?? '' }}</span></p></div>
    <div><p class="gilroy-semi font-14 mb-0">Airline reference: {{ $bookingInfo['airlineReference'] ?? '' }}</p></div>
    <div><a role="button" href="/fascia/booking/{{ $bookingInfo['bookingNumber'] ?? '111111' }}" class="btn box-shadow-fe2f70 gilroy-medium btn-fe2f70 px-5">View Booking</a></div>
</footer>
