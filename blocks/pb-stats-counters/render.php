<?php
/**
 * PB Stats Counters Block
 *
 * Animated counter statistics with CounterUp.
 * Source: template-about.php lines 81-109.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="abt_branding_nmbrs float-start w-100 d-flex flex-wrap flex-column align-content-end">
	<?php
	if ( have_rows( 'about_sec1_our_skills_rates', get_the_ID() ) ) :
		while ( have_rows( 'about_sec1_our_skills_rates', get_the_ID() ) ) :
			the_row();
			?>
			<div class="abt_branding_nmbrs_box">
				<h3 class="counter text-end">+<?php echo esc_html( get_sub_field( 'rate__value' ) ); ?></h3>
				<p><?php echo esc_html( get_sub_field( 'heading' ) ); ?></p>
			</div>
			<?php
		endwhile;
	endif;
	?>
</div>
