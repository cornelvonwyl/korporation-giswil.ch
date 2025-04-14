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

// Query all people
$args = array(
    'post_type' => 'person',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

$team_query = new WP_Query($args);
$all_people = $team_query->have_posts() ? $team_query->posts : array();

// Get unique location IDs from all people
$available_location_ids = array();
foreach ($all_people as $person) {
    $locations = get_field('location', $person->ID);
    if ($locations) {
        foreach ($locations as $location) {
            if (is_object($location) && isset($location->ID)) {
                $available_location_ids[] = $location->ID;
            }
        }
    }
}
$available_location_ids = array_unique($available_location_ids);
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="team-overview__container">
        <!-- Team Filter -->
        <?php get_template_part('template-parts/team/team-filter', null, array(
            'available_location_ids' => $available_location_ids
        )); ?>

        <!-- Team Overview -->
        <?php get_template_part('template-parts/team/team-overview', null, array(
            'people' => $all_people
        )); ?>
    </div>
</section>