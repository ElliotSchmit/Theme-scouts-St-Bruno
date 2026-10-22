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
                <p class="subtitle"><?php the_field('unite_age'); ?></p>
                <h1><?php the_title() ?></h1>
                <p class="subtitle"><?php the_field('unite_nom'); ?></p>

                <?php if (have_rows('boutons_hero')): ?>
                    <div class="cta">
                        
                            <?php while (have_rows('boutons_hero')) : the_row(); ?>
                                <?php if(get_row_layout() == 'hero_inscription'): ?>
                                    <a href="<?php bloginfo('url') ?>/inscriptions" class="btn inscriptions"><?php the_sub_field('hero_inscription_texte'); ?></a>
                                <?php elseif (get_row_layout() == 'hero_facebook'): ?>
                                    <a href="<?php echo the_field('option_facebook', 'option'); ?>" target="_blank" class="btn facebook">
                                        <i class='fab fa-facebook-f'></i>
                                        <p><?php the_sub_field('hero_facebook_texte'); ?></p>
                                    </a>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    </section>


    <!------------------------------------
    SECTIONS
    ------------------------------------->
    <?php if (have_rows('unite_sections')): ?>
        <?php while (have_rows('unite_sections')) : the_row(); ?>

            <?php if (get_row_layout() == 'unite_details'): ?>
                <!------------------------------------
                DETAILS
                ------------------------------------->
                <section class="section detail__unite">
                    <div class="wrapper">
                        <h2><?php the_sub_field('unite_details_titre'); ?></h2>

                        <div class="detail__content">
                            <?php if (have_rows('unite_details_contenu')): ?>
                            <div class="detail__infos">
                                <?php while (have_rows('unite_details_contenu')) : the_row(); ?>
                                    <div class="detail__info">
                                        <h3><?php the_sub_field('unite_details_type'); ?></h3>

                                        <?php if (get_sub_field('unite_details_url')) : ?>
                                            <a href="<?php the_sub_field('unite_details_url'); ?>"><?php the_sub_field('unite_details_information'); ?></a>
                                        <?php elseif (get_sub_field('unite_details_courriel')) : ?>
                                            <a href="mailto:<?php the_sub_field('unite_details_courriel'); ?>"><?php the_sub_field('unite_details_information'); ?></a>
                                        <?php else : ?>
                                            <p><?php the_sub_field('unite_details_information'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <?php endif; ?>

                            <div class="detail__text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </section>

            <?php elseif (get_row_layout() == 'unite_uniforme'): ?>
                <!------------------------------------
                UNIFORME
                ------------------------------------->
                <section class="section uniforme__unite">
                    <div class="wrapper">
                        <div class="uniforme__content">
                            <h2><?php the_sub_field('unite_uniforme_titre'); ?></h2>
                            <?php the_sub_field('unite_uniforme_contenu'); ?>

                            <?php if (have_rows('unite_uniforme_urls')): ?>
                                <div class="uniforme__liens">
                                    <?php while (have_rows('unite_uniforme_urls')) : the_row(); ?>
                                        <a href="<?php the_sub_field('unite_uniforme_url'); ?>">
                                            <i class="fa-solid fa-arrow-up-right-from-square fa-lg"></i>
                                            <?php the_sub_field('unite_uniforme_url_titre'); ?>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php $image = get_sub_field('unite_uniforme_image'); ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php get_footer();?>