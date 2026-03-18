<?php
/**
 * Homepage Updates Setup Script
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/setup-homepage-updates.php
 *
 * Creates ACF field groups for new homepage sections and populates content.
 * Updates: hero sub-copy, three pillars, + 3 new sections.
 *
 * Idempotent — safe to run multiple times.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ─────────────────────────────────────────────
// 0. Find the homepage
// ─────────────────────────────────────────────

$front_page_id = (int) get_option( 'page_on_front' );

if ( ! $front_page_id ) {
	// Try to find by template.
	$pages = get_posts( array(
		'post_type'  => 'page',
		'meta_key'   => '_wp_page_template',
		'meta_value' => 'template-home.php',
		'numberposts'=> 1,
		'post_status'=> 'publish',
	));
	if ( ! empty( $pages ) ) {
		$front_page_id = $pages[0]->ID;
	}
}

if ( ! $front_page_id ) {
	WP_CLI::error( 'Could not find the homepage. Set a static front page or ensure template-home.php is assigned.' );
}

WP_CLI::log( "Found homepage (ID: $front_page_id)" );


// ─────────────────────────────────────────────
// 1. Create ACF field group for new homepage sections
// ─────────────────────────────────────────────

if ( ! acf_get_field_group( 'group_home_new_sections' ) ) {
	acf_import_field_group( array(
		'key'    => 'group_home_new_sections',
		'title'  => 'Homepage — New Sections',
		'fields' => array(
			// ── Strategic Partner Statement ──
			array(
				'key'       => 'field_home_partner_tab',
				'label'     => 'Strategic Partner Statement',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_home_partner_heading',
				'label'        => 'Heading',
				'name'         => 'home_partner_heading',
				'type'         => 'text',
				'instructions' => 'Main heading for the partner statement section.',
			),
			array(
				'key'          => 'field_home_partner_body',
				'label'        => 'Body',
				'name'         => 'home_partner_body',
				'type'         => 'wysiwyg',
				'instructions' => 'Two paragraphs explaining the joined-up approach.',
				'tabs'         => 'all',
				'toolbar'      => 'full',
				'media_upload' => 0,
			),

			// ── Social Proof Pull Quote ──
			array(
				'key'       => 'field_home_pull_quote_tab',
				'label'     => 'Pull Quote',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_home_pull_quote',
				'label'        => 'Pull Quote',
				'name'         => 'home_pull_quote',
				'type'         => 'textarea',
				'rows'         => 3,
				'instructions' => 'A powerful statement displayed as a large blockquote.',
			),

			// ── Five-Point Value Proposition ──
			array(
				'key'       => 'field_home_vp_tab',
				'label'     => 'Value Proposition',
				'name'      => '',
				'type'      => 'tab',
				'placement' => 'top',
			),
			array(
				'key'          => 'field_home_vp_heading',
				'label'        => 'Section Heading',
				'name'         => 'home_vp_heading',
				'type'         => 'text',
				'instructions' => 'Heading for the five-point value proposition section.',
			),
			array(
				'key'          => 'field_home_vp_subheading',
				'label'        => 'Section Sub-heading',
				'name'         => 'home_vp_subheading',
				'type'         => 'text',
				'instructions' => 'Supporting line below the heading.',
			),
			array(
				'key'          => 'field_home_vp_points',
				'label'        => 'Value Points',
				'name'         => 'home_vp_points',
				'type'         => 'repeater',
				'min'          => 3,
				'max'          => 5,
				'layout'       => 'block',
				'button_label' => 'Add Point',
				'sub_fields'   => array(
					array(
						'key'           => 'field_home_vp_point_icon',
						'label'         => 'Icon',
						'name'          => 'icon',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail',
						'instructions'  => 'Optional icon image.',
					),
					array(
						'key'   => 'field_home_vp_point_heading',
						'label' => 'Heading',
						'name'  => 'heading',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_home_vp_point_body',
						'label' => 'Body',
						'name'  => 'body',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
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
		'menu_order' => 10,
		'position'   => 'normal',
		'style'      => 'default',
		'active'     => true,
	));

	WP_CLI::success( 'Created ACF field group: Homepage — New Sections' );
} else {
	WP_CLI::log( 'ACF field group "group_home_new_sections" already exists, skipping.' );
}


// ─────────────────────────────────────────────
// 2. Update hero sub-copy
// ─────────────────────────────────────────────

update_field( 'home_bnr_bottom_text', 'We work as your digital partner — not a supplier. Strategy, design, SEO, and AI automation delivered as one joined-up service, with one goal: building organic revenue that keeps growing without paying for every click.', $front_page_id );

WP_CLI::success( 'Updated hero sub-copy.' );


// ─────────────────────────────────────────────
// 3. Update Three Pillars
// ─────────────────────────────────────────────

$pillars = array(
	array(
		'title'       => 'Building your brand?',
		'description' => "<p>A brand people remember is a brand people trust. We craft identities that tell your story, set you apart, and give your business a confident, consistent voice across every touchpoint.</p>\n<p>Brand identity / Concepts & ideas / Design & artwork / Brand guidelines / Advertising campaigns / & everything in between.</p>",
		'image'       => '',
		'button_link' => array(
			'url'    => '/branding-agency/',
			'title'  => '→ Branding',
			'target' => '',
		),
	),
	array(
		'title'       => 'Growing your visibility?',
		'description' => "<p>Your website should be working for you around the clock. We build fast, strategic websites and drive organic traffic through SEO — so the right people find you, and when they do, they convert.</p>\n<p>Website design & build / Organic SEO / Email marketing / E-commerce / Asset development / & all the technical stuff that makes it work.</p>",
		'image'       => '',
		'button_link' => array(
			'url'    => '/web-design/',
			'title'  => '→ Web Design',
			'target' => '',
		),
	),
	array(
		'title'       => 'Working smarter with AI?',
		'description' => "<p>Every hour your team spends on manual tasks is an hour not spent on growing your business. We map your processes, introduce AI automation, and connect your website to the systems you already use — cutting waste, reducing errors, and freeing up your time.</p>\n<p>AI automation / Workflow integration / CRM & system connectivity / Process mapping / Repetitive task elimination / & making your business run leaner.</p>",
		'image'       => '',
		'button_link' => array(
			'url'    => '/ai-automation/',
			'title'  => '→ AI & Automation',
			'target' => '',
		),
	),
);

$result = update_field( 'home_sec3_weve_got_skills', $pillars, $front_page_id );

if ( $result ) {
	WP_CLI::success( 'Updated Three Pillars (3 items including AI & Automation).' );
} else {
	WP_CLI::warning( 'update_field returned false for pillars. Trying manual meta...' );

	// Manual approach for the repeater.
	$wpdb = $GLOBALS['wpdb'];
	$wpdb->query( $wpdb->prepare(
		"DELETE FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key LIKE %s",
		$front_page_id,
		'home_sec3_weve_got_skills%'
	) );

	update_post_meta( $front_page_id, 'home_sec3_weve_got_skills', count( $pillars ) );

	foreach ( $pillars as $i => $pillar ) {
		foreach ( $pillar as $key => $value ) {
			update_post_meta( $front_page_id, "home_sec3_weve_got_skills_{$i}_{$key}", $value );
		}
	}

	WP_CLI::success( 'Updated Three Pillars via manual meta (fallback).' );
}


// ─────────────────────────────────────────────
// 4. Populate Strategic Partner Statement
// ─────────────────────────────────────────────

update_field( 'home_partner_heading', 'Strategy, design, SEO, and automation — working as one.', $front_page_id );

update_field( 'home_partner_body', '<p>Most agencies do one thing. We do the thing that makes all the other things work together. When your brand, website, SEO, and automation all come from the same team, they\'re built to reinforce each other — not to conflict. That\'s how you build a business that grows without constantly feeding the ad machine.</p>

<p>We bring clarity, accountability, and momentum — and we stick around long enough to see it make a difference.</p>', $front_page_id );

WP_CLI::success( 'Populated Strategic Partner Statement fields.' );


// ─────────────────────────────────────────────
// 5. Populate Social Proof Pull Quote
// ─────────────────────────────────────────────

update_field( 'home_pull_quote', "We don't just build things that look good. We build things that work — and then we stick around to make sure they keep working.", $front_page_id );

WP_CLI::success( 'Populated Pull Quote field.' );


// ─────────────────────────────────────────────
// 6. Populate Five-Point Value Proposition
// ─────────────────────────────────────────────

update_field( 'home_vp_heading', 'Five ways we build your organic revenue', $front_page_id );
update_field( 'home_vp_subheading', "We don't do one thing well. We do five things that reinforce each other.", $front_page_id );

$vp_points = array(
	array(
		'icon'    => '',
		'heading' => 'Reduce process times',
		'body'    => 'We identify where time is being lost in your business and fix it — so your team can focus on what actually moves the needle.',
	),
	array(
		'icon'    => '',
		'heading' => 'Automate the repetitive stuff',
		'body'    => 'From lead follow-ups to reporting, we build automations that run in the background so nothing falls through the cracks.',
	),
	array(
		'icon'    => '',
		'heading' => 'Integrate your website into your business',
		'body'    => "Your website shouldn't be isolated. We connect it to your CRM, booking systems, and tools — so data flows where it needs to.",
	),
	array(
		'icon'    => '',
		'heading' => 'Build a brand worth remembering',
		'body'    => 'We create brands that communicate quality and confidence — the kind that make customers choose you before they\'ve spoken to you.',
	),
	array(
		'icon'    => '',
		'heading' => 'Grow your online visibility',
		'body'    => "Through organic SEO and smart content, we help you rank, get found, and build an audience that's yours — not rented from an ad platform.",
	),
);

$result = update_field( 'home_vp_points', $vp_points, $front_page_id );

if ( $result ) {
	WP_CLI::success( 'Populated Five-Point Value Proposition (5 items).' );
} else {
	WP_CLI::warning( 'update_field returned false for VP points. Trying manual meta...' );

	$wpdb = $GLOBALS['wpdb'];
	$wpdb->query( $wpdb->prepare(
		"DELETE FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key LIKE %s",
		$front_page_id,
		'home_vp_points%'
	) );

	update_post_meta( $front_page_id, 'home_vp_points', count( $vp_points ) );

	foreach ( $vp_points as $i => $point ) {
		foreach ( $point as $key => $value ) {
			update_post_meta( $front_page_id, "home_vp_points_{$i}_{$key}", $value );
		}
	}

	WP_CLI::success( 'Populated VP points via manual meta (fallback).' );
}


// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::log( '' );
WP_CLI::log( '──────────────────────────────────────' );
WP_CLI::success( 'Homepage updates complete!' );
WP_CLI::log( "View: http://localhost:10004/" );
WP_CLI::log( "Edit: http://localhost:10004/wp-admin/post.php?post={$front_page_id}&action=edit" );
WP_CLI::log( '──────────────────────────────────────' );
WP_CLI::log( '' );
WP_CLI::log( 'NOTES:' );
WP_CLI::log( '  - Three Pillars: Existing hover images preserved for pillars 1-2.' );
WP_CLI::log( '    Upload a hover image for the new AI pillar (pillar 3) in WP admin.' );
WP_CLI::log( '  - VP icons: Upload icons for each of the 5 value points in WP admin.' );
WP_CLI::log( '  - Template changes in template-home.php are required for new sections to render.' );
