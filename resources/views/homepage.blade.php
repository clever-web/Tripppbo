    @extends('master', ['try_to_init_nice_select' => false])


    @section('css-links')
        <style>
            #l_form_1>div.ticket_box_row_top>div.select_box.select_box_3.select_boxes.text_dark_blue.fw_gilroy_bold>div:nth-child(4),
            #l_form_1>div.ticket_box_row_top>div.select_box.select_box_1.select_boxes.text_dark_blue.fw_gilroy_bold>div:nth-child(4) {
                display: none;
            }

            .pointer_cursor {
                cursor: pointer;
            }

            .nice-select.child_select_box_holiday.input__date {
                background-color: #f1f2f6;
                padding-left: 10px;
            }
        </style>
    @endsection

    @section('content')
        <div id="homepage_app" class="wrap_body index_wrap_body">
            <!-- landing hero -->
            <div v-on:click="backdrop" class="hero_landing">
                <div class="container-lg pad_lg">
                    <div class="child_hero_landing pt-3">
                        <!-- left -->
                        <div class="hero_landing_left">
                            <h1 class="h3 text_dark_blue fw_gilroy_bold">It's a Big World Out There, Go Explore</h1>
                            <p class="text_dark_blue fs_14 mb-4">Ipsum dolorum itaque excepturi. Nostrum vero commodi enim
                                at. Aut error eaque occaecati eius blanditiis.</p>
                            <!-- ticket details -->
                            <div id="landing_page_forms" class="ticket_box_wrap pt-3 pb-0 landing_ticket_box box_shadow">
                                <div class="landing_tabs">
                                    <ul id="nav_landing" class="nav_landing mb-0 ps-lg-3 ps-0">
                                        <button class="landing_tab_btn tap_active" @click="slideForm($event, 'l_form_1', 1)">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.555 21.642">
                                                <path id="icons8_airplane_take_off_3"
                                                    d="M12.074,4.022a2.548,2.548,0,0,0-2.131.724l-.577.577L14.09,9.408l5.274-2.094L12.827,4.241A2.535,2.535,0,0,0,12.074,4.022ZM31.009,5.273a2.546,2.546,0,0,0-1.154.276L8.093,14.185l-2.273-2a2.124,2.124,0,0,0-2.352-.306L3,12.111l2.725,5.553a2.535,2.535,0,0,0,3.446,1.37l8.554-3.322L17,25.643h.818a2.545,2.545,0,0,0,2.395-1.683l3.864-10.717,7.85-3.051.015,0v0a2.545,2.545,0,0,0-.937-4.911Z"
                                                    transform="translate(-3 -4.001)" />
                                            </svg>
                                            <span class="ms-3">Flight</span>
                                        </button>
                                        <button class="landing_tab_btn" @click="slideForm($event, 'l_form_2' , 2)">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.615 50.157">
                                                <path id="icons8_hotel_star"
                                                    d="M11.538,3a.488.488,0,0,0-.473.341L9.92,6.74l-3.586.038a.5.5,0,0,0-.294.907L8.914,9.828l-1.069,3.42a.5.5,0,0,0,.771.558l2.926-2.07,2.926,2.07a.5.5,0,0,0,.771-.558L14.17,9.828l2.875-2.142a.5.5,0,0,0-.3-.907L13.161,6.74l-1.146-3.4A.493.493,0,0,0,11.538,3ZM26.808,3a.493.493,0,0,0-.477.341l-1.146,3.4L21.6,6.778a.5.5,0,0,0-.294.907l2.879,2.142-1.069,3.42a.5.5,0,0,0,.767.558l2.926-2.07,2.926,2.07a.5.5,0,0,0,.771-.558l-1.069-3.42L32.31,7.685a.5.5,0,0,0-.294-.907L28.43,6.74l-1.146-3.4A.493.493,0,0,0,26.808,3ZM42.073,3a.493.493,0,0,0-.477.341L40.45,6.74l-3.586.038a.5.5,0,0,0-.294.907l2.879,2.142-1.069,3.42a.5.5,0,0,0,.767.558l2.926-2.07L45,13.806a.5.5,0,0,0,.771-.558L44.7,9.828l2.875-2.142a.5.5,0,0,0-.294-.907L43.7,6.74l-1.146-3.4A.493.493,0,0,0,42.073,3ZM7.181,18.265a2.181,2.181,0,1,0,0,4.362v30.53H20.265v-10.9H33.35v10.9H46.434V22.627a2.181,2.181,0,1,0,0-4.362Zm4.361,6.542H15.9v4.361H11.542Zm8.723,0h4.361v4.361H20.265Zm8.723,0H33.35v4.361H28.988Zm8.723,0h4.361v4.361H37.711ZM11.542,33.53H15.9v4.361H11.542Zm8.723,0h4.361v4.361H20.265Zm8.723,0H33.35v4.361H28.988Zm8.723,0h4.361v4.361H37.711ZM11.542,42.253H15.9v4.361H11.542Zm26.169,0h4.361v4.361H37.711Z"
                                                    transform="translate(-5 -3)" />
                                            </svg>
                                            <span class="ms-3">Hotels</span>
                                        </button>
                                        <button class="landing_tab_btn" @click="slideForm($event, 'l_form_3', 3)">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.543 21.642">
                                                <path id="icons8_bag_1"
                                                    d="M14.96,4a4.452,4.452,0,0,0-4.439,4.439v.555H8.251a3.039,3.039,0,0,0-3.013,2.57L4.76,14.538a42.865,42.865,0,0,0,10.2,1.67,42.866,42.866,0,0,0,10.2-1.67l-.478-2.974a3.039,3.039,0,0,0-3.013-2.57H19.4V8.439A4.452,4.452,0,0,0,14.96,4Zm0,1.665a2.762,2.762,0,0,1,2.775,2.775v.555H12.185V8.439A2.762,2.762,0,0,1,14.96,5.665ZM4.5,16.187,3.728,21a3.049,3.049,0,0,0,2.908,3.529v.283a.832.832,0,1,0,1.665,0v-.277H21.619v.277a.832.832,0,1,0,1.665,0v-.283A3.049,3.049,0,0,0,26.192,21l-.772-4.811a47.636,47.636,0,0,1-8.8,1.626c0,.022.005.039.005.061a1.665,1.665,0,1,1-3.33,0c0-.022.005-.039.005-.061A47.636,47.636,0,0,1,4.5,16.187Z"
                                                    transform="translate(-3.689 -4)" />
                                            </svg>
                                            <span class="ms-3">Holidays</span>
                                        </button>
                                        <button class="landing_tab_btn" @click="slideForm($event, 'l_form_4')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.076 50.157">
                                                <path id="icons8_skiing"
                                                    d="M47.16,2a4.907,4.907,0,1,0,4.907,4.907A4.908,4.908,0,0,0,47.16,2ZM13.01,5.288a1.09,1.09,0,0,0-.792,1.985l11.351,7.432-.175.119v.009a5.988,5.988,0,0,0-.673,9.856l0,.026,8.216,5.8-5.286,6.052a2.682,2.682,0,0,0-.571,3.118L4.619,28.3a1.056,1.056,0,0,0-.52-.141,1.083,1.083,0,0,0-1.073.809,1.1,1.1,0,0,0,.537,1.239L41.5,51.317a.793.793,0,0,0,.085.043,10.655,10.655,0,0,0,3.292.779,6.607,6.607,0,0,0,5.929-2.556,1.108,1.108,0,0,0,.145-1.1,1.091,1.091,0,0,0-1.9-.192,4.239,4.239,0,0,1-4.029,1.67,8.434,8.434,0,0,1-2.53-.584L27.84,41.223a2.7,2.7,0,0,0,1.878-1.082l0,0,7.513-8.565,0-.021a2.67,2.67,0,0,0,.66-1.755,2.718,2.718,0,0,0-1.222-2.27l-7.032-5.5,2.666-1.61-8.736-5.716,1.972-1.316,8.838,5.784,1.333-.8v2.79a3.143,3.143,0,0,0,1.427,2.632l6,3.948,0,0a2.173,2.173,0,1,0,2.308-3.667l0-.009L40.073,20.7V11.813A4.345,4.345,0,0,0,33.156,8.3l-7.615,5.09L13.41,5.45A1.02,1.02,0,0,0,13.01,5.288Z"
                                                    transform="translate(-2.991 -2)" />
                                            </svg>
                                            <span class="ms-3">Activities</span>
                                        </button>
                                        <div class="arrow__tabs"><img src="img/arrow_down.svg" alt=""></div>
                                    </ul>
                                </div>
                                <!-- forms -->
                                <!-- 1 -->
                                <form id="l_form_1" class="ticket_box landing_ticket_form pad__x shadow-none pt-2"
                                    style="display: block;">
                                    <!-- ticket_box_row_top -->
                                    <flight-search-bar ref="flight_search" v-if="currentTabIndex == 1" :current_view_style="1">
                                    </flight-search-bar>

                                </form>
                                <!-- 2 -->
                                <form id="l_form_2" class="ticket_box landing_ticket_form pad__x shadow-none pt-2">
                                    <!-- ticket_box_row_bottom -->
                                    <hotel-main-box v-if="currentTabIndex == 2"></hotel-main-box>
                                </form>
                                <!-- 3 -->
                                <form id="l_form_3" class="ticket_box landing_ticket_form pad__x shadow-none pt-2">

                                    <!-- ticket_box_row_bottom -->
                                    <div v-if="currentTabIndex == 3" class="ticket_box_row_bottom index_ticket landing_ticket">
                                        <div id="l_f_row_3" class="landing_form_row_1 mb-3">
                                            <div class="ticket_box_row_bottom w-100 justify-content-around">
                                                <!-- 1 -->
                                                <div class="wrap_inputs wrap_date_input_sign_in2">
                                                    <p class="nice_text ticket_text text-capitalize mb-2"><img
                                                            src=".//img/icons8_in_air.svg" alt="icon" class="me-2"> Depart
                                                        From</p>
                                                    <div class="ticket_input_1 ticket__input me-2">
                                                        <input v-model="holiday_departure_search_keyword"
                                                            @input="holiday_departure_search_keyword = $event.target.value"
                                                            type="text" placeholder="Select Origin City?">
                                                        <autocomplete-component
                                                            :has_initial_value="holiday_initial_autocomplete_value"
                                                            @autocomplete_result_selected="holiday_select_departure_result"
                                                            :type="'airport'" :keyword="holiday_departure_search_keyword">
                                                        </autocomplete-component>
                                                    </div>
                                                </div>
                                                <!-- 2 / 3 -->
                                                <div class="wrap_date_input wrap_date_input_sign_in2 flex-grow-1">
                                                    <div class="wrap_date_after_box"></div>
                                                    <!-- 2 -->
                                                    <div class="wrap_inputs">
                                                        <p class="nice_text ticket_text text-capitalize mb-2"><img
                                                                src=".//img/icons8_external.svg" width="20" alt="icon"
                                                                class="me-2">
                                                            Going To</p>
                                                        <div class="ticket_input_3 ticket__input me-2">

                                                            <div class="select_box"
                                                                style="width: auto;background-color:#f1f2f6;border-radius: 15px;">
                                                                <select v-model="holiday_selected_country_id"
                                                                    class="child_select_box input__date child_select_box_holiday">
                                                                    <option disabled selected>Destination</option>
                                                                    <option :value="c.country_id"
                                                                        v-for="c in holiday_countries">
                                                                        @{{ c.country_name }}
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- 4 -->
                                                <div class="wrap_inputs">
                                                    <p class="nice_text ticket_text text-capitalize mb-2"><img
                                                            src=".//img/icons8_calendar_1.svg" width="20" alt="icon"
                                                            class="me-2"> Month of Travel</p>
                                                    <div class="ticket_input_3 ticket__input me-2" style="position: relative;">

                                                        <input id="start_date" :value="holiday_first_date + ' - ' + holiday_second_date" class="input__date input_date_holiday"
                                                            type="text" placeholder="Date">
                                                        <div style="position: absolute; top: -44px; left: 0px;width:400px;">
                                                            <date-picker :range="holiday_return_flight" :unique_id="unique_id"
                                                                @first_date_changed="holiday_handle_first_flight_date"
                                                                @second_date_changed="holiday_handle_second_flight_date"
                                                                ref="date_picker_2">
                                                            </date-picker>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-end">

                                                    <button class="form_btn fs_14 p-2 px-5"
                                                        v-on:click.prevent="searchForHolidays"
                                                        class="form_btn fs_14">Search</button>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </form>
                                <!-- 4 -->
                                <form id="l_form_4" class="ticket_box landing_ticket_form pad__x shadow-none pt-2">
                                    <!-- ticket_box_row_bottom -->
                                    <div class="ticket_box_row_bottom index_ticket landing_ticket">
                                        <div class="landing_form_row_1 mb-3">
                                            <!-- 1 -->
                                            <div class="me-2 l_form_2_input">
                                                <label for="ticket_input_j"
                                                    class="fs_14 fw_gilroy_bold mb-2">Destination</label>
                                                <div class="ticket_input_1">
                                                    <input id="ticket_input_j" type="text"
                                                        placeholder="Where are you going?">
                                                    <span class="clear_input_ticket"
                                                        @click="document.querySelector('#ticket_input_j').value=''"><img
                                                            src="img/clear_cross.svg" alt=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 4 -->
                                        <div class="wrap_date_input">
                                            <div class="wrap_date_after_box"></div>
                                            <div class="ticket_input_4 me-2">
                                                <input type="text" class="input__date" placeholder="2022-07-01">
                                                <span class="calendar_toggle"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <div class="ticket_input_5 me-2">
                                                <input type="text" class="input__date" placeholder="2022-09-01">
                                                <span class="calendar_toggle"><i class="far fa-calendar-alt"></i></span>
                                            </div>



                                        </div>
                                        <button type="submit" class="form_btn fs_14">Search</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- right -->
                        <div class="hero_landing_right">
                            <img src="img/hero_landing_right.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-lg pad_lg pt-5">
                <div class="value_grids_wrapper">
                    <div class="value_grid_item_1">
                        <p class="fw_gilroy_medium txt_pink text-uppercase letter_space_2 mb-2 fs_14">What we serve</p>
                        <h3 class="h4 fw_gilroy_bold txt_blue_secondary">Top Values <br> for you</h3>
                        <p class="txt_silver line_height_18 fs_14">Dolor dolore soluta quo neque quia dolore. Officiis
                            mollitia maiores et qui qui quis id.</p>
                    </div>

                    <div class="value_grid_item_2">
                        <div class="value_grid_img">
                            <img src="img/lost_of_chooses.svg" alt="">
                        </div>
                        <h4 class="h6 fw_gilroy_bold txt_blue_secondary mb-1">Lost of chooses</h4>
                        <p class="txt_silver line_height_18 fs_14">Consequatur dolorem et assumenda at. Fugit doloribus
                            sapiente fugiat.</p>
                    </div>

                    <div class="value_grid_item_2">
                        <div class="value_grid_img">
                            <img src="img/best_tour_guide.svg" alt="">
                        </div>
                        <h4 class="h6 fw_gilroy_bold txt_blue_secondary mb-1">Best Tour Guide</h4>
                        <p class="txt_silver line_height_18 fs_14">Nostrum sit animi aspernatur ipsum eveniet amet
                            perspiciatis totam.</p>
                    </div>

                    <div class="value_grid_item_2">
                        <div class="value_grid_img">
                            <img src="img/easy_booking.svg" alt="">
                        </div>
                        <h4 class="h6 fw_gilroy_bold txt_blue_secondary mb-1">Easy Booking</h4>
                        <p class="txt_silver line_height_18 fs_14">Et inventore enim consequatur distinctio quod sed
                            architecto ab eum. </p>
                    </div>
                </div>
            </div>

            <div class="container-lg pad_lg">
                <div class="landing_grids">
                    <!-- 1 -->
                    <div class="landing_grid_1 box_shadow">
                        <div class="child_l_grid_1">
                            <h3 class="h5 fw_gilroy_medium mb-1 text-white">A shared experience is</h3>
                            <h3 class="h4 fw_gilroy_bold mb-1 text-white">Double the fun.</h3>
                            <p class="fs_14 text-white">Meet your new adventure buddies with Trippbo.</p>
                            <a href="#" class="landing_grid_btn fw_gilroy_medium mb-1">Fund my Trip</a>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="landing_grid_2 box_shadow landing_grid_sm">
                        <img src="img/landing_grid_2.png" alt="">
                        <div class="child_l_grid_2">
                            <h3 class="h5 fw_gilroy_medium mb-1 text-white">It's time to make a chance. Have your</h3>
                            <h3 class="h4 fw_gilroy_bold mb-1 text-white">Next trip funded by</h3>
                            <p class="fs_14 text-white">supporters from around the world.</p>
                            <a href="#" class="landing_grid_btn fw_gilroy_medium mb-1">Fund my Trip</a>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="landing_grid_3 box_shadow landing_grid_sm">
                        <img id="land_grid_3" src="img/landing_grid_3.png" alt="">
                        <div class="child_l_grid_2">
                            <h3 class="h5 fw_gilroy_medium mb-1 text-white">It's time to make a chance. Have your</h3>
                            <h3 class="h4 fw_gilroy_bold mb-1 text-white">Next trip funded by</h3>
                            <p class="fs_14 text-white">supporters from around the world.</p>
                            <a href="#" class="landing_grid_btn fw_gilroy_medium mb-1">Fund my Trip</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- slider -->
            <div class="container-lg pad_lg">
                <div class="row row_l_slider_top">
                    <div class="col-7">
                        <p class="fw_gilroy_medium text_pink letter_space_2 mb-1">Top destination</p>
                        <h2 class="h4 text_dark_blue fw_gilroy_bold">Discover Weekly</h2>
                    </div>
                    <div class="col-5 wrap_col_before_slider">
                        <!-- 1 -->
                        <div class="wrap_select_img">
                            <img id="landing_select_img" src="img/world_icon_pink.svg" alt="">
                            <select id='landing_select' style='width: 200px;' class="child_select_box">
                                <option selected value='img/world_icon_pink.svg'>World</option>
                                <option selected value='img/road_icon.svg'>Hotel</option>
                            </select>
                        </div>
                        <div id="wrap_slider_btn1" class="wrap_slider_btn ms-3">
                            <div class="swiper-button-prev me-3"><img src="img/arrow_right_l.svg" alt=""></div>
                            <div class="swiper-button-next"><img src="img/arrow_left_l.svg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-lg px-lg-0 px-4 py-4">
                <div class="wrap_landing_slider">
                    <div id="landing_slider1" class="swiper landing_slider">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- 1 -->
                            <div class="swiper-slide l_grid_slide" style="cursor: pointer"
                                v-for="holiday in featuredHolidays" v-on:click="browsePackage(holiday)">
                                <div class="child_l_grid_slide"
                                    :style="{ 'background-image': `url(${holiday.Overview.PackageDefaultImage})` }"
                                    style="background-repeat: no-repeat; background-size: cover;">
                                    <div class="l_slide_top">
                                        <a href="#" class="slide_top_link me-2">
                                            <img src="img/l_link_1.svg" alt="">
                                        </a>
                                        <a href="#" class="slide_top_link">
                                            <img src="img/l_link_2.svg" alt="">
                                        </a>
                                        <a href="#" class="slide_top_link slide_top_link2 ms-auto">
                                            <img src="img/l_link_3.svg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="l_slide_bottom">
                                    <div class="row landing_slide_row_1">
                                        <div class="col-12 d-flex mb-2">
                                            <a href="#" class="l_slide_link h6 text_dark_blue fw_gilroy_bold">
                                                @{{ holiday.Overview.PackageTitle }}
                                            </a>
                                            <a href="#"
                                                class="l_slide_link h6 text_dark_blue fw_gilroy_bold ms-auto">@{{ holiday.Overview.PackageCurrency }}
                                                @{{ holiday.Overview.PackagePrice }}</a>
                                        </div>
                                        <div class="col-12 d-flex align-content-center">
                                            <p class="text_silver fs_14 mb-0">{{-- <img class="me-1" width="30"
                                                    src="img/canada_flag.svg" alt=""> --}} @{{ getFirstCity(holiday) }}</p>
                                            <p class="ms-auto text_silver fs_14 mb-0"><img class="me-1" width="24"
                                                    src="img/2members.svg" alt=""> 2 adults</p>
                                        </div>
                                    </div>
                                    <div class="row landing_slide_row_2">
                                        <p
                                            class="fs_14 text-center text_silver fw_gilroy_medium mb-0 d-flex justify-content-center align-items-center">
                                            <img class="me-1" width="14" src="img/small_calendar.svg" alt="">
                                            @{{ holiday.Overview.PackageDays }} Days, Starting from @{{ formatDate(holiday.Overview.PackageStartDate) }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-md-4 mt-3 mb-lg-4 mb-3">
                    <a href="#" class="btn py-2 btn_pink medium_btn d-inline-block mx-auto">View all</a>
                </div>
            </div>

            <div class="get_inspiration_wrapper">
                <div class="container-lg pad_lg mt-md-5 mt-4 mb-5">
                    <div class="get_inspiration_future">
                        <div class="d-block">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="inspriation_left">
                                        <h2 class="h4 text-capitalize text-white mb-3 fw_gilroy_bold">Get inspiration for
                                            future trips weekly</h2>
                                        <ul class="inspiration_list list-unstyled text-white mb-3">
                                            <li class="inspiration_list_item mb-2"><span class="me-3"><img width="16"
                                                        src="img/tick_icon_white.svg" alt=""></span>New trip
                                                destinations
                                                every week.</li>
                                            <li class="inspiration_list_item mb-2"><span class="me-3"><img width="16"
                                                        src="img/tick_icon_white.svg" alt=""></span>Less than 4-hour
                                                travel
                                                time.</li>
                                            <li class="inspiration_list_item mb-2"><span class="me-3"><img width="16"
                                                        src="img/tick_icon_white.svg" alt=""></span>Itineraries for
                                                2-4
                                                night weekend.</li>
                                            <li class="inspiration_list_item mb-2"><span class="me-3"><img width="16"
                                                        src="img/tick_icon_white.svg" alt=""></span>Made just for you,
                                                by
                                                our Al engine.</li>
                                        </ul>
                                        <form action="" class="inspiration_sec_form mt-4">
                                            <div class="form_inputs_wrapper">
                                                <input type="text" class="input_email"
                                                    placeholder="Please enter your email">
                                                <input type="submit" class="input_email_submit" value="">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-6 p_inspiration_right_img">
                                    <div class="inspiration_right_img">
                                        <img src="img/3_images_grids.svg" alt="">
                                    </div>


                                    <div class="responsive_inspiration_right_img">
                                        <img src="img/responsive_grid_image.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-lg pad_lg">
                <p class="fw_gilroy_medium text_pink letter_space_2 mb-1 text-center">Fund my Trip Solo</p>
                <h2 class="h4 text_dark_blue fw_gilroy_bold text-center">Browse by Type</h2>
                <!-- landing grid box 2 -->
                <div class="landing_grid_box2">
                    <!-- 1 -->
                    <div v-if="featuredThemes[0]" class="land_grid_2_1 l_grid2_box box_shadow pointer_cursor"
                        v-on:click="redirectToHolidays(featuredThemes[0].theme_id)">
                        <img :src="'/storage/' + featuredThemes[0].theme_picture" alt="">
                        <div class="inner_grid2">
                            <h3 class="h4 fw_gilroy_bold mb-1 text-white">@{{ featuredThemes[0].theme_name }}</h3>
                            <p class="mb-0 gilroy_medium grid2_p">11,532 Ofers</p>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div v-if="featuredThemes[1]" class="land_grid_2_2 l_grid2_box box_shadow pointer_cursor"
                        v-on:click="redirectToHolidays(featuredThemes[1].theme_id)">
                        <img :src="'/storage/' + featuredThemes[1].theme_picture" alt="">
                        <div class="inner_grid2 inner_grid2_sm">
                            <h3 class="h4 fw_gilroy_bold mb-1 text-white">@{{ featuredThemes[1].theme_name }}</h3>
                            <p class="mb-0 gilroy_medium grid2_p">1150 Offers</p>
                        </div>
                    </div>
                    <div class="land_grid_2_3">
                        <div v-if="featuredThemes[2]" class="land_grid_2_3_1 l_grid2_box box_shadow pointer_cursor"
                            v-on:click="redirectToHolidays(featuredThemes[2].theme_id)">
                            <img :src="'/storage/' + featuredThemes[2].theme_picture" alt="">
                            <div class="inner_grid2 inner_grid2_sm">
                                <h3 class="h4 fw_gilroy_bold mb-1 text-white">@{{ featuredThemes[2].theme_name }}</h3>
                                <p class="mb-0 gilroy_medium grid2_p">7000 Offers</p>
                            </div>
                        </div>
                        <div v-if="featuredThemes[3]" class="land_grid_2_3_2 l_grid2_box box_shadow pointer_cursor"
                            v-on:click="redirectToHolidays(featuredThemes[3].theme_id)">
                            <img :src="'/storage/' + featuredThemes[3].theme_picture" alt="">
                            <div class="inner_grid2 inner_grid2_sm">
                                <h3 class="h4 fw_gilroy_bold mb-1 text-white">@{{ featuredThemes[3].theme_name }}</h3>
                                <p class="mb-0 gilroy_medium grid2_p">230 Offers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="l_travel_box">
                <div class="container-lg pad_lg">
                    <div class="row">
                        <div class="col-sm-6 l_travel_box_left">
                            <h3 class="h5 text-white">The best time to</h3>
                            <h3 class="h4 fw_gilroy_bold text-white">Travel is now.</h3>
                            <a href="#" class="landing_grid_btn fw_gilroy_medium mt-3">Fund my Trip</a>
                        </div>
                        <div class="col-sm-6 l_travel_box_right">
                            <img src="img/couple_ticket.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_testimonials">
                <!-- slider -->
                <div class="container-lg pad_lg">
                    <div class="row row_l_slider_top">
                        <div class="col-7">
                            <p class="fw_gilroy_medium text_pink letter_space_2 mb-1">Our Experience</p>
                            <h2 class="h4 text_dark_blue fw_gilroy_bold">With Our Experience We Will Serve You</h2>
                        </div>
                        <div id="wrap_btn2_box" class="col-5 wrap_col_before_slider">
                            <div id="wrap_slider_btn2" class="wrap_slider_btn ms-3">
                                <div class="swiper-button-prev me-3"><img src="img/arrow_right_l.svg" alt=""></div>
                                <div class="swiper-button-next"><img src="img/arrow_left_l.svg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="container_slider_2" class="container-lg pad_lg container_slider_2 px-lg-0 px-4 py-4">
                    <div class="wrap_landing_slider">
                        <div id="landing_slider2" class="swiper landing_slider">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- 1 -->
                                <div class="swiper-slide testimonial_slide">
                                    <div class="testimonial_slide_top">
                                        <img src="img/user_1.jpg" alt="">
                                        <div class="testimonial_slide_top_right">
                                            <div class="t_user_rate mb-2">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_silver.svg" alt="">
                                            </div>
                                            <h4 class="h6 fw_gilroy_bold mb-0">Brandy Rowe</h4>
                                            <p class="fs_14 text_silver fw_gilroy_bold">Inc,and Sons,LLC,Group</p>
                                        </div>
                                    </div>
                                    <div class="testimonial_slide_bottom">
                                        <p class="fw_gilroy_medium mb-2">Impedit adipisci et. Aperiam atque sed
                                            exercitationem placeat sint optio tempora est. Quam delectus fugiat iure et cum
                                            necessitatibus asperiores quis.</p>
                                    </div>
                                </div>
                                <!-- 2 -->
                                <div class="swiper-slide testimonial_slide">
                                    <div class="testimonial_slide_top">
                                        <img src="img/user_1.jpg" alt="">
                                        <div class="testimonial_slide_top_right">
                                            <div class="t_user_rate mb-2">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_silver.svg" alt="">
                                            </div>
                                            <h4 class="h6 fw_gilroy_bold mb-0">Brandy Rowe</h4>
                                            <p class="fs_14 text_silver fw_gilroy_bold">Inc,and Sons,LLC,Group</p>
                                        </div>
                                    </div>
                                    <div class="testimonial_slide_bottom">
                                        <p class="fw_gilroy_medium mb-2">Impedit adipisci et. Aperiam atque sed
                                            exercitationem placeat sint optio tempora est. Quam delectus fugiat iure et cum
                                            necessitatibus asperiores quis.</p>
                                    </div>
                                </div>
                                <!-- 3 -->
                                <div class="swiper-slide testimonial_slide">
                                    <div class="testimonial_slide_top">
                                        <img src="img/user_1.jpg" alt="">
                                        <div class="testimonial_slide_top_right">
                                            <div class="t_user_rate mb-2">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_gold.svg" alt="">
                                                <img src="img/user_star_silver.svg" alt="">
                                            </div>
                                            <h4 class="h6 fw_gilroy_bold mb-0">Brandy Rowe</h4>
                                            <p class="fs_14 text_silver fw_gilroy_bold">Inc,and Sons,LLC,Group</p>
                                        </div>
                                    </div>
                                    <div class="testimonial_slide_bottom">
                                        <p class="fw_gilroy_medium mb-2">Impedit adipisci et. Aperiam atque sed
                                            exercitationem placeat sint optio tempora est. Quam delectus fugiat iure et cum
                                            necessitatibus asperiores quis.</p>
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
            const v = new Vue({
                el: '#homepage_app',
                vuetify: new Vuetify(),
                data: {
                    holiday_countries: @json($holiday_countries),
                    featuredThemes: @json($featured_themes),
                    holiday_selected_country_id: '',
                    showCalendar: false,
                    showHotelCalendar: false,
                    showFlightCalendar: false,
                    showFlightOneWayCalendar: false,
                    hotelValidationError: false,
                    featuredHolidays: [],
                    selected_departure_result_object: '',
                    holiday_return_flight: true,
                    unique_id: "holiday_flight",
                    selectedRange: {
                        start: moment().add(14, 'days').format('YYYY-MM-DD'),
                        end: moment().add(21, 'days').format(
                            'YYYY-MM-DD')
                    },
                    selectedRangeOrdered: {
                        start: moment().add(14, 'days').format('YYYY-MM-DD'),
                        end: moment().add(21, 'days').format(
                            'YYYY-MM-DD')
                    },
                    selectedHotelRange: {
                        start: moment().add(14, 'days').format('YYYY-MM-DD'),
                        end: moment().add(21, 'days').format('YYYY-MM-DD'),
                    },
                    selectedHotelRangeOrdered: {
                        start: moment().add(14, 'days').format('YYYY-MM-DD'),
                        end: moment().add(21, 'days').format('YYYY-MM-DD'),
                    },

                    selectedFlightRange: {
                        start: moment().add(14, 'days').format('YYYY-MM-DD'),
                        end: moment().add(21, 'days').format('YYYY-MM-DD')
                    },

                    selectedFlightRangeOrdered: {
                        start: moment().add(14, 'days').format('YYYY-MM-DD'),
                        end: moment().add(21, 'days').format('YYYY-MM-DD')
                    },
                    selectedPackageRange: {
                        start: moment().add(14, 'days').format('YYYY-MM-DD'),
                        end: moment().add(21, 'days').format('YYYY-MM-DD')
                    },
                    selectedFlightOnewayDate: moment().add(14, 'days').format('YYYY-MM-DD'),
                    selectedFlightOnewayDateOrdered: moment().add(14, 'days').format('YYYY-MM-DD'),

                    isDark: false,
                    activityDestination: '',
                    activityCityId: '',

                    hotelDestination: '',
                    hotelCityId: '',
                    hotels_number_of_rooms: 1,
                    hotels_rooms: [{
                            enabled: true,
                            hotels_number_of_adults: 2,
                            hotels_number_of_children: 0,
                            child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],

                        },
                        {
                            enabled: false,
                            hotels_number_of_adults: 1,
                            hotels_number_of_children: 0,
                            child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],

                        },
                        {
                            enabled: false,
                            hotels_number_of_adults: 1,
                            hotels_number_of_children: 0,
                            child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],

                        }
                    ],

                    hotels_travelers_count_display: 'none',

                    packageDestinationCity: '',
                    packageOriginCity: '',
                    packageDestinationCountry: '',
                    packageOriginCountry: '',
                    packageDestination: '',
                    packageOrigin: '',
                    packageOriginAirportCode: '',
                    packageDestinationAirportCode: '',
                    package_number_of_rooms: 1,
                    package_rooms: [{
                            enabled: true,
                            number_of_adults: 2,
                            number_of_children: 0,
                            number_of_babies: 0,

                            child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                            baby_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                        },
                        {
                            enabled: false,
                            number_of_adults: 1,
                            number_of_children: 0,
                            number_of_babies: 0,
                            child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                            baby_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                        },
                        {
                            enabled: false,
                            number_of_adults: 1,
                            number_of_children: 0,
                            number_of_babies: 0,
                            child_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                            baby_ages: [1, 1, 1, 1, 1, 1, 1, 1, 1],
                        }
                    ],

                    flightDestination: '',
                    flightDestinationAirportCode: '',
                    flightOrigin: '',
                    flightOriginAirportCode: '',
                    flights_number_of_adults: 1,
                    flights_number_of_children: 0,
                    flights_number_of_babies: 0,
                    flights_travelers_count_display: 'none',
                    flights_class: 'Economy',
                    flight_class_type_display: 'none',
                    flight_trip_type: 'round trip',


                    package_number_of_adults: 1,
                    package_number_of_children: 0,
                    package_number_of_babies: 0,
                    package_travelers_count_display: 'none',
                    package_class: 'Economy',
                    package_class_type_display: 'none',
                    package_number_of_rooms: 1,
                    flightDestinationCityValidation: false,
                    flightDepartureCityValidation: false,
                    packageDestinationCityValidation: false,
                    packageDepartureCityValidation: false,
                    activityValidationError: false,

                    holiday_first_date: '',
                    holiday_second_date: '',
                    currentTabIndex: 1,
                    holiday_departure_search_keyword: '',
                    holiday_initial_autocomplete_value: ''

                },
                methods: {
                    holiday_handle_first_flight_date(event) {
                        this.holiday_first_date = event
                    },
                    holiday_handle_second_flight_date(event) {
                        this.holiday_second_date = event
                    },
                    searchForHolidays:  function() {
                        window.location = '/holidays' +
                            '?airport=' + this.selected_departure_result_object.airport_id +
                            '&country_id=' + this.holiday_selected_country_id +
                            '&start=' + this.holiday_first_date +
                            '&end=' + this.holiday_second_date



                    },
                    backdrop: function() {
                        this.$refs.flight_search?.hidePanel();
                    },
                    clear_value: function(DOMElementIdToClear) {
                        this.$refs.ticket_input_b.value = ''
                    },
                    clear_value2: function(DOMElementIdToClear) {
                        this.$refs.ticket_input_a.value = ''
                    },
                    reverse_cities: function() {

                    },

                    reverse_cities_packages: function() {

                    },
                    slideForm: function(evt, cityName, tabIndex = 1)

                    {
                        this.currentTabIndex = tabIndex;

                        tabcontent = document.getElementsByClassName("landing_ticket_form");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("landing_tab_btn");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" tap_active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " tap_active";

                        this.$nextTick(() => {
                            if (document.getElementsByClassName('child_select_box_holiday').length > 0) {
                                let select_box = document.querySelectorAll(".child_select_box_holiday");
                                for (let i = 0; i < select_box.length; i++) {
                                    NiceSelect.bind(select_box[i]);
                                }
                            }
                            let holiday_input_dates = document.querySelectorAll(".input_date_holiday");
                            this.$refs.date_picker_2.attach_date_picker(holiday_input_dates, moment().add(3, 'days')
                                .format('YYYY-MM-DD'), moment().add(10, 'days').format('YYYY-MM-DD'));

                        })


                    },

                    packageSearch: function() {
                        if (this.packageOriginAirportCode == '') {
                            this.packageDepartureCityValidation = true;
                            return;
                        } else {
                            this.packageDepartureCityValidation = false;
                        }
                        if (this.packageDestinationAirportCode == '') {
                            this.packageDestinationCityValidation = true;
                            return;
                        } else {
                            this.packageDestinationCityValidation = false;
                        }
                        let url = '/hotels/search';

                        url += '?isPackage=1'
                        url += '&originCity=' + this.packageOriginCity
                        url += '&destinationCity=' + this.packageDestinationCity
                        url += '&originCountry=' + this.packageOriginCountry
                        url += '&destinationCountry=' + this.packageDestinationCountry
                        url += '&originAirportCode=' + this.packageOriginAirportCode
                        url += '&destinationAirportCode=' + this.packageDestinationAirportCode
                        url += '&package_class=' + this.package_class
                        url += '&CheckInDate=' + this.selectedPackageRange.start
                        url += '&CheckOutDate=' + this.selectedPackageRange.end

                        for (let roomCount = 0; roomCount < package_number_of_rooms; roomCount++) {
                            url += '&adultCount' + roomCount + '=' + this.package_rooms[roomCount].number_of_adults
                            url += '&childCount' + roomCount + '=' + this.package_rooms[roomCount]
                                .number_of_children
                            url += '&infantCount' + roomCount + '=' + this.package_rooms[roomCount].number_of_babies

                            let childAges = ''
                            for (let childAgeCount = 0; childAgeCount < this.package_rooms[roomCount]
                                .number_of_children; childAgeCount++) {
                                childAges += this.package_rooms[roomCount].child_ages[childAgeCount] + ",";
                            }
                            let infantAges = ''
                            for (let infantAgeCount = 0; infantAgeCount < this.package_rooms[roomCount]
                                .number_of_babies; infantAgeCount++) {
                                infantAges += this.package_rooms[roomCount].baby_ages[infantAgeCount] + ",";
                            }
                            url += '&childAges' + roomCount + '=' + childAges
                            url += '&infantAges' + roomCount + '=' + infantAges


                        }


                        url += '&roomCount=' + this.package_number_of_rooms
                        url += '&hotel_destination_name=' + this.packageDestination


                        window.location = url;
                    },
                    availableDates: function(val) {

                        let date = moment(val, 'YYYY-MM-DD')
                        let today = moment()

                        if (date.diff(today, 'days') > -1) {
                            return true
                        }
                        return false




                    },
                    holiday_select_departure_result: function(data) {
                        this.holiday_departure_search_keyword = data.Name;
                        this.selected_departure_result_object = data;
                    },
                    selectPackageDestinationResult: function(event) {

                        this.packageDestinationCity = event.CityName
                        this.packageDestinationCountry = event.CountryName
                        this.packageDestinationAirportCode = event.Code;
                        this.packageDestination = this.packageDestinationCity + ', ' + this
                            .packageDestinationCountry

                    },
                    selectPackageOriginResult: function(event) {
                        this.packageOriginCity = event.CityName
                        this.packageOriginCountry = event.CountryName
                        this.packageOrigin = this.packageOriginCity + ', ' + this.packageOriginCountry
                        this.packageOriginAirportCode = event.Code;
                    },
                    findActivities: function() {
                        if (this.activityCityId !== '') {
                            window.location = 'activities?city_id=' + this.activityCityId + '&date_from=' + this
                                .selectedRangeOrdered.start + '&date_to=' + this.selectedRangeOrdered.end +
                                '&activity_destination_name=' + this.activityDestination;
                        } else {
                            this.activityValidationError = true;
                        }

                    },
                    selectActivityResult: function(result) {

                        this.activityCityId = result.city_code;
                        this.activityDestination = result.country_name + ', ' + result.city_name;
                    },
                    selectHotelResult: function(result) {
                        this.hotelDestination = result.country + ', ' + result.name;
                        this.hotelCityId = result.id;
                        /*
                                            this.hotelCityId = result.city_code;
                                            this.hotelDestination = result.country_name + ', ' + result.city_name; */
                    },
                    clearHotel: function() {
                        this.hotelCityId = '';
                        this.hotelDestination = '';

                    },
                    clearActivity: function() {
                        this.activityCityId = '';
                        this.activityDestination = '';
                    },
                    selectFlightOriginResult: function(result) {

                        this.flightOriginAirportCode = result.Code;
                        this.flightOrigin = result.AirportName + ', ' + result.CityName;
                    },
                    selectFlightDestinationResult: function(result) {

                        this.flightDestinationAirportCode = result.Code;
                        this.flightDestination = result.AirportName + ', ' + result.CityName;
                    },
                    searchFlights: function() {
                        if (this.flightOriginAirportCode == '') {
                            this.flightDepartureCityValidation = true;
                            return;
                        } else {
                            this.flightDepartureCityValidation = false;
                        }
                        if (this.flightDestinationAirportCode == '') {
                            this.flightDestinationCityValidation = true;
                            return;
                        } else {
                            this.flightDestinationCityValidation = false;
                        }
                        let url = '/flights/search';
                        if (this.flight_trip_type == 'mutli city') {
                            return;
                        }


                        if (this.flight_trip_type == 'round trip') {
                            url += '?origin=' + this.flightOriginAirportCode
                            url += '&destination=' + this.flightDestinationAirportCode
                            url += '&departureDate=' + this.selectedFlightRangeOrdered.start
                            url += '&returnDate=' + this.selectedFlightRangeOrdered.end
                            url += '&adultCount=' + this.flights_number_of_adults
                            url += '&childCount=' + this.flights_number_of_children
                            url += '&infantCount=' + this.flights_number_of_babies
                            url += '&flight_class=' + this.flights_class
                            url += '&flightType=' + this.flight_trip_type
                            url += '&flight_origin_name=' + this.flightOrigin
                            url += '&flight_destination_name=' + this.flightDestination

                        }
                        if (this.flight_trip_type == 'one way') {
                            url += '?origin=' + this.flightOriginAirportCode
                            url += '&destination=' + this.flightDestinationAirportCode
                            url += '&departureDate=' + this.selectedFlightOnewayDateOrdered
                            url += '&returnDate='
                            url += '&adultCount=' + this.flights_number_of_adults
                            url += '&childCount=' + this.flights_number_of_children
                            url += '&infantCount=' + this.flights_number_of_babies
                            url += '&flight_class=' + this.flights_class
                            url += '&flightType=' + this.flight_trip_type
                            url += '&flight_origin_name=' + this.flightOrigin
                            url += '&flight_destination_name=' + this.flightDestination
                        }

                        window.location = url;
                    },
                    validateHotelForm: function() {
                        if (this.hotelCityId !== '') {
                            return true;
                        } else {
                            this.hotelValidationError = true;
                        }
                    },

                    getFeaturedHolidays: async function() {
                        let resp = await axios.get("/holiday/featured");

                        this.featuredHolidays.push(...resp.data)
                    },
                    clearFlightDestination: function() {
                        this.flightDestinationAirportCode = ''
                        this.flightDestination = ''
                    },
                    clearFlightOrigin: function() {
                        this.flightOriginAirportCode = ''
                        this.flightOrigin = ''
                    },
                    clearPackageDestination: function() {
                        this.packageDestinationAirportCode = ''
                        this.packageDestination = ''
                    },
                    clearPackageOrigin: function() {
                        this.packageOrigin = ''
                        this.packageOriginAirportCode = ''
                    },
                    getImageStyle(holiday) {
                        return {
                            'background-image': 'https://upload.wikimedia.org/wikipedia/commons/6/6b/Alternativ_f%C3%B6r_Sverige_logo.png'
                        };
                    },
                    getFirstCity: function(holiday) {
                        let first_city = holiday.Overview.PackageCityName.split(',')[0];
                        return first_city;
                    },
                    redirectToHolidays: function(theme_id) {
                        setTimeout(() => {
                            window.open('/holidays?theme=' + theme_id, '_blank')
                                .focus();
                        })
                    },
                    formatDate: function(date) {
                        let d = new moment(date, 'YYYY-MM-DDTHH:mm:ss');

                        return d.format('MMM DD')
                    },
                    browsePackage: function(holiday) {
                        setTimeout(() => {
                            window.open('/holidays/view?id=' + holiday.Overview.PackageId, '_blank')
                                .focus();
                        })

                    },
                    searchHotels: function() {

                        if (this.validateHotelForm()) {
                            let url = '/hotels/search';

                            url += '?cityId=' + this.hotelCityId
                            url += '&CheckInDate=' + this.selectedHotelRangeOrdered.start
                            url += '&CheckOutDate=' + this.selectedHotelRangeOrdered.end

                            for (let x = 0; x < this.hotels_number_of_rooms; x++) {
                                url += '&adultCount' + x + '=' + this.hotels_rooms[x].hotels_number_of_adults
                                url += '&childCount' + x + '=' + this.hotels_rooms[x].hotels_number_of_children
                                let ages = '';
                                for (let y = 0; y < this.hotels_rooms[x].hotels_number_of_children; y++) {
                                    ages += this.hotels_rooms[x].child_ages[y] + ',';
                                }
                                url += '&childAges' + x + '=' + ages;
                            }

                            url += '&roomCount=' + this.hotels_number_of_rooms
                            url += '&hotel_destination_name=' + this.hotelDestination


                            window.location = url;
                        } else {

                        }

                    },

                },
                mounted: async function() {
                    await this.getFeaturedHolidays();


                    let landing_select = document.querySelector("#landing_select");
                    let landing_select_img = document.querySelector("#landing_select_img");
                    landing_select?.addEventListener("change", (e) => {
                        landing_select_img.src = e.target.value;
                    });



                    // slider
                    const landing_slider1 = new Swiper('#landing_slider1', {
                        slidesPerView: 4,
                        spaceBetween: 15,
                        grabCursor: true,
                        navigation: {
                            nextEl: '#wrap_slider_btn1 .swiper-button-next',
                            prevEl: '#wrap_slider_btn1 .swiper-button-prev',
                            clickable: true
                        },
                        breakpoints: {
                            0: {
                                slidesPerView: 1,
                                spaceBetween: 15,
                            },
                            480: {
                                slidesPerView: 1.5,
                                spaceBetween: 15,
                            },
                            567: {
                                slidesPerView: 2,
                                spaceBetween: 15,
                            },
                            768: {
                                slidesPerView: 2.5,
                                spaceBetween: 15,
                            },
                            825: {
                                slidesPerView: 3,
                                spaceBetween: 15,
                            },
                            910: {
                                slidesPerView: 3.5,
                                spaceBetween: 15,
                            },
                            1200: {
                                slidesPerView: 4,
                                spaceBetween: 15,
                            },
                        },
                    });

                    const landing_slider2 = new Swiper('#landing_slider2', {
                        slidesPerView: 4,
                        grabCursor: true,
                        navigation: {
                            nextEl: '#wrap_slider_btn2 .swiper-button-next',
                            prevEl: '#wrap_slider_btn2 .swiper-button-prev',
                            clickable: true
                        },
                        breakpoints: {
                            0: {
                                slidesPerView: 1,
                                spaceBetween: 15,
                            },
                            600: {
                                slidesPerView: 1.3,
                                spaceBetween: 20,
                            },
                            750: {
                                slidesPerView: 1.5,
                                spaceBetween: 20,
                            },
                            930: {
                                slidesPerView: 2,
                                spaceBetween: 20,
                            },
                            1200: {
                                slidesPerView: 2.5,
                                spaceBetween: 20,
                            },
                        },
                    });

                    // slider btn 2
                    let l_slider2 = document.querySelector("#landing_slider2");
                    let wrap_btn2_box = document.querySelector("#wrap_btn2_box");
                    let wrap_slider_btn2 = document.querySelector("#wrap_slider_btn2");



                    function media_500(x) {
                        if (x.matches) { // If media query matches
                            // wrap_slider_btn2.remove();
                            l_slider2.appendChild(wrap_slider_btn2);
                        } else {
                            wrap_btn2_box.appendChild(wrap_slider_btn2);
                        }
                    }

                    var x = window.matchMedia("(max-width: 500px)")
                    media_500(x)
                    x.addListener(media_500)


                    // -------------------

                    // hero forms
                    let arrow__tabs = document.querySelector(".arrow__tabs");
                    let nav_landing = document.querySelector("#nav_landing");
                    nav_landing?.addEventListener("click", (e) => {
                        nav_landing?.classList.toggle("nav_landing_active");
                        arrow__tabs?.classList.toggle("arrow__tabs_active");
                    });

                    let landing_page_forms = document.querySelector("#landing_page_forms");
                    let hero_landing_left = document.querySelector(".hero_landing_left");
                    let child_hero_landing = document.querySelector(".child_hero_landing");

                    function media_1200(x) {
                        if (x.matches) { // If media query matches
                            landing_page_forms.remove();
                            child_hero_landing.appendChild(landing_page_forms);
                        } else {
                            hero_landing_left.appendChild(landing_page_forms);
                        }
                    }

                    var x = window.matchMedia("(max-width: 1200px)")
                    media_1200(x)
                    x.addListener(media_1200)

                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("landing_ticket_form");
                    tabcontent[0].style.display = "block";


                    // ------------

                    // autocomplete function in app.js file





                    // headingOne11
                    let index_wrap_body = document.querySelector(".index_wrap_body")
                    let accordion_select = document.querySelector("#accordion_select");
                    let headingOne11 = document.querySelector("#headingOne11");


                    window.addEventListener('DOMContentLoaded', (event) => {
                        let current = document.querySelectorAll(".child_select_box_2");

                        for (let o = 0; o < current.length; o++) {
                            current[o].addEventListener("click", (e) => {
                                if (e.target?.classList.contains("open")) {
                                    headingOne11.children[0]?.classList.remove("btn_collapsed");
                                    accordion_select?.classList.remove("show_acc");
                                }
                            })
                        }



                        headingOne11?.addEventListener("click", (e) => {
                            e.stopPropagation()
                            accordion_select?.classList.toggle("show_acc");

                            if (accordion_select?.classList.contains("show_acc")) {
                                headingOne11.children[0]?.classList.add("btn_collapsed");

                                for (let k = 0; k < current.length; k++) {
                                    if (current[k]?.classList.contains("open")) {
                                        current[k]?.classList.remove("open");
                                    }
                                }
                            } else {
                                headingOne11.children[0]?.classList.remove("btn_collapsed");
                            }

                        });

                    });

                    document.querySelector(".index_wrap_body").addEventListener("click", (e) => {
                        if (accordion_select?.classList.contains("show_acc")) {
                            headingOne11.children[0]?.classList.remove("btn_collapsed");
                        }

                        accordion_select?.classList.remove("show_acc");
                    });

                    accordion_select?.addEventListener("click", (e) => {
                        e.stopPropagation()
                        accordion_select?.classList.add("show_acc");
                    });


                },
                computed: {
                    formattedActivityFromDate: function() {
                        return moment(this.selectedRangeOrdered.start).format('MMM, DD');
                    },
                    formattedActivityToDate: function() {
                        return moment(this.selectedRangeOrdered.end).format('MMM, DD');
                    },
                    formattedHotelFromDate: function() {
                        return moment(this.selectedHotelRangeOrdered.start).format('MMM, DD');
                    },
                    formattedHotelToDate: function() {
                        return moment(this.selectedHotelRangeOrdered.end).format('MMM, DD');
                    },
                    formattedFlightFromDate: function() {

                        return moment(this.selectedFlightRangeOrdered.start).format('MMM, DD');

                    },
                    formattedFlightToDate: function() {
                        return moment(this.selectedFlightRangeOrdered.end).format('MMM, DD');
                    },
                    formattedSelectedFlightOnewayDate: function() {
                        return moment(this.selectedFlightOnewayDateOrdered).format('MMM, DD');

                    },
                    hotelNumberOfTravelers: function() {

                        let total = 0;
                        for (let x = 0; x < this.hotels_number_of_rooms; x++) {
                            total += this.hotels_rooms[x].hotels_number_of_adults;
                            total += this.hotels_rooms[x].hotels_number_of_children;
                        }
                        return total;
                    }
                },
                watch: {
                    selectedFlightRange: function(val) {

                        this.selectedFlightRangeOrdered.start = moment(val.start).format('YYYY-MM-DD')
                        this.selectedFlightRangeOrdered.end = moment(val.end).format('YYYY-MM-DD')


                    },
                    selectedHotelRange: function(val) {

                        this.selectedHotelRangeOrdered.start = moment(val.start).format('YYYY-MM-DD')
                        this.selectedHotelRangeOrdered.end = moment(val.end).format('YYYY-MM-DD')



                    },
                    selectedFlightOnewayDate: function(val) {
                        this.selectedFlightOnewayDateOrdered = moment(val).format('YYYY-MM-DD');
                    },
                    selectedRange: function(val) {
                        this.selectedRangeOrdered.start = moment(val.start).format('YYYY-MM-DD')
                        this.selectedRangeOrdered.end = moment(val.end).format('YYYY-MM-DD')
                    }

                }
            })
        </script>
    @endsection
