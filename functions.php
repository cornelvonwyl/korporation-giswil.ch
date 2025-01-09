<?php
/* function vonweb_theme_setup() {
  // Add title support
  add_theme_support('title-tag');

  // Add featured image support
  add_theme_support('post-thumbnails');

  // Register navigation menus
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'vonweb'),
  ));
}
add_action('after_setup_theme', 'vonweb_theme_setup'); */

// Enqueue styles and scripts
function vonweb_enqueue_assets() {
  wp_enqueue_style('vonweb-style', get_stylesheet_uri());
  wp_enqueue_style('vonweb-reset-css', get_template_directory_uri() . '/assets/css/reset.css', array(), '1.0', 'all');
  wp_enqueue_style('vonweb-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');
  wp_enqueue_style('vonweb-layout-css', get_template_directory_uri() . '/assets/css/layout.css', array(), '1.0', 'all');
  wp_enqueue_style('vonweb-header-css', get_template_directory_uri() . '/assets/css/header.css', array(), '1.0', 'all');


  wp_enqueue_script('vonweb-scripts', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', TRUE);
}
add_action('wp_enqueue_scripts', 'vonweb_enqueue_assets');




function wpdocs_allowed_block_types($block_editor_context, $editor_context) {
  if (!empty($editor_context->post)) {
    return array(
      'core/paragraph',
      'core/heading',
      'core/list',
    );
  }

  return $block_editor_context;
}

add_filter('allowed_block_types_all', 'wpdocs_allowed_block_types', 10, 2);
