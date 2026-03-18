<?php

/*



Template Name: About



*/



get_header();

?>









    <section class="about_top_sec">

        <div class="container">

            <div class="about_title w-100 float-start position-relative">

                <h1><?php the_title(); ?></h1>

            </div>

            <div class="about_des w-100 float-start">

                <p><?php echo get_field('about_sec1_description'); ?></p>

            </div>

        </div>

    </section>

    <section class="abt_branding">

        <div class="container align-items-center">

            <div class="abt_branding_row w-100 d-grid position-relative">

                <?php

                    if (have_rows('about_sec1_our_skills')) {

                        while (have_rows('about_sec1_our_skills')) {

                            the_row();

                ?>

                <div class="abt_brandingBox float-start w-100" data-aos="fade-up">

                    <h2><?php echo get_sub_field('title'); ?></h2>

                    <p><?php echo get_sub_field('description'); ?></p>

                </div>

                <?php

                        }

                    }

                ?>

            </div>

            <div class="abt_branding_nmbrs float-start w-100 d-flex flex-wrap flex-column align-content-end">

                <?php

                    if (have_rows('about_sec1_our_skills_rates')) {

                        while (have_rows('about_sec1_our_skills_rates')) {

                            the_row();

                ?>

                <div class="abt_branding_nmbrs_box">

                    <h3 class="counter text-end">+<?php echo get_sub_field('rate__value'); ?></h3>

                    <p><?php echo get_sub_field('heading'); ?></p>

                </div>

                <?php

                        }

                    }

                ?>

            </div>

        </div>

    </section>



    <section class="believing_sect">

        <div class="container">

            <h2 data-aos="fade-up"><?php echo get_field('about_sec2_heading'); ?></h2>

            <p data-aos="fade-up"><?php echo get_field('about_sec2_description'); ?></p>

            <div class="believing_grid d-grid w-100 position-relative">

                <?php

                    if (have_rows('about_sec2_our_services')) {

                        while (have_rows('about_sec2_our_services')) {

                            the_row();

                ?>

                <div class="believing_Box float-start w-100" data-aos="fade-up">

                    <h3><?php echo get_sub_field('heading'); ?></h3>

                    <p><?php echo get_sub_field('description'); ?></p>

                </div>

                <?php

                        }

                    }

                ?>

            </div>

        </div>

    </section>



    <section class="our_client_sect">

        <div class="container">

            <h2><?php echo get_field('about_sec3_title'); ?></h2>

            <p><?php echo get_field('about_sec3_description'); ?></p>

            <ul>

                <?php


                    if (have_rows('about_sec3_our_clients')) {

                        while (have_rows('about_sec3_our_clients')) {

                            the_row();

                            $img = get_sub_field('logo');

                ?>

                <li>

                    <div class="our_client_box d-flex flex-wrap align-items-center justify-content-center w-100">

                        <img src="<?php echo $img['url'] ?>" width="174" height="53"  alt="<?php echo $img['alt'] ?>">

                    </div>

                </li>

                <?php


                        }

                    }

                ?>

            </ul>

        </div>

    </section>



    <section class="team_proudbrand">

        <div class="container">

            <h2 data-aos="fade-up"><?php echo get_field('about_sec4_title'); ?></h2>

            <div class="team_proudbrand_row w-100">

                <?php

                    if (have_rows('about_sec4_our_team')) {

                        while (have_rows('about_sec4_our_team')) {

                            the_row();

                            $img = get_sub_field('image');

                            $img2 = get_sub_field('hover_image');

                ?>

                <div class="team_proudbrand_box" data-aos="fade-up">

                    <div class="team_hexagon position-relative">

                        <span class="team_img">

                            <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>" width="472" height="472">

                        </span>

                        <span class="team_img_hover">

                            <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo $img2['url'] ?>" alt="<?php echo $img2['alt'] ?>" width="410" height="464">

                        </span>

                    </div>

                    <div class="team_proudbrand_des float-start w-100">

                        <h3><?php echo get_sub_field('name'); ?></h3>

                        <small><?php echo get_sub_field('designation'); ?></small>

                        <p><?php echo get_sub_field('description'); ?></p>

                    </div>

                </div>

                <?php

                        }

                    }

                ?>

            </div>



        </div>

    </section>



    <section class="office_sec">

        <picture>

            <?php $imgm = get_field('about_sec4_full_width_image_1'); ?>

            <?php $imgd = get_field('about_sec4_full_width_image_2'); ?>

            <!-- Mobile Image -->

            <source media="(max-width: 767px)" srcset="<?php echo $imgm['url']; ?>">

            <!-- Desktop Image -->

            <source media="(min-width: 767px)" srcset="<?php echo $imgd['url']; ?>">

            <!-- Fallback Image -->

            <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo $imgd['url']; ?>" alt="<?php echo $imgd['alt']; ?>" width="1282" height="648">

        </picture>

    </section>







<?php get_footer(); ?>









<script type="text/javascript">

        /* =================================================================

        COUNTERS

        ================================================================= */

        jQuery( document ).ready( function() {

            jQuery(function () {

                "use strict";

                var counterUp = window.counterUp["default"]; // import counterUp from "counterup2"

                var $counters = jQuery(".counter");

                /* Start counting, do this on DOM ready or with Waypoints. */

                $counters.each(function (ignore, counter) {

                    var waypoint = new Waypoint( {

                        element: jQuery(this),

                        handler: function() { 

                            counterUp(counter, {

                                duration: 2000,

                                delay: 16

                            }); 

                            this.destroy();

                        },

                        offset: 'bottom-in-view',

                    } );

                });

            });

         });

    </script>