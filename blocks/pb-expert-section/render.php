<?php
/**
 * PB Expert Section Block
 *
 * Caption/heading with left + right description columns.
 * Flex layout: heading_left_decription_right_description
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$caption   = get_field( 'services_sec3_caption', get_the_ID() );
$heading   = get_field( 'services_sec3_heading', get_the_ID() );
$colorful  = get_field( 'services_sec3_colorfull_heading', get_the_ID() );
$left_desc = get_field( 'services_sec3_left_description', get_the_ID() );
$right_desc = get_field( 'services_sec3_right_description', get_the_ID() );
?>
<section class="s_desgn_exprt_sec">
	<div class="container">
		<h2>
			<?php if ( $caption ) : ?>
				<span><?php echo esc_html( $caption ); ?></span>
			<?php endif; ?>
			<?php echo wp_kses_post( $heading ); ?>
			<?php if ( $colorful ) : ?>
				<br/><strong><?php echo esc_html( $colorful ); ?></strong>
			<?php endif; ?>
		</h2>
		<div class="s_desgn_exprtGrid d-grid align-items-start w-100">
			<div class="s_desgn_exprt_left d-grid gap-3 w-100">
				<?php echo wp_kses_post( $left_desc ); ?>
			</div>
			<div class="s_desgn_exprt_des d-grid w-100">
				<?php echo wp_kses_post( $right_desc ); ?>
			</div>
		</div>
	</div>
</section>
