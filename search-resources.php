<?php
/**
 * Template for displaying resource search results.
 *
 * Place this file as search-resources.php in your theme directory.
 */


get_header();
?>

	<main id="primary" class="site-main">
	    <section class="books_sec">
	        <div class="container">
	        	<?php
	        		$search_query      = get_search_query();
					$post_type         = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : 'resource';
					$resource_category = isset($_GET['resource_category']) ? sanitize_text_field($_GET['resource_category']) : '';

					$args = array(
						'post_type' => 'resource',
						'post_status' => 'publish',
						'posts_per_page' => 9,
						's' => $search_query,
						'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
					);


					if (!empty($resource_category)) {
						$args['tax_query'] = array(
							array(
								'taxonomy' => 'resource_category', 
								'field' => 'slug',
								'terms' => $resource_category
							)
						);
					}

					$resource_query = new WP_Query($args);

	        	?>
				<header class="page-header">
					<h1 class="page-title">
						<?php
							// if($search_query){
	                        //     echo '<h2 class="text-center">Search Results for Category: " '.$resource_category.' ",<br> and keywords: " '.$search_query.' "</h2>';
	                        //     } else {
	                        //     echo '<h2 class="text-center">Search Results for Category: "'.$resource_category.'"</h2>';
	                        // }
						
						
						printf( esc_html__( 'Search Results for: %s', 'proud-brand' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->
				
			    <div class="book_div w-100 float-start d-grid">
					<?php
						if ($resource_query->have_posts()) {
							while ($resource_query->have_posts()) :
								$resource_query->the_post();
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
	                    <h3><a href="<?php echo get_the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></a></h3>
	                    <p><?php echo get_the_excerpt(); ?></p>
	                    <a class="primary_btn" href="<?php echo get_the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>">Download <img width="13" height="16" src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" alt="down arrow"></a>
	                </div>
					<?php 
						endwhile;
						} else {
							echo '<span class="w-100 mt-5 text-center">Oops! there is no data related to this query.</span>';
						}

						wp_reset_postdata();
					wp_reset_query();
					?>
				</div>
			</div>
		</section>

	</main><!-- #main -->

<?php get_footer(); ?>
