<?php
/*
 * The template for displaying all single posts and attachments
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header(); ?>

  <div id="main-wp-content">
      
      <?php while ( have_posts() ) : the_post(); ?>
            <div class="section" id="single-section">
                <div class="container container-800">
                    <div class="row">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="row">
                        <div class="news">
                            <div class="thumbnail-left media-top">
                                <a class="thumbnail" href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <img class="media-object" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title_attribute(); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="news-body">
                                <?php the_content() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <?php endwhile; ?>
  </div>

<?php wp_footer();?>
      
  </body>
</html>