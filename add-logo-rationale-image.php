<?php
/**
 * Add Logo Rationale Image field to Visual Identity field group.
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/add-logo-rationale-image.php
 *
 * Adds an optional image field after the logo rationale WYSIWYG.
 * Idempotent — safe to run multiple times.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if field already exists.
$existing = acf_get_field( 'field_cs_vi_logo_rationale_image' );
if ( $existing ) {
	WP_CLI::success( 'Field cs_vi_logo_rationale_image already exists, skipping.' );
	return;
}

// Get the existing field group.
$group = acf_get_field_group( 'group_cs_visual_identity' );
if ( ! $group ) {
	WP_CLI::error( 'Field group group_cs_visual_identity not found.' );
	return;
}

// Get the rationale WYSIWYG field to find its menu_order.
$rationale_field = acf_get_field( 'field_cs_vi_logo_rationale' );
if ( ! $rationale_field ) {
	WP_CLI::error( 'Field field_cs_vi_logo_rationale not found.' );
	return;
}

// Get all fields and bump order for anything after the rationale.
$fields = acf_get_fields( $group );
$rationale_order = $rationale_field['menu_order'];

foreach ( $fields as $field ) {
	if ( $field['menu_order'] > $rationale_order ) {
		$field['menu_order'] = $field['menu_order'] + 1;
		acf_update_field( $field );
	}
}

// Insert the image field right after the rationale WYSIWYG.
$new_field = array(
	'key' => 'field_cs_vi_logo_rationale_image',
	'label' => 'Logo Rationale Image',
	'name' => 'cs_vi_logo_rationale_image',
	'type' => 'image',
	'required' => 0,
	'return_format' => 'array',
	'preview_size' => 'medium',
	'instructions' => 'Optional. Logo close-up, blueprint/construction lines, or graphical breakdown of the mark. Recommended: 800x800px or similar square/portrait ratio. Leave empty for full-width text.',
	'parent' => $group['key'],
	'menu_order' => $rationale_order + 1,
);

acf_update_field( $new_field );

WP_CLI::success( 'Added Logo Rationale Image field after the Logo Rationale WYSIWYG.' );
