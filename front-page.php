    <?php get_header();?> 


<!------------------------------------
HERO
------------------------------------->

    <section class="hero">
        <div class="hero__media">
            <?php the_post_thumbnail(); ?>
        </div>
        
        <div class="wrapper">
            <div class="hero__content">
                <h1><?php the_content() ?></h1>

                <div class="cta">
                    <?php if (have_rows('boutons_hero')): ?>
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
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </section>

<!------------------------------------
SECTIONS
------------------------------------->
    <?php if (have_rows('accueil_sections')): ?>
        <?php while (have_rows('accueil_sections')) : the_row(); ?>

            <?php if (get_row_layout() == 'accueil_unites'): ?>
                <!------------------------------------
                UNITES
                ------------------------------------->
                <section class="section unites" id="unites">
                    <div class="wrapper">
                        <h2><?php the_sub_field('accueil_unites_titre'); ?></h2>
                        <div class="description"><?php the_sub_field('accueil_unites_description'); ?></div>

                        <?php
                            $args = array(
                                'post_type' => 'unite',
                                'post_status' => 'publish',
                                'showposts' => -1
                            );
                            $query = new WP_Query( $args );
                        ?>
                        <?php if ( $query->have_posts() ) : ?>
                        <div class="cards">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="card">
                                    <?php if (get_field('unite_image_accueil')) : ?>
                                        <div class="card__media">
                                            <?php $image = get_field('unite_image_accueil'); ?>
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="card__content">
                                        <h3><?php the_title(); ?></h3>
                                        <?php if (get_field('unite_age')) : ?>
                                            <p><?php the_field('unite_age'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endwhile; ?>    
                        </div>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </section>
                
            
            <?php elseif (get_row_layout() == 'recherche_benevoles'): ?>
                <!------------------------------------
                RECHERCHE BENEVOLES
                ------------------------------------->
                <section class="section-dark recherche-ben">
                    <div class=" wrapper">
                        <div class="section section__content">
                            <h2><?php the_sub_field('accueil_recherche_benevoles_titre'); ?></h2> 
                            <?php the_sub_field('accueil_recherche_benevoles_description'); ?>
                            <a href="<?php bloginfo('url') ?>/inscriptions-benevoles" class="btn inscriptions"><?php the_sub_field('accueil_recherche_benevoles_bouton_texte'); ?></a>
                        </div>
                    </div>

                    <div class="section__media">
                        <?php $image = get_sub_field('accueil_recherche_benevoles_image'); ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
                </section>


            <?php elseif (get_row_layout() == 'gallerie_photo'): ?>
                <!------------------------------------
                GALLERIE PHOTO
                ------------------------------------->
                <section class="section section-dark gallerie-photo">
                    <div class="wrapper">
                        <h2><?php the_sub_field('accueil_photos_titre'); ?></h2>
                        <div class="gallerie__grid">
                            <div class="gallerie__content">
                            <?php the_sub_field('accueil_photos_description'); ?>
                            <a href="<?php bloginfo('url') ?>/piwigo/" class="btn inscriptions"><?php the_sub_field('accueil_photos_bouton'); ?></a>
                        </div>
                        <?php if (have_rows('accueil_photos_images')): ?>
                            <div class="gallerie__media">
                                <?php while (have_rows('accueil_photos_images')) : the_row(); ?>
                                    <?php $image = get_sub_field('accueil_photo_image'); ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        </div>
                        
                    </div>
                </section>


            <?php elseif (get_row_layout() == 'accueil_contact'): ?>
                <!------------------------------------
                CONTACT
                ------------------------------------->
                <section class="section accueil__contact" id="contact">
                    <div class="wrapper">
                        <div class="contact__content">
                            <h2><?php the_sub_field('accueil_contact_titre'); ?></h2>
                            <?php the_sub_field('accueil_contact_description'); ?>
                            <?php echo do_shortcode('[gravityform id=1]'); ?>

                            <?php if (have_rows('option_contacts', 'option')): ?>
                                <div class="info-contact">
                                    <?php while (have_rows('option_contacts', 'option')) : the_row(); ?>
                                        <?php if (get_row_layout() == 'option_choix_facebook'): ?>
                                            <a href="<?php the_sub_field('option_facebook_url'); ?>" target="_blank">
                                                <i class='fab fa-facebook-f'></i>
                                                <p><?php the_sub_field('option_facebook_texte'); ?></p>
                                            </a>
                                        <?php elseif (get_row_layout() == 'option_adresse_courriel'): ?>
                                            <a href="mailto:<?php the_sub_field('option_courriel'); ?>">
                                                <i class="fa-solid fa-envelope"></i>
                                                <p><?php the_sub_field('option_courriel'); ?></p>
                                            </a>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="contact__media">
                            <?php $image = get_sub_field('accueil_contact_image'); ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        
        <?php endwhile; ?>
    <?php endif; ?>

    <!--<section class="section calendrier-groupe">
        <div class="wrapper">
            <iframe class="google-calendar" src="https://calendar.google.com/calendar/embed?height=511&wkst=1&ctz=America%2FToronto&showTitle=0&showPrint=0&showTabs=0&showCalendars=0&showTz=0&src=Y19mMDExZjNkMmE2ZDZiMGM4YmQ2OTA4NjQyMzBhMWFhYmEwODYwNGYwZTJiYjdhMmNkMjg4NTIzNjg0MDlmYzc3QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23f6bf26" style="border-width:0" width="800" height="511" frameborder="0" scrolling="no"></iframe>
        </div>
    </section>-->

    <?php get_footer();?>