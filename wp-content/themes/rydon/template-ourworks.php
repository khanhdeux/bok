<?php
/*
 * Template name: Our Works
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
?>

<div id="page-our-works">
    
    <div class="wrapper" id="leplayer"></div>
    <div id="nav-videochannel" class="content content-our-works">
         <ul>
             <?php
             $args = array(
                 'paged' => $paged,
                 'posts_per_page' => 24,
                 'order'=> 'DESC',
                 'orderby' => 'date',
                 'post_type' => 'post',
                 'tax_query' => array(
                     array(
                         'taxonomy' => 'post_format',
                         'field'    => 'slug',
                         'terms'    => array( 'post-format-video' )
                     ),
                 ),
             );
             $postslist = get_posts( $args );
             foreach ( $postslist as $post ) :
             setup_postdata( $post ); ?>
             <li class="class_video_li"><a onclick="video_<?php the_ID(); ?>()"><?php the_post_thumbnail(); ?><br /><br /><span><?php the_title(); ?></span></a></li>
             <script>
                 function video_<?php the_ID(); ?>() {
                             $('#leplayer').html(
                                 <?php $rydon_self_url = get_post_meta($post->ID, 'rydon_self_url', true); if(!empty($rydon_self_url)) { ?>
                                 '<video id="vid" class="lavideo" controls autoplay><source src="<?php echo $rydon_self_url ?>" type="video/mp4" /></video>'
                                 <?php } ?>
                                 
                                 <?php $rydon_youtube_id = get_post_meta($post->ID, 'rydon_youtube_id', true); if(!empty($rydon_youtube_id)) { ?>
                                 '<iframe id="vid" class="lavideo" src="https://www.youtube.com/embed/<?php echo $rydon_youtube_id ?>?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>'
                                 <?php } ?>
                                 
                                 <?php $rydon_vimeo_id = get_post_meta($post->ID, 'rydon_vimeo_id', true); if(!empty($rydon_vimeo_id)) { ?>
                                 '<iframe id="vid" class="lavideo" src="https://player.vimeo.com/video/<?php echo $rydon_vimeo_id ?>?autoplay=1&color=000000&title=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
                                 <?php } ?>
                                 
                                 <?php $rydon_dailymotion_id = get_post_meta($post->ID, 'rydon_dailymotion_id', true); if(!empty($rydon_dailymotion_id)) { ?>
                                 '<iframe id="vid" class="lavideo" frameborder="0" src="//www.dailymotion.com/embed/video/<?php echo $rydon_dailymotion_id ?>?autoPlay=1" allowfullscreen></iframe><br /><a href="http://www.dailymotion.com/video/x3kvoeg_un-iceberg-explose-devant-des-touristes_news" target="_blank">Un iceberg explose devant des touristes</a> <i>par <a href="http://www.dailymotion.com/panda-fr" target="_blank">panda-fr</a></i>'
                                 <?php } ?>
                             );
                 }
             </script>
             <?php
             endforeach; 
             wp_reset_postdata();
             ?>
         </ul>
    </div>
    <span id="roll-nav-video-channel" class="span-roll-nav-video-channel"></span>
    
</div>