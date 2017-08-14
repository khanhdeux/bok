<?php
/*
 * The template for displaying 404 pages (not found)
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header(); ?>

            <div class="section st-padding-lg">
               <section>
                  <div class="container">
                      
                     <div class="section-title">
                         <h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rydon' ); ?></h2>
                     </div>
                     <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default btn-tall btn-fullwidth"><?php esc_html_e( 'Back to menu', 'rydon' ); ?></a>

                  </div>
               </section>
            </div>

<?php get_footer(); ?>