<?php
/**
 * PB Business Thrive Block
 *
 * Heading + icon box repeater + CTA button.
 * Flex layout: heading_repeater_button_link
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading  = get_field( 'services_sec2_heading', get_the_ID() );
$btn_text = get_field( 'services_sec2_button_link', get_the_ID() );
$text     = get_field( 'services_sec2_text', get_the_ID() );
?>
<section class="help_busines_sec">
	<div class="container">
		<?php if ( $heading ) : ?>
			<h2><?php echo wp_kses_post( $heading ); ?></h2>
		<?php endif; ?>
		<div class="help_businesGrid left_cntnt w-100">
			<?php
			if ( have_rows( 'services_sec2_business_thrive', get_the_ID() ) ) :
				while ( have_rows( 'services_sec2_business_thrive', get_the_ID() ) ) :
					the_row();
					$img = get_sub_field( 'image__icon' );
					?>
					<div class="help_businesBox d-flex flex-wrap flex-column">
						<?php if ( $img ) : ?>
							<img src="<?php echo esc_url( $img['url'] ); ?>" width="30" height="30" alt="<?php echo esc_attr( $img['alt'] ); ?>">
						<?php endif; ?>
						<h3><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
						<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
					</div>
					<?php
				endwhile;
			endif;
			?>
		</div>
		<div class="get_free_chat float-start w-100 text-center d-inline-flex gap-3 justify-content-center align-items-center">
			<?php if ( $btn_text ) : ?>
				<a class="primary_btn book_meeting" href="javascript:void(0)">
					<?php echo esc_html( $btn_text ); ?>
					<svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="black"/></svg>
				</a>
			<?php endif; ?>
			<?php if ( $text ) : ?>
				<p><?php echo wp_kses_post( $text ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
