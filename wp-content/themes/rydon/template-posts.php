<?php
/*
 * Template name: Posts
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header(); ?>

     <div id="main-wp-content">
            <div class="section">
               <section>
                  <div class="container">
                      
                     <div class="section-title">
                         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                         <?php the_content(); wp_link_pages(); ?>		
                         <?php endwhile; endif; ?>
                     </div>

                     <div class="row blog-list blog-masonry isotope-masonry">
                         <?php
                         $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                         $args = array(
                             'posts_per_page' => 9,
                             'paged' => $paged,
                             'order'=> 'DESC',
                             'orderby' => 'date',
                             'category_name' => 'blog'
                         );
                         $the_query = new WP_Query( $args );
                         ?>
                         <?php if ( $the_query->have_posts() ) : ?>
                         <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="col-md-4 blog-item">
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
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-4 text-left">
                           <?php next_posts_link( '<div class="ft-prev-post">' . esc_html__( 'Older Entries', 'rydon' ) . '</div>' ); wp_link_pages(); ?>
                        </div>
                        <div class="col-sm-4 text-center">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ft-back2menu"><?php esc_html_e( 'Back to menu', 'rydon' ); ?></a>
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

<?php wp_footer();?>
      
  </body>
</html>