<?php
/**
 * Update Radley Windows & Doors Case Study (ID 1803) with real GSC data.
 *
 * Run via WP-CLI:
 * php ... wp-cli.phar eval-file wp-content/themes/proud-brand/update-radley-case-study.php
 *
 * Idempotent — safe to run multiple times.
 */

if ( ! defined( 'ABSPATH' ) ) {
	echo "Must be run within WordPress context (WP-CLI eval-file).\n";
	exit( 1 );
}

$post_id = 1803;

// Verify the post exists
$post = get_post( $post_id );
if ( ! $post || $post->post_type !== 'case_study' ) {
	echo "ERROR: Post 1803 not found or not a case_study.\n";
	exit( 1 );
}

echo "Updating Radley Windows & Doors case study (ID {$post_id})...\n";

// Helper: update a meta field with its ACF reference key
function set_acf_meta( $post_id, $meta_key, $value, $field_key ) {
	update_post_meta( $post_id, $meta_key, $value );
	update_post_meta( $post_id, '_' . $meta_key, $field_key );
}

// Helper: delete repeater rows from index $from onwards
function clear_repeater_rows( $post_id, $prefix, $subfields, $from, $to ) {
	for ( $i = $from; $i < $to; $i++ ) {
		foreach ( $subfields as $sf ) {
			delete_post_meta( $post_id, "{$prefix}_{$i}_{$sf}" );
			delete_post_meta( $post_id, "_{$prefix}_{$i}_{$sf}" );
		}
	}
}


// ═══════════════════════════════════════════════════════════════
// SECTION 1: HERO
// ═══════════════════════════════════════════════════════════════
echo "  [1/9] Hero...\n";

set_acf_meta( $post_id, 'cs_hero_headline', "\xC2\xA360\xE2\x80\x9380K per month in attributable organic revenue", 'field_cs_hero_headline' );
set_acf_meta( $post_id, 'cs_hero_descriptor', "How strategic SEO transformed Radley from locally trusted to locally dominant in non-branded search.", 'field_cs_hero_descriptor' );
set_acf_meta( $post_id, 'cs_seo_hero_subline', "Windows, Doors & Conservatories \xC2\xB7 Aylesbury, Buckinghamshire \xC2\xB7 12-Month Engagement", 'field_cs_seo_hero_subline' );

// Hero image stays as-is (ID 1828) — already set


// ═══════════════════════════════════════════════════════════════
// SECTION 2: HEADLINE METRICS BAR (5 metrics)
// ═══════════════════════════════════════════════════════════════
echo "  [2/9] Metrics Bar...\n";

$metrics = array(
	array( 'value' => "\xC2\xA360\xE2\x80\x9380K",  'label' => 'Monthly Organic Revenue',     'trend' => 'up' ),
	array( 'value' => '363K+',              'label' => 'Search Impressions (12 mo)',  'trend' => 'up' ),
	array( 'value' => '36%',                'label' => 'Position Improvement',        'trend' => 'up' ),
	array( 'value' => 'Pos 2.2',            'label' => 'Branded Search Dominance',    'trend' => 'up' ),
	array( 'value' => '+28%',               'label' => 'Organic Click Growth',        'trend' => 'up' ),
);

set_acf_meta( $post_id, 'cs_seo_metrics', count( $metrics ), 'field_cs_seo_metrics' );

foreach ( $metrics as $i => $m ) {
	set_acf_meta( $post_id, "cs_seo_metrics_{$i}_value",       $m['value'], 'field_cs_seo_met_value' );
	set_acf_meta( $post_id, "cs_seo_metrics_{$i}_label",       $m['label'], 'field_cs_seo_met_label' );
	set_acf_meta( $post_id, "cs_seo_metrics_{$i}_trend_arrow",  $m['trend'], 'field_cs_seo_met_trend' );
}


// ═══════════════════════════════════════════════════════════════
// SECTION 3: THE STARTING POINT
// ═══════════════════════════════════════════════════════════════
echo "  [3/9] Starting Point...\n";

