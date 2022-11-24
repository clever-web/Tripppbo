    @extends('master')


    @section('css-links')
        <style>
            .hotel_content_item_img>img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                border-radius: 10px;

            }


            .full_map_active {
                display: block;
            }

            .full_map_inactive {
                display: none;
            }
        </style>
    @endsection
    @section('content')
        <div id="hotels_search_app" class="wrap_body index_wrap_body">
            <div id="full_map" style="width: 100vw; height: 100vh;position:relative;">

                <div id="full_map_container" class="full_map_active" style="height: 100%"></div>

                <div style="position: absolute; bottom: 0px;width: 100%; background-color:transparent;">


                    <div class="trip_selection_wrapper" style="max-width: 1000px; margin: 0 auto;">

                        <!-- 1 -->
                        <div v-for="hotel in selected_hotel?.slice(0,1)" class="hotel_main_box_wrapper mb-4 pad__x">
                            <div class="hotel_content_wrapper_row">
                                <div class="hotel_content_item_details">
                                    <div class="hotel_content_item_img">
                                        <img :src="hotel.HotelImages[0]" alt="">
                                    </div>

                                    <div class="hotel_right_content">
                                        <div class="heading_rating_stars">
                                            <div class="d-flex align-items-center mb-2">
                                                <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 h6" style="max-width: 280px;">
                                                    @{{ hotel['HotelName'] }}
                                                </h4>
                                                <div class="star_icons_wrapper d-flex ms-3">
                                                    <i v-for="n in 5" v-if="hotel.StarRating >= n"
                                                        class="fas fa-star star_fill"></i>

                                                    <i v-for="n in 5" v-if="hotel.StarRating < n"
                                                        class="fas fa-star star_normal"></i>
                                                </div>
                                            </div>

                                            <div class="hotel_heading_description">
                                                <p class="mb-0 txt_silver fs_14" v-html="hotel.HotelAddress.Address"></p>
                                            </div>
                                        </div>

                                        <div class="eye_illustration_custom_icons">
                                            <div class="custom_illustration_wrapper mb-2">
                                                <div class="image_wrapper_illustration">
                                                    <img src="/img/eye_icon_illustration.svg" alt="">
                                                </div>
                                                <div class="custom_circle_wrapper d-flex">

                                                    <img v-for="n in 6" v-if="hotel.TripAdvisorDetail?.Rating >= n"
                                                        src="/img/round_circle_icon_fill.svg" alt="">


                                                    <img v-for="n in 5" v-if="hotel.TripAdvisorDetail?.Rating < n"
                                                        src="/img/round_circle_outline.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="after_custom_illustration">
                                                <a href="#"
                                                    class="txt_silver text-decoration-none mb-0 fs_14">@{{ hotel.TripAdvisorDetail ? hotel.TripAdvisorDetail?.ReviewCount : 0 }}
                                                    Reviews</a>
                                            </div>
                                        </div>

                                        <div class="hotel_content_desc_features text_dark_blue fw_gilroy_medium">
                                            <div class="hotel_features_item">
                                                <img src="/img/breakfast_icon.svg" alt="">
                                                <p class="fs_14">Free breakfast</p>
                                            </div>

                                            <div class="hotel_features_item">
                                                <img src="/img/wifi_icon.svg" alt="">
                                                <p class="fs_14">Free internet</p>
                                            </div>

                                            <div class="hotel_features_item">
                                                <img src="/img/check_icon_parking.svg" alt="">
                                                <p class="fs_14">Free parking</p>
                                            </div>
                                        </div>

                                        <div class="hotel_content_rating_score">
                                            <div class="hotel_content_rating txt_blue_secondary fw_gilroy_medium fs_14">
                                                @{{ hotel.TripAdvisorDetail ? (hotel.TripAdvisorDetail?.Rating) : 0 }}
                                            </div>
                                            <div class="hotel_content_rating_desc">
                                                <h5 class="txt_blue_secondary fw_gilroy_bold mb-0 h6">
                                                    @{{ hotel_rating(hotel) }}</h5>
                                                <p class="mb-0 txt_blue_secondary fw_gilroy_medium fs_14">
                                                    @{{ hotel.TripAdvisorDetail ? (hotel.TripAdvisorDetail?.ReviewCount) : 0 }}
                                                    User Review
                                                </p>
                                            </div>
                                        </div>

                                        <div v-on:click.prevent="view_hotel(hotel)" class="button_wrapper">
                                            <a
                                                class="btn text-center btn_pink medium_btn d-flex align-items-center justify-content-center flex-column btn__hotel">
                                                <p class="fw_gilroy_bold mb-0 fs_14">@{{ hotel['BookCurrency'] }}
                                                    @{{ number_ceil(hotel['LBookPrice']) }} </p>
                                                <p class="mb-0 fs_14">per night</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>

            </div>

            <!-- ticket details -->
            <div class="container-lg pad_lg">
                <div class="ticket_box_wrap">
                    <form class="ticket_box pad__x">

                        <hotel-main-box :range="isRange" :initial_search_data="search_data"></hotel-main-box>
                        <!-- ticket_box_row_bottom -->
                        {{-- <div class="ticket_box_row_bottom">
                            <!-- 1 -->
                            <div class="wrap_inputs wrap_inputs_signin_1">
                                <p class="nice_text ticket_text text-capitalize mb-2"><i class="fas fa-map-marker-alt me-1"></i>
                                    Location</p>
                                <div class="ticket_input_1 ticket__input me-2">
                                    <input id="ticket_input_a" type="text" placeholder="Where are you going?">
                                </div>
                            </div>
                            <!-- 2 / 3 -->
                            <div class="wrap_date_input wrap_date_input_sign_in">
                                <div class="wrap_date_after_box"></div>
                                <!-- 2 -->
                                <div class="wrap_inputs">
                                    <p class="nice_text ticket_text text-capitalize mb-2"><i class="fas fa-calendar-alt"></i>
                                        check in</p>
                                    <div class="ticket_input_3 ticket__input me-2">
                                        <input id="start_date" class="input__date" type="text" placeholder="05 June 2022">
                                    </div>
                                </div>
                                <!-- 3 -->
                                <div class="wrap_inputs">
                                    <p class="nice_text ticket_text text-capitalize mb-2"><i class="fas fa-calendar-alt"></i>
                                        check in</p>
                                    <div class="ticket_input_3 ticket__input me-2">
                                        <input id="end_date" class="input__date" type="text" placeholder="08 June 2022">
                                    </div>
                                </div>
                                <!-- calendar box -->
                                <div class="wrap_calendar wrap_calendar_2">
                                    <div class="calendar_top">
                                        <div class="trip_date">
                                            <h5 class="trip_start mb-0 h6"><span class="start_day">Thu</span>, <span
                                                    class="start_month">May</span> <span class="start_date">9</span></h5>
                                            <span><i class="fas fa-long-arrow-alt-right mx-4"></i></span>
                                            <h5 class="trip_end mb-0 h6"><span class="end_day">Thu</span>, <span
                                                    class="end_month">May</span> <span class="end_date">10</span></h5>
                                        </div>
                                        <div class="calendar_top_child">
                                            <div class="lowest_fare me-3">
                                                <p class="mb-0 d-flex align-items-center fs_14"><span></span> Lowest fare</p>
                                            </div>
                                            <div class="holidays">
                                                <p class="mb-0 d-flex align-items-center fs_14"><span></span> Holidays</p>
                                            </div>
                                        </div>
                                        <div class="reset_calendar d-flex justify-content-end py-2">
                                            <p class="mb-0">reset</p>
                                        </div>
                                    </div>
                                    <div class="calendar_box">
                                    </div>
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="wrap_inputs guest_box">
                                <p class="nice_text ticket_text text-capitalize mb-2"><i class="fas fa-user"></i> guest</p>
                                <div class="ticket_input_3 ticket__input me-2">
                                    <input type="text" id="input_guest" placeholder="03 persons">
                                </div>
                                <div class="guest_box_body_after"></div>
                                <div class="child_a_select guest_box_body">
                                    <h5 class="text-capitalize mb-3 h6">room <span></span></h5>
                                    <!-- 1 -->
                                    <div class="child_a_select_row child_a_select_row_2">
                                        <p class="mb-0 fs_14">Adults <span>(12 yrs & above)</span></p>
                                        <div class="increase_decrease_btns">
                                            <div data-decrease><i class="fas fa-minus"></i></div>
                                            <input class="fs_14" data-value type="text" value="1">
                                            <div data-increase><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                    <!-- 2 -->
                                    <div class="child_a_select_row child_a_select_row_2">
                                        <p class="mb-0 fs_14">Students <span>(2 - 11 yrs)</span></p>
                                        <div class="increase_decrease_btns">
                                            <div data-decrease><i class="fas fa-minus"></i></div>
                                            <input class="fs_14" data-value type="text" value="1">
                                            <div data-increase><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                    <button class="add__more_room h6">+ Add more room</button>
                                </div>
                            </div>
                            <button type="submit" class="form_btn form_btn_hotel form_btn_hotel_sign_in"><i
                                    class="fas fa-search"></i></button>
                        </div> --}}
                    </form>
                </div>
            </div>

            <!-- flight box -->
            <div class="container-lg pad_lg">
                <div class="flight_box">
                    <div class="flight_box_after"></div>
                    <!-- flight sidebar -->
                    <form class="flight_sidebar flight_sidebar_hotel">
                        <div class="map__box mb-3">
                            <h4 class="mb-4 h6">Search for hotels on Map</h4>
                            <div class="wrap_hotel_map">

                                <div id="map" style="height: 320px;"></div>
                                {{-- <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.9185124463!2d2.347035!3d48.85885484999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sEiffel%20Tower!5e0!3m2!1sen!2sbd!4v1654546998022!5m2!1sen!2sbd"
                                    style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            </div>
                        </div>
                        <div class="child_flight_sidebar_hotel">
                            <span class="sidebar_cross"><i class="fas fa-times-circle"></i></span>
                            <!-- 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="sidebar_heading_1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#sidebar_collapse_1" aria-expanded="true"
                                        aria-controls="sidebar_collapse_1">
                                        Price
                                    </button>
                                </h2>
                                <div id="sidebar_collapse_1" class="accordion-collapse collapse show"
                                    aria-labelledby="sidebar_heading_1">
                                    <div class="accordion-body">
                                        <range-slider ref="range_slider_1" @min_changed="minimum_price_changed"
                                            @max_changed="maximum_price_changed" :min_value="filters[4].price.minPrice"
                                            :max_value="filters[4].price.maxPrice">
                                        </range-slider>

                                        <div class="d-flex justify-content-between px-3 mt-2">

                                            <div>@{{ api_response?.Hotels[0].BookCurrency }} @{{ filters[4].price.selectedMinPrice }} </div>
                                            <div>@{{ api_response?.Hotels[0].BookCurrency }} @{{ filters[4].price.selectedMaxPrice }}</div>
                                        </div>

                                        {{-- <div class="wrap_custom_range pt-3">
                                            <div class="pb-4 d-flex justify-content-between position-relative">
                                                <p class="range_value_1 mb-0 sidebar_ul_1_p_2 mx-0 text-start fs_16">$<span
                                                        id="range1"></span></p>
                                                <p class="range_value_2 mb-0 sidebar_ul_1_p_2 fs_16">$<span
                                                        id="range2"></span></p>
                                                <div class="range_position fs_16">$<span id="range_position_span">12</span>
                                                </div>
                                            </div>
                                            <div class="slider_range">
                                                <div class="slider-track"></div>
                                                <input type="range" min="0" max="4500" value="200"
                                                    id="slider-1" oninput="slideOne()">
                                                <input type="range" min="0" max="4500" value="2500"
                                                    id="slider-2" oninput="slideTwo()">
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="sidebar_heading_2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#sidebar_collapse_2" aria-expanded="true"
                                        aria-controls="sidebar_collapse_2">
                                        Popular filters
                                    </button>
                                </h2>
                                <div id="sidebar_collapse_2" class="accordion-collapse collapse show"
                                    aria-labelledby="sidebar_heading_2">
                                    <div class="accordion-body">
                                        <!-- sidebar ul 1 -->
                                        <ul class="sidebar_ul_1 mt-4">
                                            <!-- 1 -->
                                            <li>
                                                <label>
                                                    Free breakfast
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 2 -->
                                            <li>
                                                <label>
                                                    pool
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 3 -->
                                            <li>
                                                <label>
                                                    free wifi
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 4 -->
                                            <li>
                                                <label>
                                                    free parking
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 5 -->
                                            <li>
                                                <label>
                                                    Pet friendly
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div> --}}
                            <!-- 3 -->
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="sidebar_heading_3">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#sidebar_collapse_3" aria-expanded="true"
                                        aria-controls="sidebar_collapse_3">
                                        Distance from city center
                                    </button>
                                </h2>
                                <div id="sidebar_collapse_3" class="accordion-collapse collapse show"
                                    aria-labelledby="sidebar_heading_3">
                                    <div class="accordion-body">

                                        <div class="wrap_custom_range pt-3">
                                            <div class="pb-4 d-flex justify-content-between position-relative mb-4 py-2">
                                                <div class="range_position_2">Less than <span
                                                        id="range_position_span_2">5</span>km</div>
                                            </div>
                                            <!-- custom range -->
                                            <div class="slider_range">
                                                <div class="slider-track2"></div>
                                                <input type="range" min="0" max="100" value="0"
                                                    id="slider-3" oninput="slideThree()">
                                                <input type="range" min="0" max="100" value="20"
                                                    id="slider-4" oninput="slideFour()">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> --}}
                            <!-- 4 -->
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="sidebar_heading_4">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#sidebar_collapse_4" aria-expanded="true"
                                        aria-controls="sidebar_collapse_4">
                                        Type of accommodation
                                    </button>
                                </h2>
                                <div id="sidebar_collapse_4" class="accordion-collapse collapse show"
                                    aria-labelledby="sidebar_heading_4">
                                    <div class="accordion-body">
                                        <!-- sidebar ul 1 -->
                                        <ul class="sidebar_ul_1 mt-4">
                                            <!-- 1 -->
                                            <li>
                                                <label>
                                                    All
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 2 -->
                                            <li>
                                                <label>
                                                    Apartment
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 3 -->
                                            <li>
                                                <label>
                                                    Home
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 4 -->
                                            <li>
                                                <label>
                                                    Villa
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 5 -->
                                            <li>
                                                <label>
                                                    Hotel
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 6 -->
                                            <li>
                                                <label>
                                                    Resort
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div> --}}
                            <!-- 5 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="sidebar_heading_5">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#sidebar_collapse_5" aria-expanded="true"
                                        aria-controls="sidebar_collapse_5">
                                        Star rating
                                    </button>
                                </h2>
                                <div id="sidebar_collapse_5" class="accordion-collapse collapse show"
                                    aria-labelledby="sidebar_heading_5">
                                    <div class="accordion-body">
                                        <div id="star_rating" class="rating__boxes mt-4">
                                            <!-- 1 -->
                                            <div v-for="starIndex in 5" class="rating__box s_rating"
                                                v-on:click="updateStarFilter(starIndex)"
                                                :class="{ rated: starIndex <= filters[0].StarRatings }">
                                                <i class="fas fa-star"></i>
                                                <span>@{{ starIndex }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 6 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="sidebar_heading_6">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#sidebar_collapse_6" aria-expanded="true"
                                        aria-controls="sidebar_collapse_6">
                                        Other
                                    </button>
                                </h2>
                                <div id="sidebar_collapse_6" class="accordion-collapse collapse show"
                                    aria-labelledby="sidebar_heading_6">
                                    <div class="accordion-body">
                                        <!-- sidebar ul 1 -->
                                        <ul class="sidebar_ul_1 mt-4">
                                            <!-- 1 -->
                                            <li v-on:click="toggle_free_cancellation">
                                                <label>
                                                    Free Cancellation
                                                    <input disabled v-model="filters[1].Refundable" type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 2 -->
                                            <li v-on:click="toggle_non_refundable">
                                                <label>
                                                    Non-Refundable
                                                    <input disabled v-model="filters[1].NonRefundable" type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>

                                            <!-- 4 -->

                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <!-- 7 -->

                            <!-- 8 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="sidebar_heading_8">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#sidebar_collapse_8" aria-expanded="true"
                                        aria-controls="sidebar_collapse_8">
                                        Main localities
                                    </button>
                                </h2>
                                <div id="sidebar_collapse_8" class="accordion-collapse collapse show"
                                    aria-labelledby="sidebar_heading_8">
                                    <div class="accordion-body">
                                        <!-- sidebar ul 1 -->
                                        <ul class="sidebar_ul_1 mt-4">
                                            <!-- 1 -->
                                            <li v-for="locality in filters[3]?.localities"
                                                v-on:click="handle_locality(locality)">
                                                <label>
                                                    @{{ locality.name }}
                                                    <input v-model="locality.enabled" disabled type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <!-- 9 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="sidebar_heading_9">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#sidebar_collapse_9" aria-expanded="true"
                                        aria-controls="sidebar_collapse_9">
                                        Amenities
                                    </button>
                                </h2>
                                <div id="sidebar_collapse_9" class="accordion-collapse collapse show"
                                    aria-labelledby="sidebar_heading_9">
                                    <div class="accordion-body">
                                        <!-- sidebar ul 1 -->
                                        <ul class="sidebar_ul_1 mt-4">
                                            <!-- 1 -->
                                            <li v-for="am in filters[2]?.amenities" v-on:click="handle_amenities(am)">
                                                <label>
                                                    @{{ am.name }}
                                                    <input v-model="am.enabled" disabled type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <!-- 2 -->

                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <button type="reset" onclick="clear_fillter(this)"
                                class="sidebar_clear_filter_button mb-3">Clear
                                fillter</button>
                        </div>
                    </form>

                    <!-- Hotel -->
                    <div class="flight_details">
                        <!-- Hote details top -->
                        <div class="hotel_details_top">
                            <div class="hotel_heading_details">
                                <img src="/img/hotel_icon.svg" alt="">
                                <h4 class="mb-0 mt-2 ms-3 trip_box_heading fw_gilroy_medium h6">Select Your Hotel</h4>
                            </div>
                            <!-- flight details rigth -->
                            <div class="flight_details_right">
                                <div class="child_details_right">
                                    <p class="mb-0 me-2 fs_14">Sorted by:</p>
                                    <!-- select box -->
                                    <div class="select_box">
                                        <select v-model="current_sort_type" class="child_select_box">
                                            <option selected v-for="s in sort" v-on:click="current_sort_type = s.id"
                                                :value="s.id">@{{ s.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="flight_fillter_btn"><span>Fillter</span><img src="/img/fillter.svg"
                                        alt=""></button>
                            </div>

                        </div>

                        <!-- hetel details bottom -->
                        <div class="trip_selection_wrapper">

                            <!-- 1 -->
                            <div v-for="hotel in hotels" class="hotel_main_box_wrapper mb-4 pad__x">
                                <div class="hotel_content_wrapper_row">
                                    <div class="hotel_content_item_details">
                                        <div class="hotel_content_item_img">
                                            <img :src="hotel.HotelImages[0]" alt="">
                                        </div>

                                        <div class="hotel_right_content">
                                            <div class="heading_rating_stars">
                                                <div class="d-flex align-items-center mb-2">
                                                    <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 h6"
                                                        style="max-width: 280px;">
                                                        @{{ hotel['HotelName'] }}
                                                    </h4>
                                                    <div class="star_icons_wrapper d-flex ms-3">
                                                        <i v-for="n in 5" v-if="hotel.StarRating >= n"
                                                            class="fas fa-star star_fill"></i>

                                                        <i v-for="n in 5" v-if="hotel.StarRating < n"
                                                            class="fas fa-star star_normal"></i>
                                                    </div>
                                                </div>

                                                <div class="hotel_heading_description">
                                                    <p class="mb-0 txt_silver fs_14" v-html="hotel.HotelAddress.Address"></p>
                                                </div>
                                            </div>

                                            <div class="eye_illustration_custom_icons">
                                                <div class="custom_illustration_wrapper mb-2">
                                                    <div class="image_wrapper_illustration">
                                                        <img src="/img/eye_icon_illustration.svg" alt="">
                                                    </div>
                                                    <div class="custom_circle_wrapper d-flex">

                                                        <img v-for="n in 6" v-if="hotel.TripAdvisorDetail?.Rating >= n"
                                                            src="/img/round_circle_icon_fill.svg" alt="">


                                                        <img v-for="n in 5" v-if="hotel.TripAdvisorDetail?.Rating < n"
                                                            src="/img/round_circle_outline.svg" alt="">
                                                    </div>
                                                </div>
                                                <div class="after_custom_illustration">
                                                    <a href="#"
                                                        class="txt_silver text-decoration-none mb-0 fs_14">@{{ hotel.TripAdvisorDetail ? hotel.TripAdvisorDetail?.ReviewCount : 0 }}
                                                        Reviews</a>
                                                </div>
                                            </div>

                                            <div class="hotel_content_desc_features text_dark_blue fw_gilroy_medium">
                                                <div class="hotel_features_item">
                                                    <img src="/img/breakfast_icon.svg" alt="">
                                                    <p class="fs_14">Free breakfast</p>
                                                </div>

                                                <div class="hotel_features_item">
                                                    <img src="/img/wifi_icon.svg" alt="">
                                                    <p class="fs_14">Free internet</p>
                                                </div>

                                                <div class="hotel_features_item">
                                                    <img src="/img/check_icon_parking.svg" alt="">
                                                    <p class="fs_14">Free parking</p>
                                                </div>
                                            </div>

                                            <div class="hotel_content_rating_score">
                                                <div class="hotel_content_rating txt_blue_secondary fw_gilroy_medium fs_14">
                                                    @{{ hotel.TripAdvisorDetail ? (hotel.TripAdvisorDetail?.Rating) : 0 }}
                                                </div>
                                                <div class="hotel_content_rating_desc">
                                                    <h5 class="txt_blue_secondary fw_gilroy_bold mb-0 h6">
                                                        @{{ hotel_rating(hotel) }}</h5>
                                                    <p class="mb-0 txt_blue_secondary fw_gilroy_medium fs_14">
                                                        @{{ hotel.TripAdvisorDetail ? (hotel.TripAdvisorDetail?.ReviewCount) : 0 }}
                                                        User Review
                                                    </p>
                                                </div>
                                            </div>

                                            <div v-on:click.prevent="view_hotel(hotel)" class="button_wrapper">
                                                <a
                                                    class="btn text-center btn_pink medium_btn d-flex align-items-center justify-content-center flex-column btn__hotel">
                                                    <p class="fw_gilroy_bold mb-0 fs_14">@{{ hotel['BookCurrency'] }}
                                                        @{{ number_ceil(hotel['LBookPrice']) }} </p>
                                                    <p class="mb-0 fs_14">per night</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection


    @section('scripts-links')
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-UXF45L_ttfT3aecmRQiP-_dHFMfEEpM"></script>
        <script>
            const hotels_search_app = new Vue({
                el: "#hotels_search_app",

                data: {
                    selected_hotel: [],
                    new_search: true,
                    current_sort_type: 1,
                    sort: [{
                            id: 1,
                            name: "Price - Low To High"
                        },
                        {
                            id: 2,
                            name: "Price - High To Low"
                        },
                        {
                            id: 3,
                            name: "Star Rating"
                        },
                        {
                            id: 4,
                            name: "User Rating"
                        }
                    ],
                    api_response: null,
                    hotels: null,
                    search_key: @json($search_key),
                    search_data: @json($search_data),
                    filters: [{
                            StarRatings: ''
                        },
                        {
                            Refundable: '',
                            NonRefundable: '',
                        },
                        {
                            amenities: [

                            ]
                        },
                        {
                            localities: []
                        },
                        {
                            price: {
                                minPrice: 0,
                                maxPrice: 10,
                                selectedMinPrice: 0,
                                selectedMaxPrice: 0
                            },
                        }

                    ],
                    loadingMoreHotels: true,
                    currentPage: 1,
                    isRange: true,




                },

                methods: {

                    minimum_price_changed: async function(newValue) {
                        this.filters[4].price.selectedMinPrice = Math.floor(newValue)
                        //  await this.updateFilters();
                    },
                    maximum_price_changed: async function(newValue) {
                        this.filters[4].price.selectedMaxPrice = Math.ceil(newValue)
                        //    await this.updateFilters();
                    },
                    handle_amenities: async function(amenity) {
                        amenity.enabled = !amenity.enabled

                        await this.updateFilters();

                    },
                    handle_locality: async function(locality) {
                        locality.enabled = !locality.enabled;
                        await this.updateFilters();
                    },
                    async toggle_free_cancellation() {
                        this.filters[1].Refundable = !this.filters[1].Refundable;
                        await this.updateFilters();
                    },

                    async toggle_non_refundable() {
                        this.filters[1].NonRefundable = !this.filters[1].NonRefundable;
                        await this.updateFilters();
                    },
                    setFilterValue(filter, value) {


                    },

                    updateStarFilter: async function(starIndex) {
                        if (this.filters[0].StarRatings === starIndex) {
                            this.filters[0].StarRatings = ''
                        } else {
                            this.filters[0].StarRatings = starIndex
                        }

                        await this.updateFilters();

                    },
                    view_hotel: function(hotel) {
                        setTimeout(() => {
                            window.open('/hotel/view?search_id=' + hotel.HotelProviderSearchId +
                                    '&search_key=' + this.search_key, '_blank')
                                .focus();
                        })

                    },
                    number_ceil: function(price) {
                        return Math.ceil(price);
                    },


                    hotel_rating: function(hotel) {
                        if (!hotel.TripAdvisorDetail) {
                            return '';
                        }

                        if (hotel.TripAdvisorDetail?.ReviewExcellent == 0 && hotel.TripAdvisorDetail
                            ?.ReviewVeryGood == 0) {
                            return '';
                        }
                        if (hotel.TripAdvisorDetail?.ReviewExcellent >= hotel.TripAdvisorDetail?.ReviewVeryGood) {
                            return 'Excellent';
                        } else {
                            return 'Very Good'
                        }
                    },

                    updateFilters: async function() {
                        let star_rating = this.filters[0].StarRatings

                        if (star_rating) {
                            star_rating = star_rating.toString();
                        }
                        let min_price = this.filters[4].price.selectedMinPrice;
                        let max_price = this.filters[4].price.selectedMaxPrice;

                        let amenities = [];

                        for (let i = 0; i < this.filters[2].amenities.length; i++) {
                            if (this.filters[2].amenities[i].enabled == true) {
                                amenities.push(this.filters[2].amenities[i].name)
                            }
                        }
                        amenities = amenities.join("|");


                        let localities = [];

                        for (let i = 0; i < this.filters[3].localities.length; i++) {
                            if (this.filters[3].localities[i].enabled == true) {
                                localities.push(this.filters[3].localities[i].name)
                            }
                        }
                        localities = localities.join("|");

                        let fare_type = ''
                        if (this.filters[1].NonRefundable && this.filters[1].Refundable) {
                            fare_type = "Non-Refundable|Refundable"
                        } else if (this.filters[1].NonRefundable) {
                            fare_type = "Non-Refundable"
                        } else {
                            fare_type = "Refundable"
                        }



                        let filters = {
                            'MinPrice': min_price,
                            'MaxPrice': max_price,
                            'StarRatings': star_rating,
                            'Localities': localities,
                            'Amenities': amenities,
                            'FareType': fare_type
                        };
                        await this.searchForHotels(filters);


                    },
                    searchForHotels: async function(filters = null) {

                        let f = new FormData();
                        f.append('search_key', this.search_key)
                        if (filters) {
                            f.append('filters', JSON.stringify(filters))
                        }


                        let resp = await axios.post('/hotels/get', f)
                        this.api_response = resp.data
                        this.hotels = this.api_response.Hotels;
                        this.sort_results_by(this.current_sort_type);

                        if (this.new_search) {
                            this.new_search = false;
                        } else {
                            return;
                        }



                        let min = Math.floor(this.api_response.FiltersWithCount.MinPrice)
                        let max = Math.ceil(this.api_response.FiltersWithCount.MaxB2CPrice)
                        this.filters[4].price.minPrice = min;
                        this.filters[4].price.maxPrice = max
                        this.filters[4].price.selectedMinPrice = min
                        this.filters[4].price.selectedMaxPrice = max

                        this.$refs.range_slider_1.updateMinMax(min, max);
                        this.$refs.range_slider_1.updateSelectedMinMax(min, max);

                        this.filters[2].amenities = [];

                        for (let i = 0; i < this.api_response.FiltersWithCount.Amenities.length; i++) {
                            let a = {
                                id: i,
                                enabled: false,
                                name: this.api_response.FiltersWithCount.Amenities[i].Name
                            }

                            this.filters[2].amenities.push(a)
                        }


                        this.filters[3].localities = [];

                        for (let i = 0; i < this.api_response.FiltersWithCount.Localities.length; i++) {
                            let a = {
                                id: i,
                                enabled: false,
                                name: this.api_response.FiltersWithCount.Localities[i].Name
                            }

                            this.filters[3].localities.push(a)
                        }









                        this.init_map();
                    },

                    init_map: function() {
                        let locations = [];


                        for (let i = 0; i < this.hotels.length; i++) {
                            locations.push([this.hotels[i], this.hotels[i].HotelAddress.Latitude, this
                                .hotels[i].HotelAddress.Longitude
                            ])
                        }


                        let map = new google.maps.Map(document.getElementById('full_map_container'), {
                            zoom: 9,
                            center: new google.maps.LatLng(locations[0][1], locations[0][2]),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });

                        let infowindow = new google.maps.InfoWindow();

                        let marker, i;

                        for (i = 0; i < locations.length; i++) {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map
                            });
                            let self = this;
                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    self.selected_hotel = [];
                                    self.selected_hotel.push(locations[i][0])
        /*                           infowindow.setContent(locations[i][0]);
                                    infowindow.open(map, marker); */
                                }
                            })(marker, i));
                        }
                    },
                    loadNextPage: async function() {
                        if (this.loadingMoreHotels == true) {
                            return;
                        }
                        this.loadingMoreHotels = true;
                        this.currentPage += 1;

                        let f = new FormData();
                        f.append('search_key', this.search_key)
                        f.append('filters', JSON.stringify(this.filters))
                        f.append('PageNo', JSON.stringify(this.currentPage))


                        let resp = await axios.post('/hotels/get', f)
                        this.api_response = resp.data
                        // this.hotels.push(...this.api_response.Hotels);
                        this.loadingMoreHotels = false;
                    },
                    sort_results_by: function(s) {
                        let a_greater_b = 0;
                        let b_greater_a = 0;
                        let equal = 0;



                        let hotels = this.hotels;

                        if (s == 2) {
                            a_greater_b = -1;
                            b_greater_a = 1;
                            equal = 0;
                        } else if (s == 1) {
                            a_greater_b = 1;
                            b_greater_a = -1;
                            equal = 0;
                        }
                        if (s == 1 || s == 2) {
                            let sorted_stuff = hotels.sort((a, b) => {
                                if (a.LBookPrice < b.LBookPrice) {
                                    return b_greater_a;
                                }
                                if (a.LBookPrice > b.LBookPrice) {
                                    return a_greater_b;
                                }
                                if (a.LBookPrice == b.LBookPrice) {
                                    return equal;
                                }
                            })

                            this.hotels = sorted_stuff;
                        }
                        if (s == 3) {
                            let sorted_stuff = hotels.sort((a, b) => {


                                let hotel1_rating = parseFloat(a.StarRating);



                                let hotel2_rating = parseFloat(b.StarRating);


                                if (hotel1_rating < hotel2_rating) {
                                    return 1;
                                }
                                if (hotel1_rating > hotel2_rating) {
                                    return -1;
                                }
                                if (hotel1_rating == hotel2_rating) {
                                    return 0;
                                }
                            })

                            this.hotels = sorted_stuff;
                        }

                        if (s == 4) {
                            let sorted_stuff = hotels.sort((a, b) => {
                                let hotel1_rating = a.TripAdvisorDetail ? parseFloat(a.TripAdvisorDetail
                                    .Rating) : 0
                                let hotel2_rating = b.TripAdvisorDetail ? parseFloat(b.TripAdvisorDetail
                                    .Rating) : 0








                                if (hotel1_rating < hotel2_rating) {
                                    return 1;
                                }
                                if (hotel1_rating > hotel2_rating) {
                                    return -1;
                                }
                                if (hotel1_rating == hotel2_rating) {
                                    return 0;
                                }
                            })

                            this.hotels = sorted_stuff;
                        }

                    }



                },
                watch: {
                    current_sort_type: function(val) {
                        this.sort_results_by(val);
                    }
                },
                mounted: async function() {

                    await this.searchForHotels();


                    let self = this;

                    $(window).scroll(async function(e) {

                        let body = document.body;

                        let scrollTop = this.pageYOffset || body.scrollTop;


                        if (body.clientHeight - scrollTop < 1500) {
                            if (self.loadingMoreHotels == false) {
                                await self.loadNextPage();
                            }
                        }
                    });

                }
            })
        </script>
        <script></script>
    @endsection
