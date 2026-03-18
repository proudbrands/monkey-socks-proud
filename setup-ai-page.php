<?php
/**
 * AI & Automation Page Setup Script
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/setup-ai-page.php
 *
 * Creates the AI & Automation service page using the Services template
 * and populates all ACF flexible content fields with content from the brief.
 *
 * Idempotent — safe to run multiple times.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ─────────────────────────────────────────────
// 1. Create or find the AI & Automation page
// ─────────────────────────────────────────────

$existing = get_page_by_path( 'ai-automation' );

if ( $existing ) {
	$page_id = $existing->ID;
	WP_CLI::log( "Page 'AI & Automation' already exists (ID: $page_id). Updating content." );
} else {
	$page_id = wp_insert_post( array(
		'post_title'   => 'AI & Automation',
		'post_name'    => 'ai-automation',
		'post_status'  => 'publish',
		'post_type'    => 'page',
		'post_content' => '',
	));

	if ( is_wp_error( $page_id ) ) {
		WP_CLI::error( 'Failed to create page: ' . $page_id->get_error_message() );
	}

	WP_CLI::success( "Created page 'AI & Automation' (ID: $page_id)" );
}

// Set the page template to Services
update_post_meta( $page_id, '_wp_page_template', 'template-services.php' );
WP_CLI::log( 'Set page template to template-services.php' );


// ─────────────────────────────────────────────
// 2. Build the flexible content sections array
// ─────────────────────────────────────────────

$sections = array();

// --- SECTION 1: Hero Banner ---
$sections[] = array(
	'acf_fc_layout'            => 'description_button_link_image',
	'services_sec1_caption'    => 'Work Smarter. Grow Faster. Without Taking On More Staff.',
	'services_sec1_heading'    => 'AI & Automation Working',
	'colorfull_heading'        => 'Hard for Your Business',
	'services_sec1_description'=> 'We help local businesses save time, reduce costs, and grow their revenue — by automating the repetitive tasks and connecting the systems that already run your business.',
	'services_sec1_button_link'=> 'Book a Free Automation Chat',
	'image_video'              => 'image',
	'services_sec1_image'      => '',
);

// --- SECTION 2: Intro / Who We Are ---
$sections[] = array(
	'acf_fc_layout'                  => 'heading_left_decription_right_description',
	'services_sec3_caption'          => 'Is your team doing work that a system could be doing for them?',
	'services_sec3_heading'          => "Buckinghamshire's Practical AI & Automation Experts",
	'services_sec3_colorfull_heading'=> '— Real results, not robot jargon',
	'services_sec3_left_description' => '<p>Most small and medium-sized businesses are sitting on a goldmine of wasted time. Manual data entry. Leads falling through the cracks. Chasing invoices. Replying to the same enquiries over and over. Copying information between systems that should be talking to each other.</p>

<p>At Proud Brands, we don\'t sell hype. We roll up our sleeves and find the specific processes inside your business where AI and automation can quietly take the strain — giving your team back hours every week and making sure nothing falls through the gaps.</p>',

	'services_sec3_right_description'=> '<p>We\'re not an AI consultancy that sends you a 40-page report and disappears. We\'re your local digital partner — the same people who build your website, understand your brand, and are invested in your growth. Think of us as the team that puts AI to work in the background, so you don\'t have to think about it.</p>

<p>AI is only useful if it actually works for your business — not just in a demo. We focus on practical, proven automation that integrates with the tools you already use and delivers results you can measure.</p>',
);

// --- SECTION 3: What Makes Different (3 Points) ---
$sections[] = array(
	'acf_fc_layout'              => 'heading_repeater_button_link',
	'services_sec2_heading'      => 'What Makes Our AI & Automation Work Different?',
	'services_sec2_business_thrive' => array(
		array(
			'image__icon' => '',
			'title'       => 'Saves real time',
			'description' => 'We measure the hours saved, not just the hours promised.',
		),
		array(
			'image__icon' => '',
			'title'       => 'Connects your systems',
			'description' => 'So data flows between your website, CRM, and tools without anyone touching it.',
		),
		array(
			'image__icon' => '',
			'title'       => 'Scales with you',
			'description' => 'Built to grow as your business does, without rebuilding from scratch.',
		),
	),
	'services_sec2_button_link'  => '',
	'services_sec2_text'         => '',
);

// --- SECTION 4: Tabs (4 Service Types) ---
$sections[] = array(
	'acf_fc_layout'              => 'caption_heading_desc_tabs',
	'services_sec5_caption'      => '',
	'services_sec5_heading'      => 'Our AI & Automation',
	'services_sec5_colorfull_heading' => 'Services',
	'services_sec5_description'  => '',
	'services_sec5_tabs'         => array(
		// Tab 1: Workflow Automation
		array(
			'tab'         => 'Workflow Automation',
			'heading'     => 'Perfect for: businesses spending too many hours on manual, repetitive tasks',
			'description' => "If your team is manually copying data between systems, sending the same emails repeatedly, or chasing the same information every week — that's time and money leaving your business quietly every single day.\n\nWe map out exactly where the bottlenecks are, then build automations that handle the admin so your people can focus on what actually matters. Think of it like hiring a very reliable, very fast member of staff who never needs a day off.\n\n• Automated lead follow-up sequences\n• Quote and invoice generation workflows\n• Internal approval and notification systems\n• Data entry and system sync automations\n• Automated reporting and dashboards\n• & removing the manual work that slows you down",
			'image'       => '',
		),
		// Tab 2: Website & Business System Integration
		array(
			'tab'         => 'System Integration',
			'heading'     => 'Perfect for: businesses where the website and back-office systems don\'t talk to each other',
			'description' => "Your website shouldn't be an island. Every enquiry, order, booking, or contact form submission should automatically flow into the right system — your CRM, your email platform, your accounting software — without anyone having to copy and paste.\n\nWe connect your WordPress website to the tools your business runs on, so leads are captured, customers are nurtured, and your team always has the information they need — in the right place, at the right time.\n\n• WordPress to CRM integration (HubSpot, Zoho, and others)\n• Booking system and calendar integration\n• E-commerce and stock management connections\n• Payment and accounting system sync\n• Form submission to workflow triggers\n• & any integration that currently requires a human in the middle",
			'image'       => '',
		),
		// Tab 3: AI Customer Engagement
		array(
			'tab'         => 'AI Customer Engagement',
			'heading'     => 'Perfect for: businesses that receive high volumes of enquiries or want to improve response times',
			'description' => "Your customers don't keep office hours. A well-built AI assistant on your website can answer questions, qualify leads, book appointments, and handle common support queries — at any time of day, without your team having to lift a finger.\n\nWe build and configure AI chat and voice assistants that are trained on your business — your services, your FAQs, your pricing. Not a generic bot, but something that actually represents you and converts conversations into customers.\n\n• AI website chatbots trained on your content\n• Automated lead qualification and routing\n• 24/7 FAQ and customer support handling\n• Appointment booking via AI assistant\n• AI-assisted email and enquiry responses\n• & reducing the back-and-forth that costs your team time",
			'image'       => '',
		),
		// Tab 4: AI Content & Marketing Automation
		array(
			'tab'         => 'AI Content & Marketing',
			'heading'     => 'Perfect for: businesses that want to produce more content and run smarter marketing without more resource',
			'description' => "Content takes time. Email campaigns take time. Social media takes time. AI doesn't eliminate the need for great content — but it can dramatically cut the time it takes to create it, schedule it, and get it in front of the right people.\n\nWe set up AI-assisted content workflows and marketing automations that keep your business visible online — without your team having to write every blog post, email, or social update from scratch. Human oversight always stays in the loop.\n\n• AI-assisted blog and SEO content production\n• Automated email nurture sequences\n• Social media scheduling and post generation\n• Product description generation at scale\n• AI-generated ad copy and creative briefs\n• & scaling your content output without scaling your headcount",
			'image'       => '',
		),
	),
);

// --- SECTION 5: Results / Stats ---
$sections[] = array(
	'acf_fc_layout'                 => 'caption_heading_slider_points_description',
	'services_sec6_caption'         => '',
	'services_sec6_heading'         => 'Real businesses. Real hours saved.',
	'services_sec6_colorfull_heading'=> '',
	'services_sec6_project_images'  => array(),
	'services_sec6_client_name'     => '',
	'services_sec6_specification'   => array(
		array(
			'title'      => 'Hours saved per week',
			'percentage' => '[X]hrs',
		),
		array(
			'title'      => 'Reduction in manual admin',
			'percentage' => '[X]%',
		),
		array(
			'title'      => 'Response time improvement',
			'percentage' => '[X]%',
		),
	),
	'services_sec6_bottom_heading'  => 'Ready to find out what automation could do for your business?',
	'services_sec6_description'     => 'The best way to start is a free conversation. We\'ll look at your current processes and tell you honestly where automation would make the biggest difference — and where it wouldn\'t. No jargon, no obligation.',
	'services_sec6_button_link'     => 'Book a Free Chat',
);

// --- SECTION 6: Six-Point Features Grid ---
$sections[] = array(
	'acf_fc_layout'              => 'caption_heading_repeater',
	'services_sec9_caption'      => '',
	'services_sec9_heading'      => "Here's how we make sure your automation works as hard as you do",
	'services_sec9_colorfull_heading' => '',
	'services_sec9_points'       => array(
		array(
			'image__icon' => '',
			'title'       => 'No jargon, just results',
			'description' => "We don't talk about AI for the sake of it. Every recommendation we make is grounded in whether it will actually save you time and money. If something isn't worth automating, we'll tell you.",
		),
		array(
			'image__icon' => '',
			'title'       => 'Built around your existing systems',
			'description' => "We work with the tools you already use — not against them. Whether you're on HubSpot, Xero, Google Workspace, or something bespoke, we find the integration path that makes sense for you.",
		),
		array(
			'image__icon' => '',
			'title'       => 'Human oversight always included',
			'description' => "AI works best when humans stay in control. We design every automation with clear oversight built in — you'll always know what's running, what it's doing, and how to intervene if needed.",
		),
		array(
			'image__icon' => '',
			'title'       => 'We measure the impact',
			'description' => 'Good automation should be provable. We track time saved, leads captured, and revenue influenced — so you can see the return on your investment in plain numbers.',
		),
		array(
			'image__icon' => '',
			'title'       => 'Stays connected to your brand',
			'description' => 'Because we also handle your website and branding, your AI-powered touchpoints — chatbots, emails, content — are consistent with who you are. Not a bolted-on tool, but part of your brand experience.',
		),
		array(
			'image__icon' => '',
			'title'       => 'Scales as you grow',
			'description' => "We don't build automations that become dead weight in 12 months. Everything we set up is designed to grow with your business — whether you're adding services, new team members, or moving into new markets.",
		),
	),
);

// --- SECTION 7: Three-Step Process ---
$sections[] = array(
	'acf_fc_layout'              => 'caption_heading_repeater_link_white',
	'services_sec8_caption'      => '',
	'services_sec8_heading'      => 'Our simple three-step process to getting AI',
	'services_sec8_colorfull_heading' => 'working for you',
	'services_sec8_points'       => array(
		array(
			'title'       => 'Discovery & Mapping',
			'description' => "We start by understanding your business properly. What does your team actually do every day? Where do things slow down? What tools are you already using? Over a friendly conversation (and probably a cup of tea), we map out your current processes and spot where automation would make the biggest difference. This isn't a sales pitch — it's a genuine audit.",
		),
		array(
			'title'       => 'Build & Integrate',
			'description' => "This is where we roll up our sleeves. We build your automations, connect your systems, and test everything thoroughly before it goes anywhere near your live business. You'll see exactly what we've built and how it works before we switch anything on.",
		),
		array(
			'title'       => 'Launch, Monitor & Optimise',
			'description' => "Once everything's live, we don't disappear. We monitor what's working, measure the time and cost savings, and keep optimising as your business evolves. Think of us as your ongoing automation team — not a one-off project.",
		),
	),
	'services_sec8_button_link'  => array(
		'url'    => '/contact/',
		'title'  => 'Book a Free Chat',
		'target' => '',
	),
);

// --- SECTION 8: Digital Partner (6 Boxes) ---
$sections[] = array(
	'acf_fc_layout'              => 'caption_heading_repeater',
	'services_sec9_caption'      => '',
	'services_sec9_heading'      => 'More Than Just Automation —',
	'services_sec9_colorfull_heading' => 'Your Complete Digital Partner',
	'services_sec9_points'       => array(
		array(
			'image__icon' => '',
			'title'       => 'Process Mapping',
			'description' => "Before we automate anything, we understand it. Our process mapping sessions give you a clear picture of where time is being lost — and the highest-value places to fix it first.",
		),
		array(
			'image__icon' => '',
			'title'       => 'CRM Integration',
			'description' => "Connect your website, forms, and enquiries directly into your CRM — so every lead is captured, every follow-up is triggered, and nothing gets lost in someone's inbox.",
		),
		array(
			'image__icon' => '',
			'title'       => 'AI Chatbots & Assistants',
			'description' => 'From simple FAQ bots to fully trained AI assistants that can qualify leads and book appointments, we build chat experiences that work for your customers and save your team time.',
		),
		array(
			'image__icon' => '',
			'title'       => 'Email & Marketing Automation',
			'description' => "Automated nurture sequences, onboarding emails, re-engagement campaigns — we set up the flows that keep your customers engaged without you having to press send every time.",
		),
		array(
			'image__icon' => '',
			'title'       => 'Reporting & Analytics',
			'description' => "See the impact of your automations in clear, honest numbers. We set up dashboards that show you what's working, what's been saved, and where the next opportunity lies.",
		),
		array(
			'image__icon' => '',
			'title'       => 'Ongoing Support & Optimisation',
			'description' => "Automation isn't a set-and-forget exercise. We stay involved — monitoring, updating, and optimising your workflows as your business changes and AI tools continue to evolve.",
		),
	),
);

// --- SECTION 9: FAQ + CTA ---
$sections[] = array(
	'acf_fc_layout'             => 'heading_faq_text_2_button_link',
	'services_sec10_heading'    => 'Frequently Asked Questions',
	'services_sec10_frequently_asked_questions' => array(
		array(
			'question' => 'Do I need to be a tech-savvy business to use AI automation?',
			'answer'   => "Not at all. In fact, most of the businesses we work with are brilliant at what they do but have no interest in the technical side of things. That's why we handle everything — you just tell us what's slow or frustrating, and we fix it. You don't need to understand how it works to benefit from it.",
		),
		array(
			'question' => 'Will this replace my team?',
			'answer'   => "No — and that's not what it's for. Automation handles the repetitive, low-value tasks that drain your team's time and energy. Your people end up doing more of the work that actually needs a human — the creative thinking, the relationship building, the problem solving. Most businesses find morale goes up when the admin goes down.",
		),
		array(
			'question' => 'What tools do you work with?',
			'answer'   => 'We work with a wide range of tools including WordPress, HubSpot, Zoho CRM, Mailchimp, ActiveCampaign, Google Workspace, Xero, and more. We also work with automation platforms like Zapier and Make (formerly Integromat) to connect systems that don\'t have a native integration. If you\'re not sure whether we can work with your tech stack, just ask — the answer is usually yes.',
		),
		array(
			'question' => "What if I'm not sure what I need?",
			'answer'   => "That's exactly what the free discovery chat is for. You don't need to arrive with a brief. You just need to tell us what feels slow, repetitive, or frustrating in your business — and we'll tell you what's possible. No jargon, no pressure.",
		),
		array(
			'question' => 'How long does it take to see results?',
			'answer'   => "It depends on the complexity of the project, but many of our simpler automations — like connecting a contact form to a CRM with automated follow-up — can be live within a week. More complex integrations and AI assistants typically take two to four weeks to build and test properly. We'll always give you a clear timeline upfront.",
		),
		array(
			'question' => 'Is AI-generated content going to damage my brand?',
			'answer'   => "Not if it's done properly. We never publish AI-generated content without human review — every piece goes through an editorial process to make sure it sounds like you and meets your standards. If you'd rather not use AI for content at all, that's absolutely fine too. We'll always be transparent about how we're using it.",
		),
	),
	'services_sec10_title'        => "Every great business runs on smart systems. Let's find out where automation can make the biggest difference for yours.",
	'services_sec10_button_link_1'=> 'Book a Free Chat',
	'services_sec10_button_link_2'=> array(
		'url'    => '/contact/',
		'title'  => 'Start Your Project',
		'target' => '',
	),
);


// ─────────────────────────────────────────────
// 3. Save the flexible content field
// ─────────────────────────────────────────────

$result = update_field( 'services_page_sections', $sections, $page_id );

if ( $result ) {
	WP_CLI::success( 'Populated services_page_sections with ' . count( $sections ) . ' layouts.' );
} else {
	// update_field can return false if the field key isn't found.
	// Try the manual meta approach as a fallback.
	WP_CLI::warning( 'update_field returned false. Trying manual meta approach...' );

	// Manual approach: write meta keys directly like ACF stores them.
	// First, clear any existing flexible content data.
	$wpdb = $GLOBALS['wpdb'];
	$wpdb->query( $wpdb->prepare(
		"DELETE FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key LIKE %s",
		$page_id,
		'services_page_sections%'
	) );

	// Set the row count.
	update_post_meta( $page_id, 'services_page_sections', count( $sections ) );

	foreach ( $sections as $i => $section ) {
		$layout = $section['acf_fc_layout'];
		update_post_meta( $page_id, "services_page_sections_{$i}_acf_fc_layout", $layout );

		foreach ( $section as $key => $value ) {
			if ( $key === 'acf_fc_layout' ) continue;

			if ( is_array( $value ) && ! empty( $value ) && isset( $value[0] ) && is_array( $value[0] ) ) {
				// This is a repeater sub-field.
				update_post_meta( $page_id, "services_page_sections_{$i}_{$key}", count( $value ) );
				foreach ( $value as $j => $row ) {
					foreach ( $row as $sub_key => $sub_value ) {
						update_post_meta( $page_id, "services_page_sections_{$i}_{$key}_{$j}_{$sub_key}", $sub_value );
					}
				}
			} elseif ( is_array( $value ) && isset( $value['url'] ) ) {
				// This is a link field — store as serialized array.
				update_post_meta( $page_id, "services_page_sections_{$i}_{$key}", $value );
			} else {
				update_post_meta( $page_id, "services_page_sections_{$i}_{$key}", $value );
			}
		}
	}

	WP_CLI::success( 'Populated services_page_sections via manual meta (fallback).' );
}


// ─────────────────────────────────────────────
// 4. Add page to navigation menu
// ─────────────────────────────────────────────

$menu_name = 'Top Header Menu';
$menu = wp_get_nav_menu_object( $menu_name );

if ( $menu ) {
	// Check if menu item already exists for this page.
	$menu_items = wp_get_nav_menu_items( $menu->term_id );
	$already_exists = false;

	if ( $menu_items ) {
		foreach ( $menu_items as $item ) {
			if ( (int) $item->object_id === $page_id && $item->object === 'page' ) {
				$already_exists = true;
				break;
			}
		}
	}

	if ( ! $already_exists ) {
		// Find the "Services" parent menu item to nest under.
		$parent_id = 0;
		if ( $menu_items ) {
			foreach ( $menu_items as $item ) {
				if ( stripos( $item->title, 'Services' ) !== false && (int) $item->menu_item_parent === 0 ) {
					$parent_id = $item->ID;
					break;
				}
			}
		}

		$menu_item_id = wp_update_nav_menu_item( $menu->term_id, 0, array(
			'menu-item-title'     => 'AI & Automation',
			'menu-item-object-id' => $page_id,
			'menu-item-object'    => 'page',
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
			'menu-item-parent-id' => $parent_id,
		));

		if ( is_wp_error( $menu_item_id ) ) {
			WP_CLI::warning( 'Failed to add menu item: ' . $menu_item_id->get_error_message() );
		} else {
			$parent_label = $parent_id ? " (under Services)" : " (top-level)";
			WP_CLI::success( "Added 'AI & Automation' to navigation menu{$parent_label}." );
		}
	} else {
		WP_CLI::log( "Menu item for 'AI & Automation' already exists, skipping." );
	}
} else {
	WP_CLI::warning( "Menu '$menu_name' not found. Add the page to navigation manually." );
}


// ─────────────────────────────────────────────
// 5. Flush rewrite rules
// ─────────────────────────────────────────────

flush_rewrite_rules();
WP_CLI::success( 'Flushed rewrite rules.' );

WP_CLI::log( '' );
WP_CLI::log( '──────────────────────────────────────' );
WP_CLI::success( 'AI & Automation page setup complete!' );
WP_CLI::log( "View: http://localhost:10004/ai-automation/" );
WP_CLI::log( "Edit: http://localhost:10004/wp-admin/post.php?post={$page_id}&action=edit" );
WP_CLI::log( '──────────────────────────────────────' );
WP_CLI::log( '' );
WP_CLI::log( 'NOTES:' );
WP_CLI::log( '  - Hero image: Upload in WP admin and set in the Hero section.' );
WP_CLI::log( '  - Tab images: Optional — upload if you want images per tab.' );
WP_CLI::log( '  - Icon images: Upload icons for the feature grid and digital partner boxes.' );
WP_CLI::log( '  - Stats: Replace [X] placeholders with real numbers as projects complete.' );