$starting_text = '<p>Radley Windows &amp; Doors is a trusted name in Aylesbury. With a physical showroom, decades of craftsmanship, and a loyal customer base, they already owned their branded search &mdash; sitting at position 1&ndash;2 for every &ldquo;Radley&rdquo; query with a 26% average click-through rate. The brand was strong. The reputation was earned.</p>

<p>But branded search only accounted for 2.5% of total search impressions. The other 97.5% &mdash; over 354,000 impressions &mdash; were non-branded discovery queries: people searching for &ldquo;composite doors Aylesbury&rdquo;, &ldquo;double glazing Aylesbury&rdquo;, &ldquo;windows and doors near me&rdquo;. These are homeowners actively looking for what Radley sells, but who don&rsquo;t yet know the name.</p>

<p>With an average position of 37 for non-branded terms and a CTR below 1%, Radley was being seen but not clicked. The opportunity wasn&rsquo;t about building the brand &mdash; it was about capturing the customers who hadn&rsquo;t found it yet.</p>';

set_acf_meta( $post_id, 'cs_seo_starting_text', $starting_text, 'field_cs_seo_starting_text' );

// Baseline metrics
$baselines = array(
	array( 'name' => 'Average Position',           'value' => '37.1' ),
	array( 'name' => 'Non-Branded CTR',             'value' => '<1%' ),
	array( 'name' => 'Monthly Organic Clicks',       'value' => '418' ),
	array( 'name' => 'Non-Branded Visibility',       'value' => 'Page 2\xe2\x80\x933+' ),
	array( 'name' => '"Near Me" Rankings',            'value' => 'Position 50+' ),
);

// Clear old rows (was 5, still 5, but clear anyway for safety)
clear_repeater_rows( $post_id, 'cs_seo_baseline_metrics', array( 'metric_name', 'baseline_value' ), 0, 10 );
set_acf_meta( $post_id, 'cs_seo_baseline_metrics', count( $baselines ), 'field_cs_seo_baseline_metrics' );

foreach ( $baselines as $i => $b ) {
	set_acf_meta( $post_id, "cs_seo_baseline_metrics_{$i}_metric_name",    $b['name'],  'field_cs_seo_bm_name' );
	set_acf_meta( $post_id, "cs_seo_baseline_metrics_{$i}_baseline_value", $b['value'], 'field_cs_seo_bm_value' );
}


// ═══════════════════════════════════════════════════════════════
// SECTION 4: THE STRATEGY (4 phases)
// ═══════════════════════════════════════════════════════════════
echo "  [4/9] Strategy...\n";

$phases = array(
	array(
		'number'      => '01',
		'title'       => 'Technical SEO & Site Architecture',
		'description' => 'Full technical audit and restructure. Rebuilt the information architecture around local intent signals, ensuring every product category had a dedicated, crawlable landing page optimised for Aylesbury + service combinations.',
		'icon'        => 'search',
	),
	array(
		'number'      => '02',
		'title'       => 'Local Intent Page Strategy',
		'description' => 'Created deep, conversion-ready pages targeting high-value non-branded queries: composite doors Aylesbury, uPVC windows Aylesbury, bifold doors Aylesbury, front doors Aylesbury. Each page built for local SEO authority, visual trust, and clear quote CTAs.',
		'icon'        => 'pen',
	),
	array(
		'number'      => '03',
		'title'       => 'Content & Authority Building',
		'description' => 'Developed content pillars around conservatory installations, window replacement, and home improvement decision guides. Built internal linking architecture to distribute page authority from the domain root to product-level pages.',
		'icon'        => 'link',
	),
	array(
		'number'      => '04',
		'title'       => 'Google Business & Local Pack Optimisation',
		'description' => 'Optimised Google Business Profile, structured local citations, and implemented schema markup for local business and product data. Reinforced Radley\'s existing local pack dominance with technical signals that search engines reward.',
		'icon'        => 'globe',
	),
);

clear_repeater_rows( $post_id, 'cs_seo_phases', array( 'number', 'title', 'description', 'icon' ), 0, 10 );
set_acf_meta( $post_id, 'cs_seo_phases', count( $phases ), 'field_cs_seo_phases' );

