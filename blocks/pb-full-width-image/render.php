<?php
/**
 * PB Full Width Image Block
 *
 * Responsive full-width image with mobile/desktop sources.
 * Source: template-about.php lines 281-303.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img_mobile  = get_field( 'about_sec4_full_width_image_1', get_the_ID() );
$img_desktop = get_field( 'about_sec4_full_width_image_2', get_the_ID() );
?>
<?php if ( $img_mobile || $img_desktop ) : ?>
<section class="office_sec">
	<picture>
		<?php if ( $img_mobile ) : ?>
			<source media="(max-width: 767px)" srcset="<?php echo esc_url( $img_mobile['url'] ); ?>">
		<?php endif; ?>
		<?php if ( $img_desktop ) : ?>
			<source media="(min-width: 767px)" srcset="<?php echo esc_url( $img_desktop['url'] ); ?>">
			<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $img_desktop['url'] ); ?>" alt="<?php echo esc_attr( $img_desktop['alt'] ); ?>" width="1282" height="648">
		<?php endif; ?>
	</picture>
</section>
<?php endif; ?>
