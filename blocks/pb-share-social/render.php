<?php
/**
 * PB Share Social Block
 *
 * Social sharing links for blog posts.
 * Source: single.php lines 156-175.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$fb_link      = get_field( 'post_facebook_link', get_the_ID() );
$twitter_link = get_field( 'post_twitter_link', get_the_ID() );
$linkedin_link = get_field( 'post_linkedin_link', get_the_ID() );

if ( ! $fb_link && ! $twitter_link && ! $linkedin_link ) {
	return;
}
?>
<div class="share_social w-100 float-start text-center">
	<h3>SHARE THIS</h3>
	<ul>
		<?php if ( $fb_link ) : ?>
			<li><a title="Facebook" href="<?php echo esc_url( $fb_link ); ?>" target="_blank"><img width="45" height="45" src="<?php echo esc_url( get_template_directory_uri() . '/images/fb.svg' ); ?>" alt="Facebook"></a></li>
		<?php endif; ?>
		<?php if ( $twitter_link ) : ?>
			<li><a title="Twitter" href="<?php echo esc_url( $twitter_link ); ?>" target="_blank"><img width="45" height="45" src="<?php echo esc_url( get_template_directory_uri() . '/images/twitter.svg' ); ?>" alt="Twitter"></a></li>
		<?php endif; ?>
		<?php if ( $linkedin_link ) : ?>
			<li><a title="LinkedIn" href="<?php echo esc_url( $linkedin_link ); ?>" target="_blank"><img width="45" height="45" src="<?php echo esc_url( get_template_directory_uri() . '/images/linkedin.svg' ); ?>" alt="LinkedIn"></a></li>
		<?php endif; ?>
	</ul>
</div>
