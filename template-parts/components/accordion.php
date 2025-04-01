<?php
/**
 * Accordion Component
 * 
 * @param array $args {
 *     @type array $items Array of accordion items
 *     @type string $class Additional classes for the accordion wrapper
 * }
 */

if (!isset($args['items']) || empty($args['items'])) {
    return;
}

$wrapper_class = isset($args['class']) ? 'accordion ' . $args['class'] : 'accordion';
?>

<div class="<?php echo esc_attr($wrapper_class); ?>">
    <?php foreach ($args['items'] as $item): ?>
        <div class="accordion__item">
            <button class="accordion__trigger">
                <?php if (isset($item['category'])): ?>
                    <span class="accordion__category"><?php echo esc_html($item['category']); ?></span>
                <?php endif; ?>
                
                <?php if (isset($item['title'])): ?>
                    <h4 class="accordion__title"><?php echo esc_html($item['title']); ?></h4>
                <?php endif; ?>
                
                <span class="accordion__icon">↓</span>
            </button>
            <div class="accordion__content">
                <?php if (isset($item['content'])): ?>
                    <div class="accordion__content-inner">
                        <?php echo wp_kses_post($item['content']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div> 