<?php

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>
<main>

  <div class="main-wrapper news-single">

    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">


          <?php get_template_part('template-parts/components/breadcrumb', NULL, [
            'items' => [
              ['title' => 'Neuigkeiten', 'url' => '/neuigkeiten'],
            ]
          ]); ?>

          <div class="news-single__container">

            <div class="news-single__header">
              <!--               <div class="news-single__categories">
                <?php
                $fields = get_field('fields');
                if ($fields):
                  foreach ($fields as $field): ?>
                    <p class="news-single__category">
                      <?php echo esc_html(get_the_title($field)); ?>
                    </p>
                  <?php endforeach;
                else: ?>
                  <p class="news-single__category">
                    Allgemein
                  </p>
                <?php endif; ?>
              </div> -->


              <h1 class="news-single__title">
                <?php the_title(); ?>
              </h1>

              <p class="news-single__date">
                <?php echo get_the_date('j. F Y'); ?>
              </p>

              <hr>
            </div>



            <div class="news-single__content prose">
              <?php the_content(); ?>
            </div>
          </div>
        </article>

    <?php endwhile;
    endif; ?>

  </div>

</main>
<?php get_footer(); ?>