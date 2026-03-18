/**
 * Cursor-Follow "View More" Effect
 *
 * Extracted from archive-our_work.php inline script.
 * Makes .view-more element follow the mouse cursor within .cs_img containers.
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var containers = document.querySelectorAll('.cs_img');

		containers.forEach(function (container) {
			var viewMore = container.querySelector('.view-more');
			if (!viewMore) return;

			container.addEventListener('mousemove', function (e) {
				var rect = container.getBoundingClientRect();
				viewMore.style.left = (e.clientX - rect.left) + 'px';
				viewMore.style.top = (e.clientY - rect.top) + 'px';
			});
		});
	});
})();
