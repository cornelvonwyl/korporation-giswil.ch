<?php

/**
 * Template part for displaying team list
 * 
 * @package vonweb
 * 
 * @param array $args {
 *     Array containing the people data
 *     @type array $people Array of WP_Post objects representing team members
 * }
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Get the passed people
$people = isset($args['people']) ? $args['people'] : array();
?>

<section class="team-overview__items">
  <?php if (!empty($people)): ?>
    <ul class="team-overview__grid">
      <?php foreach ($people as $person):
        $post_id = $person->ID;

        // Get person categories
        $categories = get_the_terms($post_id, 'person-category');
        $category_classes = '';
        if ($categories && !is_wp_error($categories)) {
          $category_classes = ' ' . implode(' ', array_map(function ($cat) {
            return 'category-' . $cat->slug;
          }, $categories));
        }

        // Get person locations
        $locations = get_field('location', $post_id);
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
          get_template_part('template-parts/team/person', null, array(
            'person' => $person
          ));
          ?>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="team-overview__empty" style="display: none;">
      <p>Diese Abteilung hat ihren Hauptsitz an einem anderen Standort, unsere Dienstleistung stehen euch jedoch standortübergreifend zur Verfügung.</p>
    </div>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</section>