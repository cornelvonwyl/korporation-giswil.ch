<?php

/**
 * Accordion Component
 * 
 * @param array $args {
 *     @type string $title Accordion title
 *     @type string $text Accordion content text
 *     @type string $id Unique identifier for the accordion (optional)
 * }
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!isset($args['title']) || !isset($args['text'])) {
    return;
}

$accordion_id = isset($args['id']) ? $args['id'] : uniqid('accordion-');

?>

<div class="accordion" data-accordion>
    <button class="accordion__trigger"
        aria-expanded="false"
        aria-controls="<?php echo esc_attr($accordion_id); ?>">
        <span class="accordion__title">
            <?php echo esc_html($args['title']); ?>
        </span>
        <svg class="accordion__icon"
            width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <div class="accordion__content"
        role="region"
        hidden>
        <?php if ($args['text']): ?>
            <div class="accordion__content-inner">
                <?php echo wp_kses_post($args['text']); ?>
            </div>
        <?php endif; ?>
    </div>
</div>