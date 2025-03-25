<?php
$year = get_field('year', get_the_ID());
$text = get_field('text', get_the_ID());
$images = get_field('images', get_the_ID());
?>

<article class="history-item">
    <?php if ($year) : ?>
        <div class="history-year">
            <h3><?php echo esc_html($year); ?></h3>
        </div>
    <?php endif; ?>

    <div class="history-content">
        <?php if ($text) : ?>
            <div class="history-text">
                <?php echo wp_kses_post($text); ?>
            </div>
        <?php endif; ?>

        <?php if ($images) : ?>
            <div class="history-images">
                <?php foreach ($images as $image) : ?>
                    <figure class="history-image">
                        <?php echo wp_get_attachment_image($image['ID'], 'medium'); ?>
                        <?php if ($image['caption']) : ?>
                            <figcaption><?php echo esc_html($image['caption']); ?></figcaption>
                        <?php endif; ?>
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</article>