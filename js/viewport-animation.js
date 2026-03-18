/**
 * Viewport animation – adds 'in-viewport' class to elements on scroll.
 *
 * Used by the Case Study graph section so the bar-height CSS transitions
 * trigger when the section scrolls into view.
 *
 * Replaces inline script from template-case_study.php.
 */
(function () {
	'use strict';

	function inViewport(selector) {
		var elements = document.querySelectorAll(selector);
		if (!elements.length) return;

		var windowHeight = window.innerHeight;

		function checkVisibility() {
			elements.forEach(function (el) {
				var rect = el.getBoundingClientRect();
				if (rect.top < windowHeight && rect.top > 0) {
					el.classList.add('in-viewport');
				}
			});
		}

		checkVisibility();
		window.addEventListener('scroll', checkVisibility);
	}

	window.addEventListener('load', function () {
		inViewport('.solution_sec');
	});
})();
