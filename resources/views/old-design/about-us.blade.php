@extends("layout")
@section("head")
    <!-- about CSS -->
    <link href="/css-n/about.css" rel="stylesheet">

    <!-- about Responsive CSS -->
    <link href="/css-n/about-responsive.css" rel="stylesheet">
@endsection



@section("content")
<!-- Page Name Start -->
<section class="pagename-area">
    <div class="container-fluid custom-container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="pagename-col">
                    <img src="/images-n/logo-pink.png" alt="" class="img-fluid">
                    <h4>A name that brings travel lovers closer</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Inner About Start -->
<section class="inner-about-area">
    <div class="container-fluid custom-container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="inner-about-col inner-about-heading">
                    <h2>Find More About us Who We Are</h2>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="inner-about-col inner-about-para">
                    <p>Trippbo is a fantastic platform for travel lovers. We exist to look after your travelling preferences, bringing you some exclusive features to make your trips memorable. We have plans to settle your worries about trip funds, providing you company to travel with, and some special lottery offers. </p>
                    <p>Have you ever dreamt of exploring the breathtaking sceneries, the verdant beauty of the world, and the heavenly tourist spots across the globe? Did your dream not come true due to a shortage of funds or lacking travellers company? Now trippbo is here to take care of your dreams to travel the world. </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="promotion-boxs">
                    <div class="about-promotion-box">
                        <img src="/images-n/about/4.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="about-promotion-box about-promotion-box-text">
                        <h2>Think of a trip, trippbo will make it for you.</h2>
                        <img src="/images-n/icons/quotation-white.png" alt="" class="img-fluid quotation-white-img">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-about-boxs">
                    <div class="inner-about-box-text">
                        <h2>Fund My Trips</h2>
                        <p>Are you eager to travel but hesitant to travel alone? Trippbo has this amazing feature for you to provide you company of travellers. Fund my trips feature enables you to post your trip and invite other travellers to accompany you on the trip. Now your trips are no more tedious; post your trip</p>
                        <div class="highlight-box">
                            <p>Enjoy your journey with joyous trippbo travellers company.</p>
                            <img src="/images-n/icons/quotation.png" alt="">
                        </div>
                        <p>Those desperate to travel but have no funds can avail this great offer to travel with the trip creator. Lodge a join request on the trips posted here and be among the lucky ones to travel. The trip creator will select the winner and manage the travel and accommodation expenses of the winner. </p>
                        <div class="highlight-box mb-0">
                            <p>Join trippbo to make your travel dreams come true.</p>
                            <img src="/images-n/icons/quotation.png" alt="">
                        </div>
                    </div>
                    <div class="inner-about-box-img">
                        <img src="/images-n/about/5.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="inner-about-boxs">
                    <div class="inner-about-box-img">
                        <img src="/images-n/about/6.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="inner-about-box-text">
                        <h2>Fund My Trips SOLO</h2>
                        <p>Trippbo takes care of travellers who want to explore the ravishing beauty of the world all alone. Let’s arrange a solo trip for you and get to your dream destination, enjoying the breathtaking sceneries all alone. Fund my trip solo feature enables you to post a trip and ask others to fund your trip. People willing to fund your trip will visit your post and fund for your trip, and at the end of funding, trippbo will award you a gift card. A gift card can be used to buy a trip and get funds for your trip.</p>
                        <div class="highlight-box mb-0">
                            <p>Trippbo invests in replenishing you with happiness.</p>
                            <img src="/images-n/icons/quotation.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="inner-about-boxs">
                    <div class="inner-about-box-text">
                        <h2>Tickets Lottery</h2>
                        <p>Trippbo brings a marvellous opportunity for travel lovers to get free trips. You must have ever thought of travelling to your dream destinations free of cost; finally, you can be among the lucky ones to travel with trippbo free tickets. Buy an entry ticket from the trippbo tickets lottery and wait for the lottery results. The lucky winner of the tickets lottery will get a free trip funded by trippbo. This makes trippbo unique from other travelling agencies; we invest in travel lovers.</p>
                        <div class="highlight-box mb-0">
                            <p>Now you can dream of free trips with trippbo.</p>
                            <img src="/images-n/icons/quotation.png" alt="">
                        </div>
                    </div>
                    <div class="inner-about-box-img">
                        <img src="/images-n/about/7.jpg" alt="" class="img-fluid">
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
