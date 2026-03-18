<?php
/**
 * PB Our Work Grid Block
 *
 * Complex multi-query grid: 2+2 columns, 1 full-width, 2 bottom, load more.
 * Source: archive-our_work.php lines 64-305.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$selected_term   = isset( $_GET['term'] ) ? sanitize_text_field( $_GET['term'] ) : '';
$displayed_posts = array();
$tpl_uri         = get_template_directory_uri();

// Helper: render a case study card
function pb_render_work_card( $tpl_uri, $size = 'full' ) {
	$image_url = has_post_thumbnail()
		? get_the_post_thumbnail_url( get_the_ID(), $size )
		: $tpl_uri . '/images/cs_4.webp';
	?>
	<div class="case_study_box w-100 float-start">
		<div class="cs_img w-100 float-start position-relative">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( $size, array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
			<?php else : ?>
				<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $tpl_uri . '/images/cs_4.webp' ); ?>" alt="image" width="647" height="604">
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>">
				<span class="view-more">
					<b><img width="21" height="21" src="<?php echo esc_url( $tpl_uri . '/images/learn_more.png' ); ?>" alt="arrow"></b>
				</span>
			</a>
		</div>
		<div class="cs_dtl w-100 float-start" data-aos="fade-up">
			<h3><?php the_title(); ?></h3>
			<ul class="w-100 float-start">
				<?php
				$post_terms = get_the_terms( get_the_ID(), 'our_works_category' );
				if ( $post_terms && ! is_wp_error( $post_terms ) ) :
					foreach ( $post_terms as $term ) :
						echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
					endforeach;
				endif;
				?>
			</ul>
		</div>
	</div>
	<?php
}

// Build base args
$base_args = array(
	'post_type' => 'our_work',
	'order'     => 'DESC',
);

if ( ! empty( $selected_term ) ) {
	$base_args['tax_query'] = array(
		array(
			'taxonomy' => 'our_works_category',
			'field'    => 'slug',
			'terms'    => $selected_term,
		),
	);
}

// Section 1: First column (2 posts)
$args  = array_merge( $base_args, array( 'posts_per_page' => 2 ) );
$query = new WP_Query( $args );
?>

<section class="case_study_sec our_work_sec">
	<div class="container">
		<div class="case_study_grid w-100 d-grid">
			<div class="case_study_col w-100 float-start">
				<?php
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();
						$displayed_posts[] = get_the_ID();
						pb_render_work_card( $tpl_uri );
					endwhile;
				else :
					echo '<p>No case studies found.</p>';
				endif;
				?>
			</div>

			<?php // Section 2: Second column (2 posts, excluding displayed)
			$args2  = array_merge( $base_args, array(
				'posts_per_page' => 2,
				'post__not_in'   => $displayed_posts,
			) );
			$query2 = new WP_Query( $args2 );
			?>
			<div class="case_study_col w-100 float-start">
				<?php
				if ( $query2->have_posts() ) :
					while ( $query2->have_posts() ) :
						$query2->the_post();
						$displayed_posts[] = get_the_ID();
						pb_render_work_card( $tpl_uri );
					endwhile;
				else :
					echo '<p>No case studies found.</p>';
				endif;
				?>
			</div>
		</div>

		<?php // Section 3: Full-width card (1 post)
		$args3  = array_merge( $base_args, array(
			'posts_per_page' => 1,
			'post__not_in'   => $displayed_posts,
		) );
		$query3 = new WP_Query( $args3 );
		?>
		<div class="case_study_box case_study_box_full w-100 float-start">
			<?php
			if ( $query3->have_posts() ) :
				while ( $query3->have_posts() ) :
					$query3->the_post();
					$displayed_posts[] = get_the_ID();
					?>
					<div class="cs_img w-100 float-start position-relative">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'full', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
						<?php else : ?>
							<picture>
								<source media="(max-width: 767px)" srcset="<?php echo esc_url( $tpl_uri . '/images/cs_full_pic.webp' ); ?>">
								<source media="(min-width: 767px)" srcset="<?php echo esc_url( $tpl_uri . '/images/cs_full_pic.webp' ); ?>">
								<img aria-hidden="true" loading="lazy" decoding="async" src="<?php echo esc_url( $tpl_uri . '/images/cs_full_pic.webp' ); ?>" alt="banner image" width="1440" height="648">
							</picture>
						<?php endif; ?>
						<a href="<?php the_permalink(); ?>">
							<span class="view-more"><b><img width="21" height="21" src="<?php echo esc_url( $tpl_uri . '/images/learn_more.png' ); ?>" alt="arrow"></b></span>
						</a>
					</div>
					<div class="cs_dtl w-100 float-start" data-aos="fade-up">
						<h3><?php the_title(); ?></h3>
						<ul class="w-100 float-start">
							<?php
							$post_terms = get_the_terms( get_the_ID(), 'our_works_category' );
							if ( $post_terms && ! is_wp_error( $post_terms ) ) :
								foreach ( $post_terms as $term ) :
									echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
								endforeach;
							endif;
							?>
						</ul>
					</div>
					<?php
				endwhile;
			else :
				echo '<p>No case studies found.</p>';
			endif;
			?>
		</div>

		<?php // Section 4: Bottom two + load more
		$args4  = array_merge( $base_args, array(
			'posts_per_page' => 2,
			'post__not_in'   => $displayed_posts,
		) );
		$query4 = new WP_Query( $args4 );
		?>
		<div class="case_study_col Btm_two_prjcts w-100 float-start d-grid" id="loadMoreContentWork">
			<?php
			if ( $query4->have_posts() ) :
				while ( $query4->have_posts() ) :
					$query4->the_post();
					$displayed_posts[] = get_the_ID();
					pb_render_work_card( $tpl_uri );
				endwhile;
			else :
				echo '<p>No case studies found.</p>';
			endif;
			?>
		</div>

		<?php
		$total_pages = $query->max_num_pages;
		if ( $total_pages > 1 ) :
			$current_page = max( 1, get_query_var( 'paged' ) );
			?>
			<div class="load_more_prjcts w-100 float-start text-center" id="viewMoreDriveDivWork">
				<a id="loadMoreWork" href="javascript:void(0)" total_Pages="<?php echo esc_attr( $total_pages ); ?>" current_Page="<?php echo esc_attr( $current_page ); ?>" next_Page="<?php echo esc_attr( $current_page + 1 ); ?>">
					<div class="spinner-border" role="status" id="spinninggLoaderWork">
						<span class="visually-hidden">Loading...</span>
					</div> Load More <span>+</span>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php wp_reset_postdata(); ?>
