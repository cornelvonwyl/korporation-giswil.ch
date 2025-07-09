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
    <div class="news-overview__no-results" style="display: none;">
      <p>Keine Neuigkeiten für die ausgewählten Bereiche gefunden.</p>
    </div>
    <ul class="news-overview__grid">
      <?php while ($news_query->have_posts()):
        $news_query->the_post();

        // Get bereich references from custom field "fields"
        $bereich_fields = get_post_meta(get_the_ID(), 'fields', true);

        $bereich_classes = '';
        if ($bereich_fields) {
          // Handle both single value and array of values
          if (!is_array($bereich_fields)) {
            $bereich_fields = array($bereich_fields);
          }

          $class_array = array();
          foreach ($bereich_fields as $bereich) {
            // Handle both post objects and IDs
            $bereich_id = is_object($bereich) ? $bereich->ID : $bereich;
            $bereich_post = get_post($bereich_id);

            if ($bereich_post && $bereich_post->post_type === 'bereich') {
              $class_array[] = 'bereich-' . $bereich_post->post_name;
            }
          }

          if (!empty($class_array)) {
            $bereich_classes = ' ' . implode(' ', $class_array);
          }
        }
      ?>
        <li class="news-overview__grid-item<?php echo esc_attr($bereich_classes); ?>">
          <?php get_template_part('template-parts/news/news-card'); ?>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</section>