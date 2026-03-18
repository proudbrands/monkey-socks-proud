<?php
/**
 * PB Service Banner Block
 *
 * Services page hero with caption, heading, description, CTA, image/video.
 * Flex layout: description_button_link_image
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$caption     = get_field( 'services_sec1_caption', get_the_ID() );
$heading     = get_field( 'services_sec1_heading', get_the_ID() );
$colorful    = get_field( 'colorfull_heading', get_the_ID() );
$description = get_field( 'services_sec1_description', get_the_ID() );
$btn_text    = get_field( 'services_sec1_button_link', get_the_ID() );
$media_type  = get_field( 'image_video', get_the_ID() );
$img         = get_field( 'services_sec1_image', get_the_ID() );
$video       = get_field( 'video', get_the_ID() );
?>
<section class="srvcs_bnr d-flex flex-wrap align-items-center">
	<div class="srvcs_bnrDes float-start w-100">
		<div class="srvcs_bnrDesRow float-end w-100 overflow-hidden">
			<?php if ( $caption ) : ?>
				<span><?php echo esc_html( $caption ); ?></span>
			<?php endif; ?>
			<h1>
				<?php echo wp_kses_post( $heading ); ?>
				<?php if ( $colorful ) : ?>
					<strong class="typing-effect"><?php echo esc_html( $colorful ); ?></strong>
				<?php endif; ?>
			</h1>
			<?php if ( $description ) : ?>
				<p><?php echo wp_kses_post( $description ); ?></p>
			<?php endif; ?>
			<?php if ( $btn_text ) : ?>
				<a class="secondary_btn book_meeting" href="javascript:void(0)"><?php echo esc_html( $btn_text ); ?></a>
			<?php endif; ?>
		</div>
	</div>
	<div class="srvcs_bnrImg float-start w-100">
		<div class="srvcs_bnrImgRow float-start w-100">
			<?php if ( 'video' === $media_type && $video && isset( $video['url'] ) ) : ?>
				<video autoplay muted loop playsinline preload="auto">
					<source src="<?php echo esc_url( $video['url'] ); ?>" type="<?php echo esc_attr( $video['mime_type'] ); ?>">
				</video>
			<?php elseif ( $img ) : ?>
				<picture>
					<source media="(max-width: 767px)" srcset="<?php echo esc_url( $img['url'] ); ?>">
					<source media="(min-width: 767px)" srcset="<?php echo esc_url( $img['url'] ); ?>">
					<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="916" height="484">
				</picture>
			<?php endif; ?>
		</div>
	</div>
</section>
