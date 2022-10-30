@extends("master")


@section("content")
<div class="wrap_body">
    <div class="about_us_hero">
        <img src="img/about_us_hero.svg" alt="">
    </div>

    <!-- about us > whou we are -->
        <div class="container-lg pad_lg py-4">
            <div class="about_us_sec_2 row">
                <h2 class="h4 fw_gilroy_bold col-md-4">Find More About Us Who We Are</h2>
                <div class="col-md-8">
                    <p class="fs_14 text_dark_blue">Trippbo is a fantastic platform for travel lovers. We exist to look after your travelling preferences, bringing you some exclusive features to make your trips memorable. We have plans to settle your worries about trip funds, providing you company to travel with, and some special lottery offers.</p>
                    <p class="fs_14 text_dark_blue">Have you ever dreamt of exploring the breathtaking sceneries, the verdant beauty of the world, and the heavenly tourist spots across the globe? Did your dream not come true due to a shortage of funds or lacking travellers company? Now trippbo is here to take care of your dreams to travel the world.</p>
                </div>
            </div>
        </div>

    <!-- about us > white 2 boxes -->
        <div class="container-lg pad_lg py-5 pb-4">
            <div class="wrap_about_trip_box">
                <!-- 1 -->
                    <div class="box_shadow about_trip_box">
                        <img src="img/friends-clapping-hands.png" alt="">
                        <h4 class="h6 mt-3 text_dark_blue fw_gilroy_bold">Fund My Trips</h4>
                        <p class="fs_14 text_dark_blue mb-2">Are you eager to travel but hesitant to travel alone? Trippbo has this amazing feature for you to provide you company of travellers. Fund my trips feature enables you to post your trip and invite other travellers to accompany you on the trip. Now your trip</p>
                        <p class="fs_14 text_dark_blue mb-2">Enjoy your journey with joyous trippbo travellers company.</p>
                        <p class="fs_14 text_dark_blue mb-2">Those desperate to travel but have no funds can avail this great offer to travel with the trip creator. Lodge a join request on the trips posted here and be among the lucky ones to travel. The trip creator will select the winner and manage the travel and a</p>
                        <p class="fs_14 text_dark_blue mb-2">Join trippbo to make your travel dreams come true.</p>
                        <a href="#" class="btn_about_us fs_14 mt-4 mb-md-3 mb-2">Join trippbo</a>    
                    </div>
                <!-- 2 -->
                    <div class="box_shadow about_trip_box">
                        <img src="img/stock-photo-young-woman-enjoy-travelling-by.png" alt="">
                        <h4 class="h6 mt-3 text_dark_blue fw_gilroy_bold">Fund My Trips</h4>
                        <p class="fs_14 text_dark_blue mb-2">Are you eager to travel but hesitant to travel alone? Trippbo has this amazing feature for you to provide you company of travellers. Fund my trips feature enables you to post your trip and invite other travellers to accompany you on the trip. Now your trip</p>
                        <p class="fs_14 text_dark_blue mb-2">Enjoy your journey with joyous trippbo travellers company.</p>
                        <p class="fs_14 text_dark_blue mb-2">Those desperate to travel but have no funds can avail this great offer to travel with the trip creator. Lodge a join request on the trips posted here and be among the lucky ones to travel. The trip creator will select the winner and manage the travel and a</p>
                        <p class="fs_14 text_dark_blue mb-2">Join trippbo to make your travel dreams come true.</p>
                        <a href="#" class="btn_about_us fs_14 mt-4 mb-md-3 mb-2">Join trippbo</a>    
                    </div>
            </div>
        </div>

    <!-- ticket gallery -->
        <div class="wrap_ticket_gallery pt-3">
            <div class="ticket_gallery_box">
                <div class="container-lg pad_lg">
                    <div class="row ticketGallery_row">
                        <div class="col-lg-6 ticketGallery_left">
                            <h3 class="h5 fw_gilroy_bold text-white">Tickets Lottery</h3>
                            <p class="text-white">Trippbo brings a marvellous opportunity for travel lovers to get free trips. You must have ever thought of travelling to your dream destinations free of cost; finally, you can be among the lucky ones to travel with trippbo free tickets. Buy an entry ticket</p>
                            <p class="text-white">Now you can dream of free trips with trippbo.</p>
                            <a href="#" class="btn_about_us btn_about_us_white fs_14 mt-4 mx-0">Join trippbo</a>   
                        </div>
                        <div class="col-lg-6 ticketGallery_right">
                            <img src="img/ticketGallery_right.svg" alt="">
                        </div>
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
