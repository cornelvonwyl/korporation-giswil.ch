<?php

/**
 * Template part for displaying services
 * 
 * @param array $args['services'] Optional. Array of services to display.
 * @param array $args['title'] Optional. Title for the section. Defaults to "Dienstleistungen".
 * @param bool $args['show_all'] Optional. If true, shows all services. If false, shows services by bereich.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Get parameters from args or set defaults
$services = isset($args['services']) ? $args['services'] : NULL;
$title = isset($args['title']) ? $args['title'] : 'Dienstleistungen';
$show_all = isset($args['show_all']) ? $args['show_all'] : false;

// If no services provided, query services
if (empty($services)) {
    if ($show_all) {
        // Query all services
        $services_query = new WP_Query(array(
            'post_type' => 'dienstleistung',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_status' => 'publish'
        ));
    } else {
        // Query related services for current bereich
        $current_post_id = get_the_ID();

        $services_query = new WP_Query(array(
            'post_type' => 'dienstleistung',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'fields',
                    'value' => '"' . $current_post_id . '"',
                    'compare' => 'LIKE'
                )
            )
        ));
    }

    $services = $services_query->have_posts() ? $services_query->posts : array();
    wp_reset_postdata();
}

if ($services && !empty($services)): ?>
    <section class="service-by">
        <div class="service-by__container">
            <h2><?php echo esc_html($title); ?></h2>

            <div class="service-by__grid swiper">
                <ul class="swiper-wrapper">
                    <?php foreach ($services as $service): ?>
                        <li class="service-by__item swiper-slide">
                            <?php
                            // Extract service data
                            $service_image = get_field('image', $service->ID);
                            $service_title = get_the_title($service->ID);
                            $service_link = get_permalink($service->ID);
                            $service_department = get_field('fields', $service->ID);

                            // Pass data as props to card-with-image
                            get_template_part('template-parts/components/card-with-image', null, [
                                'image' => $service_image ? $service_image['id'] : null,
                                'title' => $service_title,
                                'link' => $service_link,
                                'department' => $service_department
                            ]);
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="swiper-pagination"></div>

                <!--                 <div class="swiper-buttons">
                    <button type="button" class="swiper-button-prev swiper-button-prev-slider" aria-label="Vorheriges Element">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-left.svg'); ?>"
                            alt="Pfeil nach links"
                            width="24" height="24">
                    </button>
                    <button type="button" class="swiper-button-next swiper-button-next-slider" aria-label="Nächstes Element">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
                            alt="Pfeil nach rechts"
                            width="24" height="24">
                    </button>
                </div> -->
            </div>


        </div>
    </section>
<?php endif; ?>