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

<a href="<?php echo get_permalink($referenz->ID); ?>" class="referenz swiper-slide">
  <div class="referenz__image">
    <?php
    if (has_post_thumbnail($referenz->ID)) {
      echo get_the_post_thumbnail($referenz->ID, 'medium');
    }
    ?>
  </div>

  <h4><?php echo get_the_title($referenz->ID); ?></h4>
  <?php if (get_field('location', $referenz->ID)): ?>
    <p class="referenz__location"><?php echo get_field('location', $referenz->ID); ?></p>
  <?php endif; ?>
</a>