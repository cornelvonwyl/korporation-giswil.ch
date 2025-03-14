<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <?php if (have_posts()):
      while (have_posts()):
        the_post();

        // Get the referenz-type terms
        $terms = get_the_terms(get_the_ID(), 'referenz-type');


        if ($terms && !is_wp_error($terms)) {
          $term = array_shift($terms);

          // Load template based on the term slug
          if ($term->slug === 'impression') {
            get_template_part('template-parts/referenzen/referenz-impression');
          }

          if ($term->slug === 'projekt-einblick') {
            get_template_part('template-parts/referenzen/referenz-project');
          }
        }

      endwhile;
    endif; ?>
  </div>
</main>
<?php get_footer(); ?>
