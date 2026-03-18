<?php
/**
 * PB Contact Hero Block
 *
 * Contact page banner with typing effect and hexagon shapes.
 * Source: template-contact.php lines 8-78.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading_1 = get_field( 'conatct_sec1_heading_1', get_the_ID() );
$heading_2 = get_field( 'conatct_sec1_heading_2', get_the_ID() );
$link      = get_field( 'conatct_sec1_button_link_1', get_the_ID() );
$img       = get_field( 'conatct_sec1_image', get_the_ID() );
?>
<section class="cs_sec contact_bnr_sec position-relative">
	<div class="container">
		<div class="cs_bnr_div w-100 float-start d-flex justify-content-between align-items-center">
			<div class="cs_title w-100">
				<h1><?php echo wp_kses_post( $heading_1 ); ?> <strong class="typing-effect"><?php echo esc_html( $heading_2 ); ?></strong></h1>
				<?php if ( $link ) : ?>
					<a class="secondary_btn" href="#talk_to_us"><?php echo esc_html( $link['title'] ); ?></a>
				<?php endif; ?>
				<a id="book_meeting" class="secondary_btn" href="javascript:void(0)">Book a Meeting</a>
			</div>
			<div class="cs_pic w-100 text-end position-relative">
				<div class="hexagon">
					<?php if ( $img ) : ?>
						<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="300" height="76">
					<?php endif; ?>
				</div>
				<div class="hexagon hexagon2 position-absolute"></div>
				<div class="hexagon hexagon3 position-absolute"></div>
			</div>
		</div>
	</div>
</section>
