/**
 * AJAX Load More handlers.
 *
 * Extracted from inline <script> tags in footer.php.
 * Handles load-more for blog posts, Our Work posts, and Resources.
 *
 * Requires: jQuery (provided by WordPress), ajaxPagination.ajaxurl (localized).
 */
(function ($) {
	'use strict';

	$(document).ready(function () {

		/* ── Blog posts ── */
		$('#spinninggLoader').hide();

		$(document).on('click', '#loadMore', function (event) {
			event.preventDefault();

			var $spinner    = $('#spinninggLoader');
			var $btn        = $(this);
			var totalPages  = parseInt($btn.attr('total_Pages'), 10);
			var nextPage    = parseInt($btn.attr('next_Page'), 10);

			$spinner.show();

			$.ajax({
				url:  ajaxPagination.ajaxurl,
				type: 'post',
				data: {
					action:      'ajax_pagination',
					TotalPages:  totalPages,
					CurrentPage: parseInt($btn.attr('current_Page'), 10),
					NexxtPage:   nextPage
				},
				success: function (data) {
					setTimeout(function () {
						$('#loadMoreContent').append(data);
						$spinner.hide();
						if (nextPage >= totalPages) {
							$('#viewMoreDriveDiv').hide();
						}
					}, 3000);

					nextPage++;
					$btn.attr('next_Page', nextPage);
				},
				error: function () {
					$spinner.hide();
				}
			});
		});


		/* ── Our Work posts ── */
		$('#spinninggLoaderWork').hide();

		$(document).on('click', '#loadMoreWork', function (event) {
			event.preventDefault();

			var $spinner    = $('#spinninggLoaderWork');
			var $btn        = $(this);
			var totalPages  = parseInt($btn.attr('total_Pages'), 10);
			var nextPage    = parseInt($btn.attr('next_Page'), 10);

			$spinner.show();
			nextPage = nextPage + 1;

			$.ajax({
				url:  ajaxPagination.ajaxurl,
				type: 'post',
				data: {
					action:      'ajax_pagination_work',
					TotalPages:  totalPages,
					CurrentPage: parseInt($btn.attr('current_Page'), 10),
					NexxtPage:   nextPage
				},
				success: function (data) {
					setTimeout(function () {
						$('#loadMoreContentWork').append(data);
						$spinner.hide();
						if (nextPage >= totalPages) {
							$('#viewMoreDriveDivWork').hide();
						}
					}, 3000);

					nextPage++;
					$btn.attr('next_Page', nextPage);
				},
				error: function () {
					$spinner.hide();
				}
			});
		});


		/* ── Resource posts ── */
		$('#spinninggLoaderResource').hide();

		$(document).on('click', '#loadMoreResource', function (event) {
			event.preventDefault();

			var $spinner    = $('#spinninggLoaderResource');
			var $btn        = $(this);
			var totalPages  = parseInt($btn.attr('total_Pages'), 10);
			var nextPage    = parseInt($btn.attr('next_Page'), 10);

			$spinner.show();

			$.ajax({
				url:  ajaxPagination.ajaxurl,
				type: 'post',
				data: {
					action:      'ajax_pagination_resc',
					TotalPages:  totalPages,
					CurrentPage: parseInt($btn.attr('current_Page'), 10),
					NexxtPage:   nextPage
				},
				success: function (data) {
					setTimeout(function () {
						$('#loadmoreDivResource').append(data);
						$spinner.hide();
						if (nextPage >= totalPages) {
							$('#viewMoreDriveDivResource').hide();
						}
					}, 3000);

					nextPage++;
					$btn.attr('next_Page', nextPage);
				},
				error: function () {
					$spinner.hide();
				}
			});
		});


		/* ── Back to top ── */
		var backToTop = document.getElementById('back-to-top');
		if (backToTop) {
			backToTop.addEventListener('click', function () {
				window.scrollTo({ top: 0, behavior: 'smooth' });
			});
		}

	});

})(jQuery);
