<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Proud_Brands
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="color_bg w-100 float-start">
        
	        <section class="our_work_top_sec">
	            <div class="container">
	                <div class="our_work_des w-100 float-start d-flex justify-content-between">
	                    <h1><?php echo get_field('our_work_sec1_heading', 'options'); ?></h1>
	                    <p><?php echo get_field('our_work_sec1_description', 'options'); ?></p>
	                </div>
	                <div class="filters_div w-100 float-start">
	                   <!--  <ul class="float-end">
	                        <li class="active"><a href="#">All</a></li>
	                        <li><a href="#">Strategy</a></li>
	                        <li><a href="#">Branding</a></li>
	                        <li><a href="#">Communication</a></li>
	                        <li><a href="#">Digital Marketing</a></li>
	                        <li><a href="#">Web</a></li>
	                        <li><a href="#">Mobile</a></li>
	                    </ul> -->
	                    <?php
	                        // Get the currently selected term (if any)
	                        $selected_term = isset( $_GET['term'] ) ? sanitize_text_field( $_GET['term'] ) : '';
	                    ?>
	                    <ul class="float-end filter-categories">
	                        <li class="<?php echo empty( $selected_term ) ? 'active' : ''; ?>">
	                            <a href="<?php echo esc_url( get_post_type_archive_link( 'our_work' ) ); ?>">All</a>
	                        </li>
	                        <?php
	                        // Retrieve all work_category terms (adjust taxonomy slug if needed)
	                        $terms = get_terms( array(
	                            'taxonomy'   => 'our_works_category',
	                            'hide_empty' => false,
	                        ) );
	                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	                            foreach ( $terms as $term ) {
	                                // Mark the current category as active
	                                $active_class = ( $selected_term == $term->slug ) ? 'active' : '';
	                                echo '<li class="' . esc_attr( $active_class ) . '"><a href="' . esc_url( add_query_arg( 'term', $term->slug, get_post_type_archive_link( 'our_work' ) ) ) . '">' . esc_html( $term->name ) . '</a></li>';
	                            }
	                        }

	                            wp_reset_query();
	                            wp_reset_postdata();
	                        ?>
	                    </ul>
	                </div>
	            </div>
	        </section>


	        <?php
	            $displayed_posts = array();
	            // Build query arguments for our custom post type 'our_work'
	            $args = array(
	                'post_type'      => 'our_work',
	                'post_status'    => 'publish',
	                'posts_per_page' => 2, // or set a number if you want pagination
	                'order'          => 'DESC',
	            );

	            // If a category is selected, add a tax_query to filter by that term.
	            if ( ! empty( $selected_term ) ) {
	                $args['tax_query'] = array(
	                    array(
	                        'taxonomy' => 'our_works_category',
	                        'field'    => 'slug',
	                        'terms'    => $selected_term,
	                    ),
	                );
	            }

	            $query = new WP_Query( $args );
	        ?>

	        <section class="case_study_sec our_work_sec">
	            <div class="container">
	                <div class="case_study_grid w-100 d-grid">
	                    <div class="case_study_col w-100 float-start">
	                        <?php if ( $query->have_posts() ) : ?>
	                        <?php while ( $query->have_posts() ) : $query->the_post();
	                            $displayed_posts[] = get_the_ID();
	                        ?>
	                        <div class="case_study_box w-100 float-start">
	                            <div class="cs_img w-100 float-start position-relative">
	                                <?php
	                                    if ( has_post_thumbnail() ) {
	                                        the_post_thumbnail();
	                                } else { ?>
	                                    <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/images/cs_4.webp" alt="image" width="647" height="604">
	                                <?php } ?>
	                                <a href="<?php the_permalink(); ?>">
	                                    <span class="view-more">
	                                        <b>
	                                            <img width="21" height="21" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/learn_more.png" alt="arrow">
	                                        </b>
	                                    </span>
	                                </a>
	                            </div>
	                            <div class="cs_dtl w-100 float-start" data-aos="fade-up">
	                                <h3><?php the_title(); ?></h3>
	                                <ul class="w-100 float-start">
	                                    <?php
	                                    // Get and output the case study categories
	                                    $post_terms = get_the_terms( get_the_ID(), 'our_works_category' );
	                                    if ( $post_terms && ! is_wp_error( $post_terms ) ) {
	                                        foreach ( $post_terms as $term ) {
	                                            echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
	                                        }
	                                    }
	                                    ?>
	                                </ul>
	                            </div>
	                        </div>
	                        <?php endwhile; ?>
	                        <?php else : ?>
	                            <p>No case studies found.</p>
	                        <?php endif; ?>
	                    </div>
	                    <div class="case_study_col w-100 float-start">
	                        <?php
	                            $args_section2 = array(
	                                'post_type'      => 'our_work',
	                                'post_status'    => 'publish',
	                                'posts_per_page' => 2,
	                                'order'          => 'DESC',
	                                'post__not_in'   => $displayed_posts, // Exclude posts already shown
	                            );
	                            $query_section2 = new WP_Query( $args_section2 );

	                            if ( $query_section2->have_posts() ) :
	                                while ( $query_section2->have_posts() ) : $query_section2->the_post();

	                                    $displayed_posts[] = get_the_ID();
	                        ?>

	                        <div class="case_study_box w-100 float-start">
	                            <div class="cs_img w-100 float-start position-relative">
	                                <?php
	                                    if ( has_post_thumbnail() ) {
	                                        the_post_thumbnail( 'full', array(
	                                            'loading'  => 'lazy',
	                                            'decoding' => 'async',
	                                        ) );
	                                    } else { ?>
	                                    <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/images/cs_4.webp" alt="image" width="647" height="604">
	                                <?php } ?>
	                                <a href="<?php the_permalink(); ?>">
	                                    <span class="view-more">
	                                        <b>
	                                            <img width="21" height="21" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/learn_more.png" alt="arrow">
	                                        </b>
	                                    </span>
	                                </a>
	                            </div>
	                            <div class="cs_dtl w-100 float-start" data-aos="fade-up">
	                                <h3><?php the_title(); ?></h3>
	                                <ul class="w-100 float-start">
	                                    <?php
	                                    // Get and output the case study categories
	                                    $post_terms = get_the_terms( get_the_ID(), 'our_works_category' );
	                                    if ( $post_terms && ! is_wp_error( $post_terms ) ) {
	                                        foreach ( $post_terms as $term ) {
	                                            echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
	                                        }
	                                    }
	                                    ?>
	                                </ul>
	                            </div>
	                        </div>
	                        <?php endwhile; ?>
	                        <?php else : ?>
	                            <p>No case studies found.</p>
	                        <?php endif; ?>
	                    </div>
	                </div>

	                <div class="case_study_box case_study_box_full w-100 float-start">
	                    <?php
	                        $args_section2 = array(
	                            'post_type'      => 'our_work',
	                            'post_status'    => 'publish',
	                            'posts_per_page' => 1,
	                            'order'          => 'DESC',
	                            'post__not_in'   => $displayed_posts, // Exclude posts already shown
	                        );
	                        $query_section2 = new WP_Query( $args_section2 );

	                        if ( $query_section2->have_posts() ) :
	                            while ( $query_section2->have_posts() ) : $query_section2->the_post();

	                                $displayed_posts[] = get_the_ID();
	                    ?>
	                    <div class="cs_img w-100 float-start position-relative">
	                        <?php
	                            if ( has_post_thumbnail() ) {
	                                the_post_thumbnail( 'full', array(
	                                    'loading'  => 'lazy',
	                                    'decoding' => 'async',
	                                ) );
	                            } else { ?>
	                            <picture>
	                                <!-- Mobile Image -->
	                                <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/cs_full_pic.webp">
	                                <!-- Desktop Image -->
	                                <source media="(min-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/cs_full_pic.webp">
	                                <!-- Fallback Image -->
	                                <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/images/cs_full_pic.webp" alt="banner image" width="1440" height="648">
	                            </picture>
	                        <?php } ?>
	                        <a href="<?php the_permalink(); ?>">
	                            <span class="view-more"><b><img width="21" height="21" src="<?php echo get_template_directory_uri(); ?>/images/learn_more.png" alt="arror"></b></span>
	                        </a>
	                    </div>
	                    <div class="cs_dtl w-100 float-start" data-aos="fade-up">
	                        <h3><?php the_title(); ?></h3>
	                        <ul class="w-100 float-start">
	                            <?php
	                                // Get and output the case study categories
	                                $post_terms = get_the_terms( get_the_ID(), 'our_works_category' );
	                                if ( $post_terms && ! is_wp_error( $post_terms ) ) {
	                                    foreach ( $post_terms as $term ) {
	                                        echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
	                                    }
	                                }
	                            ?>
	                        </ul>
	                    </div>
	                    <?php endwhile; ?>
	                    <?php else : ?>
	                        <p>No case studies found.</p>
	                    <?php endif; ?>
	                </div>

	                <div class="case_study_col Btm_two_prjcts w-100 float-start d-grid" id="loadMoreContentWork">
	                    <?php
	                        $args_section2 = array(
	                            'post_type'      => 'our_work',
	                            'post_status'    => 'publish',
	                            'posts_per_page' => 2,
	                            'order'          => 'DESC',
	                            'post__not_in'   => $displayed_posts, // Exclude posts already shown
	                        );
	                        $query_section2 = new WP_Query( $args_section2 );

	                        if ( $query_section2->have_posts() ) :
	                            while ( $query_section2->have_posts() ) : $query_section2->the_post();
	                                $displayed_posts[] = get_the_ID();
	                    ?>
	                    <div class="case_study_box w-100 float-start">
	                        <div class="cs_img w-100 float-start position-relative">
	                            <?php
	                                if ( has_post_thumbnail() ) {
	                                    the_post_thumbnail( 'full', array(
	                                        'loading'  => 'lazy',
	                                        'decoding' => 'async',
	                                    ) );
	                                } else { ?>
	                                <img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/images/cs_1.webp" alt="image" width="647" height="604">
	                            <?php } ?>
	                            <a href="<?php the_permalink(); ?>">
	                                <span class="view-more"><b><img width="21" height="21" src="<?php echo get_template_directory_uri(); ?>/images/learn_more.png" alt="arror"></b></span>
	                            </a>
	                        </div>
	                        <div class="cs_dtl w-100 float-start" data-aos="fade-up">
	                            <h3><?php the_title(); ?></h3>
	                            <ul class="w-100 float-start">
	                                <?php
	                                    // Get and output the case study categories
	                                    $post_terms = get_the_terms( get_the_ID(), 'our_works_category' );
	                                    if ( $post_terms && ! is_wp_error( $post_terms ) ) {
	                                        foreach ( $post_terms as $term ) {
	                                            echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
	                                        }
	                                    }
	                                ?>
	                            </ul>
	                        </div>
	                    </div>
	                    <?php endwhile; ?>
	                    <?php else : ?>
	                        <p>No case studies found.</p>
	                    <?php endif; ?>
	                </div>
	                <?php
	                    $totalPage = $query->max_num_pages;
	                    if ($totalPage > 1) {
	                        $currentPage = max(1, get_query_var('paged'));
	                        //echo $currentPage;
	                ?>
	                <div class="load_more_prjcts w-100 float-start text-center" id="viewMoreDriveDivWork">
	                    <a id="loadMoreWork" href="javascript:void(0)" total_Pages="<?php echo $totalPage; ?>" current_Page="<?php echo $currentPage; ?>" next_Page="<?php echo $currentPage+1; ?>">
	                        <div class="spinner-border" role="status" id="spinninggLoaderWork">
	                            <span class="visually-hidden">Loading...</span>
	                        </div> Load More <span>+</span></a>
	                </div>
	                <?php } ?>
	            </div>
	        </section>
	    </div>

	</main><!-- #main -->

<?php get_footer(); ?>



<script type="text/javascript">
    const containers = document.querySelectorAll('.cs_img');
        containers.forEach((container) => {
            const viewMore = container.querySelector('.view-more');

            // Mouse move event listener for each container
            container.addEventListener('mousemove', (e) => {
                const containerRect = container.getBoundingClientRect();
                
                // Get mouse position relative to container
                const mouseX = e.clientX - containerRect.left;
                const mouseY = e.clientY - containerRect.top;

                // Move "View More" text with mouse
                viewMore.style.left = mouseX + 'px';
                viewMore.style.top = mouseY + 'px';
            });
        });

</script>
