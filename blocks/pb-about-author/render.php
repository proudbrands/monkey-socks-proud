<?php
/**
 * PB About Author Block
 *
 * Author bio with profile picture (ACF user field).
 * Source: single.php lines 86-106.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$author_id   = get_post_field( 'post_author', get_the_ID() );
$author_data = get_userdata( $author_id );
$profile_image = get_field( 'profile_picture', 'user_' . $author_id );
?>
<div class="cws_author_main w-100 float-start">
	<h2>About Author</h2>
	<div class="cws_author_div w-100 d-grid">
		<span>
			<?php if ( $profile_image ) : ?>
				<img src="<?php echo esc_url( $profile_image['url'] ); ?>" alt="<?php echo esc_attr( $profile_image['alt'] ); ?>">
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/Portrait_Placeholder.png' ); ?>" alt="Default Profile">
			<?php endif; ?>
		</span>
		<div class="cws_author_des">
			<h3><?php echo esc_html( $author_data->display_name ); ?></h3>
			<p><?php echo wp_kses_post( $author_data->description ); ?></p>
		</div>
	</div>
</div>
