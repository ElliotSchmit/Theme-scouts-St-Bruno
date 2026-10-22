<?php
/* Template Name: Inscriptions Jeunes*/
?>

<?php get_header();?> 

<!------------------------------------
HERO
------------------------------------->

    <section class="hero hero-sec">
        <div class="hero__media">
            <?php the_post_thumbnail(); ?>
        </div>
        
        <div class="wrapper">
            <div class="hero__content">    
                <h1><?php the_title() ?></h1>

                <div class="cta">
                    <a href="#" class="btn inscriptions">Jeunes</a>
                    <a href="<?php bloginfo('url') ?>/inscriptions-benevoles" class="btn inscriptions inactive">Bénévoles</a>
                </div>
            </div>
        </div>
    </section>

    <?php if (have_rows('inscriptions_types')): ?>  
        <?php while (have_rows('inscriptions_types')) : the_row(); ?>
            <?php if (get_row_layout() == 'inscriptions_types_jeunes'): ?>
                <section class="section tirroirs">
                    <div class="wrapper">
                        <?php if (have_rows('inscription_type_jeunes')): ?>  
                            <?php while (have_rows('inscription_type_jeunes')) : the_row(); ?>
                                <?php if (get_row_layout() == 'inscription_jour' || get_row_layout() == 'inscription_officielle'): ?>
                                    <a href="#inscription-<?php echo get_row_index(); ?>" class="tirroir js-tirroirs" data-component="Tirroir" data-tirroir="<?php echo get_row_index(); ?>">
                                        <div class="tirroir__titre">
                                            <h2><?php the_sub_field('inscription_titre'); ?></h2>
                                            <div class="plus">
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>

                                        <?php the_sub_field('inscription_description'); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>

                <?php if (have_rows('inscription_type_jeunes')): ?>  
                    <?php while (have_rows('inscription_type_jeunes')) : the_row(); ?>
                        <?php if (get_row_layout() == 'inscription_jour'): ?>
                            <section class="section scout--jour js-tirroirs js-tirroir-<?php echo get_row_index(); ?>" id="inscription-<?php echo get_row_index(); ?>">
                                <div class="wrapper">
                                    <div class="scout--jour__content">
                                        <h2><?php the_sub_field('inscription_titre'); ?></h2>
                                        <?php the_sub_field('inscription_jour_comment'); ?>
                                        <a href="<?php echo the_field('url_inscription', 'option'); ?>" target="_blank">
                                            <i class="fa-solid fa-arrow-up-right-from-square fa-lg"></i>
                                            Inscription scout d'un jour
                                        </a>
                                    </div>

                                    <?php $image = get_sub_field('inscription_jour_image'); ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                </div>
                            </section>

                        <?php elseif (get_row_layout() == 'inscription_officielle'): ?>
                            <section class="section inscription--officielle js-tirroirs js-tirroir-<?php echo get_row_index(); ?>" id="inscription-<?php echo get_row_index(); ?>">
                                <div class="wrapper">
                                    <h2><?php the_sub_field('inscription_titre'); ?></h2>

                                    <div class="inscription--officielle__content">
                                        <div class="inscription--officielle__details">
                                            <?php the_sub_field('inscription_officielle_comment'); ?>
                                            <a href="<?php echo the_field('url_inscription', 'option'); ?>" target="_blank">
                                            <i class="fa-solid fa-arrow-up-right-from-square fa-lg"></i>
                                            Inscription en tant que scout
                                        </a>
                                        </div>

                                        <?php if (have_rows('inscription_officielle_infos')): ?>
                                            <div class="inscription--officielle__infos accordeon"  data-component="Accordeon">
                                                <?php while (have_rows('inscription_officielle_infos')) : the_row(); ?>
                                                    <?php if (get_row_layout() == 'inscription_officielle_info'): ?>
                                                        <div class="inscription--officielle__info js-accordeon">
                                                            <div class="titre">
                                                                <h3><?php the_sub_field('inscription_officielle_info_titre'); ?></h3>
                                                                <i class="fa-solid fa-chevron-right"></i>
                                                            </div>

                                                            <div class="information">
                                                                <?php the_sub_field('inscription_officielle_info_contenu'); ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </section>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer();?>