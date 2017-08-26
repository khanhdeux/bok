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
                    <div class="row col-sm-12">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="row col-sm-12">
                        <?php the_content(); wp_link_pages(); ?>
                    </div>
                    <div class="row">
                        <?php
                        $numOfImage = get_post_meta( $post->ID, 'slider_image_count', true);

                        if($numOfImage) {
                            for ($i = 0; $i < $numOfImage; $i++) {
                                $image = get_post_meta( $post->ID, 'slider_image_' . $i, true);
                                if(!empty($image)) {
                                    ?>
                                    <div class="col-sm-2">
                                        <a href="<?php echo wp_get_attachment_image_src($image, 'full')[0]; ?>" class="slider-image thumbnail">
                                            <img src="<?php echo wp_get_attachment_image_src($image, 'thumbnail')[0]; ?>" alt="">
                                        </a>
                                    </div>
                                <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
      <?php endwhile; ?>
  </div>

<?php wp_footer();?>
      
  </body>
</html>