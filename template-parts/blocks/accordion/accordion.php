<?php

/**
 * Accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'accordion-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$title = get_field('title');
$text = get_field('text');

if (!$title && !$text) {
    return;
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="accordion accordion__item" role="heading" aria-level="3">
        <button class="accordion__trigger"
            aria-expanded="false"
            aria-controls="<?php echo esc_attr($id); ?>-content"
            id="<?php echo esc_attr($id); ?>-trigger">
            <div class="accordion__header">
                <?php if ($title): ?>
                    <h4 class="accordion__title"><?php echo esc_html($title); ?></h4>
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
            id="<?php echo esc_attr($id); ?>-content"
            aria-labelledby="<?php echo esc_attr($id); ?>-trigger"
            role="region"
            hidden>
            <?php if ($text): ?>
                <div class="accordion__content-inner prose">
                    <?php echo wp_kses_post($text); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>