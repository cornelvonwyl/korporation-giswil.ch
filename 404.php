<?php get_header(); ?>
<main>
    <h1><?php esc_html_e('Page Not Found', 'vonweb'); ?></h1>
    <p><?php esc_html_e('Sorry, the page you are looking for does not exist.', 'vonweb'); ?></p>
    <a href="<?php echo home_url(); ?>"><?php esc_html_e('Return to homepage', 'vonweb'); ?></a>
</main>
<?php get_footer(); ?>
