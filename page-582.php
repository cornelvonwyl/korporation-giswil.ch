<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <article class="main-content">
      <div class="news-overview">
        <div class="news-overview__container">
          <div class="news-overview__header">
            <p class="news-overview__subtitle">Stories aus der Furrer-Welt</p>
            <h1 class="h2">Neuigkeiten</h1>
          </div>
        </div>

        <!-- News Filter -->
        <?php get_template_part('template-parts/news/news-filter'); ?>

        <!-- News List -->
        <?php get_template_part('template-parts/news/news-overview'); ?>

      </div>
    </article>
  </div>
</main>
<?php get_footer(); ?>
