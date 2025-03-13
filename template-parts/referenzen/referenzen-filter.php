<?php

/**
 * The template part for displaying the referenzen filter.  
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package your-theme-name
 */
?>
<div class="referenzen-filter">
  <div class="referenzen-filter__container">


    <form id="referenzen-filter-form" class="referenzen-filter__form" role="group" aria-label="Dienstleistungen Filter">
      <?php
      $services = get_posts(array(
        'post_type' => 'dienstleistung',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
      ));

      if (!empty($services)): ?>
        <div class="referenzen-filter__checkboxes" role="group" aria-label="Filteroptionen">
          <?php foreach ($services as $service):
            $checkbox_id = 'filter-' . esc_attr($service->post_name) . '-' . uniqid();
            ?>
            <div class="referenzen-filter__checkbox">
              <input class="referenzen-filter__input" type="checkbox" id="<?php echo $checkbox_id; ?>" name="dienstleistung"
                value="<?php echo esc_attr($service->post_name); ?>"
                aria-label="Filter für <?php echo esc_attr($service->post_title); ?>">
              <label class="referenzen-filter__label" for="<?php echo $checkbox_id; ?>">
                <span class="referenzen-filter__text"><?php echo esc_html($service->post_title); ?></span>
                <img class="referenzen-filter__icon"
                  src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/plus.svg'); ?>" alt=""
                  aria-hidden="true">
              </label>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p class="referenzen-filter__item--empty" role="alert">Keine Referenzen gefunden.</p>
      <?php endif; ?>
    </form>
  </div>
</div>