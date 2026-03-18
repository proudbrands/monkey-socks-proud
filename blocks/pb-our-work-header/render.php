<?php
/**
 * PB Our Work Header Block
 *
 * Our Work archive header with category filters.
 * Source: archive-our_work.php lines 17-61.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$selected_term = isset( $_GET['term'] ) ? sanitize_text_field( $_GET['term'] ) : '';

// Support both page-level fields (Our Works page template) and options-level (archive).
$heading     = get_field( 'our_work_sec1_heading', get_the_ID() ) ?: get_field( 'our_work_sec1_heading', 'options' );
$description = get_field( 'our_work_sec1_description', get_the_ID() ) ?: get_field( 'our_work_sec1_description', 'options' );
?>
<section class="our_work_top_sec">
	<div class="container">
		<div class="our_work_des w-100 float-start d-flex justify-content-between">
			<h1><?php echo wp_kses_post( $heading ); ?></h1>
			<p><?php echo wp_kses_post( $description ); ?></p>
		</div>
		<div class="filters_div w-100 float-start">
			<ul class="float-end filter-categories">
				<li class="<?php echo empty( $selected_term ) ? 'active' : ''; ?>">
					<a href="<?php echo esc_url( get_post_type_archive_link( 'our_work' ) ); ?>">All</a>
				</li>
				<?php
				$terms = get_terms(
					array(
						'taxonomy'   => 'our_works_category',
						'hide_empty' => false,
					)
				);
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
					foreach ( $terms as $term ) :
						$active = ( $selected_term === $term->slug ) ? 'active' : '';
						?>
						<li class="<?php echo esc_attr( $active ); ?>">
							<a href="<?php echo esc_url( add_query_arg( 'term', $term->slug, get_post_type_archive_link( 'our_work' ) ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
						</li>
						<?php
					endforeach;
				endif;
				?>
			</ul>
		</div>
	</div>
</section>
