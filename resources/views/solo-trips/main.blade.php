@extends('master')

@section('css-links')
    <title>Fund My Trip Solo</title>
@endsection



@section('content')
    <div id="fund_my_trip_solo_app" style="position: relative">
        <sign-in-modal ref="sign_in_modal"></sign-in-modal>

        <solo-trip-create-trip @hide_popup="solo_create_visible = false" :popup_visible="solo_create_visible">
        </solo-trip-create-trip>


        <div class="wrap_body index_wrap_body">

            <!-- hero -->
            <div class="fund_hero">
                <div class="container-lg pad_lg">
                    <div class="child_fund_hero">
                        <!-- left -->
                        <div class="f_hero_child_left">
                            <h1 class="h3 text-white fw_gilroy_medium mb-3">Fund My Trip</h1>
                            <p class="text-white mb-3">To get the best of your adventure you just need to leave and go where
                                you like. We are waiting for you. </p>
                            <a v-if="!isGuest" v-on:click="solo_create_visible = true"
                                class="btn py-2 btn_pink medium_btn d-inline-block px-4">Create a new fund-raising</a>
                            <a v-if="isGuest" v-on:click="show_sign_in_required_panel"
                                class="btn py-2 btn_pink medium_btn d-inline-block px-4">Create a new fund-raising</a>
                        </div>
                    </div>
                </div>
                <!-- right -->
                <div class="f_hero_child_right">
                    <img id="f_hero_img_xl" src="/img/fund_hero_right_xl.svg" alt="">
                    <img id="f_hero_img" src="/img/fund_hero_right.svg" alt="">
                </div>
            </div>

            <!-- girds -->
            <div class="container-lg pad_lg">
                <div class="fund_girds">
                    <!-- 1 -->
                    <div v-for="trip in trips.data" class="fund_grid l_grid_slide">
                        <div class="child_l_grid_slide" :style="{ background: extractTripImage(trip) }">
                            <div class="l_slide_top">
                                {{-- <a href="#" class="slide_top_link me-2">
                                    <img src="/img/l_link_1.svg" alt="">
                                </a>
                                <a href="#" class="slide_top_link">
                                    <img src="/img/l_link_2.svg" alt="">
                                </a> --}}
                                <a style="cursor: pointer" onclick="show_share_modal()"
                                    class="slide_top_link slide_top_link2 ms-auto">
                                    <img src="img/l_link_3.svg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="l_slide_bottom">
                            <div class="row landing_slide_row_1">
                                <div class="col-12 d-flex mb-2">
                                    <a :href="'/solo/view/' + trip.id"
                                        class="l_slide_link h6 text_dark_blue fw_gilroy_bold">@{{ trip.title }}
                                    </a>

                                </div>
                                <div class="l_slide_link h6 text_dark_blue fw_gilroy_bold" style="font-size: 14px">

                                    By <span style="font-weight: normal; color:#fe2f70 ">
                                        <a style="color:#fe2f70" :href="'/profile/view/' + trip.user_id">
                                            @{{ trip.user.name }}</a>
                                    </span>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <p class="text_silver fs_14 mb-0"><img class="me-1" width="30"
                                            :src="trip.destination_city.country.flag.image" alt="">
                                        @{{ trip.destination_city.country.name }}</p>
                                    <a href="#"
                                        class="btn py-2 px-4 btn_pink medium_btn d-inline-block ms-auto">@{{ trip.goal }}</a>
                                </div>
                            </div>
                            <div class="landing_slide_row_2 d-flex mb-1">
                                <p class="fs_14 text-center text_silver fw_gilroy_medium mb-0 ms-auto me-4"><img
                                        class="me-2" width="14" src="/img/small_calendar.svg"
                                        alt="">@{{ calculate_days_left(trip) }}
                                    Days Left</p>
                                <p class="fs_14 text-center text_silver fw_gilroy_medium mb-0 me-auto"><img class="me-2"
                                        width="14" src="/img/request_money.svg" alt="">@{{ calculate_amount_funded(trip.goal, trip.donations) }}%
                                    Funded</p>
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
        if (document.getElementsByClassName('child_select_box').length > 0) {
            let select_box = document.querySelectorAll(".child_select_box");
            for (let i = 0; i < select_box.length; i++) {
                NiceSelect.bind(select_box[i]);
            }
        }

        /*    // autocomplete function in app.js file
           autocomplete(document.getElementById("input__gray_location"), countries);


           let popup_create_trip = document.querySelector("#popup_create_trip");
           let popup_create_trip_box = document.querySelector("#popup_create_trip_box");

           if (popup_create_trip_box) {
               popup_create_trip_box.addEventListener("click", (e) => {
                   e.stopPropagation();
                   popup_create_trip.classList.add("require_sign_in_active");
               });
           }

           if (popup_create_trip) {
               popup_create_trip.addEventListener("click", (e) => {
                   popup_create_trip.classList.remove("require_sign_in_active");

               });
           } */

        // let site_label = document.querySelectorAll(".site_label");
        // for(let i = 0;i < site_label.length;i++){
        //     site_label[i].addEventListener("click", (e) => {
        //         if(site_label[i].checked = true){
        //             site_label[i].checked = false;
        //         }
        //         e.target.parentElement.querySelector("label").click();
        //     });
        // }
        const fund_my_trip_solo = new Vue({
            el: "#fund_my_trip_solo_app",

            data: {
                trips: @json($trips),
                destination: "",
                solo_create_visible: false,
                isGuest: @json(!Auth::check()),

            },
            methods: {
                show_sign_in_required_panel: function() {
                    this.$refs.sign_in_modal.showPanel();
                },
                selectDestination(result) {
                    $("#trip_destination").val(result.country_name + ', ' + result.city_name)
                },
                calculate_amount_funded(goal, donations) {
                    let percentage = donations / goal * 100
                    return percentage
                },
                calculate_days_left(trip) {
                    let days = trip.durationInDays

                    let start_date = moment(trip.created_at)
                    let now = moment();

                    start_date.add(days, 'days');
                    let final = start_date.diff(now, 'days');
                    return final

                },
                extractTripImage(trip) {
                    if (trip.picture_url !== null) {
                        let url = '/storage/' + trip.picture_url

                        return `url("${url}")`
                    }


                    return `url("/img/l_grid_1.svg")`
                }
            },


        });
    </script>

    <script>
        function show_share_modal() {
            document.getElementById('share_popup').classList.add('user_side_form_box_active')
        }
    </script>
@endsection
