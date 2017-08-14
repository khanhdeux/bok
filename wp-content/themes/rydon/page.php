<?php
/*
 * The template for displaying pages
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header(); ?>

<div id="main-wp-content" class="f">
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
    <?php the_content(); wp_link_pages(); ?>
															
    <?php endwhile; endif; ?>
    
    <div id="footer" class="ft-single-post">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-left">
                </div>
                <div class="col-sm-4 text-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ft-back2menu"><?php esc_html_e( 'Back to menu', 'rydon' ); ?></a>
                </div>
                <div class="col-sm-4 text-right">
                </div>
            </div>
        </div>
    </div>
        
</div>

<?php get_footer(); ?>