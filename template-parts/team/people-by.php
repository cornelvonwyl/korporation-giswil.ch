<?php

/**
 * Template part for displaying related people by location or direct reference
 * 
 * @package vonweb
 * 
 * This template handles two scenarios:
 * 1. Displaying people associated with a location (standort)
 * 2. Displaying people referenced directly in a post
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Get the current post type
$current_post_type = get_post_type();

// Base query arguments for people
$query_args = array(
  'post_type'      => 'person',
  'posts_per_page' => -1,
  'orderby'        => 'menu_order',
  'order'          => 'ASC'
);

// Initialize people array
$all_people = array();

// Handle different scenarios based on post type
if ($current_post_type === 'standort') {
  // Query people associated with this location
  $query_args['meta_query'] = array(
    array(
      'key'     => 'location',
      'value'   => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  );
} else {
  // Get directly referenced people
  $referenced_people = get_field('people');
  if (!empty($referenced_people)) {
    $person_ids = array_map(function ($person) {
      return is_object($person) && isset($person->ID) ? $person->ID : $person;
    }, $referenced_people);
    $query_args['post__in'] = $person_ids;
  }
}

// Execute query if we have valid parameters
if (!empty($query_args['meta_query']) || !empty($query_args['post__in'])) {
  $team_query = new WP_Query($query_args);
  $all_people = $team_query->have_posts() ? $team_query->posts : array();
}

// Only proceed if we have people to display
if (!empty($all_people)): ?>
  <section class="people-by">
    <div class="people-by__container">
      <div class="people-by__header">
        <p class="people-by__subtitle">
          <?php echo $current_post_type === 'standort'
            ? sprintf('Unsere Profis in %s', get_the_title())
            : 'Unsere Profis';
          ?>
        </p>
        <h2>
          <?php echo $current_post_type === 'standort'
            ? sprintf('Team %s', get_the_title())
            : 'Ansprechpersonen';
          ?>
        </h2>
      </div>

      <?php
      // Get unique location IDs from all people
      $available_location_ids = array();
      foreach ($all_people as $person) {
        $locations = get_field('location', $person->ID);
        if ($locations) {
          foreach ($locations as $location) {
            if (is_object($location) && isset($location->ID)) {
              $available_location_ids[] = $location->ID;
            }
          }
        }
      }
      $available_location_ids = array_unique($available_location_ids);

      // Include team components
      get_template_part('template-parts/team/team-filter', null, array(
        'available_location_ids' => $available_location_ids
      ));

      get_template_part('template-parts/team/team-overview', null, array(
        'people' => $all_people
      ));
      ?>
    </div>
  </section>
<?php endif; ?>