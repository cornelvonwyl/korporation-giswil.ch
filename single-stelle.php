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

            <?php
            $workload = get_field('workload');
            if ($workload): ?>
              <div class="job-single__workload">


                <img class="job-single__workload-icon"
                  src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/plus.svg'); ?>"
                  alt="Icon für Pensum">

                <p class="job-single__workload-text"><?php echo $workload; ?></p>
              </div>
            <?php endif; ?>
            <?php
            $location = get_field('location');
            if ($location): ?>
              <div class="job-single__location">
                <h3 class="job-single__location-title">Standort</h3>
                <p class="job-single__location-text"><?php echo get_the_title($location); ?></p>
              </div>
            <?php endif; ?>

            <?php
            $person = get_field('person');
            if ($person): ?>
              <div class="job-single__contact">
                <h3 class="job-single__contact-title">Ansprechperson</h3>
                <p class="job-single__contact-text"><?php echo get_the_title($person); ?></p>
              </div>
            <?php endif; ?>

            <?php if (get_field('pdf')): ?>
              <div class="job-single__pdf">
                <h3 class="job-single__pdf-title">Stellen-Inserat</h3>
                <a href="<?php echo get_field('pdf')['url']; ?>" target="_blank" class="button job-single__pdf-button">PDF
                  herunterladen</a>
              </div>
            <?php endif; ?>



            <?php the_content(); ?>
          </div>
        </article>


      <?php endwhile; endif; ?>

    <?php
    include get_template_directory() . '/template-parts/job/job-list.php';
    ?>
  </div>
</main>
<?php get_footer(); ?>
