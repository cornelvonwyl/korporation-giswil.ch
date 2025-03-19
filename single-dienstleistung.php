<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">
          <?php the_content(); ?>


          <?php
          $related_referenzen = get_field('referenzen');
          if (!empty($related_referenzen)) {
            get_template_part('template-parts/referenzen/referenzen-slider', NULL, [
              'referenzen' => $related_referenzen
            ]);
          }
          ?>

          <?php get_template_part('template-parts/team/people-by'); ?>

          <?php get_template_part('template-parts/partners/partners-by'); ?>
        </article>
    <?php endwhile;
    endif; ?>
  </div>
</main>
<?php get_footer(); ?>