<?php
/**
 * Template Name: Branding Quiz
 *
 * Dedicated full-page layout for the Brand Discovery quiz.
 * Shows header + footer but hides the footer CTA, and gives
 * the quiz a stable, centred container so height changes don't
 * bounce the footer.
 *
 * @package Proud_Brands
 */

get_header();
?>

<main class="pb-quiz-page">
	<div id="quiz-top" class="pb-quiz-page__header text-center">
		<h1 class="pb-quiz-page__title">Take our Branding Quiz</h1>
		<p class="pb-quiz-page__intro">At the end of this quiz we all will have a good idea what you like and don't like. Give it a go!</p>
	</div>
	<div class="pb-quiz-page__inner">
		<?php echo do_shortcode( '[pb_brand_discovery]' ); ?>
	</div>
</main>

<script>
/**
 * Sync site theme toggle (data-theme on <html>) with the quiz's
 * .pb-quiz--light class so dark/light mode works on the quiz page.
 */
(function() {
	var root = document.documentElement;
	var quiz = document.querySelector( '.pb-quiz' );
	if ( ! quiz ) return;

	function sync() {
		if ( root.getAttribute( 'data-theme' ) === 'light' ) {
			quiz.classList.add( 'pb-quiz--light' );
		} else {
			quiz.classList.remove( 'pb-quiz--light' );
		}
	}

	// Initial sync.
	sync();

	// Watch for toggle changes.
	new MutationObserver( sync ).observe( root, {
		attributes: true,
		attributeFilter: [ 'data-theme' ]
	} );

	// Scroll to anchor when quiz stage changes.
	var quizInner = document.getElementById( 'pb-quiz-inner' );
	var anchor = document.getElementById( 'quiz-top' );
	if ( quizInner && anchor ) {
		var skipFirst = true;
		new MutationObserver( function() {
			if ( skipFirst ) { skipFirst = false; return; }
			var headerHeight = document.querySelector( '.hdr_sec' )?.offsetHeight || 0;
			var top = anchor.getBoundingClientRect().top + window.scrollY - headerHeight - 20;
			window.scrollTo( { top: top, behavior: 'smooth' } );
		} ).observe( quizInner, { childList: true } );
	}
})();
</script>

<?php
get_footer();
