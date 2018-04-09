<?php
/*
 * Template name: Home
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
global $rydon_option;
get_header(); ?>

<div id="intro">
    <s><img src="<?php echo $rydon_option['logo-intro']['url']; ?>"></s>
    <u><span class="default-loading-icon spin"></span></u>
    <i></i>
</div>

<div id="menu" class="f">
    <div id="bloc_start">
        <img src="<?php echo $rydon_option['logo']['url']; ?>" class="logo">
        <div class="texte" id="texte-page-home-top"><?php echo $rydon_option['text-home-top']; ?></div>
        <div class="texte"><?php echo $rydon_option['text-home-bottom']; ?></div>
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <nav id="nav" aria-label="<?php esc_attr_e( 'Primary Menu', 'rydon' ); ?>">
            <?php wp_nav_menu( array('theme_location' => 'primary',) );?>
        </nav>
        <?php endif; ?>
    </div>
    <div class="wrapper">
        <video id="la_video" autoplay loop preload>
            <source src="<?php echo $rydon_option['background-video-mp4']['url']; ?>" type="video/mp4">
            <img src="<?php echo $rydon_option['background-image']['url']; ?>">
        </video>
    </div>

    <div id="bloc_shadow"></div>
    <div id="copy"><?php echo $rydon_option['text-home-footer']; ?></div>
    <div class="mb-social">

        <?php
        $facebook_link = $rydon_option['facebook-link'];
        $twitter_link = $rydon_option['twitter-link'];
        $google_plus_link = $rydon_option['google-plus-link'];
        $youtube_link = $rydon_option['youtube-link'];
        $instagram_link = $rydon_option['instagram-link'];
        $pinterest_link = $rydon_option['pinterest-link'];
        $vimeo_link = $rydon_option['vimeo-link'];
        $tumblr_link = $rydon_option['tumblr-link'];
        $linkedin_link = $rydon_option['linkedin-link'];
        ?>

        <?php if(!empty($facebook_link)) { ?><a href="<?php echo $facebook_link; ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php } ?>

        <?php if(!empty($twitter_link)) { ?><a href="<?php echo $twitter_link; ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>

        <?php if(!empty($google_plus_link)) { ?><a href="<?php echo $google_plus_link; ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php } ?>

        <?php if(!empty($youtube_link)) { ?><a href="<?php echo $youtube_link; ?>" target="_blank"><i class="fa fa-youtube"></i></a><?php } ?>

        <?php if(!empty($instagram_link)) { ?><a href="<?php echo $instagram_link; ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php } ?>

        <?php if(!empty($pinterest_link)) { ?><a href="<?php echo $pinterest_link; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a><?php } ?>

        <?php if(!empty($vimeo_link)) { ?><a href="<?php echo $vimeo_link; ?>" target="_blank"><i class="fa fa-vimeo"></i></a><?php } ?>

        <?php if(!empty($tumblr_link)) { ?><a href="<?php echo $tumblr_link; ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php } ?>

        <?php if(!empty($linkedin_link)) { ?><a href="<?php echo $linkedin_link; ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php } ?>

    </div>
    <div class="imprint">
        <a href="/impressum">IMPRESSUM</a>
    </div>
</div>

<script>
    var mobile = false;
    var n = 0;
    var video_enCours = 0;

    $(window).load(function(){
        if(navigator.userAgent.match(/(android|iphone|ipad|blackberry|symbian|symbianos|symbos|netfront|model-orange|javaplatform|iemobile|windows phone|samsung|htc|opera mobile|opera mobi|opera mini|presto|huawei|blazer|bolt|doris|fennec|gobrowser|iris|maemo browser|mib|cldc|minimo|semc-browser|skyfire|teashark|teleca|uzard|uzardweb|meego|nokia|bb10|playbook)/gi)) mobile = true;
        $('#intro i').animate({'width':'50px'}, 1500, function(){ $(this).fadeOut('fast'); $('#intro u').fadeOut('fast'); setTimeout(function(){ $('#bloc_start').fadeIn(); }, 1000); $('#intro').delay(500).fadeOut(2000); } );
        mon_resize();
        $(window).resize(function(){ n = n + 1; testresize(n); });
        if(mobile) {
            $('.wrapper').css({'background':'url(<?php echo $rydon_option['background-image']['url']; ?>) 50% 50% no-repeat fixed','background-size':'cover'});
            $('.wrapper').html('');
        }
    });

    function testresize(y) {
        setTimeout(function(){ if(y==n) mon_resize(); }, 50);
    }

    function mon_resize() {
        newW = $(window).width();
        newH = 360/640*newW;
        newL = 0;
        newT = $(window).height()/2-newH/2;
        if(newH<$(window).height()) {
            newH = $(window).height();
            newW = 640/360*newH;
            newL = $(window).width()/2-newW/2;
            newT = 0;
        }
        $('#menu .wrapper video').css({'width': newW+'px', 'height': newH+'px', 'left': newL+'px', 'top': newT+'px'});
        $('.f').css({'width': $(window).width()+'px', 'height': $(window).height()+'px'});
    }
</script>

<?php get_footer(); ?>