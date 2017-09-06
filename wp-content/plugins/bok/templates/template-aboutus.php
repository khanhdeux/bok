<?php
/*
 * About us
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header('bok'); ?>
<div id="main-bok-content">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="section single-post">
            <section>
                <div class="container container-800">
                    <div class="row text-center">
                        <h2>Über uns</h2>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </section>
        </div>

    <?php endwhile; ?>
</div>

<?php wp_footer();?>

</body>
</html>