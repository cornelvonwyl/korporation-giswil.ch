<?php

/**
 * Template Name: Downloads Block
 * Minimalistic downloads list block for ACF repeater structure.
 *
 * @package vonweb
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Create id attribute allowing for custom "anchor" value
$id = 'downloads-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$class_name = 'downloads';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
$downloads = get_field('downloads');
$title = get_field('title');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?> animation-on-scroll">
    <?php if ($downloads): ?>
        <?php if ($title): ?>
            <h2 class="downloads__title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <div class="downloads__list">
            <?php foreach ($downloads as $download_item): ?>
                <?php $download = $download_item['download'];
                if ($download): ?>
                    <article class="downloads__item">
                        <a href="<?php echo esc_url($download['url']); ?>" class="downloads__link" target="_blank" rel="noopener noreferrer">
                            <h3 class="downloads__item-title"><?php echo esc_html($download['title']); ?></h3>

                            <svg id="Ebene_1" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 24 24">
                                <defs>
                                    <style>
                                        .st0 {
                                            fill: none;
                                            stroke: #314049;
                                            stroke-miterlimit: 10;
                                            stroke-width: 1.5px;
                                        }
                                    </style>
                                </defs>
                                <polyline class="st0" points="4.5 11.3 12 18.8 19.5 11.3" />
                                <line class="st0" x1="12" y1="18.8" x2="12" y2="0" />
                                <line class="st0" x1=".7" y1="23.2" x2="23.3" y2="23.2" />
                            </svg>
                        </a>
                    </article>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="downloads__empty">
            <p class="downloads__empty-text">Keine Dokumente verfügbar</p>
        </div>
    <?php endif; ?>
</section>