$('.owl-carousel.owl-theme').owlCarousel({
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

$(".owl-carousel2").owlCarousel({
  loop: true,
  autoplay: true,
  items: 1,
  nav: true,
  autoplayHoverPause: true,
  animateOut: 'slideOutUp',
  animateIn: 'slideInUp'
});