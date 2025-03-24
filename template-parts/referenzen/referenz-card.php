<?php

/**
 * Template part for displaying a single reference
 * 
 * @param array $args Template arguments
 */

// Extract referenz from passed arguments
$referenz = isset($args['referenz']) ? $args['referenz'] : NULL;

if (!$referenz)
  return;
?>

<a href="<?php echo get_permalink($referenz->ID); ?>" class="referenz-card full-element-link">
  <div class="referenz-card__image">
    <?php
    if (has_post_thumbnail($referenz->ID)) {
      echo get_the_post_thumbnail($referenz->ID, 'medium');
    }
    ?>
  </div>

  <h4 class="referenz-card__title"><?php echo get_the_title($referenz->ID); ?></h4>
  <?php if (get_field('location', $referenz->ID)): ?>
    <p class="referenz-card__location"><?php echo get_field('location', $referenz->ID); ?></p>
  <?php endif; ?>

  <?php
  $referenz_types = get_the_terms($referenz->ID, 'referenz-type');
  if ($referenz_types && !is_wp_error($referenz_types)): ?>
    <div class="referenz-card__categories">
      <?php foreach ($referenz_types as $type): ?>
        <span class="category-tag"><?php echo esc_html($type->name); ?></span>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</a>