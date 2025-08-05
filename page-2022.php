<?php

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>
<main>

  <div class="main-wrapper department">
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">

          <div class="department__hero">
            <div class="department__hero-container">
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large', ['class' => 'department__image-element']); ?>
              <?php endif; ?>
              <div class="department__hero-content">


                <h1 class="department__title">
                  <?php the_title(); ?>
                </h1>
              </div>
            </div>
          </div>
          <div class="page__container prose">
            <?php the_content(); ?>
          </div>

          <?php
          $children = get_pages([
            'child_of' => get_the_ID(),
            'sort_column' => 'menu_order',
            'sort_order' => 'asc'
          ]);
          ?>

          <?php if ($children): ?>
            <div class="page__children">
              <div class="page__children-grid">
                <?php foreach ($children as $child): ?>
                  <?php
                  // Get the thumbnail ID for the child page
                  $thumbnail_id = get_post_thumbnail_id($child->ID);

                  // Prepare data for the services card component
                  $card_args = [
                    'image' => $thumbnail_id,
                    'title' => get_the_title($child),
                    'link' => get_the_permalink($child),
                    'content' => null,
                    'department' => null
                  ];

                  // Include the card-with-image component
                  get_template_part('template-parts/components/card-with-image', null, $card_args);
                  ?>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

        </article>

    <?php endwhile;
    endif; ?>

  </div>

</main>
<?php get_footer(); ?>