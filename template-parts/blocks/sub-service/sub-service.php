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

// Load values and assign defaults.
$icon = get_field('icon');
$subtitle = get_field('subtitle') ?: ($is_preview ? 'Beispiel Untertitel' : '');
$title = get_field('title') ?: ($is_preview ? 'Beispiel Titel für den Block' : '');
$content = get_field('text') ?: ($is_preview ? '<p>Dies ist ein Beispieltext, der angezeigt wird, wenn im Editor kein Inhalt eingegeben wurde. Hier können Beschreibungen, Erklärungen oder andere wichtige Informationen stehen.</p>' : '');
$link = get_field('link');
?>

<article id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
  <?php if ($icon): ?>
    <div class="sub-service__icon" aria-hidden="true">
      <?php echo wp_get_attachment_image($icon['ID'], 'small', FALSE, array(
        'class' => 'sub-service__icon-img',
        'alt' => '',
      )); ?>
    </div>
  <?php endif; ?>

  <?php if ($title): ?>
    <h3 class="sub-service__title"><?php echo esc_html($title); ?></h3>
  <?php endif; ?>

  <?php if ($content): ?>
    <div class="sub-service__content">
      <?php echo wp_kses_post($content); ?>
    </div>
  <?php endif; ?>
</article>