<?php
/**
 * Template Name: Recipes
 *
 *
 * @package PTE
 * @since 	1.0.0
 * @version	1.0.0
 */
?>
<div id="main-wp-content" class="f">
    <div class="container container-800">
        <div class="row text-center">
            <h2>Rezepte</h2>
        </div>
        <div class="row">
            <?php $loop = new WP_Query( array( 'post_type' => 'recipe', 'posts_per_page' => 10 ) ); ?>

            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="text-center"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></p>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a class="thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </a>
                        <?php endif; ?>
                        <div class="text-justify"><?php the_content(); ?></div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>