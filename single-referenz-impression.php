<?php
use FileBird\Classes\Helpers as Helpers;

get_header();
?>
<main>

  <div class="referenzen-single">



    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <div class="referenzen-single__overlay" onclick="history.back()"></div>
        <article class="referenzen-single__wrapper">
          <!-- Images -->
          <?php
          $image_folder = get_field('image_folder');
          if ($image_folder):
            $attachment_ids = Helpers::getAttachmentIdsByFolderId($image_folder[0]);

            if (!empty($attachment_ids)): ?>

              <div class="referenzen-single__header">
                <button class="referenzen-single__back" onclick="history.back()" aria-label="Zurück zur Übersicht">
                  <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/close.svg" alt="Schliessen Symbol">
                </button>

                <div class="swiper-buttons">
                  <button type="button" class="swiper-button-prev" aria-label="Vorheriges Bild">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-left.svg'); ?>"
                      alt="Pfeil nach links">
                  </button>

                  <span class="swiper-pagination-numbers">
                    <span class="current-slide">1</span> / <span class="total-slides">0</span>
                  </span>

                  <button type="button" class="swiper-button-next" aria-label="Nächstes Bild">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
                      alt="Pfeil nach rechts">
                  </button>
                </div>

              </div>

              <div class="swiper">
                <div class="swiper-wrapper">
                  <?php foreach ($attachment_ids as $attachment_id): ?>
                    <div class="swiper-slide">
                      <?php
                      echo wp_get_attachment_image($attachment_id, 'huge');
                      ?>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php else: ?>
              <p>Keine Bilder wurden gefunden.</p>
            <?php endif; ?>
          <?php else: ?>
            <p>Ordner ID ist falsch.</p>
          <?php endif; ?>

          <div class="referenzen-single__content">

            <p>
              Projekt: <?php echo the_title(); ?>
            </p>

            <p>Leistungen: <?php echo get_field("description"); ?></p>

            <!-- Taxonomy: Architektur -->
            <?php
            $architektur_terms = get_the_terms(get_the_ID(), 'architektur');
            if ($architektur_terms && !is_wp_error($architektur_terms)):
              $architektur_names = array_map(function ($term) {
                return esc_html($term->name);
              }, $architektur_terms);
              ?>
              <p>Architektur: <?php echo implode(", ", $architektur_names); ?></p>
            <?php endif; ?>

            <!-- Taxonomy: Fotografie -->
            <?php


            $fotografie_terms = get_the_terms(get_the_ID(), 'fotografie');
            if ($fotografie_terms && !is_wp_error($fotografie_terms)):
              $fotografie_names = array_map(function ($term) {
                return esc_html($term->name);
              }, $fotografie_terms);
              ?>
              <p>Fotografie: <?php echo implode(", ", $fotografie_names); ?></p>
            <?php endif; ?>
          </div>

        </article>
      <?php endwhile; endif; ?>

  </div>
</main>
<?php get_footer(); ?>
