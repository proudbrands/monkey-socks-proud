<?php
/**
 * PB Related Resources Block
 *
 * Displays related resources, excluding current resource.
 * Source: template-thank_you.php (second section).
 * Reused on: single-resource.php
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$exclude_id = isset( $_GET['postds'] ) ? intval( $_GET['postds'] ) : 0;
?>
<section class="other_rsrcs_sec">
	<div class="container">
		<h2>Other resources you might want to check</h2>
		<div class="other_rsrcs w-100 float-start d-grid">
			<?php
			$args  = array(
				'post_type'      => 'resource',
				'post_status'    => 'publish',
				'posts_per_page' => 4,
				'order'          => 'DESC',
				'post__not_in'   => $exclude_id ? array( $exclude_id ) : array(),
			);
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
					<div class="customer_map d-flex justify-content-center align-items-center">
						<span>
							<a href="<?php the_permalink(); ?>">
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
							<p><?php the_excerpt(); ?></p>
							<a class="primary_btn" href="<?php the_permalink(); ?>">Download <img width="13" height="16" src="<?php echo esc_url( get_template_directory_uri() . '/images/down-arrow.png' ); ?>" alt="down arrow"></a>
						</div>
					</div>
					<?php
				}
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</section>