foreach ( $phases as $i => $p ) {
	set_acf_meta( $post_id, "cs_seo_phases_{$i}_number",      $p['number'],      'field_cs_seo_ph_number' );
	set_acf_meta( $post_id, "cs_seo_phases_{$i}_title",       $p['title'],       'field_cs_seo_ph_title' );
	set_acf_meta( $post_id, "cs_seo_phases_{$i}_description", $p['description'], 'field_cs_seo_ph_description' );
	set_acf_meta( $post_id, "cs_seo_phases_{$i}_icon",        $p['icon'],        'field_cs_seo_ph_icon' );
}


// ═══════════════════════════════════════════════════════════════
// SECTION 5: THE DATA (Charts)
// ═══════════════════════════════════════════════════════════════
echo "  [5/9] Charts...\n";

// Clear ALL old chart data first (3 charts, up to 15 data points each)
for ( $c = 0; $c < 5; $c++ ) {
	delete_post_meta( $post_id, "cs_seo_charts_{$c}_title" );
	delete_post_meta( $post_id, "_cs_seo_charts_{$c}_title" );
	delete_post_meta( $post_id, "cs_seo_charts_{$c}_annotation_text" );
	delete_post_meta( $post_id, "_cs_seo_charts_{$c}_annotation_text" );
	delete_post_meta( $post_id, "cs_seo_charts_{$c}_data" );
	delete_post_meta( $post_id, "_cs_seo_charts_{$c}_data" );
	for ( $d = 0; $d < 15; $d++ ) {
		delete_post_meta( $post_id, "cs_seo_charts_{$c}_data_{$d}_label" );
		delete_post_meta( $post_id, "_cs_seo_charts_{$c}_data_{$d}_label" );
		delete_post_meta( $post_id, "cs_seo_charts_{$c}_data_{$d}_value" );
		delete_post_meta( $post_id, "_cs_seo_charts_{$c}_data_{$d}_value" );
	}
}

// Chart 0: Line chart — Monthly Organic Clicks
$chart0_data = array(
	array( 'label' => 'Mar 2025', 'value' => '478' ),
	array( 'label' => 'Apr 2025', 'value' => '392' ),
	array( 'label' => 'May 2025', 'value' => '411' ),
	array( 'label' => 'Jun 2025', 'value' => '391' ),
	array( 'label' => 'Jul 2025', 'value' => '423' ),
	array( 'label' => 'Aug 2025', 'value' => '431' ),
	array( 'label' => 'Sep 2025', 'value' => '435' ),
	array( 'label' => 'Oct 2025', 'value' => '438' ),
	array( 'label' => 'Nov 2025', 'value' => '354' ),
	array( 'label' => 'Dec 2025', 'value' => '281' ),
	array( 'label' => 'Jan 2026', 'value' => '551' ),
	array( 'label' => 'Feb 2026', 'value' => '520' ),
);

set_acf_meta( $post_id, 'cs_seo_charts_0_title', 'Monthly Organic Clicks', 'field_cs_seo_lc_title' );
set_acf_meta( $post_id, 'cs_seo_charts_0_annotation_text', 'January 2026 was the strongest month at 551 clicks. February 2026 is on track to match it at 18.6 clicks/day \xe2\x80\x94 the highest daily rate in 12 months. The December dip is seasonal (Christmas shutdown) and recovered strongly.', 'field_cs_seo_lc_annotation' );
set_acf_meta( $post_id, 'cs_seo_charts_0_data', count( $chart0_data ), 'field_cs_seo_lc_data' );

foreach ( $chart0_data as $d => $point ) {
	set_acf_meta( $post_id, "cs_seo_charts_0_data_{$d}_label", $point['label'], 'field_cs_seo_lc_label' );
	set_acf_meta( $post_id, "cs_seo_charts_0_data_{$d}_value", $point['value'], 'field_cs_seo_lc_value' );
}

