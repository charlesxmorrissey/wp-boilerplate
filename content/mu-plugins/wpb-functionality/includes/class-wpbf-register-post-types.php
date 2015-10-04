<?php
/**
 * Register custom post types
 *
 * @package     WPBF
 * @subpackage  WPBF/includes
 * @copyright   Copyright (c) 2015, Charles X. Morrissey
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Charles X. Morrissey <hi@charles-x.com>
 */

class WPBF_Register_Post_Types {

  /**
   * Initialize the class
   */
  public function __construct() {
    add_action('init', array($this, 'register_custom_post_types'));
  }

  /**
   * Register Stub Custom Post Type
   *
   * @since  1.0.0
   * @access public
   * @return void
   */
  public function register_custom_post_types() {
    $labels = array(
      'name'               => _x('Stub', 'post type general name'),
      'singular_name'      => _x('Stub', 'post type singular name'),
      'add_new'            => _x('Add Stub', 'text_domain'),
      'add_new_item'       => __('Add Stub'),
      'edit_item'          => __('Edit Stub'),
      'new_item'           => __('New Stub'),
      'all_items'          => __('All Stubs'),
      'view_item'          => __('View Stub'),
      'search_items'       => __('Search Stubs'),
      'not_found'          => __('No stubs found'),
      'not_found_in_trash' => __('No stubs found in the trash'),
      'parent_item_colon'  => '',
      'menu_name'          => 'Stub'
    );

    $args = array(
      'labels'            => $labels,
      'description'       => '',
      'public'            => true,
      'menu_position'     => 4,
      'show_in_nav_menus' => true,
      'supports'          => array('title', 'editor', 'thumbnail'),
      'taxonomies'        => array('stub_tags'),
      'has_archive'       => true,
      'rewrite'           => array('slug' => 'stub'),
    );

    register_post_type('stub', $args);
  }

}
