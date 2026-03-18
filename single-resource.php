<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Proud_Brands
 */

get_header();
?>
    <main id="primary" class="site-main">
        <section class="resources_bnr_dtl">
            <div class="container">
                <div class="r_dtl_bnr_div w-100 float-start d-flex justify-content-between">
                    <div class="r_dtl_text w-100 float-start">
                        <span><?php echo get_field('resource_detail_banner_caption', 'options'); ?></span>
                        <h1><?php echo get_field('resource_detail_banner_heading', 'options'); ?></h1>
                        <?php echo get_field('resource_detail_banner_description', 'options'); ?>
                    </div>
                    <div class="r_dtl_form w-100 float-end">
                        <!-- <h2>Download the Research</h2>
                        <a href="#">click to next section</a> -->
                        <?php echo do_shortcode('[gravityform id="3" title="false" ajax="true"]'); ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="better_everyday text-center">
            <h2><?php echo get_field('resource_detail_create_heading', 'options'); ?></h2>
            <?php
                $link = get_field('resource_detail_create_button_link', 'options');
                if ($link) {
            ?>
            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?> <img src="<?php echo get_template_directory_uri(); ?>/images/right_black_arrow.png" alt="arrow"></a>
            <?php } ?>
        </section>

        <section class="books_sec books_dtl_sec">
            <div class="container">
                <h2>Related Resources</h2>
                <div class="book_div w-100 float-start d-grid">
                    <?php
                        $counter = 1;
                        $args = array(
                            'post_type' => 'resource',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                            'order' => 'DESC',
                            'post__not_in'   => array( get_the_ID() ),
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                
                    ?>
                    <div class="single_book w-100 float-start text-center">
                        <span class="w-100 float-start">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } else {
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/book.png" alt="">
                                <?php } ?>
                            </a>
                        </span>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                        <a class="primary_btn" href="<?php the_permalink(); ?>" >Download <img width="13" height="16" src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" alt="down arrow"></a>
                    </div>
                    <?php
                            }
                        }
                    ?>
                    
                </div>
              
            </div>
        </section>

    </main><!-- #main -->

<?php get_footer(); ?>