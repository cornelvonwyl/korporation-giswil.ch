<?php

/**
 * News Overview Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content from.
 * @param array $context The context provided to the block by the post or its parent block.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Create id attribute allowing for custom "anchor" value.
$id = 'news-overview-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'news-overview';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="news-overview__container">

        <div class="news-overview__wrapper">
            <div class="news-overview__header">
                <h1>Neuigkeiten</h1>
                <!-- News Filter -->
                <!-- <?php get_template_part('template-parts/news/news-filter'); ?> -->
            </div>

            <!-- News List -->
            <?php get_template_part('template-parts/news/news-overview'); ?>
        </div>
    </div>
</div>