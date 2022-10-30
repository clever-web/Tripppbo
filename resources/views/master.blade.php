<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-69ZK6LZZLY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-69ZK6LZZLY');
    </script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trippbo</title>
    <meta name="csrf-token" content="{{ Session::token() }}">

    @yield('beforecss')

    <!-- calendar CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.bootstrap.year.calendar.min.css') }}">

    <!-- swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    @if (isset($include_css) && $include_css == false)
    @else
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/_partials.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
        <!-- CSS v.2 -->
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive2.css') }}" media="all">
        <!-- CSS v.3 -->
        <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive3.css') }}" media="all">
    @endif





    <!-- Nice select CSS -->
    <link href="{{ asset('css/nice-select2.css') }}" rel="stylesheet" />
    <!-- jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <!-- calender js -->

    <script></script>
    <style>
        .message_box_sm {
            max-width: 420px;
            position: static;
            bottom: -3%;

            background-color: var(--white);
            box-shadow: 0 5px 50px #0009413b;
            border-radius: 20px;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            -ms-border-radius: 20px;
            -o-border-radius: 20px;
            z-index: 100;
            transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
        }

        .profile_img_sm img {
            object-fit: cover;
        }

        .message_box_sm .user_chart_box img {
            object-fit: cover;
            height: 50px;
        }

        .message_box_sm {
            min-width: 310px;
        }

        .chat_hidden {
            display: none;
        }

        .member_request_item_img {
            height: 70px;
            object-fit: cover;
        }

        .slide_user_details_left_img img {
            height: 90px;
            object-fit: cover;
        }

        .btn.btn-primary.btn-sm.jqyc-next-year.jqyc-change-year {
            background-color: #fe2f70;
            border-color: #fe2f70
        }

        .btn.btn-primary.btn-sm.jqyc-prev-year.jqyc-change-year {
            background-color: #fe2f70;
            border-color: #fe2f70
        }
    </style>
    @yield('css-links')

</head>

