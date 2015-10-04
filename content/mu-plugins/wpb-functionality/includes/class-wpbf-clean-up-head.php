<?php
/**
 * Remove WP generated content from the head
 *
 * @package     WPBF
 * @subpackage  WPBF/includes
 * @copyright   Copyright (c) 2015, Charles X. Morrissey
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Charles X. Morrissey <hi@charles-x.com>
 */

class WPBF_Clean_Up_Head {

  /**
   * Initialize the class
   */
  public function __construct() {
    add_action('init', array($this, 'clean_up_head'));
    add_filter('show_admin_bar', '__return_false');
  }

  /**
     * Remove WP generated content from the head
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
  public function clean_up_head() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
  }

}
