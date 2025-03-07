<?php
/**
 * Sub Service Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'sub-service-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'sub-service';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$image = get_field('image');
$title = get_field('title');
$content = get_field('content');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
  <?php if ($image): ?>
    <div class="sub-service__image">
      <?php echo wp_get_attachment_image($image, 'medium', FALSE, array('class' => 'sub-service__img')); ?>
    </div>
  <?php endif; ?>

  <?php if ($title): ?>
    <h3 class="sub-service__title"><?php echo esc_html($title); ?></h3>
  <?php endif; ?>

  <?php if ($content): ?>
    <div class="sub-service__content">
      <?php echo $content; ?>
    </div>
  <?php endif; ?>
</div>