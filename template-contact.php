<?php
/*
Template Name: Contact Us
*/
get_header();
?>

	<section class="cs_sec contact_bnr_sec position-relative">

        <div class="container">

            <div class="cs_bnr_div w-100 float-start d-flex justify-content-between align-items-center">

                <div class="cs_title w-100">

                    <h1><?php echo get_field('conatct_sec1_heading_1'); ?> <strong class="typing-effect"><?php echo get_field('conatct_sec1_heading_2'); ?></strong></h1>

                    <?php

                        $link = get_field('conatct_sec1_button_link_1');

                        if ($link) {

                    ?>

                    <a class="secondary_btn" href="#talk_to_us"><?php echo $link['title']; ?></a>

                    <?php } ?>

                    <?php /*

                        $link = get_field('conatct_sec1_button_link_2');

                        if ($link) {

                    ?>

                    <a id="book_meeting" class="secondary_btn" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

                    <?php } */ ?>

                    <a id="book_meeting" class="secondary_btn" href="javascript:void(0)">Book a Meeting</a>

                </div>



                <div class="cs_pic w-100 text-end position-relative">

                    <div class="hexagon">

                        <?php

                            $img = get_field('conatct_sec1_image');

                            if ($img) {

                        ?>

                        <img aria-hidden="true" decoding="async" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" width="300" height="76">

                        <?php } ?>

                    </div>

                    <div class="hexagon hexagon2 position-absolute"></div>

                    <div class="hexagon hexagon3 position-absolute"></div>

                </div>



            </div>

        </div>      

    </section>



    <section class="calendly_sec">

        <h6 class="close_clandely">X Close</h6>

        <!-- Start of Meetings Embed Script -->
        <div class="meetings-iframe-container" data-src="https://meetings-eu1.hubspot.com/sbrannon?embed=true"></div>
        <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
        <!-- End of Meetings Embed Script -->

    </section>



    <section id="talk_to_us" class="form_sec">

        <div class="container">

            <div class="main_form_div w-100 float-start d-grid">

                <div class="form_title">

                    <h1><?php echo get_field('conatct_sec2_heading'); ?></h1>

                    <p><?php echo get_field('conatct_sec2_description'); ?> </p>

                </div>

                <div class="form_div w-100 float-start">

                    <?php echo do_shortcode('[gravityform id="2" title="false" ajax="true"]'); ?>

                    <!-- <ul>

                        <li>

                            <label>First name*</label>

                            <input type="text" placeholder="Your first name">

                        </li>

                        <li>

                            <label>Last name*</label>

                            <input type="text" placeholder="Your last name">

                        </li>

                        <li class="full-width">

                            <label>Your Email*</label>

                            <input type="email" placeholder="Your email address">

                        </li>

                        <li>

                            <label>Business name*</label>

                            <input type="text" placeholder="Your company name">

                        </li>

                        <li>

                            <label>Phone:</label>

                            <input type="text" placeholder="Your phone number">

                        </li>

                        <li>

                            <label>Website URL:</label>

                            <input type="text" placeholder="Your website">

                        </li>

                        <li>

                            <label>What do you need help with?</label>

                            <div class="ginput_container ginput_container_select">

                                <select name="input_16" id="input_16_16" class="large gfield_select" aria-required="true" aria-invalid="false">

                                    <option selected="selected">Branding</option>

                                    <option>Websites</option>

                                    <option>Design</option>

                                </select>

                            </div>

                        </li>

                        <li>

                            <label>Preferred contact method*</label>

                            <div class="ginput_container ginput_container_select">

                                <select name="input_16" id="input_16_16" class="large gfield_select" aria-required="true" aria-invalid="false">

                                    <option selected="selected">Phone</option>

                                    <option>Mobile</option>

                                    <option>Email</option>

                                </select>

                            </div>

                        </li>

                        <li>

                            <label>Budget:</label>

                            <div class="ginput_container ginput_container_select">

                                <select name="input_16" id="input_16_16" class="large gfield_select" aria-required="true" aria-invalid="false">

                                    <option selected="selected">Please select an option</option>

                                    <option>$100</option>

                                    <option>$300</option>

                                    <option>$500</option>

                                </select>

                            </div>

                        </li>

                        <li class="full-width">

                            <label>How can we help?</label>

                            <textarea placeholder="What goals and objectives you're trying to achieve?"></textarea>

                        </li>

                        <li class="full-width">

                            <div class="ginput_container ginput_container_checkbox">

                                <ul class="gfield_checkbox">

                                    <li>

                                        <input class="gfield-choice-input" type="checkbox">

                                        <label for="choice_16_18_1" id="label_16_18_1" class="gform-field-label gform-field-label--type-inline">Proud Brands Limited needs the contact information you provide to us to contact you about our products and services. You may unsubscribe from these communications at any time. For information on how to unsubscribe, as well as our privacy practices and commitment to protecting your privacy, please review our <a href="#">Privacy Policy</a>.

                                        </label>

                                    </li>

                                </ul>

                            </div>

                        </li>

                    </ul>

                    <div class="gform_footer">

                        <input type="submit" value="Submit" />

                    </div> -->

                </div>

            </div>

        </div>

    </section>



    <section class="map_sec d-flex justify-content-between align-items-center">



        <div class="timing_div w-100 float-start">

            <h2>ProudBrands</h2>

            <ul>

                <?php

                    $phonNo = get_field('footer_phone_number', 'options');

                    if ($phonNo) {

                ?>

                <li>

                    <span><img aria-hidden="true" decoding="async" src="<?php echo get_template_directory_uri(); ?>/images/call.png" alt="call" width="25" height="31"></span>

                    <h3>Call us</h3>

                    <a href="tel:<?php echo $phonNo; ?>"><?php echo $phonNo; ?></a>

                </li>

                <?php }

                    $emailadd = get_field('footer_email', 'options');

                    if ($emailadd) {

                ?>

                <li>

                    <span><img aria-hidden="true" decoding="async" src="<?php echo get_template_directory_uri(); ?>/images/mail.png" alt="call" width="25" height="31"></span>

                    <h3>Our email</h3>

                    <a href="mailto:<?php echo $emailadd; ?>"><?php echo $emailadd; ?></a>

                </li>

                <?php }

                    $address = get_field('footer_address', 'options');

                    if ($address) {

                ?>

                <li>

                    <span><img aria-hidden="true" decoding="async" src="<?php echo get_template_directory_uri(); ?>/images/address.png" alt="call" width="25" height="31"></span>

                    <h3>Visit us</h3>

                    <a href="<?php echo $address; ?>"><?php echo $address; ?></a>

                </li>

                <?php } ?>

            </ul>

            <h4>Our business hours</h4>

            <ol>

                <?php

                    $counter=1;

                    if (have_rows('footer_our_business_hours', 'options')) {

                        while (have_rows('footer_our_business_hours', 'options')) {

                            the_row();

                            if ($counter == 1) {

                                $dayName = 'Sunday';

                            } else if ($counter == 2) {

                                $dayName = 'Monday';

                            } else if ($counter == 3) {

                                $dayName = 'Tuesday';

                            } else if ($counter == 4) {

                                $dayName = 'Wednesday';

                            } else if ($counter == 5) {

                                $dayName = 'Thursday';

                            } else if ($counter == 6) {

                                $dayName = 'Friday';

                            } else if ($counter == 7) {

                                $dayName = 'Saturday';

                            }

                ?>

                <li><?php echo $dayName; ?> <small><?php echo get_sub_field('timingopen_and_close', 'options'); ?></small></li>

                <?php

                        $counter++;

                        }

                    }

                ?>

                <!-- <li>Monday<small></small></li>

                <li>Tuesday<small></small></li>

                <li>Wednesday<small></small></li>

                <li>Thursday<small></small></li>

                <li>Friday<small></small></li>

                <li>Saturday <small></small></li> -->

            </ol>

        </div>

        

        <div class="map_div w-100 float-start">

            <!-- <img aria-hidden="true" decoding="async" loading="lazy" src="</?php echo get_template_directory_uri(); ?>/images/map.jpg" alt="map pic" width="900" height="600"> -->

            <!-- Yeh aapke page mein hona chahiye, script se pehle ya baad -->
            <div id="map" style="width:100%; height:100vh;"></div>


        </div>    

    </section>



    <section class="faq_sec">

        <div class="container">

            <h3><?php echo get_field('services_sec10_heading', 'options'); ?></h3>

            <div class="accordion faq_div w-100 float-start" id="accordionExample">

                <?php

                    $counter=1;

                    if (have_rows('services_sec10_frequently_asked_questions', 'options')) {

                        while (have_rows('services_sec10_frequently_asked_questions', 'options')) {

                            the_row();

                ?>

                <div class="accordion-item">

                    <h2 class="accordion-header" id="headingOne">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tab-<?php echo $counter; ?>" aria-expanded="true" aria-controls="tab-<?php echo $counter; ?>">

                            <?php echo get_sub_field('question', 'options'); ?>

                        </button>

                    </h2>

                    <div id="tab-<?php echo $counter; ?>" class="accordion-collapse collapse <?php if($counter==1){echo 'show';} ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                        <div class="accordion-body">

                            <p><?php echo get_sub_field('answer', 'options'); ?></p>

                        </div>

                    </div>

                </div>

                <?php

                        $counter++;

                        }

                    }

                ?>

              <!-- <div class="accordion-item">

                <h2 class="accordion-header" id="headingOne">

                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tab-1" aria-expanded="true" aria-controls="tab-1">

                    How does a good website help my business?

                  </button>

                </h2>

                <div id="tab-1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                  <div class="accordion-body">

                    <p>Web design is like creating the blueprints for your house (how it looks, where everything goes), while web development is actually building it. We do both, making sure your website not only looks great but works perfectly too.</p>

                  </div>

                </div>

              </div>

              <div class="accordion-item">

                <h2 class="accordion-header" id="headingTwo">

                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab-2" aria-expanded="false" aria-controls="tab-2">

                    What's the difference between web design and development?

                  </button>

                </h2>

                <div id="tab-2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">

                  <div class="accordion-body">

                    <p>Web design is like creating the blueprints for your house (how it looks, where everything goes), while web development is actually building it. We do both, making sure your website not only looks great but works perfectly too.</p>

                  </div>

                </div>

              </div>

              <div class="accordion-item">

                <h2 class="accordion-header" id="headingThree">

                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab-3" aria-expanded="false" aria-controls="tab-3">

                    Do you make mobile-friendly websites?

                  </button>

                </h2>

                <div id="tab-3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">

                  <div class="accordion-body">

                    <p>Web design is like creating the blueprints for your house (how it looks, where everything goes), while web development is actually building it. We do both, making sure your website not only looks great but works perfectly too.</p>

                  </div>

                </div>

              </div>

              <div class="accordion-item">

                <h2 class="accordion-header" id="headingThree">

                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab-4" aria-expanded="false" aria-controls="tab-4">

                    What support do you offer after the website launches?

                  </button>

                </h2>

                <div id="tab-4" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">

                  <div class="accordion-body">

                    <p>Web design is like creating the blueprints for your house (how it looks, where everything goes), while web development is actually building it. We do both, making sure your website not only looks great but works perfectly too.</p>

                  </div>

                </div>

              </div>

              <div class="accordion-item">

                <h2 class="accordion-header" id="headingThree">

                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tab-5" aria-expanded="false" aria-controls="tab-5">

                    Who writes the content for my website?

                  </button>

                </h2>

                <div id="tab-5" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">

                  <div class="accordion-body">

                    <p>Web design is like creating the blueprints for your house (how it looks, where everything goes), while web development is actually building it. We do both, making sure your website not only looks great but works perfectly too.</p>

                  </div>

                </div>

              </div> -->

            </div>

        </div>

    </section>



    <section class="marquee_sec marquee_sec02 w-100 float-start text-center">

        <h2><?php echo get_field('home_bnr_heading', 'options'); ?></h2>

        <?php
            for ($i=1; $i < 3; $i++) {
                
        ?>

        <ul class="marquee__item">

            <?php

                if (have_rows('home_bnr_company_logos', 'options')) {

                    while (have_rows('home_bnr_company_logos', 'options')) {

                        the_row();

                        $img = get_sub_field('logo', 'options');

            ?>

            <li class="marqueeBox">

                <img width="56" height="64" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">

            </li>

            <?php

                    }

                }

            ?>

        </ul>

        <?php } ?>
        
        <!-- <ul> -->

            <?php /*

                if (have_rows('home_bnr_company_logos', 'options')) {

                    while (have_rows('home_bnr_company_logos', 'options')) {

                        the_row();

                        $img = get_sub_field('logo', 'options');

            ?>

            <li class="marqueeBox">

                <img width="56" height="64" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">

            </li>

            <?php

                    }

                }

            */ ?>
        <!-- </ul> -->


    </section>







