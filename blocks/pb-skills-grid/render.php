<?php
/**
 * PB Skills Grid Block
 *
 * About page skills grid with dark background.
 * Source: template-about.php lines 47-78.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="abt_branding">
	<div class="container align-items-center">
		<div class="abt_branding_row w-100 d-grid position-relative">
			<?php
			if ( have_rows( 'about_sec1_our_skills', get_the_ID() ) ) :
				while ( have_rows( 'about_sec1_our_skills', get_the_ID() ) ) :
					the_row();
					?>
					<div class="abt_brandingBox float-start w-100" data-aos="fade-up">
						<h2><?php echo esc_html( get_sub_field( 'title' ) ); ?></h2>
						<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
					</div>
					<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>
