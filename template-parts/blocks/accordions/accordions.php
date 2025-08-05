<?php

/**
 * Accordions Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Create id attribute allowing for custom "anchor" value.
$id = 'accordions-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'accordions-block';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$accordions = get_field('accordions');

if (!$accordions || !have_rows('accordions')) {
  return;
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
  <div class="accordions" role="presentation">
    <?php
    $index = 0;
    while (have_rows('accordions')): the_row();
      $title = get_sub_field('title');
      $text = get_sub_field('text');

      if (!$title && !$text) {
        continue;
      }

      // Prepare accordion component arguments
      $accordion_args = array(
        'title' => $title,
        'text' => $text,
        'id' => $id . '-content-' . $index
      );

      // Include the accordion component
      get_template_part('template-parts/components/accordion', null, $accordion_args);
    ?>
    <?php
      $index++;
    endwhile;
    ?>
  </div>
</div>