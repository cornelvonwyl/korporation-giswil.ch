<?php

/**
 * Template part for displaying related people by location or direct reference
 */

// Get the current post type
$current_post_type = get_post_type();

// If we're on a location page, get people that reference this location
if ($current_post_type === 'standort') {
  $args = array(
    'post_type' => 'person',
    'posts_per_page' => -1,
    'meta_query' => array(
      array(
        'key' => 'location',
        'value' => '"' . get_the_ID() . '"',
        'compare' => 'LIKE'
      )
    )
  );
  $referenced_people = get_posts($args);
} else {
  $referenced_people = get_field('people');
}

if ($referenced_people && !empty($referenced_people)): ?>
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

      <?php get_template_part('template-parts/team/team-filter'); ?>

      <?php
      // Convert referenced people to post IDs for the query
      $person_ids = array_map(function ($person) {
        return is_object($person) && isset($person->ID) ? $person->ID : $person;
      }, $referenced_people);



      // Prepare query arguments
      $args = array(
        'post_type' => 'person',
        'posts_per_page' => -1,
        'post__in' => $person_ids,
        'orderby' => 'menu_order',
        'order' => 'ASC'
      );

      // Include the team overview template
      get_template_part('template-parts/team/team-overview', null, array(
        'args' => $args
      ));
      ?>
    </div>
  </section>
<?php endif; ?>