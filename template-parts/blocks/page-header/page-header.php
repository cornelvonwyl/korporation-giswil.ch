<?php

/**
 * Image with Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 */

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
if (!empty($block['align'])) {
  $class_name .= ' align' . $block['align'];
}

$image = get_field('image');
$subtitle = get_field('subtitle') ?: ($is_preview ? 'Beispiel Untertitel' : '');
$title = get_field('title') ?: ($is_preview ? 'Beispiel Titel für den Block' : '');
$content = get_field('content') ?: ($is_preview ? '<p>Dies ist ein Beispieltext, der angezeigt wird, wenn im Editor kein Inhalt eingegeben wurde. Hier können Beschreibungen, Erklärungen oder andere wichtige Informationen stehen.</p>' : '');

// Fallback image for preview
$has_image = !empty($image);
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
  <div class="page-header__container">
    <?php if ($has_image): ?>
      <?php
      echo wp_get_attachment_image($image['ID'], 'huge', false, array('class' => 'page-header__image'));
      ?>
    <?php endif; ?>

    <div class="page-header__content">
      <?php if ($subtitle): ?>
        <p class="page-header__subtitle"><?php echo esc_html($subtitle); ?></p>
      <?php endif; ?>

      <?php if ($title): ?>
        <h1 class="page-header__title"><?php echo esc_html($title); ?></h1>
      <?php endif; ?>

      <?php if ($content): ?>
        <div class="page-header__text"><?php echo wp_kses_post($content); ?></div>
      <?php endif; ?>

      <a href="#" class="page-header__link is-link">Mehr</a>
    </div>
  </div>
</section>