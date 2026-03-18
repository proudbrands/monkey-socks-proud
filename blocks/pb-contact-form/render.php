<?php
/**
 * PB Contact Form Block
 *
 * Contact form section with Gravity Form ID 2.
 * Source: template-contact.php lines 95-269.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="talk_to_us" class="form_sec">
	<div class="container">
		<div class="main_form_div w-100 float-start d-grid">
			<div class="form_title">
				<h1><?php echo wp_kses_post( get_field( 'conatct_sec2_heading', get_the_ID() ) ); ?></h1>
				<p><?php echo wp_kses_post( get_field( 'conatct_sec2_description', get_the_ID() ) ); ?></p>
			</div>
			<div class="form_div w-100 float-start">
				<?php echo do_shortcode( '[gravityform id="2" title="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</section>
