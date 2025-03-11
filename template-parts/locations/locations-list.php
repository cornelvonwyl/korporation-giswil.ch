<?php
$args = array(
  'post_type' => 'standort',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
);
$standorte = new WP_Query($args);
?>

<section class="locations">
  <div class="locations__container">
    <h2 class="locations__title">Unsere Standorte</h2>

    <?php if ($standorte->have_posts()): ?>
      <div class="locations__list">
        <?php while ($standorte->have_posts()):
          $standorte->the_post(); ?>
          <article class="locations__item">
            <?php get_template_part('template-parts/components/lists/standort'); ?>
          </article>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>