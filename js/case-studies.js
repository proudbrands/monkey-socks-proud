/**
 * Case Studies — Chart.js + Counter Animations
 * Handles: Chart.js rendering, scroll-triggered counter animation
 */
(function () {
	'use strict';

	// ─── Chart.js Brand Palette ───
	var brandColors = {
		green: '#2AB473',
		lime: '#8CC63F',
		yellow: '#FEF100',
		orange: '#FBAF42',
		redOrange: '#F06522',
		cyan: '#44C6EF',
		white: '#ffffff',
		muted: '#767676',
		grid: 'rgba(255,255,255,0.08)',
		gridLine: 'rgba(255,255,255,0.1)',
	};

	var chartColorCycle = [
		brandColors.green,
		brandColors.cyan,
		brandColors.lime,
		brandColors.orange,
		brandColors.yellow,
		brandColors.redOrange,
	];

	// ─── Init Charts on Scroll ───
	var chartCanvases = document.querySelectorAll('canvas[data-chart-type]');
	var chartInitialized = {};

	if (chartCanvases.length > 0 && typeof Chart !== 'undefined') {
		Chart.defaults.color = brandColors.muted;
		Chart.defaults.font.family = "'Overpass', sans-serif";

		var chartObserver = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					var canvas = entry.target;
					var id = canvas.id;
					if (!chartInitialized[id]) {
						chartInitialized[id] = true;
						initChart(canvas);
					}
				}
			});
		}, { threshold: 0.3 });

		chartCanvases.forEach(function (canvas) {
			chartObserver.observe(canvas);
		});
	}

	function initChart(canvas) {
		var type = canvas.getAttribute('data-chart-type');
		var labels = JSON.parse(canvas.getAttribute('data-chart-labels') || '[]');
		var values = JSON.parse(canvas.getAttribute('data-chart-values') || '[]');
		var fill = canvas.hasAttribute('data-chart-fill');

		var ctx = canvas.getContext('2d');

		var gradient = ctx.createLinearGradient(0, 0, 0, canvas.height || 400);
		gradient.addColorStop(0, 'rgba(42, 180, 115, 0.4)');
		gradient.addColorStop(1, 'rgba(42, 180, 115, 0.02)');

		var config = {
			type: type,
			data: {
				labels: labels,
				datasets: [{
					data: values,
					borderColor: brandColors.green,
					backgroundColor: type === 'bar'
						? chartColorCycle.slice(0, values.length)
						: (fill ? gradient : 'transparent'),
					borderWidth: type === 'bar' ? 0 : 3,
					pointBackgroundColor: brandColors.green,
					pointBorderColor: brandColors.green,
					pointRadius: type === 'bar' ? 0 : 5,
					pointHoverRadius: type === 'bar' ? 0 : 7,
					tension: 0.4,
					fill: fill,
					borderRadius: type === 'bar' ? 8 : 0,
					barPercentage: 0.6,
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: true,
				animation: {
					duration: 1200,
					easing: 'easeOutQuart',
				},
				plugins: {
					legend: { display: false },
					tooltip: {
						backgroundColor: 'rgba(21,21,21,0.95)',
						titleColor: brandColors.white,
						bodyColor: brandColors.green,
						titleFont: { size: 13, weight: '600' },
						bodyFont: { size: 16, weight: '700' },
						padding: 12,
						cornerRadius: 8,
						displayColors: false,
					}
				},
				scales: {
					x: {
						grid: {
							color: brandColors.gridLine,
							drawBorder: false,
						},
						ticks: {
							color: brandColors.muted,
							font: { size: 12 },
						}
					},
					y: {
						grid: {
							color: brandColors.gridLine,
							drawBorder: false,
						},
						ticks: {
							color: brandColors.muted,
							font: { size: 12 },
						},
						beginAtZero: true,
					}
				}
			}
		};

		new Chart(ctx, config);
	}


	// ─── Counter Animation ───
	var counters = document.querySelectorAll('.cs-results__count');
	var counterAnimated = {};

	if (counters.length > 0) {
		var counterObserver = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					var el = entry.target;
					var key = el.getAttribute('data-target');
					if (!counterAnimated[key + '-' + Array.from(counters).indexOf(el)]) {
						counterAnimated[key + '-' + Array.from(counters).indexOf(el)] = true;
						animateCounter(el);
					}
				}
			});
		}, { threshold: 0.5 });

		counters.forEach(function (counter) {
			counterObserver.observe(counter);
		});
	}

	function animateCounter(el) {
		var target = parseFloat(el.getAttribute('data-target'));
		if (isNaN(target)) return; // Skip text-only values
		var duration = 2000;
		var start = 0;
		var startTime = null;
		var isDecimal = target % 1 !== 0;

		function step(timestamp) {
			if (!startTime) startTime = timestamp;
			var progress = Math.min((timestamp - startTime) / duration, 1);
			// Ease out cubic
			var eased = 1 - Math.pow(1 - progress, 3);
			var current = start + (target - start) * eased;

			if (isDecimal) {
				el.textContent = current.toFixed(1);
			} else {
				el.textContent = Math.floor(current).toLocaleString();
			}

			if (progress < 1) {
				requestAnimationFrame(step);
			} else {
				if (isDecimal) {
					el.textContent = target.toFixed(1);
				} else {
					el.textContent = target.toLocaleString();
				}
			}
		}

		requestAnimationFrame(step);
	}

})();
