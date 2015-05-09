<?php

//
// Custom Post Types
//
// if ( !function_exists( 'register_custom_post_types' ) ) :
//   function register_custom_post_types () {

    // Stub Custom Post Type
    // $labels = array(
    //   'name'               => _x( 'Stub', 'post type general name' ),
    //   'singular_name'      => _x( 'Stub', 'post type singular name' ),
    //   'add_new'            => _x( 'Add Stub', 'text_domain' ),
    //   'add_new_item'       => __( 'Add Stub' ),
    //   'edit_item'          => __( 'Edit Stub' ),
    //   'new_item'           => __( 'New Stub' ),
    //   'all_items'          => __( 'All Stubs' ),
    //   'view_item'          => __( 'View Stub' ),
    //   'search_items'       => __( 'Search Stubs' ),
    //   'not_found'          => __( 'No stubs found' ),
    //   'not_found_in_trash' => __( 'No stubs found in the trash' ),
    //   'parent_item_colon'  => '',
    //   'menu_name'          => 'Stub'
    // );

    // $args = array(
    //   'labels'            => $labels,
    //   'description'       => '',
    //   'public'            => true,
    //   'menu_position'     => 4,
    //   'show_in_nav_menus' => true,
    //   'supports'          => array( 'title', 'editor', 'thumbnail' ),
    //   'taxonomies'        => array('category'),
    //   'has_archive'       => true,
    //   'rewrite'           => array('slug' => 'stub'),
    // );

    // register_post_type( 'stub', $args );
  // }

// endif;

// add_action( 'init', 'register_custom_post_types' );


//
// Custom Taxonomies
//
// if ( !function_exists( 'register_custom_taxonomies' ) ) :

//   function register_custom_taxonomies () {

  //   // Stub Custom Taxonomy
  //   register_taxonomy(
  //     'tags', 'Stub',
  //     array(
  //       'hierarchical' => false,
  //       'labels' => array(
  //         'name' => _x( 'Tag', 'taxonomy general name' ),
  //         'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
  //         'search_items' =>  __( 'Search Tags' ),
  //         'all_items' => __( 'All Tags' ),
  //         'edit_item' => __( 'Edit Tag' ),
  //         'update_item' => __( 'Update Tag' ),
  //         'add_new_item' => __( 'Add New Tag' ),
  //         'new_item_name' => __( 'New Tag Name' ),
  //         'menu_name' => __( 'Tags' ),
  //       ),
  //       'show_ui' => true,
  //       'query_var' => true
  //       // 'rewrite' => array( 'slug' => 'stub/tags' )
  //     )
  //   );

//   }

// endif;

// add_action( 'init', 'register_custom_taxonomies' );
