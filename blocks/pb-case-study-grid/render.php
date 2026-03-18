<?php
/**
 * PB Case Study Grid Block
 *
 * Home page case studies grid with left/right Post Object columns.
 * Source: template-home.php lines 68-156.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading   = get_field( 'home_sec2_heading', get_the_ID() );
$left_posts  = get_field( 'home_sec2_case_studies_left', get_the_ID() );
$right_posts = get_field( 'home_sec2_case_studies_right', get_the_ID() );
$tpl_uri     = get_template_directory_uri();
?>
<section class="case_study_sec">
	<div class="container">
		<?php if ( $heading ) : ?>
			<h2><?php echo wp_kses_post( $heading ); ?></h2>
		<?php endif; ?>
		<div class="case_study_grid w-100 d-grid">
			<div class="case_study_col w-100 float-start">
				<?php
				if ( ! empty( $left_posts ) ) :
					foreach ( $left_posts as $post_obj ) :
						$permalink    = get_permalink( $post_obj->ID );
						$title        = get_the_title( $post_obj->ID );
						$featured_img = get_the_post_thumbnail_url( $post_obj->ID );
						$terms        = get_the_terms( $post_obj->ID, 'our_works_category' );
						?>
						<div class="case_study_box w-100 float-start">
							<div class="cs_img w-100 float-start position-relative">
								<img aria-hidden="true" fetchpriority="high" src="<?php echo esc_url( $featured_img ); ?>" alt="image" width="647" height="604">
								<a href="<?php echo esc_url( $permalink ); ?>">
									<span class="view-more">
										<b><img width="21" height="21" src="<?php echo esc_url( $tpl_uri . '/images/learn_more.png' ); ?>" alt="arrow"></b>
									</span>
								</a>
							</div>
							<div class="cs_dtl w-100 float-start" data-aos="fade-up">
								<h3><?php echo esc_html( $title ); ?></h3>
								<ul class="w-100 float-start">
									<?php
									if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
										foreach ( $terms as $term ) :
											echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
										endforeach;
									endif;
									?>
								</ul>
							</div>
						</div>
						<?php
					endforeach;
				endif;
				?>
			</div>
			<div class="case_study_col w-100 float-start">
				<?php
				if ( ! empty( $right_posts ) ) :
					foreach ( $right_posts as $post_obj ) :
						$permalink    = get_permalink( $post_obj->ID );
						$title        = get_the_title( $post_obj->ID );
						$featured_img = get_the_post_thumbnail_url( $post_obj->ID );
						$terms        = get_the_terms( $post_obj->ID, 'our_works_category' );
						?>
						<div class="case_study_box w-100 float-start">
							<div class="cs_img w-100 float-start position-relative">
								<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $featured_img ); ?>" alt="image" width="647" height="604">
								<a href="<?php echo esc_url( $permalink ); ?>">
									<span class="view-more">
										<b><img width="21" height="21" src="<?php echo esc_url( $tpl_uri . '/images/learn_more.png' ); ?>" alt="arrow"></b>
									</span>
								</a>
							</div>
							<div class="cs_dtl w-100 float-start" data-aos="fade-up">
								<h3><?php echo esc_html( $title ); ?></h3>
								<ul class="w-100 float-start">
									<?php
									if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
										foreach ( $terms as $term ) :
											echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
										endforeach;
									endif;
									?>
								</ul>
							</div>
						</div>
						<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
</section>
