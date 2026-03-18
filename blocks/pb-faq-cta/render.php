<?php
/**
 * PB FAQ + CTA Block
 *
 * FAQ accordion + booking CTA section.
 * Flex layout: heading_faq_text_2_button_link
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_heading = get_field( 'services_sec10_heading', get_the_ID() );
$cta_title   = get_field( 'services_sec10_title', get_the_ID() );
$btn_text_1  = get_field( 'services_sec10_button_link_1', get_the_ID() );
$link_2      = get_field( 'services_sec10_button_link_2', get_the_ID() );
?>
<section class="faq_sec">
	<div class="container">
		<?php if ( $faq_heading ) : ?>
			<h3><?php echo wp_kses_post( $faq_heading ); ?></h3>
		<?php endif; ?>
		<?php if ( have_rows( 'services_sec10_frequently_asked_questions', get_the_ID() ) ) : ?>
		<div class="accordion faq_div w-100 float-start" id="accordionExample">
			<?php
			$counter = 1;
			while ( have_rows( 'services_sec10_frequently_asked_questions', get_the_ID() ) ) :
				the_row();
				?>
				<div class="accordion-item">
					<h2 class="accordion-header" id="heading<?php echo esc_attr( $counter ); ?>">
						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tab-<?php echo esc_attr( $counter ); ?>" aria-expanded="<?php echo ( 1 === $counter ) ? 'true' : 'false'; ?>" aria-controls="tab-<?php echo esc_attr( $counter ); ?>">
							<?php echo esc_html( get_sub_field( 'question' ) ); ?>
						</button>
					</h2>
					<div id="tab-<?php echo esc_attr( $counter ); ?>" class="accordion-collapse collapse <?php echo ( 1 === $counter ) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo esc_attr( $counter ); ?>" data-bs-parent="#accordionExample">
						<div class="accordion-body">
							<p><?php echo wp_kses_post( get_sub_field( 'answer' ) ); ?></p>
						</div>
					</div>
				</div>
				<?php
				$counter++;
			endwhile;
			?>
		</div>
		<?php endif; ?>
	</div>
</section>

<section class="chat_book_sec">
	<div class="container">
		<div class="chat_book_div w-100 float-start text-center">
			<?php if ( $cta_title ) : ?>
				<h2><?php echo wp_kses_post( $cta_title ); ?></h2>
			<?php endif; ?>
			<ul>
				<?php if ( $btn_text_1 ) : ?>
					<li><a class="secondary_btn book_meeting" href="javascript:void(0)"><?php echo esc_html( $btn_text_1 ); ?></a></li>
				<?php endif; ?>
				<?php if ( $link_2 && is_array( $link_2 ) ) : ?>
					<li><a class="secondary_btn" href="<?php echo esc_url( $link_2['url'] ); ?>" target="<?php echo esc_attr( $link_2['target'] ?? '_self' ); ?>"><?php echo esc_html( $link_2['title'] ); ?></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</section>
