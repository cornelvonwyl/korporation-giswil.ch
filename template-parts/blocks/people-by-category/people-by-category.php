<?php

/**
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

?>

<div class="person-list">

  <?php
  // Get all terms in 'person-category'
  $terms = get_terms(array(
    'taxonomy' => 'person-category',
    'hide_empty' => TRUE,
  ));

  if (!empty($terms) && !is_wp_error($terms)):
    foreach ($terms as $term):
      ?>
      <section class="person-category">
        <h2 class="person-category__title"><?php echo esc_html($term->name); ?></h2>
        <div class="person-category__list">
          <?php
          $args = array(
            'post_type' => 'person',
            'tax_query' => array(
              array(
                'taxonomy' => 'person-category',
                'field' => 'slug',
                'terms' => $term->slug,
              ),
            ),
            'posts_per_page' => -1,
          );

          $query = new WP_Query($args);

          if ($query->have_posts()):
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
          else:
            echo '<p>No persons found in this category.</p>';
          endif;
          ?>
        </div>
      </section>
      <?php
    endforeach;
  else:
    echo '<p>No categories found.</p>';
  endif;
  ?>
</div>