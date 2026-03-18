/**
 * CounterUp + Waypoints initialisation.
 *
 * Animates elements with the `.counter` class using the CounterUp library
 * when they scroll into view (via Waypoints).
 *
 * Replaces inline scripts from template-about.php and template-case_study.php.
 */
jQuery(document).ready(function () {
	'use strict';

	if (typeof window.counterUp === 'undefined' || typeof window.counterUp['default'] === 'undefined') {
		return;
	}

	var counterUp = window.counterUp['default'];
	var $counters = jQuery('.counter');

	$counters.each(function (ignore, counter) {
		var waypoint = new Waypoint({
			element: jQuery(this),
			handler: function () {
				counterUp(counter, {
					duration: 2000,
					delay: 16
				});
				this.destroy();
			},
			offset: 'bottom-in-view'
		});
	});
});
