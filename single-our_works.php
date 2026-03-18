<?php get_header();

$ourWorkPostData = get_queried_object();

//print_r($ourWorkPostData);


?>

    <?php
        if (have_rows('detail_page_our_works_case_study')) {
            while (have_rows('detail_page_our_works_case_study')) {
                the_row();

        if (get_row_layout() == 'banner_section') {

    ?>

    <section class="cs_sec position-relative">

        <div class="container">

            <div class="cs_bnr_div w-100 float-start d-flex justify-content-between align-items-center">

                <div class="cs_title w-100">

                    <h1>
                        <span><?php echo get_sub_field('casestudy_sec1_caption'); ?></span><?php echo get_sub_field('casestudy_sec1_heading_1'); ?> <strong class="typing-effect"><?php echo get_sub_field('casestudy_sec1_colorfull_heading'); ?></strong>
                        
                    </h1>

                </div>



                <div class="cs_pic w-100 text-end position-relative">

                    <div class="hexagon">

                        <?php

                            $img = get_sub_field('casestudy_sec1_image');

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

            <h2><?php echo get_sub_field('casestudy_sec1_heading_2'); ?></h2>

            <?php echo get_sub_field('casestudy_sec1_description'); ?>

        </div>

    </section>

    <?php } elseif (get_row_layout() == 'seo_works') { ?>

    <section class="seo_work_sec">

        <div class="container">

            <div class="seo_title w-100 float-start" data-aos="fade-up">

                <h2><?php echo get_sub_field('casestudy_sec2_title'); ?></h2>

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

                    <span><?php echo get_sub_field('casestudy_sec2_title_2'); ?></span>

                    <h3><span><?php echo get_sub_field('casestudy_sec2_percentage'); ?></span> <?php echo get_sub_field('casestudy_sec2_text'); ?></h3>
                </div>

                <div class="seo_work_right w-100" data-aos="fade-up">

                    <h3><?php echo get_sub_field('casestudy_sec2_heading'); ?></h3>

                    <?php echo get_sub_field('casestudy_sec2_description'); ?>
                </div>

            </div>

        </div>

    </section>

    <?php } elseif (get_row_layout() == 'full_width_image__points') { ?>

    <section class="monitor_sec text-center" data-aos="fade-up">

        <?php

            $img = get_sub_field('casestudy_sec3_full_width_image');

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

    <?php } elseif (get_row_layout() == 'the_problems') { ?>

    <section class="problems_sec">

        <div class="container">

            <h2 data-aos="fade-up"><?php echo get_sub_field('casestudy_sec4_title'); ?></h2>

            <div class="problems_div w-100 float-start" data-aos="fade-up">
                <?php echo get_sub_field('description'); ?>
            </div>

        </div>

    </section>

    <?php } elseif (get_row_layout() == 'result_roi_section') { ?>

    <section class="help_busines_sec p-0">

        <div class="container">

            <h2><?php echo get_sub_field('roi_title'); ?></h2>
            <p><?php echo get_sub_field('roi_description'); ?></p>

            <div class="help_businesGrid left_cntnt w-100">

                <?php while(have_rows('roi_box_list')) : the_row(); ?>
                    <div class="help_businesBox d-flex flex-column">
                        <h3><?php echo get_sub_field('roi_box_title'); ?></h3>
                        <?php echo get_sub_field('roi_box_description'); ?>
                    </div>
                <?php endwhile; ?>       
                
            </div>

            <div class="get_free_chat get_free_chat02 float-start w-100 text-center">
                <?php echo get_sub_field('description_after_boxes'); ?>
            </div>

        </div>

    </section>

    <?php } elseif (get_row_layout() == 'solution_section_with_graph') { ?>

    <section class="solution_sec">

        <div class="container">

            <div class="solution_div w-100 float-start d-flex justify-content-between align-items-end">

                <div class="solution_text w-100 float-start">

                    <h2><?php echo get_sub_field('casestudy_sec5_title'); ?></h2>

                    <?php echo get_sub_field('casestudy_sec5_description'); ?>

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

                    <h4><?php echo get_sub_field('casestudy_sec5_graph_caption'); ?></h4>

                    <small>Results</small>

                </div>

            </div>

        </div>

    </section>

    <?php } elseif (get_row_layout() == 'comment_section') { ?>

    <section class="testi_sec">

        <div class="container">

            <div class="testi_div w-100 float-start text-center" data-aos="fade-up">

                <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo get_template_directory_uri() ?>/images/quote.webp" alt="kitchen cabinets" width="140" height="70">

                <p><?php echo get_sub_field('casestudy_sec6_comment'); ?></p>

                <h3><?php echo get_sub_field('casestudy_sec6_name'); ?><span>~<?php echo get_sub_field('casestudy_sec6_designation'); ?></span></h3>

            </div>

        </div>

    </section>

    <?php
                }
            }
        }

        wp_reset_postdata();
        wp_reset_query();

    ?>



    <section class="ftr_project_sec">

        <div class="ftr_project_slider">

            <div class="swiper-wrapper">



                <!-- slides -->

                <?php
                    wp_reset_postdata();
                    wp_reset_query();

                    $args_section2 = array(

                        'post_type'      => 'our_works',

                        'post_status' => 'publish',

                        'posts_per_page' => -1,

                        'order'          => 'DESC',

                        'post__not_in'   => array($ourWorkPostData->ID), // Exclude posts already shown

                    );

                    $query_section2 = new WP_Query( $args_section2 );



                    if ( $query_section2->have_posts() ) {

                        while ( $query_section2->have_posts() ) { $query_section2->the_post();


                ?>
                <div class="swiper-slide">

                    <div class="ftr_project_pic">

                        <?php

                            if (has_post_thumbnail()) {

                                the_post_thumbnail();

                            } else {

                        ?>

                        <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/images/mar_2.webp" alt="" width="647" height="433">

                        <?php } ?>
                      

                      <a href="<?php the_permalink(); ?>">

                          <span>

                              <img class="smooth" width="21" height="21" src="<?php echo get_template_directory_uri() ?>/images/learn_more.png" alt="arror">

                          </span>

                          <small><?php the_title(); ?></small>

                      </a>

                    </div>

                </div>

                <?php

                        }

                    }
                    wp_reset_postdata();
                    wp_reset_query();

                ?>

            </div>

        </div>

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
                const typingSpeed = 10;  // Speed of typing in milliseconds

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
      window.addEventListener('load', function() {
        // Sab .test_Box elements ko select karo
        const boxes = document.querySelectorAll('.help_businesBox');
        
        // Maximum height ko track karne ke liye ek variable
        let maxHeight = 0;
        
        // Pehle sab boxes ki height calculate karo aur maximum height find karo
        boxes.forEach(box => {
          const boxHeight = box.offsetHeight; // box ka actual height
          if (boxHeight > maxHeight) {
            maxHeight = boxHeight; // Maximum height ko update karo
          }
        });
        
        // Ab saare boxes ko maxHeight set kar do
        boxes.forEach(box => {
          box.style.height = maxHeight + 'px'; // Sab boxes ko maximum height de do
        });
      });
    </script>
    
