@extends('master', ['include_css' => true])
@section('css-links')
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="css/responsive4.css" media="all">


    <style>
        .nice-select.child_select_box.input__date {
            background-color: #f1f2f6;
            padding-left: 10px;

        }

        .current.text_dark_blue.nice_text {
            color: #a3a3a3;
        }

        .ticket_box_row_bottom {
            margin-top: 0px !important;
        }
    </style>
@endsection


@section('content')
    <div id="holidays_main" class="wrap_body index_wrap_body">
        <!-- ticket details -->
        <div class="container-lg pad_lg">
            <div class="ticket_box_wrap">
                <form class="ticket_box pad__x">
                    <!-- ticket_box_row_bottom -->
                    <div class="ticket_box_row_bottom align-items-xl-end">
                        <!-- 1 -->
                        <div class="wrap_inputs wrap_date_input_sign_in2">
                            <p class="nice_text ticket_text text-capitalize mb-2"><img src=".//img/icons8_in_air.svg"
                                    alt="icon" class="me-2"> Depart From</p>
                            <div class="ticket_input_1 ticket__input me-2">
                                <input v-model="departure_search_keyword"
                                    @input="departure_search_keyword = $event.target.value" type="text"
                                    placeholder="Select Origin City?">
                                <autocomplete-component :has_initial_value="initial_autocomplete_value"
                                    @autocomplete_result_selected="select_departure_result" :type="'airport'"
                                    :keyword="departure_search_keyword"></autocomplete-component>
                            </div>
                        </div>
                        <!-- 2 / 3 -->
                        <div class="wrap_date_input wrap_date_input_sign_in2 flex-grow-1">
                            <div class="wrap_date_after_box"></div>
                            <!-- 2 -->
                            <div class="wrap_inputs">
                                <p class="nice_text ticket_text text-capitalize mb-2"><img src=".//img/icons8_external.svg"
                                        width="20" alt="icon" class="me-2">
                                    Going To</p>
                                <div class="ticket_input_3 ticket__input me-2">

                                    <div class="select_box"
                                        style="width: auto;background-color:#f1f2f6;border-radius: 15px;">
                                        <select v-model="selected_country_id" class="child_select_box input__date">
                                            <option disabled>Destination</option>
                                            <option :value="c.country_id" v-for="c in countries">@{{ c.country_name }}
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 4 -->
                        <div class="wrap_inputs">
                            <p class="nice_text ticket_text text-capitalize mb-2"><img src=".//img/icons8_calendar_1.svg"
                                    width="20" alt="icon" class="me-2"> Date of travel</p>
                            <div class="ticket_input_3 ticket__input me-2" style="position: relative;">

                                <input id="start_date" class="input__date input_date_holiday"
                                    :value="first_date + ' - ' + second_date" type="text" placeholder="05 June 2022">
                                <div style="position: absolute; top: -44px; left: 0px;width:400px;">
                                    <date-picker :range="return_flight" :unique_id="unique_id"
                                        @first_date_changed="handle_first_flight_date"
                                        @second_date_changed="handle_second_flight_date" ref="date_picker_2">
                                    </date-picker>
                                </div>

                            </div>
                        </div>
                        <button type="button" v-on:click="searchForHolidays"
                            class="form_btn form_btn_hotel form_btn_hotel_sign_in"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <!-- flight box -->
        <div class="container-lg pad_lg">
            <div class="flight_box">
                <div class="flight_box_after"></div>
                <!-- flight sidebar -->
                <form class="flight_sidebar flight_sidebar_hotel">

                    {{--   <div class="map__box mb-3">
                        <h4 class="mb-4 h6">Search for hotels on Map</h4>
                        <div class="wrap_hotel_map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.9185124463!2d2.347035!3d48.85885484999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sEiffel%20Tower!5e0!3m2!1sen!2sbd!4v1654546998022!5m2!1sen!2sbd"
                                style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div> --}}
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
                                    <!-- custom range -->
                                    <div class="wrap_custom_range pt-3">
                                        <range-slider ref="range_slider_1" @min_changed="minimum_price_changed"
                                            @max_changed="maximum_price_changed" :min_value="filters[4].price.minPrice"
                                            :max_value="filters[4].price.maxPrice">
                                        </range-slider>

                                        <div class="d-flex justify-content-between px-3 mt-2">

                                            <div>@{{ api_response?.PackageProviders[0].PackageCurrency }} @{{ filters[4].price.selectedMinPrice }} </div>
                                            <div>@{{ api_response?.PackageProviders[0].PackageCurrency }} @{{ filters[4].price.selectedMaxPrice }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_2">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_2" aria-expanded="true"
                                    aria-controls="sidebar_collapse_2">
                                    Holiday Duration
                                </button>
                            </h2>
                            <div id="sidebar_collapse_2" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_2">
                                <div class="accordion-body">
                                    <!-- sidebar ul 1 -->
                                    <ul class="sidebar_ul_1 mt-4">
                                        <!-- 1 -->
                                        <li v-for="duration in filters[0].durations"
                                            v-on:click="duration.enabled = !duration.enabled">
                                            <label>
                                                @{{ duration.text }}
                                                <input disabled v-model="duration.enabled" type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <!-- 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_4">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_4" aria-expanded="true"
                                    aria-controls="sidebar_collapse_4">
                                    Theme
                                </button>
                            </h2>
                            <div id="sidebar_collapse_4" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_4">
                                <div class="accordion-body">
                                    <!-- sidebar ul 1 -->
                                    <ul class="sidebar_ul_1 mt-4">
                                        <!-- 1 -->
                                        <li v-for="theme in filters[1].themes"
                                            v-on:click="theme.enabled = !theme.enabled">
                                            <label>
                                                @{{ theme.theme_name }}
                                                <input disabled type="checkbox" v-model="theme.enabled">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- 5 -->
                        {{-- <div class="accordion-item">
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
                                        <div class="rating__box s_rating" onclick="star_rate(1)" data-rating="1">
                                            <i class="fas fa-star"></i>
                                            <span>0.1</span>
                                        </div>
                                        <!-- 2 -->
                                        <div class="rating__box s_rating" onclick="star_rate(2)" data-rating="2">
                                            <i class="fas fa-star"></i>
                                            <span>2</span>
                                        </div>
                                        <!-- 3 -->
                                        <div class="rating__box s_rating" onclick="star_rate(3)" data-rating="3">
                                            <i class="fas fa-star"></i>
                                            <span>3</span>
                                        </div>
                                        <!-- 4 -->
                                        <div class="rating__box s_rating" onclick="star_rate(4)" data-rating="4">
                                            <i class="fas fa-star"></i>
                                            <span>4</span>
                                        </div>
                                        <!-- 5 -->
                                        <div class="rating__box s_rating" onclick="star_rate(5)" data-rating="5">
                                            <i class="fas fa-star"></i>
                                            <span>5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- 6 -->
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_6">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_6" aria-expanded="true"
                                    aria-controls="sidebar_collapse_6">
                                    Show hotels with
                                </button>
                            </h2>
                            <div id="sidebar_collapse_6" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_6">
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
                                                Clean pass
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 3 -->
                                        <li>
                                            <label>
                                                Free cancellation
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 4 -->
                                        <li>
                                            <label>
                                                Free breakfast
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 5 -->
                                        <li>
                                            <label>
                                                Free wifi
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 6 -->
                                        <li>
                                            <label>
                                                Couple friendly
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 7 -->
                                        <li>
                                            <label>
                                                Yatra smart
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 8 -->
                                        <li>
                                            <label>
                                                Quarantine and self isolation
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 9 -->
                                        <li>
                                            <label>
                                                Women friendly
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 10 -->
                                        <li>
                                            <label>
                                                Logstay hotels
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 11 -->
                                        <li>
                                            <label>
                                                Pet frindly
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div> --}}
                        <!-- 7 -->
                        {{-- <div class="accordion-item">
                            <h2 class="accordion-header" id="sidebar_heading_7">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#sidebar_collapse_7" aria-expanded="true"
                                    aria-controls="sidebar_collapse_7">
                                    User rating
                                </button>
                            </h2>
                            <div id="sidebar_collapse_7" class="accordion-collapse collapse show"
                                aria-labelledby="sidebar_heading_7">
                                <div class="accordion-body">
                                    <div id="user_rating" class="rating__boxes mt-4">
                                        <!-- 1 -->
                                        <div class="rating__box u_rating" onclick=user_rate(1) data-rating="1">
                                            <i class="fas fa-star"></i>
                                            <span>0.1</span>
                                        </div>
                                        <!-- 2 -->
                                        <div class="rating__box u_rating" onclick=user_rate(2) data-rating="2">
                                            <i class="fas fa-star"></i>
                                            <span>2</span>
                                        </div>
                                        <!-- 3 -->
                                        <div class="rating__box u_rating" onclick=user_rate(3) data-rating="3">
                                            <i class="fas fa-star"></i>
                                            <span>3</span>
                                        </div>
                                        <!-- 4 -->
                                        <div class="rating__box u_rating" onclick=user_rate(4) data-rating="4">
                                            <i class="fas fa-star"></i>
                                            <span>4</span>
                                        </div>
                                        <!-- 5 -->
                                        <div class="rating__box u_rating" onclick=user_rate(5) data-rating="5">
                                            <i class="fas fa-star"></i>
                                            <span>5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- 8 -->
                        {{-- <div class="accordion-item">
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
                                                North goa
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 3 -->
                                        <li>
                                            <label>
                                                South goa
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 4 -->
                                        <li>
                                            <label>
                                                Panjim
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 5 -->
                                        <li>
                                            <label>
                                                Old goa
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div> --}}
                        <!-- 9 -->
                        {{-- <div class="accordion-item">
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
                                                Central air conditioning
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 3 -->
                                        <li>
                                            <label>
                                                Airport transportation
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 4 -->
                                        <li>
                                            <label>
                                                Wifi
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 5 -->
                                        <li>
                                            <label>
                                                Laundry facilities
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 6 -->
                                        <li>
                                            <label>
                                                Airport transportation free
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 7 -->
                                        <li>
                                            <label>
                                                ATM/banking
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 8 -->
                                        <li>
                                            <label>
                                                Bar
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 9 -->
                                        <li>
                                            <label>
                                                Suitable for children
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 10 -->
                                        <li>
                                            <label>
                                                Jacuzzi
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <!-- 11 -->
                                        <li>
                                            <label>
                                                Fitness center
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div> --}}

                        <button v-on:click.prevent="clear_filters" type="reset"
                            class="sidebar_clear_filter_button mb-3">Clear fillter</button>
                    </div>
                </form>

                <!-- Hotel -->
                <div class="flight_details">
                    <!-- Hote details top -->
                    <div class="hotel_details_top">
                        <div class="hotel_heading_details">
                            <img src="/img/icons8_holiday.svg" alt="">
                            <h4 class="mb-0 mt-2 ms-3 trip_box_heading fw_gilroy_medium h6">Select Your Holidays</h4>
                        </div>
                        <!-- flight details rigth -->
                        <div class="flight_details_right">
                            <div class="child_details_right">
                                <p class="mb-0 me-2 fs_14">Sorted by:</p>
                                <!-- select box -->
                                <div class="select_box">
                                    <select class="child_select_box" @change="switchSelect($event)">
                                        <option value="1" selected>Popular</option>
                                        <option value="2">Price - Low to High</option>
                                        <option value="3">Price - Hight to Low</option>
                                        <option value="4">User Rating - Hight to Low</option>
                                    </select>
                                </div>
                            </div>
                            <button class="flight_fillter_btn"><span>Fillter</span><img src="/img/fillter.svg"
                                    alt=""></button>
                        </div>

                    </div>

                    
                    <!-- hetel details bottom -->
                    <div v-if="isLoading" class="loader">
                        <div class="bubble"></div>
                        <div class="bubble"></div>
                        <div class="bubble"></div>              
                    </div>
                    <div v-else class="trip_selection_wrapper">
                        <!-- girds -->
                        <div>
                            <div class="fund_girds activities_girds pb-5 pt-0">
                                <!-- 1 -->
                                <div v-if="packages.length > 0" v-for="(package, index) in packages" :key="index" class="fund_grid l_grid_slide mx-0" >
                                    <div class="child_l_grid_slide child_l_grid_slide3" :style="getStyle(package)">
                                        <div class="l_slide_top">
                                            <a href="#"
                                                class="slide_top_link slide_top_link2 slide_top_link3 ms-auto">
                                                <img src="/img/icons8_love.svg" alt="icon">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="l_slide_bottom pt-3">
                                        <div class="row landing_slide_row_1 border-bottom-0">
                                            <div class="col-12 d-flex mb-2">
                                                <a href="#"
                                                    class="l_slide_link h6 text_dark_blue fw_gilroy_medium">@{{ package.PackageTitle }}</a>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center">
                                                <p class="fs_14 fw_gilroy_medium me-3 pb-2"><i
                                                        class="fas fa-map-marker-alt me-1"></i><span
                                                        class="txt_silver">@{{ package.PackageCities[0].Destination }}</span></p>
                                                <p class="fs_14 fw_gilroy_medium pb-2"><i
                                                        class="far fa-clock me-1"></i><span
                                                        class="txt_silver">@{{ package.PackageDay }}
                                                        Days</span></p>
                                            </div>
                                            <div class="col-12 d-flex align-items-center">
                                                <div class="d-flex flex-column">
                                                    <h5 class="text_dark_blue mb-0 fw_gilroy_bold">From
                                                        @{{ package.PackageCurrency }} @{{ package.PackagePrice }}</h4>
                                                        <p class="txt_dark_blue fs_14 mb-0 fw_gilroy_medium">
                                                        </p>
                                                </div>
                                                <a v-on:click="choose_package(package)" href="#"
                                                    class="btn py-2 fs_14 px-3 btn_pink medium_btn d-inline-block ms-auto">Check
                                                    Availability</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div v-if="packages.length === 0" v-for="skeleton in skeletons" class="fund_grid l_grid_slide mx-0" >
                                    <div class="card-img skeleton">
                                        
                                    </div>
                                    <div class="card-body">
                                        <h2 class="card-title skeleton"></h2>
                                        <h2 class="card-title skeleton"></h2>
                                        <p class="card-intro skeleton"></p>
                                    </div>                                        
                                </div> -->
                                <div v-if="packages.length === 0" v-for="skeleton in skeletons" class="fund_grid l_grid_slide mx-0" >
                                    <div class="movie--isloading">
                                        <div class="loading-image"></div>
                                        <div class="loading-content">
                                            <div class="loading-text-container">
                                            <div class="loading-main-text"></div>
                                            <div class="loading-sub-text"></div>
                                            </div>
                                            <div class="loading-btn"></div>
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
    <script>
        const holidays_main = new Vue({
            el: "#holidays_main",

            data: {
                return_flight: true,
                unique_id: 'flight_search',
                first_date: @json($start_date),
                second_date: @json($end_date),
                selected_country_id: @json($country_id),
                selected_month: '',
                departure_search_keyword: '',
                selected_departure_result_object: {
                    airport_id: @json($airport_id)
                },
                initial_autocomplete_value: '',
                api_response: null,
                packages: [],

                theme: @json($theme),
                countries: @json($countries),
                filters: [{
                        durations: [{
                                enabled: false,
                                min: 1,
                                max: 3,
                                text: '1-3 Days'
                            },
                            {
                                enabled: false,
                                min: 3,
                                max: 5,
                                text: '3-5 Days'
                            },

                            {
                                enabled: false,
                                min: 5,
                                max: 7,
                                text: '5-7 Days'
                            },
                            {
                                enabled: false,
                                min: 7,
                                max: 14,
                                text: '7-14 Days'
                            },
                            {
                                enabled: false,
                                min: 14,
                                max: 1000,
                                text: '14 Days or more'
                            }

                        ]
                    },
                    {
                        themes: []
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
                skeletons: [...Array(6)],
                isLoading: false
            },

            mounted: async function() {
                this.loadingScreen();
                if (this.selected_departure_result_object.hasOwnProperty('airport_id')) {
                    let airport_object = await axios.post('/autocomplete/airport/id', {
                        airport_id: this.selected_departure_result_object.airport_id
                    });
                    this.selected_departure_result_object = airport_object.data;

                }
                let resp = await this.searchForHolidays();

                this.api_response = resp.data;
                this.packages = this.api_response.PackageProviders;

                let min_price = -1;
                let max_price = -1;

                for (let i = 0; i < this.packages.length; i++) {
                    if (min_price == -1 || min_price > this.packages[i].PackagePrice) {
                        min_price = this.packages[i].PackagePrice;
                    }

                    if (max_price == -1 || max_price < this.packages[i].PackagePrice) {
                        max_price = this.packages[i].PackagePrice;
                    }
                    for (let y = 0; y < this.packages[i].PackageTheme.length; y++) {
                        if (!this.themeAlreadyAddedToFilters(this.packages[i].PackageTheme[y]))

                            this.filters[1].themes.push({
                                theme_id: this.packages[i].PackageTheme[y].ThemeId,
                                theme_name: this.packages[i].PackageTheme[y].ThemeName,
                                enabled: false
                            })


                    }

                }
                this.$refs.range_slider_1.updateMinMax(min_price, max_price);
                this.$refs.range_slider_1.updateSelectedMinMax(min_price, max_price);
                this.filters[4].price.minPrice = min_price;
                this.filters[4].price.maxPrice = max_price
                this.filters[4].price.selectedMinPrice = min_price
                this.filters[4].price.selectedMaxPrice = max_price
                let input_dates = document.querySelectorAll(".input_date_holiday");
                this.$refs.date_picker_2.attach_date_picker(input_dates, '2022-12-12', '2022-12-25');
            },

            methods: {

                switchSelect(event) {
                    switch(event.target.value) {
                        case '2':
                            this.packages.sort(function(a, b){return a.PackagePrice-b.PackagePrice})
                            console.log(this.packages)
                            break;
                        case '3': 
                            this.packages.sort(function(a, b){return b.PackagePrice-a.PackagePrice})
                            console.log(this.packages)
                            break;
                        default:
                            console.log('NO')
                            break;
                    }
                    console.log(event.target.value)
                },

                handle_first_flight_date(event) {
                    this.first_date = event
                },
                handle_second_flight_date(event) {
                    this.second_date = event
                },
                searchForHolidays: async function() {
                    let data = {};
                    if (this.selected_departure_result_object.airport_id) {
                        data.airport_id = this.selected_departure_result_object.airport_id
                    }
                    if (this.selected_country_id) {
                        data.country_id = this.selected_country_id
                    }
                    if (this.first_date) {
                        data.start_date = this.first_date
                    }
                    if (this.second_date) {
                        data.end_date = this.second_date
                    }
                    return await axios.post("/holidays/get", data);
                },
                themeAlreadyAddedToFilters: function(theme) {
                    let exists = false;
                    for (let i = 0; i < this.filters[1].themes.length; i++) {



                        if (this.filters[1].themes[i].theme_id == theme.ThemeId) {
                            exists = true;
                        }
                    }


                    return exists;
                },

                clear_filters: function() {
                    for (let i = 0; i < this.filters[0].durations.length; i++) {
                        this.filters[0].durations[i].enabled = false
                    }

                    for (let i = 0; i < this.filters[1].themes.length; i++) {
                        this.filters[1].themes[i].enabled = false
                    }
                    this.$refs.range_slider_1.updateSelectedMinMax(this.filters[4].price.selectedMinPrice, this
                        .filters[4].price.selectedMaxPrice);

                },
                minimum_price_changed: async function(newValue) {
                    this.filters[4].price.selectedMinPrice = Math.floor(newValue)

                },
                maximum_price_changed: async function(newValue) {
                    this.filters[4].price.selectedMaxPrice = Math.ceil(newValue)

                },
                select_departure_result: function(data) {
                    this.departure_search_keyword = data.Name;
                    this.selected_departure_result_object = data;
                },
                choose_package: function(package) {
                    let id = package.PackageId;

                    setTimeout(() => {
                        window.open('/holidays/view?id=' + id, '_blank')
                            .focus();
                    })
                },
                getStyle: function(package) {
                    return {
                        background: `url('${package.PackageMainImage}') no-repeat`,
                        backgroundSize: "cover",
                    }
                },
                loadingScreen: function() {
                    var self = this;
                    //Add scope argument to func, pass this after delay in setTimeout
                    setTimeout(() => {
                        self.isLoading = false;
                    }, 2000);
                }
            }
        });
    </script>
@endsection
