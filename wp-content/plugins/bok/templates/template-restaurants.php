<?php
/**
 * Template Name: Restaurant
 *
 *
 * @package PTE
 * @since 	1.0.0
 * @version	1.0.0
 */
get_header('bok'); ?>

<div id="main-bok-content">
    <div class="row bok-restaurant-top">
        <img src="<?php echo esc_url( plugins_url( BOK__PLUGIN_NAME . '/images/restaurant-cover.png') ); ?>" width="100%" />
        <div class="welcome-text">willkommen <br/> bei Bok</div>
    </div>
    <div class="row">
        <?php $loop = new WP_Query( array( 'post_type' => 'restaurant', 'posts_per_page' => 10, 'order' => 'ASC') ); $count = 0; ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php $count++ ?>
            <div class="row equal bok-restaurant-row">
                <?php if ( ($count % 2) != 0 ) : ?>
                    <div class="col-sm-6 col-full col-center">
                        <img width="100%" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                    </div>
                    <div class="col-sm-6 col-full col-center">
                        <h3><?php the_title() ?></h3>
                        <p><?php the_content(); ?></p>
                        <div><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">mehr</a></div>
                    </div>
                <?php else: ?>
                    <?php for($i=0; $i<2; $i++) { ?>
                        <?php if ( ($i % 2) != 0 ) : ?>
                            <div class="col-sm-6 col-full col-center desktop">
                                <h3><?php the_title() ?></h3>
                                <p><?php the_content(); ?></p>
                                <div><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">mehr</a></div>
                            </div>
                            <div class="col-sm-6 col-full col-center desktop">
                                <img width="100%" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                            </div>
                        <?php else: ?>
                            <div class="col-sm-6 col-full col-center mobile">
                                <img width="100%" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                            </div>
                            <div class="col-sm-6 col-full col-center mobile">
                                <h3><?php the_title() ?></h3>
                                <p><?php the_content(); ?></p>
                                <div><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">mehr</a></div>
                            </div>
                        <?php endif; ?>
                    <?php } ?>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="row">
        <div id="map_wrapper">
            <div id="map_canvas" class="mapping"></div>
        </div>
    </div>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#map_canvas').googlemap();
        });
    </script>
</div>

<?php get_footer('bok'); ?>

</body>
</html>