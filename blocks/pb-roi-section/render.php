<?php
/**
 * PB ROI Section Block
 *
 * ROI result boxes with equal-height JS.
 * Source: single-our_work.php flex layout: result_roi_section
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = get_field( 'roi_title', get_the_ID() );
$desc  = get_field( 'roi_description', get_the_ID() );
$after = get_field( 'description_after_boxes', get_the_ID() );
?>
<section class="help_busines_sec p-0">
	<div class="container">
		<?php if ( $title ) : ?>
			<h2><?php echo wp_kses_post( $title ); ?></h2>
		<?php endif; ?>
		<?php if ( $desc ) : ?>
			<p><?php echo wp_kses_post( $desc ); ?></p>
		<?php endif; ?>
		<?php if ( have_rows( 'roi_box_list', get_the_ID() ) ) : ?>
		<div class="help_businesGrid left_cntnt w-100">
			<?php
			while ( have_rows( 'roi_box_list', get_the_ID() ) ) :
				the_row();
				?>
				<div class="help_businesBox d-flex flex-column">
					<h3><?php echo esc_html( get_sub_field( 'roi_box_title' ) ); ?></h3>
					<?php echo wp_kses_post( get_sub_field( 'roi_box_description' ) ); ?>
				</div>
				<?php
			endwhile;
			?>
		</div>
		<?php endif; ?>
		<?php if ( $after ) : ?>
		<div class="get_free_chat get_free_chat02 float-start w-100 text-center">
			<?php echo wp_kses_post( $after ); ?>
		</div>
		<?php endif; ?>
	</div>
</section>
