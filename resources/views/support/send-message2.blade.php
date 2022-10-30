@extends('master')
@section('css-links')

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection

@section('content')
<div class="wrap_body pt-4">
    <!-- contact us -->
        <div class="container-lg pad_lg pt-3">
            <div class="contact_centerHeading mb-2">
                <div class="contact_centerHeading_child"></div>
                <h2 class="h5 text_dark_blue mb-4">Welcome to the Contact Center</h2>
            </div>
            <div class="contact_center_box">
                <!-- left -->
                    <div class="contact_center_left">
                        <div class="contact_center_box_sm bg-white box_shadow mb-3">
                            <img class="mb-3" src="/img/email.svg" alt="">
                            <h3 class="h6 text_dark_blue fw_gilroy_bold mb-1">Send an email</h3>
                            <p class="text_dark_blue fs_14 mb-4">Get in touch with our customer service team</p>
                            <a class="fs_14 text_pink text-decoration-none" href="mailto:support@trippbo.com">support@trippbo.com</a>
                        </div>
                        <div class="contact_center_box_sm bg-white box_shadow mb-3">
                            <img class="mb-3" src="/img/phone_i.svg" alt="">
                            <h3 class="h6 text_dark_blue fw_gilroy_bold mb-1">Call customer service</h3>
                            <p class="text_dark_blue fs_14 mb-4">Talk to us over the phone 24/7</p>
                            <a class="fs_14 text_pink text-decoration-none" href="tel:+666 888 22 444">+ 666 888 22 444</a>
                        </div>
                    </div>
                <!-- right -->
                    <div class="contact_center_right">
                        <form  method="POST" class="ajax" action="{{ route('support-create') }}" class="contact_center_box_lg box_shadow pad__x mb-4">
                            @csrf
                            <h3 class="h6 text_dark_blue mb-4">Still need help?</h3>
                            <div class="row gx-3 mt-1">
                                <div class="col-12 mb-3 d-flex"><img width="25" src="/img/name.png" alt=""><p class="ms-2 mb-0 text_dark_blue fw_gilroy_bold">Name</p></div>
                                <div class="col-md-6 mb-3">
                                    <input name="first_name" type="text" placeholder="Enter your first name" class="form-control input__gray fs_14 input_contact_center" id="input__gray_fname">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input name="last_name" type="text" placeholder="Enter your last name" class="form-control input__gray fs_14 input_contact_center" id="input__gray_lname">
                                </div>
                            </div>
                            <div class="row gx-3 mt-2">
                                <div class="col-12 mb-3 d-flex"><img width="25" src="/img/email_i.png" alt=""><p class="ms-2 mb-0 text_dark_blue fw_gilroy_bold">Email</p></div>
                                <div class="col-md-6">
                                    <input name="email" type="email" placeholder="Enter your email address" class="form-control input__gray fs_14 input_contact_center" id="input__gray_email">
                                </div>
                            </div>
                            <div class="row gx-3 mt-4">
                                <div class="col-12 mb-3 d-flex"><img width="25" src="/img/email_box.svg" alt=""><p class="ms-2 mb-0 text_dark_blue fw_gilroy_bold">Message</p></div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control input__gray input_review input_contact_center fs_14" id="special_request" rows="4" placeholder="Enter your message"></textarea>
                                </div>
                            </div>
                            <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                            <div class="d-flex justify-content-center justify-content-lg-end mt-4">
                                <button id="submit_button" type="submit" class="btn_contact_send fw_gilroy_bold btn_style">Send <img class="ms-3" src="/img/send_i.svg" alt=""></button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>

    <div class="container-lg pad_lg pt-md-5 pt-4 pb-3">
        <h2 class="text_dark_blue h5 text-center mb-2">Still Problem? How Can We Help You?</h2>
        <p class="text_dark_blue h6 text-center mb-4">Still Problem? How Can We Help You?</p>
        <a href="#" class="btn_c_center_faq text-decoration-none text-center">FAQ</a>
    </div>

    <div class="contact_city_box">
        <img src="/img/contact_city.svg" alt="">
    </div>
  
</div>
@endsection

@section('scripts-links')
<script>
    if(document.getElementsByClassName('child_select_box').length > 0){
        let select_box = document.querySelectorAll(".child_select_box");
        for(let i = 0;i < select_box.length;i++){
            NiceSelect.bind(select_box[i]);
        }
    }

</script>

<script type="text/javascript">
    // Background Image Call Script


    $(document).on('submit', 'form.ajax', function() {
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            beforeSend: function() {
                $('#submit_button').prop('disabled', true)
                $("#submit_button").val('Sending...');
            
            },
            success: function(data) {
                $('#submit_button').prop('disabled', true)
                $("#special_request").prop('disabled', true)
                $("#submit_button").val('We have Received Your Message And Will Come Back To You Shortly!');
            },
            error: function(xhr, err) {
                $('#submit_button').prop('disabled', false)
              
                $("#submit_button").val('Send Again');

                alert("we encountered an error");
          
            }
        });
        return false;
    });
</script>

@endsection
