<?php
/**
 * PB Resource CTA Block
 *
 * "Better Everyday" CTA section.
 * Source: single-resource.php lines 30-38.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading = get_field( 'resource_detail_create_heading', 'options' );
$link    = get_field( 'resource_detail_create_button_link', 'options' );
?>
<section class="better_everyday text-center">
	<?php if ( $heading ) : ?>
		<h2><?php echo wp_kses_post( $heading ); ?></h2>
	<?php endif; ?>
	<?php if ( $link ) : ?>
		<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?? '_self' ); ?>"><?php echo esc_html( $link['title'] ); ?> <img src="<?php echo esc_url( get_template_directory_uri() . '/images/right_black_arrow.png' ); ?>" alt="arrow"></a>
	<?php endif; ?>
</section>
