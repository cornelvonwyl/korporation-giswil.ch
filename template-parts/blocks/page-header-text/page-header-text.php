<?php

/**
 * Page Header Text Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content from.
 * @param array $context The context provided to the block by the post or its parent block.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'page-header-text-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'page-header-text';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Define variables
$subtitle = get_field('subtitle');
$title = get_field('title');
$title_tag = get_field('title_tag');
$intro_text = get_field('intro_text');

// Preview fallbacks
if ($is_preview) {
    $subtitle = $subtitle ?: 'Untertitel';
    $title = $title ?: 'Haupttitel';
    $title_tag = $title_tag ?: 'h1';
    $intro_text = $intro_text ?: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.';
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="page-header-text__container">
        <?php if ($subtitle) : ?>
            <p class="page-header-text__subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>

        <?php if ($title) : ?>
            <<?php echo $title_tag; ?> class="page-header-text__title"><?php echo esc_html($title); ?></<?php echo $title_tag; ?>>
        <?php endif; ?>

        <?php if ($intro_text) : ?>
            <div class="page-header-text__text"><?php echo $intro_text; ?></div>
        <?php endif; ?>
    </div>
</div>