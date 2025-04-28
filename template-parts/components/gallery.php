<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$images = $images ?? get_field('images') ?: array(
  array(
    'ID' => 58,
    'url' => 'https://via.placeholder.com/600x400',
    'alt' => 'Dummy image',
    'caption' => 'Ein Beispiel-Bild'
  )
);

$number_of_images = count($images);
$unique_id = uniqid('images-block-');
?>

<section class="images-block" id="<?php echo esc_attr($unique_id); ?>">
  <?php if ($number_of_images === 1): ?>
    <?php foreach ($images as $image): ?>
      <figure class="images-block__image">
        <?php
        echo wp_get_attachment_image($image['ID'], 'huge');
        ?>
        <?php if (!empty($image['caption'])): ?>
          <figcaption><?php echo esc_html($image['caption']); ?></figcaption>
        <?php endif; ?>
      </figure>
    <?php endforeach; ?>
  <?php elseif ($number_of_images > 1): ?>
    <div class="swiper gallery">
      <div class="swiper-wrapper">
        <?php foreach ($images as $image): ?>
          <div class="swiper-slide">
            <figure class="images-block__image">
              <?php echo wp_get_attachment_image($image['ID'], 'huge'); ?>
              <?php if (!empty($image['caption'])): ?>
                <figcaption><?php echo esc_html($image['caption']); ?></figcaption>
              <?php endif; ?>
            </figure>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="swiper-buttons">
        <button type="button" class="swiper-button-prev-gallery swiper-button-prev" aria-label="Vorheriges Element">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-left.svg'); ?>"
            alt="Pfeil nach links"
            width="24" height="24">
        </button>
        <button type="button" class="swiper-button-next-gallery swiper-button-next" aria-label="Nächstes Element">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
            alt="Pfeil nach rechts"
            width="24" height="24">
        </button>
      </div>
    </div>
  <?php endif; ?>
</section>