<?php

/**
 * The template part for displaying the jobs location filter.  
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vonweb
 */

$args = $args ?? array();
$available_locations = $args['available_locations'] ?? array();
?>
<div class="jobs-filter">
  <div class="jobs-filter__container">
    <form id="jobs-filter-form" class="jobs-filter__form" role="group" aria-label="Jobs Standort Filter">
      <?php
      if (!empty($available_locations)): ?>
        <ul class="jobs-filter__checkboxes" role="group" aria-label="Filteroptionen">
          <?php foreach ($available_locations as $location_id):
            $location = get_post($location_id);
            if (!$location) continue;
            
            $checkbox_id = 'location-' . esc_attr($location->ID);
          ?>
            <li class="jobs-filter__checkbox">
              <input class="jobs-filter__input" type="checkbox" id="<?php echo $checkbox_id; ?>" name="location"
                value="<?php echo esc_attr($location->ID); ?>"
                aria-label="Filter für <?php echo esc_attr($location->post_title); ?>">
              <label class="jobs-filter__label" for="<?php echo $checkbox_id; ?>">
                <span class="jobs-filter__text"><?php echo esc_html($location->post_title); ?></span>
                <img class="jobs-filter__icon"
                  src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/plus.svg'); ?>" alt=""
                  aria-hidden="true">
              </label>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="jobs-filter__item--empty" role="alert">Keine Standorte gefunden.</p>
      <?php endif; ?>
    </form>
  </div>
</div>