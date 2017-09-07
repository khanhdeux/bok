<?php
/**
 * Template Name: Recipes
 *
 *
 * @package PTE
 * @since 	1.0.0
 * @version	1.0.0
 */
get_header('bok'); ?>
<div id="main-bok-content">
    <div class="container container-800">
        <div class="row text-center">
            <h2>Rezepte</h2>
        </div>
        <?php
        while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php the_content() ?>
                         </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div style='border-bottom:1px solid #ccc;margin:10px auto 30px auto;'></div>
                </div>
            </div>
        <?php
        endwhile; //resetting the page loop
        wp_reset_query(); //resetting the page query
        ?>
        <div class="row">
            <?php $loop = new WP_Query( array( 'post_type' => 'recipe', 'posts_per_page' => 10 ) ); ?>

            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 class="text-center"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h2>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="thumbnail-left">
                                <a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="text-justify"><?php the_content(); ?></div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
