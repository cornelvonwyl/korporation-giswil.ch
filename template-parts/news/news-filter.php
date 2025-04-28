<?php

/**
 * The template part for displaying the news category filter.  
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vonweb
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>


<div class="news-filter">
  <div class="news-filter__container">
    <form id="news-filter-form" class="news-filter__form" role="group" aria-label="Kategorien Filter">
      <?php
      $categories = get_categories(array(
        'hide_empty' => TRUE,
        'orderby' => 'name',
        'order' => 'ASC'
      ));

      if (!empty($categories)): ?>
        <ul class="news-filter__checkboxes" role="group" aria-label="Filteroptionen">
          <?php foreach ($categories as $category):
            $checkbox_id = 'filter-' . esc_attr($category->slug) . '-' . uniqid();
          ?>
            <li class="news-filter__checkbox">
              <input class="news-filter__input" type="checkbox" id="<?php echo $checkbox_id; ?>" name="category"
                value="<?php echo esc_attr($category->slug); ?>"
                aria-label="Filter für <?php echo esc_attr($category->name); ?>">
              <label class="news-filter__label" for="<?php echo $checkbox_id; ?>">
                <span class="news-filter__text"><?php echo esc_html($category->name); ?></span>
                <img class="news-filter__icon"
                  src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/plus.svg'); ?>"
                  alt="Symbol für hinzufügen"
                  aria-hidden="true"
                  width="12" height="12">
              </label>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="news-filter__item--empty" role="alert">Keine Kategorien gefunden.</p>
      <?php endif; ?>
    </form>
  </div>
</div>