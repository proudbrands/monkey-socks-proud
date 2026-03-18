<?php
/**
 * PB About Hero Block
 *
 * About page title and description.
 * Source: template-about.php lines 27-45.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$description = get_field( 'about_sec1_description', get_the_ID() );
?>
<section class="about_top_sec">
	<div class="container">
		<div class="about_title w-100 float-start position-relative">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php if ( $description ) : ?>
			<div class="about_des w-100 float-start">
				<p><?php echo wp_kses_post( $description ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
