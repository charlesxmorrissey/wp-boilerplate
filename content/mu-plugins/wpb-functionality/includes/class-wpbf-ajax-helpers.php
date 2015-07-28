<?php
/**
 * Ajax Helpers
 *
 * @package     WPBF
 * @subpackage  WPBF/includes
 * @copyright   Copyright (c) 2015, Charles X. Morrissey
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Charles X. Morrissey <hi@charles-x.com>
 */

class WPBF_Ajax_Helpers {

  /**
   * Initialize the class
   */
  public function __construct() {
    // add_action('init', array($this, 'is_ajax_request'));
  }

  /**
     * Returns true if the request is a XMLHttpRequest.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
  public function is_ajax_request() {
    $headers = $_SERVER;
    return isset($headers['HTTP_X_REQUESTED_WITH']) && $headers['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest";
  }

}
