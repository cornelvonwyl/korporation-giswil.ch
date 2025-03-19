<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <article class="main-content">
      <div class="contact-page">

        <section class="page-header">
          <div class="page-header__container">

            <?php
            echo wp_get_attachment_image(561, 'huge', false, array('class' => 'page-header__image'));
            ?>
            <div class="page-header__content">
              <p class="page-header__subtitle">Wir freuen uns</p>
              <h1>Kontakt</h1>

              <h3 class="contact-page__subtitle">
                Telefon & E-Mail
              </h3>

              <div class="contact-page__contact">

                <a href="tel:+41416620070" class="contact-page__link">
                  <p class="contact-page__link-text">041 662 00 70</p>

                  <img class="contact-page__link__more-icon"
                    src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
                    alt="Pfeil nach rechts">
                </a>

                <a href="mailto:info@elektrofurrer.ch" class="contact-page__link">
                  <p class="contact-page__link-text">info@elektrofurrer.ch</p>

                  <img class="contact-page__link__more-icon"
                    src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
                    alt="Pfeil nach rechts">
                </a>


              </div>

              <h3 class="contact-page__subtitle">
                24H Notruf
              </h3>

              <div class="contact-page__contact">

                <a href="tel:+41416620077" class="contact-page__link">
                  <p class="contact-page__link-text">041 662 00 77</p>

                  <img class="contact-page__link__more-icon"
                    src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
                    alt="Pfeil nach rechts">
                </a>
              </div>



            </div>
          </div>
        </section>




      </div>

      <!-- Standorte Section -->
      <?php get_template_part('template-parts/locations/locations-overview'); ?>
    </article>
  </div>
</main>
<?php get_footer(); ?>