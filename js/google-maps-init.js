/**
 * Google Maps Initialization
 *
 * Extracted from template-contact.php inline script.
 * Initializes a styled Google Map with a custom marker.
 */
function initMap() {
	'use strict';

	var location = { lat: 51.8417, lng: -1.3610 };

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 10,
		center: location,
		styles: [
			{ elementType: 'geometry', stylers: [{ color: '#f5f5f5' }] },
			{ elementType: 'labels.icon', stylers: [{ visibility: 'on' }] },
			{ elementType: 'labels.text.fill', stylers: [{ color: '#616161' }] },
			{ elementType: 'labels.text.stroke', stylers: [{ color: '#f5f5f5' }] },
			{ featureType: 'administrative.land_parcel', elementType: 'labels.text.fill', stylers: [{ color: '#eeeeee' }] },
			{ featureType: 'poi', elementType: 'geometry', stylers: [{ color: '#eeeeee' }] },
			{ featureType: 'poi', elementType: 'labels.text.fill', stylers: [{ color: '#757575' }] },
			{ featureType: 'poi.park', elementType: 'geometry', stylers: [{ color: '#e5e5e5' }] },
			{ featureType: 'poi.park', elementType: 'labels.text.fill', stylers: [{ color: '#9e9e9e' }] },
			{ featureType: 'road', elementType: 'geometry', stylers: [{ color: '#ffffff' }] },
			{ featureType: 'road.arterial', elementType: 'labels.text.fill', stylers: [{ color: '#757575' }] },
			{ featureType: 'road.highway', elementType: 'geometry', stylers: [{ color: '#dadada' }] },
			{ featureType: 'road.highway', elementType: 'labels.text.fill', stylers: [{ color: '#616161' }] },
			{ featureType: 'road.local', elementType: 'labels.text.fill', stylers: [{ color: '#9e9e9e' }] },
			{ featureType: 'transit.line', elementType: 'geometry', stylers: [{ color: '#e5e5e5' }] },
			{ featureType: 'transit.station', elementType: 'geometry', stylers: [{ color: '#eeeeee' }] },
			{ featureType: 'water', elementType: 'geometry', stylers: [{ color: '#c9c9c9' }] },
			{ featureType: 'water', elementType: 'labels.text.fill', stylers: [{ color: '#9e9e9e' }] }
		]
	});

	new google.maps.Marker({
		position: location,
		map: map,
		icon: {
			path: 'M24 0C14.06 0 6 8.06 6 18c0 10.5 17.25 30 18 30s18-19.5 18-30C42 8.06 33.94 0 24 0zm0 27a9 9 0 1 1 0-18 9 9 0 0 1 0 18z',
			fillColor: '#000000',
			fillOpacity: 1,
			strokeWeight: 0,
			scale: 1.8,
			anchor: new google.maps.Point(50, 74),
			labelOrigin: new google.maps.Point(24, 15)
		},
		label: {
			text: '\u25CF',
			color: '#FFA500',
			fontSize: '75px'
		}
	});
}
