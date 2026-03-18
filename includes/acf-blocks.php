<?php
/**
 * ACF Block Registration
 *
 * Registers all custom ACF blocks for the Proud Brand FSE theme.
 * Each block uses a PHP render template in blocks/{name}/render.php.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register ACF Blocks.
 *
 * @return void
 */
function proud_brand_register_acf_blocks() {

	// Bail if ACF isn't active.
	if ( ! function_exists( 'acf_register_block_type' ) ) {
		return;
	}

	$blocks = proud_brand_get_block_definitions();

	foreach ( $blocks as $block ) {
		acf_register_block_type( $block );
	}
}
add_action( 'acf/init', 'proud_brand_register_acf_blocks' );

/**
 * Returns an array of block definitions.
 *
 * Each entry is an array passed directly to acf_register_block_type().
 * Add new blocks here as migration progresses through each phase.
 *
 * @return array[]
 */
function proud_brand_get_block_definitions() {

	$blocks = array();

	// ──────────────────────────────────────────────
	// Phase 2: Header & Footer Template Parts
	// ──────────────────────────────────────────────

	$blocks[] = array(
		'name'            => 'pb-header',
		'title'           => __( 'PB Header', 'proud-brand' ),
		'description'     => __( 'Site header with logo and navigation.', 'proud-brand' ),
		'render_template' => 'blocks/pb-header/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-site-alt3',
		'keywords'        => array( 'header', 'navigation', 'logo' ),
		'supports'        => array( 'align' => false, 'multiple' => false ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-cta-form',
		'title'           => __( 'PB CTA Form', 'proud-brand' ),
		'description'     => __( 'Contact CTA section with Gravity Form.', 'proud-brand' ),
		'render_template' => 'blocks/pb-cta-form/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'email',
		'keywords'        => array( 'contact', 'form', 'cta' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-footer',
		'title'           => __( 'PB Footer', 'proud-brand' ),
		'description'     => __( 'Site footer with logo, address, and social links.', 'proud-brand' ),
		'render_template' => 'blocks/pb-footer/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-site-alt3',
		'keywords'        => array( 'footer', 'contact', 'social' ),
		'supports'        => array( 'align' => false, 'multiple' => false ),
		'mode'            => 'preview',
	);

	// ──────────────────────────────────────────────
	// Phase 3: Simple Pages
	// ──────────────────────────────────────────────

	$blocks[] = array(
		'name'            => 'pb-thank-you-hero',
		'title'           => __( 'PB Thank You Hero', 'proud-brand' ),
		'description'     => __( 'Thank you message with download link.', 'proud-brand' ),
		'render_template' => 'blocks/pb-thank-you-hero/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'heart',
		'keywords'        => array( 'thank you', 'download', 'hero' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-related-resources',
		'title'           => __( 'PB Related Resources', 'proud-brand' ),
		'description'     => __( 'Grid of related resource posts.', 'proud-brand' ),
		'render_template' => 'blocks/pb-related-resources/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'book-alt',
		'keywords'        => array( 'resources', 'related', 'download' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-blog-header',
		'title'           => __( 'PB Blog Header', 'proud-brand' ),
		'description'     => __( 'Blog title, description, and search/filter form.', 'proud-brand' ),
		'render_template' => 'blocks/pb-blog-header/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-post',
		'keywords'        => array( 'blog', 'header', 'search' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-post-grid',
		'title'           => __( 'PB Post Grid', 'proud-brand' ),
		'description'     => __( 'Blog post grid with AJAX load more.', 'proud-brand' ),
		'render_template' => 'blocks/pb-post-grid/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'grid-view',
		'keywords'        => array( 'blog', 'posts', 'grid' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-resources-header',
		'title'           => __( 'PB Resources Header', 'proud-brand' ),
		'description'     => __( 'Resources title, description, and search/filter form.', 'proud-brand' ),
		'render_template' => 'blocks/pb-resources-header/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'book-alt',
		'keywords'        => array( 'resources', 'header', 'search' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-resource-grid',
		'title'           => __( 'PB Resource Grid', 'proud-brand' ),
		'description'     => __( 'Resource post grid with AJAX load more.', 'proud-brand' ),
		'render_template' => 'blocks/pb-resource-grid/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'grid-view',
		'keywords'        => array( 'resources', 'grid', 'download' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	// ──────────────────────────────────────────────
	// Phase 4: Contact, Blog Detail, Resources & Portfolio
	// ──────────────────────────────────────────────

	$blocks[] = array(
		'name'            => 'pb-contact-hero',
		'title'           => __( 'PB Contact Hero', 'proud-brand' ),
		'description'     => __( 'Contact page banner with typing effect.', 'proud-brand' ),
		'render_template' => 'blocks/pb-contact-hero/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'megaphone',
		'keywords'        => array( 'contact', 'hero', 'banner' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-calendly-popup',
		'title'           => __( 'PB Calendly Popup', 'proud-brand' ),
		'description'     => __( 'Calendly booking widget.', 'proud-brand' ),
		'render_template' => 'blocks/pb-calendly-popup/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'calendar-alt',
		'keywords'        => array( 'calendly', 'booking', 'schedule' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-contact-form',
		'title'           => __( 'PB Contact Form', 'proud-brand' ),
		'description'     => __( 'Contact form section with Gravity Form.', 'proud-brand' ),
		'render_template' => 'blocks/pb-contact-form/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'feedback',
		'keywords'        => array( 'contact', 'form', 'gravity' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-map-contact-info',
		'title'           => __( 'PB Map & Contact Info', 'proud-brand' ),
		'description'     => __( 'Google Maps with business info and hours.', 'proud-brand' ),
		'render_template' => 'blocks/pb-map-contact-info/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'location-alt',
		'keywords'        => array( 'map', 'contact', 'hours' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-faq-accordion',
		'title'           => __( 'PB FAQ Accordion', 'proud-brand' ),
		'description'     => __( 'FAQ section with collapsible items.', 'proud-brand' ),
		'render_template' => 'blocks/pb-faq-accordion/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'editor-help',
		'keywords'        => array( 'faq', 'accordion', 'questions' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-client-marquee',
		'title'           => __( 'PB Client Marquee', 'proud-brand' ),
		'description'     => __( 'Scrolling company logos.', 'proud-brand' ),
		'render_template' => 'blocks/pb-client-marquee/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'slides',
		'keywords'        => array( 'clients', 'logos', 'marquee' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-reading-progress-bar',
		'title'           => __( 'PB Reading Progress Bar', 'proud-brand' ),
		'description'     => __( 'Reading progress indicator.', 'proud-brand' ),
		'render_template' => 'blocks/pb-reading-progress-bar/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'minus',
		'keywords'        => array( 'progress', 'reading', 'bar' ),
		'supports'        => array( 'align' => false, 'multiple' => false ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-blog-detail-hero',
		'title'           => __( 'PB Blog Detail Hero', 'proud-brand' ),
		'description'     => __( 'Single post hero with metadata.', 'proud-brand' ),
		'render_template' => 'blocks/pb-blog-detail-hero/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-post',
		'keywords'        => array( 'blog', 'detail', 'hero' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-about-author',
		'title'           => __( 'PB About Author', 'proud-brand' ),
		'description'     => __( 'Author bio with profile picture.', 'proud-brand' ),
		'render_template' => 'blocks/pb-about-author/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-users',
		'keywords'        => array( 'author', 'bio', 'profile' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-post-navigation',
		'title'           => __( 'PB Post Navigation', 'proud-brand' ),
		'description'     => __( 'Previous/Next post links.', 'proud-brand' ),
		'render_template' => 'blocks/pb-post-navigation/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'arrow-left-alt2',
		'keywords'        => array( 'navigation', 'previous', 'next' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-share-social',
		'title'           => __( 'PB Share Social', 'proud-brand' ),
		'description'     => __( 'Social sharing links.', 'proud-brand' ),
		'render_template' => 'blocks/pb-share-social/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'share',
		'keywords'        => array( 'share', 'social', 'links' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-related-posts',
		'title'           => __( 'PB Related Posts', 'proud-brand' ),
		'description'     => __( 'Related posts grid.', 'proud-brand' ),
		'render_template' => 'blocks/pb-related-posts/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'grid-view',
		'keywords'        => array( 'related', 'posts', 'grid' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-resource-detail-hero',
		'title'           => __( 'PB Resource Detail Hero', 'proud-brand' ),
		'description'     => __( 'Resource download page banner.', 'proud-brand' ),
		'render_template' => 'blocks/pb-resource-detail-hero/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'download',
		'keywords'        => array( 'resource', 'detail', 'hero' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-resource-cta',
		'title'           => __( 'PB Resource CTA', 'proud-brand' ),
		'description'     => __( 'Resource call-to-action section.', 'proud-brand' ),
		'render_template' => 'blocks/pb-resource-cta/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'megaphone',
		'keywords'        => array( 'resource', 'cta', 'download' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-our-work-header',
		'title'           => __( 'PB Our Work Header', 'proud-brand' ),
		'description'     => __( 'Portfolio header with category filters.', 'proud-brand' ),
		'render_template' => 'blocks/pb-our-work-header/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'portfolio',
		'keywords'        => array( 'portfolio', 'work', 'header' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-our-work-grid',
		'title'           => __( 'PB Our Work Grid', 'proud-brand' ),
		'description'     => __( 'Portfolio grid with complex layout.', 'proud-brand' ),
		'render_template' => 'blocks/pb-our-work-grid/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'grid-view',
		'keywords'        => array( 'portfolio', 'work', 'grid' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	// ──────────────────────────────────────────────
	// Phase 5: Home, About, Case Study, Our Works Page
	// ──────────────────────────────────────────────

	// Home page blocks.
	$blocks[] = array(
		'name'            => 'pb-home-banner',
		'title'           => __( 'PB Home Banner', 'proud-brand' ),
		'description'     => __( 'Home hero banner with marquee logos.', 'proud-brand' ),
		'render_template' => 'blocks/pb-home-banner/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'cover-image',
		'keywords'        => array( 'home', 'banner', 'hero' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-case-study-grid',
		'title'           => __( 'PB Case Study Grid', 'proud-brand' ),
		'description'     => __( 'Home page case studies grid.', 'proud-brand' ),
		'render_template' => 'blocks/pb-case-study-grid/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'grid-view',
		'keywords'        => array( 'case study', 'grid', 'portfolio' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-skills-section',
		'title'           => __( 'PB Skills Section', 'proud-brand' ),
		'description'     => __( 'Skills list with image hover swap.', 'proud-brand' ),
		'render_template' => 'blocks/pb-skills-section/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'lightbulb',
		'keywords'        => array( 'skills', 'services', 'hover' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-featured-articles',
		'title'           => __( 'PB Featured Articles', 'proud-brand' ),
		'description'     => __( 'Featured blog posts grid.', 'proud-brand' ),
		'render_template' => 'blocks/pb-featured-articles/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-post',
		'keywords'        => array( 'blog', 'articles', 'featured' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-tech-partners-marquee',
		'title'           => __( 'PB Tech Partners Marquee', 'proud-brand' ),
		'description'     => __( 'Technology partner logos.', 'proud-brand' ),
		'render_template' => 'blocks/pb-tech-partners-marquee/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'slides',
		'keywords'        => array( 'partners', 'logos', 'technology' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	// About page blocks.
	$blocks[] = array(
		'name'            => 'pb-about-hero',
		'title'           => __( 'PB About Hero', 'proud-brand' ),
		'description'     => __( 'About page title and description.', 'proud-brand' ),
		'render_template' => 'blocks/pb-about-hero/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'info-outline',
		'keywords'        => array( 'about', 'hero', 'title' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-skills-grid',
		'title'           => __( 'PB Skills Grid', 'proud-brand' ),
		'description'     => __( 'Skills grid with dark background.', 'proud-brand' ),
		'render_template' => 'blocks/pb-skills-grid/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'screenoptions',
		'keywords'        => array( 'skills', 'grid', 'branding' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-stats-counters',
		'title'           => __( 'PB Stats Counters', 'proud-brand' ),
		'description'     => __( 'Animated counter statistics.', 'proud-brand' ),
		'render_template' => 'blocks/pb-stats-counters/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'chart-bar',
		'keywords'        => array( 'stats', 'counter', 'numbers' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-services-repeater',
		'title'           => __( 'PB Services Repeater', 'proud-brand' ),
		'description'     => __( 'Services grid section.', 'proud-brand' ),
		'render_template' => 'blocks/pb-services-repeater/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'networking',
		'keywords'        => array( 'services', 'believing', 'grid' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-client-logos',
		'title'           => __( 'PB Client Logos', 'proud-brand' ),
		'description'     => __( 'Client logos grid.', 'proud-brand' ),
		'render_template' => 'blocks/pb-client-logos/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'groups',
		'keywords'        => array( 'clients', 'logos', 'partners' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-team-grid',
		'title'           => __( 'PB Team Grid', 'proud-brand' ),
		'description'     => __( 'Team members with hexagon images.', 'proud-brand' ),
		'render_template' => 'blocks/pb-team-grid/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-users',
		'keywords'        => array( 'team', 'members', 'hexagon' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-full-width-image',
		'title'           => __( 'PB Full Width Image', 'proud-brand' ),
		'description'     => __( 'Responsive full-width image.', 'proud-brand' ),
		'render_template' => 'blocks/pb-full-width-image/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'format-image',
		'keywords'        => array( 'image', 'full-width', 'office' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	// Case Study page blocks.
	$blocks[] = array(
		'name'            => 'pb-case-study-banner',
		'title'           => __( 'PB Case Study Banner', 'proud-brand' ),
		'description'     => __( 'Case study banner with hexagons.', 'proud-brand' ),
		'render_template' => 'blocks/pb-case-study-banner/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'welcome-view-site',
		'keywords'        => array( 'case study', 'banner', 'hero' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-case-study-intro',
		'title'           => __( 'PB Case Study Intro', 'proud-brand' ),
		'description'     => __( 'Case study intro text.', 'proud-brand' ),
		'render_template' => 'blocks/pb-case-study-intro/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'text-page',
		'keywords'        => array( 'case study', 'intro', 'description' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-seo-works',
		'title'           => __( 'PB SEO Works', 'proud-brand' ),
		'description'     => __( 'What we did section with expertise.', 'proud-brand' ),
		'render_template' => 'blocks/pb-seo-works/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'visibility',
		'keywords'        => array( 'seo', 'expertise', 'work' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-full-width-image-points',
		'title'           => __( 'PB Full Width Image + Points', 'proud-brand' ),
		'description'     => __( 'Full-width image with counter stat boxes.', 'proud-brand' ),
		'render_template' => 'blocks/pb-full-width-image-points/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'format-image',
		'keywords'        => array( 'image', 'stats', 'counter' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-graph-section',
		'title'           => __( 'PB Graph Section', 'proud-brand' ),
		'description'     => __( 'Problems and solution with animated graph.', 'proud-brand' ),
		'render_template' => 'blocks/pb-graph-section/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'chart-bar',
		'keywords'        => array( 'graph', 'solution', 'problems' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-testimonial',
		'title'           => __( 'PB Testimonial', 'proud-brand' ),
		'description'     => __( 'Testimonial quote section.', 'proud-brand' ),
		'render_template' => 'blocks/pb-testimonial/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'format-quote',
		'keywords'        => array( 'testimonial', 'quote', 'review' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-swiper-carousel',
		'title'           => __( 'PB Swiper Carousel', 'proud-brand' ),
		'description'     => __( 'Featured projects Swiper slider.', 'proud-brand' ),
		'render_template' => 'blocks/pb-swiper-carousel/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'images-alt2',
		'keywords'        => array( 'carousel', 'slider', 'projects' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	// ──────────────────────────────────────────────
	// Phase 6: Services (Flexible Content) & Single Our Work
	// ──────────────────────────────────────────────

	// Services page blocks.
	$blocks[] = array(
		'name'            => 'pb-service-banner',
		'title'           => __( 'PB Service Banner', 'proud-brand' ),
		'description'     => __( 'Services hero with typing effect and video.', 'proud-brand' ),
		'render_template' => 'blocks/pb-service-banner/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'cover-image',
		'keywords'        => array( 'services', 'banner', 'hero' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-business-thrive',
		'title'           => __( 'PB Business Thrive', 'proud-brand' ),
		'description'     => __( 'Business thrive points with CTA.', 'proud-brand' ),
		'render_template' => 'blocks/pb-business-thrive/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'chart-line',
		'keywords'        => array( 'business', 'thrive', 'points' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-expert-section',
		'title'           => __( 'PB Expert Section', 'proud-brand' ),
		'description'     => __( 'Expert section with dual description columns.', 'proud-brand' ),
		'render_template' => 'blocks/pb-expert-section/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'businessman',
		'keywords'        => array( 'expert', 'columns', 'description' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-website-difference',
		'title'           => __( 'PB Website Difference', 'proud-brand' ),
		'description'     => __( 'Alternating points with video section.', 'proud-brand' ),
		'render_template' => 'blocks/pb-website-difference/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'laptop',
		'keywords'        => array( 'website', 'difference', 'video' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-digital-section',
		'title'           => __( 'PB Digital Section', 'proud-brand' ),
		'description'     => __( 'Digital section with image, points, and video.', 'proud-brand' ),
		'render_template' => 'blocks/pb-digital-section/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-site',
		'keywords'        => array( 'digital', 'section', 'points' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-tabs-section',
		'title'           => __( 'PB Tabs Section', 'proud-brand' ),
		'description'     => __( 'Tabbed content with desktop and mobile views.', 'proud-brand' ),
		'render_template' => 'blocks/pb-tabs-section/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'table-row-after',
		'keywords'        => array( 'tabs', 'tabbed', 'content' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-project-slider',
		'title'           => __( 'PB Project Slider', 'proud-brand' ),
		'description'     => __( 'Project slider with success stats.', 'proud-brand' ),
		'render_template' => 'blocks/pb-project-slider/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'images-alt2',
		'keywords'        => array( 'project', 'slider', 'stats' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-web-work-section',
		'title'           => __( 'PB Web Work Section', 'proud-brand' ),
		'description'     => __( 'Caption, headings, description with points list.', 'proud-brand' ),
		'render_template' => 'blocks/pb-web-work-section/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'editor-ul',
		'keywords'        => array( 'web', 'work', 'points' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-build-steps-white',
		'title'           => __( 'PB Build Steps White', 'proud-brand' ),
		'description'     => __( 'Numbered build steps on light background.', 'proud-brand' ),
		'render_template' => 'blocks/pb-build-steps-white/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'editor-ol',
		'keywords'        => array( 'steps', 'build', 'white' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-build-steps-dark',
		'title'           => __( 'PB Build Steps Dark', 'proud-brand' ),
		'description'     => __( 'Numbered build steps on dark background.', 'proud-brand' ),
		'render_template' => 'blocks/pb-build-steps-dark/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'editor-ol',
		'keywords'        => array( 'steps', 'build', 'dark' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-digital-partner',
		'title'           => __( 'PB Digital Partner', 'proud-brand' ),
		'description'     => __( 'Digital partner section with icon boxes.', 'proud-brand' ),
		'render_template' => 'blocks/pb-digital-partner/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-links',
		'keywords'        => array( 'digital', 'partner', 'icons' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-opposite-sections',
		'title'           => __( 'PB Opposite Sections', 'proud-brand' ),
		'description'     => __( 'Alternating image and text rows.', 'proud-brand' ),
		'render_template' => 'blocks/pb-opposite-sections/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'columns',
		'keywords'        => array( 'opposite', 'alternating', 'rows' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-online-success',
		'title'           => __( 'PB Online Success', 'proud-brand' ),
		'description'     => __( 'Full-width image with heading and description.', 'proud-brand' ),
		'render_template' => 'blocks/pb-online-success/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'format-image',
		'keywords'        => array( 'online', 'success', 'image' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-software-compatibility',
		'title'           => __( 'PB Software Compatibility', 'proud-brand' ),
		'description'     => __( 'Software compatibility section with image.', 'proud-brand' ),
		'render_template' => 'blocks/pb-software-compatibility/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'admin-plugins',
		'keywords'        => array( 'software', 'compatibility', 'critical' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-faq-cta',
		'title'           => __( 'PB FAQ & CTA', 'proud-brand' ),
		'description'     => __( 'FAQ accordion with call-to-action buttons.', 'proud-brand' ),
		'render_template' => 'blocks/pb-faq-cta/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'editor-help',
		'keywords'        => array( 'faq', 'cta', 'accordion' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	// Search results block.
	$blocks[] = array(
		'name'            => 'pb-search-results',
		'title'           => __( 'PB Search Results', 'proud-brand' ),
		'description'     => __( 'Search results for blog and resources.', 'proud-brand' ),
		'render_template' => 'blocks/pb-search-results/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'search',
		'keywords'        => array( 'search', 'results', 'query' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	// Single Our Work blocks.
	$blocks[] = array(
		'name'            => 'pb-problems-section',
		'title'           => __( 'PB Problems Section', 'proud-brand' ),
		'description'     => __( 'Problems WYSIWYG content section.', 'proud-brand' ),
		'render_template' => 'blocks/pb-problems-section/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'warning',
		'keywords'        => array( 'problems', 'content', 'wysiwyg' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-roi-section',
		'title'           => __( 'PB ROI Section', 'proud-brand' ),
		'description'     => __( 'ROI boxes with equal heights.', 'proud-brand' ),
		'render_template' => 'blocks/pb-roi-section/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'chart-bar',
		'keywords'        => array( 'roi', 'results', 'boxes' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	$blocks[] = array(
		'name'            => 'pb-related-projects-slider',
		'title'           => __( 'PB Related Projects Slider', 'proud-brand' ),
		'description'     => __( 'Related our_work posts Swiper slider.', 'proud-brand' ),
		'render_template' => 'blocks/pb-related-projects-slider/render.php',
		'category'        => 'proud-brand',
		'icon'            => 'slides',
		'keywords'        => array( 'related', 'projects', 'slider' ),
		'supports'        => array( 'align' => array( 'full', 'wide' ) ),
		'mode'            => 'preview',
	);

	return $blocks;
}
