@extends('master')
@section('css-links')
    <style>
        .selected_interest {
            background: var(--dark_blue);
            color: var(--white);
        }

        .user_side_hero>img {
            max-height: 360px;
        }

        #gallery_calendar {
            padding-left: 10px;
        }
    </style>
@endsection
@section('content')
    <div id="main_vue_app">

        <div id="edit_personal_information" class="user_side_form_box"
            :class="{ user_side_form_box_active: editingPersonalInformation }">
            <form class="bg-white border_radius_20">
                <!-- user_side_header -->
                <div class="user_side_header mb-4">
                    <h5 class="text_dark_blue fw_gilroy_bold mb-0">Edit Personal Information</h5>
                    <div v-on:click="editingPersonalInformation = false;"><img class="user_side_header_cross"
                            src="/img/icons8_delete.svg" alt=""></div>
                </div>
                <!-- 2 -->
                <div class="w-100 mb-4">
                    <label for="input__gray_desc"
                        class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Description</label>
                    <textarea v-model="newDescription" class="form-control input__gray input_review" placeholder="Enter description here"
                        id="special_request" rows="6"></textarea>
                </div>
                <!-- 3 -->
                <div class="row gx-3 mb-4">
                    <div class="col-sm-6 mb-sm-0 mb-3">
                        <h3 class="h6 mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Current City</h3>
                        <div class="wrap_input_gray_icon">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <input autocomplete="off" v-model="currentCitySearchText" type="text" required
                                placeholder="Add Your Location" class="form-control input__gray input_contact_center"
                                id="input__gray_location">
                            <autocomplete-component style="z-index: 1200;"
                                @autocomplete_result_selected="current_city_selected" :keyword="currentCitySearchText">
                            </autocomplete-component>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h3 class="h6 mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Home Town</h3>
                        <div class="wrap_input_gray_icon">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <input autocomplete="off" v-model="hometownSearchText" type="text" required
                                placeholder="Add Your Location" class="form-control input__gray input_contact_center"
                                id="input__gray_location">
                            <autocomplete-component style="z-index: 1200;"
                                @autocomplete_result_selected="current_hometown_selected" :keyword="hometownSearchText">
                            </autocomplete-component>
                        </div>
                    </div>
                </div>
                <!-- 4 -->
                <h5 class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue h6">Mobile Number</h5>

                <div class="row gx-0 mb-4">

                    <div class="col-12">
                        <div class="d-flex " class="py-3">
                            <phone-number @phone_number_updated="update_phone_number" :current_phone_number="newPhoneNr">
                            </phone-number>
                        </div>
                    </div>
                </div>
                <!-- 5 -->
                <div class="row gx-0 mb-4">
                    <label for="e_mail" class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">Email
                        Address</label>
                    <input readonly type="email" required class="col-12 form-control input__gray input_review fs_14"
                        id="e_mail" placeholder="Valid Email Id">
                </div>
                <!-- 6 -->
                <div class="row gx-0 mb-2">
                    <button v-on:click.prevent="update_personal_information"
                        class="btn py-2 btn_pink medium_btn d-block col-xl-3 col-lg-4 col-md-5 col-8 ms-auto">Save</button>
                </div>

            </form>
        </div>

        <!-- 2 -->
        <div id="edit_interests" class="user_side_form_box"
            :class="{ user_side_form_box_active: editingPersonalInterests }">
            <div class="user_side_popup_after"></div>
            <form class="bg-white border_radius_20">
                <!-- user_side_header -->
                <div class="user_side_header mb-4">
                    <h5 class="text_dark_blue fw_gilroy_bold mb-0">Interests</h5>
                    <div v-on:click="editingPersonalInterests = false;"><img class="user_side_header_cross"
                            src="/img/icons8_delete.svg" alt=""></div>
                </div>
                <!-- 2 -->
                <div class="d-flex flex-wrap mb-5">
                    <template v-for="(interest, index) in userInterestList">
                        <a style="cursor: pointer" class="fs_14 interest_tag_item" v-on:click="toggleUserInterest(interest)"
                            :class="{ selected_interest: interestAlreadySelected(interest.id) }">@{{ interest.interest_name }}</a>
                    </template>
                    <a href="#" class="fs_14 interest_tag_item interest_tag_item_pink text-capitalize">
                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.754 16.754">
                            <path id="icons8_plus_math" d="M16.33,9v7.33H9v2.094h7.33v7.33h2.094v-7.33h7.33V16.33h-7.33V9Z"
                                transform="translate(-9 -9)" />
                        </svg>
                        Add more
                    </a>
                </div>
                <!-- 3 -->
                <div class="row gx-0 mb-2">
                    <button v-on:click.prevent="update_user_interests"
                        class="btn py-2 btn_pink medium_btn d-block col-xl-3 col-lg-4 col-md-5 col-8 ms-auto me-2">Save</button>
                </div>

            </form>
        </div>
        <!-- 3 -->
        <div id="edit_languages" class="user_side_form_box" :class="{ user_side_form_box_active: editingUserLanguageList }">
            <div v-on:click="editingUserLanguageList = false" class="user_side_popup_after"></div>
            <form class="bg-white border_radius_20">
                <!-- user_side_header -->
                <div class="user_side_header mb-4">
                    <h5 class="text_dark_blue fw_gilroy_bold mb-0">languages</h5>
                    <div v-on:click="editingUserLanguageList = false"><img class="user_side_header_cross"
                            src="/img/icons8_delete.svg" alt=""></div>
                </div>
                <!-- 2 -->
                <div class="d-flex flex-wrap mb-5">
                    <template v-for="(language, index) in userLanguageList.slice(0, numberOfVisibleLanguages)">
                        <a style="cursor: pointer" class="fs_14 interest_tag_item"
                            v-on:click="toggleUserLanguage(language)"
                            :class="{ selected_interest: languageAlreadySelected(language.id) }">@{{ language.name }}
                            (@{{ language.nativeName }})</a>
                    </template>


                    <a v-if="numberOfVisibleLanguages < userLanguageList.length" style="cursor: pointer"
                        v-on:click="numberOfVisibleLanguages = userLanguageList.length"
                        class="fs_14 interest_tag_item interest_tag_item_pink text-capitalize">
                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.754 16.754">
                            <path id="icons8_plus_math"
                                d="M16.33,9v7.33H9v2.094h7.33v7.33h2.094v-7.33h7.33V16.33h-7.33V9Z"
                                transform="translate(-9 -9)" />
                        </svg>
                        See All
                    </a>
                </div>
                <!-- 3 -->
                <div class="row gx-0 mb-2">
                    <button v-on:click.prevent="update_user_languages"
                        class="btn py-2 btn_pink medium_btn d-block col-xl-3 col-lg-4 col-md-5 col-8 ms-auto me-2">Save</button>
                </div>

            </form>
        </div>
        <!-- 4 -->
        <div id="edit_gallery" class="user_side_form_box"
            :class="{ 'user_side_form_box_active': uploadNewAlbumPanelVisible }">
            <form class="bg-white border_radius_20">
                <!-- user_side_header -->
                <div class="user_side_header mb-4">
                    <h5 class="text_dark_blue fw_gilroy_bold mb-0">Create a new galery</h5>
                    <div v-on:click="uploadNewAlbumPanelVisible = false"><img class="user_side_header_cross"
                            src="/img/icons8_delete.svg" alt=""></div>
                </div>
                <!-- 2 -->
                <div class="row gx-0">
                    <div class="col-md-7 ps-0 pe-md-3 mb-4">
                        <div class="mb-3">
                            <label for="gallery_title"
                                class="col-12 mb-2 text-capitalize text_dark_blue fw_gilroy_bold">Title</label>
                            <input v-model="newAlbumTitle" type="text" required
                                class="col-12 form-control input__gray input_review fs_14" id="gallery_title"
                                placeholder="Title...">
                        </div>
                        <div class="w-50 mb-3">
                            <label for="gallery_calendar"
                                class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Location</label>
                            <div class="wrap_input_gray_icon">
                                {{-- <i class="me-2"><img class="mb-1" width="16" src="/img/icons8_calendar_plus.svg"
                                        alt=""></i> --}}
                                <input v-model="newAlbumLocation" type="text" required="" placeholder=""
                                    class="form-control input__gray input_contact_center fs_14" id="gallery_calendar">
                            </div>
                        </div>
                        <div class="w-100">
                            <label for="input__gray_desc"
                                class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Description</label>
                            <textarea v-model="newAlbumDescription" class="form-control input__gray input_review" id="input__gray_desc"
                                rows="6"></textarea>
                        </div>
                    </div>
                    <div class="col-md-5 pe-0 ps-md-2 mb-4">
                        <h3 class="h6 mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Travel Arrangements Needed</h3>
                        <div class="gallery_poup_file_girds mb-3">
                            <!-- 1 -->
                            <div class="wrap_create_file_upload wrap_gallery_popup_upload">
                                <img src="/img/upload_icon.svg" alt="">
                                <span class="ms-2 mt-2">Drag and drop here</span>
                                <input @change="onChangeNewAlbumUpload" type="file" multiple>
                            </div>
                            <!-- 2 -->
                            <div class="column_gallery_images">
                                <div class="gallery_image_box" v-for="i in newAlbumPreviewImages"><img
                                        :src="i"
                                        style="width:60px;height:60px;border:none;border-radius:10px;"></div>

                            </div>
                        </div>
                        <h3 class="h6 mb-3 text-capitalize fw_gilroy_bold text_dark_blue">Travel Arrangements Needed</h3>
                        <div class="d-flex flex-wrap">
                            <a href="#" class="fs_14 interest_tag_item px-4">USA</a>
                            <a href="#" class="fs_14 interest_tag_item px-4">Canada</a>
                            <a href="#" class="fs_14 interest_tag_item px-4">India</a>
                            <button class="fs_14 bg-transparent mt-1 plus_gallery_modal"><img
                                    src="/img/icons8_plus_+_1.svg" alt=""></button>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 ms-auto d-flex justify-content-end mb-2">
                        <button v-on:click.prevent="uploadNewAlbum"
                            class="btn py-2 px-4 btn_pink medium_btn fs_14 d-block mb-1 w-100">Publish</button>
                    </div>
                </div>

            </form>
        </div>



        <div class="wrap_body">
            <!-- user_side_hero -->
            <div class="user_side_hero">
                <img :src="wallImage" alt="">
                <div class="container-lg position-relative">
                    <button v-if="owner_mode == true" class="user_side_image_change"><img src="/img/camera2.svg"
                            alt=""><input type="file" @change="onChangeWallImage" name=""
                            id=""></button>
                </div>
            </div>

            <!-- user side grids wrapper -->
            <div class="user_side_grids_wrapper">
                <div class="container-lg pad_lg">
                    <div class="user_side_row">
                        <!-- user_side_profile -->
                        <div class="user_side_profile">
                            <!-- 1 -->
                            <div class="wrap_user_side_img mb-4">
                                <input type="file" accept="image/png, image/gif, image/jpeg" style="display: none"
                                    @change="onChangeProfileImage" id="images_to_be_uploaded_profile_image" />

                                <img :src="profileImage" alt="">
                                <div class="user_side_plus">
                                    <img v-if="owner_mode == true" src="/img/user_side_plus.svg"
                                        v-on:click="openDialogProfileImage" alt="">
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="user_side_details">
                                <h3 class="h6 text_dark_blue fw_gilroy_bold text-center">{{ $user->name }}</h3>
                                <div class="d-flex justify-content-center mb-1">
                                    <img width="17" class="me-1" src="/img/user_star_gold.svg" alt="">
                                    <img width="17" class="me-1" src="/img/user_star_gold.svg" alt="">
                                    <img width="17" class="me-1" src="/img/user_star_gold.svg" alt="">
                                    <img width="17" class="me-1" src="/img/user_star_gold.svg" alt="">
                                    <img width="17" src="/img/user_star_silver.svg" alt="">
                                </div>
                                <p class="mb-0 text_silver text-center fs_14">25 Reviews</p>
                                {{-- <ul class="ps-0 user_side_action mt-3">
                                    <li class="me-3"><a href="#"><i class="fas fa-video"></i></a></li>
                                    <li class="me-3"><a href="#"><i class="fas fa-phone-alt"></i></a></li>
                                    <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                                </ul> --}}
                            </div>
                            <div class="user_side_social_details">
                                {{-- <h5 class="text_pink h2 text-center mb-0 fw_gilroy_medium lh-1">203</h5>
                                <h6 class="text_pink text-center fw_gilroy_regular lh-1">Followers</h6>
                                <ul class="ps-0 user_side_action2 mt-5 mb-4">
                                    <li class="me-4"><a href="#"><img width="25" src="/img/twitter_icon.svg"
                                                alt=""></a></li>
                                    <li class="me-4"><a href="#"><img width="25"
                                                src="/img/facebook_icon.svg" alt=""></a></li>
                                    <li><a href="#"><img width="25" src="/img/instagram_icon.svg"
                                                alt=""></a></li>
                                </ul> --}}
                                <p class="text_dark_blue d-flex justify-content-between mb-0 fs_14">Email <span
                                        class="ms-2 text_silver"></span> <img v-if="emailVerified"
                                        src="/img/icons8_ok.svg" alt="">
                                    <span v-if="!emailVerified" class="mb-0 fw_gilroy_medium text_red ms-1"><img
                                            width="18" src="/img/cross_small.svg" alt=""> Not Verified</span>

                                </p>
                                <p class="text_dark_blue d-flex justify-content-between mb-0 fs_14">Phone <span
                                        class="ms-2 text_silver"></span>
                                    <img v-if="phoneVerified" src="/img/icons8_ok.svg" alt="">
                                    <span v-if="!phoneVerified" class="mb-0 fw_gilroy_medium text_red ms-1"><img
                                            width="18" src="/img/cross_small.svg" alt=""> Not Verified</span>


                                </p>
                            </div>
                            <p class="text-center text_silver mb-0 fs_14">Member since Nov 15, 2021</p>
                        </div>

                        <!-- user_side_fillters -->
                        <div class="user_side_fillters mb-5">
                            <div class="account_filter_buttons mt-md-0 mb-4">
                                <div class="wrap_acc_buttons wrap_acc_buttons1">
                                    <div class="swiper-button-prev">
                                        <img src="/img/arrow_right_l.svg" alt="">
                                    </div>
                                    <div class="swiper-button-next">
                                        <img src="/img/arrow_left_l.svg" alt="">
                                    </div>
                                </div>
                                <div id="my_account_slider" class="swiper my_account_slider mx-0 flex-fill">
                                    <div class="swiper-wrapper">
                                        <!-- 1 -->
                                        <div class="swiper-slide my_account_slide my_account_slide_active"
                                            v-on:click="nextSlide($event, 'acc_filter_box_1')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path id="icons8_dashboard_layout"
                                                    d="M9,2H4A2,2,0,0,0,2,4v7a2,2,0,0,0,2,2H9a2,2,0,0,0,2-2V4A2,2,0,0,0,9,2ZM20,2H15a2,2,0,0,0-2,2V7a2,2,0,0,0,2,2h5a2,2,0,0,0,2-2V4A2,2,0,0,0,20,2ZM9,15H4a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2H9a2,2,0,0,0,2-2V17A2,2,0,0,0,9,15Zm11-4H15a2,2,0,0,0-2,2v7a2,2,0,0,0,2,2h5a2,2,0,0,0,2-2V13A2,2,0,0,0,20,11Z"
                                                    transform="translate(-2 -2)" />
                                            </svg>
                                            <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">overview</p>
                                        </div>
                                        <!-- 2 -->
                                        <div class="swiper-slide my_account_slide"
                                            v-on:click="nextSlide($event, 'acc_filter_box_2')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 20">
                                                <path id="icons8_camera"
                                                    d="M12.236,4a2,2,0,0,0-1.789,1.105l-.395.789A2,2,0,0,1,8.264,7H4A2,2,0,0,0,2,9V22a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2V9a2,2,0,0,0-2-2H21.736a2,2,0,0,1-1.789-1.105l-.395-.789A2,2,0,0,0,17.764,4ZM6,5A1,1,0,0,0,5,6H8A1,1,0,0,0,7,5Zm9,3a7,7,0,1,1-7,7A7.008,7.008,0,0,1,15,8Zm9,1a1,1,0,1,1-1,1A1,1,0,0,1,24,9Zm-9,1a5,5,0,1,0,5,5,5,5,0,0,0-5-5Z"
                                                    transform="translate(-2 -4)" />
                                            </svg>
                                            <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Photos</p>
                                        </div>
                                        <!-- 3 -->
                                        <div class="swiper-slide my_account_slide"
                                            v-on:click="nextSlide($event, 'acc_filter_box_3')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.398 25.25">
                                                <path id="icons8_very_popular_topic"
                                                    d="M15.2,4C7.927,4,2,9.1,2,15.473A10.946,10.946,0,0,0,7.142,24.5a3.279,3.279,0,0,1-.159.926,9.586,9.586,0,0,1-1.432,2.979l-.587.841H5.988a7.94,7.94,0,0,0,5.927-2.688,14.267,14.267,0,0,0,3.284.386c7.272,0,13.2-5.1,13.2-11.475S22.471,4,15.2,4Zm3.313,16.068L15.154,17.9,11.8,20.068l1.029-3.862-3.1-2.522,3.99-.215,1.439-3.73,1.439,3.73,3.992.215-3.1,2.522Z"
                                                    transform="translate(-2 -4)" />
                                            </svg>
                                            <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">Reviews</p>
                                        </div>
                                        <!-- 4 -->
                                        <div class="swiper-slide my_account_slide"
                                            v-on:click="nextSlide($event, 'acc_filter_box_4')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.685 24">
                                                <path id="icons8_trekking"
                                                    d="M15.5,3A2.5,2.5,0,1,0,18,5.5,2.5,2.5,0,0,0,15.5,3Zm-7,5A2.5,2.5,0,0,0,6.066,9.947L5.078,13.91a2.472,2.472,0,0,0,2.963,3.023A4.184,4.184,0,0,1,8,16.5a4.573,4.573,0,0,1,.09-.893L9.605,8.275A2.418,2.418,0,0,0,8.5,8Zm14.992.992A.5.5,0,0,0,23,9.5v1l-2.58,2.289-2.4-1.5c-.007.05-.009.1-.018.148l-.48,2.66a22.009,22.009,0,0,0,3.043.9,1,1,0,0,0,.664-.252L23,13.172V26.5a.5.5,0,1,0,1,0V12.285l.35-.311a1,1,0,0,0,.084-1.412A.98.98,0,0,0,24,10.295V9.5a.5.5,0,0,0-.508-.508ZM13.5,9a2.5,2.5,0,0,0-2.453,2.055l0,0-.988,4.93,0,.008v0a2.511,2.511,0,0,0-.051.5,2.483,2.483,0,0,0,.906,1.91l.008.023L14.807,21.5l1.111,4.19.094.471A1,1,0,1,0,17.98,25.8l-1-5a1,1,0,0,0-.16-.377L14.949,17c0-.009,0-.019,0-.027l.982-4.914,0,0A2.482,2.482,0,0,0,13.5,9ZM9.957,19.725l-.514,1.7L7.215,25.361l-.074.125,0,0q-.018.029-.033.059l-.008.016a1,1,0,0,0,1.707,1.025h0l.016-.023,0,0,3.326-5.051Z"
                                                    transform="translate(-5 -3)" />
                                            </svg>
                                            <p class="mb-0 text-capitalize fw_gilroy_bold ms-3">My trips</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 1 -->
                            <div id="acc_filter_box_1" class="account_filter_box user_side_fillter1">
                                <!-- 1 -->
                                <div class="child_fillter_box_1_left mb-3">
                                    <!-- 1 -->
                                    <div id="personal_information_app"
                                        class="bg-white border_radius_20 p_20 mb-3 box_shadow">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <img width="22" src="/img/prof_information_resume.svg" class="me-2"
                                                    alt="">
                                                <h3 class="h6 fw_gilroy_bold txt_blue_secondary mb-0">Professional
                                                    Information
                                                </h3>
                                            </div>

                                            <div>
                                                <button v-if="owner_mode == true"
                                                    v-on:click="editingPersonalInformation = true"
                                                    class="edit_information_wrapper"><img width="18"
                                                        src="/img/edit_property.svg" alt=""></button>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="d-flex mb-2">
                                                <div class="w-25 txt_blue_secondary fw_gilroy_medium fs_14">Description
                                                </div>
                                                <div class="ps-2 w-75 txt_silver fw_gilroy_medium fs_14">
                                                    @{{ currentDescription }}
                                                </div>
                                            </div>

                                            <div class="d-flex mb-2">
                                                <div class="w-25 txt_blue_secondary fw_gilroy_medium fs_14">Current City
                                                </div>
                                                <div class="ps-2 w-75 txt_silver fw_gilroy_medium fs_14">
                                                    @{{ currentCity?.name }} , @{{ currentCity?.country?.name }}
                                                </div>
                                            </div>

                                            <div class="d-flex mb-2">
                                                <div class="w-25 txt_blue_secondary fw_gilroy_medium fs_14">Home Town</div>
                                                <div class="ps-2 w-75 txt_silver fw_gilroy_medium fs_14">
                                                    @{{ currentHometown?.name }} , @{{ currentHometown?.country?.name }}
                                                </div>
                                            </div>

                                            <div class="d-flex mb-2">
                                                <div class="w-25 txt_blue_secondary fw_gilroy_medium fs_14">Email</div>
                                                <div class="ps-2 w-75 txt_silver fs_14">@{{ currentEmail }}</div>
                                            </div>

                                            <div class="d-flex mb-1">
                                                <div class="w-25 txt_blue_secondary fw_gilroy_medium fs_14">Phone</div>
                                                <div class="ps-2 w-75 txt_silver fw_gilroy_medium fs_14">
                                                    @{{ currentPhoneNr }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 -->
                                    <div class="bg-white border_radius_20 p_20 pb-3 mb-3 box_shadow">
                                        <div class="d-flex justify-content-between mb-2">
                                            <div class="d-flex align-items-center">
                                                <img width="22" src="/img/interest_icon.svg" class="me-3"
                                                    alt="">
                                                <h3 class="h6 fw_gilroy_bold txt_blue_secondary mb-0">Interests</h3>
                                            </div>

                                            <div>
                                                <button v-if="owner_mode == true" class="edit_information_wrapper"
                                                    v-on:click="editingPersonalInterests = true"><img width="18"
                                                        src="/img/edit_property.svg" alt=""></button>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-wrap">

                                            <a style="cursor: default" class="fs_14 interest_tag_item"
                                                v-for="interest in currentUserInterests">@{{ interest.interest_name }}</a>


                                        </div>
                                    </div>
                                    <!-- 3 -->
                                    <div class="bg-white border_radius_20 p_20 pb-3 box_shadow">
                                        <div class="d-flex justify-content-between mb-2">
                                            <div class="d-flex align-items-center">
                                                <img width="22" src="/img/languages_icon.svg" class="me-3"
                                                    alt="">
                                                <h3 class="h6 fw_gilroy_bold txt_blue_secondary mb-0">Languages</h2>
                                            </div>

                                            <div>
                                                <button v-if="owner_mode == true" class="edit_information_wrapper"
                                                    v-on:click="editingUserLanguageList = true"><img width="18"
                                                        src="/img/edit_property.svg" alt=""></button>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-wrap">
                                            <a class="fs_14 interest_tag_item"
                                                v-for="lang in currentUserLanguageList">@{{ lang.name }}
                                                (@{{ lang.nativeName }})</a>

                                        </div>
                                    </div>
                                </div>

                                <!-- 2 -->
                                <div class="child_fillter_box_1_right mb-3">
                                    <!-- 1 -->
                                    <div class="bg-white border_radius_20 p_20 mb-3 box_shadow">
                                        <h3 class="h6 text_silver fw_gilroy_bold mb-3 mt-md-1">Profile Completion: <span
                                                class="text_dark_blue">75%</span></h3>
                                        <div class="progress_fillter_box_1 mb-3">
                                            <!-- 1 -->
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 100%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <!-- 2 -->
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 100%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <!-- 3 -->
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 100%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <!-- 4 -->
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <!-- 5 -->
                                            <div class="progress">
                                                <div class="progress-bar progress_bar_silver" role="progressbar"
                                                    style="width: 0" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 -->
                                    <div class="bg-white border_radius_20 p_20 mb-3 box_shadow">
                                        <!-- 1 -->
                                        <div class="d-flex justify-content-between mb-4 mt-md-2">
                                            <div class="d-flex align-items-center">
                                                <img width="22" src="/img/icons8_trekking.svg" class="me-2"
                                                    alt="">
                                                <h4 class="h6 fw_gilroy_bold txt_blue_secondary mb-0">Travel Information
                                                </h4>
                                            </div>
                                            <a href="#"
                                                class="text-capitalize text_dark_blue_a d-block text-decoration-none fs_14">View
                                                all</a>
                                        </div>
                                        <!-- 2 -->
                                        <h6 class="text_dark_blue ps-md-5 ps-3 fw_gilroy_medium mb-3 fs_14"><i
                                                class="fas fa-map-marker-alt me-1 fs_16"></i> I'm currently <span
                                                class="ms-2 fw_gilroy_bold fs_16">At Home</span></h6>
                                        <!-- 3 -->
                                        <h6 class="text_dark_blue fw_gilroy_medium">My next destination</h6>
                                        <div class="user_side_booking_details mb-1">
                                            <div class="row gx-0">
                                                <div
                                                    class="col-md-7 d-md-block d-flex flex-column align-items-center mb-2 m-md-0">
                                                    <p class="text_silver mb-0 fs_14">#113 trip : Amazing Greece</p>
                                                    <p class="text_silver mb-0 fs_14">Nov 15, 2022</p>
                                                </div>
                                                <div class="col-md-5 col-sm-4 col-6 mx-auto">
                                                    <a href="#"
                                                        class="btn py-2 px-3 btn_pink medium_btn d-block ms-auto fs_14">Booking
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 3 -->
                                    {{-- <div class="bg-white border_radius_20 p_20 box_shadow">
                                        <!-- 1 -->
                                        <div class="d-flex justify-content-between mb-3 mt-md-3">
                                            <div class="d-flex align-items-center">
                                                <img width="22" src="/img/icons8_country.svg" class="me-2"
                                                    alt="">
                                                <h4 class="h6 fw_gilroy_bold txt_blue_secondary mb-0">Last Visited</h4>
                                            </div>
                                            <a href="#"
                                                class="text-capitalize text_dark_blue_a d-block text-decoration-none fs_14">See
                                                Full</a>
                                        </div>
                                        <!-- 2 -->
                                        <div class="user_side_map mt-4">
                                            <img src="/img/map2.svg" alt="">
                                        </div>
                                    </div> --}}
                                </div>

                                <!-- 3 -->
                                <div class="bg-white border_radius_20 p_20 box_shadow w-100">
                                    <!-- 1 -->
                                    <div class="d-flex align-items-center mb-4 mt-md-2 mt-1">
                                        <img width="22" src="/img/icons8_camera.svg" class="me-3" alt="">
                                        <h3 class="h6 fw_gilroy_bold txt_blue_secondary mb-0">My latest stories</h3>
                                    </div>
                                    <!-- 2 -->
                                    <div class="user_side_stories mb-md-2">
                                        <!-- 1 -->
                                        <div class="user_side_story_box">
                                            <img src="/img/story_img_1.svg" alt="">
                                            <div class="child_story_box">
                                                <a href="#" class="link_white fw_gilroy_bold mb-1 lh-1">Maxime quo
                                                    veniam dolor aut est.</a>
                                                <p class="text_silver mb-0 fw_gilroy_medium fs_14">Jun 15, 2021</p>
                                            </div>
                                        </div>
                                        <!-- 2 -->
                                        <div class="user_side_story_box">
                                            <img src="/img/story_img_2.svg" alt="">
                                            <div class="child_story_box">
                                                <a href="#" class="link_white fw_gilroy_bold mb-1 lh-1">Ratione
                                                    autem</a>
                                                <p class="text_silver mb-0 fw_gilroy_medium fs_14">Jun 15, 2021</p>
                                            </div>
                                        </div>
                                        <!-- 1 -->
                                        <div class="user_side_story_box">
                                            <img src="/img/story_img_3.svg" alt="">
                                            <div class="child_story_box">
                                                <a href="#" class="link_white fw_gilroy_bold mb-1 lh-1">Illum
                                                    possimus
                                                    corporis odio beatae.</a>
                                                <p class="text_silver mb-0 fw_gilroy_medium fs_14">Jun 15, 2021</p>
                                            </div>
                                        </div>
                                        <!-- 1 -->
                                        <div class="user_side_story_box">
                                            <img src="/img/story_img_1.svg" alt="">
                                            <div class="child_story_box">
                                                <a href="#" class="link_white fw_gilroy_bold mb-1 lh-1">Eligendi
                                                    fugit</a>
                                                <p class="text_silver mb-0 fw_gilroy_medium fs_14">Jun 15, 2021</p>
                                            </div>
                                        </div>
                                        <!-- 1 -->
                                        <div class="user_side_story_box check_all_story">
                                            <img src="/img/icons8_photo_gallery.svg" alt="">
                                            <a href="#" class="mt-3 text_dark_blue_a text-decoration-none">Check All
                                                Stories</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- 2 -->
                            <div id="acc_filter_box_2" class="account_filter_box user_side_fillter2"
                                style="display: none;">
                                <!-- 1 -->
                                <div class="user_side_photos_row_1 w-100">
                                    <!-- left -->
                                    <div v-if="owner_mode == true" class="u_s_photos_row_1_left mb-3">
                                        <button class="btn py-2 px-3 btn_pink medium_btn mb-3 btn_pink_white2"
                                            v-on:click="uploadNewAlbumPanelVisible = true">Create new gallery</button>
                                        <p class="mb-0 text-white lh-sm text-center">Autem voluptas labore quam ut
                                            repudiandae
                                            ullam error vitae earum. </p>
                                    </div>
                                    <!-- right -->
                                    <div class="u_s_photos_row_1_right mb-3 ms-3 box_shadow">
                                        <div class="d-flex align-items-center mb-4 mt-1">
                                            <img width="22" src="/img/icons8_rescheduling_a_task.svg" class="me-2"
                                                alt="">
                                            <h3 class="h6 fw_gilroy_bold txt_blue_secondary mb-0">Latest Albums</h3>
                                        </div>
                                        <div class="wrap_user_side_draft">
                                            <div class="user_side_draft_boxes">
                                                <!-- 1 -->
                                                <div v-for="album in currentAlbums" class="user_side_draft">
                                                    <img :src="'/storage/' + album.images[0].picture_url" alt="">
                                                    <div class="child_draft_box">
                                                        <a href="#"
                                                            class="link_white fw_gilroy_bold mb-1 lh-1">@{{ album.title }}</a>
                                                        <p class="mb-2 fw_gilroy_medium fs_14 text_light_silver">
                                                            @{{ album.location }}
                                                        </p>
                                                        <a style="cursor: pointer" v-if="owner_mode == true"
                                                            v-on:click="deleteAlbum(album.id)"
                                                            class="btn py-1 px-4 btn_pink medium_btn btn_pink_white2 border_radius_20 fs_14 d-inline-block mb-1">Delete</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 -->
                                <div class="bg-white border_radius_20 w-100 p_20">
                                    <div class="d-flex align-items-center mb-4 mt-md-2 mt-1">
                                        <img width="22" src="/img/icons8_camera.svg" class="me-2" alt="">
                                        <h3 class="h6 fw_gilroy_bold txt_blue_secondary mb-0">My latest stories</h3>
                                    </div>
                                    <div class="user_side_photos_row_2 mb-md-2 mb-0 w-100">
                                        <!-- 1 -->
                                        <div class="u_s_photos_row_2_1 u_s_photos_row_2_box border_radius_20 box_shadow">
                                            <img src="/img/stock-photo-nature-landscape-in-patagonia-argentina.svg"
                                                alt="">
                                            <div class="child_photos_box">
                                                <a href="#" class="link_white fw_gilroy_bold mb-1 lh-1">Maxime quo
                                                    veniam dolor aut est.</a>
                                                <p class="text_light_silver mb-0 fw_gilroy_medium fs_14">Jun 15, 2021</p>
                                            </div>
                                        </div>
                                        <!-- 2 -->
                                        <div class="u_s_photos_row_2_2 u_s_photos_row_2_box border_radius_20 box_shadow">
                                            <img src="/img/stock-photo-gondolas-floating-in-the-grand.svg" alt="">
                                            <div class="child_photos_box">
                                                <a href="#" class="link_white fw_gilroy_bold mb-1 lh-1">Illum
                                                    possimus
                                                    corporis odio beatae.</a>
                                                <p class="text_light_silver mb-0 fw_gilroy_medium fs_14">Jun 15, 2021</p>
                                            </div>
                                        </div>
                                        <!-- 3 -->
                                        <div class="u_s_photos_row_2_3 u_s_photos_row_2_box border_radius_20 box_shadow">
                                            <img src="/img/stock-photo-senior-happy-couple-taking-selfie.svg"
                                                alt="">
                                            <div class="child_photos_box">
                                                <a href="#" class="link_white fw_gilroy_bold mb-1 lh-1">Illum
                                                    possimus
                                                    corporis odio beatae.</a>
                                                <p class="text_light_silver mb-0 fw_gilroy_medium fs_14">Jun 15, 2021</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 3 -->
                                <div
                                    class="w-100 py-4 pb-3 d-flex align-items-center row_side_select flex-sm-row flex-column justify-content-between">
                                    <h2 class="h5 mb-0 text_dark_blue fw_gilroy_bold child_side text-sm-start text-center">
                                        My
                                        Gallery (@{{ currentAlbums.length }})</h2>
                                    {{-- <div class="ms-sm-auto d-flex align-items-center child_side">
                                        <p class="mb-0 me-2 fs_14">Sorted by:</p>
                                        <!-- select box -->
                                        <div class="select_box user_side_select">
                                            <select class="child_select_box" style="display: none;">
                                                <option value="1" selected>Date</option>
                                                <option value="2">01/02/2022</option>
                                                <option value="2">01/03/2022</option>
                                                <option value="2">01/04/2022</option>
                                            </select>
                                        </div>
                                    </div> --}}

                                </div>
                                <!-- 4 -->
                                <div class="w-100 user_side_gallery_grids">
                                    <!-- 1 -->
                                    <div v-for="album in currentAlbums" class="user_side_gallery_grid">
                                        <!-- box bg -->
                                        <img :src="'/storage/' + album.images[0].picture_url" alt="">
                                        <!-- -- -->
                                        <div class="user_side_gallery_header">
                                            <a href="#"
                                                class="btn btn_pink medium_btn mb-3 border_radius_20 d-flex align-items-center ms-auto"><img
                                                    width="24" src="/img/icons8_cameraWhite.svg" alt="">
                                                <span class="ms-2 text-white fs_14">@{{ album.images.length }}
                                                    images</span></a>
                                        </div>
                                        <div class="child_gallery_box">
                                            <a class="link_white fw_gilroy_bold mb-1 lh-1">@{{ album.title }}</a>
                                            <p class="mb-2 fw_gilroy_medium fs_14 text_light_silver">
                                                @{{ album.location }}</p>
                                            <div class="d-flex align-items-center">
                                                <span><img width="18" src="/img/icons8_eye.svg" alt=""> <span
                                                        class="ms-1 fs_14 text-white">52</span></span>
                                                <a style="cursor: pointer" v-on:click="deleteAlbum(album.id)"
                                                    v-if="owner_mode == true"
                                                    class="btn py-0 px-3 btn_pink medium_btn btn_pink_white2 border_radius_20 fs_14 ms-3 d-inline-block">Delete</a>
                                                <a class="d-block ms-auto" href="#"><img width="25"
                                                        src="/img/icons8_right_arrow.svg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 -->

                                </div>

                            </div>
                            <!-- 3 -->
                            <div id="acc_filter_box_3" class="account_filter_box flex-wrap" style="display: none;">
                                <!-- user_side_review_slider -->
                                <div class="user_side_review_slider mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2 class="h5 text_dark_blue mb-0 text-capitalize fw_gilroy_bold">New</h2>
                                        <div class="wrap_acc_buttons wrap_acc_buttons2">
                                            <div class="swiper-button-prev swiper-button-disabled" tabindex="-1"
                                                role="button" aria-label="Previous slide"
                                                aria-controls="swiper-wrapper-71092b9a1537f9249" aria-disabled="true">
                                                <img src="/img/arrow_right_l.svg" alt="">
                                            </div>
                                            <div class="swiper-button-next" tabindex="0" role="button"
                                                aria-label="Next slide" aria-controls="swiper-wrapper-71092b9a1537f9249"
                                                aria-disabled="false">
                                                <img src="/img/arrow_left_l.svg" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="user_side_review_slider" class="swiper">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- 1 -->
                                            <div class="swiper-slide testimonial_slide user_side_review_slide">
                                                <span class="review_slide_time">1 hrs ago</span>
                                                <div class="testimonial_slide_top review_slide_top mt-2 mb-3">
                                                    <img src="/img/user_1_review.svg" alt="">
                                                    <div class="testimonial_slide_top_right review_slide_top_right">
                                                        <h4 class="h6 fw_gilroy_medium mb-0">Brandy Rowe</h4>
                                                        <p class="fs_14 text_dark_blue fw_gilroy_medium mb-1">Inc,and
                                                            Sons,LLC,Group</p>
                                                        <div class="t_user_rate">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user_side_review_bottom">
                                                    <p class="fw_gilroy_medium mb-2 txt_silver">Impedit adipisci et.
                                                        Aperiam
                                                        atque sed exercitationem placeat sint optio tempora est. Quam
                                                        delectus
                                                        fugiat iure et cum necessitatibus asperiores quis.</p>
                                                </div>
                                            </div>
                                            <!-- 2 -->
                                            <div class="swiper-slide testimonial_slide user_side_review_slide">
                                                <span class="review_slide_time">1 hrs ago</span>
                                                <div class="testimonial_slide_top review_slide_top mt-2 mb-3">
                                                    <img src="/img/user_1_review.svg" alt="">
                                                    <div class="testimonial_slide_top_right review_slide_top_right">
                                                        <h4 class="h6 fw_gilroy_medium mb-0">Brandy Rowe</h4>
                                                        <p class="fs_14 text_dark_blue fw_gilroy_medium mb-1">Inc,and
                                                            Sons,LLC,Group</p>
                                                        <div class="t_user_rate">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user_side_review_bottom">
                                                    <p class="fw_gilroy_medium mb-2 txt_silver">Impedit adipisci et.
                                                        Aperiam
                                                        atque sed exercitationem placeat sint optio tempora est. Quam
                                                        delectus
                                                        fugiat iure et cum necessitatibus asperiores quis.</p>
                                                </div>
                                            </div>
                                            <!-- 3 -->
                                            <div class="swiper-slide testimonial_slide user_side_review_slide">
                                                <span class="review_slide_time">1 hrs ago</span>
                                                <div class="testimonial_slide_top review_slide_top mt-2 mb-3">
                                                    <img src="/img/user_1_review.svg" alt="">
                                                    <div class="testimonial_slide_top_right review_slide_top_right">
                                                        <h4 class="h6 fw_gilroy_medium mb-0">Brandy Rowe</h4>
                                                        <p class="fs_14 text_dark_blue fw_gilroy_medium mb-1">Inc,and
                                                            Sons,LLC,Group</p>
                                                        <div class="t_user_rate">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                            <img width="" src="/img/star_orange.svg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user_side_review_bottom">
                                                    <p class="fw_gilroy_medium mb-2 txt_silver">Impedit adipisci et.
                                                        Aperiam
                                                        atque sed exercitationem placeat sint optio tempora est. Quam
                                                        delectus
                                                        fugiat iure et cum necessitatibus asperiores quis.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 -->
                                <div class="w-100 p_20 bg-white border_radius_20">
                                    <!-- --- -->
                                    <div
                                        class="w-100 pb-3 d-flex align-items-center row_side_select flex-sm-row flex-column justify-content-between">
                                        <h2
                                            class="h5 mb-0 text_dark_blue fw_gilroy_bold child_side text-sm-start text-center">
                                            Latest Reviews</h2>
                                        <div class="ms-sm-auto d-flex align-items-center child_side">
                                            <p class="mb-0 me-2 fs_14">Sorted by:</p>
                                            <!-- select box -->
                                            <div class="select_box user_side_select">
                                                <select class="child_select_box" style="display: none;">
                                                    <option value="1" selected>Date</option>
                                                    <option value="2">01/02/2022</option>
                                                    <option value="2">01/03/2022</option>
                                                    <option value="2">01/04/2022</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 1 -->
                                    <div class="reivew_item_wrapper p_20 border_radius_20 mb-3">
                                        <div class="review_slide_time2">
                                            <p class="mb-0">1 Days ago</p>
                                        </div>

                                        <div class="review_content_wrapper">
                                            <div class="review_left_item mt-2">
                                                <div class="review_content_wrapper">
                                                    <div class="d-flex align-items-center mb-4">
                                                        <div class="review_img_wrapper me-3">
                                                            <img src="/img/user_1_review.svg"
                                                                class="review_conten_img_avater" alt="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 text_dark_blue fw_gilroy_medium mb-0">Gerard</p>
                                                            <p class="mb-1 text_dark_blue fw_gilroy_medium fs_14">Schiller,
                                                                Greenholt and Ondricka</p>
                                                            <div class="t_user_rate t_user_rate2">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <a href="#"
                                                                class="h5 d-block mb-2 txt_link_dark_blue text-decoration-none txt_blue_secondary fw_gilroy_medium fst-italic review_content_a">"Ex
                                                                excepturi voluptas vel ut itaque."</a>
                                                            <p class="fw_gilroy_medium txt_silver">Omnis quis tempore vitae
                                                                qui
                                                                commodi. Nobis eaque sint fuga fugiat. Nostrum corporis
                                                                natus
                                                                nihil repudiandae consequatur laudantium praesentium quasi.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="review_right_item text-center mt-4">
                                                <div>
                                                    <p class="text-white fw_gilroy_medium break_md_none">This review <br>
                                                        helpful?</p>
                                                    <div class="like_dislike_wrapper">
                                                        <div class="like_dislike_btn_wrapper">
                                                            <button class="like_icon_btn me-3"><img
                                                                    src="/img/like_icon.png" alt=""></button>
                                                            <p class="mb-0 text-white-50">5</p>
                                                        </div>
                                                        <div class="like_dislike_btn_wrapper">
                                                            <button class="like_icon_btn me-3"><img
                                                                    src="/img/dislike_icon.png" alt=""></button>
                                                            <p class="mb-0 text-white-50"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 2 -->
                                    <div class="reivew_item_wrapper p_20 border_radius_20 mb-3">
                                        <div class="review_slide_time2">
                                            <p class="mb-0">1 Days ago</p>
                                        </div>

                                        <div class="review_content_wrapper">
                                            <div class="review_left_item mt-2">
                                                <div class="review_content_wrapper">
                                                    <div class="d-flex align-items-center mb-4">
                                                        <div class="review_img_wrapper me-3">
                                                            <img src="/img/user_1_review.svg"
                                                                class="review_conten_img_avater" alt="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 text_dark_blue fw_gilroy_medium mb-0">Gerard</p>
                                                            <p class="mb-1 text_dark_blue fw_gilroy_medium fs_14">Schiller,
                                                                Greenholt and Ondricka</p>
                                                            <div class="t_user_rate t_user_rate2">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <a href="#"
                                                                class="h5 d-block mb-2 txt_link_dark_blue text-decoration-none txt_blue_secondary fw_gilroy_medium fst-italic review_content_a">"Ex
                                                                excepturi voluptas vel ut itaque."</a>
                                                            <p class="fw_gilroy_medium txt_silver">Omnis quis tempore vitae
                                                                qui
                                                                commodi. Nobis eaque sint fuga fugiat. Nostrum corporis
                                                                natus
                                                                nihil repudiandae consequatur laudantium praesentium quasi.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="review_right_item text-center mt-4">
                                                <div>
                                                    <p class="text-white fw_gilroy_medium break_md_none">This review <br>
                                                        helpful?</p>
                                                    <div class="like_dislike_wrapper">
                                                        <div class="like_dislike_btn_wrapper">
                                                            <button class="like_icon_btn me-3"><img
                                                                    src="/img/like_icon.png" alt=""></button>
                                                            <p class="mb-0 text-white-50">5</p>
                                                        </div>
                                                        <div class="like_dislike_btn_wrapper">
                                                            <button class="like_icon_btn me-3"><img
                                                                    src="/img/dislike_icon.png" alt=""></button>
                                                            <p class="mb-0 text-white-50"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 3 -->
                                    <div class="reivew_item_wrapper p_20 border_radius_20 mb-3">
                                        <div class="review_slide_time2">
                                            <p class="mb-0">1 Days ago</p>
                                        </div>

                                        <div class="review_content_wrapper">
                                            <div class="review_left_item mt-2">
                                                <div class="review_content_wrapper">
                                                    <div class="d-flex align-items-center mb-4">
                                                        <div class="review_img_wrapper me-3">
                                                            <img src="/img/user_1_review.svg"
                                                                class="review_conten_img_avater" alt="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 text_dark_blue fw_gilroy_medium mb-0">Gerard</p>
                                                            <p class="mb-1 text_dark_blue fw_gilroy_medium fs_14">Schiller,
                                                                Greenholt and Ondricka</p>
                                                            <div class="t_user_rate t_user_rate2">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <a href="#"
                                                                class="h5 d-block mb-2 txt_link_dark_blue text-decoration-none txt_blue_secondary fw_gilroy_medium fst-italic review_content_a">"Ex
                                                                excepturi voluptas vel ut itaque."</a>
                                                            <p class="fw_gilroy_medium txt_silver">Omnis quis tempore vitae
                                                                qui
                                                                commodi. Nobis eaque sint fuga fugiat. Nostrum corporis
                                                                natus
                                                                nihil repudiandae consequatur laudantium praesentium quasi.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="review_right_item text-center mt-4">
                                                <div>
                                                    <p class="text-white fw_gilroy_medium break_md_none">This review <br>
                                                        helpful?</p>
                                                    <div class="like_dislike_wrapper">
                                                        <div class="like_dislike_btn_wrapper">
                                                            <button class="like_icon_btn me-3"><img
                                                                    src="/img/like_icon.png" alt=""></button>
                                                            <p class="mb-0 text-white-50">5</p>
                                                        </div>
                                                        <div class="like_dislike_btn_wrapper">
                                                            <button class="like_icon_btn me-3"><img
                                                                    src="/img/dislike_icon.png" alt=""></button>
                                                            <p class="mb-0 text-white-50"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 4 -->
                                    <div class="reivew_item_wrapper p_20 border_radius_20 mb-3">
                                        <div class="review_slide_time2">
                                            <p class="mb-0">1 Days ago</p>
                                        </div>

                                        <div class="review_content_wrapper">
                                            <div class="review_left_item mt-2">
                                                <div class="review_content_wrapper">
                                                    <div class="d-flex align-items-center mb-4">
                                                        <div class="review_img_wrapper me-3">
                                                            <img src="/img/user_1_review.svg"
                                                                class="review_conten_img_avater" alt="">
                                                        </div>
                                                        <div>
                                                            <p class="mb-0 text_dark_blue fw_gilroy_medium mb-0">Gerard</p>
                                                            <p class="mb-1 text_dark_blue fw_gilroy_medium fs_14">Schiller,
                                                                Greenholt and Ondricka</p>
                                                            <div class="t_user_rate t_user_rate2">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                                <img src="/img/star_orange.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <a href="#"
                                                                class="h5 d-block mb-2 txt_link_dark_blue text-decoration-none txt_blue_secondary fw_gilroy_medium fst-italic review_content_a">"Ex
                                                                excepturi voluptas vel ut itaque."</a>
                                                            <p class="fw_gilroy_medium txt_silver">Omnis quis tempore
                                                                vitae
                                                                qui commodi. Nobis eaque sint fuga fugiat. Nostrum corporis
                                                                natus nihil repudiandae consequatur laudantium praesentium
                                                                quasi.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="review_right_item text-center mt-4">
                                                <div>
                                                    <p class="text-white fw_gilroy_medium break_md_none">This review <br>
                                                        helpful?</p>
                                                    <div class="like_dislike_wrapper">
                                                        <div class="like_dislike_btn_wrapper">
                                                            <button class="like_icon_btn me-3"><img
                                                                    src="/img/like_icon.png" alt=""></button>
                                                            <p class="mb-0 text-white-50">5</p>
                                                        </div>
                                                        <div class="like_dislike_btn_wrapper">
                                                            <button class="like_icon_btn me-3"><img
                                                                    src="/img/dislike_icon.png" alt=""></button>
                                                            <p class="mb-0 text-white-50"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-3 text-center">
                                        <a href="#" class="btn large_btn btn_pink">Next</a>
                                    </div>
                                </div>

                            </div>
                            <!-- 4 -->
                            <div id="acc_filter_box_4" class="account_filter_box flex-wrap" style="display: none;">
                                <!-- 1 -->
                                <div class="w-100 row gx-0 row_side_map mb-4">
                                    <!-- row_side_map_left -->
                                    <div class="col-xl-6 ps-0 pe-xl-2">
                                        <div class="row_side_map_left">
                                            <div id="world_map_chart"></div>
                                            <div class="r_s_map_left_1">
                                                <p class="fs_14 mb-0 text_silver">Your Travel Progress :</p>
                                                <p class="fs_14 mb-0 text_silver"><img width="12"
                                                        src="/img/circle_pink.svg" alt=""> 52% / 100%</p>
                                                <p class="fs_14 mb-0 text_silver">80 countries</p>
                                                <p class="fs_14 mb-0 text_silver">105 cities</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- row_side_map_right -->
                                    <div class="col-xl-6 ps-xl-2 pe-0">
                                        <div class="row_side_map_right">
                                            <div id="line_map_chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 -->
                                <h2 class="w-100 h5 text_dark_blue mb-4 pt-3 pb-1 text-capitalize fw_gilroy_bold">Upcoming
                                    Trips</h2>
                                <div class="w-100 fund_girds user_side_grids py-0 mb-4">
                                    <!-- 1 -->
                                    <div class="fund_grid l_grid_slide user_side_grid2">
                                        <div class="child_l_grid_slide"
                                            style="background: url('/img/stock-photo-beautiful-landscape-of-rocks-mountain.svg') no-repeat;background-size: cover;">
                                            <div class="l_slide_top">
                                                <a href="#" class="slide_top_link me-2">
                                                    <img src="/img/l_link_1.svg" alt="">
                                                </a>
                                                <a href="#" class="slide_top_link">
                                                    <img src="/img/l_link_2.svg" alt="">
                                                </a>
                                                <a href="#" class="slide_top_link slide_top_link2 ms-auto">
                                                    <img src="/img/l_link_3.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="l_slide_bottom">
                                            <div class="row landing_slide_row_1">
                                                <div class="col-12 d-flex mb-2">
                                                    <a href="#"
                                                        class="l_slide_link h6 text_dark_blue fw_gilroy_bold">Moraine
                                                        Lake</a>
                                                    <a href="#"
                                                        class="l_slide_link h6 text_dark_blue fw_gilroy_bold ms-auto">$550</a>
                                                </div>
                                                <div class="col-12 d-flex align-items-center">
                                                    <p class="text_silver fs_14 mb-0"><img class="me-1" width="30"
                                                            src="/img/canada_flag.svg" alt="">
                                                        Canada</p>
                                                    <p class="ms-auto text_dark_blue fw_gilroy_bold fs_14 mb-0">from
                                                        $5,400s
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="landing_slide_row_2 user_side_grid2_bottom d-flex align-items-center">
                                                <p class="fs_14 text-center text_silver fw_gilroy_medium mb-0">May 18, Fri
                                                </p>
                                                <img src="/img/dot_border.svg" alt="">
                                                <p class="fs_14 text-center text_silver fw_gilroy_medium mb-0">May 22, Sat
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 1 -->
                                    <div class="fund_grid l_grid_slide user_side_grid2">
                                        <div class="child_l_grid_slide"
                                            style="background: url('/img/stock-photo-beautiful-landscape-of-rocks-mountain.svg') no-repeat;background-size: cover;">
                                            <div class="l_slide_top">
                                                <a href="#" class="slide_top_link me-2">
                                                    <img src="/img/l_link_1.svg" alt="">
                                                </a>
                                                <a href="#" class="slide_top_link">
                                                    <img src="/img/l_link_2.svg" alt="">
                                                </a>
                                                <a href="#" class="slide_top_link slide_top_link2 ms-auto">
                                                    <img src="/img/l_link_3.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="l_slide_bottom">
                                            <div class="row landing_slide_row_1">
                                                <div class="col-12 d-flex mb-2">
                                                    <a href="#"
                                                        class="l_slide_link h6 text_dark_blue fw_gilroy_bold">Moraine
                                                        Lake</a>
                                                    <a href="#"
                                                        class="l_slide_link h6 text_dark_blue fw_gilroy_bold ms-auto">$550</a>
                                                </div>
                                                <div class="col-12 d-flex align-items-center">
                                                    <p class="text_silver fs_14 mb-0"><img class="me-1" width="30"
                                                            src="/img/canada_flag.svg" alt="">
                                                        Canada</p>
                                                    <p class="ms-auto text_dark_blue fw_gilroy_bold fs_14 mb-0">from
                                                        $5,400s
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="landing_slide_row_2 user_side_grid2_bottom d-flex align-items-center">
                                                <p class="fs_14 text-center text_silver fw_gilroy_medium mb-0">May 18, Fri
                                                </p>
                                                <img src="/img/dot_border.svg" alt="">
                                                <p class="fs_14 text-center text_silver fw_gilroy_medium mb-0">May 22, Sat
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 1 -->
                                    <div class="fund_grid l_grid_slide user_side_grid2">
                                        <div class="child_l_grid_slide"
                                            style="background: url('/img/stock-photo-beautiful-landscape-of-rocks-mountain.svg') no-repeat;background-size: cover;">
                                            <div class="l_slide_top">
                                                <a href="#" class="slide_top_link me-2">
                                                    <img src="/img/l_link_1.svg" alt="">
                                                </a>
                                                <a href="#" class="slide_top_link">
                                                    <img src="/img/l_link_2.svg" alt="">
                                                </a>
                                                <a href="#" class="slide_top_link slide_top_link2 ms-auto">
                                                    <img src="/img/l_link_3.svg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="l_slide_bottom">
                                            <div class="row landing_slide_row_1">
                                                <div class="col-12 d-flex mb-2">
                                                    <a href="#"
                                                        class="l_slide_link h6 text_dark_blue fw_gilroy_bold">Moraine
                                                        Lake</a>
                                                    <a href="#"
                                                        class="l_slide_link h6 text_dark_blue fw_gilroy_bold ms-auto">$550</a>
                                                </div>
                                                <div class="col-12 d-flex align-items-center">
                                                    <p class="text_silver fs_14 mb-0"><img class="me-1" width="30"
                                                            src="/img/canada_flag.svg" alt="">
                                                        Canada</p>
                                                    <p class="ms-auto text_dark_blue fw_gilroy_bold fs_14 mb-0">from
                                                        $5,400s
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="landing_slide_row_2 user_side_grid2_bottom d-flex align-items-center">
                                                <p class="fs_14 text-center text_silver fw_gilroy_medium mb-0">May 18, Fri
                                                </p>
                                                <img src="/img/dot_border.svg" alt="">
                                                <p class="fs_14 text-center text_silver fw_gilroy_medium mb-0">May 22, Sat
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 3 -->
                                <div class="w-100 manage_white_box border_radius_20 box_shadow bg-white">
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <h5 class="h5 text_dark_blue">My Booking</h5>
                                        <a href="#" class="h6 text_dark_blue">View all bookings</a>
                                    </div>
                                    <div class="wrap_booking_1_rows1">
                                        <div class="wrap_booking_1_scrollbar"></div>
                                    </div>
                                    <div class="wrap_booking_1_rows2">
                                        <div class="wrap_booking_1">
                                            <!-- row -->
                                            <div class="row mx-0 mb-2 wrap_box_booking_heading">
                                                <div
                                                    class="col-4 manage_book_1_start user_side_book_1_start box_booking_heading">
                                                    <h6 class="text_dark_blue fw_gilroy_bold"><i
                                                            class="fas fa-map-marker-alt me-2"></i>Destination</h6>
                                                </div>
                                                <div
                                                    class="col-4 d-flex justify-content-center manage_book_1_middle user_side_book_1_middle box_booking_heading">
                                                    <h6 class="text_dark_blue fw_gilroy_bold"><i
                                                            class="fas fa-calendar-alt me-2"></i>Date</h6>
                                                </div>
                                                <div
                                                    class="col-4 pe-0 d-flex justify-content-center manage_book_1_end user_side_book_1_end box_booking_heading">
                                                    <h6 class="text_dark_blue fw_gilroy_bold"><i
                                                            class="fas fa-stopwatch me-2"></i>Days</h6>
                                                </div>
                                            </div>
                                            <!-- row -->
                                            <div class="row mx-0 row_booking_1 py-md-3 py-2 border_radius_10 mb-3">
                                                <div
                                                    class="col-4 d-flex align-items-center manage_book_1_start user_side_book_1_start">
                                                    <img class="border_radius_10 me-3" width="60"
                                                        src="/img/stock-photo-venice.svg" alt="">
                                                    <a href="#"
                                                        class="text_dark_blue_a mb-0 text-decoration-none">Grand Canal</a>
                                                </div>
                                                <div
                                                    class="col-4 d-flex justify-content-center align-items-center manage_book_1_middle user_side_book_1_middle">
                                                    <p class="text_silver mb-0">May 18 - May 20</p>
                                                </div>
                                                <div
                                                    class="col-4 pe-0 d-flex justify-content-center align-items-center manage_book_1_end user_side_book_1_end">
                                                    <p class="text_silver mb-0">2 Nights</p>
                                                </div>
                                            </div>
                                            <!-- row -->
                                            <div class="row mx-0 row_booking_1 py-md-3 py-2 border_radius_10 mb-3">
                                                <div
                                                    class="col-4 d-flex align-items-center manage_book_1_start user_side_book_1_start">
                                                    <img class="border_radius_10 me-3" width="60"
                                                        src="/img/stock-photo-venice.svg" alt="">
                                                    <a href="#"
                                                        class="text_dark_blue_a mb-0 text-decoration-none">Grand Canal</a>
                                                </div>
                                                <div
                                                    class="col-4 d-flex justify-content-center align-items-center manage_book_1_middle user_side_book_1_middle">
                                                    <p class="text_silver mb-0">May 18 - May 20</p>
                                                </div>
                                                <div
                                                    class="col-4 pe-0 d-flex justify-content-center align-items-center manage_book_1_end user_side_book_1_end">
                                                    <p class="text_silver mb-0">2 Nights</p>
                                                </div>
                                            </div>
                                            <!-- row -->
                                            <div class="row mx-0 row_booking_1 py-md-3 py-2 border_radius_10 mb-3">
                                                <div
                                                    class="col-4 d-flex align-items-center manage_book_1_start user_side_book_1_start">
                                                    <img class="border_radius_10 me-3" width="60"
                                                        src="/img/stock-photo-venice.svg" alt="">
                                                    <a href="#"
                                                        class="text_dark_blue_a mb-0 text-decoration-none">Grand Canal</a>
                                                </div>
                                                <div
                                                    class="col-4 d-flex justify-content-center align-items-center manage_book_1_middle user_side_book_1_middle">
                                                    <p class="text_silver mb-0">May 18 - May 20</p>
                                                </div>
                                                <div
                                                    class="col-4 pe-0 d-flex justify-content-center align-items-center manage_book_1_end user_side_book_1_end">
                                                    <p class="text_silver mb-0">2 Nights</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        // edit information
        function edit_information(popupBox) {
            let = popup = document.querySelector(`#${popupBox}`);
            popup.classList.add("user_side_form_box_active");
            document.querySelector(`body`).style.overflow = "hidden";
        }

        function remove_user_side_popup(popupBox) {
            document.querySelector(`#${popupBox}`).classList.remove("user_side_form_box_active");
            document.querySelector(`body`).style.overflow = "auto";
        }

        /*       let = user_side_form_box = document.querySelectorAll(".user_side_form_box");
              for(let f = 0;f < user_side_form_box.length;f++){
                  // popup
                      user_side_form_box[f].addEventListener("click", (e) => {
                          document.querySelector(`body`).style.overflow = "auto";
                          e.target.classList.remove("user_side_form_box_active");
                      }, true)

                  // form
                      user_side_form_box[f].querySelector("form").addEventListener("click", (e) => {
                          document.querySelector(`body`).style.overflow = "hidden";
                      }, true)
              } */
    </script>


    <script>
        const vue_app = new Vue({
            el: "#main_vue_app",
            vuetify: new Vuetify(),
            mounted: function() {
                var j, tabcontent, tablinks;

                tabcontent = document.getElementsByClassName("my_account_slide");
                tabcontent[0].style.display = "flex";
                $(function() {
                    $(".wrap_booking_1_rows1").scroll(function() {
                        $(".wrap_booking_1_rows2").scrollLeft($(".wrap_booking_1_rows1")
                            .scrollLeft());
                    });
                    $(".wrap_booking_1_rows2").scroll(function() {
                        $(".wrap_booking_1_rows1").scrollLeft($(".wrap_booking_1_rows2")
                            .scrollLeft());
                    });
                });

                const my_account_slider = new Swiper('#my_account_slider', {
                    slidesPerView: "auto",
                    navigation: {
                        nextEl: '.wrap_acc_buttons1 .swiper-button-next',
                        prevEl: '.wrap_acc_buttons1 .swiper-button-prev',
                        clickable: true
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                            allowTouchMove: false
                        },
                        567: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                            allowTouchMove: false
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                            allowTouchMove: false
                        },
                        900: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                            allowTouchMove: false
                        },
                        1200: {
                            slidesPerView: "auto",
                            spaceBetween: 20,
                        },
                    },
                });
                const user_side_review_slider = new Swiper('#user_side_review_slider', {
                    slidesPerView: 4,
                    grabCursor: true,
                    navigation: {
                        nextEl: '.wrap_acc_buttons2 .swiper-button-next',
                        prevEl: '.wrap_acc_buttons2 .swiper-button-prev',
                        clickable: true
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        1400: {
                            slidesPerView: 2.4,
                            spaceBetween: 15,
                        },
                    },
                });
            },


            data: {


                hometownSearchText: '',
                currentCitySearchText: '',
                owner_mode: @json($is_owner),
                currentDescription: @json($user_profile->description),
                currentCity: @json($user->current_city),
                currentHometown: @json($hometown),
                currentEmail: @json($user->email),
                currentPhoneNr: @json($user->phone_number),
                newDescription: @json($user_profile->description),
                newCity: @json($user_profile->current_city),
                newHometown: @json($user_profile->hometown),
                newEmail: @json($user->email),
                newPhoneNr: @json($user->phone_number),
                editingPersonalInformation: false,

                userInterestList: @json($available_interests),
                currentUserInterests: @json($user->user_interests()),
                newUserInterests: @json($user->user_interests()),

                allUserLanguageList: @json($available_interests),
                userLanguageList: @json($available_languages),
                currentUserLanguageList: @json($user->user_languages()),
                newUserLanguageList: @json($user->user_languages()),
                editingPersonalInterests: false,
                editingUserLanguageList: false,
                emailVerified: @json($user->email_verified_at),
                phoneVerified: @json($user->phone_number_verified_at),




                profileImage: @json($profile_image),
                pendingProfileImage: null,
                uploadingProfileImage: false,




                wallImage: @json($wall_image),
                pendingWallImage: null,
                uploadingWallImage: false,


                currentAlbums: @json($user->albums),

                albumImages: [],
                currentAlbumImages: null,
                newAlbumImages: null,
                uploadingNewAlbum: false,
                newAlbumDescription: '',
                newAlbumTitle: '',
                newAlbumLocation: '',
                newAlbumPreviewImages: [],
                uploadNewAlbumPanelVisible: false,


                numberOfVisibleLanguages: 10,

            },

            computed: {

            },
            methods: {
                update_phone_number: function(data) {
                    this.newPhoneNr = data;
                    console.log(data);
                },
                current_city_selected: function(data) {
                    this.newCity = data;
                    this.currentCitySearchText = data.name + ', ' + data.country.name
                },
                current_hometown_selected: function(data) {
                    this.newHometown = data;
                    this.hometownSearchText = data.name + ', ' + data.country.name
                },


                nextSlide(evt, cityName) {
                    let j, tabcontent, tablinks;


                    tabcontent = document.getElementsByClassName("account_filter_box");
                    for (j = 0; j < tabcontent.length; j++) {
                        tabcontent[j].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("my_account_slide");
                    for (j = 0; j < tablinks.length; j++) {
                        tablinks[j].className = tablinks[j].className.replace(" my_account_slide_active", "");
                    }
                    document.getElementById(cityName).style.display = "flex";
                    evt.currentTarget.className += " my_account_slide_active";
                },

                // slide button click
                s_slide_active(e) {
                    console.log(e)
                    let j, tabcontent, tablinks;
                    if (e.classList.contains("swiper-button-disabled") == false) {
                        setTimeout(() => {
                            document.querySelector(".my_account_slide_active").classList.remove(
                                "my_account_slide_active")
                            document.querySelector(".swiper-slide-active").classList.add(
                                "my_account_slide_active")
                            document.querySelector(".swiper-slide-active").click()
                        }, 0)
                    }
                },

                toggleUserLanguage: function(language) {
                    if (this.languageAlreadySelected(language)) {
                        this.newUserLanguageList = this.newUserLanguageList.filter((value) => {
                            return !(value === language)
                        })
                    } else {
                        this.newUserLanguageList.push(language)
                    }
                },
                languageAlreadySelected: function(language_id) {

                    let language_exist = false;
                    for (let x = 0; x < this.newUserLanguageList.length; x++) {
                        if (this.newUserLanguageList[x].id === language_id) {
                            language_exist = true;
                        }
                    }

                    return language_exist;
                },
                toggleUserInterest: function(interest) {
                    if (this.interestAlreadySelected(interest.id)) {
                        this.newUserInterests = this.newUserInterests.filter((value) => {
                            return !(value.id === interest.id)
                        })
                    } else {
                        this.newUserInterests.push(interest)
                    }
                },
                interestAlreadySelected: function(interest_id) {

                    let interest_exist = false;
                    for (let x = 0; x < this.newUserInterests.length; x++) {
                        if (this.newUserInterests[x].id === interest_id) {
                            interest_exist = true;
                        }
                    }
                    console.log(interest_exist);
                    return interest_exist;
                },
                update_personal_information: async function() {
                    const formData = new FormData();
                    if (this.newDescription) {
                        formData.append("description", this.newDescription)
                    }
                    if (this.newCity) {
                        formData.append("city", this.newCity.id)
                    }
                    if (this.newHometown) {
                        formData.append("hometown", this.newHometown.id)
                    }
                    if (this.newEmail) {
                        formData.append("email", this.newEmail)
                    }
                    if (this.newPhoneNr) {
                        formData.append("phonenr", this.newPhoneNr)

                    }




                    try {
                        let resp = await axios.post('/profile/updatePersonalInformation', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })

                        if (this.newDescription) {
                            this.currentDescription = this.newDescription
                        }
                        if (this.newCity) {

                            this.currentCity = this.newCity
                        }
                        if (this.newHometown) {

                            this.currentHometown = this.newHometown
                        }

                        if (this.newPhoneNr) {
                            this.currentPhoneNr = this.newPhoneNr

                        }



                        this.editingPersonalInformation = false;



                    } catch (ex) {

                    } finally {

                    }
                },

                update_user_interests: async function() {
                    const formData = new FormData();
                    formData.append('interests', JSON.stringify(this.newUserInterests))



                    try {
                        let resp = await axios.post('/profile/interestList/update', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        this.currentUserInterests = this.newUserInterests
                        this.editingPersonalInterests = false;
                    } catch (ex) {

                    } finally {

                    }

                    return false
                },

                update_user_languages: async function() {
                    const formData = new FormData();
                    formData.append('languages', JSON.stringify(this.newUserLanguageList))



                    try {
                        let resp = await axios.post('/profile/languageList/update', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        this.currentUserLanguageList = this.newUserLanguageList
                        this.editingUserLanguageList = false;
                    } catch (ex) {

                    } finally {

                    }

                    return false
                },

                updateDescription: async function() {
                    const formData = new FormData();
                    formData.append("description", this.description)
                    try {
                        let resp = await axios.post('/profile/description/update', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        this.originalDescription = this.description;
                        this.editingDescription = false;

                    } catch (ex) {

                    } finally {

                    }
                },
                onChange(event) {
                    this.imagesArray = event.target.files
                },
                async onChangeProfileImage(event) {
                    this.pendingProfileImage = event.target.files
                    await this.uploadProfilePicture();

                },
                async onChangeWallImage(event) {
                    this.pendingWallImage = event.target.files
                    await this.uploadWallPicture();

                },

                async onChangeNewAlbumUpload(event) {
                    this.newAlbumPreviewImages = [];
                    this.newAlbumImages = event.target.files
                    for (const i of Object.keys(this.newAlbumImages)) {
                        this.newAlbumPreviewImages.push(URL.createObjectURL(this.newAlbumImages[i]));
                    }
                    //   await this.uploadNewAlbum();

                },

                async uploadImages() {
                    this.uploading = true;
                    const formData = new FormData();
                    for (const i of Object.keys(this.imagesArray)) {
                        formData.append('imagesArray', this.imagesArray[i])
                    }

                    try {
                        let resp = await axios.post('/profile/images/upload', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        this.renderedImagesArray.push(resp.data);
                        this.imagesArray = [];
                    } catch (ex) {

                    } finally {
                        this.uploading = false;
                    }

                },

                async uploadProfilePicture() {
                    this.uploadingProfileImage = true;
                    const formData = new FormData();
                    for (const i of Object.keys(this.pendingProfileImage)) {
                        formData.append('profile_image', this.pendingProfileImage[i])
                    }

                    try {
                        let resp = await axios.post('/profile/profile_pic/upload', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        this.profileImage = resp.data;
                        this.pendingProfileImage = null;
                    } catch (ex) {

                    } finally {
                        this.uploadingProfileImage = false;

                    }


                },
                async uploadWallPicture() {
                    this.uploadingWallImage = true;
                    const formData = new FormData();
                    for (const i of Object.keys(this.pendingWallImage)) {
                        formData.append('wall_pic', this.pendingWallImage[i])
                    }
                    formData.append('description', this.album)

                    try {
                        let resp = await axios.post('/profile/wall_pic/upload', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        this.wallImage = resp.data;
                        this.pendingWallImage = null;
                    } catch (ex) {

                    } finally {
                        this.uploadingProfileImage = false;

                    }


                },
                async uploadNewAlbum() {
                    this.uploadingNewAlbum = true;
                    const formData = new FormData();
                    for (const i of Object.keys(this.newAlbumImages)) {
                        formData.append('pics[]', this.newAlbumImages[i])
                    }


                    formData.append('description', this.newAlbumDescription)
                    formData.append('title', this.newAlbumTitle)
                    formData.append('location', this.newAlbumLocation)
                    /*  formData.append('pics', this.newAlbumImages)  */

                    try {
                        let resp = await axios.post('/profile/new_album/upload', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        /*   this.wallImage = resp.data; */


                        this.uploadNewAlbumPanelVisible = false;
                        this.newAlbumImages = null;
                        this.newAlbumPreviewImages = [];

                        this.currentAlbums = resp.data;
                    } catch (ex) {

                    } finally {
                        this.uploadingNewAlbum = false;

                    }


                },

                async deleteAlbum(album_id) {
                    let formData = new FormData();
                    formData.append('album_id', album_id);

                    try {
                        let resp = await axios.post('/profile/delete_album', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })

                        this.currentAlbums = resp.data;
                    } catch (ex) {

                    }
                },


                openDialogProfileImage() {
                    $("#images_to_be_uploaded_profile_image").click()
                },

                openDialogWallImage() {
                    $("#images_to_be_uploaded_profile_image").click()
                },
            }
        })
    </script>
@endsection
