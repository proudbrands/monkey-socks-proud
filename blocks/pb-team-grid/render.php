<?php
/**
 * PB Team Grid Block
 *
 * Team members with hexagon images.
 * Source: template-about.php lines 211-277.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = get_field( 'about_sec4_title', get_the_ID() );
?>
<section class="team_proudbrand">
	<div class="container">
		<?php if ( $title ) : ?>
			<h2 data-aos="fade-up"><?php echo wp_kses_post( $title ); ?></h2>
		<?php endif; ?>
		<div class="team_proudbrand_row w-100">
			<?php
			if ( have_rows( 'about_sec4_our_team', get_the_ID() ) ) :
				while ( have_rows( 'about_sec4_our_team', get_the_ID() ) ) :
					the_row();
					$img  = get_sub_field( 'image' );
					$img2 = get_sub_field( 'hover_image' );
					?>
					<div class="team_proudbrand_box" data-aos="fade-up">
						<div class="team_hexagon position-relative">
							<?php if ( $img ) : ?>
								<span class="team_img">
									<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="472" height="472">
								</span>
							<?php endif; ?>
							<?php if ( $img2 ) : ?>
								<span class="team_img_hover">
									<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $img2['url'] ); ?>" alt="<?php echo esc_attr( $img2['alt'] ); ?>" width="410" height="464">
								</span>
							<?php endif; ?>
						</div>
						<div class="team_proudbrand_des float-start w-100">
							<h3><?php echo esc_html( get_sub_field( 'name' ) ); ?></h3>
							<small><?php echo esc_html( get_sub_field( 'designation' ) ); ?></small>
							<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
						</div>
					</div>
					<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>
