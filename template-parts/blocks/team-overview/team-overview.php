<?php

/**
 * Team Overview Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content from.
 * @param array $context The context provided to the block by the post or its parent block.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-overview-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team-overview';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="team-overview__container">
        <!-- Team Filter -->
        <?php get_template_part('template-parts/team/team-filter'); ?>

        <!-- Team Overview -->
        <?php get_template_part('template-parts/team/team-overview'); ?>
    </div>
</div>