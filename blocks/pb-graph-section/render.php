<?php
/**
 * PB Graph Section Block
 *
 * Problems text and solution with animated bar graph.
 * Source: template-case_study.php lines 241-327.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$problems_title = get_field( 'casestudy_sec4_title', get_the_ID() );
$solution_title = get_field( 'casestudy_sec5_title', get_the_ID() );
$solution_desc  = get_field( 'casestudy_sec5_description', get_the_ID() );
$graph_caption  = get_field( 'casestudy_sec5_graph_caption', get_the_ID() );
$graph_text     = get_field( 'casestudy_sec5_graph_text', get_the_ID() );
?>

<?php if ( $problems_title || have_rows( 'casestudy_sec4_paragraph', get_the_ID() ) ) : ?>
<section class="problems_sec">
	<div class="container">
		<?php if ( $problems_title ) : ?>
			<h2 data-aos="fade-up"><?php echo wp_kses_post( $problems_title ); ?></h2>
		<?php endif; ?>
		<?php if ( have_rows( 'casestudy_sec4_paragraph', get_the_ID() ) ) : ?>
			<div class="problems_div w-100 d-grid" data-aos="fade-up">
				<?php
				while ( have_rows( 'casestudy_sec4_paragraph', get_the_ID() ) ) :
					the_row();
					?>
					<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
					<?php
				endwhile;
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<section class="solution_sec">
	<div class="container">
		<div class="solution_div w-100 float-start d-flex justify-content-between align-items-end">
			<div class="solution_text w-100 float-start">
				<?php if ( $solution_title ) : ?>
					<h2><?php echo wp_kses_post( $solution_title ); ?></h2>
				<?php endif; ?>
				<?php if ( $solution_desc ) : ?>
					<?php echo wp_kses_post( $solution_desc ); ?>
				<?php endif; ?>
			</div>
			<div class="solution_graph w-100 float-end text-center position-relative">
				<?php if ( have_rows( 'casestudy_sec5_graph_lines', get_the_ID() ) ) : ?>
					<ul class="w-100 float-start d-flex flex-wrap justify-content-between align-items-end">
						<?php
						while ( have_rows( 'casestudy_sec5_graph_lines', get_the_ID() ) ) :
							the_row();
							$color = get_sub_field( 'line_color' );
							?>
							<li><span style="background: <?php echo esc_attr( $color ); ?>;">&nbsp;</span></li>
							<?php
						endwhile;
						?>
					</ul>
				<?php endif; ?>
				<?php if ( $graph_caption ) : ?>
					<h4><?php echo wp_kses_post( $graph_caption ); ?></h4>
				<?php endif; ?>
				<?php if ( $graph_text ) : ?>
					<small><?php echo wp_kses_post( $graph_text ); ?></small>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
