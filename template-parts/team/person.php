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
    <?php if (get_field('phone', $person->ID)): ?>
      <a href="tel:<?php echo get_field('phone', $person->ID); ?>">
        <?php echo get_field('phone', $person->ID); ?>
      </a>
    <?php endif; ?>
    <?php if (get_field('mail', $person->ID)): ?>
      <a href="mailto:<?php echo get_field('mail', $person->ID); ?>">
        <?php echo get_field('mail', $person->ID); ?>
      </a>
    <?php endif; ?>
  </div>
</div>