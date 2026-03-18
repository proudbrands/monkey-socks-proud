<?php
/**
 * PB Digital Section Block
 *
 * Description + image + icon repeater + video + CTA.
 * Flex layout: description_image_repeater_video_text_button_link
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$desc1      = get_field( 'services_sec4_description1', get_the_ID() );
$img1       = get_field( 'services_sec4_image1', get_the_ID() );
$text       = get_field( 'services_sec4_text', get_the_ID() );
$heading    = get_field( 'services_sec4_heading1', get_the_ID() );
$short_desc = get_field( 'services_sec4_short_description', get_the_ID() );
$btn_text   = get_field( 'services_sec4_button_link1', get_the_ID() );
$vidimg     = get_field( 'services_sec4_video_image_first', get_the_ID() );
$vid_thumb  = get_field( 'services_sec4_video_image_second', get_the_ID() );
$vid        = get_field( 'services_sec4_video1', get_the_ID() );
$tpl_uri    = get_template_directory_uri();
?>
<section class="website_dif_sec website_dif_sec2<?php if ( ! $vidimg ) { echo ' website_dif_sec_pb'; } ?>">
	<div class="container">
		<div class="website_dif_grid d-grid">
			<div class="website_dif_left w-100">
				<?php echo wp_kses_post( $desc1 ); ?>
			</div>
			<?php if ( $img1 ) : ?>
				<div class="website_dif_rgt w-100">
					<picture>
						<source media="(max-width: 767px)" srcset="<?php echo esc_url( $img1['url'] ); ?>">
						<source media="(min-width: 767px)" srcset="<?php echo esc_url( $img1['url'] ); ?>">
						<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img1['url'] ); ?>" alt="<?php echo esc_attr( $img1['alt'] ); ?>" width="781" height="569">
					</picture>
				</div>
			<?php endif; ?>
		</div>
		<?php if ( $text ) : ?>
			<div class="top_des w-100 float-start text-center">
				<p><?php echo wp_kses_post( $text ); ?></p>
			</div>
		<?php endif; ?>
		<div class="help_businesGrid digital_box w-100">
			<?php
			if ( have_rows( 'services_sec4_points1', get_the_ID() ) ) :
				while ( have_rows( 'services_sec4_points1', get_the_ID() ) ) :
					the_row();
					$img = get_sub_field( 'image' );
					?>
					<div class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
						<?php if ( $img ) : ?>
							<img src="<?php echo esc_url( $img['url'] ); ?>" width="30" height="30" alt="<?php echo esc_attr( $img['alt'] ); ?>">
						<?php endif; ?>
						<h3><?php echo esc_html( get_sub_field( 'heading' ) ); ?></h3>
						<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
					</div>
					<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>

<?php if ( $vidimg ) : ?>
<section class="s_video_frame">
	<div class="container">
		<a id="videoText" class="position-relative" href="#">
			<?php if ( $vid_thumb ) : ?>
				<picture>
					<source media="(max-width: 767px)" srcset="<?php echo esc_url( $vid_thumb['url'] ); ?>">
					<source media="(min-width: 767px)" srcset="<?php echo esc_url( $vid_thumb['url'] ); ?>">
					<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $vid_thumb['url'] ); ?>" alt="<?php echo esc_attr( $vid_thumb['alt'] ); ?>" width="1439" height="673">
				</picture>
			<?php endif; ?>
			<span id="playButton" class="circle_btn position-absolute top-50 start-50 translate-middle">
				<img src="<?php echo esc_url( $tpl_uri . '/images/circled_play.webp' ); ?>" alt="circled play" width="124" height="124">
			</span>
		</a>
		<?php if ( $vid ) : ?>
			<div class="video_player w-100 float-start" id="videoPlayer" style="display: none;">
				<iframe id="youtubeIframe" width="560" height="315" src="<?php echo esc_url( $vid ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<section class="butfl_wbste_sec text-center">
	<div class="container">
		<?php if ( $heading ) : ?>
			<h2><?php echo wp_kses_post( $heading ); ?></h2>
		<?php endif; ?>
		<?php if ( $short_desc ) : ?>
			<p><?php echo wp_kses_post( $short_desc ); ?></p>
		<?php endif; ?>
		<?php if ( $btn_text ) : ?>
			<a class="primary_btn book_meeting" href="javascript:void(0)">
				<?php echo esc_html( $btn_text ); ?>
				<svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
			</a>
		<?php endif; ?>
	</div>
</section>
