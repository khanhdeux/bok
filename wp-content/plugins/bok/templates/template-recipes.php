<?php
/*
 * About us
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header('bok'); ?>
<div id="main-bok-content">
    <div class="row bok-restaurant-top">
        <img src="<?php echo esc_url( plugins_url( BOK__PLUGIN_NAME . '/images/restaurant.png') ); ?>" width="100%" />
        <div class="top-header">Rezepte</div>
    </div>
    <div class="container container-800">
        <div class="row description">
            <p><strong>We'll keep you posted</strong></p>
            <p>Follow us on the latest news, promotions and a few surprises along the way</p>
        </div>

        <section class="videoSlider slider" data-sizes="50vw">
            <?php $loop = new WP_Query( array( 'post_type' => 'recipe', 'posts_per_page' => 10 ) );  $count = 0; ?>

            <?php while ( $loop->have_posts() ) : $loop->the_post(); $count++; ?>
                <div class="">
                    <a href="#" id='video<?php echo $count; ?>' class='youtubeModal thumbnail' data-id="<?php echo get_post_meta( $post->ID, 'recipe_video_id', true) ;?>">
                        <img data-lazy="<?php the_post_thumbnail_url('full'); ?>" data-srcset="<?php the_post_thumbnail_url('full'); ?>" data-sizes="100vw">
                    </a>
                </div>
            <?php endwhile; ?>
        </section>
    </div>
</div>

<?php get_footer('bok'); ?>

</body>
</html>