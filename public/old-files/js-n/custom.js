
(function($) {

	"use strict";


    // Datepicker Active Script
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome'
    });
    $('#datepicker-two').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome'
    });


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
              '<img src="images/icons/left-arrow-white.png" alt="">',
              '<img src="images/icons/right-arrow-white.png" alt="">'
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




    // selectpicker
    $(document).ready(function(){

          // Initialize select2
          $(".seluser").select2();

          // Read selected option
          $('#but_read').click(function(){
            var username = $('.seluser option:selected').text();
            var userid = $('.seluser').val();

            $('#result').html("id : " + userid + ", name : " + username);

          });
    });





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




})(window.jQuery);
