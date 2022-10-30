@extends('master')
@section('css-links')
    <script src="https://js.stripe.com/v3"></script>

    <style>
        .button_disabled,
        .button_disabled:hover {
            cursor: default;
            background: #989898;
            border-color: #989898;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div id="hotel_checkout_app" class="wrap_body review_wrap_body">

        <!-- wrap_white_grids -->
        <div class="container-lg pad_lg pt-md-5 pt-4">
            <form class="wrap_white_grids pb-4">
                <!-- child-white-grids-left -->
                <div class="child_white_grids_left">
                    <!-- 1 -->
                    <div class="c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                        <div class="accordion acc_after_border" id="acc_7">
                            <div class="accordion-item">
                                <h4 class="mb-0" id="heading_7">
                                    <button
                                        class="review_accordion_button accordion-button fw_gilroy_medium text_dark_blue fs_16"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse_7"
                                        aria-expanded="true" aria-controls="collapse_7">
                                        @{{ hotel.HotelName }}
                                    </button>
                                </h4>
                                <div id="collapse_7" class="accordion-collapse collapse show" aria-labelledby="heading_7">
                                    <div class="accordion-body fw_gilroy_bold text_dark_blue pt-0 pb-0 px-0">
                                        <div class="d-flex align-items-center flex-wrap mb-2">
                                            <div class="custom_illustration_wrapper mb-2 me-2">
                                                <div class="image_wrapper_illustration">
                                                    <img src="/img/eye_icon_illustration.svg" alt="">
                                                </div>
                                                <div class="custom_circle_wrapper">
                                                    <img src="/img/round_circle_icon_fill.svg" alt="">
                                                    <img src="/img/round_circle_icon_fill.svg" alt="">
                                                    <img src="/img/round_circle_icon_fill.svg" alt="">
                                                    <img src="/img/round_circle_icon_fill.svg" alt="">
                                                    <img src="/img/round_circle_outline.svg" alt="">
                                                </div>
                                            </div>
                                            <div class="after_custom_illustration">
                                                <a href="#"
                                                    class="text_silver text-decoration-none mb-0 fw_gilroy_medium fs_14">1,890
                                                    Reviews</a>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="txt_blue_secondary fw_gilroy_medium fs_14">2 & 3B, Near Chinmayanand
                                                Ashram, Mumbai, 400 087</p>
                                        </div>

                                        <div
                                            class="accr_details_features_grids accr_grids_wrapper_1 acc_after_border review__times">
                                            <div class="accr_features_grid_wrapper">
                                                <div class="accr_features_grid_item">
                                                    <img src="/img/stopwatch_icon_blue.svg" alt="">
                                                    <p class="mb-0 txt_blue_secondary fw_gilroy_medium fs_14">Check In</p>
                                                </div>
                                                <div class="text_silver fw_gilroy_medium fs_14">@{{ data.check_in_date }},
                                                    @{{ hotel.CheckInTime }}</div>
                                            </div>

                                            <div class="accr_features_grid_wrapper">
                                                <div class="accr_features_grid_item">
                                                    <img src="/img/stopwatch_icon_blue.svg" alt="">
                                                    <p class="mb-0 txt_blue_secondary fw_gilroy_medium fs_14">Check Out</p>
                                                </div>
                                                <div class="text_silver fw_gilroy_medium fs_14">@{{ data.check_out_date }},
                                                    @{{ hotel.CheckOutTime }}</div>
                                            </div>

                                            <div class="accr_features_grid_wrapper">
                                                <div class="accr_features_grid_item">
                                                    <img src="/img/night_icon.svg" alt="">
                                                    <p class="mb-0 txt_blue_secondary fw_gilroy_medium fs_14">No. Nights</p>
                                                </div>
                                                <div class="text_silver fw_gilroy_medium fs_14">@{{ number_of_nights }}
                                                    Night(s)</div>
                                            </div>
                                        </div>

                                        <div
                                            class="accr_details_features_grids accr_grids_wrapper_2 acc_after_border pt-4 pb-2">
                                            <h4 class="fw_gilroy_bold mb-4 w-100 h6">Room Details</h4>
                                            <div class="accr_features_grid_wrapper">
                                                <div class="accr_features_grid_item">
                                                    <img src="/img/room_type_icon.svg" alt="">
                                                    <p class="mb-0 txt_blue_secondary fw_gilroy_medium fs_14">Room Type</p>
                                                </div>
                                                <div class="text_silver fw_gilroy_medium fs_14">@{{ selected_room.Rooms[0].RoomName }}</div>
                                            </div>
                                            <div class="accr_features_grid_wrapper">
                                                <div class="accr_features_grid_item">
                                                    <img src="/img/room_type_icon.svg" alt="">
                                                    <p class="mb-0 txt_blue_secondary fw_gilroy_medium fs_14">No. of Room
                                                    </p>
                                                </div>
                                                <div class="text_silver fw_gilroy_medium fs_14"> @{{ selected_room.Rooms.length }} x
                                                    @{{ selected_room.Rooms[0].RoomName }}</div>
                                            </div>
                                            <div class="accr_features_grid_wrapper">
                                                <div class="accr_features_grid_item">
                                                    <img src="/img/guest_icon.svg" alt="">
                                                    <p class="mb-0 txt_blue_secondary fw_gilroy_medium fs_14">Guest</p>
                                                </div>
                                                <div class="text_silver fw_gilroy_medium fs_14">@{{ passengers_breakup() }}</div>
                                            </div>

                                            <div class="w-100 pt-md-4">
                                                <p class="h6">Inclusions</p>
                                                <ul class="p-0 list-unstyled text_silver mb-0">
                                                    <li v-for="inclusion in selected_room.Inclusions" class="mb-1 fs_14">
                                                        <span class="me-2"><img src="/img/silver_tick_icon.svg"
                                                                alt=""></span>
                                                        @{{ inclusion }}
                                                    </li>
                                                    {{-- <li class="mb-1 fs_14"><span class="me-2"><img
                                                                src="/img/silver_tick_icon.svg" alt=""></span> Free
                                                        self parking</li>
                                                    <li class="mb-1 fs_14"><span class="me-2"><img
                                                                src="/img/silver_tick_icon.svg" alt=""></span> Free
                                                        valet parking</li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="py-3 c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
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
                                        <h5 class="w-100 fw_gilroy_bold h6">I'm booking for</h5>
                                        <div class="w-100 radio__box radio__box_blue mt-4">
                                            <div class="me-4">
                                                <input id="radio__input" checked type="radio" name="radio__input"
                                                    value="Myself">
                                                <label for="radio__input"
                                                    class="fw_gilroy_bold text-capitalize text_dark_blue fs_14">Myself</label>
                                            </div>
                                            <div class="me-4">
                                                <input id="radio__input2" type="radio" name="radio__input"
                                                    value="Someone Else">
                                                <label for="radio__input2"
                                                    class="fw_gilroy_bold text-capitalize text_dark_blue fs_14">Someone
                                                    Else</label>
                                            </div>
                                        </div>
                                        {{-- <p class="mt-4 mb-4 text_silver fw_gilroy_medium fs_14">Already a member <a
                                                class="text_dark_blue_a text-decoration-none" href="#">login</a> to
                                            book with your saved details or <a
                                                class="text_dark_blue_a text-decoration-none" href="#">Sign up
                                            </a>now to earn 2x Bonus miles</p> --}}
                                        <div class="room__form">
                                            {{-- <h5 class="text_dark_blue h6">Room 1</h5> --}}
                                            <div v-for="pax in lead_paxes">
                                                <!-- row 1 -->
                                                <div>
                                                    <p class="mb-0 fw_gilroy_bold mt-3 fs_14">Room @{{pax.room_index}}</p>
                                                    <p class="mb-0 fw_gilroy_bold mt-3 fs_14">Full Name</p>
                                                </div>
                                                <div class="review_row mt-3 mb-4">



                                                    <div
                                                        class="input__gray select_box region_p select_review b_radius_input h6 text_dark_blue fw_gilroy_bold me-3">
                                                        <select v-model="pax.lead_pax_title" class="child_select_box">
                                                            <option value="Mr" selected="">Mr</option>
                                                            <option value="Miss">Miss</option>
                                                        </select>
                                                    </div>
                                                    <div class="wrap_input_review me-3">
                                                        <input v-model="pax.lead_pax_first_name" type="text" required
                                                            class="form-control input__gray input_review fs_14"
                                                            placeholder="First Name & Middle Name(if any)">
                                                    </div>
                                                    <div class="wrap_input_review">
                                                        <input v-model="pax.lead_pax_last_name" type="text" required
                                                            class="form-control input__gray input_review fs_14"
                                                            placeholder="Last Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- row 2 -->
                                            <div class="review_row mt-3 mb-3">
                                                <div class="wrap_input_review me-3">
                                                    <div class="w-100 mb-2">
                                                        <label for="m_number" class="fs_14">Mobile Number</label>
                                                    </div>
                                                    <div class="w-100 d-flex align-items-center">
                                                        <phone-number @phone_number_updated="update_phone_number"
                                                            :current_phone_number="''">
                                                        </phone-number>
                                                    </div>
                                                </div>
                                                <div class="wrap_input_review">
                                                    <div class="w-100 mb-2">
                                                        <label for="e_mail" class="fs_14">Email Address</label>
                                                    </div>
                                                    <input v-model="lead_pax_email" type="email" required
                                                        class="form-control input__gray input_review fs_14" id="e_mail"
                                                        placeholder="Valid Email Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 3 -->
                    {{-- <div class="py-3 c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                        <div class="accordion acc_after_border" id="acc_8">
                            <div class="accordion-item">
                                <h4 class="mb-0" id="heading_9">
                                    <button
                                        class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse_9"
                                        aria-expanded="true" aria-controls="collapse_9">
                                        Add GST No (Optional)
                                    </button>
                                </h4>
                                <div id="collapse_9" class="accordion-collapse collapse show"
                                    aria-labelledby="heading_9">
                                    <div
                                        class="accordion-body fw_gilroy_bold text_dark_blue pt-0 pb-0 px-0 acc_body_review">
                                        <p class="text_silver fw_gilroy_medium fs_14">To claim credit of GST charged,
                                            please enter your company's GST number</p>
                                        <div class="row">
                                            <div class="col-md-7 mb-3">
                                                <div class="w-100 mb-2">
                                                    <label for="e_mail" class="fs_14">GSTIN</label>
                                                </div>
                                                <input type="text" required=""
                                                    class="fs_14 form-control input__gray input_review" id="GSTIN"
                                                    placeholder="Enter GST Identification Number">
                                            </div>
                                            <div class="col-md-7 mb-3">
                                                <div class="w-100 mb-2">
                                                    <label for="e_mail" class="fs_14">Company Name</label>
                                                </div>
                                                <input type="text" required=""
                                                    class="fs_14 form-control input__gray input_review" id="c_name"
                                                    placeholder="Enter Company Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- 4 -->
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
                                                <textarea v-model="user_message" class="form-control input__gray input_review fs_14" id="special_request"
                                                    rows="4" placeholder="This amount is not refundable in case of cancellation"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- child-white-grids-right -->
                <div class="child_white_grids_right">
                    <div class="sidebar_trip_selection_wrapper">
                        <div>
                            <form class="wrap_white_grids">
                                <!-- child-white-grids-left -->
                                <div>
                                    <!-- 2 -->
                                    <div
                                        class="c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                                        <div class="accordion" id="acc_payment">
                                            <div class="accordion-item">
                                                <h4 class="mb-0" id="headingPayment">
                                                    <button
                                                        class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_16"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapsePayment" aria-expanded="true"
                                                        aria-controls="collapsePayment">
                                                        Offers & Payment Options
                                                    </button>
                                                </h4>
                                                <div id="collapsePayment" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingPayment">
                                                    <div class="accordion-body fw_gilroy_bold text_dark_blue pt-0 pb-0">
                                                        <div class="acc_after_border_right">
                                                            <div class="w-100">
                                                                <label for="discount_input"
                                                                    class="form-label fw_gilroy_medium text-capitalize text_silver fs_14">Pair
                                                                    your payment preference with exciting offers</label>
                                                            </div>
                                                            <div class="row_discount mt-1">
                                                                <!-- row discount left -->
                                                                <div class="row_discount_left">
                                                                    <input type="text"
                                                                        class="form-control input__gray fs_14"
                                                                        id="discount_input">
                                                                </div>
                                                                <!-- row discount right -->
                                                                <div class="row_discount_right">
                                                                    <button class="fs_14">Apply</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="acc_after_border acc_after_border_right_1 pb-4">
                                                            <p class="h4 txt_blue_secondary fw_gilroy_bold mb-3 h6">Payment
                                                                Summary</p>

                                                            <div
                                                                class="sidebar_bottom_list d-flex justify-content-between mb-2">
                                                                <p class="mb-0 text_dark_blue w-75 fw_gilroy_medium fs_14">
                                                                    @{{ selected_room.Rooms.length }} x @{{ selected_room.Rooms[0].RoomName }} x
                                                                    @{{ number_of_nights }}
                                                                    Night(s)</p>
                                                                <p class="mb-0 text_dark_blue fw_gilroy_medium fs_14">
                                                                    @{{ hotel.BookCurrency }}
                                                                    @{{ format_price(selected_room.ServicePrice) }}</p>
                                                            </div>

                                                            <div class="pt-3">
                                                                <div class="accordion" id="acc_inner_price">
                                                                    <div class="d-flex justify-content-between">
                                                                        <p class="mb-0" id="headingInnerPayment">
                                                                            <button
                                                                                class="review_accordion_button p-0 me-2 fs_16 accordion-button fw_gilroy_medium text_dark_blue"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#collapseInnerPayment"
                                                                                aria-expanded="true"
                                                                                aria-controls="collapseInnerPayment">
                                                                                Offers & Payment Options
                                                                            </button>
                                                                        </p>
                                                                        <p class="mb-0 fw_gilroy_medium fs_14">$ 2,565</p>
                                                                    </div>
                                                                    <div id="collapseInnerPayment"
                                                                        class="accordion-collapse collapse show"
                                                                        aria-labelledby="headingInnerPayment">
                                                                        <div class="accordion-body">
                                                                            <div
                                                                                class="d-flex justify-content-between text_silver fw_gilroy_medium">
                                                                                <p class="mb-0 w-75 fs_14">Tax Recovery
                                                                                    Charges & Service Fees</p>
                                                                                <p class="mb-0 fs_14">$ 2,430</p>
                                                                            </div>

                                                                            <div
                                                                                class="d-flex justify-content-between text_silver fw_gilroy_medium">
                                                                                <p class="w-75 fs_14">Member Value Pack
                                                                                    Fees (Incl. 18% GST)</p>
                                                                                <p class="fs_14">$ 135</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex justify-content-between py-2">
                                                                    <p class="h6">Payable Amount</p>
                                                                    <p class="h6">@{{ hotel.BookCurrency }}
                                                                        @{{ format_price(selected_room.ServicePrice) }}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="acc_after_border pt-4">
                                                            <h4 class="fs_14">Choose payment method</h4>



                                                            <div class="row mt-4 p-2">
                                                                <div id="paymentContainer">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 4 -->
                                    <div class="append_on_desktop pt-3">
                                        <div class="mb-2">
                                            <h5 class="fw_gilroy_bold h6">Cancellation Policy</h5>
                                            <p v-if="price_breakup.PriceBreakUp.CancellationText" class="txt_pink fs_14">
                                                @{{ price_breakup.PriceBreakUp.CancellationText }}</p>
                                            <ul v-if="price_breakup.PriceBreakUp.CancellationRules.length > 0"
                                                class="pay_list_wrapper important_information_ul p-0 mb-0">
                                                <li v-for="policy in price_breakup.PriceBreakUp.CancellationRules"
                                                    class="fw_gilroy_medium mb-1 text_silver fs-14"><span
                                                        class="silver_before_circle"></span>From @{{ policy.DateFrom }} To
                                                    @{{ policy.DateTo }} , @{{ price_breakup.PriceBreakUp.Currency }}
                                                    @{{ format_price(policy.DeductionAmt) }} </li>

                                            </ul>
                                        </div>
                                        <div class="py-3">
                                            <h5 class="trip_box_heading mb-3 h6">Important information</h5>
                                            <ul class="pay_list_wrapper important_information_ul p-0 mb-0">
                                                <li class="fw_gilroy_medium mb-1 text_silver fs-14"><span
                                                        class="silver_before_circle"></span> Extra-person charges may apply
                                                    and vary depending on property policy</li>
                                                <li class="fw_gilroy_medium mb-1 text_silver fs-14"><span
                                                        class="silver_before_circle"></span> Government-issued photo
                                                    identification and a credit card, debit card, or cash deposit may be
                                                    required at check-in for incidental charges</li>
                                                <li class="fw_gilroy_medium mb-1 text_silver fs-14"><span
                                                        class="silver_before_circle"></span> Special requests are subject
                                                    to availability upon check-in and may incur additional charges; special
                                                    requests cannot be guaranteed</li>
                                                <li class="fw_gilroy_medium mb-1 text_silver fs-14"><span
                                                        class="silver_before_circle"></span> The name on the credit card
                                                    used at check-in to pay for incidentals must be the primary name on the
                                                    guestroom reservation</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div
                                        class="wrap_p_details_bottom_row wrap_p_details_bottom_row_2 mb-4 mt-1 review_right_checkbox">
                                        <label class="mt-2">
                                            <input v-model="agreed_to_terms" id="send_travel_input" type="checkbox">
                                            <span class="checkmark d-inline-block mt-2"></span>
                                        </label>
                                        <p id="send_travel" class="mb-0 ms-5 fw_gilroy_medium text_dark_blue fs_14">By
                                            clicking this button, you acknowledge that you have read and agreed to the <a
                                                class="txt_link_dark_blue text-decoration-none text_dark_blue fw_gilroy_bold"
                                                href="#">Terms & Conditions</a> and Privacy Policy of Trippbo</p>
                                    </div>
                                    <!-- continue -->
                                    <button v-on:click.prevent="pay_order" class="mb-3 continue_submit_btn fs_14"
                                        :class="{ 'button_disabled': !agreed_to_terms }">Pay</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection


@section('scripts-links')
    <script>
        // checkboxes
        /*      let checkbox = document.querySelectorAll(".payment_checkbox");
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


             */

        // send_travel
        let send_travel = document.querySelector("#send_travel");
        let send_travel_input = document.querySelector("#send_travel_input");
        send_travel.addEventListener("click", () => {
            if (send_travel_input.checked) {
                send_travel_input.checked = false;
            } else {
                send_travel_input.checked = true;
            }
        })


        window.stripe = Stripe('{{ config('services.stripe.key') }}');



        const hotel_checkout = new Vue({
            el: "#hotel_checkout_app",
            data: {
                hotel: @json($hotel),
                data: @json($data),
                price_breakup: @json($price_breakup),
                selected_room: null,
                number_of_nights: null,
                checkout_initialized: false,
                lead_paxes: [],


                lead_pax_email: '',
                lead_pax_phone_nr: '',

                user_message: '',
                agreed_to_terms: false,
                payment_element: null,
            },
            mounted: async function() {
                this.number_of_nights = moment(this.data.check_out_date).diff(moment(this.data.check_in_date),
                    'days');
                this.selected_room = this.hotel.HotelServices.filter(h => {
                    return this.data.ServiceIdentifer == h.ServiceIdentifer
                })[0]

                let temp = JSON.parse(this.data.rooms)
                let num_of_rooms = temp.length;
                for (let i = 0; i < num_of_rooms; i++) {
                    this.lead_paxes.push({
                        room_index: i + 1,
                        lead_pax_first_name: '',
                        lead_pax_last_name: '',
                        lead_pax_title: 'Mr'
                    })
                }

                await this.prepareCheckout();
            },
            methods: {
                format_price: function(price) {
                    return Math.ceil(price);
                },
                passengers_breakup: function() {
                    let adults = 0;
                    let children = 0;

                    let rooms = JSON.parse(this.data.rooms);

                    for (let c = 0; c < rooms.length; c++) {
                        for (let p = 0; p < rooms[c]['passengers'].length; p++) {
                            if (rooms[c]['passengers'][p]['passenger_type_id'] == 1) {
                                adults += 1;
                            } else if (rooms[c]['passengers'][p]['passenger_type_id'] == 2) {
                                children += 1;
                            }
                        }
                    }
                    if (children == 0) {
                        return `${adults} Adults`
                    } else {
                        return `${adults} Adults, ${children} Child`
                    }


                },
                prepareCheckout: async function() {
                    let f = new FormData();
                    f.append('data', JSON.stringify(this.data));
                    let resp = await axios.post('/hotel/prepare_payment', f);
                    let client_secret = resp.data
                    const options = {
                        clientSecret: client_secret,
                    };
                    const elements = stripe.elements(options);


                    const paymentElement = elements.create("payment");
                    paymentElement.mount("#paymentContainer");
                    this.payment_element = elements

                },
                update_phone_number: function(data) {
                    this.lead_pax_phone_nr = data;
                },
                async pay_order() {
                    this.data.price = Math.ceil(this.selected_room.ServicePrice)
                    this.data.RoomName = this.selected_room.Rooms[0].RoomName
                    this.data.lead_paxes = this.lead_paxes;
                    this.data.contact_information = {
                        email: this.lead_pax_email,
                        phone_nr: this.lead_pax_phone_nr
                    }

                    let resp = await axios.post("/hotel/book", {
                        data: JSON.stringify(this.data)
                    });

                    /*    const {
                           error
                       } = await stripe.confirmPayment({
                           elements: this.payment_element,
                           confirmParams: {
                               return_url: 'https://my-site.com/order/123/complete',
                           },

                       });

                       if (error) {

                       }


                        */
                }
            }
        })
    </script>
@endsection
