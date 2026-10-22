    <?php get_header();?> 

    <section class="section">
        <div class="wrapper">
            <?php if (have_posts()) : ?>
                <div class="cards">
                    <?php while(have_posts() ) : the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="card">
                            <div class="card__media">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="card__content">
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php get_footer();?>