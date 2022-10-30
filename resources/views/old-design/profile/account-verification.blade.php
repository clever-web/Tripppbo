@extends('layout')
@section('head')
    <link href="/css-n/account-verification.css" rel="stylesheet">
    <link href="/css-n/account-verification-responsive.css" rel="stylesheet">
    <style>
        .red-border {
            border: 2px solid red !important;
        }

    </style>
@endsection


@section('content')


    <!-- Account Start -->
    <section class="account-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><img src="/images-n/icons/small-arrow.png" alt=""></li>
                            <li><a href="#">Account verification</a></li>
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
                                   <li><a href="{{ route('profile-my-coupons') }}"><img src="/images-n/icons/icon-3.png"
                                                alt=""> My Gift Cards</a></li>
                         {{--            <li><a href="{{ route('payment-methods-home') }}"><img
                                                src="/images-n/icons/icon-4.png" alt=""> Payment
                                            Method</a></li> --}}
                                    <li><a href="{{ route('profile-change-password') }}"><img
                                                src="/images-n/icons/icon-5.png" alt=""> Change Password</a>
                                    </li>
                                    <li><a class="active" href="{{ route('profile-account-verification') }}"><img
                                                src="/images-n/icons/icon-6.png" alt=""> Account
                                            Verification</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="account-right-col">
                            <p class="box-heading">Verify Your Account</p>
                            <div class="account-content">
                                <div class="verify-box">

                                    <p>1. Mobile Number Verification
                                        @if ($user->phone_number_verified_at !== null)
                                            <span>
                                                Verified
                                            </span>
                                        @else
                                            <span style="background-color:red;">Not Verified
                                            </span>
                                        @endif
                                    </p>
                                    <div class="input-group mb-2">
                                        {{-- <div class="input-group-prepend">
                                                <div class="input-group-text p-0">
                                                    <select class="form-control my-select" id="exampleFormControlSelect1">
                                                        <option>+92</option>
                                                        <option>+123</option>
                                                        <option>+88</option>
                                                        <option>+11</option>
                                                        <option>+12</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                        <input type="tel" disabled class="form-control"
                                            placeholder="{{ $user->phone_number ? $user->phone_number : 'no phone number added' }}">
                                        @if ($user->phone_number !== null && $user->phone_number_verified_at == null)
                                            <button id="send_code_button" onclick="verifyNumber()"
                                                class="btn btn-primary m-0" type="submit">Send Code</button>

                                        @endif

                                    </div>

                                    @if ($user->phone_number == null)

                                        <p>In order to verify a phone number you must add it to your <a href="{{route('profile-personal-information')}}" > Personal Information </a> page first</p>
                                    @endif

                                <div id="phone_verification_div" class="d-flex d-row mt-3 align-items-end invisible">

                                    <div>
                                        <span> You'll receive a message with your confirmation code shortly...</span>

                                        <input id="phone_verify_input" class="form-control form-control-text m-0"
                                            type="text" placeholder="Verification Code...">
                                    </div>
                                    <div>
                                        <button id="phone_verify" class="btn btn-primary m-0" onclick="verify()"
                                            type="button">Verify</button>

                                    </div>


                                </div>
                                <div class="email-verify">
                                    <p>2. Email Verification
                                        @if ($user->hasVerifiedEmail())
                                            <span>
                                                Verified
                                            </span>
                                        @else
                                            <span style="background-color:red;">Not Verified
                                            </span>
                                        @endif
                                    </p>
                                    <div class="verify-inputs">
                                        <input disabled class="form-control form-control-email" type="email"
                                            placeholder="{{ $user->getEmailForVerification() }}">
                                        {{-- <input class="form-control form-control-text" type="text"
                                                    placeholder="Add 4 Digit Code"> --}}
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            @if ($user->hasVerifiedEmail() === false)
                                                <button class="btn btn-primary mt-0" type="submit">Verify</button>
                                            @endif
                                        </form>
                                    </div>

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


    <script>
        async function verifyNumber() {
            $("#send_code_button").attr("disabled", true)
            let resp = await axios.post('{{ route('phone-number-generate-verification') }}');
            if (resp.data.success === true) {
                $("#phone_verification_div").removeClass('invisible');
            } else {
                alert("something went wrong, please try again");
            }

        }

        async function verify() {
            $("#phone_verify").attr("disabled", true)
            let resp = await axios.post('{{ route('phone-number-verify-code') }}', {
                code: $("#phone_verify_input").val()
            });
            if (resp.data.verified === true) {
                location.reload()
            } else {
                $("#phone_verify_input").addClass('red-border');
                $("#phone_verify").attr("disabled", false)
            }

        }
    </script>
    <script type="text/javascript">
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
