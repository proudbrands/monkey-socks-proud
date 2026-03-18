<?php
/**
 * PB Resources Header Block
 *
 * Resources title, description, search form, and category filter.
 * Source: template-resources.php (first section).
 *
 * ACF Fields (page-level):
 * - resources_sec1_heading
 * - resources_sec1_description
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
			<h1><?php echo wp_kses_post( get_field( 'resources_sec1_heading', get_the_ID() ) ); ?></h1>
			<p><?php echo wp_kses_post( get_field( 'resources_sec1_description', get_the_ID() ) ); ?></p>
		</div>

		<div class="blog_filter_div resources_filter m-auto w-100 d-flex justify-content-between">
			<form role="search" method="get" class="search-form w-100 d-flex justify-content-between" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="blog_search w-100">
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'proud-brand' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
					<input type="hidden" name="posttype" value="resource" />
					<button type="submit" class="search_btn">
						<img width="40" height="40" src="<?php echo esc_url( get_template_directory_uri() . '/images/search.svg' ); ?>" alt="Search">
					</button>
				</div>
				<div class="blog_filter w-100">
					<?php
					wp_dropdown_categories(
						array(
							'show_option_all' => 'Topics',
							'taxonomy'        => 'resource_category',
							'name'            => 'resource_category',
							'orderby'         => 'name',
							'selected'        => isset( $_GET['resource_category'] ) ? sanitize_text_field( $_GET['resource_category'] ) : '',
							'hide_empty'      => false,
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
