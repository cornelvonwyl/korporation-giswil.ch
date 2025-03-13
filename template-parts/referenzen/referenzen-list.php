<?php
/**
 * Template part for displaying referenzen list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package your-theme-name
 */
?>

<div class="referenzen-list">
  <div class="referenzen-list__container">


    <ul class="referenzen-list__items">
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
          $service_references = get_field('service_references');
          $service_classes = '';

          if ($service_references):
            foreach ($service_references as $service):
              $service_classes .= ' service-' . esc_attr($service->post_name);
            endforeach;
          endif;
          ?>
          <li class="referenzen-list__item<?php echo esc_attr($service_classes); ?>">
            <a href="<?php the_permalink(); ?>" class="referenzen-list__link">
              <div class="referenzen-list__thumbnail">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('huge'); ?>
                <?php else: ?>
                  <p>Kein Bild verfügbar.</p>
                <?php endif; ?>
              </div>

              <h2 class="referenzen-list__title"><?php the_title(); ?></h2>
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
</div>