<?php
/*
 * The template for displaying all single posts and attachments
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header('bok'); ?>
  <div id="main-bok-content">
      <?php while ( have_posts() ) : the_post(); ?>
            <div class="section" id="single-section">
                <div class="container">
                    <div class="row">
                        <div class="news col-sm-10">
                            <h2><?php the_title(); ?></h2>
                            <div>
                                <?php echo get_the_date(); ?> <?php echo get_the_time(); ?>
                            </div>
                            <div class="_thumbnail media-top">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                            </div>
                            <div class="news-body">
                                <?php the_content() ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <?php $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 10 ) ); ?>

                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <div class="row">
                                    <a class="_thumbnail" href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title_attribute(); ?>" />
                                        <?php endif; ?>
                                    </a>
                                    <h4><?php the_title() ?></h4>
                                    <div>
                                        <?php echo get_the_date(); ?> <?php echo get_the_time(); ?>
                                    </div>
                                    <hr />
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
      <?php endwhile; ?>
  </div>

<?php get_footer('bok'); ?>

    </body>
</html>