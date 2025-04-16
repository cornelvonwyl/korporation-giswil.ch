<section class="hero">
  <div class="hero__container">

    <?php
    $image_id = 1790;
    echo wp_get_attachment_image($image_id, 'extra-large', FALSE, [
      'class' => 'hero__image',
      'sizes' => '(max-width: 768px) 150vw, 1200px',
      'loading' => 'eager',
      'decoding' => 'async'
    ]);
    ?>

    <div class="hero__content">

      <p class="hero__subtitle">
        Elektro Furrer AG - Wir sind
      </p>

      <p class="hero__title">
        <span class="hero__title--highlight">Eifach Furrer</span>
      </p>

      <div class="hero__links">
        <a href="/service-buchen/" class="hero__link animated-button">
          Service buchen
        </a>
        <a href="tel:+41416620077" class="hero__link animated-button">
          24h Notruf
        </a>
      </div>

    </div>



  </div>
</section>