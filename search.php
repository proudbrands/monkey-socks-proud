<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Proud_Brands
 */

get_header();
?>

	<?php
		$resourceSearch = $_GET['posttype'];
		if ($resourceSearch == 'post') {
			//echo 'Searching from: '.$resourceSearch
	?>
	<main id="primary" class="site-main">
		<section class="skill_sec blog_sec">
			<div class="container">
				<?php
	        		$search_query      = get_search_query();
					$post_type         = isset($_GET['posttype']) ? sanitize_text_field($_GET['posttype']) : 'post';
					$resource_category = isset($_GET['category_name']) ? sanitize_text_field($_GET['category_name']) : '';

					$getCateogoryIs = str_replace('-', ' ', $resource_category);

					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 9,
						's' => $search_query,
						'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
					);


					if (!empty($resource_category)) {
						$args['tax_query'] = array(
							array(
								'taxonomy' => 'category', 
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
						
						
							//printf( esc_html__( 'Search Results for: %s', 'proud-brand' ), '<span>' . get_search_query() . '</span>' );
							if($resource_category){
	                            echo 'Search Results for Category: " '.$getCateogoryIs.' ",<br> and keywords: " '.$search_query.' "';
	                            } else {
	                            echo 'Search Results for keywords: "'.$search_query.'"';
	                        }
						?>
					</h1>
				</header><!-- .page-header -->
				
			    <div class="article_div w-100 d-grid">
					<?php
						if ($resource_query->have_posts()) {
							while ($resource_query->have_posts()) :
								$resource_query->the_post();
					?>	
		            <div class="article smooth w-100 float-start" data-aos="fade-up" data-aos-delay="400">
	                    <div class="article_pic w-100 float-start">
	                        <a href="<?php the_permalink(); ?>">
	                            <img aria-hidden="true" decoding="async" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="banner image" width="430" height="221">
	                        </a>
	                    </div>
	                    <div class="article_des w-100 float-start">
	                        <span>12-2-2024</span>
	                        <h2><a class="article_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	                        <p><?php the_excerpt(); ?></p>
	                        <a class="read_article" href="<?php the_permalink(); ?>">Read Article</a>
	                    </div>
	                </div>
					<?php 
						endwhile;
						} else {
							echo '<span class="no_data">Oops! there is no data related to this query.</span>';
						}

						wp_reset_postdata();
						wp_reset_query();
					?>
				</div>
			</div>
		</section>

	</main>

	<?php
		} if ($resourceSearch == 'resource') {
			//echo 'Searching from: '.$resourceSearch
	?>

	<main id="primary" class="site-main">
	    <section class="books_sec">
	        <div class="container">
	        	<?php
	        		$search_query      = get_search_query();
					$post_type         = isset($_GET['posttype']) ? sanitize_text_field($_GET['posttype']) : 'resource';
					$resource_category = isset($_GET['resource_category']) ? sanitize_text_field($_GET['resource_category']) : '';

					$getCateogoryIs = str_replace('-', ' ', $resource_category);

					print_r($terms);

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
						
						
							//printf( esc_html__( 'Search Results for: %s', 'proud-brand' ), '<span>' . get_search_query() . '</span>' );

							if($resource_category){
	                            echo 'Search Results for Category: " '.$getCateogoryIs.' ",<br> and keywords: " '.$search_query.' "';
	                            } else {
	                            echo 'Search Results for keywords: "'.$search_query.'"';
	                        }
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
							echo '<span class="no_data">Oops! there is no data related to this query.</span>';
						}

						wp_reset_postdata();
						wp_reset_query();
					?>
				</div>
			</div>
		</section>

	</main>
	<?php } ?>


<?php get_footer(); ?>
