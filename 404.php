<?php

/**
 * Template Name: 404 Page
 * Description: Template for displaying 404 error pages (Not Found).
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<main>
    <div class="main-wrapper">
        <section class="main-content">
            <h1>404</h1>
            <p>
                Leider existiert keine Seite unter diesem Link. Bitte kehren Sie zur <a href="/">Startseite</a> zurück
                und wählen Sie einen vorhandenen Link.
            </p>
        </section>
    </div>
</main>

<?php get_footer(); ?>