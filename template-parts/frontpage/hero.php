<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>

<section class="hero">
  <div class="hero__container">

    <?php
    $image_id = 1883;
    echo wp_get_attachment_image($image_id, 'extra-large', FALSE, [
      'class' => 'hero__image',
      'sizes' => '(max-width: 768px) 150vw, 100vw',
      'loading' => 'eager',
      'decoding' => 'async'
    ]);
    ?>

    <div class="hero__content">

      <h1 class="hero__title">
        Tradition bewahren. <br>
        Zukunft gestalten. <br>
        Korporation Giswil.
      </h1>

    </div>

  </div>
</section>