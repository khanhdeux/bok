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
      <div class="row bok-restaurant-top">
          <img src="<?php echo esc_url( plugins_url( BOK__PLUGIN_NAME . '/images/restaurant.png') ); ?>" width="100%" />
      </div>
      <?php while ( have_posts() ) : the_post(); ?>
            <div class="section" id="single-section">
                <div class="container container-800 text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <p><?php the_content(); wp_link_pages(); ?></p>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php echo get_site_url() . '/reservation?r=' . strtolower(get_the_title()); ?>">Tisch reservieren</a>
                         </div>
                        <div class="col-sm-4">
                            <p>Anruf: +971.888.6666</p>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo get_site_url() . '/reservation?r=' . strtolower(get_the_title()); ?>">Restaurants ansehen ></a>
                        </div>
                    </div>
                    <div class="row slider">
                        <?php
                        $numOfImage = get_post_meta( $post->ID, 'slider_image_count', true);

                        if($numOfImage) {
                            for ($i = 0; $i < $numOfImage; $i++) {
                                $image = get_post_meta( $post->ID, 'slider_image_' . $i, true);
                                if(!empty($image)) {
                                    ?>
                                    <div class="col-sm-4 col-md-2 mx150 pull-left">
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

                    <div class="row">
                        <div class="col-sm-12">
                            <div id="accordion">
                                <h3>Mittag</h3>
                                <div>
                                    <?php echo get_post_meta( $post->ID, 'restaurant_day_menu', true) ?>
                                </div>
                                <h3>Abend</h3>
                                <div>
                                    <?php echo get_post_meta( $post->ID, 'restaurant_evening_menu', true) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <?php endwhile; ?>
  </div>

<?php get_footer('bok'); ?>
      
  </body>
</html>