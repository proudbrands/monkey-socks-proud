<?php
/**
 * PB Swiper Carousel Block
 *
 * Featured projects Swiper slider.
 * Source: template-case_study.php lines 353-411.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tpl_uri = get_template_directory_uri();
?>
<?php if ( have_rows( 'casestudy_sec6_our_projects', get_the_ID() ) ) : ?>
<section class="ftr_project_sec">
	<div class="ftr_project_slider">
		<div class="swiper-wrapper">
			<?php
			while ( have_rows( 'casestudy_sec6_our_projects', get_the_ID() ) ) :
				the_row();
				$img  = get_sub_field( 'image' );
				$link = get_sub_field( 'link' );
				?>
				<div class="swiper-slide">
					<div class="ftr_project_pic">
						<?php if ( $img ) : ?>
							<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="647" height="433">
						<?php endif; ?>
						<?php if ( $link ) : ?>
							<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?? '_self' ); ?>">
								<span>
									<img class="smooth" width="21" height="21" src="<?php echo esc_url( $tpl_uri . '/images/learn_more.png' ); ?>" alt="arrow">
								</span>
								<small><?php echo esc_html( get_sub_field( 'title' ) ); ?></small>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<?php
			endwhile;
			?>
		</div>
	</div>
</section>
<?php endif; ?>
