<?php
$args = array(
  'post_type' => 'standort',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
);
$standorte = new WP_Query($args);
?>

<section class="locations-list">
  <div class="locations-list__container">

    <div class="locations-list__header">
      <p class="locations-list__subtitle">
        In der ganzen Zentralschweiz
      </p>
      <h2>Unsere Standorte</h2>
    </div>


    <?php if ($standorte->have_posts()): ?>
      <div class="locations-list__list">
        <?php while ($standorte->have_posts()):
          $standorte->the_post(); ?>
          <article class="locations-list__item">
            <?php get_template_part('template-parts/locations/location-teaser'); ?>
          </article>
        <?php endwhile; ?>
        <?php while ($standorte->have_posts()):
          $standorte->the_post(); ?>
          <article class="locations-list__item">
            <?php get_template_part('template-parts/locations/location-teaser'); ?>
          </article>
        <?php endwhile; ?>
        <?php while ($standorte->have_posts()):
          $standorte->the_post(); ?>
          <article class="locations-list__item">
            <?php get_template_part('template-parts/locations/location-teaser'); ?>
          </article>
        <?php endwhile; ?>
        <?php while ($standorte->have_posts()):
          $standorte->the_post(); ?>
          <article class="locations-list__item">
            <?php get_template_part('template-parts/locations/location-teaser'); ?>
          </article>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>