/**
 * Typing Effect
 *
 * Extracted from template-contact.php inline script.
 * Animates text with a typewriter effect when element enters viewport.
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var elements = document.querySelectorAll('.typing-effect');

		function typeWriter(element) {
			var fullText = element.textContent;
			element.textContent = '';
			var index = 0;
			var typingSpeed = 20;

			function type() {
				if (index < fullText.length) {
					element.textContent += fullText.charAt(index);
					index++;
					setTimeout(type, typingSpeed);
				}
			}

			type();
		}

		var observer = new IntersectionObserver(function (entries, obs) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					typeWriter(entry.target);
					obs.unobserve(entry.target);
				}
			});
		}, { threshold: 0.5 });

		elements.forEach(function (element) {
			observer.observe(element);
		});
	});
})();
