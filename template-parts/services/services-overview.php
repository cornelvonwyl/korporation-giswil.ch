<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$args = array(
  'post_type' => 'dienstleistung',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
);

$services = new WP_Query($args);
?>

<section class="services-overview">
  <div class="services-overview__container">
    <div class="services-overview__header">
      <p class="services-overview__subtitle">Mehr als ein Elektriker</p>
      <h2>Dienstleistungen</h2>
    </div>
    <?php if ($services->have_posts()): ?>
      <ul class="services-overview__grid">
        <?php while ($services->have_posts()):
          $services->the_post(); ?>
          <?php get_template_part('template-parts/components/card-with-image'); ?>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>