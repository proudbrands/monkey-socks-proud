<?php
/**
 * PB Resource Detail Hero Block
 *
 * Resource download page banner with Gravity Form ID 3.
 * Source: single-resource.php lines 13-28.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="resources_bnr_dtl">
	<div class="container">
		<div class="r_dtl_bnr_div w-100 float-start d-flex justify-content-between">
			<div class="r_dtl_text w-100 float-start">
				<span><?php echo wp_kses_post( get_field( 'resource_detail_banner_caption', 'options' ) ); ?></span>
				<h1><?php echo wp_kses_post( get_field( 'resource_detail_banner_heading', 'options' ) ); ?></h1>
				<?php echo wp_kses_post( get_field( 'resource_detail_banner_description', 'options' ) ); ?>
			</div>
			<div class="r_dtl_form w-100 float-end">
				<?php echo do_shortcode( '[gravityform id="3" title="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</section>
