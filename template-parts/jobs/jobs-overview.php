<?php

/**
 * Template part for displaying jobs list
 * 
 * @package vonweb
 */

$args = $args ?? array();
$jobs_query = $args['jobs_query'] ?? null;

if (!$jobs_query || is_wp_error($jobs_query)) {
  return;
}

?>

<section class="jobs-overview__items">
  <?php if ($jobs_query->have_posts()): ?>
    <ul class="jobs-overview__grid">
      <?php while ($jobs_query->have_posts()):
        $jobs_query->the_post();
        $location = get_field('location', get_the_ID());
        $location_id = '';
        if ($location) {
          $location_id = $location->ID;
        }

        $location_data = $location_id ? 'data-location="' . esc_attr($location_id) . '"' : '';
      ?>
        <li class="jobs-overview__grid-item" <?php echo $location_data; ?>>
          <?php get_template_part('template-parts/jobs/job-teaser'); ?>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</section>