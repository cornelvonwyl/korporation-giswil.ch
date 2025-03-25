<?php 
global $wp_query;
get_header(); 
?>
<main>

  <div class="main-wrapper">
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">
          <?php the_content(); ?>
        </article>
      <?php endwhile; endif; ?>
  </div>
</main>
<?php get_footer(); ?>
