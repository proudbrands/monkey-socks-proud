<?php
/**
 * PB Testimonial Block
 *
 * Testimonial quote section.
 * Source: template-case_study.php lines 331-347.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comment     = get_field( 'casestudy_sec6_comment', get_the_ID() );
$name        = get_field( 'casestudy_sec6_name', get_the_ID() );
$designation = get_field( 'casestudy_sec6_designation', get_the_ID() );
$tpl_uri     = get_template_directory_uri();
?>
<section class="testi_sec">
	<div class="container">
		<div class="testi_div w-100 float-start text-center" data-aos="fade-up">
			<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $tpl_uri . '/images/quote.webp' ); ?>" alt="quote" width="140" height="70">
			<?php if ( $comment ) : ?>
				<p><?php echo wp_kses_post( $comment ); ?></p>
			<?php endif; ?>
			<?php if ( $name ) : ?>
				<h3>
					<?php echo esc_html( $name ); ?>
					<?php if ( $designation ) : ?>
						<span>~<?php echo esc_html( $designation ); ?></span>
					<?php endif; ?>
				</h3>
			<?php endif; ?>
		</div>
	</div>
</section>
