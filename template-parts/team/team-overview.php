<?php

/**
 * Template part for displaying team list
 * 
 * @package vonweb
 * 
 * @param array $args Query arguments for WP_Query
 * @param array $options Additional options for display
 */

// Default query arguments
$default_args = array(
  'post_type' => 'person',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
);

// Merge with provided arguments, ensuring post__in is preserved
$args = isset($args['args']) ? $args['args'] : $default_args;


$team_query = new WP_Query($args);

if (is_wp_error($team_query)) {
  return;
}
?>

<section class="team-overview__items">
  <?php if ($team_query->have_posts()): ?>
    <ul class="team-overview__grid">
      <?php while ($team_query->have_posts()):
        $team_query->the_post();
        // Get person categories
        $categories = get_the_terms(get_the_ID(), 'person-category');
        $category_classes = '';
        if ($categories && !is_wp_error($categories)) {
          $category_classes = ' ' . implode(' ', array_map(function ($cat) {
            return 'category-' . $cat->slug;
          }, $categories));
        }

        // Get person locations
        $locations = get_field('location', get_the_ID());
        $location_ids = [];
        if ($locations) {
          $location_ids = array_map(function ($location) {
            return $location->ID;
          }, $locations);
        }
        $location_data = $location_ids ? 'data-locations="' . esc_attr(implode(',', $location_ids)) . '"' : '';
      ?>
        <li class="team-overview__grid-item<?php echo esc_attr($category_classes); ?>" <?php echo $location_data; ?>>
          <?php
          get_template_part('template-parts/team/person', NULL, array(
            'person' => get_post()
          ));
          ?>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</section>