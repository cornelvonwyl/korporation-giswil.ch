<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <article class="main-content">
      <div class="referenzen">
        <div class="referenzen__container">
          <div class="referenzen__header">
            <p class="referenzen__subtitle">Unsere Meisterwerke</p>
            <h1 class="h2">Referenzen</h1>
          </div>
        </div>

        <!-- Referenzen Filter -->
        <?php get_template_part('template-parts/referenzen/referenzen-filter'); ?>

        <!-- Referenzen List -->
        <?php get_template_part('template-parts/referenzen/referenzen-overview'); ?>

      </div>
    </article>
  </div>
</main>
<?php get_footer(); ?>
