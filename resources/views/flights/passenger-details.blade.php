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
                        <div class="step_box">
                            <div class="step_circle"></div>
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
                                <div class="c_w_g_left_child_1 c_w_g_left_child_4 white_grids_mb pad__x">
                                    <div class="quick_registation">
                                        <!-- quick_registation_left -->
                                            <div class="quick_registation_left">
                                                <h4 class="mb-2 fw_gilroy_bold text_dark_blue h6">Quick registation</h4>
                                                <p class="mb-0 text_silver fs_14">Skip to fill in all your details by registering though facebook or google.</p>
                                            </div>
                                        <!-- quick_registation_right -->
                                            <div class="quick_registation_right">
                                                <a class="mb-3 fs_14" href="#"><i class="me-2 fab fa-facebook"></i> Log in with Facebook </a>
                                                <a class="fs_14" href="#"><i class="me-2 fab fa-google"></i> Log in with Facebook </a>
                                            </div>
                                    </div>
                                    <div class="or_divider_box">
                                        <span></span>
                                        <h5 class="mb-0 h6">OR</h5>
                                        <span></span>
                                    </div>
                                    <div class="passenger_details_box">
                                        <h4 class="text_dark_blue fw_gilroy_bold h6">Passenger details</h4>
                                        <p class="text_pink fw_gilroy_medium fs_14">These passenger details must match your passport or photo ID.</p>
                                        <div class="row mt-4 pt-2 fw_gilroy_bold">
                                            <div class="col-sm-6 mb-3">
                                                <label for="input__gray_name" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">first name</label>
                                                <input type="text" class="form-control input__gray fs_14" id="input__gray_name">
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <label for="input__gray_surname" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">surname</label>
                                                <input type="text" class="form-control input__gray fs_14" id="input__gray_surname">
                                            </div>
                                            <div class="radio__box col-md-6 col-sm-4 py-3">
                                                <div class="me-4">
                                                    <input id="radio__input" checked type="radio" class="fs_14" name="radio__input" value="herr" />
                                                    <label for="radio__input" class="fs_14 fw_gilroy_bold text-capitalize text_dark_blue">herr</label>
                                                </div>
                                                <div>
                                                    <input id="radio__input2" type="radio" class="fs_14" name="radio__input" value="fru" />
                                                    <label for="radio__input2" class="fs_14 fw_gilroy_bold text-capitalize text_dark_blue">fru</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-8">
                                                <label class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">date of birth</label>
                                                <div class="wrap_input_grays">
                                                    <input type="text" class="form-control input__gray input__gray_sm fs_14">
                                                    <input type="text" class="form-control input__gray input__gray_sm fs_14">
                                                    <input type="text" class="form-control input__gray input__gray_md fs_14">
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
                                            <label for="input__gray_email" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">email address</label>
                                            <input type="email" class="form-control input__gray fs_14" id="input__gray_email">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="input__gray_phone" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">phone number</label>
                                            <input type="number" class="form-control input__gray fs_14" id="input__gray_phone">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="input__gray_address_1" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">adress 1</label>
                                            <input type="text" class="form-control input__gray fs_14" id="input__gray_address_1">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="input__gray_address_2" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">address 2 (optional)</label>
                                            <input type="text" class="form-control input__gray fs_14" id="input__gray_address_2">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="input__gray_city" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">city</label>
                                            <input type="text" class="form-control input__gray fs_14" id="input__gray_city">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="input__gray_postcode" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">postcode</label>
                                            <input type="text" class="form-control input__gray fs_14" id="input__gray_postcode">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="input__gray_country" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">county / region (optional)</label>
                                            <input type="text" class="form-control input__gray fs_14" id="input__gray_country">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="input__gray_region" class="form-label fw_gilroy_bold text-capitalize text_dark_blue fs_14">homeland / region</label>
                                            <select class="select_gray input__gray child_select_box region_p">
                                                <option selected>homeland / region</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <!-- 3 -->
                                <div class="append_on_desktop">
                                    <div class="c_w_g_left_child_1 c_w_g_left_child_4 c_w_g_left_child_5">
                                        <div class="wrap_p_details_bottom_row mb-4">
                                            <label class="btn_toggle_pink btn_toggle_pink_2">
                                                <input type="checkbox">
                                                <span></span>
                                            </label>
                                            <p class="mb-0 mx-3 fw_gilroy_medium text_dark_blue fs_14">Create an account for faster booking.</p>
                                            <a class="text_pink text-decoration-none fw_gilroy_bold text_dark_blue fs_14" href="#">See benefits</a>
                                        </div>
                                        <div class="wrap_p_details_bottom_row wrap_p_details_bottom_row_2">
                                            <label>
                                                <input id="send_travel_input" type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <p id="send_travel" class="mb-0 ms-5 fw_gilroy_medium text_dark_blue fs_14">Send travel deals, reminders and other updates via email.</p>
                                        </div>
                                    </div>
                                </div>
                            <!-- continue -->
                                <button type="submit" class="mb-2 continue_submit_btn fs_14">Review travel details</button>

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
        let c_w_g_left_child_5 = document.querySelector(".c_w_g_left_child_5");
        function myFunction(x) {
            if (x.matches) {
                continue_submit_btn.remove();
                c_w_g_left_child_5.remove();
                document.querySelector(".append_button").appendChild(continue_submit_btn);
                if(document.querySelector(".append_child_passenger_details")){
                    document.querySelector(".append_child_passenger_details").appendChild(c_w_g_left_child_5);
                }
            }else{
                continue_submit_btn.remove();
                c_w_g_left_child_5.remove();
                document.querySelector(".child_white_grids_left").appendChild(continue_submit_btn);
                document.querySelector(".append_on_desktop").appendChild(c_w_g_left_child_5);
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

    // send_travel
        let send_travel = document.querySelector("#send_travel");
        let send_travel_input = document.querySelector("#send_travel_input");
        send_travel.addEventListener("click", () => {
            if(send_travel_input.checked){
                send_travel_input.checked = false;
            }else{
                send_travel_input.checked = true;
            }
        })
    </script>

    @endsection