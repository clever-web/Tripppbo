<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ Session::token() }}">

    <link rel="icon" type="image/png" href="{{ asset('images-n/logo2.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/navbar-responsive.css') }}">


    <link rel="stylesheet" href="{{ asset('css-n/footer.css') }}">
    <link href="{{ asset('css-n/chat-window.css') }}" rel="stylesheet">

    <link href="/css-n/report-popup.css" rel="stylesheet">
    <link href="/css-n/sign-in-required-popup.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5c7d1f5b9d.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="{{ asset('css-r/home/style.css') }}" rel="stylesheet" />
    @yield('head')
    <link href="{{ asset('css/css-general-fixes.css') }}" rel="stylesheet" />
    <style>
        .modal-content,
        .modal-content * {
            border-radius: 15px !important;
        }
    </style>

</head>


<body>

    @yield("opening-body-tag")
    @include("custom-components.modals")
    @include('custom-components.navbar')

    <div class="container-fluid" style="overflow-x:hidden;margin:0px !important; padding:0px !important;">


        @yield('content')


        @include("custom-components.footer")


    </div>

    @include("custom-components.chat")
    @include("custom-components.notifications")
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}">
        < script src = "{{ asset('js-n/localforage.js') }}" >
    </script>
    <script src="{{ asset('js-n/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js-n/moment.js') }}"></script>

    {{-- <script src="{{asset('js-n/particles.js')}}"></script>
<script src="{{asset('js-n/particles-app.js')}}"></script> --}}
    <script src="{{ asset('js-n/select2.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->


    <script src="{{ asset('js/timezone.js') }}"></script>
    <script>
        $('#socialMediaShare').on('show.bs.modal', function(e) {

            let link = $(e.relatedTarget).data('link');


            $('#social-media-share-link-modal-facebook').attr("href",
                "https://www.facebook.com/sharer/sharer.php?u=" + link);
            $('#social-media-share-link-modal-twitter').attr("href", "http://twitter.com/share?text=@Trippbo&url=" +
                link + "&hashtags=Trippbo");;
            $('#pageLink').val(link);
        })

        $('#reportModal').on('show.bs.modal', function(e) {

            let violating_object = $(e.relatedTarget).data('violating-object');
            let violating_object_id = $(e.relatedTarget).data('violating-object-id');
            $('#report_violating_object').val(violating_object);
            $('#report_violating_object_id').val(violating_object_id);


        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit', 'form.AjaxForm', function() {
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(data) {
                    $('#reportModal').modal('hide')
                },
                error: function(xhr, err) {

                }
            });
            return false;
        });

        function submitReport() {

        }
    </script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })();
    </script>
    <script>
        @auth
            let default_profile_picture = '{{ $default_profile_picture }}'

            function closeChat(id) {
            $("#chat-box" + id).addClass('hidden-chat');
            }

            $('#reportModal').on('shown.bs.modal', function (el) {
            $('#myInput').trigger('focus')
            });


            async function getChatDetails(id) {


            try {
            const response = await axios.get('/getChatDetails?user_id=' + id);
            username = response.data.name
            profile_pic = response.data.picture_url
            if (profile_pic == 'no-picutre') {
            profile_pic = default_profile_picture
            }
            $("#chat-box" + id).find('.username').text(username);
            $("#chat-box" + id).find('.chat-profile-img').attr('src', profile_pic);


            } catch (error) {
            console.log(error);
            }


            }


            async function get_chat_history(receiver_id) {


            const response = await axios.get('/getChatHistory?user_id=' + receiver_id);
            messages = response.data.messages
            return messages;
            }


            async function start_chat(id, message_received = false) {
            var profile_pic = "";
            var username = "";
            if ($("#chat-box" + id).length > 0) {
            $("#chat-box" + id).removeClass('hidden-chat');
            return false;
            } else {


            $("#live-chat-exp").clone().attr("id", "chat-box" + id).appendTo('#chats-center');

            $("#chat-box" + id).removeClass('hidden-chat');
            $("#chat-box" + id).find(".chat-input").attr('id', 'chat_message' + id)
            $("#chat-box" + id).find('.button-send').attr('onclick', 'sendmessage(' + id + ')');
            $("#chat-box" + id).find('.close-chat').attr('onclick', 'closeChat(' + id + ')');
            $("#chat-box" + id).find('.chat_message').attr('id', 'chat_message' + id);
            await getChatDetails(id);
            messages = await get_chat_history(id)
            addMessages(id, messages, message_received);
            $('#chat_message' + id).on('keypress', function (e) {
            if (e.which == 13) {
            sendmessage(id);
            }
            });

            return true;
            }

            }


            my_id = {{ \Illuminate\Support\Facades\Auth::id() }};


            my_chat_profile_picture =
            '{{ $profile_picture_url ? asset('storage/' . $profile_picture_url) : $default_profile_picture }}'

            function listenToChannel() {

            Echo.private('user.' + my_id)
            .listen(`ChatMessageSent`, (e) => {
            messageReceived(e, e.message.user_id)
            });

            }


            async function messageReceived(e, receiver_id) {

            await start_chat(receiver_id, true);

            if (e.message.user_id == my_id) {

            } else {
            var d = new Date();
            var d = new Date();

            let minutes = "";
            if (d.getMinutes() < 10) { minutes="0" + d.getMinutes(); } else { minutes=d.getMinutes(); } $("#chat-box" +
                receiver_id).find(".live-chat-content").append(` <div class="live-chat-text live-chat-left">
                <img src="${$(" #chat-box" + receiver_id).find('.chat-profile-img').attr('src')}" alt="" class="img-fluid">
                <p class='receiver'>` + e.message.message + `</p>
                <span>${d.getHours() + ":" + minutes}</span>
                </div>
                `)


                var d = $("#chat-box" + receiver_id).find(".live-chat-content");
                d.scrollTop(d.prop("scrollHeight"));
                }

                }

                function addMessages(receiver_id, messages, disregardLast = false) {
                disregrad_index = 0;
                if (disregardLast == true) {
                disregardLast = 1;
                }
                for (let index = 0; index < messages.length - disregardLast; index++) { var d=new Date(); if
                    (messages[index].user_id==my_id) { $("#chat-box" + receiver_id).find(".live-chat-content").append(` <div
                    class="live-chat-text live-chat-right">
                    <img src="${my_chat_profile_picture}" alt="" class="img-fluid">
                    <p class='sender'>` + messages[index].message + `</p>

                    </div>
                    `)
                    } else {
                    $("#chat-box" + receiver_id).find(".live-chat-content").append(`

                    <div class="live-chat-text live-chat-left">
                        <img src="${$(" #chat-box" + receiver_id).find('.chat-profile-img').attr('src')}" alt="" class="img-fluid">
                        <p class='receiver'>` + messages[index].message + `</p>

                    </div>
                    `)
                    }


                    }


                    var d = $("#chat-box" + receiver_id).find(".live-chat-content");
                    d.scrollTop(d.prop("scrollHeight"));
                    }


                    function sendmessage(receiver_id) {
                    if ($("#chat_message" + receiver_id).val() != "") {


                    $.ajax({
                    type: 'POST',
                    url: '/sendchatmessage',
                    data: {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    'message': $("#chat_message" + receiver_id).val(),
                    'receiver_id': receiver_id

                    },
                    beforeSend: function () {
                    var d = new Date();

                    let minutes = "";
                    if (d.getMinutes() < 10) { minutes="0" + d.getMinutes(); } else { minutes=d.getMinutes(); } $("#chat-box" +
                        receiver_id).find(".live-chat-content").append(` <div class="live-chat-text live-chat-right">
                        <img src="${my_chat_profile_picture}" alt="" class="img-fluid">
                        <p class='sender'>` + $("#chat_message" + receiver_id).val() + `</p>
                        <span>${d.getHours() + ":" + minutes}</span>
                        </div>
                        `)

                        var d = $("#chat-box" + receiver_id).find(".live-chat-content");
                        d.scrollTop(d.prop("scrollHeight"));
                        $("#chat_message" + receiver_id).val('')
                        },
                        success: function () {


                        },
                        error: function () {

                        },
                        complete: function () {

                        }
                        });
                        }
                        }


                        listenToChannel();



                        //listen for notifications
                        Echo.private('App.Models.User.' + {{ Auth::id() }})
                        .notification((notification) => {


                        if (notification.event == 'fundmytrip.trip-finalized')
                        {
                        if (vue_app_fund_my_trip)
                        {
                        vue_app_fund_my_trip.finalizingDone();
                        }
                        }
                        if (notification.event == 'fundmytrip.single-trip-finalized-hotel')
                        {
                        if (vue_app_fund_my_trip)
                        {
                        vue_app_fund_my_trip.updateHotelPrice(notification.user_id, notification.hotel_price,
                        notification.hotel_price_currency)
                        }
                        return;
                        }
                        if (notification.event == 'fundmytrip.single-trip-finalized-flight')
                        {
                        if (vue_app_fund_my_trip)
                        {
                        vue_app_fund_my_trip.updateFlightPrice(notification.user_id, notification.flight_price,
                        notification.flight_price_currency)


                        }
                        return;
                        }
                        showNotification(notification);

                        });


                        let notification_id = 0

                        function showNotification(notification) {
                        $("#notification-template").clone().attr("id", "notification" +
                        notification_id).appendTo('#notifications-center');
                        $("#notification" + notification_id).removeClass('invisible');

                        $("#notification" + notification_id).html(`
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <a href="${notification.link}" style="color:inherit;">
                                    <strong class="mr-auto">${notification.title}</strong>
                                    <small>Now</small>
                                </a>
                                <button type="button" class="ml-auto mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                                <a href="${notification.link}" style="color:inherit;"> ${notification.text} </a>
                            </div>
                        </div>
                        `)

                        /* $("#notification" + notification_id).html(`
                        <div class="alert alert-danger alert-dismissible notification-alert fade show" role="alert">
                            <strong> <a style="color:inherit;" href="${notification.link}"> ${notification.title}</a> </strong>
                            <br>
                            ${notification.text}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        `) */

                        /* else if (notification.event == 'fundmytripsolo.new-donation')
                        {

                        $("#notification" + notification_id).html(`
                        <div class="alert alert-danger alert-dismissible notification-alert fade show" role="alert">
                            <strong> <a style="color:inherit;" href="${notification.link}"> One of your trips has been funded! </a>
                            </strong>
                            <br>
                            You received a donation of $<span class="notification-text">${notification.amount}</span>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        `)


                        }
                        else if (notification.event == 'fundmytrip.join-request-accepted')
                        {
                        $("#notification" + notification_id).html(`
                        <div class="alert alert-danger alert-dismissible notification-alert fade show" role="alert">
                            <strong> <a style="color:inherit;" href="${notification.link}"> Your Join Request Has Been Accepted!
                                </a>
                            </strong>
                            <br>
                            <a style="color:inherit" href=${notification.link}>Click here to go to the trip page.</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        `)
                        } */


                        let notifi = $("#notification" + notification_id).find(".toast")

                        $(notifi).toast({

                        delay: 8000,
                        });
                        $(notifi).toast('show');

                        /* setTimeout( () => {
                        $(notifi).alert('close');

                        }, 8000) */

                        notification_id += 1;


                        }

                        $('#navbar-user-notifications').on('hidden.bs.collapse', () => {

                        axios.post('{{ route('notifications-mark-all-as-read') }}')
                        .then(function() {
                        $("#user_notifications_count").html("0")
                        $(".unread").addClass("invisible")
                        }

                        )

                        })
                    @endauth
    </script>

    <script>
        $(document).click(function(event) {
            var $target = $(event.target);
            if (!$target.closest('#navbar-user-menu').length &&
                $('#navbar-user-menu').is(":visible")) {
                $('#navbar-user-menu').collapse('hide')
            }
        });

        $(document).click(function(event) {
            var $target = $(event.target);
            if (!$target.closest('#navbar-user-notifications').length &&
                $('#navbar-user-notifications').is(":visible")) {
                $('#navbar-user-notifications').collapse('hide')
            }
        });
        $(document).click(function(event) {
            var $target = $(event.target);
            if (!$target.closest('#navbar-user-messages').length &&
                $('#navbar-user-messages').is(":visible")) {
                $('#navbar-user-messages').collapse('hide')
            }
        });
        $('#collapseExample').on('shown.bs.collapse', function() {


        })
    </script>
    @yield('scripts')
</body>

</html>
