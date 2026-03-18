<?php
/**
 * Archive template for Case Studies
 * Hero + filter tabs + premium card grid with AJAX pagination
 *
 * @package Proud_Brands
 */

get_header();

$selected_term = isset( $_GET['type'] ) ? sanitize_text_field( $_GET['type'] ) : '';

// Build query
$args = array(
	'post_type'      => 'case_study',
	'posts_per_page' => 6,
	'post_status'    => 'publish',
	'order'          => 'DESC',
);

if ( ! empty( $selected_term ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'case_study_type',
			'field'    => 'slug',
			'terms'    => $selected_term,
		),
	);
}

$query = new WP_Query( $args );

// Count for pagination
$count_args = $args;
$count_args['posts_per_page'] = -1;
$count_query = new WP_Query( $count_args );
$total_posts = $count_query->found_posts;
wp_reset_postdata();
?>

<main id="primary" class="site-main">

	<!-- ═══════════════════════════════════════════
	     HERO
	     ═══════════════════════════════════════════ -->
	<section class="cs-archive-hero">
		<div class="container">
			<div class="cs-archive-hero__inner" data-aos="fade-up">
				<span class="cs-section__label">Our Work in Action</span>
				<h1 class="cs-archive-hero__title">Case Studies</h1>
				<p class="cs-archive-hero__desc">Real results for real businesses. From visual identity transformations to SEO revenue growth — see how we deliver.</p>
			</div>
		</div>
	</section>

	<!-- ═══════════════════════════════════════════
	     FILTER TABS
	     ═══════════════════════════════════════════ -->
	<section class="cs-archive-filters">
		<div class="container">
			<ul class="cs-filter-tabs" id="csFilterTabs">
				<li class="<?php echo empty( $selected_term ) ? 'active' : ''; ?>">
					<a href="<?php echo esc_url( get_post_type_archive_link( 'case_study' ) ); ?>" data-filter="">All</a>
				</li>
				<?php
				$terms = get_terms( array(
					'taxonomy'   => 'case_study_type',
					'hide_empty' => false,
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
					foreach ( $terms as $term ) :
						// Display label mapping
						$display_name = $term->name;
						if ( $term->slug === 'organic-revenue' ) {
							$display_name = 'SEO & Organic Revenue';
						}
				?>
				<li class="<?php echo ( $selected_term === $term->slug ) ? 'active' : ''; ?>">
					<a href="<?php echo esc_url( add_query_arg( 'type', $term->slug, get_post_type_archive_link( 'case_study' ) ) ); ?>" data-filter="<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_html( $display_name ); ?></a>
				</li>
				<?php
					endforeach;
				endif;
				?>
			</ul>
		</div>
	</section>

	<!-- ═══════════════════════════════════════════
	     CARD GRID
	     ═══════════════════════════════════════════ -->
	<section class="cs-archive-grid">
		<div class="container">
			<h2 class="cs-archive-grid__heading" data-aos="fade-up">Success Stories</h2>
			<div class="row g-4" id="csCardGrid">
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
					$image_url = has_post_thumbnail()
						? get_the_post_thumbnail_url( get_the_ID(), 'large' )
						: get_template_directory_uri() . '/images/cs_1.webp';

					$post_terms = get_the_terms( get_the_ID(), 'case_study_type' );
					$term_name = '';
					$term_slug = '';
					if ( $post_terms && ! is_wp_error( $post_terms ) ) {
						$term_name = $post_terms[0]->name;
						$term_slug = $post_terms[0]->slug;
					}

					$card_subtitle = get_field( 'cs_card_subtitle' );
				?>
				<div class="col-md-6 col-lg-4 cs-card-col" data-aos="fade-up">
					<a href="<?php the_permalink(); ?>" class="cs-card">
						<div class="cs-card__image">
							<img loading="lazy" decoding="async" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" width="600" height="400">
							<span class="cs-card__tag"><?php echo esc_html( $term_name ); ?></span>
						</div>
						<div class="cs-card__body">
							<h3 class="cs-card__title"><?php echo esc_html( get_the_title() ); ?></h3>
							<?php if ( $card_subtitle ) : ?>
							<p class="cs-card__stat"><?php echo esc_html( $card_subtitle ); ?></p>
							<?php endif; ?>
						</div>
					</a>
				</div>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div>

			<?php if ( $total_posts > 6 ) : ?>
			<div class="cs-archive-loadmore text-center" id="csLoadMore">
				<button class="cs-cta__btn cs-cta__btn--primary" id="csLoadMoreBtn"
					data-page="1"
					data-total="<?php echo esc_attr( ceil( $total_posts / 6 ) ); ?>"
					data-category="<?php echo esc_attr( $selected_term ); ?>">
					Load More
				</button>
			</div>
			<?php endif; ?>
		</div>
	</section>

</main>

<script>
(function() {
	// AJAX filter tabs
	var filterTabs = document.querySelectorAll('#csFilterTabs a');
	var cardGrid = document.getElementById('csCardGrid');
	var loadMoreWrap = document.getElementById('csLoadMore');

	filterTabs.forEach(function(tab) {
		tab.addEventListener('click', function(e) {
			e.preventDefault();
			var filter = this.getAttribute('data-filter');

			// Update active state
			document.querySelectorAll('#csFilterTabs li').forEach(function(li) {
				li.classList.remove('active');
			});
			this.parentElement.classList.add('active');

			// Update URL without reload
			var url = new URL(window.location);
			if (filter) {
				url.searchParams.set('type', filter);
			} else {
				url.searchParams.delete('type');
			}
			window.history.pushState({}, '', url);

			// AJAX load
			loadCaseStudies(1, filter, true);
		});
	});

	// Load more button
	var loadMoreBtn = document.getElementById('csLoadMoreBtn');
	if (loadMoreBtn) {
		loadMoreBtn.addEventListener('click', function() {
			var nextPage = parseInt(this.getAttribute('data-page')) + 1;
			var category = this.getAttribute('data-category');
			this.setAttribute('data-page', nextPage);
			loadCaseStudies(nextPage, category, false);
		});
	}

	function loadCaseStudies(page, category, replace) {
		var formData = new FormData();
		formData.append('action', 'ajax_pagination_case_study');
		formData.append('NexxtPage', page);
		formData.append('Category', category || '');

		if (loadMoreBtn) loadMoreBtn.textContent = 'Loading...';

		fetch('<?php echo admin_url( 'admin-ajax.php' ); ?>', {
			method: 'POST',
			body: formData
		})
		.then(function(res) { return res.text(); })
		.then(function(html) {
			if (replace) {
				cardGrid.innerHTML = html;
				if (loadMoreBtn) {
					loadMoreBtn.setAttribute('data-page', '1');
					loadMoreBtn.setAttribute('data-category', category || '');
				}
			} else {
				cardGrid.insertAdjacentHTML('beforeend', html);
			}

			if (loadMoreBtn) {
				loadMoreBtn.textContent = 'Load More';
				var totalPages = parseInt(loadMoreBtn.getAttribute('data-total'));
				var currentPage = parseInt(loadMoreBtn.getAttribute('data-page'));
				if (currentPage >= totalPages || !html.trim()) {
					loadMoreWrap.style.display = 'none';
				} else {
					loadMoreWrap.style.display = 'block';
				}
			}

			// Re-init AOS for new elements
			if (typeof AOS !== 'undefined') AOS.refresh();
		});
	}
})();
</script>

<?php get_footer(); ?>
