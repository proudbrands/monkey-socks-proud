<?php
/**
 * Create Bay Aggregates Case Study Post (Organic Revenue)
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-bay-aggregates.php
 *
 * Idempotent — skips creation if post already exists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$existing = get_posts( array(
	'post_type'   => 'case_study',
	'title'       => 'Bay Aggregates',
	'post_status' => 'any',
	'numberposts' => 1,
) );

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'Bay Aggregates case study already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post( array(
	'post_type'    => 'case_study',
	'post_title'   => 'Bay Aggregates',
	'post_name'    => 'bay-aggregates',
	'post_status'  => 'draft',
	'post_excerpt' => 'How strategic SEO and commercial landing page restructuring transformed a regional aggregates supplier into a dominant digital force.',
	'post_content' => '',
) );

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::success( "Created Bay Aggregates post (ID: {$post_id})" );

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

update_field( 'cs_hero_headline', '£1.5 Million in New Revenue from Organic Search', $post_id );
update_field( 'cs_hero_descriptor', 'How strategic SEO and commercial landing page restructuring transformed a regional aggregates supplier into a dominant digital force.', $post_id );
// cs_hero_image — set manually: bay-aggregates-hero-1920x1080.jpg

// ─────────────────────────────────────────────
// 4. Shared ACF Fields — Testimonial (placeholder)
// ─────────────────────────────────────────────

update_field( 'cs_testimonial_quote', '', $post_id );
update_field( 'cs_testimonial_name', '', $post_id );
update_field( 'cs_testimonial_title', '', $post_id );
update_field( 'cs_testimonial_company', 'Bay Aggregates', $post_id );

// ─────────────────────────────────────────────
// 5. Shared ACF Fields — CTA
// ─────────────────────────────────────────────

update_field( 'cs_cta_heading', 'What would £1.5M in organic revenue mean for your business?', $post_id );
update_field( 'cs_cta_subtext', 'We identify where your customers are already searching — and build systems that capture it.', $post_id );
update_field( 'cs_cta_button_text', 'Book Your Free Audit', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields (hero, testimonial placeholder, CTA)' );

// ─────────────────────────────────────────────
// 6. SEO-Specific Fields
// ─────────────────────────────────────────────

update_field( 'cs_seo_hero_subline', 'Construction & Aggregates · Multi-Year Organic Growth Strategy', $post_id );
update_field( 'cs_seo_cta_mirror_stat', '£1.5 Million Added', $post_id );

// ─────────────────────────────────────────────
// 7. Headline Metrics (Repeater)
// ─────────────────────────────────────────────

$metrics = array(
	array( 'value' => '£1.5M',     'label' => 'Added to the Books via Organic Search', 'trend_arrow' => 'up' ),
	array( 'value' => '923,000+',  'label' => 'Organic Impressions',                   'trend_arrow' => 'up' ),
	array( 'value' => '+30%',      'label' => 'Impression Growth',                     'trend_arrow' => 'up' ),
	array( 'value' => '+5 Positions', 'label' => 'Average Ranking Improvement',        'trend_arrow' => 'up' ),
	array( 'value' => 'Page 1',    'label' => 'Core Commercial Keywords',              'trend_arrow' => 'up' ),
);
update_field( 'cs_seo_metrics', $metrics, $post_id );

WP_CLI::success( 'Set headline metrics (5 items)' );

// ─────────────────────────────────────────────
// 8. The Starting Point
// ─────────────────────────────────────────────

$starting_text = '<p>Bay Aggregates had a solid reputation offline but limited structured digital presence.</p>
<p>Their website functioned as a brochure. It was not a sales engine.</p>
<p>Key challenges included:</p>
<ul>
<li>Poor keyword targeting for commercial terms</li>
<li>Limited geographic landing pages</li>
<li>Weak service segmentation</li>
<li>Minimal conversion optimisation</li>
<li>Heavy reliance on repeat business and word of mouth</li>
</ul>
<p>The opportunity was clear: Search demand existed. Competitors were not dominating. But the structure needed rebuilding.</p>';

update_field( 'cs_seo_starting_text', $starting_text, $post_id );

WP_CLI::success( 'Set starting point text' );

// ─────────────────────────────────────────────
// 9. Baseline Metrics (Repeater)
// ─────────────────────────────────────────────

$baseline = array(
	array( 'metric_name' => 'Monthly Organic Visibility',    'baseline_value' => 'Limited regional coverage' ),
	array( 'metric_name' => 'Commercial Keyword Rankings',   'baseline_value' => 'Inconsistent / Page 2–3' ),
	array( 'metric_name' => 'Structured Service Pages',      'baseline_value' => 'Minimal' ),
	array( 'metric_name' => 'Lead Capture Optimisation',     'baseline_value' => 'Underdeveloped' ),
	array( 'metric_name' => 'Organic Revenue Attribution',   'baseline_value' => 'Not formally tracked' ),
);
update_field( 'cs_seo_baseline_metrics', $baseline, $post_id );

WP_CLI::success( 'Set baseline metrics (5 items)' );

// ─────────────────────────────────────────────
// 10. Strategy Phases (Repeater)
// ─────────────────────────────────────────────

$phases = array(
	array(
		'number'      => '01',
		'title'       => 'Search & Market Audit',
		'description' => "• Competitor gap analysis\n• Commercial intent mapping\n• Geographic demand analysis\n• Keyword cluster modelling\n\nWe identified where money was already being searched for.",
		'icon'        => 'search',
	),
	array(
		'number'      => '02',
		'title'       => 'Commercial Landing Page Architecture',
		'description' => "• Structured service segmentation\n• Aggregates type categorisation\n• Regional landing page build-out\n• Intent-aligned page design\n\nThe site shifted from brochure to revenue funnel.",
		'icon'        => 'chart',
	),
	array(
		'number'      => '03',
		'title'       => 'On-Page SEO & Content Expansion',
		'description' => "• High-intent keyword optimisation\n• Internal linking strategy\n• Conversion-focused CTAs\n• Service-specific authority building\n\nCommercial keywords began climbing.",
		'icon'        => 'pen',
	),
	array(
		'number'      => '04',
		'title'       => 'Performance & Technical Improvements',
		'description' => "• Crawl optimisation\n• Speed improvements\n• Schema markup implementation\n• Indexation clean-up\n\nRanking volatility reduced and positions stabilised.",
		'icon'        => 'code',
	),
	array(
		'number'      => '05',
		'title'       => 'Measurement & Optimisation',
		'description' => "• Conversion tracking implementation\n• Organic revenue attribution\n• Lead source tracking\n• Continuous keyword expansion\n\nSEO became measurable, not speculative.",
		'icon'        => 'target',
	),
);
update_field( 'cs_seo_phases', $phases, $post_id );

WP_CLI::success( 'Set strategy phases (5 items)' );

// ─────────────────────────────────────────────
// 11. Charts (Flexible Content)
// ─────────────────────────────────────────────

$charts = array(
	array(
		'acf_fc_layout'  => 'line_chart',
		'title'          => 'Organic Impressions Growth',
		'data'           => array(
			array( 'label' => 'Jan', 'value' => 48000 ),
			array( 'label' => 'Mar', 'value' => 62000 ),
			array( 'label' => 'Jun', 'value' => 81000 ),
			array( 'label' => 'Sep', 'value' => 105000 ),
			array( 'label' => 'Dec', 'value' => 128000 ),
		),
		'annotation_text' => 'Organic impressions increased by over 30% following landing page restructuring.',
	),
	array(
		'acf_fc_layout'  => 'line_chart',
		'title'          => 'Average Position Improvement',
		'data'           => array(
			array( 'label' => 'Baseline', 'value' => 18 ),
			array( 'label' => 'Month 3',  'value' => 14 ),
			array( 'label' => 'Month 6',  'value' => 10 ),
			array( 'label' => 'Month 9',  'value' => 7 ),
			array( 'label' => 'Month 12', 'value' => 5 ),
		),
		'annotation_text' => 'Movement from Page 2–3 to sustained Page 1 visibility on high-value terms.',
	),
	array(
		'acf_fc_layout'  => 'bar_chart',
		'title'          => 'Core Commercial Keyword Wins',
		'data'           => array(
			array( 'label' => 'Bulk aggregates supplier',       'value' => 1 ),
			array( 'label' => 'MOT Type 1 delivery',            'value' => 1 ),
			array( 'label' => 'Decorative aggregates near me',  'value' => 1 ),
			array( 'label' => 'Aggregates supplier [region]',   'value' => 3 ),
		),
		'annotation_text' => 'Ranking gains directly correlated with inbound commercial enquiries.',
	),
);
update_field( 'cs_seo_charts', $charts, $post_id );

WP_CLI::success( 'Set charts (2 line charts + 1 bar chart)' );

// ─────────────────────────────────────────────
// 12. Chart Callouts (Repeater)
// ─────────────────────────────────────────────

$callouts = array(
	array( 'text' => 'By month six, organic enquiries overtook referral leads — creating predictable inbound revenue rather than reactive order taking.' ),
);
update_field( 'cs_seo_chart_callouts', $callouts, $post_id );

WP_CLI::success( 'Set chart callouts (1 item)' );

// ─────────────────────────────────────────────
// 13. Then vs Now Comparison (Repeater)
// ─────────────────────────────────────────────

$comparison = array(
	array(
		'metric_name'    => 'Organic Revenue',
		'previous_value' => 'Untracked',
		'current_value'  => '£1.5M Attributed',
		'pct_change'     => 'New Revenue Stream',
	),
	array(
		'metric_name'    => 'Organic Visibility',
		'previous_value' => 'Limited',
		'current_value'  => '923K+ Impressions',
		'pct_change'     => '+30% Growth',
	),
	array(
		'metric_name'    => 'Average Position',
		'previous_value' => 'Page 2–3',
		'current_value'  => 'Page 1',
		'pct_change'     => '+5 Position Lift',
	),
	array(
		'metric_name'    => 'Commercial Landing Pages',
		'previous_value' => 'Minimal',
		'current_value'  => 'Structured Intent-Based Architecture',
		'pct_change'     => '',
	),
	array(
		'metric_name'    => 'Lead Quality',
		'previous_value' => 'Mixed',
		'current_value'  => 'High-Intent Commercial Enquiries',
		'pct_change'     => '',
	),
);
update_field( 'cs_seo_comparison', $comparison, $post_id );

WP_CLI::success( 'Set comparison data (5 items)' );

// ─────────────────────────────────────────────
// 14. Wider Impact Cards (Repeater)
// ─────────────────────────────────────────────

$impact = array(
	array(
		'title'        => '£1.5M Revenue Expansion',
		'description'  => 'Organic visibility converted directly into commercial contracts.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Reduced Dependency on Referral',
		'description'  => 'Inbound search replaced unpredictable word-of-mouth cycles.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Improved Forecasting',
		'description'  => 'Organic data enabled production and delivery planning.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Stronger Regional Dominance',
		'description'  => 'Search leadership positioned Bay Aggregates as a primary supplier in key territories.',
		'icon_or_stat' => '',
	),
);
update_field( 'cs_seo_impact_cards', $impact, $post_id );

WP_CLI::success( 'Set impact cards (4 items)' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "Bay Aggregates case study fully created (ID: {$post_id})" );
WP_CLI::log( '' );
WP_CLI::log( 'Images to upload:' );
WP_CLI::log( '  Hero: bay-aggregates-hero-1920x1080.jpg' );
WP_CLI::log( '  Featured image for archive card' );
WP_CLI::log( '' );
WP_CLI::log( 'Notes:' );
WP_CLI::log( '  - Charts have example data from brief — refine if needed' );
WP_CLI::log( '  - Testimonial empty — add when available' );
WP_CLI::log( '  - 5 strategy phases (most detailed SEO case study so far)' );
WP_CLI::log( '' );
WP_CLI::log( 'Preview: /case-studies/bay-aggregates/' );