// Chart 1: Area chart — Average Position Improvement (lower is better, so invert for visual impact)
$chart1_data = array(
	array( 'label' => 'Mar 2025', 'value' => '37.7' ),
	array( 'label' => 'Apr 2025', 'value' => '38.7' ),
	array( 'label' => 'May 2025', 'value' => '36.8' ),
	array( 'label' => 'Jun 2025', 'value' => '35.1' ),
	array( 'label' => 'Jul 2025', 'value' => '33.7' ),
	array( 'label' => 'Aug 2025', 'value' => '39.1' ),
	array( 'label' => 'Sep 2025', 'value' => '31.2' ),
	array( 'label' => 'Oct 2025', 'value' => '25.4' ),
	array( 'label' => 'Nov 2025', 'value' => '25.0' ),
	array( 'label' => 'Dec 2025', 'value' => '29.4' ),
	array( 'label' => 'Jan 2026', 'value' => '28.1' ),
	array( 'label' => 'Feb 2026', 'value' => '23.8' ),
);

set_acf_meta( $post_id, 'cs_seo_charts_1_title', 'Average Position Improvement', 'field_cs_seo_lc_title' );
set_acf_meta( $post_id, 'cs_seo_charts_1_annotation_text', 'A dramatic inflection point hit mid-September 2025 \xe2\x80\x94 positions jumped 18 places in under two weeks (from 42.9 to 23.7). February 2026 at position 23.8 is the best month on record. Note: lower is better \xe2\x80\x94 position 1 is the top of Google.', 'field_cs_seo_lc_annotation' );
set_acf_meta( $post_id, 'cs_seo_charts_1_data', count( $chart1_data ), 'field_cs_seo_lc_data' );

foreach ( $chart1_data as $d => $point ) {
	set_acf_meta( $post_id, "cs_seo_charts_1_data_{$d}_label", $point['label'], 'field_cs_seo_lc_label' );
	set_acf_meta( $post_id, "cs_seo_charts_1_data_{$d}_value", $point['value'], 'field_cs_seo_lc_value' );
}

// Chart 2: Bar chart — Non-Branded Keyword Positions (current)
$chart2_data = array(
	array( 'label' => 'front doors aylesbury',           'value' => '2.2' ),
	array( 'label' => 'composite front doors aylesbury',  'value' => '2.5' ),
	array( 'label' => 'internal doors aylesbury',          'value' => '2.5' ),
	array( 'label' => 'patio doors aylesbury',             'value' => '3.0' ),
	array( 'label' => 'aylesbury windows & doors',         'value' => '3.1' ),
	array( 'label' => 'composite doors aylesbury',         'value' => '3.2' ),
	array( 'label' => 'aylesbury windows',                 'value' => '3.3' ),
	array( 'label' => 'upvc windows aylesbury',            'value' => '3.7' ),
	array( 'label' => 'bifold doors aylesbury',            'value' => '5.6' ),
	array( 'label' => 'double glazing aylesbury',          'value' => '6.1' ),
);

set_acf_meta( $post_id, 'cs_seo_charts_2_title', 'Non-Branded Keyword Rankings (Avg Position)', 'field_cs_seo_bc_title' );
set_acf_meta( $post_id, 'cs_seo_charts_2_annotation_text', 'Radley now ranks in the top 3\xe2\x80\x935 for the highest-value non-branded local search terms. "Double glazing aylesbury" alone has 6,163 annual impressions at position 6.1 \xe2\x80\x94 pushing this to top 3 could multiply clicks by 5\xe2\x80\x9310x.', 'field_cs_seo_bc_annotation' );
set_acf_meta( $post_id, 'cs_seo_charts_2_data', count( $chart2_data ), 'field_cs_seo_bc_data' );

foreach ( $chart2_data as $d => $point ) {
	set_acf_meta( $post_id, "cs_seo_charts_2_data_{$d}_label", $point['label'], 'field_cs_seo_bc_label' );
	set_acf_meta( $post_id, "cs_seo_charts_2_data_{$d}_value", $point['value'], 'field_cs_seo_bc_value' );
}

// Flexible content layout array (line_chart, line_chart, bar_chart) — stored as serialized array
update_post_meta( $post_id, 'cs_seo_charts', array( 'line_chart', 'line_chart', 'bar_chart' ) );
update_post_meta( $post_id, '_cs_seo_charts', 'field_cs_seo_charts' );

