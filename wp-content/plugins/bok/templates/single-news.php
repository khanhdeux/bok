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
                        <?php the_content(); wp_link_pages(); ?>
                    </div>
                </div>
            </div>
      <?php endwhile; ?>
  </div>

<?php wp_footer();?>
      
  </body>
</html>