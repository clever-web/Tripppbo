@extends('layout')
@section('head')
    <link href="/css-n/profile.css" rel="stylesheet">
    <link href="/css-n/profile-responsive.css" rel="stylesheet">
@endsection


@section('content')


    <!-- Profile Start -->
    <section class="profile-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile-col">
                        <p class="pagename">Profile</p>
                        <div class="profile-box">
                            <div class="profile-img">
                                <img src="{{ $user_profile->picture_url ? asset('storage/' . $user_profile->picture_url) : $default_profile_picture }}"
                                    alt="" class="img-fluid"
                                    style="height:150px;width:150px;max-height:150px;max-width:150px;min-height:150px;min-width:150px;object-fit:cover;object-position:center;">
                            </div>
                            <div class="profile-info">
                                <div class="profile-name">
                                    @if (Auth::check() && $user->id === Auth::id())
                                        <h4>{{ $user->name }}<a
                                                href="{{ route('profile-personal-information', Auth::id()) }}"><img
                                                    src="/images-n//icons/edit.png" alt=""></a></h4>
                                        <span>Verified</span>
                                    @endif
                                </div>
                                <div class="profile-contact">
                                    <div class="profile-contact-col">
                                        <p><img src="/images-n//icons/email-2.png" alt=""> Email</p>
                                        <p class="m-0">janinemuster@gmail.com</p>
                                    </div>
                                    <div class="bdr"></div>
                                    <div class="profile-contact-col">
                                        <p><img src="/images-n//icons/call-2.png" alt=""> Phone No</p>
                                        <p class="m-0">005561424</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-tabs">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-about"
                                        role="tab" aria-controls="pills-home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-gallery" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Gallery</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-toggle="pill" href="#pills-upcoming-trips" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Upcoming Trips</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-toggle="pill" href="#pills-previuos-trips" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Previuos trips</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-toggle="pill" href="#pills-bookings" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Manage bookings</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active pb-5" id="pills-about" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
                                        eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                        takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                        consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                        dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                        dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                                        ipsum dolor sit amet.orem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                        diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                        voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
                                        gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor
                                        sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                                        labore et dolore magna aliquyam erat, sed di</p>
                                </div>
                                <div class="tab-pane fade pb-2" id="pills-gallery" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="gallery-/images-n/">
                                        <div class="column">
                                            <img src="/images-n//gallery/1.jpg" onclick="openModal();currentSlide(1)"
                                                class="img-fluid">
                                        </div>
                                        <div class="column">
                                            <img src="/images-n//gallery/2.jpg" onclick="openModal();currentSlide(2)"
                                                class="img-fluid">
                                        </div>
                                        <div class="column">
                                            <img src="/images-n//gallery/3.jpg" onclick="openModal();currentSlide(3)"
                                                class="img-fluid">
                                        </div>
                                        <div class="column">
                                            <img src="/images-n//gallery/4.jpg" onclick="openModal();currentSlide(4)"
                                                class="img-fluid">
                                        </div>
                                        <div class="column">
                                            <img src="/images-n//gallery/5.jpg" onclick="openModal();currentSlide(5)"
                                                class="img-fluid">
                                        </div>
                                        <div class="column">
                                            <img src="/images-n//gallery/6.jpg" onclick="openModal();currentSlide(6)"
                                                class="img-fluid">
                                        </div>
                                        <div class="column">
                                            <img src="/images-n//gallery/7.jpg" onclick="openModal();currentSlide(7)"
                                                class="img-fluid">
                                        </div>
                                        <div class="column">
                                            <img src="/images-n//gallery/8.jpg" onclick="openModal();currentSlide(8)"
                                                class="img-fluid">
                                        </div>
                                    </div>

                                    <div id="myModal" class="modal">


                                        <div class="modal-content">
                                            <p>Gallery</p>
                                            <span class="close cursor" onclick="closeModal()">&times;</span>

                                            <div class="mySlides">
                                                <div class="numbertext">1 / 8</div>
                                                <img src="/images-n//gallery/1-big.jpg" alt="" class="img-fluid">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">2 / 8</div>
                                                <img src="/images-n//gallery/2-big.jpg" alt="" class="img-fluid">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">3 / 8</div>
                                                <img src="/images-n//gallery/3-big.jpg" alt="" class="img-fluid">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">4 / 8</div>
                                                <img src="/images-n//gallery/4-big.jpg" alt="" class="img-fluid">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">5 / 8</div>
                                                <img src="/images-n//gallery/5-big.jpg" alt="" class="img-fluid">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">6 / 8</div>
                                                <img src="/images-n//gallery/6-big.jpg" alt="" class="img-fluid">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">7 / 8</div>
                                                <img src="/images-n//gallery/7-big.jpg" alt="" class="img-fluid">
                                            </div>

                                            <div class="mySlides">
                                                <div class="numbertext">8 / 8</div>
                                                <img src="/images-n//gallery/8-big.jpg" alt="" class="img-fluid">
                                            </div>

                                            <a class="prev" onclick="plusSlides(-1)"><img
                                                    src="/images-n//icons/arrow-left.png" alt=""></a>
                                            <a class="next" onclick="plusSlides(1)"><img
                                                    src="/images-n//icons/arrow-right.png" alt=""></a>

                                            <div class="caption-container">
                                                <p id="caption"></p>
                                            </div>

                                            <div class="thumbnails">
                                                <div class="column">
                                                    <img class="demo img-fluid" src="/images-n//gallery/1.jpg"
                                                        onclick="currentSlide(1)" alt="">
                                                </div>
                                                <div class="column">
                                                    <img class="demo img-fluid" src="/images-n//gallery/2.jpg"
                                                        onclick="currentSlide(2)" alt="">
                                                </div>
                                                <div class="column">
                                                    <img class="demo img-fluid" src="/images-n//gallery/3.jpg"
                                                        onclick="currentSlide(3)" alt="">
                                                </div>
                                                <div class="column">
                                                    <img class="demo img-fluid" src="/images-n//gallery/4.jpg"
                                                        onclick="currentSlide(4)" alt="">
                                                </div>
                                                <div class="column">
                                                    <img class="demo img-fluid" src="/images-n//gallery/5.jpg"
                                                        onclick="currentSlide(5)" alt="">
                                                </div>
                                                <div class="column">
                                                    <img class="demo img-fluid" src="/images-n//gallery/6.jpg"
                                                        onclick="currentSlide(6)" alt="">
                                                </div>
                                                <div class="column">
                                                    <img class="demo img-fluid" src="/images-n//gallery/7.jpg"
                                                        onclick="currentSlide(7)" alt="">
                                                </div>
                                                <div class="column">
                                                    <img class="demo img-fluid" src="/images-n//gallery/8.jpg"
                                                        onclick="currentSlide(8)" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-upcoming-trips" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="upcoming-trips">
                                        <div class="upcoming-col">
                                            <h5>Dubai (DXB) <span>Upcoming</span></h5>
                                            <span>ID #113213423</span>
                                            <p><img src="/images-n//icons/date-2.png" alt=""> 24/05/2021 - 24/06/2021</p>
                                        </div>
                                        <div class="upcoming-col">
                                            <img src="/images-n//icons/plane-2.png" alt="">
                                        </div>
                                    </div>
                                    <div class="upcoming-trips">
                                        <div class="upcoming-col">
                                            <h5>Rixos Hotel Egypt <span>Upcoming</span></h5>
                                            <span>ID #113213423</span>
                                            <p><img src="/images-n//icons/date-2.png" alt=""> 24/05/2021 - 24/06/2021</p>
                                        </div>
                                        <div class="upcoming-col">
                                            <img src="/images-n//icons/bulding.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-previuos-trips" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="upcoming-trips">
                                        <div class="upcoming-col">
                                            <h5>Dubai (DXB)</h5>
                                            <span>ID #113213423</span>
                                            <p><img src="/images-n//icons/date-2.png" alt=""> 24/05/2021 - 24/06/2021</p>
                                        </div>
                                        <div class="upcoming-col">
                                            <img src="/images-n//icons/plane-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-bookings" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="upcoming-trips">
                                        <div class="upcoming-col">
                                            <h5>Dubai (DXB)</h5>
                                            <span>ID #113213423</span>
                                            <p><img src="/images-n//icons/date-2.png" alt=""> 24/05/2021 - 24/06/2021</p>
                                            <div class="my-buttons">
                                                <a class="btn btn-primary" href="#" role="button">Edit</a>
                                                <a class="btn btn-primary cancel-btn" href="#" role="button">Cancel
                                                    Booking</a>
                                            </div>
                                        </div>
                                        <div class="upcoming-col">
                                            <img src="/images-n//icons/plane-2.png" alt="">
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
    <script type="text/javascript">
        // Image Gallery
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }



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
