<?php



/*



Template Name: Blog



*/



get_header();



?>









    <section class="blog_top_sec">

        <div class="container">

            <div class="blog_title w-100 float-start d-flex justify-content-between">

                <h1><?php echo get_field('blog_sec1_heading'); ?></h1>

                <p><?php echo get_field('blog_sec1_description'); ?></p>

            </div>



            <div class="blog_filter_div m-auto w-100">

                <form role="search" method="get" class="search-form w-100 d-flex justify-content-between" action="<?php echo esc_url(home_url('/')); ?>">

                    <div class="blog_search w-100">

                        <!-- <input type="text" placeholder="Search..." name="s"> -->

                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'your-text-domain'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                        <input type="hidden" name="posttype" value="post" />

                        <button type="submit" class="search_btn">

                            <img width="40" height="40" src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt="">

                        </button>

                    </div>

                    <!-- <div class="blog_filter w-100">

                        <select>

                            <option>All</option>

                            <option>One</option>

                            <option>Two</option>

                            <option>Three</option>

                        </select>

                    </div> -->

                    <div class="blog_filter blog_filter02 w-100">

                        <?php 
                            $taxonomy = 'category'; // Default WordPress post categories
                            $args = array(
                                'show_option_all' => 'Topics', // Default option
                                'taxonomy'        => $taxonomy,
                                'name'            => 'category_name', // Name for the select input (sent in the URL)
                                'orderby'         => 'name',
                                'selected'        => ( isset( $_GET['category_name'] ) ? $_GET['category_name'] : '' ),
                                'hide_empty'      => true, // Show categories even if they have no posts
                                'value_field'     => 'slug', // Use category slug in the URL
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



    <section class="skill_sec blog_sec">

        <div class="container">

           

            <div class="article_div w-100 d-grid" id="loadMoreContent">

            	<?php

            		$counter = 1;

                    $currentPagge = get_query_var('paged');

            		$args = array(

            			'post_type' => 'post',

            			'post_status' => 'publish',

            			'posts_per_page' => 6,

            			'order' => 'DESC',

                        'paged' => $currentPagge

            		);

            		$query = new WP_Query($args);

            		if ($query->have_posts()) {

            			while ($query->have_posts()) {

            				$query->the_post();

            				$delay = 200 + ($counter * 200);

            				

            	?>

                <div class="article smooth w-100 float-start" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">

                    <div class="article_pic w-100 float-start">

                        <a href="<?php the_permalink(); ?>">

                        	<?php

                        		if (has_post_thumbnail()) {

                        			the_post_thumbnail();

                        		} else {

                        	?>

                            <img aria-hidden="true" decoding="async" src="<?php echo get_template_directory_uri(); ?>/images/article_1.webp" alt="banner image" width="430" height="221">

                        	<?php } ?>

                        </a>

                    </div>

                    <div class="article_des w-100 float-start">

                        <span><?php echo get_the_date('j-n-Y'); ?></span>

                        <h2><a class="article_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                        <!-- <p><?php //the_excerpt(); ?></p> -->

                        <a class="read_article" href="<?php the_permalink(); ?>">Read Article</a>

                    </div>

                </div>

                <?php

                		$counter++;

                		}

                	}

                ?>

            </div>

            <?php

                $totalPage = $query->max_num_pages;

                if ($totalPage > 1) {

                    $currentPage = max(1, get_query_var('paged'));

                    //echo $currentPage;

            ?>

            <div class="load_more_prjcts w-100 float-start text-center mt-0" id="viewMoreDriveDiv">

                <a id="loadMore" href="javascript:void(0)" total_Pages="<?php echo $totalPage; ?>" current_Page="<?php echo $currentPage; ?>" next_Page="<?php echo $currentPage+1; ?>">

                    <div class="spinner-border" role="status" id="spinninggLoader">

                        <span class="visually-hidden">Loading...</span>

                    </div> Load More <span>+</span></a>

            </div>

            <?php } ?>

        </div>

    </section>











<?php get_footer(); ?>