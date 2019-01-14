;(function($){
	"use strict";

	$(document).ready(function() {

		/*
		Find the Latitude and Longitude of your address:
			- http://itouchmap.com/latlong.html
			- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
			- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

		Find settings explained:
			- https://github.com/marioestrada/jQuery-gMap

		*/

		// Map Markers
		var mapMarkers = [{
			address: "Stationsweg 32, 3214 VK, Zuidland",
			latitude: 51.8285444,
			longitude: 4.2552573,
			icon: {
				image: "images/map-marker.png",
				iconsize: [32, 39], // w, h
				iconanchor: [13, 39] // x, y
			},
			html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Minekus B.V.</span></h4><p class="nobottommargin"><span style="line-height:1.4;">Stationsweg 32, 3214 VK, Zuidland</span></p></div>',
		}];

		// Map Color Scheme - more styles here http://snazzymaps.com/
		var mapStyles = [
		    {
		        "featureType": "landscape",
		        "stylers": [
							{
									"color": "#fff4d9"
							}
		        ]
		    },
		    {
		        "featureType": "road.local",
		        "stylers": [
		            {
		                "saturation": -100
		            },
		            {
		                "lightness": 40
		            },
		            {
		                "visibility": "on"
		            }
		        ]
		    },
		    {
		        "featureType": "transit",
		        "stylers": [
		            {
		                "saturation": -100
		            },
		            {
		                "visibility": "simplified"
		            }
		        ]
		    },
		    {
		        "featureType": "administrative.province",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "water",
		        "stylers": [
		            {
		                "visibility": "on"
		            },
		            {
		                "lightness": 30
		            }
		        ]
		    },
		    {
		        "featureType": "road.highway",
		        "elementType": "geometry.fill",
		        "stylers": [
		            {
		                "color": "#ef8c25"
		            },
		            {
		                "lightness": 40
		            }
		        ]
		    },
		    {
		        "featureType": "road.highway",
		        "elementType": "geometry.stroke",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "poi.park",
		        "elementType": "geometry.fill",
		        "stylers": [
		            {
		                "color": "#b6c54c"
		            },
		            {
		                "lightness": 40
		            },
		            {
		                "saturation": -40
		            }
		        ]
		    },
		    {}
		];

		// Map Initial Location
		var initLatitude = 51.8505444;
		var initLongitude = 4.2552573;

		// Map Extended Settings
		var map = jQuery(".th-google_map").gMap({
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: true,
				overviewMapControl: true
			},
			scrollwheel: false,
			markers: mapMarkers,
			latitude: initLatitude,
			longitude: initLongitude,
			zoom: 11,
			style: mapStyles,
			draggable: Modernizr.touch ? false : true
		});

	});// end of document ready

})(jQuery);
