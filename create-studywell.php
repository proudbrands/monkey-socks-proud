<?php
/**
 * Create Studywell Case Study Post (Organic Revenue)
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-studywell.php
 *
 * Idempotent — skips creation if post already exists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$existing = get_posts( array(
	'post_type'   => 'case_study',
	'title'       => 'Studywell',
	'post_status' => 'any',
	'numberposts' => 1,
) );

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'Studywell case study already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post( array(
	'post_type'    => 'case_study',
	'post_title'   => 'Studywell',
	'post_name'    => 'studywell',
	'post_status'  => 'draft',
	'post_excerpt' => 'A full technical rebuild that transformed performance, global delivery, and organic search stability.',
	'post_content' => '',
) );

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::success( "Created Studywell post (ID: {$post_id})" );

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
// 3. Shared ACF Fields — Hero
// ─────────────────────────────────────────────

update_field( 'cs_hero_headline', 'Stable Rankings. Accelerated Growth.', $post_id );
update_field( 'cs_hero_descriptor', 'A full technical rebuild that transformed performance, global delivery, and organic search stability.', $post_id );
// cs_hero_image — set manually: studywell-hero-1920x1080.jpg

// ─────────────────────────────────────────────
// 4. Shared ACF Fields — Testimonial (placeholder)
// ─────────────────────────────────────────────

update_field( 'cs_testimonial_quote', '', $post_id );
update_field( 'cs_testimonial_name', '', $post_id );
update_field( 'cs_testimonial_title', '', $post_id );
update_field( 'cs_testimonial_company', 'Studywell', $post_id );

// ─────────────────────────────────────────────
// 5. Shared ACF Fields — CTA
// ─────────────────────────────────────────────

update_field( 'cs_cta_heading', 'Is your infrastructure limiting your rankings?', $post_id );
update_field( 'cs_cta_subtext', 'Technical stability is the foundation of organic growth.', $post_id );
update_field( 'cs_cta_button_text', 'Book Your Free Audit', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields (hero, testimonial placeholder, CTA)' );

// ─────────────────────────────────────────────
// 6. SEO-Specific Fields
// ─────────────────────────────────────────────

update_field( 'cs_seo_hero_subline', 'Education Platform · Infrastructure-Led SEO Rebuild', $post_id );
update_field( 'cs_seo_cta_mirror_stat', 'Sub-3 Second Performance', $post_id );

// ─────────────────────────────────────────────
// 7. Headline Metrics (Repeater)
// ─────────────────────────────────────────────

$metrics = array(
	array( 'value' => 'Stable',      'label' => 'Core Keyword Rankings',       'trend_arrow' => 'up' ),
	array( 'value' => '+XXX%',       'label' => 'Organic Traffic Growth',       'trend_arrow' => 'up' ),
	array( 'value' => 'Sub-3s',      'label' => 'Load Speed',                  'trend_arrow' => 'down' ),
	array( 'value' => 'Global CDN',  'label' => 'Edge Distribution',           'trend_arrow' => 'up' ),
	array( 'value' => 'Modernised',  'label' => 'Technical SEO Architecture',  'trend_arrow' => 'up' ),
);
update_field( 'cs_seo_metrics', $metrics, $post_id );

WP_CLI::success( 'Set headline metrics (5 items)' );

// ─────────────────────────────────────────────
// 8. The Starting Point
// ─────────────────────────────────────────────

$starting_text = '<p>Studywell had strong educational content and meaningful search visibility, but its infrastructure was limiting growth.</p>
<p>The issues were not aesthetic. They were structural:</p>
<ul>
<li>Inconsistent load speeds</li>
<li>Hosting limitations</li>
<li>Crawl inefficiencies</li>
<li>Technical SEO bottlenecks</li>
<li>No global content distribution layer</li>
</ul>
<p>Rankings fluctuated under load. Performance constrained indexation. International users experienced slower delivery.</p>
<p>The site needed to move from functional to engineered.</p>';

update_field( 'cs_seo_starting_text', $starting_text, $post_id );

WP_CLI::success( 'Set starting point text' );

// ─────────────────────────────────────────────
// 9. Baseline Metrics (Repeater)
// ─────────────────────────────────────────────

$baseline = array(
	array( 'metric_name' => 'Ranking Stability',   'baseline_value' => 'Volatile across core keywords' ),
	array( 'metric_name' => 'Load Speed',           'baseline_value' => 'Above modern performance thresholds' ),
	array( 'metric_name' => 'Organic Traffic Curve', 'baseline_value' => 'Growth constrained' ),
	array( 'metric_name' => 'Global Delivery',      'baseline_value' => 'Single-region infrastructure' ),
	array( 'metric_name' => 'Core Web Vitals',      'baseline_value' => 'Inconsistent performance signals' ),
);
update_field( 'cs_seo_baseline_metrics', $baseline, $post_id );

WP_CLI::success( 'Set baseline metrics (5 items)' );

// ─────────────────────────────────────────────
// 10. Strategy Phases (Repeater)
// ─────────────────────────────────────────────

$phases = array(
	array(
		'number'      => '01',
		'title'       => 'Full Infrastructure Rebuild',
		'description' => "Migrated to enterprise-grade hosting.\nRebuilt caching layers.\nOptimised server response times.\nEliminated technical debt.\n\nThis created a clean, stable foundation.",
		'icon'        => 'code',
	),
	array(
		'number'      => '02',
		'title'       => 'Global CDN Deployment',
		'description' => "Implemented global edge delivery via CDN:\n• Reduced latency worldwide\n• Improved international accessibility\n• Consistent load speeds across regions\n\nPerformance became geographically neutral.",
		'icon'        => 'globe',
	),
	array(
		'number'      => '03',
		'title'       => 'Speed Engineering',
		'description' => "• Image optimisation strategy\n• Script deferment and asset minification\n• Mobile-first performance prioritisation\n• Core Web Vitals alignment\n\nLoad times reduced to sub-3 seconds.\nSpeed became a ranking asset.",
		'icon'        => 'target',
	),
	array(
		'number'      => '04',
		'title'       => 'Technical SEO Stabilisation',
		'description' => "• Refined crawl paths\n• Cleaned internal link structure\n• Removed index inefficiencies\n• Strengthened technical signals\n\nRanking volatility reduced.\nCore keywords stabilised.",
		'icon'        => 'search',
	),
);
update_field( 'cs_seo_phases', $phases, $post_id );

WP_CLI::success( 'Set strategy phases (4 items)' );

// ─────────────────────────────────────────────
// 11. Charts (Flexible Content)
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
		'annotation_text' => 'Following infrastructure rebuild, organic clicks accelerated. Insert actual GSC click growth %. Stability preceded growth.',
	),
	array(
		'acf_fc_layout'  => 'line_chart',
		'title'          => 'Ranking Stability',
		'data'           => array(
			array( 'label' => 'Baseline', 'value' => 100 ),
			array( 'label' => 'Month 3',  'value' => 100 ),
			array( 'label' => 'Month 6',  'value' => 100 ),
			array( 'label' => 'Month 9',  'value' => 100 ),
			array( 'label' => 'Month 12', 'value' => 100 ),
		),
		'annotation_text' => 'Core keywords moved from fluctuating positions to sustained placement. Reduced volatility = improved trust signals.',
	),
	array(
		'acf_fc_layout'  => 'line_chart',
		'title'          => 'Load Speed Improvement',
		'data'           => array(
			array( 'label' => 'Before',     'value' => 100 ),
			array( 'label' => 'Phase 1',    'value' => 100 ),
			array( 'label' => 'Phase 2',    'value' => 100 ),
			array( 'label' => 'Phase 3',    'value' => 100 ),
			array( 'label' => 'Current',    'value' => 100 ),
		),
		'annotation_text' => 'Before: multi-second variance. After: consistent sub-3 second delivery. Performance directly supported SEO stability.',
	),
);
update_field( 'cs_seo_charts', $charts, $post_id );

WP_CLI::success( 'Set charts (3 line charts with placeholder data)' );

// ─────────────────────────────────────────────
// 12. Chart Callouts (Repeater)
// ─────────────────────────────────────────────

$callouts = array(
	array( 'text' => 'Stability preceded growth. Infrastructure rebuild created the foundation for sustained organic acceleration.' ),
	array( 'text' => 'Reduced volatility = improved trust signals. Consistent performance strengthened ranking factors.' ),
	array( 'text' => 'Performance directly supported SEO stability. Sub-3 second delivery became a competitive advantage.' ),
);
update_field( 'cs_seo_chart_callouts', $callouts, $post_id );

WP_CLI::success( 'Set chart callouts (3 items)' );

// ─────────────────────────────────────────────
// 13. Then vs Now Comparison (Repeater)
// ─────────────────────────────────────────────

$comparison = array(
	array(
		'metric_name'    => 'Ranking Stability',
		'previous_value' => 'Fluctuating',
		'current_value'  => 'Sustained core placement',
		'pct_change'     => '',
	),
	array(
		'metric_name'    => 'Organic Traffic',
		'previous_value' => 'Constrained growth',
		'current_value'  => 'Accelerated organic curve',
		'pct_change'     => '',
	),
	array(
		'metric_name'    => 'Load Speed',
		'previous_value' => 'Above benchmark thresholds',
		'current_value'  => 'Sub-3s delivery',
		'pct_change'     => '',
	),
	array(
		'metric_name'    => 'Global Delivery',
		'previous_value' => 'Single region',
		'current_value'  => 'Edge-distributed international performance',
		'pct_change'     => '',
	),
);
update_field( 'cs_seo_comparison', $comparison, $post_id );

WP_CLI::success( 'Set comparison data (4 items)' );

// ─────────────────────────────────────────────
// 14. Wider Impact Cards (Repeater)
// ─────────────────────────────────────────────

$impact = array(
	array(
		'title'        => 'Search Trust Signals',
		'description'  => 'Improved performance strengthened technical ranking factors.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Reduced Volatility',
		'description'  => 'Stable rankings allowed predictable growth.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'International Accessibility',
		'description'  => 'Global CDN removed regional performance disadvantage.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Scalable Platform',
		'description'  => 'Infrastructure now supports growth without structural ceiling.',
		'icon_or_stat' => '',
	),
);
update_field( 'cs_seo_impact_cards', $impact, $post_id );

WP_CLI::success( 'Set impact cards (4 items)' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "Studywell case study fully created (ID: {$post_id})" );
WP_CLI::log( '' );
WP_CLI::log( 'Placeholders to update:' );
WP_CLI::log( '  - +XXX% in Organic Traffic Growth metric' );
WP_CLI::log( '  - All chart data points (currently 100)' );
WP_CLI::log( '  - Testimonial (empty)' );
WP_CLI::log( '' );
WP_CLI::log( 'Images to upload:' );
WP_CLI::log( '  Hero: studywell-hero-1920x1080.jpg' );
WP_CLI::log( '  Featured image for archive card' );
WP_CLI::log( '' );
WP_CLI::log( 'Preview: /case-studies/studywell/' );
