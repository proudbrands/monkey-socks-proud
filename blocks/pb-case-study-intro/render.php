<?php
/**
 * PB Case Study Intro Block
 *
 * Intro heading and description below the banner.
 * Source: template-case_study.php lines 71-81.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading     = get_field( 'casestudy_sec1_heading_2', get_the_ID() );
$description = get_field( 'casestudy_sec1_description', get_the_ID() );
?>
<section class="bnr_btm_des_sec cs_bnr_btm_des_sec">
	<div class="bnr_btm_des w-100 m-auto text-center" data-aos="fade-up">
		<?php if ( $heading ) : ?>
			<h2><?php echo wp_kses_post( $heading ); ?></h2>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<p><?php echo wp_kses_post( $description ); ?></p>
		<?php endif; ?>
	</div>
</section>
