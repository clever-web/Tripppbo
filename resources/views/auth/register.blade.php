    @extends('master')
    @section('content')
        <div class="wrap_body index_wrap_body">

            <div class="container-lg pad_lg pt-5">
                <h2 class="h5 text-center fw_gilroy_medium">Welcome to Trippbo!</h2>
                <h3 class="h6 text-center fw_gilroy_medium">Sign Up To Create Account</h3>

                <!-- row -->
                <div class="row_sign">
                    <div class="row_sign_left">
                        <div class="row">
                            <!-- 1 -->
                            <div class="col-12 mb-3">
                                <label label for="input__gray_fname"
                                    class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Full Name</label>
                                <input type="text" required placeholder="Enter your name"
                                    class="form-control input__gray fs_14 input_contact_center form_name_field"
                                    id="input__gray_fname">
                            </div>
                            <!-- 2 -->
                            <div class="col-12 mb-3">
                                <label label for="input__gray_email"
                                    class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">Email</label>
                                <input type="email" required placeholder="Enter your email address"
                                    class="form-control input__gray fs_14 input_contact_center form_email_field"
                                    id="input__gray_email">
                            </div>
                            <!-- 3 -->
                            <div class="col-12">
                                <label label for="input__gray_pass"
                                    class="mb-2 text-capitalize fw_gilroy_bold text_dark_blue">password</label>
                                <input type="password" required placeholder="New password"
                                    class="form-control input__gray fs_14 input_contact_center form_password_field"
                                    id="input__gray_pass">
                            </div>
                            <!-- 4 -->
                            <div class="col-12">
                                <div
                                    class="wrap_p_details_bottom_row wrap_p_details_bottom_row_2 mb-2 mt-2 review_right_checkbox">
                                    <div class="d-flex align-items-center">
                                        <label class="mt-2">
                                            <input id="remember_me_input" class="form_terms_checkbox" type="checkbox">
                                            <span id="remember_check" class="checkmark d-inline-block mt-2"></span>
                                        </label>
                                        <p id="remember_me" class="mb-0 ms-5 fw_gilroy_medium text_dark_blue fs_14">I agree to
                                            Trippbo’s Terms of Service , Payments Terms of Service , Privacy Policy, and
                                            Non-discrimination Policy.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <a class="mt-3 medium_btn fw_gilroy_medium text-capitalize btn btn_style btn_pink d-block"
                                    onclick="regsiter()">Sign up</a>
                            </div>
                            <div class="col-12 mt-3 mb-1">
                                <p class="fs_14 text_silver fw_gilroy_medium text-center">Or sign up with</p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('redirect-to-facebook') }}" class="btn_dark_outline me-2"><i
                                            class="me-3 fab fa-facebook"></i> Facebook</a>
                                    <a href="{{ route('redirect-to-google') }}" class="btn_dark_outline"><i
                                            class="me-3 fab fa-facebook"></i> Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row_sign_right">
                        <img src="/img/sign_up.svg" alt="">
                    </div>
                </div>
            </div>
        @endsection

        @section('scripts-links')
            <script>
                let agreed_to_terms = false;
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
                        agreed_to_terms = true;
                    } else {
                        remember_me_input.checked = true;
                        agreed_to_terms = false
                    }
                })







                async function regsiter() {
                    let data = new FormData();

                    data.append('name', $('.form_name_field')[0].value)
                    data.append('email', $('.form_email_field')[0].value)
                    data.append('password', $('.form_password_field')[0].value)

                    data.append('terms_and_conditions', 'agreed')


                    try {
                        await axios.post('{{ route('register') }}', data)
                        window.location = "/"
                    } catch (ex) {

                    }


                }
            </script>
        @endsection
