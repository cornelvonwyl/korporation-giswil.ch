<?php

/**
 *
 * @param   array  $block    The block settings and attributes.
 * @param   string $content  The block inner HTML (empty).
 * @param   bool   $is_preview True during backend preview render.
 * @param   int    $post_id  The post ID the block is rendering content against.
 *                           This is either the post ID currently being displayed inside a query loop,
 *                           or the post ID of the post hosting this block.
 * @param   array  $context  The context provided to the block by the post or its parent block.
 */

// Load images field or provide a default fallback.
$images = get_field('images') ?: array(
  array(
    'ID' => 58,
    'url' => 'https://via.placeholder.com/600x400',
    'alt' => 'Dummy image',
    'caption' => __('Ein Beispiel-Bild', 'your-textdomain')
  )
);
?>

<section class="images-small-block">
  <?php foreach ($images as $image): ?>
    <figure class="images-small-block__image">
      <?php
      $caption = esc_html($image['caption'] ?? '');
      echo wp_get_attachment_image($image['ID'], 'medium-size');
      ?>

      <?php if (!empty($caption)): ?>
        <figcaption>
          <?php echo $caption; ?>
        </figcaption>
      <?php endif; ?>
    </figure>
  <?php endforeach; ?>
</section>