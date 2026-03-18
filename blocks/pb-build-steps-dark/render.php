<?php
/**
 * PB Build Steps Dark Block
 *
 * Numbered build steps on dark background.
 * Flex layout: caption_heading_repeater_link_black
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
?>
<section class="build_sec pb-0" style="background-color: #151515;">
	<div class="container">
		<div class="build_div w-100 float-start text-center pb-0">
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
</section>
