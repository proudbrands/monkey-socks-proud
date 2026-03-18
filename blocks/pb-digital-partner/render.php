<?php
/**
 * PB Digital Partner Block
 *
 * Caption/heading with icon box repeater.
 * Flex layout: caption_heading_desc_repeater
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$caption  = get_field( 'services_sec9_caption', get_the_ID() );
$heading  = get_field( 'services_sec9_heading', get_the_ID() );
$colorful = get_field( 'services_sec9_colorfull_heading', get_the_ID() );
?>
<section class="build_sec">
	<div class="container">
		<div class="digital_partner w-100 float-start text-center">
			<?php if ( $caption ) : ?>
				<span><?php echo esc_html( $caption ); ?></span>
			<?php endif; ?>
			<h2>
				<?php echo wp_kses_post( $heading ); ?>
				<?php if ( $colorful ) : ?>
					<strong><?php echo esc_html( $colorful ); ?></strong>
				<?php endif; ?>
			</h2>
			<div class="help_businesGrid digital_box w-100">
				<?php
				if ( have_rows( 'services_sec9_points', get_the_ID() ) ) :
					while ( have_rows( 'services_sec9_points', get_the_ID() ) ) :
						the_row();
						$img = get_sub_field( 'image__icon' );
						?>
						<div class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
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
		</div>
	</div>
</section>
