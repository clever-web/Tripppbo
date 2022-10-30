console.log("Hello World");

$('.slider_wrapper').owlCarousel({
    autoplay: true,
    loop:true,
    margin:0,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})