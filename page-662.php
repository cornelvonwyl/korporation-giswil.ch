<?php

/**
 * Template Name: Contact Page
 * Description: Template for displaying the contact page with contact information and locations
 * @package vonweb
 */

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>
<main>
  <div class="main-wrapper">
    <article class="main-content">
      <div class="contact-page">

        <section class="page-header">
          <div class="page-header__container">

            <?php
            $image_id = 1649;
            $image_attributes = array(
              'class' => 'page-header__image'
            );
            echo wp_get_attachment_image($image_id, 'large', false, $image_attributes);
            ?>
            <div class="page-header__content">
              <p class="page-header__subtitle">Kontakt</p>
              <h1 class="page-header__title">Wir freuen uns</h1>

              <h3 class="contact-page__subtitle">
                Telefon & E-Mail
              </h3>

              <div class="contact-page__contact">
                <?php
                get_template_part('template-parts/elements/cta-list-item', null, array(
                  'title' => '041 662 00 70',
                  'link' => 'tel:+41416620070',
                  'is_external' => true
                ));
                ?>

                <?php
                get_template_part('template-parts/elements/cta-list-item', null, array(
                  'title' => 'info@elektrofurrer.ch',
                  'link' => 'mailto:info@elektrofurrer.ch',
                  'is_external' => true
                ));
                ?>
              </div>

              <h3 class="contact-page__subtitle">
                24H Notruf
              </h3>

              <div class="contact-page__contact">
                <?php
                get_template_part('template-parts/elements/cta-list-item', null, array(
                  'title' => '041 662 00 77',
                  'link' => 'tel:+41416620077',
                  'is_external' => true
                ));
                ?>
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