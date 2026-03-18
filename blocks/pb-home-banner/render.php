<?php
/**
 * PB Home Banner Block
 *
 * Hero banner with responsive background image and bottom description.
 * Source: template-home.php lines 12-39.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$banner_text = get_field( 'home_bnr_banner_text', get_the_ID() );
$bnr_img     = get_field( 'home_bnr_background_image', get_the_ID() );
$bottom_text = get_field( 'home_bnr_bottom_text', get_the_ID() );
$tpl_uri     = get_template_directory_uri();
?>
<section class="hp_bnr_sec position-relative">
	<div class="bnr_layer w-100 float-start d-flex align-items-center h-100 position-absolute start-0"></div>
	<div class="hp_bnr_div w-100 float-start position-relative">
		<div class="bnr_des w-100 m-auto" data-aos="fade-up">
			<?php if ( $banner_text ) : ?>
				<h1><?php echo wp_kses_post( $banner_text ); ?></h1>
			<?php endif; ?>
		</div>
		<div class="bnr_pic w-100 float-end">
			<?php if ( $bnr_img ) : ?>
				<picture>
					<source media="(max-width: 767px)" srcset="<?php echo esc_url( $bnr_img['sizes']['medium'] ); ?>">
					<source media="(min-width: 768px)" srcset="<?php echo esc_url( $bnr_img['sizes']['large'] ); ?>">
					<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $bnr_img['url'] ); ?>" alt="<?php echo esc_attr( $bnr_img['alt'] ); ?>" width="1282" height="648">
				</picture>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php if ( $bottom_text ) : ?>
<section class="bnr_btm_des_sec">
	<div class="bnr_btm_des w-100 m-auto text-center" data-aos="fade-up">
		<p><?php echo wp_kses_post( $bottom_text ); ?></p>
	</div>
</section>
<?php endif; ?>

<?php
// Home page marquee (uses page-level fields, distinct from pb-client-marquee).
$marquee_heading = get_field( 'home_bnr_heading', get_the_ID() );
?>
<?php if ( $marquee_heading || have_rows( 'home_bnr_company_logos_is', get_the_ID() ) ) : ?>
<section class="marquee_sec w-100 float-start text-center">
	<?php if ( $marquee_heading ) : ?>
		<h2><?php echo wp_kses_post( $marquee_heading ); ?></h2>
	<?php endif; ?>
	<?php for ( $i = 1; $i < 3; $i++ ) : ?>
		<ul class="marquee__item">
			<?php
			if ( have_rows( 'home_bnr_company_logos_is', get_the_ID() ) ) :
				while ( have_rows( 'home_bnr_company_logos_is', get_the_ID() ) ) :
					the_row();
					$img = get_sub_field( 'logo' );
					if ( $img ) :
						?>
						<li class="marqueeBox">
							<img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>">
						</li>
						<?php
					endif;
				endwhile;
			endif;
			?>
		</ul>
	<?php endfor; ?>
</section>
<?php endif; ?>
