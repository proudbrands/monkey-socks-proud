<?php
/**
 * PB Project Slider Block
 *
 * Swiper slider + client success stats + description CTA.
 * Flex layout: caption_heading_slider_points_description
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$caption       = get_field( 'services_sec6_caption', get_the_ID() );
$heading       = get_field( 'services_sec6_heading', get_the_ID() );
$colorful      = get_field( 'services_sec6_colorfull_heading', get_the_ID() );
$client_name   = get_field( 'services_sec6_client_name', get_the_ID() );
$bottom_heading = get_field( 'services_sec6_bottom_heading', get_the_ID() );
$desc          = get_field( 'services_sec6_description', get_the_ID() );
$btn_text      = get_field( 'services_sec6_button_link', get_the_ID() );
?>
<section class="year_bldng_sec">
	<div class="container">
		<h2>
			<?php if ( $caption ) : ?>
				<span><?php echo esc_html( $caption ); ?></span>
			<?php endif; ?>
			<?php echo wp_kses_post( $heading ); ?>
			<?php if ( $colorful ) : ?>
				<strong><?php echo esc_html( $colorful ); ?></strong>
			<?php endif; ?>
		</h2>

		<?php if ( have_rows( 'services_sec6_project_images', get_the_ID() ) ) : ?>
		<div class="year_bldngSlder float-start w-100 text-center overflow-hidden">
			<div class="swiper year_bldngSlderDiv float-start w-100 position-relative">
				<div class="swiper-wrapper">
					<?php
					while ( have_rows( 'services_sec6_project_images', get_the_ID() ) ) :
						the_row();
						$img = get_sub_field( 'image' );
						if ( $img ) :
							?>
							<div class="swiper-slide">
								<div class="year_bldngSlide mx-auto w-100 text-center">
									<picture>
										<source media="(max-width: 767px)" srcset="<?php echo esc_url( $img['url'] ); ?>">
										<source media="(min-width: 767px)" srcset="<?php echo esc_url( $img['url'] ); ?>">
										<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="1010" height="673">
									</picture>
								</div>
							</div>
							<?php
						endif;
					endwhile;
					?>
				</div>
				<div class="swiper-button-next">
					<svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
				</div>
				<div class="swiper-button-prev">
					<svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="clnt_suces float-start w-100 text-center">
			<?php if ( $client_name ) : ?>
				<h3><span>Client Success:</span> <?php echo esc_html( $client_name ); ?></h3>
			<?php endif; ?>
			<?php if ( have_rows( 'services_sec6_specification', get_the_ID() ) ) : ?>
			<div class="clnt_suces_grid d-flex w-100">
				<?php
				while ( have_rows( 'services_sec6_specification', get_the_ID() ) ) :
					the_row();
					?>
					<div class="clnt_sucesBx d-flex flex-wrap flex-column w-100">
						<span><?php echo esc_html( get_sub_field( 'title' ) ); ?></span>
						<h4 class="counter"><?php echo esc_html( get_sub_field( 'percentage' ) ); ?></h4>
					</div>
					<?php
				endwhile;
				?>
			</div>
			<?php endif; ?>
		</div>

		<div class="year_bldngDes float-start w-100 text-center">
			<?php if ( $bottom_heading ) : ?>
				<h3><?php echo wp_kses_post( $bottom_heading ); ?></h3>
			<?php endif; ?>
			<?php if ( $desc ) : ?>
				<p><?php echo wp_kses_post( $desc ); ?></p>
			<?php endif; ?>
			<?php if ( $btn_text ) : ?>
				<a class="secondary_btn book_meeting" href="javascript:void(0)">
					<?php echo esc_html( $btn_text ); ?>
					<svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
