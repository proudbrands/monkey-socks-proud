<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Proud_Brands
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error_sec d-flex align-items-center justify-content-center position-relative text-center">
	        <h1>404</h1>
	        <p>This page could not be found.</p>
	        <a href="<?php echo esc_url(home_url()); ?>">Back to Home</a>
	    </section>

	</main><!-- #main -->

<?php
get_footer();