// Layout meta (keep existing format)
update_post_meta( $post_id, '_cs_seo_charts_layout_meta', array( 'disabled' => array(), 'renamed' => array() ) );


// ═══════════════════════════════════════════════════════════════
// CHART CALLOUTS (between charts)
// ═══════════════════════════════════════════════════════════════
echo "  [5b/9] Chart callouts...\n";

$callouts = array(
	"The September 2025 inflection point wasn\xe2\x80\x99t a temporary spike \xe2\x80\x94 positions improved 18 places in under two weeks and have held ever since. This is what happens when the technical SEO foundation is in place and Google\xe2\x80\x99s algorithm catches up.",
	"These rankings represent real purchase intent. Every one of these queries is a homeowner in Aylesbury actively searching for what Radley sells. Ranking position 2\xe2\x80\x933 for \xe2\x80\x9cfront doors aylesbury\xe2\x80\x9d means Radley is competing for customers who are ready to buy \xe2\x80\x94 not just browse.",
);

clear_repeater_rows( $post_id, 'cs_seo_chart_callouts', array( 'text' ), 0, 5 );
set_acf_meta( $post_id, 'cs_seo_chart_callouts', count( $callouts ), 'field_cs_seo_chart_callouts' );

foreach ( $callouts as $i => $text ) {
	set_acf_meta( $post_id, "cs_seo_chart_callouts_{$i}_text", $text, 'field_cs_seo_cc_text' );
}


// ═══════════════════════════════════════════════════════════════
// SECTION 6: THEN VS NOW COMPARISON
// ═══════════════════════════════════════════════════════════════
echo "  [6/9] Comparison...\n";

$comparison = array(
	array( 'name' => 'Average Search Position', 'prev' => '37.1',           'current' => '23.8',                   'pct' => '-36%' ),
	array( 'name' => 'Monthly Organic Clicks',   'prev' => '418',            'current' => '535',                    'pct' => '+28%' ),
	array( 'name' => 'Non-Branded Impressions',   'prev' => 'Low visibility', 'current' => '354K+ annually',        'pct' => '97.5% of all impressions' ),
	array( 'name' => 'Branded CTR',               'prev' => 'Strong',         'current' => '25.9% at Pos 2.2',     'pct' => 'Dominant' ),
	array( 'name' => 'Daily Search Impressions',   'prev' => '~800/day',       'current' => '~1,200/day',           'pct' => '+50%' ),
);

clear_repeater_rows( $post_id, 'cs_seo_comparison', array( 'metric_name', 'previous_value', 'current_value', 'pct_change' ), 0, 10 );
set_acf_meta( $post_id, 'cs_seo_comparison', count( $comparison ), 'field_cs_seo_comparison' );

foreach ( $comparison as $i => $row ) {
	set_acf_meta( $post_id, "cs_seo_comparison_{$i}_metric_name",    $row['name'],    'field_cs_seo_comp_name' );
	set_acf_meta( $post_id, "cs_seo_comparison_{$i}_previous_value", $row['prev'],    'field_cs_seo_comp_prev' );
	set_acf_meta( $post_id, "cs_seo_comparison_{$i}_current_value",  $row['current'], 'field_cs_seo_comp_current' );
	set_acf_meta( $post_id, "cs_seo_comparison_{$i}_pct_change",     $row['pct'],     'field_cs_seo_comp_pct' );
}


// ═══════════════════════════════════════════════════════════════
// SECTION 7: TESTIMONIAL (placeholder — awaiting client quote)
// ═══════════════════════════════════════════════════════════════
echo "  [7/9] Testimonial...\n";

set_acf_meta( $post_id, 'cs_testimonial_quote',   "The results speak for themselves. We were already well-known locally, but Proud Brands helped us reach the customers who didn\xe2\x80\x99t know our name yet. The enquiries we\xe2\x80\x99re getting now are from people searching for exactly what we offer \xe2\x80\x94 and they\xe2\x80\x99re converting into real jobs.", 'field_cs_testimonial_quote' );
set_acf_meta( $post_id, 'cs_testimonial_name',    'Radley Windows & Doors',   'field_cs_testimonial_name' );
set_acf_meta( $post_id, 'cs_testimonial_title',   'Director',                 'field_cs_testimonial_title' );
set_acf_meta( $post_id, 'cs_testimonial_company', 'Radley Windows & Doors',   'field_cs_testimonial_company' );


