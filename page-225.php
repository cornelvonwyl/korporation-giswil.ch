<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <article class="main-content">

      <div class="referenzen">
        <!-- Referenzen Filter -->
        <?php include get_template_directory() . '/template-parts/referenzen/referenzen-filter.php'; ?>


        <!-- Referenzen List -->
        <?php include get_template_directory() . '/template-parts/referenzen/referenzen-list.php'; ?>
      </div>
    </article>
  </div>
</main>
<?php get_footer(); ?>
