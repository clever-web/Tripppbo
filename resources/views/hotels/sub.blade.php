@extends('master')
@section('css-links')
    <style>
        .hide_me {
            display: none !important;
        }
    </style>
@endsection
@section('content')
    <div id="hotels_detail_app" class="wrap_body index_wrap_body">
        <!-- hero -->
        <div class="container-lg pad_lg mt-sm-4 mt-3">
            <div class="hero_details">
                <!-- Slider main container -->
                <div class="swiper hero_slider">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div v-for="img in images" class="swiper-slide hotel_slide">
                            <img :src="img.Url">
                        </div>

                    </div>

                    <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
                </div>
                <div class="swiper-pagination mt-3"></div>

            </div>
        </div>

        <!-- hotel details -->
        <div class="hotel_details_sec">
            <div class="container-lg pad_lg">
                <div class="hotel_details_wrapper wrap_amenities">
                    <div class="hotel_details_left">
                        <div class="hotel_details_left_child box_shadow pad__x mb-4">
                            <h4 class="txt_blue_secondary fw_gilroy_medium mb-4 h6">@{{ hotel?.HotelName }}</h4>

                            <div class="d-flex align-items-center mb-3">
                                <div class="custom_illustration_wrapper">
                                    <div class="image_wrapper_illustration">
                                        <img src="/img/eye_icon_illustration.svg" alt="">
                                    </div>
                                    <div class="custom_circle_wrapper">
                                        <img v-for="n in 6" v-if="hotel?.TripAdvisorDetail?.Rating >= n"
                                            src="/img/round_circle_icon_fill.svg" alt="">


                                        <img v-for="n in 5" v-if="hotel?.TripAdvisorDetail?.Rating < n"
                                            src="/img/round_circle_outline.svg" alt="">

                                    </div>
                                </div>
                                <div class="after_custom_illustration">
                                    <a href="#"
                                        class="txt_silver text-decoration-none ms-3 mb-0 fs_14">@{{ hotel?.TripAdvisorDetail?.ReviewCount }}
                                        Reviews</a>
                                </div>
                            </div>

                            <div class="mb-5">
                                <p class="txt_blue_secondary fw_gilroy_medium fs_14">@{{ hotel?.HotelAddress.Address }}</p>
                                <p class="txt_blue_secondary fw_gilroy_medium fs_14" v-html="hotel?.Description"></p>
                            </div>

                            <div class="hotel_description_features">
                                <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 after_txt_divider h6">Highlights</h4>
                                <div class="hotel_description_features_wrapper">
                                    <div class="features_wrapper_item py-4 pb-5">
                                        <div class="mb-0 txt_silver mb-4 me-sm-3 fs_14"><img class="d-inline-block me-2"
                                                src="/img/stopwatch_icon.svg" alt=""> Check-in time :
                                            @{{ hotel?.CheckInTime }}</div>
                                        <div class="mb-0 txt_silver mb-4 fs_14"><img class="d-inline-block me-2"
                                                src="/img/stopwatch_icon.svg" alt=""> Checkout time :
                                            @{{ hotel?.CheckOutTime }}</div>
                                        <div class="mb-0 txt_silver w-100 fs_14"><img class="d-inline-block me-2"
                                                src="/img/road_icon.svg" alt=""> @{{ hotel?.HotelAddress.HotelLocation }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="hotel_description_features">
                                <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 after_txt_divider">Featured Amenities</h4>
                                <div class="hotel_description_features_wrapper">
                                    <div class="features_wrapper_item py-4">
                                        <div class="txt_silver features_item fs_14"><img class="d-block me-2"
                                                src="/img/elevator_icon.svg" alt=""> Elevator</div>
                                        <div class="txt_silver features_item fs_14"><img class="d-block me-2"
                                                src="/img/fitness_icon.svg" alt=""> Fitness facilities</div>
                                        <div class="txt_silver features_item fs_14"><img class="d-block me-2"
                                                src="/img/hair_salon_icon.svg" alt=""> Hair salon</div>
                                        <div class="txt_silver features_item fs_14"><img class="d-block me-2"
                                                src="/img/concierge_service.svg" alt=""> Concierge services</div>
                                        <div class="txt_silver features_item fs_14"><img class="d-block me-2"
                                                src="/img/airport_transportation.svg" alt=""> Airport transportation
                                            (surcharge)</div>
                                        <div class="txt_silver features_item fs_14"><img class="d-block me-2"
                                                src="/img/breakfast_available_icon.svg" alt=""> Breakfast available
                                            (surcharge)</div>
                                        <div class="txt_silver features_item fs_14"><img class="d-block me-2"
                                                src="/img/iron_icon.svg" alt=""> Laundry facilities</div>
                                        <div class="txt_silver features_item fs_14"><img class="d-block me-2"
                                                src="/img/garden_icon.svg" alt=""> Garden</div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-3 reponsive_text_center">
                                <div id="all_amenities_btn" class="txt_link txt_pink fw_gilroy_bold fs_14">Show All
                                    Amenities</div>
                            </div>
                        </div>
                    </div>

                    <div class="hotel_details_right">
                        <div class="hotel_details_twocontent_wrapper box_shadow">
                            <div class="hotel_dright_img">
                                <img src="/img/kenny-eliason-iAftdIcgpFc-unsplash.jpg" alt="">
                            </div>
                            <div class="details_features_lists pad__x">
                                <div class="txt_blue_secondary d-flex align-items-center">
                                    <h4 class="fw_gilroy_bold mb-0 me-3 h6">$ 16,976</h4>
                                    <p class="fw_gilroy_medium mb-0 fs_14">Per 1</p>
                                </div>

                                <ul class="list-unstyled py-3 px-3 d-flex flex-wrap">
                                    <li class="features_item text_dark_blue fs_14"><span class="me-2"><img
                                                src="/img/tick_icon.svg" alt=""></span> Room only</li>
                                    <li class="features_item text_dark_blue fs_14"><span class="me-2"><img
                                                src="/img/tick_icon.svg" alt=""></span> Accmmodation</li>
                                    <li class="features_item text_dark_blue fs_14"><span class="me-2"><img
                                                src="/img/tick_icon.svg" alt=""></span> Non- refundable</li>
                                </ul>
                                <div class="d-flex px-3">
                                    <a v-on:click.prevent="redirectToCheckout"
                                        class="btn btn_pink medium_btn w-100 fs_14">Book Room</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- All Amenities -->
                    <div class="amenities_box pad__x box_shadow">
                        <div class="amenities_cross_btn">
                            <img src="/img/cross__icon.svg" alt="">
                        </div>
                        <h4 class="text-center fw_gilroy_bold text_dark_blue mb-md-5 mb-4 h6">All Amenities</h4>
                        <div class="child_amenities">


                            <ul v-for="n in 3" v-if="hotel?.Amenities.length > n * 10"
                                class="amenities_ul list-unstyled">
                                <li v-for="a in hotel?.Amenities.slice(n, 10)"><a class="fs_14" href="#"><img
                                            class="d-inline-block me-2" src="/img/elevator_icon.svg" alt="">
                                        @{{ a.Description }}</a></li>

                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- hotel details -->
        <div class="container-lg pad_lg">
            <div class="hotel_details_top mb-5">
                <div class="hotel_heading_details">
                    <img src="/img/bedroom_interior.svg" alt="">
                    <h4 class="mb-0 mt-2 ms-3 trip_box_heading fw_gilroy_medium h6">Rooms available</h4>
                </div>
                <!-- flight details rigth -->
                <div class="flight_details_right">
                    <div class="child_details_right">
                        <p class="mb-0 me-2 fs_14">Sorted by:</p>
                        <!-- select box -->
                        <div class="select_box select_hotel">
                            <select class="child_select_box">
                                <option value="1" selected>Price</option>
                                <option value="2">Price - Low to High</option>
                                <option value="2">Price - Hight to Low</option>
                                <option value="2">User Rating - Hight to Low</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div v-for="service in services" class="avaliable_rooms">
                <!-- room details -->
                <div class="room_details">
                    <img class="room_details_img" src="'f'" alt="">
                    <div class="wrap_room_details mt-4">
                        <div class="room_txt">
                            <h4 class="text_dark_blue fw_gilroy_bold mb-3 h6">@{{ service.Rooms[0]['RoomName'] }}</h4>
                            <p class="mb-3 d-flex align-items-center text_silver fs_14"><img class="d-inline-block me-2"
                                    src="/img/sq_meter.svg" alt=""> 558-sq-foot(52-sq-meter)</p>
                            <p class="d-flex align-items-center text_silver fs_14"><img class="d-inline-block me-2"
                                    src="/img/peoples.svg" alt=""> Maximum 2 people : Adult x 2</p>
                        </div>
                        <!-- ul -->
                        <ul class="list-unstyled mt-5 text_dark_blue">
                            <li class="text_dark_blue mb-3 fs_14">Amenities</li>
                            <li class="mb-2 text_silver fs_14">Television</li>
                            <li class="mb-2 text_silver fs_14">Wheelchair</li>
                            <li class="mb-2 text_silver fs_14">accessible</li>
                            <li class="mb-2 text_silver fs_14">Free newspaper</li>
                            <li class="mb-2 text_silver fs_14">Refrigerator</li>
                        </ul>
                    </div>
                </div>

                <!-- room options -->
                <div class="room_options">
                    <!-- 1 -->
                    <div v-for="(option, optionIndex) in service.Rooms" class="room_option box_shadow pad__x">
                        <!-- option box left -->
                        <div class="option_box_left">
                            <h5 class="text-capitalize fw_gilroy_bold text_dark_blue mb-4 w-100 h6">Option
                                @{{ optionIndex + 1 }}</h5>
                            <div class="option__box option__box_left">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">room plan</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast Buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Non-Refundable</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                            <div class="option__box">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">Inclusions</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                        <!-- option box right -->
                        <div class="option_box_right">
                            <div class="member_box_yellow mb-lg-4">
                                <!-- member box header -->
                                <div class="member_box_header">
                                    <img src="/img/lock.svg" alt="">
                                    <p class="mb-0 ms-2 text_white fw_gilroy_bold fs_14">Member Only price!</p>
                                </div>
                                <!-- member box body -->
                                <div class="member_box_body">
                                    <p class="mb-2 me-2 fw_gilroy_bold text_dark_blue fs_14">$ 16,000 <span
                                            class="fw_gilroy_regular">1 Room per night</span></p>
                                    <p class="mb-0 me-2 fw_gilroy_bold text_dark_blue fs_14">Login Now ></p>
                                </div>
                            </div>
                            <a class="book__room text-decoration-none" v-on:click.prevent="bookRoom(service)">
                                <span class="h4 text_white mb-0 fw_gilroy_bold letter_space_2 h6">$ 16,976</span>
                                <span class="text_white opacity-75 d-block fs_14">Per 1 night</span>
                                <span class="h5 text_white mb-0 fw_gilroy_bold h6">Book Room</span>
                            </a>
                        </div>
                    </div>


                </div>
            </div>

            {{-- <div v-for="room in catogrized_rooms" class="avaliable_rooms">
                <!-- room details -->
                <div class="room_details">
                    <img class="room_details_img" :src="room[0].Image.ImageUrl" alt="">
                    <div class="wrap_room_details mt-4">
                        <div class="room_txt">
                            <h4 class="text_dark_blue fw_gilroy_bold mb-3 h6">@{{ room[0]['Name'] }}</h4>
                            <p class="mb-3 d-flex align-items-center text_silver fs_14"><img class="d-inline-block me-2"
                                    src="/img/sq_meter.svg" alt=""> 558-sq-foot(52-sq-meter)</p>
                            <p class="d-flex align-items-center text_silver fs_14"><img class="d-inline-block me-2"
                                    src="/img/peoples.svg" alt=""> Maximum 2 people : Adult x 2</p>
                        </div>
                        <!-- ul -->
                        <ul class="list-unstyled mt-5 text_dark_blue">
                            <li class="text_dark_blue mb-3 fs_14">Amenities</li>
                            <li class="mb-2 text_silver fs_14">Television</li>
                            <li class="mb-2 text_silver fs_14">Wheelchair</li>
                            <li class="mb-2 text_silver fs_14">accessible</li>
                            <li class="mb-2 text_silver fs_14">Free newspaper</li>
                            <li class="mb-2 text_silver fs_14">Refrigerator</li>
                        </ul>
                    </div>
                </div>

                <!-- room options -->
                <div class="room_options">
                    <!-- 1 -->
                    <div v-for="(option, optionIndex) in room" class="room_option box_shadow pad__x">
                        <!-- option box left -->
                        <div class="option_box_left">
                            <h5 class="text-capitalize fw_gilroy_bold text_dark_blue mb-4 w-100 h6">Option @{{ optionIndex + 1 }}</h5>
                            <div class="option__box option__box_left">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">room plan</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast Buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Non-Refundable</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                            <div class="option__box">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">Inclusions</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                        <!-- option box right -->
                        <div class="option_box_right">
                            <div class="member_box_yellow mb-lg-4">
                                <!-- member box header -->
                                <div class="member_box_header">
                                    <img src="/img/lock.svg" alt="">
                                    <p class="mb-0 ms-2 text_white fw_gilroy_bold fs_14">Member Only price!</p>
                                </div>
                                <!-- member box body -->
                                <div class="member_box_body">
                                    <p class="mb-2 me-2 fw_gilroy_bold text_dark_blue fs_14">$ 16,000 <span
                                            class="fw_gilroy_regular">1 Room per night</span></p>
                                    <p class="mb-0 me-2 fw_gilroy_bold text_dark_blue fs_14">Login Now ></p>
                                </div>
                            </div>
                            <a class="book__room text-decoration-none" href="#">
                                <span class="h4 text_white mb-0 fw_gilroy_bold letter_space_2 h6">$ 16,976</span>
                                <span class="text_white opacity-75 d-block fs_14">Per 1 night</span>
                                <span class="h5 text_white mb-0 fw_gilroy_bold h6">Book Room</span>
                            </a>
                        </div>
                    </div>


                </div>
            </div> --}}

            {{-- <div class="avaliable_rooms">
                <!-- room details -->
                <div class="room_details">
                    <img class="room_details_img" src="/img/visualsofdana-T5pL6ciEn-I-unsplash.jpg" alt="">
                    <div class="wrap_room_details mt-4">
                        <div class="room_txt">
                            <h4 class="text_dark_blue fw_gilroy_bold mb-3 h6">Apartment, 1 Queen Bed, Non Smoking, Lake
                                View</h4>
                            <p class="mb-3 d-flex align-items-center text_silver"><img class="d-inline-block me-2"
                                    src="/img/sq_meter.svg" alt=""> 558-sq-foot(52-sq-meter)</p>
                            <p class="d-flex align-items-center text_silver"><img class="d-inline-block me-2"
                                    src="/img/peoples.svg" alt=""> Maximum 2 people : Adult x 2</p>
                        </div>
                        <!-- ul -->
                        <ul class="list-unstyled mt-5 text_dark_blue">
                            <li class="text_dark_blue mb-3 fs_14">Amenities</li>
                            <li class="mb-2 text_silver fs_14">Television</li>
                            <li class="mb-2 text_silver fs_14">Wheelchair</li>
                            <li class="mb-2 text_silver fs_14">accessible</li>
                            <li class="mb-2 text_silver fs_14">Free newspaper</li>
                            <li class="mb-2 text_silver fs_14">Refrigerator</li>
                        </ul>
                    </div>
                </div>

                <!-- room options -->
                <div class="room_options">
                    <!-- 1 -->
                    <div class="room_option box_shadow pad__x">
                        <!-- option box left -->
                        <div class="option_box_left">
                            <h5 class="text-capitalize fw_gilroy_bold text_dark_blue mb-4 w-100 h6">option 1</h5>
                            <div class="option__box option__box_left">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">room plan</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast Buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Non-Refundable</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                            <div class="option__box">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">Inclusions</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                        <!-- option box right -->
                        <div class="option_box_right">
                            <div class="member_box_yellow mb-lg-4">
                                <!-- member box header -->
                                <div class="member_box_header">
                                    <img src="/img/lock.svg" alt="">
                                    <p class="mb-0 ms-2 text_white fw_gilroy_bold fs_14">Member Only price!</p>
                                </div>
                                <!-- member box body -->
                                <div class="member_box_body">
                                    <p class="mb-2 me-2 fw_gilroy_bold text_dark_blue fs_14">$ 16,000 <span
                                            class="fw_gilroy_regular">1 Room per night</span></p>
                                    <p class="mb-0 me-2 fw_gilroy_bold text_dark_blue fs_14">Login Now ></p>
                                </div>
                            </div>
                            <a class="book__room text-decoration-none" href="#">
                                <span class="h4 text_white mb-0 fw_gilroy_bold letter_space_2 h6">$ 16,976</span>
                                <span class="text_white opacity-75 d-block fs_14">Per 1 night</span>
                                <span class="h5 text_white mb-0 fw_gilroy_bold h6">Book Room</span>
                            </a>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="room_option box_shadow pad__x">
                        <!-- option box left -->
                        <div class="option_box_left">
                            <h5 class="text-capitalize fw_gilroy_bold text_dark_blue mb-4 w-100 h6">option 2</h5>
                            <div class="option__box option__box_left">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">room plan</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast Buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Non-Refundable</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                            <div class="option__box">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">Inclusions</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                        <!-- option box right -->
                        <div class="option_box_right">
                            <div class="member_box_yellow mb-lg-4">
                                <!-- member box header -->
                                <div class="member_box_header">
                                    <img src="/img/lock.svg" alt="">
                                    <p class="mb-0 ms-2 text_white fw_gilroy_bold fs_14">Member Only price!</p>
                                </div>
                                <!-- member box body -->
                                <div class="member_box_body">
                                    <p class="mb-2 me-2 fw_gilroy_bold text_dark_blue fs_14">$ 16,000 <span
                                            class="fw_gilroy_regular">1 Room per night</span></p>
                                    <p class="mb-0 me-2 fw_gilroy_bold text_dark_blue fs_14">Login Now ></p>
                                </div>
                            </div>
                            <a class="book__room text-decoration-none" href="#">
                                <span class="h4 text_white mb-0 fw_gilroy_bold letter_space_2 h6">$ 16,976</span>
                                <span class="text_white opacity-75 d-block fs_14">Per 1 night</span>
                                <span class="h5 text_white mb-0 fw_gilroy_bold h6">Book Room</span>
                            </a>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="room_option box_shadow pad__x">
                        <!-- option box left -->
                        <div class="option_box_left">
                            <h5 class="text-capitalize fw_gilroy_bold text_dark_blue mb-4 w-100 h6">option 3</h5>
                            <div class="option__box option__box_left">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">room plan</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast Buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Non-Refundable</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                            <div class="option__box">
                                <h5 class="text-capitalize text_dark_blue mb-3 h6">Inclusions</h5>
                                <ul class="list-unstyled">
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free self parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Free valet parking</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Breakfast buffet</li>
                                    <li class="text_silver mb-3 fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt="">Accommodation</li>
                                    <li class="text_silver fs_14"><img class="d-inline-block me-2"
                                            src="/img/tick_pink.svg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                        <!-- option box right -->
                        <div class="option_box_right">
                            <div class="member_box_yellow mb-lg-4">
                                <!-- member box header -->
                                <div class="member_box_header">
                                    <img src="/img/lock.svg" alt="">
                                    <p class="mb-0 ms-2 text_white fw_gilroy_bold fs_14">Member Only price!</p>
                                </div>
                                <!-- member box body -->
                                <div class="member_box_body">
                                    <p class="mb-2 me-2 fw_gilroy_bold text_dark_blue fs_14">$ 16,000 <span
                                            class="fw_gilroy_regular">1 Room per night</span></p>
                                    <p class="mb-0 me-2 fw_gilroy_bold text_dark_blue fs_14">Login Now ></p>
                                </div>
                            </div>
                            <a class="book__room text-decoration-none" href="#">
                                <span class="h4 text_white mb-0 fw_gilroy_bold letter_space_2 h6">$ 16,976</span>
                                <span class="text_white opacity-75 d-block fs_14">Per 1 night</span>
                                <span class="h5 text_white mb-0 fw_gilroy_bold h6">Book Room</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>

        <!-- our shops -->
        <div class="container-lg pad_lg">
            <div class="our_shops box_shadow pad__x">
                <h4 class="text_dark_blue fw_gilroy_bold mb-3 w-100 h6">Places of interest</h4>
                <!-- our shop maps -->
                <div class="our_shop_maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.9185124463!2d2.347035!3d48.85885484999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sEiffel%20Tower!5e0!3m2!1sen!2sbd!4v1654546998022!5m2!1sen!2sbd"
                        style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- all shops -->
                <div class="all_shops">
                    <h4 class="text_dark_blue fw_gilroy_bold mb-3 h6">Nearby Attractions</h4>
                    <ul class="list-unstyled list_shop">
                        <li v-for="attraction in hotel?.Attractions" class="mb-2  text_dark_blue fs_14"
                            v-html="attraction">@{{ attraction }} {{-- <span class="d-block ms-auto">1.5 km / 0.9 mi</span> --}}</li>

                        <li class="mt-3 fw_gilroy_bold text_dark_blue fs_14"><a
                                class="text-decoration-none me-2 d-inline-block text_dark_blue see_arrow__down"
                                href="#">See all</a> <img src="/img/arrow_down.svg"></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- reviews -->
        <div class="review_rating_sec pb-5">
            <div class="container-lg pad_lg">
                <div class="box_shadow wrap_review pb-1">
                    <div class="review_rating_wrapper pad__x">
                        <!-- review details top -->
                        <div class="hotel_details_top hotel_review_top">
                            <div class="hotel_heading_details">
                                <h4 class="mb-0 mt-2 trip_box_heading fw_gilroy_medium h6">Guest reviews & rating</h4>
                            </div>
                            <!-- flight details rigth -->
                            {{-- <div class="flight_details_right">
                                <div class="child_details_right me-3">
                                    <p class="mb-0 me-2 fw_gilroy_bold txt_blue_secondary fs_14">Sorted by:</p>
                                    <!-- select box -->
                                    <div class="select_box fw_gilroy_medium">
                                        <select class="child_select_box select_hotel">
                                            <option value="1" selected>most helpful</option>
                                            <option value="2">item 1</option>
                                            <option value="2">item 2</option>
                                            <option value="2">item 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="child_details_right">
                                    <p class="mb-0 me-2 fw_gilroy_bold txt_blue_secondary fs_14">Filter by:</p>
                                    <!-- select box -->
                                    <div class="select_box fw_gilroy_medium">
                                        <select class="child_select_box select_hotel">
                                            <option value="1" selected>see all</option>
                                            <option value="2">item 1</option>
                                            <option value="2">item 2</option>
                                            <option value="2">item 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div class="review_rating_progress_tags">
                            <div class="review_progress_txt_tag_wrapper">
                                <div class="review_progress_txt_wrapper">
                                    <p class="h5">Trip Advisor Rating</p>
                                    <p class="h5 my-2">@{{ hotel?.TripAdvisorDetail?.Rating }}<span class="h6">/5</span></p>
                                    <p class="mb-1 fs_14">@{{ hotel?.TripAdvisorDetail?.ReviewCount }} ratings</p>

                                </div>

                                <div class="review_progress_wrapper">
                                    <div class="review_progress_item">
                                        <div class="txt_blue_secondary fw_gilroy_bold me-2 fs_14">Recommended</div>

                                        <div class="progress review_progress">
                                            <div class="progress-bar review_progress_bar" role="progressbar"
                                                :style="reviewProgressbarStyle(hotel?.TripAdvisorDetail?.RecommendedPercent)"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="txt_blue_secondary fw_gilroy_medium review_txt_after_progress fs_14">
                                            @{{ hotel?.TripAdvisorDetail?.RecommendedPercent }} </div>
                                    </div>


                                    <div class="review_progress_item">
                                        <div class="txt_blue_secondary fw_gilroy_bold me-2 fs_14">Excellent</div>

                                        <div class="progress review_progress">
                                            <div class="progress-bar review_progress_bar" role="progressbar"
                                                :style="reviewProgressbarStyle(hotel?.TripAdvisorDetail?.ReviewExcellent)"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="txt_blue_secondary fw_gilroy_medium review_txt_after_progress fs_14">
                                            @{{ hotel?.TripAdvisorDetail?.ReviewExcellent }} </div>
                                    </div>

                                    <div class="review_progress_item">
                                        <div class="txt_blue_secondary fw_gilroy_bold me-2 fs_14">Location</div>

                                        <div class="progress review_progress">
                                            <div class="progress-bar review_progress_bar" role="progressbar"
                                                :style="reviewProgressbarStyle(hotel?.TripAdvisorDetail?.ReviewLocation)"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="txt_blue_secondary fw_gilroy_medium review_txt_after_progress fs_14">
                                            @{{ hotel?.TripAdvisorDetail?.ReviewLocation }} </div>
                                    </div>

                                    <div class="review_progress_item">
                                        <div class="txt_blue_secondary fw_gilroy_bold me-2 fs_14">Service</div>

                                        <div class="progress review_progress">
                                            <div class="progress-bar review_progress_bar" role="progressbar"
                                                :style="reviewProgressbarStyle(hotel?.TripAdvisorDetail?.ReviewService)"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="txt_blue_secondary fw_gilroy_medium review_txt_after_progress fs_14">
                                            @{{ hotel?.TripAdvisorDetail?.ReviewService }} </div>
                                    </div>

                                    <div class="review_progress_item">
                                        <div class="txt_blue_secondary fw_gilroy_bold me-2 fs_14">Rooms</div>

                                        <div class="progress review_progress">
                                            <div class="progress-bar review_progress_bar" role="progressbar"
                                                :style="reviewProgressbarStyle(hotel?.TripAdvisorDetail?.ReviewRooms)"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="txt_blue_secondary fw_gilroy_medium review_txt_after_progress fs_14">
                                            @{{ hotel?.TripAdvisorDetail?.ReviewRooms }} </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="review_comment_wrapper mb-5">
                        <div v-for="review in hotel?.TripAdvisorReviews.slice(0, number_of_visible_reviews)"
                            class="review_comment_item">
                            <div class="review_user_profile_wrapper">
                                <div class="review_user_profile">
                                    <div class="review_user_img">
                                        <img src="/img/review_profile_icon.svg" alt="">
                                    </div>
                                    <div class="review_user_txt">
                                        <div class="me-3">
                                            <p class="txt_blue_secondary fw_gilroy_bold h6 mb-0">@{{ review.UserName }}
                                            </p>
                                        </div>
                                        <div class="review_user_txt_desc" style="display: block">
                                            <p class="text_silver mb-0 me-2 fs_14"></p>
                                            <p class="text_silver mb-0 fs_14">@{{ review.Date }} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="review_rating">
                                    <p class="mb-0 fs_14">@{{ review.Rating }}/5</p>
                                </div>
                            </div>
                            <div class="review_comment_content">
                                <p class="text_dark_blue fw_gilroy_bold mb-3 h6" v-html="review.Title"></p>
                                <p class="txt_blue_secondary fw_gilroy_media mb-4 fs_14" v-html="review.Text"></p>
                                {{-- <div class="review_comment_image_image">
                                    <img src="/img/review_img_1.svg" alt="">
                                    <img src="/img/review_img_2.svg" alt="">
                                    <img src="/img/review_img_3.svg" alt="">
                                    <img src="/img/review_img_4.svg" alt="">
                                    <img src="/img/review_img_5.svg" alt="">
                                </div> --}}
                            </div>
                        </div>

                    </div>

                    <p class="text-center" style="cursor: pointer"
                        v-if="number_of_visible_reviews < hotel?.TripAdvisorReviews.length" v-on:click="toggleReviews"><a
                            class="fw_gilroy_bold text_dark_blue_a text-decoration-none fs_14 d-inline-block me-2 text-capitalize">See
                            More</a> <img src="/img/arrow_down.svg" alt=""></p>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts-links')
    <script>
        const hotels_search_app = new Vue({
            el: "#hotels_detail_app",

            data: {
                number_of_visible_reviews: 2,

                api_response: @json($detail),
                hotel: null,
                images: [],
                catogrized_rooms: {},
                search_key: @json($search_key),
                hotel_provider_id: @json($provider_id),
                services: @json($services),
                services_rooms: [],
             //   search_data: @json($search_data),




            },
            methods: {
                bookRoom: async function(room)
                {

                    let f = new FormData();
                    f.append('search_key' , this.search_key)
                    f.append('search_id' , this.hotel_provider_id)
                    f.append('OptionalToken' , room.OptionalToken)
                    f.append('ServiceIdentifer' , room.ServiceIdentifer)
                    f.append('ProviderName' , room.ProviderName)

                    let resp = await axios.post('/hotel/prepare_room_booking', f);
                    window.location = '/hotels/checkout?id=' + resp.data
                },
                redirectToCheckout: function() {
                    window.location = "/hotels/checkout?search_key=" + this.search_key + "&search_id=" + this
                        .hotel_provider_id
                },
                toggleReviews: function() {
                    this.number_of_visible_reviews += 2;

                },
                reviewProgressbarStyle: function(review_rating) {
                    return {
                        width: (review_rating) + '%'
                    }
                },




            },
            mounted: function() {

                this.hotel = this.api_response.hotel_details.HotelDetail
                this.images = this.api_response.hotel_media.Gallery;


                for (let c = 0; c < this.hotel?.HotelRooms.length; c++) {
                    if (this.catogrized_rooms.hasOwnProperty(this.hotel?.HotelRooms[c].Name)) {
                        this.catogrized_rooms[this.hotel?.HotelRooms[c].Name] = [...this.catogrized_rooms[this
                            .hotel?.HotelRooms[c].Name], this.hotel?.HotelRooms[c]];

                    } else {
                        this.catogrized_rooms[this.hotel?.HotelRooms[c].Name] = [this.hotel?.HotelRooms[c]];

                    }
                }


            }


        });
    </script>
    <script>
        const swiper = new Swiper('.hero_slider', {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                clickable: true,
                el: '.hero_details .swiper-pagination',
            },
            navigation: {
                nextEl: '.hero_details .swiper-button-next',
                prevEl: '.hero_details .swiper-button-prev',
            },
        });




        // calendar show when focus
        let input__date = document.querySelectorAll(".input__date");
        let wrap_calendar = document.querySelector(".wrap_calendar");
        let wrap_date_after_box = document.querySelector(".wrap_date_after_box");

        for (let i = 0; i < input__date.length; i++) {
            input__date[i].addEventListener("focus", (e) => {
                input__date[0].setAttribute("style", `position: relative;z-index: 42;`)
                input__date[1].setAttribute("style", `position: relative;z-index: 42;`)
                wrap_calendar.classList.add("wrap_calendar_active");
                wrap_date_after_box.classList.add("wrap_date_after_box_active");
            })

            wrap_date_after_box.addEventListener("click", (e) => {
                input__date[0].removeAttribute("style");
                input__date[1].removeAttribute("style");
                wrap_calendar.classList.remove("wrap_calendar_active");
                e.target.classList.remove("wrap_date_after_box_active")
            })
        }

        let hotel_slide = document.querySelectorAll(".hotel_slide");
        let swiper_pagination_bullet = document.querySelectorAll(
            ".hero_details .swiper-pagination .swiper-pagination-bullet");
        /*     for(let i = 0;i < hotel_slide.length;i++){
                let get_src = hotel_slide[i].querySelector("img").src;
                swiper_pagination_bullet[i].innerHTML = `<img src="${get_src}">`;
            } */

        let images_count = 13;
        if (hotel_slide.length > images_count) {
            for (let i = 0; i < images_count; i++) {
                let get_src = hotel_slide[i].querySelector("img").src;
                swiper_pagination_bullet[i].innerHTML = `<img src="${get_src}">`;
            }
            for (let i = images_count; i < hotel_slide.length; i++) {
                let get_src = hotel_slide[i].querySelector("img").src;
                swiper_pagination_bullet[i].classList.add('hide_me')
            }
        }


        // all_amenities
        let all_amenities_btn = document.querySelector("#all_amenities_btn");
        let amenities_cross_btn = document.querySelector(".amenities_cross_btn");
        let amenities_box = document.querySelector(".amenities_box");

        all_amenities_btn.addEventListener("click", () => {
            amenities_box.classList.toggle("amenities_box_active");
        });

        amenities_cross_btn.addEventListener("click", () => {
            amenities_box.classList.remove("amenities_box_active");
        });
    </script>
@endsection
