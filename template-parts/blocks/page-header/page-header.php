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
$link = get_field('link');

// Fallback image for preview
$has_image = !empty($image);
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
  <div class="page-header__container">
    <?php if ($has_image): ?>
      <div class="page-header__image-wrap">
        <?php
        echo wp_get_attachment_image($image['ID'], 'full');
        ?>
      </div>
    <?php endif; ?>

    <div class="page-header__content">
      <?php if ($subtitle): ?>
        <div class="page-header__subtitle"><?php echo esc_html($subtitle); ?></div>
      <?php endif; ?>

      <?php if ($title): ?>
        <h2 class="page-header__title"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>

      <?php if ($content): ?>
        <div class="page-header__text"><?php echo wp_kses_post($content); ?></div>
      <?php endif; ?>

      <?php if ($link): ?>
        <a href="<?php echo esc_url($link['url']); ?>" class="page-header__link"
          target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
          <?php echo esc_html($link['title']); ?>
        </a>
      <?php elseif ($is_preview): ?>
        <a href="#" class="page-header__link">Beispiel-Link</a>
      <?php endif; ?>
    </div>
  </div>
</div>