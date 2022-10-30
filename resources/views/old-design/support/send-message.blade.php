@extends('layout')
@section('head')
    <!-- contact CSS -->
    <link href="/css-n/contact.css" rel="stylesheet">

    <!-- contact Responsive CSS -->
    <link href="/css-n/contact-responsive.css" rel="stylesheet">

    <style>
        .invisible {
            display: none;
        }

    </style>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
    <!-- Page Name Start -->
    <section class="pagename-area contact-pagename background-image" data-src="/images-n/bg/8.jpg">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagename-col">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Start -->
    <section class="contact-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><img src="/images-n/icons/small-arrow.png" alt=""></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-cols">
                        <div class="contact-infobox">
                            <h2>You’ve got a question? feel free to contact us.</h2>
                            <ul>
                                <li>
                                    <img src="/images-n/icons/contact-location.png" alt="">
                                    <p>Call us for imiditate support on this number</p>
                                    <h4>+ 666 888 22 444</h4>
                                </li>
                                <li>
                                    <img src="/images-n/icons/contact-email.png" alt="">
                                    <p>Send us email for any kind of inquiry</p>
                                    <h4>support@trippbo.com</h4>
                                </li>
                            </ul>
                        </div>


                        <div class="contact-formbox">
                            <h2> Send Us A Message</h2>
                            <form method="POST" class="ajax" action="{{ route('support-create') }}">
                                @csrf
                                <input name="name" class="form-control" {{$logged_in ? 'disabled' : ''}} type="text" placeholder="Name" value="{{$logged_in ? $user->name : "" }}">
                                <input name="email" class="form-control" {{$logged_in ? 'disabled' : ''}} type="email" placeholder="Email" value="{{$logged_in ? $user->email : "" }}">
                                <textarea id="message" name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                                <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                                <input id="submit_button" class="btn btn-primary btn-block" type="submit" value="Send">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script type="text/javascript">
        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function() {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }

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
                    $("#message").prop('disabled', true)
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
