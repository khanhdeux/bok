<?php
/*
 * Reservation
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header(); ?>

<a href="<?php echo get_site_url() . '/restaurant/' . strtolower($_GET['r']); ?>" class="back"><div id="a_back"><span><?php echo $rydon_option['text-back-menu']; ?></span><i class="fa fa-bars"></i></div></a>
<div id="main-wp-content">

    <?php while ( have_posts() ) : the_post(); ?>
        <div class="section single-post">
            <section>
                <div class="container container-800">
                    <div class="row text-center">
                        <h2>Tisch reservieren</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php the_content(); wp_link_pages(); ?>
                        </div>
                        <div class="col-sm-6 text-right top20">
                            <?php $loop = new WP_Query( array( 'post_type' => 'restaurant', 'posts_per_page' => 10 ) ); ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <? if(strtolower(get_the_title()) === $_GET['r']) : ?>
                                    <h4><?php the_content(); ?></h4>
                                <?php endif; ?>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    <?php endwhile; ?>
    <script type="application/javascript">
        $(document).ready(function() {
            $("[name='your-restaurant']").val('<?php echo $_GET['r']; ?>');
        });
    </script>
</div>

<?php wp_footer();?>

</body>
</html>