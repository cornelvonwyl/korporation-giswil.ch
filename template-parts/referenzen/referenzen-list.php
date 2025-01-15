<?php

use FileBird\Classes\Helpers as Helpers;

/**
 * Template part for displaying referenzen list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package your-theme-name
 */
?>

<div class="referenzen-list">
  <ul class="referenzen-list__items add-hover-effect">
    <?php
    $args = array(
      'post_type' => 'referenz',
      'post_status' => 'publish',
      'posts_per_page' => -1,
    );

    // Create a new WP_Query instance
    $referenzen = new WP_Query($args);

    // Start the Loop
    if ($referenzen->have_posts()):
      while ($referenzen->have_posts()):
        $referenzen->the_post();
        $leistungen_terms = get_the_terms(get_the_ID(), 'leistung');
        $leistung_classes = '';

        if (!empty($leistungen_terms) && !is_wp_error($leistungen_terms)):
          foreach ($leistungen_terms as $term):
            $leistung_classes .= ' leistung-' . esc_attr($term->slug);
          endforeach;
        endif;
        ?>
        <li class="referenzen-list__item<?php echo esc_attr($leistung_classes); ?>">
          <a href="<?php the_permalink(); ?>" class="referenzen-list__link">

            <div class="referenzen-list__thumbnail">

              <h2 class="referenzen-list__title text-small"><?php the_title(); ?></h2>
              <?php
              $image_folder = get_field('image_folder');

              if ($image_folder):
                $attachment_ids = Helpers::getAttachmentIdsByFolderId($image_folder[0]);

                if (!empty($attachment_ids)):
                  // Get the last attachment ID in the array
                  $last_attachment_id = end($attachment_ids);
                  echo wp_get_attachment_image($last_attachment_id, 'huge');
                else:
                  echo '<p>Keine Bilder wurden gefunden.</p>';
                endif;
              else:
                echo '<p>Ordner ID ist falsch.</p>';
              endif;
              ?>
            </div>
          </a>
        </li>
      <?php endwhile;
    else: ?>
      <li class="referenzen-list__item--empty">Aktuell keine Referenzen verfügbar.</li>
    <?php endif;

    // Reset post data
    wp_reset_postdata();
    ?>
  </ul>
</div>