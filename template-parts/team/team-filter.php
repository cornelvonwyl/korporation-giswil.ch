<?php

/**
 * Template part for displaying the teams category filter
 * 
 * @package vonweb
 * 
 * @param array $args {
 *     Array containing filter configuration
 *     @type array $available_location_ids Array of location IDs that are available in the current set of people
 * }
 */


if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Get available location IDs from passed data
$available_location_ids = isset($args['available_location_ids']) ? $args['available_location_ids'] : array();
?>

<div class="team-filter">
  <div class="team-filter__container">
    <form id="team-filter-form" class="team-filter__form" role="group" aria-label="Team Kategorien Filter">
      <?php
      // Get all person categories
      $categories = get_terms(array(
        'taxonomy'   => 'person-category',
        'hide_empty' => true,
        'orderby'    => 'name',
        'order'      => 'ASC'
      ));

      if (!empty($categories) && !is_wp_error($categories)): ?>
        <ul class="team-filter__checkboxes" role="group" aria-label="Filteroptionen">
          <?php foreach ($categories as $category):
            $checkbox_id = 'filter-' . esc_attr($category->slug) . '-' . uniqid();
          ?>
            <li class="team-filter__checkbox">
              <input
                class="team-filter__input"
                type="checkbox"
                id="<?php echo $checkbox_id; ?>"
                name="category"
                value="<?php echo esc_attr($category->slug); ?>"
                aria-label="Filter für <?php echo esc_attr($category->name); ?>">
              <label class="team-filter__label" for="<?php echo $checkbox_id; ?>">
                <span class="team-filter__text"><?php echo esc_html($category->name); ?></span>
                <img
                  class="team-filter__icon"
                  src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/plus.svg'); ?>"
                  alt="Symbol für hinzufügen"
                  aria-hidden="true"
                  width="12"
                  height="12">
              </label>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="team-filter__item--empty" role="alert">Keine Kategorien gefunden.</p>
      <?php endif; ?>

      <div class="team-filter__location">
        <select name="location" id="location-filter" class="team-filter__select">
          <option value="">Alle Standorte</option>
          <?php
          // Only show locations that are available in the current set of people
          $locations = get_posts(array(
            'post_type'      => 'standort',
            'posts_per_page' => -1,
            'orderby'        => 'title',
            'order'          => 'ASC',
            'post__in'       => $available_location_ids
          ));

          foreach ($locations as $location): ?>
            <option value="<?php echo esc_attr($location->ID); ?>">
              <?php echo esc_html($location->post_title); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </form>
  </div>
</div>