<?php

namespace App;

/**
 * Adjustments to menu attributes to support WCAG 2.0 recommendations
 * for flyout and dropdown menus.
 *
 * @link https://www.w3.org/WAI/tutorials/menus/flyout/
 */
add_filter('nav_menu_link_attributes', function( $atts, $item, $args, $depth ) {
  $item_has_children = in_array( 'menu-item-has-children', $item->classes );
  if ( $item_has_children && $depth === 0 ) {
    $atts['href'] = '#';
    $atts['role'] = 'button';
    $atts['aria-haspopup'] = 'true';
    $atts['aria-expanded'] = 'false';
  }

  return $atts;
}, 10, 4);
