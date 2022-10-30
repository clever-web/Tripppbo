
// Nav Script
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

$(document).ready(function(){
    $('#DateFrom').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy"
    });
    $('#DateTo').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy"
    });


/*     if ($('.bbb_viewed_slider').length) {
        var viewedSlider = $('.bbb_viewed_slider');

        viewedSlider.owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 6000,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                768: {
                    items: 3
                },
                991: {
                    items: 4
                },
                1199: {
                    items: 5
                }
            }
        });

        if ($('.bbb_viewed_prev').length) {
            var prev = $('.bbb_viewed_prev');
            prev.on('click', function() {
                viewedSlider.trigger('prev.owl.carousel');
            });
        }

        if ($('.bbb_viewed_next').length) {
            var next = $('.bbb_viewed_next');
            next.on('click', function() {
                viewedSlider.trigger('next.owl.carousel');
            });
        }
    }
    if ($('.bbb_viewed_slider_card').length) {
        var viewedSlider_card = $('.bbb_viewed_slider_card');

        viewedSlider_card.owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 6000,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 1
                },
                768: {
                    items: 2
                },
                991: {
                    items: 2
                },
                1199: {
                    items: 2
                }
            }
        });

        if ($('.bbb_viewed_prev').length) {
            var prev = $('.bbb_viewed_prev');
            prev.on('click', function() {
                viewedSlider_card.trigger('prev.owl.carousel');
            });
        }

        if ($('.bbb_viewed_next_card').length) {
            var next = $('.bbb_viewed_next_card');
            next.on('click', function() {
                viewedSlider_card.trigger('next.owl.carousel');
            });
        }
    } */
});