<body>

    @Include('custom-components.share-modal')
    @if (Auth::check())
        @Include('custom-components.navbar-loggedin')
        @Include('custom-components.chat-window')
        @include('custom-components.notifications-window')
    @else
        @Include('custom-components.navbar')
    @endif

    @yield('content')
    @Include('custom-components.footer')

    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/trippbo-app.js') }}"></script>
    <!-- swiper JS -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- indes JS -->
    <script src="{{ asset('js/index.js') }}"></script>
    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Nice select JS -->
    <script src="{{ asset('js/nice-select2.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/jquery.bootstrap.year.calendar.min.js') }}"></script>
    <script>
        if (document.querySelector("#user_profile_option")) {
            document.querySelector("#user_profile_option").addEventListener("click", (e) => {
                document.querySelector("#user_profile_option").classList.add("user_profile_option_active");
                document.querySelector(".user_profile_options").classList.add("user_profile_options_active");
                document.querySelector(".user_profile_options_after").classList.add(
                    "user_profile_options_after_active");
            })

            document.querySelector(".user_profile_options").addEventListener("click", (e) => {
                e.stopPropagation();
                document.querySelector("#user_profile_option").classList.remove("user_profile_option_active");
                document.querySelector(".user_profile_options").classList.remove("user_profile_options_active");
                document.querySelector(".user_profile_options_after").classList.remove(
                    "user_profile_options_after_active");
            })

            document.querySelector(".user_profile_options_after").addEventListener("click", (e) => {
                document.querySelector("#user_profile_option").classList.remove("user_profile_option_active");
                document.querySelector(".user_profile_options").classList.remove("user_profile_options_active");
                document.querySelector(".user_profile_options_after").classList.remove(
                    "user_profile_options_after_active");
            })
        }

        if (document.querySelectorAll(".nav_btn_option").length > 0) {
            let nav_btn_option = document.querySelectorAll(".nav_btn_option");
            for (let i = 0; nav_btn_option.length > i; i++) {
                nav_btn_option[i].addEventListener("click", (e) => {
                    // console.log(nav_btn_option[i].querySelector(".user_nav_options_ul"))
                    nav_btn_option[i].querySelector(".user_nav_options2").classList.add(
                        "user_profile_options_active");
                    document.querySelector(".user_profile_options_after").classList.add(
                        "user_profile_options_after_active");

                    setTimeout(() => {
                        document.querySelector(".user_profile_options_after").addEventListener("click", (
                            e) => {
                            nav_btn_option[i].querySelector(".user_nav_options2").classList.remove(
                                "user_profile_options_active");
                            document.querySelector(".user_profile_options_after").classList.remove(
                                "user_profile_options_after_active");
                        })
                    }, 0)
                });

            }
        }
    </script>

    <script></script>
    @yield('scripts-links')

    @if ($try_to_init_nice_select ?? true)
        <script>
            if (document.getElementsByClassName('child_select_box').length > 0) {
                let select_box = document.querySelectorAll(".child_select_box");
                for (let i = 0; i < select_box.length; i++) {
                    NiceSelect.bind(select_box[i]);
                }
            }
        </script>
    @endif
    @if (Auth::check())
        <script>
            let chat_app_shared_state = {

            };

            let notifications_shared_state = @json($user_notifications);
            let new_notifications = [];

            const chat_app = new Vue({
                el: "#chat_app",

                data: {
                    shared_state: chat_app_shared_state,
                    chat_windows: [],
                    my_user_id: @json(Auth::id()),
                    my_profile_pic: '/storage/' + @json(Auth::user()->profile->picture_url),


                },
                methods: {


                    addChatWindow: function(user_id) {

                        let object_key = "user_" + user_id

                        let user_chat_window = this.chat_windows.filter((c) => {
                            return c.user_id == user_id
                        })


                        if (user_chat_window.length > 0) {
                            this.$refs[object_key][0].showChat();

                        } else {
                            this.$set(this.chat_windows, this.chat_windows.length, {
                                user_id: user_id,
                                my_user_id: this.my_user_id
                            })
                        }




                    },
                    listenToChannel: function() {

                        Echo.private('user.' + this.my_user_id)
                            .listen(`ChatMessageSent`, (e) => {
                                this.messageReceived(e, e.message.user_id)
                            });

                    },
                    messageReceived: function(e, user_id) {
                        if (user_id == this.my_user_id) {
                            return
                        }


                        let object_key = 'user_' + user_id;

                        let user_chat_window = this.chat_windows.filter((c) => {
                            return c.user_id == user_id
                        })
                        console.log(user_chat_window)

                        if (user_chat_window.length > 0) {
                            this.$refs[object_key][0].showChat();
                            this.$refs[object_key][0].handleNewMessage(e, user_id)

                        } else {
                            this.addChatWindow(user_id);
                            this.$nextTick(function() {
                                this.$refs[object_key][0].handleNewMessage(e, user_id)
                            })
                        }


                        this.updateRecentMessages(e)




                    },
                    messageSentHandler: function(e) {

                        this.updateRecentMessages(e)
                    },
                    updateRecentMessages: function(e) {
                        console.log('event')
                        console.log(e)

                        chat_app_shared_state.recent_chats.forEach(c => {
                            if (c.conversation_id == e.message.conversation_id) {

                                c.last_message = e.message.message


                                c.time = moment().format()
                                console.log("worked 2222")
                                console.log(e)
                                console.log(c)
                                console.log("worked 2222")
                            }
                        })

                    }
                },

                mounted: function() {
                    this.listenToChannel();
                }


            });


            const notifications_app = new Vue({
                el: "#notifications_app",
                data: {

                    notifications: [],
                    all_notifications: notifications_shared_state,
                },
                methods: {},
                mounted: function() {
                    Echo.private('App.Models.User.' + {{ Auth::id() }})
                        .notification((notification) => {
                            this.notifications.push(notification);
                            this.all_notifications = [notification, ...this.all_notifications]


                        });
                }
            })

            const navbar_chat_app = new Vue({
                el: "#navbar_chat_app",

                data: {
                    shared_state: chat_app_shared_state,
                    isNavbarMessagesVisible: false,
                    isNavbarNotificationsVisible: false,
                    chat_windows: [],
                    my_user_id: @json(Auth::id()),
                    my_profile_pic: '/storage/' + @json(Auth::user()->profile->picture_url),
                    navbar_chat_messages: [],

                    navbarExpanded: false,

                    notifications: notifications_shared_state,

                },
                methods: {

                    extractProfileImage: function(url) {
                        if (url) {
                            return '/storage/' + url;

                        } else

                        {
                            return '/images-n/profile-picture-place-holder.png'
                        }
                    },
                    messageTime: function(time) {

                        let now = moment();


                        let message_time = moment(time);

                        let difference_in_days = Math.floor(now.diff(message_time, 'days'))
                        let difference_in_hours = Math.floor(now.diff(message_time, 'hours'))
                        let difference_in_minutes = Math.floor(now.diff(message_time, 'minutes'))


                        if (difference_in_days > 0) {
                            return `${difference_in_days} days ago`
                        }
                        if (difference_in_hours > 0) {
                            return `${difference_in_hours} hours ago`
                        }
                        if (difference_in_minutes > 0) {
                            return `${difference_in_minutes} minutes ago`
                        }




                    },


                    addChatToChatApp: function(message) {

                        if (message.sender.id == this.my_user_id) {
                            chat_app.addChatWindow(message.receiver.id)

                        } else {
                            chat_app.addChatWindow(message.sender.id)
                        }




                    }

                },

                mounted: async function() {
                    let resp = await axios.post('/getRecentChats')
                    this.navbar_chat_messages = resp.data
                    chat_app_shared_state.recent_chats = resp.data



                }


            });
        </script>
    @endif
</body>



</html>
