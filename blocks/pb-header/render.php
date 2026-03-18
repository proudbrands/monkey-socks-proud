<?php
/**
 * PB Header Block
 *
 * Static header with logo and navigation.
 * Replaces header.php lines 88-134.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<header class="hdr_sec position-relative">
	<div class="container">
		<div class="header_div d-flex align-items-center justify-content-between">
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img width="201" height="61" src="<?php echo esc_url( get_template_directory_uri() . '/images/logo.webp' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
			</div>
			<div class="hdr__rgt-mbl">
				<div class="hdr__nav-icon" id="hdr__nav-icon2">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<small>Menu</small>
				</div>
			</div>
			<div class="navigation">
				<?php
				wp_nav_menu(
					array(
						'menu' => 'Top Header Menu',
					)
				);
				?>
				<ol class="hdr_social_links d-lg-none">
					<li>
						<a target="_blank" href="#"><img width="34" height="34" src="<?php echo esc_url( get_template_directory_uri() . '/images/facebook.svg' ); ?>" alt="Facebook"></a>
					</li>
					<li>
						<a target="_blank" href="#"><img width="34" height="34" src="<?php echo esc_url( get_template_directory_uri() . '/images/twitter_x.svg' ); ?>" alt="Twitter"></a>
					</li>
					<li>
						<a target="_blank" href="#"><img width="34" height="34" src="<?php echo esc_url( get_template_directory_uri() . '/images/linked_in.svg' ); ?>" alt="LinkedIn"></a>
					</li>
				</ol>
			</div>
		</div>
	</div>
</header>
