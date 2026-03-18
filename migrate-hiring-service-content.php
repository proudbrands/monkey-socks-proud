<?php
/**
 * Migrate The Hiring Service challenge content.
 * Splits the logo rationale out of challenge text into the new cs_vi_logo_rationale field.
 * Run via WP-CLI: wp eval-file wp-content/themes/proud-brand/migrate-hiring-service-content.php
 *
 * Idempotent — checks if migration already done.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id = 1805; // The Hiring Service

// Check if already migrated.
$existing_rationale = get_field( 'cs_vi_logo_rationale', $post_id );
if ( $existing_rationale ) {
	WP_CLI::success( 'The Hiring Service already has logo rationale content. Skipping.' );
	return;
}

// The new challenge text — focused on the business problem only.
$new_challenge = '<p>The Hiring Service needed a brand identity that communicated certainty and measurable outcomes in a sector built on trust.</p>
<p>Recruitment brands often fall into one of two traps: overly corporate and impersonal, or overly casual and lacking authority. The challenge was to create an identity that felt professional, human, positive, and outcome-driven.</p>
<p>The business focuses on delivering strong hiring results. The brand needed to reflect that sense of upward movement, progress, and positive impact without becoming abstract or decorative. The website then had to carry that identity into a digital environment that prioritised clarity of service, a clear value proposition, straightforward enquiry paths, and trust-building language.</p>
<p>This was about confidence without noise.</p>';

// The logo rationale — the design thinking narrative.
$new_rationale = '<p>The logo is built around the concept of positive intent and upward momentum.</p>
<p>The upward motion within the mark subtly represents growth, successful placement, forward movement, and measurable outcomes. Rather than relying on literal recruitment symbolism, the design uses controlled geometry and proportion to communicate professionalism and reliability.</p>
<p>The mark performs cleanly across digital platforms, slide decks, social content, and print collateral. It is simple — but engineered.</p>';

// Update the fields.
update_field( 'cs_vi_challenge_text', $new_challenge, $post_id );
update_field( 'cs_vi_logo_rationale', $new_rationale, $post_id );

WP_CLI::success( 'Migrated The Hiring Service: challenge text trimmed, logo rationale populated.' );
