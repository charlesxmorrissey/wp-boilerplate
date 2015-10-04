<?php
/**
 * Add new mime types
 *
 * @package     WPBF
 * @subpackage  WPBF/includes
 * @copyright   Copyright (c) 2015, Charles X. Morrissey
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Charles X. Morrissey <hi@charles-x.com>
 */

class WPBF_Add_Mime_Types {

  /**
   * Initialize the class
   */
  public function __construct() {
    add_filter('upload_mimes', array($this, 'add_svg'));
  }

  /**
     * Add SVG mime type
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
  public function add_svg($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }

}
