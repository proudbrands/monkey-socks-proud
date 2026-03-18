<?php

/*



Template Name: Case Study



*/



get_header();

?>





    <section class="cs_sec position-relative">

        <div class="container">

            <div class="cs_bnr_div w-100 float-start d-flex justify-content-between align-items-center">

                <div class="cs_title w-100">

                    <h1><?php echo get_field('casestudy_sec1_heading_1'); ?></h1>

                </div>



                <div class="cs_pic w-100 text-end position-relative">

                    <div class="hexagon">

                        <?php

                            $img = get_field('casestudy_sec1_image');

                            if ($img) {

                        ?>

                        <img aria-hidden="true" decoding="async" src="<?php echo $img['url'] ?>" alt="banner Icon" width="300" height="76">

                        <?php } ?>

                    </div>

                    <div class="hexagon hexagon2 position-absolute"></div>

                    <div class="hexagon hexagon3 position-absolute"></div>

                </div>



            </div>

        </div>      

    </section>



    <section class="bnr_btm_des_sec cs_bnr_btm_des_sec">

        <div class="bnr_btm_des w-100 m-auto text-center" data-aos="fade-up">

            <h2><?php echo get_field('casestudy_sec1_heading_2'); ?></h2>

            <p><?php echo get_field('casestudy_sec1_description'); ?></p>

        </div>

    </section>



    <section class="seo_work_sec">

        <div class="container">

            <div class="seo_title w-100 float-start" data-aos="fade-up">

                <h2><?php echo get_field('casestudy_sec2_title'); ?></h2>

            </div>

            <div class="seo_work_div w-100 d-grid">

                <div class="seo_work_left w-100">

                    <span>What we did</span>

                    <ul class="w-100 float-start">

                        <?php

                            if (have_rows('casestudy_sec2_our_expertise')) {

                                while (have_rows('casestudy_sec2_our_expertise')) {

                                    the_row();

                                $text = get_sub_field('heading');

                                $text = strtolower($text);

                                $text = str_replace(' ', '-', $text);



                        ?>

                        <li class="<?php echo $text; ?>"><?php echo get_sub_field('heading'); ?></li>

                        <?php

                                }

                            }

                        ?>

                        <!-- <li class="branding">Branding</li>

                        <li class="web-development">Web Development</li> -->

                    </ul>

                    <span><?php echo get_field('casestudy_sec2_title_2'); ?></span>

                    <h3><span><?php echo get_field('casestudy_sec2_percentage'); ?>%</span> <?php echo get_field('casestudy_sec2_text'); ?></h3>

                </div>

                <div class="seo_work_right w-100" data-aos="fade-up">

                    <h3><?php echo get_field('casestudy_sec2_heading'); ?></h3>

                    <?php echo get_field('casestudy_sec2_description'); ?>

                </div>

            </div>

        </div>

    </section>



    <section class="monitor_sec text-center" data-aos="fade-up">

        <?php

            $img = get_field('casestudy_sec3_full_width_image');

            if ($img) {

        ?>

        <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>" width="1060" height="643">

        <?php } ?>

        

    </section>



    <section class="boxes_sec text-center">

        <div class="container">

            <div class="file_boxes w-100 d-grid">

                <?php

                    $delay = 300;

                    if (have_rows('casestudy_sec3_points')) {

                        while (have_rows('casestudy_sec3_points')) {

                            the_row();

                            $delayValue = 100 + $delay;

                ?>

                <div class="file_box smooth w-100 float-start" data-aos="fade-up" data-aos-delay="<?php echo $delayValue; ?>">

                    <h2 class="counter"><?php echo get_sub_field('value'); ?></h2>

                    <p><?php echo get_sub_field('title'); ?></p>

                </div>

                <?php

                        $delay+300;

                        }

                    }

                ?>

                <!-- <div class="file_box smooth w-100 float-start" data-aos="fade-up" data-aos-delay="700">

                    <h2 class="counter">3</h2>

                    <p>Design Files</p>

                </div>

                <div class="file_box smooth w-100 float-start" data-aos="fade-up" data-aos-delay="1000">

                    <h2>1</h2>

                    <p>Custom CMS</p>

                </div> -->

            </div>

        </div>

    </section>



    <section class="problems_sec">

        <div class="container">

            <h2 data-aos="fade-up"><?php echo get_field('casestudy_sec4_title'); ?></h2>

            <div class="problems_div w-100 d-grid" data-aos="fade-up">

                <?php

                    if (have_rows('casestudy_sec4_paragraph')) {

                        while (have_rows('casestudy_sec4_paragraph')) {

                            the_row();

                ?>

                <p><?php echo get_sub_field('description'); ?></p>

                <?php

                        }

                    }

                ?>

            </div>

        </div>

    </section>



    <section class="solution_sec">

        <div class="container">

            <div class="solution_div w-100 float-start d-flex justify-content-between align-items-end">

                <div class="solution_text w-100 float-start">

                    <h2><?php echo get_field('casestudy_sec5_title'); ?></h2>

                    <?php echo get_field('casestudy_sec5_description'); ?>

                </div>

                <div class="solution_graph w-100 float-end text-center position-relative">

                    <ul class="w-100 float-start d-flex flex-wrap justify-content-between align-items-end">

                        <?php

                            if (have_rows('casestudy_sec5_graph_lines')) {

                                while (have_rows('casestudy_sec5_graph_lines')) {

                                    the_row();

                        ?>

                        <li><span style="background: <?php echo get_sub_field('line_color'); ?>;">&nbsp;</span></li>

                        <?php

                                }

                            }

                        ?>

                    </ul>

                    <h4><?php echo get_field('casestudy_sec5_graph_caption'); ?></h4>

                    <small><?php echo get_field('casestudy_sec5_graph_text'); ?></small>

                </div>

            </div>

        </div>

    </section>



    <section class="testi_sec">

        <div class="container">

            <div class="testi_div w-100 float-start text-center" data-aos="fade-up">

                <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo get_template_directory_uri() ?>/images/quote.webp" alt="kitchen cabinets" width="140" height="70">

                <p><?php echo get_field('casestudy_sec6_comment'); ?></p>

                <h3><?php echo get_field('casestudy_sec6_name'); ?><span>~<?php echo get_field('casestudy_sec6_designation'); ?></span></h3>

            </div>

        </div>

    </section>

    



    <section class="ftr_project_sec">

        <div class="ftr_project_slider">

            <div class="swiper-wrapper">



                <!-- slides -->

                <?php

                    if (have_rows('casestudy_sec6_our_projects')) {

                        while (have_rows('casestudy_sec6_our_projects')) {

                            the_row();

                            $img = get_sub_field('image');

                            $link = get_sub_field('link');

                ?>

                <div class="swiper-slide">

                    <div class="ftr_project_pic">

                      <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>" width="647" height="433">

                      <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>">

                          <span>

                              <img class="smooth" width="21" height="21" src="<?php echo get_template_directory_uri() ?>/images/learn_more.png" alt="arror">

                          </span>

                          <small><?php echo get_sub_field('title'); ?></small>

                      </a>

                    </div>

                </div>

                <?php

                        }

                    }

                ?>

            </div>

        </div>

    </section>





<?php get_footer(); ?>

<script type="text/javascript">
        const inViewport = (elem) => {
            const allElements = document.querySelectorAll(elem); // Use querySelectorAll for better targeting
            const windowHeight = window.innerHeight; // Get window height once
            const checkVisibility = () => {
                allElements.forEach((el) => {
                    const viewportOffset = el.getBoundingClientRect(); // Get position relative to viewport
                    const top = viewportOffset.top; // Get top offset of element

                    // Check if element is in the viewport
                    if (top < windowHeight && top > 0) {
                        el.classList.add('in-viewport'); // Add class when in viewport
                    } else {
                        //el.classList.remove('in-viewport'); // Remove class when out of viewport
                    }
                });
            };

            // Initial check on page load
            checkVisibility();

            // Event listener for scroll to check visibility during scrolling
            window.addEventListener('scroll', checkVisibility);
        };

        // Run the function on elements with the class '.solution_sec'
        window.addEventListener('load', () => {
            inViewport('.solution_sec'); // Apply the function when the page is fully loaded
        });
</script>