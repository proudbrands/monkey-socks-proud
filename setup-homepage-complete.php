<?php
/**
 * Homepage Complete — Add Missing ACF Fields to group_hp_v2
 *
 * Adds Stats Bar, OSOF Methodology, Process, FAQ, Extras tabs and fields,
 * plus extra fields for Case Studies and Quiz CTA sections.
 *
 * Include from functions.php:
 *   require_once get_template_directory() . '/setup-homepage-complete.php';
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'acf/include_fields', function () {

	if ( ! function_exists( 'acf_add_local_field' ) ) {
		return;
	}

	$parent = 'group_hp_v2';

	// ═══════════════════════════════════════
	// TAB: Stats Bar
	// ═══════════════════════════════════════
	acf_add_local_field( array(
		'key'       => 'field_hp_stats_tab',
		'label'     => 'Stats Bar',
		'name'      => '',
		'type'      => 'tab',
		'placement' => 'top',
		'parent'    => $parent,
	) );

	acf_add_local_field( array(
		'key'          => 'field_hp_stats',
		'label'        => 'Stats',
		'name'         => 'hp_stats',
		'type'         => 'repeater',
		'min'          => 2,
		'max'          => 6,
		'layout'       => 'table',
		'button_label' => 'Add Stat',
		'parent'       => $parent,
		'sub_fields'   => array(
			array(
				'key'      => 'field_hp_stats_number',
				'label'    => 'Number',
				'name'     => 'number',
				'type'     => 'text',
				'required' => 1,
			),
			array(
				'key'      => 'field_hp_stats_label',
				'label'    => 'Label',
				'name'     => 'label',
				'type'     => 'text',
				'required' => 1,
			),
		),
	) );

	// ═══════════════════════════════════════
	// TAB: OSOF Methodology
	// ═══════════════════════════════════════
	acf_add_local_field( array(
		'key'       => 'field_hp_osof_tab',
		'label'     => 'OSOF Methodology',
		'name'      => '',
		'type'      => 'tab',
		'placement' => 'top',
		'parent'    => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_osof_label',
		'label'         => 'Section Label',
		'name'          => 'hp_osof_label',
		'type'          => 'text',
		'default_value' => 'OUR METHODOLOGY',
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_osof_title',
		'label'         => 'Title',
		'name'          => 'hp_osof_title',
		'type'          => 'text',
		'default_value' => 'Found everywhere your customers look.',
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'    => 'field_hp_osof_intro',
		'label'  => 'Intro',
		'name'   => 'hp_osof_intro',
		'type'   => 'textarea',
		'rows'   => 3,
		'parent' => $parent,
	) );

	acf_add_local_field( array(
		'key'          => 'field_hp_osof_steps',
		'label'        => 'OSOF Steps',
		'name'         => 'hp_osof_steps',
		'type'         => 'repeater',
		'min'          => 2,
		'max'          => 6,
		'layout'       => 'block',
		'button_label' => 'Add Step',
		'parent'       => $parent,
		'sub_fields'   => array(
			array(
				'key'      => 'field_hp_osof_step_title',
				'label'    => 'Title',
				'name'     => 'title',
				'type'     => 'text',
				'required' => 1,
			),
			array(
				'key'      => 'field_hp_osof_step_text',
				'label'    => 'Text',
				'name'     => 'text',
				'type'     => 'textarea',
				'rows'     => 3,
				'required' => 1,
			),
		),
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_osof_cta_text',
		'label'         => 'CTA Text',
		'name'          => 'hp_osof_cta_text',
		'type'          => 'text',
		'default_value' => 'Learn More About OSOF',
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_osof_cta_url',
		'label'         => 'CTA URL',
		'name'          => 'hp_osof_cta_url',
		'type'          => 'url',
		'default_value' => '/osof/',
		'parent'        => $parent,
	) );

	// ═══════════════════════════════════════
	// Case Studies — Extra Fields
	// (Added to existing Case Studies tab)
	// ═══════════════════════════════════════
	acf_add_local_field( array(
		'key'          => 'field_hp_cs_heading',
		'label'        => 'Section Heading',
		'name'         => 'hp_cs_heading',
		'type'         => 'text',
		'instructions' => 'e.g. Real businesses. Measurable growth.',
		'parent'       => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_cs_cta_text',
		'label'         => 'CTA Text',
		'name'          => 'hp_cs_cta_text',
		'type'          => 'text',
		'default_value' => 'View All Case Studies',
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_cs_cta_url',
		'label'         => 'CTA URL',
		'name'          => 'hp_cs_cta_url',
		'type'          => 'url',
		'default_value' => '/case-studies/',
		'parent'        => $parent,
	) );

	// ═══════════════════════════════════════
	// Quiz CTA — Extra Fields
	// (Added to existing Quiz CTA tab)
	// ═══════════════════════════════════════
	acf_add_local_field( array(
		'key'           => 'field_hp_quiz_primary_url',
		'label'         => 'Primary CTA URL',
		'name'          => 'hp_quiz_primary_url',
		'type'          => 'url',
		'default_value' => '/branding-quiz/',
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_quiz_secondary_text',
		'label'         => 'Secondary CTA Text',
		'name'          => 'hp_quiz_secondary_text',
		'type'          => 'text',
		'default_value' => 'Book a Free Strategy Call',
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_quiz_secondary_url',
		'label'         => 'Secondary CTA URL',
		'name'          => 'hp_quiz_secondary_url',
		'type'          => 'url',
		'default_value' => '/contact/',
		'parent'        => $parent,
	) );

	// ═══════════════════════════════════════
	// TAB: Process
	// ═══════════════════════════════════════
	acf_add_local_field( array(
		'key'       => 'field_hp_process_tab',
		'label'     => 'Process',
		'name'      => '',
		'type'      => 'tab',
		'placement' => 'top',
		'parent'    => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_process_title',
		'label'         => 'Title',
		'name'          => 'hp_process_title',
		'type'          => 'text',
		'default_value' => 'Working with us is simple.',
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'    => 'field_hp_process_subtitle',
		'label'  => 'Subtitle',
		'name'   => 'hp_process_subtitle',
		'type'   => 'textarea',
		'rows'   => 2,
		'parent' => $parent,
	) );

	acf_add_local_field( array(
		'key'          => 'field_hp_process_steps',
		'label'        => 'Process Steps',
		'name'         => 'hp_process_steps',
		'type'         => 'repeater',
		'min'          => 2,
		'max'          => 6,
		'layout'       => 'block',
		'button_label' => 'Add Step',
		'parent'       => $parent,
		'sub_fields'   => array(
			array(
				'key'      => 'field_hp_process_step_title',
				'label'    => 'Title',
				'name'     => 'title',
				'type'     => 'text',
				'required' => 1,
			),
			array(
				'key'      => 'field_hp_process_step_text',
				'label'    => 'Text',
				'name'     => 'text',
				'type'     => 'textarea',
				'rows'     => 3,
				'required' => 1,
			),
		),
	) );

	// ═══════════════════════════════════════
	// TAB: FAQ
	// ═══════════════════════════════════════
	acf_add_local_field( array(
		'key'       => 'field_hp_faq_tab',
		'label'     => 'FAQ',
		'name'      => '',
		'type'      => 'tab',
		'placement' => 'top',
		'parent'    => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_faq_title',
		'label'         => 'Title',
		'name'          => 'hp_faq_title',
		'type'          => 'text',
		'default_value' => "Got questions? We've got answers.",
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'          => 'field_hp_faq_items',
		'label'        => 'FAQ Items',
		'name'         => 'hp_faq_items',
		'type'         => 'repeater',
		'min'          => 1,
		'max'          => 12,
		'layout'       => 'block',
		'button_label' => 'Add FAQ',
		'parent'       => $parent,
		'sub_fields'   => array(
			array(
				'key'      => 'field_hp_faq_item_question',
				'label'    => 'Question',
				'name'     => 'question',
				'type'     => 'text',
				'required' => 1,
			),
			array(
				'key'          => 'field_hp_faq_item_answer',
				'label'        => 'Answer',
				'name'         => 'answer',
				'type'         => 'wysiwyg',
				'toolbar'      => 'basic',
				'media_upload' => 0,
				'required'     => 1,
			),
		),
	) );

	// ═══════════════════════════════════════
	// TAB: Extras
	// ═══════════════════════════════════════
	acf_add_local_field( array(
		'key'       => 'field_hp_extras_tab',
		'label'     => 'Extras',
		'name'      => '',
		'type'      => 'tab',
		'placement' => 'top',
		'parent'    => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_logos_heading',
		'label'         => 'Client Logos Heading',
		'name'          => 'hp_logos_heading',
		'type'          => 'text',
		'default_value' => 'PROUD TO WORK WITH',
		'instructions'  => 'Client logos marquee heading',
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_tech_heading',
		'label'         => 'Tech Partners Heading',
		'name'          => 'hp_tech_heading',
		'type'          => 'text',
		'default_value' => 'POWERED BY THE BEST TOOLS',
		'instructions'  => 'Tech partners marquee heading',
		'parent'        => $parent,
	) );

	acf_add_local_field( array(
		'key'           => 'field_hp_articles_heading',
		'label'         => 'Featured Articles Heading',
		'name'          => 'hp_articles_heading',
		'type'          => 'text',
		'default_value' => 'Insights & Resources',
		'instructions'  => 'Featured articles section heading',
		'parent'        => $parent,
	) );

} );
