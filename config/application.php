<?php
$root_dir = dirname(__DIR__);
$webroot_dir = $root_dir . '/wp';

// Use Dotenv to set required environment variables and load .env file in root
if ( file_exists($root_dir . '/.env') ) {
  Dotenv::load($root_dir);
}

Dotenv::required(array('DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL'));

// Set up our global environment constant and load its config first
// Default: development
define( 'WP_ENV', getenv('WP_ENV') ? getenv('WP_ENV') : 'development' );

$env_config = dirname(__FILE__) . '/environments/' . WP_ENV . '.php';

if (file_exists($env_config)) {
  require_once $env_config;
}

// Define URLs
define( 'WP_HOME', getenv('WP_HOME') );
define( 'WP_SITEURL', getenv('WP_SITEURL') );

// Custom Content Directory
define( 'CONTENT_PATH', '/content' );
define( 'WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . CONTENT_PATH );
define( 'WP_CONTENT_URL', WP_HOME . CONTENT_PATH );
define( 'WP_PLUGIN_DIR', $_SERVER['DOCUMENT_ROOT'] . CONTENT_PATH . '/plugins' );
define( 'WP_PLUGIN_URL', WP_HOME . CONTENT_PATH . '/plugins');

// DB settings
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = getenv('DB_PREFIX') ?: 'wp_';

// Authentication Unique Keys and Salts
define( 'AUTH_KEY',         getenv('AUTH_KEY') );
define( 'SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY') );
define( 'LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY') );
define( 'NONCE_KEY',        getenv('NONCE_KEY') );
define( 'AUTH_SALT',        getenv('AUTH_SALT') );
define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') );
define( 'LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT') );
define( 'NONCE_SALT',       getenv('NONCE_SALT') );

// Custom Settings
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'DISABLE_WP_CRON', true );
define( 'DISALLOW_FILE_EDIT', true );
define( 'WP_POST_REVISIONS', 2 );
define( 'WP_DEFAULT_THEME', 'boilerplate' );

// Bootstrap WordPress
if ( !defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', $webroot_dir );
}
