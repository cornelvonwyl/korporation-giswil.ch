<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>
<main>

    <div class="main-wrapper events-single">

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article class="main-content">


                    <?php get_template_part('template-parts/components/breadcrumb', NULL, [
                        'items' => [
                            ['title' => 'Veranstaltungen', 'url' => '/veranstaltungen'],
                        ]
                    ]); ?>

                    <div class="events-single__container">

                        <div class="events-single__header">

                            <div>
                                <h1 class="events-single__title">
                                    <?php the_title(); ?>
                                </h1>

                                <div class="events-single__summary">
                                    <?php
                                    $custom_date = get_field('custom_date');
                                    $time = get_field('time');
                                    $place = get_field('place');
                                    ?>

                                    <?php if ($custom_date || $time): ?>
                                        <div class="events-single__info-item">
                                            <h4 class="events-single__info-title">Datum & Uhrzeit</h4>
                                            <p class="events-single__info-content">
                                                <?php
                                                if ($custom_date) {
                                                    echo esc_html($custom_date);
                                                    if ($time) {
                                                        echo ', ' . esc_html($time);
                                                    }
                                                } elseif ($time) {
                                                    echo esc_html($time);
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($place): ?>
                                        <div class="events-single__info-item">
                                            <h4 class="events-single__info-title">Ort</h4>
                                            <p class="events-single__info-content">
                                                <?php echo esc_html($place); ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (get_field('subscribe')): ?>
                                        <div class="events-single__cta">
                                            <a href="#" class="button events-single__button">
                                                Zur Anmeldung
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>



                            <hr>

                        </div>



                        <div class="events-single__content prose">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </article>

        <?php endwhile;
        endif; ?>

    </div>

</main>
<?php get_footer(); ?>