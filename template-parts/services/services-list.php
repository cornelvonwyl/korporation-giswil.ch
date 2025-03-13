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
      <div class="services__grid">
        <?php while ($services->have_posts()):
          $services->the_post(); ?>
          <?php get_template_part('template-parts/services/services-card'); ?>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>