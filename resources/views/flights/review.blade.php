    @extends('master')
    @section('css-links')
        <style>
            .fade-enter-active {
                transition: opacity 1s;

            }

            .fade-enter {
                opacity: 0;
            }

            .fade-leave-to {

                display: none;
            }


            .fade-leave-active {
                display: none;
            }

            .invalid_value_c {
                border: solid 1px red;
            }

            /* .fade-leave-active below version 2.1.8 */
        </style>
        <script src="https://js.stripe.com/v3"></script>
    @endsection
    @section('content')
        <div id="review_flight_app" v-on:click="hide_list" class="wrap_body review_wrap_body">

            <!-- form steps -->
            <div class="container-lg pad_lg">
                <div class="form_steps">
                    <!-- 1 -->
                    <div class="step_box step_box_active">
                        <div class="step_circle step_circle_active"></div>
                        <p class="mb-0 mt-4 fs_14">Ticket types</p>
                    </div>
                    <!-- 2 -->
                    <div class="step_box">
                        <div class="step_circle" :class="{ step_circle_active: current_page >= 2 }"></div>
                        <p class="mb-0 mt-4 fs_14">Passenger details</p>
                    </div>
                    <!-- 3 -->
                    <div class="step_box">
                        <div class="step_circle" :class="{ step_circle_active: current_page >= 3 }"></div>
                        <p class="mb-0 mt-4 fs_14">Review and Pay</p>
                    </div>
                </div>
            </div>

            <!-- wrap_white_grids -->
            <div class="container-lg pad_lg">
                <form class="wrap_white_grids">
                    <!-- child-white-grids-left -->
                    <transition name="fade">
                        <div v-if="current_page === 1" class="child_white_grids_left">
                            <!-- 1 -->
                            <div class="c_w_g_left_child_1 white_grids_mb pad__x">
                                <div class="ticket_type_box">
                                    <div class="ticket_type_box_top">
                                        <h4 class="mb-0 fw_gilroy_bold h6">Class and ticket type</h4>
                                        <img src="/img/pattern_text.svg" alt="">
                                    </div>
                                </div>
                                <div class="avaliable_packages">
                                    <!-- Standard package -->
                                    <div class="a_package standard_package">
                                        <h5 class="fw_gilroy_bold h6">Standard</h5>
                                        <div class="wrap_package_ul">
                                            <ul class="package_ul">
                                                <li><img src="/img/p_s_img_1.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Personal object</p>
                                                </li>
                                                <li><img src="/img/p_s_img_2.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Cabin bag</p>
                                                </li>
                                                <li><img src="/img/p_s_img_3.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Checked bag</p>
                                                </li>
                                                <li><img src="/img/p_s_img_4.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Partly refundable</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="mb-0 fw_gilroy_bold fs_14">+0 kr</p>
                                    </div>
                                    <!-- Flex package -->
                                    <div class="a_package flex_package">
                                        <h5 class="fw_gilroy_bold h6">Flex</h5>
                                        <div class="wrap_package_ul">
                                            <ul class="package_ul">
                                                <li><img src="/img/p_f_img_1.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Personal object</p>
                                                </li>
                                                <li><img src="/img/p_f_img_2.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Cabin bag</p>
                                                </li>
                                                <li><img src="/img/p_f_img_3.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Checked bag</p>
                                                </li>
                                                <li><img src="/img/p_f_img_4.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Priority for boarding</p>
                                                </li>
                                                <li><img src="/img/p_f_img_5.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Partly refundable</p>
                                                </li>
                                                <li><img src="/img/p_f_img_6.svg" alt="">
                                                    <p class="mb-0 ms-2 fs_14">Sitsval</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="mb-0 fw_gilroy_bold fs_14">+1 446,04 kr</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-center mt-4 text_silver fw_gilroy_medium fs_14">Read more about these prices
                                </p>
                            </div>
                            <!-- 2 -->
                            <div class="c_w_g_left_child_1 c_w_g_left_child_2 white_grids_mb">
                                <div class="luggage_box_top">
                                    <div class="luggage_box_left">
                                        <h5 class="fw_gilroy_bold h6">Luggage</h5>
                                        <p class="mb-0 fw_gilroy_medium fs_14">Save up to 50% by adding your luggage now,
                                            instead of
                                            at the airport</p>
                                    </div>
                                    <div class="luggage_box_right">
                                        <label class="btn_toggle_pink btn_toggle_pink_3">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="wrap_luggage_boxes luggage_box">
                                    <div class="luggage_box_row luggage_box_row_active">
                                        <div class="me-4"><img src="/img/luggage_row_1.svg" alt=""></div>
                                        <p class="mb-0 package_p_botom fs_14">You are allowed 1 cabin bag (55x40x23 cm, 15 kg)
                                            and 1
                                            personal item (40x30x15 cm, 7 kg)</p>
                                    </div>
                                    <div class="luggage_box_row">
                                        <div class="me-4"><img src="/img/luggage_row_2.svg" alt=""></div>
                                        <p class="mb-0 package_p_botom fs_14">Round trip price for an adult</p>
                                    </div>
                                    <ul class="luggage_inc_dec_wrap">
                                        <!-- 1 -->
                                        <li>
                                            <p class="mb-0 fw_gilroy_bold fs_14">Checked baggage (15 kg) + 804,80 kr</p>
                                            <div class="luggage_inc_dec_box">
                                                <button type="button" data-decrease><i class="fas fa-minus"></i></button>
                                                <input class="fs_14" data-value type="text" value="0">
                                                <button type="button" data-increase><i class="fas fa-plus"></i></button>
                                            </div>
                                        </li>
                                        <!-- 2 -->
                                        <li>
                                            <p class="mb-0 fw_gilroy_bold fs_14">Checked baggage (20 kg) + 804,80 kr</p>
                                            <div class="luggage_inc_dec_box">
                                                <button type="button" data-decrease><i class="fas fa-minus"></i></button>
                                                <input class="fs_14" data-value type="text" value="0">
                                                <button type="button" data-increase><i class="fas fa-plus"></i></button>
                                            </div>
                                        </li>
                                        <!-- 3 -->
                                        <li>
                                            <p class="mb-0 fw_gilroy_bold fs_14">Checked baggage (25 kg) + 804,80 kr</p>
                                            <div class="luggage_inc_dec_box">
                                                <button type="button" data-decrease><i class="fas fa-minus"></i></button>
                                                <input class="fs_14" data-value type="text" value="0">
                                                <button type="button" data-increase><i class="fas fa-plus"></i></button>
                                            </div>
                                        </li>
                                        <!-- 4 -->
                                        <li>
                                            <p class="mb-0 fw_gilroy_bold fs_14">Checked baggage (30 kg) + 804,80 kr</p>
                                            <div class="luggage_inc_dec_box">
                                                <button type="button" data-decrease><i class="fas fa-minus"></i></button>
                                                <input class="fs_14" data-value type="text" value="0">
                                                <button type="button" data-increase><i class="fas fa-plus"></i></button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 3 -->
                            <div v-if="!isSameAirline()" class="c_w_g_left_child_3 white_grids_mb pad__x">
                                <ul>
                                    {{--     <li>
                                        <div class="me-3"><img src="/img/airplane_take_off.svg" alt=""></div>
                                        <p class="mb-0 fs_14">You're flying from Paris Charles de Gaulle Airport (CDG), but
                                            flies
                                            back toParis Orly Airport (ORY)</p>
                                    </li> --}}
                                    <li>
                                        <div class="me-3"><img src="/img/giving_tickets.svg" alt=""></div>
                                        <p class="mb-0 fs_14">This trip includes different airlines</p>
                                    </li>
                                </ul>
                            </div>
                            <!-- continue -->
                            <button type="button" v-on:click.prevent="goToPage(current_page + 1)"
                                class="mb-3 continue_submit_btn fs_14">continue</button>

                        </div>
                    </transition>

                    <transition name="fade">
                        <div v-if="current_page == 2" class="child_white_grids_left">
                            <!-- 1 -->
                            <div class="c_w_g_left_child_1 c_w_g_left_child_4 white_grids_mb pad__x">
                                {{-- <div class="quick_registation">
                                    <!-- quick_registation_left -->
                                    <div class="quick_registation_left">
                                        <h4 class="mb-2 fw_gilroy_bold text_dark_blue h6">Quick registation</h4>
                                        <p class="mb-0 text_silver fs_14">Skip to fill in all your details by registering
                                            though
                                            facebook or google.</p>
                                    </div>
                                    <!-- quick_registation_right -->
                                    <div class="quick_registation_right">
                                        <a class="mb-3 fs_14" href="#"><i class="me-2 fab fa-facebook"></i> Log in with
                                            Facebook </a>
                                        <a class="fs_14" href="#"><i class="me-2 fab fa-google"></i> Log in with
                                            Facebook
                                        </a>
                                    </div>
                                </div>
                                <div class="or_divider_box">
                                    <span></span>
                                    <h5 class="mb-0 h6">OR</h5>
                                    <span></span>
                                </div> --}}
                                <div v-for="(passenger_details, passenger_details_index) in passenger_details_array" class="passenger_details_box">
                                    <h4 v-if="passenger_details_index == 0" class="text_dark_blue fw_gilroy_bold h6">Passenger details</h4>
                                    <h4 class="text_dark_blue fw_gilroy_bold h6">@{{ passenger_details.type_of_passenger }} @{{passenger_details.index}} </h4>
                                    <p class="text_pink fw_gilroy_medium fs_14">These passenger details must match your
                                        passport or
                                        photo ID.</p>
                                    <div class="row mt-4 pt-2 fw_gilroy_bold">
                                        <div class="col-sm-6 mb-3">
                                            <label for="input__gray_name"
                                                class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">first
                                                name</label>
                                            <input v-model="passenger_details.first_name.value" type="text"
                                                class="form-control input__gray fs_14"
                                                :class="{ invalid_value_c: passenger_details.first_name.is_valid == false }">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="input__gray_surname"
                                                class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">surname</label>
                                            <input v-model="passenger_details.last_name.value" type="text"
                                                class="form-control input__gray fs_14"
                                                :class="{ invalid_value_c: passenger_details.last_name.is_valid == false }"
                                                id="input__gray_surname">
                                        </div>
                                        <div class="radio__box col-md-6 col-sm-4 py-3">
                                            <div class="me-4">
                                                <input :id="'radio__input' + passenger_details.type_of_passenger + passenger_details.index" checked type="radio" class="fs_14"
                                                    :name="'radio__input' + passenger_details.type_of_passenger + passenger_details.index " value="Male" v-model="passenger_details.gender.value" />
                                                <label :for="'radio__input' + passenger_details.type_of_passenger + passenger_details.index "
                                                    class="fs_14 fw_gilroy_bold text-capitalize text_dark_blue">Male</label>
                                            </div>
                                            <div>
                                                <input :id="'radio__input2' + passenger_details.type_of_passenger + passenger_details.index" type="radio" class="fs_14" :name="'radio__input' + passenger_details.type_of_passenger + passenger_details.index"
                                                    value="Female" v-model="passenger_details.gender.value" />
                                                <label :for="'radio__input2'  + passenger_details.type_of_passenger + passenger_details.index"
                                                    class="fs_14 fw_gilroy_bold text-capitalize text_dark_blue">Female</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-8">
                                            <label class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">date
                                                of
                                                birth</label>
                                            <div class="wrap_input_grays">
                                                <input v-model="passenger_details.dob_d.value" type="text"
                                                    placeholder="DD" class="form-control input__gray input__gray_sm fs_14"
                                                    :class="{ invalid_value_c: passenger_details.dob_d.is_valid == false }">
                                                <input v-model="passenger_details.dob_m.value" type="text"
                                                    placeholder="MM" class="form-control input__gray input__gray_sm fs_14"
                                                    :class="{ invalid_value_c: passenger_details.dob_m.is_valid == false }">
                                                <input v-model="passenger_details.dob_y.value" type="text"
                                                    placeholder="YYYY" class="form-control input__gray input__gray_md fs_14"
                                                    :class="{ invalid_value_c: passenger_details.dob_y.is_valid == false }">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="c_w_g_left_child_1 c_w_g_left_child_4 white_grids_mb pad__x">
                                <h4 class="text_dark_blue fw_gilroy_bold h6">Contact details</h4>
                                <div class="row mt-4">
                                    <div class="col-sm-6 mb-3">
                                        <label for="input__gray_email"
                                            class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">email
                                            address</label>
                                        <input type="email" v-model="booking_contact_information.email.value"
                                            class="form-control input__gray fs_14"
                                            :class="{ invalid_value_c: booking_contact_information.email.is_valid == false }"
                                            id="input__gray_email">
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
                                        <input v-model="booking_contact_information.address1.value" type="text"
                                            class="form-control input__gray fs_14"
                                            :class="{ invalid_value_c: booking_contact_information.address1.is_valid == false }"
                                            id="input__gray_address_1">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="input__gray_address_2"
                                            class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">address 2
                                            (optional)</label>
                                        <input v-model="booking_contact_information.address2.value" type="text"
                                            class="form-control input__gray fs_14"
                                            :class="{ invalid_value_c: booking_contact_information.address2.is_valid == false }"
                                            id="input__gray_address_2">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="input__gray_city"
                                            class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">city</label>
                                        <input v-model="booking_contact_information.city.value" type="text"
                                            class="form-control input__gray fs_14"
                                            :class="{ invalid_value_c: booking_contact_information.city.is_valid == false }"
                                            id="input__gray_city">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="input__gray_postcode"
                                            class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">postcode</label>
                                        <input v-model="booking_contact_information.postcode.value" type="text"
                                            class="form-control input__gray fs_14"
                                            :class="{ invalid_value_c: booking_contact_information.postcode.is_valid == false }"
                                            id="input__gray_postcode">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="input__gray_country"
                                            class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">county /
                                            region
                                            (optional)</label>
                                        <input v-model="booking_contact_information.country.value" type="text"
                                            class="form-control input__gray fs_14"
                                            :class="{ invalid_value_c: booking_contact_information.country.is_valid == false }"
                                            id="input__gray_country">
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
                            <!-- 3 -->
                            {{-- <div class="append_on_desktop">
                                <div class="c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_5">
                                    <div class="wrap_p_details_bottom_row mb-4">
                                        <label class="btn_toggle_pink btn_toggle_pink_2">
                                            <input type="checkbox">
                                            <span></span>
                                        </label>
                                        <p class="mb-0 mx-3 fw_gilroy_medium text_dark_blue fs_14">Create an account for faster
                                            booking.</p>
                                        <a class="text_pink text-decoration-none fw_gilroy_bold text_dark_blue fs_14"
                                            href="#">See benefits</a>
                                    </div>
                                    <div class="wrap_p_details_bottom_row wrap_p_details_bottom_row_2">
                                        <label>
                                            <input id="send_travel_input" type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <p id="send_travel" class="mb-0 ms-5 fw_gilroy_medium text_dark_blue fs_14">Send
                                            travel
                                            deals, reminders and other updates via email.</p>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- continue -->
                            <button v-on:click.prevent="goToPage(3)" class="mb-2 continue_submit_btn fs_14">Review travel
                                details</button>

                        </div>
                    </transition>
                    <transition name="fade">
                        <div v-if="current_page == 3" class="child_white_grids_left">
                            <!-- 1 -->
                            <div class="passanger_details white_grids_mb pad__x">
                                <h4 class="trip_box_heading mb-0 h6">Passanger details</h4>
                                <div class="details_input_box_wrapper">
                                    <div class="details_before_input_txt">
                                        <p class="fs_14">@{{ passenger_details_array[0].first_name.value }} @{{ passenger_details_array[0].last_name.value }}</p>
                                        <p class="fs_14">ADULT</p>
                                    </div>

                                    <div class="ticket_details">
                                        <img class="ticket_img" src="/img/ticket_icon.svg" alt="">
                                        <p class="mb-0 ticket_txt ms-2 me-3">Your ticket will be sent to :</p>
                                        <div class="mb-0 ticket_txt_email">@{{ booking_contact_information.email.value }}</div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                                <div class="accordion" id="acc_payment">
                                    <div class="accordion-item">
                                        <div id="paymentContainer">
                                        </div>

                                        {{-- <h4 class="mb-0" id="headingPayment">
                                            <button
                                                class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_14"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapsePayment"
                                                aria-expanded="true" aria-controls="collapsePayment">
                                                Choose payment method
                                            </button>
                                        </h4>
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
                                                <div class="row pb-4 row_payment_box">
                                                    <div class="col-xl-12 col-sm-6 mb-3">
                                                        <label for="card_name" class="form-label fs_14">Name on card</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_name">
                                                    </div>
                                                    <div class="col-xl-12 col-sm-6 mb-3">
                                                        <label for="card_number" class="form-label fs_14">Card number</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_number">
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="card_Expiration" class="form-label fs_14">Expiration
                                                            date</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_Expiration">
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label for="card_cvc" class="form-label fs_14">CVC</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_cvc">
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
                                                        <label for="card_name" class="form-label fs_14">Name on card</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_name">
                                                    </div>
                                                    <div class="col-lg-12 col-md-6 mb-3">
                                                        <label for="card_number" class="form-label fs_14">Card number</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_number">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="card_Expiration" class="form-label fs_14">Expiration
                                                            date</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_Expiration">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="card_cvc" class="form-label fs_14">CVC</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_cvc">
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
                                                        <label for="card_name" class="form-label fs_14">Name on card</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_name">
                                                    </div>
                                                    <div class="col-lg-12 col-md-6 mb-3">
                                                        <label for="card_number" class="form-label fs_14">Card number</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_number">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="card_Expiration" class="form-label fs_14">Expiration
                                                            date</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_Expiration">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="card_cvc" class="form-label fs_14">CVC</label>
                                                        <input type="text" required class="form-control input__gray fs_14"
                                                            id="card_cvc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- 3 -->
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
                                                    <div class="row_discount_left">
                                                        <label for="discount_input"
                                                            class="form-label fw_gilroy_bold text_dark_blue text-capitalize fs_14">enter
                                                            your coupon code</label>
                                                        <input type="text" class="form-control input__gray fs_14"
                                                            id="discount_input">
                                                    </div>
                                                    <!-- row discount right -->
                                                    <div class="row_discount_right">
                                                        <button class="fs_14">Apply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="append_on_desktop">
                                <div class="pay_lists fw_gilroy_bold">
                                    <h5 class="trip_box_heading mb-3 h6">By clicking on pay:</h5>
                                    <ul class="pay_list_wrapper mb-0">
                                        <li class="pay_list_item fs_14"><span class="before_circle"></span> I accept the <a
                                                class="pay_list_item_link" href="#">terms</a> of use for Trippbo.</li>
                                        <li class="pay_list_item fs_14"><span class="before_circle"></span> I agree to
                                            @{{ flight.flightName }}
                                            <a class="pay_list_item_link" :href="'/flight/terms?key=' + data_key"
                                                target="_blank">terms and conditions</a>.
                                        </li>



                                        {{-- <li class="pay_list_item fs_14"><span class="before_circle"></span> I accept teh <a
                                                class="pay_list_item_link" href="#">terms</a> of use at Transavia</li>
                                        <li class="pay_list_item fs_14"><span class="before_circle"></span> I accept teh <a
                                                class="pay_list_item_link" href="#">terms</a> of use at Trippbo.</li> --}}
                                    </ul>
                                </div>
                            </div>
                            <!-- continue -->
                            <button v-on:click.prevent="bookFlight" class="mb-3 continue_submit_btn fs_14">Pay</button>

                        </div>
                    </transition>
                    <!-- child-white-grids-right -->
                    <div class="child_white_grids_right">
                        <div class="sidebar_trip_selection_wrapper">



                            <flight-item :search_data="search_data" :trip_data="flight" :tripindex="1"
                                :is_side_bar="isSideBar"></flight-item>
                            {{-- <div class="sidebar_trip_box_item">
                                    <div class="trip_box_header">
                                        <h4 class="trip_box_heading mb-1 h6">Departure Flight</h4>
                                        <p class="trip_box_after_heading txt_pink fs_14">Next cheapest</p>
                                    </div>

                                    <div class="side_bar_trip_box_content">
                                        <h6 class="trip_box_content_txt mb-2"><img src="/img/pattern_text.svg"
                                                alt=""></h6>

                                        <div>
                                            <div class="trip_box_time_wrapper">
                                                <div class="trip_box_time_item">
                                                    <h4 class="trip_box_time_heading h6">23:05</h5>
                                                        <div class="trip_box_time_txt_secondary">
                                                            <div class="trip_box_time_baline"></div>
                                                            <p class="txt_silver fs_14">9h50m</p>
                                                            <div class="trip_box_time_baline"></div>
                                                        </div>
                                                        <h4 class="trip_box_time_heading h6">09:30 <img
                                                                src="/img/summer_summer.svg" alt=""></h4>
                                                </div>

                                                <div class="trip_box_description txt_blue_secondary">
                                                    <div class="trip_box_time_description me-2 fs_14">
                                                        Paris Charles de Gaulle Airport (CDG)
                                                    </div>

                                                    <div class="trip_box_time_description me-2 fs_14">
                                                        Catania Fontanarossa Airport (CTA)
                                                    </div>

                                                    <div class="trip_box_icon">
                                                        <button class="btn accordion-button accordion_arrow_btn p-0 fs_14"
                                                            role="button" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseOne" aria-expanded="true"
                                                            aria-controls="collapseOne"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="trip_box_footer">
                                        <div class="accordion_wrapper" id="accordionWrapper">
                                            <div id="collapseOne" class="collapse accordion-collapse show"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionWrapper">
                                                <div class="sidebar_accordion_inner_content">
                                                    <div class="accr_inner_list_wrapper">
                                                        <div class="accr_list_item_1">
                                                            <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 h6">23:05</h4>
                                                            <p class="txt_silver mb-0 fs_14">1h50m</p>
                                                        </div>

                                                        <div class="accr_list_item_2">
                                                            <div class="accr_list_icon_wrapper">
                                                                <img class="accr_icon" src="/img/airplane_mode_icon.svg"
                                                                    alt="">
                                                                <img class="accr_after_icon"
                                                                    src="/img/after_airplane_line.svg" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="accr_list_item_3">
                                                            <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 h6">Paris Charles
                                                                de Gaulle Airport (CDG)</h4>
                                                            <p class="txt_silver mb-0 fs_14">Vueling | vy8247</p>
                                                        </div>
                                                    </div>

                                                    <div class="accr_inner_list_wrapper">
                                                        <div class="accr_list_item_1">
                                                            <h4 class="txt_blue_secondary mb-0 h6">00:55</h4>
                                                            <p class="txt_silver mb-0 fs_14">1h50m</p>
                                                        </div>

                                                        <div class="accr_list_item_2">
                                                            <div class="accr_list_icon_wrapper">
                                                                <img class="accr_icon" src="/img/circle_icon.svg"
                                                                    alt="">
                                                                <img class="accr_after_icon" src="/img/after_circle_icon.svg"
                                                                    alt="">
                                                            </div>
                                                        </div>

                                                        <div class="accr_list_item_3">
                                                            <h4 class="txt_blue_secondary mb-0 h6">Barcelona El Prat Airport
                                                                (BCN)</h4>
                                                            <p class="txt_silver mb-0 fs_14">Byte, 6h25m</p>
                                                        </div>
                                                    </div>

                                                    <div class="accr_inner_list_wrapper">
                                                        <div class="accr_list_item_1">
                                                            <h4 class="txt_blue_secondary mb-0 h6">07:20</h4>
                                                            <p class="txt_silver mb-0 fs_14">1h50m</p>
                                                        </div>

                                                        <div class="accr_list_item_2">
                                                            <div class="accr_list_icon_wrapper">
                                                                <img class="accr_icon" src="/img/airplane_mode_icon.svg"
                                                                    alt="">
                                                                <img class="accr_after_icon"
                                                                    src="/img/after_airplane_line.svg" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="accr_list_item_3">
                                                            <h4 class="txt_blue_secondary mb-0 h6">Barcelona El Prat Airport
                                                                (BCN)</h4>
                                                            <p class="txt_silver mb-0 fs_14">Vueling | vy8247</p>
                                                        </div>
                                                    </div>

                                                    <div class="accr_inner_list_wrapper">
                                                        <div class="accr_list_item_1">
                                                            <h4 class="txt_blue_secondary mb-0 h6">07:20</h4>
                                                            <p class="txt_silver mb-0 fs_14">1h50m</p>
                                                        </div>

                                                        <div class="accr_list_item_2">
                                                            <div class="accr_list_icon_wrapper">
                                                                <img class="accr_icon" src="/img/location_icon.svg"
                                                                    alt="">
                                                            </div>
                                                        </div>

                                                        <div class="accr_list_item_3">
                                                            <h4 class="txt_blue_secondary mb-0 h6">Barcelona El Prat Airport
                                                                (BCN)</h4>
                                                            <p class="txt_silver mb-0 fs_14">Vueling | vy8247</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--  -->
                                <div class="sidebar_trip_box_item">
                                    <div class="trip_box_header">
                                        <h4 class="trip_box_heading mb-1 h6">Return Flight</h4>
                                        <p class="trip_box_after_heading txt_green fs_14">CHEAPEST FASTEST</p>
                                    </div>

                                    <div class="side_bar_trip_box_content">
                                        <h6 class="trip_box_content_txt mb-2"><img src="/img/pattern_text.svg"
                                                alt=""></h6>

                                        <div>
                                            <div class="trip_box_time_wrapper">
                                                <div class="trip_box_time_item">
                                                    <h4 class="trip_box_time_heading h6">17:30</h4>
                                                    <div class="trip_box_time_txt_secondary">
                                                        <span class="trip_box_time_baline"></span>
                                                        <p class="txt_silver fs_14">2h50m</p> <span
                                                            class="trip_box_time_baline"></span>
                                                    </div>
                                                    <h4 class="trip_box_time_heading h6">20:20 <img
                                                            src="/img/summer_summer.svg" alt=""></h4>
                                                </div>

                                                <div class="trip_box_description txt_blue_secondary">
                                                    <div class="trip_box_time_description me-2 fs_14">
                                                        Catania Fontanarossa Airport (CTA)
                                                    </div>

                                                    <div class="trip_box_time_description me-2 fs_14">
                                                        Paris Orly Airport (ORY)
                                                    </div>

                                                    <div class="trip_box_icon">
                                                        <button class="btn accordion-button accordion_arrow_btn p-0"
                                                            role="button" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseTwo" aria-expanded="true"
                                                            aria-controls="collapseTwo"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="trip_box_footer">
                                        <div class="accordion_wrapper" id="accordionWrapper2">
                                            <div id="collapseTwo" class="collapse accordion-collapse show"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionWrapper2">
                                                <div class="sidebar_accordion_inner_content">
                                                    <div class="accr_inner_list_wrapper">
                                                        <div class="accr_list_item_1">
                                                            <h4 class="txt_blue_secondary mb-0 h6">17:30</h4>
                                                            <p class="txt_silver mb-0 fs_14">2h50m</p>
                                                        </div>

                                                        <div class="accr_list_item_2">
                                                            <div class="accr_list_icon_wrapper">
                                                                <img class="accr_icon" src="/img/airplane_mode_icon.svg"
                                                                    alt="">
                                                                <img class="accr_after_icon"
                                                                    src="/img/after_airplane_line.svg" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="accr_list_item_3">
                                                            <h4 class="txt_blue_secondary mb-0 h6">Catania Fontanarossa Airport
                                                                (CTA)</h4>
                                                            <p class="txt_silver mb-0 fs_14">Transavia France | to3809</p>
                                                        </div>
                                                    </div>

                                                    <div class="accr_inner_list_wrapper">
                                                        <div class="accr_list_item_1">
                                                            <h4 class="txt_blue_secondary mb-0 h6">07:20</h4>
                                                            <p class="txt_silver mb-0 fs_14">20:20</p>
                                                        </div>

                                                        <div class="accr_list_item_2">
                                                            <div class="accr_list_icon_wrapper">
                                                                <img class="accr_icon" src="/img/location_icon.svg"
                                                                    alt="">
                                                            </div>
                                                        </div>

                                                        <div class="accr_list_item_3">
                                                            <h4 class="txt_blue_secondary mb-0 h6">Paris Orly Airport (ORY)
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}


                            <div class="sidebar_bottom_content pad__x">
                                <div
                                    class="sidebar_bottom_list d-flex align-items-center justify-content-between sidebar_bottom_txt">
                                    <p class="mb-0 text_dark_blue h6">Tickets ( @{{ countPassengers() }} )</p>
                                    <p class="mb-0 text_dark_blue h6">@{{ flight.Currency }} @{{ ceil_price(flight.OfferedFare) }}</p>
                                </div>

                                <div
                                    class="sidebar_bottom_list d-flex align-items-center justify-content-between sidebar_bottom_txt">
                                    <p class="mb-0 text_dark_blue h6">Service fee</p>
                                    <p class="mb-0 text_dark_blue h6">USD 0</p>
                                </div>

                                <div
                                    class="sidebar_bottom_list d-flex align-items-center justify-content-between sidebar_bottom_txt">
                                    <h5 class="mb-0 text_dark_blue h6"><span class="fw_gilroy_bold">In total</span> (
                                        including VAT )</h5>
                                    <h5 class="mb-0 text_dark_blue fw_gilroy_bold h6">@{{ flight.Currency }}
                                        @{{ ceil_price(flight.OfferedFare) }}</h5>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button v-on:click.prevent="goToPage(current_page + 1)"
                                    class="mb-3 continue_submit_btn fs_14">continue</button>
                            </div>
                            <div class="mb-3">
                                <p class="text_silver text-center text-xl-start fs_14">Prices include VAT and may vary
                                    depending on availability. The price will be completed when the purchase is complete. Any
                                    additional fees can be reviewed before payment.</p>
                            </div>

                            <div class="text-center">
                                <p class="text_silver fs_14">The fine print , <a href="#"
                                        class="text_silver text-decoration-none fw_gilroy_bold">Terms of Use</a> and <a
                                        href="#" class="text_silver text-decoration-none fw_gilroy_bold">Privacy
                                        Policy</a></p>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    @endsection


    @section('scripts-links')
        <script>
            window.location.hash = "#1"
            window.stripe = Stripe('{{ config('services.stripe.key') }}');





            const review_flight = new Vue({
                el: "#review_flight_app",

                data: {
                    search_data: @json($search_data),
                    current_page: 1,
                    flight: @json($flight),
                    isSideBar: true,
                    checkout_initialized: false,
                    data_key: @json($data_key),
                    booking_contact_information: {
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
                    },
                    passenger_details_array: [],




                },
                methods: {
                    isSameAirline: function() {
                        let flight = this.flight
                        let first = true;
                        let airline = '';
                        let isSame = true;
                        for (let i = 0; i < flight.Segments.length; i++) {
                            for (let t = 0; t < flight.Segments[i].Segments.length; t++) {

                                if (first) {
                                    first = false;
                                    airline = flight.Segments[i].Segments[t].Airline.AirlineCode
                                } else {
                                    if (!(airline == flight.Segments[i].Segments[t].Airline.AirlineCode)) {
                                        isSame = false;
                                    }
                                }
                            }
                        }

                        return isSame;
                    },
                    ceil_price(price) {
                        return Math.ceil(price)
                    },
                    bookFlight: async function() {
                        let d = new FormData();
                        d.append("flight" , JSON.stringify(this.flight))
                        d.append("paxes" , JSON.stringify(this.passenger_details_array))
                        d.append("flight_class", this.search_data.flight_class)
                        d.append("flight_type", this.search_data.flight_type)



                        let resp = await axios.post("/flight/book", d);



                    },

                    init_passenger_details: function() {
                        let paxes = JSON.parse(this.search_data.flight_passengers);
                        this.passenger_details_array = [];

                        let num_of_adults = 1;
                        let num_of_children = 1;

                        let num_of_infants = 1;

                        if (paxes.hasOwnProperty(0)) {
                            for (let i = 0; i < paxes[0].passengers.length; i++) {
                                this.passenger_details_array.push({
                                    type_of_passenger: 'Adult',
                                    index: num_of_adults,
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
                                    }


                                })
                                num_of_adults += 1;
                            }
                        }
                        if (paxes.hasOwnProperty(1)) {
                            for (let i = 0; i < paxes[1].passengers.length; i++) {
                                this.passenger_details_array.push(

                                    {
                                        type_of_passenger: 'Child',

                                        index: num_of_children,
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
                                        }


                                    })
                                num_of_children += 1;
                            }
                        }
                        if (paxes.hasOwnProperty(2)) {
                            for (let i = 0; i < paxes[2].passengers.length; i++) {
                                this.passenger_details_array.push({
                                    type_of_passenger: 'Infant',

                                    index: num_of_infants,
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
                                    }


                                })

                                num_of_infants += 1;
                            }
                        }





                    },
                    countPassengers() {
                        let pax = JSON.parse(this.search_data.flight_passengers);
                        let adults = 0;
                        let children = 0;
                        let infants = 0;

                        for (let i = 0; i < pax.length; i++) {
                            if (pax[i].id == 1) {
                                adults = pax[i].passengers.length;
                            }
                            if (pax[i].id == 4) {
                                children = pax[i].passengers.length;
                            }
                            if (pax[i].id == 6) {
                                infants = pax[i].passengers.length;
                            }
                        }
                        let total = adults + children + infants
                        let type_of_flight = ''
                        if (this.search_data.flight_type == 1) {
                            type_of_flight = "One Way"
                        } else if (this.search_data.flight_type == 1) {
                            type_of_flight = "Roundtrip"
                        } else {
                            type_of_flight = "Multiple"
                        }
                        let passengers = ''

                        if (adults > 0) {
                            passengers += adults + " Adult(s)"
                        }
                        if (children > 0) {
                            passengers += children + " Child,"
                        }
                        if (infants > 0) {
                            passengers += infants + ", Infant,"
                        }
                        return passengers;

                    },
                    hide_list: function() {
                        this.$refs.phone_nr.hideList();
                    },
                    update_phone_number: function(data) {
                        this.booking_contact_information.phone_nr.value = data;
                    },

                    validatePrice: async function() {
                        let fd = new FormData();
                        fd.append('flight', JSON.stringify(this.flight));

                        let resp = await axios.post('/flight/validate_price', fd);
                    },
                    validate_input: function() {

                    },

                    goToPage: async function(page_nr) {

                        if (page_nr == 2) {
                            this.init_passenger_details();
                        }

                        window.location.hash = "#" + page_nr


                        if (page_nr == 3 && this.checkout_initialized == false) {
                            await this.prepareCheckout();
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
                        paymentElement.mount("#paymentContainer");

                    }

                },
                mounted: async function() {


                    let self = this
                    window.onpopstate = function(something) {

                        console.log(something.currentTarget.location.hash)
                        switch (something.currentTarget.location.hash) {
                            case '#1':
                                self.current_page = 1
                                window.scroll(0, 0);
                                break;
                            case '#2':
                                self.current_page = 2
                                window.scroll(0, 0);
                                break;
                            case '#3':
                                self.current_page = 3
                                window.scroll(0, 0);
                                break;

                        }
                    }

                    await this.validatePrice();
                }


            });
        </script>
    @endsection
