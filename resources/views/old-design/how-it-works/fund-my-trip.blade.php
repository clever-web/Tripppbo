@extends("layout")
@section("head")
    <!-- works CSS -->
    <link href="/css-n/works.css" rel="stylesheet">

    <!-- works Responsive CSS -->
    <link href="/css-n/works-responsive.css" rel="stylesheet">
@endsection


@section("content")

<!-- Page Name Start -->
<section class="pagename-area">
    <div class="container-fluid custom-container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="pagename-col">
                    <h2>How It's Works</h2>
                    <h4>Fund My Tip</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Works Start -->
<section class="works-area">
    <div class="container-fluid custom-container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="works-col">
                    <div class="works-item">
                        <div class="works-item-col works-img dis-block-991">
                            <img src="/images-n/works/1.png" alt="" class="img-fluid">
                        </div>
                        <div class="works-item-col works-text">
                            <h2>1. User Can Post the Trip</h2>
                            <p>Those desperate to travel but have no funds can avail this great offer to travel with the trip creator. User Can Post the Trip request by itself but also able to send the request to design trip</p>
                        </div>
                        <div class="works-item-col works-img dis-none-991">
                            <img src="/images-n/works/1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="works-item works-item-two">
                        <div class="works-item-col works-img">
                            <img src="/images-n/works/2.png" alt="" class="img-fluid">
                        </div>
                        <div class="works-item-col works-text works-text-two">
                            <div class="arrow-shape-right">
                                <img src="/images-n/icons/arrow-shape-right.png" alt="" class="img-fluid">
                            </div>
                            <h2>2. Request To Join</h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.</p>
                        </div>
                    </div>
                    <div class="works-item">
                        <div class="works-item-col works-img dis-block-991">
                            <img src="/images-n/works/3.png" alt="" class="img-fluid">
                        </div>
                        <div class="works-item-col works-text">
                            <div class="arrow-shape-left">
                                <img src="/images-n/icons/arrow-shape-left.png" alt="" class="img-fluid">
                            </div>
                            <h2>3. Chat Any time </h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur</p>
                        </div>
                        <div class="works-item-col works-img dis-none-991">
                            <img src="/images-n/works/3.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="works-item works-item-two">
                        <div class="works-item-col works-img">
                            <img src="/images-n/works/4.png" alt="" class="img-fluid">
                        </div>
                        <div class="works-item-col works-text works-text-two">
                            <div class="arrow-shape-right">
                                <img src="/images-n/icons/arrow-shape-right.png" alt="" class="img-fluid">
                            </div>
                            <h2>4. Select Travel Partner</h2>
                            <p>the trip creator select a traveler form the list, then travel together) with attractive way.</p>
                        </div>
                    </div>
                    <div class="works-item">
                        <div class="works-item-col works-img dis-block-991">
                            <img src="/images-n/works/5.png" alt="" class="img-fluid">
                        </div>
                        <div class="works-item-col works-text">
                            <div class="arrow-shape-left">
                                <img src="/images-n/icons/arrow-shape-left.png" alt="" class="img-fluid">
                            </div>
                            <h2>5. Join Trip Together</h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur</p>
                        </div>
                        <div class="works-item-col works-img dis-none-991">
                            <img src="/images-n/works/5.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Subscribe Start -->
<section class="subscribe-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="subscribe-box">
                    <h2>Stay in the know</h2>
                    <p>Fusce placerat pretium mauris, vel sollicitudin elit lacinia vitae. Quisque sit amet nisi erat.</p>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <button class="btn btn-primary" type="submit"><img src="/images-n/icons/button.png" alt=""></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<a href="#" id="back-to-top" title="Back to top"><img src="/images-n/icons/top-arrow.png" alt=""></a>
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
