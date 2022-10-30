@extends('master')


@section('content')
    <div id="trippbo_ticket_sub" class="wrap_body index_wrap_body">
        <!-- tickets_lottery_details hero -->
        <div class="container-lg pad_lg pt-4 pb-2">
            <div class="lottery_details_hero pt-3">
                <!-- hero left -->
                <div class="lottery_details_hero_left">
                    <div class="lottery_details_hero_left_line"></div>

                    <div class="lottery_details_hero_left_child">
                        {{-- <p class="text_silver d-flex align-items-baseline mb-1"><img class="me-2" width="14" src="/img/calendar_silver.svg" alt=""> Created Date: 01 June 2022 </p> --}}
                        <h2 class="h5 text_dark_blue fw_gilroy_medium mb-2">@{{ lottery.title }}</h2>
                        {{-- <div class="d-flex align-items-center mb-3">
                                <div>
                                    <img width="18" src="/img/user_star_gold.svg" alt="">
                                    <img width="18" src="/img/user_star_gold.svg" alt="">
                                    <img width="18" src="/img/user_star_gold.svg" alt="">
                                    <img width="18" src="/img/user_star_gold.svg" alt="">
                                    <img width="18" src="/img/user_star_silver.svg" alt="">
                                </div>
                                <p class="mb-0 text_silver fs_14 ms-2 mt-1">1,890 Reviews</p>
                            </div> --}}
                        <h5 class="text_dark_blue fw_gilroy_medium mb-4 l_d_h_l_md">$@{{ lottery.entry_fee }}</h5>
                        <p class="mb-0 text_silver mt-auto l_d_h_l_md"><i class="fas fa-stopwatch me-2"></i>Valid till 31st
                            Mar, 21</p>
                    </div>
                </div>
                <!-- hero right -->
                <div class="lottery_details_hero_right">
                    <img src="/img/ticket_lottery_details.jpg" alt="">
                </div>

            </div>
        </div>

        <div class="my_account_content_dashboard pt-3 pb-4">
            <div class="container-lg pad_lg">
                <div
                    class="maccount_dashboard_header txt_blue_secondary fw_gilroy_medium bg-white border_radius_20 my-3 mb-4 p-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                        <div class="mb-3">
                            <h2 class="h4 txt_blue_secondary fw_gilroy_bold mb-0">Ticket Details</h2>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <p class="h4 mb-0 fw_gilroy_bold txt_blue_secondary me-3">$@{{ lottery.entry_fee }}</p>
                            <div class="d-flex flex-column align-items-center justify-content-center " style="position: relative">
                                <a v-if="logged_in" v-on:click="enter_lottery" class="btn medium_btn btn_pink">Enter Lottery
                                    (@{{ user.ticket_lottery_entries }})</a>

                                <a v-if="!logged_in" href="#" class="btn medium_btn btn_pink">Enter Lottery</a>
                                <div v-if="information_displayed" style="position: absolute;top:50px;">
                                    <p >More information on Lottery Entry Tickets <a
                                            href="/faqs" style="color: #fe2f70">here </a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 pt-3">
                        <p class="line_height_18 txt_blue_secondary fw_gilroy_medium">@{{ lottery.description }}</p>
                    </div>

                    <div class="d-flex flex-wrap">
                        <div class="ticket_details_item">
                            <div class="shopping_coupons_accordion p-4 border_radius_13">
                                <div class="d-flex mb-3">
                                    <div class="me-5">
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Hotels</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Valid</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Refer & Earn</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Sign Up</p>
                                    </div>
                                    <div>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Up To 50% OFF
                                        </p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Hotels World
                                            Wide</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Wallet Cash</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Grab Exciting
                                            Deals</p>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <ul class="list-unstyled important_information_ul">
                                        <li class="fw_gilroy_medium txt_silver fs_14 mb-2"> Mid-Month
                                            Sale: Plan a vacation during this holiday season and enjoy
                                            up to 50% OFF on exciting and high-reviewed & preferred
                                            hotels, resorts, and villas across the India & worldwide.
                                        </li>
                                        <li class="fw_gilroy_medium txt_silver fs_14 mb-2"> You can also
                                            book apartments at exotic locations as well.</li>
                                        <li class="fw_gilroy_medium txt_silver fs_14 mb-2"> Also browse
                                            through and redeem booking.com offers available on the page.
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="ticket_details_item">
                            <div class="shopping_coupons_accordion p-4 border_radius_13">
                                <div class="d-flex mb-3">
                                    <div class="me-5">
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Hotels</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Valid</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Refer & Earn</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Sign Up</p>
                                    </div>
                                    <div>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Up To 50% OFF
                                        </p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Hotels World
                                            Wide</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Wallet Cash</p>
                                        <p class="line_height_18 mb-0 txt_silver fs_14">Grab Exciting
                                            Deals</p>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <ul class="list-unstyled important_information_ul">
                                        <li class="fw_gilroy_medium txt_silver fs_14 mb-2"> Mid-Month
                                            Sale: Plan a vacation during this holiday season and enjoy
                                            up to 50% OFF on exciting and high-reviewed & preferred
                                            hotels, resorts, and villas across the India & worldwide.
                                        </li>
                                        <li class="fw_gilroy_medium txt_silver fs_14 mb-2"> You can also
                                            book apartments at exotic locations as well.</li>
                                        <li class="fw_gilroy_medium txt_silver fs_14 mb-2"> Also browse
                                            through and redeem booking.com offers available on the page.
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
@endsection


@section('scripts-links')
    <script>
        const fund_my_trip_solo = new Vue({
            el: "#trippbo_ticket_sub",

            data: {

                lottery: @json($lottery),
                logged_in: @json($logged_in),
                user: @json($user),
                information_displayed: false,


            },
            methods: {
                enter_lottery() {
                    if (this.user.ticket_lottery_entries < 1) {
                        this.information_displayed = true;
                    }
                }
            },


        });

        function show_share_modal() {
            document.getElementById('share_popup').classList.add('user_side_form_box_active')
        }
    </script>
@endsection
