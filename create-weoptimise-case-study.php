<?php
/**
 * Create Case Study: We Optimise Agency Ltd
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-weoptimise-case-study.php
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
	'post_type'   => 'case_study',
	'title'       => 'We Optimise Agency Ltd',
	'post_status' => array( 'publish', 'draft' ),
	'numberposts' => 1,
));

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'Case study "We Optimise Agency Ltd" already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post(array(
	'post_type'    => 'case_study',
	'post_title'   => 'We Optimise Agency Ltd',
	'post_name'    => 'we-optimise-agency-ltd',
	'post_status'  => 'draft',
	'post_excerpt' => 'A mathematically precise identity designed to scale, perform, and signal growth.',
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
update_field( 'field_cs_hero_headline', 'We Optimise Agency Ltd', $post_id );
update_field( 'field_cs_hero_descriptor', 'A mathematically precise identity designed to scale, perform, and signal growth.', $post_id );
// Hero image: we-optimise-logo-hero-1920x1080.jpg — upload via WP admin

// Testimonial — per user request: Sonya Everett, Managing Director
update_field( 'field_cs_testimonial_quote', 'Proud Brands guided us through a rebrand that felt considered, collaborative, and genuinely enjoyable. They listened closely, refined every detail, and never rushed decisions. We couldn\'t be happier with the result and would happily recommend them.', $post_id );
update_field( 'field_cs_testimonial_name', 'Sonya Everett', $post_id );
update_field( 'field_cs_testimonial_title', 'Managing Director', $post_id );
update_field( 'field_cs_testimonial_company', 'We Optimise Agency Ltd', $post_id );
// Testimonial image: we-optimise-logo-square.png — upload via WP admin

// CTA
update_field( 'field_cs_cta_heading', 'Ready for an identity that actually works?', $post_id );
update_field( 'field_cs_cta_subtext', 'Logos should perform under pressure, not just look good in isolation.', $post_id );
update_field( 'field_cs_cta_button_text', 'Start a Project', $post_id );
update_field( 'field_cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields.' );

// ─────────────────────────────────────────────
// 4. Visual Identity — Snapshot Stats (Repeater)
// ─────────────────────────────────────────────

$snapshot_stats = array(
	array(
		'icon'     => 'brand',
		'headline' => 'Precision Logo Design',
		'subtext'  => 'Engineered for clarity and scale',
	),
	array(
		'icon'     => 'pen',
		'headline' => 'Identity System',
		'subtext'  => 'Built for real-world use',
	),
	array(
		'icon'     => 'chart',
		'headline' => 'Growth Signalling',
		'subtext'  => 'Confidence without noise',
	),
	array(
		'icon'     => 'clock',
		'headline' => 'Disciplined Process',
		'subtext'  => 'No rushed decisions',
	),
);

update_field( 'field_cs_vi_snapshot_stats', $snapshot_stats, $post_id );
WP_CLI::success( 'Set snapshot stats (4 items).' );

// ─────────────────────────────────────────────
// 5. Visual Identity — Challenge
// ─────────────────────────────────────────────

$challenge_text = '<p>We Optimise Agency required an identity that could stand confidently alongside enterprise clients while remaining flexible enough to operate across partner environments, sales material, and digital platforms. The brand needed to communicate competence and momentum without relying on decoration or trend-led design.</p>

<p>The challenge was not to create something visually loud, but to design a logo that works. It had to scale cleanly, remain legible in constrained spaces, and hold its own when embedded within other brands\' materials. Every element needed purpose, balance, and restraint.</p>

<p>This was a brand where precision mattered.</p>';

update_field( 'field_cs_vi_challenge_text', $challenge_text, $post_id );
WP_CLI::success( 'Set challenge text.' );

// ─────────────────────────────────────────────
// 6. Visual Identity — Deliverables (Repeater)
// ─────────────────────────────────────────────

$deliverables = array(
	array(
		'title'       => 'Brand Naming & Positioning',
		'description' => 'Clarified brand intent and market positioning.',
		'icon'        => 'brand',
	),
	array(
		'title'       => 'Primary Logo Design',
		'description' => 'Mathematically balanced mark engineered for scale.',
		'icon'        => 'pen',
	),
	array(
		'title'       => 'Secondary Logo System',
		'description' => 'Horizontal, vertical, mono, and reversed variants.',
		'icon'        => 'pen',
	),
	array(
		'title'       => 'Colour Palette',
		'description' => 'Controlled palette supporting clarity and contrast.',
		'icon'        => 'palette',
	),
	array(
		'title'       => 'Logo Family Production',
		'description' => 'Production-ready assets for digital and print use.',
		'icon'        => 'file',
	),
);

update_field( 'field_cs_vi_deliverables', $deliverables, $post_id );
WP_CLI::success( 'Set deliverables (5 items).' );

// ─────────────────────────────────────────────
// 7. Visual Identity — Showcase (Flexible Content)
// ─────────────────────────────────────────────

$showcase = array(
	// Full-width: Logo grid construction
	array(
		'acf_fc_layout' => 'full_width_image',
		'caption'       => 'Primary logo constructed with strict spatial discipline.',
		// Image: we-optimise-logo-grid-1920x1080.jpg — upload via WP admin
	),
	// Pull quote
	array(
		'acf_fc_layout' => 'pull_quote',
		'quote_text'    => 'This wasn\'t about making something look good. It was about designing a mark that performs.',
	),
	// Two-column: small scale / large scale
	array(
		'acf_fc_layout' => 'two_column_grid',
		// Left: we-optimise-logo-small-scale-960x720.jpg
		// Right: we-optimise-logo-large-scale-960x720.jpg
	),
	// Full-width: Logo usage
	array(
		'acf_fc_layout' => 'full_width_image',
		'caption'       => 'Consistent legibility across constrained and expanded layouts.',
		// Image: we-optimise-logo-usage-1920x1080.jpg — upload via WP admin
	),
	// Brand narrative as pull quote
	array(
		'acf_fc_layout' => 'pull_quote',
		'quote_text'    => 'The logo was designed with mathematical balance at its core. Every proportion, angle, and curve was intentional, ensuring consistency across digital, print, and scaled environments. The upward movement within the mark represents momentum and progress — a subtle signal of the positive growth organisations can expect when working with We Optimise. This is not a logo designed to be admired in isolation. It is engineered to live inside real business systems.',
	),
);

update_field( 'field_cs_vi_showcase', $showcase, $post_id );
WP_CLI::success( 'Set showcase (5 blocks: 2 full-width images, 1 two-column grid, 2 pull quotes).' );

// ─────────────────────────────────────────────
// 8. Visual Identity — Results (Repeater)
// ─────────────────────────────────────────────

$results = array(
	array(
		'stat_number'     => '100%',
		'stat_label'      => 'Scalable Logo System',
		'supporting_text' => 'Performs across all sizes and formats',
	),
	array(
		'stat_number'     => 'Zero',
		'stat_label'      => 'Visual Noise',
		'supporting_text' => 'Clarity through restraint',
	),
	array(
		'stat_number'     => 'One',
		'stat_label'      => 'Core Mark',
		'supporting_text' => 'Supported by a complete logo family',
	),
	array(
		'stat_number'     => 'Consistent',
		'stat_label'      => 'Brand Application',
		'supporting_text' => 'Digital, print, and partner environments',
	),
);

update_field( 'field_cs_vi_results', $results, $post_id );
WP_CLI::success( 'Set results stats (4 items).' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "All done! Case study 'We Optimise Agency Ltd' created as DRAFT (ID: $post_id)." );
WP_CLI::log( '' );
WP_CLI::log( 'Image files to upload in WP Admin:' );
WP_CLI::log( '  Hero:             we-optimise-logo-hero-1920x1080.jpg' );
WP_CLI::log( '  Showcase #1:      we-optimise-logo-grid-1920x1080.jpg' );
WP_CLI::log( '  Showcase #3 L:    we-optimise-logo-small-scale-960x720.jpg' );
WP_CLI::log( '  Showcase #3 R:    we-optimise-logo-large-scale-960x720.jpg' );
WP_CLI::log( '  Showcase #4:      we-optimise-logo-usage-1920x1080.jpg' );
WP_CLI::log( '  Testimonial:      we-optimise-logo-square.png' );
WP_CLI::log( '  Featured image:   (choose from above or separate)' );
