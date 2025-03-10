<?php get_header(); ?>
<main>

  <div class="main-wrapper">
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">
          <?php the_content(); ?>
        </article>
      <?php endwhile;
    endif; ?>


    <?php
    include get_template_directory() . '/template-parts/job/job-list.php';
    ?>

  </div>
</main>
<?php get_footer(); ?>
