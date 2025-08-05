<?php

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>
<main>

  <div class="main-wrapper department">

    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">
          <div class="page__container prose">
            <?php the_content(); ?>
          </div>
        </article>

    <?php endwhile;
    endif; ?>

  </div>

</main>
<?php get_footer(); ?>