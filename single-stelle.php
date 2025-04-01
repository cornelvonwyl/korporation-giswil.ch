<?php get_header(); ?>
<main>

  <div class="main-wrapper job-single">

    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">

          <?php if (has_post_thumbnail()): ?>
            <div class="job-single__image">
              <?php echo get_the_post_thumbnail(get_the_ID(), 'huge', [
                'class' => 'job-single__thumbnail',
              ]); ?>
            </div>
          <?php endif; ?>


          <?php get_template_part('template-parts/components/breadcrumb', NULL, [
            'items' => [
              ['title' => 'Jobs', 'url' => '/jobs'],
            ]
          ]); ?>

          <div class="job-single__container">
            <h1 class="job-single__title"><?php the_title(); ?></h1>

            <div class="job-single__details">
              <?php
              $workload = get_field('workload');
              if ($workload): ?>
                <div class="job-single__workload">
                  <img class="job-single__workload-icon"
                    src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/clock.svg'); ?>"
                    alt="Symbol für Pensum">

                  <p class="job-single__workload-text"><?php echo $workload; ?></p>
                </div>
              <?php endif; ?>
              <?php
              $location = get_field('location');
              if ($location): ?>
                <div class="job-single__location">
                  <img class="job-single__location-icon"
                    src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/map.svg'); ?>"
                    alt="Symbol für Pensum">
                  <p class="job-single__location-text"><?php echo get_the_title($location); ?></p>
                </div>
              <?php endif; ?>
            </div>

            <div class="job-single__buttons">

              <a href="#apply" class="animated-button job-single__apply">Jetzt bewerben</a>


              <?php if (get_field('pdf')): ?>
                <div class="job-single__pdf">
                  <a href="<?php echo get_field('pdf')['url']; ?>" target="_blank" class="animated-button job-single__pdf-button">Inserat Download</a>
                </div>
              <?php endif; ?>
            </div>


            <div class="job-single__content prose">
              <?php the_content(); ?>
            </div>
          </div>

          <?php
          $person = get_field('person');

          if ($person):
            $email = get_field('mail', $person);
            $phone = get_field('phone', $person);
            $first_name = get_field('first_name', $person);
            $last_name = get_field('last_name', $person);

            $portrait = get_field('portrait', $person);
          ?>
            <div class="job-single__contact">

              <div class="job-single__contact-container">
                <div class="job-single__contact-header">


                  <p class="job-single__contact-subtitle">Fragen?</p>
                  <h2 class="job-single__contact-title">Melde dich bei <?php echo esc_html($first_name); ?> </h2>
                </div>
                <div class="job-single__contact-content">
                  <?php
                  get_template_part('template-parts/team/person', NULL, array(
                    'person' => $person,
                  ));
                  ?>
                </div>

                <?php gravity_form(4, false, false, false, '', true); ?>
              </div>
            </div>
          <?php endif; ?>



        </article>
    <?php endwhile;
    endif; ?>

  </div>
</main>
<?php get_footer(); ?>