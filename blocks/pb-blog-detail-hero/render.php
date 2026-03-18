<?php
/**
 * PB Blog Detail Hero Block
 *
 * Single post hero with title, date, excerpt, featured image, author, reading time.
 * Source: single.php lines 21-69.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$author_id   = get_post_field( 'post_author', get_the_ID() );
$author_data = get_userdata( $author_id );
$content     = get_post_field( 'post_content', get_the_ID() );
$word_count  = str_word_count( strip_tags( $content ) );
$reading_time = ceil( $word_count / 200 );
?>
<section class="blog_dtl_top_sec">
	<div class="container">
		<div class="blog_dtl_top_div w-100 float-start d-flex justify-content-between">
			<div class="blog_dtl_title">
				<span><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span>
				<h1><?php echo get_the_title(); ?></h1>
				<p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
				<h2 class="post-meta">
					By: <?php echo esc_html( $author_data->display_name ); ?><strong> | </strong>Reading Time: <?php echo esc_html( $reading_time ); ?> minute<?php echo $reading_time > 1 ? 's' : ''; ?>
				</h2>
			</div>
			<div class="blog_dtl_pic">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail(); ?>
				<?php else : ?>
					<img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo esc_url( get_template_directory_uri() . '/images/blog_dtl_pic.webp' ); ?>" alt="blog pic" width="786" height="495">
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
