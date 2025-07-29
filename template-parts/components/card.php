<?php

if (!defined('ABSPATH')) {
    exit;
}

$date = $args['date'] ?? '';
$title = $args['title'] ?? '';
$category = $args['category'] ?? '';
$link = $args['link'] ?? '#';
?>


<article class="card animation-on-scroll">
    <a href="<?php the_permalink(); ?>" class="card__link full-element-link">

        <div class="card__content">
            <?php if ($date): ?>
                <p class="card__date">
                    <?php echo esc_html($date); ?>
                </p>
            <?php endif; ?>


            <h3 class="card__title">
                <?php the_title(); ?>
            </h3>

            <?php if (!empty($category)): ?>
                <p class="card__category">
                    <?php echo esc_html($category->name); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="card__arrow arrow">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right-up.svg'); ?>"
                alt=""
                width="24"
                height="24"
                aria-hidden="true">
        </div>
    </a>
</article>