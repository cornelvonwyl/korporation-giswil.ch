<?php

/**
 * Template part for displaying news list
 * 
 * @package vonweb
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Query arguments for all posts
$args = array(
  'post_type' => 'post',
  'posts_per_page' => -1,
  'orderby' => 'date',
  'order' => 'DESC',
  'post_status' => 'publish'
);

$news_query = new WP_Query($args);

if (is_wp_error($news_query)) {
  return;
}
?>

<section class="news-overview__items">
  <?php if ($news_query->have_posts()): ?>
    <ul class="news-overview__grid">
      <?php while ($news_query->have_posts()):
        $news_query->the_post();
      ?>
        <li class="news-overview__grid-item">
          <?php get_template_part('template-parts/news/news-card', null, [
              'post' => get_post()
          ]); ?>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</section>