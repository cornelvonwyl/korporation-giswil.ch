<?php

/**
 * Template part for displaying related people by location or direct reference
 */

// Get the current post type
$current_post_type = get_post_type();

// Prepare base query arguments
$args = array(
  'post_type' => 'person',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC'
);

// If we're on a location page, get people that reference this location
if ($current_post_type === 'standort') {
  $args['meta_query'] = array(
    array(
      'key' => 'location',
      'value' => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  );
  $team_query = new WP_Query($args);
  $all_people = $team_query->have_posts() ? $team_query->posts : array();
} else {
  $referenced_people = get_field('people');
  if ($referenced_people && !empty($referenced_people)) {
    $person_ids = array_map(function ($person) {
      return is_object($person) && isset($person->ID) ? $person->ID : $person;
    }, $referenced_people);
    $args['post__in'] = $person_ids;
    $team_query = new WP_Query($args);
    $all_people = $team_query->have_posts() ? $team_query->posts : array();
  } else {
    $all_people = array();
  }
}

if (!empty($all_people)): ?>
  <section class="people-by">
    <div class="people-by__container">
      <div class="people-by__header">
        <p class="people-by__subtitle">
          <?php if ($current_post_type === 'standort'): ?>
            Unsere Profis in <?php echo get_the_title(); ?>
          <?php else: ?>
            Unsere Profis
          <?php endif; ?>
        </p>
        <h2><?php if ($current_post_type === 'standort'): ?>Team <?php echo get_the_title(); ?><?php else: ?>Ansprechpersonen<?php endif; ?></h2>
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

      // Include the team filter template with available locations
      get_template_part('template-parts/team/team-filter', null, array(
        'available_location_ids' => $available_location_ids
      ));

      // Include the team overview template with the already queried people
      get_template_part('template-parts/team/team-overview', null, array(
        'people' => $all_people
      ));
      ?>
    </div>
  </section>
<?php endif; ?>