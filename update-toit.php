<?php
/**
 * Update Toit Fishing Case Study — Add remaining content
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/update-toit.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Find the existing post
$posts = get_posts( array(
	'post_type'   => 'case_study',
	'title'       => 'Toit Fishing',
	'post_status' => 'any',
	'numberposts' => 1,
) );

if ( empty( $posts ) ) {
	WP_CLI::error( 'Toit Fishing case study not found. Run create-toit.php first.' );
	return;
}

$post_id = $posts[0]->ID;
WP_CLI::log( "Updating Toit Fishing (ID: {$post_id})..." );

// ─────────────────────────────────────────────
// 1. Update Challenge Text — expanded with Authority Engine content
// ─────────────────────────────────────────────

$challenge_text = '<p>Toit Fishing is a premium tool brand operating across multiple international markets. The physical product is engineered to exact tolerances, with a clean industrial aesthetic that reflects technical precision.</p>
<p>The website needed to do three things simultaneously:</p>
<ul>
<li>Match the product\'s premium positioning</li>
<li>Enable international commerce across currencies and languages</li>
<li>Establish Toit as a technical authority in the fishing space</li>
</ul>
<p>Most brands stop at ecommerce.</p>
<p>Toit needed to build an ecosystem.</p>

<h3>Authority Engine — Fishing Library</h3>
<p>Toit is not just a tool manufacturer. It is a precision-led brand built by people who deeply understand fishing technique.</p>
<p>We created a structured fishing knots library that serves three functions:</p>
<ul>
<li>High-intent search capture</li>
<li>Educational authority positioning</li>
<li>Long-term organic dominance</li>
</ul>
<p>Each knot page:</p>
<ul>
<li>Breaks down technical method clearly</li>
<li>Translates YouTube knowledge into structured written content</li>
<li>Aligns instructional content with product relevance</li>
</ul>
<p>This approach:</p>
<ul>
<li>Converts video engagement into search equity</li>
<li>Builds structured internal linking</li>
<li>Positions the founder\'s expertise as central to the brand</li>
</ul>

<h3>Capturing Founder Identity</h3>
<p>The content strategy does not hide behind generic marketing copy. It captures the voice, knowledge, and philosophy of the brand owner.</p>
<p>By translating YouTube technical walkthroughs into structured, readable articles, the site:</p>
<ul>
<li>Reinforces credibility</li>
<li>Builds trust</li>
<li>Improves AI and search surface visibility</li>
<li>Extends authority beyond social platforms</li>
</ul>
<p>This transforms:</p>
<p><strong>Creator → Authority</strong><br>
<strong>Product Brand → Technical Resource</strong></p>';

update_field( 'cs_vi_challenge_text', $challenge_text, $post_id );
WP_CLI::success( 'Updated challenge text (with Authority Engine + Founder Identity sections)' );

// ─────────────────────────────────────────────
// 2. Replace Showcase (Flexible Content)
// ─────────────────────────────────────────────

$showcase = array(
	array(
		'acf_fc_layout' => 'full_width_image',
		'image'         => '',  // Set manually: toit-library-1920x1080.jpg
		'caption'       => 'Structured Fishing Knots Library designed for search dominance.',
	),
	array(
		'acf_fc_layout' => 'two_column_grid',
		'image_left'    => '',  // Set manually: toit-knot-article-960x720.jpg
		'image_right'   => '',  // Set manually: toit-youtube-integration-960x720.jpg
	),
	array(
		'acf_fc_layout' => 'pull_quote',
		'quote_text'    => 'Authority is built through structure, not volume.',
	),
	array(
		'acf_fc_layout' => 'full_width_image',
		'image'         => '',  // Set manually: toit-global-checkout-1920x1080.jpg
		'caption'       => 'Seamless multi-currency, multilingual commerce flow.',
	),
);
update_field( 'cs_vi_showcase', $showcase, $post_id );
WP_CLI::success( 'Updated showcase (4 layouts: full-width, two-col grid, pull quote, full-width)' );

// ─────────────────────────────────────────────
// 3. Replace Results (Repeater)
// ─────────────────────────────────────────────

$results = array(
	array(
		'stat_number'     => '4',
		'stat_label'      => 'Supported Languages',
		'supporting_text' => 'English, French, Spanish, Portuguese',
	),
	array(
		'stat_number'     => '5+',
		'stat_label'      => 'Currencies Supported',
		'supporting_text' => 'Built for international scale',
	),
	array(
		'stat_number'     => 'Structured',
		'stat_label'      => 'Knowledge Architecture',
		'supporting_text' => 'Fishing library + Fish Tech blog',
	),
	array(
		'stat_number'     => 'Global',
		'stat_label'      => 'API Shipping Coverage',
		'supporting_text' => 'Real-time international fulfilment',
	),
	array(
		'stat_number'     => 'Premium',
		'stat_label'      => 'Brand Perception Alignment',
		'supporting_text' => 'Digital experience matches engineered product',
	),
);
update_field( 'cs_vi_results', $results, $post_id );
WP_CLI::success( 'Updated results (5 items)' );

// ─────────────────────────────────────────────
// 4. Update CTA
// ─────────────────────────────────────────────

update_field( 'cs_cta_heading', 'Ready to build authority, not just a website?', $post_id );
update_field( 'cs_cta_subtext', 'Premium brands require premium structure.', $post_id );
update_field( 'cs_cta_button_text', 'Start a Project', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );
WP_CLI::success( 'Updated CTA' );

// ─────────────────────────────────────────────
// Done
// ─────────────────────────────────────────────

WP_CLI::success( "Toit Fishing case study updated (ID: {$post_id})" );
WP_CLI::log( '' );
WP_CLI::log( 'Images to upload in admin:' );
WP_CLI::log( '  Showcase 1 (full-width): toit-library-1920x1080.jpg' );
WP_CLI::log( '  Showcase 2 (two-col left): toit-knot-article-960x720.jpg' );
WP_CLI::log( '  Showcase 2 (two-col right): toit-youtube-integration-960x720.jpg' );
WP_CLI::log( '  Showcase 4 (full-width): toit-global-checkout-1920x1080.jpg' );
WP_CLI::log( '  Hero: toit-hero-global-1920x1080.jpg' );
