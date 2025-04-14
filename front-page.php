<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <div class="main-content">
      <!-- Hero Section -->
      <?php get_template_part('template-parts/frontpage/hero'); ?>

      <h1 class="sr-only">Elektro Furrer AG – Ihr Partner für Elektroinstallationen, Erneuerbare Energien, E-Mobilität, Gebäudeautomation, Informatik, Multimedia & Telematik, Schaltanlagen und Elektroplanung in der Zentralschweiz</h1>

      <section class="hero-text animation-on-scroll">
        <div class="hero-text__container">
          <p>
            Bei uns zählen Mensch, Teamgeist und Leidenschaft. Mit Freude, Fantasie und Fortschritt gestalten wir gemeinsam die Zukunft – eifach Furrer.
          </p>
        </div>
      </section>

      <!-- Dienstleistungen Section -->
      <?php get_template_part('template-parts/services/services-overview'); ?>

      <!-- Furrer Power Section -->
      <?php get_template_part('template-parts/frontpage/furrer-power'); ?>

      <!-- Neuigkeiten Section -->
      <?php get_template_part('template-parts/news/news-slider'); ?>

      <!-- Standorte Section -->
      <?php get_template_part('template-parts/locations/locations-overview'); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>