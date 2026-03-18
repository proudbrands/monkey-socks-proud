<?php
/**
 * PB Opposite Sections Block
 *
 * Two-row alternating image + text sections.
 * Flex layout: two_row_opposite_sections
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php if ( have_rows( 'opposite_section', get_the_ID() ) ) : ?>
<section class="peace_mind_sec">
	<div class="container">
		<?php
		while ( have_rows( 'opposite_section', get_the_ID() ) ) :
			the_row();
			$img = get_sub_field( 'image' );
			?>
			<div class="peace_mind_div w-100 d-flex">
				<div class="peace_mind_pic w-100 float-start">
					<?php if ( $img ) : ?>
						<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="300" height="300">
					<?php endif; ?>
				</div>
				<div class="peace_mind_text w-100 float-start">
					<h2><?php echo wp_kses_post( get_sub_field( 'heading' ) ); ?></h2>
					<?php echo wp_kses_post( get_sub_field( 'description' ) ); ?>
				</div>
			</div>
			<?php
		endwhile;
		?>
	</div>
</section>
<?php endif; ?>
