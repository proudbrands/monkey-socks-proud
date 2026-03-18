<?php
/**
 * Create Toit Fishing Case Study Post (Visual Identity)
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-toit.php
 *
 * Idempotent — skips creation if a post titled "Toit Fishing" already exists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$existing = get_posts( array(
	'post_type'   => 'case_study',
	'title'       => 'Toit Fishing',
	'post_status' => 'any',
	'numberposts' => 1,
) );

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'Toit Fishing case study already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post( array(
	'post_type'    => 'case_study',
	'post_title'   => 'Toit Fishing',
	'post_name'    => 'toit-fishing',
	'post_status'  => 'draft',
	'post_excerpt' => 'A precision-engineered global platform built for premium commerce and search authority.',
	'post_content' => '',
) );

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::success( "Created Toit Fishing post (ID: {$post_id})" );

// ─────────────────────────────────────────────
// 2. Assign taxonomy term: Visual Identity
// ─────────────────────────────────────────────

$term = get_term_by( 'slug', 'visual-identity', 'case_study_type' );
if ( $term ) {
	wp_set_object_terms( $post_id, array( $term->term_id ), 'case_study_type' );
	WP_CLI::success( "Assigned term: Visual Identity (ID: {$term->term_id})" );
} else {
	WP_CLI::warning( 'Term "visual-identity" not found. Creating it...' );
	$new_term = wp_insert_term( 'Visual Identity', 'case_study_type', array( 'slug' => 'visual-identity' ) );
	if ( ! is_wp_error( $new_term ) ) {
		wp_set_object_terms( $post_id, array( $new_term['term_id'] ), 'case_study_type' );
		WP_CLI::success( "Created and assigned term: Visual Identity (ID: {$new_term['term_id']})" );
	}
}

// ─────────────────────────────────────────────
// 3. Shared ACF Fields — Hero
// ─────────────────────────────────────────────

update_field( 'cs_hero_headline', 'Toit Fishing', $post_id );
update_field( 'cs_hero_descriptor', 'A precision-engineered global platform built for premium commerce and search authority.', $post_id );
// cs_hero_image — set manually (toit-hero-global-1920x1080.jpg)

// ─────────────────────────────────────────────
// 4. Shared ACF Fields — Testimonial (placeholder)
// ─────────────────────────────────────────────

update_field( 'cs_testimonial_quote', '', $post_id );
update_field( 'cs_testimonial_name', '', $post_id );
update_field( 'cs_testimonial_title', '', $post_id );
update_field( 'cs_testimonial_company', 'Toit Fishing', $post_id );

// ─────────────────────────────────────────────
// 5. Shared ACF Fields — CTA
// ─────────────────────────────────────────────

update_field( 'cs_cta_heading', 'Ready for your transformation?', $post_id );
update_field( 'cs_cta_subtext', 'Premium brand execution for brands that demand precision.', $post_id );
update_field( 'cs_cta_button_text', 'Start a Project', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields (hero, testimonial placeholder, CTA)' );

// ─────────────────────────────────────────────
// 6. Snapshot Bar (Repeater)
// ─────────────────────────────────────────────

$snapshot = array(
	array(
		'icon'     => 'palette',
		'headline' => 'Premium Digital Execution',
		'subtext'  => 'Industrial aesthetic meets performance',
	),
	array(
		'icon'     => 'code',
		'headline' => 'Global Commerce Engine',
		'subtext'  => 'Multi-currency, API shipping, multilingual',
	),
	array(
		'icon'     => 'chart',
		'headline' => 'Search Authority Architecture',
		'subtext'  => 'Knots library + Fish Tech blog',
	),
	array(
		'icon'     => 'globe',
		'headline' => 'International Reach',
		'subtext'  => 'Europe, US, Latin America, Africa, AUS',
	),
);
update_field( 'cs_vi_snapshot_stats', $snapshot, $post_id );

WP_CLI::success( 'Set snapshot bar (4 items)' );

// ─────────────────────────────────────────────
// 7. The Challenge (WYSIWYG + Image)
// ─────────────────────────────────────────────

$challenge_text = '<p>Toit Fishing is a premium tool brand operating across multiple international markets. The physical product is engineered to exact tolerances, with a clean industrial aesthetic that reflects technical precision.</p>
<p>The website needed to do three things simultaneously:</p>
<ul>
<li>Match the product\'s premium positioning</li>
<li>Enable international commerce across currencies and languages</li>
<li>Establish Toit as a technical authority in the fishing space</li>
</ul>
<p>Most brands stop at ecommerce.</p>
<p>Toit needed to build an ecosystem.</p>';

update_field( 'cs_vi_challenge_text', $challenge_text, $post_id );
// cs_vi_challenge_image — set manually

WP_CLI::success( 'Set challenge text' );

// ─────────────────────────────────────────────
// 8. Deliverables (Repeater)
// ─────────────────────────────────────────────

$deliverables = array(
	array(
		'title'       => 'Premium Digital Brand Execution',
		'description' => 'Industrial aesthetic aligned with engineered product precision',
		'icon'        => 'palette',
	),
	array(
		'title'       => 'Multi-Currency Global Commerce',
		'description' => 'USD, EUR, GBP, ZAR, AUD pricing logic',
		'icon'        => 'code',
	),
	array(
		'title'       => 'Multi-Language Deployment',
		'description' => 'English, French, Spanish, Portuguese translation architecture',
		'icon'        => 'file',
	),
	array(
		'title'       => 'API Shipping Integration',
		'description' => 'Real-time international fulfilment calculations',
		'icon'        => 'code',
	),
	array(
		'title'       => 'Fishing Library Architecture',
		'description' => 'Structured knowledge base for fishing knots and techniques',
		'icon'        => 'globe',
	),
	array(
		'title'       => 'Fish Tech Blog',
		'description' => 'Technical authority content aligned to product philosophy',
		'icon'        => 'file',
	),
);
update_field( 'cs_vi_deliverables', $deliverables, $post_id );
// cs_vi_deliverables_image — set manually

WP_CLI::success( 'Set deliverables (6 items)' );

// ─────────────────────────────────────────────
// 9. Showcase (Flexible Content) — placeholder
// ─────────────────────────────────────────────

// Showcase images/videos need to be uploaded manually.
// Setting up structure with a pull quote from the brief as a starting point.
$showcase = array(
	array(
		'acf_fc_layout' => 'pull_quote',
		'quote_text'    => 'Toit is not just a tool manufacturer. It is a precision-led brand built by people who deeply understand fishing technique.',
	),
);
update_field( 'cs_vi_showcase', $showcase, $post_id );

WP_CLI::success( 'Set showcase (1 pull quote — add images/video in admin)' );

// ─────────────────────────────────────────────
// 10. Results (Repeater) — placeholder
// ─────────────────────────────────────────────

// Results data to be added when available
$results = array(
	array(
		'stat_number'    => '5+',
		'stat_label'     => 'International Markets',
		'supporting_text' => 'Europe, US, Latin America, Africa, Australia',
	),
	array(
		'stat_number'    => '5',
		'stat_label'     => 'Currency Zones',
		'supporting_text' => 'USD, EUR, GBP, ZAR, AUD',
	),
	array(
		'stat_number'    => '4',
		'stat_label'     => 'Languages Deployed',
		'supporting_text' => 'English, French, Spanish, Portuguese',
	),
);
update_field( 'cs_vi_results', $results, $post_id );

WP_CLI::success( 'Set results (3 items — update with final stats as needed)' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "Toit Fishing case study fully created (ID: {$post_id})" );
WP_CLI::log( '' );
WP_CLI::log( 'Next steps:' );
WP_CLI::log( '  1. Upload hero image (toit-hero-global-1920x1080.jpg) and set cs_hero_image field' );
WP_CLI::log( '  2. Upload challenge image (before/old brand) and set cs_vi_challenge_image' );
WP_CLI::log( '  3. Upload deliverables image (brand book mockup) and set cs_vi_deliverables_image' );
WP_CLI::log( '  4. Add showcase content (full-width images, two-col grids, video embeds) in admin' );
WP_CLI::log( '  5. Add testimonial when available' );
WP_CLI::log( '  6. Update results stats if needed' );
WP_CLI::log( '  7. Set featured image for archive card' );
WP_CLI::log( '  8. Review and publish when ready' );
WP_CLI::log( '  9. Preview: /case-studies/toit-fishing/' );
