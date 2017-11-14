$('.owl-carousel').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    lazyLoad:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
});

$('.owl-carousel1').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    lazyLoad:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

$(".owl-carousel2").owlCarousel({
    loop:true,
    autoplay:true,
    lazyLoad:true,
    autoHeight:true,
    animateOut: 'fadeOut',
    animateIn: 'flipInX',
    items:1,
    margin:10,
    smartSpeed:450
});