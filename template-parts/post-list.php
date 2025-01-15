<div class="post-slider">
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

  <div class="swiper post-slider__container">

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
          $posts->the_post();
          $external_page_id = get_post_meta(get_the_ID(), 'external_page', TRUE);
          $external_page_link = get_permalink($external_page_id);
          ?>

          <div class="swiper-slide post-slider__slide">
            <a href="<?php echo esc_url($external_page_id ? $external_page_link : get_permalink()); ?>"
              class="post-slider__link">
              <article class="post-slider__item">
                <p class="post-slider__date text-small">
                  <?php
                  if ($external_page_id) {
                    $external_post = get_post($external_page_id);
                    if ($external_post) {
                      $post_type = get_post_type($external_page_id);

                      if ($post_type == 'job') {
                        echo "Freie Stelle";
                      }

                    }
                  }
                  else {
                    echo get_the_date('D d/m/y');
                  }
                  ?>
                </p>

                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('medium', ['class' => 'post-slider__image']); ?>
                <?php endif; ?>

                <h3 class="post-slider__headline">
                  <?php the_title(); ?>
                </h3>

                <p class="text-small post-slider__count">
                  <?php echo $posts->current_post + 1; ?>/6
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