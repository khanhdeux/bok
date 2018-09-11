<?php
/*
 * About us
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header('bok'); ?>
<div id="main-bok-content" class="default">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="section single-post">
            <section>
                <div class="container container-800">
                    <?php echo the_content(); ?>
                </div>
            </section>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer('bok'); ?>

</body>
</html>