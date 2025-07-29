<?php

/**
 * Page Header Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @return  void
 */


if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Create id attribute allowing for custom "anchor" value
$id = 'page-header-' . $block['id'];

if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values
$class_name = 'page-header';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Get field values
$image = get_field('image');
$title = get_field('title');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
  <?php get_template_part('template-parts/components/page-header', null, [
    'title' => $title,
    'image' => $image
  ]); ?>
</section>