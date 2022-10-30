@extends('master')

@section('css-links')
    <link rel="stylesheet" href="/css/style4.css">
    <link rel="stylesheet" href="/css/responsive4.css" media="all">


    <style>
        li {
            font-family: 'gilroy_medium';
            font-size: 14px;
            line-height: 1.7;
        }

        .swiper_2 {
            margin-left: 0px;
            margin-right: 0px;
        }
    </style>
@endsection

@section('content')
    <div id="holidays_details" class="wrap_body index_wrap_body">
        <!-- hero -->
        <div class="container-lg pad_lg mt-sm-5 mt-4 mb-4">
            <div class="hero_details">
                <!-- Slider main container -->
                <div class="swiper hero_slider">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div v-for="img in api_response?.PackageImages" class="swiper-slide hotel_slide activity_slide">
                            <div class="row">
                                <h4 class="text_dark_blue mb-4 col-md-8 pe-md-0 pe-3">@{{ api_response?.Overview.PackageTitle }}</h4>
                                {{-- <div class="col-md-4 list-unstyled d-flex justify-content-end mb-4">
                                    <p class="mb-0 txt_dark_blue fw_gilroy_bold me-3">Share</p>
                                    <a href="#" class="holiday_slider_link me-3"><img src="/img/icons8_linkedin.svg"
                                            alt="icon"></a>
                                    <a href="#" class="holiday_slider_link me-3"><img src="/img/icons8_facebook.svg"
                                            alt="icon"></a>
                                    <a href="#" class="holiday_slider_link me-3"><img src="/img/icons8_twitter_1.svg"
                                            alt="icon"></a>
                                    <a href="#" class="holiday_slider_link me-3"><img
                                            src="/img/icons8_instagram_logo.svg" alt="icon"></a>
                                </div> --}}
                            </div>
                            <div class="position-relative review_hotel_slider">
                                <img :src="img">
                            </div>
                        </div>

                    </div>

                    <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
                </div>
                <div class="wrap_pagination_image">
                    {{--  <div class="slide_user_details me-auto box_shadow">
                        <!-- left -->
                        <div class="slide_user_details_left">
                            <div class="slide_user_details_left_img">
                                <div class="d-flex align-items-center">
                                    <img src="/img/user_11.svg" alt="">
                                    <div class="ms-3">
                                        <p class="text_dark_blue opacity-75 mb-1 fs_14">Seller</p>
                                        <h3 class="h6 text_dark_blue text-capitalize fw_gilroy_bold mb-1">Julio Corkery</h3>
                                        <p class="text_dark_blue opacity-75 mb-0 fs_14">Posted May 14 11:09</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- right -->
                        <div class="slide_user_details_right">
                            <div>
                                <!-- 1 -->
                                <div class="review_select_trip d-flex align-items-center  mb-3">
                                    <div class="d-flex align-itmes-center me-2">
                                        <img width="18" class="me-1" src="/img/user_star_gold.svg" alt="">
                                        <img width="18" class="me-1" src="/img/user_star_gold.svg" alt="">
                                        <img width="18" class="me-1" src="/img/user_star_gold.svg" alt="">
                                        <img width="18" class="me-1" src="/img/user_star_gold.svg" alt="">
                                        <img width="18" src="/img/user_star_silver.svg" alt="">
                                    </div>
                                    <p class="mb-0 text_silver fs_14">1,890 Reviews</p>
                                </div>
                                <!-- 2 -->
                                <p class="mb-0 text_silver fs_14"><i class="fas fa-stopwatch me-1"></i> Remaining Time: 10
                                    Days Left</p>
                            </div>
                        </div>
                    </div> --}}
                    <div class="swiper-pagination mt-3"></div>
                </div>

            </div>
        </div>

        <!-- about this tour -->
        <div class="container-lg pad_lg">
            <div class="row gx-0 about_tour bg-white border_radius_20 box_shadow p-4 mb-3 flex-lg-row flex-column-reverse">
                <div class="about_tour_left col-xl-8 col-lg-7 pe-md-4 p-0">
                    <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-3">Description</h5>
                    <p class="fw_gilroy_regular text_dark_blue mb-4" v-html="api_response?.Overview.PackageDescription"></p>
                </div>
                <div class="about_tour_right col-xl-4 col-lg-5 pb-1">
                    <div class="about_tour_right_inner row gx-0">
                        <!-- 1 -->
                        <div class="pb-3 align-items-center border-bottom col-lg-12 col-md-6">
                            <h5 class="fw_gilroy_bold txt_dark_blue">Tour Package</h5>
                            <div class="d-flex flex-wrap align-items-center">
                                <p class="fs_14 fw_gilroy_medium me-3 pb-2 mb-0"><i
                                        class="fas fa-map-marker-alt me-1 fs-6"></i><span class="txt_silver">
                                        @{{ api_response?.Overview.PackageCityName }}
                                    </span></p>
                                <p class="fs_14 fw_gilroy_medium pb-2 mb-0"><i class="far fa-clock me-1 fs-6"></i><span
                                        class="txt_silver">@{{ api_response?.Overview.PackageDays }} Days </span></p>
                            </div>
                        </div>
                        <!-- 2 -->
                        <div class="row gx-0 py-lg-3 pb-3 d-flex align-items-center border-bottom col-lg-12 col-md-6">
                            <div class="col-md-5 col-4">
                                <p class="h6 txt_silver text-center">Starting From:</p>
                                <h5 class="text-center txt_dark_blue fw_gilroy_bold"> @{{ api_response?.Overview.PackageCurrency }}
                                    @{{ api_response?.Overview.PackagePrice }}</h5>
                                <p class="h6 txt_silver text-center mb-0"></p>
                            </div>
                            <div class="col-md-7 col-8 ps-lg-0 ps-4">
                                <a href="#package_options"
                                    class="btn py-1 btn_pink medium_btn py-2 px-2 d-inline-block ms-auto text-capitalize d-block w-100 fs_14">View
                                    package options</a>
                            </div>
                        </div>
                        <!-- 3 -->
                        <div class="pt-3 pb-md-2 pb-1 col-12">
                            <p class="txt_dark_blue fw_gilroy_medium text-center mb-2"><img src="/img/icons8_ok.svg"
                                    class="me-1" alt="icon"> Book now for tomorrow</p>
                            <p class="txt_dark_blue fw_gilroy_medium text-center mb-2"><img src="/img/icons8_ok.svg"
                                    class="me-1" alt="icon"> 24 Hours Confirmation</p>
                            <div class="d-flex justify-content-center pt-1">
                                <a href="tel:0790746132"
                                    class="btn py-1 btn_silver medium_btn py-2 px-5 text-capitalize fs_14">Call to book</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- container -->
        <div onclick="view_availability_remove(this)" class="view_availability_popup_after"></div>
        <div class="container-lg pad_lg pb-3">
            <div id="package_options" class="p-4 bg-white border_radius_20 box_shadow mx-auto">
                <h2 class="h5 fw_gilroy_bold txt_blue_secondary text-uppercase mb-4 pt-2">Package options</h2>
                <div class="d-flex mb-4">
                    <a href="#"
                        class="btn orange_btn medium_btn border_radius_10 px-4 py-2 me-2">@{{ api_response?.Overview.PackageDays }} Days</a>
                    {{--    <a href="#" class="btn btn_silver medium_btn border_radius_10 px-4 py-2">8 Days</a> --}}
                </div>

                <div>
                    <!-- 1 -->

                    <!-- 2 -->
                    <div class="holiday_package">
                        <div class="r_holiday_package_option_wrapper_1">
                            <div class="r_holiday_package_img">
                                <img :src="api_response?.PackageImages[0]" alt="">
                            </div>

                            <div class="r_holiday_package_text_content ps-md-4 px-sm-3 px-0">
                                <h3 class="h5 fw_gilroy_bold txt_blue_secondary">@{{ api_response?.Overview.PackageTitle }}
                                </h3>
                                <div class="fw_gilroy_medium d-flex flex-wrap mt-2 pb-1 fs_14 paragraph_mb_0">
                                    <p class="me-3 txt_silver d-flex align-items-center mb-3"><i
                                            class="fas fa-map-marker-alt me-1 text_dark_blue fs-6"></i>
                                        @{{ api_response?.Overview.PackageCityName }}
                                    </p>
                                    <p class="me-3 txt_silver d-flex align-items-center mb-3"><i
                                            class="far fa-clock me-1 text_dark_blue fs-6"></i> <span
                                            class="fw_gilroy_bold me-1"> @{{ api_response?.Overview.PackageDays }} </span> Days</p>
                                    {{--    <p class="me-3 txt_silver d-flex align-items-center mb-3">
                                        <img width="20" src="/img/star_icon_yellow.svg" class="me-1"
                                            alt="">
                                        <img width="20" src="/img/star_icon_yellow.svg" class="me-1"
                                            alt="">
                                        <img width="20" src="/img/star_icon_yellow.svg" class="me-1"
                                            alt="">
                                        <img width="20" src="/img/star_icon_yellow.svg" class="me-1"
                                            alt="">
                                        <img width="20" src="/img/star_icon_silver.svg" class="me-2"
                                            alt="">
                                        201 Reviews
                                    </p> --}}
                                </div>

                                <div class="d-flex flex-md-row flex-column flex-wrap justify-content-between">
                                    <div class="d-flex align-items-center review_holiday_package_btns">
                                        <div class="me-sm-0 me-2">
                                            <p class="txt_silver fw_gilroy_medium me-sm-3 me-2 fs_12 mb-0">Starting From:
                                            </p>
                                            <h6 class="h5 txt_blue_secondary fw_gilroy_bold mb-0">@{{ api_response?.Overview.PackageCurrency }}
                                                @{{ api_response?.Overview.PackagePrice }}</h6>
                                            <p class="txt_silver fw_gilroy_medium me-sm-3 me-2 fs_12 mb-0"></p>
                                        </div>
                                        <a style="cursor: pointer" v-on:click="selectPackageHotelOnly"
                                            class="btn btn_pink medium_btn px-md-2 px-sm-3 px-2 py-2 fs_14 mb-1">View
                                            Package Options</a>
                                    </div>
                                    <div v-if="package_options?.include_flight == 1" class="review_holiday_package_btns_border d-md-block d-none"></div>
                                    <div v-if="package_options?.include_flight == 1" class="d-flex align-items-start review_holiday_package_btns">
                                        <div class="review_holiday_package_d2 me-md-0 me-2">
                                            <p class="txt_silver fw_gilroy_medium me-sm-3 me-2 fs_12 mb-0">Starting From:
                                            </p>
                                            <h6 class="h5 txt_blue_secondary fw_gilroy_bold mb-0">@{{ api_response?.Overview.PackageCurrency }}
                                                @{{ api_response?.Overview.PackagePrice }}</h5>
                                                <p class="txt_silver fw_gilroy_medium me-sm-3 me-2 fs_12 mb-0">Tour +
                                                    Flight</p>
                                        </div>
                                        <div class="flight_price_text">


                                            <div class="view_availability_popup "
                                                :class="{ view_availability_popup_active: isFlightPanelVisible }">
                                                <div class="d-flex justify-content-between flex-wrap pt-2">
                                                    <h6 class="txt_dark_blue f w_gilroy_bold me-2"><img width="20"
                                                            class="me-2" src="/img/airplane_take_off.svg"
                                                            alt="icon"> Please select departure airport</h6>
                                                    <p v-on:click="selectPackageHotelOnly" style="cursor: pointer"
                                                        class="txt_silver fw_gilroy_medium me-2 fs_14">I don't need flight
                                                    </p>
                                                </div>
                                                <input v-model="departure_search_keyword"
                                                    @input="departure_search_keyword = $event.target.value"
                                                    id="ticket_input_a" class="input__gray" type="text"
                                                    placeholder="Departure Airport">
                                                <div style="position: relative">
                                                    <div style="position: absolute; top: -50px;">
                                                        <autocomplete-component
                                                            :has_initial_value="initial_autocomplete_value"
                                                            @autocomplete_result_selected="select_departure_result"
                                                            :type="'airport'" :keyword="departure_search_keyword">
                                                        </autocomplete-component>
                                                    </div>
                                                </div>
                                                <a style="pointer: cursor;    max-width: 200px;
                                                margin: 0 auto;"
                                                    v-on:click="selectPackage" v-if="selected_departure_result"
                                                    class="mt-2 btn py-1 btn_pink medium_btn py-2 px-2 d-inline-block ms-auto text-capitalize d-block fs_14"
                                                    style="max-width:250px;">Continue</a>
                                            </div>
                                            <button v-on:click.prevent="isFlightPanelVisible = true"
                                                class="btn orange_btn medium_btn px-md-5 px-sm-4 px-3 py-2 fs_14 ">View
                                                Availability</button>
                                            <p class="fs_12 txt_silver mb-0 mt-1">*Flight Prices will display on next sceen
                                            </p>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="r_holiday_txt_icon_arrow ps-1">
                                <div class="text-center">
                                    <p class="fw_gilroy_medium mb-3 fs_14">View all inclusions <br> & details</p>
                                    <button class="holiday_package_toggle reset_btn">
                                        <img width="32" src="/img/blue_down_arrow_icon.svg" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="r_holiday_package_option_wrapper_2" style="display: flex;flex-wrap:nowrap;">
                            {{--  <div class="d-flex justify-content-end w-100">
                                <button class="holiday_package_remove bg-transparent border-0">
                                    <img width="18" src="/img/cross_icon_red_x.svg" alt="">
                                </button>
                            </div> --}}
                            <div class="swiper hero_slider_2 swiper_2"
                                style="
                                max-width: 500px;
                        ">
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div v-for="hotel in hotels" class="swiper-slide hotel_slide activity_slide">
                                        <div class="position-relative review_hotel_slider">
                                            <div class="r_holiday_package_img_wrapper_2 box_shadow border_radius_10 mt_n_10"
                                                style="width: auto; min-width:400px;">
                                                <div class="r_holiday_package_img_2">
                                                    <img :src="hotel.HotelService.ServiceDefaultImage" alt="">
                                                </div>
                                                <div class="p-3">
                                                    <p class="fw_gilroy_medium mb-2 txt_blue_secondary">
                                                        @{{ hotel.HotelService.ServicePartnerName }}</p>
                                                    <div class="d-flex flex-wrap">
                                                        <p class="fs_14 txt_silver d-flex align-items-center me-4"><i
                                                                class="fas fa-map-marker-alt me-1 text_dark_blue fs-6"></i>
                                                            @{{ hotel.HotelService.ServiceCityName }}</p>
                                                     {{--    <p class="fs_14 txt_silver d-flex align-items-center"><i
                                                                class="far fa-clock me-1 text_dark_blue fs-6"></i> <span
                                                                class="fw_gilroy_bold me-1">4/6</span> Days</p> --}}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
                                <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
                            </div>


                            <div class="ps-md-4 px-sm-3 px-0 px-2 mt_n_10">
                                <div>
                                    <div class="mb-0" >
                                        <p class="mb-0"
                                            style="
                                        font-size: 20px;
                                        color: gray;
                                        font-family: gilroy_bold;
                                    ">
                                            Hotel Name</p>
                                        <p  class="mb-0" style="font-family: gilroy_bold">@{{ current_slide_hotel?.HotelService.ServicePartnerName }}</p>
                                    </div>


                                    <p class="mb-0" style="font-family: gilroy_bold">Address: @{{ current_slide_hotel?.HotelService.ServiceAddress }}</p>

                                    <p class="mb-0"  style="font-family: gilroy_bold">Check-in Date: @{{ format_date(current_slide_hotel?.HotelService.ServiceCheckInDate) }}</p>

                                    <p class="mb-0"  style="font-family: gilroy_bold">Checkout Date: @{{ format_date(current_slide_hotel?.HotelService.ServiceCheckOutDate) }}</p>


                                    <p class="mb-0"  style="font-family: gilroy_bold">City: @{{ current_slide_hotel?.HotelService.ServiceCityName }}</p>


                                    <p class="mb-0"  style="font-family: gilroy_bold">Room Type: @{{ current_slide_hotel?.HotelService.ServiceName }}</p>


                                    <p class="mb-0"  style="font-family: gilroy_bold">Meal Plan: @{{ current_slide_hotel?.HotelService.ServiceSupplementName }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- container -->
        {{-- <div class="container-lg pad_lg">
            <div class="row gx-0">
                <div class="col-xl-5 pe-xl-3 mb-4">
                    <div class="bg-white box_shadow p-4 border_radius_20">
                        <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-3 pb-3">Stay Plan (3 Nights , 4 Days)
                        </h5>
                        <!--  -->
                        <div>
                            <!-- 1 -->
                            <div v-for="(day, dayIndex) in api_response?.PackageDayWiseDetail" class="row_experience flex-wrap mb-0 position-relative">
                                <div class="r_experience_img_after stay_summary_top_after"></div>
                                <div class="r_experience_img stay_summary_top stay_summary_top2">
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-sm">Day</p>
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-1">@{{ dayIndex + 1 }}</p>
                                </div>
                                <div
                                    class="r_experience_desc stay_summary_middle stay_summary_middle2 mt-2 d-flex align-items-center flex-wrap pt-1">
                                    <p v-for="highlight in day.DayHighlights"
                                        class="fw_gilroy_medium fw_500 txt_dark_blue mb-0 py-2 me-4 d-flex align-items-center">
                                       @{{ highlight }}
                                    </p>

                                </div>
                                <div class="stay_summary_bottom">
                                    <p class="fw-gilroy_medium mb-0"><img src="/img/icons8_night.svg" class="me-2"
                                            alt="icon"><span class="txt_dark_blue">Leh</span><span
                                            class="txt_silver"> - July, 14 - Night</span></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-7 mb-4">
                    <div class="bg-white box_shadow p-4 border_radius_20">
                        <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-2 pb-3">Location</h5>
                        <iframe class="experience_location experience_location2"
                            src="https:/www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1662466071671!5m2!1sen!2sbd"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- container -->
        <div class="container-lg pad_lg">
            <div class="row">
                <div class="col-lg-6 pe-lg-2">
                    <div class="bg-white border_radius_20 box_shadow p-4 mb-5">
                        <!--  -->
                        <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-5">Details</h5>
                        <!--  -->
                        <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-4">Inclusion</h5>

                        <div v-html="api_response?.Overview.PackageInclusion">

                        </div>



                        <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-4">Exclusion</h5>

                        <div v-html="api_response?.Overview.PackageExclusion">

                        </div>

                        <!--  -->
                        <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-4">Terms & Condition

                            <br>
                            <div v-html="api_response?.Overview.PackageTNC">

                            </div>

                            <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-4">Cancellation Policy</h5>
                            <p v-html="cancellation_policy()"></p>

                            {{--       <!--  -->
                            <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-4">Travel Insurance</h5> --}}


                    </div>
                </div>
                <div class="col-lg-6 ps-lg-2">
                    <div class="bg-white border_radius_20 box_shadow p-4 mb-5">
                        <h5 class="fw_gilroy_bold text-uppercase text_dark_blue mb-3">Includes</h5>
                        <!--  -->
                        <div v-for="(day, dayIndex) in api_response?.PackageDayWiseDetail">
                            <!-- 1 -->
                            <div class="row_experience flex-wrap mb-0 position-relative pb-4">
                                <div class="r_experience_img_after stay_summary_top_after"></div>
                                <div class="r_experience_img stay_summary_top stay_summary_top2">
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-sm">Day</p>
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-1">@{{ dayIndex + 1 }}</p>
                                </div>
                                <div
                                    class="r_experience_desc stay_summary_middle stay_summary_middle3 mt-2 ms-3 d-flex align-items-center">
                                    <div class="row w-100 gx-xl-3 gx-0 pb-1">
                                        <div class="col-xl-6 mb-xl-0 mb-4">
                                            <img :src="day.DayImage" alt="image">
                                        </div>
                                        <div class="col-xl-6">
                                            <h5 class="txt_dark_blue fw_gilroy_bold fs_18">@{{ day.DayTitle }}</h5>
                                            <p class="txt_silver fw_gilroy_medium">@{{ day.DayDescSummary }}</p>
                                            {{--     <div>
                                                <a href="#"
                                                    class="text_dark_blue_a text-decoration-none text-capitalize fw_gilroy_medium">See
                                                    more...</a>
                                            </div> --}}
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
        const holidays_details = new Vue({
            el: "#holidays_details",

            data: {
                departure_search_keyword: '',

                api_response: null,
                packages: [],
                package_id: @json($package_id),
                isFlightPanelVisible: false,
                initial_autocomplete_value: '',
                selected_departure_result: null,
                hotels: [],
                current_slide_hotel: null,
                package_options: @json($package_options)




            },


            mounted: async function() {
                let resp = await axios.post("/holidays/view/get", {
                    id: this.package_id
                });
                this.api_response = resp.data;
                for (let i = 0; i < this.api_response.PackageServices.length; i++) {
                    if (this.api_response.PackageServices[i].ServiceType == "Hotel") {
                        this.hotels.push(this.api_response.PackageServices[i]);
                    }
                }

                this.current_slide_hotel = this.hotels[0]


                const swiper = new Swiper('.hero_slider', {
                    // autoplay: {
                    //     delay: 2500,
                    //     disableOnInteraction: false,
                    // },
                    pagination: {
                        clickable: true,
                        el: '.wrap_pagination_image .swiper-pagination',
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
                const swiper2 = new Swiper('.hero_slider_2', {
                    // autoplay: {
                    //     delay: 2500,
                    //     disableOnInteraction: false,
                    // },
                    pagination: {
                        clickable: true,
                        el: '.wrap_pagination_image .swiper-pagination',
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });

                let self = this;
                swiper2.on('activeIndexChange', function() {
                    self.current_slide_hotel = self.hotels[this.activeIndex];
                });

                let hotel_slide = document.querySelectorAll(".hotel_slide");
                let swiper_pagination_bullet = document.querySelectorAll(
                    ".hero_details .swiper-pagination .swiper-pagination-bullet");
                for (let i = 0; i < hotel_slide.length; i++) {
                    let get_src = hotel_slide[i].querySelector(".review_hotel_slider img").src;
                    swiper_pagination_bullet[i].innerHTML = `<img src="${get_src}">`;
                }

            },

            methods: {

                cancellation_policy: function()
                {
                    let free_cancellation_till = this.api_response?.PackageCancellationRules[0].DateFrom;
                    let end_date = this.api_response?.PackageCancellationRules[0].DateTo;
                    let amount = Math.ceil(this.api_response?.PackageCancellationRules[0].DeductionAmt)
                    let currency = this.api_response?.Overview.PackageCurrency

                    return `
                    Free cancellation before ${free_cancellation_till}.
                    <br>
                    After ${free_cancellation_till}, you will be charged ${currency} ${amount}.
                    `
                },
                format_date: function(date)
                {
                    let d = moment(date, 'YYYY-MM-DDTHH:mm:ss')

                    return d.format("YYYY-MM-DD");
                },
                select_departure_result: function(result) {
                    this.departure_search_keyword = result.Name
                    this.selected_departure_result = result
                },
                selectPackage: function() {
                    let self = this;
                    setTimeout(() => {

                        window.open('/holiday/select?package_id=' + self.package_id + '&from_airport=' +
                                self.selected_departure_result.airport_id, '_blank')
                            .focus();
                    })
                },
                selectPackageHotelOnly: function() {
                    let self = this;
                    setTimeout(() => {

                        window.open('/holiday/select?package_id=' + self.package_id +
                                "&hotel_only=true", '_blank')
                            .focus();
                    })
                },
                async pay_order() {
                    const {
                        error
                    } = await stripe.confirmPayment({
                        elements: this.payment_element,
                        confirmParams: {
                            return_url: 'https://my-site.com/order/123/complete',
                        },

                    });

                    if (error) {

                    }
                }


                /*  choose_package: function(package) {
                     let id = package.PackageId;

                     setTimeout(() => {
                         window.open('/holidays/view?id=' + id, '_blank')
                             .focus();
                     })
                 },
                 getStyle: function(package) {
                     return {
                         background: `url('${package.PackageMainImage}') no-repeat`,
                         backgroundSize: "cover"

                     }
                 } */
            }
        });
    </script>
@endsection
