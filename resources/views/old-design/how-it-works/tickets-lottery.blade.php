@extends("layout")
@section("head")

    <link href="/css-n/works-lottery.css" rel="stylesheet">

    <!-- works-lottery Responsive CSS -->
    <link href="/css-n/works-lottery-responsive.css" rel="stylesheet">

@endsection

@section("content")
<!-- Page Name Start -->
<section class="pagename-area">
    <div class="container-fluid custom-container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="pagename-col">
                    <h2>How It's Works</h2>
                    <h4>Tickets Lottery</h4>
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
                            <img src="/images-n/works/b1.png" alt="" class="img-fluid">
                        </div>
                        <div class="works-item-col works-text">
                            <h2>1. Select the Lottery Ticket </h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur.</p>
                        </div>
                        <div class="works-item-col works-img dis-none-991">
                            <img src="/images-n/works/b1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="works-item works-item-two">
                        <div class="works-item-col works-img">
                            <img src="/images-n/works/b2.png" alt="" class="img-fluid">
                        </div>
                        <div class="works-item-col works-text works-text-two">
                            <div class="arrow-shape-right">
                                <img src="/images-n/icons/arrow-shape-right.png" alt="" class="img-fluid">
                            </div>
                            <h2>2. Pay Some Amount to Enter into Luck Draw</h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et</p>
                        </div>
                    </div>
                    <div class="works-item">
                        <div class="works-item-col works-img dis-block-991">
                            <img src="/images-n/works/b3.png" alt="" class="img-fluid">
                        </div>
                        <div class="works-item-col works-text">
                            <div class="arrow-shape-left">
                                <img src="/images-n/icons/arrow-shape-left.png" alt="" class="img-fluid">
                            </div>
                            <h2>3. We Selected The Luckiest Person</h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam</p>
                        </div>
                        <div class="works-item-col works-img dis-none-991">
                            <img src="/images-n/works/b3.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="works-item works-item-two">
                        <div class="works-item-col works-img">
                            <img src="/images-n/works/b4.png" alt="" class="img-fluid">
                        </div>
                        <div class="works-item-col works-text works-text-two">
                            <div class="arrow-shape-right">
                                <img src="/images-n/icons/arrow-shape-right.png" alt="" class="img-fluid">
                            </div>
                            <h2>4. Enjoy Your Trip</h2>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur</p>
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


@section("scritps")
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- All Included JavaScript -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/particles.js"></script>
<script src="js/particles-app.js"></script>
<script src="js/select2.min.js"></script>

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
