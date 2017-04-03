<?php

if (!function_exists( 'boilerplate_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Boilerplate 1.0
 */
  function boilerplate_setup () {
    require_once('lib/_config.php');
    require_once('lib/helpers.php');
  }
endif;

add_action('after_setup_theme', 'boilerplate_setup');
