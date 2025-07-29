<?php

/**
 * Template part for displaying related events by bereich
 * 
 * @param array $args['events'] Optional. Array of events to display.
 * @param array $args['title'] Optional. Title for the section. Defaults to "Events".
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Get parameters from args or set defaults
$events = isset($args['events']) ? $args['events'] : NULL;
$title = isset($args['title']) ? $args['title'] : 'Events';

// If no events provided, query related events for current bereich
if (empty($events)) {
    $current_post_id = get_the_ID();

    // Query for events that reference this bereich in their "fields" field
    $events_query = new WP_Query(array(
        'post_type' => 'event',
        'posts_per_page' => -1,
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_key' => 'custom_date',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'fields',
                'value' => '"' . $current_post_id . '"',
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'custom_date',
                'value' => date('Y-m-d'),
                'compare' => '>=',
                'type' => 'DATE'
            )
        )
    ));

    $events = $events_query->have_posts() ? $events_query->posts : array();
    wp_reset_postdata();
}

if ($events && !empty($events)): ?>
    <section class="events-by">
        <div class="events-by__container">
            <h2><?php echo esc_html($title); ?></h2>

            <ul class="events-by__grid">
                <?php foreach ($events as $event_post): ?>
                    <li class="events-by__item">
                        <?php
                        // Pass the post object directly to the card template
                        get_template_part('template-parts/events/events-card', null, [
                            'post' => $event_post
                        ]);
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>