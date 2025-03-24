<?php

/**
 * Furrer Power Component
 * 
 * @package Vonweb
 */


if (!class_exists('FileBird\Classes\Helpers')) {
  return;
}

use FileBird\Classes\Helpers as Helpers;


$attachment_ids = Helpers::getAttachmentIdsByFolderId(1);
?>

<section class="furrer-power">
  <div class="furrer-power__container">

    <div class="furrer-power__content">
      <h2 class="furrer-power__title">
        Furrer-Power
      </h2>

      <p class="furrer-power__text">
        Unser Team ist das Resultat einer 35-jährigen Suche nach den besten Fachleuten
      </p>
      <div class="furrer-power__cta">
        <a class="animated-button" href="/team">Team</a>
      </div>
    </div>



  </div>

  <div class="furrer-power__images" data-image-rotation>
    <?php
    foreach (array_slice($attachment_ids, 0, 4) as $index => $attachment_id) {
      $position = $index + 1;
    ?>
      <div class="furrer-power__image active" data-image-item data-position="<?php echo $position; ?>">
        <?php
        echo wp_get_attachment_image($attachment_id, 'medium', FALSE, array(
          'loading' => 'lazy',
        ));
        ?>
      </div>
    <?php
    }

    // Output remaining images (hidden)
    foreach (array_slice($attachment_ids, 4) as $attachment_id) {
    ?>
      <div class="furrer-power__image" data-image-item>
        <?php
        echo wp_get_attachment_image($attachment_id, 'medium', FALSE, array(
          'loading' => 'lazy',
        ));
        ?>
      </div>
    <?php
    }
    ?>
  </div>
</section>