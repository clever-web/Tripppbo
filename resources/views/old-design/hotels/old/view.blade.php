@extends("layout")
@section('head')


    <link href="{{asset('css-n/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('css-n/hotel-view.css')}}" rel="stylesheet">

    <!-- hotel Responsive CSS -->
    <link href="{{asset('css-n/hotel-view-responsive.css')}}" rel="stylesheet">

@endsection
@section("content")


    <!-- Hotel View Start -->
    <section class="hotel-view-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-name">
                        <ul>
                            <li><a href="#">Hotel</a></li>
                            <li><img src="{{asset('images-n/icons/small-arrow.png')}}" alt=""></li>
                            <li><a href="#">{{$data['data']['hotel']['name']}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hotel-gallery">
                        <div class="gallery-cols">
                            <div class="gallery-col-1">
                                <a href="{{asset('images-n/hotels/view-1.jpg')}}" data-lightbox="lightbox-image"
                                   data-title="My caption">
                                    <img src="{{asset('images-n/hotels/view-1.jpg')}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="gallery-col-2">
                                <a href="/images-n/hotels/view-2.jpg" data-lightbox="lightbox-image"
                                   data-title="My caption">
                                    <img src="/images-n/hotels/view-2.jpg" alt="" class="img-fluid">
                                </a>
                                <a href="/images-n/hotels/view-4.jpg" data-lightbox="lightbox-image"
                                   data-title="My caption">
                                    <img src="/images-n/hotels/view-4.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="gallery-col-3">
                                <a href="/images-n/hotels/view-3.jpg" data-lightbox="lightbox-image"
                                   data-title="My caption">
                                    <img src="/images-n/hotels/view-3.jpg" alt="" class="img-fluid">
                                </a>
                                <a href="/images-n/hotels/view-5.jpg" data-lightbox="lightbox-image"
                                   data-title="My caption">
                                    <img src="/images-n/hotels/view-5.jpg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="view-all-btn">
                                <a href="{{asset('images-n/hotels/view-1.jpg')}}" data-lightbox="lightbox-image"
                                   data-title="My caption"><img src="/images-n/icons/gallery.png" alt=""> View All
                                    images</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hotel Details Start -->
    <section class="hotel-details-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hotel-details-box">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hotel-name">
                                    <div class="hotel-name-col">
                                        <h2>{{$data['data']['hotel']['name']}}</h2>
                                        <span><img src="/images-n/icons/location-2.png" alt=""> {{$data['data']['hotel']['address']['cityName']}}</span>
                                    </div>
                                    <div class="hotel-share">
                                        <ul>
                                            <li><a href="#"><img src="/images-n/icons/share.png" alt=""> Share</a></li>
                                            <li><a href="#"><img src="/images-n/icons/love.png" alt=""> Save</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hotel-details-cols">
                                    <div class="hotel-details-col">
                                        <ul class="hotel-details-menu">
                                            <li><a href="#">About</a></li>
                                            <li><a href="#amenities">Amenities</a></li>
                                            <li><a href="#things">Things to know</a></li>
                                            <li><a href="#reviews">Review</a></li>
                                        </ul>
                                        <div class="hotel-details-content">
                                            <h4>About this property</h4>
                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                                eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                                                clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                                                amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                                nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                                                sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                                rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                                                ipsum dolor sit amet.orem ipsum dolor sit amet</p>
                                            <ul>
                                                <li>
                                                    <img src="{{asset('images-n/icons/home.png')}}" alt="">
                                                    <h5>Room Available</h5>
                                                    <p>Single, Standard and Double</p>
                                                </li>
                                                <li>
                                                    <img src="{{asset('images-n/icons/clean.png')}}" alt="">
                                                    <h5>Enhanced Clean</h5>
                                                    <p>Disinfectant is used to clean the property<br> High-touch
                                                        surfaces are cleaned and disinfected<br> Follows industry
                                                        cleaning and disinfection practices of Safe Travels (WTTC -
                                                        Global)</p>
                                                </li>
                                                <li>
                                                    <img src="{{asset('images-n/icons/date-2.png')}}" alt="">
                                                    <h5>Cancellation policy</h5>
                                                    <p>Disinfectant is used to clean the property<br> High-touch
                                                        surfaces are cleaned and disinfected<br> Follows industry
                                                        cleaning and disinfection practices of Safe Travels (WTTC -
                                                        Global)</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="availability-box">
                                        <h4>$40 / Night</h4>
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-6 custom-col">
                                                    <div class="availability-form">
                                                        <input class="datepicker" id="datepicker" value="Check In date">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 custom-col">
                                                    <div class="availability-form">
                                                        <input class="datepicker" id="datepicker-two"
                                                               value="Check Out date">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 custom-col">
                                                    <div class="availability-form">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="/images-n/icons/user-3.png" alt="">
                                                                </div>
                                                            </div>
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option>Guests</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 custom-col">
                                                    <div class="availability-btn">
                                                        <button class="btn btn-primary btn-lg btn-block" type="submit">
                                                            Check Availability
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Room Start -->
    <section class="room-area">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Choose Your Room</h4>


                    <div class="room-cols row">
                        @foreach($data['data']['offers'] as $hotel)

                            <div class="room-col col-lg-4">
                                <div class="room-col-img">
                                    {{--   <img src="{{asset('images-n/hotels/room-img.jpg')}}" alt="" class="img-fluid">--}}
                                </div>
                                <div class="room-col-content">
                                    <ul>
                                        {{-- <li><img src="{{asset('images-n/icons/sqft.png')}}" alt=""> 400 sq ft</li>--}}
                                        <li><img src="{{asset('images-n/icons/user-3.png')}}"
                                                 alt="">{{$hotel['guests']['adults'] }} Adult
                                        </li>
                                        {{--      <li><img src="{{asset('images-n/icons/bed.png')}}" alt=""> 1 Queen Bed</li>--}}


                                        @if(in_array("PARKING",$data['data']['hotel']['amenities']))
                                            <li><img src="{{asset('images-n/icons/parking.png')}}" alt=""> Parking</li>

                                        @endif

                                        @if(in_array("WIFI",$data['data']['hotel']['amenities']) || in_array("WI-FI_IN_ROOM",$data['data']['hotel']['amenities']) )
                                            <li><img src="{{asset('images-n/icons/wifi.png')}}" alt="">WiFi</li>
                                        @endif

                                    </ul>
                                    <div class="refundable-box">
                                        <p>Cancellation Policy <img src="{{asset('images-n/icons/refundable.png')}}"
                                                                    alt=""></p>


                                        <span>Before {{DateTime::createFromFormat("Y-m-d\TH:i:sO", $hotel['policies']['cancellation']['deadline'])->format("D, F j")}} </span>
                                        {{--        <a href="#">See more Details <img
                                                        src="{{asset('images-n/icons/right-arrow.png')}}" alt=""></a>
                                                --}}

                                        {{-- <div class="w-100">
                                             <p style="color: black; text-transform: lowercase;">
                                                 {{$hotel['room']['description']['text']}}
                                             </p>
                                         </div>--}}
                                    </div>
                                    <div class="room-col-bottom">
                                        <div class="reserve-btn">
                                            <a href="#">Reserve</a>
                                        </div>
                                        <div class="room-cost">
                                            <h5>{{$hotel['price']['currency']}} {{$hotel['price']['total']}} <span> Total </span>
                                            </h5>
                                            <p>Includes taxes & fees</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Amenities Start -->
    <section class="amenities-area" id="amenities">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="amenities-col">
                        <h4>Amenities</h4>
                        <ul>
                            <li><img src="/images-n/icons/wifi.png" alt=""> Wifi</li>
                            <li><img src="/images-n/icons/food.png" alt=""> Food And Drinks</li>
                            <li><img src="/images-n/icons/tv.png" alt=""> TV</li>
                            <li><img src="/images-n/icons/ac.png" alt=""> AC</li>
                        </ul>
                        <ul>
                            <li><img src="/images-n/icons/parking.png" alt=""> Parking</li>
                            <li><img src="/images-n/icons/food-pot.png" alt=""> Room Services</li>
                            <li><img src="/images-n/icons/bathroom.png" alt=""> Bathroom</li>
                            <li><img src="/images-n/icons/more.png" alt=""> And Much More</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Things Start -->
    <section class="amenities-area things-area" id="things">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="amenities-col">
                        <h4>Things to know</h4>
                        <p class="mb-2">House rules</p>
                        <ul>
                            <li><img src="/images-n/icons/wifi.png" alt=""> Check-in: After 1:00 PM</li>
                            <li><img src="/images-n/icons/food.png" alt=""> No smoking</li>
                            <li><img src="/images-n/icons/tv.png" alt=""> No pets</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rivews Start -->
    <section class="reviews-area" id="reviews">
        <div class="container-fluid custom-container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="reviews-col">
                        <h4>Reviews</h4>
                        <p><img src="/images-n/icons/star-yellow.png" alt=""> 5.0 (8 reviews)</p>
                        <div class="reviews-boxs">
                            <div class="reviews-box">
                                <ul>
                                    <li>Cleanliness</li>
                                    <li>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li>5.0</li>
                                </ul>
                                <ul>
                                    <li>Communication</li>
                                    <li>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li>5.0</li>
                                </ul>
                                <ul class="bottom-space">
                                    <li>Check-in</li>
                                    <li>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li>5.0</li>
                                </ul>
                                {{--     <div class="review-item">
                                         <ul>
                                             <li><img src="images/review.png" alt=""></li>
                                             <li>Emony <br> <span>20 April 2021</span></li>
                                         </ul>
                                         <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea</p>
                                     </div>
                                     <div class="review-item m-0">
                                         <ul>
                                             <li><img src="images/review.png" alt=""></li>
                                             <li>Emony <br> <span>20 April 2021</span></li>
                                         </ul>
                                         <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea</p>
                                     </div>--}}
                            </div>
                            <div class="reviews-box">
                                <ul>
                                    <li>Cleanliness</li>
                                    <li>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li>5.0</li>
                                </ul>
                                <ul>
                                    <li>Communication</li>
                                    <li>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li>5.0</li>
                                </ul>
                                <ul class="bottom-space">
                                    <li>Check-in</li>
                                    <li>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;"
                                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li>5.0</li>
                                </ul>
                                {{--   <div class="review-item">
                                       <ul>
                                           <li><img src="{{asset('images-n/review.png')}}" alt=""></li>
                                           <li>Emony <br> <span>20 April 2021</span></li>
                                       </ul>
                                       <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea</p>
                                   </div>
                                   <div class="review-item m-0">
                                       <ul>
                                           <li><img src="images/review.png" alt=""></li>
                                           <li>Emony <br> <span>20 April 2021</span></li>
                                       </ul>
                                       <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea</p>
                                   </div>--}}
                            </div>
                        </div>
                        {{--     <a class="btn btn-primary" href="#" role="button">View All</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section("scripts")
    <script src="/js-n/lightbox.min.js"></script>

    <script type="text/javascript">

        // Datepicker Active Script
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });
        $('#datepicker-two').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome'
        });

        // Lightbox
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'disableScrolling': true,
        })


        // Background Image Call Script
        if ($('.background-image').length > 0) {
            $('.background-image').each(function () {
                var src = $(this).attr('data-src');
                $(this).css({
                    'background-image': 'url(' + src + ')'
                });
            });
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
