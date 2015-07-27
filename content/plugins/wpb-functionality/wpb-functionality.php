<?php

/**
 * @package     WPBF
 * @link        https://github.com/charlesxmorrissey/wp-boilerplate
 * @copyright   Copyright (c) 2015, Charles X. Morrissey
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Charles X. Morrissey <hi@charles-x.com>
 *
 * @wordpress-plugin
 * Plugin Name:       WP Boilerplate Functionality
 * Plugin URI:        https://github.com/charlesxmorrissey/wp-boilerplate
 * Description:       Custom functionality plugin for wp-boilerplate
 * Version:           1.0.0
 * Author:            Charles X. Morrissey
 * Author URI:        http://work.charles-x.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

if (!class_exists('WPBF')) {

  class WPBF {

    /**
     * Instance of the class
     *
     * @since 1.0.0
     * @var Instance of WPBF class
     */
    private static $instance;

    /**
     * Instance of the plugin
     *
     * @since 1.0.0
     * @static
     * @staticvar array $instance
     * @return Instance
     */
    public static function instance() {
      if (!isset(self::$instance) && ! (self::$instance instanceof WPBF)) {
        self::$instance = new WPBF;
        self::$instance->define_constants();
        add_action('plugins_loaded', array(self::$instance, 'load_textdomain'));
        self::$instance->includes();
        self::$instance->init = new WPBF_Init();
      }
      return self::$instance;
    }

    /**
     * Define the plugin constants
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function define_constants() {
      // Plugin Version
      if (!defined('WPBF_VERSION')) {
        define('WPBF_VERSION', '1.0.0');
      }

      // Prefix
      if (!defined('WPBF_PREFIX')) {
        define('WPBF_PREFIX', 'wpbf_');
      }

      // Textdomain
      if (!defined('WPBF_TEXTDOMAIN')) {
        define('WPBF_TEXTDOMAIN', 'wpbf');
      }

      // Plugin options
      if (!defined('WPBF_OPTIONS')) {
        define('WPBF_OPTIONS', 'wpbf-options');
      }

      // Plugin directory
      if (!defined('WPBF_PLUGIN_DIR')) {
        define('WPBF_PLUGIN_DIR', plugin_dir_path(__FILE__));
      }

      // Plugin URL
      if (!defined('WPBF_PLUGIN_URL')) {
        define('WPBF_PLUGIN_URL', plugin_dir_url(__FILE__));
      }

      // Plugin root file
      if (!defined('WPBF_PLUGIN_FILE')) {
        define('WPBF_PLUGIN_FILE', __FILE__);
      }
    }

    /**
     * Load the required files
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function includes() {
      $includes_path = plugin_dir_path(__FILE__) . 'includes/';

      require_once WPBF_PLUGIN_DIR . 'includes/class-wpbf-register-post-types.php';
      require_once WPBF_PLUGIN_DIR . 'includes/class-wpbf-register-taxonomies.php';
      require_once WPBF_PLUGIN_DIR . 'includes/class-wpbf-clean-up-head.php';
      require_once WPBF_PLUGIN_DIR . 'includes/class-wpbf-add-mime-types.php';
      require_once WPBF_PLUGIN_DIR . 'includes/class-wpbf-admin-features.php';
      require_once WPBF_PLUGIN_DIR . 'includes/class-wpbf-asset-helpers.php';

      require_once WPBF_PLUGIN_DIR . 'includes/class-wpbf-init.php';
    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since  1.0.0
     * @access public
     */
    public function load_textdomain() {
      $wpbf_lang_dir = dirname(plugin_basename(WPBF_PLUGIN_FILE)) . '/languages/';
      $wpbf_lang_dir = apply_filters('WPBF_lang_dir', $wpbf_lang_dir);

      $locale = apply_filters('plugin_locale', get_locale(), WPBF_TEXTDOMAIN);
      $mofile = sprintf('%1$s-%2$s.mo', WPBF_TEXTDOMAIN, $locale);

      $mofile_local = $wpbf_lang_dir . $mofile;
      $mofile_global = WP_LANG_DIR . '/edd/' . $mofile;

      if (file_exists($mofile_local)) {
        load_textdomain(WPBF_TEXTDOMAIN, $mofile_local);
      }
      else {
        load_plugin_textdomain(WPBF_TEXTDOMAIN, false, $wpbf_lang_dir);
      }
    }

    /**
     * Throw error on object clone
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function _clone() {
      _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', WPBF_TEXTDOMAIN), '1.6');
    }

    /**
     * Disable unserializing of the class
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function __wakeup() {
      _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', WPBF_TEXTDOMAIN), '1.6');
    }

  }

}

/**
 * Return the instance
 *
 * @since 1.0.0
 * @return object The Safety Links instance
 */
function WPBF_Run() {
  return WPBF::instance();
}

WPBF_Run();
