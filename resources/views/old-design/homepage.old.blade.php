@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{ asset('css-n/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/index-responsive.css') }}">



    <style>
        .invisible {
            display: none;
        }

        .pink {
            color: #FE2F70;
        }

    </style>
@endsection
@section('content')

    <section class="home-banner-area background-image" data-src="images-n/headers/homepage.png">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="home-banner-col">
                        <h1>Experience the Exciting Hotels<br> with <span>Trippbo</span></h1>
                        <div class="banner-tab">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true"><img
                                            src="images-n/icons/tab-1.png" alt="" class="icon-black"> <img
                                            src="images-n/icons/tab-1-pink.png" alt="" class="icon-pink"> Hotels</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false"><img src="images-n/icons/tab-2.png" alt=""
                                            class="icon-black"> <img src="images-n/icons/tab-2-pink.png" alt=""
                                            class="icon-pink"> Flights</a>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                        role="tab" aria-controls="pills-contact" aria-selected="false"><img
                                            src="images-n/icons/tab-3.png" alt="" class="icon-black"> <img
                                            src="images-n/icons/tab-3-pink.png" alt="" class="icon-pink"> Car</a>
                                </li> --}}
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-packages-tab" data-toggle="pill"
                                        href="#pills-packages" role="tab" aria-controls="pills-packages"
                                        aria-selected="false"><img src="images-n/icons/tab-4.png" alt=""
                                            class="icon-black"> <img src="images-n/icons/tab-4-pink.png" alt=""
                                            class="icon-pink"> Packages</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="tab-body">
                                        <form class="clearfix" id="hotel_form"
                                            action="{{ route('hotels-search-results') }}" method="GET">
                                            <div class="row my-3">
                                                <div class="col-lg-12">
                                                    <div style="position: relative" class="d-flex justify-content-end">
                                                        <a data-toggle="collapse" href="#hotel-travellers-count"
                                                            style="color:#000941" id="hotel-travelers-count-title">1
                                                            Room, 1 Traveler <img src="/images-n/icons/arrow-down-2.png">
                                                        </a>
                                                        <div id="hotel-travellers-count" class="collapse"
                                                            style="width: 268px;position: absolute;z-index: 1000; top: 30px; right:0px;">
                                                            <div class="p-4"
                                                                style="background-color: white;box-shadow: 0px 0px 6px #00000028;">
                                                                <p style="color: #23242C;font-weight: 500;font-size:20px">
                                                                    Travelers</p>

                                                                <div
                                                                    class="d-flex flex-row justify-content-between align-items-center mt-3">
                                                                    <div>Adult</div>
                                                                    <div class="d-flex flex-row align-items-center justify-content-between"
                                                                        style="color: #23242C">
                                                                        <div style="cursor: pointer;"
                                                                            onclick="hotel_remove_adult()">
                                                                            <i style="color: #23242C;font-size:24px;"
                                                                                class="fas fa-minus-circle fa-2x"></i>
                                                                        </div>
                                                                        <span class="px-3"
                                                                            id="hotel-adults-count">1</span>
                                                                        <input type="hidden" name="hotel_adult_count"
                                                                            id="hotel-adults-count-input" value="1">
                                                                        <div style="cursor: pointer;"
                                                                            onclick="hotel_add_adult()">
                                                                            <i style="color: #23242C;font-size:24px;"
                                                                                class="fas fa-plus-circle fa-2x"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <hr>
                                                                <div
                                                                    class="d-flex flex-row justify-content-between align-items-center mt-3">
                                                                    <div>Children</div>
                                                                    <div class="d-flex flex-row align-items-center justify-content-between"
                                                                        style="color: #23242C">
                                                                        <div style="cursor: pointer;"
                                                                            onclick="hotel_remove_child()">
                                                                            <i style="color: #23242C;font-size:24px;"
                                                                                class="fas fa-minus-circle fa-2x"></i>
                                                                        </div>
                                                                        <span class="px-3"
                                                                            id="hotel-children-count">0</span>
                                                                        <input type="hidden" name="hotel_children_count"
                                                                            id="hotel-children-count-input" value="0">
                                                                        <div style="cursor: pointer;"
                                                                            onclick="hotel_add_child()">
                                                                            <i style="color: #23242C;font-size:24px;"
                                                                                class="fas fa-plus-circle fa-2x"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                {{-- <div class="d-flex justify-content-end">
                                                                    <div>
                                                                        <a href="#"
                                                                           style="color:#FE2F70;font-weight: 500">Add
                                                                            Room</a>
                                                                    </div>
                                                                </div> --}}
                                                                <div
                                                                    class="d-flex flex-row justify-content-between align-items-center mt-3">
                                                                    <div>Rooms</div>
                                                                    <div class="d-flex flex-row align-items-center justify-content-between"
                                                                        style="color: #23242C">
                                                                        <div style="cursor: pointer;"
                                                                            onclick="hotel_remove_room()">
                                                                            <i style="color: #23242C;font-size:24px;"
                                                                                class="fas fa-minus-circle fa-2x"></i>
                                                                        </div>
                                                                        <span class="px-3"
                                                                            id="hotel-rooms-count">0</span>
                                                                        <input type="hidden" name="hotel_rooms_count"
                                                                            id="hotel-rooms-count-input" value="0">
                                                                        <div style="cursor: pointer;"
                                                                            onclick="hotel_add_room()">
                                                                            <i style="color: #23242C;font-size:24px;"
                                                                                class="fas fa-plus-circle fa-2x"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="w-100 mt-3">
                                                                    <a class="w-100 btn px-5 py-2" data-toggle="collapse"
                                                                        href="#hotel-travellers-count"
                                                                        style="background-color:#000941;color:white">
                                                                        Done
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-6">
                                                    <div class="input-group" style="position: relative;">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <img src="images-n/icons/location.png" alt="">
                                                            </div>
                                                        </div>
                                                        <input type="text" required autocomplete="off"
                                                            class="form-control" id="hotel_autocomplete"
                                                            placeholder="Destination">
                                                        <input id="hotel_destination" type="hidden" value=""
                                                            name="destination">
                                                        <div id="hotel-search-result-container" class="container invisible"
                                                            style="background-color: white">

                                                            <div id="results" class="p-2"
                                                                style="position: absolute;top: 80px;z-index: 1000;background-color: white;border:#00000028 solid 1px;box-shadow: 0px 3px 6px #00000028;">

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input class="datepicker" autocomplete="off" name="checkInDate"
                                                        id="datepicker" required placeholder="Check-In Date">
                                                </div>
                                                <div class="col-lg-3">
                                                    <input class="datepicker" autocomplete="off" name="checkOutDate"
                                                        required id="datepicker-two" placeholder="Check Out date">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="my-checkbox">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">Add
                                                                Flight</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck2">
                                                            {{-- <label class="custom-control-label" for="customCheck2">Add
                                                                Car</label> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button id="hotel_submit"
                                                        class="btn btn-primary btn-lg btn-block find-btn" type="submit">Find
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="tab-body">
                                        <form method="get" action="{{ route('flights-search-results') }}"
                                            class="clearfix">
                                            <div class="row my-3">
                                                <div class="col-lg-12">
                                                    <div class="disflex">
                                                        <ul class="tags">
                                                            <li id="roundtrip" class="flight-element active"><a href="#"
                                                                    onclick="switchMode(0)">Roundtrip</a></li>
                                                            <li id="oneway"><a class="flight-element" href="#"
                                                                    onclick="switchMode(1)">One Way</a></li>
                                                            <li id="multi_city" style="
                                                                white-space: nowrap;
                                                            "><a class="flight-element" href="#"
                                                                    onclick="switchMode(2)">Multi-City</a></li>
                                                        </ul>
                                                        <div class="d-flex flex-row align-items-start">
                                                            <div style="position: relative"
                                                                class="d-flex justify-content-start mr-5">
                                                                <a data-toggle="collapse" href="#flight-travellers-count"
                                                                    style="color:#000941"
                                                                    id="flight-travelers-count-title">1
                                                                    Room, 1 Adults <img
                                                                        src="/images-n/icons/arrow-down-2.png">
                                                                </a>
                                                                <div id="flight-travellers-count" class="collapse"
                                                                    style="width: 268px;position: absolute;z-index: 1000; top: 30px; right:-100px;">
                                                                    <div class="p-4"
                                                                        style="background-color: white;box-shadow: 0px 0px 6px #00000028;">
                                                                        <p
                                                                            style="color: #23242C;font-weight: 500;font-size:20px">
                                                                            Travelers</p>

                                                                        <div
                                                                            class="d-flex flex-row justify-content-between align-items-center mt-3">
                                                                            <div>Adult</div>
                                                                            <div class="d-flex flex-row align-items-center justify-content-between"
                                                                                style="color: #23242C">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_remove_adult()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-minus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                                <span class="px-3"
                                                                                    id="flight-adults-count">1</span>
                                                                                <input type="hidden"
                                                                                    name="flight_adult_count"
                                                                                    id="flight-adults-count-input"
                                                                                    value="1">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_add_adult()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-plus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <hr>


                                                                        <div
                                                                            class="d-flex flex-row justify-content-between align-items-center mt-3">
                                                                            <div>Student (Over 18 Years)</div>
                                                                            <div class="d-flex flex-row align-items-center justify-content-between"
                                                                                style="color: #23242C">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_remove_student()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-minus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                                <span class="px-3"
                                                                                    id="flight-students-count">1</span>
                                                                                <input type="hidden"
                                                                                    name="flight_student_count"
                                                                                    id="flight-students-count-input"
                                                                                    value="1">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_add_student()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-plus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <hr>


                                                                        <div
                                                                            class="d-flex flex-row justify-content-between align-items-center mt-3">
                                                                            <div>Youth (12 - 17)</div>
                                                                            <div class="d-flex flex-row align-items-center justify-content-between"
                                                                                style="color: #23242C">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_remove_youth()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-minus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                                <span class="px-3"
                                                                                    id="flight-youths-count">1</span>
                                                                                <input type="hidden"
                                                                                    name="flight_youth_count"
                                                                                    id="flight-youths-count-input"
                                                                                    value="1">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_add_youth()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-plus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <hr>


                                                                        <div
                                                                            class="d-flex flex-row justify-content-between align-items-center mt-3">
                                                                            <div>Child (2- 11)</div>
                                                                            <div class="d-flex flex-row align-items-center justify-content-between"
                                                                                style="color: #23242C">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_remove_child()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-minus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                                <span class="px-3"
                                                                                    id="flight-childs-count">1</span>
                                                                                <input type="hidden"
                                                                                    name="flight_child_count"
                                                                                    id="flight-childs-count-input"
                                                                                    value="1">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_add_child()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-plus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <hr>


                                                                        <div
                                                                            class="d-flex flex-row justify-content-between align-items-center mt-3">
                                                                            <div>Baby (Own Seat)</div>
                                                                            <div class="d-flex flex-row align-items-center justify-content-between"
                                                                                style="color: #23242C">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_remove_baby_own_seat()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-minus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                                <span class="px-3"
                                                                                    id="flight-baby_own_seats-count">1</span>
                                                                                <input type="hidden"
                                                                                    name="flight_baby_own_seat_count"
                                                                                    id="flight-baby_own_seats-count-input"
                                                                                    value="1">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_add_baby_own_seat()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-plus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <hr>


                                                                        <div
                                                                            class="d-flex flex-row justify-content-between align-items-center mt-3">
                                                                            <div>Baby (Without Seat)</div>
                                                                            <div class="d-flex flex-row align-items-center justify-content-between"
                                                                                style="color: #23242C">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_remove_baby_without_seat()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-minus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                                <span class="px-3"
                                                                                    id="flight-baby_without_seats-count">1</span>
                                                                                <input type="hidden"
                                                                                    name="flight_baby_without_seat_count"
                                                                                    id="flight-baby_without_seats-count-input"
                                                                                    value="1">
                                                                                <div style="cursor: pointer;"
                                                                                    onclick="flight_add_baby_without_seat()">
                                                                                    <i style="color: #23242C;font-size:24px;"
                                                                                        class="fas fa-plus-circle fa-2x"
                                                                                        aria-hidden="true"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="w-100 mt-3">
                                                                            <a class="w-100 btn px-5 py-2"
                                                                                data-toggle="collapse"
                                                                                href="#flight-travellers-count"
                                                                                style="background-color:#000941;color:white">
                                                                                Done
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>













                                                            <div style="position: relative"
                                                                class="d-flex justify-content-start">
                                                                <a data-toggle="collapse" href="#flight-class"
                                                                    style="color:#000941" id="flight-class-title">Economy
                                                                    Class<img src="/images-n/icons/arrow-down-2.png">
                                                                </a>
                                                                <div id="flight-class" class="collapse"
                                                                    style="width: 268px;position: absolute;z-index: 1000; top: 30px; right:0px;">
                                                                    <div class="p-4"
                                                                        style="background-color: white;box-shadow: 0px 0px 6px #00000028;">


                                                                        <div
                                                                            class="d-flex flex-column justify-content-between align-items-start mt-3">
                                                                            <div id="economy_class" style="cursor: pointer"
                                                                                onclick="selectFlightClass(0)"><span
                                                                                    id="economy_class_span"
                                                                                    class="pink">Economy
                                                                                    Class</span>
                                                                                <i id="economy_class_checkmark"
                                                                                    class="fas fa-check-square pink"></i>
                                                                            </div>
                                                                            <hr>
                                                                            <div id="business_class" style="cursor: pointer"
                                                                                onclick="selectFlightClass(1)"><span
                                                                                    id="business_class_span">Busniess
                                                                                    Class</span> <i
                                                                                    id="business_class_checkmark"
                                                                                    class="fas fa-check-square pink invisible"></i>
                                                                            </div>
                                                                            <hr>
                                                                            <div id="first_class" style="cursor: pointer"
                                                                                onclick="selectFlightClass(2)"><span
                                                                                    id="first_class_span">First Class</span>
                                                                                <i id="first_class_checkmark"
                                                                                    class="fas fa-check-square pink invisible"></i>
                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <select class="form-control mt-2 mb-2">
                                                            <option>1 Room, 2 Travelers</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-groups">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type='hidden' id='destination1' value='1'>
                                                            <input type="text" class="form-control"
                                                                id="flight_departure_autocomplete" autocomplete="off"
                                                                placeholder="Leaving">
                                                            <input id="flight_departure" type="hidden" value=""
                                                                name="flight_departure">
                                                            <div id="flight-departure-search-result-container"
                                                                class="container invisible"
                                                                style="background-color: white;position: relative;">

                                                                <div id="flight-departure-results" class="p-2"
                                                                    style="position: absolute;top: 10px;z-index: 1000;background-color: white;border:#00000028 solid 1px;box-shadow: 0px 3px 6px #00000028;">

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="flight_destination_autocomplete" autocomplete="off"
                                                                placeholder="Going">

                                                            <input id="flight_destination" type="hidden" value=""
                                                                name="flight_destination">
                                                            <div id="flight-destination-search-result-container"
                                                                class="container invisible"
                                                                style="background-color: white;position: relative;">

                                                                <div id="flight-destination-results" class="p-2"
                                                                    style="position: absolute;top: 10px;z-index: 1000;background-color: white;border:#00000028 solid 1px;box-shadow: 0px 3px 6px #00000028;">

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input id="departure_date" autocomplete="off" name="departure_date"
                                                        class="datepicker" value="Departing">
                                                </div>
                                                <div class="col-lg-3" id="flight_return_div">
                                                    <input id="return_date" autocomplete="off" name="return_date"
                                                        class="datepicker" placeholder="Returning">
                                                </div>


                                            </div>
                                            <div id="other_destinations" class="m-0 p-0">
                                            </div>


                                            <div id="add_another_flight"
                                                class="col-lg-12 invisible d-flex flex-row justify-content-end"
                                                id="flight_return_div">
                                                <button class="btn btn-primary btn-lg btn-block find-btn mt-4"
                                                    type="button" onclick="addDestination()" style="width: 400px;">Add a
                                                    destination
                                                </button>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button class="btn btn-primary btn-lg btn-block find-btn mt-4"
                                                        type="submit">Find
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="tab-body">
                                        <form class="clearfix">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="disflex">
                                                        <ul class="tags">
                                                            <li class="active"><a href="#">Rental Trips</a></li>
                                                            <li><a href="#">Airport transportation</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-groups">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="inlineFormInputGroup" placeholder="Pickup">
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="inlineFormInputGroup" placeholder="Destination">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input class="datepicker" id="datepicker-five" value="Pickup Date">
                                                </div>
                                                <div class="col-lg-3">
                                                    <input class="datepicker" id="datepicker-six"
                                                        value="Drop Off Date">
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="input-groups">
                                                        <div class="input-group mt-4">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="inlineFormInputGroup" placeholder="Pickup">
                                                        </div>
                                                        <div class="input-group mt-4">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="inlineFormInputGroup" placeholder="Destination">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="my-checkbox my-checkbox-two">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck11">
                                                            <label class="custom-control-label" for="customCheck11">Include
                                                                AARP member rates <span>Membership is required and verified
                                                                    at pick-up.</span></label>
                                                        </div>
                                                        <select class="form-control mb-0">
                                                            <option>I have a discount code</option>
                                                            <option>I don't have a discount code</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button class="btn btn-primary btn-lg btn-block find-btn mt-4"
                                                        type="submit">Find
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-packages" role="tabpanel"
                                    aria-labelledby="pills-packages-tab">
                                    <div class="tab-body">
                                        <form class="clearfix">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p class="tag-top-text">Choose one or more items to build your
                                                        trip:</p>
                                                    <div class="disflex">
                                                        <ul class="tags tags-two">
                                                            <li class="active"><a href="#">Stay Added</a></li>
                                                            <li><a href="#">Add A Flight</a></li>
                                                            <li><a href="#">Car added</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-groups">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="inlineFormInputGroup" placeholder="Leaving">
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="inlineFormInputGroup" placeholder="Going">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input class="datepicker" id="datepicker-seven" value="Departing">
                                                </div>
                                                <div class="col-lg-3">
                                                    <input class="datepicker" id="datepicker-eight" value="Returning">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <button class="btn btn-primary btn-lg btn-block find-btn mt-4"
                                                        type="submit">Find
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Start -->
    <section class="features-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">


                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="features-col">
                        <div class="features-icon">
                            <img src="images-n/icons/1.png" alt="" class="img-fluid">
                        </div>
                        <h4>Best Price</h4>
                        <p>Trippbo is leading tour operator company which assures you only the best prices</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="features-col">
                        <div class="features-icon">
                            <img src="images-n/icons/2.png" alt="" class="img-fluid">
                        </div>
                        <h4>Hassle Free</h4>
                        <p>Trippbo make sure to provide you a hassle free booing platform</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="features-col">
                        <div class="features-icon">
                            <img src="images-n/icons/3.png" alt="" class="img-fluid">
                        </div>
                        <h4>SECURE</h4>
                        <p>we make sure to keep your private information as confidential!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="features-col">
                        <div class="features-icon">
                            <img src="images-n/icons/4.png" alt="" class="img-fluid">
                        </div>
                        <h4>Support</h4>
                        <p>We are Available 27/7 from Monday to Friday</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Home About Start -->
    <section class="home-about-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Learn More About US</h3>
                    <div class="home-about-cols">
                        <div class="home-about-img dis-block-991">
                            <img src="images-n/about/1.jpg" alt="">
                        </div>
                        <div class="home-about-content">
                            <h2>Fund My Trips</h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                accusam et justo duo dolores et</p>
                            <a class="btn btn-primary" href="{{ route('how-it-works-fund-my-trip') }}" role="button">Find
                                More</a>
                        </div>
                        <div class="home-about-img dis-none-991">
                            <img src="images-n/about/1.jpg" alt="">
                        </div>
                    </div>
                    <div class="home-about-cols home-about-cols-second">
                        <div class="home-about-img">
                            <img src="images-n/about/2.jpg" alt="">
                        </div>
                        <div class="home-about-content">
                            <h2>Fund My Trips <span>SOLO</span></h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                accusam et justo duo dolores et </p>
                            <a class="btn btn-primary" href="{{ route('how-it-works-solo') }}" role="button">Find
                                More</a>
                        </div>
                    </div>
                    <div class="home-about-cols">
                        <div class="home-about-img dis-block-991">
                            <img src="images-n/about/3.jpg" alt="">
                        </div>
                        <div class="home-about-content">
                            <h2>Tickets Lottery</h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                accusam et justo duo dolores et</p>
                            <a class="btn btn-primary" href="{{ route('how-it-works-tickets-lottery') }}"
                                role="button">Find
                                More</a>
                        </div>
                        <div class="home-about-img dis-none-991">
                            <img src="images-n/about/3.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Countries Start -->
    <section class="countries-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Popular Countries</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="countries-col">
                        <div class="countries-img">
                            <img src="images/countries/1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="countries-col-text">
                            <h4>Romania</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="countries-col">
                        <div class="countries-img">
                            <img src="images/countries/2.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="countries-col-text">
                            <h4>UAE</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="countries-col">
                        <div class="countries-img">
                            <img src="images/countries/3.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="countries-col-text">
                            <h4>Europe</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="countries-col">
                        <div class="countries-img">
                            <img src="images/countries/4.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="countries-col-text">
                            <h4>Italy</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="countries-col">
                        <div class="countries-img">
                            <img src="images/countries/5.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="countries-col-text">
                            <h4>Asia</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="countries-col">
                        <div class="countries-img">
                            <img src="images/countries/6.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="countries-col-text">
                            <h4>Peshawer</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="countries-col">
                        <div class="countries-img">
                            <img src="images/countries/7.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="countries-col-text">
                            <h4>Gilgit</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="countries-col">
                        <div class="countries-img">
                            <img src="images/countries/8.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="countries-col-text">
                            <h4>Bejing</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Start -->

    <a href="#" id="back-to-top" title="Back to top"><img src="images-n/icons/top-arrow.png" alt=""></a>



    {{-- <div class="container-fluid p-0 m-0 main-homepage">
         <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
             <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                 <div class="d-flex flex-column justify-content-center align-items-center">
                     <div style="background-color: #dbeeff;padding:20px;border-radius: 10px;">

                         <div class="text-left" style="width: 100%;">
                             <div class="text-center" style="width: 100%;">
                                 <p class="text-center"
                                    style="background-color: #00cbff;color:white;padding:5px;border-radius: 5px;font-size:1.7rem;">
                                     Fund My Trip
                                 </p>
                             </div>
                             <form style="width: 100%">
                                 <p style="font-size:1rem">
                                 <span
                                     style="background-color: #00cbff; border-radius: 50%;padding:5px 10px;color:white;">1</span>
                                     <span
                                         style="background-color: white;padding:7px;border-radius: 2px;line-height: 250%;">Select a destination the you would like to visit, along with a check-in and check-out date.</span>
                                 </p>


                                 <div class="d-flex flex-row justify-content-center align-items-center"
                                      style="border-bottom: solid white 3px;width: 100%;">
                                     <div class="text-center" style="width: 100%">


                                         <div
                                             style="width: 100%"
                                             class="d-flex text-center flex-row justify-content-around align-items-center"
                                         >

                                             <div style="width: 100%"
                                                  class="d-flex flex-row align-items-center justify-content-center">
                                                 <div style="font-size: 1.5rem;color:#474747;width: 100%">


                                                     <div class="row">
                                                         <div class="col-lg-6 text-left">
                                                             I want to travel from:
                                                         </div>
                                                         <div class="col-lg-6 text-left">
                                                             <input class="form-control"
                                                                    style="background-color: white;font-size:12px;"
                                                                    id="myInput" type="text"
                                                                    name="myCountry"
                                                                    placeholder="City, Country, Airport...">

                                                         </div>
                                                     </div>


                                                     <div class="row">

                                                         <div class="col-lg-6 text-left"> To:</div>

                                                         <div class="col-lg-6 text-left">

                                                             <input class="form-control"
                                                                    style="background-color: white;font-size:12px"
                                                                    id="myInput" type="text"
                                                                    name="myCountry"
                                                                    placeholder="City, Country, Airport...">

                                                         </div>
                                                     </div>

                                                 </div>

                                             </div>
                                         </div>


                                     </div>

                                 </div>
                                 <div style="border-bottom: white solid 3px">
                                     <p style="font-size:1rem">
                                 <span
                                     style="background-color: #00cbff; border-radius: 50%;padding:5px 10px;color:white;">2</span>
                                         <span
                                             style="background-color: white;padding:7px;border-radius: 2px;line-height: 250%;">I would like to travel </span>
                                     </p>


                                     <div class="d-flex flex-row justify-content-center align-items-center">
                                         <div class="text-center">


                                             <div
                                                 class="d-flex text-center flex-row justify-content-around align-items-center"
                                             >

                                                 <div class="d-flex flex-row align-items-center justify-content-center">
                                                     <div style="padding: 10px;font-size: 1.5rem;color:#474747">


                                                     </div>
                                                     <div style="padding: 10px;" class="text-left">

                                                         <p style="margin-bottom: 25px">
                                                             <input type="radio" id="test1" name="radio-group" checked>
                                                             <label for="test1">

                                                             <span
                                                                 style="background-color: #00cbff;color:white;padding:15px;border-radius: 3px;">    <i
                                                                     class="fas fa-male  "></i></span>

                                                                 <span
                                                                     style="background-color: #00cbff;color:white;padding:15px;border-radius: 3px;">By Myself</span>

                                                             </label>
                                                         </p>
                                                         <p>
                                                             <input type="radio" id="test2" name="radio-group">
                                                             <label for="test2">

                                                             <span
                                                                 style="background-color: #00cbff;color:white;padding:15px;border-radius: 3px;">  <i
                                                                     class="fas fa-male  "></i>  <i
                                                                     class="fas fa-male  "></i></span>

                                                                 <span
                                                                     style="background-color: #00cbff;color:white;padding:15px;border-radius: 3px;">with a partner</span>

                                                             </label>
                                                         </p>


                                                     </div>
                                                 </div>
                                             </div>


                                         </div>

                                     </div>
                                 </div>
                                 <div class="mt-3" style="border-bottom: white solid 3px">
                                     <p style="font-size:1rem">
                                 <span
                                     style="background-color: #00cbff; border-radius: 50%;padding:5px 10px;color:white;">3</span>
                                         <span
                                             style="background-color: white;padding:7px;border-radius: 2px;line-height: 250%;">I want to book the following services:</span>
                                     </p>


                                     <div class="d-flex flex-row justify-content-center align-items-center">
                                         <div class="text-center" style="">


                                             <div
                                                 class="d-flex text-center flex-row justify-content-around align-items-center"
                                             >

                                                 <div class="d-flex flex-row align-items-center justify-content-center">

                                                     <div style="padding: 10px;"
                                                          class="text-center d-flex flex-column justify-content-start align-items-start">


                                                         <div class="form-check m-2">
                                                             <input class="form-check-input" type="checkbox" value=""
                                                                    id="flexCheckDefault" checked>
                                                             <label class="form-check-label" for="flexCheckDefault">
                                                                 <span
                                                                     style="padding:5px;background-color: #00cbff;color:white;border-radius: 5px;">Acommodation</span>
                                                             </label>
                                                         </div>


                                                         <div class="form-check m-2">
                                                             <input class="form-check-input" type="checkbox" value=""
                                                                    id="flexCheckChecked" checked>
                                                             <label class="form-check-label" for="flexCheckChecked">
                                                                 <span
                                                                     style="padding:5px;background-color: #00cbff;color:white;border-radius: 5px;">Flight</span>
                                                             </label>
                                                         </div>


                                                         <div class="form-check m-2">
                                                             <input class="form-check-input" type="checkbox" value=""
                                                                    id="flexCheckChecked2">
                                                             <label class="form-check-label" for="flexCheckChecked2">
                                                                 <span
                                                                     style="padding:5px;background-color: #00cbff;color:white;border-radius: 5px;">Car</span>
                                                             </label>
                                                         </div>


                                                     </div>
                                                 </div>
                                             </div>


                                         </div>

                                     </div>
                                 </div>


                                 <div class="mt-3" style="border-bottom: white solid 3px">
                                     <p style="font-size:1rem">
                                 <span
                                     style="background-color: #00cbff; border-radius: 50%;padding:5px 10px;color:white;">4</span>
                                         <span
                                             style="background-color: white;padding:7px;border-radius: 2px;line-height: 250%;">Let's get started... </span>
                                     </p>


                                     <div class="d-flex flex-row justify-content-center align-items-center">
                                         <div class="text-center" style="">


                                             <div
                                                 class="d-flex text-center flex-row justify-content-around align-items-center"
                                             >

                                                 <div class="d-flex flex-row align-items-center justify-content-center">

                                                     <input class="form-control p-lg-2" type="submit" value="Search"/>
                                                 </div>
                                             </div>


                                         </div>

                                     </div>
                                 </div>
                             </form>
                         </div>

                     </div>
                 </div>

             </div>
             <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                 <!-- Button trigger modal -->


                 <!-- Modal -->

             </div>
             <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                 Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat
                 veniam.
                 Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure
                 adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat.
                 Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit.
                 Exercitation
                 mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim
                 ullamco ad duis occaecat ex.
             </div>
             <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                 Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat
                 veniam.
                 Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure
                 adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat.
                 Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit.
                 Exercitation
                 mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim
                 ullamco ad duis occaecat ex.
             </div>
         </div>
     </div> --}}




@endsection
@section('scripts')

    <script>
        let numberOfDestinations = 1;

        function switchMode(mode) {
            if (mode === 1) {
                $(".flight-element").removeClass('active');
                $("#oneway").addClass('active');
                $("#flight_return_div").addClass('invisible');
                $("#multi_city").removeClass('active');
                $("#add_another_flight").addClass('invisible');
                $("#other_destinations").addClass('invisible')
            } else if (mode === 0) {
                $("#oneway").removeClass('active');
                $("#roundtrip").addClass('active');
                $("#multi_city").removeClass('active');
                $("#flight_return_div").removeClass('invisible');
                $("#add_another_flight").addClass('invisible');
                $("#other_destinations").addClass('invisible')
            } else if (mode === 2) {
                $("#oneway").removeClass('active');

                $("#roundtrip").removeClass('active');
                $("#multi_city").addClass('active');
                $("#flight_return_div").addClass('invisible');
                $("#add_another_flight").removeClass('invisible');
                $("#other_destinations").removeClass('invisible')
            }


        }

        function addDestination() {
            numberOfDestinations += 1;
            $("#other_destinations").append(`<div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-groups">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type='hidden' id='destination${numberOfDestinations}' value='${numberOfDestinations}' >
                                                            <input type="text" class="form-control"
                                                                id="flight_departure_autocomplete${numberOfDestinations}" autocomplete="off"
                                                                placeholder="Leaving">
                                                            <input id="flight_departure${numberOfDestinations}" type="hidden" value=""
                                                                name="flight_departure">
                                                            <div id="flight-departure-search-result-container${numberOfDestinations}"
                                                                class="container invisible"
                                                                style="background-color: white;position: relative;">

                                                                <div id="flight-departure-results${numberOfDestinations}" class="p-2"
                                                                    style="position: absolute;top: 10px;z-index: 1000;background-color: white;border:#00000028 solid 1px;box-shadow: 0px 3px 6px #00000028;">

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div  class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="images-n/icons/location.png" alt="">
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                id="flight_destination_autocomplete${numberOfDestinations}" autocomplete="off"
                                                                placeholder="Going">

                                                            <input id="flight_destination${numberOfDestinations}" type="hidden" value=""
                                                                name="flight_destination">
                                                            <div id="flight-destination-search-result-container${numberOfDestinations}"
                                                                class="container invisible"
                                                                style="background-color: white;position: relative;">

                                                                <div id="flight-destination-results${numberOfDestinations}" class="p-2"
                                                                    style="position: absolute;top: 10px;z-index: 1000;background-color: white;border:#00000028 solid 1px;box-shadow: 0px 3px 6px #00000028;">

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input id="departure_date${numberOfDestinations}" autocomplete="off" name="departure_date"
                                                        class="datepicker" value="Departing">
                                                </div>



                                            </div>`)
            $("#departure_date" + numberOfDestinations).datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',

            })
            register_flight_departure_autocomplete(numberOfDestinations);
            register_flight_return_autocomplete(numberOfDestinations);

        }
        CancelToken = axios.CancelToken;


        var cancel = function() {

        }




        $("#hotel_autocomplete").keyup(async function() {
            if ($("#hotel_autocomplete").val() !== "") {
                $("#hotel_destination").val($("#hotel_autocomplete").val())

                let result = await fetchData($("#hotel_autocomplete").val());
                if (result !== false) {
                    addResults(result, document.getElementById("hotel-search-result-container"), document
                        .getElementById("results"), "hotel")

                } else {
                    resetAutocomplete(document.getElementById("results"), document.getElementById(
                        "hotel-search-result-container"), document.getElementById("hotel_destination"))
                }
            } else {
                cancelCurrentRequests()
                resetAutocomplete(document.getElementById("results"), document.getElementById(
                    "hotel-search-result-container"), document.getElementById("hotel_destination"))


            }


        });


        function register_flight_departure_autocomplete(number) {
            $("#flight_departure_autocomplete" + number).keyup(async function() {
                if ($("#flight_departure_autocomplete" + number).val() !== "") {
                    $("#flight_departure" + number).val($("#flight_departure_autocomplete" + number).val())

                    let result = await fetchData($("#flight_departure_autocomplete" + number).val(), true);
                    if (result !== false) {
                        addResults(result, document.getElementById("flight-departure-search-result-container" +
                                number),
                            document.getElementById("flight-departure-results" + number),
                            "flight_departure", number)

                    } else {
                        resetAutocomplete(document.getElementById("flight-departure-results" + number), document
                            .getElementById("flight-departure-search-result-container" + number), document
                            .getElementById("flight_departure" + number))
                    }
                } else {
                    cancelCurrentRequests()
                    resetAutocomplete(document.getElementById("flight-departure-results" + number), document
                        .getElementById(
                            "flight-departure-search-result-container" + number), document.getElementById(
                            "flight_departure" + number))


                }


            });
        }

        function register_flight_return_autocomplete(number) {
            $("#flight_destination_autocomplete" + number).keyup(async function() {
                if ($("#flight_destination_autocomplete" + number).val() !== "") {
                    $("#flight_destination" + number).val($("#flight_destination_autocomplete" + number).val())
                    console.log('worked')
                    let result = await fetchData($("#flight_destination_autocomplete" + number).val(), true);
                    if (result !== false) {
                        addResults(result, document.getElementById(
                                "flight-destination-search-result-container" + number),
                            document.getElementById("flight-destination-results" + number),
                            "flight_destination", $("#destination" + number).val() == 1 ? '' : $(
                                "#destination" + number).val())

                    } else {
                        resetAutocomplete(document.getElementById("flight-destination-results" + number),
                            document
                            .getElementById("flight-destination-search-result-container" + number), document
                            .getElementById("flight_destination" + number))
                    }
                } else {
                    cancelCurrentRequests()
                    resetAutocomplete(document.getElementById("flight-destination-results" + number), document
                        .getElementById("flight-destination-search-result-container" + number), document
                        .getElementById(
                            "flight_destination" + number))


                }


            });
        }

        register_flight_departure_autocomplete('')
        register_flight_return_autocomplete('')




        function cancelCurrentRequests() {
            if (typeof cancel !== "undefined" && typeof cancel !== "null") {
                cancel()

            }
        }

        function submitHotelForm() {
            $("#hotel_submit").html("Loading Results...");
            $("#hotel_submit").prop("disabled", true)
            $("#hotel_form").submit();
        }

        async function fetchData(keyword, airportOnly = false) {

            let error = false;
            cancelCurrentRequests();
            url = '/autocomplete/'
            if (airportOnly == true) {
                url = '/autocompleteAirport/'
            }
            const resp = await axios.get(url + keyword, {
                cancelToken: new CancelToken(function executor(c) {
                    // An executor function receives a cancel function as a parameter
                    cancel = c;

                })

            }).catch(function(thrown) {
                error = true;

                if (axios.isCancel(thrown)) {

                } else {

                    // handle error
                }
            });
            if (error == false) {
                if (resp.data.length > 0) {
                    return resp.data;
                } else {

                    /*   resetAutocomplete()*/
                    return false;
                }


            } else {
                return false;
            }

        }

        function resetAutocomplete(results_container, search_result_container, value_input) {
            $(results_container).empty();

            if ($(search_result_container).hasClass('invisible') == false) {
                $(search_result_container).addClass("invisible");
            }
            //    $(value_input).val('')
        }

        function addResults(data, container, results_container, type, number = '') {

            if ($(container).hasClass("invisible") == true) {
                $(container).removeClass("invisible");
            }

            $(results_container).empty();


            Object.keys(data).forEach(key => {
                $(results_container).append(
                    `<div onclick="selectResult('${data[key].iataCode}', this, '${type}', '${number}')" class='autocomplete-item d-flex flex-row justify-content-start align-items-center'><div class='mr-3'><img src='{{ asset('images-n/location.svg') }}' width='20px' height='20px' /></div><div><div  style='font-size:12px'> ${data[key].address.countryName} </div> <div style="font-size:10px"  style="background-color: white;border: none;font-size:15px;cursor:pointer; ">  ${data[key].address.cityName} - ${data[key].name} </div></div></div> <hr> `
                )

            });
        }

        function selectResult(selectedValue, element, type, number = '') {

            if (type == "hotel") {
                $("#hotel_destination").val(selectedValue)
                $("#hotel_autocomplete").val($(element).text());
                if ($("#hotel-search-result-container").hasClass('invisible') == false) {
                    $("#hotel-search-result-container").addClass("invisible");
                }
            } else if (type == "flight_departure") {
                $("#flight_departure" + number).val(selectedValue)
                $("#flight_departure_autocomplete" + number).val($(element).text());
                if ($("#flight-departure-search-result-container" + number).hasClass('invisible') == false) {
                    $("#flight-departure-search-result-container" + number).addClass("invisible");
                }
            } else if (type == 'flight_destination') {
                $("#flight_destination" + number).val(selectedValue)
                $("#flight_destination_autocomplete" + number).val($(element).text());
                if ($("#flight-destination-search-result-container" + number).hasClass('invisible') == false) {
                    $("#flight-destination-search-result-container" + number).addClass("invisible");
                }
            }


            //   $("#hotel_autocomplete").val()
        }
    </script>
    <script>
        //   document.getElementById('startdate').value = new Date().toDateInputValue();
        //    date = new Date();
        //     date.setDate(date.getDate() + 7);
        //     document.getElementById('returndate').value = date.toDateInputValue();
    </script>

    <script>
        let flight_adult_count = 1;
        let flight_student_count = 0;
        let flight_youth_count = 0;
        let flight_child_count = 0;
        let flight_baby_own_seat_count = 0;
        let flight_baby_without_seat_count = 0;


        function flight_add_adult() {

            if (flight_adult_count < 9) {
                flight_adult_count += 1;
                updateFlightsDOM()
            }


        }

        function flight_remove_adult() {
            if (flight_adult_count > 0) {
                flight_adult_count -= 1;
                updateFlightsDOM()
            }
        }

        function flight_add_student() {

            if (flight_student_count < 9) {
                flight_student_count += 1;
                updateFlightsDOM()
            }


        }

        function flight_remove_student() {
            if (flight_student_count > 0) {
                flight_student_count -= 1;
                updateFlightsDOM()
            }
        }

        function flight_add_youth() {

            if (flight_youth_count < 9) {
                flight_youth_count += 1;
                updateFlightsDOM()
            }


        }

        function flight_remove_youth() {
            if (flight_youth_count > 0) {
                flight_youth_count -= 1;
                updateFlightsDOM()
            }
        }


        function flight_add_child() {

            if (flight_child_count < 9) {
                flight_child_count += 1;
                updateFlightsDOM()
            }


        }

        function flight_remove_child() {
            if (flight_child_count > 0) {
                flight_child_count -= 1;
                updateFlightsDOM()
            }
        }

        function flight_add_baby_own_seat() {

            if (flight_baby_own_seat_count < 9) {
                flight_baby_own_seat_count += 1;
                updateFlightsDOM()
            }


        }

        function flight_remove_baby_own_seat() {
            if (flight_baby_own_seat_count > 0) {
                flight_baby_own_seat_count -= 1;
                updateFlightsDOM()
            }
        }

        function flight_add_baby_without_seat() {

            if (flight_baby_without_seat_count < 9) {
                flight_baby_without_seat_count += 1;
                updateFlightsDOM()
            }


        }

        function flight_remove_baby_without_seat() {
            if (flight_baby_without_seat_count > 0) {
                flight_baby_without_seat_count -= 1;
                updateFlightsDOM()
            }
        }

        function updateFlightsDOM() {
            $("#flight-adults-count-input").val(flight_adult_count);
            $("#flight-adults-count").text(flight_adult_count);

            $("#flight-students-count-input").val(flight_student_count);
            $("#flight-students-count").text(flight_student_count);

            $("#flight-youths-count-input").val(flight_youth_count);
            $("#flight-youths-count").text(flight_youth_count);

            $("#flight-childs-count-input").val(flight_child_count);
            $("#flight-childs-count").text(flight_child_count);


            $("#flight-baby_own_seats-count-input").val(flight_baby_own_seat_count);
            $("#flight-baby_own_seats-count").text(flight_baby_own_seat_count);

            $("#flight-baby_without_seats-count-input").val(flight_baby_without_seat_count);
            $("#flight-baby_without_seats-count").text(flight_baby_without_seat_count);



            $("#flight-travelers-count-title").html(
                `${flight_adult_count} Adults <img src="/images-n/icons/arrow-down-2.png" > `)
        }


        updateFlightsDOM()
    </script>



    <script>
        let current_flight_class = 0;

        function selectFlightClass(flight_class) {
            if (flight_class == 0) {
                $("#economy_class_checkmark").removeClass('invisible')
                $("#first_class_checkmark").addClass('invisible')
                $("#business_class_checkmark").addClass('invisible')
                $("#economy_class_span").addClass('pink')
                $("#first_class_span").removeClass('pink')
                $("#business_class_span").removeClass('pink')
                $("#flight-class-title").html('Economy Class')
                $('#flight-class').collapse('hide')
            } else if (flight_class == 1) {
                $("#economy_class_checkmark").addClass('invisible')
                $("#first_class_checkmark").addClass('invisible')
                $("#business_class_checkmark").removeClass('invisible')

                $("#economy_class_span").removeClass('pink')
                $("#first_class_span").removeClass('pink')
                $("#business_class_span").addClass('pink')
                $("#flight-class-title").html('Business Class')
                $('#flight-class').collapse('hide')
            } else if (flight_class == 2) {
                $("#economy_class_checkmark").addClass('invisible')
                $("#first_class_checkmark").removeClass('invisible')
                $("#business_class_checkmark").addClass('invisible')

                $("#economy_class_span").removeClass('pink')
                $("#first_class_span").addClass('pink')
                $("#business_class_span").removeClass('pink')
                $("#flight-class-title").html('First Class')
                $('#flight-class').collapse('hide')
            }
        }

        $(document).click(function(event) {
            var $target = $(event.target);
            if (!$target.closest('#flight-class').length &&
                $('#flight-class').is(":visible")) {
                $('#flight-class').collapse('hide')
            }
            if (!$target.closest('#flight-travellers-count').length &&
                $('#flight-travellers-count').is(":visible")) {
                $('#flight-travellers-count').collapse('hide')
            }

        });
    </script>

    <script>
        let adult_count = 1;
        let children_count = 0;
        let rooms_count = 1;

        function hotel_add_adult() {
            if (adult_count < 9) {
                adult_count += 1;
                updateDOM()
            }


        }

        function hotel_remove_adult() {
            if (adult_count > 1) {
                adult_count -= 1;
                updateDOM()
            }
        }

        function hotel_add_child() {
            if (children_count < 9) {
                children_count += 1;
                console.log("added")
                updateDOM()
            }
        }

        function hotel_remove_child() {
            if (children_count > 0) {
                children_count -= 1;
                updateDOM()
            }
        }

        function hotel_remove_room() {
            if (rooms_count > 1) {
                rooms_count -= 1;
                updateDOM()
            }
        }

        function hotel_add_room() {
            if (rooms_count < 9) {
                rooms_count += 1;
                updateDOM()
            }
        }

        function updateDOM() {
            $("#hotel-adults-count-input").val(adult_count);
            $("#hotel-adults-count").text(adult_count);
            $("#hotel-children-count-input").val(children_count);
            $("#hotel-children-count").text(children_count)
            $("#hotel-rooms-count").text(rooms_count)
            $("#hotel-rooms-count-input").val(rooms_count)
            $("#hotel-travelers-count-title").html(
                `${rooms_count} Room, ${adult_count} Adults <img src="/images-n/icons/arrow-down-2.png" > `)
        }


        updateDOM()
    </script>
    <script type="text/javascript">
        // selectpicker
        $(document).ready(function() {

            let date = new Date();
            date.setDate(date.getDate() + 1);

            // Datepicker Active Script
            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',
                minDate: date
            })


            $('#datepicker-two').datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',
                minDate: date
            });
            $('#departure_date').datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',
                minDate: date
            });
            $('#return_date ').datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',
                minDate: date
            });
            $('#datepicker-five').datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome'
            });
            $('#datepicker-six').datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome'
            });
            $('#datepicker-seven').datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome'
            });
            $('#datepicker-eight').datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome'
            });

            // Initialize select2
            $(".seluser").select2();

            // Read selected option
            $('#but_read').click(function() {
                var username = $('.seluser option:selected').text();
                var userid = $('.seluser').val();

                $('#result').html("id : " + userid + ", name : " + username);

            });
        });


        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function() {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }


        // Back To Top
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function() {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function() {
                backToTop();
            });
            $('#back-to-top').on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 1000);
            });
        }
    </script>



@endsection
