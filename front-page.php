<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <!-- Hero Section -->
    <?php get_template_part('template-parts/frontpage/hero'); ?>

    <div class="hero-text">
      <div class="hero-text__container">

        <p class="animated-text">
          Bei uns zählen Mensch, Teamgeist und Leidenschaft. Mit Freude, Fantasie und Fortschritt gestalten wir gemeinsam die Zukunft – eifach Furrer.
        </p>

      </div>
    </div>

    <!-- Dienstleistungen Section -->
    <?php get_template_part('template-parts/services/services-overview'); ?>

    <!-- Furrer Power Section -->
    <?php get_template_part('template-parts/frontpage/furrer-power'); ?>

    <!-- Neuigkeiten Section -->
    <?php get_template_part('template-parts/news/news-slider'); ?>

    <!-- Standorte Section -->
    <?php get_template_part('template-parts/locations/locations-overview'); ?>
  </div>
</main>
<?php get_footer(); ?>