<?php
/**
 * PB Services Repeater Block
 *
 * "Believing" services section with heading, description and grid.
 * Source: template-about.php lines 117-157.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading     = get_field( 'about_sec2_heading', get_the_ID() );
$description = get_field( 'about_sec2_description', get_the_ID() );
?>
<section class="believing_sect">
	<div class="container">
		<?php if ( $heading ) : ?>
			<h2 data-aos="fade-up"><?php echo wp_kses_post( $heading ); ?></h2>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<p data-aos="fade-up"><?php echo wp_kses_post( $description ); ?></p>
		<?php endif; ?>
		<div class="believing_grid d-grid w-100 position-relative">
			<?php
			if ( have_rows( 'about_sec2_our_services', get_the_ID() ) ) :
				while ( have_rows( 'about_sec2_our_services', get_the_ID() ) ) :
					the_row();
					?>
					<div class="believing_Box float-start w-100" data-aos="fade-up">
						<h3><?php echo esc_html( get_sub_field( 'heading' ) ); ?></h3>
						<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
					</div>
					<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>
