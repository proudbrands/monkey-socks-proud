<?php
/**
 * Populate ACF fields for Anglers Resource case study (ID: 1791)
 * Run via: wp eval-file wp-content/themes/proud-brand/populate-anglers-resource.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id = 1791;

// ─── 1. Set taxonomy term to Visual Identity ───
wp_set_object_terms( $post_id, 'visual-identity', 'case_study_type' );
WP_CLI::success( 'Set taxonomy: Visual Identity' );


// ─── 2. Shared Fields — Hero ───
// Note: Hero image must be uploaded manually (no image file provided)
// We'll set a placeholder and you can update the image in admin
update_field( 'cs_hero_headline', 'Anglers Resource', $post_id );
update_field( 'cs_hero_descriptor', 'A full brand, platform, and operational transformation for the exclusive Fuji distributor in the Americas.', $post_id );
WP_CLI::success( 'Set hero fields' );


// ─── 3. Shared Fields — Testimonial ───
update_field( 'cs_testimonial_quote', "This project fundamentally changed how our business operates. What started as a website quickly became a complete rethink of our sales, inventory, and customer processes. Proud Brands challenged us, guided us, and built a system that actually fits how we work.", $post_id );
update_field( 'cs_testimonial_name', 'Bill Falconer', $post_id );
update_field( 'cs_testimonial_title', 'Owner', $post_id );
update_field( 'cs_testimonial_company', 'Anglers Resource LLC', $post_id );
// cs_testimonial_image — needs manual upload
WP_CLI::success( 'Set testimonial fields' );


// ─── 4. Shared Fields — CTA ───
update_field( 'cs_cta_heading', 'Ready to rebuild how your business works?', $post_id );
update_field( 'cs_cta_subtext', "If your website, systems, and sales process don't talk to each other, you're carrying invisible cost.", $post_id );
update_field( 'cs_cta_button_text', 'Start a Conversation', $post_id );
update_field( 'cs_cta_button_url', '/contact', $post_id );
WP_CLI::success( 'Set CTA fields' );


// ─── 5. Snapshot Bar ───
$snapshot_stats = array(
	array(
		'icon'     => 'brand',
		'headline' => 'Full Brand & Platform Reset',
		'subtext'  => 'Identity, website, systems, and process',
	),
	array(
		'icon'     => 'clock',
		'headline' => 'Multi-Phase Delivery',
		'subtext'  => 'Discovery → Design → Systems → Launch',
	),
	array(
		'icon'     => 'code',
		'headline' => 'Enterprise-Grade B2B Ecommerce',
		'subtext'  => 'WooCommerce, CRM, inventory integration',
	),
	array(
		'icon'     => 'target',
		'headline' => 'Process-First Approach',
		'subtext'  => 'Sales, warehouse, finance alignment',
	),
	array(
		'icon'     => 'users',
		'headline' => 'Cross-Department Buy-In',
		'subtext'  => 'Sales, marketing, purchasing, accounting',
	),
);
update_field( 'cs_vi_snapshot_stats', $snapshot_stats, $post_id );
WP_CLI::success( 'Set snapshot bar (5 stats)' );


// ─── 6. The Challenge ───
$challenge_text = '<p>Anglers Resource is the exclusive distributor of Fuji fishing components across North and South America, supplying thousands of SKUs to distributors, manufacturers, custom rod builders, and OEMs. Despite the scale and reputation of the business, their digital and operational infrastructure had not evolved at the same pace.</p>

<p>Sales, inventory, purchasing, accounting, and customer management were fragmented across legacy tools and manual processes. Orders arrived via phone, email, spreadsheets, and trade shows. Inventory visibility was limited. Reporting was slow and inconsistent. Customers relied heavily on direct contact with the sales team to place and track orders.</p>

<p>The challenge was not simply to "build a new website", but to redesign how the business operated digitally. Anglers Resource needed a system that reduced manual effort, gave customers real-time visibility, supported high-volume B2B ordering, and created a scalable foundation for growth, without disrupting a business that was already profitable.</p>';

update_field( 'cs_vi_challenge_text', $challenge_text, $post_id );
// cs_vi_challenge_image — needs manual upload
WP_CLI::success( 'Set challenge text' );


// ─── 7. Deliverables ───
$deliverables = array(
	array(
		'title'       => 'Brand Strategy & Visual Identity',
		'description' => "Clarified brand positioning and visual language aligned with Anglers Resource's authority in the industry.",
		'icon'        => 'brand',
	),
	array(
		'title'       => 'Website UX & Information Architecture',
		'description' => 'Structured a complex product catalogue into intuitive, scalable navigation paths for B2B users.',
		'icon'        => 'globe',
	),
	array(
		'title'       => 'B2B Ecommerce Platform',
		'description' => 'Custom WooCommerce implementation supporting role-based pricing, bulk ordering, and account logins.',
		'icon'        => 'code',
	),
	array(
		'title'       => 'CRM & Sales Process Design',
		'description' => 'Defined how sales, marketing, and customer data flows through the system end-to-end.',
		'icon'        => 'brand',
	),
	array(
		'title'       => 'Inventory & Order Integration',
		'description' => 'Integrated ecommerce with inventory and accounting systems for accurate stock, orders, and reporting.',
		'icon'        => 'code',
	),
	array(
		'title'       => 'Content & SEO Foundations',
		'description' => 'Built a structured content framework ready for long-term organic growth and product discoverability.',
		'icon'        => 'file',
	),
	array(
		'title'       => 'Training & Internal Enablement',
		'description' => 'Delivered documentation and training to support adoption across departments.',
		'icon'        => 'brand',
	),
);
update_field( 'cs_vi_deliverables', $deliverables, $post_id );
// cs_vi_deliverables_image — needs manual upload
WP_CLI::success( 'Set deliverables (7 items)' );


// ─── 8. Showcase ───
// Flexible content requires specific format for update_field
// Each layout needs 'acf_fc_layout' key
$showcase = array(
	array(
		'acf_fc_layout' => 'full_width_image',
		'image'         => '', // needs manual upload
		'caption'       => 'Homepage design showing segmented user paths (Distributor, OEM, Builder).',
	),
	array(
		'acf_fc_layout' => 'two_column_grid',
		'image_left'    => '', // needs manual upload
		'image_right'   => '', // needs manual upload
	),
	array(
		'acf_fc_layout' => 'pull_quote',
		'quote_text'    => "We weren't just replacing a website. We were rebuilding how the business works.",
	),
	array(
		'acf_fc_layout' => 'full_width_image',
		'image'         => '', // needs manual upload
		'caption'       => 'Customer dashboard view showing orders, pricing, and account context.',
	),
	array(
		'acf_fc_layout' => 'two_column_grid',
		'image_left'    => '', // needs manual upload
		'image_right'   => '', // needs manual upload
	),
);
update_field( 'cs_vi_showcase', $showcase, $post_id );
WP_CLI::success( 'Set showcase (5 blocks — images need manual upload)' );


// ─── 9. Results ───
$results = array(
	array(
		'stat_number'    => '1',
		'stat_label'     => 'Unified Digital Platform',
		'supporting_text' => 'Website, sales, inventory, and reporting aligned',
	),
	array(
		'stat_number'    => '1000s',
		'stat_label'     => 'Products Structured',
		'supporting_text' => 'Searchable, filterable, scalable catalogue',
	),
	array(
		'stat_number'    => 'Reduced',
		'stat_label'     => 'Manual Sales Effort',
		'supporting_text' => 'Customers self-serve orders and tracking',
	),
	array(
		'stat_number'    => 'Real-Time',
		'stat_label'     => 'Inventory Visibility',
		'supporting_text' => 'Fewer errors, better purchasing decisions',
	),
	array(
		'stat_number'    => 'Future-Ready',
		'stat_label'     => 'Growth Foundation',
		'supporting_text' => 'Built to scale without re-platforming',
	),
);
update_field( 'cs_vi_results', $results, $post_id );
WP_CLI::success( 'Set results (5 stats)' );


WP_CLI::success( 'All fields populated for Anglers Resource (ID: 1791). Images need manual upload in admin.' );
