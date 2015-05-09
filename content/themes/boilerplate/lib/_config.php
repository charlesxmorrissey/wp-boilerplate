<?php

/*
  * Theme options
  * -------------
  * Here we decide what features for WordPress we want to enable,
  * as well as deciding some custom function support stuff too.
*/

$theme_config = array(
  'enable_image_sizes'       => true,
  'enable_thumbnail_support' => false,
  'enable_theme_editor'      => false,
  'enable_admin_bar'         => false,
  'enable_editor_styles'     => false,
  'enable_wp_generator'      => false,
  'enable_admin_menu_items'  => false,
  'enable_rss_links'         => false,
  'enable_emojis'            => false
);

// Path Constants
define( 'THEME_ROOT', get_template_directory_uri() . '/' );
define( 'PUBLIC_DIR', THEME_ROOT . 'dist/' );
define( 'STYLES_DIR', PUBLIC_DIR . 'styles/' );
define( 'SCRIPTS_DIR', PUBLIC_DIR . 'javascripts/' );
define( 'IMAGES_DIR', PUBLIC_DIR . 'images/' );
define( 'VENDOR_SCRIPTS_DIR', THEME_ROOT . 'dist/javascripts/vendors/' );
