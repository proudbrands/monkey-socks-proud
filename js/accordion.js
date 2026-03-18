/**
 * Vanilla JS Accordion
 *
 * Replaces Bootstrap accordion (data-bs-toggle="collapse").
 * Works with the same HTML structure: .accordion-item > .accordion-button + .accordion-collapse
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var buttons = document.querySelectorAll('.accordion-button');

		buttons.forEach(function (button) {
			button.addEventListener('click', function () {
				var targetId = this.getAttribute('data-bs-target') || this.dataset.target;
				var target = document.querySelector(targetId);
				if (!target) return;

				var parent = target.closest('.accordion');
				var isOpen = target.classList.contains('show');

				// Close all siblings within the same accordion parent
				if (parent) {
					parent.querySelectorAll('.accordion-collapse.show').forEach(function (openItem) {
						openItem.classList.remove('show');
						openItem.style.maxHeight = null;
						var btn = openItem.previousElementSibling
							? openItem.previousElementSibling.querySelector('.accordion-button')
							: null;
						if (btn) btn.classList.add('collapsed');
					});
				}

				// Toggle clicked item
				if (!isOpen) {
					target.classList.add('show');
					target.style.maxHeight = target.scrollHeight + 'px';
					this.classList.remove('collapsed');
				} else {
					target.classList.remove('show');
					target.style.maxHeight = null;
					this.classList.add('collapsed');
				}
			});
		});

		// Initialize: set max-height on items that start with .show
		document.querySelectorAll('.accordion-collapse.show').forEach(function (item) {
			item.style.maxHeight = item.scrollHeight + 'px';
		});
	});
})();
