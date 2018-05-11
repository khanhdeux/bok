<?php
/*
 * The template for displaying the footer
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
?>

<div id="bok-footer">
    <div class="container container-800">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <h4><a href="<?php echo get_site_url() . '/restaurants'; ?>">Restaurants</a></h4> <br />
                <p><a href="<?php echo get_site_url() . '/restaurant/schulterblatt/'; ?>">Schulterblatt</a></p>
                <p><a href="<?php echo get_site_url() . '/restaurant/ottensen/'; ?>">Ottensen</a></p>
                <p><a href="<?php echo get_site_url() . '/restaurant/europapassage/'; ?>">Europa Passage</a></p>
            </div>
            <div class="col-sm-3 col-xs-6">
                <h4><a href="<?php echo get_site_url() . '/news'; ?>">Neuigkeiten</a></h4> <br />
                <?php $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 10, 'order' => 'DESC' ) ); ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                    <p><a href="<?php the_permalink(); ?>"><b><?php the_title() ?></b></a></p>
                <?php endwhile; ?>

            </div>
            <div class="col-sm-2 col-xs-6">
                <h4><a href="<?php echo get_site_url() . '/recipes'; ?>">Rezepte</a></h4>
            </div>
            <div class="col-sm-2 col-xs-6">
                <h4><a href="<?php echo get_site_url() . '/aboutus'; ?>">Über Uns</a></h4>
            </div>
            <div class="col-sm-2 col-xs-6">
                <h4><a href="http://www.boklieferservice.de/">Lieferservice</a></h4>
            </div>
        </div>
    </div>
</div>

<?php wp_footer();?>
</body>
</html>