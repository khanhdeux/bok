/**
 * Bok google maps
 */
(function ($) {
    $.fn.googlemap = function(options) {
        if (typeof(options) === 'undefined') options = {};
        options = $.extend({}, options);

        var $container = $(this);
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };

        // Display a map on the page
        map = new google.maps.Map($container.get(0), mapOptions);
        map.setTilt(45);

        // Multiple Markers
        var markers = [
            ['Schulterblatt', 53.559349, 9.963758],
            ['Ottensen', 53.552047, 9.933102],
            ['Sternschanzen', 53.560810, 9.965407]
        ];

        // Info Window Content
        var infoWindowContent = [
            ['<div class="info_content">' +
            '<h3>Schulterblatt</h3>' +
            '<p>Schulterblatt 3. 20357 Hamburg.</p>' + '</div>'],
            ['<div class="info_content">' +
            '<h3>Ottensen</h3>' +
            '<p>Ottensener Hauptstraße 1. 22765 Hamburg</p>' +
            '</div>'],
            ['<div class="info_content">' +
            '<h3>Sternschanzen</h3>' +
            '<p>Schanzenstraße 36. 20357 Hamburg</p>' +
            '</div>']
        ];

        // Display multiple markers on a map
        var marker, i;

        // Loop through our array of markers & place each one on the map
        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });

            // Allow each marker to have an info window
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);

            // Set default open
            var infoWindow = new google.maps.InfoWindow();
            infoWindow.setContent(infoWindowContent[i][0]);
            infoWindow.open(map, marker);
        }

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function (event) {
            this.setZoom(13);
            google.maps.event.removeListener(boundsListener);
        });
    }
}(jQuery));