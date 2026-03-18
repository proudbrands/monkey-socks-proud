<?php
/**
 * PB Related Posts Block
 *
 * "You might also like" section with 3 related posts.
 * Source: single.php lines 182-229.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$counter = 1;
$args    = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
	'order'          => 'DESC',
	'post__not_in'   => array( get_the_ID() ),
);
$query   = new WP_Query( $args );
?>
<section class="skill_sec blog_dtl_sec">
	<div class="container">
		<h3>You might also like</h3>
		<div class="article_div w-100 d-grid mb-0">
			<?php
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					$delay = 200 + ( $counter * 200 );
					?>
					<div class="article smooth w-100 float-start" data-aos="fade-up" data-aos-delay="400">
						<div class="article_pic w-100 float-start">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail(); ?>
								<?php else : ?>
									<img aria-hidden="true" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/article_1.webp' ); ?>" alt="banner image" width="430" height="221">
								<?php endif; ?>
							</a>
						</div>
						<div class="article_des w-100 float-start">
							<span><?php echo esc_html( get_the_date( 'j-n-Y' ) ); ?></span>
							<h2><a class="article_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</div>
					</div>
					<?php
					$counter++;
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>
</section>
