    <div class="user_profile_options_after" :class="{user_profile_options_after_active: navbarExpanded}"></div>
    {{-- id="navbar_chat_app"  --}}
    <!-- navigation bar -->
    <nav id="navbar_chat_app" class="navbar navbar-expand-xl navbar-light site_nav">
        <div   class="container-lg pad_lg">
            <a class="navbar-brand" href="{{ route('home') }}"><img class="site_logo" src="/img/site_logo.svg"
                    alt="Site logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="/img/humburger.svg" alt="humburger icon">
            </button>
            <div class="collapse navbar-collapse navbar_collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar_nav ms-lg-2 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs_14" href="{{ route('home') }}">Book a trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs_14" href="{{ route('trips-browse') }}">fund my trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs_14" href="{{ route('solos-browse') }}">fund my trip <span
                                class="nav_span">solo</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs_14" href="{{ route('ticket-lottery-home') }}">ticket lottery</a>
                    </li>
                    <li class="nav-item nav_item_action mt-3">
                        <button v-on:click="isNavbarNotificationsVisible = !isNavbarNotificationsVisible"  class="nav_btn_option nav_btn_option_p1 me-4 user_nav_option">
                            <img width="25" src="/img/icons8_notification.svg" alt="">
                            <div class="user_nav_options user_nav_options2 px-0" :class="{user_profile_options_active : isNavbarMessagesVisible}">
                                <div class="d-flex px-sm-4 px-3 mt-2">
                                    <h6 class="text_dark_blue mb-0 me-auto fw_gilroy_bold">Messages</h6>
                                </div>
                                <ul  class="user_nav_options_ul user_nav_options_ul1 list-unstyled mt-3 ps-sm-4 ps-3">
                                    <li v-for="message in navbar_chat_messages" v-on:click="addChatToChatApp(message)">
                                        <a href="#" class="d-flex align-items-center">
                                            <div class="position-relative me-2">
                                                <img v-if="my_user_id == message.sender.id" :src="extractProfileImage(message.receiver.profile.picture_url)" alt="">
                                                <img v-if="my_user_id == message.receiver.id" :src="extractProfileImage(message.sender.profile.picture_url)" alt="">


                                            </div>
                                            <div class="flex-grow-1">


                                                <h6 v-if="my_user_id == message.sender.id" class="text_dark_blue fw_gilroy_bold text-start mb-0">@{{message.receiver.name}}</h6>
                                                <h6 v-if="my_user_id == message.receiver.id" class="text_dark_blue fw_gilroy_bold text-start mb-0">@{{message.sender.name}}</h6>

                                                <h6 class="text_dark_blue fw_gilroy_medium text-start mb-0">@{{message.last_message}}</h6>
                                                <p class="mb-0 text-start fs_14 text_silver">@{{messageTime(message.time)}}</p>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </button>
                        <button  v-on:click="isNavbarMessagesVisible = !isNavbarMessagesVisible"  class="nav_btn_option nav_btn_option_p2 user_nav_option">
                            <img width="27"  src="/img/message.svg" alt="">
                            <div :class="{user_profile_options_active: isNavbarNotificationsVisible }" class="user_nav_options user_nav_options2 px-0">
                                <div class="d-flex px-sm-4 px-3 mt-2">
                                    <h6 class="text_dark_blue mb-0 me-auto fw_gilroy_bold">Notifications</h6>
                                    <span><img width="14" class="mb-1" src="/img/icons8_no_audio.svg"
                                            alt=""></span>
                                </div>
                                <ul class="user_nav_options_ul user_nav_options_ul1 list-unstyled mt-3 ps-sm-4 ps-3">
                                    <li v-for="notification in notifications">
                                        <a :href="notification.data.link" class="d-flex align-items-center">
                                            <div class="position-relative me-2">
                                                <img src="img/Group 1683.svg" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="text_dark_blue fw_gilroy_bold text-start mb-0">@{{notification.data.title}}</h6>
                                                <h6 class="text_dark_blue fw_gilroy_medium text-start mb-0">@{{notification.data.text}}</h6>
                                                <p class="mb-0 text-start fs_14 text_silver">@{{messageTime(notification.created_at)}}</p>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="nav_right2">
                <button  v-on:click="isNavbarNotificationsVisible = !isNavbarNotificationsVisible" class="nav_btn_option nav_btn_option_d me-3 user_nav_option">
                    <img width="25" src="/img/icons8_notification.svg" alt="">
                    <div  class="user_nav_options user_nav_options2 px-0" :class="{user_profile_options_active: isNavbarNotificationsVisible }">
                        <div class="d-flex px-sm-4 px-3 mt-2">
                            <h6 class="text_dark_blue mb-0 me-auto fw_gilroy_bold">Notifications</h6>
                        </div>
                        <ul class="user_nav_options_ul user_nav_options_ul1 list-unstyled mt-3 ps-sm-4 ps-3">
                            <li v-for="notification in notifications">
                                <a :href="notification.data.link" class="d-flex align-items-center">
                                    <div class="position-relative me-2">
                                        <img src="/img/Group 1683.svg" alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="text_dark_blue fw_gilroy_bold text-start mb-0">@{{notification.data.title}}</h6>
                                        <h6 class="text_dark_blue fw_gilroy_medium text-start mb-0">@{{notification.data.text}}</h6>
                                        <p class="mb-0 text-start fs_14 text_silver">@{{messageTime(notification.created_at)}}</p>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                </button>
                <button  v-on:click="isNavbarMessagesVisible = !isNavbarMessagesVisible" class="nav_btn_option nav_btn_option_d me-3 user_nav_option">
                    <img width="27" src="/img/message.svg" alt="">
                    <div class="user_nav_options user_nav_options2 px-0" :class="{user_profile_options_active : isNavbarMessagesVisible}" >
                        <div class="d-flex px-sm-4 px-3 mt-2">
                            <h6 class="text_dark_blue mb-0 me-auto fw_gilroy_bold">Messages</h6>
                            <span><img width="14" class="mb-1" src="/img/icons8_no_audio.svg"
                                    alt=""></span>
                        </div>
                        <ul class="user_nav_options_ul list-unstyled mt-3 ps-sm-4 ps-3">
                            <li  v-for="message in navbar_chat_messages" v-on:click="addChatToChatApp(message)">
                                <a href="#" class="d-flex align-items-center user_status_opt_online">
                                    <div class="position-relative me-2">
                                        <img v-if="my_user_id == message.sender.id" :src="extractProfileImage(message.receiver.profile.picture_url)" alt="">
                                        <img v-if="my_user_id == message.receiver.id" :src="extractProfileImage(message.sender.profile.picture_url)" alt="">

                                        <div class="user_status_opt_b chat_user_status_online"></div>
                                    </div>
                                    <div class="flex-grow-1">

                                        <h6 v-if="my_user_id == message.sender.id" class="text_dark_blue fw_gilroy_bold text-start mb-0">@{{message.receiver.name}}</h6>
                                        <h6 v-if="my_user_id == message.receiver.id" class="text_dark_blue fw_gilroy_bold text-start mb-0">@{{message.sender.name}}</h6>

                                        <h6 class="text_dark_blue fw_gilroy_medium text-start mb-0">@{{message.last_message}}</h6>
                                        <p class="mb-0 text-start fs_14 text_silver">@{{messageTime(message.time)}}</p>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                </button>
                <button id="user_profile_option" class="user_nav_option" :class="{user_profile_option_active: navbarExpanded}" v-on:click="navbarExpanded = !navbarExpanded">
                    <img style="width:50px;height:50px;border-radius:50%"
                        src="{{ $profile_picture_url ? asset('storage/' . $profile_picture_url) : $default_profile_picture }}"
                        class="me-2" alt="">
                    <span><img width="18" src="/img/icons8_back.svg" alt=""></span>
                    <!-- user_profile_options -->
                    <ul class="user_profile_options user_nav_options list-unstyled" :class="{user_profile_options_active: navbarExpanded}">
                        <li class="mb-3">
                            <a href="#1"><img class="me-sm-3 me-2" src="/img/icons8_book.svg" alt="">
                                <span>Manage Booking</span></a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ route('profile-home', \Illuminate\Support\Facades\Auth::id()) }}"><img class="me-sm-3 me-2" src="/img/icons8_user.svg" alt="">
                                <span>My Profile</span></a>
                        </li>
                        <li class="mb-3">
                            <a href="/profile/edit"><img class="me-sm-3 me-2" src="/img/icons8_settings.svg" alt="">
                                <span>Settings</span></a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"><img class="me-sm-3 me-2" src="/img/icons8_login.svg"
                                    alt=""> <span>Log out</span></a>
                        </li>
                    </ul>
                </button>
            </div>
        </div>
    </nav>
