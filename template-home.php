<?php
/*

Template Name: Home

*/

get_header();
?>


<?php
/* ===============================================================
   SECTION 1 — HERO
   ACF fields: hp_hero_bg_image, hp_hero_bg_video (file),
   hp_hero_bg_video_url (Vimeo), hp_hero_label, hp_hero_heading,
   hp_hero_heading_highlight, hp_hero_subheading, hp_hero_quiz_label,
   hp_hero_secondary_text, hp_hero_secondary_url
   =============================================================== */

$hero_img       = get_field( 'hp_hero_bg_image' );
$hero_video     = get_field( 'hp_hero_bg_video' );      // Local file (WebM / MP4)
$hero_vimeo     = get_field( 'hp_hero_bg_video_url' );   // Vimeo URL
$hero_label     = get_field( 'hp_hero_label' ) ?: 'BRANDING / WEB DESIGN / ORGANIC SEARCH / AI AUTOMATION';
$hero_heading   = get_field( 'hp_hero_heading' ) ?: 'Your brand deserves to be';
$hero_highlight = get_field( 'hp_hero_heading_highlight' ) ?: 'Found. Understood. Chosen.';
$hero_sub       = get_field( 'hp_hero_subheading' ) ?: 'We&rsquo;re ProudBrands, a family-run digital agency in Aylesbury helping ambitious businesses grow through search, design, strategy, and AI.';
$hero_cta_text  = get_field( 'hp_hero_quiz_label' ) ?: 'Discover Your Brand in 3 Minutes';
$hero_sec_text  = get_field( 'hp_hero_secondary_text' ) ?: 'Book a Free Call';
$hero_sec_url   = get_field( 'hp_hero_secondary_url' );

// Extract Vimeo ID from URL.
$vimeo_id = '';
if ( $hero_vimeo && preg_match( '/vimeo\.com\/(?:video\/)?(\d+)/', $hero_vimeo, $m ) ) {
	$vimeo_id = $m[1];
}
?>

<section class="sv-hero sv-hero--home">
	<?php if ( $hero_video ) : ?>
	<video class="sv-hero__bg-video" autoplay muted loop playsinline preload="auto"<?php echo $hero_img ? ' poster="' . esc_url( $hero_img['url'] ) . '"' : ''; ?>>
		<source src="<?php echo esc_url( $hero_video['url'] ); ?>" type="<?php echo esc_attr( $hero_video['mime_type'] ); ?>">
	</video>
	<?php elseif ( $vimeo_id ) : ?>
	<div class="sv-hero__bg-vimeo">
		<iframe src="https://player.vimeo.com/video/<?php echo esc_attr( $vimeo_id ); ?>?background=1&autoplay=1&loop=1&muted=1&dnt=1" frameborder="0" allow="autoplay" loading="lazy"></iframe>
	</div>
	<?php elseif ( $hero_img ) : ?>
	<div class="sv-hero__bg-image" style="background-image: url('<?php echo esc_url( $hero_img['url'] ); ?>')"></div>
	<?php endif; ?>
	<div class="sv-hero__overlay"></div>
	<div class="container position-relative">
		<p class="sv-hero__label" data-aos="fade-up"><?php echo esc_html( $hero_label ); ?></p>

		<h1 class="sv-hero__title" data-aos="fade-up" data-aos-delay="100"><?php echo esc_html( $hero_heading ); ?> <strong><?php echo esc_html( $hero_highlight ); ?></strong></h1>

		<p class="sv-hero__descriptor" data-aos="fade-up" data-aos-delay="200"><?php echo wp_kses_post( $hero_sub ); ?></p>

		<div class="sv-hero__cta" data-aos="fade-up" data-aos-delay="300">
			<a href="<?php echo esc_url( home_url( '/branding-quiz/' ) ); ?>" class="pb-quiz__trigger pb-quiz__trigger--default"><?php echo esc_html( $hero_cta_text ); ?></a>
			<?php if ( $hero_sec_url && $hero_sec_url !== '#' ) : ?>
				<a href="<?php echo esc_url( $hero_sec_url ); ?>" class="sv-hero__btn sv-hero__btn--secondary"><?php echo esc_html( $hero_sec_text ); ?></a>
			<?php else : ?>
				<a href="#" class="sv-hero__btn sv-hero__btn--secondary" data-bs-toggle="modal" data-bs-target="#pbContactModal"><?php echo esc_html( $hero_sec_text ); ?></a>
			<?php endif; ?>
		</div>

		<a href="#hp-proof" class="hp-hero__scroll-link" data-aos="fade-up" data-aos-delay="400">See Our Results &darr;</a>
	</div>
</section>
<div class="sv-gradient-bar"></div>


<?php
/* ===============================================================
   SECTION 2 — CLIENT LOGOS MARQUEE
   ACF fields: hp_logos_heading, home_bnr_company_logos_is (repeater)
   =============================================================== */
