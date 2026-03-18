<?php
/**
 * PB Full Width Image + Points Block
 *
 * Full-width image with counter stat boxes below.
 * Source: template-case_study.php lines 159-237.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$img = get_field( 'casestudy_sec3_full_width_image', get_the_ID() );
?>
<?php if ( $img ) : ?>
<section class="monitor_sec text-center" data-aos="fade-up">
	<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="1060" height="643">
</section>
<?php endif; ?>

<?php if ( have_rows( 'casestudy_sec3_points', get_the_ID() ) ) : ?>
<section class="boxes_sec text-center">
	<div class="container">
		<div class="file_boxes w-100 d-grid">
			<?php
			$delay = 300;
			while ( have_rows( 'casestudy_sec3_points', get_the_ID() ) ) :
				the_row();
				$delay_value = 100 + $delay;
				?>
				<div class="file_box smooth w-100 float-start" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay_value ); ?>">
					<h2 class="counter"><?php echo esc_html( get_sub_field( 'value' ) ); ?></h2>
					<p><?php echo esc_html( get_sub_field( 'title' ) ); ?></p>
				</div>
				<?php
				$delay += 300;
			endwhile;
			?>
		</div>
	</div>
</section>
<?php endif; ?>
