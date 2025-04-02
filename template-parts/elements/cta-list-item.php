<?php

/**
 * CTA List Item Component
 * 
 * @param string $title      The title text
 * @param array|string $link The link URL or ACF link array
 * @param bool $is_external  Whether the link is external
 */

// Set default arguments
$args = wp_parse_args($args, array(
    'title'       => '',
    'link'        => '',
    'is_external' => false
));

// Prepare variables
$link_url    = is_array($args['link']) ? $args['link']['url'] : $args['link'];
$is_external = $args['is_external'];
$icon_name   = $is_external ? 'arrow-right-up.svg' : 'arrow-right.svg';
$icon_url    = get_template_directory_uri() . '/src/assets/icons/' . $icon_name;
$alt_text    = $is_external ? 'Pfeil nach oben rechts' : 'Pfeil nach rechts';
?>

<a href="<?php echo esc_url($link_url); ?>"
    class="cta-list-item <?php echo $is_external ? ' cta-list-item--external' : ' cta-list-item--internal'; ?>"
    <?php echo $is_external ? 'target="_blank"' : ''; ?>>

    <h3 class="cta-list-item__title">
        <?php echo esc_html($args['title']); ?>
    </h3>

    <span class="cta-list-item__arrow-container <?php echo $is_external ? ' cta-list-item__arrow-container--external' : ' cta-list-item__arrow-container--internal'; ?>">
        <img class="cta-list-item__arrow cta-list-item__arrow--primary"
            src="<?php echo esc_url($icon_url); ?>"
            alt="<?php echo esc_attr($alt_text); ?>"
            width="24"
            height="24">
        <img class="cta-list-item__arrow cta-list-item__arrow--secondary"
            src="<?php echo esc_url($icon_url); ?>"
            alt="<?php echo esc_attr($alt_text); ?>"
            width="24"
            height="24">
    </span>
</a>