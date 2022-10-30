@extends('layout')
@section('head')

    <link rel="stylesheet" href="/css3/style.css">
    <link rel="stylesheet" href="/css3/responsive.css">
@endsection
@section('content')
<header class="section_padding">
    <!-- site nav -->
{{--     <nav class="navbar site_nav navbar-expand-lg navbar-dark section_padding">
        <div class="container-lg">
            <a class="navbar-brand navbar_brand" href="#"><img src="/img/logo.webp" alt=""></a>
            <button class="navbar-toggler navbar_toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar_collapse mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav navbar_nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">BOOK A TRIP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FUND MY TRIP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FUND MY TRIP SOLD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">TICKETS LOTTERY</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

    <!-- hero -->
    <div class="container-lg wrap_hero">
        <div class="hero">
            <h2>Think about the</h2>
            <h1>World of Adventures</h1>
            <h2>you waiting for you.</h2>
        </div>
    </div>
</header>
<!-- HEADER END -->

<!-- TRIPPBO SECTION START -->
<section class="trippbo_section section_padding">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <h2 class="section_heading mb-3">trippbo</h2>
                <div class="trippbo_texts">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                    <p>when an unknown printer took a galley.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TRIPPBO SECTION END -->

<!-- SECTION GRIDS -->
<div class="sec_grids section_padding">
    <div class="container-lg">
        <div class="box_grids">
            <!-- gird 1 -->
            <div class="box_grid box_grid_1">
                <a href="#" class="btn btn_primary">Fund my Trip</a>
            </div>
            <!-- grid 2 -->
            <div class="box_grid box_grid_2">
                <div class="box_grid_2_child box_grid_child">
                    <h5 class="fw_normal_w grid_text_s_a g_text_shadow_r">It's time to make a chance. Have your</h5>
                    <h2 class="grid_h2 g_c_light">next trip funded by</h2>
                    <h5 class="fw_normal_w grid_text_s_a g_text_shadow_r">supporters from around the world.</h5>
                </div>
                <a href="#" class="btn_explore">Explore &nbsp;<span>&#62;</span></a>
            </div>
            <!-- grid 3 -->
            <div class="box_grid box_grid_3">
                <a href="#" class="btn btn_primary">Tickets Lottery</a>
            </div>
            <!-- grid 4 -->
            <div class="box_grid box_grid_4">
                <div class="box_grid_2_child box_grid_child">
                    <h3 class="fw_normal_w grid_text_s_a">The best time to</h3>
                    <h2 class="grid_h2 g_c_light">travel is now.</h2>
                </div>
                <a href="#" class="btn_explore">Explore &nbsp;<span>&#62;</span></a>
            </div>
            <!-- gird 2 -->
            <div class="box_grid box_grid_5">
                <div class="box_grid_5_child box_grid_child">
                    <h5 class="fw_normal grid_text_s_a">A shared experience is</h5>
                    <h2 class="grid_h2 g_c_black">double the fun.</h2>
                    <h6 class="fw_normal grid_text_s_b">Meet your new adventure buddies with Trippbo.</h6>
                </div>
                <a href="#" class="btn_explore">Explore &nbsp;<span>&#62;</span></a>
            </div>
            <!-- grid 6 -->
            <div class="box_grid box_grid_6">
                <a href="#" class="btn btn_primary">Fund my Trip Solo</a>
            </div>
            <!-- grid 7 -->
            <div class="box_grid box_grid_7">
                <div class="box_grid_2_child box_grid_child">
                    <h3 class="fw_normal_w grid_text_s_a">Try your luck to</h3>
                    <h2 class="grid_h2 g_c_light">win your<br>dream trip.</h2>
                </div>
                <a href="#" class="btn_explore">Explore &nbsp;<span>&#62;</span></a>
            </div>
            <!-- grid 8 -->
            <div class="box_grid box_grid_8">
                <a href="#" class="btn btn_primary">Book a Trip</a>
            </div>
        </div>
    </div>
</div>
<!-- SECTION GRDS END -->

<!-- TESTIMONIALS SECTION START -->
<section class="testimonial_section">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-10 m-auto">
                <h2 class="section_heading mb-3">TESTIMONIALS</h2>
                <div class="slider_wrapper owl-carousel owl-theme">
                    <div class="img_and_text item">
                        <div class="slide_img">
                            <img src="/img/slider_person.png" alt="">
                        </div>
                        <div class="slide_text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's</p>
                            <p>standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                type and scrambled it to </p>
                            <p>make a type specimen book.</p>
                        </div>
                    </div>
                    <div class="img_and_text item">
                        <div class="slide_img">
                            <img src="/img/slider_person.png" alt="">
                        </div>
                        <div class="slide_text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's</p>
                            <p>standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                type and scrambled it to </p>
                            <p>make a type specimen book.</p>
                        </div>
                    </div>
                    <div class="img_and_text item">
                        <div class="slide_img">
                            <img src="/img/slider_person.png" alt="">
                        </div>
                        <div class="slide_text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's</p>
                            <p>standard dummy text ever since the 1500s, when an unknown printer took a galley of
                                type and scrambled it to </p>
                            <p>make a type specimen book.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TESTIMONIALS SECTION END -->

<!-- FORM -->
<section class="sec_form section_padding">
    <form class="container-lg">
        <div class="row form_row g-0 g-lg-5">
            <div class="col-lg-6 form_left">
                <h2>Join Our Community</h2>
                <p>Sing up with your email address to receive news and updates from the NYS 4-H Foundation.</p>
                <h5>❝We respect your privacy.❞</h5>
                <button class="btn btn_form d-none d-lg-block" type="submit">SIGN UP</button>
            </div>
            <div class="col-lg-6 form_right">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="First Name">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Last Name">
                </div>
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email Address">
                </div>
                <button class="btn btn_form d-block d-lg-none" type="submit">SIGN UP</button>
            </div>
        </div>
    </form>
</section>
<!-- FORM END -->
@endsection

@section('scripts')

<!-- "JS" owl carousel CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"></script>

<!-- Custom JS file  -->
<script src="js3/app.js"></script>
@endsection
