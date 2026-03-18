<?php
/**
 * Single Case Study — Visual Identity Template
 * Emotional, aspirational. Before/after. Craft.
 *
 * Sections: Hero, Snapshot Bar, Challenge, Scope, Showcase, Testimonial, Results, CTA
 *
 * @package Proud_Brands
 */

get_header();

// Shared fields
$hero_image     = get_field( 'cs_hero_image' );
$hero_headline  = get_field( 'cs_hero_headline' );
$hero_descriptor = get_field( 'cs_hero_descriptor' );

// Visual Identity fields
$snapshot_stats    = get_field( 'cs_vi_snapshot_stats' );
$challenge_text    = get_field( 'cs_vi_challenge_text' );
$challenge_image   = get_field( 'cs_vi_challenge_image' );
$logo_rationale    = get_field( 'cs_vi_logo_rationale' );
$logo_rationale_img = get_field( 'cs_vi_logo_rationale_image' );
$deliverables      = get_field( 'cs_vi_deliverables' );
$deliverables_img  = get_field( 'cs_vi_deliverables_image' );
$showcase          = get_field( 'cs_vi_showcase' );
$brand_book        = get_field( 'cs_vi_brand_book' );
$results           = get_field( 'cs_vi_results' );

// Testimonial
$quote       = get_field( 'cs_testimonial_quote' );
$client_name = get_field( 'cs_testimonial_name' );
$client_title = get_field( 'cs_testimonial_title' );
$client_company = get_field( 'cs_testimonial_company' );
$client_image = get_field( 'cs_testimonial_image' );

// CTA
$cta_heading    = get_field( 'cs_cta_heading' );
$cta_subtext    = get_field( 'cs_cta_subtext' );
$cta_btn_text   = get_field( 'cs_cta_button_text' );
$cta_btn_url    = get_field( 'cs_cta_button_url' );

// Icon map for snapshot/deliverable icons
$icon_svg = array(
	'brand'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>',
	'clock'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
	'globe'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
	'chart'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>',
	'pen'     => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
	'code'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
	'rocket'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/></svg>',
	'target'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>',
	'users'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
	'star'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
	'camera'  => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>',
	'film'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"/><line x1="7" y1="2" x2="7" y2="22"/><line x1="17" y1="2" x2="17" y2="22"/><line x1="2" y1="12" x2="22" y2="12"/><line x1="2" y1="7" x2="7" y2="7"/><line x1="2" y1="17" x2="7" y2="17"/><line x1="17" y1="7" x2="22" y2="7"/><line x1="17" y1="17" x2="22" y2="17"/></svg>',
	'file'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>',
	'palette' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="13.5" cy="6.5" r="2"/><circle cx="17.5" cy="10.5" r="2"/><circle cx="8.5" cy="7.5" r="2"/><circle cx="6.5" cy="12" r="2"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>',
	'type'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>',
	'lock'    => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>',
	'refresh' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>',
);
?>

<!-- ═══════════════════════════════════════════
     SECTION 1: HERO (Full Viewport)
     ═══════════════════════════════════════════ -->
<?php if ( $hero_image ) : ?>
<section class="cs-hero cs-hero--visual" style="background-image: url('<?php echo esc_url( $hero_image['url'] ); ?>');">
	<div class="cs-hero__overlay"></div>
	<div class="container position-relative">
		<span class="cs-hero__tag">Visual Identity</span>
		<h1 class="cs-hero__title" data-aos="fade-up"><?php echo esc_html( $hero_headline ); ?></h1>
		<p class="cs-hero__descriptor" data-aos="fade-up" data-aos-delay="100"><?php echo esc_html( $hero_descriptor ); ?></p>
		<a href="#cs-snapshot" class="cs-hero__scroll" data-aos="fade-up" data-aos-delay="200">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
		</a>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 2: SNAPSHOT BAR
     ═══════════════════════════════════════════ -->
<?php if ( $snapshot_stats ) : ?>
<section id="cs-snapshot" class="cs-snapshot">
	<div class="container">
		<div class="cs-snapshot__grid">
			<?php foreach ( $snapshot_stats as $i => $stat ) : ?>
			<div class="cs-snapshot__item" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
				<?php if ( ! empty( $stat['icon'] ) && isset( $icon_svg[ $stat['icon'] ] ) ) : ?>
				<span class="cs-snapshot__icon"><?php echo $icon_svg[ $stat['icon'] ]; ?></span>
				<?php endif; ?>
				<h3 class="cs-snapshot__headline"><?php echo esc_html( $stat['headline'] ); ?></h3>
				<?php if ( ! empty( $stat['subtext'] ) ) : ?>
				<p class="cs-snapshot__subtext"><?php echo esc_html( $stat['subtext'] ); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 3: THE CHALLENGE (Where They Were)
     ═══════════════════════════════════════════ -->
