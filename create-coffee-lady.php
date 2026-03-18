<?php
/**
 * Create Coffee Lady Case Study Post
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/create-coffee-lady.php
 *
 * Idempotent — skips creation if a post titled "Coffee Lady" already exists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if post already exists
$existing = get_posts( array(
	'post_type'   => 'case_study',
	'title'       => 'Coffee Lady',
	'post_status' => 'any',
	'numberposts' => 1,
) );

if ( ! empty( $existing ) ) {
	WP_CLI::warning( 'Coffee Lady case study already exists (ID: ' . $existing[0]->ID . '). Skipping.' );
	return;
}

// ─────────────────────────────────────────────
// 1. Create the post
// ─────────────────────────────────────────────

$post_id = wp_insert_post( array(
	'post_type'    => 'case_study',
	'post_title'   => 'Coffee Lady',
	'post_name'    => 'coffee-lady',
	'post_status'  => 'draft',
	'post_excerpt' => 'How strategic restructuring and service-led SEO transformed Coffee Lady\'s commercial revenue channels.',
	'post_content' => '',
) );

if ( is_wp_error( $post_id ) ) {
	WP_CLI::error( 'Failed to create post: ' . $post_id->get_error_message() );
	return;
}

WP_CLI::success( "Created Coffee Lady post (ID: {$post_id})" );

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

// Hero — image will need to be uploaded manually or set via media library
// For now we store a placeholder note
update_field( 'cs_hero_headline', '+229% Organic Click Growth', $post_id );
update_field( 'cs_hero_descriptor', 'How strategic restructuring and service-led SEO transformed Coffee Lady\'s commercial revenue channels.', $post_id );
// cs_hero_image — set manually in admin (requires image upload: coffee-lady-hero-1920x1080.jpg)

// Testimonial
update_field( 'cs_testimonial_quote', 'Proud Brands took the time to understand our vision, refined every detail, and delivered a rebrand and site we\'re genuinely proud of. The process was smooth, collaborative, and enjoyable throughout.', $post_id );
update_field( 'cs_testimonial_name', 'Colin Barnett', $post_id );
update_field( 'cs_testimonial_title', '', $post_id );
update_field( 'cs_testimonial_company', 'We Optimise Agency Ltd', $post_id );
// cs_testimonial_image — set manually if needed

// CTA
update_field( 'cs_cta_heading', 'What would +229% organic growth mean for your business?', $post_id );
update_field( 'cs_cta_subtext', 'We build search architecture that drives revenue, not just rankings.', $post_id );
update_field( 'cs_cta_button_text', 'Book Your Free Audit', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );

WP_CLI::success( 'Set shared ACF fields (hero, testimonial, CTA)' );

// ─────────────────────────────────────────────
// 4. SEO-Specific Fields
// ─────────────────────────────────────────────

// Hero subline
update_field( 'cs_seo_hero_subline', 'Hospitality & Commercial Coffee Solutions · 16-Month Growth Curve', $post_id );

// CTA mirror stat
update_field( 'cs_seo_cta_mirror_stat', '+229% Organic Growth', $post_id );

// ─────────────────────────────────────────────
// 5. Headline Metrics (Repeater)
// ─────────────────────────────────────────────

$metrics = array(
	array( 'value' => '+229%', 'label' => 'Organic Click Growth',              'trend_arrow' => 'up' ),
	array( 'value' => '+574%', 'label' => 'Organic Impression Growth',          'trend_arrow' => 'up' ),
	array( 'value' => '2x',   'label' => 'Conversion Rate (CRO Impact)',       'trend_arrow' => 'up' ),
	array( 'value' => 'Top 3','label' => 'High-Intent Service Keywords',       'trend_arrow' => 'up' ),
	array( 'value' => 'AI Surface', 'label' => 'Featured in AI Search Responses', 'trend_arrow' => 'up' ),
);
update_field( 'cs_seo_metrics', $metrics, $post_id );

WP_CLI::success( 'Set headline metrics (5 items)' );

// ─────────────────────────────────────────────
// 6. The Starting Point
// ─────────────────────────────────────────────

$starting_text = '<p>Coffee Lady had solid products, strong supplier relationships, and a trusted brand reputation.</p>
<p>But the website structure was product-led — not intent-led.</p>
<p>Search behaviour in the commercial coffee sector is segmented:</p>
<ul>
<li>Hospitality buyers</li>
<li>Hotels</li>
<li>Office managers</li>
<li>Commercial kitchen operators</li>
<li>Long-term service contracts</li>
<li>Emergency repair</li>
</ul>
<p>The existing site did not align to how these buyers actually search.</p>
<p>Traffic existed — but it wasn\'t structured to convert into:</p>
<ul>
<li>Service contracts</li>
<li>Maintenance agreements</li>
<li>Long-term machine supply</li>
<li>Commercial upgrades</li>
</ul>
<p>The opportunity was not "more traffic". It was capturing the right traffic.</p>';

update_field( 'cs_seo_starting_text', $starting_text, $post_id );

WP_CLI::success( 'Set starting point text' );

// ─────────────────────────────────────────────
// 7. Baseline Metrics (Repeater)
// ─────────────────────────────────────────────

$baseline = array(
	array( 'metric_name' => 'Organic Clicks',            'baseline_value' => 'Low and inconsistent growth curve' ),
	array( 'metric_name' => 'Impression Volume',          'baseline_value' => 'Limited commercial search footprint' ),
	array( 'metric_name' => 'Service Page Authority',     'baseline_value' => 'Underdeveloped' ),
	array( 'metric_name' => 'Commercial Intent Coverage', 'baseline_value' => 'Fragmented' ),
	array( 'metric_name' => 'AI Surface Visibility',      'baseline_value' => 'None' ),
);
update_field( 'cs_seo_baseline_metrics', $baseline, $post_id );

WP_CLI::success( 'Set baseline metrics (5 items)' );

// ─────────────────────────────────────────────
// 8. Strategy Phases (Repeater)
// ─────────────────────────────────────────────

$phases = array(
	array(
		'number'      => '01',
		'title'       => 'Structural Re-Architecture',
		'description' => "Rebuilt the entire site architecture around sector intent rather than product categories.\n\nCreated segmented pathways for:\n• Hospitality\n• Hotels\n• Offices\n• Commercial environments\n• Maintenance & servicing\n\nThis aligned structure with search behaviour.",
		'icon'        => 'search',
	),
	array(
		'number'      => '02',
		'title'       => 'Service-Led Revenue Channel',
		'description' => "We identified a major opportunity: Service and maintenance queries carry extremely high intent.\n\nWe built structured, optimised service pages targeting:\n• Coffee machine repair\n• Maintenance contracts\n• Emergency support\n• Brand-specific servicing\n\nService became the commercial entry point.",
		'icon'        => 'chart',
	),
	array(
		'number'      => '03',
		'title'       => 'CRO & Journey Optimisation',
		'description' => "We doubled down on:\n• Clear sector CTAs\n• Reduced form friction\n• Commercial language refinement\n• Clearer service vs machine pathways\n\nConversion rate doubled as a result of structural clarity.",
		'icon'        => 'target',
	),
	array(
		'number'      => '04',
		'title'       => 'Search Surface & AI Optimisation',
		'description' => "Structured content to improve:\n• Featured snippet eligibility\n• AI extraction patterns\n• Clear service explanations\n\nCoffee Lady began appearing in AI-generated search responses, including ChatGPT-based answers.",
		'icon'        => 'globe',
	),
);
update_field( 'cs_seo_phases', $phases, $post_id );

WP_CLI::success( 'Set strategy phases (4 items)' );

// ─────────────────────────────────────────────
// 9. Charts (Flexible Content)
// ─────────────────────────────────────────────

$charts = array(
	array(
		'acf_fc_layout' => 'line_chart',
		'title'          => 'Organic Click Growth',
		'data'           => array(
			array( 'label' => 'Month 1',  'value' => 100 ),
			array( 'label' => 'Month 4',  'value' => 130 ),
			array( 'label' => 'Month 8',  'value' => 185 ),
			array( 'label' => 'Month 12', 'value' => 255 ),
			array( 'label' => 'Month 16', 'value' => 329 ),
		),
		'annotation_text' => 'Organic clicks increased by 229% comparing early baseline period to the most recent 30-day period. Growth accelerated following service page deployment, sector segmentation, and commercial keyword optimisation.',
	),
	array(
		'acf_fc_layout' => 'line_chart',
		'title'          => 'Organic Impression Expansion',
		'data'           => array(
			array( 'label' => 'Month 1',  'value' => 100 ),
			array( 'label' => 'Month 4',  'value' => 175 ),
			array( 'label' => 'Month 8',  'value' => 320 ),
			array( 'label' => 'Month 12', 'value' => 480 ),
			array( 'label' => 'Month 16', 'value' => 674 ),
		),
		'annotation_text' => 'Impressions grew by 574%, indicating massive search footprint expansion, sector keyword coverage increase, and long-tail commercial visibility. This is not seasonal fluctuation. It reflects structural search capture.',
	),
);
update_field( 'cs_seo_charts', $charts, $post_id );

WP_CLI::success( 'Set charts (2 line charts)' );

// ─────────────────────────────────────────────
// 10. Chart Callouts (Repeater)
// ─────────────────────────────────────────────

$callouts = array(
	array( 'text' => 'Growth accelerated following service page deployment, sector segmentation, and commercial keyword optimisation.' ),
	array( 'text' => 'This is not seasonal fluctuation. It reflects structural search capture across commercial intent keywords.' ),
);
update_field( 'cs_seo_chart_callouts', $callouts, $post_id );

WP_CLI::success( 'Set chart callouts (2 items)' );

// ─────────────────────────────────────────────
// 11. Then vs Now Comparison (Repeater)
// ─────────────────────────────────────────────

$comparison = array(
	array(
		'metric_name'    => 'Organic Clicks',
		'previous_value' => 'Baseline traffic',
		'current_value'  => '+229% growth',
		'pct_change'     => '+229%',
	),
	array(
		'metric_name'    => 'Impressions',
		'previous_value' => 'Narrow footprint',
		'current_value'  => '+574% expansion',
		'pct_change'     => '+574%',
	),
	array(
		'metric_name'    => 'Conversion Rate',
		'previous_value' => 'Product-led browsing',
		'current_value'  => '2x improved conversion performance',
		'pct_change'     => '2x',
	),
	array(
		'metric_name'    => 'Service Revenue Channel',
		'previous_value' => 'Secondary',
		'current_value'  => 'Primary commercial entry point',
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
		'title'        => 'Recurring Contracts',
		'description'  => 'Service enquiries convert into long-term maintenance agreements.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Upsell Pathway',
		'description'  => 'Service relationships evolve into full machine replacements and upgrades.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'Sector Authority',
		'description'  => 'Coffee Lady now ranks in commercial verticals previously dominated by competitors.',
		'icon_or_stat' => '',
	),
	array(
		'title'        => 'AI Visibility',
		'description'  => 'Structured content surfaces in AI-generated answers, future-proofing search exposure.',
		'icon_or_stat' => '',
	),
);
update_field( 'cs_seo_impact_cards', $impact, $post_id );

WP_CLI::success( 'Set impact cards (4 items)' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "✓ Coffee Lady case study fully created (ID: {$post_id})" );
WP_CLI::log( '' );
WP_CLI::log( 'Next steps:' );
WP_CLI::log( '  1. Upload hero image (coffee-lady-hero-1920x1080.jpg) and set cs_hero_image field' );
WP_CLI::log( '  2. Set featured image for archive card' );
WP_CLI::log( '  3. Optionally add testimonial headshot/logo' );
WP_CLI::log( '  4. Review and publish when ready' );
WP_CLI::log( '  5. Preview: /case-studies/coffee-lady/' );
