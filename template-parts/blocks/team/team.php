<?php

/**
 *
 * Template for displaying persons with the category "Team" (ID 21).
 */

?>

<div class="person-list">

    <?php
    // Define the specific taxonomy term ID for "Team"
    $team_category_id = 21;

    // Query persons belonging to the "Team" category
    $args = array(
      'post_type' => 'person',
      'tax_query' => array(
        array(
          'taxonomy' => 'person-category',
          'field' => 'term_id',
          'terms' => $team_category_id,
        ),
      ),
      'posts_per_page' => -1, // Load all persons in this category
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):
      ?>
      <section class="person-category">
          <h2 class="person-category__title">Team</h2>
          <div class="person-category__list">
              <?php
              while ($query->have_posts()):
                $query->the_post();
                $name = get_field('name', get_the_ID());
                $function = get_field('function', get_the_ID());
                $phone = get_field('phone', get_the_ID());
                $email = get_field('mail', get_the_ID());
                $portrait = get_field('portrait', get_the_ID());
                ?>
                <div class="person-card">
                    <?php if (!empty($portrait)): ?>
                      <div class="person-card__image">
                          <?php echo wp_get_attachment_image(esc_attr($portrait), 'huge'); ?>
                      </div>
                    <?php endif; ?>
                    <div class="person-card__info">
                        <?php if (!empty($name)): ?>
                          <p class="person-card__name"><?php echo esc_html($name); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($function)): ?>
                          <p class="person-card__role"><?php echo esc_html($function); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($phone) || !empty($email)): ?>
                          <p class="person-card__contact">
                              <?php if (!empty($phone)): ?>
                                <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a><br>
                              <?php endif; ?>
                              <?php if (!empty($email)): ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                              <?php endif; ?>
                          </p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
              endwhile;
              wp_reset_postdata();
              ?>
          </div>
      </section>
      <?php
    else:
      echo '<p>No persons found in the "Team" category.</p>';
    endif;
    ?>

</div>