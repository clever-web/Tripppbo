<!-- Share Modal -->
<div class="modal fade" id="socialMediaShare" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div style="position: relative">
                    <div style="position: absolute;right: 20px;top:20px;">
                        <a href="#" style="color: gray;font-size:1.5rem" data-dismiss="modal">x</a>
                    </div>
                </div>
                <div class="p-5">

                    <div class="w-100 text-center">
                        <p style="font-family: Gilroy;font-weight: 600;font-size: 35px;color:#23242C">
                            Share This
                        </p>
                    </div>

                    <div class="w-100 text-center mt-5">
                        <p style="font-family: Gilroy;font-size: 20px;color:#23242C">
                            Share this post on the social media
                        </p>
                    </div>


                    <div>
                        <div>
                            <div class="mt-4 d-flex flex-row justify-content-center">
                                <div class="m-2">
                                    <a id="social-media-share-link-modal-facebook"
                                        href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank">
                                        <p class="d-flex justify-content-center align-items-center"
                                            style="color:#3B5999;width:60px;height:60px;position: relative;background-color: #F1F3F8;border-radius: 30px;">
                                            <i class="fab fa-facebook-f fa-2x"
                                                style=""></i>
                                        </p>
                                    </a>
                                </div>
                                <div class="m-2">
                                    <a id="social-media-share-link-modal-twitter"
                                        href="http://twitter.com/share?text=@Trippbo&url=&hashtags=Trippbo"
                                        target="_blank">
                                        <p class="d-flex justify-content-center align-items-center"
                                            style="color:#55ACEE;width:60px;height:60px;position: relative;background-color: #F1F3F8;border-radius: 30px;">
                                            <i class="fab fa-twitter fa-2x"
                                                style=""></i>
                                        </p>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <p> or copy link</p>
                    </div>

                    <div class="d-flex flex-row justify-content-center w-100 mt-4" style="background-color: #F8F8F8;">
                        <div class="text-center w-100" style="background-color: #F8F8F8;">
                            <input id="pageLink" class="p-2 w-100" style="border:none;background-color: #F8F8F8;"
                                type="text" readonly value="">
                        </div>
                        <div class="text-center" style="background-color: transparent;position: relative;top:5px;left: -10px;">
                            <a href="#" style="color:#FE2F70;background-color: #F8F8F8;" onclick="copy()">Copy</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" >X</button>
                   <button type="button" class="btn btn-primary">Save changes</button>
               </div> --}}
        </div>
    </div>
</div>

<!-- Sign up Modal -->
{{-- <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Let's get started...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                @csrf
                <!--
                                            <div class="container-fluid">

                                                <div class="row align-items-center">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Full name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 text-left">
                                                        <input type="text" class="form-control"
                                                               aria-describedby="name" placeholder="Enter your name">


                                                    </div>
                                                </div>


                                                <div class="row align-items-center">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 text-left">
                                                        <input type="email" class="form-control"
                                                               aria-describedby="emailHelp" placeholder="Enter email">
                                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                                            anyone else.</small>

                                                    </div>
                                                </div>


                                                <div class="row align-items-center">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 text-left">
                                                        <input type="password" class="form-control" placeholder="Password">

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        Continue With Google <i class="fab fa-google"></i>
                                                    </div>

                                                </div>
                                                <hr>
                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        Continue With Facebook  <i class="fab fa-facebook-f"></i>
                                                    </div>

                                                </div>

                                            </div>
                                            -->
                    <div class="container-fluid">

                        <div class="row align-items-center">

                            <div class="col-12 text-left">
                                <input type="text" class="form-control"
                                       name="name" aria-describedby="name" placeholder="Full name" required>


                            </div>
                        </div>


                        <div class="row align-items-center">

                            <div class="col-12 text-left">
                                <input type="email" name="email" class="form-control"
                                       aria-describedby="emailHelp" placeholder="Email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>

                            </div>
                        </div>


                        <div class="row align-items-center">

                            <div class="col-12 text-left">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       required pattern=".{8,}">

                            </div>
                        </div>

                        <hr>
                        <div class="row align-items-center">

                            <div class="col-12 text-left">
                                <small id="emailHelp" class="form-text text-muted"> By selecting <span
                                        style="font-weight: bolder">Agree and continue with email address</span> below,
                                    I agree to Trippbo’s Terms of Service, Payments Terms of Service, Privacy Policy,
                                    and Nondiscrimination Policy.
                                </small>
                            </div>
                        </div>

                        <div class="row align-items-center">

                            <div class="col-12 text-center">
                                <input type="submit" class="btn btn-dark mt-2"
                                       value="Agree and continue with email address"></input>
                            </div>
                        </div>

                        <hr>

                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <a href="#"> Continue With Google <i class="fab fa-google"></i></a>
                            </div>

                        </div>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <a href="#"> Continue With Facebook <i class="fab fa-facebook-f"></i></a>
                            </div>

                        </div>

                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <!--   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div> --}}

<!-- Report Modal -->

@auth

    <div class="modal fade report-modal" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel" style="font-size: 18px;font-weight:900;">Report This</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="AjaxForm" id="report-violation-form" method="POST" action="{{route('report-violation')}}">
                    @csrf
                    <input type="hidden" id="report_violating_object" name="violating_object" />
                    <input type="hidden" id="report_violating_object_id" name="violating_object_id" />

                    <div class="modal-body">

                        <div class="modal-body-radios d-flex">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="report_reason"
                                    class="custom-control-input" value="Offensive Content" checked>
                                <label class="custom-control-label" for="customRadioInline1">Offensive content</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="report_reason"
                                    class="custom-control-input"  value="Fraud">
                                <label class="custom-control-label" for="customRadioInline2">Fraud</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" value="Pornographic content" id="customRadioInline3" name="report_reason"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline3" >Pornographic Content</label>
                            </div>
                      {{--       <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline4" name="report_reason"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline4">Other</label>
                            </div> --}}
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline5" name="report_reason"
                                    class="custom-control-input" value="Other">
                                <label class="custom-control-label" for="customRadioInline5">Other</label>
                            </div>
                        </div>
                        <div class="report-modal-buttons">
                            <input name="report_comment" class=" btn-block px-3" type="text" placeholder="Comment...">
                            <button class="btn btn-primary" style="min-height: initial" type="submit">Report</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endauth



    <!-- sign-in-required Modal -->
    <div class="modal fade singin-required-popup" id="sign-in-required-popup" tabindex="-1" aria-labelledby="sign-in-required-popup-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content rounded-0">
            <div class="modal-header border-0 p-0">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-0">
              <div class="modal-body-top">
                <img src="/images-n/icons/white-logo.png" alt="">
                <p><img src="/images-n/icons/opps.png" alt=""> Oops! This Requires That You Sign In</p>
              </div>
              <div class="twoboxs">
                <div class="signinbox">
                  <h4>I Already have an account</h4>
                  <p>Great! Click the button below to sign in!</p>
                  <a href="{{route('login')}}" class="btn btn-primary btn-block">Log In</a>
                </div>
                <div class="createaccount-box ">
                  <h4>Create Account</h4>
                  <p>Let's get you started by creating a Trippbo account.<br> it only take 2 minutes!</p>
                  <a href="{{route('register')}}" class="btn btn-primary btn-block">Create Account</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
