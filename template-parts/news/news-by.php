<?php

/**
 * Template part for displaying related news by bereich
 * 
 * @param array $args['news'] Optional. Array of news to display.
 * @param array $args['title'] Optional. Title for the section. Defaults to "News".
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Get parameters from args or set defaults
$news = isset($args['news']) ? $args['news'] : NULL;
$title = isset($args['title']) ? $args['title'] : 'News';

// If no news provided, query related news for current bereich
if (empty($news)) {
    $current_post_id = get_the_ID();

    // Query for news that reference this bereich in their "fields" field
    $news_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key' => 'fields',
                'value' => '"' . $current_post_id . '"',
                'compare' => 'LIKE'
            )
        )
    ));

    $news = $news_query->have_posts() ? $news_query->posts : array();
    wp_reset_postdata();
}

if ($news && !empty($news)): ?>
    <section class="news-by">
        <div class="news-by__container">
            <h2><?php echo esc_html($title); ?></h2>

            <ul class="news-by__grid">
                <?php foreach ($news as $news_post): ?>
                    <li class="news-by__item">
                        <?php
                        // Pass the post object directly to the card template
                        get_template_part('template-parts/news/news-card', null, [
                            'post' => $news_post
                        ]);
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>