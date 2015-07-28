<?php
/**
 * Custom admin features
 *
 * @package     WPBF
 * @subpackage  WPBF/includes
 * @copyright   Copyright (c) 2015, Charles X. Morrissey
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Charles X. Morrissey <hi@charles-x.com>
 */

class WPBF_Admin_Features {

  /**
   * Initialize the class
   */
  public function __construct() {
    add_action('_admin_menu', array($this, 'remove_editor_menu'), 1);
    add_action('admin_menu', array($this, 'remove_admin_menu_items'));
    add_action('wp_before_admin_bar_render', array($this, 'remove_admin_bar_links'));

    // add_editor_style('editor-style.css');
  }

  /**
     * Disable the file editor
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
  public function remove_editor_menu() {
    remove_action('admin_menu', '_add_themes_utility_last', 101);
  }

  /**
     * Remove unwanted items from admin
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
  public function remove_admin_menu_items() {
    global $menu;
    $remove_menu_items = array(__('Comments'), __('Links'), __('Posts'));
    end ($menu);
    while (prev($menu)) :
      $item = explode(' ',$menu[key($menu)][0]);
      if (in_array ($item[0] != NULL?$item[0] : "" , $remove_menu_items)) :
        unset ($menu[key($menu)]);
      endif;
    endwhile;
  }

  /**
     * Remove the comments link
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
  public function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
  }

}