<?php get_footer(); ?>









    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function() {

            const elements = document.querySelectorAll('.typing-effect');



            // Define the typing effect function

            function typeWriter(element) {

                const fullText = element.textContent;

                element.textContent = "";  // Clear the original text

                let index = 0;

                const typingSpeed = 20;  // Speed of typing in milliseconds



                function type() {

                    if (index < fullText.length) {

                        element.textContent += fullText.charAt(index);

                        index++;

                        setTimeout(type, typingSpeed);

                    }

                }



                type();

            }



            // Define the intersection observer to detect when the element is in view

            const observer = new IntersectionObserver((entries, observer) => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        // Start the typing animation when the element is visible

                        typeWriter(entry.target);

                        // Stop observing this element after the animation starts

                        observer.unobserve(entry.target);

                    }

                });

            }, { threshold: 0.5 });  // Trigger when 50% of the element is in view



            // Observe each element with the 'typing-effect' class

            elements.forEach(element => {

                observer.observe(element);

            });

        });



    </script>



    <script>

        $(function() {                       

          $("#book_meeting").click(function() {

            $('body').addClass("open_clandely");

          });

          $(".close_clandely").click(function() {

            $('body').removeClass("open_clandely");

          });

        });

    </script>




<!--   <script>
    function initMap() {
      const location = { lat: 51.8417, lng: -1.3610 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: location,
        styles: [
          {
            featureType: "all",
            stylers: [{ saturation: -100 }, { gamma: 0.5 }]
          //}
        //]
      });
      new google.maps.Marker({
        position: location,
        map: map,
        icon: {
          url: "https://maps.google.com/mapfiles/ms/icons/orange-dot.png"
        //}
      //});
    //}
  </script>

  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfQs4nt5GkDU7ytHOTcqkEar3y4USkv1k&callback=initMap"
    async
    defer
  ></script> -->





  <script>
      function initMap() {
        const location = { lat: 51.8417, lng: -1.3610 };

        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 10,
          center: location,
          styles: [
            {
              elementType: "geometry",
              stylers: [{ color: "#f5f5f5" }],
            },
            {
              elementType: "labels.icon",
              stylers: [{ visibility: "on" }],
            },
            {
              elementType: "labels.text.fill",
              stylers: [{ color: "#616161" }],
            },
            {
              elementType: "labels.text.stroke",
              stylers: [{ color: "#f5f5f5" }],
            },
            {
              featureType: "administrative.land_parcel",
              elementType: "labels.text.fill",
              stylers: [{ color: "#eeeeee" }],
            },
            {
              featureType: "poi",
              elementType: "geometry",
              stylers: [{ color: "#eeeeee" }],
            },
            {
              featureType: "poi",
              elementType: "labels.text.fill",
              stylers: [{ color: "#757575" }],
            },
            {
              featureType: "poi.park",
              elementType: "geometry",
              stylers: [{ color: "#e5e5e5" }],
            },
            {
              featureType: "poi.park",
              elementType: "labels.text.fill",
              stylers: [{ color: "#9e9e9e" }],
            },
            {
              featureType: "road",
              elementType: "geometry",
              stylers: [{ color: "#ffffff" }],
            },
            {
              featureType: "road.arterial",
              elementType: "labels.text.fill",
              stylers: [{ color: "#757575" }],
            },
            {
              featureType: "road.highway",
              elementType: "geometry",
              stylers: [{ color: "#dadada" }],
            },
            {
              featureType: "road.highway",
              elementType: "labels.text.fill",
              stylers: [{ color: "#616161" }],
            },
            {
              featureType: "road.local",
              elementType: "labels.text.fill",
              stylers: [{ color: "#9e9e9e" }],
            },
            {
              featureType: "transit.line",
              elementType: "geometry",
              stylers: [{ color: "#e5e5e5" }],
            },
            {
              featureType: "transit.station",
              elementType: "geometry",
              stylers: [{ color: "#eeeeee" }],
            },
            {
              featureType: "water",
              elementType: "geometry",
              stylers: [{ color: "#c9c9c9" }],
            },
            {
              featureType: "water",
              elementType: "labels.text.fill",
              stylers: [{ color: "#9e9e9e" }],
            },
          ],
        });

        new google.maps.Marker({
          position: location,
          map: map,
            icon: {
                path: "M24 0C14.06 0 6 8.06 6 18c0 10.5 17.25 30 18 30s18-19.5 18-30C42 8.06 33.94 0 24 0zm0 27a9 9 0 1 1 0-18 9 9 0 0 1 0 18z",
                fillColor: "#000000",
                fillOpacity: 1,
                strokeWeight: 0,
                scale: 1.8,
                anchor: new google.maps.Point(50, 74),
                labelOrigin: new google.maps.Point(24, 15)
            },
            label: {
                text: "●", // Unicode orange dot
                color: "#FFA500",
                fontSize: "75px"
            }
        });
      }
    </script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqY3_BqClD8F2ISiEz_EYmrWUtCvqGDlM&callback=initMap"
      async
      defer
    ></script>