$(function() {

	if ( $('.owl-2').length > 0 ) {
        $('.owl-2').owlCarousel({
            center: false,
            items: 1,
            loop: false,
            stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            autoplay: false,
            nav: true,
            navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
            dots: false,
            pauseOnHover: false,
            responsive:{
                0:{
                  margin: 20,
                  nav: true,
                  items: 2
                },
                1000:{
                  margin: 20,
                  stagePadding: 0,
                  nav: true,
                  items: 4
                }
            }
        });            
    }

  if ( $('.owl-3').length > 0 ) {
    $('.owl-3').owlCarousel({
        center: false,
        items: 1,
        loop: false,
        stagePadding: 0,
        margin: 20,
        smartSpeed: 1000,
        autoplay: false,
        nav: true,
        navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
        dots: false,
        pauseOnHover: false,
        responsive:{
            0:{
                margin: 20,
                nav: true,
              items: 2
            },
            1000:{
                margin: 20,
                stagePadding: 0,
                nav: true,
              items: 3
            }
        }
    });   
  }

  if ( $('.owl-4').length > 0 ) {
    $('.owl-4').owlCarousel({
        center: true,
        items: 1,
        loop: true,
        stagePadding: 0,
        margin: 20,
        smartSpeed: 1000,
        autoplay: false,
        nav: true,
        navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
        dots: false,
        pauseOnHover: false,
        responsive:{
            0:{
                margin: 20,
                nav: true,
              items: 2
            },
            1000:{
                margin: 20,
                stagePadding: 0,
                nav: true,
              items: 3
            }
        }
    });   
  }

})