$logos_heading = get_field( 'hp_logos_heading' ) ?: 'PROUD TO WORK WITH';
?>
<section class="marquee_sec w-100 float-start text-center">
	<h2><?php echo esc_html( $logos_heading ); ?></h2>
	<?php for ( $i = 1; $i < 3; $i++ ) : ?>
	<ul class="marquee__item">
		<?php
		if ( have_rows( 'home_bnr_company_logos_is' ) ) :
			while ( have_rows( 'home_bnr_company_logos_is' ) ) : the_row();
				$img = get_sub_field( 'logo' );
				if ( $img ) :
		?>
		<li class="marqueeBox">
			<img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>">
		</li>
		<?php
				endif;
			endwhile;
		endif;
		?>
	</ul>
	<?php endfor; ?>
</section>


<?php
/* ===============================================================
   SECTION 3 — STATS BAR
   ACF field: hp_stats (repeater: number, label)
   =============================================================== */
?>
<section class="sv-stats hp-stats" id="hp-proof">
	<div class="sv-stats__accent"></div>
	<div class="container">
		<div class="sv-stats__grid">
			<?php
			if ( have_rows( 'hp_stats' ) ) :
				$stat_delay = 0;
				while ( have_rows( 'hp_stats' ) ) : the_row();
			?>
			<div class="sv-stats__item" data-aos="fade-up"<?php if ( $stat_delay ) echo ' data-aos-delay="' . esc_attr( $stat_delay ) . '"'; ?>>
				<p class="sv-stats__number"><?php echo esc_html( get_sub_field( 'number' ) ); ?></p>
				<p class="sv-stats__label"><?php echo esc_html( get_sub_field( 'label' ) ); ?></p>
			</div>
			<?php
					$stat_delay += 150;
				endwhile;
			else :
				// Fallback if no ACF data yet
			?>
			<div class="sv-stats__item" data-aos="fade-up"><p class="sv-stats__number">200+</p><p class="sv-stats__label">Projects Delivered</p></div>
			<div class="sv-stats__item" data-aos="fade-up" data-aos-delay="150"><p class="sv-stats__number">&pound;5M+</p><p class="sv-stats__label">Revenue Generated for Clients</p></div>
			<div class="sv-stats__item" data-aos="fade-up" data-aos-delay="300"><p class="sv-stats__number">97%</p><p class="sv-stats__label">Client Retention Rate</p></div>
			<div class="sv-stats__item" data-aos="fade-up" data-aos-delay="450"><p class="sv-stats__number">12+</p><p class="sv-stats__label">Years in Business</p></div>
			<?php endif; ?>
		</div>
	</div>
</section>


<?php
/* ===============================================================
   SECTION 4 — WHAT WE DO (v2 — animated)
   ACF fields: hp_pillars_label, hp_pillars_heading,
   hp_pillars (repeater: modifier, icon_svg, name, description, cta_text, link)
   =============================================================== */

$pillars_label   = get_field( 'hp_pillars_label' ) ?: 'WHAT WE DO';
$pillars_heading = get_field( 'hp_pillars_heading' ) ?: 'What does your brand need right now?';
$pillars_sub     = 'Four pillars. One goal: sustainable, measurable growth for your business.';

