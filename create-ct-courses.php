<?php
/**
 * Create CT Courses Case Study Post (Visual Identity)
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-ct-courses.php
 *
 * Idempotent — skips creation if post already exists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$existing = get_posts( array(
	'post_type'   => 'case_study',
	'title'       => 'CT Courses',
	'post_status' => 'any',
	'numberposts' => 1,
) );

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'CT Courses case study already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post( array(
	'post_type'    => 'case_study',
	'post_title'   => 'CT Courses',
	'post_name'    => 'ct-courses',
	'post_status'  => 'draft',
	'post_excerpt' => 'A full platform rebuild and brand modernisation for an accredited education provider.',
	'post_content' => '',
) );

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::success( "Created CT Courses post (ID: {$post_id})" );

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

update_field( 'cs_hero_headline', 'CT Courses', $post_id );
update_field( 'cs_hero_descriptor', 'A full platform rebuild and brand modernisation for an accredited education provider.', $post_id );
// cs_hero_image — set manually: ct-courses-hero-1920x1080.jpg

// ─────────────────────────────────────────────
// 4. Shared ACF Fields — Testimonial (empty)
// ─────────────────────────────────────────────

update_field( 'cs_testimonial_quote', '', $post_id );
update_field( 'cs_testimonial_name', '', $post_id );
update_field( 'cs_testimonial_title', '', $post_id );
update_field( 'cs_testimonial_company', 'CT Courses', $post_id );

// ─────────────────────────────────────────────
// 5. Shared ACF Fields — CTA
// ─────────────────────────────────────────────

update_field( 'cs_cta_heading', 'Is your platform holding your business back?', $post_id );
update_field( 'cs_cta_subtext', 'We modernise systems, not just websites.', $post_id );
update_field( 'cs_cta_button_text', 'Start a Project', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields (hero, testimonial placeholder, CTA)' );

// ─────────────────────────────────────────────
// 6. Snapshot Bar (Repeater)
// ─────────────────────────────────────────────

$snapshot = array(
	array(
		'icon'     => 'code',
		'headline' => 'Moodle Migration & Rebuild',
		'subtext'  => 'Full LMS modernisation',
	),
	array(
		'icon'     => 'chart',
		'headline' => 'Enrollment Logic Rewritten',
		'subtext'  => 'University-level registration workflow',
	),
	array(
		'icon'     => 'palette',
		'headline' => 'Brand & Website Refresh',
		'subtext'  => 'Modern, secure, accessible',
	),
	array(
		'icon'     => 'clock',
		'headline' => 'Rush Delivery',
		'subtext'  => 'Rebuilt under strict deadlines',
	),
);
update_field( 'cs_vi_snapshot_stats', $snapshot, $post_id );

WP_CLI::success( 'Set snapshot bar (4 items)' );

// ─────────────────────────────────────────────
// 7. The Challenge (WYSIWYG) — includes Technical Reset + Enrollment Logic
// ─────────────────────────────────────────────

$challenge_text = '<p>CT Courses faced a critical platform risk.</p>
<p>Their previous provider had been acquired. The system was outdated. Security updates had not been maintained. The Moodle version lagged dramatically behind modern builds.</p>
<p>The website infrastructure was no longer aligned with:</p>
<ul>
<li>Modern security requirements</li>
<li>Updated plugin ecosystems</li>
<li>Accreditation expectations</li>
<li>Financial data compliance</li>
<li>University-level enrollment complexity</li>
</ul>
<p>This was not a visual redesign. This was a technical reset.</p>
<p>The objective was to:</p>
<ul>
<li>Rebuild the WordPress front-end</li>
<li>Upgrade and self-host Moodle</li>
<li>Rewrite enrollment logic</li>
<li>Secure checkout and registration systems</li>
<li>Modernise branding and marketing materials</li>
</ul>
<p>All without interrupting active course delivery.</p>

<h3>The Technical Reset</h3>
<p>The existing LMS environment was significantly behind current Moodle builds.</p>
<p>Rather than patching legacy systems, we:</p>
<ul>
<li>Migrated to a controlled, self-hosted Moodle installation</li>
<li>Coordinated with existing provider for data extraction</li>
<li>Rebuilt course logic for new accreditation workflows</li>
<li>Modernised server configuration and security</li>
<li>Implemented a stable VPS infrastructure</li>
</ul>
<p>The system moved from dependency to ownership.</p>
<p>CT Courses regained control of their data, platform, and future roadmap.</p>

<h3>Enrollment Logic Reconstruction</h3>
<p>The enrollment process required custom development.</p>
<p>We:</p>
<ul>
<li>Rebuilt checkout integration</li>
<li>Generated structured registration PDFs</li>
<li>Enabled multiple course registration per transaction</li>
<li>Implemented secure data handling for credit card information</li>
<li>Coordinated secure registration delivery to the accreditation agency</li>
</ul>
<p>The result was:</p>
<ul>
<li>Reduced administrative friction</li>
<li>Fewer manual corrections</li>
<li>Cleaner compliance documentation</li>
</ul>
<p>University-level process, delivered digitally.</p>';

update_field( 'cs_vi_challenge_text', $challenge_text, $post_id );
// cs_vi_challenge_image — set manually

WP_CLI::success( 'Set challenge text (with Technical Reset + Enrollment Logic sections)' );

// ─────────────────────────────────────────────
// 8. Deliverables (Repeater)
// ─────────────────────────────────────────────

$deliverables = array(
	array(
		'title'       => 'Full WordPress Rebuild',
		'description' => 'Modern theme architecture, updated plugins, secure infrastructure',
		'icon'        => 'code',
	),
	array(
		'title'       => 'Moodle Upgrade & Self Hosting',
		'description' => 'Migration to latest supported build under CT Courses control',
		'icon'        => 'code',
	),
	array(
		'title'       => 'Enrollment System Re-Engineering',
		'description' => 'Custom registration PDF logic supporting multiple course enrollments',
		'icon'        => 'chart',
	),
	array(
		'title'       => 'Secure Financial Data Handling',
		'description' => 'Infrastructure updates to meet modern compliance standards',
		'icon'        => 'target',
	),
	array(
		'title'       => 'Brand & Marketing Overhaul',
		'description' => 'Email templates, brochures, social media frameworks',
		'icon'        => 'palette',
	),
	array(
		'title'       => 'Technical Training & Documentation',
		'description' => 'Full admin training and documentation for internal team',
		'icon'        => 'file',
	),
);
update_field( 'cs_vi_deliverables', $deliverables, $post_id );
// cs_vi_deliverables_image — set manually

WP_CLI::success( 'Set deliverables (6 items)' );

// ─────────────────────────────────────────────
// 9. Showcase (Flexible Content)
// ─────────────────────────────────────────────

$showcase = array(
	array(
		'acf_fc_layout' => 'full_width_image',
		'image'         => '',  // Set manually: ct-courses-homepage-1920x1080.jpg
		'caption'       => 'Modern, structured interface replacing outdated legacy build.',
	),
	array(
		'acf_fc_layout' => 'two_column_grid',
		'image_left'    => '',  // Set manually: ct-courses-enrollment-960x720.jpg
		'image_right'   => '',  // Set manually: ct-courses-moodle-dashboard-960x720.jpg
	),
	array(
		'acf_fc_layout' => 'pull_quote',
		'quote_text'    => 'We didn\'t just update a website — we rebuilt the system it runs on.',
	),
	array(
		'acf_fc_layout' => 'full_width_image',
		'image'         => '',  // Set manually: ct-courses-registration-pdf-1920x1080.jpg
		'caption'       => 'Custom-generated registration logic integrated into Moodle workflows.',
	),
);
update_field( 'cs_vi_showcase', $showcase, $post_id );

WP_CLI::success( 'Set showcase (4 layouts)' );

// ─────────────────────────────────────────────
// 10. Results (Repeater)
// ─────────────────────────────────────────────

$results = array(
	array(
		'stat_number'     => 'Latest',
		'stat_label'      => 'Moodle Version',
		'supporting_text' => 'Fully modernised LMS environment',
	),
	array(
		'stat_number'     => 'Secure',
		'stat_label'      => 'Financial Data Handling',
		'supporting_text' => 'Updated infrastructure & compliance',
	),
	array(
		'stat_number'     => 'Streamlined',
		'stat_label'      => 'Enrollment Workflow',
		'supporting_text' => 'Multi-course logic & PDF automation',
	),
	array(
		'stat_number'     => 'Controlled',
		'stat_label'      => 'Self-Hosted Platform',
		'supporting_text' => 'Full business ownership',
	),
	array(
		'stat_number'     => 'Modern',
		'stat_label'      => 'Brand Presentation',
		'supporting_text' => 'Consistent digital & marketing identity',
	),
);
update_field( 'cs_vi_results', $results, $post_id );

WP_CLI::success( 'Set results (5 items)' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "CT Courses case study fully created (ID: {$post_id})" );
WP_CLI::log( '' );
WP_CLI::log( 'Images to upload in admin:' );
WP_CLI::log( '  Hero: ct-courses-hero-1920x1080.jpg' );
WP_CLI::log( '  Showcase 1 (full-width): ct-courses-homepage-1920x1080.jpg' );
WP_CLI::log( '  Showcase 2 (two-col left): ct-courses-enrollment-960x720.jpg' );
WP_CLI::log( '  Showcase 2 (two-col right): ct-courses-moodle-dashboard-960x720.jpg' );
WP_CLI::log( '  Showcase 4 (full-width): ct-courses-registration-pdf-1920x1080.jpg' );
WP_CLI::log( '  Challenge image + deliverables image (optional)' );
WP_CLI::log( '  Testimonial — add when available' );
WP_CLI::log( '' );
WP_CLI::log( 'Preview: /case-studies/ct-courses/' );
