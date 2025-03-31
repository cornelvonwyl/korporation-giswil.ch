<?php

/**
 * Image with Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 */

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
$title_variant = get_field('title_variant') ?: 'horizontal';
$content = get_field('content');

// Füge Klassenmodifizierer hinzu
$class_name .= ' image-with-content--image-' . $image_position;
$class_name .= ' image-with-content--title-' . $title_variant;
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
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
        <div class="image-with-content__text prose"><?php echo wp_kses_post($content); ?></div>
      <?php endif; ?>
    </div>
  </div>
</section>