// SVG icons keyed by modifier (stroke-drawn on scroll)
$pillar_icons_v2 = array(
	'ai'     => '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a4 4 0 0 1 4 4v1a1 1 0 0 0 1 1h1a4 4 0 0 1 0 8h-1a1 1 0 0 0-1 1v1a4 4 0 0 1-8 0v-1a1 1 0 0 0-1-1H6a4 4 0 0 1 0-8h1a1 1 0 0 0 1-1V6a4 4 0 0 1 4-4z"/><circle cx="12" cy="12" r="2"/></svg>',
	'search' => '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>',
	'web'    => '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
	'brand'  => '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>',
);
?>
<section class="hp-wwd hp-v2">
	<canvas class="hp-v2__canvas hp-wwd__canvas"></canvas>
	<div class="container">
		<div class="hp-wwd__header">
			<p class="hp-wwd__label"><?php echo esc_html( $pillars_label ); ?></p>
			<h2 class="hp-wwd__title"><?php echo esc_html( $pillars_heading ); ?></h2>
			<p class="hp-wwd__subtitle"><?php echo esc_html( $pillars_sub ); ?></p>
		</div>

		<div class="hp-wwd__grid">
			<?php
			if ( have_rows( 'hp_pillars' ) ) :
				while ( have_rows( 'hp_pillars' ) ) : the_row();
					$mod      = get_sub_field( 'modifier' ) ?: 'ai';
					$icon_svg = get_sub_field( 'icon_svg' );
					$icon     = $icon_svg ?: ( $pillar_icons_v2[ $mod ] ?? '' );
					$name     = get_sub_field( 'name' );
					$desc     = get_sub_field( 'description' );
					$cta      = get_sub_field( 'cta_text' ) ?: 'Learn More';
					$link     = get_sub_field( 'link' );
			?>
			<a href="<?php echo esc_url( $link ); ?>" class="hp-wwd__card hp-wwd__card--<?php echo esc_attr( $mod ); ?>">
				<div class="hp-wwd__accent"></div>
				<div class="hp-wwd__icon"><?php echo $icon; ?></div>
				<h3 class="hp-wwd__name"><?php echo esc_html( $name ); ?></h3>
				<p class="hp-wwd__desc"><?php echo esc_html( $desc ); ?></p>
				<span class="hp-wwd__link">
					<?php echo esc_html( $cta ); ?>
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</span>
			</a>
			<?php
				endwhile;
			else :
				// Fallback pillars
				$fallback_pillars = array(
					array( 'ai', 'AI Automation', 'Automate repetitive tasks, streamline workflows, and unlock new capabilities with custom AI solutions built for your business.', 'Explore AI Solutions', '/services/ai-automation/' ),
					array( 'search', 'Organic Search (OSOF)', 'Get found everywhere your customers search. Google, AI assistants, answer engines, and generative search, all covered.', 'Discover OSOF', '/osof/' ),
					array( 'web', 'Web Design & Development', 'Conversion-focused websites that look stunning and perform. Built on WordPress with your growth in mind.', 'See Our Web Work', '/services/web-design/' ),
					array( 'brand', 'Brand Identity', 'Logos, visual systems, and brand strategy that make your business impossible to ignore and easy to remember.', 'View Branding Work', '/services/branding/' ),
				);
				foreach ( $fallback_pillars as $fp ) :
					$icon = $pillar_icons_v2[ $fp[0] ] ?? '';
			?>
			<a href="<?php echo esc_url( home_url( $fp[4] ) ); ?>" class="hp-wwd__card hp-wwd__card--<?php echo esc_attr( $fp[0] ); ?>">
				<div class="hp-wwd__accent"></div>
				<div class="hp-wwd__icon"><?php echo $icon; ?></div>
				<h3 class="hp-wwd__name"><?php echo esc_html( $fp[1] ); ?></h3>
				<p class="hp-wwd__desc"><?php echo esc_html( $fp[2] ); ?></p>
				<span class="hp-wwd__link">
					<?php echo esc_html( $fp[3] ); ?>
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</span>
			</a>
			<?php endforeach; endif; ?>
		</div>
	</div>
</section>


<?php
/* ===============================================================
   SECTION 5 — OSOF METHODOLOGY (v2 — animated timeline)
   ACF fields: hp_osof_label, hp_osof_title, hp_osof_intro,
   hp_osof_steps (repeater: title, text), hp_osof_cta_text, hp_osof_cta_url
   =============================================================== */

$osof_label    = get_field( 'hp_osof_label' ) ?: 'OUR METHODOLOGY';
$osof_title    = get_field( 'hp_osof_title' ) ?: 'Found <strong>everywhere</strong> your customers look.';
$osof_intro    = get_field( 'hp_osof_intro' ) ?: 'OSOF, our Organic Search Optimisation Framework, works across four pillars to make sure you don&rsquo;t just rank on Google. You appear wherever your ideal customer is searching.';
$osof_cta_text = get_field( 'hp_osof_cta_text' ) ?: 'Learn More About OSOF';
$osof_cta_url  = get_field( 'hp_osof_cta_url' ) ?: home_url( '/osof/' );
?>
<section class="hp-osof-v2 hp-v2">
	<canvas class="hp-v2__canvas hp-osof-v2__canvas"></canvas>
	<div class="container">
		<div class="hp-osof-v2__header">
			<p class="hp-osof-v2__label"><?php echo esc_html( $osof_label ); ?></p>
			<h2 class="hp-osof-v2__title"><?php echo wp_kses_post( $osof_title ); ?></h2>
			<p class="hp-osof-v2__intro"><?php echo wp_kses_post( $osof_intro ); ?></p>
		</div>

		<div class="hp-osof-v2__timeline">
			<div class="hp-osof-v2__progress"></div>
			<?php
			if ( have_rows( 'hp_osof_steps' ) ) :
				$osof_i = 1;
				while ( have_rows( 'hp_osof_steps' ) ) : the_row();
			?>
			<div class="hp-osof-v2__step">
				<div class="hp-osof-v2__node">
					<div class="hp-osof-v2__dot">
						<div class="hp-osof-v2__pulse"></div>
					</div>
				</div>
				<div class="hp-osof-v2__card">
					<div class="hp-osof-v2__number">
						<span class="hp-osof-v2__digit"><span class="hp-osof-v2__digit-inner">0</span></span><span class="hp-osof-v2__digit"><span class="hp-osof-v2__digit-inner"><?php echo esc_html( $osof_i ); ?></span></span>
					</div>
					<h3 class="hp-osof-v2__step-title"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
					<p class="hp-osof-v2__step-text"><?php echo esc_html( get_sub_field( 'text' ) ); ?></p>
				</div>
			</div>
			<?php
					$osof_i++;
				endwhile;
			else :
				$osof_defaults = array(
					array( 'Search Engine Optimisation', 'Traditional rankings on Google and Bing. Technical foundations, content strategy, and authority building that compound over time.' ),
					array( 'AI Overview Optimisation', 'Get featured in Google&rsquo;s AI-generated summaries. We structure your content so AI understands and recommends your business.' ),
					array( 'Answer Engine Optimisation', 'ChatGPT, Perplexity, Gemini: billions of searches now happen through AI assistants. We make sure they cite you.' ),
					array( 'Generative Engine Optimisation', 'The next frontier. We optimise for generative search engines that don&rsquo;t just link to you but build answers from your content.' ),
				);
				foreach ( $osof_defaults as $idx => $step ) :
			?>
			<div class="hp-osof-v2__step">
				<div class="hp-osof-v2__node">
					<div class="hp-osof-v2__dot">
						<div class="hp-osof-v2__pulse"></div>
					</div>
				</div>
				<div class="hp-osof-v2__card">
					<div class="hp-osof-v2__number">
						<span class="hp-osof-v2__digit"><span class="hp-osof-v2__digit-inner">0</span></span><span class="hp-osof-v2__digit"><span class="hp-osof-v2__digit-inner"><?php echo esc_html( $idx + 1 ); ?></span></span>
					</div>
					<h3 class="hp-osof-v2__step-title"><?php echo esc_html( $step[0] ); ?></h3>
					<p class="hp-osof-v2__step-text"><?php echo $step[1]; ?></p>
				</div>
			</div>
			<?php endforeach; endif; ?>

			<!-- End dot on timeline -->
			<div class="hp-osof-v2__end-node">
				<div class="hp-osof-v2__dot">
					<div class="hp-osof-v2__pulse"></div>
				</div>
			</div>
		</div>

		<div class="hp-osof-v2__cta text-center">
			<a href="<?php echo esc_url( $osof_cta_url ); ?>" class="primary_btn"><?php echo esc_html( $osof_cta_text ); ?></a>
		</div>
	</div>
