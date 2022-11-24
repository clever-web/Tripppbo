    @extends("master")



    @section("content")
    <div class="wrap_body pt-5">
        <div class="container-lg pad_lg">

            <div class="text-center">
                <h2 class="h3 txt_blue_secondary fw_gilroy_medium mb-0">How It's Works</h2>
                <p class="txt_blue_secondary fw_gilroy_medium">Fund My Tip</p>
            </div>

            <div class="row_trip_white_boxes">
                <!-- 1 -->
                    <div class="row_trip_white_box bg-white box_shadow border_radius_20 mb-4">
                        <!-- left -->
                            <div class="row_trip_white_box_left position-relative">
                                <div class="row_trip_white_box_left_after">1</div>
                                <h3 class="h4 txt_blue_secondary fw_gilroy_medium">User Can Post The Trip</h3>
                                <p class="txt_blue_secondary fw_gilroy_light mb-0">Those desperate to travel but have no funds can avail this great offer to travel with the trip creator. User Can Post the Trip request by itself but also able to send the request to design trip</p>
                            </div>
                        <!-- right -->
                            <div class="row_trip_white_box_right">
                                <img src="/img/user_can_post_the_trip_img.svg" alt="">
                            </div>
                    </div>
                <!-- 2 -->
                    <div class="row_trip_white_box row_trip_white_box2 bg-white box_shadow border_radius_20 mb-4">
                        <!-- right -->
                            <div class="row_trip_white_box_right">
                                <img src="/img/request_to_join_img.svg" alt="">
                            </div>
                        <!-- left -->
                            <div class="row_trip_white_box_left position-relative">
                                <div class="row_trip_white_box_left_after">2</div>
                                <h3 class="h4 txt_blue_secondary fw_gilroy_medium">Request To Join</h3>
                                <p class="txt_blue_secondary fw_gilroy_light mb-0">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata</p>
                            </div>
                    </div>
                <!-- 3 -->
                    <div class="row_trip_white_box bg-white box_shadow border_radius_20 mb-4">
                        <!-- left -->
                            <div class="row_trip_white_box_left position-relative">
                                <div class="row_trip_white_box_left_after">3</div>
                                <h3 class="h4 txt_blue_secondary fw_gilroy_medium">Chat Any Time</h3>
                                <p class="txt_blue_secondary fw_gilroy_light mb-0">Quasi ut numquam corporis nihil vel aliquid pariatur et id. Laborum hic rerum et necessitatibus rerum ipsam architecto vero harum. Laboriosam non sit totam corrupti dolore quidem voluptatem harum.</p>
                            </div>
                        <!-- right -->
                            <div class="row_trip_white_box_right pb-0 pt-4">
                                <img class="mt-3" src="/img/chat_anytime_img.png" alt="">
                            </div>
                    </div>
                <!-- 4 -->
                    <div class="row_trip_white_box row_trip_white_box2 bg-white box_shadow border_radius_20 mb-4">
                        <!-- right -->
                            <div class="row_trip_white_box_right">
                                <img src="/img/select_travel_partner_img.png" alt="">
                            </div>
                        <!-- left -->
                            <div class="row_trip_white_box_left position-relative">
                                <div class="row_trip_white_box_left_after">4</div>
                                <h3 class="h4 txt_blue_secondary fw_gilroy_medium">Select Travel Partner</h3>
                                <p class="txt_blue_secondary fw_gilroy_light mb-0">Sit est accusantium eius qui numquam corporis quisquam quod mollitia. Explicabo voluptatem labore voluptatibus accusamus est dolor deleniti. Quia dignissimos et aut voluptatem sunt tempora et. Dolor voluptate qui eum minus et dicta ea facere qui.</p>
                            </div>
                    </div>
                <!-- 5 -->
                    <div class="row_trip_white_box bg-white box_shadow border_radius_20 mb-4">
                        <!-- left -->
                            <div class="row_trip_white_box_left position-relative">
                                <div class="row_trip_white_box_left_after">5</div>
                                <h3 class="h4 txt_blue_secondary fw_gilroy_medium">Chat Any Time</h3>
                                <p class="txt_blue_secondary fw_gilroy_light mb-0">Quasi ut numquam corporis nihil vel aliquid pariatur et id. Laborum hic rerum et necessitatibus rerum ipsam architecto vero harum. Laboriosam non sit totam corrupti dolore quidem voluptatem harum.</p>
                            </div>
                        <!-- right -->
                            <div class="row_trip_white_box_right">
                                <img src="/img/join_trip_together_img.png" alt="">
                            </div>
                    </div>

            </div>
        </div>

        <!-- stay_in_the_know -->
            <div class="stay_in_the_know">
                <div class="container-lg pad_lg">
                    <div class="row gx-0">
                        <div class="col-md-7 mx-auto">
                            <h2 class="h2 text-white fw_gilroy_medium text-center">Stay In The Know</h2>
                            <p class="text-center text-white">Dolor magnam totam. Laudantium molestiae error molestias rerum. Aut possimus eum eum sint nihil quia. </p>
                            <form class="row gx-0 mt-4">
                                <div class="col-md-9 col-sm-8 pe-2 mb-sm-0 mb-3">
                                    <input class="w-100 h-100 stay_input" type="text" placeholder="Enter Your Email Address">
                                </div>
                                <div class="col-md-3 col-sm-4 col-5 mx-auto">
                                    <button type="submit" class="btn btn_dark_blue2 medium_btn btn_style text-capitalize px-2 d-block w-100">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    @endsection
    @section("scripts-links")
    <script>
        if(document.getElementsByClassName('child_select_box').length > 0){
            let select_box = document.querySelectorAll(".child_select_box");
            for(let i = 0;i < select_box.length;i++){
                NiceSelect.bind(select_box[i]);
            }
        }

    </script>
    @endsection
