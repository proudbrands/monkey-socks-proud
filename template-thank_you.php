<?php

/*
Template Name: Thankew Page

*/

get_header();

?>


	<section class="thankyou_sec text-center">
        <div class="container">
            <h1>Thank you <strong>for your interest</strong></h1>
            <p>Click the button below to download your file or browse more of our resources.</p>
            <?php
            	if ( isset( $_GET['postds'] ) && !empty( $_GET['postds'] ) ) {
            		$postid = intval($_GET['postds']);
	        		$args = array(
	        			'post_type' => 'resource',
	        			'p' => $postid
	        		);
	        		$querrry = new WP_Query($args);
	        		if ($querrry->have_posts()) {
	        			while ($querrry->have_posts()) {
	        				$querrry->the_post();
            ?>
            <div class="customer_map d-flex justify-content-center align-items-center m-auto">
                <span>
                    <a href="<?php the_permalink(); ?>" download>
                    	<?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } else {
                        ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/book.png" alt="">
                        <?php } ?>
                    </a>
                </span>
                <div class="customer_map_text">
                    <h3><?php the_title(); ?></h3>
                    <a class="primary_btn" href="<?php the_permalink(); ?>" download>Download <img width="13" height="16" src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" alt="down arrow"></a>
                </div>
            </div>
            <?php
            		}
            		wp_reset_postdata();
            	} else {
			        echo '<p>No post found.</p>';
			    }

			    } else {
				    echo '<p>Post ID is missing from the URL.</p>';
				}
            ?>
        </div>
    </section>

    <section class="other_rsrcs_sec">
        <div class="container">
            <h2>Other resources you might want to check</h2>
            <div class="other_rsrcs w-100 float-start d-grid">
                <?php
                	$postid = intval($_GET['postds']);
            		$currentPagge = get_query_var('paged');
            		$argss = array(

            			'post_type' => 'resource',

            			'post_status' => 'publish',

            			'posts_per_page' => 4,

            			'order' => 'DESC',

                        'paged' => $currentPagge,

                        'post__not_in' => array($postid)

            		);
            		$querry = new WP_Query($argss);
            		if ($querry->have_posts()) {
            			while ($querry->have_posts()) {
            				$querry->the_post();
            	?>
                <div class="customer_map d-flex justify-content-center align-items-center">
                    <span>
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
                    <div class="customer_map_text">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        <a class="primary_btn" href="<?php the_permalink(); ?>">Download <img width="13" height="16" src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.png" alt="down arrow"></a>
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