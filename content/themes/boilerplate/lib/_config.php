<?php

/**
 * Theme options
 *
 * Here we decide what features for WordPress we want to enable,
 * as well as deciding some custom function support stuff too.
 */
$theme_config = array(
  'enable_image_sizes'   => true,
  'enable_editor_styles' => false,
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
 * Enable Editor Styles
 */
if ($theme_config['enable_editor_styles'] === true) {
  add_editor_style('src/css/editor-style.css');
}
