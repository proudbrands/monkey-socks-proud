<?php
/**
 * PB Case Study Banner Block
 *
 * Case study page banner with hexagon decorations.
 * Source: template-case_study.php lines 23-67.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading = get_field( 'casestudy_sec1_heading_1', get_the_ID() );
$img     = get_field( 'casestudy_sec1_image', get_the_ID() );
?>
<section class="cs_sec position-relative">
	<div class="container">
		<div class="cs_bnr_div w-100 float-start d-flex justify-content-between align-items-center">
			<div class="cs_title w-100">
				<?php if ( $heading ) : ?>
					<h1><?php echo wp_kses_post( $heading ); ?></h1>
				<?php endif; ?>
			</div>
			<div class="cs_pic w-100 text-end position-relative">
				<div class="hexagon">
					<?php if ( $img ) : ?>
						<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="banner Icon" width="300" height="76">
					<?php endif; ?>
				</div>
				<div class="hexagon hexagon2 position-absolute"></div>
				<div class="hexagon hexagon3 position-absolute"></div>
			</div>
		</div>
	</div>
</section>
