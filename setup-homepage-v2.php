<?php
/**
 * Homepage v2 ACF Field Group Setup
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/setup-homepage-v2.php
 *
 * Creates the "Homepage v2" field group with all fields needed
 * for the new "Choose Your Path" homepage layout.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check ACF is active
if ( ! function_exists( 'acf_import_field_group' ) ) {
	WP_CLI::error( 'ACF Pro is not active. Activate it first.' );
}

// ─────────────────────────────────────────────
// Homepage v2 Field Group
// ─────────────────────────────────────────────

$group_key = 'group_hp_v2';

if ( acf_get_field_group( $group_key ) ) {
	WP_CLI::log( 'Homepage v2 field group already exists. Skipping.' );
} else {

	acf_import_field_group( array(
		'key'                   => $group_key,
		'title'                 => 'Homepage v2',
		'fields'                => array(

			// ═══════════════════════════════════════
			// TAB: Hero
			// ═══════════════════════════════════════
			array(
				'key'       => 'field_hp_hero_tab',
				'label'     => 'Hero',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'top',
			),
			array(
				'key'           => 'field_hp_hero_label',
				'label'         => 'Label',
				'name'          => 'hp_hero_label',
				'type'          => 'text',
				'instructions'  => 'Small uppercase label above the heading. e.g. "Branding / Web / Search / AI"',
			),
			array(
				'key'           => 'field_hp_hero_heading',
				'label'         => 'Heading',
				'name'          => 'hp_hero_heading',
				'type'          => 'textarea',
				'rows'          => 2,
				'new_lines'     => '',
				'required'      => 1,
				'instructions'  => 'Main h1 heading. Keep it punchy.',
			),
			array(
				'key'           => 'field_hp_hero_heading_highlight',
				'label'         => 'Heading Highlight Word(s)',
				'name'          => 'hp_hero_heading_highlight',
				'type'          => 'text',
				'instructions'  => 'Word(s) from the heading to render with the brand gradient. Must match exactly.',
			),
			array(
				'key'           => 'field_hp_hero_subheading',
				'label'         => 'Subheading',
				'name'          => 'hp_hero_subheading',
				'type'          => 'textarea',
				'rows'          => 2,
				'new_lines'     => '',
				'instructions'  => 'One or two sentences below the heading.',
			),
			array(
				'key'           => 'field_hp_hero_bg_image',
				'label'         => 'Background Image',
				'name'          => 'hp_hero_bg_image',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Optional hero background image. Dark overlay is applied automatically.',
			),
			array(
				'key'           => 'field_hp_hero_quiz_label',
				'label'         => 'Quiz Button Label',
				'name'          => 'hp_hero_quiz_label',
				'type'          => 'text',
				'default_value' => 'Discover Your Brand in 3 Minutes',
				'instructions'  => 'Primary CTA button text. Opens the Brand Discovery quiz.',
			),
			array(
				'key'           => 'field_hp_hero_secondary_text',
				'label'         => 'Secondary CTA Text',
				'name'          => 'hp_hero_secondary_text',
				'type'          => 'text',
				'default_value' => 'See Our Work',
			),
			array(
				'key'           => 'field_hp_hero_secondary_url',
				'label'         => 'Secondary CTA URL',
				'name'          => 'hp_hero_secondary_url',
				'type'          => 'url',
				'default_value' => '/case-studies/',
			),

			// ═══════════════════════════════════════
			// TAB: Pain Points
			// ═══════════════════════════════════════
			array(
				'key'       => 'field_hp_pains_tab',
				'label'     => 'Pain Points',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_hp_pains',
				'label'        => 'Pain Points',
				'name'         => 'hp_pains',
				'type'         => 'repeater',
				'min'          => 3,
				'max'          => 5,
				'layout'       => 'block',
				'button_label' => 'Add Pain Point',
				'instructions' => 'Short empathy-driven problem statements visitors will identify with.',
				'sub_fields'   => array(
					array(
						'key'           => 'field_hp_pain_icon',
						'label'         => 'Icon',
						'name'          => 'icon',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail',
						'instructions'  => 'Optional small icon (32x32).',
					),
					array(
						'key'          => 'field_hp_pain_text',
						'label'        => 'Text',
						'name'         => 'text',
						'type'         => 'text',
						'required'     => 1,
						'instructions' => 'e.g. "Your website doesn\'t reflect what you\'ve become"',
					),
				),
			),

			// ═══════════════════════════════════════
			// TAB: Service Pillars
			// ═══════════════════════════════════════
			array(
				'key'       => 'field_hp_pillars_tab',
				'label'     => 'Service Pillars',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_hp_pillars_label',
				'label'        => 'Section Label',
				'name'         => 'hp_pillars_label',
				'type'         => 'text',
				'instructions' => 'e.g. "What We Do"',
			),
			array(
				'key'          => 'field_hp_pillars_heading',
				'label'        => 'Section Heading',
				'name'         => 'hp_pillars_heading',
				'type'         => 'text',
				'instructions' => 'e.g. "What does your brand need right now?"',
			),
			array(
				'key'          => 'field_hp_pillars',
				'label'        => 'Pillars',
				'name'         => 'hp_pillars',
				'type'         => 'repeater',
				'min'          => 4,
				'max'          => 4,
				'layout'       => 'block',
				'button_label' => 'Add Pillar',
				'sub_fields'   => array(
					array(
						'key'           => 'field_hp_pillar_modifier',
						'label'         => 'Colour Variant',
						'name'          => 'modifier',
						'type'          => 'select',
						'required'      => 1,
						'choices'       => array(
							'ai'     => 'AI Automation (Green)',
							'search' => 'Organic Search (Lime)',
							'web'    => 'Web Design (Orange)',
							'brand'  => 'Branding (Cyan)',
						),
						'instructions'  => 'Determines the accent colour for this card.',
					),
					array(
						'key'          => 'field_hp_pillar_icon_svg',
						'label'        => 'Icon SVG',
						'name'         => 'icon_svg',
						'type'         => 'textarea',
						'rows'         => 3,
						'instructions' => 'Paste raw SVG markup for the pillar icon. Keep viewBox and set width/height to 24.',
					),
					array(
						'key'      => 'field_hp_pillar_name',
						'label'    => 'Name',
						'name'     => 'name',
						'type'     => 'text',
						'required' => 1,
					),
					array(
						'key'          => 'field_hp_pillar_description',
						'label'        => 'Description',
						'name'         => 'description',
						'type'         => 'textarea',
						'rows'         => 3,
						'new_lines'    => '',
						'instructions' => 'Outcome-focused copy. What does the client get?',
					),
					array(
						'key'           => 'field_hp_pillar_cta_text',
						'label'         => 'CTA Text',
						'name'          => 'cta_text',
						'type'          => 'text',
						'default_value' => 'Learn More',
						'instructions'  => 'e.g. "Explore Branding"',
					),
					array(
						'key'          => 'field_hp_pillar_link',
						'label'        => 'Link',
						'name'         => 'link',
						'type'         => 'url',
						'required'     => 1,
						'instructions' => 'URL to the relevant service page.',
					),
				),
			),

			// ═══════════════════════════════════════
			// TAB: Case Studies
			// ═══════════════════════════════════════
			array(
				'key'       => 'field_hp_cs_tab',
				'label'     => 'Case Studies',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_hp_cs_label',
				'label'        => 'Section Label',
				'name'         => 'hp_cs_label',
				'type'         => 'text',
				'instructions' => 'e.g. "Proven Results"',
			),
			array(
				'key'           => 'field_hp_cs_featured',
				'label'         => 'Featured Case Studies',
				'name'          => 'hp_cs_featured',
				'type'          => 'relationship',
				'post_type'     => array( 'case_study' ),
				'filters'       => array( 'search', 'taxonomy' ),
				'min'           => 0,
				'max'           => 3,
				'return_format' => 'object',
				'instructions'  => 'Hand-pick up to 3 case studies. Leave empty to show the latest 3.',
			),

			// ═══════════════════════════════════════
			// TAB: Quiz CTA
			// ═══════════════════════════════════════
			array(
				'key'       => 'field_hp_quiz_tab',
				'label'     => 'Quiz CTA',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_hp_quiz_heading',
				'label'        => 'Heading',
				'name'         => 'hp_quiz_heading',
				'type'         => 'text',
				'instructions' => 'e.g. "Not sure where to start?"',
			),
			array(
				'key'          => 'field_hp_quiz_subtext',
				'label'        => 'Subtext',
				'name'         => 'hp_quiz_subtext',
				'type'         => 'textarea',
				'rows'         => 2,
				'new_lines'    => '',
				'instructions' => 'Supporting copy below the heading.',
			),
			array(
				'key'           => 'field_hp_quiz_label',
				'label'         => 'Button Text',
				'name'          => 'hp_quiz_label',
				'type'          => 'text',
				'default_value' => 'Take the Quiz',
			),

			// ═══════════════════════════════════════
			// TAB: Testimonial
			// ═══════════════════════════════════════
			array(
				'key'       => 'field_hp_testimonial_tab',
				'label'     => 'Testimonial',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_hp_testimonial_quote',
				'label'        => 'Quote',
				'name'         => 'hp_testimonial_quote',
				'type'         => 'textarea',
				'rows'         => 4,
				'instructions' => 'The testimonial text. 2-4 sentences.',
			),
			array(
				'key'   => 'field_hp_testimonial_name',
				'label' => 'Name',
				'name'  => 'hp_testimonial_name',
				'type'  => 'text',
			),
			array(
				'key'          => 'field_hp_testimonial_role',
				'label'        => 'Role',
				'name'         => 'hp_testimonial_role',
				'type'         => 'text',
				'instructions' => 'e.g. "CEO, Company Name"',
			),
			array(
				'key'           => 'field_hp_testimonial_photo',
				'label'         => 'Photo',
				'name'          => 'hp_testimonial_photo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
				'instructions'  => 'Headshot or company logo.',
			),
		),

		'location' => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'template-home.php',
				),
			),
		),

		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'show_in_rest'          => 0,
	));

	WP_CLI::success( 'Created Homepage v2 field group.' );
}

WP_CLI::success( 'Homepage v2 setup complete.' );
