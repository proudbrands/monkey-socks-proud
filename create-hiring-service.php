<?php
/**
 * Create The Hiring Service Case Study Post (Visual Identity)
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-hiring-service.php
 *
 * Idempotent — skips creation if post already exists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$existing = get_posts( array(
	'post_type'   => 'case_study',
	'title'       => 'The Hiring Service',
	'post_status' => 'any',
	'numberposts' => 1,
) );

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'The Hiring Service case study already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post( array(
	'post_type'    => 'case_study',
	'post_title'   => 'The Hiring Service',
	'post_name'    => 'the-hiring-service',
	'post_status'  => 'draft',
	'post_excerpt' => 'A confident identity and digital presence built around positive hiring outcomes.',
	'post_content' => '',
) );

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::success( "Created The Hiring Service post (ID: {$post_id})" );

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

update_field( 'cs_hero_headline', 'The Hiring Service', $post_id );
update_field( 'cs_hero_descriptor', 'A confident identity and digital presence built around positive hiring outcomes.', $post_id );
// cs_hero_image — set manually: the-hiring-service-hero-1920x1080.jpg

// ─────────────────────────────────────────────
// 4. Shared ACF Fields — Testimonial (placeholder)
// ─────────────────────────────────────────────

update_field( 'cs_testimonial_quote', '', $post_id );
update_field( 'cs_testimonial_name', '', $post_id );
update_field( 'cs_testimonial_title', '', $post_id );
update_field( 'cs_testimonial_company', 'The Hiring Service', $post_id );

// ─────────────────────────────────────────────
// 5. Shared ACF Fields — CTA
// ─────────────────────────────────────────────

update_field( 'cs_cta_heading', 'Ready for a brand built around outcomes?', $post_id );
update_field( 'cs_cta_subtext', 'Professional identity. Clear positioning. Measurable confidence.', $post_id );
update_field( 'cs_cta_button_text', 'Start a Project', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields (hero, testimonial placeholder, CTA)' );

// ─────────────────────────────────────────────
// 6. Snapshot Bar (Repeater)
// ─────────────────────────────────────────────

$snapshot = array(
	array(
		'icon'     => 'brand',
		'headline' => 'Outcome-Led Logo Design',
		'subtext'  => 'Positive trajectory built into the mark',
	),
	array(
		'icon'     => 'palette',
		'headline' => 'Clean Corporate Identity',
		'subtext'  => 'Clarity, confidence, precision',
	),
	array(
		'icon'     => 'code',
		'headline' => 'Conversion-Focused Website',
		'subtext'  => 'Structured around enquiry and trust',
	),
	array(
		'icon'     => 'chart',
		'headline' => 'Positioning Reset',
		'subtext'  => 'Clear value, clear audience',
	),
);
update_field( 'cs_vi_snapshot_stats', $snapshot, $post_id );

WP_CLI::success( 'Set snapshot bar (4 items)' );

// ─────────────────────────────────────────────
// 7. The Challenge (WYSIWYG)
// ─────────────────────────────────────────────

$challenge_text = '<p>The Hiring Service needed a brand identity that communicated certainty and measurable outcomes in a sector built on trust.</p>
<p>Recruitment brands often fall into one of two traps:</p>
<ul>
<li>Overly corporate and impersonal</li>
<li>Overly casual and lacking authority</li>
</ul>
<p>The challenge was to create an identity that felt:</p>
<ul>
<li>Professional</li>
<li>Human</li>
<li>Positive</li>
<li>Outcome-driven</li>
</ul>
<p>The business focuses on delivering strong hiring results. The brand needed to reflect that sense of upward movement, progress, and positive impact without becoming abstract or decorative.</p>
<p>The website then had to carry that identity into a digital environment that prioritised:</p>
<ul>
<li>Clarity of service</li>
<li>Clear value proposition</li>
<li>Straightforward enquiry paths</li>
<li>Trust-building language</li>
</ul>
<p>This was about confidence without noise.</p>

<h3>Logo Rationale</h3>
<p>The logo is built around the concept of positive intent and upward momentum.</p>
<p>The upward motion within the mark subtly represents:</p>
<ul>
<li>Growth</li>
<li>Successful placement</li>
<li>Forward movement</li>
<li>Measurable outcomes</li>
</ul>
<p>Rather than relying on literal recruitment symbolism, the design uses controlled geometry and proportion to communicate professionalism and reliability.</p>
<p>The mark performs cleanly across:</p>
<ul>
<li>Digital platforms</li>
<li>Slide decks</li>
<li>Social content</li>
<li>Print collateral</li>
</ul>
<p>It is simple — but engineered.</p>';

update_field( 'cs_vi_challenge_text', $challenge_text, $post_id );
// cs_vi_challenge_image — set manually

WP_CLI::success( 'Set challenge text (with Logo Rationale section)' );

// ─────────────────────────────────────────────
// 8. Deliverables (Repeater)
// ─────────────────────────────────────────────

$deliverables = array(
	array(
		'title'       => 'Primary Logo Design',
		'description' => 'A mathematically balanced mark reflecting upward movement and positive hiring outcomes',
		'icon'        => 'brand',
	),
	array(
		'title'       => 'Secondary Logo System',
		'description' => 'Flexible variations for digital, social, and presentation use',
		'icon'        => 'palette',
	),
	array(
		'title'       => 'Colour & Visual Identity System',
		'description' => 'Controlled palette reinforcing professionalism and clarity',
		'icon'        => 'palette',
	),
	array(
		'title'       => 'Website UX & Architecture',
		'description' => 'Clear service structure aligned to employer and candidate journeys',
		'icon'        => 'globe',
	),
	array(
		'title'       => 'Website Development',
		'description' => 'Conversion-focused build with strong trust positioning',
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
		'image'         => '',  // Set manually: the-hiring-service-logo-1920x1080.jpg
		'caption'       => 'Primary logo built around positive trajectory and clarity.',
	),
	array(
		'acf_fc_layout' => 'two_column_grid',
		'image_left'    => '',  // Set manually: the-hiring-service-brand-application-960x720.jpg
		'image_right'   => '',  // Set manually: the-hiring-service-social-usage-960x720.jpg
	),
	array(
		'acf_fc_layout' => 'pull_quote',
		'quote_text'    => 'The brand needed to signal confidence in outcomes, not just activity.',
	),
	array(
		'acf_fc_layout' => 'full_width_image',
		'image'         => '',  // Set manually: the-hiring-service-website-1920x1080.jpg
		'caption'       => 'Website structure built for clarity, trust, and direct engagement.',
	),
);
update_field( 'cs_vi_showcase', $showcase, $post_id );

WP_CLI::success( 'Set showcase (4 layouts)' );

// ─────────────────────────────────────────────
// 10. Results (Repeater)
// ─────────────────────────────────────────────

$results = array(
	array(
		'stat_number'     => 'Clear',
		'stat_label'      => 'Value Proposition',
		'supporting_text' => 'Immediate understanding of service focus',
	),
	array(
		'stat_number'     => 'Strong',
		'stat_label'      => 'Visual Consistency',
		'supporting_text' => 'Logo system scales across all formats',
	),
	array(
		'stat_number'     => 'Direct',
		'stat_label'      => 'Enquiry Pathways',
		'supporting_text' => 'Reduced friction in client contact',
	),
	array(
		'stat_number'     => 'Confident',
		'stat_label'      => 'Market Positioning',
		'supporting_text' => 'Professional, modern, outcome-focused',
	),
);
update_field( 'cs_vi_results', $results, $post_id );

WP_CLI::success( 'Set results (4 items)' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "The Hiring Service case study fully created (ID: {$post_id})" );
WP_CLI::log( '' );
WP_CLI::log( 'Images to upload in admin:' );
WP_CLI::log( '  Hero: the-hiring-service-hero-1920x1080.jpg' );
WP_CLI::log( '  Showcase 1 (full-width): the-hiring-service-logo-1920x1080.jpg' );
WP_CLI::log( '  Showcase 2 (two-col left): the-hiring-service-brand-application-960x720.jpg' );
WP_CLI::log( '  Showcase 2 (two-col right): the-hiring-service-social-usage-960x720.jpg' );
WP_CLI::log( '  Showcase 4 (full-width): the-hiring-service-website-1920x1080.jpg' );
WP_CLI::log( '  Challenge image + deliverables image (optional)' );
WP_CLI::log( '  Testimonial — add when available' );
WP_CLI::log( '  Preview: /case-studies/the-hiring-service/' );
