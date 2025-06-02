<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Get the exclude_current parameter from get_template_part
$exclude_current = isset($args) && isset($args['exclude_current']) ? $args['exclude_current'] : false;

$query_args = array(
  'post_type' => 'standort',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
);

// Exclude current post if exclude_current is set to true
if ($exclude_current === true) {
  $query_args['post__not_in'] = array(get_the_ID());
}

$standorte = new WP_Query($query_args);
?>

<section class="locations-overview animation-on-scroll">
  <div class="locations-overview__container">
    <div class="locations-overview__header">
      <p class="locations-overview__subtitle">
        In der ganzen Zentralschweiz
      </p>
      <h2>Unsere Standorte</h2>
    </div>

    <?php if ($standorte->have_posts()): ?>
      <ul class="locations-overview__list">
        <?php while ($standorte->have_posts()): $standorte->the_post(); ?>
          <li class="locations-overview__item">
            <?php get_template_part('template-parts/locations/location-teaser'); ?>
          </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
    <?php endif; ?>
  </div>
</section>