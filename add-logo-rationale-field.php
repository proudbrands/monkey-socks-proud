<?php
/**
 * Add Logo Rationale field to Visual Identity field group.
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/add-logo-rationale-field.php
 *
 * Adds an optional WYSIWYG field between Challenge and Scope sections.
 * Idempotent — safe to run multiple times.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if field already exists.
$existing = acf_get_field( 'field_cs_vi_logo_rationale' );
if ( $existing ) {
	WP_CLI::success( 'Field cs_vi_logo_rationale already exists, skipping.' );
	return;
}

// Get the existing field group.
$group = acf_get_field_group( 'group_cs_visual_identity' );
if ( ! $group ) {
	WP_CLI::error( 'Field group group_cs_visual_identity not found.' );
	return;
}

// Get current fields.
$fields = acf_get_fields( $group );

// Build the new fields to insert: a tab + WYSIWYG.
$new_tab = array(
	'key' => 'field_cs_vi_logo_rationale_tab',
	'label' => 'Logo Rationale',
	'name' => '',
	'type' => 'tab',
	'placement' => 'top',
	'parent' => $group['key'],
);

$new_field = array(
	'key' => 'field_cs_vi_logo_rationale',
	'label' => 'Logo Rationale',
	'name' => 'cs_vi_logo_rationale',
	'type' => 'wysiwyg',
	'required' => 0,
	'tabs' => 'all',
	'toolbar' => 'full',
	'media_upload' => 0,
	'instructions' => 'Optional. The thinking behind the logo/brand mark — concept, symbolism, design decisions. 2-4 paragraphs. Leave empty to hide this section.',
	'parent' => $group['key'],
);

// Find the position of the Scope tab to insert before it.
$insert_before = null;
foreach ( $fields as $i => $field ) {
	if ( $field['key'] === 'field_cs_vi_scope_tab' ) {
		$insert_before = $i;
		break;
	}
}

if ( $insert_before === null ) {
	WP_CLI::error( 'Could not find field_cs_vi_scope_tab to insert before.' );
	return;
}

// Re-order: set menu_order on all fields, inserting the new ones before the Scope tab.
$order = 0;
foreach ( $fields as $i => $field ) {
	if ( $i === $insert_before ) {
		// Insert new tab and field here.
		$new_tab['menu_order'] = $order++;
		$new_field['menu_order'] = $order++;
	}
	// Update existing field order.
	$field['menu_order'] = $order++;
	acf_update_field( $field );
}

// Now save the new fields.
acf_update_field( $new_tab );
acf_update_field( $new_field );

WP_CLI::success( 'Added Logo Rationale tab + WYSIWYG field to Visual Identity field group (before The Scope tab).' );
