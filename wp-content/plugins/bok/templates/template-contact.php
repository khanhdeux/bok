<?php
/*
 * Contact
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
                        <h2>Kontakt</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <?php the_content(); wp_link_pages(); ?>
                        </div>
                        <div class="col-sm-6 text-left top20">
                            <p class="address-block">
                                Sternschanzen <br />
                                Schanzenstraße 36. <br />
                                20357 Hamburg
                            </p>

                            <p class="address-block">
                                Ottensen <br />
                                Ottensener Hauptstraße 1. <br />
                                22765 Hamburg
                            </p>

                            <p class="address-block">
                                Schulterblatt <br />
                                Schulterblatt 3 <br />
                                20357 Hamburg
                            </p>

                            <p class="phone-block">
                                +(49) 176 .....
                            </p>
                            <p class="email-block">
                                bok@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    <?php endwhile; ?>
</div>

<?php wp_footer();?>

</body>
</html>