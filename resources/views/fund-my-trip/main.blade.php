    @extends('master')

    @section('css-links')
        <title>Fund my trip</title>

        <style>
            .hide_panel {
                display: none;
            }

            .select_gray {
                width: 100%;
                font-family: 'gilroy_regular' !important;
            }

            .input_create_center {
                display: flex;
                align-items: center;
                height: 42px;
            }

            .child_l_grid_slide {
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }
        </style>
    @endsection



    @section('content')
        <div id="create_trip_app" style="position: relative">
            <sign-in-modal ref="sign_in_modal"></sign-in-modal>
            <!-- require to sign in -->

            <div id="" v-on:click.stop="close_panels" :class="{ hide_panel: !panelVisible && !joinFormVisible }"
                style="    position: absolute;
            width: 100vw;
            height: 100%;">
                <fund-my-trip-create-trip :class="{ hide_panel: !panelVisible }" @shown='create_trip_popup_shown'
                    @hidden='create_trip_popup_hidden' v-on:click.stop="" ref="create_trip">
                </fund-my-trip-create-trip>

                <fund-my-trip-request-to-join-form :trip_id="current_trip_id" v-on:click.stop="" ref="join_form">
                </fund-my-trip-request-to-join-form>
            </div>

            <div class="wrap_body index_wrap_body">

                <!-- hero -->
                <div class="fund_hero">
                    <div class="container-lg pad_lg">
                        <div class="child_fund_hero">
                            <!-- left -->
                            <div class="f_hero_child_left">
                                <h1 class="h3 text-white fw_gilroy_medium mb-3">Fund My Trip</h1>
                                <p class="text-white mb-3">To get the best of your adventure you just need to leave and go
                                    where you like. We are waiting for you. </p>
                                <a v-if="!isGuest" onclick="show_create_trip_popup()"
                                    class="btn py-2 btn_pink medium_btn d-inline-block px-4">Create a Trip</a>
                                <a v-if="isGuest" v-on:click="show_sign_in_required_panel"
                                    class="btn py-2 btn_pink medium_btn d-inline-block px-4">Create a Trip</a>
                            </div>
                        </div>
                    </div>
                    <!-- right -->
                    <div class="f_hero_child_right">
                        <img id="f_hero_img_xl" src="img/fund_hero_right_xl.svg" alt="">
                        <img id="f_hero_img" src="img/fund_hero_right.svg" alt="">
                    </div>
                </div>

                <!-- girds -->
                <div class="container-lg pad_lg">
                    <div class="fund_girds">
                        <!-- 1 -->


                        <div v-for="trip in trips.data" class="fund_grid l_grid_slide">
                            <div class="child_l_grid_slide" :style="{ backgroundImage: extractTripImage(trip) }">
                                <div class="l_slide_top">
                                    {{-- <a href="#" class="slide_top_link me-2">
                                            <img src="img/l_link_1.svg" alt="">
                                        </a>
                                        <a href="#" class="slide_top_link">
                                            <img src="img/l_link_2.svg" alt="">
                                        </a> --}}
                                    <a style="cursor: pointer" onclick="show_share_modal()"
                                        class="slide_top_link slide_top_link2 ms-auto">
                                        <img src="img/l_link_3.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="l_slide_bottom">
                                <div class="row landing_slide_row_1">
                                    <div class="col-12 d-flex mb-2 flex-column">
                                        <a href="#" class="l_slide_link h6 text_dark_blue fw_gilroy_bold">
                                            @{{ trip.title }}
                                        </a>
                                        <div class="l_slide_link h6 text_dark_blue fw_gilroy_bold" style="font-size: 14px">

                                            By <a :href="'/profile/view/' + trip.user_id"
                                                style="font-weight: normal; color:#fe2f70 ">
                                                @{{ trip.user.name }}</a>
                                        </div>
                                        {{-- <a href="#"
                                                class="l_slide_link h6 text_dark_blue fw_gilroy_bold ms-auto">$550</a> --}}
                                    </div>
                                    <div class="col-12 d-flex align-items-center">
                                        <p class="text_silver fs_14 mb-0"><img class="me-1" width="30"
                                                :src="trip.destination_city.country.flag.image"
                                                alt="">@{{ trip.destination_city.country.name }}</p>
                                        <p class="ms-auto text_silver fs_14 mb-0"><img class="me-1" width="24"
                                                src="img/2members.svg" alt="">
                                            @{{ trip.type_of_trip == 'host' ? 'Looking for guests' : 'Looking for a host' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="landing_slide_row_2 d-flex align-items-center">
                                    <p class="fs_14 text-center text_silver fw_gilroy_medium mb-0 d-flex align-items"><img
                                            class="me-1" width="14" src="img/small_calendar.svg" alt="">
                                        {{-- @if ($trip->duration == '1')
                                                For 1 Week
                                            @elseif($trip->duration == '2')
                                                For 2 Weeks
                                            @elseif($trip->duration == '3')
                                                For 3 Weeks
                                            @elseif($trip->duration == '4')
                                                For a month
                                            @elseif($trip->duration == '5')
                                                Short Vacation
                                            @elseif($trip->duration == '6')
                                                Long Vacation
                                            @endif --}}

                                    </p>
                                    <a style="cursor: pointer"
                                        class="btn py-1 btn_pink medium_btn px-3 d-inline-block ms-auto text-capitalize"
                                        :href="'/trips/trip/' + trip.id"> View </a>



                                    {{-- <a style="cursor: pointer"
                                                class="btn py-1 btn_pink medium_btn px-3 d-inline-block ms-auto text-capitalize"
                                                @if (Auth::check() && $trip->user_id === Auth::id()) href="{{ route('trip-browse', $trip->id) }}"
                                        @elseif(Auth::check() && $trip->isMemeber(Auth::id()))
                                        href="{{ route('trip-browse', $trip->id) }}"
                                        @elseif(Auth::check())
                                        onclick="show_join_form({{ $trip->id }})"
                                        @else
                                        href="{{ route('trip-browse', $trip->id) }}" @endif>
                                                @if (Auth::check() && $trip->user_id === Auth::id())
                                                    View
                                                @elseif(Auth::check() && $trip->isMemeber(Auth::id()))
                                                    Joined
                                                @elseif(Auth::check())
                                                    Join
                                                @else
                                                    View
                                                @endif




                                            </a> --}}
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
            // let site_label = document.querySelectorAll(".site_label");
            // for(let i = 0;i < site_label.length;i++){
            //     site_label[i].addEventListener("click", (e) => {
            //         if(site_label[i].checked = true){
            //             site_label[i].checked = false;
            //         }
            //         e.target.parentElement.querySelector("label").click();
            //     });
            // }
        </script>



        <script>
            function show_create_trip_popup() {
                document.getElementById('popup_create_trip').classList.add('require_sign_in_active')
                document.getElementById('create_trip_app').classList.remove('hide_panel')
                fund_my_trip_app.panelVisible = true;

            }

            function hide_create_trip_popup() {
                document.getElementById('popup_create_trip').classList.remove('require_sign_in_active')
                document.getElementById('create_trip_app').classList.add('hide_panel')
                fund_my_trip_app.panelVisible = false;
                fund_my_trip_app.hide_join_form();
            }

            function show_share_modal() {
                document.getElementById('share_popup').classList.add('user_side_form_box_active')
            }

            function show_join_form(trip_id) {
                fund_my_trip_app.show_join_form(trip_id);

            }

            const fund_my_trip_app = new Vue({
                el: "#create_trip_app",
                vuetify: new Vuetify(),
                data: {
                    isGuest: @json(!Auth::check()),
                    panelVisible: false,
                    joinFormVisible: false,
                    current_trip_id: null,
                    trips: @json($trips),

                },

                methods: {
                    show_sign_in_required_panel: function()
                    {
                        this.$refs.sign_in_modal.showPanel();
                    },
                    extractTripImage(trip) {
                        if (trip.trip_img !== null) {
                            let url = '/storage/' + trip.trip_img

                            return `url("${url}")`
                        }


                        return `url("/img/l_grid_1.svg")`
                    },


                    create_trip_popup_shown: function(status) {
                        this.panelVisible = true;
                    },
                    create_trip_popup_hidden: function(status) {
                        this.panelVisible = false;

                    },

                    show_join_form: function(trip_id) {
                        this.$refs.join_form.show_form();
                        this.joinFormVisible = true;
                        this.current_trip_id = trip_id
                    },
                    hide_join_form: function(trip_id) {
                        this.$refs.join_form.hide_form();
                        this.joinFormVisible = false;
                    },
                    close_panels: function() {
                        this.hide_join_form();
                        this.create_trip_popup_hidden('');
                    }
                    /* ,

                    hide_all: function()
                    {
                        this.$refs.join_form.hide_form();
                        this.joinFormVisible = false;
                        this.panelVisible = false;
                    } */

                }


            })
        </script>
    @endsection
