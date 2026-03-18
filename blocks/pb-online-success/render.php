<?php
/**
 * PB Online Success Block
 *
 * Full-width image with heading and description.
 * Flex layout: full_width_image__description
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading = get_field( 'main_heading', get_the_ID() );
$img     = get_field( 'image', get_the_ID() );
$desc    = get_field( 'description', get_the_ID() );
?>
<section class="online_success_sec position-relative">
	<div class="container">
		<div class="online_success_div w-100 float-start">
			<?php if ( $heading ) : ?>
				<h2><?php echo wp_kses_post( $heading ); ?></h2>
			<?php endif; ?>
			<?php if ( $img ) : ?>
				<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="300" height="300">
			<?php endif; ?>
			<?php if ( $desc ) : ?>
				<div class="online_success_text w-100 float-end">
					<?php echo wp_kses_post( $desc ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
