<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Get data from props or fallback to global functions for backwards compatibility
$image = isset($args['image']) ? $args['image'] : get_field('image');
$title = isset($args['title']) ? $args['title'] : get_the_title();
$link = isset($args['link']) ? $args['link'] : get_permalink();
$fields = isset($args['fields']) ? $args['fields'] : get_field('fields');
?>

<li class="animation-on-scroll">
  <a href="<?php echo esc_url($link); ?>" class="full-element-link">
    <article class="service-card">

      <?php if ($image): ?>
        <div class="service-card__image">
          <?php echo wp_get_attachment_image($image['ID'], 'medium-size', false, ['class' => 'service-card__image-element']); ?>
        </div>
      <?php endif; ?>

      <div class="service-card__content">
        <h3 class="service-card__title"><?php echo esc_html($title); ?></h3>

        <div class="service-card__link">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right-up.svg'); ?>"
            alt="Pfeil nach rechts oben"
            width="24" height="24">
        </div>
      </div>

    </article>
  </a>
</li>