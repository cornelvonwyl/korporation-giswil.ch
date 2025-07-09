<?php

/**
 * Template part for displaying related references by service
 * 
 * @param array $args['referenzen'] Optional. Array of referenzen to display.
 * @param array $args['title'] Optional. Title for the section. Defaults to "Referenzen".
 * @param array $args['subtitle'] Optional. Subtitle for the section. Defaults to "Unsere Meisterwerke".
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$referenzen = isset($args['referenzen']) ? $args['referenzen'] : NULL;
$title = isset($args['title']) ? $args['title'] : 'Referenzen';
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : 'Unsere Meisterwerke';
$button = isset($args['button']) ? $args['button'] : TRUE;

if ($referenzen && !empty($referenzen)): ?>
  <section class="referenzen-slider ">
    <div class="referenzen-slider__container">
      <div class="referenzen-slider__header">
        <p class="referenzen-slider__subtitle"><?php echo esc_html($subtitle); ?></p>
        <h2><?php echo esc_html($title); ?></h2>
      </div>

      <div class="referenzen-slider__grid swiper">
        <ul class="swiper-wrapper">
          <?php foreach ($referenzen as $referenz): ?>
            <li class="referenzen__item swiper-slide">
              <?php get_template_part('template-parts/referenzen/referenz-card', NULL, ['referenz' => $referenz]); ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="swiper-buttons">
        <button type="button" class="swiper-button-prev swiper-button-prev-slider" aria-label="Vorheriges Element">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-left.svg'); ?>"
            alt="Pfeil nach links"
            width="24" height="24">
        </button>
        <button type="button" class="swiper-button-next swiper-button-next-slider" aria-label="Nächstes Element">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
            alt="Pfeil nach rechts"
            width="24" height="24">
        </button>
      </div>

      <?php if ($button): ?>
        <div class="referenzen-slider__button">
          <a href="/referenzen" class="button primary-button">Alle Referenzen</a>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>