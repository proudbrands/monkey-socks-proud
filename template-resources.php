<?php

/*

Template Name: Resources

*/



get_header();

?>



	<section class="blog_top_sec">
        <div class="container">
            <div class="blog_title w-100 float-start d-flex justify-content-between">
                <h1><?php echo get_field('resources_sec1_heading'); ?></h1>
                <p><?php echo get_field('resources_sec1_description'); ?>.</p>
            </div>

            <div class="blog_filter_div resources_filter m-auto w-100 d-flex justify-content-between">
                <?php /*<form role="search" method="get" class="search-form w-100 d-flex justify-content-between" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="blog_search w-100">
                        <!-- <input type="text" placeholder="Search..." > -->
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'your-text-domain'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <input type="hidden" name="post_type" value="resource" />
                        <button type="submit" class="search_btn">
                            <img width="40" height="40" src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="">
                        </button>
                    </div>
                    <div class="blog_filter w-100">
                        <select>
                            <option>Topics</option>
                            <option>One</option>
                            <option>Two</option>
                            <option>Three</option>
                        </select>
                    </div>
                    <button type="submit" class="search_btn">
                        <img width="40" height="40" src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="">
                    </button>
                </form> */?>






                <form role="search" method="get" class="search-form w-100 d-flex justify-content-between" action="<?php echo esc_url( home_url('/') ); ?>">
                    <div class="blog_search w-100">
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'your-text-domain'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <input type="hidden" name="posttype" value="resource" />
                        <button type="submit" class="search_btn">
                            <img width="40" height="40" src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="">
                        </button>
                    </div>
                    <div class="blog_filter w-100">
                        <?php 
                            // Option 1: Uncomment if you want to use wp_dropdown_categories()
                            $taxonomy = 'resource_category';
                            $args = array(
                                'show_option_all' => 'Topics',
                                'taxonomy'        => $taxonomy,
                                'name'            => 'resource_category',
                                'orderby'         => 'name',
                                'selected'        => ( isset( $_GET['resource_category'] ) ? $_GET['resource_category'] : '' ),
                                'hide_empty'      => false,
                                'value_field'     => 'slug',
                            );
                            wp_dropdown_categories( $args );
                        ?>
                            
                    </div>
                    <button type="submit" class="search_btn">
                        <img width="40" height="40" src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="">
                    </button>
                </form>




            </div>

        </div>
    </section>

    <section class="books_sec">
        <div class="container">
            <div class="book_div w-100 float-start d-grid" id="loadmoreDivResource">
            	<?php
            		$currentPagge = get_query_var('paged');
            		$args = array(

            			'post_type' => 'resource',

            			'post_status' => 'publish',

            			'posts_per_page' => 6,

            			'order' => 'DESC',

                        'paged' => $currentPagge

            		);
            		$querry = new WP_Query($args);
            		if ($querry->have_posts()) {
            			while ($querry->have_posts()) {
            				$querry->the_post();
            	?>
                <div class="single_book w-100 float-start text-center">
                    <span class="w-100 float-start">
                        <a href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>">
                        	<?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } else {
                            ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/book.png" alt="">
                            <?php } ?>
                        </a>
                    </span>
                    <h3><a href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a class="primary_btn" href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>" >Download <img width="13" height="16" src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" alt="down arrow"></a>

                </div>
                <?php
                		}
                	}
                ?>
            </div>

            </div>

            <?php

                    $totalPage = $querry->max_num_pages;

                    if ($totalPage > 1) {

                        $currentPage = max(1, get_query_var('paged'));

                        //echo $currentPage;

                ?>

                <div class="load_more_prjcts w-100 float-start text-center mt-0" id="viewMoreDriveDivResource">

                    <a id="loadMoreResource" href="javascript:void(0)" total_Pages="<?php echo $totalPage; ?>" current_Page="<?php echo $currentPage; ?>" next_Page="<?php echo $currentPage+1; ?>">

                        <div class="spinner-border" role="status" id="spinninggLoaderResource">

                            <span class="visually-hidden">Loading...</span>

                        </div> Load More <span>+</span></a>

                </div>

                <?php } ?>

        </div>
    </section>




<?php get_footer(); ?>