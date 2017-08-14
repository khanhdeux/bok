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
               <section>
                  <div class="container" id="single-container">
                      <?php the_post_thumbnail(); ?>
                  </div>
               </section>
            </div>
      
            <div class="section single-post">
               <section>
                  <div class="container container-800">
                     <article>
                        <h1 class="sp-title"><?php the_title(); ?></h1>
                        <p class="sp-info"><?php esc_html_e( 'Posted by', 'rydon' ); ?> <?php the_author(); ?> <?php esc_html_e( 'at', 'rydon' ); ?> <time><?php echo get_the_date(); ?></time></p>
                        <div class="sp-content">
                           <p><?php the_content(); wp_link_pages(); ?></p>
                        </div>
                        <div class="sp-footer">
                           <footer>
                              <div class="row">
                                 <div class="col col-sm-8">
                                    <span class="sp-tags-title"><?php esc_html_e( 'TAGS', 'rydon' ); ?></span><span class="sp-tags"><?php the_tags( '',', ' ); ?></span>
                                 </div>
                                 <div class="col col-sm-4 text-right">
                                    <span class="sp-share-title"><?php esc_html_e( 'SHARE', 'rydon' ); ?></span>
                                    <div class="social-block">
                                       <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                       <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                       <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus" ></i></a>
                                    </div>
                                 </div>
                              </div>
                           </footer>
                        </div>
                     </article>
                  </div>
               </section>
            </div>
      
      <?php endwhile; ?>

      <?php comments_template(); ?>
      
            <div id="footer" class="ft-single-post">
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-4 text-left">
                           <?php previous_post_link( '%link', '<div class="ft-prev-post">' . esc_html__( 'Previous post', 'rydon' ) . '</div>', TRUE ); ?>
                        </div>
                        <div class="col-sm-4 text-center">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>posts/" class="ft-back2blog"><?php esc_html_e( 'Back to blog', 'rydon' ); ?></a>
                        </div>
                        <div class="col-sm-4 text-right">
                           <?php next_post_link( '%link', '<div class="ft-next-post">' . esc_html__( 'Next post', 'rydon' ) . '</div>', TRUE ); ?>
                        </div>
                     </div>
                  </div>
            </div>
  </div>

<?php wp_footer();?>
      
  </body>
</html>