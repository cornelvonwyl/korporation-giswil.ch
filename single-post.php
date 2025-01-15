<?php get_header(); ?>
<main>

  <div class="main-wrapper">


    <button class="post__back" onclick="history.back()" aria-label="Zurück zur Übersicht">
      <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/close.svg" alt="Schliessen Symbol">

    </button>

    <p class="post__date text-small">
      <?php echo get_the_date('D d/m/y'); ?>
    </p>


    <h1 class="post__title">
      <?php the_title(); ?>
    </h1>

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
