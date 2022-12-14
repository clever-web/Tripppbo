@extends('layout')
@section('head')
    <link href="/css-n/coupons.css" rel="stylesheet">
    <link href="/css-n/coupons-responsive.css" rel="stylesheet">
@endsection


@section('content')


    <!-- Account Start -->
    <section id="vue_app" class="account-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><img src="/images-n/icons/small-arrow.png" alt=""></li>
                            <li><a href="#">My Coupons</a></li>
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
                                    <li><a href="{{ route('profile-my-tickets') }}"><img src="/images-n/icons/icon-2.png"
                                                alt=""> My Balance</a></li>
                                    <li><a class="active" href="{{ route('profile-my-coupons') }}"><img
                                                src="/images-n/icons/icon-3.png" alt=""> My Gift Cards</a></li>
                                    {{-- <li><a href="{{ route('payment-methods-home') }}"><img src="/images-n/icons/icon-4.png"
                                                alt=""> Payment
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
                            <p class="box-heading">My Coupons</p>
                            <div class="account-content">


                                <div v-for="(gift_card , gift_cardIndex) in gift_cards" :key="gift_cardIndex"
                                    class="coupon-box my-4">
                                    <div class="coupon-icon">
                                        <img src="/images-n/icons/coupon.png" alt="">
                                    </div>
                                    <div class="coupon-text">
                                        {{-- <h4>UPTO 10% OFF</h4> --}}
                                        <p><img src="/images-n/icons/date-2.png" alt=""> Valid Until The Value Is Used Up
                                        </p>
                                        <div class="input-group">
                                            <input type="text" class="form-control" :placeholder="gift_card.code">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <button v-on:click="copy(gift_card.code)" class="btn btn-primary" type="button"><img
                                                            src="/images-n/icons/coupon-button.png" alt=""></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="booking-link">
                                        <a href="#">??? @{{ gift_card.value }} EUR</a>
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
        const vue_app = new Vue({
            el: '#vue_app',
            data: {
                gift_cards: @json($gift_cards)
            },
            methods: {
                copy: function(value) {


                    navigator.clipboard.writeText(value);
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
