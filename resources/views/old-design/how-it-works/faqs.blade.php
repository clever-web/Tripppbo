@extends('layout')
@section('head')
<link href="/css-r/style.css" rel="stylesheet">
<link href="/css-r/faqs.css" rel="stylesheet">
@endsection
@section('content')
<div class="body-content">
    <section class="pb-5">
        <div class="p-2 mb-3">
            <h2 class="gilroy-regular text-center font-34">Customer Services</h2>
            <p class="gilroy-medium text-center font-12"><a class="btn btn-link gilroy-semi font-12 text-fe2f70 p-0" href="">Sign in</a> for help with your trips</p>
        </div>
        <div class="p-4 bg-f9f9f9 mb-3">
            <p class="gilroy-semi text-center font-16 mb-5">Your Virtual Agent is here to help.</p>
            <div class="grid-2">
                <div>
                    <img src="image/calendar-3.png" alt="" />
                    <p>Cancel your trip</p>
                </div>
                <div>
                    <img src="image/calendar-3.png" alt="" />
                    <p>Cancel your trip</p>
                </div>
                <div>
                    <img src="image/calendar-3.png" alt="" />
                    <p>Cancel your trip</p>
                </div>
                <div>
                    <img src="image/calendar-3.png" alt="" />
                    <p>Cancel your trip</p>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="grid-3">
                <div>
                    <div class="panel">
                        <h2 class="mb-0">Frequently Ask Questions</h2>
                    </div>
                </div>
                <div>
                    <div class="input-box mb-2"><i class="fas fa-search icon-left text-000941 font-16" aria-hidden="true"></i><input type="text" class="inputField inputField-withicon" placeholder="Search"></div>
                    <p class="gilroy-medium font-14 opacity-50 mb-2">Recent Search</p>
                    <ul class="list-2 d-flex align-items-center">
                        <li><span class="tag">Tags</span></li>
                        <li><span class="tag">Tags</span></li>
                    </ul>
                </div>
            </div>
            <div class="grid-1">
                <aside>
                    <ul class="list-1 bg-white">
                        <li id="defaultOpen" class="tablink list-1-active" onclick="openTab(event, 'hotel');"><button><img src="image/64236.png" alt="" /> Hotel</button></li>
                        <li class="tablink" onclick="openTab(event, 'flights');"><button><img src="image/plane-up.png" alt="" /> Flights</button></li>
                        <li class="tablink" onclick="openTab(event, 'car');"><button><img src="image/64424.png" alt="" /> Car</button></li>
                    </ul>
                </aside>
                <main id="main" style="right: 0%;">
                    <button type="button" onclick="close_main();" class="btn btn-block gilroy-semi text-white text-left font-14 btn-fe2f70 py-3 hlg"><i class="fas fa-arrow-left mr-1" aria-hidden="true"></i> Faqs</button>
                    <div class="trippbo-booking-main">
                        <!-- Hotel -->
                        <div id="hotel" class="trippbo-tabcontent" style="display: block;">
                            <div>
                                <button class="accordion accordion-active">View your booking</button>
                                <div class="accordion-panel" style="max-height: fit-content;">
                                    <p class="gilroy-regular font-14">We make it easy to view the details of your bookings. That's why after you book, we send you a confirmation email with your itinerary number and trip details. You can also view, email, and print your itinerary right from our website. Here's how it all works. To view your booking</p>
                                    <p class="gilroy-regular font-14">Go to My Trips. That's where you'll see all your bookings, along with options to email or print them. Book without signing in?</p>
                                    <p class="gilroy-regular font-14">No problem. You can hop over to Find your itinerary to track down your booking. Can't find your itinerary number?</p>
                                    <p class="gilroy-regular font-14">We've got you covered. Just go to Forgot your itinerary number. Don't see your booking?</p>
                                    <p class="gilroy-regular font-14">For some bookings, it may take 24 hours to pop up in your inbox. Or it might be hiding in your spam folder. Good to know</p>
                                    <p class="gilroy-regular font-14">Did you make changes to your flight directly with the airline? Just so you know, you won't see those changes in your itinerary. The best thing to do is go to the airline's website.</p>
                                    <p class="gilroy-regular font-14">Still need help?</p>
                                    <p class="gilroy-regular font-14">If it's been 24 hours and you still don't see your confirmation email, or you can't find your booking, and we'll help out.</p>
                                    <p class="gilroy-bold font-14">Was this topic helpful?</p>
                                    <ul class="list-3 d-flex mb-3">
                                        <li class="mr-2"><button>yes</button></li>
                                        <li><button>no</button></li>
                                    </ul>
                                </div>
                                <button class="accordion">Check in and out of your hotel or vacation rental</button>
                                <div class="accordion-panel">
                                    <p class="gilroy-regular font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <button class="accordion">Get a receipt for your booking</button>
                                <div class="accordion-panel">
                                    <p class="gilroy-regular font-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Flights -->
                        <div id="flights" class="trippbo-tabcontent" style="display: none;">
                            <h4>Flights</h4>
                        </div>
                        <!-- Car -->
                        <div id="car" class="trippbo-tabcontent" style="display: none;">
                            <h4>Car</h4>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>

</div>
@endsection

@section('scripts')
<script src="/css-r/custom.js"></script>
<script src="/css-r/faqs.js"></script>
@endsection