<?php if ( $challenge_text ) : ?>
<section class="cs-challenge">
	<div class="container">
		<div class="row align-items-center">
			<div class="<?php echo $challenge_image ? 'col-lg-6' : 'col-12'; ?>" data-aos="fade-right">
				<span class="cs-section__label">Where They Started</span>
				<h2 class="cs-section__title">The Challenge</h2>
				<div class="cs-challenge__text">
					<?php echo $challenge_text; ?>
				</div>
			</div>
			<?php if ( $challenge_image ) : ?>
			<div class="col-lg-6" data-aos="fade-left">
				<div class="cs-challenge__image">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( $challenge_image['url'] ); ?>" alt="<?php echo esc_attr( $challenge_image['alt'] ); ?>" width="<?php echo esc_attr( $challenge_image['width'] ); ?>" height="<?php echo esc_attr( $challenge_image['height'] ); ?>">
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 3b: LOGO RATIONALE (Optional)
     ═══════════════════════════════════════════ -->
<?php if ( $logo_rationale ) : ?>
<section class="cs-rationale">
	<div class="container">
		<div class="row align-items-center">
			<div class="<?php echo $logo_rationale_img ? 'col-lg-6' : 'col-12'; ?>" data-aos="fade-right">
				<div class="cs-rationale__content">
					<div class="cs-rationale__accent"></div>
					<span class="cs-section__label cs-section__label--light">The Thinking</span>
					<h2 class="cs-section__title cs-section__title--light">Logo Rationale</h2>
					<div class="cs-rationale__text">
						<?php echo $logo_rationale; ?>
					</div>
				</div>
			</div>
			<?php if ( $logo_rationale_img ) : ?>
			<div class="col-lg-6" data-aos="fade-left">
				<div class="cs-rationale__image">
					<img loading="lazy" decoding="async"
						src="<?php echo esc_url( $logo_rationale_img['url'] ); ?>"
						alt="<?php echo esc_attr( $logo_rationale_img['alt'] ); ?>"
						width="<?php echo esc_attr( $logo_rationale_img['width'] ); ?>"
						height="<?php echo esc_attr( $logo_rationale_img['height'] ); ?>">
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 4: THE SCOPE (What We Did)
     ═══════════════════════════════════════════ -->
<?php if ( $deliverables ) : ?>
<section class="cs-scope">
	<div class="container">
		<span class="cs-section__label" data-aos="fade-up">What We Delivered</span>
		<h2 class="cs-section__title" data-aos="fade-up">The Scope</h2>

		<div class="cs-scope__grid">
			<?php foreach ( $deliverables as $i => $item ) : ?>
			<div class="cs-scope__card" data-aos="fade-up" data-aos-delay="<?php echo $i * 80; ?>">
				<?php if ( ! empty( $item['icon'] ) && $item['icon'] !== 'none' && isset( $icon_svg[ $item['icon'] ] ) ) : ?>
				<span class="cs-scope__icon"><?php echo $icon_svg[ $item['icon'] ]; ?></span>
				<?php endif; ?>
				<h3 class="cs-scope__title"><?php echo esc_html( $item['title'] ); ?></h3>
				<?php if ( ! empty( $item['description'] ) ) : ?>
				<p class="cs-scope__desc"><?php echo esc_html( $item['description'] ); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 5: THE SHOWCASE (The Work)
     ═══════════════════════════════════════════ -->
