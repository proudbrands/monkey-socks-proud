<?php
/**
 * PB Software Compatibility Block
 *
 * Image + heading + description side by side.
 * Flex layout: software_compatibility_is_criticle
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img     = get_field( 'image', get_the_ID() );
$heading = get_field( 'heading', get_the_ID() );
$desc    = get_field( 'description', get_the_ID() );
?>
<section class="software_text_sec">
	<div class="container">
		<div class="software_text_div w-100 d-flex align-items-center">
			<div class="software_text_pic w-100 float-start">
				<?php if ( $img ) : ?>
					<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="300" height="300">
				<?php endif; ?>
			</div>
			<div class="software_text w-100 float-start">
				<?php if ( $heading ) : ?>
					<h2><?php echo wp_kses_post( $heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $desc ) : ?>
					<?php echo wp_kses_post( $desc ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
