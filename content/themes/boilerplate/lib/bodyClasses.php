<?php

/**
 * Body classes
 */

function body_classes() {
  global $post;

  // Echo some of these things
  if (is_front_page()) echo "is-home is-intro ";
  if (is_home())       echo "is-index is-main-feed ";
  if (is_archive())    echo "is-index is-archive ";
  if (is_category())   echo "is-index is-category ";
  if (is_tax())        echo "is-index is-tax ";
  if (is_tag())        echo "is-index is-tag ";
  if (is_author())     echo "is-index is-author ";
  if (is_search())     echo "is-index is-search ";
  if (is_single())     echo "is-single is-single-except-page ";
  if (is_singular())   echo "is-single is-single-any ";
  if (is_404())        echo "is-404 ";

  // Echo is_page_(page name)
  if(is_page()) {
    $pn = $post->post_name;
    echo "is-page-" . $pn . " ";
  }

  // Echo has_parent_(parent name)
  // $post_parent = get_post( $post->post_parent );
  // $parentSlug = $post_parent->post_name;

  if (is_page() && $post->post_parent) {
    echo "has-parent-" . $parentSlug . " ";
  }

  // Echo is_tpl_(template name)
  $temp = get_page_template();
  if ($temp != null) {
    $path = pathinfo($temp);
    $tmp = $path['filename'] . "." . $path['extension'];
    $tn = str_replace(".php", "", $tmp);
    echo "is-tpl-" . $tn . " ";
  }

  // Echo is_term_(term_name)
  $tax_slug = get_query_var('taxonomy');
  $term_slug = get_query_var('term');
  if ($tax_slug != null && $term_slug != null) {
    echo "is-tax-$tax_slug is-term-$term_slug ";
  }

  // Echo is_post_type_(post_type)
  $post_type = get_post_type($post);
  if ($post_type != null) {
    echo "is-post-type-$post_type ";
  }

  // Are they logged in?
  if (is_user_logged_in()) echo "is-logged-in ";
}
