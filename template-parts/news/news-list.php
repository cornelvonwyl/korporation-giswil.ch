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
      <p class="news__subtitle">Mehr als ein Elektriker</p>
      <h2>Dienstleistungen</h2>
    </div>

    <?php if ($posts->have_posts()): ?>
      <div class="news__grid">
        <?php while ($posts->have_posts()):
          $posts->the_post(); ?>
          <?php get_template_part('template-parts/components/cards/post'); ?>
        <?php endwhile; ?>
      </div>
      <div class="news__more">
        <a href="<?php echo get_post_type_archive_link('post'); ?>" class="button">
          Mehr Neuigkeiten
        </a>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>