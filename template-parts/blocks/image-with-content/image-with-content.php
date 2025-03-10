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
if (!empty($block['align'])) {
  $class_name .= ' align' . $block['align'];
}

$image = get_field('image');
$image_position = get_field('image_position') ?: 'left';
$subtitle = get_field('subtitle') ?: ($is_preview ? 'Beispiel Untertitel' : '');
$title = get_field('title') ?: ($is_preview ? 'Beispiel Titel für den Block' : '');
$title_variant = get_field('title_variant') ?: 'horizontal';
$content = get_field('content') ?: ($is_preview ? '<p>Dies ist ein Beispieltext, der angezeigt wird, wenn im Editor kein Inhalt eingegeben wurde. Hier können Beschreibungen, Erklärungen oder andere wichtige Informationen stehen.</p>' : '');
$link = get_field('link');

// Füge Klassenmodifizierer hinzu
$class_name .= ' image-with-content--image-' . $image_position;
$class_name .= ' image-with-content--title-' . $title_variant;
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
  <div class="image-with-content__container">
    <?php if ($image): ?>
      <div class="image-with-content__image-wrap">
        <?php
        echo wp_get_attachment_image($image['ID'], 'full');
        ?>
      </div>
    <?php endif; ?>

    <div class="image-with-content__content">
      <?php if ($subtitle): ?>
        <div class="image-with-content__subtitle"><?php echo esc_html($subtitle); ?></div>
      <?php endif; ?>

      <?php if ($title): ?>
        <h2 class="image-with-content__title"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>

      <?php if ($content): ?>
        <div class="image-with-content__text"><?php echo wp_kses_post($content); ?></div>
      <?php endif; ?>

      <?php if ($link): ?>
        <a href="<?php echo esc_url($link['url']); ?>" class="image-with-content__link"
          target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
          <?php echo esc_html($link['title']); ?>
        </a>
      <?php elseif ($is_preview): ?>
        <a href="#" class="image-with-content__link">Beispiel-Link</a>
      <?php endif; ?>
    </div>
  </div>
</section>