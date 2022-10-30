@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{asset('css-n/trip-solo-sub.css')}}"/>
    <link rel="stylesheet" href="{{asset('css-n/trip-solo-sub-responsive.css')}}"/>
@endsection
@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your trip has been created.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="trip-banner-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">Fund my trip solo</a></li>
                            <li><img src="{{asset('images-n/icons/small-arrow.png')}}" alt=""></li>
                            <li><a href="#">{{$trip->title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="trip-banner-col">
                        <div class="trip-left-box">
                            <div class="trip-left-box-content">
                                <h2>{{$trip->destination}} <a href="#"><img src="{{asset('images/dot.png')}}" alt="" class="img-fluid"></a></h2>
                                <p><span>Posted</span> 2 Hours Ago</p>
                                <div class="tourist-name">
                                    <div class="tourist-pic">
                                        <img src="{{asset('images-n/tourist.jpg')}}" alt="" class="img-fluid">
                                        <p>Alina</p>
                                        <span>{{$trip->title}}</span>
                                    </div>
                                    <h3>${{$trip->goal}}</h3>
                                </div>
                                <div class="date-boxs">
                                    <div class="date-box">
                                        <p>From</p>
                                        <span><img src="{{asset('images-n/icons/date-pink.png')}}" alt=""> {{$trip->startdate}}</span>
                                    </div>
                                    <div class="date-box">
                                        <img src="{{asset('images-n/icons/right-arrow-white.png')}}" alt="">
                                    </div>
                                    <div class="date-box">
                                        <p>From</p>
                                        <span><img src="{{asset('images-n/icons/date-pink.png')}}" alt=""> {{$trip->enddate}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dis-block-991">
                            <img src="{{asset('images-n/bg/2.jpg')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="overview-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overview-col">
                        <h5>Over View</h5>
                        <div class="inside-content">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="overview-content">
                                        <h4>{{$trip->title}}</h4>
                                        <p>{{$trip->description}}</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="overview-content">
                                        <div class="fund-box">
                                            <p>Fund Collected</p>
                                            <h3>$ {{ $trip->donations }} <span>out of $ {{$trip->goal}}</span></h3>
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar" role="progressbar" style="width: {{$trip->donations / $trip->goal * 100}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <a href="{{route('solo-fund', $trip->id)}}" class="btn btn-primary btn-lg btn-block">Fund this trip</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="overview-content">
                                        <div class="overview-map">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3387.9998252687506!2d34.80370561452169!3d31.879421436515305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502b76deb98ee23%3A0xde654c9bb5440708!2sRaoul+Wallenberg+St+8%2C+Rehovot%2C+Israel!5e0!3m2!1sen!2sbd!4v1534417481016" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen class="google-map"></iframe>
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
    <section class="trips-slider-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trips-slider-col">
                        <h4>Similar Trips</h4>
                        <div class="trips-slider">
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{asset('images/trips/5.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p></h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{asset('images-n/icons/date.png')}}" alt="" class="img-fluid"> 24/05/2021</li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{asset('images/trips/5.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p></h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{asset('images-n/icons/date.png')}}" alt="" class="img-fluid"> 24/05/2021</li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{asset('images/trips/5.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p></h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{asset('images-n/icons/date.png')}}" alt="" class="img-fluid"> 24/05/2021</li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{asset('images/trips/5.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p></h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{asset('images-n/icons/date.png')}}" alt="" class="img-fluid"> 24/05/2021</li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{asset('images/trips/5.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p></h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{asset('images-n/icons/date.png')}}" alt="" class="img-fluid"> 24/05/2021</li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{asset('images/trips/5.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p></h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{asset('images-n/icons/date.png')}}" alt="" class="img-fluid"> 24/05/2021</li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{asset('images/trips/5.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p></h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{asset('images-n/icons/date.png')}}" alt="" class="img-fluid"> 24/05/2021</li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="trips-col">
                                <div class="trips-img">
                                    <img src="{{asset('images/trips/5.jpg')}}" alt="" class="img-fluid">
                                </div>
                                <div class="trips-content">
                                    <div class="trip-country">
                                        <h3>Dubai <p>by <span>Alina</span></p></h3>
                                        <h3><span>$500</span></h3>
                                    </div>
                                    <div class="trip-date">
                                        <ul>
                                            <li><img src="{{asset('images-n/icons/date.png')}}" alt="" class="img-fluid"> 24/05/2021</li>
                                            <li><span>to</span></li>
                                            <li>24/05/2021</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="view-link">View More <img src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--

        <div class="p-5" style="background-color: #e9ecef;">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                       aria-selected="true">Overview</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact" aria-selected="false">Settings</a>
                </li>

            </ul>
            <div class="tab-content p-lg-5 p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="jumbotron">
                        <h1 class="display-4">{{$trip->title}}</h1>
                        <p class="lead">Posted by <a href="#">{{$trip->user->name}}</a> - {{$trip->destination}}</p>
                        <hr class="my-4">
                        <p>{{$trip->description}}</p>
                        <p><span style="font-weight: bolder">{{$trip->donations}}$</span> has been collected from a total of <span style="font-weight: bolder">{{$trip->goal}}</span></p>

                    </div>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="{{route('solo-fund', $trip->id)}}" role="button">Fund this trip</a>
                    </p>
                </div>

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </div>
    --}}

@endsection
@section("scripts")

    <script type="text/javascript">

        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function () {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
        }

        // trips-slider
        if($('.trips-slider').length){
            $('.trips-slider').owlCarousel({
                loop: true,
                margin: 15,
                dots: true,
                nav: true,
                autoplayHoverPause: false,
                autoplay: true,
                autoplayTimeout: 4000,
                smartSpeed: 800,
                center: false,
                navText: [
                    '<img src="{{asset('images-n/icons/left-arrow-white.png')}}" alt="">',
                    '<img src="{{asset('images-n/icons/right-arrow-white.png')}}" alt="">'
                ],
                responsive: {
                    0: {
                        items: 1,
                        center: false
                    },
                    480:{
                        items:1,
                        center: false
                    },
                    600: {
                        items: 1,
                        center: false
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            })
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

@endsection



{{--
@extends('layout')


@section('head')
    <link rel="stylesheet" href="{{asset('css-n/trip-solo.css')}}"/>
    <link rel="stylesheet" href="{{asset('css-n/trip-solo-responsive.css')}}"/>
@endsection
@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your trip has been created.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="p-5" style="background-color: #e9ecef;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true">Overview</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                   aria-controls="contact" aria-selected="false">Settings</a>
            </li>

        </ul>
        <div class="tab-content p-lg-5 p-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="jumbotron">
                    <h1 class="display-4">{{$trip->title}}</h1>
                    <p class="lead">Posted by <a href="#">{{$trip->user->name}}</a> - {{$trip->destination}}</p>
                    <hr class="my-4">
                    <p>{{$trip->description}}</p>
                    <p><span style="font-weight: bolder">{{$trip->donations}}$</span> has been collected from a total of <span style="font-weight: bolder">{{$trip->goal}}</span></p>

                </div>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{route('solo-fund', $trip->id)}}" role="button">Fund this trip</a>
                </p>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>

@endsection
@section("scripts")


@endsection
--}}