</section>


<?php /* ─── ORIGINAL SECTIONS (kept as backup, hidden) ─── */ ?>
<div style="display:none!important" aria-hidden="true">

<?php
/* ===============================================================
   SECTION 4 — SERVICE PILLARS (ORIGINAL — hidden backup)
   =============================================================== */

// Default SVG icons keyed by modifier
$pillar_icons = array(
	'ai'     => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a4 4 0 0 1 4 4v1a1 1 0 0 0 1 1h1a4 4 0 0 1 0 8h-1a1 1 0 0 0-1 1v1a4 4 0 0 1-8 0v-1a1 1 0 0 0-1-1H6a4 4 0 0 1 0-8h1a1 1 0 0 0 1-1V6a4 4 0 0 1 4-4z"/><circle cx="12" cy="12" r="2"/></svg>',
	'search' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>',
	'web'    => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
	'brand'  => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>',
);
?>
<section class="sv-pillars sv-pillars--home">
	<div class="container">
		<div class="sv-pillars__header" data-aos="fade-up">
			<p class="sv-pillars__label"><?php echo esc_html( $pillars_label ); ?></p>
			<h2 class="sv-pillars__title"><?php echo esc_html( $pillars_heading ); ?></h2>
		</div>
		<div class="sv-pillars__grid">
			<?php
			if ( have_rows( 'hp_pillars' ) ) :
				$pillar_delay = 0;
				while ( have_rows( 'hp_pillars' ) ) : the_row();
					$mod      = get_sub_field( 'modifier' ) ?: 'ai';
					$icon_svg = get_sub_field( 'icon_svg' );
					$icon     = $icon_svg ?: ( $pillar_icons[ $mod ] ?? '' );
					$name     = get_sub_field( 'name' );
					$desc     = get_sub_field( 'description' );
					$cta      = get_sub_field( 'cta_text' ) ?: 'Learn More';
					$link     = get_sub_field( 'link' );
			?>
			<a href="<?php echo esc_url( $link ); ?>" class="sv-pillar sv-pillar--<?php echo esc_attr( $mod ); ?>" data-aos="fade-up"<?php if ( $pillar_delay ) echo ' data-aos-delay="' . esc_attr( $pillar_delay ) . '"'; ?>>
				<div class="sv-pillar__accent"></div>
				<div class="sv-pillar__icon"><?php echo $icon; ?></div>
				<h3 class="sv-pillar__name"><?php echo esc_html( $name ); ?></h3>
				<p class="sv-pillar__desc"><?php echo esc_html( $desc ); ?></p>
				<span class="sv-pillar__link">
					<?php echo esc_html( $cta ); ?>
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</span>
			</a>
			<?php
					$pillar_delay += 150;
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>

