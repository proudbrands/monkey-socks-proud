<?php
/**
 * Case Studies Setup Script v2
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/setup-case-studies.php
 *
 * Uses ACF's proper internal APIs to register CPT, taxonomy, and field groups.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ─────────────────────────────────────────────
// 1. Register Case Study Post Type via ACF API
// ─────────────────────────────────────────────

$existing_pt = acf_get_post_types( array( 'post_type' => 'case_study' ) );

if ( empty( $existing_pt ) ) {
	$post_type = acf_update_post_type( array(
		'post_type'      => 'case_study',
		'labels'         => array(
			'name'               => 'Case Studies',
			'singular_name'      => 'Case Study',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Case Study',
			'edit_item'          => 'Edit Case Study',
			'new_item'           => 'New Case Study',
			'view_item'          => 'View Case Study',
			'search_items'       => 'Search Case Studies',
			'not_found'          => 'No case studies found',
			'not_found_in_trash' => 'No case studies found in Trash',
			'all_items'          => 'All Case Studies',
			'menu_name'          => 'Case Studies',
		),
		'description'    => 'Client case studies for Visual Identity and SEO/Organic Revenue',
		'public'         => true,
		'hierarchical'   => false,
		'show_ui'        => true,
		'show_in_menu'   => true,
		'menu_icon'      => 'dashicons-analytics',
		'menu_position'  => 5,
		'supports'       => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'has_archive'    => true,
		'rewrite'        => array(
			'slug'       => 'case-studies',
			'with_front' => false,
		),
		'capability_type' => 'post',
		'query_var'       => true,
		'show_in_rest'    => false,
		'active'          => true,
	));

	if ( $post_type ) {
		WP_CLI::success( 'Created ACF Post Type: case_study (ID: ' . $post_type['ID'] . ')' );
	} else {
		WP_CLI::error( 'Failed to create ACF Post Type' );
	}
} else {
	WP_CLI::log( 'ACF Post Type case_study already exists, skipping.' );
}


// ─────────────────────────────────────────────
// 2. Register Case Study Type Taxonomy via ACF
// ─────────────────────────────────────────────

$existing_tax = acf_get_taxonomies( array( 'taxonomy' => 'case_study_type' ) );

if ( empty( $existing_tax ) ) {
	$taxonomy = acf_update_taxonomy( array(
		'taxonomy'    => 'case_study_type',
		'object_type' => array( 'case_study' ),
		'labels'      => array(
			'name'          => 'Case Study Types',
			'singular_name' => 'Case Study Type',
			'add_new_item'  => 'Add New Type',
			'edit_item'     => 'Edit Type',
			'all_items'     => 'All Types',
			'menu_name'     => 'Types',
		),
		'public'       => true,
		'hierarchical' => true,
		'show_ui'      => true,
		'show_in_menu' => true,
		'rewrite'      => array(
			'slug' => 'case-study-type',
		),
		'query_var'    => true,
		'show_in_rest' => false,
		'active'       => true,
	));

	if ( $taxonomy ) {
		WP_CLI::success( 'Created ACF Taxonomy: case_study_type (ID: ' . $taxonomy['ID'] . ')' );
	} else {
		WP_CLI::error( 'Failed to create ACF Taxonomy' );
	}
} else {
	WP_CLI::log( 'ACF Taxonomy case_study_type already exists, skipping.' );
}


// ─────────────────────────────────────────────
// 3. Ensure CPT and Taxonomy are registered now
// ─────────────────────────────────────────────

if ( ! post_type_exists( 'case_study' ) ) {
	register_post_type( 'case_study', array(
		'public'      => true,
		'has_archive' => 'case-studies',
		'rewrite'     => array( 'slug' => 'case-studies', 'with_front' => false ),
		'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
	));
}

if ( ! taxonomy_exists( 'case_study_type' ) ) {
	register_taxonomy( 'case_study_type', 'case_study', array(
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'case-study-type' ),
	));
}


// ─────────────────────────────────────────────
// 4. Create Taxonomy Terms
// ─────────────────────────────────────────────

$terms_to_create = array(
	'Visual Identity' => 'visual-identity',
	'Organic Revenue' => 'organic-revenue',
);

foreach ( $terms_to_create as $name => $slug ) {
	if ( ! term_exists( $name, 'case_study_type' ) ) {
		$result = wp_insert_term( $name, 'case_study_type', array( 'slug' => $slug ) );
		if ( is_wp_error( $result ) ) {
			WP_CLI::warning( "Failed to create term '$name': " . $result->get_error_message() );
		} else {
			WP_CLI::success( "Created term: $name" );
		}
	} else {
		WP_CLI::log( "Term '$name' already exists, skipping." );
	}
}


// ─────────────────────────────────────────────
// 5. ACF Field Groups (unchanged from v1)
// ─────────────────────────────────────────────

// --- SHARED FIELDS (Both Templates) ---
if ( ! acf_get_field_group( 'group_cs_shared' ) ) {
	acf_import_field_group(array(
		'key' => 'group_cs_shared',
		'title' => 'Case Study — Shared Fields',
		'fields' => array(
			array(
				'key' => 'field_cs_hero_tab',
				'label' => 'Hero',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_hero_image',
				'label' => 'Hero Image',
				'name' => 'cs_hero_image',
				'type' => 'image',
				'required' => 1,
				'return_format' => 'array',
				'preview_size' => 'medium',
				'min_width' => 1920,
				'min_height' => 1080,
				'instructions' => 'Flagship deliverable mockup or data visualisation. Minimum 1920x1080px.',
			),
			array(
				'key' => 'field_cs_hero_headline',
				'label' => 'Hero Headline',
				'name' => 'cs_hero_headline',
				'type' => 'text',
				'required' => 1,
				'instructions' => 'Client name or headline stat.',
			),
			array(
				'key' => 'field_cs_hero_descriptor',
				'label' => 'Hero Descriptor',
				'name' => 'cs_hero_descriptor',
				'type' => 'text',
				'required' => 1,
				'instructions' => 'One-line descriptor.',
			),
			array(
				'key' => 'field_cs_testimonial_tab',
				'label' => 'Testimonial',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_testimonial_quote',
				'label' => 'Quote',
				'name' => 'cs_testimonial_quote',
				'type' => 'textarea',
				'required' => 1,
				'rows' => 4,
				'instructions' => 'Client testimonial quote. 2-4 sentences.',
			),
			array(
				'key' => 'field_cs_testimonial_name',
				'label' => 'Client Name',
				'name' => 'cs_testimonial_name',
				'type' => 'text',
				'required' => 1,
			),
			array(
				'key' => 'field_cs_testimonial_title',
				'label' => 'Job Title',
				'name' => 'cs_testimonial_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_cs_testimonial_company',
				'label' => 'Company',
				'name' => 'cs_testimonial_company',
				'type' => 'text',
			),
			array(
				'key' => 'field_cs_testimonial_image',
				'label' => 'Headshot / Logo',
				'name' => 'cs_testimonial_image',
				'type' => 'image',
				'return_format' => 'array',
				'preview_size' => 'thumbnail',
				'instructions' => 'Optional client headshot or company logo.',
			),
			array(
				'key' => 'field_cs_cta_tab',
				'label' => 'CTA',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_cta_heading',
				'label' => 'CTA Heading',
				'name' => 'cs_cta_heading',
				'type' => 'text',
				'required' => 1,
			),
			array(
				'key' => 'field_cs_cta_subtext',
				'label' => 'CTA Subtext',
				'name' => 'cs_cta_subtext',
				'type' => 'text',
			),
			array(
				'key' => 'field_cs_cta_button_text',
				'label' => 'Button Text',
				'name' => 'cs_cta_button_text',
				'type' => 'text',
				'required' => 1,
				'default_value' => 'Start a Project',
			),
			array(
				'key' => 'field_cs_cta_button_url',
				'label' => 'Button URL',
				'name' => 'cs_cta_button_url',
				'type' => 'url',
				'required' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'case_study',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'active' => true,
	));
	WP_CLI::success( 'Created ACF Field Group: Case Study — Shared Fields' );
} else {
	WP_CLI::log( 'Field group group_cs_shared already exists, skipping.' );
}


// --- VISUAL IDENTITY FIELDS ---
if ( ! acf_get_field_group( 'group_cs_visual_identity' ) ) {
	acf_import_field_group(array(
		'key' => 'group_cs_visual_identity',
		'title' => 'Case Study — Visual Identity',
		'fields' => array(
			array(
				'key' => 'field_cs_vi_snapshot_tab',
				'label' => 'Snapshot Bar',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_vi_snapshot_stats',
				'label' => 'Snapshot Stats',
				'name' => 'cs_vi_snapshot_stats',
				'type' => 'repeater',
				'required' => 1,
				'min' => 3,
				'max' => 5,
				'layout' => 'table',
				'instructions' => 'Fast-hit stats. 3-5 items.',
				'sub_fields' => array(
					array(
						'key' => 'field_cs_vi_ss_icon',
						'label' => 'Icon',
						'name' => 'icon',
						'type' => 'select',
						'choices' => array(
							'brand' => 'Brand Identity',
							'clock' => 'Timeline',
							'globe' => 'Markets',
							'chart' => 'Growth',
							'pen' => 'Design',
							'code' => 'Development',
							'rocket' => 'Launch',
							'target' => 'Strategy',
							'users' => 'Team',
							'star' => 'Award',
						),
						'default_value' => 'brand',
					),
					array(
						'key' => 'field_cs_vi_ss_headline',
						'label' => 'Headline',
						'name' => 'headline',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_vi_ss_subtext',
						'label' => 'Subtext',
						'name' => 'subtext',
						'type' => 'text',
					),
				),
			),
			array(
				'key' => 'field_cs_vi_challenge_tab',
				'label' => 'The Challenge',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_vi_challenge_text',
				'label' => 'Challenge Text',
				'name' => 'cs_vi_challenge_text',
				'type' => 'wysiwyg',
				'required' => 1,
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 0,
				'instructions' => '2-3 paragraphs describing pain points before working with you.',
			),
			array(
				'key' => 'field_cs_vi_challenge_image',
				'label' => 'Before Image',
				'name' => 'cs_vi_challenge_image',
				'type' => 'image',
				'return_format' => 'array',
				'preview_size' => 'medium',
				'instructions' => 'Old brand or website screenshot. Recommended: 800x600px.',
			),
			array(
				'key' => 'field_cs_vi_logo_rationale_tab',
				'label' => 'Logo Rationale',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_vi_logo_rationale',
				'label' => 'Logo Rationale',
				'name' => 'cs_vi_logo_rationale',
				'type' => 'wysiwyg',
				'required' => 0,
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 0,
				'instructions' => 'Optional. The thinking behind the logo/brand mark — concept, symbolism, design decisions. 2-4 paragraphs. Leave empty to hide this section.',
			),
			array(
				'key' => 'field_cs_vi_logo_rationale_image',
				'label' => 'Logo Rationale Image',
				'name' => 'cs_vi_logo_rationale_image',
				'type' => 'image',
				'required' => 0,
				'return_format' => 'array',
				'preview_size' => 'medium',
				'instructions' => 'Optional. Logo close-up, blueprint/construction lines, or graphical breakdown of the mark. Recommended: 800x800px or similar square/portrait ratio. Leave empty for full-width text.',
			),
			array(
				'key' => 'field_cs_vi_scope_tab',
				'label' => 'The Scope',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_vi_deliverables',
				'label' => 'Deliverables',
				'name' => 'cs_vi_deliverables',
				'type' => 'repeater',
				'required' => 1,
				'min' => 1,
				'max' => 12,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_cs_vi_del_title',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_vi_del_description',
						'label' => 'Description',
						'name' => 'description',
						'type' => 'text',
					),
					array(
						'key' => 'field_cs_vi_del_icon',
						'label' => 'Icon',
						'name' => 'icon',
						'type' => 'select',
						'choices' => array(
							'none' => 'None',
							'brand' => 'Brand',
							'pen' => 'Design',
							'code' => 'Development',
							'globe' => 'Web',
							'camera' => 'Photography',
							'film' => 'Video',
							'file' => 'Document',
							'palette' => 'Colour',
							'type' => 'Typography',
						),
						'default_value' => 'none',
					),
				),
			),
			array(
				'key' => 'field_cs_vi_deliverables_image',
				'label' => 'Deliverables Image',
				'name' => 'cs_vi_deliverables_image',
				'type' => 'image',
				'return_format' => 'array',
				'preview_size' => 'medium',
				'instructions' => 'Optional brand book spread. Recommended: 1200x800px.',
			),
			array(
				'key' => 'field_cs_vi_showcase_tab',
				'label' => 'The Showcase',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_vi_showcase',
				'label' => 'Showcase Sections',
				'name' => 'cs_vi_showcase',
				'type' => 'flexible_content',
				'instructions' => 'Add showcase content blocks. Repeatable and reorderable.',
				'layouts' => array(
					'layout_full_width_image' => array(
						'key' => 'layout_cs_vi_full_image',
						'name' => 'full_width_image',
						'label' => 'Full-Width Image',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_cs_vi_fw_image',
								'label' => 'Image',
								'name' => 'image',
								'type' => 'image',
								'required' => 1,
								'return_format' => 'array',
								'instructions' => 'Full-width showcase image. Recommended: 1920x1080px.',
							),
							array(
								'key' => 'field_cs_vi_fw_caption',
								'label' => 'Caption',
								'name' => 'caption',
								'type' => 'text',
							),
						),
					),
					'layout_two_col_grid' => array(
						'key' => 'layout_cs_vi_two_col',
						'name' => 'two_column_grid',
						'label' => 'Two-Column Image Grid',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_cs_vi_tc_image_left',
								'label' => 'Left Image',
								'name' => 'image_left',
								'type' => 'image',
								'required' => 1,
								'return_format' => 'array',
							),
							array(
								'key' => 'field_cs_vi_tc_image_right',
								'label' => 'Right Image',
								'name' => 'image_right',
								'type' => 'image',
								'required' => 1,
								'return_format' => 'array',
							),
						),
					),
					'layout_video_embed' => array(
						'key' => 'layout_cs_vi_video',
						'name' => 'video_embed',
						'label' => 'Video Embed',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_cs_vi_video_url',
								'label' => 'Video URL',
								'name' => 'video_url',
								'type' => 'url',
								'required' => 1,
							),
							array(
								'key' => 'field_cs_vi_video_poster',
								'label' => 'Poster Image',
								'name' => 'poster_image',
								'type' => 'image',
								'return_format' => 'array',
							),
						),
					),
					'layout_pull_quote' => array(
						'key' => 'layout_cs_vi_quote',
						'name' => 'pull_quote',
						'label' => 'Pull Quote',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_cs_vi_pq_text',
								'label' => 'Quote Text',
								'name' => 'quote_text',
								'type' => 'textarea',
								'required' => 1,
								'rows' => 3,
							),
						),
					),
				),
				'button_label' => 'Add Showcase Block',
			),
			array(
				'key' => 'field_cs_vi_results_tab',
				'label' => 'Results',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_vi_results',
				'label' => 'Results Stats',
				'name' => 'cs_vi_results',
				'type' => 'repeater',
				'required' => 1,
				'min' => 2,
				'max' => 6,
				'layout' => 'table',
				'instructions' => 'Large animated numbers. Minimum 2 stats.',
				'sub_fields' => array(
					array(
						'key' => 'field_cs_vi_res_number',
						'label' => 'Stat Number',
						'name' => 'stat_number',
						'type' => 'text',
						'required' => 1,
						'instructions' => 'e.g. "250", "98%", "3x"',
					),
					array(
						'key' => 'field_cs_vi_res_label',
						'label' => 'Stat Label',
						'name' => 'stat_label',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_vi_res_supporting',
						'label' => 'Supporting Text',
						'name' => 'supporting_text',
						'type' => 'text',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'case_study',
				),
				array(
					'param' => 'post_taxonomy',
					'operator' => '==',
					'value' => 'case_study_type:visual-identity',
				),
			),
		),
		'menu_order' => 1,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'active' => true,
	));
	WP_CLI::success( 'Created ACF Field Group: Case Study — Visual Identity' );
} else {
	WP_CLI::log( 'Field group group_cs_visual_identity already exists, skipping.' );
}


// --- SEO & ORGANIC REVENUE FIELDS ---
if ( ! acf_get_field_group( 'group_cs_seo' ) ) {
	acf_import_field_group(array(
		'key' => 'group_cs_seo',
		'title' => 'Case Study — SEO & Organic Revenue',
		'fields' => array(
			array(
				'key' => 'field_cs_seo_hero_tab',
				'label' => 'Hero Extras',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_seo_hero_subline',
				'label' => 'Hero Subline',
				'name' => 'cs_seo_hero_subline',
				'type' => 'text',
				'instructions' => 'Industry + timeframe. e.g. "B2B Industrial Supplies - 12-Month Engagement"',
			),
			array(
				'key' => 'field_cs_seo_metrics_tab',
				'label' => 'Headline Metrics',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_seo_metrics',
				'label' => 'Headline Metrics',
				'name' => 'cs_seo_metrics',
				'type' => 'repeater',
				'required' => 1,
				'min' => 3,
				'max' => 5,
				'layout' => 'table',
				'instructions' => '4-5 key performance stats.',
				'sub_fields' => array(
					array(
						'key' => 'field_cs_seo_met_value',
						'label' => 'Value',
						'name' => 'value',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_met_label',
						'label' => 'Label',
						'name' => 'label',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_met_trend',
						'label' => 'Trend',
						'name' => 'trend_arrow',
						'type' => 'select',
						'choices' => array(
							'up' => 'Up',
							'down' => 'Down',
							'neutral' => 'Neutral',
						),
						'default_value' => 'up',
					),
				),
			),
			array(
				'key' => 'field_cs_seo_starting_tab',
				'label' => 'Starting Point',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_seo_starting_text',
				'label' => 'Starting Point Text',
				'name' => 'cs_seo_starting_text',
				'type' => 'wysiwyg',
				'required' => 1,
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 0,
			),
			array(
				'key' => 'field_cs_seo_baseline_metrics',
				'label' => 'Baseline Metrics',
				'name' => 'cs_seo_baseline_metrics',
				'type' => 'repeater',
				'min' => 1,
				'max' => 8,
				'layout' => 'table',
				'sub_fields' => array(
					array(
						'key' => 'field_cs_seo_bm_name',
						'label' => 'Metric Name',
						'name' => 'metric_name',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_bm_value',
						'label' => 'Baseline Value',
						'name' => 'baseline_value',
						'type' => 'text',
						'required' => 1,
					),
				),
			),
			array(
				'key' => 'field_cs_seo_strategy_tab',
				'label' => 'Strategy',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_seo_phases',
				'label' => 'Strategy Phases',
				'name' => 'cs_seo_phases',
				'type' => 'repeater',
				'required' => 1,
				'min' => 3,
				'max' => 5,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_cs_seo_ph_number',
						'label' => 'Phase Number',
						'name' => 'number',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_ph_title',
						'label' => 'Phase Title',
						'name' => 'title',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_ph_description',
						'label' => 'Description',
						'name' => 'description',
						'type' => 'textarea',
						'rows' => 2,
					),
					array(
						'key' => 'field_cs_seo_ph_icon',
						'label' => 'Icon',
						'name' => 'icon',
						'type' => 'select',
						'choices' => array(
							'none' => 'None',
							'search' => 'Search / Audit',
							'chart' => 'Analytics',
							'pen' => 'Content',
							'code' => 'Technical',
							'link' => 'Link Building',
							'target' => 'Strategy',
							'rocket' => 'Launch',
							'globe' => 'Global',
						),
						'default_value' => 'none',
					),
				),
			),
			array(
				'key' => 'field_cs_seo_charts_tab',
				'label' => 'Charts & Data',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_seo_charts',
				'label' => 'Charts',
				'name' => 'cs_seo_charts',
				'type' => 'flexible_content',
				'instructions' => 'Data visualisation blocks. Rendered with Chart.js.',
				'layouts' => array(
					'layout_line_chart' => array(
						'key' => 'layout_cs_seo_line',
						'name' => 'line_chart',
						'label' => 'Line Chart',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_cs_seo_lc_title',
								'label' => 'Chart Title',
								'name' => 'title',
								'type' => 'text',
								'required' => 1,
							),
							array(
								'key' => 'field_cs_seo_lc_data',
								'label' => 'Data Points',
								'name' => 'data',
								'type' => 'repeater',
								'min' => 2,
								'layout' => 'table',
								'sub_fields' => array(
									array(
										'key' => 'field_cs_seo_lc_label',
										'label' => 'Label',
										'name' => 'label',
										'type' => 'text',
										'required' => 1,
									),
									array(
										'key' => 'field_cs_seo_lc_value',
										'label' => 'Value',
										'name' => 'value',
										'type' => 'number',
										'required' => 1,
									),
								),
							),
							array(
								'key' => 'field_cs_seo_lc_annotation',
								'label' => 'Annotation',
								'name' => 'annotation_text',
								'type' => 'textarea',
								'rows' => 2,
							),
						),
					),
					'layout_bar_chart' => array(
						'key' => 'layout_cs_seo_bar',
						'name' => 'bar_chart',
						'label' => 'Bar Chart',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_cs_seo_bc_title',
								'label' => 'Chart Title',
								'name' => 'title',
								'type' => 'text',
								'required' => 1,
							),
							array(
								'key' => 'field_cs_seo_bc_data',
								'label' => 'Data Points',
								'name' => 'data',
								'type' => 'repeater',
								'min' => 2,
								'layout' => 'table',
								'sub_fields' => array(
									array(
										'key' => 'field_cs_seo_bc_label',
										'label' => 'Label',
										'name' => 'label',
										'type' => 'text',
										'required' => 1,
									),
									array(
										'key' => 'field_cs_seo_bc_value',
										'label' => 'Value',
										'name' => 'value',
										'type' => 'number',
										'required' => 1,
									),
								),
							),
							array(
								'key' => 'field_cs_seo_bc_annotation',
								'label' => 'Annotation',
								'name' => 'annotation_text',
								'type' => 'textarea',
								'rows' => 2,
							),
						),
					),
					'layout_area_chart' => array(
						'key' => 'layout_cs_seo_area',
						'name' => 'area_chart',
						'label' => 'Area Chart',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_cs_seo_ac_title',
								'label' => 'Chart Title',
								'name' => 'title',
								'type' => 'text',
								'required' => 1,
							),
							array(
								'key' => 'field_cs_seo_ac_data',
								'label' => 'Data Points',
								'name' => 'data',
								'type' => 'repeater',
								'min' => 2,
								'layout' => 'table',
								'sub_fields' => array(
									array(
										'key' => 'field_cs_seo_ac_label',
										'label' => 'Label',
										'name' => 'label',
										'type' => 'text',
										'required' => 1,
									),
									array(
										'key' => 'field_cs_seo_ac_value',
										'label' => 'Value',
										'name' => 'value',
										'type' => 'number',
										'required' => 1,
									),
								),
							),
							array(
								'key' => 'field_cs_seo_ac_annotation',
								'label' => 'Annotation',
								'name' => 'annotation_text',
								'type' => 'textarea',
								'rows' => 2,
							),
						),
					),
					'layout_comparison_table' => array(
						'key' => 'layout_cs_seo_comparison',
						'name' => 'comparison_table',
						'label' => 'Comparison Table',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_cs_seo_ct_title',
								'label' => 'Table Title',
								'name' => 'title',
								'type' => 'text',
								'required' => 1,
							),
							array(
								'key' => 'field_cs_seo_ct_data',
								'label' => 'Rows',
								'name' => 'data',
								'type' => 'repeater',
								'min' => 2,
								'layout' => 'table',
								'sub_fields' => array(
									array(
										'key' => 'field_cs_seo_ct_label',
										'label' => 'Label',
										'name' => 'label',
										'type' => 'text',
										'required' => 1,
									),
									array(
										'key' => 'field_cs_seo_ct_value',
										'label' => 'Value',
										'name' => 'value',
										'type' => 'text',
										'required' => 1,
									),
								),
							),
							array(
								'key' => 'field_cs_seo_ct_annotation',
								'label' => 'Annotation',
								'name' => 'annotation_text',
								'type' => 'textarea',
								'rows' => 2,
							),
						),
					),
				),
				'button_label' => 'Add Chart',
			),
			array(
				'key' => 'field_cs_seo_chart_callouts',
				'label' => 'Chart Callouts',
				'name' => 'cs_seo_chart_callouts',
				'type' => 'repeater',
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_cs_seo_cc_text',
						'label' => 'Callout Text',
						'name' => 'text',
						'type' => 'textarea',
						'rows' => 3,
						'required' => 1,
					),
				),
			),
			array(
				'key' => 'field_cs_seo_comparison_tab',
				'label' => 'Then vs Now',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_seo_comparison',
				'label' => 'Comparison Metrics',
				'name' => 'cs_seo_comparison',
				'type' => 'repeater',
				'required' => 1,
				'min' => 2,
				'max' => 8,
				'layout' => 'table',
				'sub_fields' => array(
					array(
						'key' => 'field_cs_seo_comp_name',
						'label' => 'Metric',
						'name' => 'metric_name',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_comp_prev',
						'label' => 'Previous',
						'name' => 'previous_value',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_comp_current',
						'label' => 'Current',
						'name' => 'current_value',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_comp_pct',
						'label' => '% Change',
						'name' => 'pct_change',
						'type' => 'text',
					),
				),
			),
			array(
				'key' => 'field_cs_seo_impact_tab',
				'label' => 'Wider Impact',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_seo_impact_cards',
				'label' => 'Impact Cards',
				'name' => 'cs_seo_impact_cards',
				'type' => 'repeater',
				'required' => 1,
				'min' => 3,
				'max' => 4,
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_cs_seo_ic_title',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_ic_description',
						'label' => 'Description',
						'name' => 'description',
						'type' => 'textarea',
						'rows' => 2,
						'required' => 1,
					),
					array(
						'key' => 'field_cs_seo_ic_stat',
						'label' => 'Icon or Stat',
						'name' => 'icon_or_stat',
						'type' => 'text',
					),
				),
			),
			array(
				'key' => 'field_cs_seo_cta_tab',
				'label' => 'CTA Extras',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
			),
			array(
				'key' => 'field_cs_seo_cta_mirror_stat',
				'label' => 'Mirror Stat',
				'name' => 'cs_seo_cta_mirror_stat',
				'type' => 'text',
				'instructions' => 'The key stat to echo in the CTA headline.',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'case_study',
				),
				array(
					'param' => 'post_taxonomy',
					'operator' => '==',
					'value' => 'case_study_type:organic-revenue',
				),
			),
		),
		'menu_order' => 2,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'active' => true,
	));
	WP_CLI::success( 'Created ACF Field Group: Case Study — SEO & Organic Revenue' );
} else {
	WP_CLI::log( 'Field group group_cs_seo already exists, skipping.' );
}


// ─────────────────────────────────────────────
// 6. Flush rewrite rules
// ─────────────────────────────────────────────
flush_rewrite_rules();
WP_CLI::success( 'Flushed rewrite rules. Setup complete!' );
