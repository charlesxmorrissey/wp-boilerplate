<?php

/**
 * Theme options
 *
 * Here we decide what features for WordPress we want to enable,
 * as well as deciding some custom function support stuff too.
 */
$theme_config = array(
  'enable_image_sizes'       => true,
  'enable_wp_title_tag'      => true,
  'enable_editor_styles'     => false,
  'enable_custom_permalinks' => true,
);

/**
 * Path Constants
 */
define('THEME_ROOT', get_template_directory_uri() . '/');
define('PUBLIC_DIR', THEME_ROOT . 'dist/');
define('STYLES_DIR', PUBLIC_DIR . 'styles/');
define('SCRIPTS_DIR', PUBLIC_DIR . 'javascripts/');
define('IMAGES_DIR', PUBLIC_DIR . 'images/');
define('VENDOR_SCRIPTS_DIR', THEME_ROOT . 'dist/javascripts/vendors/');

/**
 * Enable image sizes
 */
if ($theme_config['enable_image_sizes'] === true) {
  // Image sizes
  // add_image_size('size-name', 600, 315, true);
}

/**
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
if ($theme_config['enable_wp_title_tag'] === true) {
  add_theme_support( 'title-tag' );
}

/**
 * Enable editor etyles
 */
if ($theme_config['enable_editor_styles'] === true) {
  add_editor_style('src/css/editor-style.css');
}

/**
 * Enable custom permalinks
 */
if ($theme_config['enable_custom_permalinks'] === true) {
  function enable_custom_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    // $wp_rewrite->flush_rules();
  }
  add_action('init', 'enable_custom_permalinks');
}
