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
      <div class="news__grid">
        <?php while ($posts->have_posts()):
          $posts->the_post(); ?>
          <?php get_template_part('template-parts/news/news-card'); ?>
        <?php endwhile; ?>
      </div>

      <div class="news__button">


        <a href="/neuigkeiten">
          Mehr Neuigkeiten
        </a>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>