    @extends('master')

    @section('content')
    <div class="wrap_body review_wrap_body">
            
        <!-- form steps -->
            <div class="container-lg pad_lg">
                <div class="form_steps">
                    <!-- 1 -->
                        <div class="step_box step_box_active">
                            <div class="step_circle step_circle_active"></div>
                            <p class="mb-0 mt-4 fs_14">Ticket types</p>
                        </div>
                    <!-- 2 -->
                        <div class="step_box step_box_active">
                            <div class="step_circle step_circle_active"></div>
                            <p class="mb-0 mt-4 fs_14">Passenger details</p>
                        </div>
                    <!-- 3 -->
                        <div class="step_box step_box_active">
                            <div class="step_circle step_circle_active"></div>
                            <p class="mb-0 mt-4 fs_14">Review and Pay</p>
                        </div>
                </div>
            </div>

        <!-- wrap_white_grids -->
            <div class="container-lg pad_lg">
                <form class="wrap_white_grids">
                    <!-- child-white-grids-left -->
                        <div class="child_white_grids_left">
                            <!-- 1 -->
                                <div class="passanger_details white_grids_mb pad__x">
                                    <h4 class="trip_box_heading mb-0 h6">Passanger details</h4>
                                    <div class="details_input_box_wrapper">
                                        <div class="details_before_input_txt">
                                            <p class="fs_14">Braun Rodrigo</p>
                                            <p class="fs_14">ADULT</p>
                                        </div>
                            
                                        <div class="ticket_details">
                                            <img class="ticket_img" src="/img/ticket_icon.svg" alt="">
                                            <p class="mb-0 ticket_txt ms-2 me-3">Your ticket will be sent to :</p>
                                            <div class="mb-0 ticket_txt_email">Braun_Rodrigo@gmail.com</div>
                                        </div>
                                    </div>
                                </div>
                            <!-- 2 -->
                                <div class="c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                                    <div class="accordion" id="acc_payment">
                                        <div class="accordion-item">
                                        <h4 class="mb-0" id="headingPayment">
                                            <button class="review_accordion_button accordion-button fw_gilroy_bold text_dark_blue fs_14" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePayment" aria-expanded="true" aria-controls="collapsePayment">
                                                Choose payment method
                                            </button>
                                        </h4>
                                        <div id="collapsePayment" class="accordion-collapse collapse show" aria-labelledby="headingPayment">
                                            <div class="accordion-body fw_gilroy_bold text_dark_blue">
                                                <!-- 1 -->
                                                    <div class="payment_row mb-4">
                                                        <div class="form-check d-flex align-items-center">
                                                            <input class="form-check-input me-3 input_payment payment_checkbox" type="radio" name="payment_method" id="payment_card">
                                                            <label class="form-check-label" for="payment_card">
                                                            <img class="credit_dars_img" src="/img/credit_cards.svg" alt="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-4 row_payment_box">
                                                        <div class="col-xl-12 col-sm-6 mb-3">
                                                            <label for="card_name" class="form-label fs_14">Name on card</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_name">
                                                        </div>
                                                        <div class="col-xl-12 col-sm-6 mb-3">
                                                            <label for="card_number" class="form-label fs_14">Card number</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_number">
                                                        </div>
                                                        <div class="col-sm-6 mb-3">
                                                            <label for="card_Expiration" class="form-label fs_14">Expiration date</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_Expiration">
                                                        </div>
                                                        <div class="col-sm-6 mb-3">
                                                            <label for="card_cvc" class="form-label fs_14">CVC</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_cvc">
                                                        </div>
                                                    </div>
                                                <!-- 2 -->
                                                    <div class="payment_row mb-4">
                                                        <div class="form-check d-flex align-items-center">
                                                            <input class="form-check-input me-3 input_payment payment_checkbox" type="radio" name="payment_method" id="paypal">
                                                            <label class="form-check-label" for="paypal">
                                                            <img class="paypal_img" src="/img/paypal.svg" alt="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-4 row_payment_box">
                                                        <div class="col-lg-12 col-md-6 mb-3">
                                                            <label for="card_name" class="form-label fs_14">Name on card</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_name">
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 mb-3">
                                                            <label for="card_number" class="form-label fs_14">Card number</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_number">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="card_Expiration" class="form-label fs_14">Expiration date</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_Expiration">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="card_cvc" class="form-label fs_14">CVC</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_cvc">
                                                        </div>
                                                    </div>
                                                <!-- 3 -->
                                                    <div class="payment_row">
                                                        <div class="form-check d-flex align-items-center">
                                                            <input class="form-check-input me-3 input_payment payment_checkbox" type="radio" name="payment_method" id="google_pay">
                                                            <label class="form-check-label" for="google_pay">
                                                            <img class="google_pay_img" src="/img/google_pay.svg" alt="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4 row_payment_box">
                                                        <div class="col-lg-12 col-md-6 mb-3">
                                                            <label for="card_name" class="form-label fs_14">Name on card</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_name">
                                                        </div>
                                                        <div class="col-lg-12 col-md-6 mb-3">
                                                            <label for="card_number" class="form-label fs_14">Card number</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_number">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="card_Expiration" class="form-label fs_14">Expiration date</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_Expiration">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="card_cvc" class="form-label fs_14">CVC</label>
                                                            <input type="text" required class="form-control input__gray fs_14" id="card_cvc">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- 3 -->
                                <div class="c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_6 white_grids_mb pad__x">
                                    <div class="accordion" id="acc_discount">
                                        <div class="accordion-item">
                                        <h4 class="mb-0" id="headingCupon">
                                            <button class="review_accordion_button accordion-button text_dark_blue fw_gilroy_bold fs_16 pb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCupon" aria-expanded="true" aria-controls="collapseCupon">
                                                Use a discount
                                            </button>
                                        </h4>
                                        <div id="collapseCupon" class="accordion-collapse collapse show" aria-labelledby="headingCupon">
                                            <div class="accordion-body">
                                                <div class="row_discount">
                                                    <!-- row discount left -->
                                                        <div class="row_discount_left">
                                                            <label for="discount_input" class="form-label fw_gilroy_bold text_dark_blue text-capitalize fs_14">enter your coupon code</label>
                                                            <input type="text" class="form-control input__gray fs_14" id="discount_input">
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
                                            <li class="pay_list_item fs_14"><span class="before_circle"></span> I accept the <a class="pay_list_item_link" href="#">terms</a> of use for Trippbo.</li>
                                            <li class="pay_list_item fs_14"><span class="before_circle"></span> I agree to the processing and use of my data in accordance with Trippbo's <a class="pay_list_item_link" href="#">privacy policy</a></li>
                                            <li class="pay_list_item fs_14"><span class="before_circle"></span> I accept teh <a class="pay_list_item_link" href="#">terms</a> of use at Transavia</li>
                                            <li class="pay_list_item fs_14"><span class="before_circle"></span> I accept teh <a class="pay_list_item_link" href="#">terms</a> of use at Trippbo.</li>
                                        </ul>
                                    </div>
                                </div>
                            <!-- continue -->
                                <button type="submit" class="mb-3 continue_submit_btn fs_14">Pay</button>

                        </div>
                    <!-- child-white-grids-right -->
                        <div class="child_white_grids_right">
                            <div class="sidebar_trip_selection_wrapper">

                                <div class="sidebar_trip_main_box_wrapper pad__x">
                                    <div class="sidebar_trip_box_item">
                                        <div class="trip_box_header">
                                            <h4 class="trip_box_heading mb-1 h6">Departure Flight</h4>
                                            <p class="trip_box_after_heading txt_pink fs_14">Next cheapest</p>
                                        </div>
                        
                                        <div class="side_bar_trip_box_content">
                                            <h6 class="trip_box_content_txt mb-2"><img src="/img/pattern_text.svg" alt=""></h6>
                        
                                            <div>
                                                <div class="trip_box_time_wrapper">
                                                    <div class="trip_box_time_item">
                                                        <h4 class="trip_box_time_heading h6">23:05</h5>
                                                        <div class="trip_box_time_txt_secondary">
                                                            <div class="trip_box_time_baline"></div> <p class="txt_silver fs_14">9h50m</p> <div class="trip_box_time_baline"></div>
                                                        </div>
                                                        <h4 class="trip_box_time_heading h6">09:30 <img src="/img/summer_summer.svg" alt=""></h4>
                                                    </div>
                        
                                                    <div class="trip_box_description txt_blue_secondary">
                                                        <div class="trip_box_time_description me-2 fs_14">
                                                            Paris Charles de Gaulle Airport (CDG)
                                                        </div>
                        
                                                        <div class="trip_box_time_description me-2 fs_14">
                                                            Catania Fontanarossa Airport (CTA)
                                                        </div>
                        
                                                        <div class="trip_box_icon">
                                                            <button class="btn accordion-button accordion_arrow_btn p-0 fs_14" role="button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="trip_box_footer">
                                            <div class="accordion_wrapper" id="accordionWrapper">
                                                <div id="collapseOne" class="collapse accordion-collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionWrapper">
                                                    <div class="sidebar_accordion_inner_content">
                                                        <div class="accr_inner_list_wrapper">
                                                            <div class="accr_list_item_1">
                                                                <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 h6">23:05</h4>
                                                                <p class="txt_silver mb-0 fs_14">1h50m</p>
                                                            </div>
                        
                                                            <div class="accr_list_item_2">
                                                                <div class="accr_list_icon_wrapper">
                                                                    <img class="accr_icon" src="/img/airplane_mode_icon.svg" alt="">
                                                                    <img class="accr_after_icon" src="/img/after_airplane_line.svg" alt="">
                                                                </div>
                                                            </div>
                        
                                                            <div class="accr_list_item_3">
                                                                <h4 class="txt_blue_secondary fw_gilroy_bold mb-0 h6">Paris Charles de Gaulle Airport (CDG)</h4>
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
                                                                    <img class="accr_icon" src="/img/circle_icon.svg" alt="">
                                                                    <img class="accr_after_icon" src="/img/after_circle_icon.svg" alt="">
                                                                </div>
                                                            </div>
                        
                                                            <div class="accr_list_item_3">
                                                                <h4 class="txt_blue_secondary mb-0 h6">Barcelona El Prat Airport (BCN)</h4>
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
                                                                    <img class="accr_icon" src="/img/airplane_mode_icon.svg" alt="">
                                                                    <img class="accr_after_icon" src="/img/after_airplane_line.svg" alt="">
                                                                </div>
                                                            </div>
                        
                                                            <div class="accr_list_item_3">
                                                                <h4 class="txt_blue_secondary mb-0 h6">Barcelona El Prat Airport (BCN)</h4>
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
                                                                    <img class="accr_icon" src="/img/location_icon.svg" alt="">
                                                                </div>
                                                            </div>
                        
                                                            <div class="accr_list_item_3">
                                                                <h4 class="txt_blue_secondary mb-0 h6">Barcelona El Prat Airport (BCN)</h4>
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
                                            <h6 class="trip_box_content_txt mb-2"><img src="/img/pattern_text.svg" alt=""></h6>
                        
                                            <div>
                                                <div class="trip_box_time_wrapper">
                                                    <div class="trip_box_time_item">
                                                        <h4 class="trip_box_time_heading h6">17:30</h4>
                                                        <div class="trip_box_time_txt_secondary">
                                                            <span class="trip_box_time_baline"></span> <p class="txt_silver fs_14">2h50m</p> <span class="trip_box_time_baline"></span>
                                                        </div>
                                                        <h4 class="trip_box_time_heading h6">20:20 <img src="/img/summer_summer.svg" alt=""></h4>
                                                    </div>
                        
                                                    <div class="trip_box_description txt_blue_secondary">
                                                        <div class="trip_box_time_description me-2 fs_14">
                                                            Catania Fontanarossa Airport (CTA)
                                                        </div>
                        
                                                        <div class="trip_box_time_description me-2 fs_14">
                                                            Paris Orly Airport (ORY)
                                                        </div>
                        
                                                        <div class="trip_box_icon">
                                                            <button class="btn accordion-button accordion_arrow_btn p-0" role="button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="trip_box_footer">
                                            <div class="accordion_wrapper" id="accordionWrapper2">
                                                <div id="collapseTwo" class="collapse accordion-collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionWrapper2">
                                                    <div class="sidebar_accordion_inner_content">
                                                        <div class="accr_inner_list_wrapper">
                                                            <div class="accr_list_item_1">
                                                                <h4 class="txt_blue_secondary mb-0 h6">17:30</h4>
                                                                <p class="txt_silver mb-0 fs_14">2h50m</p>
                                                            </div>
                        
                                                            <div class="accr_list_item_2">
                                                                <div class="accr_list_icon_wrapper">
                                                                    <img class="accr_icon" src="/img/airplane_mode_icon.svg" alt="">
                                                                    <img class="accr_after_icon" src="/img/after_airplane_line.svg" alt="">
                                                                </div>
                                                            </div>
                        
                                                            <div class="accr_list_item_3">
                                                                <h4 class="txt_blue_secondary mb-0 h6">Catania Fontanarossa Airport (CTA)</h4>
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
                                                                    <img class="accr_icon" src="/img/location_icon.svg" alt="">
                                                                </div>
                                                            </div>
                        
                                                            <div class="accr_list_item_3">
                                                                <h4 class="txt_blue_secondary mb-0 h6">Paris Orly Airport (ORY)</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="sidebar_bottom_content pad__x">
                                    <div class="sidebar_bottom_list d-flex align-items-center justify-content-between sidebar_bottom_txt">
                                        <p class="mb-0 text_dark_blue h6">Tickets ( 1 people )</p>
                                        <p class="mb-0 text_dark_blue h6">3 429,66 kr</p>
                                    </div>
                                    
                                    <div class="sidebar_bottom_list d-flex align-items-center justify-content-between sidebar_bottom_txt">
                                        <p class="mb-0 text_dark_blue h6">Service fee</p>
                                        <p class="mb-0 text_dark_blue h6">167,00 kr</p>
                                    </div>
                                    
                                    <div class="sidebar_bottom_list d-flex align-items-center justify-content-between sidebar_bottom_txt">
                                        <h5 class="mb-0 text_dark_blue h6"><span class="fw_gilroy_bold">In total</span> ( including VAT )</h5>
                                        <h5 class="mb-0 text_dark_blue fw_gilroy_bold h6">3 596,66 kr</h5>
                                    </div>
                                </div>
                        
                                <div class="mb-3">
                                    <p class="text_silver text-center text-xl-start fs_14">Prices include VAT and may vary depending on availability. The price will be completed when the purchase is complete. Any additional fees can be reviewed before payment.</p>
                                </div>
                        
                                <div class="text-center">
                                    <p class="text_silver fs_14">The fine print , <a href="#" class="text_silver text-decoration-none fw_gilroy_bold">Terms of Use</a> and <a href="#" class="text_silver text-decoration-none fw_gilroy_bold">Privacy Policy</a></p>
                                </div>
                                <div class="append_button d-flex justify-content-center"></div>
                            </div>
                        </div>
                </form>
            </div>

    </div>
    @endsection


    @section('scripts-links')
    <script>
        // continue btn
        let continue_submit_btn = document.querySelector(".continue_submit_btn");
        let pay_lists = document.querySelector(".pay_lists");
        function myFunction(x) {
            if (x.matches) {
                continue_submit_btn.remove();
                pay_lists.remove();
                document.querySelector(".append_button").appendChild(continue_submit_btn);
                if(document.querySelector(".append_child_passenger_details")){
                    document.querySelector(".append_child_passenger_details").appendChild(pay_lists);
                }
            }else{
                continue_submit_btn.remove();
                pay_lists.remove();
                document.querySelector(".child_white_grids_left").appendChild(continue_submit_btn);
                document.querySelector(".append_on_desktop").appendChild(pay_lists);
            }
        }

        window.addEventListener("DOMContentLoaded", (e) => {
            var x = window.matchMedia("(max-width: 1200px)")
            myFunction(x)
            x.addListener(myFunction)
        })

        window.addEventListener("resize", ()=> {
            var x = window.matchMedia("(max-width: 1200px)")
            myFunction(x)
            x.addListener(myFunction)
        })

    // select_box
        let select_box = document.querySelectorAll(".child_select_box");
        for(let i = 0;i < select_box.length;i++){
        NiceSelect.bind(select_box[i]);
        }

    // checkboxes
        let checkbox = document.querySelectorAll(".payment_checkbox");

        checkbox[0].checked = true;

        if(checkbox[0].checked){
            checkbox[0].parentElement.parentElement.nextElementSibling.style.display = "flex";
        }else{
            checkbox[0].parentElement.parentElement.nextElementSibling.style.display = "none";
        }

        for(let i = 0;i < checkbox.length;i++){
            checkbox[i].addEventListener("click", (e) => {
                if(checkbox[0].checked){
                    checkbox[0].parentElement.parentElement.nextElementSibling.style.display = "flex";
                }else{
                    checkbox[0].parentElement.parentElement.nextElementSibling.style.display = "none";
                }

                // checkbox 1

                if(checkbox[1].checked){
                    checkbox[1].parentElement.parentElement.nextElementSibling.style.display = "flex";
                }else{
                    checkbox[1].parentElement.parentElement.nextElementSibling.style.display = "none";
                }
                
                // checkbox 2

                if(checkbox[2].checked){
                    checkbox[2].parentElement.parentElement.nextElementSibling.style.display = "flex";
                }else{
                    checkbox[2].parentElement.parentElement.nextElementSibling.style.display = "none";
                }

            });
        }

    </script>

    @endsection