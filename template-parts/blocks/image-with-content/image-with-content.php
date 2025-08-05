<?php

/**
 * Template Name: Image with Content Block
 * 
 * A flexible block template that displays an image alongside content with configurable layout options.
 * The image can be positioned on either side.
 *
 * @package vonweb
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}


// Create id attribute allowing for custom "anchor" value
$id = 'image-with-content-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values
$class_name = 'image-with-content';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

$image = get_field('image');
$image_position = get_field('image_position') ?: 'left';
$title = get_field('title');
$content = get_field('content');

// Add class modifiers
$class_name .= ' image-with-content--image-' . esc_attr($image_position);
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?> animation-on-scroll">
  <div class="image-with-content__container">
    <?php if ($image): ?>
      <?php
      echo wp_get_attachment_image($image['ID'], 'medium-size');
      ?>
    <?php endif; ?>

    <div class="image-with-content__content">

      <?php if ($title): ?>
        <h2 class="image-with-content__title"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>

      <?php if ($content): ?>
        <div class="image-with-content__text"><?php echo wp_kses_post($content); ?></div>
      <?php endif; ?>
    </div>
  </div>
</section>