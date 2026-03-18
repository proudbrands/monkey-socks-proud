<?php
/**
 * Populate Homepage v2 ACF Fields
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/populate-homepage-v2.php
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Find the homepage
$home_page = get_page_by_path( 'home' );
if ( ! $home_page ) {
	// Try finding by template
	$pages = get_pages( array(
		'meta_key'   => '_wp_page_template',
		'meta_value' => 'template-home.php',
	) );
	$home_page = ! empty( $pages ) ? $pages[0] : null;
}

if ( ! $home_page ) {
	// Try the front page setting
	$front_id = (int) get_option( 'page_on_front' );
	if ( $front_id ) {
		$home_page = get_post( $front_id );
	}
}

if ( ! $home_page ) {
	WP_CLI::error( 'Could not find homepage. Check that a page uses the "Home" template.' );
}

$page_id = $home_page->ID;
WP_CLI::log( "Found homepage: \"{$home_page->post_title}\" (ID: {$page_id})" );


// ─────────────────────────────────────────────
// HERO
// ─────────────────────────────────────────────

update_field( 'hp_hero_label', 'Branding / Web / Search / AI', $page_id );
update_field( 'hp_hero_heading', 'We build brands that people remember', $page_id );
update_field( 'hp_hero_heading_highlight', 'remember', $page_id );
update_field( 'hp_hero_subheading', 'Strategy-led branding, high-performance websites, and search visibility that turns attention into revenue.', $page_id );
update_field( 'hp_hero_quiz_label', 'Discover Your Brand Direction', $page_id );
update_field( 'hp_hero_secondary_text', 'See Our Work', $page_id );
update_field( 'hp_hero_secondary_url', '/case-studies/', $page_id );

WP_CLI::success( 'Hero fields populated.' );


// ─────────────────────────────────────────────
// PAIN POINTS
// ─────────────────────────────────────────────

$pains = array(
	array(
		'icon' => '',
		'text' => 'Your website no longer reflects what your business has become',
	),
	array(
		'icon' => '',
		'text' => 'You are invisible on Google and competitors are taking your traffic',
	),
	array(
		'icon' => '',
		'text' => 'Your brand looks like everyone else in your industry',
	),
	array(
		'icon' => '',
		'text' => 'You are spending on marketing but cannot measure the return',
	),
);

update_field( 'hp_pains', $pains, $page_id );

WP_CLI::success( 'Pain points populated.' );


// ─────────────────────────────────────────────
// SERVICE PILLARS
// ─────────────────────────────────────────────

update_field( 'hp_pillars_label', 'What We Do', $page_id );
update_field( 'hp_pillars_heading', 'What does your brand need right now?', $page_id );

$pillars = array(
	array(
		'modifier'    => 'brand',
		'icon_svg'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>',
		'name'        => 'Branding',
		'description' => 'A brand identity that captures who you are, earns trust on first impression, and gives you a visual system that scales with your ambition.',
		'cta_text'    => 'Explore Branding',
		'link'        => '/branding-agency/',
	),
	array(
		'modifier'    => 'web',
		'icon_svg'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>',
		'name'        => 'Web Design',
		'description' => 'Websites built to convert, not just look good. Fast, mobile-first, and engineered to turn visitors into enquiries and customers.',
		'cta_text'    => 'Explore Web Design',
		'link'        => '/web-design-aylesbury/',
	),
	array(
		'modifier'    => 'search',
		'icon_svg'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M7 16l4-8 4 5 5-9"/></svg>',
		'name'        => 'Organic Search',
		'description' => 'Get found by the people already searching for what you sell. Ethical, measurable SEO that compounds over time and outlasts paid ads.',
		'cta_text'    => 'Explore SEO',
		'link'        => '/seo-agency-aylesbury/',
	),
	array(
		'modifier'    => 'ai',
		'icon_svg'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a4 4 0 0 1 4 4v2a4 4 0 0 1-8 0V6a4 4 0 0 1 4-4z"/><path d="M16 14H8a4 4 0 0 0-4 4v2h16v-2a4 4 0 0 0-4-4z"/><circle cx="9" cy="6" r="1"/><circle cx="15" cy="6" r="1"/></svg>',
		'name'        => 'AI Automation',
		'description' => 'Automate the repetitive work that slows your team down. CRM workflows, AI-powered chat, and data pipelines that free you to focus on growth.',
		'cta_text'    => 'Explore AI',
		'link'        => '/ai-automation/',
	),
);

update_field( 'hp_pillars', $pillars, $page_id );

WP_CLI::success( 'Service pillars populated.' );


// ─────────────────────────────────────────────
// CASE STUDIES
// ─────────────────────────────────────────────

update_field( 'hp_cs_label', 'Proven Results', $page_id );

// Leave hp_cs_featured empty so it falls back to latest 3
// If you want to hand-pick, uncomment and set post IDs:
// update_field( 'hp_cs_featured', array( 123, 456, 789 ), $page_id );

WP_CLI::success( 'Case studies section populated.' );


// ─────────────────────────────────────────────
// QUIZ CTA
// ─────────────────────────────────────────────

update_field( 'hp_quiz_heading', 'Not sure where to start?', $page_id );
update_field( 'hp_quiz_subtext', 'Take our 3-minute Brand Discovery quiz and get a personalised brand direction, tailored to your goals, style, and budget.', $page_id );
update_field( 'hp_quiz_label', 'Start the Brand Discovery Quiz', $page_id );

WP_CLI::success( 'Quiz CTA populated.' );


// ─────────────────────────────────────────────
// TESTIMONIAL
// ─────────────────────────────────────────────

update_field( 'hp_testimonial_quote', 'Proud Brands completely transformed how we present ourselves online. The new brand and website have directly contributed to a 40% increase in qualified enquiries. They genuinely understood our business from day one.', $page_id );
update_field( 'hp_testimonial_name', 'Client Testimonial', $page_id );
update_field( 'hp_testimonial_role', 'Replace with a real testimonial', $page_id );
// Photo left empty - add via WP Admin

WP_CLI::success( 'Testimonial populated.' );


// ─────────────────────────────────────────────
// DONE
// ─────────────────────────────────────────────

WP_CLI::success( "All Homepage v2 fields populated on page ID {$page_id}. Visit the homepage to review." );
