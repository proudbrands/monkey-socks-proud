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

<div class="page_bar"></div>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<section class="blog_dtl_top_sec">
		        <div class="container">
		            <div class="blog_dtl_top_div w-100 float-start d-flex justify-content-between">
		                <div class="blog_dtl_title">
		                    <span><?php echo get_the_date('F j, Y'); ?></span>

		                    <h1><?php echo get_the_title(); ?></h1>
		                    <p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>

		                    <?php
								// 1. Author Email
								$author_id = get_post_field('post_author', get_the_ID());
								$author_data = get_userdata($author_id);
								//print_r($author_data);
								// echo $author_data->description;
								// $author_email = get_the_author_meta('user_email');
								// echo $author_email;
								// $author_name = get_the_author_meta('display_name');
								// echo $author_name;
								$author_description = get_the_author_meta('description', $author_id);

								// 2. Publish Date
								$publish_date = get_the_date('F j, Y');

								// 3. Reading Time (basic method based on word count)
								$content = get_post_field('post_content', get_the_ID());
								$word_count = str_word_count(strip_tags($content));
								$reading_time = ceil($word_count / 200); // assuming 200 words/min
								?>

								<h2 class="post-meta">
								   By: <?php echo esc_html($author_data->display_name); ?><strong> | </strong>Reading Time: <?php echo esc_html($reading_time); ?> minute<?php echo $reading_time > 1 ? 's' : ''; ?>
								</h2>

		                    <!-- <h1></?php echo get_the_title(); ?>Lorem Ipsum has been the <br>text ever since <strong>the 1500s, when an</strong></h1> -->
		                </div>
		                <div class="blog_dtl_pic">
		                	<?php 
		                		if (has_post_thumbnail()) {
		                			the_post_thumbnail();
		                		} else {
		                	?>
		                    <img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/blog_dtl_pic.webp" alt="blog pic" width="786" height="495">
		                   	<?php } ?>
		                </div>
		            </div>
		            
		        </div>
		    </section>

		    <section class="blog_dtl_text_sec">
		        <div class="container">
		            <div class="blog_dtl_text w-100 float-start">
		                <?php the_content(); ?>
		                <?php
						    // Get the ID of the page assigned as the posts (blog) page
						    $blog_page_id = get_option('page_for_posts');

						    // Check if a blog page is set, otherwise fall back to the home URL
						    $blog_page_url = $blog_page_id ? get_permalink($blog_page_id) : home_url();
						?>
						<!-- <a class="back" href="<?php //echo esc_url($blog_page_url); ?>">Back</a> -->
		                <!-- <a class="back" href="blog.html">Back</a> -->


		                <div class="cws_author_main w-100 float-start">
			            	<h2>About Author</h2>
				            <div class="cws_author_div w-100 d-grid">
				            	<span>
				            		<?php
										$profile_image = get_field('profile_picture', 'user_' . $author_id);

										if ($profile_image) {
										    echo '<img src="' . esc_url($profile_image['url']) . '" alt="' . esc_attr($profile_image['alt']) . '" />';
										} else {
										    echo '<img src="' . get_template_directory_uri() . '/images/Portrait_Placeholder.png" alt="Default Profile" />';
										}
									?>
				            		<!-- </?php echo get_avatar($author_id, 96); ?> -->
				            	</span>
				            	<div class="cws_author_des">
				            		<h3><?php echo esc_html($author_data->display_name); ?></h3>
				            		<p><?php echo $author_data->description;; ?></p>
				            	</div>
				            </div>
			            </div>

		            </div>

		            <div class="next_prev_btn w-100 float-start d-grid">
		                <?php
		            		$prev_post = get_previous_post();
		            		if ($prev_post) {
		            		$prev_thumb = get_the_post_thumbnail($prev_post->ID, 'thumbnail');
		            		$prev_post_link = get_permalink($prev_post->ID);
		            	?>
		            	<a class="prev_post post_link w-100" href="<?php echo $prev_post_link; ?>">
    	                    <span>
    	                        <?php
    	                        	if($prev_thumb){
    	                        		echo $prev_thumb;
    	                        	} else {
    	                        ?>
    	                        <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.png" alt="" />
    	                    	<?php } ?>
    	                    	<?php echo wp_trim_words($prev_post->post_title, 3); ?>
    	                    </span>
    	                    <small>Previous</small>
    	                </a>
    	            	<?php } ?>

    	                <?php
    	                	$next_post = get_next_post();
    	                	if ($next_post) {
    	                	$next_thumb = get_the_post_thumbnail($next_post->ID, 'thumbnail');
    	                	$next_post_link = get_permalink($next_post->ID);
    	                ?>
    	                <a class="next_post post_link w-100" href="<?php echo $next_post_link; ?>">
    	                    <small>Next</small>
    	                    <span>
    	                        <?php echo wp_trim_words($next_post->post_title, 3); ?>
    	                        <?php
    	                        	if($next_thumb){
    	                        		echo $next_thumb;
    	                        	} else {
    	                        ?>
    	                        <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.png" alt="" />
    	                    	<?php } ?>
    	                    </span>
    	                </a>
    	            	<?php } ?>
		                
		            </div>


		            <?php
		            	$fblink = get_field('post_facebook_link', get_the_ID());
		            	$twitlink = get_field('post_twitter_link', get_the_ID());
		            	$linkdlink = get_field('post_linkedin_link', get_the_ID());
		            	if ($fblink || $twitlink || $linkdlink) {
		            ?>
		            <div class="share_social w-100 float-start text-center">
		                <h3>SHARE THIS</h3>
		                <ul>
		                	<?php if ($fblink) { ?>
		                    <li><a title="Facebook" href="<?php echo $fblink; ?>" target="_blank"><img width="45" height="45" src="<?php echo get_template_directory_uri(); ?>/images/fb.svg" alt="facebook"></a></li>
		                	<?php } if ($twitlink) { ?>
		                    <li><a title="Twitter" href="<?php echo $twitlink; ?>" target="_blank"><img width="45" height="45" src="<?php echo get_template_directory_uri(); ?>/images/twitter.svg" alt="twitter"></a></li>
		                    <?php } if ($linkdlink) { ?>
		                    <li><a title="Linkedin" href="<?php echo $linkdlink; ?>" target="_blank"><img width="45" height="45" src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt="linkedin"></a></li>
		                	<?php } ?>
		                </ul>
		            </div>

		        	<?php } ?>
		        </div>
		    </section>

    	<?php endwhile; // End of the loop. ?>


		<section class="skill_sec blog_dtl_sec">
	        <div class="container">
	           <h3>You might also like</h3>
	            <div class="article_div w-100 d-grid mb-0">
	            	<?php
	            		$counter = 1;
	            		$args = array(
	            			'post_type' => 'post',
	            			'post_status' => 'publish',
	            			'posts_per_page' => 3,
	            			'order' => 'DESC',
	            			'post__not_in'   => array( get_the_ID() ),
	            		);
	            		$query = new WP_Query($args);
	            		if ($query->have_posts()) {
	            			while ($query->have_posts()) {
	            				$query->the_post();
	            				$delay = 200 + ($counter * 200);
	            				
	            	?>
	                <div class="article smooth w-100 float-start" data-aos="fade-up" data-aos-delay="400">
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
	                        <!-- <p><?php //the_excerpt(); ?></p>
	                        <a class="read_article" href="<?php //the_permalink(); ?>">Read Article</a> -->
	                    </div>
	                </div>
	                <?php
	                		$counter++;
	                		}
	                	}
	                ?>
	            </div>

	        </div>
	    </section>

	</main><!-- #main -->

