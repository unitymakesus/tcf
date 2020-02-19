<?php

namespace App;

/**
 * Adjustments to menu attributes to support WCAG 2.0 recommendations
 * for flyout and dropdown menus.
 *
 * @link https://www.w3.org/WAI/tutorials/menus/flyout/
 */
add_filter('nav_menu_link_attributes', function( $atts, $item, $args, $depth ) {
  if ( in_array( 'menu-item-has-children', $item->classes ) && $depth === 0 ) {
    $atts['aria-haspopup'] = 'true';
  }

  return $atts;
}, 10, 4);

/**
 * Provide a sub-menu toggle button for mobile users.
 */
add_filter('walker_nav_menu_start_el', function( $item_output, $item, $depth, $args ) {
  if ( in_array( 'menu-item-has-children', $item->classes ) && $depth === 0 ) {
    $item_output = str_replace("</a>", "</a><button class='btn btn-small btn-toggle--sub-menu' aria-expanded='false' aria-label='open submenu: {$item->title}'><i class='material-icons' aria-hidden='true'>arrow_drop_down</i></button>", $item_output);
  }

  return $item_output;
}, 10, 4);
