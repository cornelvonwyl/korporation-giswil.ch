<section class="hero">
  <div class="hero__container">

    <?php
    $image_id = 561;
    echo wp_get_attachment_image($image_id, 'huge', FALSE, ['class' => 'hero__image']);
    ?>


    <div class="hero__content">

      <p class="hero__subtitle">
        Elektro Furrer AG - Wir sind
      </p>

      <h1 class="hero__title">
        <span class="hero__title--highlight">Elektriker:innen</span>
        <span class="hero__title--highlight">Planung</span>
        <span class="hero__title--highlight">Beratung</span>
        <span class="hero__title--highlight">Eifach Furrer</span>
      </h1>

      <div class="hero__links">
        <a href="" class="hero__link">
          Service buchen
        </a>
        <a href="" class="hero__link">
          24h Notruf
        </a>
      </div>

    </div>



  </div>
</section>