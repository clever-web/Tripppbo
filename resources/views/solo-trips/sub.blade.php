@extends('master')
@section('css-links')
    <script src="https://js.stripe.com/v3"></script>
@endsection
@section('content')
    <div id="solo_sub_app" class="wrap_body index_wrap_body">
        <!-- hero -->
        <div class="container-lg pad_lg mt-sm-5 mt-4">
            <div class="hero_details">
                <!-- Slider main container -->
                <div class="swiper hero_slider">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide hotel_slide">
                            <h4 class="text_dark_blue mb-4">Moraine Lake</h4>
                            <img src="/img/hotel_slide_1.jpg"></img>
                        </div>
                        <div class="swiper-slide hotel_slide">
                            <h4 class="text_dark_blue mb-4">Moraine Lake</h4>
                            <img src="/img/hotel_slide_2.jpg" alt="">
                        </div>
                        <div class="swiper-slide hotel_slide">
                            <h4 class="text_dark_blue mb-4">Moraine Lake</h4>
                            <img src="/img/hotel_slide_3.jpg" alt="">
                        </div>
                    </div>

                    <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
                    <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
                </div>
                <div class="wrap_pagination_image">
                    <div class="slide_user_details me-auto box_shadow">
                        <!-- left -->
                        <div class="slide_user_details_left">
                            <div class="slide_user_details_left_img">
                                <div class="d-flex align-items-center">
                                    <img :src="trip.user.profile.picture_url ? '/storage/' + trip.user.profile.picture_url : '/images-n/profile-picture-place-holder.png'" alt="">
                                    <div class="ms-3">

                                        <h3 class="h6 text_dark_blue text-capitalize fw_gilroy_bold mb-1">@{{trip.user.name}}</h3>
                                      {{--   <p class="text_dark_blue mb-0 fs_14">Posted by Admin</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- right -->
                        <div class="slide_user_details_right">
                            <div>

                                <!-- 2 -->
                                <p class="mb-2 text_silver fs_14"><i class="fas fa-stopwatch me-1"></i>Trip Start date : 05
                                    June 2022</p>
                                <p class="mb-0 text_silver fs_14"><i class="fas fa-stopwatch me-1"></i>Trip End date : 11
                                    June 2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination mt-3"></div>
                </div>

            </div>
        </div>

        <!-- filter  -->
        <div class="wrap_account_filter">
            <div class="container-lg pad_lg">
                <div class="account_filter_buttons">
                    <div id="my_account_slider" class="swiper my_account_slider mx-0 flex-grow-1">
                        <div class="swiper-wrapper">
                            <!-- 1 -->
                            <div class="swiper-slide my_account_slide my_account_slide_active"
                                onclick="nextSlide(event, 'acc_filter_box_1')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path id="icons8_dashboard_layout"
                                        d="M9,2H4A2,2,0,0,0,2,4v7a2,2,0,0,0,2,2H9a2,2,0,0,0,2-2V4A2,2,0,0,0,9,2ZM20,2H15a2,2,0,0,0-2,2V7a2,2,0,0,0,2,2h5a2,2,0,0,0,2-2V4A2,2,0,0,0,20,2ZM9,15H4a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2H9a2,2,0,0,0,2-2V17A2,2,0,0,0,9,15Zm11-4H15a2,2,0,0,0-2,2v7a2,2,0,0,0,2,2h5a2,2,0,0,0,2-2V13A2,2,0,0,0,20,11Z"
                                        transform="translate(-2 -2)" />
                                </svg>
                                <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Overview</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- filter box -->

            <!-- 1 -->
            <div id="acc_filter_box_1" class="account_filter_box">
                <div class="my_account_content_dashboard mt-4">
                    <div class="container-lg pad_lg">
                        <div
                            class="maccount_dashboard_header txt_blue_secondary fw_gilroy_medium bg-white border_radius_20 my-3 mb-4 p-4">
                            <div class="overview_header mb-5 s_trip_two_content_wrapper w-100">
                                <div class="s_trip_content_item_wrapper">
                                    <div class="">
                                        <h2 class="h4 txt_blue_secondary fw_gilroy_bold">@{{trip.title}}</h2>
                                        <div>
                                            <div class="d-flex mb-2 align-items-center">
                                                {{-- <div class="image_wrapper_illustration">
                                                        <img src="/img/eye_icon_illustration.svg" alt="">
                                                    </div> --}}


                                            </div>
                                        </div>
                                    </div>

                                    <div class="overview_txt_description">
                                        <p class="txt_blue_secondary mb-4 fs_14">daw</p>
                                        <p class="txt_blue_secondary mb-0 fw_gilroy_medium fs_14">@{{trip.description}}</p>
                                    </div>
                                </div>

                                <div class="s_trip_content_item_wrapper_2">
                                    <p class="h6 txt_blue_secondary fw_gilroy_bold">Fund Collected</p>

                                    <div class="s_trip_progress_bar_wrapper pt-3">
                                        <div class="progress border_radius_20 s_trip_progress">
                                            <div class="progress-bar border_radius_20 s_trip_progress_bar"
                                                role="progressbar" style="width: 25%" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div>
                                            <p class="txt_blue_secondary fw_gilroy_medium mb-0">20€</p>
                                        </div>
                                    </div>

                                    <div class="fund_collected_progress text-center">
                                        <div>
                                            <p class="fw_gilroy_medium txt_blue_secondary fs_14 mb-0">11%</p>
                                            <p class="txt_silver fw_gilroy_regular fs_14 mb-0">Funded</p>
                                        </div>

                                        <div>
                                            <p class="fw_gilroy_medium txt_blue_secondary fs_14 mb-0">362€</p>
                                            <p class="txt_silver fw_gilroy_regular fs_14 mb-0">To Raise</p>
                                        </div>

                                        <div>
                                            <p class="fw_gilroy_medium txt_blue_secondary fs_14 mb-0">60</p>
                                            <p class="txt_silver fw_gilroy_regular fs_14 mb-0">Days Left</p>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a v-on:click.prevent="showCheckout" class="btn medium_btn btn_pink">Fund This Trip</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 my-5">
                                <div id="paymentContainer" style="max-width: 800px;margin: 0 auto"></div>
                            </div>
                            <div class="map_wrapper w-100 border_radius_20 overflow-hidden">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d193571.94798652857!2d-74.0085179!3d40.70565!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1656400366716!5m2!1sen!2sbd"
                                    width="100%" height="490" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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
     window.stripe = Stripe('{{ config('services.stripe.key') }}');


        const solo_sub_app = new Vue({
            el: "#solo_sub_app",
            data: {
                trip: @json($trip),
                is_checkout_initilized: false,
                is_checkout_visible: false
            },
            methods: {
                showCheckout: async function()
                {
                    if (this.is_checkout_initilized == false)
                    {
                        await this.prepareCheckout();
                        this.is_checkout_initilized = true;
                    }

                },
                prepareCheckout: async function() {
                    let f = new FormData();
                    f.append('data', JSON.stringify(this.data));
                    let resp = await axios.post('/flights/prepare_payment', f);
                    let client_secret = resp.data
                    const options = {
                        clientSecret: client_secret,
                    };
                    const elements = stripe.elements(options);


                    const paymentElement = elements.create("payment");
                    paymentElement.mount("#paymentContainer");
                    this.payment_element = elements

                },
            },
            mounted: async function()
            {
           //     await this.prepareCheckout();
            }
        })
        const swiper = new Swiper('.hero_slider', {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                clickable: true,
                el: '.wrap_pagination_image .swiper-pagination',
            },
            navigation: {
                nextEl: '.hero_details .swiper-button-next',
                prevEl: '.hero_details .swiper-button-prev',
            },
        });

        const my_account_slider = new Swiper('#my_account_slider', {
            slidesPerView: "auto",
            navigation: {
                nextEl: '.wrap_acc_buttons .swiper-button-next',
                prevEl: '.wrap_acc_buttons .swiper-button-prev',
                clickable: true
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                    allowTouchMove: false
                },
                567: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    allowTouchMove: false
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    allowTouchMove: false
                },
                900: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                    allowTouchMove: false
                },
                1200: {
                    slidesPerView: "auto",
                    spaceBetween: 20,
                },
            },
        });


        var j, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("my_account_slide");
        tabcontent[0].style.display = "flex";

        function nextSlide(evt, cityName) {
            tabcontent = document.getElementsByClassName("account_filter_box");
            for (j = 0; j < tabcontent.length; j++) {
                tabcontent[j].style.display = "none";
            }
            tablinks = document.getElementsByClassName("my_account_slide");
            for (j = 0; j < tablinks.length; j++) {
                tablinks[j].className = tablinks[j].className.replace(" my_account_slide_active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " my_account_slide_active";
        }

        // slide button click
        function s_slide_active(e) {
            if (e.classList.contains(".swiper-button-disabled") == false) {
                setTimeout(() => {
                    document.querySelector(".my_account_slide_active").classList.remove("my_account_slide_active")
                    document.querySelector(".wrap_account_filter .swiper-slide-active").classList.add(
                        "my_account_slide_active")
                    document.querySelector(".wrap_account_filter .swiper-slide-active").click()
                }, 0)
            }
        }
        /*
            if(document.getElementsByClassName('child_select_box').length > 0){
                let select_box = document.querySelectorAll(".child_select_box");
                for(let i = 0;i < select_box.length;i++){
                    NiceSelect.bind(select_box[i]);
                }
            } */

        // calendar show when focus
        let input__date = document.querySelectorAll(".input__date");
        let wrap_calendar = document.querySelector(".wrap_calendar");
        let wrap_date_after_box = document.querySelector(".wrap_date_after_box");

        for (let i = 0; i < input__date.length; i++) {
            input__date[i].addEventListener("focus", (e) => {
                input__date[0].setAttribute("style", `position: relative;z-index: 42;`)
                input__date[1].setAttribute("style", `position: relative;z-index: 42;`)
                wrap_calendar.classList.add("wrap_calendar_active");
                wrap_date_after_box.classList.add("wrap_date_after_box_active");
            })

            wrap_date_after_box.addEventListener("click", (e) => {
                input__date[0].removeAttribute("style");
                input__date[1].removeAttribute("style");
                wrap_calendar.classList.remove("wrap_calendar_active");
                e.target.classList.remove("wrap_date_after_box_active")
            })
        }

        let hotel_slide = document.querySelectorAll(".hotel_slide");
        let swiper_pagination_bullet = document.querySelectorAll(
            ".hero_details .swiper-pagination .swiper-pagination-bullet");
        for (let i = 0; i < hotel_slide.length; i++) {
            let get_src = hotel_slide[i].querySelector("img").src;
            swiper_pagination_bullet[i].innerHTML = `<img src="${get_src}">`;
        }

        let acceptBtn = document.querySelectorAll(".member_accept_btn");

        for (let a = 0; a < acceptBtn.length; a++) {
            acceptBtn[a].addEventListener('click', () => {
                acceptBtn[a].classList.toggle('accepted_btn');
                if (acceptBtn[a].classList.contains('accepted_btn')) {
                    acceptBtn[a].innerHTML = "Accepted";
                    acceptBtn[a].parentElement.parentElement.classList.add('accepted_bg');
                } else {
                    acceptBtn[a].innerHTML = "Accept";
                    acceptBtn[a].parentElement.parentElement.classList.remove('accepted_bg');
                }
            });
        }
    </script>
@endsection
