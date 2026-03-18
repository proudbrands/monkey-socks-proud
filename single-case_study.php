<?php
/**
 * Template router for single Case Study posts.
 * Loads the correct template based on case_study_type taxonomy term.
 *
 * @package Proud_Brands
 */

$terms = get_the_terms( get_the_ID(), 'case_study_type' );
$template_type = '';

if ( $terms && ! is_wp_error( $terms ) ) {
	$template_type = $terms[0]->slug;
}

switch ( $template_type ) {
	case 'visual-identity':
		get_template_part( 'single-case_study', 'visual' );
		break;
	case 'organic-revenue':
		get_template_part( 'single-case_study', 'seo' );
		break;
	default:
		// Fallback — load visual identity template
		get_template_part( 'single-case_study', 'visual' );
		break;
}
