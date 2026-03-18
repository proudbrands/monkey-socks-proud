<?php
/**
 * PB FAQ Accordion Block
 *
 * FAQ section with vanilla JS accordion (replaces Bootstrap accordion).
 * Source: template-contact.php lines 431-609.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading = get_field( 'services_sec10_heading', 'options' );
?>
<section class="faq_sec">
	<div class="container">
		<?php if ( $heading ) : ?>
			<h3><?php echo wp_kses_post( $heading ); ?></h3>
		<?php endif; ?>

		<div class="accordion faq_div w-100 float-start" id="accordionExample">
			<?php
			$counter = 1;
			if ( have_rows( 'services_sec10_frequently_asked_questions', 'options' ) ) :
				while ( have_rows( 'services_sec10_frequently_asked_questions', 'options' ) ) :
					the_row();
					?>
					<div class="accordion-item">
						<h2 class="accordion-header">
							<button class="accordion-button<?php echo $counter > 1 ? ' collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#tab-<?php echo esc_attr( $counter ); ?>" aria-expanded="<?php echo $counter === 1 ? 'true' : 'false'; ?>" aria-controls="tab-<?php echo esc_attr( $counter ); ?>">
								<?php echo wp_kses_post( get_sub_field( 'question' ) ); ?>
							</button>
						</h2>
						<div id="tab-<?php echo esc_attr( $counter ); ?>" class="accordion-collapse collapse<?php echo $counter === 1 ? ' show' : ''; ?>" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<p><?php echo wp_kses_post( get_sub_field( 'answer' ) ); ?></p>
							</div>
						</div>
					</div>
					<?php
					$counter++;
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>
