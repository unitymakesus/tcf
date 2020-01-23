<?php

namespace App;

/**
 * Customize Breadcrumbs plugin
 */
add_filter('breadcrumb_trail_object', function($args) {
  global $post;

  $breadcrumbs = new \Breadcrumb_Trail($args);
  $post_type = $post->post_type ?? '';

  if ($post_type == "simple-team") {
    array_splice($breadcrumbs->items, 1, 0, '<a href="/team/">Team</a>');
  } elseif ($post_type == "event") {
    array_splice($breadcrumbs->items, 1, 0, '<a href="/events/">Events</a>');
  } elseif ($post_type == "post") {
    if (is_singular()) {
      // Add the blog permalink.
      $title = get_the_title( get_option('page_for_posts', true) );
      array_splice($breadcrumbs->items, 1, 0, '<a href="' . get_post_type_archive_link( 'post' ) . '">' . $title . '</a>');
    }
  }

  return $breadcrumbs;

  function __construct( $args = [] ) {
    $defaults = [
      'container'       => 'nav',
      'before'          => '',
      'after'           => '',
      'browse_tag'      => 'div',
      'list_tag'        => 'ul',
      'item_tag'        => 'li',
      'show_on_front'   => true,
      'network'         => false,
      'show_title'      => true,
      'show_browse'     => true,
      'labels'          => [],
      'post_taxonomy'   => [],
      'echo'            => true
    ];
  };
});
