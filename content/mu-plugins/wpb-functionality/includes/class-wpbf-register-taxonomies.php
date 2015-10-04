<?php
/**
 * Register custom taxonomies
 *
 * @package     WPBF
 * @subpackage  WPBF/includes
 * @copyright   Copyright (c) 2015, Charles X. Morrissey
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Charles X. Morrissey <hi@charles-x.com>
 */

class WPBF_Register_Taxonomies {

  /**
   * Initialize the class
   */
  public function __construct() {
    add_action('init', array($this, 'register_custom_taxonomies'));
  }

  /**
   * Register Stub Custom Taxonomy
   *
   * @since  1.0.0
   * @access public
   * @return void
   */
  public function register_custom_taxonomies() {

    // Stub Custom Taxonomy
    $stub_tag_labels = array(
      'name'                       => _x('Stub Tags', 'taxonomy general name'),
      'singular_name'              => _x('Stub Tag', 'taxonomy singular name'),
      'search_items'               => __('Search Stub Tags'),
      'popular_items'              => __('Popular Stub Tags'),
      'all_items'                  => __('All Stub Tags'),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __('Edit Stub Tag'),
      'update_item'                => __('Update Stub Tag'),
      'add_new_item'               => __('Add New Stub Tag'),
      'new_item_name'              => __('New Stub Tag'),
      'separate_items_with_commas' => __('Separate stub tags with commas'),
      'add_or_remove_items'        => __('Add or remove stub tags'),
      'choose_from_most_used'      => __('Choose from the most used stub tags'),
      'menu_name'                  => __('Stub Tags'),
    );

    register_taxonomy("stub_tags", array("stub"), array(
      'labels'         => $stub_tag_labels,
      'show_ui'        => true,
      'query_var'      => true,
      'rewrite'        => array(
        'slug'         => 'stub/tag',
        'with_front'   => true,
        'heirarchical' => false
      ))
    );

  }

}
