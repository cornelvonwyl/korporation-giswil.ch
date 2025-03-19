<?php get_header(); ?>
<main>

  <div class="main-wrapper job-single">

    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">


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

              <a href="#apply" class="button job-single__apply">Jetzt bewerben</a>


              <?php if (get_field('pdf')): ?>
                <div class="job-single__pdf">
                  <a href="<?php echo get_field('pdf')['url']; ?>" target="_blank" class="button job-single__pdf-button">Inserat Download</a>
                </div>
              <?php endif; ?>
            </div>


            <?php
            $person = get_field('person');

            if ($person):
              $email = get_field('mail', $person);
              $phone = get_field('phone', $person);
              $portrait = get_field('portrait', $person);
            ?>
              <div class="job-single__contact">
                <?php if ($portrait): ?>
                  <?php echo wp_get_attachment_image($portrait, 'tiny'); ?>
                <?php endif; ?>
                <h3 class="job-single__contact-title">Ansprechperson</h3>
                <p class="job-single__contact-text"><?php echo get_the_title($person); ?></p>
                <?php if ($email): ?>
                  <p class="job-single__contact-email">
                    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                  </p>
                <?php endif; ?>
                <?php if ($phone): ?>
                  <p class="job-single__contact-phone">
                    <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="job-single__content">
              <?php the_content(); ?>
            </div>
          </div>
        </article>


    <?php endwhile;
    endif; ?>

  </div>
</main>
<?php get_footer(); ?>