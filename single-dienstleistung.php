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
    $related_referenzen = get_field('referenzen');
    if (!empty($related_referenzen)) {
      get_template_part('template-parts/referenzen/referenzen-by', NULL, [
        'referenzen' => $related_referenzen
      ]);
    }
    ?>

    <?php get_template_part('template-parts/team/people-by'); ?>

    <?php get_template_part('template-parts/partners/partners-by'); ?>

  </div>
</main>
<?php get_footer(); ?>
