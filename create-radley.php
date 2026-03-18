<?php
/**
 * Create Radley Windows & Doors Case Study Post
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-radley.php
 *
 * Idempotent — skips creation if a post titled "Radley Windows & Doors" already exists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$existing = get_posts( array(
	'post_type'   => 'case_study',
	'title'       => 'Radley Windows & Doors',
	'post_status' => 'any',
	'numberposts' => 1,
) );

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'Radley Windows & Doors case study already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post( array(
	'post_type'    => 'case_study',
	'post_title'   => 'Radley Windows & Doors',
	'post_name'    => 'radley-windows-doors',
	'post_status'  => 'draft',
	'post_excerpt' => 'How strategic local SEO and intent-led restructuring transformed Radley into a high-intent quote engine.',
	'post_content' => '',
) );

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::success( "Created Radley Windows & Doors post (ID: {$post_id})" );

// ─────────────────────────────────────────────
// 2. Assign taxonomy term: Organic Revenue
// ─────────────────────────────────────────────

$term = get_term_by( 'slug', 'organic-revenue', 'case_study_type' );
if ( $term ) {
	wp_set_object_terms( $post_id, array( $term->term_id ), 'case_study_type' );
	WP_CLI::success( "Assigned term: Organic Revenue (ID: {$term->term_id})" );
} else {
	WP_CLI::warning( 'Term "organic-revenue" not found. Creating it...' );
	$new_term = wp_insert_term( 'Organic Revenue', 'case_study_type', array( 'slug' => 'organic-revenue' ) );
	if ( ! is_wp_error( $new_term ) ) {
		wp_set_object_terms( $post_id, array( $new_term['term_id'] ), 'case_study_type' );
		WP_CLI::success( "Created and assigned term: Organic Revenue (ID: {$new_term['term_id']})" );
	}
}

// ─────────────────────────────────────────────
// 3. Shared ACF Fields
// ─────────────────────────────────────────────

update_field( 'cs_hero_headline', 'Local Search Dominance in Aylesbury', $post_id );
update_field( 'cs_hero_descriptor', 'How strategic local SEO and intent-led restructuring transformed Radley into a high-intent quote engine.', $post_id );

update_field( 'cs_testimonial_quote', '', $post_id );
update_field( 'cs_testimonial_name', '', $post_id );
update_field( 'cs_testimonial_title', '', $post_id );
update_field( 'cs_testimonial_company', 'Radley Windows & Doors', $post_id );

update_field( 'cs_cta_heading', 'Ready to own your local market?', $post_id );
update_field( 'cs_cta_subtext', 'We build search systems that convert intent into revenue.', $post_id );
update_field( 'cs_cta_button_text', 'Book Your Free Audit', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields (hero, testimonial placeholder, CTA)' );

// ─────────────────────────────────────────────
// 4. SEO-Specific Fields
// ─────────────────────────────────────────────

update_field( 'cs_seo_hero_subline', 'Windows, Doors & Home Improvements · Local Trade Sector', $post_id );
update_field( 'cs_seo_cta_mirror_stat', 'Page 1 Local Dominance', $post_id );

// ─────────────────────────────────────────────
// 5. Headline Metrics (Repeater)
// ─────────────────────────────────────────────

$metrics = array(
	array( 'value' => 'Page 1',    'label' => 'Core Local Keywords',           'trend_arrow' => 'up' ),
	array( 'value' => '+XXX%',     'label' => 'Organic Traffic Growth',         'trend_arrow' => 'up' ),
	array( 'value' => '2x',        'label' => 'Enquiry Conversion Rate',       'trend_arrow' => 'up' ),
	array( 'value' => 'Top 3',     'label' => '"Aylesbury" Intent Terms',      'trend_arrow' => 'up' ),
	array( 'value' => 'Local Pack', 'label' => 'Google Business Visibility',   'trend_arrow' => 'up' ),
);
update_field( 'cs_seo_metrics', $metrics, $post_id );

WP_CLI::success( 'Set headline metrics (5 items)' );

// ─────────────────────────────────────────────
// 6. The Starting Point
// ─────────────────────────────────────────────

$starting_text = '<p>Radley Windows & Doors had strong craftsmanship and local reputation, but their digital presence was not aligned to how homeowners search.</p>
<p>The website structure was product-led rather than intent-led.</p>
<p>Home improvement buyers search by:</p>
<ul>
<li>Location</li>
<li>Specific product (composite doors, uPVC windows, bifold doors)</li>
<li>Urgency</li>
<li>Trust signals</li>
</ul>
<p>The opportunity was not volume. It was high-intent local visibility.</p>
<p>Without a structured local SEO approach, Radley was invisible for valuable transactional searches within its core catchment.</p>';

update_field( 'cs_seo_starting_text', $starting_text, $post_id );

WP_CLI::success( 'Set starting point text' );

// ─────────────────────────────────────────────
// 7. Baseline Metrics (Repeater)
// ─────────────────────────────────────────────

$baseline = array(
	array( 'metric_name' => 'Local Keyword Visibility',      'baseline_value' => 'Limited / Page 2+' ),
	array( 'metric_name' => 'Organic Enquiries',              'baseline_value' => 'Inconsistent' ),
	array( 'metric_name' => 'Conversion Architecture',        'baseline_value' => 'Friction-heavy journey' ),
	array( 'metric_name' => 'Service Page Authority',         'baseline_value' => 'Under-optimised' ),
	array( 'metric_name' => 'Google Business Optimisation',   'baseline_value' => 'Under-leveraged' ),
);
update_field( 'cs_seo_baseline_metrics', $baseline, $post_id );

WP_CLI::success( 'Set baseline metrics (5 items)' );

// ─────────────────────────────────────────────
// 8. Strategy Phases (Repeater)
// ─────────────────────────────────────────────

$phases = array(
	array(
		'number'      => '01',
		'title'       => 'Local Intent Architecture',
		'description' => "Rebuilt the site structure around:\n• Aylesbury + service combinations\n• Composite doors Aylesbury\n• uPVC windows Aylesbury\n• Bifold doors Aylesbury\n\nCreated structured, location-led landing environments.",
		'icon'        => 'search',
	),
	array(
		'number'      => '02',
		'title'       => 'Product Authority Pages',
		'description' => "Developed deep, conversion-ready pages for:\n• Composite doors\n• uPVC windows\n• Aluminium systems\n• Bifold and patio doors\n\nEach page structured for:\n• Local SEO\n• Visual trust\n• Clear CTAs",
		'icon'        => 'pen',
	),
	array(
		'number'      => '03',
		'title'       => 'Conversion Rate Optimisation',
		'description' => "Reduced enquiry friction through:\n• Simplified quote forms\n• Clear trust signals\n• Structured testimonials\n• Location confidence messaging\n\nShifted from brochure to quote engine.",
		'icon'        => 'target',
	),
	array(
		'number'      => '04',
		'title'       => 'Google Business & Local Signals',
		'description' => "Optimised:\n• Google Business Profile\n• Local citations\n• Structured location content\n• Service area clarity\n\nImproved local pack visibility.",
		'icon'        => 'chart',
	),
);
update_field( 'cs_seo_phases', $phases, $post_id );

WP_CLI::success( 'Set strategy phases (4 items)' );

// ─────────────────────────────────────────────
// 9. Charts (Flexible Content)
// ─────────────────────────────────────────────

$charts = array(
	array(
		'acf_fc_layout'  => 'line_chart',
		'title'          => 'Organic Click Growth',
		'data'           => array(
			array( 'label' => 'Baseline', 'value' => 100 ),
			array( 'label' => 'Month 3',  'value' => 100 ),
			array( 'label' => 'Month 6',  'value' => 100 ),
			array( 'label' => 'Month 9',  'value' => 100 ),
			array( 'label' => 'Month 12', 'value' => 100 ),
		),
		'annotation_text' => 'Insert click growth data once available. Expectation: steady upward growth aligned with structural SEO deployment.',
	),
	array(
		'acf_fc_layout'  => 'line_chart',
		'title'          => 'Impression Growth for Local Terms',
		'data'           => array(
			array( 'label' => 'Baseline', 'value' => 100 ),
			array( 'label' => 'Month 3',  'value' => 100 ),
			array( 'label' => 'Month 6',  'value' => 100 ),
			array( 'label' => 'Month 9',  'value' => 100 ),
			array( 'label' => 'Month 12', 'value' => 100 ),
		),
		'annotation_text' => 'Insert impression growth data. Focus: high-intent service keywords within Aylesbury catchment.',
	),
	array(
		'acf_fc_layout'  => 'bar_chart',
		'title'          => 'Ranking Movement',
		'data'           => array(
			array( 'label' => 'composite doors Aylesbury',        'value' => 0 ),
			array( 'label' => 'uPVC windows Aylesbury',           'value' => 0 ),
			array( 'label' => 'bifold doors Aylesbury',           'value' => 0 ),
			array( 'label' => 'front door installation Aylesbury', 'value' => 0 ),
			array( 'label' => 'window replacement Aylesbury',     'value' => 0 ),
		),
		'annotation_text' => 'Track movement from baseline to current ranking. Update values once ranking data is available.',
	),
);
update_field( 'cs_seo_charts', $charts, $post_id );

WP_CLI::success( 'Set charts (2 line charts + 1 bar chart with placeholder data)' );

// ─────────────────────────────────────────────
// 10. Chart Callouts (Repeater)
// ─────────────────────────────────────────────

$callouts = array(
	array( 'text' => 'Steady upward growth aligned with structural SEO deployment and local intent page launches.' ),
	array( 'text' => 'High-intent service keywords within the Aylesbury catchment driving qualified local traffic.' ),
);
update_field( 'cs_seo_chart_callouts', $callouts, $post_id );

WP_CLI::success( 'Set chart callouts (2 items)' );

// ─────────────────────────────────────────────
// 11. Then vs Now Comparison (Repeater)
// ─────────────────────────────────────────────

$comparison = array(
	array(
		'metric_name'    => 'Local Keyword Rankings',
		'previous_value' => 'Page 2+',
		'current_value'  => 'Page 1 / Top 3',
		'pct_change'     => '',
	),
	array(
		'metric_name'    => 'Organic Traffic',
		'previous_value' => 'Low-intent browsing',
		'current_value'  => 'High-intent local searches',
		'pct_change'     => '',
	),
	array(
		'metric_name'    => 'Enquiry Rate',
		'previous_value' => 'Passive site',
		'current_value'  => 'Active quote engine',
		'pct_change'     => '',
	),
	array(
		'metric_name'    => 'Search Positioning',
		'previous_value' => 'Generalised',
		'current_value'  => 'Local authority positioning',
		'pct_change'     => '',
	),
);
update_field( 'cs_seo_comparison', $comparison, $post_id );

WP_CLI::success( 'Set comparison data (4 items)' );

// ─────────────────────────────────────────────
// 12. Wider Impact Cards (Repeater)
// ─────────────────────────────────────────────

$impact = array(
	array(
		'title'        => 'Higher Intent Leads',
		'description'  => 'Traffic now arrives ready to request quotes, not just browse.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Shorter Sales Cycle',
		'description'  => 'Search intent aligns directly with purchase stage.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Local Authority Positioning',
		'description'  => 'Radley competes at a search level typically reserved for larger national brands.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Scalable Growth Model',
		'description'  => 'Framework can be expanded to additional service areas if required.',
		'icon_or_stat' => '',
	),
);
update_field( 'cs_seo_impact_cards', $impact, $post_id );

WP_CLI::success( 'Set impact cards (4 items)' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "Radley Windows & Doors case study fully created (ID: {$post_id})" );
WP_CLI::log( '' );
WP_CLI::log( 'Next steps:' );
WP_CLI::log( '  1. Upload hero image (radley-hero-1920x1080.jpg) and set cs_hero_image field' );
WP_CLI::log( '  2. Set featured image for archive card' );
WP_CLI::log( '  3. Add Radley testimonial when available' );
WP_CLI::log( '  4. Replace placeholder chart data (+XXX% metric, chart values) with real numbers' );
WP_CLI::log( '  5. Review and publish when ready' );
WP_CLI::log( '  6. Preview: /case-studies/radley-windows-doors/' );
