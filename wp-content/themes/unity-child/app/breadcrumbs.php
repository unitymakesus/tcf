<?php

namespace App;

/**
 * Remove Breadcrumbs inline styles.
 */
add_filter('breadcrumb_trail_inline_style', '__return_false');

/**
 * Override default Breadcrumbs args.
 *
 * @param array $args
 */
add_filter('breadcrumb_trail_args', function($args) {
  $args = [
    'container'     => 'nav',
    'before'        => '',
    'after'         => '',
    'browse_tag'    => 'div',
    'list_tag'      => 'ul',
    'item_tag'      => 'li',
    'show_on_front' => true,
    'network'       => false,
    'show_title'    => true,
    'show_browse'   => true,
    'labels'        => [],
    'post_taxonomy' => [],
    'echo'          => true,
  ];

  return $args;
});

/**
 * Customize Breadcrumbs plugin
 */
add_filter('breadcrumb_trail_object', function($args) {
  global $post;

  $breadcrumbs = new \Breadcrumb_Trail($args);
  $post_type = $post->post_type ?? '';

  if ($post_type == "simple-team") {
    $team_page = '';
    if ($category = get_the_terms($post->ID, 'simple-team-category')) {
      $category_name = $category[0]->name;
      $team_page = get_page_by_title($category_name, OBJECT, 'page');
    }
    // Replace the People archive page with a "staff" page title matching the category title / slug.
    if ($team_page) {
      if ($parent = wp_get_post_parent_id($team_page)) {
        array_splice($breadcrumbs->items, 1, 0, '<a href="'. get_the_permalink($parent) .'">'. get_the_title($parent) .'</a>');
        $breadcrumbs->items[2] = '<a href="' . get_the_permalink($team_page) . '">' . $team_page->post_title . '</a>';
      } else {
        $breadcrumbs->items[1] = '<a href="' . get_the_permalink($team_page) . '">' . $team_page->post_title . '</a>';
      }
    }
  } elseif ($post_type == "event") {
    array_splice($breadcrumbs->items, 1, 0, '<a href="/events/">Events</a>');
  } elseif ($post_type == "post") {
    if (is_singular()) {
      // Add the blog permalink.
      $title = get_the_title( get_option('page_for_posts', true) );
      array_splice($breadcrumbs->items, 1, 0, '<a href="' . get_post_type_archive_link( 'post' ) . '">' . $title . '</a>');
    }
  } elseif ($post_type == "award") {
    if ($category = get_the_terms($post->ID, 'award_category')) {
      $current_cat = $category[0];
      $slug = '';

      if ($current_cat->slug == 'grants') {
        $slug = home_url('/nonprofits/grants/');
      } elseif ($current_cat->slug == 'scholarships') {
        $slug = home_url('/students/scholarships-awards/');
      }

      array_splice($breadcrumbs->items, 1, 0, '<a href="' . $slug . '">' . $current_cat->name . '</a>');
    }
  }

  return $breadcrumbs;
});
