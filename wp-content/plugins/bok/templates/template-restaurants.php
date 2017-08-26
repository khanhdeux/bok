<?php
/**
 * Template Name: Restaurant
 *
 *
 * @package PTE
 * @since 	1.0.0
 * @version	1.0.0
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
    <div class="container container-800">
        <div class="row text-center">
            <h2>Unsere Restaurants</h2>
        </div>
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
        <div class="row">
            <div class="col-sm-12">
                <div id="map_wrapper">
                    <div id="map_canvas" class="mapping"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#map_canvas').googlemap();
        });
    </script>
</div>