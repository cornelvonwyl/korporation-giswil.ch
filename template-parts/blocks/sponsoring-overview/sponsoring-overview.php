<?php

/**
 * Sponsoring Overview Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content from.
 * @param array $context The context provided to the block by the post or its parent block.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'sponsoring-overview-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sponsoring-overview';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

// Query sponsoring posts
$args = array(
    'post_type' => 'sponsoring',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
);

$sponsoring_query = new WP_Query($args);
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="sponsoring-overview__container">
        <?php if ($sponsoring_query->have_posts()) : ?>
            <div class="sponsoring-overview__items">
                <?php while ($sponsoring_query->have_posts()) : $sponsoring_query->the_post(); ?>
                    <?php
                    $link = get_field('link', get_the_ID());

                    if ($link) :
                        get_template_part('template-parts/elements/cta-list-item', null, array(
                            'title' => get_the_title(),
                            'link' => $link,
                            'is_external' => true
                        ));
                    endif;
                    ?>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p class="sponsoring-overview__no-items">Keine Sponsoring-Einträge gefunden.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>