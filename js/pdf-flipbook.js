/**
 * PDF Flipbook — renders a PDF as an interactive page-turning book.
 * Uses PDF.js v3 (Mozilla) for rendering + StPageFlip for the flip animation.
 *
 * Expects:
 *   - #cs-flipbook[data-pdf]  — URL to the PDF
 *   - #cs-flipbook-wrapper     — container for pages
 *   - #cs-flipbook-prev/next   — navigation buttons
 *   - #cs-flipbook-page        — page counter element
 *
 * Dependencies (loaded from CDN before this script):
 *   - pdf.js v3.11.174 (pdfjsLib global)
 *   - page-flip v2.0.7 (St.PageFlip global)
 */
(function () {
	'use strict';

	var container = document.getElementById('cs-flipbook');
	if (!container) return;

	var pdfUrl  = container.getAttribute('data-pdf');
	if (!pdfUrl) return;

	var wrapper  = document.getElementById('cs-flipbook-wrapper');
	var prevBtn  = document.getElementById('cs-flipbook-prev');
	var nextBtn  = document.getElementById('cs-flipbook-next');
	var pageInfo = document.getElementById('cs-flipbook-page');
	var loading  = container.querySelector('.cs-flipbook__loading');

	function showError(msg) {
		console.error('Flipbook: ' + msg);
		if (loading) {
			loading.innerHTML = '<span>Unable to load the brand book. <a href="' + pdfUrl + '" target="_blank" style="color:var(--cs-accent,#2AB473);text-decoration:underline;">Download PDF</a> instead.</span>';
		}
	}

	// Check dependencies.
	if (typeof pdfjsLib === 'undefined') {
		showError('PDF.js library not loaded.');
		return;
	}
	if (typeof St === 'undefined' || typeof St.PageFlip === 'undefined') {
		showError('StPageFlip library not loaded.');
		return;
	}

	// PDF.js worker.
	pdfjsLib.GlobalWorkerOptions.workerSrc =
		'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

	/**
	 * Render a single PDF page to a canvas element.
	 */
	function renderPage(page, scale) {
		var viewport = page.getViewport({ scale: scale });
		var canvas   = document.createElement('canvas');
		var ctx      = canvas.getContext('2d');

		canvas.width  = viewport.width;
		canvas.height = viewport.height;
		canvas.className = 'cs-flipbook__page';

		return page.render({ canvasContext: ctx, viewport: viewport }).promise.then(function () {
			return canvas;
		});
	}

	/**
	 * Calculate scale so pages fit the container width.
	 */
	function calcScale(pdfPage, containerWidth, isPortrait) {
		var viewport    = pdfPage.getViewport({ scale: 1 });
		var targetWidth = isPortrait ? containerWidth : containerWidth / 2;
		targetWidth     = Math.min(targetWidth, 700);
		return targetWidth / viewport.width;
	}

	/**
	 * Main init — called when section scrolls into view.
	 */
	function init() {
		var loadingTask = pdfjsLib.getDocument(pdfUrl);

		loadingTask.promise.then(function (pdf) {
			var totalPages = pdf.numPages;

			if (totalPages === 0) {
				showError('PDF has no pages.');
				return;
			}

			// Determine portrait vs spread mode.
			var containerWidth = wrapper.clientWidth || 800;
			var isPortrait     = containerWidth < 700;

			// Get first page to calculate dimensions.
			pdf.getPage(1).then(function (firstPage) {
				var scale     = calcScale(firstPage, containerWidth, isPortrait);
				var viewport  = firstPage.getViewport({ scale: scale });
				var pageWidth  = Math.round(viewport.width);
				var pageHeight = Math.round(viewport.height);

				// Render all pages sequentially.
				var pagePromises = [];
				for (var i = 1; i <= totalPages; i++) {
					pagePromises.push(
						(function (pageNum) {
							return pdf.getPage(pageNum).then(function (page) {
								return renderPage(page, scale);
							});
						})(i)
					);
				}

				Promise.all(pagePromises).then(function (canvases) {
					// Hide loading.
					if (loading) loading.style.display = 'none';

					// Build page wrapper divs for StPageFlip.
					canvases.forEach(function (canvas, idx) {
						var pageDiv = document.createElement('div');
						pageDiv.className = 'cs-flipbook__page-wrapper';
						// First and last pages are "hard" covers.
						if (idx === 0 || idx === canvases.length - 1) {
							pageDiv.setAttribute('data-density', 'hard');
						}
						pageDiv.appendChild(canvas);
						wrapper.appendChild(pageDiv);
					});

					// Init StPageFlip.
					var flipBook = new St.PageFlip(wrapper, {
						width:            pageWidth,
						height:           pageHeight,
						size:             'stretch',
						maxShadowOpacity: 0.3,
						showCover:        true,
						usePortrait:      isPortrait,
						flippingTime:     800,
						drawShadow:       true,
						autoSize:         true,
						mobileScrollSupport: false
					});

					flipBook.loadFromHTML(wrapper.querySelectorAll('.cs-flipbook__page-wrapper'));

					// Page indicator.
					function updatePageInfo() {
						var current = flipBook.getCurrentPageIndex() + 1;
						pageInfo.textContent = 'Page ' + current + ' of ' + totalPages;
					}
					flipBook.on('flip', updatePageInfo);
					updatePageInfo();

					// Navigation buttons.
					prevBtn.addEventListener('click', function () { flipBook.flipPrev(); });
					nextBtn.addEventListener('click', function () { flipBook.flipNext(); });

					// Keyboard navigation (only when in viewport).
					document.addEventListener('keydown', function (e) {
						var rect = container.getBoundingClientRect();
						if (rect.top > window.innerHeight || rect.bottom < 0) return;
						if (e.key === 'ArrowLeft')  flipBook.flipPrev();
						if (e.key === 'ArrowRight') flipBook.flipNext();
					});

					// Reveal controls.
					container.classList.add('cs-flipbook--ready');

				}).catch(function (err) {
					showError('Failed rendering pages: ' + err.message);
				});
			}).catch(function (err) {
				showError('Failed reading first page: ' + err.message);
			});
		}).catch(function (err) {
			showError('Failed loading PDF: ' + err.message);
		});
	}

	// Lazy-init via Intersection Observer.
	if ('IntersectionObserver' in window) {
		var observer = new IntersectionObserver(function (entries) {
			if (entries[0].isIntersecting) {
				observer.disconnect();
				init();
			}
		}, { rootMargin: '200px' });
		observer.observe(container);
	} else {
		init();
	}
})();
