<?php
/*
 * Template name: Restaurant
 *
 * Author: Quoc Khanh Nguyen
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
?>
<style>
    #map_wrapper {
        height: 400px;
    }

    #map_canvas {
        width: 100%;
        height: 100%;
    }
</style>

<div id="main-wp-content" class="restaurant f">
    <div class="container">
        <div class="row text-center">
            <h2>Unsere Restaurants</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php $loop = new WP_Query( array( 'post_type' => 'restaurant', 'posts_per_page' => 10 ) ); ?>

            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="col-sm-4">
                    <p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></p>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </div>

            <?php endwhile; ?>
        </div>
     </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="map_wrapper">
                    <div id="map_canvas" class="mapping"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        function initializeMap() {
            var map;
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                mapTypeId: 'roadmap'
            };

            // Display a map on the page
            map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
            map.setTilt(45);

            // Multiple Markers
            var markers = [
                ['Schulterblatt', 53.559349,9.963758],
                ['Ottensen', 53.552047,9.933102],
                ['Sternschanzen', 53.560810,9.965407]
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
            for( i = 0; i < markers.length; i++ ) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]
                });

                // Allow each marker to have an info window
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
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
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                this.setZoom(13);
                google.maps.event.removeListener(boundsListener);
            });
        }

        $(document).ready(function() {
            initializeMap();
        });
    </script>
</div>