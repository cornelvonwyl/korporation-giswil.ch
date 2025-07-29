<?php

/**
 * Template part for displaying events list
 * 
 * @package vonweb
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Get today's date in YYYYMMDD format for comparison
$today = date('Ymd');

// Query arguments for upcoming events
$args = array(
    'post_type' => 'event',
    'posts_per_page' => 3,
    'orderby' => 'meta_value_num',
    'meta_key' => 'custom_date',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'custom_date',
            'value' => $today,
            'compare' => '>='
        )
    )
);

$events = new WP_Query($args);

// Check if query was successful
if (is_wp_error($events)) {
    return;
}
?>

<section class="events-list animation-on-scroll">
    <div class="events-list__container">
        <div class="events-list__wrapper">
            <h2>Veranstaltungen</h2>
            <div>
                <?php if ($events->have_posts()): ?>
                    <ul class="events-list__cards">
                        <?php while ($events->have_posts()): $events->the_post(); ?>
                            <li class="events-list__card">
                                <?php get_template_part('template-parts/events/events-card', null, [
                                    'post' => get_post()
                                ]); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>


                    <a class="events-list__more" href="/veranstaltungen">
                        Mehr Veranstaltungen
                    </a>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>