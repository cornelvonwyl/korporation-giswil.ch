<?php
$args = array(
  'post_type' => 'standort',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
);
$standorte = new WP_Query($args);
?>

<section class="locations-overview">
  <div class="locations-overview__container">

    <div class="locations-overview__header">
      <p class="locations-overview__subtitle">
        In der ganzen Zentralschweiz
      </p>
      <h2>Unsere Standorte</h2>
    </div>


    <?php if ($standorte->have_posts()): ?>
      <ul class="locations-overview__list">
        <?php while ($standorte->have_posts()):
          $standorte->the_post(); ?>
          <li class="locations-overview__item">
            <?php get_template_part('template-parts/locations/location-teaser'); ?>
          </li>
        <?php endwhile; ?>
        <?php while ($standorte->have_posts()):
          $standorte->the_post(); ?>
          <li class="locations-overview__item">
            <?php get_template_part('template-parts/locations/location-teaser'); ?>
          </li>
        <?php endwhile; ?>
        <?php while ($standorte->have_posts()):
          $standorte->the_post(); ?>
          <li class="locations-overview__item">
            <?php get_template_part('template-parts/locations/location-teaser'); ?>
          </li>
        <?php endwhile; ?>
        <?php while ($standorte->have_posts()):
          $standorte->the_post(); ?>
          <li class="locations-overview__item">
            <?php get_template_part('template-parts/locations/location-teaser'); ?>
          </li>
        <?php endwhile; ?>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div>
</section>