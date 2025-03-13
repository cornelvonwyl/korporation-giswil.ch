<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <article class="main-content">
      <div class="referenzen">
        <div class="referenzen__container">
          <div class="referenzen__header">
            <p class="referenzen__subtitle">Unsere Meisterwerke</p>
            <h2>Referenzen</h2>
          </div>
        </div>

        <!-- Referenzen Filter -->
        <?php include get_template_directory() . '/template-parts/referenzen/referenzen-filter.php'; ?>

        <!-- Referenzen List -->
        <?php include get_template_directory() . '/template-parts/referenzen/referenzen-list.php'; ?>

      </div>
    </article>
  </div>
</main>
<?php get_footer(); ?>
