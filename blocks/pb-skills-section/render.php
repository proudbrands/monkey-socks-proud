<?php
/**
 * PB Skills Section Block
 *
 * Skills list with image swap on hover.
 * Source: template-home.php lines 160-191.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading = get_field( 'home_sec3_heading', get_the_ID() );
$tpl_uri = get_template_directory_uri();
?>
<section class="skill_sec">
	<div class="container">
		<?php if ( $heading ) : ?>
			<div class="skill_title w-100 float-start" data-aos="fade-up">
				<h2><?php echo wp_kses_post( $heading ); ?></h2>
			</div>
		<?php endif; ?>
		<div class="skill_div w-100 d-grid">
			<div class="skill_pic w-100 float-start">
				<img class="skill_img_1" aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $tpl_uri . '/images/skill_pic.webp' ); ?>" alt="banner image" width="460" height="590">
			</div>
			<div class="skill_des w-100 float-start">
				<?php
				$counter = 1;
				if ( have_rows( 'home_sec3_weve_got_skills', get_the_ID() ) ) :
					while ( have_rows( 'home_sec3_weve_got_skills', get_the_ID() ) ) :
						the_row();
						$link = get_sub_field( 'button_link' );
						?>
						<div id="skill_<?php echo esc_attr( $counter ); ?>" class="skill_list w-100 float-start position-relative" data-aos="fade-up">
							<h3><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
							<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
							<?php if ( $link ) : ?>
								<a class="learn_more" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?? '_self' ); ?>">
									<span><img class="smooth" width="21" height="21" src="<?php echo esc_url( $tpl_uri . '/images/learn_more.png' ); ?>" alt="arrow"></span>
									<?php echo esc_html( $link['title'] ); ?>
								</a>
							<?php endif; ?>
						</div>
						<?php
						$counter++;
					endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
</section>

<?php
// Output skill image URLs as data attributes for skills-hover.js.
if ( have_rows( 'home_sec3_weve_got_skills', get_the_ID() ) ) :
	$skill_images = array();
	$idx = 1;
	while ( have_rows( 'home_sec3_weve_got_skills', get_the_ID() ) ) :
		the_row();
		$img = get_sub_field( 'image' );
		if ( $img ) :
			$skill_images[ $idx ] = $img['url'];
		endif;
		$idx++;
	endwhile;
	if ( ! empty( $skill_images ) ) :
		?>
		<script type="application/json" id="skill-images-data"><?php echo wp_json_encode( $skill_images ); ?></script>
		<?php
	endif;
endif;
?>
