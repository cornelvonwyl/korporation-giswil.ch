<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package vonweb
 */

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>
<main>
  <?php if (have_posts()):
    while (have_posts()):
      the_post(); ?>
      <article>
        <h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h2>
        <?php the_excerpt(); ?>
      </article>
    <?php endwhile;
  else: ?>
    <p><?php esc_html_e('Sorry, no posts were found', 'vonweb'); ?></p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>