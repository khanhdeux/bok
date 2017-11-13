<?php
/*
 * About us
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header('bok'); ?>
<div id="main-bok-content" class="about-us">
    <div class="row bok-restaurant-top">
        <img src="<?php echo esc_url( plugins_url( BOK__PLUGIN_NAME . '/images/restaurant.png') ); ?>" width="100%" />
        <div class="welcome-text">Über uns</div>
    </div>
    <div class="row about-us-description"">
        Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll Wörter nahm und diese durcheinander warf um ein Musterbuch zu erstellen. Es hat nicht nur 5 Jahrhunderte überlebt, sondern auch in Spruch in die elektronische Schriftbearbeitung geschafft (bemerke, nahezu unverändert). Bekannt wurde es 1960, mit dem erscheinen von "Letraset", welches Passagen von Lorem Ipsum enhielt, so wie Desktop Software wie "Aldus PageMaker" - ebenfalls mit Lorem Ipsum.
    </div>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="section single-post">
            <section>
                <div class="container container-800">
                    <?php $loop = new WP_Query( array( 'post_type' => 'story', 'posts_per_page' => 10 ) ); $count = 0; ?>

                    <?php while ( $loop->have_posts() ) : $loop->the_post();
                        $count++;
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?php if ( ($count % 2) == 0 ) : ?>
                                    <a class="thumbnail" href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php endif; ?>
                                    </a>
                                <?php else: ?>
                                    <?php the_content() ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <?php if ( ($count % 2) == 0 ) : ?>
                                    <?php the_content() ?>
                                <?php else: ?>
                                    <a class="thumbnail" href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            </section>
        </div>
    <?php endwhile; ?>
</div>

<?php wp_footer();?>

</body>
</html>