    @extends('master')


    @section('content')
        <div id="my_account_app" class="wrap_body">
            <div class="my_account_profile_hero_sec pad_y_0 pt-md-5 pt-4">
                <div class="container-lg pad_x_0">
                    <div class="profile_hero_wrapper">
                        <div class="profile_right_content bg-white p-4 box_shadow border_radius_20">
                            <div class="my_account_header mb-3">
                                <h4 class="h5 fw_gilroy_bold txt_blue_secondary">My account</h4>
                                <div class="my_account_icons">
                                    <a href="#" class="me-2"><img src="/img/my_account_profile.svg" class="profile_img"
                                            alt=""></a>
                                    <div class="my_account_notification">
                                        <a href="#"><img src="/img/my_account_profile_notification.svg"
                                                class="profile_img" alt=""></a>
                                        <span class="fs_14 notification_number">2</span>
                                    </div>
                                </div>
                            </div>

                            <div class="my_account_content">
                                <div class="d-flex align-items-center py-3">
                                    <div class="my_account_profile_img me-3">
                                        <img v-if="user.profile.picture_url" :src="'/storage/' + user.profile.picture_url" alt="">
                                        <img v-if="!user.profile.picture_url" src="/images-n/profile-picture-place-holder.png" alt="">
                                    </div>
                                    <div class="my_account_details">
                                        <h6 class="fw_gilroy_medium txt_blue_secondary mb-0">@{{ user.name }}</h6>
                                        <p class="txt_silver mb-0 fs_14">@{{ user.email }}</p>
                                        <p class="txt_silver mb-0 fs_14">@{{ user.phone_number }}</p>
                                    </div>
                                </div>
                                {{-- <div class="d-flex fw_gilroy_medium txt_blue_secondary py-3">
                                    <div class="me-4">Address:</div>
                                    <div class="fs_14">Ireland East Mante Ferry Turnpike Bedfordshireb</div>
                                </div> --}}

                                <div class="d-flex justify-content-end pt-4">
                                    <a href="/logout" class="btn medium_btn btn_silver mb-2">Logout</a>
                                </div>
                            </div>

                        </div>
                        <div class="profile_left_content_hero p-4 box_shadow border_radius_20 d-flex align-items-center">
                            <div class="profile_sec_hero text-white">
                                <p class="fw_gilroy_medium mb-0">It's time to make a chance. Have your</p>
                                <h2 class="h4 text-uppercase fw_gilroy_bold my-1">next trip funded by</h2>
                                <p class="fw_gilroy_medium mb-0">supporters from around the world.</p>
                                <a href="/solo" class="text-capitalize d-inline-block mt-3 btn medium_btn btn_pink_white">fund
                                    my Trip Solo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- filter  -->
            <div class="wrap_account_filter">
                <div class="container-lg pad_lg">
                    <div class="account_filter_buttons">
                        <div class="wrap_acc_buttons">
                            <div class="swiper-button-prev" >
                                <img src="/img/arrow_right_l.svg" alt="">
                            </div>
                            <div class="swiper-button-next" >
                                <img src="/img/arrow_left_l.svg" alt="">
                            </div>
                        </div>
                        <div id="my_account_slider" class="swiper my_account_slider">
                            <div class="swiper-wrapper">
                                <!-- 1 -->
                                <div class="swiper-slide my_account_slide my_account_slide_active"
                                    v-on:click="nextSlide($event, 'acc_filter_box_1')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path id="icons8_dashboard_layout"
                                            d="M9,2H4A2,2,0,0,0,2,4v7a2,2,0,0,0,2,2H9a2,2,0,0,0,2-2V4A2,2,0,0,0,9,2ZM20,2H15a2,2,0,0,0-2,2V7a2,2,0,0,0,2,2h5a2,2,0,0,0,2-2V4A2,2,0,0,0,20,2ZM9,15H4a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2H9a2,2,0,0,0,2-2V17A2,2,0,0,0,9,15Zm11-4H15a2,2,0,0,0-2,2v7a2,2,0,0,0,2,2h5a2,2,0,0,0,2-2V13A2,2,0,0,0,20,11Z"
                                            transform="translate(-2 -2)" />
                                    </svg>
                                    <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Dashboard</p>
                                </div>
                                <!-- 2 -->
                                {{-- <div class="swiper-slide my_account_slide" onclick="nextSlide(event, 'acc_filter_box_2')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.299 24.298">
                                        <path id="icons8_user_male"
                                            d="M18.187,19.2V17.174a5.288,5.288,0,0,0,1.9-2.989c.358-.027.921-.356,1.087-1.655a1.184,1.184,0,0,0-.48-1.213,5.358,5.358,0,0,0,.535-2.242c0-2.458-.965-4.556-3.037-4.556A3.221,3.221,0,0,0,15.149,3C10.855,3,9.075,5.756,9.075,9.076a6.034,6.034,0,0,0,.535,2.242,1.185,1.185,0,0,0-.48,1.213c.166,1.3.729,1.628,1.087,1.655a5.288,5.288,0,0,0,1.9,2.989V19.2C11.1,22.237,3,20.212,3,27.3H27.3C27.3,20.212,19.2,22.237,18.187,19.2Z"
                                            transform="translate(-3 -3.001)" />
                                    </svg>
                                    <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Personal Info</p>
                                </div> --}}
                                <!-- 3 -->
                                <div class="swiper-slide my_account_slide" v-on:click="nextSlide($event, 'acc_filter_box_3')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.238 24.298">
                                        <path id="icons8_payment_history"
                                            d="M5.3,9A2.3,2.3,0,0,0,3,11.3V22.462a2.3,2.3,0,0,0,2.3,2.3H15.576a8.592,8.592,0,0,1,.558-1.97H8.168a2.615,2.615,0,0,0-3.2-3.2V14.169a2.625,2.625,0,0,0,3.2-3.2H25.414a2.615,2.615,0,0,0,3.2,3.2v4.717a8.313,8.313,0,0,1,1.97,1.739V11.3a2.3,2.3,0,0,0-2.3-2.3H5.3Zm11.492,3.94c-1.812,0-3.283,1.767-3.283,3.94s1.471,3.94,3.283,3.94a2.52,2.52,0,0,0,.545-.059,8.327,8.327,0,0,1,2.364-2.05,4.608,4.608,0,0,0,.375-1.832C20.074,14.707,18.6,12.94,16.791,12.94Zm0,1.97c.624,0,1.313.808,1.313,1.97s-.69,1.97-1.313,1.97-1.313-.808-1.313-1.97S16.167,14.91,16.791,14.91Zm-7.224.657A1.313,1.313,0,1,0,10.88,16.88,1.313,1.313,0,0,0,9.567,15.567Zm14.447,0a1.318,1.318,0,0,0-1.1,2.042,8.405,8.405,0,0,1,2.193,0,1.318,1.318,0,0,0-1.1-2.042Zm0,3.283a7.224,7.224,0,1,0,7.224,7.224A7.224,7.224,0,0,0,24.014,18.85Zm-2.627,2.627h5.254a.657.657,0,1,1,0,1.313V24.1a2.611,2.611,0,0,1-.908,1.97,2.611,2.611,0,0,1,.908,1.97v1.313a.657.657,0,1,1,0,1.313H21.388a.657.657,0,1,1,0-1.313V28.044a2.611,2.611,0,0,1,.908-1.97,2.611,2.611,0,0,1-.908-1.97V22.791a.657.657,0,0,1,0-1.313ZM22.7,22.791V24.1h2.627V22.791Zm1.313,3.94A1.315,1.315,0,0,0,22.7,28.044V29.1l1.106-.368a.661.661,0,0,1,.416,0l1.106.368V28.044A1.315,1.315,0,0,0,24.014,26.731Z"
                                            transform="translate(-3 -9)" />
                                    </svg>
                                    <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Gift Cards</p>
                                </div>
                                <!-- 4 -->
                                <div class="swiper-slide my_account_slide" v-on:click="nextSlide($event, 'acc_filter_box_4')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.089 27.066">
                                        <path id="icons8_pnr_code"
                                            d="M9.864,9a1.353,1.353,0,0,0-1.353,1.353,3.14,3.14,0,0,1-3.158,3.158A1.353,1.353,0,0,0,4,14.864V30.2a1.353,1.353,0,0,0,1.353,1.353,3.14,3.14,0,0,1,3.158,3.158,1.353,1.353,0,0,0,1.353,1.353h24.36a1.353,1.353,0,0,0,1.353-1.353,3.14,3.14,0,0,1,3.158-3.158A1.353,1.353,0,0,0,40.089,30.2V14.864a1.353,1.353,0,0,0-1.353-1.353,3.14,3.14,0,0,1-3.158-3.158A1.353,1.353,0,0,0,34.224,9Zm1.078,2.707H26.555v.451a1.353,1.353,0,1,0,2.707,0v-.451h3.884a5.74,5.74,0,0,0,4.236,4.236V29.124a5.74,5.74,0,0,0-4.236,4.236H29.262v-.451a1.353,1.353,0,1,0-2.707,0v.451H10.943a5.74,5.74,0,0,0-4.236-4.236V15.943A5.74,5.74,0,0,0,10.943,11.707ZM27.888,15.3a1.353,1.353,0,0,0-1.332,1.373v.9a1.353,1.353,0,1,0,2.707,0v-.9A1.353,1.353,0,0,0,27.888,15.3ZM12.571,17.12a1.353,1.353,0,1,0,0,2.707h9.022a1.353,1.353,0,1,0,0-2.707Zm15.317,3.589a1.353,1.353,0,0,0-1.332,1.373v.9a1.353,1.353,0,1,0,2.707,0v-.9a1.353,1.353,0,0,0-1.374-1.373Zm0,5.413A1.353,1.353,0,0,0,26.555,27.5v.9a1.353,1.353,0,1,0,2.707,0v-.9a1.353,1.353,0,0,0-1.374-1.373Z"
                                            transform="translate(-4 -9)" />
                                    </svg>
                                    <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Coupons</p>
                                </div>
                                <!-- 5 -->
                                <div class="swiper-slide my_account_slide" v-on:click="nextSlide($event, 'acc_filter_box_5')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.855 28.25">
                                        <path id="icons8_security_lock"
                                            d="M16.958,2a.942.942,0,0,0-.66.242S11.585,6.394,5.942,6.394A.942.942,0,0,0,5,7.336v7.7c0,4.192,1.939,11.091,11.562,15.144a.942.942,0,0,0,.731,0c9.623-4.053,11.562-10.951,11.562-15.144v-7.7a.942.942,0,0,0-.942-.942c-5.644,0-10.357-4.153-10.357-4.153a.942.942,0,0,0-.6-.242Zm-.031,2.152A18.862,18.862,0,0,0,26.972,8.2v6.833c0,3.6-1.385,9.42-10.044,13.225-8.659-3.8-10.044-9.62-10.044-13.225V8.2A18.862,18.862,0,0,0,16.928,4.152Zm0,6.637a3.139,3.139,0,0,0-1.883,5.65v3.139a1.883,1.883,0,1,0,3.767,0V16.434a3.139,3.139,0,0,0-1.883-5.645Z"
                                            transform="translate(-5 -1.999)" />
                                    </svg>
                                    <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Security</p>
                                </div>
                                <!-- 6 -->
                                {{-- <div class="swiper-slide my_account_slide" onclick="nextSlide(event, 'acc_filter_box_6')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.075 28.25">
                                        <path id="icons8_credit_control"
                                            d="M4.825,4A2.824,2.824,0,0,0,2,6.825v16.95A2.824,2.824,0,0,0,4.825,26.6h5.344l.582-1.217a11.105,11.105,0,0,1,1.01-1.608H4.825V13.888h22.6v4.833a13.43,13.43,0,0,1,2.825,1.192V6.825A2.824,2.824,0,0,0,27.425,4Zm0,2.825h22.6V9.65H4.825ZM23.188,20.95A10.989,10.989,0,0,0,13.3,26.6a10.989,10.989,0,0,0,9.887,5.65,10.989,10.989,0,0,0,9.888-5.65A10.989,10.989,0,0,0,23.188,20.95Zm0,2.825A2.825,2.825,0,1,1,20.362,26.6,2.826,2.826,0,0,1,23.188,23.775Z"
                                            transform="translate(-2 -4)" />
                                    </svg>
                                    <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Payments</p>
                                </div> --}}
                                <!-- 7 -->
                                <div class="swiper-slide my_account_slide" v-on:click="nextSlide($event, 'acc_filter_box_7')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.056 28.25">
                                        <path id="icons8_notification_1"
                                            d="M18.519,4.013A11.052,11.052,0,0,0,8.177,15.142v5.264l-1.92,3.862-.01.021A2.568,2.568,0,0,0,8.541,27.9H14.7a4.346,4.346,0,0,0,8.692,0h6.154a2.568,2.568,0,0,0,2.295-3.615l-.01-.021-1.92-3.862v-5.54A10.885,10.885,0,0,0,18.519,4.013Zm.1,2.17a8.674,8.674,0,0,1,9.114,8.683v5.795a1.087,1.087,0,0,0,.113.484l2.023,4.072a.337.337,0,0,1-.328.515h-21a.336.336,0,0,1-.327-.515h0l2.023-4.07a1.087,1.087,0,0,0,.113-.484V15.142A8.87,8.87,0,0,1,18.621,6.183ZM16.87,27.9h4.346a2.173,2.173,0,1,1-4.346,0Z"
                                            transform="translate(-6.015 -4.001)" />
                                    </svg>
                                    <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Notifications</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- filter box -->

                <!-- 1 -->
                <div id="acc_filter_box_1" class="account_filter_box">
                    <div>
                        <div class="my_account_content_dashboard">
                            <div class="container-lg pad_lg">
                                {{-- <div
                                    class="maccount_dashboard_header txt_blue_secondary fw_gilroy_medium bg-white border_radius_20 mt-4 my-3 mb-4 p-4">
                                    <div class="maccount_dashboard_header_item">
                                        <a href="#"></a>
                                        <div class="maccount_dashboard_item_img">
                                            <img src="/img/Email_and_Password_account.svg" alt="">
                                        </div>
                                        <p class="mb-0 fs_14">Email and Password</p>
                                    </div>
                                    <div class="maccount_dashboard_header_item">
                                        <a href="#"></a>
                                        <div class="maccount_dashboard_item_img">
                                            <img src="/img/Payment_Methods_account.svg" alt="">
                                        </div>
                                        <p class="mb-0 fs_14">Payment Methods</p>
                                    </div>
                                    <div class="maccount_dashboard_header_item">
                                        <a href="#"></a>
                                        <div class="maccount_dashboard_item_img">
                                            <img src="/img/Email_Preferences_account.svg" alt="">
                                        </div>
                                        <p class="mb-0 fs_14">Email Preferences</p>
                                    </div>
                                    <div class="maccount_dashboard_header_item">
                                        <a href="#"></a>
                                        <div class="maccount_dashboard_item_img">
                                            <img src="/img/My_Deal_Alerts_account.svg" alt="">
                                        </div>
                                        <p class="mb-0 fs_14">My Deal Alerts</p>
                                    </div>
                                    <div class="maccount_dashboard_header_item">
                                        <a href="#"></a>
                                        <div class="maccount_dashboard_item_img">
                                            <img src="/img/Trips_For_Me_account.svg" alt="">
                                        </div>
                                        <p class="mb-0 fs_14">Trips For Me</p>
                                    </div>
                                    <div class="maccount_dashboard_header_item">
                                        <a href="#"></a>
                                        <div class="maccount_dashboard_item_img">
                                            <img src="/img/Connected_Accounts_account.svg" alt="">
                                        </div>
                                        <p class="mb-0 fs_14">Connected Accounts</p>
                                    </div>
                                </div> --}}

                                <div class="content_wrapper_3_dashboard">
                                    <div class="maccount_my_shopping_coupons p-4 border_radius_20 box_shadow bg-white">
                                        <div
                                            class="d-flex align-items-center justify-content-between mb-4 shoping_coupons_header">
                                            <h4 class="h6 txt_blue_secondary fw_gilroy_bold mb-0">My Current Gift Cards</h4>
                                            {{-- <a onclick="" class="btn d-inline-block btn_pink medium_btn py-2 px-4">Check
                                                All
                                                Gift Cards</a> --}}
                                        </div>
                                        {{-- <div class="offer_coupons_wrapper box_shadow border_radius_13 p-3 mb-3">
                                            <div
                                                class="d-flex align-items-center justify-content-between pb-3 maccount_border_bottom">
                                                <div>
                                                    <h4 class="h3 txt_pink fw_gilroy_regular"><span
                                                            class="fw_gilroy_medium">10%</span> OFF</h4>
                                                    <p class="fw_gilroy_medium fs_14 txt_blue_secondary pe-1 mb-0">VISA Card
                                                        Offer - Up
                                                        To 10% Cashback</p>
                                                </div>
                                                <div>
                                                    <div class="d-flex mb-4">
                                                        <p
                                                            class="mb-0 fs_14 d-flex align-items-center txt_green fw_gilroy_light me-2">
                                                            <img class="offer_status_icon me-1"
                                                                src="/img/verified_icon_ok.svg" alt=""> verified
                                                        </p>
                                                        <p
                                                            class="mb-0 fs_14 d-flex align-items-center txt_silver fw_gilroy_light">
                                                            <img class="offer_status_icon me-1"
                                                                src="/img/users_icon_dashboard.svg" alt=""> Users
                                                        </p>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a class="btn btn_silver medium_btn fs_14" href="#">Get Deal</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end py-2">
                                                <img class="offer_status_icon me-2" src="/img/stopwatch_icon.svg"
                                                    alt="">
                                                <p class="fs_14 mb-0 mt-1 fw_gilroy_medium txt_silver">Valid till 31st Mar, 21
                                                </p>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="offer_coupons_wrapper box_shadow border_radius_13 p-3">
                                            <div
                                                class="d-flex align-items-center justify-content-between pb-3 maccount_border_bottom">
                                                <div>
                                                    <h4 class="h3 txt_pink fw_gilroy_regular"><span
                                                            class="fw_gilroy_medium">20%</span> OFF</h4>
                                                    <p class="fw_gilroy_medium fs_14 txt_blue_secondary pe-1 mb-0">Grab 20%
                                                        Cashback via
                                                        Citi Bank Cards</p>
                                                </div>
                                                <div>
                                                    <div class="d-flex mb-4">
                                                        <p
                                                            class="mb-0 fs_14 d-flex align-items-center txt_green fw_gilroy_light me-2">
                                                            <img class="offer_status_icon me-1"
                                                                src="/img/verified_icon_ok.svg" alt=""> verified
                                                        </p>
                                                        <p
                                                            class="mb-0 fs_14 d-flex align-items-center txt_silver fw_gilroy_light">
                                                            <img class="offer_status_icon me-1"
                                                                src="/img/users_icon_dashboard.svg" alt=""> Users
                                                        </p>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a class="btn btn_silver medium_btn fs_14" href="#">Get Deal</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end py-2">
                                                <img class="offer_status_icon me-2" src="/img/stopwatch_icon.svg"
                                                    alt="">
                                                <p class="fs_14 mb-0 mt-1 fw_gilroy_medium txt_silver">Valid till 31st Mar, 21
                                                </p>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="maccount_cash p-4 border_radius_20 box_shadow bg-white">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <h4 class="h6 txt_blue_secondary fw_gilroy_bold mb-0">Cash</h4>
                                            <a href="#"><img src="/img/maccount_dashboard_right_arrow.svg"
                                                    alt=""></a>
                                        </div>
                                        <div class="solo_balance_wrapper p-4 border_radius_20">
                                            <p class="fw_gilroy_medium text-white mb-3">My Solo balance</p>
                                            <div class="ms-auto mt-auto">
                                                <h5 class="h3 text-white fw_gilroy_medium mb-0">$ @{{ available_balance }}</h5>
                                            </div>
                                        </div>
                                        <div class="text-center py-2">
                                            {{-- <a href="#" class="txt_blue_secondary txt_link_dark_blue">Redeem Balance as
                                                Gift
                                                Card</a> --}}
                                        </div>
                                    </div>
                                    <div class="maccount_notification p-4 border_radius_20 box_shadow bg-white">
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <h4 class="h6 txt_blue_secondary fw_gilroy_bold mb-0">Notifications</h4>
                                            <a href="#"><img src="/img/maccount_dashboard_right_arrow.svg"
                                                    alt=""></a>
                                        </div>
                                        <div>
                                            <div class="notification_item_wrapper">
                                                <p
                                                    class="fs_14 txt_blue_secondary fw_gilroy_medium mb-0 maccount_notification_txt">
                                                    Quia alias odio maxime autem maiores aperiam.</p>
                                                <p class="fs_14 txt_silver fw_gilroy_medium">10th November 2020</p>
                                            </div>
                                            <div class="notification_item_wrapper">
                                                <p
                                                    class="fs_14 txt_blue_secondary fw_gilroy_medium mb-0 maccount_notification_txt">
                                                    Consequatur molestiae exercitationem dolorum facilis neque rem
                                                    reprehenderit.
                                                </p>
                                                <p class="fs_14 txt_silver fw_gilroy_medium">17th July 2020</p>
                                            </div>
                                            <div class="notification_item_wrapper">
                                                <p
                                                    class="fs_14 txt_blue_secondary fw_gilroy_medium mb-0 maccount_notification_txt">
                                                    Officia natus officiis dignissimos qui accusamus iusto sed dolor.</p>
                                                <p class="fs_14 txt_silver fw_gilroy_medium">28th May 2020</p>
                                            </div>
                                            <div class="notification_item_wrapper">
                                                <p
                                                    class="fs_14 txt_blue_secondary fw_gilroy_medium mb-0 maccount_notification_txt">
                                                    Tempore qui laboriosam quae sunt tenetur.</p>
                                                <p class="fs_14 txt_silver fw_gilroy_medium">16th February 2020</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2 -->
                <div id="acc_filter_box_2" class="account_filter_box" style="display: none;">
                    <div class="my_account_content_dashboard">
                        <div class="container-lg pad_lg pt-3">
                            <form class="row acc_personal_info">
                                <!-- left -->
                                <div class="col-md-6 mb-md-0 mb-3">
                                    <div class="acc_personal_box box_shadow">
                                        <h5 class="text_dark_blue fw_gilroy_bold mb-4">Personal Information</h5>
                                        <h6 class="text-capitalize text_dark_blue fw_gilroy_bold">Full name</h6>
                                        <div class="row gx-0">
                                            <div class="col-12 d-flex mb-3">
                                                <div
                                                    class="input__gray select_box region_p select_review select_account b_radius_input text_dark_blue fw_gilroy_bold me-3">
                                                    <select class="child_select_box" style="display: none;">
                                                        <option value="1" selected="">Mr</option>
                                                        <option value="2">Miss</option>
                                                    </select>
                                                </div>
                                                <input type="text" required
                                                    class="form-control input__gray input_review fs_14" id="fname"
                                                    placeholder="First Name &amp; Middle Name(if any)">
                                            </div>
                                            <div class="col-12 mb-4">
                                                <input type="text" required
                                                    class="form-control input__gray input_review fs_14" id="lname"
                                                    placeholder="Last Name">
                                            </div>
                                            <div class="col-12 row gx-0">
                                                <div class="col-xl-5 mb-xl-0 mb-4 row gx-0">
                                                    <h6 class="col-12 text-capitalize text_dark_blue fw_gilroy_bold">Full name
                                                    </h6>
                                                    <div class="col-12 acc_personal_date_box d-flex">
                                                        <input type="text"
                                                            class="form-control input__gray input_review fs_14 me-1"
                                                            placeholder="dd">
                                                        <input type="text"
                                                            class="form-control input__gray input_review fs_14 me-1"
                                                            placeholder="MM">
                                                        <input type="text"
                                                            class="form-control input__gray input_review fs_14"
                                                            placeholder="YYYY">
                                                    </div>
                                                </div>
                                                <div class="col-xl-7 row gx-0 ps-xl-4 ps-0">
                                                    <h6 class="col-sm-12 text-capitalize text_dark_blue fw_gilroy_bold">Profile
                                                        Image</h6>
                                                    <div class="col-sm-12 d-flex align-items-center">
                                                        <img width="40" src="/img/profile_man_img.svg" alt="">
                                                        <div class="ms-3 wrap_create_file_upload">
                                                            <img src="/img/upload_icon.svg" alt="">
                                                            <span class="ms-2">Drag and drop here</span>
                                                            <input type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- right -->
                                <div class="col-md-6">
                                    <div class="acc_personal_box box_shadow">
                                        <h5 class="text_dark_blue fw_gilroy_bold mb-4">Contact details</h5>
                                        <h6 class="text-capitalize text_dark_blue fw_gilroy_bold">Mobile Number</h6>
                                        <!-- row -->
                                        <div class="row gx-0 mb-3">
                                            <div class="col-3 mb-sm-0 mb-3">
                                                <div
                                                    class="input__gray b_radius_input h6 text_dark_blue fw_gilroy_bold me-3 mb-0">
                                                    <div class="d-flex align-items-center wrap_country_code">
                                                        <img class="d-inline-block ps-2" src="/img/usa_flag.svg"
                                                            alt="">
                                                        <input type="text" required=""
                                                            class="form-control input__gray input_review fs_14" id="c_code"
                                                            placeholder="+01">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <input type="number" required=""
                                                    class="form-control input__gray input_review fs_14" id="m_number"
                                                    placeholder="Mobile number">
                                            </div>
                                        </div>
                                        <!-- row -->
                                        <div class="row gx-0 mb-3">
                                            <label for="e_mail"
                                                class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">Email
                                                Address</label>
                                            <input type="email" required=""
                                                class="col-12 form-control input__gray input_review fs_14" id="e_mail"
                                                placeholder="Valid Email Id">
                                        </div>
                                        <!-- row -->
                                        <div class="row gx-3 mb-3">
                                            <div class="col-lg-6 mb-lg-0 mb-3">
                                                <label for="acc_address"
                                                    class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">Address
                                                    1</label>
                                                <input type="text" required=""
                                                    class="col-12 form-control input__gray input_review fs_14"
                                                    id="acc_address">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="acc_city"
                                                    class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">City</label>
                                                <input type="text" required=""
                                                    class="col-12 form-control input__gray input_review fs_14" id="acc_city">
                                            </div>
                                        </div>
                                        <!-- row -->
                                        <div class="row gx-3">
                                            <div class="col-lg-6 mb-lg-0 mb-3">
                                                <label for="acc_postcode"
                                                    class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">postcode</label>
                                                <input type="text" required=""
                                                    class="col-12 form-control input__gray fs_14" id="acc_postcode">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="input__gray_region"
                                                    class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">homeland
                                                    / region</label>
                                                <select class="select_gray input__gray child_select_box region_p"
                                                    style="display: none;">
                                                    <option selected="">homeland / region</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="account_save_btn" class="col-xl-3 col-lg-4 col-md-5 col-8 mt-5 d-block ms-auto">
                                    <a href="#" class="btn py-2 btn_pink medium_btn d-block">Save</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- 3 -->
                <div id="acc_filter_box_3" class="account_filter_box" style="display: none;">
                    <div>
                        <div class="my_account_content_dashboard pt-4">
                            <div class="container-lg pad_lg">
                                <div class="content_wrapper_3_dashboard">
                                    <div class="available_balance">
                                        <div class="p-4 border_radius_20 box_shadow bg-white mb-3">
                                            <div class="solo_balance_wrapper p-4 border_radius_20">
                                                <p class="fw_gilroy_medium text-white mb-3">Available Balance</p>
                                                <div class="ms-auto mt-auto">
                                                    <h5 class="h3 text-white fw_gilroy_medium mb-0">$ @{{ available_balance }}
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="text-center py-2">
                                                <a v-on:click="redeemBalance"
                                                    class="txt_blue_secondary txt_link_dark_blue">Redeem Balance
                                                    as Gift
                                                    Card</a>
                                            </div>
                                        </div>

                                        <div class="p-5 border_radius_20 box_shadow bg-white this_month_wrapper">
                                            <h4 class="h5 fw_gilroy_bold txt_blue_secondary mb-3">Spending this month</h4>
                                            <div class="d-flex align-items-center">
                                                <h4 class="h2 letter_space_2 mb-0 me-3">$0</h4>
                                                <div class="icon_txt_percentage border_radius_20">
                                                    {{-- <img src="/img/icon_increase.svg" alt="">
                                                    <span class="txt_silver fs_14">8.4%</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent_transactions p-4">
                                        <h4 class="h5 fw_gilroy_bold txt_blue_secondary mb-3">Gift Cards</h4>

                                        <div v-for="gift_card in user.gift_cards"
                                            class="p-4 border_radius_20 box_shadow bg-white mb-3">
                                            <div class="solo_balance_wrapper p-4 border_radius_20">
                                                <p class="fw_gilroy_medium text-white mb-3">Available Balance $
                                                    @{{ available_balance }} </p>
                                                <div class="ms-auto mt-auto">
                                                    <h5 class="h3 text-white fw_gilroy_medium mb-0">

                                                    </h5>
                                                </div>
                                            </div>
                                            {{-- <div class="text-center py-2">
                                                <a href="#" class="txt_blue_secondary txt_link_dark_blue">Redeem Balance
                                                    as Gift
                                                    Card</a>
                                            </div> --}}
                                        </div>
                                        {{-- <div class="notification_item_wrapper pt-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img src="/img/icon_time_machine.svg" alt=""
                                                        class="offer_status_icon me-4">
                                                    <div>
                                                        <p class="mb-0 fw_gilroy_medium txt_blue_secondary">No Transactions Yet
                                                        </p>
                                                        <p class="fs_14 txt_silver fw_gilroy_medium mb-0"></p>
                                                    </div>
                                                </div>
                                                <p class="d-inline-block mb-0 txt_green fw_gilroy_medium"></p>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="notification_item_wrapper pt-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img src="/img/icon_checked.svg" alt=""
                                                        class="offer_status_icon me-4">
                                                    <div>
                                                        <p class="mb-0 fw_gilroy_medium txt_blue_secondary">Fugit aut
                                                            cupiditate
                                                            soluta</p>
                                                        <p class="fs_14 txt_silver fw_gilroy_medium mb-0">28th July 2019 </p>
                                                    </div>
                                                </div>
                                                <p class="d-inline-block mb-0 txt_silver fw_gilroy_medium">$20</p>
                                            </div>
                                        </div>

                                        <div class="notification_item_wrapper pt-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img src="/img/icon_checked.svg" alt=""
                                                        class="offer_status_icon me-4">
                                                    <div>
                                                        <p class="mb-0 fw_gilroy_medium txt_blue_secondary">Et ut qui vitae sit
                                                        </p>
                                                        <p class="fs_14 txt_silver fw_gilroy_medium mb-0">9th January 2022</p>
                                                    </div>
                                                </div>
                                                <p class="d-inline-block mb-0 txt_silver fw_gilroy_medium">$68</p>
                                            </div>
                                        </div>

                                        <div class="notification_item_wrapper pt-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img src="/img/icon_time_machine.svg" alt=""
                                                        class="offer_status_icon me-4">
                                                    <div>
                                                        <p class="mb-0 fw_gilroy_medium txt_blue_secondary">Dolore doloremque
                                                            perferendis</p>
                                                        <p class="fs_14 txt_silver fw_gilroy_medium mb-0">Pending</p>
                                                    </div>
                                                </div>
                                                <p class="d-inline-block mb-0 txt_dark_red fw_gilroy_medium">$250</p>
                                            </div>
                                        </div>

                                        <div class="notification_item_wrapper pt-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img src="/img/icon_checked.svg" alt=""
                                                        class="offer_status_icon me-4">
                                                    <div>
                                                        <p class="mb-0 fw_gilroy_medium txt_blue_secondary">Et ut qui vitae sit
                                                        </p>
                                                        <p class="fs_14 txt_silver fw_gilroy_medium mb-0">9th January 2022</p>
                                                    </div>
                                                </div>
                                                <p class="d-inline-block mb-0 txt_silver fw_gilroy_medium">$68</p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 4 -->
                <div id="acc_filter_box_4" class="account_filter_box" style="display: none;">
                    <div>
                        <div class="container-lg pad_lg pt-4">
                            <div class="p-md-5 p-4 py-5 pad__x bg-white border_radius_20">
                                <h4 class="h5 fw_gilroy_bold txt_blue_secondary mb-4">My Shopping Coupons</h4>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div class="shopping_coupons_wrapper">






                                        <div
                                            class="shopping_coupons_accordion_item border_radius_13 box_shadow offer_coupons_wrapper">
                                            <div
                                                class="d-flex align-items-center justify-content-between pb-3 maccount_border_bottom">
                                                <div>
                                                    <h4 class="h3 txt_pink fw_gilroy_regular"><span
                                                            class="fw_gilroy_medium">45%</span>
                                                        OFF</h4>
                                                    <p class="fw_gilroy_medium fs_14 txt_blue_secondary pe-1 mb-0">Get Up To
                                                        45% OFF On
                                                        Hotel Stays Anywhere In India</p>
                                                </div>
                                                <div>
                                                    <div class="d-flex mb-4">
                                                        <p
                                                            class="mb-0 fs_14 d-flex align-items-center txt_green fw_gilroy_light me-2">
                                                            <img class="offer_status_icon me-1"
                                                                src="/img/verified_icon_ok.svg" alt="">
                                                            verified
                                                        </p>
                                                        <p
                                                            class="mb-0 fs_14 d-flex align-items-center txt_silver fw_gilroy_light">
                                                            <img class="offer_status_icon me-1"
                                                                src="/img/users_icon_dashboard.svg" alt=""> Users
                                                        </p>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a class="btn btn_pink medium_btn fs_14" href="#">Get Deal</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-center justify-content-end pt-2 pb-3">
                                                    <div class="mb-0 fs_14 txt_silver text-end txt_align_none_res"><img
                                                            src="/img/stopwatch_icon.svg" alt=""
                                                            class="offer_status_icon me-1">
                                                        Valid till 31st Mar, 21</div>
                                                    <button
                                                        class="btn accordion-button collapsed justify-content-end accordion_arrow_btn p-0 fs_14 coupons_accordion_btn"
                                                        role="button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse6" aria-expanded="true"
                                                        aria-controls="collapse6">Hide Details</button>
                                                </div>

                                                <div class="accordion_wrapper" id="accordionWrapper5">
                                                    <div id="collapse6" class="collapse accordion-collapse collapsed"
                                                        aria-labelledby="heading6" data-bs-parent="#accordionWrapper6">
                                                        <div class="shopping_coupons_accordion p-4 border_radius_13">
                                                            <div class="d-flex mb-3">
                                                                <div class="me-5">
                                                                    <p class="line_height_18 mb-0 txt_silver fs_14">Hotels</p>
                                                                    <p class="line_height_18 mb-0 txt_silver fs_14">Valid</p>
                                                                    <p class="line_height_18 mb-0 txt_silver fs_14">Refer &
                                                                        Earn</p>
                                                                    <p class="line_height_18 mb-0 txt_silver fs_14">Sign Up</p>
                                                                </div>
                                                                <div>
                                                                    <p class="line_height_18 mb-0 txt_silver fs_14">Up To 50%
                                                                        OFF
                                                                    </p>
                                                                    <p class="line_height_18 mb-0 txt_silver fs_14">Hotels
                                                                        World
                                                                        Wide</p>
                                                                    <p class="line_height_18 mb-0 txt_silver fs_14">Wallet Cash
                                                                    </p>
                                                                    <p class="line_height_18 mb-0 txt_silver fs_14">Grab
                                                                        Exciting
                                                                        Deals</p>
                                                                </div>
                                                            </div>

                                                            <div class="mt-4">
                                                                <ul class="list-unstyled important_information_ul">
                                                                    <li class="fw_gilroy_medium txt_silver fs_14 mb-2">
                                                                        Mid-Month
                                                                        Sale: Plan a vacation during this holiday season and
                                                                        enjoy
                                                                        up to 50% OFF on exciting and high-reviewed & preferred
                                                                        hotels, resorts, and villas across the India &
                                                                        worldwide.
                                                                    </li>
                                                                    <li class="fw_gilroy_medium txt_silver fs_14 mb-2"> You can
                                                                        also
                                                                        book apartments at exotic locations as well.</li>
                                                                    <li class="fw_gilroy_medium txt_silver fs_14 mb-2"> Also
                                                                        browse
                                                                        through and redeem booking.com offers available on the
                                                                        page.
                                                                    </li>
                                                                </ul>
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
                    </div>
                </div>
                <!-- 5 -->
                <div id="acc_filter_box_5" class="account_filter_box" style="display: none;">
                    <div class="my_account_content_dashboard">
                        <div class="container-lg pad_lg pt-3">
                            <div class="row acc_personal_info">
                                <!-- left -->
                                <form class="col-lg-6 mb-lg-0 mb-3">
                                    <div class="acc_personal_box box_shadow">
                                        <h5 class="text_dark_blue fw_gilroy_bold mb-4">Change Password</h5>
                                        <label for="acc_password"
                                            class="text-capitalize text_dark_blue fw_gilroy_bold mb-2">Old password</label>
                                        <div class="row gx-0">
                                            <div class="col-12 mb-3">
                                                <input type="password" required
                                                    class="form-control input__gray input_review fs_14" id="acc_password"
                                                    placeholder="Enter Your Old Password">
                                            </div>
                                        </div>
                                        <div class="row gx-3">
                                            <div class="col-sm-6 mb-sm-0 mb-3">
                                                <div class="row gx-0">
                                                    <label for="acc_npassword"
                                                        class="col-12 text-capitalize text_dark_blue fw_gilroy_bold mb-2">New
                                                        Password</label>
                                                    <div class="col-12">
                                                        <input type="text" required
                                                            class="form-control input__gray input_review fs_14"
                                                            id="acc_npassword" placeholder="Enter Your New Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="row gx-0">
                                                    <label for="acc_cpassword"
                                                        class="col-12 text-capitalize text_dark_blue fw_gilroy_bold mb-2">Confirm
                                                        Password</label>
                                                    <div class="col-12">
                                                        <input type="text" required
                                                            class="form-control input__gray input_review fs_14"
                                                            id="acc_cpassword" placeholder="Enter Confirm Your New Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-sm-end justify-content-center mt-3">
                                                <button type="submit" href="#"
                                                    class="btn py-2 btn_pink medium_btn d-inline-block">Save New
                                                    Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- right -->
                                <div class="col-lg-6">
                                    <div class="acc_personal_box box_shadow">
                                        <h5 class="text_dark_blue fw_gilroy_bold mb-4">Verify Your Account</h5>
                                        <!-- row -->
                                        <div class="row gx-3">
                                            <div class="col-12">
                                                <label for="acc_phone_verify"
                                                    class="acc_verify_label mb-1 fw_gilroy_bold text_dark_blue d-flex align-items-center">Mobile
                                                    Number Verification


                                                    <p v-if="phone_number_verified"
                                                        class="mb-0 fw_gilroy_medium txt_green ms-1"><img width="18"
                                                            src="/img/verified_icon_ok.svg" alt="">
                                                        Verified</p>


                                                    <p v-if="!phone_number_verified"
                                                        class="mb-0 fw_gilroy_medium text_red ms-1">


                                                        <img width="18" src="/img/cross_small.svg" alt=""> Not
                                                        Verified
                                                    </p>




                                                </label>
                                            </div>
                                        </div>
                                        <!-- row -->
                                        <div class="row gx-3">
                                            <div class="col-sm-8 mb-sm-0 mb-3">
                                                <input v-if="!awaitingUserToEnterCode" v-model="new_phone_nr" type="text"
                                                    required class="form-control input__gray input_review fs_14"
                                                    id="acc_phone_verify"
                                                    placeholder="Enter your phone number and click verify">
                                                <span v-if="awaitingUserToEnterCode">Code has been sent to
                                                    @{{ new_phone_nr }}</span>
                                                <input v-if="awaitingUserToEnterCode" v-model="verification_code"
                                                    type="text" required
                                                    class="form-control input__gray input_review fs_14" id="acc_phone_verify"
                                                    placeholder="Enter Verification Code">
                                            </div>
                                            <div class="col-sm-4">
                                                <a v-if="awaitingUserToEnterCode" v-on:click="checkVerificationCode"
                                                    class="btn py-2 btn_pink medium_btn d-block text-center">Submit Code</a>
                                                <a v-if="!awaitingUserToEnterCode" v-on:click="sendVerificationCode"
                                                    class="btn py-2 btn_pink medium_btn d-block text-center">Verify</a>
                                            </div>
                                        </div>
                                        <!-- row -->
                                        <div class="row mb-md-5 mb-4">
                                            <p v-if="awaitingUserToEnterCode" class="col-12 mb-0 mt-1 fs_14 text_dark_blue">
                                                Code has been sent! It should arrive shortly.</p>
                                        </div>
                                        <!-- row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="acc_email_verify"
                                                    class="acc_verify_label mb-1 fw_gilroy_bold text_dark_blue d-flex align-items-center">Email
                                                    Verification <p class="mb-0 fw_gilroy_medium txt_green ms-1"><img
                                                            width="18" src="/img/verified_icon_ok.svg" alt="">
                                                        Verified</p></label>
                                            </div>
                                        </div>
                                        <!-- row -->
                                        <div class="row gx-3">
                                            <div class="col-sm-8 mb-sm-0 mb-3">
                                                <input type="text" required
                                                    class="form-control input__gray input_review fs_14" id="acc_email_verify"
                                                    placeholder="Enter Confirm Your New Password">
                                            </div>
                                            <div class="col-sm-4">
                                                <a href="#"
                                                    class="btn py-2 btn_silver medium_btn d-block text-center">Verify</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="account_save_btn"
                                    class="col-xl-3 col-lg-4 col-md-5 col-8 mt-md-5 mt-4 d-block ms-auto">
                                    <a href="#" class="btn py-2 btn_pink medium_btn d-block">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 6 -->
                <div id="acc_filter_box_6" class="account_filter_box" style="display: none;">
                    <div class="container-lg pt-4">
                        <div class="row pad_lg">
                            <!-- col 5 -->
                            <div class="col-md-5 mb-md-0 mb-3 px-0">
                                <div class="border_radius_20 bg-white c_w_g_left_child_4 c_w_g_left_child_1 mb-3">
                                    <h4 class="h5 fw_gilroy_bold text_dark_blue mb-4">My payment methods</h4>
                                    <div class="acc_wrap_cards">
                                        <div class="wrap_acc_card_box">
                                            <div class="acc_cross_card">
                                                <img src="/img/cross_icon_white.svg" alt="">
                                            </div>
                                            <img src="/img/bg_payments.svg" alt="">
                                            <div class="child_acc_card_box">
                                                <div class="d-flex flex-column align-items-center mb-2">
                                                    <img width="70" src="/img/master_card.svg" alt="">
                                                    <p class="mb-0 text-white fw_gilroy_bold mt-1">Master Card</p>
                                                </div>
                                                <p class="mb-0 text-white fw_gilroy_bold">***** 5325</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 -->
                                <div class="c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 pad__x">
                                    <div class="accordion" id="acc_payment">
                                        <div class="accordion-item">
                                            <h5 class="mb-0" id="headingPayment">
                                                <button
                                                    class="review_accordion_button accordion-button py-0 fw_gilroy_bold text_dark_blue"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapsePayment" aria-expanded="true"
                                                    aria-controls="collapsePayment">
                                                    Choose payment method
                                                </button>
                                            </h5>
                                            <div id="collapsePayment" class="accordion-collapse collapse show"
                                                aria-labelledby="headingPayment">
                                                <div class="accordion-body fw_gilroy_bold text_dark_blue">
                                                    <!-- 1 -->
                                                    <div class="payment_row mb-4">
                                                        <div class="form-check d-flex align-items-center">
                                                            <input class="form-check-input me-3 input_payment payment_checkbox"
                                                                type="radio" name="payment_method" id="payment_card">
                                                            <label class="form-check-label" for="payment_card">
                                                                <img class="credit_dars_img" src="/img/credit_cards.svg"
                                                                    alt="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-4 row_payment_box" style="display: flex;">
                                                        <div class="col-xl-12 col-sm-6 mb-3">
                                                            <label for="card_name" class="form-label">Name on card</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_name">
                                                        </div>
                                                        <div class="col-xl-12 col-sm-6 mb-3">
                                                            <label for="card_number" class="form-label">Card number</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_number">
                                                        </div>
                                                        <div class="col-sm-6 mb-3">
                                                            <label for="card_Expiration" class="form-label">Expiration
                                                                date</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_Expiration">
                                                        </div>
                                                        <div class="col-sm-6 mb-3">
                                                            <label for="card_cvc" class="form-label">CVC</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_cvc">
                                                        </div>
                                                    </div>
                                                    <!-- 2 -->
                                                    <div class="payment_row mb-4">
                                                        <div class="form-check d-flex align-items-center">
                                                            <input class="form-check-input me-3 input_payment payment_checkbox"
                                                                type="radio" name="payment_method" id="paypal">
                                                            <label class="form-check-label" for="paypal">
                                                                <img class="paypal_img" src="/img/paypal.svg" alt="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-4 row_payment_box">
                                                        <div class="col-lg-12 col-md-6 mb-3">
                                                            <label for="card_name" class="form-label">Name on card</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_name">
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 mb-3">
                                                            <label for="card_number" class="form-label">Card number</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_number">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="card_Expiration" class="form-label">Expiration
                                                                date</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_Expiration">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="card_cvc" class="form-label">CVC</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_cvc">
                                                        </div>
                                                    </div>
                                                    <!-- 3 -->
                                                    <div class="payment_row">
                                                        <div class="form-check d-flex align-items-center">
                                                            <input class="form-check-input me-3 input_payment payment_checkbox"
                                                                type="radio" name="payment_method" id="google_pay">
                                                            <label class="form-check-label" for="google_pay">
                                                                <img class="google_pay_img" src="/img/google_pay.svg"
                                                                    alt="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4 row_payment_box">
                                                        <div class="col-lg-12 col-md-6 mb-3">
                                                            <label for="card_name" class="form-label">Name on card</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_name">
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 mb-3">
                                                            <label for="card_number" class="form-label">Card number</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_number">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="card_Expiration" class="form-label">Expiration
                                                                date</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_Expiration">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="card_cvc" class="form-label">CVC</label>
                                                            <input type="text" required=""
                                                                class="form-control input__gray fs_14" id="card_cvc">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- col 7 -->
                            <div class="col-md-7 ps-md-3 ps-0 pe-0">
                                <div class="payment_account_right box_shadow border_radius_20">
                                    <img src="/img/payment_account_bg.png" alt="">
                                    <div class="child_payment_account">
                                        <h4 class="text-white fw_gilroy_bold">Eius rerum quia laboriosam saepe quia minus ullam
                                            veniam ut.</h4>
                                        <p class="mb-0 text_silver fw_gilroy_medium">Eligendi ea adipisci repudiandae et qui
                                            asperiores. Perferendis dolores optio placeat eum inventore culpa beatae
                                            non.spernatur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 7 -->
                <div id="acc_filter_box_7" class="account_filter_box" style="display: none;">
                    <div>
                        <div class="container-lg pad_lg pt-4">
                            <div class="p-md-5 p-4 py-5 pad__x bg-white border_radius_20 mb-5 recent_notification">
                                <h4 class="h5 fw_gilroy_bold txt_blue_secondary mb-4">Recent Notifications</h4>
                                <div class="d-flex justify-content-between flex-wrap notification_item_wrapper">
                                    <button
                                        class="btn accordion-button accordion_arrow_btn p-0 fs_14 fw_gilroy_bold txt_blue_secondary accordion_style"
                                        role="button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseNotification1" aria-expanded="true"
                                        aria-controls="collapseNotification1">
                                        <div class="fs_16">
                                            Tempore qui laboriosam quae sunt tenetur.
                                            <p class="mb-0 fw_gilroy_medium fs_14 txt_silver">16th February 2020</p>
                                        </div>
                                    </button>

                                    <div class="accordion_wrapper" id="accordionNotification1">
                                        <div id="collapseNotification1" class="collapse accordion-collapse show"
                                            aria-labelledby="headingNotification1" data-bs-parent="#accordionNotification1">
                                            <div class="my-4">
                                                <p class="fs_14 fw_gilroy_medium txt_silver">Ut molestiae ratione sequi odit
                                                    atque
                                                    officiis nobis harum. Asperiores enim repellendus quo atque officia ab et
                                                    tempora. Repellat quisquam et at doloribus doloremque ea. Dolore animi quo
                                                    dolorum impedit. Similique tenetur eligendi quibusdam rerum et. Voluptatem
                                                    qui
                                                    laboriosam similique aperiam voluptatum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between flex-wrap notification_item_wrapper">
                                    <button
                                        class="btn accordion-button accordion_arrow_btn p-0 fs_14 fw_gilroy_bold txt_blue_secondary accordion_style"
                                        role="button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseNotification2" aria-expanded="true"
                                        aria-controls="collapseNotification2">
                                        <div class="fs_16">
                                            Tempore qui laboriosam quae sunt tenetur.
                                            <p class="mb-0 fw_gilroy_medium fs_14 txt_silver">16th February 2020</p>
                                        </div>
                                    </button>

                                    <div class="accordion_wrapper" id="accordionNotification2">
                                        <div id="collapseNotification2" class="collapse accordion-collapse show"
                                            aria-labelledby="headingNotification2" data-bs-parent="#accordionNotification2">
                                            <div class="my-4">
                                                <p class="fs_14 fw_gilroy_medium txt_silver">Ut molestiae ratione sequi odit
                                                    atque
                                                    officiis nobis harum. Asperiores enim repellendus quo atque officia ab et
                                                    tempora. Repellat quisquam et at doloribus doloremque ea. Dolore animi quo
                                                    dolorum impedit. Similique tenetur eligendi quibusdam rerum et. Voluptatem
                                                    qui
                                                    laboriosam similique aperiam voluptatum.</p>
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
            let acc_cross_card = document.querySelector(".acc_cross_card");
            acc_cross_card.addEventListener("click", (e) => {
                e.target.parentElement.parentElement.remove();
            })










            // checkboxes
            let checkbox = document.querySelectorAll(".payment_checkbox");
            checkbox[0].checked = true;

            if (checkbox[0].checked) {
                checkbox[0].parentElement.parentElement.nextElementSibling.style.display = "flex";
            } else {
                checkbox[0].parentElement.parentElement.nextElementSibling.style.display = "none";
            }

            for (let i = 0; i < checkbox.length; i++) {
                checkbox[i].addEventListener("click", (e) => {
                    if (checkbox[0].checked) {
                        checkbox[0].parentElement.parentElement.nextElementSibling.style.display = "flex";
                    } else {
                        checkbox[0].parentElement.parentElement.nextElementSibling.style.display = "none";
                    }

                    // checkbox 1

                    if (checkbox[1].checked) {
                        checkbox[1].parentElement.parentElement.nextElementSibling.style.display = "flex";
                    } else {
                        checkbox[1].parentElement.parentElement.nextElementSibling.style.display = "none";
                    }

                    // checkbox 2

                    if (checkbox[2].checked) {
                        checkbox[2].parentElement.parentElement.nextElementSibling.style.display = "flex";
                    } else {
                        checkbox[2].parentElement.parentElement.nextElementSibling.style.display = "none";
                    }

                });
            }
        </script>


        <script>
            const my_account_app = new Vue({
                el: "#my_account_app",

                data: {

                    user: @json($user),
                    available_balance: @json($user->getBalance()),
                    card_generated: false,
                    card_code: '',
                    card_value: 0,
                    current_phone_nr: '',
                    new_phone_nr: '',
                    verification_code: '',
                    phone_number_verified: @json($user->profile->phone_number_verified_at == null ? false : true),
                    awaitingUserToEnterCode: false,

                },

                mounted: function() {
                    let j, tabcontent, tablinks;

                    tabcontent = document.getElementsByClassName("my_account_slide");
                    tabcontent[0].style.display = "flex";
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
                    redeemBalance: async function() {
                        try {
                            let resp = await axios.post('/payment/redeem_balance_as_gift_card')
                            this.card_generated = true;


                            this.user.gift_cards.push(resp.data)
                        } catch (ex) {
                            this.card_generated = false;
                        }

                    },
                    checkVerificationCode: async function() {
                        let data = new FormData();
                        data.append('code', this.verification_code);
                        let resp = await axios.post('/phone/verification-notification', data);
                        if (resp.data.verified === true) {
                            this.phone_number_verified = true;
                            this.current_phone_nr = this.new_phone_nr
                            this.awaitingUserToEnterCode = false;
                        } else {

                        }

                    },

                    sendVerificationCode: async function() {
                        let data = new FormData();
                        data.append('phone_nr', this.new_phone_nr);
                        let resp = await axios.post('/phone/verification-generate', data);
                        if (resp.data.success === true) {
                            this.awaitingUserToEnterCode = true;
                        } else {
                            this.awaitingUserToEnterCode = false;


                        }
                    }

                },


            });
        </script>
    @endsection
