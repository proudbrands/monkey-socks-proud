<?php
/**
 * Register custom block category for Proud Brand blocks.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add "Proud Brand" block category.
 *
 * @param array[]                  $block_categories Array of block categories.
 * @param WP_Block_Editor_Context $block_editor_context The current block editor context.
 * @return array[]
 */
function proud_brand_block_categories( $block_categories, $block_editor_context ) {

	array_unshift(
		$block_categories,
		array(
			'slug'  => 'proud-brand',
			'title' => __( 'Proud Brand', 'proud-brand' ),
			'icon'  => 'portfolio',
		)
	);

	return $block_categories;
}
add_filter( 'block_categories_all', 'proud_brand_block_categories', 10, 2 );
