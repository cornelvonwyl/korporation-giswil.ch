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
  'order'          => 'ASC',
  'meta_query'     => array(
    array(
      'key'     => 'departments',
      'value'   => '"' . get_the_ID() . '"',
      'compare' => 'LIKE'
    )
  )
);

$team_query = new WP_Query($query_args);
$all_people = $team_query->have_posts() ? $team_query->posts : array();

if (!empty($all_people)): ?>
  <section class="people-by">
    <div class="people-by__container">
      <div class="people-by__header">
        <h2 class="people-by__title">
          Team
        </h2>
      </div>

      <ul class="people-by__grid">
        <?php foreach ($all_people as $person): ?>
          <li class="people-by__grid-item">
            <?php
            get_template_part('template-parts/team/person', null, array(
              'person' => $person
            ));
            ?>
          </li>
        <?php endforeach; ?>
      </ul>

    </div>
  </section>
<?php endif; ?>