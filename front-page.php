<?php

/**
 * Template Name: Front Page
 * 
 * The main front page template for the website.
 * Displays the hero section, services overview, Furrer Power section,
 * news slider, and locations overview.
 *
 * @package vonweb
 */

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>

<main>
  <div class="main-wrapper">
    <div class="main-content">
      <!-- Hero Section -->
      <?php get_template_part('template-parts/frontpage/hero'); ?>

      <!-- Cards Section -->
      <section class="cards-section">
        <div class="container">
          <div class="cards-grid">
            <?php
            // Card 1
            global $post;
            $temp_post = (object) array(
              'ID' => 1,
              'post_title' => 'Innovative Lösungen für moderne Unternehmen'
            );
            $post = $temp_post;

            get_template_part('template-parts/components/card', NULL, [
              'date' => '23. Dezember 2024',
              'title' => 'Christbaumverkauf',
              'category' => (object) array('name' => 'Innovation'),
              'link' => '#'
            ]);
            ?>
          </div>
        </div>
      </section>


      <a href="/news" class="primary-button">
        Alle Neuigkeiten
      </a>




      <!-- Neuigkeiten Section -->
      <?php get_template_part('template-parts/news/news-list'); ?>

      <!-- Standorte Section -->
      <?php get_template_part('template-parts/locations/locations-overview'); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>