<section class="hp-osof">
	<div class="container">
		<div class="hp-osof__header" data-aos="fade-up">
			<p class="hp-osof__label"><?php echo esc_html( $osof_label ); ?></p>
			<h2 class="hp-osof__title"><?php echo wp_kses_post( $osof_title ); ?></h2>
			<p class="hp-osof__intro"><?php echo wp_kses_post( $osof_intro ); ?></p>
		</div>

		<div class="hp-osof__grid">
			<?php
			if ( have_rows( 'hp_osof_steps' ) ) :
				$osof_i = 1;
				while ( have_rows( 'hp_osof_steps' ) ) : the_row();
					$delay = ( $osof_i - 1 ) * 150;
			?>
			<div class="hp-osof__step" data-aos="fade-up"<?php if ( $delay ) echo ' data-aos-delay="' . esc_attr( $delay ) . '"'; ?>>
				<span class="hp-osof__number"><?php echo esc_html( str_pad( $osof_i, 2, '0', STR_PAD_LEFT ) ); ?></span>
				<h3 class="hp-osof__step-title"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
				<p class="hp-osof__step-text"><?php echo esc_html( get_sub_field( 'text' ) ); ?></p>
			</div>
			<?php
					$osof_i++;
				endwhile;
			else :
				$osof_defaults_bak = array(
					array( 'Search Engine Optimisation', 'Traditional rankings on Google and Bing. Technical foundations, content strategy, and authority building that compound over time.' ),
					array( 'AI Overview Optimisation', 'Get featured in Google&rsquo;s AI-generated summaries. We structure your content so AI understands and recommends your business.' ),
					array( 'Answer Engine Optimisation', 'ChatGPT, Perplexity, Gemini: billions of searches now happen through AI assistants. We make sure they cite you.' ),
					array( 'Generative Engine Optimisation', 'The next frontier. We optimise for generative search engines that don&rsquo;t just link to you but build answers from your content.' ),
				);
				foreach ( $osof_defaults_bak as $idx => $step ) :
					$delay = $idx * 150;
			?>
			<div class="hp-osof__step" data-aos="fade-up"<?php if ( $delay ) echo ' data-aos-delay="' . esc_attr( $delay ) . '"'; ?>>
				<span class="hp-osof__number"><?php echo esc_html( str_pad( $idx + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
				<h3 class="hp-osof__step-title"><?php echo esc_html( $step[0] ); ?></h3>
				<p class="hp-osof__step-text"><?php echo $step[1]; ?></p>
			</div>
			<?php endforeach; endif; ?>
		</div>

		<div class="hp-osof__cta text-center" data-aos="fade-up">
			<a href="<?php echo esc_url( $osof_cta_url ); ?>" class="primary_btn"><?php echo esc_html( $osof_cta_text ); ?></a>
		</div>
	</div>
</section>

</div>
<?php /* ─── END ORIGINAL BACKUP ─── */ ?>


<?php
/* ===============================================================
   SECTION 6 — CASE STUDIES
   ACF fields: hp_cs_label, hp_cs_heading, hp_cs_featured,
   hp_cs_cta_text, hp_cs_cta_url
   =============================================================== */

$cs_label    = get_field( 'hp_cs_label' ) ?: 'PROVEN RESULTS';
$cs_heading  = get_field( 'hp_cs_heading' ) ?: 'Real businesses. Measurable growth.';
$cs_cta_text = get_field( 'hp_cs_cta_text' ) ?: 'View All Case Studies';
$cs_cta_url  = get_field( 'hp_cs_cta_url' ) ?: home_url( '/case-studies/' );
$cs_featured = get_field( 'hp_cs_featured' );

if ( $cs_featured ) {
	$cs_ids = wp_list_pluck( $cs_featured, 'ID' );
	$cs_query = new WP_Query( array(
		'post_type'      => 'case_study',
		'posts_per_page' => 3,
		'post__in'       => $cs_ids,
		'orderby'        => 'post__in',
		'no_found_rows'  => true,
	) );
} else {
	$cs_query = new WP_Query( array(
		'post_type'      => 'case_study',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'no_found_rows'  => true,
	) );
}
?>
<section class="hp-case-studies">
	<div class="container">
		<p class="hp-case-studies__label" data-aos="fade-up"><?php echo esc_html( $cs_label ); ?></p>
		<h2 class="hp-case-studies__heading" data-aos="fade-up"><?php echo esc_html( $cs_heading ); ?></h2>

		<div class="row g-4">
			<?php
			$cs_index = 0;
			if ( $cs_query->have_posts() ) :
				while ( $cs_query->have_posts() ) : $cs_query->the_post();
					$image_url = has_post_thumbnail()
						? get_the_post_thumbnail_url( get_the_ID(), 'large' )
						: get_template_directory_uri() . '/images/cs_1.webp';

					$post_terms = get_the_terms( get_the_ID(), 'case_study_type' );
					$term_name  = '';
					if ( $post_terms && ! is_wp_error( $post_terms ) ) {
						$term_name = $post_terms[0]->name;
					}

					$card_subtitle = get_field( 'cs_card_subtitle' );
					$delay = $cs_index * 150;
			?>
			<div class="col-md-6 col-lg-4 cs-card-col" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
				<a href="<?php the_permalink(); ?>" class="cs-card">
					<div class="cs-card__image">
						<img loading="lazy" decoding="async" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" width="600" height="400">
						<?php if ( $term_name ) : ?>
						<span class="cs-card__tag"><?php echo esc_html( $term_name ); ?></span>
						<?php endif; ?>
					</div>
					<div class="cs-card__body">
						<h3 class="cs-card__title"><?php echo esc_html( get_the_title() ); ?></h3>
						<?php if ( $card_subtitle ) : ?>
						<p class="cs-card__stat"><?php echo esc_html( $card_subtitle ); ?></p>
						<?php endif; ?>
					</div>
				</a>
			</div>
			<?php
					$cs_index++;
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>

		<div class="hp-case-studies__cta text-center" data-aos="fade-up">
			<a href="<?php echo esc_url( $cs_cta_url ); ?>" class="cs-cta__btn cs-cta__btn--primary"><?php echo esc_html( $cs_cta_text ); ?></a>
		</div>
	</div>
</section>


<?php
/* ===============================================================
   SECTION 8 — QUIZ CTA + TESTIMONIAL (Cyan Accent)
   ACF fields: hp_quiz_heading, hp_quiz_subtext, hp_quiz_label,
   hp_quiz_primary_url, hp_quiz_secondary_text, hp_quiz_secondary_url,
   hp_testimonial_quote, hp_testimonial_name, hp_testimonial_role,
   hp_testimonial_photo
   =============================================================== */

$quiz_heading   = get_field( 'hp_quiz_heading' ) ?: 'Not sure what your brand needs?';
$quiz_subtext   = get_field( 'hp_quiz_subtext' ) ?: 'Our 3-minute Brand Discovery quiz is the starting point to transforming your business. You&rsquo;ll get a personalised report highlighting your biggest growth opportunities, plus ongoing insights straight to your inbox.';
$quiz_btn_text  = get_field( 'hp_quiz_label' ) ?: 'Take the Brand Discovery Quiz';
$quiz_btn_url   = get_field( 'hp_quiz_primary_url' ) ?: home_url( '/branding-quiz/' );
$quiz_sec_text  = get_field( 'hp_quiz_secondary_text' ) ?: 'Book a Free Strategy Call';
$quiz_sec_url   = get_field( 'hp_quiz_secondary_url' ) ?: home_url( '/contact/' );

$tq    = get_field( 'hp_testimonial_quote' ) ?: 'This project fundamentally changed how our business operates. What started as a website quickly became a complete rethink of our sales, inventory, and customer processes. Proud Brands challenged us, guided us, and built a system that actually fits how we work.';
$tname = get_field( 'hp_testimonial_name' ) ?: 'Bill Falconer';
$trole = get_field( 'hp_testimonial_role' ) ?: 'Owner, Anglers Resource LLC';
$timg  = get_field( 'hp_testimonial_photo' );
?>
<section class="hp-quiz-testi">
	<div class="container">
		<div class="hp-quiz-testi__grid">

			<!-- Left: CTA -->
			<div class="hp-quiz-testi__cta" data-aos="fade-up">
				<h2 class="hp-quiz-testi__heading"><?php echo esc_html( $quiz_heading ); ?></h2>
				<p class="hp-quiz-testi__subtext"><?php echo wp_kses_post( $quiz_subtext ); ?></p>
				<div class="hp-quiz-testi__actions">
					<a href="<?php echo esc_url( $quiz_btn_url ); ?>" class="pb-footer-cta__btn pb-footer-cta__btn--primary"><?php echo esc_html( $quiz_btn_text ); ?></a>
					<a href="<?php echo esc_url( $quiz_sec_url ); ?>" class="pb-footer-cta__btn pb-footer-cta__btn--secondary"><?php echo esc_html( $quiz_sec_text ); ?></a>
				</div>
			</div>

			<!-- Right: Testimonial -->
			<?php if ( $tq ) : ?>
			<div class="hp-quiz-testi__testimonial" data-aos="fade-up" data-aos-delay="100">
				<div class="hp-quiz-testi__quote-card">
					<div class="hp-quiz-testi__marks">&ldquo;</div>
					<blockquote class="hp-quiz-testi__quote">
						<p><?php echo wp_kses_post( $tq ); ?></p>
					</blockquote>
					<?php if ( $tname ) : ?>
					<div class="hp-quiz-testi__author">
						<?php if ( $timg ) : ?>
						<img class="hp-quiz-testi__avatar" src="<?php echo esc_url( $timg['url'] ); ?>" alt="<?php echo esc_attr( $tname ); ?>" width="56" height="56" loading="lazy">
						<?php endif; ?>
						<div>
							<span class="hp-quiz-testi__name"><?php echo esc_html( $tname ); ?></span>
							<?php if ( $trole ) : ?>
							<span class="hp-quiz-testi__role"><?php echo esc_html( $trole ); ?></span>
							<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>

		</div>
	</div>
</section>


<?php
/* ===============================================================
   SECTION 10 — PROCESS
   ACF fields: hp_process_title, hp_process_subtitle,
   hp_process_steps (repeater: title, text)
   =============================================================== */

$process_title    = get_field( 'hp_process_title' ) ?: 'Working with us is simple.';
$process_subtitle = get_field( 'hp_process_subtitle' ) ?: 'No jargon. No 47-page proposals. Just clear steps from first call to measurable results.';
?>
<section class="hp-process">
	<div class="container">
		<div class="hp-process__header" data-aos="fade-up">
			<h2 class="hp-process__title"><?php echo esc_html( $process_title ); ?></h2>
			<p class="hp-process__subtitle"><?php echo esc_html( $process_subtitle ); ?></p>
		</div>

		<div class="hp-process__grid">
			<?php
			if ( have_rows( 'hp_process_steps' ) ) :
				$proc_i = 1;
				while ( have_rows( 'hp_process_steps' ) ) : the_row();
					$delay = ( $proc_i - 1 ) * 150;
			?>
			<div class="hp-process__step" data-aos="fade-up"<?php if ( $delay ) echo ' data-aos-delay="' . esc_attr( $delay ) . '"'; ?>>
				<span class="hp-process__number"><?php echo esc_html( str_pad( $proc_i, 2, '0', STR_PAD_LEFT ) ); ?></span>
				<h3 class="hp-process__step-title"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
				<p class="hp-process__step-text"><?php echo esc_html( get_sub_field( 'text' ) ); ?></p>
			</div>
			<?php
					$proc_i++;
				endwhile;
			else :
				// Fallback
				$proc_defaults = array(
					array( 'Discovery', 'We learn your business, your goals, and where the biggest growth opportunities are. This might start with our Brand Discovery quiz or a free strategy call.' ),
					array( 'Strategy & Build', 'We create a tailored plan, whether that&rsquo;s a rebrand, a new website, an OSOF search campaign, or AI workflows, and build it with you, not for you.' ),
					array( 'Launch & Grow', 'We launch, measure, and optimise. Monthly reporting shows you exactly what&rsquo;s working. We don&rsquo;t disappear after launch. We grow with you.' ),
				);
				foreach ( $proc_defaults as $idx => $step ) :
					$delay = $idx * 150;
			?>
			<div class="hp-process__step" data-aos="fade-up"<?php if ( $delay ) echo ' data-aos-delay="' . esc_attr( $delay ) . '"'; ?>>
				<span class="hp-process__number"><?php echo esc_html( str_pad( $idx + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
				<h3 class="hp-process__step-title"><?php echo esc_html( $step[0] ); ?></h3>
				<p class="hp-process__step-text"><?php echo $step[1]; ?></p>
			</div>
			<?php endforeach; endif; ?>
		</div>
	</div>
</section>


<?php
/* ===============================================================
   SECTION 11 — FAQ ACCORDION
   ACF fields: hp_faq_title, hp_faq_items (repeater: question, answer)
   =============================================================== */

$faq_title = get_field( 'hp_faq_title' ) ?: 'Got questions? We&rsquo;ve got answers.';
?>
<section class="hp-faq">
	<div class="container">
		<h2 class="hp-faq__title" data-aos="fade-up"><?php echo wp_kses_post( $faq_title ); ?></h2>

		<div class="accordion hp-faq__accordion" id="hpFaqAccordion" data-aos="fade-up" data-aos-delay="100">
			<?php
			if ( have_rows( 'hp_faq_items' ) ) :
				$faq_i = 1;
				while ( have_rows( 'hp_faq_items' ) ) : the_row();
					$q = get_sub_field( 'question' );
					$a = get_sub_field( 'answer' );
			?>
			<div class="accordion-item">
				<h2 class="accordion-header" id="hpFaq<?php echo $faq_i; ?>">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hpFaqBody<?php echo $faq_i; ?>" aria-expanded="false" aria-controls="hpFaqBody<?php echo $faq_i; ?>">
						<?php echo esc_html( $q ); ?>
					</button>
				</h2>
				<div id="hpFaqBody<?php echo $faq_i; ?>" class="accordion-collapse collapse" aria-labelledby="hpFaq<?php echo $faq_i; ?>" data-bs-parent="#hpFaqAccordion">
					<div class="accordion-body">
						<?php echo wp_kses_post( $a ); ?>
					</div>
				</div>
			</div>
			<?php
					$faq_i++;
				endwhile;
			else :
				// Fallback FAQs
				$faq_defaults = array(
					array( 'How much does a project typically cost?', '<p>It depends on scope, but most projects range from &pound;5,000 to &pound;25,000. We&rsquo;ll give you a fixed quote after our discovery call with no surprises and no hidden fees. Not sure what you need? <a href="' . esc_url( home_url( '/branding-quiz/' ) ) . '">Take our free Brand Discovery quiz</a> for a starting point.</p>' ),
					array( 'We&rsquo;re a small business. Is ProudBrands the right fit?', '<p>Absolutely. We&rsquo;re a family-run agency ourselves. We specialise in helping ambitious SMEs and growing brands, whether you&rsquo;re a 5-person team or a 50-person company.</p>' ),
					array( 'How long does a typical project take?', '<p>A rebrand takes 6&ndash;8 weeks. A website takes 8&ndash;12 weeks. An OSOF search campaign starts showing results in 3&ndash;6 months and compounds from there. We&rsquo;ll give you a clear timeline before we start.</p>' ),
					array( 'What&rsquo;s the difference between SEO and OSOF?', '<p>Traditional SEO only targets Google&rsquo;s organic results. OSOF covers four pillars: SEO, AI Overview Optimisation, Answer Engine Optimisation, and Generative Engine Optimisation. In 2026, your customers search through ChatGPT, Perplexity, and Google AI as much as traditional search. OSOF makes sure you&rsquo;re visible everywhere.</p>' ),
					array( 'Do you work with businesses outside Aylesbury?', '<p>Yes. While we&rsquo;re based in Aylesbury, Buckinghamshire, we work with clients across the UK and internationally. Most of our communication happens over video calls and our project portal.</p>' ),
					array( 'What happens after launch?', '<p>We don&rsquo;t disappear. Every client gets monthly reporting, quarterly strategy reviews, and direct access to our team. Our 97% retention rate exists because we treat your business like our own.</p>' ),
				);
				foreach ( $faq_defaults as $idx => $faq ) :
					$fi = $idx + 1;
			?>
			<div class="accordion-item">
				<h2 class="accordion-header" id="hpFaq<?php echo $fi; ?>">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hpFaqBody<?php echo $fi; ?>" aria-expanded="false" aria-controls="hpFaqBody<?php echo $fi; ?>">
						<?php echo $faq[0]; ?>
					</button>
				</h2>
				<div id="hpFaqBody<?php echo $fi; ?>" class="accordion-collapse collapse" aria-labelledby="hpFaq<?php echo $fi; ?>" data-bs-parent="#hpFaqAccordion">
					<div class="accordion-body"><?php echo $faq[1]; ?></div>
				</div>
			</div>
			<?php endforeach; endif; ?>
		</div>
	</div>
</section>


<?php
/* ===============================================================
   SECTION 12 — TECH PARTNERS MARQUEE
   ACF fields: hp_tech_heading, home_sec4_technology_partners (repeater)
   =============================================================== */
$tech_heading = get_field( 'hp_tech_heading' ) ?: 'POWERED BY THE BEST TOOLS';
?>
<section class="marquee_sec marquee_sec02 w-100 float-start text-center">
	<h2><?php echo esc_html( $tech_heading ); ?></h2>
	<ul>
		<?php
		if ( have_rows( 'home_sec4_technology_partners' ) ) :
			while ( have_rows( 'home_sec4_technology_partners' ) ) : the_row();
				$img = get_sub_field( 'logo' );
				if ( $img ) :
		?>
		<li class="marqueeBox">
			<img width="56" height="64" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>">
		</li>
		<?php
				endif;
			endwhile;
		endif;
		?>
	</ul>
</section>


<?php
/* ===============================================================
   SECTION 13 — FEATURED ARTICLES
   ACF fields: hp_articles_heading, home_sec4_blog_posts (relationship)
   =============================================================== */

$articles_heading = get_field( 'hp_articles_heading' ) ?: 'Insights &amp; Resources';
$featured_posts   = get_field( 'home_sec4_blog_posts' );
?>
<section class="hp-articles">
	<div class="container">
		<h2 class="hp-articles__heading" data-aos="fade-up"><?php echo wp_kses_post( $articles_heading ); ?></h2>

		<?php if ( $featured_posts ) : ?>
		<div class="article_div w-100 d-grid">
			<?php
			foreach ( $featured_posts as $key => $featured_post ) :
				$permalink = get_permalink( $featured_post->ID );
				$title     = get_the_title( $featured_post->ID );
				$excerpt   = get_the_excerpt( $featured_post->ID );
				$date      = get_the_date( '', $featured_post->ID );
				$thumbnail = get_the_post_thumbnail( $featured_post->ID, 'medium' );
				$delay     = ( $key + 1 ) * 200;
			?>
			<div class="article w-100 float-start" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
				<div class="article_pic w-100 float-start">
					<a href="<?php echo esc_url( $permalink ); ?>" title="<?php echo esc_attr( $title ); ?>">
						<?php echo $thumbnail; ?>
					</a>
				</div>
				<div class="article_des w-100 float-start">
					<span><?php echo esc_html( $date ); ?></span>
					<h2>
						<a class="article_title" href="<?php echo esc_url( $permalink ); ?>">
							<?php echo esc_html( $title ); ?>
						</a>
					</h2>
					<p><?php echo esc_html( wp_trim_words( $excerpt, 20, '...' ) ); ?></p>
					<a class="read_article" href="<?php echo esc_url( $permalink ); ?>">Read Article</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
