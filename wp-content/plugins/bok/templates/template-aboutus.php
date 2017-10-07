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
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="section single-post">
            <section>
                <div class="container container-800">
                    <div class="row text-center">
                        <h2>Über uns</h2>
                    </div>
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