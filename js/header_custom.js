
document.addEventListener('DOMContentLoaded', function () {
    // Initialize AOS
    AOS.init({
      // Global settings:
      disable: 'mobile',
      initClassName: 'aos-init',
      animatedClassName: 'aos-animate',
      useClassNames: true,
      disableMutationObserver: false,

      // Per-element settings:
      offset: 100,
      delay: 300,
      duration: 300,
      easing: 'ease-in-out',
      once: true,
      mirror: false,
      anchorPlacement: 'top-bottom',
    });

    // Initialize Lenis
    const lenis = new Lenis();

    // Debounced AOS refresh — prevents 60fps layout thrashing that causes page jitter.
    // Modern Lenis (v1+) uses native scroll so AOS mostly works without this,
    // but a debounced refresh catches edge cases on resize/dynamic content.
    let aosTimeout;
    lenis.on('scroll', () => {
      clearTimeout(aosTimeout);
      aosTimeout = setTimeout(() => AOS.refresh(), 200);
    });

    // Animation frame loop for Lenis
    function raf(time) {
      lenis.raf(time);
      requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);
  });



// document.addEventListener('DOMContentLoaded', function() {
//      AOS.init({
//      // Global settings:
//      disable: 'mobile', // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
//      //startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
//      initClassName: 'aos-init', // class applied after initialization
//      animatedClassName: 'aos-animate', // class applied on animation
//      useClassNames: true, // if true, will add content of `data-aos` as classes on scroll
//      disableMutationObserver: false, // disables automatic mutations' detections (advanced)
//      //debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
//      //throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)

//      // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
//      offset: 100, // offset (in px) from the original trigger point
//      delay: 300, // values from 0 to 3000, with step 50ms
//      duration: 300, // values from 0 to 3000, with step 50ms
//      easing: 'ease-in-out', // default easing for AOS animations
//      once: true, // whether animation should happen only once - while scrolling down
//      mirror: true, // whether elements should animate out while scrolling past them
//      anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

//    });
// });

// =================================================================================================================================================

// lenis js animation script
// const lenis = new Lenis()
//     lenis.on('scroll', (e) => {
//     //console.log(e)
// })
//     function raf(time) {
//     lenis.raf(time)
//     requestAnimationFrame(raf)
// }
//     requestAnimationFrame(raf)

// =================================================================================================================================================

    $(document).ready(function(){
    // Toggle hamburger icons
    $('#nav-icon1, #nav-icon3, #nav-icon4').click(function(){
        $(this).toggleClass('open');
    });

    // Toggle navigation menu
    $("#hdr__nav-icon2").click(function(){
        $(this).toggleClass('open');
        $(".navigation").slideToggle();
    });

    // Add 'no-link' class to items with submenus
    $.each($('.menu-item'), function() {
        if($(this).hasClass('menu-item-has-children')){
            $(this).addClass('no-link');
        }
    });

    // Add caretbox to all parent menu items
    //$(".navigation ul li.menu-item-has-children a").prepend('<div class="caretbox"></div>');
    //$(".navigation ul li.menu-item-has-children a").append('<div class="caretbox"></div>');


    if ($(window).width() < 992) {
    // Click handler for caretbox and .no-link > a
        $(".navigation ul li.menu-item-has-children > a > .caretbox, .navigation ul li.menu-item-has-children.no-link > a").click(function(e) {
            e.preventDefault();

            var parentLi = $(this).closest('li');
            var parentUl = parentLi.parent();
            var subMenu = parentLi.find('> .sub-menu');

            if (parentLi.hasClass('expanding')) {
                // If already open, close it
                parentLi.removeClass('expanding');
                subMenu.stop(true, true).slideUp();
                // Also close all nested submenus
                parentLi.find('.menu-item-has-children').removeClass('expanding').find('.sub-menu').slideUp();
            } else {
                // Close siblings
                parentUl.find('> li.menu-item-has-children').not(parentLi)
                    .removeClass('expanding')
                    .find('> .sub-menu').slideUp();

                // Close nested submenus inside clicked one
                parentLi.find('.menu-item-has-children').removeClass('expanding').find('.sub-menu').slideUp();

                // Open current
                parentLi.addClass('expanding');
                subMenu.stop(true, true).slideDown();
            }
        });
    }
});





// =================================================================================================================================================

    


