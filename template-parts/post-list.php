<div class="post-slider">
    <div class="swiper post-slider__container">
        <div class="swiper-buttons">
            <button type="button" class="swiper-button-prev" aria-label="Vorheriges Bild">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-left.svg'); ?>"
                    alt="Pfeil nach links">
            </button>
            <button type="button" class="swiper-button-next" aria-label="Nächstes Bild">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
                    alt="Pfeil nach rechts">
            </button>
        </div>
        <div class="swiper-wrapper post-slider__wrapper">
            <?php
            $args = array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'posts_per_page' => 6,
            );
            $posts = new WP_Query($args);

            if ($posts->have_posts()):
              while ($posts->have_posts()):
                $posts->the_post(); ?>
                <div class="swiper-slide post-slider__slide">
                    <a href="<?php the_permalink(); ?>" class="post-slider__image-link">
                        <article class="post-slider__item">
                            <p class="post-slider__date">
                                <?php echo get_the_date('D, d/m/y'); ?>
                            </p>

                            <?php if (has_post_thumbnail()): ?>

                              <?php the_post_thumbnail('medium', ['class' => 'post-slider__image'

                              ]); ?>

                            <?php endif; ?>
                            <h3 class="post-slider__headline">
                                <?php the_title(); ?>
                            </h3>


                            <p>
                                <?php echo $posts->current_post + 1; ?>/ 6
                            </p>
                        </article>
                    </a>
                </div>
              <?php endwhile;
            endif;

            wp_reset_postdata();
            ?>
        </div>


    </div>
</div>