<?php
/**
 * PB Related Projects Slider Block
 *
 * Swiper carousel of other our_work posts (excludes current post).
 * Source: single-our_work.php lines 360-447.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tpl_uri    = get_template_directory_uri();
$current_id = get_the_ID();

$args = array(
	'post_type'      => 'our_work',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'order'          => 'DESC',
	'post__not_in'   => array( $current_id ),
);

$query = new WP_Query( $args );
?>
<?php if ( $query->have_posts() ) : ?>
<section class="ftr_project_sec">
	<div class="ftr_project_slider">
		<div class="swiper-wrapper">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				?>
				<div class="swiper-slide">
					<div class="ftr_project_pic">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'full', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
						<?php else : ?>
							<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $tpl_uri . '/images/mar_2.webp' ); ?>" alt="" width="647" height="433">
						<?php endif; ?>
						<a href="<?php the_permalink(); ?>">
							<span>
								<img class="smooth" width="21" height="21" src="<?php echo esc_url( $tpl_uri . '/images/learn_more.png' ); ?>" alt="arrow">
							</span>
							<small><?php the_title(); ?></small>
						</a>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
<?php endif; ?>
