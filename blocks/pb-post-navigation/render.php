<?php
/**
 * PB Post Navigation Block
 *
 * Previous/Next post navigation with thumbnails.
 * Source: single.php lines 110-153.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$prev_post = get_previous_post();
$next_post = get_next_post();
?>
<div class="next_prev_btn w-100 float-start d-grid">
	<?php if ( $prev_post ) :
		$prev_thumb = get_the_post_thumbnail( $prev_post->ID, 'thumbnail' );
		$prev_link  = get_permalink( $prev_post->ID );
		?>
		<a class="prev_post post_link w-100" href="<?php echo esc_url( $prev_link ); ?>">
			<span>
				<?php if ( $prev_thumb ) : ?>
					<?php echo $prev_thumb; ?>
				<?php else : ?>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder.png' ); ?>" alt="">
				<?php endif; ?>
				<?php echo esc_html( wp_trim_words( $prev_post->post_title, 3 ) ); ?>
			</span>
			<small>Previous</small>
		</a>
	<?php endif; ?>

	<?php if ( $next_post ) :
		$next_thumb = get_the_post_thumbnail( $next_post->ID, 'thumbnail' );
		$next_link  = get_permalink( $next_post->ID );
		?>
		<a class="next_post post_link w-100" href="<?php echo esc_url( $next_link ); ?>">
			<small>Next</small>
			<span>
				<?php echo esc_html( wp_trim_words( $next_post->post_title, 3 ) ); ?>
				<?php if ( $next_thumb ) : ?>
					<?php echo $next_thumb; ?>
				<?php else : ?>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/placeholder.png' ); ?>" alt="">
				<?php endif; ?>
			</span>
		</a>
	<?php endif; ?>
</div>
