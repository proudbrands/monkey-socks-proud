<?php
/**
 * Single Case Study — SEO & Organic Revenue Template
 * Data-driven, ROI-focused. Visually compelling — not a spreadsheet.
 *
 * Sections: Hero, Metrics Bar, Starting Point, Strategy, Charts, Comparison, Testimonial, Impact, CTA
 *
 * @package Proud_Brands
 */

get_header();
?>
<script>
// Force dark mode on organic revenue case studies
document.documentElement.removeAttribute('data-theme');
document.querySelectorAll('.pb-theme-toggle').forEach(function(el){ el.style.display = 'none'; });
</script>
<style>.pb-theme-toggle { display: none !important; }</style>
<?php

// Shared fields
$hero_image      = get_field( 'cs_hero_image' );
$hero_headline   = get_field( 'cs_hero_headline' );
$hero_descriptor = get_field( 'cs_hero_descriptor' );

// SEO-specific fields
$hero_subline     = get_field( 'cs_seo_hero_subline' );
$metrics          = get_field( 'cs_seo_metrics' );
$starting_text    = get_field( 'cs_seo_starting_text' );
$baseline_metrics = get_field( 'cs_seo_baseline_metrics' );
$phases           = get_field( 'cs_seo_phases' );
$charts           = get_field( 'cs_seo_charts' );
$chart_callouts   = get_field( 'cs_seo_chart_callouts' );
$comparison       = get_field( 'cs_seo_comparison' );
$impact_cards     = get_field( 'cs_seo_impact_cards' );
$cta_mirror_stat  = get_field( 'cs_seo_cta_mirror_stat' );

// Testimonial
$quote          = get_field( 'cs_testimonial_quote' );
$client_name    = get_field( 'cs_testimonial_name' );
$client_title   = get_field( 'cs_testimonial_title' );
$client_company = get_field( 'cs_testimonial_company' );
$client_image   = get_field( 'cs_testimonial_image' );

// CTA
$cta_heading  = get_field( 'cs_cta_heading' );
$cta_subtext  = get_field( 'cs_cta_subtext' );
$cta_btn_text = get_field( 'cs_cta_button_text' );
$cta_btn_url  = get_field( 'cs_cta_button_url' );

// Icon map for strategy phases
$phase_icons = array(
	'search' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>',
	'chart'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>',
	'pen'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
	'code'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
	'link'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>',
	'target' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>',
	'rocket' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/></svg>',
	'globe'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
);

// Trend arrow SVGs
$trend_svgs = array(
	'up'      => '<svg class="cs-metric__arrow cs-metric__arrow--up" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="18 15 12 9 6 15"/></svg>',
	'down'    => '<svg class="cs-metric__arrow cs-metric__arrow--down" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="6 9 12 15 18 9"/></svg>',
	'neutral' => '<svg class="cs-metric__arrow cs-metric__arrow--neutral" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="15 8 19 12 15 16"/></svg>',
);
?>

<!-- ═══════════════════════════════════════════
     SECTION 1: HERO (Full Viewport)
     ═══════════════════════════════════════════ -->
<?php if ( $hero_image ) : ?>
<section class="cs-hero cs-hero--seo" style="background-image: url('<?php echo esc_url( $hero_image['url'] ); ?>');">
	<div class="cs-hero__overlay"></div>
	<div class="container position-relative">
		<span class="cs-hero__tag">SEO &amp; Organic Revenue</span>
		<h1 class="cs-hero__title" data-aos="fade-up"><?php echo esc_html( $hero_headline ); ?></h1>
		<p class="cs-hero__descriptor" data-aos="fade-up" data-aos-delay="100"><?php echo esc_html( $hero_descriptor ); ?></p>
		<?php if ( $hero_subline ) : ?>
		<p class="cs-hero__subline" data-aos="fade-up" data-aos-delay="150"><?php echo esc_html( $hero_subline ); ?></p>
		<?php endif; ?>
		<a href="#cs-metrics" class="cs-hero__scroll" data-aos="fade-up" data-aos-delay="200">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
		</a>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 2: HEADLINE METRICS BAR
     ═══════════════════════════════════════════ -->
