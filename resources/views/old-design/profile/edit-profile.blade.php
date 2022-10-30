@extends('layout')
@section('head')
    <link href="/css-n/account.css" rel="stylesheet">
    <link href="/css-n/account-responsive.css" rel="stylesheet">
@endsection


@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Account Start -->
    <section class="account-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><img src="/images-n/icons/small-arrow.png" alt=""></li>
                            <li><a href="#">Personal Information</a></li>
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
                                    <li><a class="active" href="{{ route('profile-personal-information') }}"><img
                                                src="/images-n/icons/icon-1.png" alt=""> Personal
                                            Information</a></li>
                                    <li><a href="{{ route('profile-my-tickets') }}"><img
                                                src="/images-n/icons/icon-2.png"
                                                alt=""> My Balance</a></li>
                               <li><a href="{{ route('profile-my-coupons') }}"><img
                                                src="/images-n/icons/icon-3.png"
                                                alt=""> My Gift Cards</a></li>
                    {{--                 <li><a href="{{ route('payment-methods-home') }}"><img
                                                src="/images-n/icons/icon-4.png"
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
                            <p class="box-heading">General Detail</p>
                            <div class="account-content">

                                <form method="POST" enctype='multipart/form-data'
                                      action="{{ route('profile-edit-personal-information', $user->id) }}">
                                    @csrf
                                {{--     <div class="upload-img">
                                        <div class="profile-img">
                                            <img id="current_profile_picture"
                                                 src="{{ $user_profile->picture_url ? asset('storage/' . $user_profile->picture_url) : $default_profile_picture }}"
                                                 alt=""
                                                 style="max-width: 158px;max-height: 158px;object-fit: cover;object-position: center">
                                        </div>
                                        <div class="profile-name">
                                            <h4>Upload Your Avatar</h4>
                                            <p>Photo Should be at least 300px 300px</p>
                                            <input name="profile_picture" class="btn btn-primary p-2" type="file"
                                                   onchange="readURL(this);"/>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><img
                                                                src="/images-n/icons/form-icon-1.png" alt=""></div>
                                                    </div>
                                                    <input value="{{ $user->name }}" class="form-control" type="text"
                                                           placeholder="John Doe" name="name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><img
                                                                src="/images-n/icons/form-icon-2.png" alt=""></div>
                                                    </div>
                                                    <input class="form-control" disabled value="{{ $user->email }}"
                                                           type="email" placeholder="john.doe@company.com">
                                                    {{-- <div class="input-group-prepend input-group-prepend-btn">
                                                         <div class="input-group-text"><button type="button" class="btn btn-primary">Change</button></div>
                                                     </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Date of birth</label>
                                                <div class="input-group">
                                                    <input name="date_of_birth" class="datepicker"
                                                           value="{{\Carbon\Carbon::parse($user_profile->date_of_birth)->format('m/d/Y')}}"
                                                           id="datepicker">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><img
                                                                src="/images-n/icons/form-icon-4.png" alt=""></div>
                                                    </div>
                                                    <input name="phone_number" class="form-control" type="tel"
                                                         value="{{ $user->phone_number }}"
                                                           placeholder="0046 123 45678">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-6">
                                             <div class="form-group gender-box">
                                                 <p>Gender</p>
                                                 <div class="custom-control custom-radio custom-control-inline">
                                                     <input type="radio" id="customRadioInline1" name="customRadioInline" class="custom-control-input" checked>
                                                     <label class="custom-control-label" for="customRadioInline1">Male</label>
                                                 </div>
                                                 <div class="custom-control custom-radio custom-control-inline">
                                                     <input type="radio" id="customRadioInline2" name="customRadioInline" class="custom-control-input">
                                                     <label class="custom-control-label" for="customRadioInline2">Female</label>
                                                 </div>
                                             </div>
                                         </div> --}}
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><img
                                                                src="/images-n/icons/form-icon-5.png" alt=""></div>
                                                    </div>
                                                    <select id="selected_country" name="country" class="form-control">

                                                        @foreach ($countries as $country )
                                                            <option
                                                                {{$country->code == $user_profile->country ? 'selected' : ''}} value="{{$country->code}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="form-btns">
                                                {{-- <button class="btn btn-primary" type="button">Discard</button> --}}
                                                <button class="btn btn-primary"
                                                        type="submit">Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        @if ($user_profile->user_profile !== null)
        document.getElementById("selected_country").value = "{{ $user_profile->country }}"
        @endif
        // Datepicker Active Script
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });


        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function () {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }


        // Back To Top
        if ($('#back-to-top').length) {
            var scrollTrigger = 100, // px
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('#back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 1000);
            });
        }
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#current_profile_picture')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
