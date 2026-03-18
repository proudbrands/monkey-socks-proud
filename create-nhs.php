<?php
/**
 * Create NHS (Healthcare Programme Website) Case Study Post (Visual Identity)
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-nhs.php
 *
 * Idempotent — skips creation if post already exists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$existing = get_posts( array(
	'post_type'   => 'case_study',
	'title'       => 'NHS Digital Programme Platform',
	'post_status' => 'any',
	'numberposts' => 1,
) );

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'NHS case study already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post( array(
	'post_type'    => 'case_study',
	'post_title'   => 'NHS Digital Programme Platform',
	'post_name'    => 'nhs-digital-programme-platform',
	'post_status'  => 'draft',
	'post_excerpt' => 'Six years of sustained digital delivery for a national healthcare initiative.',
	'post_content' => '',
) );

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::success( "Created NHS Digital Programme Platform post (ID: {$post_id})" );

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

update_field( 'cs_hero_headline', 'NHS Digital Programme Platform', $post_id );
update_field( 'cs_hero_descriptor', 'Six years of sustained digital delivery for a national healthcare initiative.', $post_id );
// cs_hero_image — set manually: nhs-hero-1920x1080.jpg

// ─────────────────────────────────────────────
// 4. Shared ACF Fields — Testimonial (empty)
// ─────────────────────────────────────────────

update_field( 'cs_testimonial_quote', '', $post_id );
update_field( 'cs_testimonial_name', '', $post_id );
update_field( 'cs_testimonial_title', '', $post_id );
update_field( 'cs_testimonial_company', 'NHS', $post_id );

// ─────────────────────────────────────────────
// 5. Shared ACF Fields — CTA
// ─────────────────────────────────────────────

update_field( 'cs_cta_heading', 'Looking for a long-term digital partner?', $post_id );
update_field( 'cs_cta_subtext', 'Institutional platforms require discipline, clarity, and sustained delivery.', $post_id );
update_field( 'cs_cta_button_text', 'Start a Conversation', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields (hero, testimonial placeholder, CTA)' );

// ─────────────────────────────────────────────
// 6. Snapshot Bar (Repeater)
// ─────────────────────────────────────────────

$snapshot = array(
	array(
		'icon'     => 'chart',
		'headline' => '6-Year Partnership',
		'subtext'  => 'Long-term institutional delivery',
	),
	array(
		'icon'     => 'code',
		'headline' => 'Enterprise-Grade Platform',
		'subtext'  => 'Stable, scalable, compliant',
	),
	array(
		'icon'     => 'rocket',
		'headline' => 'National Rollout',
		'subtext'  => 'Public-facing healthcare audience',
	),
	array(
		'icon'     => 'users',
		'headline' => 'Governance & Stakeholders',
		'subtext'  => 'Multi-layered approval structures',
	),
);
update_field( 'cs_vi_snapshot_stats', $snapshot, $post_id );

WP_CLI::success( 'Set snapshot bar (4 items)' );

// ─────────────────────────────────────────────
// 7. The Challenge (WYSIWYG) — includes The Partnership section
// ─────────────────────────────────────────────

$challenge_text = '<p>The NHS programme required a stable, accessible, and scalable digital platform to support national healthcare communication and engagement.</p>
<p>This was not a marketing website.</p>
<p>It was a public-facing healthcare resource serving:</p>
<ul>
<li>Healthcare professionals</li>
<li>Internal NHS stakeholders</li>
<li>Public audiences</li>
<li>Administrative users</li>
</ul>
<p>The platform needed to operate within:</p>
<ul>
<li>Strict governance structures</li>
<li>Accessibility requirements</li>
<li>Compliance frameworks</li>
<li>Multi-stakeholder approval processes</li>
</ul>
<p>Most importantly, it needed to perform reliably over time.</p>
<p>The brief was clear: Deliver a platform that could sustain operational use for years — not months.</p>

<h3>The Partnership</h3>
<p>This project was not transactional.</p>
<p>Over six years, the platform:</p>
<ul>
<li>Evolved with programme needs</li>
<li>Adapted to policy changes</li>
<li>Supported new content initiatives</li>
<li>Maintained performance and reliability</li>
</ul>
<p>Institutional delivery requires:</p>
<ul>
<li>Patience</li>
<li>Process</li>
<li>Clear documentation</li>
<li>Measured implementation</li>
</ul>
<p>Our role extended beyond development into:</p>
<ul>
<li>Ongoing advisory support</li>
<li>Technical governance</li>
<li>Iterative improvement</li>
</ul>
<p>Trust was built through consistency.</p>';

update_field( 'cs_vi_challenge_text', $challenge_text, $post_id );
// cs_vi_challenge_image — set manually

WP_CLI::success( 'Set challenge text (with Partnership section)' );

// ─────────────────────────────────────────────
// 8. Deliverables (Repeater)
// ─────────────────────────────────────────────

$deliverables = array(
	array(
		'title'       => 'Strategic Platform Architecture',
		'description' => 'Structured digital framework aligned with NHS operational needs',
		'icon'        => 'chart',
	),
	array(
		'title'       => 'Accessible Design Implementation',
		'description' => 'WCAG-aligned accessibility considerations',
		'icon'        => 'palette',
	),
	array(
		'title'       => 'Secure CMS Development',
		'description' => 'Managed WordPress environment with controlled permissions',
		'icon'        => 'code',
	),
	array(
		'title'       => 'Multi-Stakeholder Workflow Support',
		'description' => 'Content governance and approval-friendly structure',
		'icon'        => 'users',
	),
	array(
		'title'       => 'Long-Term Maintenance & Support',
		'description' => 'Ongoing updates, refinements, and system stability',
		'icon'        => 'code',
	),
);
update_field( 'cs_vi_deliverables', $deliverables, $post_id );
// cs_vi_deliverables_image — set manually

WP_CLI::success( 'Set deliverables (5 items)' );

// ─────────────────────────────────────────────
// 9. Showcase (Flexible Content)
// ─────────────────────────────────────────────

$showcase = array(
	array(
		'acf_fc_layout' => 'full_width_image',
		'image'         => '',  // Set manually: nhs-platform-home-1920x1080.jpg
		'caption'       => 'Clear, structured interface designed for public-sector usability.',
	),
	array(
		'acf_fc_layout' => 'two_column_grid',
		'image_left'    => '',  // Set manually: nhs-content-structure-960x720.jpg
		'image_right'   => '',  // Set manually: nhs-accessibility-design-960x720.jpg
	),
	array(
		'acf_fc_layout' => 'pull_quote',
		'quote_text'    => 'Long-term digital delivery requires discipline, not just design.',
	),
	array(
		'acf_fc_layout' => 'full_width_image',
		'image'         => '',  // Set manually: nhs-dashboard-1920x1080.jpg
		'caption'       => 'Secure, structured content management aligned to governance needs.',
	),
);
update_field( 'cs_vi_showcase', $showcase, $post_id );

WP_CLI::success( 'Set showcase (4 layouts)' );

// ─────────────────────────────────────────────
// 10. Results (Repeater)
// ─────────────────────────────────────────────

$results = array(
	array(
		'stat_number'     => '6',
		'stat_label'      => 'Years of Delivery',
		'supporting_text' => 'Sustained institutional partnership',
	),
	array(
		'stat_number'     => 'National',
		'stat_label'      => 'Programme Reach',
		'supporting_text' => 'Public-facing healthcare platform',
	),
	array(
		'stat_number'     => 'Stable',
		'stat_label'      => 'Platform Reliability',
		'supporting_text' => 'Maintained performance over multiple cycles',
	),
	array(
		'stat_number'     => 'Compliant',
		'stat_label'      => 'Accessibility & Governance',
		'supporting_text' => 'Built to public sector standards',
	),
);
update_field( 'cs_vi_results', $results, $post_id );

WP_CLI::success( 'Set results (4 items)' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "NHS Digital Programme Platform case study fully created (ID: {$post_id})" );
WP_CLI::log( '' );
WP_CLI::log( 'Images to upload in admin:' );
WP_CLI::log( '  Hero: nhs-hero-1920x1080.jpg' );
WP_CLI::log( '  Showcase 1 (full-width): nhs-platform-home-1920x1080.jpg' );
WP_CLI::log( '  Showcase 2 (two-col left): nhs-content-structure-960x720.jpg' );
WP_CLI::log( '  Showcase 2 (two-col right): nhs-accessibility-design-960x720.jpg' );
WP_CLI::log( '  Showcase 4 (full-width): nhs-dashboard-1920x1080.jpg' );
WP_CLI::log( '  Challenge image + deliverables image (optional)' );
WP_CLI::log( '  Preview: /case-studies/nhs-digital-programme-platform/' );
