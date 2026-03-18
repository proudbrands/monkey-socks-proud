$(document).ready(function() {
  // icon slider
  var swiper = new Swiper('.ftr_project_slider', {
    loop: true,
      autoplay: {
        delay: 1,
      },
      slidesPerView: 3,
      speed: 5000,
      grabCursor: true,
      //spaceBetween: 10,
      disableOnInteraction: false,
      // pagination: {
      //   el: '.swiper-pagination',
      //   clickable: true,
      // },
      // navigation: {
      //   nextEl: '.swiper-button-next',
      //   prevEl: '.swiper-button-prev',
      // },
      breakpoints: {
            992: {
                slidesPerView: 3,
                loop: true,
                //spaceBetween: 75,
            },
            320: {
                slidesPerView: 1,
                loop: true,
                //spaceBetween: 20,
            },
        },
    });
});

// for services page
$(document).ready(function() {
  var swiper1 = new Swiper(".year_bldngSlderDiv", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});