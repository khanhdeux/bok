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
          <section class="restaurantSlider slider" data-sizes="50vw">
              <?php
              $numOfImage = get_post_meta( $post->ID, 'slider_image_count', true);

              if($numOfImage) {
                  for ($i = 0; $i < $numOfImage; $i++) {
                      $image = get_post_meta( $post->ID, 'slider_image_' . $i, true);
                      if(!empty($image)) {
                          ?>
                          <div class="">
                              <a href="<?php echo wp_get_attachment_image_src($image, 'full')[0]; ?>" class="slider-image thumbnail">
                                  <img src="<?php echo wp_get_attachment_image_src($image, 'full')[0]; ?>" alt="">
                              </a>
                          </div>
                      <?php
                      }
                  }
              }
              ?>
          </section>
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
                            <?php if ( get_post_meta( $post->ID, 'telephone', true) ) : ?>
                            <p>Anruf: <?php echo get_post_meta( $post->ID, 'telephone', true) ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo get_site_url() . '/reservation?r=' . strtolower(get_the_title()); ?>">Restaurants ansehen ></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div id="accordion">
                                <?php if ( get_post_meta( $post->ID, 'restaurant_day_menu', true)  ) : ?>
                                    <?php if (!get_post_meta( $post->ID, 'restaurant_day_menu', true) &&  !get_post_meta( $post->ID, 'restaurant_evening_menu', true)) : ?>
                                        <?php echo get_post_meta( $post->ID, 'restaurant_day_menu', true) ?>
                                    <?php else: ?>
                                        <h3>Mittag</h3>
                                        <div>
                                            <?php echo get_post_meta( $post->ID, 'restaurant_day_menu', true) ?>
                                        </div>
                                        <h3>Abend</h3>
                                        <div>
                                            <?php echo get_post_meta( $post->ID, 'restaurant_evening_menu', true) ?>
                                        </div>
                                        <h3>Getränke</h3>
                                        <div>
                                            <?php echo get_post_meta( $post->ID, 'restaurant_lunch_menu', true) ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
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