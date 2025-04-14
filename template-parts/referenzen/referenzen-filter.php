<?php

/**
 * The template part for displaying the referenzen filter.  
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package your-theme-name
 */

// Get available service IDs from passed arguments
$available_service_ids = isset($args['available_service_ids']) ? $args['available_service_ids'] : array();
?>

<div class="referenzen-filter">
  <div class="referenzen-filter__container">
    <form id="referenzen-filter-form" class="referenzen-filter__form" role="group" aria-label="Dienstleistungen Filter">
      <?php
      $services = get_posts(array(
        'post_type' => 'dienstleistung',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'post__in' => $available_service_ids // Only get services that have references
      ));

      if (!empty($services)): ?>
        <ul class="referenzen-filter__checkboxes" role="group" aria-label="Filteroptionen">
          <?php foreach ($services as $service):
            $checkbox_id = 'filter-' . esc_attr($service->post_name) . '-' . uniqid();
          ?>
            <li class="referenzen-filter__checkbox">
              <input class="referenzen-filter__input" type="checkbox" id="<?php echo $checkbox_id; ?>" name="service"
                value="<?php echo esc_attr($service->post_name); ?>"
                aria-label="Filter für <?php echo esc_attr($service->post_title); ?>">
              <label class="referenzen-filter__label" for="<?php echo $checkbox_id; ?>">
                <span class="referenzen-filter__text"><?php echo esc_html($service->post_title); ?></span>
                <img class="referenzen-filter__icon"
                  src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/plus.svg'); ?>" alt="Symobl für hinzufügen"
                  aria-hidden="true"
                  width="12" height="12">
              </label>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="referenzen-filter__item--empty" role="alert">Keine Referenzen gefunden.</p>
      <?php endif; ?>
    </form>
  </div>
</div>