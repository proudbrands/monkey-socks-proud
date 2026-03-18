<?php
/**
 * Create Case Study: The Peacock Country Inn
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-peacock-case-study.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Ensure CPT and taxonomy are registered
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

// Check if post already exists
$existing = get_posts(array(
	'post_type'  => 'case_study',
	'title'      => 'The Peacock Country Inn',
	'post_status' => array( 'publish', 'draft' ),
	'numberposts' => 1,
));

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'Case study "The Peacock Country Inn" already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post(array(
	'post_type'    => 'case_study',
	'post_title'   => 'The Peacock Country Inn',
	'post_name'    => 'the-peacock-country-inn',
	'post_status'  => 'draft',
	'post_excerpt' => 'A digital reinvention designed to increase occupancy, fill restaurant covers, and reposition a Chilterns inn as a destination.',
	'post_content' => '',
));

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::success( "Created case study post ID: $post_id" );

// ─────────────────────────────────────────────
// 2. Assign taxonomy term: Visual Identity
// ─────────────────────────────────────────────

$term = term_exists( 'Visual Identity', 'case_study_type' );
if ( ! $term ) {
	$term = wp_insert_term( 'Visual Identity', 'case_study_type', array( 'slug' => 'visual-identity' ) );
}

if ( ! is_wp_error( $term ) ) {
	$term_id = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
	wp_set_object_terms( $post_id, $term_id, 'case_study_type' );
	WP_CLI::success( "Assigned term: Visual Identity (ID: $term_id)" );
} else {
	WP_CLI::warning( 'Could not assign taxonomy term.' );
}

// ─────────────────────────────────────────────
// 3. Shared ACF Fields
// ─────────────────────────────────────────────

// Hero
update_field( 'field_cs_hero_headline', 'The Peacock Country Inn', $post_id );
update_field( 'field_cs_hero_descriptor', 'A digital reinvention designed to increase occupancy, fill restaurant covers, and reposition a Chilterns inn as a destination.', $post_id );

// Testimonial
update_field( 'field_cs_testimonial_quote', 'The new website finally reflects what The Peacock Country Inn is about. It gives guests confidence, showcases our food and rooms properly, and supports both our local and destination business. It\'s become a genuine part of how we grow, not just something we maintain.', $post_id );
update_field( 'field_cs_testimonial_name', 'Emma Saville', $post_id );
update_field( 'field_cs_testimonial_title', 'Co-Owner', $post_id );
update_field( 'field_cs_testimonial_company', 'The Peacock Country Inn', $post_id );

// CTA
update_field( 'field_cs_cta_heading', 'Ready to turn your website into a revenue asset?', $post_id );
update_field( 'field_cs_cta_subtext', 'Hospitality websites should sell the experience, not just describe it.', $post_id );
update_field( 'field_cs_cta_button_text', 'Start a Conversation', $post_id );
update_field( 'field_cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields.' );

// ─────────────────────────────────────────────
// 4. Visual Identity — Snapshot Stats (Repeater)
// ─────────────────────────────────────────────

$snapshot_stats = array(
	array(
		'icon'     => 'brand',
		'headline' => 'Brand-Led Website Redesign',
		'subtext'  => 'Hospitality-focused digital identity',
	),
	array(
		'icon'     => 'chart',
		'headline' => 'Occupancy-Led Strategy',
		'subtext'  => 'From 50% toward 80% target',
	),
	array(
		'icon'     => 'target',
		'headline' => 'Dual-Market Positioning',
		'subtext'  => 'Local diners + destination guests',
	),
	array(
		'icon'     => 'pen',
		'headline' => 'Food & Experience First',
		'subtext'  => 'Dining, rooms, and setting',
	),
	array(
		'icon'     => 'code',
		'headline' => 'Future-Proof Platform',
		'subtext'  => 'Booking-system ready WordPress CMS',
	),
);

update_field( 'field_cs_vi_snapshot_stats', $snapshot_stats, $post_id );
WP_CLI::success( 'Set snapshot stats (5 items).' );

// ─────────────────────────────────────────────
// 5. Visual Identity — Challenge
// ─────────────────────────────────────────────

$challenge_text = '<p>The Peacock Country Inn is a well-regarded country inn set in the Chilterns, offering accommodation, dining, and corporate facilities. Despite strong fundamentals, its digital presence did not reflect the quality of the experience on site or support the business goals required to grow sustainably.</p>

<p>Hotel occupancy sat at approximately 50%, restaurant trade underperformed midweek and at weekends, and the website failed to clearly communicate why The Peacock was worth travelling for. Corporate guests, leisure visitors, and local diners were all being spoken to in the same generic way.</p>

<p>The challenge was to create a website that worked as a revenue-driving asset, not a brochure. It needed to build confidence, showcase food and accommodation properly, support both local and destination SEO, and give the team a platform they could actively use to promote menus, events, and offers without technical friction.</p>';

update_field( 'field_cs_vi_challenge_text', $challenge_text, $post_id );
WP_CLI::success( 'Set challenge text.' );

// ─────────────────────────────────────────────
// 6. Visual Identity — Deliverables (Repeater)
// ─────────────────────────────────────────────

$deliverables = array(
	array(
		'title'       => 'Digital Brand Identity System',
		'description' => 'Refined colour palette, typography, and visual hierarchy around the existing logo.',
		'icon'        => 'brand',
	),
	array(
		'title'       => 'Website UX & Information Architecture',
		'description' => 'Structured pages around guest intent: stay, dine, meet, explore.',
		'icon'        => 'globe',
	),
	array(
		'title'       => 'Hospitality-Focused Website Design',
		'description' => 'Homepage and templates designed to foreground food, rooms, and setting.',
		'icon'        => 'pen',
	),
	array(
		'title'       => 'WordPress CMS Development',
		'description' => 'Mobile-responsive build with flexible content management for the internal team.',
		'icon'        => 'code',
	),
	array(
		'title'       => 'Booking System Integration',
		'description' => 'Guestline (Rezlynx) integration with future migration readiness.',
		'icon'        => 'code',
	),
	array(
		'title'       => 'Local & Destination SEO Foundations',
		'description' => 'Dual SEO strategy targeting nearby diners and Chilterns visitors.',
		'icon'        => 'none',
	),
	array(
		'title'       => 'Email Capture & Analytics',
		'description' => 'Mailchimp integration, Google Analytics, and conversion tracking.',
		'icon'        => 'file',
	),
);

update_field( 'field_cs_vi_deliverables', $deliverables, $post_id );
WP_CLI::success( 'Set deliverables (7 items).' );

// ─────────────────────────────────────────────
// 7. Visual Identity — Showcase (Flexible Content)
// ─────────────────────────────────────────────

$showcase = array(
	array(
		'acf_fc_layout' => 'full_width_image',
		'caption'       => 'Homepage hero highlighting the inn, setting, and positioning.',
	),
	array(
		'acf_fc_layout' => 'two_column_grid',
	),
	array(
		'acf_fc_layout' => 'pull_quote',
		'quote_text'    => 'The website needed to make people feel hungry, curious, and confident before they ever arrived.',
	),
	array(
		'acf_fc_layout' => 'full_width_image',
		'caption'       => 'Dining page with menus and seasonal promotion blocks.',
	),
	array(
		'acf_fc_layout' => 'two_column_grid',
	),
);

update_field( 'field_cs_vi_showcase', $showcase, $post_id );
WP_CLI::success( 'Set showcase (5 blocks: 2 full-width images, 2 two-column grids, 1 pull quote).' );

// ─────────────────────────────────────────────
// 8. Visual Identity — Results (Repeater)
// ─────────────────────────────────────────────

$results = array(
	array(
		'stat_number'     => 'Clear',
		'stat_label'      => 'Market Positioning',
		'supporting_text' => 'Local dining and destination stays separated',
	),
	array(
		'stat_number'     => 'Faster',
		'stat_label'      => 'Booking Journeys',
		'supporting_text' => 'Reduced friction for rooms and tables',
	),
	array(
		'stat_number'     => 'Stronger',
		'stat_label'      => 'Brand Perception',
		'supporting_text' => 'Digital presence aligned with on-site quality',
	),
	array(
		'stat_number'     => 'Search-Ready',
		'stat_label'      => 'SEO Foundation',
		'supporting_text' => 'Built for local and leisure visibility',
	),
	array(
		'stat_number'     => 'Scalable',
		'stat_label'      => 'Content & Marketing',
		'supporting_text' => 'Team-managed specials and events',
	),
);

update_field( 'field_cs_vi_results', $results, $post_id );
WP_CLI::success( 'Set results stats (5 items).' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "All done! Case study 'The Peacock Country Inn' created as DRAFT (ID: $post_id)." );
WP_CLI::log( '' );
WP_CLI::log( 'Next steps:' );
WP_CLI::log( '  1. Open WP Admin > Case Studies > The Peacock Country Inn' );
WP_CLI::log( '  2. Upload hero image (1920x1080 min)' );
WP_CLI::log( '  3. Upload challenge "before" image' );
WP_CLI::log( '  4. Upload deliverables image (brand book mockup)' );
WP_CLI::log( '  5. Upload showcase images (5 slots)' );
WP_CLI::log( '  6. Upload testimonial logo/headshot' );
WP_CLI::log( '  7. Set featured image for archive card' );
WP_CLI::log( '  8. Publish when ready' );
