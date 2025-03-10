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
  <form id="referenzen-filter-form" class="referenzen-filter__form" role="group">
    <?php
    $referenzen_terms = get_terms(array(
      'taxonomy' => 'leistung',
      'hide_empty' => TRUE,
    ));

    if (!empty($referenzen_terms) && !is_wp_error($referenzen_terms)): ?>
      <?php foreach ($referenzen_terms as $term): ?>

        <div class="checkbox-wrapper">
          <input type="checkbox" id="filter-<?php echo esc_attr($term->slug); ?>" name="referenz"
            value="<?php echo esc_attr($term->slug); ?>">
          <label for="filter-<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></label>
        </div>

      <?php endforeach;
    else: ?>
      <p class="referenzen-filter__item--empty">Keine Referenzen gefunden.</p>
    <?php endif; ?>
  </form>
</div>