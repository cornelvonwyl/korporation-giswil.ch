<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Get data from props or fallback to global functions for backwards compatibility
$image = isset($args['image']) ? $args['image'] : null;
$title = isset($args['title']) ? $args['title'] : get_the_title();
$link = isset($args['link']) ? $args['link'] : null;
$content = isset($args['content']) ? $args['content'] : null;
$department = isset($args['department']) ? $args['department'] : null;
?>

<article class="card-with-image">
  <?php if ($link): ?>
    <a href="<?php echo esc_url($link); ?>" class="card-with-image__link full-element-link">
    <?php else: ?>
      <div class="card-with-image__link">
      <?php endif; ?>

      <?php if ($image): ?>
        <div class="card-with-image__image">
          <?php echo wp_get_attachment_image($image, 'medium-size', false, ['class' => 'card-with-image__image-element']); ?>
        </div>
      <?php endif; ?>

      <?php if ($department): ?>
        <p class="card-with-image__department">
          <?php
          // Handle department data (Post Object field with multiple values)
          if (is_array($department)) {
            // Multiple departments
            $department_names = array();
            foreach ($department as $dept) {
              $department_names[] = get_the_title($dept);
            }
            echo esc_html(implode(', ', $department_names));
          } else {
            // Single department
            echo esc_html(get_the_title($department));
          }
          ?>
        </p>
      <?php endif; ?>

      <div class="card-with-image__content">
        <h3 class="card-with-image__title"><?php echo esc_html($title); ?></h3>

        <?php if ($content): ?>
          <div class="card-with-image__description">
            <?php echo wp_kses_post($content); ?>
          </div>
        <?php endif; ?>

        <?php if ($link): ?>
          <div class="card-with-image__arrow arrow">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right-up.svg'); ?>"
              alt=""
              width="24"
              height="24"
              aria-hidden="true">
          </div>
        <?php endif; ?>
      </div>

      <?php if ($link): ?>
    </a>
  <?php else: ?>
    </div>
  <?php endif; ?>
</article>