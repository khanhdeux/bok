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
<a href="#home" class="back"><div id="a_back"><span><?php echo $rydon_option['text-back-menu']; ?></span><i class="fa fa-bars"></i></div></a>

<div id="menu" class="f">
    <div id="bloc_start" class="abcde">
        <img src="<?php echo $rydon_option['logo']['url']; ?>" class="logo">
        <div class="texte" id="texte-page-home-top"><?php echo $rydon_option['text-home-top']; ?></div>
        <div class="texte"><?php echo $rydon_option['text-home-bottom']; ?></div>
        <div class="texte-page-home"></div>
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

<div id="aboutus" class="f"><span class="default-loading-icon spin"></span></div>
<div id="ourworks" class="f"><span class="default-loading-icon spin"></span></div>
<div id="service" class="f"><span class="default-loading-icon spin"></span></div>
<div id="ourpricing" class="f"><span class="default-loading-icon spin"></span></div>
<div id="recipes" class="f"><span class="default-loading-icon spin"></span></div>
<div id="blogs" class="f"><span class="default-loading-icon spin"></span></div>
<!-- Step 1: To add a new animated page -->
<!-- <div id="example" class="f"><span class="default-loading-icon spin"></span></div> -->
<div id="contacts" class="f"><span class="default-loading-icon spin"></span></div>
<div id="unsererestaurants" class="f"><span class="default-loading-icon spin"></span></div>

