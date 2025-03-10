<?php
/**
 * Template part for displaying related references by service
 */

$referenced_referenzen = get_field('referenzen');

if ($referenced_referenzen && !empty($referenced_referenzen)): ?>
  <section class="referenzen-by-service">
    <div class="referenzen-by-service__container">
      <div class="referenzen-by-service__header">
        <p class="referenzen-by-service__subtitle">Unsere Meisterwerke</p>
        <h2>Referenzen</h2>
      </div>

      <div class="referenzen-by-service__grid swiper">
        <div class="swiper-wrapper">
          <?php foreach ($referenced_referenzen as $referenz):
            ?>
            <a href="<?php echo get_permalink($referenz->ID); ?>" class="referenzen-by-service__item swiper-slide">
              <div class="referenzen-by-service__image">

                <?php
                if (has_post_thumbnail($referenz->ID)) {
                  echo get_the_post_thumbnail($referenz->ID, 'medium');
                }
                ?>

              </div>

              <h4><?php echo get_the_title($referenz->ID); ?></h4>
              <?php if (get_field('location', $referenz->ID)): ?>
                <p class="referenzen-by-service__location"><?php echo get_field('location', $referenz->ID); ?></p>
              <?php endif; ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>


      <div class="swiper-buttons">
        <button type="button" class="swiper-button-prev" aria-label="Vorheriges Element">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-left.svg'); ?>"
            alt="Pfeil nach links">
        </button>
        <button type="button" class="swiper-button-next" aria-label="Nächstes Element">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
            alt="Pfeil nach rechts">
        </button>
      </div>


      <div class="referenzen-by-service__button">
        <a href="/referenzen" class="button">Alle Referenzen</a>
      </div>
    </div>
  </section>
<?php endif; ?>
