<?php
/**
 * PB SEO Works Block
 *
 * "What we did" section with expertise tags and description.
 * Source: template-case_study.php lines 85-155.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title       = get_field( 'casestudy_sec2_title', get_the_ID() );
$title_2     = get_field( 'casestudy_sec2_title_2', get_the_ID() );
$percentage  = get_field( 'casestudy_sec2_percentage', get_the_ID() );
$text        = get_field( 'casestudy_sec2_text', get_the_ID() );
$heading     = get_field( 'casestudy_sec2_heading', get_the_ID() );
$description = get_field( 'casestudy_sec2_description', get_the_ID() );
?>
<section class="seo_work_sec">
	<div class="container">
		<?php if ( $title ) : ?>
			<div class="seo_title w-100 float-start" data-aos="fade-up">
				<h2><?php echo wp_kses_post( $title ); ?></h2>
			</div>
		<?php endif; ?>
		<div class="seo_work_div w-100 d-grid">
			<div class="seo_work_left w-100">
				<span>What we did</span>
				<ul class="w-100 float-start">
					<?php
					if ( have_rows( 'casestudy_sec2_our_expertise', get_the_ID() ) ) :
						while ( have_rows( 'casestudy_sec2_our_expertise', get_the_ID() ) ) :
							the_row();
							$expertise_text = get_sub_field( 'heading' );
							$slug           = sanitize_title( $expertise_text );
							?>
							<li class="<?php echo esc_attr( $slug ); ?>"><?php echo esc_html( $expertise_text ); ?></li>
							<?php
						endwhile;
					endif;
					?>
				</ul>
				<?php if ( $title_2 ) : ?>
					<span><?php echo wp_kses_post( $title_2 ); ?></span>
				<?php endif; ?>
				<?php if ( $percentage || $text ) : ?>
					<h3>
						<?php if ( $percentage ) : ?>
							<span><?php echo esc_html( $percentage ); ?>%</span>
						<?php endif; ?>
						<?php echo esc_html( $text ); ?>
					</h3>
				<?php endif; ?>
			</div>
			<div class="seo_work_right w-100" data-aos="fade-up">
				<?php if ( $heading ) : ?>
					<h3><?php echo wp_kses_post( $heading ); ?></h3>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<?php echo wp_kses_post( $description ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
