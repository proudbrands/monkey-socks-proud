<?php
/**
 * PB Build Steps White Block
 *
 * Numbered build steps on light background with BG image.
 * Flex layout: caption_heading_repeater_link_white
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$caption  = get_field( 'services_sec8_caption', get_the_ID() );
$heading  = get_field( 'services_sec8_heading', get_the_ID() );
$colorful = get_field( 'services_sec8_colorfull_heading', get_the_ID() );
$link     = get_field( 'services_sec8_button_link', get_the_ID() );
$tpl_uri  = get_template_directory_uri();
?>
<section class="how_build_sec">
	<div class="container">
		<div class="build_div w-100 float-start text-center">
			<?php if ( $caption ) : ?>
				<span><?php echo esc_html( $caption ); ?></span>
			<?php endif; ?>
			<h2>
				<?php echo wp_kses_post( $heading ); ?>
				<?php if ( $colorful ) : ?>
					<strong><?php echo esc_html( $colorful ); ?></strong>
				<?php endif; ?>
			</h2>
			<?php if ( have_rows( 'services_sec8_points', get_the_ID() ) ) : ?>
			<ul class="d-grid overflow-hidden">
				<?php
				$counter = 1;
				while ( have_rows( 'services_sec8_points', get_the_ID() ) ) :
					the_row();
					?>
					<li>
						<h3><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
						<small><?php echo esc_html( $counter ); ?></small>
						<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
					</li>
					<?php
					$counter++;
				endwhile;
				?>
			</ul>
			<?php endif; ?>
			<?php if ( $link && is_array( $link ) ) : ?>
				<a class="secondary_btn" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?? '_self' ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
	<picture>
		<img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo esc_url( $tpl_uri . '/images/web_bg.webp' ); ?>" alt="web image" width="1920" height="1070">
	</picture>
</section>
