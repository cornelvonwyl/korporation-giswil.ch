<?php
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 2,
  'orderby' => 'date',
  'order' => 'DESC'
);
$posts = new WP_Query($args);
?>

<section class="news">
  <div class="news__container">
    <div class="news__header">
      <p class="news__subtitle">Stories aus der Furrer-Welt</p>
      <h2>Neuigkeiten</h2>
    </div>

    <?php if ($posts->have_posts()): ?>
      <div class="swiper news-slider">
        <div class="swiper-wrapper">
          <?php while ($posts->have_posts()):
            $posts->the_post(); ?>
            <div class="swiper-slide">
              <?php get_template_part('template-parts/news/news-card'); ?>
            </div>
          <?php endwhile; ?>
        </div>
      </div>

      <div>
        <div class="swiper-buttons">
          <button type="button" class="swiper-button-prev" aria-label="Vorheriges Element">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-left.svg'); ?>"
              alt="Pfeil nach links">
          </button>
          <button type="button" class="swiper-button-next" aria-label="Nächstes Element">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
              alt="Pfeil nach rechts">
          </button>
        </div>

        <div class="news__button">
          <a href="/neuigkeiten">
            Mehr Neuigkeiten
          </a>
        </div>
      </div>

    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>