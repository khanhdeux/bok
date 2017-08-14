<?php
/*
 * Template name: Page Animate
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
?>

<div id="main-content">
    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
    <?php the_content(); wp_link_pages(); ?>
															
    <?php endwhile; endif; ?>
        
</div>