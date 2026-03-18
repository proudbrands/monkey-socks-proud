<?php
/**
 * PB Blog Header Block
 *
 * Blog title, description, search form, and category filter.
 * Source: template-blog.php (first section).
 *
 * ACF Fields (page-level):
 * - blog_sec1_heading
 * - blog_sec1_description
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="blog_top_sec">
	<div class="container">
		<div class="blog_title w-100 float-start d-flex justify-content-between">
			<h1><?php echo wp_kses_post( get_field( 'blog_sec1_heading', get_the_ID() ) ); ?></h1>
			<p><?php echo wp_kses_post( get_field( 'blog_sec1_description', get_the_ID() ) ); ?></p>
		</div>

		<div class="blog_filter_div m-auto w-100">
			<form role="search" method="get" class="search-form w-100 d-flex justify-content-between" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="blog_search w-100">
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'proud-brand' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
					<input type="hidden" name="posttype" value="post" />
					<button type="submit" class="search_btn">
						<img width="40" height="40" src="<?php echo esc_url( get_template_directory_uri() . '/images/search.svg' ); ?>" alt="Search">
					</button>
				</div>
				<div class="blog_filter blog_filter02 w-100">
					<?php
					wp_dropdown_categories(
						array(
							'show_option_all' => 'Topics',
							'taxonomy'        => 'category',
							'name'            => 'category_name',
							'orderby'         => 'name',
							'selected'        => isset( $_GET['category_name'] ) ? sanitize_text_field( $_GET['category_name'] ) : '',
							'hide_empty'      => true,
							'value_field'     => 'slug',
						)
					);
					?>
				</div>
				<button type="submit" class="search_btn">
					<img width="40" height="40" src="<?php echo esc_url( get_template_directory_uri() . '/images/search.svg' ); ?>" alt="Search">
				</button>
			</form>
		</div>
	</div>
</section>
