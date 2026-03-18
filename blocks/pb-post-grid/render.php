<?php
/**
 * PB Post Grid Block
 *
 * Blog post grid with AJAX load more.
 * Source: template-blog.php (second section).
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_page = max( 1, get_query_var( 'paged' ) );
$counter      = 1;

$args = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 6,
	'order'          => 'DESC',
	'paged'          => $current_page,
);

$query = new WP_Query( $args );
?>
<section class="skill_sec blog_sec">
	<div class="container">
		<div class="article_div w-100 d-grid" id="loadMoreContent">
			<?php
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$delay = 200 + ( $counter * 200 );
					?>
					<div class="article smooth w-100 float-start" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
						<div class="article_pic w-100 float-start">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail(); ?>
								<?php else : ?>
									<img aria-hidden="true" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/article_1.webp' ); ?>" alt="banner image" width="430" height="221">
								<?php endif; ?>
							</a>
						</div>
						<div class="article_des w-100 float-start">
							<span><?php echo esc_html( get_the_date( 'j-n-Y' ) ); ?></span>
							<h2><a class="article_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
							<a class="read_article" href="<?php the_permalink(); ?>">Read Article</a>
						</div>
					</div>
					<?php
					$counter++;
				}
				wp_reset_postdata();
			}
			?>
		</div>

		<?php
		$total_pages = $query->max_num_pages;
		if ( $total_pages > 1 ) :
			?>
			<div class="load_more_prjcts w-100 float-start text-center mt-0" id="viewMoreDriveDiv">
				<a id="loadMore" href="javascript:void(0)" total_Pages="<?php echo esc_attr( $total_pages ); ?>" current_Page="<?php echo esc_attr( $current_page ); ?>" next_Page="<?php echo esc_attr( $current_page + 1 ); ?>">
					<div class="spinner-border" role="status" id="spinninggLoader">
						<span class="visually-hidden">Loading...</span>
					</div> Load More <span>+</span>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
