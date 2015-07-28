<?php
/**
 * Asset Helpers
 *
 * @package     WPBF
 * @subpackage  WPBF/includes
 * @copyright   Copyright (c) 2015, Charles X. Morrissey
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Charles X. Morrissey <hi@charles-x.com>
 */

class WPBF_Asset_Helpers {
  /**
   * Initialize the class
   */
  public function __construct() {
    add_filter('jpeg_quality', function($arg) { return 100; });
    add_theme_support('post-thumbnails', array( 'stub'));
  }

}