<script>
    var mobile = false;
    var n = 0;
    var video_enCours = 0;
    $(document).ready(function() {

        if(location.hash=="") back_menu();
        $(function(){
            $(window).hashchange( function(){
                var hash = location.hash;
                hide_all();
                if(hash.replace( /^#/, '' )=="home") {
                    document.title = '<?php bloginfo( $show ); ?> - <?php bloginfo('description'); ?>';
                    back_menu();
                }
                if(hash.replace( /^#/, '' )=="about-us") {
                    document.title = '<?php bloginfo( $show ); ?> - About us';
                    go_aboutus();
                }
                if(hash.replace( /^#/, '' )=="our-works") {
                    document.title = '<?php bloginfo( $show ); ?> - Our works';
                    go_ourworks();
                }
                if(hash.replace( /^#/, '' )=="services") {
                    document.title = '<?php bloginfo( $show ); ?> - Services';
                    go_service();
                }
                if(hash.replace( /^#/, '' )=="our-pricing") {
                    document.title = '<?php bloginfo( $show ); ?> - Our pricing';
                    go_ourpricing();
                }
                if(hash.replace( /^#/, '' )=="blog") {
                    document.title = '<?php bloginfo( $show ); ?> - Blog';
                    go_blogs();
                }
                if(hash.replace( /^#/, '' )=="recipes") {
                    document.title = '<?php bloginfo( $show ); ?> - Blog';
                    go_recipes();
                }
                /* Step 2: To add a new animated page */
                /*
                if(hash.replace( /^#/, '' )=="ex-ample") {
                    document.title = 'Rydon - Example';
                    go_example();
                }
                */
                if(hash.replace( /^#/, '' )=="contact") {
                    document.title = '<?php bloginfo( $show ); ?> - Contact';
                    go_contacts();
                }
				if(hash.replace( /^#/, '' )=="unsere-restaurants") {
                    document.title = '<?php bloginfo( $show ); ?> - Zu den Restaurants';
                    go_restaurants();
                }
            });
            $(window).hashchange();
        });
    });

    $(window).load(function(){
        if(navigator.userAgent.match(/(android|iphone|ipad|blackberry|symbian|symbianos|symbos|netfront|model-orange|javaplatform|iemobile|windows phone|samsung|htc|opera mobile|opera mobi|opera mini|presto|huawei|blazer|bolt|doris|fennec|gobrowser|iris|maemo browser|mib|cldc|minimo|semc-browser|skyfire|teashark|teleca|uzard|uzardweb|meego|nokia|bb10|playbook)/gi)) mobile = true;
        $('#intro i').animate({'width':'50px'}, 2500, function(){ $(this).fadeOut('fast'); $('#intro u').fadeOut('fast'); setTimeout(function(){ $('#bloc_start').fadeIn(); }, 1000); $('#intro').delay(500).fadeOut(2000); } );
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

    function back_menu() {
        // retour accueil
        $('body').css('overflow','hidden');
        $('#a_back').hide();
        if($('#aboutus').css('display')=='block') { $('#aboutus').animate({'left':-$(window).width()+'px'}, function(){ $('#aboutus').hide(); }); }
        if($('#ourworks').css('display')=='block') { $('#ourworks').animate({'top':$(window).height()+'px'}, function(){ $('#ourworks').hide(); $('#leplayer').html(''); }); }
        if($('#service').css('display')=='block') { $('#service').animate({'left':$(window).width()+'px'}, function(){ $('#service').hide(); }); }
        if($('#ourpricing').css('display')=='block') { $('#ourpricing').animate({'top':-$(window).height()+'px'}, function(){ $('#ourpricing').hide(); }); }
        if($('#blogs').css('display')=='block') { $('#blogs').animate({'left':-$(window).width()+'px'}, function(){ $('#blogs').hide(); }); }
        if($('#recipes').css('display')=='block') { $('#recipes').animate({'left':-$(window).width()+'px'}, function(){ $('#recipes').hide(); }); }
        /* Step 3: To add a new animated page */
        /* if($('#example').css('display')=='block') { $('#example').animate({'left':-$(window).width()+'px'}, function(){ $('#example').hide(); }); } */
		if($('#unsererestaurants').css('display')=='block') { $('#unsererestaurants').animate({'left':-$(window).width()+'px'}, function(){ $('#unsererestaurants').hide(); }); }
        if($('#contacts').css('display')=='block') { $('#contacts').animate({'top':$(window).height()+'px'}, function(){ $('#contacts').hide(); }); }
        $('#menu').animate({'left':'0', 'top':'0'});

    }

    function show_back() {
        setTimeout(function(){ $('#a_back').fadeIn(); }, 400);
    }

    function go_aboutus() {
        show_back();
        $('#menu').animate({'left':$(window).width()+'px'});
        $('#aboutus').css('left',-$(window).width()+'px').css('display','block').animate({'left':'0'});
        $('#aboutus').load("aboutus");
    }

    function go_ourworks() {
        show_back();
        $('#menu').animate({'top':-$(window).height()+'px'});
        $('#ourworks').show();
        $('#ourworks').css('top',$(window).height()+'px').animate({'top':'0'}).load("ourworks", function(){ init_video_channel(); });
    }

    function go_service() {
        show_back();
        $('#menu').animate({'left':-$(window).width()+'px'});
        $('#service').css('left',$(window).width()+'px').css('display','block').animate({'left':'0'});
        $('#service').load("services");
    }

    function go_ourpricing() {
        show_back();
        $('#menu').animate({'top':$(window).height()+'px'});
        $('#ourpricing').css('top',-$(window).height()+'px').css('display','block').animate({'top':'0'});
        $('#ourpricing').load("ourpricing");
    }

    function go_blogs() {
        show_back();
        $('#menu').animate({'left':$(window).width()+'px'});
        $('#blogs').css('left',-$(window).width()+'px').css('display','block').animate({'left':'0'});
        $('#blogs').load("blog");
    }

    function go_recipes() {
        show_back();
        $('#menu').animate({'top':$(window).height()+'px'});
        $('#recipes').css('top',-$(window).height()+'px').css('display','block').animate({'top':'0'});
        $('#recipes').load("recipe");
    }

    /* Step 4: To add a new animated page */
    /* function go_example() {
        show_back();
        $('#menu').animate({'left':$(window).width()+'px'});
        $('#example').css('left',-$(window).width()+'px').css('display','block').animate({'left':'0'});
        $('#example').load("example");}
    */

	function go_restaurants() {
        show_back();
        $('#menu').animate({'left':$(window).width()+'px'});
        $('#unsererestaurants').css('left',-$(window).width()+'px').css('display','block').animate({'left':'0'});
        $('#unsererestaurants').load("unsererestaurants");
	}

    function go_contacts() {
        show_back();
        $('#menu').animate({'top':-$(window).height()+'px'});
        $('#contacts').show();
        $('#contacts').css('top',$(window).height()+'px').animate({'top':'0'}).load("contact", function(){ initialize_google_map(); });
    }

    function hide_all() {
        $('#aboutus').hide();
        $('#ourworks').hide();
        $('#service').hide();
        $('#ourpricing').hide();
        $('#recipes').hide();
        $('#blogs').hide();
        $('#unsererestaurants').hide();
        $('#contacts').hide();
    }

    function init_video_channel() {
        video_<?php $args = array( 'posts_per_page' => 1, 'post__in'  => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1 );
        $my_query = new WP_Query( $args );
        $do_not_duplicate = array(); while ( $my_query->have_posts() ) : $my_query->the_post();
        $do_not_duplicate[] = $post->ID; ?><?php the_ID(); ?><?php endwhile; ?>(0);
        setTimeout(function(){$('#le_title').fadeOut(2000); }, 2000);
        $(".lavideo").bind("ended", function() { video_suivante(); });
        mon_resize();
        $('#roll-nav-video-channel, #nav-videochannel').hover(function() { $('#roll-nav-video-channel, #nav-videochannel').clearQueue().animate({'opacity':'1'}); });
        $('#vid').hover(function() { $('#roll-nav-video-channel, #nav-videochannel').clearQueue().delay(500).animate({'opacity':'0.15'}); });
        $('#leplayer').hover(function() { $('#roll-nav-video-channel, #nav-videochannel').clearQueue().delay(500).animate({'opacity':'0.15'}); });
    }
</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '<?php echo $rydon_option['google-analytics']; ?>', 'auto');
    ga('send', 'pageview');
</script>

<?php get_footer(); ?>