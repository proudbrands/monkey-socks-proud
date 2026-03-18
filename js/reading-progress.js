/**
 * Reading Progress Bar
 *
 * Extracted from single.php inline script.
 * Tracks scroll position within .blog_dtl_text_sec and updates .page_bar width.
 */
(function () {
	'use strict';

	window.addEventListener('scroll', function () {
		var section = document.querySelector('.blog_dtl_text_sec');
		var progressBar = document.querySelector('.page_bar');
		if (!section || !progressBar) return;

		var sectionTop = section.offsetTop;
		var sectionHeight = section.offsetHeight;
		var scrollPosition = window.scrollY;

		if (scrollPosition >= sectionTop && scrollPosition <= sectionTop + sectionHeight) {
			var scrollPercentage = ((scrollPosition - sectionTop) / sectionHeight) * 100;
			progressBar.style.width = scrollPercentage + '%';
		} else if (scrollPosition < sectionTop) {
			progressBar.style.width = '0%';
		} else {
			progressBar.style.width = '105%';
		}
	});
})();