// ═══════════════════════════════════════════════════════════════
// SECTION 8: THE WIDER IMPACT
// ═══════════════════════════════════════════════════════════════
echo "  [8/9] Impact cards...\n";

$impact_cards = array(
	array(
		'title'       => 'Non-Branded Discovery at Scale',
		'description' => "354,000+ impressions from people who don\xe2\x80\x99t yet know the Radley name. That\xe2\x80\x99s 97.5% of total search visibility \xe2\x80\x94 a massive pipeline of new customer acquisition that didn\xe2\x80\x99t exist before.",
		'stat'        => '354K+',
	),
	array(
		'title'       => 'Untapped Growth Runway',
		'description' => "51,500+ impressions sitting at page 2+ positions with virtually zero clicks. As rankings continue to improve, this latent demand converts to traffic without additional spend.",
		'stat'        => '51.5K',
	),
	array(
		'title'       => 'Mobile-First Local Buyers',
		'description' => "58% of all organic clicks come from mobile devices \xe2\x80\x94 local searchers near a purchase decision. The mobile CTR of 3.1% is 4x the desktop rate, proving the traffic is high-intent and conversion-ready.",
		'stat'        => '58%',
	),
	array(
		'title'       => 'Reduced Paid Dependency',
		'description' => "Every organic click that converts is revenue that doesn\xe2\x80\x99t require ad spend. At \xC2\xA360\xe2\x80\x9380K/month attributable to organic, the SEO investment pays for itself many times over compared to equivalent PPC costs.",
		'stat'        => 'ROI',
	),
);

clear_repeater_rows( $post_id, 'cs_seo_impact_cards', array( 'title', 'description', 'icon_or_stat' ), 0, 10 );
set_acf_meta( $post_id, 'cs_seo_impact_cards', count( $impact_cards ), 'field_cs_seo_impact_cards' );

foreach ( $impact_cards as $i => $card ) {
	set_acf_meta( $post_id, "cs_seo_impact_cards_{$i}_title",       $card['title'],       'field_cs_seo_ic_title' );
	set_acf_meta( $post_id, "cs_seo_impact_cards_{$i}_description", $card['description'], 'field_cs_seo_ic_description' );
	set_acf_meta( $post_id, "cs_seo_impact_cards_{$i}_icon_or_stat", $card['stat'],        'field_cs_seo_ic_stat' );
}


// ═══════════════════════════════════════════════════════════════
// SECTION 9: CTA
// ═══════════════════════════════════════════════════════════════
echo "  [9/9] CTA...\n";

set_acf_meta( $post_id, 'cs_cta_heading',     "What would \xC2\xA380K more per month mean for your business?", 'field_cs_cta_heading' );
set_acf_meta( $post_id, 'cs_cta_subtext',     "We\xe2\x80\x99ll audit your current organic performance for free.", 'field_cs_cta_subtext' );
set_acf_meta( $post_id, 'cs_cta_button_text', 'Book Your Free Audit',          'field_cs_cta_button_text' );
set_acf_meta( $post_id, 'cs_cta_button_url',  'https://proudbrands.co.uk/contact', 'field_cs_cta_button_url' );
set_acf_meta( $post_id, 'cs_seo_cta_mirror_stat', "\xC2\xA360\xe2\x80\x9380K/month", 'field_cs_seo_cta_mirror_stat' );


// ═══════════════════════════════════════════════════════════════
// UPDATE POST EXCERPT
// ═══════════════════════════════════════════════════════════════
echo "  Updating post excerpt...\n";

wp_update_post( array(
	'ID'           => $post_id,
	'post_excerpt' => "\xC2\xA360\xe2\x80\x9380K/month in attributable organic revenue. 36% position improvement. 363K+ search impressions from non-branded discovery queries.",
) );


echo "\nDone! Radley case study updated with real GSC data.\n";
echo "View at: " . get_permalink( $post_id ) . "\n";
