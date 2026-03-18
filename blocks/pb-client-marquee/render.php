<?php
/**
 * PB Client Marquee Block
 *
 * Scrolling company logos marquee.
 * Source: template-contact.php lines 613-684. Also used on home page.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading = get_field( 'home_bnr_heading', 'options' );
?>
<section class="marquee_sec marquee_sec02 w-100 float-start text-center">
	<?php if ( $heading ) : ?>
		<h2><?php echo wp_kses_post( $heading ); ?></h2>
	<?php endif; ?>

	<?php for ( $i = 1; $i < 3; $i++ ) : ?>
	<ul class="marquee__item">
		<?php
		if ( have_rows( 'home_bnr_company_logos', 'options' ) ) :
			while ( have_rows( 'home_bnr_company_logos', 'options' ) ) :
				the_row();
				$img = get_sub_field( 'logo' );
				if ( $img ) :
					?>
					<li class="marqueeBox">
						<img width="56" height="64" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>">
					</li>
					<?php
				endif;
			endwhile;
		endif;
		?>
	</ul>
	<?php endfor; ?>
</section>
