<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$year = get_field('year', get_the_ID());
$text = get_field('text', get_the_ID());
$images = get_field('images', get_the_ID());
?>

<article class="history-item animation-on-scroll">
    <?php if ($year) : ?>
        <h3 class="history-item__year"><?php echo esc_html($year); ?></h3>
    <?php endif; ?>

    <div class="history-item__content">
        <?php if ($text) : ?>
            <div class="history-item__text">
                <?php echo wp_kses_post($text); ?>
            </div>
        <?php endif; ?>

        <?php if ($images) : ?>
            <div class="history-item__images">
                <?php foreach ($images as $image) : ?>
                    <figure class="history-item__figure">
                        <?php echo wp_get_attachment_image($image['ID'], 'small', false, [
                            'loading' => 'lazy',
                            'decoding' => 'async',
                        ]); ?>
                        <?php if ($image['caption']) : ?>
                            <figcaption class="history-item__caption"><?php echo esc_html($image['caption']); ?></figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</article>