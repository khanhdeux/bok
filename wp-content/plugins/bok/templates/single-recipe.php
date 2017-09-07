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
                <div class="container container-800">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2><?php the_title(); ?></h2>
                            <div class="thumbnail-left media-top">
                                <a class="thumbnail" href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <img class="media-object" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="text-justify">
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