@extends('layout')
@section('head')
    <link href="/css-r/home/style.css" rel="stylesheet">

    <style>
        .trippbo-grid-data>div[class^="trippbo-item"]>img {
            object-fit: cover;
        }

        .body-content,
        .body-content * {
            border-radius: 15px !important;
        }

        .active {
            border-radius: 0px !important;
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            background-color: white !important;
            /* background-color: #f8fafc; */
            border-color: #dee2e6 #dee2e6 #f8fafc;
        }

        .image {
            width: 25%;
            padding: 5px;
            cursor: pointer;
        }

        .image_main {
            width: 100%;
            height: 100%;
            cursor: pointer;
            object-fit: cover;
        }

        .loading_visible {
            position: fixed;
            display: none;

        }

        @keyframes loading {
            from {
                bottom: -100px;
            }

            to {
                bottom: 50px;
                ;
            }
        }

        .loading_visible_active {
            display: block;

            animation: loading 0.5s;
            -moz-animation: loading 0.5s;
            -webkit-animation: loading 0.5s;
            bottom: 50px;

        }



    </style>
    <script src="/js/vue-gallery-slideshow.js"></script>
@endsection
@section('content')
    <div id="hotels_subpage_app" class="body-content">
        <div class="modal fade" id="picturesModal" tabindex="-1" role="dialog" aria-labelledby="picturesModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="picturesModalTitle">Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="overflow-y: scroll;max-height:90vh;">
                        <div v-if="hotel.Images" class="row">
                            <img  class="image" v-for="(image, i) in hotel.Images" :src="image" :key="i"
                                @click="index = i">
                            <vue-gallery-slideshow :images="hotel.Images" :index="index" @close="index = null">
                            </vue-gallery-slideshow>
                        </div>
                    </div>
                    {{-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
                </div>
            </div>
        </div>
        <section class="mb-5 pb-5">
            <div class="wrapper">
                <div v-if="!loading" class="breadcrumb_">
                    <ol class="">
                        <li class="breadcrumb-item"><a>Hotel</a></li>
                        <li class="breadcrumb-item active">@{{ hotel . HotelName }}</li>
                    </ol>
                </div>
                <div v-if="loading">
                    <v-app>
                        <div class="row">
                            <div class="col-3">
                                <v-skeleton-loader type="image">
                                </v-skeleton-loader>
                            </div>
                            <div class="col-3">
                                <v-skeleton-loader type="image">
                                </v-skeleton-loader>
                            </div>
                            <div class="col-3">
                                <v-skeleton-loader type="image">
                                </v-skeleton-loader>
                            </div>
                            <div class="col-3">
                                <v-skeleton-loader type="image">
                                </v-skeleton-loader>
                            </div>
                        </div>


                    </v-app>
                </div>
                <div  v-if="!loading && hotel.Images" class="trippbo-grid-data mb-3 mx-0 owl-carousel">


                    <img  class="image_main" v-for="(image, i) in hotel.Images.slice(0,8)" :src="image" :key="i"
                        @click="index = i">
                    <vue-gallery-slideshow :images="hotel.Images" :index="index" @close="index = null">
                    </vue-gallery-slideshow>


                    {{-- <div v-for="(img, imgIndex) in hotel.Images.slice(0,8)" :key="imgIndex"
                        :class="'trippbo-item' + imgIndex +1"><img :src="img" /></div> --}}



                    <div class="trippbo-btn"><button role="button" data-target="#picturesModal" data-toggle="modal"
                            class="btn gilroy-semi rounded-0 px-4 py-2"> <span class="text-white font-14">View All
                                @{{ hotel . Images . length }} images</span></button></div>
                </div>
                <div class="row section-2 p-0 mb-3 mx-0">
                    <div class="col p-0">
                        <div class="d-flex flex-row-responsive justify-content-between mb-3 p-3">
                            <div class="p-2">
                                <h2 class="gilroy-semi text-23242c font-34 line-height-47px">@{{ hotel . HotelName }}</h2>
                                <div class="d-flex align-items-center">

                                    <div class="font-12"><i v-for="n in hotel.StarRating"
                                            class="fa fa-star yellow"></i>

                                    </div>
                                </div>

                                {{-- <div class="d-flex align-items-center">
                                <img class="icon-18px mr-1" src="/image/location.png" />
                                <span class="gilroy-semi font-16 line-height-21px text-23242c">Dubai</span>
                            </div> --}}
                            </div>
                            <div class="p-2">
                                {{-- <div class="d-flex">
                                    <div class="d-flex align-items-center pr-2">
                                        <img class="icon-24px mr-1" src="/image/share.png" />
                                        <span class="gilroy-semi font-16 line-height-24px text-23242c">Share</span>
                                    </div>
                                    <div class="d-flex align-items-center pr-2">
                                        <img class="icon-24px mr-1" src="/image/save.png" />
                                        <span class="gilroy-semi font-16 line-height-24px text-23242c">Save</span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="row mx-0">
                            <div class="col-sm-12 col-lg-8">
                                <div class="nav-title mb-3" v-if="!loading">
                                    <ul class="nav nav-tabs pl-3 gilroy-semi">
                                        <li class="nav-item">
                                            <a class="nav-link active px-2" data-toggle="tab" href="#menu1">About</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link px-2" data-toggle="tab" href="#menu2">Amenities</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link px-2" data-toggle="tab" href="#menu3">Things to Know</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link px-2" data-toggle="tab" href="#menu4">Review</a>
                                        </li> --}}
                                    </ul>
                                </div>

                                <div class="nav-body">
                                    <div class="tab-content">

                                        <div id="menu1" class="container tab-pane active">
                                            <h4 v-if="!loading" class="p-2 m-0">About this property</h4>
                                            <p class="gilroy-regular font-12 line-height-19px px-2"
                                                v-html="hotel.Description"></p>
                                            <div v-if="loading">
                                                <v-app>
                                                    <v-skeleton-loader type="list-item-three-line"></v-skeleton-loader>
                                                </v-app>
                                            </div>
                                            <div class="d-flex">




                                                {{-- <div><img class="icon-26px mr-1" src="/image/house.png" /></div>
                                                <div class="p-2">
                                                    <h4 class="gilroy-medium font-20 line-height-30px text-23242c">Room
                                                        Available</h4>
                                                    <p class="gilroy-regular font-12 grey line-height-19px m-0">Single,
                                                        Standard and Double</p>
                                                </div> --}}
                                            </div>
                                            <div class="d-flex">
                                                {{-- <div><img class="icon-26px mr-1" src="/image/clean.png" /></div>
                                                <div class="p-2">
                                                    <h4 class="gilroy-medium font-20 line-height-30px text-23242c">Enhanced
                                                        Clean</h4>
                                                    <p class="gilroy-regular font-12 grey line-height-19px m-0">Disinfectant
                                                        is used to clean the property<br />High-touch surfaces are cleaned
                                                        and disinfected<br />Follows industry cleaning and disinfection
                                                        practices of Safe Travels (WTTC - Global)</p>
                                                </div> --}}
                                            </div>
                                            <div class="d-flex mb-2">

                                                <div v-if="!loading" class="p-2">
                                                    <h4 class="gilroy-medium font-20 line-height-30px text-23242c">
                                                        Hotel policy</h4>
                                                    <p class="gilroy-regular font-12 grey line-height-19px m-0" v-html="hotel.HotelPolicy">

                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="menu2" class="container tab-pane fade"><br>
                                            <h3>Menu 2</h3>
                                        </div>
                                        <div id="menu3" class="container tab-pane fade"><br>
                                            <h3>Menu 3</h3>
                                        </div>
                                        <div id="menu4" class="container tab-pane fade"><br>
                                            <h3>Menu 4</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="!loading" class="col-sm-12 col-lg-4 pt-5">
                                <div class="trippbo-card p-4">
                                    <div class="d-flex flex-column" style="height: 350px;">
                                        <iframe width="100%" height="100%" style="border:0" loading="lazy" allowfullscreen
                                            :src="'https://www.google.com/maps/embed/v1/place?key=AIzaSyC-UXF45L_ttfT3aecmRQiP-_dHFMfEEpM&q=' + hotel.Address">
                                        </iframe>
                                        {{-- <div class="mb-3">
                                            <div class="gilroy-semi font-18 line-height-28px text-fe2f70"><span>$40<span> /
                                                        <span>$Night<span></div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex">
                                                <div class="pr-2">
                                                    <div class="position-relative inputField-box"><img
                                                            src="/image/policy.png" /><input type="text"
                                                            class="inputField inputField-withicon"
                                                            placeholder="Description" /></div>
                                                </div>
                                                <div class="">
                                                    <div class="position-relative inputField-box"><img
                                                            src="/image/policy.png" /><input type="text"
                                                            class="inputField inputField-withicon"
                                                            placeholder="Description" /></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <div class="position-relative inputField-box">
                                                <img src="/image/user.png" />
                                                <select class="inputField inputField-withicon">
                                                    <option value="1" selected="">Guests</option>
                                                    <option value="2"></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div><button type="button"
                                                class="btn gilroy-medium btn-fe2f70 box-shadow-fe2f70 btn-block">Book</button>
                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 v-if="!loading" class="gilroy-medium font-20 line-height-30px text-23242c mb-3">Choose Your Room</h4>
                <div class="row mx-0">
                    <div v-for="(room, roomIndex) in rooms" :key="roomIndex" class="col-sm-12 col-lg-4">


                        <div class="reserve-card h-100">
                            <div class="d-flex flex-column p-1 h-100">
                                <div class="p-2">
                                    {{-- <img class="figure" src="/image/rectangle-349.png" /> --}}
                                </div>
                                <div class="p-2 d-flex h-100 flex-column h-100 justify-content-between">
                                    <h4 class="gilroy-semi font-16 line-height-24px text-23242c mb-3">
                                        @{{ room . RoomTypeName }} </h4>
                                    <div class="d-flex mb-3">
                                        {{-- <div class="d-flex align-items-center mr-4">
                                            <img class="icon-20px mr-1" src="/image/area.png" />
                                            <span class="gilroy-medium font-12 line-height-19px text-23242c">400 sq
                                                ft</span>
                                        </div>
                                        <div class="d-flex align-items-center mr-4">
                                            <img class="icon-20px mr-1" src="/image/user.png" />
                                            <span class="gilroy-medium font-12 line-height-19px text-23242c">Sleeps
                                                2</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img class="icon-20px mr-1" src="/image/flag.png" />
                                            <span class="gilroy-medium font-12 line-height-19px text-23242c">1 Queen
                                                Bed</span>
                                        </div> --}}
                                    </div>
                                    <div class="mb-3">
                                        {{-- <div class="d-flex align-items-center mr-4">
                                                <img class="icon-20px mr-1" src="/image/parking.png" />
                                                <span
                                                    class="gilroy-medium font-12 line-height-19px text-23242c">Parking</span>
                                            </div> --}}

                                        <p style="font-weight: 900">Amenities</p>
                                        <div v-for="(a, aindex) in room.Amenities" :key="aindex"
                                            class="d-flex align-items-center">
                                            {{-- <img class="icon-20px mr-1" src="/image/wifi.png" /> --}}
                                            <span
                                                class="gilroy-medium font-12 line-height-19px text-23242c">@{{ a }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column mb-3">
                                        <div v-if="room.LastCancellationDate == ''" class="d-flex">
                                            <span class="gilroy-medium font-16 text-fe2f70 mr-2">Non
                                                refundable</span> <img class="icon-24px" src="/image/info.png" />
                                        </div>
                                        <div v-if="room.LastCancellationDate !== ''" class="d-flex">
                                            <span class="gilroy-medium font-16 text-fe2f70 mr-2">Free Cancellation
                                            </span> <img class="icon-24px" src="/image/info.png" />
                                        </div>
                                        <div v-if="room.LastCancellationDate !== ''"><span
                                                class="gilroy-regular font-12 text-23242c mr-2">
                                                Before @{{ room . LastCancellationDate }}
                                            </span></div>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <div><span class="gilroy-medium font-16 text-000941 mr-2">See more
                                                Details</span> <img class="icon-20px" src="/image/arrow-right.png" />
                                        </div>
                                    </div> --}}
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div v-on:click="reserveHotelRoom(room)"><button :disabled="loadingCheckout"
                                                class="btn btn-fe2f70 btn-block rounded-right-lg">Book</button></div>
                                        <div>
                                            <div class="d-flex flex-column">
                                                <span
                                                    class="gilroy-medium font-21 line-height-28px text-000941">@{{ room . Price }}
                                                    @{{ room . PriceCurrency }}
                                                    for @{{ numberOfNights }} Night(s)</span>
                                                <span class="gilroy-medium font-12 line-height-16px text-23242c">Includes
                                                    taxes & fees</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div v-if="!loading" class="row section-2 mb-3 pt-3 mx-0">

                    <div class="col-12 line-height-1-5">
                        <div class="font-weight-bold font-16">Hotel Facilities</div>

                    </div>

                    <div class="col-12">

                        <div>
                            <div class="d-flex flex-column" style="flex-wrap: wrap;max-height:500px;">
                                <div class="px-3" style="font-size:12px;" v-for="(facility, facilityIndex) in hotel.HotelFacilities"
                                    :key="facilityIndex"><i class="fas fa-circle"></i> @{{ facility }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row section-2 mb-3 pt-3 mx-0">
                    <div class="col-12 line-height-1-5">
                        <div class="font-weight-bold font-16">Reviews</div>
                        <div class="font-12"><i class="fa fa-star yellow"></i> 5.0 (8 reviews)</div>
                    </div>
                    <div class="col-12 line-height-2 ">
                        <div class="row pt-3">
                            <div class="col-sm-12 col-md-4 pb-4 pr-5">
                                <div class="row">
                                    <div class="col-4 font-14 gilroy-medium pr-1">Cleanliness</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-12 px-1">5.0</div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-14 gilroy-medium pr-1">align-middle</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress align-middle">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-12 px-1">5.0</div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-14 gilroy-medium pr-1">Check-in</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress align-middle">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-12 px-1">5.0</div>
                                </div>
                                <div class="row reivew-block">
                                    <div class="col-12 d-flex flex-row">
                                        <div>
                                            <img src="/image/avatar1.png" width="55" height="55" />
                                        </div>
                                        <div class="pl-3 line-height-1-5 pt-2">
                                            <div class="blue gilroy-semi font-18">Emony</div>
                                            <div class="grey font-10 gilroy-medium">20 April 2021</div>
                                        </div>
                                    </div>
                                    <div class="col-12 line-height-1-2 font-12 pt-2">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
                                        eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                        takimata sanctus est Lorem ipsum dolor sit amet.
                                    </div>
                                </div>
                                <div class="row reivew-block">
                                    <div class="col-12 d-flex flex-row">
                                        <div>
                                            <img src="/image/avatar1.png" width="55" height="55" />
                                        </div>
                                        <div class="pl-3 line-height-1-5 pt-2">
                                            <div class="blue gilroy-semi font-18">Emony</div>
                                            <div class="grey font-10 gilroy-medium">20 April 2021</div>
                                        </div>
                                    </div>
                                    <div class="col-12 line-height-1-2 font-12 pt-2">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
                                        eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                        takimata sanctus est Lorem ipsum dolor sit amet.
                                    </div>
                                </div>
                                <div class="row reivew-block">
                                    <div class="col">
                                        <button type="button" class="btn" data-toggle="modal"
                                            data-target="#myModal">View All</button>
                                    </div>
                                </div>
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content rounded-0">
                                            <!-- Modal Header -->
                                            <div class="modal-header border-0">
                                                <h4 class="modal-title gilroy-medium font-18 text-1f2223">Your payment
                                                    options</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="bg-fafafa mb-3 p-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mr-2"><img class="icon-60px mr-2"
                                                                src="/image/calender.png" /></div>
                                                        <div class="d-flex">
                                                            <div class="d-flex flex-column">
                                                                <span class="gilroy-semi font-16 text-1f2223">Free
                                                                    Cancelation</span>
                                                                <span class="gilroy-regular font-12 text-1f2223">You can
                                                                    change or cancel this stay if plans change. Because
                                                                    flexibility matters</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 p-3">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h4 class="gilroy-semi font-20 text-1f2223">Pay Now</h4>
                                                            <ul class="gilroy-regular font-16 pl-3">
                                                                <li>More ways to pay: use Debit/Credit card or PayPal</li>
                                                                <li>You can use a valid Expedia coupon</li>
                                                            </ul>
                                                            <div class="w-75"><button type="button"
                                                                    class="btn btn-fe2f70 btn-block">Pay Now</button></div>
                                                        </div>
                                                        <div>
                                                            <h4
                                                                class="gilroy-semi font-24 text-align-right text-fe2f70 mb-3">
                                                                $105</h4>
                                                            <div
                                                                class="gilroy-regular font-12 text-1f2223 text-capitalize text-align-right opacity-0-5">
                                                                per night<br />$128 total<br />Includes taxes & fees</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="mb-3 p-3">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h4 class="gilroy-semi font-20 text-1f2223">Pay Now</h4>
                                                            <ul class="gilroy-regular font-16 pl-3">
                                                                <li>More ways to pay: use Debit/Credit card or PayPal</li>
                                                                <li>You can use a valid Expedia coupon</li>
                                                            </ul>
                                                            <div class="w-75"><button type="button"
                                                                    class="btn btn-fe2f70 btn-block">Pay Now</button></div>
                                                        </div>
                                                        <div>
                                                            <h4
                                                                class="gilroy-semi font-24 text-align-right text-fe2f70 mb-3">
                                                                $105</h4>
                                                            <div
                                                                class="gilroy-regular font-12 text-1f2223 text-capitalize text-align-right opacity-0-5">
                                                                per night<br />$128 total<br />Includes taxes & fees</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 pb-4 pr-5">
                                <div class="row">
                                    <div class="col-4 font-14 gilroy-medium pr-1">Cleanliness</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-12 px-1">5.0</div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-14 gilroy-medium pr-1">align-middle</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress align-middle">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-12 px-1">5.0</div>
                                </div>
                                <div class="row">
                                    <div class="col-4 font-14 gilroy-medium pr-1">Check-in</div>
                                    <div class="col-5 review-progress px-1">
                                        <div class="progress align-middle">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 font-12 px-1">5.0</div>
                                </div>
                                <div class="row reivew-block">
                                    <div class="col-12 d-flex flex-row">
                                        <div>
                                            <img src="/image/avatar1.png" width="55" height="55" />
                                        </div>
                                        <div class="pl-3 line-height-1-5 pt-2">
                                            <div class="blue gilroy-semi font-18">Emony</div>
                                            <div class="grey font-10 gilroy-medium">20 April 2021</div>
                                        </div>
                                    </div>
                                    <div class="col-12 line-height-1-2 font-12 pt-2">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
                                        eos et accusam et justo duo dolores et ea rebum. Stet clita kasd clita kasd kasd
                                    </div>
                                </div>
                                <div class="row reivew-block">
                                    <div class="col-12 d-flex flex-row">
                                        <div>
                                            <img src="/image/avatar1.png" width="55" height="55" />
                                        </div>
                                        <div class="pl-3 line-height-1-5 pt-2">
                                            <div class="blue gilroy-semi font-18">Emony</div>
                                            <div class="grey font-10 gilroy-medium">20 April 2021</div>
                                        </div>
                                    </div>
                                    <div class="col-12 line-height-1-2 font-12 pt-2">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
                                        eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                        takimata sanctus est Lorem ipsum dolor sit amet.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <div style="background: transparent" class="loading_visible w-100"
            :class="{'loading_visible_active' : loadingCheckout}">
            <div style="background: transparent" class="d-flex flex-row justify-content-center  p-1">
                <v-app style="background: transparent">
                    <v-progress-circular indeterminate color="red"></v-progress-circular>
                </v-app>
            </div>
        </div>



    @endsection

    @section('scripts')


        <script src="/js/home/custom.js"></script>
        <script>
            $('#myTab a').on('click', function(event) {
                event.preventDefault()
                $(this).tab('show')
            });
            let CancelToken = axios.CancelToken;
            const source = CancelToken.source();


            const hotels_subpage_app = new Vue({
                vuetify: new Vuetify(),
                components: {
                    VueGallerySlideshow
                },
                el: '#hotels_subpage_app',
                data: {
                    index: null,
                    isPackage: "{{ $isPackage }}",
                    resultToken: "{{ $resultToken }}",
                    hotel: [],
                    rooms: [],
                    tripId: '{{ $tripId }}',
                    loading: false,
                    loadingCheckout: false,
                    numberOfNights: 0,
                },
                mounted: async function() {
                    await this.getHotelDetails();
                    await this.getHotelRooms();



                },
                methods: {
                    async getHotelDetails() {
                        url = '/hotel/get_details?resultToken=' + this.resultToken
                        this.loading = true;
                        resp = await axios.get(url, {
                            cancelToken: new CancelToken(function executor(c) {
                                cancel = c;

                            })

                        }).catch(function(thrown) {

                            if (axios.isCancel(thrown)) {

                            } else {

                            }
                        });

                        console.log(resp.data);
                        this.loading = false;
                        this.hotel = resp.data;

                        this.numberOfNights = moment(this.hotel.checkout, 'DD-MM-YYYY').diff(moment(this.hotel
                            .checkin, 'DD-MM-YYYY'), 'days');
                    },
                    async getHotelRooms() {
                        url = '/hotel/get_rooms?resultToken=' + this.resultToken
                        resp = await axios.get(url, {
                            cancelToken: new CancelToken(function executor(c) {
                                cancel = c;

                            })

                        }).catch(function(thrown) {

                            if (axios.isCancel(thrown)) {

                            } else {

                            }
                        });
                        console.log(resp.data);
                        this.rooms = [];
                        this.rooms.push(...resp.data)

                    },
                    async reserveHotelRoom(room) {
                        console.log(room);
                        let url = ""
                        let formData = new FormData();

                        if (this.tripId != '') {
                            url = '/hotel/reserve';
                            formData.append('checkinDate', this.hotel.checkin);
                            formData.append('checkoutDate', this.hotel.checkout);
                            formData.append('hotelCode', room.HOTEL_CODE);
                            formData.append('roomCode', room.room_code);
                            formData.append('trip_id', this.tripId);
                            formData.append('noOfNights', this.numberOfNights);
                            formData.append('hotelName', this.hotel.HotelName);



                        } else {
                            url = '/hotel/reserve'






                            formData.append('resultToken', this.resultToken);
                            formData.append('roomId', room.RoomUniqueId);
                            formData.append('hotelName', this.hotel.HotelName);
                            formData.append('address', this.hotel.Address);
                            formData.append('rating', this.hotel.StarRating);
                            formData.append('checkinDate', this.hotel.checkin);
                            formData.append('checkinDate', this.hotel.checkin);
                            formData.append('checkoutDate', this.hotel.checkout);
                            formData.append('hotelCode', room.HOTEL_CODE);
                            formData.append('roomCode', room.room_code);
                            formData.append('trip_id', this.tripId);
                            formData.append('noOfNights', this.numberOfNights);
                            formData.append('isPackage', this.isPackage);


                        }
                        let error = false;
                        this.loadingCheckout = true;

                        try {
                            resp = await axios.post(url, formData);

                        } catch (ex) {
                            error = true;
                            this.loadingCheckout = false;
                        }


                         if (error == false) {
                            if (this.tripId !== '') {
                                window.location = "/trips/trip/" + this.tripId
                            } else if (this.isPackage == '0') {
                                window.location = "/checkout"
                            } else {
                                window.location = "/flights/search?isPackage=1";
                            }

                        }



                    }



                }


            })
        </script>
    @endsection
