<?php
/**
 * PB Resource Grid Block
 *
 * Resource post grid with AJAX load more.
 * Source: template-resources.php (second section).
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_page = max( 1, get_query_var( 'paged' ) );

$args = array(
	'post_type'      => 'resource',
	'post_status'    => 'publish',
	'posts_per_page' => 6,
	'order'          => 'DESC',
	'paged'          => $current_page,
);

$query = new WP_Query( $args );
?>
<section class="books_sec">
	<div class="container">
		<div class="book_div w-100 float-start d-grid" id="loadmoreDivResource">
			<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
					<div class="single_book w-100 float-start text-center">
						<span class="w-100 float-start">
							<a href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail(); ?>
								<?php else : ?>
									<img src="<?php echo esc_url( get_template_directory_uri() . '/images/book.png' ); ?>" alt="">
								<?php endif; ?>
							</a>
						</span>
						<h3><a href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
						<a class="primary_btn" href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>">Download <img width="13" height="16" src="<?php echo esc_url( get_template_directory_uri() . '/images/down-arrow.png' ); ?>" alt="down arrow"></a>
					</div>
					<?php
				}
				wp_reset_postdata();
			}
			?>
		</div>

		<?php
		$total_pages = $query->max_num_pages;
		if ( $total_pages > 1 ) :
			?>
			<div class="load_more_prjcts w-100 float-start text-center mt-0" id="viewMoreDriveDivResource">
				<a id="loadMoreResource" href="javascript:void(0)" total_Pages="<?php echo esc_attr( $total_pages ); ?>" current_Page="<?php echo esc_attr( $current_page ); ?>" next_Page="<?php echo esc_attr( $current_page + 1 ); ?>">
					<div class="spinner-border" role="status" id="spinninggLoaderResource">
						<span class="visually-hidden">Loading...</span>
					</div> Load More <span>+</span>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
