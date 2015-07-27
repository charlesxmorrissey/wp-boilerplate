<?php

/**
 * Helper functions
 */

/**
 * Get page permalink by slug
 */
function getPageBySlug($name) {
  $link = get_page_by_path($name);
  return get_permalink($link->ID);
}

/**
 * Check if custom post type
 */
function isPostType($type) {
  global $post;
  if ($type == get_post_type()) return true;
  return false;
}

/**
 * Debug
 */
function debugger($obj) {
  echo "<pre>\n";
  print_r($obj);
  echo "\n</pre>";
}
