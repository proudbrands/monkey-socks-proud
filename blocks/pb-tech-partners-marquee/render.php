<?php
/**
 * PB Tech Partners Marquee Block
 *
 * Technology partner logos section.
 * Source: template-home.php lines 253-294.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading = get_field( 'home_sec4_heading_2', get_the_ID() );
?>
<section class="marquee_sec marquee_sec02 w-100 float-start text-center">
	<?php if ( $heading ) : ?>
		<h2><?php echo wp_kses_post( $heading ); ?></h2>
	<?php endif; ?>
	<ul>
		<?php
		if ( have_rows( 'home_sec4_technology_partners', get_the_ID() ) ) :
			while ( have_rows( 'home_sec4_technology_partners', get_the_ID() ) ) :
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
</section>
