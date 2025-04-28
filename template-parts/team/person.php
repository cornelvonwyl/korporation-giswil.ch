<?php

/**
 * Template part for displaying a single person
 * 
 * @param array $args Template arguments
 */


if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Extract person from passed arguments
$person = isset($args['person']) ? $args['person'] : NULL;

if (!$person)
  return;
?>

<div class="person animation-on-scroll">
  <div class="person__image">
    <?php if (get_field('portrait', $person->ID)): ?>
      <?php echo wp_get_attachment_image(get_field('portrait', $person->ID), 'small'); ?>
    <?php endif; ?>
  </div>

  <h4 class="person__name">
    <?php if (get_field('first_name', $person->ID)): ?>
      <?php echo esc_html(get_field('first_name', $person->ID)); ?>
    <?php endif; ?>

    <?php if (get_field('last_name', $person->ID)): ?>
      <?php echo esc_html(get_field('last_name', $person->ID)); ?>
    <?php endif; ?>
  </h4>

  <?php if (get_field('function', $person->ID)): ?>
    <p class="person__function"><?php echo get_field('function', $person->ID); ?></p>
  <?php endif; ?>


  <div class="person__contact">
    <?php if (get_field('mail', $person->ID)): ?>
      <p class="person__email">
        <span class="tooltip">
          <a href="mailto:<?php echo get_field('mail', $person->ID); ?>">
            Mail
          </a>
          <a href="mailto:<?php echo get_field('mail', $person->ID); ?>" class="tooltiptext">
            <?php echo get_field('mail', $person->ID); ?>
          </a>
        </span>
      </p>
    <?php endif; ?>

    <?php if (get_field('phone', $person->ID)): ?>
      <p class="person__phone">
        <span class="tooltip">
          <a href="tel:<?php echo get_field('phone', $person->ID); ?>">
            Telefon
          </a>
          <a href="tel:<?php echo get_field('phone', $person->ID); ?>" class="tooltiptext">
            <?php echo get_field('phone', $person->ID); ?>
          </a>
        </span>
      </p>
    <?php endif; ?>
  </div>
</div>