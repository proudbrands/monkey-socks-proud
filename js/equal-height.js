/**
 * Equal height – sets all .help_businesBox to the same height.
 *
 * Replaces inline script from single-our_work.php.
 */
(function () {
	'use strict';

	window.addEventListener('load', function () {
		var boxes = document.querySelectorAll('.help_businesBox');
		if (!boxes.length) return;

		var maxHeight = 0;
		boxes.forEach(function (box) {
			var h = box.offsetHeight;
			if (h > maxHeight) maxHeight = h;
		});

		boxes.forEach(function (box) {
			box.style.height = maxHeight + 'px';
		});
	});
})();
