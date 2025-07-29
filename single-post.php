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

          <div class="news-single__container">

            <section class="news-single__header">

              <?php get_template_part('template-parts/components/breadcrumb', NULL, [
                'items' => [
                  ['title' => 'Neuigkeiten', 'url' => '/neuigkeiten'],
                ]
              ]); ?>


              <h1 class="news-single__title">
                <?php the_title(); ?>
              </h1>

              <p class="news-single__date">
                <?php echo get_the_date('j. F Y'); ?>
              </p>

              <hr>
            </section>

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