<?php if ( $metrics ) : ?>
<section id="cs-metrics" class="cs-metrics">
	<div class="container">
		<div class="cs-metrics__grid">
			<?php foreach ( $metrics as $i => $metric ) : ?>
			<div class="cs-metrics__item" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
				<div class="cs-metrics__value">
					<?php if ( ! empty( $metric['trend_arrow'] ) && isset( $trend_svgs[ $metric['trend_arrow'] ] ) ) : ?>
					<?php echo $trend_svgs[ $metric['trend_arrow'] ]; ?>
					<?php endif; ?>
					<span><?php echo esc_html( $metric['value'] ); ?></span>
				</div>
				<p class="cs-metrics__label"><?php echo esc_html( $metric['label'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 3: THE STARTING POINT
     ═══════════════════════════════════════════ -->
<?php if ( $starting_text ) : ?>
<section class="cs-starting">
	<div class="container">
		<span class="cs-section__label" data-aos="fade-up">Where They Started</span>
		<h2 class="cs-section__title" data-aos="fade-up">The Starting Point</h2>

		<div class="row">
			<div class="<?php echo $baseline_metrics ? 'col-lg-7' : 'col-12'; ?>" data-aos="fade-right">
				<div class="cs-starting__text">
					<?php echo $starting_text; ?>
				</div>
			</div>
			<?php if ( $baseline_metrics ) : ?>
			<div class="col-lg-5" data-aos="fade-left">
				<div class="cs-starting__baseline">
					<h3 class="cs-starting__baseline-title">Baseline Metrics</h3>
					<div class="cs-starting__baseline-grid">
						<?php foreach ( $baseline_metrics as $bm ) : ?>
						<div class="cs-starting__baseline-card">
							<span class="cs-starting__baseline-value"><?php echo esc_html( $bm['baseline_value'] ); ?></span>
							<span class="cs-starting__baseline-name"><?php echo esc_html( $bm['metric_name'] ); ?></span>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 4: THE STRATEGY
     ═══════════════════════════════════════════ -->
<?php if ( $phases ) : ?>
<section class="cs-strategy">
	<div class="container">
		<span class="cs-section__label" data-aos="fade-up">How We Did It</span>
		<h2 class="cs-section__title" data-aos="fade-up">The Strategy</h2>

		<div class="cs-strategy__timeline">
			<?php foreach ( $phases as $i => $phase ) : ?>
			<div class="cs-strategy__phase" data-aos="fade-up" data-aos-delay="<?php echo $i * 120; ?>">
				<div class="cs-strategy__number">
					<span><?php echo esc_html( $phase['number'] ); ?></span>
				</div>
				<div class="cs-strategy__content">
					<div class="cs-strategy__header">
						<?php if ( ! empty( $phase['icon'] ) && $phase['icon'] !== 'none' && isset( $phase_icons[ $phase['icon'] ] ) ) : ?>
						<span class="cs-strategy__icon"><?php echo $phase_icons[ $phase['icon'] ]; ?></span>
						<?php endif; ?>
						<h3 class="cs-strategy__title"><?php echo esc_html( $phase['title'] ); ?></h3>
					</div>
					<?php if ( ! empty( $phase['description'] ) ) : ?>
					<p class="cs-strategy__desc"><?php echo esc_html( $phase['description'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 5: THE DATA (Charts & Graphs)
     ═══════════════════════════════════════════ -->
<?php if ( $charts ) : ?>
<section class="cs-charts cs-charts--dark">
	<div class="container">
		<span class="cs-section__label cs-section__label--light" data-aos="fade-up">The Evidence</span>
		<h2 class="cs-section__title cs-section__title--light" data-aos="fade-up">The Data</h2>

		<?php
		$callout_index = 0;
		foreach ( $charts as $chart_index => $chart ) :
			$chart_type = $chart['acf_fc_layout'];
			$chart_id = 'cs-chart-' . get_the_ID() . '-' . $chart_index;

			// Map layout names to Chart.js types
			$chartjs_type = 'line';
			if ( $chart_type === 'bar_chart' ) $chartjs_type = 'bar';
			if ( $chart_type === 'area_chart' ) $chartjs_type = 'line'; // area = line with fill

			if ( $chart_type !== 'comparison_table' ) :
				// Prepare data for Chart.js
				$labels = array();
				$values = array();
				if ( ! empty( $chart['data'] ) ) {
					foreach ( $chart['data'] as $point ) {
						$labels[] = $point['label'];
						$values[] = floatval( $point['value'] );
					}
				}
		?>
		<div class="cs-charts__block" data-aos="fade-up">
			<?php if ( ! empty( $chart['title'] ) ) : ?>
			<h3 class="cs-charts__title"><?php echo esc_html( $chart['title'] ); ?></h3>
			<?php endif; ?>
			<div class="cs-charts__canvas-wrap">
				<canvas id="<?php echo esc_attr( $chart_id ); ?>"
					data-chart-type="<?php echo esc_attr( $chartjs_type ); ?>"
					data-chart-labels='<?php echo wp_json_encode( $labels ); ?>'
					data-chart-values='<?php echo wp_json_encode( $values ); ?>'
					<?php if ( $chart_type === 'area_chart' ) echo 'data-chart-fill="true"'; ?>
					width="800" height="400">
				</canvas>
			</div>
			<?php if ( ! empty( $chart['annotation_text'] ) ) : ?>
			<p class="cs-charts__annotation"><?php echo esc_html( $chart['annotation_text'] ); ?></p>
			<?php endif; ?>
		</div>

		<?php else : // Comparison table ?>
		<div class="cs-charts__block" data-aos="fade-up">
			<?php if ( ! empty( $chart['title'] ) ) : ?>
			<h3 class="cs-charts__title"><?php echo esc_html( $chart['title'] ); ?></h3>
			<?php endif; ?>
			<div class="cs-charts__table-wrap">
				<table class="cs-charts__table">
					<thead>
						<tr><th>Metric</th><th>Value</th></tr>
					</thead>
					<tbody>
						<?php if ( ! empty( $chart['data'] ) ) : foreach ( $chart['data'] as $row ) : ?>
						<tr>
							<td><?php echo esc_html( $row['label'] ); ?></td>
							<td><strong><?php echo esc_html( $row['value'] ); ?></strong></td>
						</tr>
						<?php endforeach; endif; ?>
					</tbody>
				</table>
			</div>
			<?php if ( ! empty( $chart['annotation_text'] ) ) : ?>
			<p class="cs-charts__annotation"><?php echo esc_html( $chart['annotation_text'] ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php
			// Insert callout between charts
			if ( $chart_callouts && isset( $chart_callouts[ $callout_index ] ) && $chart_index < count( $charts ) - 1 ) :
		?>
		<div class="cs-charts__callout" data-aos="fade-up">
			<p><?php echo esc_html( $chart_callouts[ $callout_index ]['text'] ); ?></p>
		</div>
		<?php
				$callout_index++;
			endif;
		endforeach;
		?>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 6: THEN VS NOW COMPARISON
     ═══════════════════════════════════════════ -->
<?php if ( $comparison ) : ?>
<?php
// Inline SVG icons for qualitative comparison rows
$comp_icon_before = '<span class="cs-comparison__val-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="2 17 6 11 10 17 14 7 18 14 22 8"/></svg></span>';
$comp_icon_after  = '<span class="cs-comparison__val-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="2" y1="12" x2="16" y2="12"/><polyline points="13 8 17 12 13 16"/></svg></span>';
?>
<section class="cs-comparison">
	<div class="container">
		<span class="cs-section__label" data-aos="fade-up">The Transformation</span>
		<h2 class="cs-section__title" data-aos="fade-up">Then vs Now</h2>

		<div class="cs-comparison__rows">
			<?php foreach ( $comparison as $i => $row ) :
				// Qualitative row = value doesn't start with a number, currency, or +
				$is_qualitative = ! preg_match( '/^[\d£$€+]/', trim( $row['previous_value'] ) );
			?>
			<div class="cs-comparison__row" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
				<div class="cs-comparison__metric"><?php echo esc_html( $row['metric_name'] ); ?></div>
				<div class="cs-comparison__before">
					<span class="cs-comparison__label">Before</span>
					<span class="cs-comparison__val"><?php if ( $is_qualitative ) echo $comp_icon_before; ?><?php echo esc_html( $row['previous_value'] ); ?></span>
				</div>
				<div class="cs-comparison__arrow">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
				</div>
				<div class="cs-comparison__after">
					<span class="cs-comparison__label">After</span>
					<span class="cs-comparison__val cs-comparison__val--highlight"><?php if ( $is_qualitative ) echo $comp_icon_after; ?><?php echo esc_html( $row['current_value'] ); ?></span>
				</div>
				<div class="cs-comparison__badge">
					<?php if ( ! empty( $row['pct_change'] ) ) : ?>
					<span class="cs-comparison__change"><?php echo esc_html( $row['pct_change'] ); ?></span>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 7: CLIENT TESTIMONIAL
     ═══════════════════════════════════════════ -->
<?php if ( $quote ) : ?>
<section class="cs-testimonial cs-testimonial--seo">
	<div class="container">
		<div class="cs-testimonial__inner" data-aos="fade-up">
			<div class="cs-testimonial__marks">&ldquo;</div>
			<blockquote class="cs-testimonial__quote">
				<p><?php echo esc_html( $quote ); ?></p>
			</blockquote>
			<div class="cs-testimonial__author">
				<?php if ( $client_image ) : ?>
				<img class="cs-testimonial__avatar" loading="lazy" decoding="async" src="<?php echo esc_url( $client_image['url'] ); ?>" alt="<?php echo esc_attr( $client_name ); ?>" width="64" height="64">
				<?php endif; ?>
				<div>
					<strong class="cs-testimonial__name"><?php echo esc_html( $client_name ); ?></strong>
					<?php if ( $client_title || $client_company ) : ?>
					<span class="cs-testimonial__role">
						<?php echo esc_html( $client_title ); ?>
						<?php if ( $client_title && $client_company ) echo ', '; ?>
						<?php echo esc_html( $client_company ); ?>
					</span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 8: THE WIDER IMPACT
     ═══════════════════════════════════════════ -->
<?php if ( $impact_cards ) : ?>
<section class="cs-impact cs-impact--dark">
	<div class="container">
		<span class="cs-section__label cs-section__label--light" data-aos="fade-up">Beyond SEO</span>
		<h2 class="cs-section__title cs-section__title--light" data-aos="fade-up">The Bigger Picture</h2>

		<div class="cs-impact__grid">
			<?php foreach ( $impact_cards as $i => $card ) : ?>
			<div class="cs-impact__card" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
				<?php if ( ! empty( $card['icon_or_stat'] ) ) : ?>
				<span class="cs-impact__stat"><?php echo esc_html( $card['icon_or_stat'] ); ?></span>
				<?php endif; ?>
				<h3 class="cs-impact__title"><?php echo esc_html( $card['title'] ); ?></h3>
				<p class="cs-impact__desc"><?php echo esc_html( $card['description'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<?php get_footer(); ?>
