<?php
/**
 * Template Name: News
 *
 *
 * @package PTE
 * @since 	1.0.0
 * @version	1.0.0
 */
get_header('bok'); ?>
<div id="main-bok-content" class="news">
    <div class="row bok-restaurant-top">
        <img src="<?php echo esc_url( plugins_url( BOK__PLUGIN_NAME . '/images/restaurant.png') ); ?>" width="100%" />
        <div class="top-header">Nachrichten</div>
    </div>
    <div class="container container-800">
        <div class="row description">
            <p><strong>We'll keep you posted</strong></p>
            <p>Follow us on the latest news, promotions and a few surprises along the way</p>
        </div>
    </div>
    <div class="container container-800">
        <div class="row text-center">
            <h2>Neuigkeiten</h2>
        </div>

        <?php $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 10 ) ); $count = 0; ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post();
            $count++;
         ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="news">
                                <div class="thumbnail-<?php echo ((($count % 2) == 0 ) ? "right" : "left"); ?> media-top">
                                    <a class="thumbnail" href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <img class="media-object" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="text-justify">
                                    <h4 class="media-heading"><?php the_title() ?></h4>
                                    <?php the_content() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</div>
<?php wp_footer();?>

</body>
</html>