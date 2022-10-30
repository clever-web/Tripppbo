@extends('layout')
@section('head')
@endsection
<link href="{{ asset('css-r/style.css') }}" rel="stylesheet">
<link href="{{ asset('css-r/all-booking.css') }}" rel="stylesheet">
@section('content')
    <div class="body-content">
        <div class="container-with-background">
            <div>
                <section>
                    <div class="d-flex align-items-center mb-3">
                        <div><img class="icon-60px mr-2" src="/image/moon.svg" /></div>
                        <div class="position-relative">
                            <h4 class="gilroy-semi text-white font-68 mb-0">28</h4> <span
                                class="gilroy-semi text-white font-36 zero">o</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="mr-2">
                            <h4 class="gilroy-semi text-white font-34 mb-0">Dubai</h4>
                        </div>
                        <div class="mr-2"><img class="icon-26px" src="/image/64398.png" /></div>
                        <div>
                            <h4 class="gilroy-semi text-white font-34 mb-0">Saudi Arabia</h4>
                        </div>
                    </div>
                    <p class="gilroy-medium text-white font-18 mb-5">Mon 3 Aug - Thu 6 Sep 2021, 2 Passenger Economy</p>
                </section>
                <section></section>
                <aside>
                    <ul class="trippbo-booking-aside bg-white">
                        <li><a href="javascript:void(0)" class="bg-000941 text-white"><i
                                    class="fas fa-chevron-left mr-2"></i> All Bookings</a></li>
                        <li id="defaultOpen" class="tablink" onclick="openTab(event, 'upcoming-booking');"><a
                                href="javascript:void(0)"><i class="fas fa-plane mr-2"></i> Upcoming Booking</a></li>
                        <li class="tablink" onclick="openTab(event, 'all-flights');"><a href="javascript:void(0)"><i
                                    class="fas fa-user-friends mr-2"></i> All Flight</a></li>
                        <li class="tablink" onclick="openTab(event, 'documents-and-passenger');"><a
                                href="javascript:void(0)"><i class="fas fa-file-alt mr-2"></i> Documents & Passenger</a>
                        </li>
                        <li class="tablink" onclick="openTab(event, 'flight-info');"><a href="javascript:void(0)"><i
                                    class="fas fa-clock mr-2"></i> Flight Info</a></li>
                        <li class="tablink" onclick="openTab(event, 'purchase-extras');"><a
                                href="javascript:void(0)"><i class="fas fa-cog mr-2"></i> Purchase Extras</a></li>
                        <li class="tablink" onclick="openTab(event, 'payment-method');"><a
                                href="javascript:void(0)"><i class="fas fa-credit-card mr-2"></i> Payment Method</a></li>
                        <li class="tablink" onclick="openTab(event, 'contact-us');"><a href="javascript:void(0)"><i
                                    class="fas fa-comment-alt mr-2"></i> Contact Us</a></li>
                    </ul>
                </aside>
                <main id="main">
                    <button type="button" onclick="close_main();"
                        class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg"><i
                            class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Manage Your Account</button>
                    <div class="trippbo-booking-main">
                        <div id="upcoming-booking" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <header class="bg-56d18f p-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="mr-2">
                                            <h4 class="gilroy-semi text-white font-26 mb-0">Dubai</h4>
                                        </div>
                                        <div class="d-flex mr-2"><img class="icon-20px" src="/image/64398.png" />
                                        </div>
                                        <div>
                                            <h4 class="gilroy-semi text-white font-26 mb-0">Saudi Arabia</h4>
                                        </div>
                                    </div>
                                    <p class="gilroy-medium text-white font-14 mb-0">Mon 3 Aug - Thu 6 Sep 2021, 2 Passenger
                                        Economy</p>
                                </header>
                                <div>
                                    <div class="rounded-lg">
                                        <div class="grid-1">
                                            <div>
                                                <p class="gilroy-semi font-14 mb-1">Booking Number : GHF8392</p>
                                                <p class="gilroy-semi font-14 mb-0">Airline refernce : DSS232134</p>
                                                <hr />
                                                <ul class="list-1 bg-fafafa">
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="gilroy-medium font-12">Flight Number</span>
                                                            </div>
                                                            <div><span class="gilroy-bold font-12">PC1212</span></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="gilroy-medium font-12">Terminal</span></div>
                                                            <div><span class="gilroy-bold font-12">Not yet available</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="gilroy-medium font-12">Gate</span></div>
                                                            <div><span class="gilroy-bold font-12">Not yet available</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <p class="gilroy-semi font-14 mb-1">From : Dubai</p>
                                                        <p class="gilroy-semi font-14 mb-0">To : Saudi Arabia <span
                                                                class="text-1f222350">(KSA)</span></p>
                                                    </div>
                                                    <div><img class="icon-30px mr-2" src="/image/etihad.png" /></div>
                                                </div>
                                                <hr />
                                                <ul class="list-1 bg-fafafa">
                                                    <li>
                                                        <div class="d-flex">
                                                            <div><span class="gilroy-medium font-12 mr-5">Checkin
                                                                    Available</span></div>
                                                            <div><span class="gilroy-bold font-12">PC1212</span></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="gilroy-medium font-12">E Ticket</span></div>
                                                            <div><a href="javascript:void(0)"
                                                                    class="btn gilroy-bold text-fe2f70 font-12 p-0"><span>View
                                                                        & Print open<span> <i
                                                                                class="fas fa-chevron-right mr-2"
                                                                                aria-hidden="true"></i></a></div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="gilroy-medium font-12">Booking Request
                                                                    Acknowledgement</span></div>
                                                            <div><span class="gilroy-bold font-12"><a
                                                                        href="javascript:void(0)"
                                                                        class="btn gilroy-bold text-fe2f70 font-12 p-0"><span>View
                                                                            & Print open<span> <i
                                                                                    class="fas fa-chevron-right mr-2"
                                                                                    aria-hidden="true"></i></a></span></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-0">Would You Like To Complete Your Trip ?</h4>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg book-your-hotel">
                                        <h4 class="gilroy-bold bg-000941 text-white font-22 p-4 rounded-top mb-0">Book Your
                                            Hotel</h4>
                                        <div class="grid-2">
                                            <div>
                                                <div class="position-relative inputField-box"><img src="/image/location.png"
                                                        class="icon-18px mr-1" /><input type="text" id="DateFrom"
                                                        class="inputField inputField-withicon" placeholder="Leaving"></div>
                                            </div>
                                            <div>
                                                <div class="position-relative inputField-box"><img src="/image/location.png"
                                                        class="icon-18px mr-1" /><input type="text" id="DateFrom"
                                                        class="inputField inputField-withicon" placeholder="Going"></div>
                                            </div>
                                            <div>
                                                <div class="position-relative inputField-box"><img src="/image/policy.png"
                                                        class="icon-18px mr-1" /><input type="text" id="DateFrom"
                                                        class="inputField inputField-withicon" placeholder="Check in"></div>
                                            </div>
                                            <div>
                                                <div class="position-relative inputField-box"><img src="/image/policy.png"
                                                        class="icon-18px mr-1" /><input type="text" id="DateFrom"
                                                        class="inputField inputField-withicon" placeholder="Check out">
                                                </div>
                                            </div>
                                            <div><a role="button" href="javascript:void(0)"
                                                    class="btn btn-block gilroy-medium btn-fe2f70">Search</a></div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking bg-000941 mb-3">
                                <header class="p-4">
                                    <h4 class="gilroy-bold text-white font-28 mb-2">Rent A Car</h4>
                                    <p class="gilroy-regular text-white font-14 mb-0">Rental Car Saudia Arabia</p>
                                </header>
                                <div class="bg-000941 pt-0">
                                    <div class="bg-000941">
                                        <div class="grid-3 mb-3">
                                            <div>
                                                <div class="rent-a-car-card bg-white rounded-lg p-2">
                                                    <div class="d-flex flex-column">
                                                        <div><img src="/image/images2.png" /></div>
                                                        <div>
                                                            <div class="d-flex align-items-end justify-content-between">
                                                                <div>
                                                                    <p class="gilroy-medium font-12 mb-0">Economy</p>
                                                                    <h4 class="gilroy-bold font-22 mb-0">SEK356/ Day</h4>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="bg-56d18f rounded text-white px-3 py-1">Select</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rent-a-car-card bg-white rounded-lg p-2">
                                                    <div class="d-flex flex-column">
                                                        <div><img src="/image/images2.png" /></div>
                                                        <div>
                                                            <div class="d-flex align-items-end justify-content-between">
                                                                <div>
                                                                    <p class="gilroy-medium font-12 mb-0">Economy</p>
                                                                    <h4 class="gilroy-bold font-22 mb-0">SEK356/ Day</h4>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="bg-56d18f rounded text-white px-3 py-1">Select</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p><a class="gilroy-semi text-56d18f font-14 text-decoration-underline mb-3"
                                                href="javascript:void(0)">See More cars</a></p>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-0">Mon 28 Aug</h4>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-3">
                                        <div class="timeline">
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-16 mb-0">12:55</p>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-0">Dubai</h4>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">(International
                                                            Airport)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0 pt-4">03h10m</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="timeline-accordion rounded-lg">
                                                            <button
                                                                class="gilroy-semi font-14 timeline-accordion-active">Etihad
                                                                Airline PC1212</button>
                                                            <div style="max-height: fit-content;">
                                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                                    sed diam nonumy eirmod tempor invidunt ut labore et
                                                                    dolore magna aliquyam erat, sed diam voluptua.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="transferred">
                                                <div>
                                                    <div class="transferred-container">
                                                        <div>
                                                            <p class="gilroy-medium font-16 mb-0">14:55</p>
                                                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>
                                                        </div>
                                                        <div></div>
                                                        <div>
                                                            <h4 class="gilroy-bold font-16 mb-0">Dubai</h4>
                                                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                (International Airport)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="transferred-container">
                                                        <div>
                                                            <p class="gilroy-medium font-16 text-ff0000 mb-0">time</p>
                                                        </div>
                                                        <div></div>
                                                        <div>
                                                            <p class="gilroy-medium font-16 text-ff0000 mb-0">transferred
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="transferred-container">
                                                        <div>
                                                            <p class="gilroy-medium font-16 mb-0">16:00</p>
                                                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>
                                                        </div>
                                                        <div></div>
                                                        <div>
                                                            <h4 class="gilroy-bold font-16 mb-0">Dubai</h4>
                                                            <p class="gilroy-medium font-12 opacity-0-5 mb-0">
                                                                (International Airport)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0 pt-4">03h10m</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="timeline-accordion rounded-lg">
                                                            <button
                                                                class="gilroy-semi font-14 timeline-accordion-active">Etihad
                                                                Airline PC1212</button>
                                                            <div style="max-height: fit-content;">
                                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                                    sed diam nonumy eirmod tempor invidunt ut labore et
                                                                    dolore magna aliquyam erat, sed diam voluptua.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-16 mb-0">19:55</p>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-0">Saudi Arabia</h4>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">(GZT)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-0">Luggage Information</h4>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-3">
                                        <ul class="list-2">
                                            <li>
                                                <div class="d-flex flex-row-responsive">
                                                    <div class="mr-5">
                                                        <h4 class="gilroy-bold font-16 mb-3">Passenger</h4>
                                                        <p class="gilroy-medium font-12 mb-0">Nour Rajoub <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"></i></p>
                                                    </div>
                                                    <div class="mr-5">
                                                        <h4 class="gilroy-bold font-16 mb-3">Hand Luggage</h4>
                                                        <p class="gilroy-medium font-12 mb-0">Hand luggage: Included <i
                                                                class="fas fa-times text-fe2f70 icon-14px ml-2"></i></p>
                                                    </div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-3">Checked Baggage</h4>
                                                        <p class="gilroy-medium font-12 mb-0">Baggage: Not added</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-center justify-content-between">
                                                    <div>
                                                        <p class="gilroy-medium font-12 mb-0"><img class="icon-14px mr-2"
                                                                src="/image/lock.svg" /> You can find more information about
                                                            hand luggage here</p>
                                                    </div>
                                                    <div><a class="gilroy-semi text-fe2f70 font-14 text-decoration-underline"
                                                            href="javascript:void(0)">More info about hand luggage</a></div>
                                                </div>
                                            </li>
                                            </li>
                                            <li>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-center justify-content-between">
                                                    <div>
                                                        <p class="gilroy-medium font-12 mb-0"><img class="icon-14px mr-2"
                                                                src="/image/case.svg" /> You can find more information about
                                                            hand luggage here</p>
                                                    </div>
                                                    <div><a class="gilroy-semi text-fe2f70 font-14 text-decoration-underline"
                                                            href="javascript:void(0)">More info about Check luggage</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-0">Seat Information</h4>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-3">
                                        <ul class="list-3">
                                            <li>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex">
                                                        <img class="icon-16px mr-2" src="/image/plane-circle.svg" />
                                                    </div>
                                                    <div class="mr-3">
                                                        <p class="gilroy-bold font-16 mb-0">Dubai To Saudi Arabia</p>
                                                    </div>
                                                    <div><span class="gilroy-bold text-56d18f font-16"
                                                            href="javascript:void(0)">Mon 23 Aug</span></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="mr-5">
                                                        <h4 class="gilroy-bold font-16 mb-3">Passenger</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Nour Rajoub <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">Joh Doe <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"></i></p>
                                                    </div>
                                                    <div class="mr-5">
                                                        <h4 class="gilroy-bold font-16 mb-3">Selected Seat</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Baggage: Not selected</p>
                                                        <p class="gilroy-medium font-12 mb-0">Baggage: Not selected</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-0">Weather Forecast For You</h4>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-3 mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <div class="mr-2"><img class="icon-40px mr-2"
                                                            src="/image/moon-pink.svg" /></div>
                                                    <div>
                                                        <p class="gilroy-semi text-fe2f70 font-18 mb-0">Now in KSA</p>
                                                        <p class="gilroy-semi text-fe2f70 font-18 mb-0 opacity-0-5">Clear
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <div class="position-relative mr-3">
                                                        <span class="gilroy-semi text-fe2f70 font-40"><span
                                                                class="zero-pink">28</span></span>
                                                    </div>
                                                    <div>
                                                        <span class="gilroy-semi text-fe2f70 font-40">C</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg p-3 mb-3">
                                        <ul class="list-4 d-flex align-items-center justify-content-around">
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Tomorrow</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Tue</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Wed</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Thu</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Fri</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Sat</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Sun</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Mon</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="d-flex align-items-center justify-content-between bg-fafafa p-4">
                                    <div>
                                        <h4 class="gilroy-bold font-28 mb-0">Local Currency</h4>
                                    </div>
                                    <div>
                                        <h4 class="gilroy-bold text-56d18f font-28 mb-0">Riyal</h4>
                                    </div>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-3 mb-3">
                                        <p class="gilroy-medium opacity-0-5 font-14 mb-0">Currency Converter Not Available
                                        </p>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- All Flights -->
                        <div id="all-flights" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <header class="bg-56d18f p-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="mr-2">
                                            <h4 class="gilroy-semi text-white font-26 mb-0">Dubai</h4>
                                        </div>
                                        <div class="mr-2"><img class="icon-20px"
                                                src="/image/plane-circle.svg" /></div>
                                        <div>
                                            <h4 class="gilroy-semi text-white font-26 mb-0">Saudi Arabia</h4>
                                        </div>
                                    </div>
                                    <p class="gilroy-medium text-white font-14 mb-0">Mon 3 Aug - Thu 6 Sep 2021, 2
                                        Passenger Economy</p>
                                </header>
                                <div>
                                    <div class="rounded-lg p-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div><img class="icon-30px mr-2" src="/image/etihad.png" /></div>
                                            <div>
                                                <p class="gilroy-semi font-14 mb-1">Booking Number : GHF8392</p>
                                                <p class="gilroy-semi font-14 mb-0">Airline refernce : DSS232134</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="d-flex mb-3">
                                            <div class="mr-3"><b class="gilroy-bold font-14">Dubai</b></div>
                                            <div class="mr-3"><img class="icon-26px"
                                                    src="/image/planes.png" /></div>
                                            <div><b class="gilroy-bold font-14">Saudi Arabia</b> <span
                                                    class="gilroy-bold opacity-0-5 ">(KSA)</span></div>
                                        </div>
                                        <div class="d-flex flex-row-responsive mb-3">
                                            <div class="mr-3">
                                                <b class="gilroy-bold font-14 mr-2">Outbound</b> <span
                                                    class="font-14">Mon 23 Aug (12:55h)</span>
                                            </div>
                                            <div>
                                                <b class="gilroy-bold font-14 mr-2">Inbound</b> <span
                                                    class="font-14 ">Mon 6 Sep (07:55h)</span>
                                            </div>
                                        </div>
                                        <hr />
                                        <ul class="d-flex flex-wrap list-6">
                                            <li><button class="btn">Ticket</button></li>
                                            <li><button class="btn"
                                                    onclick="openTab(event, 'search-flight');">Flight schedule</button></li>
                                            <li><button class="btn">Online check-in</button></li>
                                            <li><button class="btn"
                                                    onclick="openTab(event, 'change-flight');">Flight Change</button></li>
                                            <li><button class="btn">Make Ticket Open-ended</button></li>
                                            <li><button class="btn">Flight Cancellation</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-2">Important Information</h4>
                                    <p class="gilroy-regular font-12 mb-0">Do not miss it</p>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-4">
                                        <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">COVID - 19 travel advice</h4>
                                        <p class="gilroy-regular font-14 mb-3">Lorem ipsum dolor sit amet, consetetur
                                            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
                                            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                            erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                            sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                            voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos
                                            et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                            takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.</p>
                                        <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">Changes to schedules</h4>
                                        <p class="gilroy-regular font-14 mb-3">Lorem ipsum dolor sit amet, consetetur
                                            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
                                            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                            erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                            sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                            voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-0">Would You Like To Complete Your Trip ?</h4>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg book-your-hotel">
                                        <h4 class="gilroy-bold bg-000941 text-white font-22 p-4 rounded-top mb-0">Book Your
                                            Hotel</h4>
                                        <div class="grid-2">
                                            <div>
                                                <div class="position-relative inputField-box"><img
                                                        src="/image/location.png" class="icon-18px mr-1" /><input
                                                        type="text" id="DateFrom" class="inputField inputField-withicon"
                                                        placeholder="Leaving"></div>
                                            </div>
                                            <div>
                                                <div class="position-relative inputField-box"><img
                                                        src="/image/location.png" class="icon-18px mr-1" /><input
                                                        type="text" id="DateFrom" class="inputField inputField-withicon"
                                                        placeholder="Going"></div>
                                            </div>
                                            <div>
                                                <div class="position-relative inputField-box"><img src="/image/policy.png"
                                                        class="icon-18px mr-1" /><input type="text" id="DateFrom"
                                                        class="inputField inputField-withicon" placeholder="Check in">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="position-relative inputField-box"><img src="/image/policy.png"
                                                        class="icon-18px mr-1" /><input type="text" id="DateFrom"
                                                        class="inputField inputField-withicon" placeholder="Check out">
                                                </div>
                                            </div>
                                            <div><a role="button" href="javascript:void(0)"
                                                    class="btn btn-block gilroy-medium btn-fe2f70">Search</a></div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking bg-000941 mb-3">
                                <header class="p-4">
                                    <h4 class="gilroy-bold text-white font-28 mb-2">Rent A Car</h4>
                                    <p class="gilroy-regular text-white font-14 mb-0">Rental Car Saudia Arabia</p>
                                </header>
                                <div class="bg-000941 pt-0">
                                    <div class="bg-000941">
                                        <div class="grid-3 mb-3">
                                            <div>
                                                <div class="rent-a-car-card bg-white rounded-lg p-2">
                                                    <div class="d-flex flex-column">
                                                        <div><img src="/image/images2.png" /></div>
                                                        <div>
                                                            <div class="d-flex align-items-end justify-content-between">
                                                                <div>
                                                                    <p class="gilroy-medium font-12 mb-0">Economy</p>
                                                                    <h4 class="gilroy-bold font-22 mb-0">SEK356/ Day</h4>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="bg-56d18f rounded text-white px-3 py-1">Select</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="rent-a-car-card bg-white rounded-lg p-2">
                                                    <div class="d-flex flex-column">
                                                        <div><img src="/image/images2.png" /></div>
                                                        <div>
                                                            <div class="d-flex align-items-end justify-content-between">
                                                                <div>
                                                                    <p class="gilroy-medium font-12 mb-0">Economy</p>
                                                                    <h4 class="gilroy-bold font-22 mb-0">SEK356/ Day</h4>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="bg-56d18f rounded text-white px-3 py-1">Select</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p><a class="gilroy-semi text-56d18f font-14 text-decoration-underline mb-3"
                                                href="javascript:void(0)">See More cars</a></p>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-0">What Have You Booked</h4>
                                </header>
                                <div class="pt-0">
                                    <ul class="list-5">
                                        <li>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <div class="mr-2"><img class="icon-40px mr-2"
                                                                src="/image/64423.png" /></div>
                                                        <div>
                                                            <h4 class="gilroy-semi text-000941 font-18 mb-1">Service
                                                                Package Basic</h4>
                                                            <p class="gilroy-regular font-12 mb-0">The standard free
                                                                service Package</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <div class="mr-2"><img class="icon-40px mr-2"
                                                                src="/image/64429.png" /></div>
                                                        <div>
                                                            <h4 class="gilroy-semi text-000941 font-18 mb-1">Pieces of
                                                                baggage</h4>
                                                            <p class="gilroy-regular font-12 mb-0">All passenger have carry
                                                                on luggage</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <div class="mr-2"><img class="icon-40px mr-2"
                                                                src="/image/64430.png" /></div>
                                                        <div>
                                                            <h4 class="gilroy-semi text-000941 font-18 mb-1">Seats</h4>
                                                            <p class="gilroy-regular font-12 mb-0">No seats have been
                                                                reserved</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <div class="mr-2"><img class="icon-40px mr-2"
                                                                src="/image/64427.png" /></div>
                                                        <div>
                                                            <h4 class="gilroy-semi text-000941 font-18 mb-1">Extra</h4>
                                                            <p class="gilroy-regular font-12 mb-0">Ticket Service</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-0">Weather Forecast For You</h4>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-3 mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <div class="mr-2"><img class="icon-40px mr-2"
                                                            src="/image/moon-pink.svg" /></div>
                                                    <div>
                                                        <p class="gilroy-semi text-fe2f70 font-18 mb-0">Now in KSA</p>
                                                        <p class="gilroy-semi text-fe2f70 font-18 mb-0 opacity-0-5">Clear
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <div class="position-relative mr-3">
                                                        <span class="gilroy-semi text-fe2f70 font-40"><span
                                                                class="zero-pink">28</span></span>
                                                    </div>
                                                    <div>
                                                        <span class="gilroy-semi text-fe2f70 font-40">C</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg p-3 mb-3">
                                        <ul class="list-4 d-flex align-items-center justify-content-around">
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Tomorrow</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Tue</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Wed</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Thu</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Fri</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Sat</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Sun</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex flex-column align-items-center">
                                                    <div>
                                                        <p class="gilroy-bold font-14 mb-0">Mon</p>
                                                    </div>
                                                    <div>
                                                        <p class="gilroy-medium text-1f222350 font-12 mb-1">Aug 31</p>
                                                    </div>
                                                    <div><img class="icon-50px mb-1" src="/image/moon-blue.png" /></div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value">33</span>
                                                    </div>
                                                    <div><span
                                                            class="gilroy-medium text-000941 font-16 mb-0 temperature-value opacity-0-5">22</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="d-flex align-items-center justify-content-between bg-fafafa p-4">
                                    <div>
                                        <h4 class="gilroy-bold font-28 mb-0">Local Currency</h4>
                                    </div>
                                    <div>
                                        <h4 class="gilroy-bold text-56d18f font-28 mb-0">Riyal</h4>
                                    </div>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-3 mb-3">
                                        <p class="gilroy-medium opacity-0-5 font-14 mb-0">Currency Converter Not Available
                                        </p>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Change Flight -->
                        <div id="change-flight" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <button type="button" onclick="openTab(event, 'all-flights');"
                                    class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg"><i
                                        class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Back</button>
                                <header class="bg-fafafa p-4"><button type="button"
                                        onclick="openTab(event, 'all-flights');"
                                        class="btn btn-block gilroy-bold text-left text-fe2f70 font-20 mb-3 hsm"><i
                                            class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Change Flight</button>
                                    <h4 class="gilroy-bold font-28 mb-2">Change Flight</h4>
                                    <p class="gilroy-regular font-12 mb-0">Please select the flight that you want to change
                                    </p>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-4 mb-3">
                                        <div class="d-flex mb-3">
                                            <div><label class="trippbo-checkbox gilroy-regular mt-2"><input type="checkbox"
                                                        name=""><span></span></label></div>
                                            <div>
                                                <div class="d-flex flex-column">
                                                    <div><span class="gilroy-regular font-12 mr-3">Flight No:</span> <span
                                                            class="gilroy-bold font-12">PC1072</span></div>
                                                    <div><span class="gilroy-regular font-12 mr-3">Flight Date</span> <span
                                                            class="gilroy-bold font-12">24 Aug 2021</span></div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-flight-change mb-3">
                                            <div>
                                                <div class="timeline-container">
                                                    <div></div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-medium font-12 opacity-0-5 mb-1">Copenhagen</h4>
                                                        <p class="gilroy-bold font-16 mb-0">12:55</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="timeline-container">
                                                    <div></div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-medium font-12 opacity-0-5 mb-1">Istanbul.Gokcen
                                                        </h4>
                                                        <p class="gilroy-bold font-16 mb-0">17:55</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gilroy-bold font-14 bg-fafafa rounded-lg p-3">CPH-SAW-GZT</div>
                                    </div>
                                    <div class="rounded-lg p-4">
                                        <div class="d-flex mb-3">
                                            <div><label class="trippbo-checkbox gilroy-regular mt-2"><input type="checkbox"
                                                        name=""><span></span></label></div>
                                            <div>
                                                <div class="d-flex flex-column">
                                                    <div><span class="gilroy-regular font-12 mr-3">Flight No:</span> <span
                                                            class="gilroy-bold font-12">PC1072</span></div>
                                                    <div><span class="gilroy-regular font-12 mr-3">Flight Date</span> <span
                                                            class="gilroy-bold font-12">24 Aug 2021</span></div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-flight-change mb-3">
                                            <div>
                                                <div class="timeline-container">
                                                    <div></div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-medium font-12 opacity-0-5 mb-1">Copenhagen</h4>
                                                        <p class="gilroy-bold font-16 mb-0">12:55</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="timeline-container">
                                                    <div></div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-medium font-12 opacity-0-5 mb-1">Istanbul.Gokcen
                                                        </h4>
                                                        <p class="gilroy-bold font-16 mb-0">17:55</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gilroy-bold font-14 bg-fafafa rounded-lg p-3">CPH-SAW-GZT</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end pt-0"><button type="button"
                                        class="btn gilroy-bold btn-fe2f70 font-18 px-5">Conitnue</button></div>
                            </section>
                        </div>
                        <!-- Search Flight -->
                        <div id="search-flight" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <button type="button" onclick="openTab(event, 'all-flights');"
                                    class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg"><i
                                        class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Back</button>
                                <header class="bg-fafafa p-4"><button type="button"
                                        onclick="openTab(event, 'all-flights');"
                                        class="btn btn-block gilroy-bold text-left text-fe2f70 font-20 mb-3 hsm"><i
                                            class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Change Flight</button>
                                    <h4 class="gilroy-bold font-28 mb-2">New Flight Search</h4>
                                    <p class="gilroy-regular font-12 mb-0">Search new flight</p>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-4">
                                        <div class="grid-9">
                                            <div>
                                                <p class="gilroy-medium font-12 mb-0">From</p>
                                            </div>
                                            <div>
                                                <p class="gilroy-medium font-12 mb-0">To</p>
                                            </div>
                                            <div>
                                                <div class="position-relative inputField-box w-100"><img
                                                        class="icon-18px mr-1" src="/image/location.png"><input type="text"
                                                        class="inputField inputField-withicon" placeholder="Dubai"></div>
                                            </div>
                                            <div>
                                                <div class="position-relative inputField-box w-100"><img
                                                        class="icon-18px mr-1" src="/image/location.png"><input type="text"
                                                        class="inputField inputField-withicon" placeholder="Turkey"></div>
                                            </div>
                                            <div>
                                                <div class="position-relative inputField-box w-100"><img
                                                        class="icon-18px mr-1" src="/image/policy.png"><input type="text"
                                                        class="inputField inputField-withicon"
                                                        placeholder="Departing Date"></div>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-end-responsive-left">
                                                    <div>
                                                        <div class="trippbo-dropdown">
                                                            <button class="gilroy-medium text-000941 font-12">1 Room, 2
                                                                Travelers <i
                                                                    class="fa fa-angle-down font-14 font-weight-bold ml-1"
                                                                    aria-hidden="true"></i></button>
                                                            <div>
                                                                <p class="gilroy-medium font-12 mb-2"
                                                                    onclick="this.parentElement.style.display = 'none';">
                                                                    <img class="icon-10px mr-2 hlg" src="/image/close.png">
                                                                    Travelers
                                                                </p>
                                                                <p
                                                                    class="gilroy-medium font-10 mb-2 text-23242c opacity-0-5">
                                                                    Room 1</p>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between mb-2">
                                                                    <div class="w-60"><span
                                                                            class="gilroy-medium font-12">Adult</span>
                                                                    </div>
                                                                    <div class="w-40">
                                                                        <div id="children-increament"
                                                                            class="increamentor">
                                                                            <div><i class="fa fa-minus-circle increamentor-minus"
                                                                                    aria-hidden="true"></i></div>
                                                                            <div><input type="text"
                                                                                    class="increamentor-number" value="1"
                                                                                    readonly="readonly"></div>
                                                                            <div><i class="fa fa-plus-circle increamentor-plus"
                                                                                    aria-hidden="true"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between mb-2">
                                                                    <div class="w-60"><span
                                                                            class="gilroy-medium font-12">Children</span>
                                                                    </div>
                                                                    <div class="w-40">
                                                                        <div id="children-increament"
                                                                            class="increamentor">
                                                                            <div><i class="fa fa-minus-circle increamentor-minus increamentor-opacity increamentor-not-allowed"
                                                                                    aria-hidden="true"></i></div>
                                                                            <div><input type="text"
                                                                                    class="increamentor-number increamentor-opacity"
                                                                                    value="0" readonly="readonly"></div>
                                                                            <div><i class="fa fa-plus-circle increamentor-plus"
                                                                                    aria-hidden="true"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="d-flex align-items-center justify-content-end mb-2">
                                                                    <div><span class="gilroy-semi font-12 text-fe2f70">Add
                                                                            Room</span></div>
                                                                </div>
                                                                <div><button type="button"
                                                                        class="btn btn-block btn-000941 font-12">Done</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div><button type="button"
                                                        class="btn btn-block gilroy-medium btn-fe2f70 px-5">Search
                                                        Again</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Documents & Passenger -->
                        <div id="documents-and-passenger" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4 hsm">
                                    <h4 class="gilroy-bold font-28 mb-2">Passengar</h4>
                                    <p class="gilroy-regular font-12 mb-0">Why is flying?</p>
                                </header>
                                <div>
                                    <div class="rounded-lg p-4">
                                        <div class="grid-5">
                                            <div>
                                                <h4 class="gilroy-bold text-fe2f70 font-20 mb-2">E-Ticket</h4>
                                                <p class="gilroy-regular font-14 mb-3">Sent at 130-07-2021 12:13 to
                                                    test@gmail.com</p>
                                                <ul class="list-7 d-flex flex-column">
                                                    <li><button class="btn"><span>Resend</span><i
                                                                class="fas fa-envelope" aria-hidden="true"></i></button>
                                                    </li>
                                                    <li><button class="btn"><span>View & print</span><i
                                                                class="fas fa-envelope" aria-hidden="true"></i></button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="gilroy-bold text-fe2f70 font-20 mb-2">Booking Request
                                                    Acknowledgement</h4>
                                                <p class="gilroy-regular font-14 mb-3">Sent at 130-07-2021 12:13 to
                                                    test@gmail.com</p>
                                                <ul class="list-7 d-flex flex-column">
                                                    <li><button class="btn"><span>Resend</span><i
                                                                class="fas fa-envelope" aria-hidden="true"></i></button>
                                                    </li>
                                                    <li><button class="btn"><span>View & print</span><i
                                                                class="fas fa-envelope" aria-hidden="true"></i></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-0"><a href="javascript:void(0)"
                                        class="btn gilroy-bold text-fe2f70 text-decoration-underline font-12 p-0">View
                                        payment overview(s)</a></div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-2">Passengar</h4>
                                    <p class="gilroy-regular font-12 mb-0">Why is flying?</p>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-4">
                                        <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">John Doe</h4>
                                        <div class="grid-4">
                                            <div><span class="gilroy-regular font-12">Date of Birth</span></div>
                                            <div><span class="gilroy-bold font-12">01 May 1989</span></div>
                                            <div><span class="gilroy-regular font-12">Passenger type</span></div>
                                            <div><span class="gilroy-bold font-12">Infant</span></div>
                                        </div>
                                        <hr />
                                        <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">Ayesha</h4>
                                        <div class="grid-4">
                                            <div><span class="gilroy-regular font-12">Date of Birth</span></div>
                                            <div><span class="gilroy-bold font-12">01 May 1989</span></div>
                                            <div><span class="gilroy-regular font-12">Passenger type</span></div>
                                            <div><span class="gilroy-bold font-12">Infant</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-0"><a href="javascript:void(0)"
                                        onclick="openTab(event, 'documents-and-passenger-2');"
                                        class="btn gilroy-bold text-fe2f70 text-decoration-underline font-12 p-0">Luggage
                                        Per Passenger</a></div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-2">Important Information</h4>
                                    <p class="gilroy-regular font-12 mb-0">Do not miss it</p>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-4">
                                        <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">Visa For Turkey</h4>
                                        <p class="gilroy-regular font-14 mb-3">Lorem ipsum dolor sit amet, consetetur
                                            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
                                            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                            erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                            sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                            voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos
                                            et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                            takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.</p>
                                        <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">Passport & Visa</h4>
                                        <p class="gilroy-regular font-14 mb-3">Lorem ipsum dolor sit amet, consetetur
                                            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
                                            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                            erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                            sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                            voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos
                                            et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                            takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.</p>
                                        <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">Covid 19</h4>
                                        <p class="gilroy-regular font-14 mb-3">Lorem ipsum dolor sit amet, consetetur
                                            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
                                            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                            erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                            sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                            voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos
                                            et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                            takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.</p>
                                        <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">No E ticket</h4>
                                        <p class="gilroy-regular font-14 mb-3">Lorem ipsum dolor sit amet, consetetur
                                            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
                                            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                            erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                            sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                            voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos
                                            et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                            takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.</p>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Documents & Passenger 2 -->
                        <div id="documents-and-passenger-2" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <div>
                                    <div class="rounded-lg p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="mr-3"><img class="icon-40px"
                                                    src="/image/64429.png"></div>
                                            <div>
                                                <h4 class="gilroy-semi text-000941 font-18">Luggage</h4>
                                            </div>
                                        </div>
                                        <div class="gilroy-bold font-14 bg-fafafa rounded-lg mb-3 p-3">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3"><img class="icon-24px"
                                                        src="/image/64448.png"></div>
                                                <div class="mr-2">
                                                    <h4 class="gilroy-bold font-14 mb-0">Dubai To Saudi Arabia</h4>
                                                </div>
                                                <div>
                                                    <h4 class="gilroy-regular font-14 mb-0">- Mon 23 Aug</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-8">
                                            <li>
                                                <div class="d-flex flex-row-responsive">
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-3">Passenger</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Nour Rajoub <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">John Doe <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-3">Hand Luggage</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Hand luggage: Included <i
                                                                class="fas fa-times text-fe2f70 icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">Hand luggage: Included <i
                                                                class="fas fa-times text-fe2f70 icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-3">Checked Baggage</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Baggage: Not added</p>
                                                        <p class="gilroy-medium font-12 mb-0">Baggage: Not added</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="gilroy-bold font-14 bg-fafafa rounded-lg mb-3 p-3">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3"><img class="icon-24px"
                                                        src="/image/64448.png"></div>
                                                <div class="mr-2">
                                                    <h4 class="gilroy-bold font-14 mb-0">Saudi Arabia To Dubai</h4>
                                                </div>
                                                <div>
                                                    <h4 class="gilroy-regular font-14 mb-0">- Mon 23 Aug</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-8">
                                            <li>
                                                <div class="d-flex flex-row-responsive">
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-3">Passenger</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Nour Rajoub <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">John Doe <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-3">Hand Luggage</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Hand luggage: Included <i
                                                                class="fas fa-times text-fe2f70 icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">Hand luggage: Included <i
                                                                class="fas fa-times text-fe2f70 icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-3">Checked Baggage</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Baggage: Not added</p>
                                                        <p class="gilroy-medium font-12 mb-0">Baggage: Not added</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-center justify-content-between">
                                                    <div>
                                                        <p class="gilroy-medium font-12 mb-0"><img class="icon-14px mr-2"
                                                                src="/image/lock.svg"> You can find more information about
                                                            hand luggage here</p>
                                                    </div>
                                                    <div><a class="gilroy-semi text-fe2f70 font-14 text-decoration-underline"
                                                            href="javascript:void(0)">More info about hand luggage</a></div>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="d-flex flex-row-responsive align-items-center justify-content-between">
                                                    <div>
                                                        <p class="gilroy-medium font-12 mb-0"><img class="icon-14px mr-2"
                                                                src="/image/case.svg"> You can find more information about
                                                            hand luggage here</p>
                                                    </div>
                                                    <div><a class="gilroy-semi text-fe2f70 font-14 text-decoration-underline"
                                                            href="javascript:void(0)">More info about Check luggage</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking">
                                <div>
                                    <div class="rounded-lg p-4 mb-3">
                                        <ul class="grid-8">
                                            <li>
                                                <div class="d-flex flex-row-responsive">
                                                    <div><img class="icon-40px" src="/image/64455.png"></div>
                                                    <div>
                                                        <h4 class="gilroy-semi text-000941 font-18 mb-2">Special Luggage
                                                        </h4>
                                                        <p class="gilroy-medium font-12 mb-2">Medical Luggage <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">Wheel Chair <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div>
                                                        <p class="gilroy-medium font-12 mb-0">Need Something<br />Special
                                                        </p>
                                                    </div>
                                                    <div><button class="pressed">Contact Us</button></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rounded-lg p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="mr-3"><img class="icon-40px"
                                                    src="/image/64430.png"></div>
                                            <div>
                                                <h4 class="gilroy-semi text-000941 font-18">Seats</h4>
                                            </div>
                                        </div>
                                        <div class="gilroy-bold font-14 bg-fafafa rounded-lg mb-3 p-3">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3"><img class="icon-24px"
                                                        src="/image/64448.png"></div>
                                                <div class="mr-2">
                                                    <h4 class="gilroy-bold font-14 mb-0">Dubai To Saudi Arabia</h4>
                                                </div>
                                                <div>
                                                    <h4 class="gilroy-regular font-14 mb-0">- Mon 23 Aug</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-2">
                                            <li>
                                                <div class="d-flex flex-row-responsive">
                                                    <div class="mr-5">
                                                        <h4 class="gilroy-bold font-16 mb-3">Passenger</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Nour Rajoub <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">John Doe <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-3">Hand Luggage</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Hand luggage: Included <i
                                                                class="fas fa-times text-fe2f70 icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">Hand luggage: Included <i
                                                                class="fas fa-times text-fe2f70 icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="gilroy-bold font-14 bg-fafafa rounded-lg mb-3 p-3">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3"><img class="icon-24px"
                                                        src="/image/64448.png"></div>
                                                <div class="mr-2">
                                                    <h4 class="gilroy-bold font-14 mb-0">Saudi Arabia To Dubai</h4>
                                                </div>
                                                <div>
                                                    <h4 class="gilroy-regular font-14 mb-0">- Mon 23 Aug</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-2">
                                            <li>
                                                <div class="d-flex flex-row-responsive">
                                                    <div class="mr-5">
                                                        <h4 class="gilroy-bold font-16 mb-3">Passenger</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Nour Rajoub <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">John Doe <i
                                                                class="fas fa-check text-56d18f icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-3">Hand Luggage</h4>
                                                        <p class="gilroy-medium font-12 mb-2">Hand luggage: Included <i
                                                                class="fas fa-times text-fe2f70 icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                        <p class="gilroy-medium font-12 mb-0">Hand luggage: Included <i
                                                                class="fas fa-times text-fe2f70 icon-14px ml-2"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Flight Info -->
                        <div id="flight-info" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <div class="grid-6">
                                    <div class="rounded-lg p-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="d-flex mr-2"><img class="icon-20px"
                                                    src="/image/plane-circle.svg"></div>
                                            <div>
                                                <h4 class="gilroy-semi text-fe2f70 font-24 mb-0">Outbound <span
                                                        class="gilroy-regular">- Mon 23 Aug</span></h4>
                                            </div>
                                        </div>
                                        <div class="timeline">
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-16 mb-0">12:55</p>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-0">Dubai</h4>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">(International
                                                            Airport)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">03h10m</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="timeline-accordion rounded-lg w-auto">
                                                            <button class="gilroy-semi font-14">Etihad Airline
                                                                PC1212</button>
                                                            <div>
                                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                                    sed diam nonumy eirmod tempor invidunt ut labore et
                                                                    dolore magna aliquyam erat, sed diam voluptua.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-16 mb-0">19:55</p>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-0">Saudi Arabia</h4>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">(GZT)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg p-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="d-flex mr-2"><img class="icon-20px"
                                                    src="/image/plane-circle.svg"></div>
                                            <div>
                                                <h4 class="gilroy-semi text-fe2f70 font-24 mb-0">Inbound <span
                                                        class="gilroy-regular">- Mon 23 Aug</span></h4>
                                            </div>
                                        </div>
                                        <div class="timeline">
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-16 mb-0">12:55</p>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-0">Dubai</h4>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">(International
                                                            Airport)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">03h10m</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <div class="timeline-accordion rounded-lg w-auto">
                                                            <button class="gilroy-semi font-14">Etihad Airline
                                                                PC1212</button>
                                                            <div>
                                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                                    sed diam nonumy eirmod tempor invidunt ut labore et
                                                                    dolore magna aliquyam erat, sed diam voluptua.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="timeline-container">
                                                    <div>
                                                        <p class="gilroy-medium font-16 mb-0">19:55</p>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">23 Aug</p>
                                                    </div>
                                                    <div></div>
                                                    <div>
                                                        <h4 class="gilroy-bold font-16 mb-0">Saudi Arabia</h4>
                                                        <p class="gilroy-medium font-12 opacity-0-5 mb-0">(GZT)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-2">Important Information</h4>
                                    <p class="gilroy-regular font-12 mb-0">Do not miss it</p>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-4">
                                        <h4 class="gilroy-bold text-fe2f70 font-14 mb-3">Changes To Schedule</h4>
                                        <p class="gilroy-regular font-14 mb-3">Lorem ipsum dolor sit amet, consetetur
                                            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                            magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
                                            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                            erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                            sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                            voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                                            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos
                                            et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                            takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.</p>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Purchase Extras -->
                        <div id="purchase-extras" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <div>
                                    <div class="rounded-lg p-4 mb-3">
                                        <div class="grid-7">
                                            <div><img src="/image/64427.png" /></div>
                                            <div>
                                                <h4 class="gilroy-bold text-000941 font-18 mb-2">Ticket Services</h4>
                                                <div>
                                                    <div><i class="fas fa-check text-56d18f icon-14px mr-2"
                                                            aria-hidden="true"></i></div>
                                                    <div>
                                                        <p class="gilroy-medium font-12 mb-0">Lorem ipsum dolor sit amet,
                                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                            invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                            voluptua. At vero eos et accusam et justo duo dolores et ea
                                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                            invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                            voluptua. At vero eos et accusam et justo duo dolores et ea
                                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                            invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                            voluptua. At vero eos et accusam et justo duo dolores et ea
                                                            rebum.</p>
                                                        <a href="javascript:void(0)"
                                                            class="btn gilroy-regular text-decoration-underline font-14 p-0">More
                                                            information</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg p-4">
                                        <div class="grid-7">
                                            <div><img src="/image/64423.png" /></div>
                                            <div>
                                                <h4 class="gilroy-bold text-000941 font-18 mb-2">Service package Basic</h4>
                                                <div>
                                                    <div><i class="fas fa-check text-56d18f icon-14px mr-2"
                                                            aria-hidden="true"></i></div>
                                                    <div>
                                                        <p class="gilroy-medium font-12 mb-0">Lorem ipsum dolor sit amet,
                                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                            invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                            voluptua. At vero eos et accusam et justo duo dolores et ea
                                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                            invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                            voluptua. At vero eos et accusam et justo duo dolores et ea
                                                            rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                                            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                                            consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                            invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                            voluptua. At vero eos et accusam et justo duo dolores et ea
                                                            rebum.</p>
                                                        <a href="javascript:void(0)"
                                                            class="btn gilroy-regular text-decoration-underline font-14 p-0">More
                                                            information</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Payment Method -->
                        <div id="payment-method" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <header class="bg-fafafa p-4">
                                    <h4 class="gilroy-bold font-28 mb-2">Your Payment Overview</h4>
                                    <p class="gilroy-regular font-12 mb-0">13 July 2021</p>
                                </header>
                                <div class="pt-0">
                                    <div class="rounded-lg p-4">
                                        <div class="gilroy-bold font-14 bg-fafafa rounded-lg mb-3 p-3">CPH-SAW-GZT</div>
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="d-flex"><img class="icon-16px mr-2"
                                                    src="/image/plane-right.png"></div>
                                            <div>
                                                <p class="gilroy-bold font-14 text-fe2f70 mb-0">Flight</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-lg-2">
                                            <div>
                                                <p class="gilroy-regular font-14 mb-0">1. Flight Ticket Adult x1 (Include
                                                    Text)</p>
                                            </div>
                                            <div>
                                                <p class="gilroy-regular font-14 mb-0">3,3232.59</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="gilroy-regular font-14 mb-0">1. Flight Ticket Adult x1 (Include
                                                    Text)</p>
                                            </div>
                                            <div>
                                                <p class="gilroy-regular font-14 mb-0">800</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="gilroy-bold font-14 mb-0">Total Flight</p>
                                            </div>
                                            <div>
                                                <p class="gilroy-bold font-14 mb-0">44232.59</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="d-flex"><img class="icon-16px mr-2"
                                                    src="/image/64468.svg" /></div>
                                            <div>
                                                <p class="gilroy-bold font-14 text-fe2f70 mb-0">Insurance</p>
                                            </div>
                                        </div>
                                        <p class="gilroy-regular font-14 mb-0">Nill</p>
                                        <hr />
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="gilroy-regular font-14 mb-0"><i
                                                        class="fas fa-check text-56d18f icon-14px mr-1"
                                                        aria-hidden="true"></i> Services</p>
                                            </div>
                                            <div>
                                                <p class="gilroy-bold font-14 text-56d18f mb-0">Free</p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <p class="gilroy-regular font-14 mb-0">Other Payment</p>
                                            </div>
                                            <div>
                                                <p class="gilroy-regular font-14 mb-0">0.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between bordered-image p-4">
                                        <div><span class="gilroy-bold text-white font-30">Total</span></div>
                                        <div><span class="gilroy-bold text-white font-30">PKR 44232.59</span></div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Contact Us -->
                        <div id="contact-us" class="trippbo-tabcontent">
                            <section class="container-all-booking mb-3">
                                <div>
                                    <div class="rounded-lg p-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="mb-5"><img class="icon-150px"
                                                    src="/image/message.png" /></div>
                                            <div>
                                                <h4 class="gilroy-bold text-fe2f70 font-22 text-center mb-3">You've got no
                                                    message</h4>
                                                <p class="gilroy-regular font-12 text-center mb-0">No messages in your
                                                    inbox, just like every other day. Get some life, dude.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </main>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{asset('css-r/custom.js')}}"></script>
    <script src="{{asset('css-r/all-booking.js')}}"></script>
    <script src="js/all-booking.js"></script>
    <script>
        $('#myTab a').on('click', function(event) {
            event.preventDefault()
            $(this).tab('show')
        });
    </script>
@endsection
