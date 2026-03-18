/**
 * Video player toggle – shows video on play button click.
 *
 * Supports both YouTube iframes (videoPlayer) and HTML5 video (videoPlayer02).
 * Replaces inline scripts from template-services.php.
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var playButton = document.getElementById('playButton');
		if (!playButton) return;

		playButton.addEventListener('click', function (e) {
			e.preventDefault();

			var videoText = document.getElementById('videoText');
			if (videoText) videoText.style.display = 'none';

			// YouTube iframe player.
			var videoPlayer = document.getElementById('videoPlayer');
			var iframe = document.getElementById('youtubeIframe');
			if (videoPlayer && iframe) {
				videoPlayer.style.display = 'block';
				if (iframe.src.indexOf('autoplay=0') !== -1) {
					iframe.src = iframe.src.replace('autoplay=0', 'autoplay=1');
				}
			}

			// HTML5 video player.
			var videoPlayer02 = document.getElementById('videoPlayer02');
			if (videoPlayer02) {
				videoPlayer02.style.display = 'block';
				var video = videoPlayer02.querySelector('video');
				if (video) video.play();
			}
		});
	});
})();
