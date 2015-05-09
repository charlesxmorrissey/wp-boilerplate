<?php

//
// Wordpress Specific functions
//

// Enable image sizes
if ( $theme_config['enable_image_sizes'] === true ) {
  add_filter( 'jpeg_quality', function($arg) { return 100; } );

  // Image sizes
  // add_image_size( 'size-name', 600, 315, true );
}

// Enable featured images
if ( $theme_config['enable_thumbnail_support'] === true ) {
  add_theme_support( 'post-thumbnails', array( 'stub' ) );
}

// Disable the file editor
if ( $theme_config['enable_theme_editor'] === false ) {
  function remove_editor_menu() {
    remove_action( 'admin_menu', '_add_themes_utility_last', 101 );
  }
  add_action( '_admin_menu', 'remove_editor_menu', 1 );
}

// Disable the admin bar
if ( $theme_config['enable_admin_bar'] === false ) {
  add_filter( 'show_admin_bar', '__return_false' );
}

// Enable Editor Styles
if ( $theme_config['enable_editor_styles'] === true ) {
  add_editor_style( 'src/css/editor-style.css' );
}

// Remove WP version from header
if ( $theme_config['remove_wp_generator'] === true ) {
  remove_action( 'wp_head', 'wp_generator' );
}

// Remove unwanted pages from admin menu
if ( $theme_config['remove_admin_menu_items'] === true ) {
  function remove_admin_menu_items() {
    global $menu;
    $remove_menu_items = array( __('Comments'), __('Links'), __('Posts') );
    end ( $menu );
    while ( prev($menu) ) :
      $item = explode(' ',$menu[key($menu)][0]);
      if ( in_array ( $item[0] != NULL?$item[0] : "" , $remove_menu_items ) ) :
        unset ( $menu[key($menu)] );
      endif;
    endwhile;
  }

  function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar -> remove_menu('comments');    // Remove the comments link
    $wp_admin_bar -> remove_menu('new-content'); // Remove the content link
  }

  add_action( 'admin_menu', 'remove_admin_menu_items' );
  add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
}