<?php if ( $showcase ) : ?>
<section class="cs-showcase">
	<div class="container">
		<?php foreach ( $showcase as $block ) : ?>

			<?php if ( $block['acf_fc_layout'] === 'full_width_image' && ! empty( $block['image'] ) ) : ?>
			<div class="cs-showcase__full" data-aos="fade-up">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( $block['image']['url'] ); ?>" alt="<?php echo esc_attr( $block['image']['alt'] ); ?>" width="<?php echo esc_attr( $block['image']['width'] ); ?>" height="<?php echo esc_attr( $block['image']['height'] ); ?>">
				<?php if ( ! empty( $block['caption'] ) ) : ?>
				<p class="cs-showcase__caption"><?php echo esc_html( $block['caption'] ); ?></p>
				<?php endif; ?>
			</div>

			<?php elseif ( $block['acf_fc_layout'] === 'two_column_grid' ) : ?>
			<div class="cs-showcase__grid" data-aos="fade-up">
				<div class="row g-4">
					<?php if ( ! empty( $block['image_left'] ) ) : ?>
					<div class="col-md-6">
						<img loading="lazy" decoding="async" src="<?php echo esc_url( $block['image_left']['url'] ); ?>" alt="<?php echo esc_attr( $block['image_left']['alt'] ); ?>" width="<?php echo esc_attr( $block['image_left']['width'] ); ?>" height="<?php echo esc_attr( $block['image_left']['height'] ); ?>">
					</div>
					<?php endif; ?>
					<?php if ( ! empty( $block['image_right'] ) ) : ?>
					<div class="col-md-6">
						<img loading="lazy" decoding="async" src="<?php echo esc_url( $block['image_right']['url'] ); ?>" alt="<?php echo esc_attr( $block['image_right']['alt'] ); ?>" width="<?php echo esc_attr( $block['image_right']['width'] ); ?>" height="<?php echo esc_attr( $block['image_right']['height'] ); ?>">
					</div>
					<?php endif; ?>
				</div>
			</div>

			<?php elseif ( $block['acf_fc_layout'] === 'video_embed' && ! empty( $block['video_url'] ) ) : ?>
			<div class="cs-showcase__video" data-aos="fade-up">
				<div class="container">
					<div class="cs-showcase__video-wrap">
						<?php echo wp_oembed_get( $block['video_url'] ); ?>
					</div>
				</div>
			</div>

			<?php elseif ( $block['acf_fc_layout'] === 'pull_quote' && ! empty( $block['quote_text'] ) ) : ?>
			<div class="cs-showcase__quote" data-aos="fade-up">
				<div class="container">
					<blockquote class="cs-showcase__pullquote">
						<p><?php echo esc_html( $block['quote_text'] ); ?></p>
					</blockquote>
				</div>
			</div>

			<?php endif; ?>

		<?php endforeach; ?>
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 5b: BRAND BOOK (Optional PDF Flipper)
     ═══════════════════════════════════════════ -->
<?php if ( $brand_book && ! empty( $brand_book['url'] ) ) : ?>
<section class="cs-brand-book" data-aos="fade-up">
	<div class="container">
		<span class="cs-section__label" data-aos="fade-up">The Brand Book</span>
		<h2 class="cs-section__title" data-aos="fade-up">Explore the Full Identity</h2>

		<div class="cs-flipbook" id="cs-flipbook" data-pdf="<?php echo esc_url( $brand_book['url'] ); ?>">
			<div class="cs-flipbook__loading">
				<div class="cs-flipbook__spinner"></div>
				<span>Loading brand book&hellip;</span>
			</div>
			<div class="cs-flipbook__wrapper" id="cs-flipbook-wrapper"></div>
			<div class="cs-flipbook__controls">
				<button class="cs-flipbook__btn cs-flipbook__btn--prev" id="cs-flipbook-prev" aria-label="Previous page">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
				</button>
				<span class="cs-flipbook__page-info" id="cs-flipbook-page">Page 1</span>
				<button class="cs-flipbook__btn cs-flipbook__btn--next" id="cs-flipbook-next" aria-label="Next page">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
				</button>
			</div>
		</div>

	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════
     SECTION 6: CLIENT TESTIMONIAL
     ═══════════════════════════════════════════ -->
<?php if ( $quote ) : ?>
<section class="cs-testimonial">
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
     SECTION 7: THE RESULTS (Proof It Worked)
     ═══════════════════════════════════════════ -->
<?php if ( $results ) : ?>
<section class="cs-results cs-results--dark">
	<div class="container">
		<span class="cs-section__label cs-section__label--light" data-aos="fade-up">Proof It Worked</span>
		<h2 class="cs-section__title cs-section__title--light" data-aos="fade-up">The Results</h2>

		<div class="cs-results__grid">
			<?php foreach ( $results as $i => $stat ) :
				$number_raw = $stat['stat_number'];
				$numeric    = preg_replace( '/[^0-9.]/', '', $number_raw );
				$is_numeric = ( $numeric !== '' && is_numeric( $numeric ) );
			?>
			<div class="cs-results__item" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
				<?php if ( $is_numeric ) :
					// Numeric value — animate with counter
					$prefix = preg_replace( '/[0-9.,]+.*/', '', $number_raw );
					$suffix = preg_replace( '/.*[0-9.,]+/', '', $number_raw );
				?>
				<span class="cs-results__number counter" data-count="<?php echo esc_attr( $numeric ); ?>">
					<span class="cs-results__prefix"><?php echo esc_html( $prefix ); ?></span>
					<span class="cs-results__count" data-target="<?php echo esc_attr( $numeric ); ?>">0</span>
					<span class="cs-results__suffix"><?php echo esc_html( $suffix ); ?></span>
				</span>
				<?php else :
					// Text value — render as-is, no counter animation
				?>
				<span class="cs-results__number cs-results__number--text"><?php echo esc_html( $number_raw ); ?></span>
				<?php endif; ?>
				<h3 class="cs-results__label"><?php echo esc_html( $stat['stat_label'] ); ?></h3>
				<?php if ( ! empty( $stat['supporting_text'] ) ) : ?>
				<p class="cs-results__supporting"><?php echo esc_html( $stat['supporting_text'] ); ?></p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<?php get_footer(); ?>
