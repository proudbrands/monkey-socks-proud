/**
 * Vanilla JS tabs – replaces Bootstrap tab toggle.
 *
 * Works with the pb-tabs-section block. Desktop uses <a> tab links
 * with data-tab-target; mobile uses a <select> dropdown.
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		// Desktop tab clicks.
		var tabLinks = document.querySelectorAll('[data-tab-target]');
		tabLinks.forEach(function (link) {
			link.addEventListener('click', function (e) {
				e.preventDefault();
				var target = this.getAttribute('data-tab-target');
				if (!target) return;

				// Deactivate all tabs.
				tabLinks.forEach(function (l) { l.classList.remove('active'); });
				// Activate clicked tab.
				this.classList.add('active');

				// Hide all panes.
				var panes = document.querySelectorAll('.tab-pane');
				panes.forEach(function (p) {
					p.classList.remove('show', 'active');
					p.style.display = '';
				});

				// Show target pane.
				var pane = document.querySelector(target);
				if (pane) {
					pane.classList.add('show', 'active');
				}
			});
		});

		// Mobile select dropdown.
		var selectBox = document.getElementById('select-box2');
		if (selectBox && window.innerWidth < 992) {
			var panes = document.querySelectorAll('.tab-pane');
			panes.forEach(function (p) { p.style.display = 'none'; });
			var first = document.getElementById('home_1');
			if (first) first.style.display = '';

			selectBox.addEventListener('change', function () {
				panes.forEach(function (p) { p.style.display = 'none'; });
				var target = document.getElementById('home_' + this.value);
				if (target) target.style.display = '';
			});
		}
	});
})();
