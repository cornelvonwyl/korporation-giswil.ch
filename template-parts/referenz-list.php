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
  <h2 class="referenzen-list__title">Weitere Referenzen</h2>
  <ul class="referenzen-list__items">
    <?php

    // Define the query arguments
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
        $referenzen->the_post(); ?>
        <li class="referenzen-list__item">
          <a href="<?php the_permalink(); ?>" class="referenzen-list__link">
            <?php the_title(); ?>

            <!-- Optional: Display a featured image or a placeholder -->
            <?php if (has_post_thumbnail()): ?>
              <div class="referenzen-list__thumbnail">
                <?php the_post_thumbnail('thumbnail'); // Display the featured image ?>
              </div>
            <?php endif; ?>

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