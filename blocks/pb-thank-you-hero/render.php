<?php
/**
 * PB Thank You Hero Block
 *
 * Thank you section with download link from URL param.
 * Source: template-thank_you.php (first section).
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="thankyou_sec text-center">
	<div class="container">
		<h1>Thank you <strong>for your interest</strong></h1>
		<p>Click the button below to download your file or browse more of our resources.</p>
		<?php
		if ( isset( $_GET['postds'] ) && ! empty( $_GET['postds'] ) ) {
			$postid = intval( $_GET['postds'] );
			$args   = array(
				'post_type' => 'resource',
				'p'         => $postid,
			);
			$query  = new WP_Query( $args );
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
					<div class="customer_map d-flex justify-content-center align-items-center m-auto">
						<span>
							<a href="<?php the_permalink(); ?>" download>
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} else {
									?>
									<img src="<?php echo esc_url( get_template_directory_uri() . '/images/book.png' ); ?>" alt="">
								<?php } ?>
							</a>
						</span>
						<div class="customer_map_text">
							<h3><?php the_title(); ?></h3>
							<a class="primary_btn" href="<?php the_permalink(); ?>" download>Download <img width="13" height="16" src="<?php echo esc_url( get_template_directory_uri() . '/images/down-arrow.png' ); ?>" alt="down arrow"></a>
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
