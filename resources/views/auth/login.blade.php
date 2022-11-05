    @extends('master')

    @section('css-links')
        <!-- calendar CSS -->
        <link rel="stylesheet" href="css/jquery.bootstrap.year.calendar.min.css">
        <!-- Nice select CSS -->
        <link href="css/nice-select2.css" rel="stylesheet" />
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- swiper CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/_partials.css">
        <link rel="stylesheet" href="css/theme.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="css/responsive2.css" media="all">
    @endsection


    @section('content')
    <form method="POST" id="login_form" action="{{ route('login') }}">
        @csrf

    <div class="wrap_body index_wrap_body">
            
        <div class="container-lg pad_lg pt-5">
            <h2 class="h5 text-center fw_gilroy_medium">Welcome to Trippbo!</h2>
            <h3 class="h6 text-center fw_gilroy_medium">Sign In To Continue</h3>

            <!-- row -->
            <div class="row_sign">
                <div class="row_sign_left">
                    <div class="row">
                        <!-- 1 -->
                            <div class="col-12 mb-3">
                                <label  label for="input__gray_email" class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">email address</label>
                                <input name="email" type="email" required placeholder="Enter your email address" class="form-control input__gray fs_14 input_contact_center" id="input__gray_email">
                            </div>
                        <!-- 2 -->
                            <div class="col-12">
                                <label label for="input__gray_password" class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">password</label>
                                <input name="password" type="password" required placeholder="Enter your password" class="form-control input__gray fs_14 input_contact_center" id="input__gray_password">
                            </div>
                        <!-- 3 -->
                            <div class="col-12">
                                <div class="wrap_p_details_bottom_row wrap_p_details_bottom_row_2 mb-4 mt-2 review_right_checkbox">
                                    <div class="d-flex align-items-center">
                                        <label class="mt-2">
                                            <input id="remember_me_input" type="checkbox">
                                            <span id="remember_check" class="checkmark d-inline-block mt-2"></span>
                                        </label>
                                        <p id="remember_me" name="remember" class="mb-0 ms-5 fw_gilroy_medium text_dark_blue fs_14">Remember Me</p>
                                    </div>
                                    <div class="ms-auto mt-2">
                                        <a href="#" class="fs_14 fw_gilroy_medium text_dark_blue text-decoration-none text_dark_blue_a">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        <!-- 4 -->
                            <div class="col-12">
                                <p class="fs_14 text_silver fw_gilroy_medium mb-0">By proceeding, you agree with our <a class="text-decoration-none text_dark_blue_a" href="#">Terms of Service</a>, <a class="text-decoration-none text_dark_blue_a" href="#">Privacy Policy</a> & Master <a class="text-decoration-none text_dark_blue_a" href="#">User Agreement</a>.</p>
                            </div>
                            <div class="col-12 mt-2 mb-3">
                                <a onclick="login()" class="mt-3 medium_btn fw_gilroy_medium text-capitalize btn btn_style btn_pink d-block" href="#">sign in</a>
                            </div>
                            <div class="col-12 mt-3 mb-1">
                                <p class="fs_14 text_silver fw_gilroy_medium text-center">Or sign in with</p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('redirect-to-facebook') }}" class="btn_dark_outline me-2"><i class="me-2 fab fa-facebook"></i> Facebook</a>
                                    <a href="{{ route('redirect-to-google') }}" class="btn_dark_outline"><i class="me-2 fab fa-google"></i> Google</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row_sign_right">
                    <img src="img/sign_in.svg" alt="">
                </div>
            </div>
        </div>
    </form>
    @endsection



    @section('scripts-links')
        <!-- jquery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <!-- calender js -->
        <script src="js/jquery.bootstrap.year.calendar.min.js"></script>
        <!-- swiper JS -->
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <!-- indes JS -->
        <script src="js/index.js"></script>
        <!-- bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <!-- Nice select JS -->
        <script src="js/nice-select2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
        <!-- Custom JS -->
        <script src="js/trippbo-app.js"></script>
        <script>

            function login()
            {
                $("#login_form").submit()
            }
            
            if (document.getElementsByClassName('child_select_box').length > 0) {
                let select_box = document.querySelectorAll(".child_select_box");
                for (let i = 0; i < select_box.length; i++) {
                    NiceSelect.bind(select_box[i]);
                }
            }


            // send_travel
            let remember_me = document.querySelector("#remember_me");
            let remember_me_input = document.querySelector("#remember_me_input");
            remember_me.addEventListener("click", () => {
                if (remember_me_input.checked) {
                    remember_me_input.checked = false;
                } else {
                    remember_me_input.checked = true;
                }
            })
        </script>
    @endsection
