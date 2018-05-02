<?php
/*
 * About us
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
get_header('bok'); ?>
<div id="main-bok-content" class="about-us">
    <div class="row bok-restaurant-top">
        <img src="<?php echo esc_url( plugins_url( BOK__PLUGIN_NAME . '/images/aboutus-cover.png') ); ?>" width="100%" />
        <div class="top-header">Über uns</div>
    </div>
    <div class="row description">
        <p>
            Unser Name bok - Glück auf koreanisch - ist unser Leitfaden. Sowohl die Speisen, als auch der Service und das Ambiente sind für uns gleichermaßen wichtig um euch besondere Momente zu schenken. Frische Küche aus verschiedenen asiatischen Kulturen werden bei bok zusammengebracht. Vietnamesisch, thailändisch, koreanisch und japanisch - alles an einem Ort. Unsere traditionellen Speisen werden modern interpretiert und zeichnen sich durch ihre Frische, Qualität und Authentizität aus - eine Vielfalt an Neuem und Traditionellem. Wir verwenden bei der Zubereitung täglich ausgewählte Zutaten, traditionelle Gewürze und frische Kräuter.
            <br /><br />
            In unseren Restaurants sorgt unser freundliches und herzliches Team täglich für ein familiäres Erlebnis, was uns besonders am Herzen liegt - vorgelebt von der Gründerin „Mama Kang“, die vor 30 Jahren anfing für ihre Gäste mit Liebe ihre Speisen zuzubereiten. Mit einem Mix aus modernen Einflüssen, Tradition und unserem hohen Anspruch an Qualität und Leidenschaft, sind wir Tag für Tag inspiriert euch immer wieder aufs Neue zu begeistern und mit bok zu erfüllen.
            <br /><br />
            Unkonventionell, einfach, gemütlich - wir verzichten gänzlich auf unnötiges Chichi, weil bei uns das Produkt zählt.
            <br /><br />
            Wir freuen uns auf euren Besuch.
        </p>
    </div>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="section single-post" style="display: none">
            <section>
                <div class="container container-800">
                    <?php $loop = new WP_Query( array( 'post_type' => 'story', 'posts_per_page' => 10 ) ); $count = 0; ?>

                    <?php while ( $loop->have_posts() ) : $loop->the_post();
                        $count++;
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?php if ( ($count % 2) == 0 ) : ?>
                                    <a class="thumbnail" href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php endif; ?>
                                    </a>
                                <?php else: ?>
                                    <?php the_content() ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <?php if ( ($count % 2) == 0 ) : ?>
                                    <?php the_content() ?>
                                <?php else: ?>
                                    <a class="thumbnail" href="<?php the_permalink(); ?>">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            </section>
        </div>
    <?php endwhile; ?>
</div>

<?php get_footer('bok'); ?>

</body>
</html>