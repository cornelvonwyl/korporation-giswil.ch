<?php

/**
 * Accordion Component
 * 
 * @param array $args {
 *     @type array $items Array of accordion items
 *     @type string $class Additional classes for the accordion wrapper
 * }
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!isset($args['items']) || empty($args['items'])) {
    return;
}

?>

<div class="accordions" role="presentation">
    <?php foreach ($args['items'] as $index => $item): ?>
        <div class="accordion accordion__item" role="heading" aria-level="3">
            <button class="accordion__trigger"
                aria-expanded="false"
                aria-controls="accordion-content-<?php echo esc_attr($index); ?>"
                id="accordion-trigger-<?php echo esc_attr($index); ?>">
                <div class="accordion__header">
                    <?php if (isset($item['category'])): ?>
                        <p class="accordion__category"><?php echo esc_html($item['category']); ?></p>
                    <?php endif; ?>

                    <?php if (isset($item['title'])): ?>
                        <h4 class="accordion__title"><?php echo esc_html($item['title']); ?></h4>
                    <?php endif; ?>
                </div>

                <div class="accordion__arrow-container">
                    <img class="accordion__arrow accordion__arrow--primary"
                        src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-down.svg'); ?>"
                        alt=""
                        width="24"
                        height="24"
                        aria-hidden="true">
                    <img class="accordion__arrow accordion__arrow--secondary"
                        src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-down.svg'); ?>"
                        alt=""
                        width="24"
                        height="24"
                        aria-hidden="true">
                </div>
            </button>
            <div class="accordion__content"
                id="accordion-content-<?php echo esc_attr($index); ?>"
                aria-labelledby="accordion-trigger-<?php echo esc_attr($index); ?>"
                role="region"
                hidden>
                <?php if (isset($item['content'])): ?>
                    <p class="accordion__content-inner">
                        <?php echo wp_kses_post($item['content']); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>