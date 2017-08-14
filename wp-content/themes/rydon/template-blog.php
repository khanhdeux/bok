<?php
/*
 * Template name: Blog
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
?>

     <div id="main-content">

            <div class="section st-padding-lg">
               <section>
                  <div class="container">
                      
                     <div class="section-title">
                         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                         <?php the_content(); wp_link_pages(); ?>		
                         <?php endwhile; endif; ?>
                     </div>

                     <div class="row blog-list blog-masonry isotope-masonry">
                        <?php
                         $args = array(
                             'posts_per_page' => 6,
                             'paged' => $paged,
                             'order'=> 'DESC',
                             'orderby' => 'date',
                             'category_name' => 'blog'
                         );
                         $postslist = get_posts( $args );
                         foreach ( $postslist as $post ) :
                           setup_postdata( $post ); ?> 
                        <div class="col-md-4 blog-item">
                           <div class="blog-image">
                              <a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail(); ?></a>
                           </div>
                           <div class="blog-body">
                              <h3 class="blog-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3>
                              <p class="blog-info"><?php esc_html_e( 'Posted by', 'rydon' ); ?> <?php the_author(); ?> <?php esc_html_e( 'at', 'rydon' ); ?> <time><?php echo get_the_date(); ?></time></p>
                              <div class="blog-excerpt">
                                 <p><?php the_excerpt(); ?></p>
                              </div>
                              <a href="<?php the_permalink(); ?>" class="btn btn-default blog-readmore"><?php esc_html_e( 'Read more', 'rydon' ); ?></a>
                           </div>
                        </div>
                        <?php
                        endforeach; 
                        wp_reset_postdata();
                        ?>
                     </div>
                      <a href="<?php echo esc_url( home_url( '/' ) ); ?>posts/" class="btn btn-default btn-tall btn-fullwidth"><?php esc_html_e( 'Go to blog', 'rydon' ); ?></a>

                  </div>
               </section>
            </div>
         
     </div>