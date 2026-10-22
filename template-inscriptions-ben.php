<?php
/* Template Name: Inscriptions Benevoles*/
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
                    <a href="<?php bloginfo('url') ?>/inscriptions" class="btn inscriptions inactive">Jeunes</a>
                    <a href="#" class="btn inscriptions">Bénévoles</a>
                </div>
            </div>
        </div>
    </section>


 <?php if (have_rows('inscriptions_types')): ?>  
    <?php while (have_rows('inscriptions_types')) : the_row(); ?>
        <?php if (get_row_layout() == 'inscriptions_types_benevoles'): ?>
            <?php if (have_rows('inscriptions_types_benevoles_sections')): ?>
                <?php while (have_rows('inscriptions_types_benevoles_sections')) : the_row(); ?>
                    <?php if (get_row_layout() == 'inscriptions_types_benevoles_sections_inscription'): ?>
                        <section class="section inscritpion-ben">
                            <div class="wrapper">
                                <h2><?php the_sub_field('inscriptions_types_benevoles_sections_inscription_titre'); ?></h2>
                                <div class="inscription-ben__content">
                                    <div class="inscription-ben__description">
                                        <?php the_sub_field('inscriptions_types_benevoles_sections_inscription_description'); ?>

                                        <a href="<?php echo the_field('url_inscription', 'option'); ?>" target="_blank">
                                            <i class="fa-solid fa-arrow-up-right-from-square fa-lg"></i>
                                            Inscription en tant de bénévoles
                                        </a>
                                    </div>
                                    
                                    <?php $image = get_sub_field('inscriptions_types_benevoles_sections_inscription_image'); ?>
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                </div>
                                
                            </div>
                        </section>

                    <?php elseif (get_row_layout() == 'inscriptions_types_benevoles_sections_besoins'): ?>
                        <section class="section section-dark section_besoins">
                            <div class="wrapper">
                                <h2><?php the_sub_field('inscriptions_types_benevoles_sections_besoins_titre'); ?></h2>
                                <div class="description">
                                    <?php the_sub_field('inscriptions_types_benevoles_sections_besoins_description'); ?>
                                </div>

                                <?php if (have_rows('inscriptions_types_benevoles_sections_besoins_types')): ?>
                                    <div class="besoins">
                                        <?php while (have_rows('inscriptions_types_benevoles_sections_besoins_types')) : the_row(); ?>
                                        
                                            <?php if (get_row_layout() == 'inscriptions_types_benevoles_sections_besoins_type'): ?>
                                                <div class="besoin">
                                                    <h3><?php the_sub_field('inscriptions_types_benevoles_sections_besoins_type_titre'); ?></h3>
                                                    <div class="besoins__details">
                                                        <?php the_sub_field('inscriptions_types_benevoles_sections_besoins_type_description'); ?>
                                                    </div>
                                                </div>
                                                
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
