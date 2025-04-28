<?php

/**
 * References Section Block Template.
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
$id = 'references-section-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'referenzen';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Query all references
$args = array(
    'post_type' => 'referenz',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);

$referenzen_query = new WP_Query($args);
$all_referenzen = $referenzen_query->have_posts() ? $referenzen_query->posts : array();

// Get unique service IDs from all references
$available_service_ids = array();
foreach ($all_referenzen as $referenz) {
    $service_references = get_field('service_references', $referenz->ID);
    if ($service_references) {
        foreach ($service_references as $service) {
            if (is_object($service) && isset($service->ID)) {
                $available_service_ids[] = $service->ID;
            }
        }
    }
}
$available_service_ids = array_unique($available_service_ids);
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="referenzen__container">

        <!-- Referenzen Filter -->
        <?php get_template_part('template-parts/referenzen/referenzen-filter', NULL, array(
            'available_service_ids' => $available_service_ids
        )); ?>

        <!-- Referenzen List -->
        <?php get_template_part('template-parts/referenzen/referenzen-overview', NULL, array(
            'referenzen' => $all_referenzen
        )); ?>
    </div>
</div>