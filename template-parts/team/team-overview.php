<?php

/**
 * Template part for displaying team list
 * 
 * @package vonweb
 * 
 * @param array $args Array containing the people data
 */

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
          get_template_part('template-parts/team/person', NULL, array(
            'person' => $person
          ));
          ?>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="team-overview__empty" style="display: none;">
      <p>Für den gewählten Standort wurden keine Ergebnisse gefunden. Bitte wähle einen anderen Standort.</p>
    </div>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</section>