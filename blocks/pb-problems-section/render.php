<?php
/**
 * PB Problems Section Block
 *
 * WYSIWYG content section for problem description.
 * Source: single-our_work.php flex layout: the_problems
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = get_field( 'casestudy_sec4_title', get_the_ID() );
$desc  = get_field( 'description', get_the_ID() );
?>
<section class="problems_sec">
	<div class="container">
		<?php if ( $title ) : ?>
			<h2 data-aos="fade-up"><?php echo wp_kses_post( $title ); ?></h2>
		<?php endif; ?>
		<?php if ( $desc ) : ?>
			<div class="problems_div w-100 float-start" data-aos="fade-up">
				<?php echo wp_kses_post( $desc ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
