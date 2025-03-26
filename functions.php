<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * This function is hooked into the 'after_setup_theme' hook, which runs before the init hook.
 * The 'after_setup_theme' hook is used to perform basic setup, registration, and initialization
 * actions for a theme.
 *
 * @return void
 */
function vonweb_theme_setup()
{
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'vonweb'),
  ));

  add_theme_support('post-thumbnails');
  add_theme_support('align-wide');
}
add_action('after_setup_theme', 'vonweb_theme_setup');


/**
 * Enqueues theme styles and scripts.
 *
 * This function registers and enqueues the necessary CSS and JavaScript files for the theme.
 * It is hooked into the 'wp_enqueue_scripts' action to ensure the assets are loaded properly.
 *

 * @return void
 */
function vonweb_enqueue_assets()
{
  wp_enqueue_style('vonweb-style', get_stylesheet_uri());
  wp_enqueue_style('vonweb-main-css', get_template_directory_uri() . '/dist/style.css', array(), '1.0', 'all');
  wp_enqueue_script('vonweb-scripts', get_template_directory_uri() . '/dist/bundle.js', array(), '1.0', TRUE);
}
add_action('wp_enqueue_scripts', 'vonweb_enqueue_assets');


function mytheme_block_editor_styles()
{
  wp_enqueue_style(
    'mytheme-editor-styles',
    get_stylesheet_directory_uri() . '/dist/style.css',
    false,
    filemtime(get_stylesheet_directory() . '/dist/style.css'),
    'all'
  );
}
add_action('enqueue_block_editor_assets', 'mytheme_block_editor_styles');



/**
 * Registers custom ACF blocks for the theme.
 *
 * This function hooks into the 'init' action to register multiple custom
 * Advanced Custom Fields (ACF) blocks. Each block is registered using the
 * `register_block_type` function, which takes the path to the block's
 * configuration file.
 *

 * @return void
 */
add_action('init', 'register_acf_blocks');
function register_acf_blocks()
{
  register_block_type(__DIR__ . '/template-parts/blocks/images-block');
  register_block_type(__DIR__ . '/template-parts/blocks/images-small-block');
  register_block_type(__DIR__ . '/template-parts/blocks/page-header');
  register_block_type(__DIR__ . '/template-parts/blocks/page-header-text');
  register_block_type(__DIR__ . '/template-parts/blocks/sub-service');
  register_block_type(__DIR__ . '/template-parts/blocks/sub-services');
  register_block_type(__DIR__ . '/template-parts/blocks/image-with-content');
  register_block_type(__DIR__ . '/template-parts/blocks/referenzen-overview');
  register_block_type(__DIR__ . '/template-parts/blocks/news-overview');
  register_block_type(__DIR__ . '/template-parts/blocks/jobs-overview');
  register_block_type(__DIR__ . '/template-parts/blocks/team-overview');
  register_block_type(__DIR__ . '/template-parts/blocks/history');
  register_block_type(__DIR__ . '/template-parts/blocks/sponsoring-overview');
}


/**
 * Filters the allowed block types in the block editor.
 *
 * This function restricts the available block types to 'core/paragraph', 'core/heading', and 'core/list'
 * when editing a post. If the editor context does not contain a post, it returns the original block editor context.
 *
 * @param array $block_editor_context The default allowed block types.
 * @param WP_Block_Editor_Context $editor_context The current block editor context.
 * @return array The filtered list of allowed block types.
 */
function wpdocs_allowed_block_types($block_editor_context, $editor_context)
{
  if (!empty($editor_context->post)) {
    return array(
      'core/paragraph',
      'core/heading',
      'core/list',
      'core/list-item',
      'core/quote',
      'core/video',
      'core/image',
      'acf/images-block',
      'acf/images-small-block',
      'acf/page-header',
      'acf/page-header-text',
      'acf/sub-services',
      'acf/image-with-content',
      'acf/referenzen-overview',
      'acf/news-overview',
      'acf/jobs-overview',
      'acf/team-overview',
      'acf/history',
      'acf/sponsoring-overview',
      'core/shortcode',
      'gravityforms/form',
      'filebird/gallery',
    );
  }

  return $block_editor_context;
}
add_filter('allowed_block_types_all', 'wpdocs_allowed_block_types', 10, 2);

/**
 * Adds custom image sizes for the WordPress theme.
 *
 * The following image sizes are added:
 * - 'small': 600x600 pixels
 * - 'medium': 1000x1000 pixels
 * - 'large': 1600x1600 pixels
 * - 'huge': 2400x2400 pixels
 *
 * These custom sizes can be used in the theme to display images at the specified dimensions.
 */
add_image_size('tiny', 200, 200);
add_image_size('small', 600, 600);
add_image_size('medium', 1000, 1000);
add_image_size('large', 1600, 1600);
add_image_size('huge', 2400, 2400);
add_image_size('extra-large', 3000, 3000);


/**
 * Enables lazy loading for all images and iframes in WordPress.
 *
 * This filter hook modifies the default behavior of WordPress to enable lazy loading,
 * which can improve page load times by deferring the loading of images and iframes
 * until they are about to enter the viewport.
 *
 * @param bool $enabled Whether lazy loading is enabled. Default true.
 * @return bool Always returns true to enable lazy loading.
 */
add_filter('wp_lazy_loading_enabled', '__return_true');
