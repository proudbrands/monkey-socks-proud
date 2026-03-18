/**
 * Calendly Toggle
 *
 * Extracted from template-contact.php inline script.
 * Toggles the Calendly booking widget visibility.
 */
(function ($) {
	'use strict';

	$(function () {
		$('#book_meeting').on('click', function () {
			$('body').addClass('open_clandely');
		});
		$('.close_clandely').on('click', function () {
			$('body').removeClass('open_clandely');
		});
	});
})(jQuery);
