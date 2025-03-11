<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <!-- Hero Section -->
    <?php get_template_part('template-parts/frontpage/hero'); ?>

    <!-- Dienstleistungen Section -->
    <?php get_template_part('template-parts/services/services-list'); ?>

    <!-- Furrer Power Section -->
    <?php get_template_part('template-parts/frontpage/furrer-power'); ?>

    <!-- Neuigkeiten Section -->
    <?php get_template_part('template-parts/news/news-list'); ?>

    <!-- Standorte Section -->
    <?php get_template_part('template-parts/locations/locations-list'); ?>
  </div>
</main>
<?php get_footer(); ?>
