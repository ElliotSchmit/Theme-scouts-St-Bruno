<?php
/* Template Name: Dons */
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
                <div class="subtitle"><?php the_content() ?></div>
            </div>
        </div>
    </section>

    <?php if (have_rows('dons_sections')): ?>
        <?php while (have_rows('dons_sections')) : the_row(); ?>

            <?php if (get_row_layout() == 'dons_pourquoi'): ?>
                <section class="section dons--pourqoui">
                    <div class="wrapper">
                        <h2><?php the_sub_field('dons_pourquoi_titre'); ?></h2>

                        <div class="dons--pourquoi__content">
                            <div class="dons__utilite">
                                <?php the_sub_field('dons_pourquoi_utilite'); ?>
                            </div>
                            <div class="dons__description">
                                <?php the_sub_field('dons_pourquoi_description'); ?>
                            </div>
                        </div>
                    </div>
                </section>
            
            <?php elseif (get_row_layout() == 'dons_financement'): ?>
                    <section class="section dons--financement">
                        <div class="wrapper">
                            <h2><?php the_sub_field('dons_financement_titre'); ?></h2>

                            <?php if (have_rows('dons_financement_campagnes')): ?>
                                <div class="dons--financement__cards">
                                    <?php while (have_rows('dons_financement_campagnes')) : the_row(); ?>

                                        <?php if (get_row_layout() == 'dons_financement_campagne'): ?>
                                            <div class="dons--financement__card">
                                                <?php $image = get_sub_field('dons_financement_campagne_image'); ?>
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

                                                <div class="dons--financement__content">
                                                    <?php the_sub_field('dons_financement_campagne_texte'); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile;?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>

            <?php elseif (get_row_layout() == 'dons_types'): ?>
                    <section class="section dons--types">
                        <div class="wrapper">
                            <?php while (have_rows('dons_type')) : the_row(); ?>
                                <?php if (get_row_layout() == 'dons_type_argent'): ?>
                                    <div class="dons--type">
                                        <h2><?php the_sub_field('dons_type_argent_titre'); ?></h2>
                                        <?php the_sub_field('dons_type_argent_description'); ?>
                                    </div>
                                <?php elseif (get_row_layout() == 'dons_type_materiel'): ?>
                                    <div class="dons--type">
                                        <h2><?php the_sub_field('dons_type_materiel_titre'); ?></h2>
                                        <?php the_sub_field('dons_type_materiel_description'); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer();?>