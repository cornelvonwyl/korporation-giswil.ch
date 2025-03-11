<?php
$args = array(
  'post_type' => 'dienstleistung',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
);
$services = new WP_Query($args);
?>

<section class="services">
  <div class="services__container">
    <div class="services__header">
      <p class="services__subtitle">Mehr als ein Elektriker</p>
      <h2>Dienstleistungen</h2>
    </div>
    <?php if ($services->have_posts()): ?>
      <div class="swiper services-slider">
        <div class="swiper-wrapper">
          <?php while ($services->have_posts()):
            $services->the_post(); ?>
            <div class="swiper-slide">
              <?php get_template_part('template-parts/services/services-card'); ?>
            </div>
          <?php endwhile; ?>
        </div>
      </div>

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
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>