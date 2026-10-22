<?php
/* Template Name: Ressourcerie */
?>

    <?php get_header();?> 

    <section class="section ressourcerie">
        <div class="wrapper">
            <div class="ressourcerie__content">
                <h2><?php the_title(); ?></h2>

                <?php if (have_rows('ressourcerie_categories')): ?>
                    <div class="accordeon" data-component="Accordeon">
                        <?php while (have_rows('ressourcerie_categories')) : the_row(); ?>

                            <?php if (get_row_layout() == 'ressourcerie_categorie'): ?>
                                <div class="categorie js-accordeon">
                                    <div class="titre">
                                        <h3><?php the_sub_field('ressourcerie_titre_categorie'); ?></h3>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </div>

                                    <div class="ressources">
                                        <?php if (have_rows('ressourcerie_liens')) : ?>
                                            <div class="liens">
                                                <?php while (have_rows('ressourcerie_liens')) : the_row(); ?>
                                                    <?php if (get_sub_field('ressourcerie_url')) : ?>
                                                        <a href="<?php the_sub_field('ressourcerie_url'); ?>" target="_blank">
                                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                            <?php the_sub_field('ressourcerie_nom_document'); ?>
                                                        </a>
                                                    <?php elseif (get_sub_field('ressourcerie_fichier')) : ?>
                                                        <a href="<?php the_sub_field('ressourcerie_fichier'); ?>" download>
                                                            <i class="fa-solid fa-download"></i>
                                                            <?php the_sub_field('ressourcerie_nom_document'); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif;?>   
                                        
                                        <?php if (have_rows('ressourcerie_sous-categories')) : ?>
                                            <?php while (have_rows('ressourcerie_sous-categories')) : the_row(); ?>
                                                <?php if (get_row_layout() == 'ressourcerie_sous-categorie'): ?>
                                                    <div class="categorie">
                                                        <p><b><?php the_sub_field('ressourcerie_sous-categorie_titre'); ?></b></p> 

                                                        <div class="liens">
                                                            <?php if (have_rows('ressourcerie_sous-category_liens')) : ?>
                                                                <?php while (have_rows('ressourcerie_sous-category_liens')) : the_row(); ?>
                                                                    <?php if (get_sub_field('ressourcerie_url')) : ?>
                                                                        <a href="<?php the_sub_field('ressourcerie_url'); ?>" target="_blank">
                                                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                                            <?php the_sub_field('ressourcerie_nom_document'); ?>
                                                                        </a>
                                                                    <?php elseif (get_sub_field('ressourcerie_fichier')) : ?>
                                                                        <a href="<?php the_sub_field('ressourcerie_fichier'); ?>" download>
                                                                            <i class="fa-solid fa-download"></i>
                                                                            <?php the_sub_field('ressourcerie_nom_document'); ?>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                <?php endwhile; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php the_post_thumbnail(); ?>
        </div>
        
    </section>

    <?php get_footer();?>