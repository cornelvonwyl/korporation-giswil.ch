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

      <!-- Neuigkeiten Section -->
      <?php get_template_part('template-parts/news/news-list'); ?>

      <!-- Event Section -->
      <?php get_template_part('template-parts/events/events-list'); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>