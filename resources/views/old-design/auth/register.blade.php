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


    <link href="{{ asset('css-n/signup.css') }}" rel="stylesheet">

    <!-- singin Responsive CSS -->
    <link href="{{ asset('css-n/signup-responsive.css') }}" rel="stylesheet">
    <style>
        .singup-area * {
            border-radius: 15px !important;
        }

        .input-group-text {

            border: none;

        }



    </style>
</head>

<body>


    <section class="singin-area singup-area">
        <div id="particles-js"></div>
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-middle">
                        <div class="singin-box">
                            <div class="form-box">
                                <div class="form-logo">
                                    <img src="{{ asset('image/63192.png') }}" alt="" width="150px;">
                                </div>
                                <div class="singup-links">
                                    <a href="{{ route('redirect-to-google') }}"><img
                                            src="{{ asset('images-n/icons/singup-google.png') }}" alt=""> Sign Up
                                        Using
                                        Google</a>
                                    <a href="{{ route('redirect-to-facebook') }}"><img
                                            src="{{ asset('images-n/icons/singup-facebook.png') }}" alt=""> Sign Up
                                        Using Facebook</a>
                                </div>
                                <h4>Or Sign Up Through Email</h4>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src="{{ asset('images-n/icons/user.png') }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <input name="name" type="text" class="form-control" placeholder="Full Name"
                                            required>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src="{{ asset('images-n/icons/email.png') }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <input name="email" type="email" class="form-control" placeholder="Email"
                                            required>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src="{{ asset('images-n/icons/password.png') }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <input name="password" type="password" class="form-control"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms_and_conditions" required
                                            class="custom-control-input" id="customCheck1" value="agreed">
                                        <label class="custom-control-label" for="customCheck1"> I agree to Trippbo’s
                                            <span>Terms of Service </span> , <span>Payments Terms of Service </span>,
                                            <span>Privacy Policy</span>, <span>and Non-discrimination
                                                Policy</span>.</label>
                                    </div>
                                    <button class="btn btn-primary btn-lg btn-block create-btn" type="submit">Create
                                        Account</button>
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
