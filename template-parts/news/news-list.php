<?php

/**
 * Template part for displaying news list
 * 
 * @package vonweb
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Query arguments for latest posts
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 3,
  'orderby' => 'date',
  'order' => 'DESC'
);

$posts = new WP_Query($args);

// Check if query was successful
if (is_wp_error($posts)) {
  return;
}
?>

<section class="news-list animation-on-scroll">
  <div class="news-list__container">
    <div class="news-list__wrapper">
      <h2>Neuigkeiten</h2>
      <div>
        <?php if ($posts->have_posts()): ?>
          <ul class="news-list__cards">
            <?php while ($posts->have_posts()): $posts->the_post(); ?>
              <li class="news-list__card">
                <?php get_template_part('template-parts/news/news-card', null, [
                  'post' => get_post()
                ]); ?>
              </li>
            <?php endwhile; ?>
          </ul>
          <a class="news-list__more" href="/neuigkeiten">
            Mehr Neuigkeiten
          </a>
        <?php endif; ?>


        <?php wp_reset_postdata(); ?>
      </div>
    </div>

  </div>
</section>