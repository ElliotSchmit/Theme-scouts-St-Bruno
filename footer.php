<footer class="footer">
        <div class="wrapper">
            <div class="footer__content">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <?php $logoimg = get_header_image(); ?>
                        <img src="<?php echo $logoimg; ?>" alt="logo">
                    </a>
                    <a href="<?php bloginfo('url') ?>/inscriptions" class="btn inscriptions">Inscriptions</a>
                </div>

                <nav class="footer__nav">
                    <?php
                            $args = array(
                                'post_type' => 'unite',
                                'post_status' => 'publish',
                                'showposts' => -1
                            );
                            $query = new WP_Query( $args );
                        ?>
                        <?php if ( $query->have_posts() ) : ?>
                        <ul>
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </li>
                            <?php endwhile; ?>    
                        </ul>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                </nav>

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
                
            <p class="legale">@26e groupe St-Bruno. Tous droits réservés.
                <br>
                Site et design par Elliot Schmit</p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>