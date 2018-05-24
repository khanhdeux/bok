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
        <img src="<?php echo esc_url( plugins_url( BOK__PLUGIN_NAME . '/images/news-cover.png') ); ?>" width="100%" />
        <div class="top-header">Unsere Neuigkeiten</div>
    </div>
    <div class="container container-800">
        <div class="row description">
            <p><strong>We'll keep you posted</strong></p>
            <p>Follow us on the latest news, promotions and a few surprises along the way</p>
        </div>
    </div>
    <div class="container" style="width: 100%">
        <?php $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 10 ) ); $count = 0; ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php if ($count %2 == 0) : ?>
                <div class="row bok-news-row">
            <?php endif; ?>
                    <div class="col-sm-6 bok-news-col">
                        <a href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" />
                            <?php endif; ?>
                        </a>
                        <div class="text-center">
                            <h4><?php the_title() ?></h4>
                            <div><a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Mehr</a></div>
                        </div>
                    </div>
            <?php if ($count %2 != 0) : ?>
                </div>
            <?php endif; ?>
        <?php $count++; ?>
        <?php endwhile; ?>
    </div>
</div>
<?php wp_footer();?>

</body>
</html>