<?php get_footer(); ?>


<!-- <script type="text/javascript">
	// JavaScript to handle scroll event and update the progress bar width
	window.addEventListener('scroll', function() {
	    var scrollPosition = window.scrollY; // How much the page has scrolled vertically
	    var documentHeight = document.documentElement.scrollHeight - window.innerHeight; // Total scrollable height
	    var scrollPercentage = (scrollPosition / documentHeight) * 100; // Calculate scroll percentage

	    // Update the width of the progress bar
	    var progressBar = document.querySelector('.page_bar');
	    progressBar.style.width = scrollPercentage + '%';
	});

</script> -->

<script type="text/javascript">
    // JavaScript to handle scroll event and update the progress bar width
    window.addEventListener('scroll', function() {
        // Get the specific section where you want the progress bar to stop
        var section = document.querySelector('.blog_dtl_text_sec'); // Change to the class or ID of your section
        var sectionTop = section.offsetTop; // Distance from the top of the document to the section
        var sectionHeight = section.offsetHeight; // Height of the section

        // Get how much the page has scrolled vertically
        var scrollPosition = window.scrollY;

        // Calculate the scroll position relative to the section
        if (scrollPosition >= sectionTop && scrollPosition <= sectionTop + sectionHeight) {
            // Calculate the scroll percentage within the section
            var scrollPercentage = ((scrollPosition - sectionTop) / sectionHeight) * 100;
            
            // Update the width of the progress bar
            var progressBar = document.querySelector('.page_bar');
            progressBar.style.width = scrollPercentage + '%';
        }
        else if (scrollPosition < sectionTop) {
            // If scroll is before the section, reset the progress bar
            var progressBar = document.querySelector('.page_bar');
            progressBar.style.width = '0%';
        }
        else {
            // If scroll is past the section, set progress bar to 100%
            var progressBar = document.querySelector('.page_bar');
            progressBar.style.width = '105%';
        }
    });
</script>
