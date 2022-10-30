@extends('master')


@section('content')
    <div id="trippbo_ticket" class="wrap_body index_wrap_body">

        <!-- hero -->
        <div class="fund_hero tickets_lottery_wrap">
            <div class="container-lg pad_lg">
                <div class="child_fund_hero">
                    <!-- left -->
                    <div class="f_hero_child_left">
                        <h1 class="h3 text-white fw_gilroy_medium mb-3">Buy Lottery Ticket</h1>
                        <p class="text-white mb-3">And Enjoy Free Trips</p>
                        {{-- <a href="#" class="btn py-2 btn_pink medium_btn d-inline-block px-4">Create your Trip</a> --}}
                    </div>
                </div>
            </div>
            <!-- right -->
            <div class="f_hero_child_right ticket_lottery_right">
                <img src="img/ticket_lottery.png" alt="">
            </div>
        </div>

        <!-- girds -->
        <div class="container-lg pad_lg">
            <div class="fund_girds">
                <!-- 1 -->
                <div v-for="lottery in lotteries" class="fund_grid l_grid_slide ticket_white_box">
                    <div class="ticket_white_box_top bg-white">
                        <div class="child_ticket_white_box_top" :style="{ background: extractImage(lottery) }">
                            <div class="l_slide_top">
                                <a style="cursor: pointer" onclick="show_share_modal()"
                                    class="slide_top_link slide_top_link2 ms-auto">
                                    <img src="img/l_link_3.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="ticket_white_box_line">
                        <img class="img-fluid" src="img/Line 1.svg" alt="">
                    </div>
                    <div class="ticket_box_bottom">
                        <div class="ticket_box_bottom_1 pt-2 d-flex align-items-center mb-3">
                            <p class="mb-0 text_silver me-4 fs_14 me-auto"><img width="14" class="me-2"
                                    src="img/calendar_silver.svg" alt=""> sadas sad </p>
                            <h3 class="h5 text_dark_blue mb-0 fw_gilroy_medium ms-2">$@{{ lottery.entry_fee }}</h3>
                        </div>
                        <h3 class="h5 text_dark_blue mb-0 fw_gilroy_bold mb-3">@{{ lottery.title }}</h3>
                        <div class="d-flex align-items-center mb-3 ticket_box_bottom_2">
                            <p class="mb-0 text_silver fs_14 me-auto"><i class="fas fa-stopwatch"></i> Valid till 31st Mar,
                                21</p>
                            <div>
                                <a :href="'/ticket-lottery/view/' + lottery.id"
                                    class="btn py-2 btn_pink medium_btn d-block px-2 fs_14 ms-2">Enter Lottery</a>
                                
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
        const fund_my_trip_solo = new Vue({
            el: "#trippbo_ticket",

            data: {
                lotteries: @json($lotteries),



            },
            methods: {
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
                },
                extractImage: function(lottery) {

                    return 'url("img/ticket_box_1.svg")'

                }
            },


        });

        function show_share_modal() {
            document.getElementById('share_popup').classList.add('user_side_form_box_active')
        }
    </script>
@endsection
