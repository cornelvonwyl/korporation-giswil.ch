<?php
/**
 * Jobs Overview Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during backend preview render.
 * @param int $post_id The post ID the block is rendering content from.
 * @param array $context The context provided to the block by the post or its parent block.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'jobs-overview-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'jobs-overview';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Query arguments for all jobs
$args = array(
    'post_type' => 'stelle',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

$jobs_query = new WP_Query($args);

if (is_wp_error($jobs_query)) {
    return;
}

// Collect all unique locations from jobs
$available_locations = [];
if ($jobs_query->have_posts()) {
    while ($jobs_query->have_posts()) {
        $jobs_query->the_post();
        $location = get_field('location', get_the_ID());
        if ($location && !in_array($location->ID, $available_locations)) {
            $available_locations[] = $location->ID;
        }
    }
    wp_reset_postdata();
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="jobs-overview__container">
        <!-- Jobs Filter -->
        <?php get_template_part('template-parts/jobs/jobs-filter', null, array(
            'available_locations' => $available_locations
        )); ?>

        <!-- Jobs Overview -->
        <?php get_template_part('template-parts/jobs/jobs-overview', null, array(
            'jobs_query' => $jobs_query
        )); ?>
    </div>
</div> 