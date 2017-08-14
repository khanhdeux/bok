<?php
/**
 * The template for displaying search results pages
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header(); ?>

     <div id="main-wp-content">
            <div class="section">
               <section>
                  <div class="container-bar">

                     <div class="row blog-list blog-masonry isotope-masonry" <?php post_class(); ?>>
                         <?php if ( have_posts() ) : ?>
                         <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-sm-6 col-md-4 blog-item isotope-item">
                           <div class="blog-image">
                              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                           </div>
                           <div class="blog-body">
                              <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                              <p class="blog-info"><?php esc_html_e( 'Posted by', 'rydon' ); ?> <?php the_author(); ?> <?php esc_html_e( 'at', 'rydon' ); ?> <time><?php echo get_the_date(); ?></time></p>
                              <div class="blog-excerpt">
                                 <p><?php the_excerpt(); ?></p>
                              </div>
                              <a href="<?php the_permalink(); ?>" class="btn btn-default blog-readmore"><?php esc_html_e( 'Read more', 'rydon' ); ?></a>
                           </div>
                        </div>
                         <?php endwhile; ?>
                     </div>
                      
                  </div>
               </section>
            </div>

            <div id="footer" class="ft-single-post">
                  <div class="container-bar">
                     <div class="row">
                        <div class="col-sm-4 text-left">
                           <?php next_posts_link( '<div class="ft-prev-post">' . esc_html__( 'Older Entries', 'rydon' ) . '</div>' ); wp_link_pages(); ?>
                        </div>
                        <div class="col-sm-4 text-center">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>posts/" class="ft-back2blog"><?php esc_html_e( 'Go to blog', 'rydon' ); ?></a>
                        </div>
                        <div class="col-sm-4 text-right">
                           <?php previous_posts_link( '<div class="ft-next-post">' . esc_html__( 'Newer Entries', 'rydon' ) . '</div>' ); wp_link_pages(); ?>
                        </div>
                     </div>
                  </div>
            </div>
      
            <?php wp_reset_postdata(); ?>
            <?php else:  ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'rydon' ); ?></p>
            <?php endif; ?>
         
     </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>