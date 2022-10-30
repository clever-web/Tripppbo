@extends('master')
@section('css-links')
    <link rel="stylesheet" href="/css/style4.css">
    <link rel="stylesheet" href="/css/responsive4.css" media="all">
    <script src="https://js.stripe.com/v3"></script>
@endsection
@section('content')
    <div id="package_paxes" class="wrap_body index_wrap_body pb-xl-5">
        <div class="container-lg px-sm-4 px-3 pt-sm-5 pt-4 pb-5">
            <!--  -->
            <div class="d-flex flex-sm-row flex-column mb-3">
                <div class="back_arrow me-sm-4 mb-sm-0 mb-3">
                    <a href="#"><i class="fas fa-chevron-left"></i></a>
                </div>
                <div>
                    <h1 class="h4 txt_dark_blue fw_gilroy_medium mb-0">Check Availability</h1>
                    <p class="txt_silver fw_gilroy_medium fs_14">To start select the number of travellers</p>
                </div>
            </div>
            <!--  -->
            <div class="d-flex" style="gap: 10px;">
                <div v-if="current_page == 1" class="w-100 mr-2 mb-2">
                    <div v-for="(pax, paxIndex) in rooms" class=" bg-white border_radius_20 box_shadow p-4 mb-2">
                        <div class="row gx-0">
                            <div class="col-lg-6 pe-lg-3 mb-lg-0 mb-4">
                                <h5 class="txt_dark_blue fw_gilroy_bold mb-4">Package @{{ paxIndex + 1 }}</h5>
                                <h5 v-on:click="removeRoom(paxIndex)">Remove</h5>
                                <div class="d-flex">
                                    <div class="child_a_select_row_2 flex-column align-items-start me-xl-auto me-sm-5 me-4">
                                        <h6 class="fw_gilroy_bold txt_dark_blue mb-1">Adults</h6>
                                        <p class="fs_14 txt_silver fw_gilroy_medium mb-3">(12 yrs &amp; above)</p>
                                        <div class="increase_decrease_btns increase_decrease_btns2">
                                            <div v-on:click="removeAdult(pax)"><i class="fas fa-minus"></i></div>
                                            <input class="fs_14" data-value="" type="text" v-model="pax.Adults">
                                            <div v-on:click="addAdult(pax)"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                    <div class="child_a_select_row_2 flex-column align-items-start">
                                        <h6 class="fw_gilroy_bold txt_dark_blue mb-1">Children</h6>
                                        <p class="fs_14 txt_silver fw_gilroy_medium mb-3">(Age 12 years and under)</p>
                                        <div class="increase_decrease_btns increase_decrease_btns2">
                                            <div v-on:click="removeChild(pax)"><i class="fas fa-minus"></i></div>
                                            <input class="fs_14" data-value="" type="text" v-model="pax.Children">
                                            <div v-on:click="addChild(pax)"><i class="fas fa-plus"></i></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-5" style="max-width: 160px;">
                                    <div v-for="(child, childIndex) in pax.Paxs"
                                        class="d-flex flex-row align-items-center justify-content-center">
                                        <div>Child @{{ childIndex + 1 }} Age </div>
                                        <div class="increase_decrease_btns increase_decrease_btns2 mt-0">

                                            <div v-on:click="child.Age > 0 ? child.Age -=1 : child.Age = 0"><i
                                                    class="fas fa-minus"></i></div>
                                            <input class="fs_14" data-value="" type="text" v-model="child.Age">
                                            <div v-on:click="child.Age < 12 ? child.Age +=1 : child.Age = 12"><i
                                                    class="fas fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 d-flex flex-column align-items-center justify-content-center box_check_4_left_right py-4">
                                <p class="mb-1 txt_silver fw_gilroy_medium">Need an extra room?</p>
                                <h5 v-on:click="addRoom" class="mb-3 text_dark_blue fw_gilroy_bold fs_18">Add another
                                    package
                                </h5>
                                <a v-on:click="nextPage" class="btn py-2 px-3 btn_pink medium_btn">View Available
                                    Dates &
                                    Prices</a>
                            </div>
                        </div>

                    </div>

                </div>





                <div class="w-100" style="min-height: 500px;" v-show="current_page == 2" style="position: relative;">

                    <div class="w-100 mr-2 mb-2" style="margin-top: -100px;">

                        <date-picker :is_for_holiday="is_for_holiday" :holiday_days="package_details?.Overview.PackageDays"
                            :range="isRange" :unique_id="unique_id" @first_date_changed="handle_first_date"
                            @second_date_changed="handle_second_date" ref="date_picker_2">
                        </date-picker>

                    </div>


                </div>









                <!-- Page 3 -->






                <div v-if="current_page == 3"
                    class="box_check_4_left bg-white border_radius_20 box_shadow p-4 px-sm-4 px-3">
                    <!--  -->
                    <div>
                        <!-- 1 -->
                        <div v-for="hotel in list_of_hotels"
                            class="row_experience flex-sm-wrap mb-0 position-relative pb-5">
                            <div class="r_experience_img_after stay_summary_top_after"></div>
                            <div class="r_experience_img stay_summary_top stay_summary_top2">
                                <p class="mb-0 fs_14 fw_gilroy_medium lh-sm">Day</p>
                                <p class="mb-0 fs_14 fw_gilroy_medium lh-1">@{{ hotel.HotelService.DayNo }}</p>
                            </div>
                            <div
                                class="r_experience_desc r_experience_desc2 stay_summary_middle mt-2 ms-3 d-flex align-items-center flex-wrap flex-grow-1">
                                <div class="row gx-0 pb-1 stay_summary_middle3 stay_summary_middle4">
                                    <div class="col-xl-5 pe-xl-2 mb-xl-0 mb-4">
                                        <img :src="hotel.HotelService.ServiceDefaultImage" alt="image">
                                    </div>
                                    <div class="col-xl-7 ps-xl-2">
                                        <h5 class="txt_dark_blue fw_gilroy_bold fs_18">@{{ hotel.HotelService.ServicePartnerName }}</h5>
                                        <p class="txt_silver fw_gilroy_medium"
                                            v-html="hotel.ShowFullDescription ? hotel.FetchedDetails?.Description : hotel.FetchedDetails?.Description?.substr(0, 120)">
                                        </p>
                                        <div
                                            class="d-flex justify-content-sm-between justify-content-start align-items-sm-center flex-sm-row flex-column pb-1">
                                            <a v-if="hotel.ShowFullDescription"
                                                v-on:click="hotel.ShowFullDescription = false"
                                                class="text_dark_blue_a text-decoration-none text-capitalize fw_gilroy_medium fs_14 mb-sm-0 mb-4">See
                                                less...</a>
                                            <a v-if="!hotel.ShowFullDescription"
                                                v-on:click="hotel.ShowFullDescription = true"
                                                class="text_dark_blue_a text-decoration-none text-capitalize fw_gilroy_medium fs_14 mb-sm-0 mb-4">See
                                                more...</a>
                                            <button
                                                class="accommodation_package_toggle btn py-1 btn_silver medium_btn py-2 px-3 text-capitalize fs_14">View
                                                Available Rooms</button>
                                        </div>
                                    </div>
                                </div>
                                <div v-for="(room, roomName, index) in hotel.Rooms"
                                    class="double_superior_box w-100 pb-0 d-block">
                                    <div class="d-flex justify-content-end w-100 mb-3">
                                        <button class="accommodation_package_remove bg-transparent border-0">
                                            <img width="18" src="img/cross_icon_red_x.svg" alt="">
                                        </button>
                                    </div>
                                    <h5 class="txt_dark_blue fw_gilroy_bold mb-3">@{{ roomName }}</h5>
                                    <!-- grid_accommodation_packs -->
                                    <div class="grid_accommodation_packs mb-5">
                                        <!-- 1 -->
                                        <div v-for="room_option in room" class="grid_accommodation_pack">
                                            <h6 class="txt_dark_blue fw_gilroy_medium mb-1">@{{ get_meal_plan(room_option) }}</h6>
                                            {{--   <p class="txt_silver fw_gilroy_medium fs_14 mb-1">Free Cancellation</p> --}}
                                            <h6 class="fs_18 txt_dark_blue fw_gilroy_bold mb-3">@{{ room_option.ServicePrice }}</h6>
                                            <div class="w-100 px-3">


                                                <button v-on:click="hotel.SelectedRoomCode = room_option.trippbo_room_code"
                                                    :class="{
                                                        btn_accommodation_pack: hotel.SelectedRoomCode == room_option
                                                            .trippbo_room_code
                                                    }"
                                                    class="btn py-2 px-3 btn_silver medium_btn d-block fw_gilroy_medium w-100">@{{ is_selected(hotel.SelectedRoomCode == room_option.trippbo_room_code) }}</button>


                                            </div>
                                        </div>

                                    </div>

                                </div>





                            </div>
                        </div>

                    </div>
                </div>

                <!-- Page 4 -->

                <div v-if="current_page == 4" id="flights_search_app" class="wrap_body index_wrap_body">



                    <!-- flight box -->
                    <div class="container-lg pad_lg">
                        <div class="flight_box">


                            <!-- flight -->
                            <div class="flight_details">


                                <!-- flight details bottom -->
                                <div class="trip_selection_wrapper">


                                    <flight-item :is_read_only="read_only_false" @flight_selected="flight_selected"
                                        :selecting_flight_for_package="is_package" :search_key="search_key"
                                        :search_data="search_data" :is_side_bar="is_side_bar"
                                        v-for="(trip, trip_index) in api_response?.FlightResults" :trip_data="trip"
                                        :tripindex="'i' + trip_index"></flight-item>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>










                <!-- Page 5 Checkout -->


                <div v-if="current_page == 5" class="box_check_4_left">
                    <div class="bg-white border_radius_20 box_shadow mb-4">
                        <div class="row gx-0 align-items-center">
                            <div class="col-md-4 p-0 align-self-stretch">
                                <div class="review_and_pay_top_img">
                                    <img :src="package_details.Overview.PackageDefaultImage" alt="">
                                </div>
                            </div>

                            <div class="col-md-8 p-4">
                                <div class="review_and_pay_top_txt fw_gilroy_medium">
                                    <div>
                                        <div class="mb-4">
                                            <p class="h6 txt_blue_secondary">@{{ package_details.Overview.PackageTitle }}</p>
                                            {{--       <p class="mb-0 txt_silver">Mesmerizing Dubai Park and Resort Special: 6 Days -
                                                4 Star</p> --}}
                                        </div>

                                        <div class="row gx-0 justify-content-between align-items-center flex-wrap">
                                            <div
                                                class="col-md-9 d-flex align-items-start justify-content-between fw_gilroy_medium txt_silver mb-sm-0 mb-4">
                                                <div class="text-center flex_1">
                                                    <img width="28" src="/img/world_location_icon_blue.svg"
                                                        class="mb-2" alt="">
                                                    <p class="mb-0 fs_14">@{{ package_details.Overview.PackageCityName }}</p>
                                                </div>

                                                <div class="text-center flex_1">
                                                    <img width="28" src="/img/cloud_sun_icon_img.svg" class="mb-2"
                                                        alt="">
                                                    <p class="mb-0 fs_14">@{{ package_details.Overview.PackageDays }} Days</p>
                                                </div>

                                                <div class="text-center flex_1">

                                                    <img width="28" src="/img/world_location_icon_blue.svg"
                                                        class="mb-2" alt="">
                                                    <p v-for="(r, rIndex) in rooms" class="mb-0 fs_14">Package
                                                        @{{ rIndex + 1 }} <br> @{{ r.Adults }} Adults <span
                                                            v-if="r.Children > 0">, @{{ r.Children }} Child </span>
                                                    </p>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="hotel_only == false" class="p-4 bg-white border_radius_20 box_shadow mx-auto mb-4 pad__x">
                        <h6 class="txt_dark_blue fw_gilroy_bold mb-4 pt-1">Flight</h6>
                        <div class="p-4 border_radius_20 terms_and_condition mb-2">

                            <flight-item :is_read_only="read_only" :selecting_flight_for_package="is_package"
                                :search_key="search_key" :search_data="search_data" :is_side_bar="is_side_bar"
                                v-for="(trip, trip_index) in [selected_flight_object]" :trip_data="trip"
                                :tripindex="'i' + trip_index"></flight-item>

                            <div class="row gx-0 justify-content-end">
                                <div class="col-md-5">
                                    <div>
                                        <div class="d-flex justify-content-between txt_silver fw_gilroy_bold">
                                            <p class="mb-0 fs_14">Base fare</p>
                                            <p class="mb-0 fw_gilroy_medium fs_14">@{{ selected_flight_object.Currency }}
                                                @{{ ceil_num(selected_flight_object.BaseFare) }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between txt_silver fw_gilroy_bold">
                                            <p class="mb-0 fs_14">Fee and tax</p>
                                            <p class="mb-0 fw_gilroy_medium fs_14">@{{ selected_flight_object.Currency }}
                                                @{{ ceil_num(selected_flight_object.Tax) }} </p>
                                        </div>

                                        <div class="d-flex justify-content-between txt_silver fw_gilroy_bold">
                                            <p class="mb-0 fs_14">Other charges</p>
                                            <p class="mb-0 fw_gilroy_medium fs_14">@{{ selected_flight_object.Currency }}
                                                @{{ ceil_num(selected_flight_object.OtherCharges) }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between txt_blue_secondary fw_gilroy_bold">
                                            <p class="mb-0 fs_14">Total</p>
                                            <p class="mb-0 fs_14">@{{ selected_flight_object.Currency }} @{{ total_price(selected_flight_object.BaseFare, selected_flight_object.Tax, selected_flight_object.OtherCharges) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-9 px-0">
                                    <div class="row gx-0 mb-3">
                                        <div class="col-md-2 text-center mb-3">
                                            <img src="img/eurowings_img.svg" class="img_85_w" alt="">
                                        </div>
                                        <div class="col-md-10 mb-3 pe-md-3 pe-0">
                                            <div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 fw_gilroy_bold txt_blue_secondary">07:45 PM</p>
                                                    <span class="select_flight_time_line_style"></span>
                                                    <p class="mb-0 fw_gilroy_medium fs_14">9h50m</p>
                                                    <span class="select_flight_time_line_style"></span>
                                                    <p class="mb-0 fw_gilroy_bold txt_blue_secondary">01:10 PM</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 txt_blue_secondary fs_14">ADL</p>
                                                    <p class="mb-0 txt_silver fs_14">1 Stop Via Melbourne Airp...</p>
                                                    <p class="mb-0 txt_blue_secondary fs_14">DXB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-0">
                                        <div class="col-md-2 text-center mb-3">
                                            <img src="img/eurowings_img.svg" class="img_85_w" alt="">
                                        </div>
                                        <div class="col-md-10 mb-3 pe-md-3 pe-0">
                                            <div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 fw_gilroy_bold txt_blue_secondary">07:45 PM</p>
                                                    <span class="select_flight_time_line_style"></span>
                                                    <p class="mb-0 fw_gilroy_medium fs_14">9h50m</p>
                                                    <span class="select_flight_time_line_style"></span>
                                                    <p class="mb-0 fw_gilroy_bold txt_blue_secondary">01:10 PM</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 txt_blue_secondary fs_14">ADL</p>
                                                    <p class="mb-0 txt_silver fs_14">1 Stop Via Melbourne Airp...</p>
                                                    <p class="mb-0 txt_blue_secondary fs_14">DXB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 text-center">
                                    <p class="txt_blue_secondary fw_gilroy_bold h5">+$5,690</p>
                                    <a href="#"
                                        class="btn mb-2 btn_silver border_radius_10 d-block medium_btn px-2 fs_14 py-2">Change</a>
                                </div>
                            </div>

                            <div>
                                <div class="pt-4">
                                    <div class="d-flex align-items-center">
                                        <p class="fw_gilroy_medium txt_blue_secondary mb-0 me-3">Details</p>
                                        <div class="line_after_details_txt"></div>
                                    </div>
                                    <div class="bg-white border_radius_13 p-4 m-3">
                                        <div class="row mb-3">
                                            <div class="col-md-10 px-0">
                                                <div class="row gx-0 mb-3">
                                                    <div class="col-md-2 text-center mb-3">
                                                        <img src="img/eurowings_img.svg" class="img_85_w mb-2"
                                                            alt="">
                                                        <p class="mb-0 txt_silver fs_14">EK | 5696 | R</p>
                                                    </div>
                                                    <div class="col-md-10 mb-3 px-md-3 pe-0">
                                                        <div>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs_14 txt_silver">Fri,23 Sep</p>
                                                                    <p class="mb-0 fw_gilroy_bold txt_blue_secondary">07:45
                                                                        PM</p>
                                                                </div>
                                                                <span class="select_flight_time_line_style"></span>
                                                                <p class="mb-0 fw_gilroy_medium fs_14">9h50m</p>
                                                                <span class="select_flight_time_line_style"></span>
                                                                <div class="text-end">
                                                                    <p class="mb-0 fs_14 txt_silver">Fri,23 Sep</p>
                                                                    <p class="mb-0 fw_gilroy_bold txt_blue_secondary">01:10
                                                                        PM</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="mb-0 fs_14 txt_blue_secondary">
                                                                    <p class="mb-0">(Terminal 1),Adelaide</p>
                                                                </div>
                                                                <div class="mb-0 fs_14 txt_blue_secondary text-end">
                                                                    <p class="mb-0">(Terminal 1),Melbourne</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 text-center d-flex flex-column align-items-center">
                                                <div class="d-flex align-items-end">
                                                    <div class="position-relative me-2">
                                                        <img src="img/lugage_icon.svg" alt="">
                                                        <span
                                                            class="select_flight_lugage_icon_txt fs_12 text-white">7</span>
                                                    </div>
                                                    <div class="position-relative">
                                                        <img src="img/shopping_bag_icon_selectflight.svg" alt="">
                                                        <span
                                                            class="select_flight_lugage_icon_txt fs_12 text-white">15</span>
                                                    </div>
                                                </div>
                                                <div class="txt_silver pt-1">
                                                    <p class="mb-0 fs_14">Luggage</p>
                                                    <p class="mb-0 fs_14">included</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-10 px-0">
                                                <div class="row gx-0 mb-3">
                                                    <div class="col-md-2 text-center mb-3">
                                                        <img src="img/eurowings_img.svg" class="img_85_w mb-2"
                                                            alt="">
                                                        <p class="mb-0 txt_silver fs_14">EK | 5696 | R</p>
                                                    </div>
                                                    <div class="col-md-10 mb-3 px-md-3 pe-0">
                                                        <div>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs_14 txt_silver">Fri,23 Sep</p>
                                                                    <p class="mb-0 fw_gilroy_bold txt_blue_secondary">07:45
                                                                        PM</p>
                                                                </div>
                                                                <span class="select_flight_time_line_style"></span>
                                                                <p class="mb-0 fw_gilroy_medium fs_14">9h50m</p>
                                                                <span class="select_flight_time_line_style"></span>
                                                                <div class="text-end">
                                                                    <p class="mb-0 fs_14 txt_silver">Fri,23 Sep</p>
                                                                    <p class="mb-0 fw_gilroy_bold txt_blue_secondary">01:10
                                                                        PM</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <div class="mb-0 fs_14 txt_blue_secondary">
                                                                    <p class="mb-0">(Terminal 1),Adelaide</p>
                                                                </div>
                                                                <div class="mb-0 fs_14 txt_blue_secondary text-end">
                                                                    <p class="mb-0">(Terminal 1),Melbourne</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 text-center d-flex flex-column align-items-center">
                                                <div class="d-flex align-items-end">
                                                    <div class="position-relative me-2">
                                                        <img src="img/lugage_icon.svg" alt="">
                                                        <span
                                                            class="select_flight_lugage_icon_txt fs_12 text-white">7</span>
                                                    </div>
                                                    <div class="position-relative">
                                                        <img src="img/shopping_bag_icon_selectflight.svg" alt="">
                                                        <span
                                                            class="select_flight_lugage_icon_txt fs_12 text-white">15</span>
                                                    </div>
                                                </div>
                                                <div class="txt_silver pt-1">
                                                    <p class="mb-0 fs_14">Luggage</p>
                                                    <p class="mb-0 fs_14">included</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row gx-0 justify-content-end">
                                            <div class="col-md-5">
                                                <div>
                                                    <div class="d-flex justify-content-between txt_silver fw_gilroy_bold">
                                                        <p class="mb-0 fs_14">Base farw</p>
                                                        <p class="mb-0 fw_gilroy_medium fs_14">$5,377</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between txt_silver fw_gilroy_bold">
                                                        <p class="mb-0 fs_14">Fee and tax</p>
                                                        <p class="mb-0 fw_gilroy_medium fs_14">$313</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between txt_silver fw_gilroy_bold">
                                                        <p class="mb-0 fs_14">Other charges</p>
                                                        <p class="mb-0 fw_gilroy_medium fs_14">$0</p>
                                                    </div>

                                                    <div
                                                        class="d-flex justify-content-between txt_blue_secondary fw_gilroy_bold">
                                                        <p class="mb-0 fs_14">Total</p>
                                                        <p class="mb-0 fs_14">$5,690</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!--  -->
                    {{--   <div class="bg-white border_radius_20 box_shadow p-4 px-sm-4 px-3 mb-4">
                        <div>
                            <!-- 1 -->
                            <div class="row_experience flex-sm-wrap mb-0 position-relative pb-5">
                                <div class="r_experience_img_after stay_summary_top_after"></div>
                                <div class="r_experience_img stay_summary_top stay_summary_top2">
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-sm">Day</p>
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-1">1</p>
                                </div>
                                <div
                                    class="r_experience_desc r_experience_desc2 stay_summary_middle mt-2 ms-3 d-flex align-items-center flex-wrap flex-grow-1">
                                    <div class="row gx-0 pb-1 stay_summary_middle3 stay_summary_middle4">
                                        <div class="col-xl-5 pe-xl-2 mb-xl-0 mb-4">
                                            <img src="./img/pexels-asad-photo-maldives-1591373.png" alt="image">
                                        </div>
                                        <div class="col-xl-7 ps-xl-2">
                                            <p class="txt_silver fw_gilroy_medium text-end fs_14"><span
                                                    class="fw_gilroy_bold">Duration</span> - 02:00 Hours</p>
                                            <h5 class="txt_dark_blue fw_gilroy_bold fs_18">Numquam et similique dolor
                                                temporibus et nobis fugit.</h5>
                                            <p class="txt_silver fw_gilroy_medium">Qui quibusdam facere sed distinctio
                                                fugiat est at voluptatem libero. Corporis qui et voluptatibus quisquam.
                                                Ratione similique fugit distinctio.</h>
                                            <div
                                                class="d-flex justify-content-sm-between justify-content-start align-items-sm-center flex-sm-row flex-column pb-1">
                                                <a href="#"
                                                    class="text_dark_blue_a text-decoration-none text-capitalize fw_gilroy_medium fs_14 mb-sm-0 mb-4">See
                                                    more...</a>
                                                <button
                                                    class="accommodation_package_toggle btn py-1 btn_silver medium_btn py-2 px-3 text-capitalize fs_14">View
                                                    Available Options</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="double_superior_box w-100 d-block">
                                        <div class="d-flex justify-content-end w-100 mb-3">
                                            <button class="accommodation_package_remove bg-transparent border-0">
                                                <img width="18" src="img/cross_icon_red_x.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="activity_day_wise_box">
                                            <div class="row gx-0">
                                                <div class="col-lg-7 me-auto">
                                                    <h5 class="txt_dark_blue fw_gilroy_medium">Dhow Cruise with Dinner at
                                                        Dubai Creek (Deluxe) - Sharing</h5>
                                                    <p class="txt_silver mb-0 fw_gilroy_medium">Transfers Time: 19: 30
                                                        Duration: 02: 00 hrs</p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <h5
                                                        class="txt_dark_blue fw_gilroy_bold text-sm-end text-center mb-3 mt-sm-0 mt-3">
                                                        $696</h5>
                                                    <div class="d-flex justify-content-sm-end flex-sm-row flex-column">
                                                        <button
                                                            class="day_activity_collapse me-sm-2 mb-sm-0 mb-3 fs_14 btn py-2 px-3 btn_silver medium_btn fw_gilroy_medium"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#day_wise_box_collapse1" aria-expanded="true"
                                                            aria-controls="collapseExample">Modify <i
                                                                class="fas fa-chevron-down ms-1"></i></button>
                                                        <button onclick="active_pack_accommodation(this)"
                                                            class="mb-sm-0 mb-3 fs_14 btn_accommodation_pack btn py-2 px-3 btn_silver medium_btn fw_gilroy_medium">Selected</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapse show day_wise_box_collapse mt-3"
                                                id="day_wise_box_collapse1">
                                                <div class="row gx-0">
                                                    <div class="col-lg-8 pe-lg-3">
                                                        <h5 class="txt_dark_blue fw_gilroy_bold mb-4">Package 1</h5>
                                                        <div class="d-flex flex-sm-row flex-column">
                                                            <div
                                                                class="child_a_select_row_2 flex-column mb-sm-0 mb-4 align-items-start me-xl-auto me-sm-5 me-4">
                                                                <h6 class="fw_gilroy_bold txt_dark_blue mb-1">Adults</h6>
                                                                <p class="fs_14 txt_silver fw_gilroy_medium mb-3">(12 yrs
                                                                    &amp; above)</p>
                                                                <div
                                                                    class="increase_decrease_btns increase_decrease_btns2">
                                                                    <div data-decrease=""><i class="fas fa-minus"></i>
                                                                    </div>
                                                                    <input class="fs_14" data-value="" type="text"
                                                                        value="1">
                                                                    <div data-increase=""><i class="fas fa-plus"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="child_a_select_row_2 flex-column align-items-start">
                                                                <h6 class="fw_gilroy_bold txt_dark_blue mb-1">Children</h6>
                                                                <p class="fs_14 txt_silver fw_gilroy_medium mb-3">(Age 12
                                                                    years and under)</p>
                                                                <div
                                                                    class="increase_decrease_btns increase_decrease_btns2">
                                                                    <div data-decrease=""><i class="fas fa-minus"></i>
                                                                    </div>
                                                                    <input class="fs_14" data-value="" type="text"
                                                                        value="1">
                                                                    <div data-increase=""><i class="fas fa-plus"></i>
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
                            <!-- 2 -->
                            <div class="row_experience flex-sm-wrap mb-0 position-relative pb-5">
                                <div class="r_experience_img_after stay_summary_top_after"></div>
                                <div class="r_experience_img stay_summary_top stay_summary_top2">
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-sm">Day</p>
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-1">2</p>
                                </div>
                                <div
                                    class="r_experience_desc r_experience_desc2 stay_summary_middle mt-2 ms-3 d-flex align-items-center flex-wrap flex-grow-1">
                                    <div class="row gx-0 pb-1 stay_summary_middle3">
                                        <div class="col-xl-5 pe-xl-2 mb-xl-0 mb-4">
                                            <img src="./img/pexels-asad-photo-maldives-1591373.png" alt="image">
                                        </div>
                                        <div class="col-xl-7 ps-xl-2">
                                            <p class="txt_silver fw_gilroy_medium text-end fs_14"><span
                                                    class="fw_gilroy_bold">Duration</span> - 02:00 Hours</p>
                                            <h5 class="txt_dark_blue fw_gilroy_bold fs_18">Numquam et similique dolor
                                                temporibus et nobis fugit.</h5>
                                            <p class="txt_silver fw_gilroy_medium">Qui quibusdam facere sed distinctio
                                                fugiat est at voluptatem libero. Corporis qui et voluptatibus quisquam.
                                                Ratione similique fugit distinctio.</h>
                                            <div
                                                class="d-flex justify-content-sm-between justify-content-start align-items-sm-center flex-sm-row flex-column pb-1">
                                                <a href="#"
                                                    class="text_dark_blue_a text-decoration-none text-capitalize fw_gilroy_medium fs_14 mb-sm-0 mb-4">See
                                                    more...</a>
                                                <button
                                                    class="accommodation_package_toggle btn py-1 btn_silver medium_btn py-2 px-3 text-capitalize fs_14">View
                                                    Available Options</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="double_superior_box w-100">
                                        <div class="d-flex justify-content-end w-100 mb-3">
                                            <button class="accommodation_package_remove bg-transparent border-0">
                                                <img width="18" src="img/cross_icon_red_x.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="activity_day_wise_box">
                                            <div class="row gx-0">
                                                <div class="col-lg-7 me-auto">
                                                    <h5 class="txt_dark_blue fw_gilroy_medium">Dhow Cruise with Dinner at
                                                        Dubai Creek (Deluxe) - Sharing</h5>
                                                    <p class="txt_silver mb-0 fw_gilroy_medium">Transfers Time: 19: 30
                                                        Duration: 02: 00 hrs</p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <h5
                                                        class="txt_dark_blue fw_gilroy_bold text-sm-end text-center mb-3 mt-sm-0 mt-3">
                                                        $696</h5>
                                                    <div class="d-flex justify-content-sm-end flex-sm-row flex-column">
                                                        <button
                                                            class="day_activity_collapse me-sm-2 mb-sm-0 mb-3 fs_14 btn py-2 px-3 btn_silver medium_btn fw_gilroy_medium"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#day_wise_box_collapse2" aria-expanded="false"
                                                            aria-controls="collapseExample">Modify <i
                                                                class="fas fa-chevron-down ms-1"></i></button>
                                                        <button onclick="active_pack_accommodation(this)"
                                                            class="mb-sm-0 mb-3 fs_14 btn py-2 px-3 btn_silver medium_btn fw_gilroy_medium">Select</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapse day_wise_box_collapse mt-3" id="day_wise_box_collapse2">
                                                <div class="row gx-0">
                                                    <div class="col-lg-8 pe-lg-3">
                                                        <h5 class="txt_dark_blue fw_gilroy_bold mb-4">Package 1</h5>
                                                        <div class="d-flex flex-sm-row flex-column">
                                                            <div
                                                                class="child_a_select_row_2 flex-column mb-sm-0 mb-4 align-items-start me-xl-auto me-sm-5 me-4">
                                                                <h6 class="fw_gilroy_bold txt_dark_blue mb-1">Adults</h6>
                                                                <p class="fs_14 txt_silver fw_gilroy_medium mb-3">(12 yrs
                                                                    &amp; above)</p>
                                                                <div
                                                                    class="increase_decrease_btns increase_decrease_btns2">
                                                                    <div data-decrease=""><i class="fas fa-minus"></i>
                                                                    </div>
                                                                    <input class="fs_14" data-value="" type="text"
                                                                        value="1">
                                                                    <div data-increase=""><i class="fas fa-plus"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="child_a_select_row_2 flex-column align-items-start">
                                                                <h6 class="fw_gilroy_bold txt_dark_blue mb-1">Children</h6>
                                                                <p class="fs_14 txt_silver fw_gilroy_medium mb-3">(Age 12
                                                                    years and under)</p>
                                                                <div
                                                                    class="increase_decrease_btns increase_decrease_btns2">
                                                                    <div data-decrease=""><i class="fas fa-minus"></i>
                                                                    </div>
                                                                    <input class="fs_14" data-value="" type="text"
                                                                        value="1">
                                                                    <div data-increase=""><i class="fas fa-plus"></i>
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
                            <!-- 3 -->
                            <div class="row_experience flex-sm-wrap mb-0 position-relative pb-5">
                                <div class="r_experience_img_after stay_summary_top_after"></div>
                                <div class="r_experience_img stay_summary_top stay_summary_top2">
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-sm">Day</p>
                                    <p class="mb-0 fs_14 fw_gilroy_medium lh-1">3</p>
                                </div>
                                <div
                                    class="r_experience_desc r_experience_desc2 stay_summary_middle mt-2 ms-3 d-flex align-items-center flex-wrap flex-grow-1">
                                    <div class="row gx-0 pb-1 stay_summary_middle3">
                                        <div class="col-xl-5 pe-xl-2 mb-xl-0 mb-4">
                                            <img src="./img/pexels-asad-photo-maldives-1591373.png" alt="image">
                                        </div>
                                        <div class="col-xl-7 ps-xl-2">
                                            <p class="txt_silver fw_gilroy_medium text-end fs_14"><span
                                                    class="fw_gilroy_bold">Duration</span> - 02:00 Hours</p>
                                            <h5 class="txt_dark_blue fw_gilroy_bold fs_18">Numquam et similique dolor
                                                temporibus et nobis fugit.</h5>
                                            <p class="txt_silver fw_gilroy_medium">Qui quibusdam facere sed distinctio
                                                fugiat est at voluptatem libero. Corporis qui et voluptatibus quisquam.
                                                Ratione similique fugit distinctio.</h>
                                            <div
                                                class="d-flex justify-content-sm-between justify-content-start align-items-sm-center flex-sm-row flex-column pb-1">
                                                <a href="#"
                                                    class="text_dark_blue_a text-decoration-none text-capitalize fw_gilroy_medium fs_14 mb-sm-0 mb-4">See
                                                    more...</a>
                                                <button
                                                    class="accommodation_package_toggle btn py-1 btn_silver medium_btn py-2 px-3 text-capitalize fs_14">View
                                                    Available Options</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="double_superior_box w-100">
                                        <div class="d-flex justify-content-end w-100 mb-3">
                                            <button class="accommodation_package_remove bg-transparent border-0">
                                                <img width="18" src="img/cross_icon_red_x.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="activity_day_wise_box">
                                            <div class="row gx-0">
                                                <div class="col-lg-7 me-auto">
                                                    <h5 class="txt_dark_blue fw_gilroy_medium">Dhow Cruise with Dinner at
                                                        Dubai Creek (Deluxe) - Sharing</h5>
                                                    <p class="txt_silver mb-0 fw_gilroy_medium">Transfers Time: 19: 30
                                                        Duration: 02: 00 hrs</p>
                                                </div>
                                                <div class="col-lg-5">
                                                    <h5
                                                        class="txt_dark_blue fw_gilroy_bold text-sm-end text-center mb-3 mt-sm-0 mt-3">
                                                        $696</h5>
                                                    <div class="d-flex justify-content-sm-end flex-sm-row flex-column">
                                                        <button
                                                            class="day_activity_collapse me-sm-2 mb-sm-0 mb-3 fs_14 btn py-2 px-3 btn_silver medium_btn fw_gilroy_medium"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#day_wise_box_collapse3" aria-expanded="false"
                                                            aria-controls="collapseExample">Modify <i
                                                                class="fas fa-chevron-down ms-1"></i></button>
                                                        <button onclick="active_pack_accommodation(this)"
                                                            class="mb-sm-0 mb-3 fs_14 btn py-2 px-3 btn_silver medium_btn fw_gilroy_medium">Select</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="collapse day_wise_box_collapse mt-3" id="day_wise_box_collapse3">
                                                <div class="row gx-0">
                                                    <div class="col-lg-8 pe-lg-3">
                                                        <h5 class="txt_dark_blue fw_gilroy_bold mb-4">Package 1</h5>
                                                        <div class="d-flex flex-sm-row flex-column">
                                                            <div
                                                                class="child_a_select_row_2 flex-column mb-sm-0 mb-4 align-items-start me-xl-auto me-sm-5 me-4">
                                                                <h6 class="fw_gilroy_bold txt_dark_blue mb-1">Adults</h6>
                                                                <p class="fs_14 txt_silver fw_gilroy_medium mb-3">(12 yrs
                                                                    &amp; above)</p>
                                                                <div
                                                                    class="increase_decrease_btns increase_decrease_btns2">
                                                                    <div data-decrease=""><i class="fas fa-minus"></i>
                                                                    </div>
                                                                    <input class="fs_14" data-value="" type="text"
                                                                        value="1">
                                                                    <div data-increase=""><i class="fas fa-plus"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="child_a_select_row_2 flex-column align-items-start">
                                                                <h6 class="fw_gilroy_bold txt_dark_blue mb-1">Children</h6>
                                                                <p class="fs_14 txt_silver fw_gilroy_medium mb-3">(Age 12
                                                                    years and under)</p>
                                                                <div
                                                                    class="increase_decrease_btns increase_decrease_btns2">
                                                                    <div data-decrease=""><i class="fas fa-minus"></i>
                                                                    </div>
                                                                    <input class="fs_14" data-value="" type="text"
                                                                        value="1">
                                                                    <div data-increase=""><i class="fas fa-plus"></i>
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
                    </div> --}}
                    <!--  -->


                    <div class="py-3 c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x mb-4">
                        <div class="accordion acc_after_border" id="acc_8">
                            <div class="accordion-item">
                                <h4 class="mb-0" id="heading_7">
                                    <button
                                        class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue mb-0 fs_16"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse_8"
                                        aria-expanded="true" aria-controls="collapse_8">
                                        Primary Guest Details
                                    </button>
                                </h4>
                                <div id="collapse_8" class="accordion-collapse collapse show"
                                    aria-labelledby="heading_8">
                                    <div class="accordion-body fw_gilroy_bold text_dark_blue pt-0 pb-0 px-0 mt-3">


                                        <div class="room__form">

                                            <h5 class="text_dark_blue h6">Room 1</h5>

                                            <div v-for="(pax, paxIndex) in paxes_details">
                                                <h5 class="text_dark_blue h6">@{{ pax.type }}
                                                    @{{ pax.pax_no }}</h5>
                                                <p class="col-12 mb-0 fw_gilroy_bold mt-3 fs_14">Full Name</p>
                                                <!-- row 1 -->
                                                <div class="review_row mt-3 mb-4 ">

                                                    <div class="wrap_input_review me-3">
                                                        <input type="text" required="" v-model="pax.first_name"
                                                            class="form-control input__gray input_review fs_14"
                                                            id="fname"
                                                            placeholder="First Name &amp; Middle Name(if any)">
                                                    </div>
                                                    <div class="wrap_input_review">
                                                        <input type="text" required="" v-model="pax.last_name"
                                                            class="form-control input__gray input_review fs_14"
                                                            id="lname" placeholder="Last Name">
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row" style="gap: 40px;">
                                                    <div class="review_row mt-3 mb-4 flex-column"
                                                        style="max-width: 350px">


                                                        <div> <label
                                                                class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">date
                                                                of
                                                                birth</label>
                                                        </div>
                                                        <div class="wrap_input_grays">
                                                            <input type="text" placeholder="DD" v-model="pax.dob_d"
                                                                class="form-control input__gray input__gray_sm fs_14">
                                                            <input type="text" placeholder="MM" v-model="pax.dob_m"
                                                                class="form-control input__gray input__gray_sm fs_14">
                                                            <input type="text" placeholder="YYYY" v-model="pax.dob_y"
                                                                class="form-control input__gray input__gray_md fs_14">
                                                        </div>
                                                    </div>

                                                    <div class="review_row mt-3 mb-4 flex-column">


                                                        <div> <label
                                                                class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">Gender</label>
                                                        </div>
                                                        <div class="w-100 radio__box radio__box_blue">
                                                            <div class="me-4">
                                                                <input :id="'radio__input' + paxIndex"
                                                                    v-model="pax.gender" type="radio"
                                                                    :name="'radio__input' + paxIndex" value="male">
                                                                <label :for="'radio__input' + paxIndex"
                                                                    class="fw_gilroy_bold text-capitalize text_dark_blue fs_14">Male</label>
                                                            </div>
                                                            <div class="me-4">
                                                                <input :id="'radio__input2' + paxIndex" type="radio"
                                                                    v-model="pax.gender" :name="'radio__input' + paxIndex"
                                                                    value="female">
                                                                <label :for="'radio__input2' + paxIndex"
                                                                    class="fw_gilroy_bold text-capitalize text_dark_blue fs_14">Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>



                                            {{--  --}}

                                            <!-- row 2 -->
                                            {{--  <div class="review_row mt-3 mb-3">
                                                <div class="wrap_input_review me-3">
                                                    <div class="w-100 mb-2">
                                                        <label for="m_number" class="fs_14">Mobile Number</label>
                                                    </div>
                                                    <div class="w-100 d-flex align-items-center">
                                                        <div
                                                            class="input__gray b_radius_input h6 text_dark_blue fw_gilroy_bold me-3 mb-0">
                                                            <div class="d-flex align-items-center wrap_country_code">
                                                                <img class="d-inline-block ps-2" src="img/usa_flag.svg"
                                                                    alt="">
                                                                <input type="text" required=""
                                                                    class="form-control input__gray input_review fs_14"
                                                                    id="c_code" placeholder="+01">
                                                            </div>
                                                        </div>
                                                        <input type="number" required=""
                                                            class="form-control input__gray input_review fs_14"
                                                            id="m_number" placeholder="Mobile number">
                                                    </div>
                                                </div>
                                                <div class="wrap_input_review">
                                                    <div class="w-100 mb-2">
                                                        <label for="e_mail" class="fs_14">Email Address</label>
                                                    </div>
                                                    <input type="email" required=""
                                                        class="form-control input__gray input_review fs_14" id="e_mail"
                                                        placeholder="Valid Email Id">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                        <h4 class="text_dark_blue fw_gilroy_bold h6">Contact details</h4>
                        <div class="row mt-4">
                            <div class="col-sm-6 mb-3">
                                <label for="input__gray_email"
                                    class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">email
                                    address</label>
                                <input v-model="contact_information.email" type="email"
                                    class="form-control input__gray fs_14" id="input__gray_email">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="input__gray_phone"
                                    class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">phone
                                    number</label>


                                <phone-number ref="phone_nr" @phone_number_updated="update_phone_number"
                                    :current_phone_number="''">
                                </phone-number>
                                {{-- <input type="number" class="form-control input__gray fs_14" id="input__gray_phone"> --}}
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="input__gray_address_1"
                                    class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">adress
                                    1</label>
                                <input v-model="contact_information.address1" type="text"
                                    class="form-control input__gray fs_14" id="input__gray_address_1">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="input__gray_address_2"
                                    class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">address 2
                                    (optional)</label>
                                <input v-model="contact_information.address2" type="text"
                                    class="form-control input__gray fs_14" id="input__gray_address_2">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="input__gray_city"
                                    class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">city</label>
                                <input v-model="contact_information.city" type="text"
                                    class="form-control input__gray fs_14" id="input__gray_city">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="input__gray_postcode"
                                    class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">postcode</label>
                                <input v-model="contact_information.postcode" type="text"
                                    class="form-control input__gray fs_14" id="input__gray_postcode">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="input__gray_country"
                                    class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">county /
                                    region
                                    (optional)</label>
                                <input v-model="contact_information.county" type="text"
                                    class="form-control input__gray fs_14" id="input__gray_country">
                            </div>
                            {{-- <div class="col-sm-6 mb-3">
                                                        <label for="input__gray_region"
                                                            class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">homeland /
                                                            region</label>
                                                        <select class="select_gray input__gray child_select_box region_p">
                                                            <option selected>homeland / region</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div> --}}
                        </div>
                    </div>
                    <!--  -->
                    <div class="py-3 c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                        <div class="accordion acc_after_border" id="acc_10">
                            <div class="accordion-item">
                                <h4 class="mb-0" id="heading_10">
                                    <button
                                        class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse_10"
                                        aria-expanded="true" aria-controls="collapse_10">
                                        Special Request (Optional)
                                    </button>
                                </h4>
                                <div id="collapse_10" class="accordion-collapse collapse show"
                                    aria-labelledby="heading_10">
                                    <div class="accordion-body fw_gilroy_bold text_dark_blue pt-0 pb-0 px-0">
                                        <div class="row">
                                            <div class="col-12 mt-3 mb-3">
                                                <textarea class="form-control input__gray input_review fs_14" id="special_request" rows="4"
                                                    placeholder="This amount is not refundable in case of cancellation"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                        <div class="accordion" id="acc_discount">
                            <div class="accordion-item">
                                <h4 class="mb-0" id="headingCupon">
                                    <button
                                        class="review_accordion_button accordion-button text_dark_blue fw_gilroy_bold fs_16 pb-2"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseCupon"
                                        aria-expanded="true" aria-controls="collapseCupon">
                                        Use a discount
                                    </button>
                                </h4>
                                <div id="collapseCupon" class="accordion-collapse collapse show"
                                    aria-labelledby="headingCupon">
                                    <div class="accordion-body">
                                        <div class="row_discount">
                                            <!-- row discount left -->
                                            <div v-if="applied_coupon_code == '' && applied_gift_card_code == ''" class="row_discount_left">


                                                <label for="discount_input"
                                                    class="form-label fw_gilroy_bold text_dark_blue text-capitalize fs_14">enter
                                                    your code</label>
                                                <input v-model="coupon_code" type="text"
                                                    class="form-control input__gray fs_14" id="discount_input">
                                            </div>

                                            <div v-if="!(applied_coupon_code == '' && applied_gift_card_code == '')" class="row_discount_left">


                                                {{--    <label for="discount_input"
                                                    class="form-label fw_gilroy_bold text_dark_blue text-capitalize fs_14">enter
                                                    your coupon code</label> --}}
                                                <input v-if="!(applied_coupon_code == '')" v-model="applied_coupon.coupon_code" disabled type="text"
                                                    class="form-control input__gray fs_14">
                                                    <input v-if="!(applied_gift_card_code == '')" v-model="applied_gift_card.code" disabled type="text"
                                                    class="form-control input__gray fs_14">

                                            </div>
                                            <!-- row discount right -->
                                            <div v-if="applied_coupon_code == '' && applied_gift_card_code == ''" class="row_discount_right">
                                                <button v-on:click="addCoupon" class="fs_14">Add
                                                    code</button>
                                            </div>
                                            <div v-if="!(applied_coupon_code == '' && applied_gift_card_code == '')" class="row_discount_right">
                                                <button v-on:click="removeCoupon" class="fs_14">Remove
                                                    code</button>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                        <div>
                            <div id="checkout"></div>
                        </div>
                    </div>
                    <div class="append_on_desktop">
                        <div class="pay_lists fw_gilroy_bold">
                            <h5 class="trip_box_heading mb-3 h6">By clicking on pay:</h5>
                            <ul class="pay_list_wrapper mb-0">
                                <li class="pay_list_item fs_14"><span class="before_circle"></span> I accept the <a
                                        class="pay_list_item_link" href="#">terms</a> of use for Trippbo.</li>
                                {{--      <li v-if="selected_flight_object" class="pay_list_item fs_14"><span class="before_circle"></span> I agree to
                                        @{{ flight.flightName }}
                                    <a class="pay_list_item_link" :href="'/flight/terms?key=' + data_key"
                                        target="_blank">terms and conditions</a>.
                                </li> --}}



                                <li class="pay_list_item fs_14"><span class="before_circle"></span> I accept the <a
                                        class="pay_list_item_link" href="/privacy-policy">Privacy & Policy terms</a> of
                                    Trippbo.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-md-12 mx-auto">
                            <a v-on:click="pay_booking"
                                style="    max-width: 400px;
                            margin: 0 auto;"
                                class="btn py-2 fs_14 px-3 btn_pink medium_btn d-block fw_gilroy_medium">Pay
                            </a>
                        </div>
                    </div>
                </div>









                <div class=" bg-white border_radius_20 box_shadow p-4"
                    style="    height: fit-content;min-width:350px;max-width:350px;">
                    <h5 class="txt_dark_blue fw_gilroy_bold mb-4 text-uppercase">Summary</h5>
                    <ul class="ps-0 mb-0 list-unstyled border-bottom">
                        <li class="fw_gilroy_medium txt_silver mb-2 fs_14 lh-lg"><img src="/img/icons8_location_1.svg"
                                width="22" class="me-2" alt="icon">@{{ package_details.Overview.PackageCityName }}</li>
                        <li v-for="p in package_details.PackageServices" v-if="p.ServiceType == 'Hotel'"
                            class="fw_gilroy_medium txt_silver mb-2 fs_14 lh-lg"><img src="/img/icons8_bedroom.svg"
                                width="22" class="me-2" alt="icon"> @{{ p.HotelService.ServicePartnerName }} </li>
                        <li class="fw_gilroy_medium txt_silver mb-2 fs_14 lh-lg"><img
                                src="/img/icons8_rainy_snowy_day.svg" width="22" class="me-2"
                                alt="icon">@{{ package_details.Overview.PackageDays }} Days</li>
                        <li class="fw_gilroy_medium txt_silver mb-2 fs_14 lh-lg">


                            <div v-for="(room, roomIndex) in rooms" style="display: block">
                                <img src="/img/icons8_people.svg" width="22" class="me-2" alt="icon"> Package
                                @{{ roomIndex + 1 }} :
                                @{{ room.Adults }} Adults, @{{ room.Children }} Children
                            </div>


                        </li>
                    </ul>
                    <div class="py-4 border-bottom" v-if="current_page > 1">
                        <h6 class="mb-3 txt_dark_blue fw_gilroy_bold fs_18">Your Itinerary</h6>
                        <div>
                            <p class="mb-3 fs_14"><img src="/img/icons8_import_2.svg" class="me-3" width="20"
                                    alt="icon"> <span class="txt_dark_blue me-3">Check in</span> <span
                                    class="txt_silver">@{{ first_day_date }}</span></p>
                            <p class="mb-0 fs_14"><img src="/img/icons8_export_1.svg" class="me-3" width="20"
                                    alt="icon"> <span class="txt_dark_blue me-3">Check out</span> <span
                                    class="txt_silver">@{{ last_day_date }}</span></p>
                        </div>
                    </div>
                    <div class="py-4 border-bottom" v-if="current_page > 2">
                        <h6 class="mb-3 txt_dark_blue fw_gilroy_bold fs_18">Hotels Selection</h6>
                        <div v-for="hotel in list_of_hotels" class="d-flex align-items-start mb-3">
                            <img class="mt-1 me-3" src="/img/icons8_bedroom_1.svg" alt="icon">
                            <div class="me-2 flex-grow-1">
                                <p class="txt_dark_blue fw_gilroy_medium mb-0">@{{ hotel.HotelService.ServicePartnerName }}</p>
                                <p class="txt_silver fw_gilroy_medium fs_14 mb-0">@{{ getSelectedRoom(hotel).Rooms[0].RoomName }},
                                    @{{ get_meal_plan(getSelectedRoom(hotel).Rooms[0]) }}</p>
                            </div>
                            <p class="mb-0 ms-auto text_dark_blue fw_gilroy_medium"
                                style="font-size:12px;min-width:65px;">
                                @{{ package_details.Overview.PackageCurrency }} @{{ getSelectedRoom(hotel).ServicePrice }}</p>
                        </div>

                    </div>
                    <div v-if="current_page == 5 && hotel_only == false" class="py-4 border-bottom">
                        <h6 class="mb-3 txt_dark_blue fw_gilroy_bold fs_18">Flight</h6>
                        <div class="d-flex align-items-start mb-3">
                            <img class="mt-1 me-3" src="/img/icons8_airplane_take_off1.svg" alt="icon">
                            <div class="me-2 flex-grow-1">
                                <p class="txt_dark_blue fw_gilroy_medium mb-0">@{{ selected_flight_object.Segments[0].DepartureAirportName }}
                                    (@{{ selected_flight_object.Segments[0].DepartureAirportCode }}) - @{{ selected_flight_object.Segments[0].ArrivalAirportName }} (@{{ selected_flight_object.Segments[0].ArrivalAirportCode }})</p>
                                {{--    <p class="txt_silver fw_gilroy_medium fs_14 mb-0">(Terminal 1),Melbourne</p> --}}
                            </div>
                            {{--        <p class="mb-0 ms-auto text_dark_blue fw_gilroy_medium">$560</p> --}}
                        </div>
                        <div class="d-flex align-items-start mb-0">
                            <img class="mt-1 me-3" src="/img/icons8_airplane_take_off2.svg" alt="icon">
                            <div class="me-2 flex-grow-1">
                                <p class="txt_dark_blue fw_gilroy_medium mb-0">@{{ selected_flight_object.Segments[1].DepartureAirportName }}
                                    (@{{ selected_flight_object.Segments[1].DepartureAirportCode }}) - @{{ selected_flight_object.Segments[1].ArrivalAirportName }} (@{{ selected_flight_object.Segments[1].ArrivalAirportCode }})</p>
                                {{--   <p class="txt_silver fw_gilroy_medium fs_14 mb-0">(Terminal 1),Melbourne</p> --}}
                            </div>
                            {{--    <p class="mb-0 ms-auto text_dark_blue fw_gilroy_medium">$560</p> --}}
                        </div>
                    </div>
                    <div v-if="current_page == 5 && !(applied_gift_card_code == '')" class="d-flex align-items-center py-3 ">
                        <p class="mb-0 txt_dark_blue fw_gilroy_bold">@{{ applied_gift_card.code }}</p>
                        <p class="mb-0 txt_dark_blue fw_gilroy_bold fs_18 ms-auto">- @{{ applied_gift_card.currency }}
                            @{{ applied_gift_card.value }}</p>
                    </div>
                    <div v-if="current_page == 5 && !(applied_coupon_code == '')" class="d-flex align-items-center py-3 ">
                        <p class="mb-0 txt_dark_blue fw_gilroy_bold">@{{ applied_coupon.coupon_code }}</p>
                        <p class="mb-0 txt_dark_blue fw_gilroy_bold fs_18 ms-auto">- @{{ applied_coupon.currency }}
                            @{{ applied_coupon.coupon_fixed_amount }}</p>
                    </div>
                    <div v-if="current_page == 5" class="d-flex align-items-center py-3 mb-4">
                        <p class="mb-0 txt_dark_blue fw_gilroy_bold">Grand Total</p>
                        <p class="mb-0 txt_dark_blue fw_gilroy_bold fs_18 ms-auto">@{{ package_details.Overview.PackageCurrency }}
                            @{{ getTotalPrice() }}</p>
                    </div>



                    <div v-if="current_page > 1" class="row pb-2 mt-2">
                        <div class="col-md-8 mx-auto">
                            <a v-if="!(current_page > 3)" v-on:click="nextPage"
                                class="btn py-2 fs_14 px-3 btn_pink medium_btn d-block fw_gilroy_medium">Continue</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('scripts-links')
    <script>
        window.stripe = Stripe('{{ config('services.stripe.key') }}');


        let CancelToken = axios.CancelToken;
        const source = CancelToken.source();
        let cancel = function() {

        }
        const vue = new Vue({
            el: "#package_paxes",
            data: {
                coupon_code: '',
                applied_coupon_code: '',
                applied_coupon: {},

                gift_card_code: '',
                applied_gift_card: {},
                applied_gift_card_code: '',

                contact_information: {
                    email: '',
                    phone_nr: '',
                    address1: '',
                    address2: '',
                    city: '',
                    postcode: '',
                    county: ''
                },


                package_options: @json($package_options),
                hotel_only: @json($hotel_only),
                read_only: true,
                read_only_false: false,
                is_package: true,
                selected_flight_object: {},
                departure_airport_id: @json($departure_airport_id),
                is_for_holiday: true,
                first_day_date: '',
                last_day_date: '',
                list_of_hotels: [],
                list_of_hotels_details: [],
                search_key: {},
                search_data: {},
                is_side_bar: false,
                api_response: null,

                unique_id: "package_date",
                isRange: true,
                package_id: @json($package_id),
                current_page: 1,
                package_details: @json($package_details),
                rooms: [{
                    RoomNo: 1,
                    Adults: 2,
                    Children: 0,

                    Paxs: []
                }],
                paxes_details: []


            },

            methods: {

                getSelectedRoomName(hotel) {
                    let room = this.getSelectedRoom(hotel);
                    return room.Name
                },
                getMealPlan(hotel) {
                    let room = this.getSelectedRoom(hotel);
                    return room.Name
                },
                getSelectedRoom(hotel) {
                    console.log(hotel)

                    if (!hotel) {
                        return
                    }


                    let rooms = hotel.Rooms;

                    for (let [key, value] of Object.entries(rooms)) {

                        for (let y = 0; y < value.length; y++) {
                            console.log(value[y])
                            if (value[y].trippbo_room_code == hotel.SelectedRoomCode) {
                                return value[y];
                            }

                        }

                    }
                    /*         console.log("-----");
                            console.log(hotel)
                            console.log(rooms.length);
                            console.log(rooms[0].length); */



                },

                ceil_num: function(num) {
                    return Math.ceil(num);
                },
                flight_selected: function(selected_flight) {
                    this.selected_flight_object = selected_flight;
                    this.nextPage();
                },
                get_meal_plan: function(option) {
                    if (option.BoardCode == "BB") {
                        return "Bed & Breakfast"
                    } else if (option.BoardCode == "FB") {
                        return "Full Board"
                    } else if (option.BoardCode == "HB") {
                        return "Half Board"
                    } else if (option.BoardCode == "RO") {
                        return "Room Only"
                    } else if (option.BoardCode == "BF") {
                        return "Breakfast"
                    } else if (option.BoardCode == "AI") {
                        return "All Inclusive"
                    } else {
                        return option.BoardCode
                    }

                },
                fetch_hotels: async function() {
                    let room_code = 0;
                    let hotel_ids = [];
                    for (let i = 0; i < this.list_of_hotels.length; i++) {

                        hotel_ids.push({
                            hotel_id: this.list_of_hotels[i].HotelService.HotelProviderSearchId,
                            city_id: this.list_of_hotels[i].HotelService.ServiceCityId
                        })
                    }

                    let resp = await axios.post("/holiday/hotels/fetch", {
                        hotels: JSON.stringify(hotel_ids),
                        checkinDate: this.first_day_date,
                        checkoutDate: this.last_day_date,
                        rooms: JSON.stringify(this.rooms)
                    });

                    let fetched_hotels = resp.data;
                    let new_list_of_hotels = [];


                    if (fetched_hotels[0].hasOwnProperty("HotelDetail") == false) {
                        for (let i = 0; i < fetched_hotels.length; i++) {
                            for (let y = 0; y < this.list_of_hotels.length; y++) {
                                if (fetched_hotels[i].HotelProviderSearchId == this.list_of_hotels[y]
                                    .HotelService.HotelProviderSearchId) {




                                    let is_first_room = true;



                                    this.$set(this.list_of_hotels[y], 'FetchedDetails', fetched_hotels[i])

                                    this.$set(this.list_of_hotels[y], 'ShowFullDescription', false)


                                    this.$set(this.list_of_hotels[y], 'Rooms', {});

                                    for (let x = 0; x < this.list_of_hotels[y].FetchedDetails.HotelServices
                                        .length; x++) {




                                        this.$set(this.list_of_hotels[y].FetchedDetails.HotelServices[x],
                                            'trippbo_room_code', room_code);


                                        if (is_first_room) {
                                            this.$set(this.list_of_hotels[y], 'SelectedRoomCode', room_code);
                                            is_first_room = false;
                                        }
                                        room_code += 1;




                                        if (this.list_of_hotels[y].Rooms.hasOwnProperty(this.list_of_hotels[y]
                                                .FetchedDetails.HotelServices[x].Rooms[0].RoomName)
                                            /*  && this.list_of_hotels[y]
                                                                                            .FetchedDetails.HotelServices[x].Rooms[0].RefundableStay == true */
                                        ) {
                                            this.list_of_hotels[y].Rooms[this.list_of_hotels[y].FetchedDetails
                                                .HotelServices[x].Rooms[0].RoomName].push(this
                                                .list_of_hotels[y]
                                                .FetchedDetails.HotelServices[x]);
                                        } else if (true
                                            /* this.list_of_hotels[y]
                                                                                           .FetchedDetails.HotelServices[x].Rooms[0].RefundableStay == true */
                                        ) {
                                            this.$set(this.list_of_hotels[y].Rooms, this.list_of_hotels[y]
                                                .FetchedDetails.HotelServices[x].Rooms[0].RoomName, []);
                                            this.list_of_hotels[y].Rooms[this.list_of_hotels[y].FetchedDetails
                                                .HotelServices[x].Rooms[0].RoomName].push(this
                                                .list_of_hotels[y]
                                                .FetchedDetails.HotelServices[x]);

                                        }
                                    }


                                }
                            }
                        }
                    } else {
                        for (let i = 0; i < fetched_hotels.length; i++) {
                            for (let y = 0; y < this.list_of_hotels.length; y++) {
                                if (fetched_hotels[i].HotelDetail.HotelProviderSearchId == this.list_of_hotels[
                                        y]
                                    .HotelService.HotelProviderSearchId) {




                                    let is_first_room = true;



                                    this.$set(this.list_of_hotels[y], 'FetchedDetails', fetched_hotels[i])




                                    this.$set(this.list_of_hotels[y], 'Rooms', {});

                                    for (let x = 0; x < this.list_of_hotels[y].FetchedDetails.HotelDetail
                                        .HotelRooms
                                        .length; x++) {




                                        this.$set(this.list_of_hotels[y].FetchedDetails.HotelDetail.HotelRooms[
                                                x],
                                            'trippbo_room_code', room_code);


                                        if (is_first_room) {
                                            this.$set(this.list_of_hotels[y], 'SelectedRoomCode', room_code);
                                            is_first_room = false;
                                        }
                                        room_code += 1;




                                        if (this.list_of_hotels[y].Rooms.hasOwnProperty(this.list_of_hotels[y]
                                                .FetchedDetails.HotelDetail.HotelRooms[x].Name)) {
                                            this.list_of_hotels[y].Rooms[this.list_of_hotels[y].FetchedDetails
                                                .HotelDetail.HotelRooms[x].Name].push(this
                                                .list_of_hotels[y]
                                                .FetchedDetails.HotelDetail.HotelRooms[x]);
                                        } else {
                                            this.$set(this.list_of_hotels[y].Rooms, this.list_of_hotels[y]
                                                .FetchedDetails.HotelDetail.HotelRooms[x].Name, []);
                                            this.list_of_hotels[y].Rooms[this.list_of_hotels[y].FetchedDetails
                                                .HotelDetail.HotelRooms[x].Name].push(this
                                                .list_of_hotels[y]
                                                .FetchedDetails.HotelDetail.HotelRooms[x]);

                                        }
                                    }


                                }
                            }
                        }
                    }



                },


                total_price: function(baseFare, tax, otherCharges) {
                    return Math.ceil(baseFare) + Math.ceil(tax) + Math.ceil(otherCharges)
                },
                is_selected: function(is_sel) {
                    if (is_sel) {
                        return "Selected";
                    } else {
                        return "Select";
                    }

                },
                handle_first_date: function(date1) {

                    this.first_day_date = date1;

                },
                handle_second_date: function(date2) {

                    this.last_day_date = date2;

                },

                preparePaxes: function() {
                    let adultNum = 0;
                    let ChildNum = 0;
                    let InfantNum = 0;
                    for (let i = 0; i < this.rooms.length; i++) {
                        for (let y = 0; y < this.rooms[i].Adults; y++) {
                            adultNum += 1;
                            this.paxes_details.push({
                                type: 'Adult',
                                first_name: '',
                                last_name: '',
                                dob_d: '',
                                dob_m: '',
                                dob_y: '',
                                gender: '',
                                pax_no: adultNum
                            })
                        }

                        for (let y = 0; y < this.rooms[i].Paxs.length; y++) {
                            let type = "";
                            if (this.rooms[i].Paxs[y].Age < 2) {
                                type = "Infant"
                                InfantNum += 1;
                            } else {
                                type = "Child"
                                ChildNum += 1;
                            }
                            this.paxes_details.push({
                                type: type,
                                first_name: '',
                                last_name: '',
                                dob_d: '',
                                dob_m: '',
                                dob_y: '',
                                gender: '',
                                pax_no: type == "Infant" ? InfantNum : ChildNum
                            })
                        }
                    }

                },
                pay_booking: async function() {
                    let {
                        error
                    } = await this.pay_order();

                    if (error) {
                        return
                    }
                    let selected_rooms = [];

                    for (let i = 0; i < this.list_of_hotels.length; i++) {
                        selected_rooms.push(this.getSelectedRoom(this.list_of_hotels[i]));
                        selected_rooms[i].checkInDate = this.list_of_hotels[i].HotelService.ServiceCheckInDate
                        selected_rooms[i].checkOutDate = this.list_of_hotels[i].HotelService.ServiceCheckOutDate
                    }

                    let data = new FormData();

                    data.append("contact_info", JSON.stringify(this.contact_information));
                    data.append("paxes_details", JSON.stringify(this.paxes_details));
                    data.append("flight", JSON.stringify(this.selected_flight_object));
                    data.append("selected_hotels", JSON.stringify(this.list_of_hotels));
                    data.append("package_details", JSON.stringify(this.package_details.Overview));
                    data.append("selected_rooms", JSON.stringify(selected_rooms));



                    let resp = await axios.post("/holiday/book", data);



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
                },



                nextPage: function() {
                    this.current_page += 1;
                    if (this.current_page == 5) {
                        this.preparePaxes();

                        this.prepareCheckout();
                    }

                    if (this.hotel_only && this.current_page == 4) {
                        this.nextPage();
                    }
                    window.location.hash = "#" + this.current_page
                },
                removeRoom: function(index) {
                    this.rooms.pop();
                },
                addRoom: function() {

                    this.rooms.push({
                        RoomNo: this.rooms.length + 1,
                        Adults: 2,
                        Children: 0,

                        Paxs: []
                    })

                },
                addChild: function(room) {
                    if (room.Adults + room.Children == 5) {
                        return;
                    }
                    room.Children += 1;
                    room.Paxs.push({
                        PaxType: "C",
                        Age: 0
                    })

                },
                removeAdult: function(room) {
                    if (room.Adults == 1) {
                        return;
                    }
                    room.Adults -= 1;
                },
                addAdult: function(room) {

                    if (room.Adults + room.Children == 5) {
                        return;
                    }

                    room.Adults += 1;


                },
                removeChild: function(room) {

                    if (room.Children == 0) {
                        return;
                    }

                    room.Children -= 1;
                    room.Paxs = room.Paxs.slice(0, -1);
                },

                addGiftCard: async function() {



                    try {
                        let resp = await axios.post("/checkout/verifyGiftCard", {
                            code: this.gift_card_code
                        })
                        this.applied_gift_card = resp.data;
                        this.applied_gift_card_code = resp.data.code
                        this.gift_card_code = ''


                    } catch (ex) {

                    }
                },

                addCoupon: async function() {


                    try {
                        let resp = await axios.post("/checkout/verifyCoupon", {
                            coupon_code: this.coupon_code
                        })
                        this.applied_coupon = resp.data;
                        this.applied_coupon_code = resp.data.coupon_code
                        this.coupon_code = ''
                    } catch (ex) {

                        try {
                            let resp = await axios.post("/checkout/verifyGiftCard", {
                                code: this.coupon_code
                            })
                            this.applied_gift_card = resp.data;
                            this.applied_gift_card_code = resp.data.code
                            this.gift_card_code = ''


                        } catch (ex) {
                            alert("not found")
                        }


                    }




                },

                prepareCheckout: async function() {
                    let resp = await axios.post('/flights/prepare_payment');
                    let client_secret = resp.data
                    const options = {
                        clientSecret: client_secret,
                    };
                    const elements = stripe.elements(options);


                    const paymentElement = elements.create("payment");
                    paymentElement.mount("#checkout");

                },
                getTotalPrice: function() {
                    let total_price = 0;

                    for (let i = 0; i < this.list_of_hotels.length; i++) {
                        total_price += Math.ceil(this.getSelectedRoom(this.list_of_hotels[i]).ServicePrice);
                    }

                    if (this.selected_flight_object.hasOwnProperty("PublishedFare")) {
                        total_price += Math.ceil(this.selected_flight_object.PublishedFare);
                    }

                    if (this.applied_coupon.hasOwnProperty("coupon_fixed_amount")) {
                        total_price -= this.applied_coupon.coupon_fixed_amount
                    }

                    if (this.applied_gift_card.hasOwnProperty("value")) {
                        total_price -= this.applied_gift_card.value;
                    }

                    return total_price;

                },
                update_phone_number: function(new_nr) {
                    this.contact_information.phone_nr = new_nr;

                },
                removeCoupon: function() {
                    this.applied_coupon = {}
                    this.applied_coupon_code = ''
                    this.coupon_code = ''
                    this.applied_gift_card = {}
                    this.gift_card_code = ''
                    this.applied_gift_card_code = ''
                },

                loadFlights: async function() {
                    let flight_passengers = [{
                            id: 1,
                            passenger_type: 'Adult',
                            passenger_age_range: '18+',
                            passengers: [{
                                id: 1
                            }],
                            increments: 0,
                        },

                        {
                            id: 4,
                            passenger_type: 'Children',
                            passenger_age_range: '2 - 11',
                            passengers: [],
                            increments: 0,
                        },

                        {
                            id: 6,
                            passenger_type: 'Infant',
                            passenger_age_range: 'Under 2',
                            passengers: [],
                            increments: 0,
                        }



                    ];

                    this.search_data = JSON.stringify({
                        flight_passengers
                    });
                    let data = {
                        departure_date: this.first_day_date,
                        return_date: this.last_day_date,
                        departure_airport_id: this.departure_airport_id,
                        destination_airport_id: this.package_options.airport_id,
                        flight_class: '1',
                        flight_type: '2',
                        search_key: '',
                        flight_passengers: JSON.stringify(flight_passengers),
                    }

                    let f = new FormData();
                    f.append("search_data", JSON.stringify(data));


                    let resp = await axios.post('/flights/search_for_flights', f, {
                        cancelToken: new CancelToken(function executor(c) {
                            cancel = c;

                        })

                    })

                    this.api_response = resp.data;
                }

            },
            mounted: async function() {
                //  this.current_page = 5;

                for (let i = 0; i < this.package_details.PackageServices.length; i++) {
                    if (this.package_details.PackageServices[i].ServiceType == "Hotel") {
                        this.list_of_hotels.push(this.package_details.PackageServices[i]);
                    }
                }


                this.$refs.date_picker_2.attach_date_picker(null, moment().add(3, 'days').format("YYYY-MM-DD"),
                    moment().add(3 + parseInt(this.package_details.Overview.PackageDays), 'days').format(
                        "YYYY-MM-DD"),
                    false, true);








                let self = this
                window.onpopstate = async function(something) {

                    console.log(something.currentTarget.location.hash)
                    switch (something.currentTarget.location.hash) {
                        case '#1':
                            self.current_page = 1
                            window.scroll(0, 0);
                            break;
                        case '#2':
                            self.current_page = 2

                            window.scroll(0, 0);

                            self.$nextTick(() => {


                            })
                            break;
                        case '#3':
                            self.current_page = 3

                            window.scroll(0, 0);
                            break;
                        case '#4':
                            self.current_page = 4
                            await self.loadFlights();
                            window.scroll(0, 0);
                            break;



                    }
                }


                await this.fetch_hotels();
            }

        })
    </script>
@endsection
