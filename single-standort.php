<?php

/**
 * Template Name: Single Location Post
 * Description: Template for displaying individual location pages
 * @package vonweb
 */

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>
<main>
  <div class="main-wrapper">
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">
          <?php the_content(); ?>


          <?php get_template_part('template-parts/services/services-overview'); ?>

          <?php get_template_part('template-parts/team/people-by'); ?>

          <?php get_template_part('template-parts/partners/partners-by'); ?>
        </article>
    <?php endwhile;
    endif; ?>
  </div>
</main>
<?php get_footer(); ?>