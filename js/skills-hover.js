/**
 * Skills Section – Image swap on hover.
 *
 * Reads skill image URLs from a JSON script tag (#skill-images-data)
 * output by the pb-skills-section block, then swaps the main
 * skill image when hovering over each skill list item.
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var dataEl = document.getElementById('skill-images-data');
		if (!dataEl) return;

		var images;
		try {
			images = JSON.parse(dataEl.textContent);
		} catch (e) {
			return;
		}

		var mainImg = document.querySelector('.skill_img_1');
		if (!mainImg) return;

		// Set initial image.
		if (images['1']) {
			mainImg.src = images['1'];
		}

		// Bind hover events for each skill item (skill_2, skill_3, etc.).
		var keys = Object.keys(images);
		keys.forEach(function (key) {
			if (key === '1') return; // Skip default.
			var el = document.getElementById('skill_' + key);
			if (!el) return;

			el.addEventListener('mouseenter', function () {
				mainImg.src = images[key];
			});
			el.addEventListener('mouseleave', function () {
				mainImg.src = images['1'];
			});
		});
	});
})();
