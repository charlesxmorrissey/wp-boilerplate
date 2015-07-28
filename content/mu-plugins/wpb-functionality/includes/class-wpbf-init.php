<?php
/**
 * Main Init Class
 *
 * @package     WPBF
 * @subpackage  WPBF/includes
 * @copyright   Copyright (c) 2015, Charles X. Morrissey
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Charles X. Morrissey <hi@charles-x.com>
 */

class WPBF_Init {

  /**
   * Initialize the class
   */
  public function __construct() {
    $register_post_types = new WPBF_Register_Post_Types();
    $register_taxonomies = new WPBF_Register_Taxonomies();
    $clean_up_head       = new WPBF_Clean_Up_Head();
    $add_mime_types      = new WPBF_Add_Mime_Types();
    $admin_features      = new WPBF_Admin_Features();
    $asset_helpers       = new WPBF_Asset_Helpers();
  }

}
