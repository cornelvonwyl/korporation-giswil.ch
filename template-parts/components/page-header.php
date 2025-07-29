<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$title = $args['title'] ?? get_the_title();
$image = $args['image'] ?? null;
?>

<div class="page-header">
    <div class="page-header__container">
        <div class="page-header__content">
            <div class="page-header__breadcrumb">
                <?php get_template_part('template-parts/components/breadcrumb', null, [
                    'items' => [
                        ['title' => $title]
                    ]
                ]); ?>
            </div>

            <h1 class="page-header__title">
                <?php echo esc_html($title); ?>
            </h1>
        </div>

        <?php if ($image): ?>
            <div class="page-header__image">
                <?php echo wp_get_attachment_image($image['id'], 'large', false, ['class' => 'page-header__image-element']); ?>
            </div>
        <?php endif; ?>
    </div>
</div>