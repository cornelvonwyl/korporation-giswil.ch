<?php

/**
 * The template part for displaying the teams category filter.  
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vonweb
 */
?>
<div class="team-filter">
  <div class="team-filter__container">
    <form id="team-filter-form" class="team-filter__form" role="group" aria-label="Team Kategorien Filter">
      <?php
      $categories = get_terms(array(
        'taxonomy' => 'person-category',
        'hide_empty' => TRUE,
        'orderby' => 'name',
        'order' => 'ASC'
      ));



      if (!empty($categories) && !is_wp_error($categories)): ?>
        <ul class="team-filter__checkboxes" role="group" aria-label="Filteroptionen">
          <?php foreach ($categories as $category):
            $checkbox_id = 'filter-' . esc_attr($category->slug) . '-' . uniqid();
          ?>
            <li class="team-filter__checkbox">
              <input class="team-filter__input" type="checkbox" id="<?php echo $checkbox_id; ?>" name="category"
                value="<?php echo esc_attr($category->slug); ?>"
                aria-label="Filter für <?php echo esc_attr($category->name); ?>">
              <label class="team-filter__label" for="<?php echo $checkbox_id; ?>">
                <span class="team-filter__text"><?php echo esc_html($category->name); ?></span>
                <img class="team-filter__icon"
                  src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/plus.svg'); ?>" alt="Symbol für hinzufügen"
                  aria-hidden="true"
                  width="12" height="12">
              </label>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="team-filter__item--empty" role="alert">Keine Kategorien gefunden.</p>
      <?php endif; ?>


      <?php
      // Get all standort posts
      $locations = get_posts(array(
        'post_type' => 'standort',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
      ));

      if (!empty($locations)): ?>
        <div class="team-filter__location">
          <select name="location" id="location-filter" class="team-filter__select">
            <option value="">Standort</option>
            <?php foreach ($locations as $location): ?>
              <option value="<?php echo esc_attr($location->ID); ?>">
                <?php echo esc_html($location->post_title); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      <?php endif; ?>
    </form>
  </div>
</div>