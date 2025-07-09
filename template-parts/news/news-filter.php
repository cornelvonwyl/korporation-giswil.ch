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
  <form id="news-filter-form" class="news-filter__form" role="group" aria-label="Bereiche Filter">
    <?php
    $bereiche = get_posts(array(
      'post_type' => 'bereich',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      'post_status' => 'publish'
    ));

    if (!empty($bereiche)): ?>
      <ul class="news-filter__checkboxes" role="group" aria-label="Filteroptionen">
        <?php foreach ($bereiche as $bereich):
          $checkbox_id = 'filter-' . esc_attr($bereich->post_name) . '-' . uniqid();
        ?>
          <li class="news-filter__checkbox">
            <input class="news-filter__input" type="checkbox" id="<?php echo $checkbox_id; ?>" name="bereich"
              value="<?php echo esc_attr($bereich->post_name); ?>"
              aria-label="Filter für <?php echo esc_attr($bereich->post_title); ?>">
            <label class="news-filter__label" for="<?php echo $checkbox_id; ?>">
              <span class="news-filter__text"><?php echo esc_html($bereich->post_title); ?></span>
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
      <p class="news-filter__item--empty" role="alert">Keine Bereiche gefunden.</p>
    <?php endif; ?>
  </form>
</div>