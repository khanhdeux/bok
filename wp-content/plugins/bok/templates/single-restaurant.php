<?php
/*
 * The template for displaying all single posts and attachments
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header('bok'); ?>
  <div id="main-bok-content" class="single-restaurant">
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
                              <a href="<?php echo wp_get_attachment_image_src($image, 'full')[0]; ?>" class="slider-image _thumbnail">
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
            <div id="single-restaurant">
                <div class="container container-800 text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo get_post_meta( $post->ID, 'restaurant_description', true) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <p><?php echo get_post_meta( $post->ID, 'restaurant_address', true) ?></p>
                         </div>
                        <div class="col-sm-6 text-right telephone">
                            <?php if ( get_post_meta( $post->ID, 'telephone', true) ) : ?>
                            <p>Anruf: <?php echo get_post_meta( $post->ID, 'telephone', true) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php
                        $dayMenu =  get_post_meta( $post->ID, 'restaurant_day_menu', true);
                        $eveningMenu =  get_post_meta( $post->ID, 'restaurant_evening_menu', true);
                        $lunchMenu =  get_post_meta( $post->ID, 'restaurant_lunch_menu', true);

                        $count = 0;
                        $count += ($dayMenu) ? 1 : 0;
                        $count += ($eveningMenu) ? 1 : 0;
                        $count += ($lunchMenu) ? 1 : 0;
                    ?>

                    <?php if ($count) : ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php if ($count > 1) : ?>
                                    <div id="accordion">
                                        <?php if ( $dayMenu ) : ?>
                                            <?php if (!$dayMenu &&  !$eveningMenu) : ?>
                                                <?php echo $dayMenu; ?>
                                            <?php else: ?>
                                                <h3>Mittag</h3>
                                                <div>
                                                    <?php echo $dayMenu; ?>
                                                </div>
                                                <h3>Abend</h3>
                                                <div>
                                                    <?php echo $eveningMenu; ?>
                                                </div>
                                                <h3>Getränke</h3>
                                                <div>
                                                    <?php echo $lunchMenu; ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="restaurant-menu">
                                        <?php echo $dayMenu ?: ($eveningMenu ? ($lunchMenu ?: '') : ''); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
      <?php endwhile; ?>
  </div>

<?php get_footer('bok'); ?>
      
  </body>
</html>