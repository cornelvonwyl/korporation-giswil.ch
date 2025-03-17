<?php
/**
 * Template part for displaying impression type references
 */


$intro_text = get_field('intro_text');
$service_references = get_field('service_references');
?>

<?php get_template_part('template-parts/components/breadcrumb', NULL, [
  'items' => [
    ['title' => 'Referenzen', 'url' => '/referenzen'],
  ]
]); ?>

<article class="referenz-impression">
  <div class="referenz-impression__container">
    <div class="referenz-impression__content">
      <div class="news__header">
        <p class="news__subtitle">Impression</p>
        <h1 class="h2"><?php echo the_title(); ?></h1>
      </div>
    </div>


    <div class="referenz-impression__wrapper">
      <div class="referenz-impression__header">
        <div class="swiper-buttons">
          <button type="button" class="swiper-button-prev" aria-label="Vorheriges Bild">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-left.svg'); ?>"
              alt="Pfeil nach links">
          </button>

          <button type="button" class="swiper-button-next" aria-label="Nächstes Bild">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
              alt="Pfeil nach rechts">
          </button>
        </div>
      </div>


      <div class="referenz-impression__gallery">
        <?php
        $gallery = get_field('gallery');
        if ($gallery): ?>

          <div class="swiper">
            <div class="swiper-wrapper">
              <?php foreach ($gallery as $image): ?>
                <div class="swiper-slide">
                  <?php echo wp_get_attachment_image($image['ID'], 'huge'); ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php else: ?>
          <p>Keine Bilder wurden gefunden.</p>
        <?php endif; ?>

      </div>
    </div>
  </div>
</article>