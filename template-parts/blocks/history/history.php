<?php

/**
 * Block Name: Geschichte
 * Description: Zeigt eine chronologische Übersicht der Firmengeschichte an.
 */
$block_classes = ['block-history'];

// Create id attribute allowing for custom "anchor" value.
$id = 'history-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-history';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load history items
$args = array(
    'post_type' => 'geschichte',
    'posts_per_page' => -1,
    'orderby' => 'meta_value_num',
    'meta_key' => 'year',
    'order' => 'ASC'
);

$history_query = new WP_Query($args);

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if ($history_query->have_posts()) : ?>
            <div class="history-timeline">
                <?php while ($history_query->have_posts()) : $history_query->the_post(); ?>
                    <?php get_template_part('template-parts/history/history-item', null, ['post' => get_post()]); ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>