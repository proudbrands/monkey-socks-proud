<?php
/**
 * PB Search Results Block
 *
 * Handles dual search: blog posts (posttype=post) and resources (posttype=resource).
 * Replaces search.php and search-resources.php classic templates.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$search_query      = get_search_query();
$post_type_param   = isset( $_GET['posttype'] ) ? sanitize_text_field( $_GET['posttype'] ) : 'post';
$category_param    = '';
$taxonomy          = 'category';
$tpl_uri           = get_template_directory_uri();

if ( 'resource' === $post_type_param ) {
	$category_param = isset( $_GET['resource_category'] ) ? sanitize_text_field( $_GET['resource_category'] ) : '';
	$taxonomy       = 'resource_category';
} else {
	$category_param = isset( $_GET['category_name'] ) ? sanitize_text_field( $_GET['category_name'] ) : '';
	$taxonomy       = 'category';
}

$category_display = str_replace( '-', ' ', $category_param );

$args = array(
	'post_type'      => $post_type_param,
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	's'              => $search_query,
	'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
);

if ( ! empty( $category_param ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => $category_param,
		),
	);
}

$results_query = new WP_Query( $args );
?>

<?php if ( 'resource' === $post_type_param ) : ?>
<main id="primary" class="site-main">
	<section class="books_sec">
		<div class="container">
			<header class="page-header">
				<h1 class="page-title">
					<?php
					if ( $category_param ) {
						echo 'Search Results for Category: &ldquo; ' . esc_html( $category_display ) . ' &rdquo;,<br> and keywords: &ldquo; ' . esc_html( $search_query ) . ' &rdquo;';
					} else {
						echo 'Search Results for keywords: &ldquo;' . esc_html( $search_query ) . '&rdquo;';
					}
					?>
				</h1>
			</header>

			<div class="book_div w-100 float-start d-grid">
				<?php if ( $results_query->have_posts() ) : ?>
					<?php
					while ( $results_query->have_posts() ) :
						$results_query->the_post();
						?>
						<div class="single_book w-100 float-start text-center">
							<span class="w-100 float-start">
								<a href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail(); ?>
									<?php else : ?>
										<img src="<?php echo esc_url( $tpl_uri . '/images/book.png' ); ?>" alt="">
									<?php endif; ?>
								</a>
							</span>
							<h3><a href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h3>
							<p><?php the_excerpt(); ?></p>
							<a class="primary_btn" href="<?php the_permalink(); ?>?post_id=<?php echo get_the_ID(); ?>">Download <img width="13" height="16" src="<?php echo esc_url( $tpl_uri . '/images/down-arrow.png' ); ?>" alt="down arrow"></a>
						</div>
						<?php
					endwhile;
					?>
				<?php else : ?>
					<span class="no_data">Oops! there is no data related to this query.</span>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main>

<?php else : ?>
<main id="primary" class="site-main">
	<section class="skill_sec blog_sec">
		<div class="container">
			<header class="page-header">
				<h1 class="page-title">
					<?php
					if ( $category_param ) {
						echo 'Search Results for Category: &ldquo; ' . esc_html( $category_display ) . ' &rdquo;,<br> and keywords: &ldquo; ' . esc_html( $search_query ) . ' &rdquo;';
					} else {
						echo 'Search Results for keywords: &ldquo;' . esc_html( $search_query ) . '&rdquo;';
					}
					?>
				</h1>
			</header>

			<div class="article_div w-100 d-grid">
				<?php if ( $results_query->have_posts() ) : ?>
					<?php
					while ( $results_query->have_posts() ) :
						$results_query->the_post();
						?>
						<div class="article smooth w-100 float-start" data-aos="fade-up" data-aos-delay="400">
							<div class="article_pic w-100 float-start">
								<a href="<?php the_permalink(); ?>">
									<img aria-hidden="true" decoding="async" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="banner image" width="430" height="221">
								</a>
							</div>
							<div class="article_des w-100 float-start">
								<span><?php echo get_the_date( 'j-n-Y' ); ?></span>
								<h2><a class="article_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php the_excerpt(); ?></p>
								<a class="read_article" href="<?php the_permalink(); ?>">Read Article</a>
							</div>
						</div>
						<?php
					endwhile;
					?>
				<?php else : ?>
					<span class="no_data">Oops! there is no data related to this query.</span>
				<?php endif; ?>
			</div>
		</div>
	</section>
</main>
<?php endif; ?>

<?php
wp_reset_postdata();
