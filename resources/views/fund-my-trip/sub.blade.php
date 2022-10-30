@extends('master')

@section('css-links')
    <style>
        .no_underline {
            text-decoration: none;
        }

        .hide_panel {
            display: none;
        }

        .custom_trip_plan_style {
            width: 100%;
            display: grid;
            grid-template-columns: 50% 50%;
            height: fit-content;
            gap: 20px;
        }

        .svg_fill_color {
            fill: white;
        }

        .svg_fill_color:hover {
            fill: #fe2f70;
        }

        .trip_plan_item_wrapper_active {
            min-height: 700px;
        }

        .trip_user_add>button {
            width: 60px;
            height: 47px !important;
        }

        .trip_plan_item {
            height: fit-content;
            min-height: 280px;
        }

        @media screen and (max-width: 800px) {
            .custom_trip_plan_style {
                width: 100%;
                display: grid;
                grid-template-columns: 100%;
                height: fit-content;
                gap: 20px;
            }

            .trip_plan_item_wrapper_active {
                min-height: 1200px;
            }


        }
    </style>
@endsection

@section('content')
    <div id="fund_my_trip_sub" v-on:click="hide_list" class="wrap_body index_wrap_body">
        <sign-in-modal ref="sign_in_modal"></sign-in-modal>


        <div v-on:click.stop="close_panels" :class="{ hide_panel: !joinFormVisible }"
            style="    position: fixed;top: 0px;left: 0px;
    width: 100vw;
    height: 100%;z-index:100;">


            <fund-my-trip-request-to-join-form @request_sent="request_sent" :trip_id="trip.id" v-on:click.stop=""
                ref="join_form">
            </fund-my-trip-request-to-join-form>
        </div>
        <!-- hero -->
        <div class="container-lg pad_lg mt-sm-5 mt-4">
            <div class="hero_details">
                <!-- Slider main container -->
                <div class="swiper hero_slider">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide hotel_slide">
                            <h4 class="text_dark_blue mb-4"></h4>
                            <img src="/img/hotel_slide_1.jpg">
                        </div>
                        <div class="swiper-slide hotel_slide">
                            <h4 class="text_dark_blue mb-4"></h4>
                            <img src="/img/hotel_slide_2.jpg" alt="">
                        </div>
                        <div class="swiper-slide hotel_slide">
                            <h4 class="text_dark_blue mb-4"></h4>
                            <img src="/img/hotel_slide_3.jpg" alt="">
                        </div>
                    </div>

                    <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
                </div>
                <div class="wrap_pagination_image">
                    <div class="slide_user_details me-auto box_shadow">
                        <!-- left -->
                        <div class="slide_user_details_left">
                            <div class="slide_user_details_left_img">
                                <div class="d-flex align-items-center">
                                    <img :src="getOwnerProfilePicture()" alt="">
                                    <div class="ms-3">
                                        {{-- <p class="text_dark_blue mb-1 fs_14">Posted by Admin</p> --}}
                                        <h3 class="h6 text_dark_blue text-capitalize fw_gilroy_bold mb-1">

                                            <a class="text_dark_blue text-capitalize fw_gilroy_bold no_underline"
                                                :href="'/profile/view/' + trip.user.id"> @{{ trip.user.name }}</a>
                                        </h3>
                                        {{-- <p class="text_dark_blue mb-0 fs_14">Posted by Admin</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- right -->
                        <div class="slide_user_details_right">
                            <div>
                                <!-- 1 -->
                                <div class="review_select_trip d-flex align-items-center  mb-2">
                                    <div class="d-flex align-itmes-center me-2">
                                        {{-- <img width="18" class="me-1" src="/img/user_star_gold.svg" alt="">
                                        <img width="18" class="me-1" src="/img/user_star_gold.svg" alt="">
                                        <img width="18" class="me-1" src="/img/user_star_gold.svg" alt="">
                                        <img width="18" class="me-1" src="/img/user_star_gold.svg" alt=""> --}} <img width="18" src="/img/user_star_silver.svg"
                                            alt="">
                                        <img width="18" src="/img/user_star_silver.svg" alt="">
                                        <img width="18" src="/img/user_star_silver.svg" alt="">
                                        <img width="18" src="/img/user_star_silver.svg" alt="">
                                        <img width="18" src="/img/user_star_silver.svg" alt="">
                                    </div>
                                    <p class="mb-0 text_silver fs_14">0 Reviews</p>
                                </div>
                                <!-- 2 -->
                                <p class="mb-2 text_silver fs_14"><i class="fas fa-stopwatch me-1"></i>Trip Start date : 05
                                    June 2022</p>
                                <p class="mb-0 text_silver fs_14"><i class="fas fa-stopwatch me-1"></i>Trip End date : 11
                                    June 2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination mt-3"></div>
                </div>

            </div>
        </div>

        <!-- filter  -->
        <div class="wrap_account_filter">
            <div class="container-lg pad_lg">
                <div class="account_filter_buttons">
                    <div class="wrap_acc_buttons">
                        <div class="swiper-button-prev" onclick="s_slide_active(this)">
                            <img src="/img/arrow_right_l.svg" alt="">
                        </div>
                        <div class="swiper-button-next" onclick="s_slide_active(this)">
                            <img src="/img/arrow_left_l.svg" alt="">
                        </div>
                    </div>
                    <div id="my_account_slider" class="swiper my_account_slider mx-0 flex-grow-1">
                        <div class="swiper-wrapper">
                            <!-- 1 -->
                            <div class="swiper-slide my_account_slide my_account_slide_active"
                                v-on:click="nextSlide($event, 'acc_filter_box_1')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path id="icons8_dashboard_layout"
                                        d="M9,2H4A2,2,0,0,0,2,4v7a2,2,0,0,0,2,2H9a2,2,0,0,0,2-2V4A2,2,0,0,0,9,2ZM20,2H15a2,2,0,0,0-2,2V7a2,2,0,0,0,2,2h5a2,2,0,0,0,2-2V4A2,2,0,0,0,20,2ZM9,15H4a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2H9a2,2,0,0,0,2-2V17A2,2,0,0,0,9,15Zm11-4H15a2,2,0,0,0-2,2v7a2,2,0,0,0,2,2h5a2,2,0,0,0,2-2V13A2,2,0,0,0,20,11Z"
                                        transform="translate(-2 -2)" />
                                </svg>
                                <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Overview</p>
                            </div>
                            <!-- 2 -->
                            <div v-if="owner" class="swiper-slide my_account_slide"
                                v-on:click="nextSlide($event, 'acc_filter_box_2')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.016 23.28">
                                    <path id="icons8_add_user_male"
                                        d="M10.172,2a5.291,5.291,0,1,0,5.291,5.291A5.3,5.3,0,0,0,10.172,2ZM19.7,13.64a5.82,5.82,0,1,0,5.82,5.82A5.82,5.82,0,0,0,19.7,13.64ZM4.47,14.7A2.043,2.043,0,0,0,2.5,16.8v.805a4.914,4.914,0,0,0,2.527,4.247,9.945,9.945,0,0,0,5.145,1.308A11.208,11.208,0,0,0,13.6,22.64,6.857,6.857,0,0,1,14.74,14.7Zm15.226.529a.529.529,0,0,1,.529.529v3.175H23.4a.529.529,0,1,1,0,1.058H20.225v3.175a.529.529,0,0,1-1.058,0V19.989H15.992a.529.529,0,0,1,0-1.058h3.175V15.757A.529.529,0,0,1,19.7,15.227Z"
                                        transform="translate(-2.5 -2)" />
                                </svg>
                                <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Join requests @{{ Object.keys(unanswered_requests).length }}</p>
                            </div>
                            <!-- 3 -->
                            <div v-if="isMember" class="swiper-slide my_account_slide"
                                v-on:click="nextSlide($event, 'acc_filter_box_3')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33.046 20.929">
                                    <path id="icons8_users"
                                        d="M16.523,6c-3.505,0-4.957,2.248-4.957,4.957A4.916,4.916,0,0,0,12,12.786a.972.972,0,0,0-.394.992c.135,1.06.6,1.327.889,1.349a4.317,4.317,0,0,0,1.547,2.44v1.478c-.826,2.478-7.435,2.1-7.435,7.885H26.437c0-5.783-6.609-5.407-7.435-7.885V17.566a4.311,4.311,0,0,0,1.547-2.44c.293-.022.753-.289.889-1.349a.971.971,0,0,0-.394-.992,4.361,4.361,0,0,0,.437-1.829c0-2.006-.788-3.718-2.478-3.718A2.628,2.628,0,0,0,16.523,6Zm8.262,2.2a4.632,4.632,0,0,0-1.485.247,8.124,8.124,0,0,1,.383,2.509,6.279,6.279,0,0,1-.209,1.573,3.405,3.405,0,0,1,.146,1.525A3.941,3.941,0,0,1,22.4,16.611a6.818,6.818,0,0,1-.66,1.188,3.871,3.871,0,0,0,.977,1.33v.013c2.244,1.052,5.921,2.82,5.921,7.788h4.406c0-5.461-5.508-4.677-6.2-7.018v-.785a4.152,4.152,0,0,0,1.289-2.3c.243-.021.628-.272.74-1.274a.969.969,0,0,0-.327-.936,4.571,4.571,0,0,0,.364-1.728c0-1.895-.657-3.511-2.065-3.511A2.171,2.171,0,0,0,24.785,8.2ZM8.262,8.2A2.171,2.171,0,0,0,6.2,9.373c-1.409,0-2.065,1.619-2.065,3.513a4.545,4.545,0,0,0,.364,1.725.965.965,0,0,0-.327.936c.112,1,.5,1.255.74,1.276a4.152,4.152,0,0,0,1.289,2.3v.783C5.508,22.251,0,21.468,0,26.929H4.406c0-4.968,3.677-6.735,5.921-7.788v-.015A3.844,3.844,0,0,0,11.3,17.8a6.835,6.835,0,0,1-.66-1.19,3.93,3.93,0,0,1-1.218-2.554,3.425,3.425,0,0,1,.151-1.545,6.182,6.182,0,0,1-.213-1.553,8.526,8.526,0,0,1,.364-2.513A4.616,4.616,0,0,0,8.262,8.2Z"
                                        transform="translate(0 -6)" />
                                </svg>
                                <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Trip members @{{ Object.keys(trip_members).length }}</p>
                            </div>
                            <!-- 4 -->
                            <div v-if="isMember" class="swiper-slide my_account_slide"
                                v-on:click="nextSlide($event, 'acc_filter_box_4')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.269 23.383">
                                    <path id="icons8_location"
                                        d="M13.135,1A6.68,6.68,0,0,0,6.454,7.681c0,4.772,6.681,12.248,6.681,12.248s6.681-7.476,6.681-12.248A6.68,6.68,0,0,0,13.135,1Zm0,4.3a2.386,2.386,0,1,1-2.386,2.386A2.385,2.385,0,0,1,13.135,5.3ZM5.119,16.589,2,24.383H24.269l-3.119-7.794H18.493c-.54.814-1.082,1.568-1.581,2.227h2.734l1.335,3.34H5.288l1.335-3.34H9.357c-.5-.659-1.041-1.413-1.581-2.227Z"
                                        transform="translate(-2 -1)" />
                                </svg>
                                <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Trip Plan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- filter box -->

            <!-- 1 -->
            <div id="acc_filter_box_1" class="account_filter_box">
                <div class="my_account_content_dashboard mt-4">
                    <div class="container-lg pad_lg">
                        <div
                            class="maccount_dashboard_header txt_blue_secondary fw_gilroy_medium bg-white border_radius_20 p-4">
                            <div class="overview_header mb-4 w-100 pt-1">
                                <div class="overview_heading_wrapper">
                                    <h2 class="h4 txt_blue_secondary fw_gilroy_medium">@{{ trip.title }}</h2>
                                    {{-- <div>
                                            <div class="d-flex mb-2 align-items-center">
                                                <div class="image_wrapper_illustration">
                                                    <img src="/img/eye_icon_illustration.svg" alt="">
                                                </div>
                                                <div class="custom_circle_wrapper me-3">
                                                    <img src="/img/round_circle_icon_fill.svg" alt="">
                                                    <img src="/img/round_circle_icon_fill.svg" alt="">
                                                    <img src="/img/round_circle_icon_fill.svg" alt="">
                                                    <img src="/img/round_circle_icon_fill.svg" alt="">
                                                    <img src="/img/round_circle_outline.svg" alt="">
                                                </div>
                                                <div>
                                                    <p class="mb-0 mt-1 fs_14 txt_silver">1,890 Reviews</p>
                                                </div>
                                            </div>
                                        </div> --}}
                                </div>

                                <div v-if="!isGuest" class="join_requests">
                                    <a v-if="isMember == false" v-on:click="show_join_form"
                                        class="btn btn_pink medium_btn">@{{ membership_status }}</a>
                                    <a v-if="isMember == true" class="btn btn_pink medium_btn">Joined</a>

                                </div>
                                <div v-if="isGuest" class="join_requests">

                                    <a class="btn btn_pink medium_btn" v-on:click="show_sign_in_required_panel">Request To
                                        Join</a>

                                </div>

                                <div class="overview_txt_description">
                                    <p class="txt_blue_secondary mb-4 fs_14"></p>
                                    <p class="txt_blue_secondary mb-0 fw_gilroy_medium fs_14">@{{ trip.description }}</p>
                                </div>
                            </div>

                            <div class="hotel_description_features w-100">
                                <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 after_txt_divider h6">Highlights</h4>
                                <div class="hotel_description_features_wrapper">
                                    <div class="features_wrapper_item py-4 pb-5">
                                        <div class="mb-0 txt_silver mb-4 me-sm-3 fs_14"><img class="d-inline-block me-2"
                                                src="/img/stopwatch_icon.svg" alt=""> Trip Start date : 05 June
                                            2022</div>
                                        <div class="mb-0 txt_silver mb-4 fs_14"><img class="d-inline-block me-2"
                                                src="/img/stopwatch_icon.svg" alt=""> Trip End date : 11 June 2022
                                        </div>
                                        <div class="mb-0 txt_silver w-100 fs_14"><img class="d-inline-block me-2"
                                                src="/img/road_icon.svg" alt=""> Banff National Park, 14
                                            kilometres (8.7 mi)
                                            outside the village of Lake Louise, Alberta, Canada.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="hotel_description_features w-100">
                                <h4 class="txt_blue_secondary fw_gilroy_bold mb-4 after_txt_divider h6">Location</h4>
                            </div>

                            <div class="map_wrapper w-100 border_radius_20 overflow-hidden">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d193571.94798652857!2d-74.0085179!3d40.70565!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1656400366716!5m2!1sen!2sbd"
                                    width="100%" height="490" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- 2 -->
            <div id="acc_filter_box_2" class="account_filter_box" style="display: none;">
                <div class="my_account_content_dashboard">
                    <div class="container-lg pad_lg pt-4 px-0">
                        <div class="my_account_content_dashboard">
                            <div class="container-lg pad_lg">
                                <div class="maccount_dashboard_header bg-white border_radius_20 p-4 pe-2">
                                    <div class="w-100 pt-1">
                                        <h2 class="h4 txt_blue_secondary fw_gilroy_medium mb-3">Member Requests
                                            (@{{ Object.keys(unanswered_requests).length }})</h2>
                                        <!-- member request wrapper -->
                                        <div class="member_request_wrapper ps-0">
                                            <!-- 1 -->

                                            <div class="w-100" v-for="request in unanswered_requests">
                                                <div class="member_request_item">
                                                    <div class="member_request_item_name">
                                                        <div class="me-3">
                                                            <img :src="getImage(request)" alt=""
                                                                class="member_request_item_img">
                                                        </div>
                                                        <div>
                                                            <h4 class="h6 txt_blue_secondary fw_gilroy_bold mb-1">
                                                                <a :href="'/profile/view/' + request.user.id"
                                                                    class="txt_blue_secondary fw_gilroy_bold no_underline">
                                                                    @{{ request.user.name }}</a>
                                                            </h4>

                                                            <p class="text_silver fs_14 mb-0"><img class="me-1"
                                                                    width="30" src="/img/canada_flag.svg"
                                                                    alt="">
                                                                Canada</p>
                                                            <p class="txt_silver fw_gilroy_regular fs_14 mb-0">2 min ago
                                                            </p>

                                                        </div>
                                                    </div>
                                                    <div class="accept_decline_share_wrapper d-flex align-items-center">
                                                        <button v-if="!request.accepted && !request.declined"
                                                            v-on:click="acceptJoinRequest(request)"
                                                            class="btn btn_pink medium_btn px-3 py-2 me-2 member_accept_btn">Accept</button>


                                                        <button v-if="request.accepted"
                                                            class="btn btn_pink medium_btn px-3 py-2 me-2 member_accept_btn">Accepted</button>



                                                        <a v-if="!request.accepted && !request.declined"
                                                            v-on:click="rejectJoinRequest(request)"
                                                            class="btn btn_silver medium_btn px-3 py-2 me-3">Reject </a>


                                                        <a v-if="request.declined" href="#"
                                                            class="btn btn_silver medium_btn px-3 py-2 me-3">Rejected </a>

                                                        <a v-on:click="startNewChat(request.user.id)"><img
                                                                src="/img/img_forward_message.png" alt=""></a>


                                                    </div>


                                                </div>


                                            </div>
                                            <!-- 2 -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3 -->
            <div id="acc_filter_box_3" class="account_filter_box" style="display: none;">
                <div class="my_account_content_dashboard">
                    <div class="container-lg pad_lg pt-4 px-0">
                        <div class="my_account_content_dashboard">
                            <div class="container-lg pad_lg">
                                <div class="maccount_dashboard_header bg-white border_radius_20 p-4 pe-2">
                                    <div class="w-100 pt-1">
                                        <h2 class="h4 txt_blue_secondary fw_gilroy_medium mb-3">Trip Members
                                            (@{{ Object.keys(trip_members).length }})</h2>
                                        <!-- member request wrapper -->
                                        <div class="member_request_wrapper ps-0">
                                            <!-- 1 -->
                                            <div v-for="member in trip_members" class="member_request_item">
                                                <div class="member_request_item_name">
                                                    <div class="me-3">
                                                        <img :src="getMemberProfilePicture(member)" alt=""
                                                            class="member_request_item_img">
                                                    </div>
                                                    <div>
                                                        <h4 class="h6 txt_blue_secondary fw_gilroy_bold mb-1">
                                                            <a class="txt_blue_secondary fw_gilroy_bold no_underline"
                                                                :href="'/profile/view/' + member.user.id">@{{ member.user.name }}</a>
                                                        </h4>

                                                        <p class="text_silver fs_14 mb-0"><img class="me-1"
                                                                width="30" src="/img/canada_flag.svg" alt="">
                                                            Canada</p>
                                                        <p class="txt_silver fw_gilroy_regular fs_14 mb-0">2 min ago</p>

                                                    </div>
                                                </div>
                                                <div class="accept_decline_share_wrapper d-flex align-items-center">
                                                    <button
                                                        class="btn btn_pink medium_btn px-3 py-2 me-2 member_accept_btn">Accepted</button>
                                                    <a v-if="owner" v-on:click="" href="#"
                                                        class="btn btn_silver medium_btn px-3 py-2 me-3">Kick out </a>
                                                    <a v-on:click="startNewChat(member.user.id)"><img
                                                            src="/img/img_forward_message.png" alt=""></a>


                                                </div>


                                            </div>
                                            <!-- 2 -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 -->
            <div id="acc_filter_box_4" class="account_filter_box" style="display: none;">
                <div class="my_account_content_dashboard pt-4">
                    <div class="container-lg pad_lg" :class="{ trip_plan_item_wrapper_active: passenger_details_visible }">
                        <div class="trip_plan_item_wrapper">
                            <!-- admin plus -->
                            <div class="trip_user_add mb-3">
                                <button v-on:click="passenger_details_visible = true" id="add_user_btn"
                                    class=" py-2 medium_btn fw_gilroy_medium text-capitalize btn btn_style btn_pink px-3 d-inline-block"
                                    href="#"><img src="/img/admin_plus.svg" alt=""></button>
                                <div v-on:click="passenger_details_visible = false" id="trip_popup_after"
                                    class="wrap_date_after_box"
                                    :class="{ wrap_date_after_box_active: passenger_details_visible }"></div>
                                <form class="trip_user_form_popup"
                                    :class="{ trip_user_form_popup_active: passenger_details_visible }">
                                    <!-- corss popup trip -->
                                    <div class="trip_user_form_cross" v-on:click="passenger_details_visible = false">
                                        <img src="/img/trip_cross.svg" alt="">
                                    </div>
                                    <!-- ---- -->
                                    <h5 class="text_dark_blue fw_gilroy_medium mb-3">Personal information</h5>
                                    <label for="fname" class="mb-2 text-capitalize text_dark_blue fw_gilroy_bold">Full
                                        name</label>
                                    <div class="row gx-0">
                                        <!-- col -->
                                        <div class="col-12 d-flex mb-3" style="gap:10px;">
                                            <div
                                                class="input__gray select_box region_p select_review select_account b_radius_input text_dark_blue fw_gilroy_bold me-3">
                                                <select class="child_select_box" style="display: none;">
                                                    <option value="1" selected="">Mr</option>
                                                    <option value="2">Miss</option>
                                                </select>
                                            </div>
                                            <input type="text" required
                                                class="form-control input__gray input_review fs_14"
                                                placeholder="First Name"
                                                :class="{ invalid_value_c: passenger_details.first_name.is_valid == false }"
                                                v-model="passenger_details.first_name.value">

                                            <input type="text" required
                                                class="form-control input__gray input_review fs_14"
                                                placeholder="Last Name"
                                                :class="{ invalid_value_c: passenger_details.last_name.is_valid == false }"
                                                v-model="passenger_details.last_name.value">
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-6 mb-3 row gx-0 pe-md-2 pe-0">
                                            <h6 class="col-12 text-capitalize text_dark_blue fw_gilroy_bold mb-2">date of
                                                birth</h6>
                                            <div class="col-12 acc_personal_date_box d-flex">
                                                <input type="text" v-model="passenger_details.dob_d.value"
                                                    :class="{ invalid_value_c: passenger_details.dob_d.is_valid == false }"
                                                    class="form-control input__gray input_review fs_14 me-2"
                                                    placeholder="dd">
                                                <input type="text" v-model="passenger_details.dob_m.value"
                                                    :class="{ invalid_value_c: passenger_details.dob_m.is_valid == false }"
                                                    class="form-control input__gray input_review fs_14 me-2"
                                                    placeholder="MM">
                                                <input type="text" v-model="passenger_details.dob_y.value"
                                                    :class="{ invalid_value_c: passenger_details.dob_y.is_valid == false }"
                                                    class="form-control input__gray input_review fs_14"
                                                    placeholder="YYYY">
                                            </div>
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-6 row gx-0 ps-md-2 ps-0 mb-3">
                                            <label for="add_member"
                                                class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">members</label>
                                            <input type="text" required=""
                                                class="form-control input__gray input_review fs_14" id="add_member"
                                                placeholder="Add members">
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-6 ps-0 pe-md-2 pe-0 mb-3">
                                            <h6 class="col-12 text-capitalize text_dark_blue fw_gilroy_bold mb-2">Mobile
                                                Number</h6>
                                            <div class="d-flex" style="padding: 9px;">
                                                <phone-number ref="phone_nr" @phone_number_updated="update_phone_number"
                                                    :current_phone_number="''">
                                                </phone-number>
                                            </div>
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-6 row gx-0 ps-md-2 ps-0 mb-3">
                                            <label for="u_email"
                                                class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">Email
                                                Address</label>
                                            <input type="text" required
                                                class="form-control input__gray input_review fs_14" id="u_email"
                                                placeholder="Valid Email Id">
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-6 row gx-0 pe-md-2 pe-0 mb-3">
                                            <label for="u_address1"
                                                class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">address
                                                1</label>
                                            <input type="text" v-model="passenger_details.address1.value"
                                                :class="{ invalid_value_c: passenger_details.address1.is_valid == false }"
                                                class="form-control input__gray input_review fs_14" id="u_address1">
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-6 row gx-0 ps-md-2 ps-0 mb-3">
                                            <label for="u_address2"
                                                class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">address 2
                                                (optional)</label>
                                            <input type="text" v-model="passenger_details.address2.value"
                                                :class="{ invalid_value_c: passenger_details.address2.is_valid == false }"
                                                class="form-control input__gray input_review fs_14" id="u_address2">
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-3 row gx-0 pe-md-2 pe-0 mb-3">
                                            <label for="u_city"
                                                class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">city</label>
                                            <input type="text" v-model="passenger_details.city.value"
                                                :class="{ invalid_value_c: passenger_details.city.is_valid == false }"
                                                class="form-control input__gray input_review fs_14" id="u_city">
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-3 row gx-0 pe-md-2 pe-0 mb-3">
                                            <label for="u_postcode"
                                                class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">postcode</label>
                                            <input type="text" v-model="passenger_details.postcode.value"
                                                :class="{ invalid_value_c: passenger_details.postcode.is_valid == false }"
                                                class="form-control input__gray input_review fs_14" id="u_postcode">
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-6 row gx-0 ps-2 mb-3">
                                            <label for="u_country"
                                                class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">county /
                                                region (optional)</label>
                                            <input type="text" v-model="passenger_details.country.value"
                                                :class="{ invalid_value_c: passenger_details.country.is_valid == false }"
                                                class="form-control input__gray input_review fs_14" id="u_country">
                                        </div>
                                        <!-- col -->
                                        <div class="col-md-6 d-md-block d-none pe-2"></div>
                                        <!-- col -->
                                        <div class="col-md-6 ps-md-2 ps-0 mt-md-0 mt-2">
                                            <button v-on:click.prevent="add_member_info"
                                                class="w-100 btn py-2 btn_pink medium_btn d-block px-2 fs_14 fw_gilroy_medium">Save
                                                Passenger Information</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <!-- right -->
                            <div class="trip_plan_collapse_box custom_trip_plan_style">
                                <!-- 1 -->
                                <div v-for="(member, memberIndex) in trip_members"
                                    class="trip_plan_item border_radius_20 overflow-hidden box_shadow">
                                    <div class="trip_plan_header">
                                        <div class="trip_plan_img">
                                            <img :src="getMemberProfilePicture(member)" alt="">
                                        </div>
                                        <div class="trip_user_date_btn">
                                            <div>
                                                <h4 class="h6 text-white fw_gilroy_bold mb-0"
                                                    style="text-transform: capitalize;">@{{ get_member_name(member) }}</h4>
                                                <p class="text-white-50 text-white fw_gilroy_medium fs_14 mb-0">Accepted on
                                                    : 2 Hours Ago</p>
                                            </div>

                                            <div v-if="user_id == member.user_id">
                                                <a style="cursor: pointer"
                                                    v-on:click.prevent="passenger_details_visible = true;"
                                                    class="text-white d-block mb-0 txt_link_normal fs_14">+
                                                    Add Passenger Information</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="trip_plan_before_accr">
                                        <div class="trip_plan_before_accr_inner">
                                            <p class="fs_14 txt_silver mb-0">Origin Country</p>
                                            <div class="trip_plan_flag_wrapper">
                                                <div class="trip_plan_flag me-2">
                                                    <img src="/img/usa_flag_icon.svg" alt="">
                                                </div>
                                                <p class="txt_blue_secondary fw_gilroy_medium mb-0 fs_14">USA</p>
                                            </div>
                                        </div>

                                        <div class="trip_plan_before_accr_inner">
                                            <p class="fs_14 txt_silver mb-0">Cost of the trip</p>
                                            <div class="trip_plan_flag_wrapper">
                                                <p class="txt_blue_secondary fw_gilroy_medium mb-0 fs_14">$500</p>
                                            </div>
                                        </div>

                                        <div v-if="user_id == member.user_id" class="add_hf_wrapper">
                                            <a href="#" class="btn hf_btn_green fs_14"><img
                                                    src="/img/white_hotel_icon.svg" class="hf_btn_img" alt="">
                                                Add Hotels</a>
                                            <a :href="'/flights/search?trip=' + trip.id"
                                                class="btn hf_btn_green fs_14"><img src="/img/white_plan_icon.svg"
                                                    class="hf_btn_img" alt=""> Select
                                                Flight</a>
                                        </div>
                                    </div>

                                    <div class="trip_accr_wrapper">
                                        <div class="trip_accr_main_content">
                                            <div>
                                                <div
                                                    class="d-flex align-items-center justify-content-end shopping_accr_header pt-2 pb-3 mb-3">
                                                    <button style="min-width: 115px;"
                                                        class="btn accordion-button justify-content-start accordion_arrow_btn p-0 coupons_accordion_btn collapsed collapse_line"
                                                        role="button" type="button" data-bs-toggle="collapse"
                                                        :data-bs-target="'#collapseTwo' + memberIndex"
                                                        aria-expanded="false"
                                                        :aria-controls="'collapseTwo' + memberIndex">Price details</button>
                                                    <div class="collpase_line_after"></div>
                                                </div>

                                                <div class="accordion_wrapper" :id="'accordionWrapper2' + memberIndex">
                                                    <div :id="'collapseTwo' + memberIndex"
                                                        class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                                        <div v-if="member.flight" class="d-flex align-items-center mb-3">
                                                            <img src="/img/airplane_take_off_blue.svg" class="me-2"
                                                                alt="">
                                                            <p class="h6 txt_blue_secondary fw_gilroy_bold mb-0">Flights
                                                            </p>
                                                        </div>
                                                        <!-- trip_accr_bottom_row -->
                                                        <div v-if="member.flight" class="trip_accr_bottom_row mb-5">
                                                            <!-- left -->
                                                            <div class="trip_accr_bottom_left py-3">
                                                                <div
                                                                    class="d-flex flex-column text-center align-items-center">
                                                                    <h5 class="mb-2 text_pink fw_gilroy_bold">
                                                                        @{{ member.flight?.currency }} @{{ member.flight?.last_price }}</h5>
                                                                    <p class="mb-2 text_silver fs_14">Booking ID #1432423
                                                                    </p>
                                                                    {{-- <a href="#" class="a_select_trip">
                                                                        <img src="/img/arrow_select_down.svg"
                                                                            alt="">
                                                                    </a> --}}
                                                                </div>
                                                            </div>
                                                            <!-- right -->
                                                            <div class="trip_accr_bottom_right py-3">
                                                                <!-- trip_accr_bottom_right_1 -->
                                                                <div v-for="member_flight in member.flight?.flight?.Segments"
                                                                    class="trip_accr_bottom_right_1 mb-2">
                                                                    <!-- 1 -->
                                                                    <div class="trip_accr_bottom_right_1_left">
                                                                        <div class="d-flex align-items-start">
                                                                            <img class="me-2 mt-1" width="20"
                                                                                src="/img/airplane_dark_blue.svg"
                                                                                alt="">
                                                                            <div>
                                                                                <p class="text_dark_blue fs_14 mb-0">
                                                                                    @{{ member_flight.DepartureAirportName }}
                                                                                    (@{{ member_flight.DepartureAirportCode }})</p>
                                                                                <p class="text_silver fs_14">
                                                                                    @{{ member_flight.DepartureTime }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- line -->
                                                                    <div class="trip_accr_bottom_line"></div>
                                                                    <!-- 2 -->
                                                                    <div class="trip_accr_bottom_right_1_right">
                                                                        <div class="d-flex align-items-start">
                                                                            <img class="me-2 mt-1" width="18"
                                                                                src="/img/location_pink.svg"
                                                                                alt="">
                                                                            <div>
                                                                                <p class="text_dark_blue fs_14 mb-0">
                                                                                    @{{ member_flight.ArrivalAirportName }}
                                                                                    (@{{ member_flight.ArrivalAirportCode }})</p>
                                                                                <p class="text_silver fs_14">
                                                                                    @{{ member_flight.ArrivalTime }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- trip_accr_bottom_right_2 -->
                                                                <div class="trip_accr_bottom_right_2 pb-2">
                                                                    <p
                                                                        class="text_silver fs_14 mb-1 d-flex align-items-baseline">
                                                                        <img width="24" class="me-1"
                                                                            src="/img/passengers.svg" alt="">
                                                                        Passenger
                                                                    </p>
                                                                    <div class="d-flex align-items-baseline">
                                                                        <h5 class="text_dark_blue fw_gilroy_bold mb-0 me-2"
                                                                            style="text-transform: capitalize;">
                                                                            @{{ get_member_name(member) }}
                                                                        </h5>
                                                                        <p class="mb-0 text_silver fs_14">
                                                                            (@{{ member.flight?.search_data?.flight_passengers[0].passengers.length }} Adult)</p>
                                                                    </div>
                                                                </div>
                                                                <!-- trip_accr_bottom_right_3 -->
                                                                <div class="trip_accr_bottom_right_3">
                                                                    <!-- 1 -->
                                                                    <div class="child_trip_accr_bottom_right_3">
                                                                        <p class="mb-0 text-center text_silver fs_14">CLASS
                                                                        </p>
                                                                        <p
                                                                            class="mb-0 text-center text_dark_blue fs_14 text-capitalize">
                                                                            @{{ member.flight?.search_data?.flight_class == 1 ? 'Economy Class' : (member.flight?.search_data?.flight_class == 3 ? 'Business Class' : 'First Class') }}</p>
                                                                    </div>
                                                                    <!-- 2 -->
                                                                    <div class="child_trip_accr_bottom_right_3">
                                                                        <p class="mb-0 text-center text_silver fs_14">
                                                                            Airline</p>
                                                                        <p
                                                                            class="mb-0 text-center text_dark_blue fs_14 text-capitalize">
                                                                            @{{ member.flight?.flight?.flightName }}</p>
                                                                    </div>
                                                                    <!-- 3 -->
                                                                    <div class="child_trip_accr_bottom_right_3">
                                                                        <p class="mb-0 text-center text_silver fs_14">Type
                                                                        </p>
                                                                        <p
                                                                            class="mb-0 text-center text_dark_blue fs_14 text-capitalize">
                                                                            @{{ member.flight?.search_data?.flight_type == 1 ? 'One Way' : (member.flight?.search_data?.flight_type == 2 ? 'Roundtrip' : 'Multiple Destinations') }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  -->
                                                        <div class="d-flex align-items-center mb-3">
                                                            <img src="/img/hotel_star.svg" class="me-2" alt="">
                                                            <p class="h6 txt_blue_secondary fw_gilroy_bold mb-0">Hotels</p>
                                                        </div>
                                                        <!-- trip_accr_bottom_row -->
                                                        <div class="trip_accr_bottom_row mb-4">
                                                            <!-- left -->
                                                            <div class="trip_accr_bottom_left py-3">
                                                                <div
                                                                    class="d-flex flex-column text-center align-items-center">
                                                                    <h5 class="mb-2 text_pink fw_gilroy_bold">$300</h5>
                                                                    <p class="mb-2 text_silver fs_14">Booking ID #1432423
                                                                    </p>
                                                                    <a href="#" class="a_select_trip">
                                                                        <img src="/img/arrow_select_down.svg"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!-- right -->
                                                            <div class="trip_accr_bottom_right py-3">
                                                                <!-- trip_accr_bottom_right_1 -->
                                                                <div class="trip_accr_bottom_right_1 mb-2">
                                                                    <!-- 1 -->
                                                                    <div class="trip_accr_bottom_right_1_left">
                                                                        <div class="d-flex align-items-start">
                                                                            <img class="me-2 mt-1" width="20"
                                                                                src="/img/airplane_dark_blue.svg"
                                                                                alt="">
                                                                            <div>
                                                                                <p class="text_dark_blue fs_14 mb-0">
                                                                                    Barcelona El Prat Airport (BCN)</p>
                                                                                <p class="text_silver fs_14">May-14-2021 to
                                                                                    May-15-2021</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- trip_accr_bottom_right_2 -->
                                                                <div class="trip_accr_bottom_right_2 pb-2">
                                                                    <p
                                                                        class="text_silver fs_14 mb-1 d-flex align-items-baseline">
                                                                        <img width="24" class="me-1"
                                                                            src="/img/passengers.svg" alt="">
                                                                        Passenger
                                                                    </p>
                                                                    <div
                                                                        class="d-flex align-items-baseline trip_accr_bottom_right_2_div">
                                                                        <h5
                                                                            class="text_dark_blue fw_gilroy_bold mb-0 me-2">
                                                                            Karlie Tillman</h5>
                                                                        <p class="mb-0 text_silver fs_14">(2 Aduldt, 1
                                                                            Child)</p>
                                                                    </div>
                                                                </div>
                                                                <!-- trip_accr_bottom_right_3 -->
                                                                <div class="trip_accr_bottom_right_3">
                                                                    <!-- 1 -->
                                                                    <div class="child_trip_accr_bottom_right_3">
                                                                        <p class="mb-0 text-center text_silver fs_14">CLASS
                                                                        </p>
                                                                        <p
                                                                            class="mb-0 text-center text_dark_blue fs_14 text-capitalize">
                                                                            Economy</p>
                                                                    </div>
                                                                    <!-- 2 -->
                                                                    <div class="child_trip_accr_bottom_right_3">
                                                                        <p class="mb-0 text-center text_silver fs_14">
                                                                            Flight No.</p>
                                                                        <p
                                                                            class="mb-0 text-center text_dark_blue fs_14 text-capitalize">
                                                                            VA79</p>
                                                                    </div>
                                                                    <!-- 3 -->
                                                                    <div class="child_trip_accr_bottom_right_3">
                                                                        <p class="mb-0 text-center text_silver fs_14">Time
                                                                        </p>
                                                                        <p
                                                                            class="mb-0 text-center text_dark_blue fs_14 text-capitalize">
                                                                            09.00</p>
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












                                <div>

                                    <button

                                        class="py-2 medium_btn fw_gilroy_medium text-capitalize btn btn_style btn_pink px-3 d-inline-block svg_fill_color">Lock Trip (after 60 minutes) <svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512">
                                            <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                                        </svg></button>
                                        <br>

                                        Locking trip will prevent its members from adding or updating their selected hotel or flight.
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
    <script></script>

    <script>
        const fund_my_trip_solo = new Vue({
            el: "#fund_my_trip_sub",

            data: {
                user_id: @json($user_id),
                isGuest: @json(!Auth::check()),
                isMember: @json($is_member),
                countries: @json($countries),
                trip: @json($trip),
                trip_members: @json($trip_members),
                unanswered_requests: @json($unanswered_requests),
                owner: @json($owner),
                user_applied: @json($user_applied),
                passenger_details_visible: false,
                joinFormVisible: false,
                membership_status: 'Request To Join',



                passenger_details: {
                    first_name: {
                        value: '',
                        is_valid: true
                    },
                    last_name: {
                        value: '',
                        is_valid: true
                    },
                    gender: {
                        value: '',
                        is_valid: true
                    },
                    dob_d: {
                        value: '',
                        is_valid: true
                    },
                    dob_m: {
                        value: '',
                        is_valid: true
                    },
                    dob_y: {
                        value: '',
                        is_valid: true
                    },
                    email: {
                        value: '',
                        is_valid: true
                    },
                    phone_nr: {
                        value: '',
                        is_valid: true
                    },
                    address1: {
                        value: '',
                        is_valid: true
                    },
                    address2: {
                        value: '',
                        is_valid: true
                    },
                    city: {
                        value: '',
                        is_valid: true
                    },
                    postcode: {
                        value: '',
                        is_valid: true
                    },
                    country: {
                        value: '',
                        is_valid: true
                    }


                }


            },
            mounted: function() {
                let j, tabcontent, tablinks;

                tabcontent = document.getElementsByClassName("my_account_slide");
                tabcontent[0].style.display = "flex";


                const swiper = new Swiper('.hero_slider', {
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },

                    navigation: {
                        nextEl: '.hero_details .swiper-button-next',
                        prevEl: '.hero_details .swiper-button-prev',
                    },
                });

                const my_account_slider = new Swiper('#my_account_slider', {
                    slidesPerView: "auto",
                    navigation: {
                        nextEl: '.wrap_acc_buttons .swiper-button-next',
                        prevEl: '.wrap_acc_buttons .swiper-button-prev',
                        clickable: true
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                            allowTouchMove: false
                        },
                        567: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                            allowTouchMove: false
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                            allowTouchMove: false
                        },
                        900: {
                            slidesPerView: 4,
                            spaceBetween: 20,
                            allowTouchMove: false
                        },
                        1200: {
                            slidesPerView: "auto",
                            spaceBetween: 20,
                        },
                    },
                });

            },
            methods: {
                add_member_info: async function() {
                    let resp = await axios.post('/trips/add_member_info', {
                        trip_id: this.trip.id,
                        data: JSON.stringify(this.passenger_details)
                    });
                    this.trip_members = resp.data;
                    this.passenger_details_visible = false;

                },
                get_member_name: function(member) {
                    let first_name = '';
                    let last_name = '';
                    if (member.personal?.personal_information.first_name.value) {
                        first_name = member.personal?.personal_information.first_name.value
                    }
                    if (member.personal?.personal_information.last_name.value) {
                        last_name = member.personal?.personal_information.last_name.value
                    }

                    if (first_name == '') {
                        return "No Information Has Been Added Yet."
                    }

                    return first_name + ' ' + last_name;

                },

                hide_list: function() {
                    this.$refs?.phone_nr?.hideList();
                },
                update_phone_number: function(data) {
                    this.passenger_details.phone_nr.value = data;
                },

                nextSlide(evt, cityName) {
                    let j, tabcontent, tablinks;


                    tabcontent = document.getElementsByClassName("account_filter_box");
                    for (j = 0; j < tabcontent.length; j++) {
                        tabcontent[j].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("my_account_slide");
                    for (j = 0; j < tablinks.length; j++) {
                        tablinks[j].className = tablinks[j].className.replace(" my_account_slide_active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " my_account_slide_active";
                },
                show_sign_in_required_panel: function() {
                    this.$refs.sign_in_modal.showPanel();
                },

                startNewChat: function(user_id) {
                    chat_app.addChatWindow(user_id);
                },
                acceptJoinRequest: async function(request) {
                    data = new FormData();
                    data.append('join_request_id', request.id);
                    try {

                        let response = await axios.post('/acceptJoinRequest', data);
                        request.accepted = true;
                        this.trip_members = response.data


                    } catch (e) {

                    }
                },

                rejectJoinRequest: async function(request) {
                    data = new FormData();
                    data.append('join_request_id', request.id);
                    try {

                        let response = await axios.post('/rejectJoinRequest', data);
                        request.declined = true;


                    } catch (e) {

                    }

                },
                getImage(request) {
                    if (request.user.profile.picture_url) {
                        return '/storage/' + request.user.profile.picture_url
                    }
                    return '/images-n/profile-picture-place-holder.png'
                },
                getOwnerProfilePicture() {
                    if (this.trip.user.profile.picture_url) {
                        return '/storage/' + this.trip.user.profile.picture_url
                    }
                    return '/images-n/profile-picture-place-holder.png'

                },
                getMemberProfilePicture(member) {
                    if (member.user.profile.picture_url) {
                        return '/storage/' + member.user.profile.picture_url
                    }
                    return '/images-n/profile-picture-place-holder.png'
                },
                show_join_form: function(trip_id) {
                    this.$refs.join_form.show_form();
                    this.joinFormVisible = true;

                },
                hide_join_form: function(trip_id) {
                    this.$refs.join_form.hide_form();
                    this.joinFormVisible = false;
                },
                close_panels: function() {
                    this.hide_join_form();

                },
                request_sent: function() {
                    this.membership_status = "Pending"
                }
            },


        });

        function show_share_modal() {
            document.getElementById('share_popup').classList.add('user_side_form_box_active')
        }
    </script>
@endsection
