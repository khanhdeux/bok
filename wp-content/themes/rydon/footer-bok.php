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
            <div class="col-sm-2 col-xs-6">
                <h4><a href="<?php echo get_site_url() . '/aboutus'; ?>">Über BOK</a></h4>
            </div>
            <div class="col-sm-2 col-xs-6">
                <h4><a href="<?php echo get_site_url() . '/restaurants'; ?>">Restaurants</a></h4>
            </div>
            <div class="col-sm-2 col-xs-6">
                <h4><a href="<?php echo get_site_url() . '/news'; ?>">Neuigkeiten</a></h4>
            </div>
            <div class="col-sm-2 col-xs-6">
                <h4><a href="<?php echo get_site_url() . '/recipes'; ?>">Rezepte</a></h4>
            </div>
            <div class="col-sm-2 col-xs-6">
                <h4><a href="<?php echo get_site_url() . '/contact'; ?>">Kontakt</a></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 col-xs-12">
                <img src="<?php echo esc_url( plugins_url( BOK__PLUGIN_NAME . '/images/flag.jpg') ); ?>" width="15" />
            </div>
            <div class="col-sm-5 col-xs-12">
                2017 Bok, Inc.  All Rights Reserved
            </div>
            <div class="col-sm-2 col-xs-12">
                Guides
            </div>
            <div class="col-sm-2 col-xs-12">
                Tearms of Use
            </div>
            <div class="col-sm-2 col-xs-12">
                Bok privacy policy
            </div>
        </div>
    </div>
</div>

<?php wp_footer();?>
</body>
</html>