<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ Session::token() }}">


    <link rel="stylesheet" href="{{ asset('css-n/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css-n/footer.css') }}">

    <script src="https://kit.fontawesome.com/5c7d1f5b9d.js" crossorigin="anonymous"></script>


    <link href="{{ asset('css-n/singin.css') }}" rel="stylesheet">

    <!-- singin Responsive CSS -->
    <link href="{{ asset('css-n/singin-responsive.css') }}" rel="stylesheet">
    <style>
        .add-border-radius {
            border-radius: 15px !important;
        }

        .singup-links a {
            border-radius: 15px !important;
        }

        .singin-area * {
            border-radius: 15px;
        }


        @media (max-width: 768px)
        {
            .img-box
            {
                display: none;
            }
        }
    </style>
</head>

<body>

    <section class="singin-area">
        <div id="particles-js"></div>
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-middle">
                        <div class="singin-box">
                            <div class="form-box">
                                <div class="form-logo">
                                    <img src="{{ asset('image/63192.png') }}" alt="" width="150px;" >
                                </div>
                                <h4>Sign In To Continue</h4>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <div class="row ">
                                    <div class="col-xl-6 d-flex justify-content-center align-items-center">
                                        <div class="singup-links">
                                            <a href="{{ route('redirect-to-google') }}"><img
                                                    src="{{ asset('images-n/icons/singup-google.png') }}" alt="">
                                                Sign
                                                In
                                                Using Google</a>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 d-flex justify-content-center align-items-center">
                                        <div class="singup-links">
                                            <a href="{{ route('redirect-to-facebook') }}"><img
                                                    src="{{ asset('images-n/icons/singup-facebook.png') }}" alt="">
                                                Sign In Using Facebook</a>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="border:none;">
                                                <img src="{{ asset('images-n/icons/email.png') }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <input type="email" name="email" class="form-control add-border-radius"
                                            placeholder="Email">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend ">
                                            <div class="input-group-text " style="border:none;">
                                                <img src="{{ asset('images-n/icons/password.png') }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <input type="password" class="form-control add-border-radius" name="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="remember-forgot-password">
                                        <div class="custom-control custom-checkbox">
                                            <input name="remember" type="checkbox" class="custom-control-input"
                                                id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                        </div>
                                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                    <button class="btn btn-primary btn-lg btn-block singin-btn add-border-radius"
                                        type="submit">Sign In
                                    </button>
                                    <a class="btn btn-primary btn-lg btn-block create-btn add-border-radius"
                                        href="{{ route('register') }}" role="button">Create an
                                        Account</a>
                                </form>
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('images-n/singin.jpg') }}" alt="" class="images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('js-n/jquery.min.js') }}"></script>
    <script src="{{ asset('js-n/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js-n/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('js-n/select2.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->


    <script src="{{ asset('js/timezone.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
