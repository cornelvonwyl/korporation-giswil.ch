<?php get_header(); ?>
<main>

  <div class="main-wrapper news-single">

    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">

          <?php if (has_post_thumbnail()): ?>
            <div class="news-single__image">
              <?php echo get_the_post_thumbnail(get_the_ID(), 'huge', [
                'class' => 'news-single__thumbnail',
              ]); ?>
            </div>
          <?php endif; ?>


          <?php get_template_part('template-parts/components/breadcrumb', NULL, [
            'items' => [
              ['title' => 'Neuigkeiten', 'url' => '/neuigkeiten'],
            ]
          ]); ?>

          <div class="news-single__container">

            <p class="news-single__date">
              <?php echo get_the_date('d.m.Y'); ?>
            </p>


            <h1 class="news-single__title">
              <?php the_title(); ?>
            </h1>

            <div class="news-single__categories">
              <?php
              $categories = get_the_category();
              if ($categories):
                foreach ($categories as $category): ?>
                  <p class="news-single__category">
                    #<?php echo esc_html($category->name); ?>
                  </p>
              <?php endforeach;
              endif; ?>
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