<?php
/**
 * PB Web Work Section Block
 *
 * Caption, dual headings, description, points list with BG image.
 * Flex layout: caption_heading_desc_repeater (services_sec7 fields)
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$caption   = get_field( 'services_sec7_caption', get_the_ID() );
$heading_1 = get_field( 'services_sec7_heading_1', get_the_ID() );
$heading_2 = get_field( 'services_sec7_heading_2', get_the_ID() );
$desc      = get_field( 'services_sec7_description', get_the_ID() );
$tpl_uri   = get_template_directory_uri();
?>
<section class="web_work_sec position-relative">
	<div class="container">
		<div class="web_div w-100 float-start text-center">
			<?php if ( $caption ) : ?>
				<span><?php echo esc_html( $caption ); ?></span>
			<?php endif; ?>
			<?php if ( $heading_1 ) : ?>
				<h2><?php echo wp_kses_post( $heading_1 ); ?></h2>
			<?php endif; ?>
			<?php if ( $heading_2 ) : ?>
				<h3><?php echo wp_kses_post( $heading_2 ); ?></h3>
			<?php endif; ?>
			<?php if ( $desc ) : ?>
				<p><?php echo wp_kses_post( $desc ); ?></p>
			<?php endif; ?>
			<?php if ( have_rows( 'services_sec7_points', get_the_ID() ) ) : ?>
			<ul>
				<?php
				while ( have_rows( 'services_sec7_points', get_the_ID() ) ) :
					the_row();
					?>
					<li>
						<h4><?php echo esc_html( get_sub_field( 'title' ) ); ?></h4>
						<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
					</li>
					<?php
				endwhile;
				?>
			</ul>
			<?php endif; ?>
		</div>
	</div>
	<picture>
		<img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo esc_url( $tpl_uri . '/images/web_bg.webp' ); ?>" alt="web image" width="1920" height="1070">
	</picture>
</section>
