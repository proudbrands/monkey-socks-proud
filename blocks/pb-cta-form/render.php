<?php
/**
 * PB CTA Form Block
 *
 * Contact CTA section with Gravity Form.
 * Replaces footer.php lines 14-48.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Per-post show/hide toggle (falls back to showing if no field set).
$showhide = get_field( 'contact_section_show_hide', get_the_ID() );
if ( $showhide ) {
	return;
}

$img = get_field( 'home_sec5_background_image', 'options' );
?>
<section id="hp_form_sec" class="hp_form_sec position-relative">
	<?php if ( $img ) : ?>
		<img class="shape" aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="368" height="424">
	<?php else : ?>
		<img class="shape" aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/triangle.webp' ); ?>" alt="shape" width="368" height="424">
	<?php endif; ?>
	<div class="container">
		<div class="hp_form_div w-100 d-flex justify-content-between align-items-center">
			<div class="hp_form_des w-100 float-start">
				<span><?php echo wp_kses_post( get_field( 'home_sec5_left_side_text', 'options' ) ); ?></span>
				<h2><?php echo wp_kses_post( get_field( 'home_sec5_right_description', 'options' ) ); ?></h2>
			</div>
			<div class="hp_form w-100 float-start">
				<h2><?php echo wp_kses_post( get_field( 'home_sec5_right_side_heading_1', 'options' ) ); ?></h2>
				<h3><?php echo wp_kses_post( get_field( 'home_sec5_right_side_heading_2', 'options' ) ); ?></h3>
				<?php echo do_shortcode( '[gravityform id="1" title="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</section>
