@extends('layout')
@section('head')
    <link href="/css-n/ticket.css" rel="stylesheet">
    <link href="/css-n/ticket-responsive.css" rel="stylesheet">

    <style>
        .my-button {
            min-width: 225px;
            font-size: 16px;
            line-height: 35px;
            font-weight: 500;
            color: #ffffff;
            background-color: #FE2F70;
            border-radius: 0;
            border: none;
            min-height: 48px;
            -webkit-box-shadow: 0px 0px 15px 0px rgba(254, 47, 112, 0.5);
            -moz-box-shadow: 0px 0px 15px 0px rgba(254, 47, 112, 0.5);
            box-shadow: 0px 0px 15px 0px rgba(254, 47, 112, 0.5);
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            border-radius: 15px;
        }

    </style>
@endsection


@section('content')


    <!-- Account Start -->
    <section id="giftcard_app" class="account-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><img src="/images-n/icons/small-arrow.png" alt=""></li>
                            <li><a href="#">Tickets</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-cols">
                        <div class="account-left-col">
                            <div class="account-menu">
                                <p>Account Settings</p>
                                <ul>
                                    <li><a href="{{ route('profile-personal-information') }}"><img
                                                src="/images-n/icons/icon-1.png" alt=""> Personal
                                            Information</a></li>
                                    <li><a class="active" href="{{ route('profile-my-tickets') }}"><img
                                                src="/images-n/icons/icon-2.png" alt=""> My Balance</a></li>
                                   <li><a href="{{ route('profile-my-coupons') }}"><img src="/images-n/icons/icon-3.png"
                                                alt=""> My Gift Cards</a></li>
                                    {{-- <li><a href="{{ route('payment-methods-home') }}"><img
                                                src="/images-n/icons/icon-4.png" alt=""> Payment
                                            Method</a></li> --}}
                                    <li><a href="{{ route('profile-change-password') }}"><img
                                                src="/images-n/icons/icon-5.png" alt=""> Change Password</a>
                                    </li>
                                    <li><a href="{{ route('profile-account-verification') }}"><img
                                                src="/images-n/icons/icon-6.png" alt=""> Account
                                            Verification</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="account-right-col">
                            <p class="box-heading">My Balance</p>
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <div class="p-4 d-flex flex-column align-items-center  justify-content-center "
                                    style="gap:20px;">
                                    <div>
                                        Your Balance Is
                                    </div>
                                    <div style="background-color: rgb(228, 228, 228);padding:10px;border-radius:15px;">
                                        €@{{ available_balance }} EUR</div>
                                    <div v-if="!card_generated">
                                        <button class="btn my-button" v-on:click="redeemBalance" type="button">Redeem Balance as Gift Card</button>
                                    </div>
                                    <div v-if="card_generated" class="d-flex flex-column">
                                       <div>Your Gift Card Code Is </div>
                                       <div>@{{card_code}} </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('scripts')
    <script type="text/javascript">
        const giftcard = new Vue({
            el: "#giftcard_app",
            data: {
                available_balance: @json($user->getBalance()),
                card_generated: false,
                card_code: '',
                card_value: 0,
            },
            methods: {
                redeemBalance: async function() {
                    try {
                        let resp = await axios.post('/payment/redeem_balance_as_gift_card')
                        this.card_generated = true;
                        this.card_code = resp.data.code;
                        this.card_value = resp.data.amount;
                    } catch (ex) {
                        this.card_generated = false;
                    }

                }
            }
        })
        // Datepicker Active Script
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });



        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function() {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }


        // Back To Top
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function() {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function() {
                backToTop();
            });
            $('#back-to-top').on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 1000);
            });
        }
    </script>


@endsection
