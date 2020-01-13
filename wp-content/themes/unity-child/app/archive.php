<?php

namespace App;

function modify_blog_query($query) {
	if (!is_admin() && $query->is_main_query() && $query->is_home()) {
    if (is_tax()) {
      return $query;
    }

    if (isset($_GET['filter'])) {
      $stories = get_field('stories_taxonomies', 'options');
      $tax_query = [
        [
          'taxonomy' => 'category',
          'field'    => 'id',
          'terms'    => $stories,
          'operator' => $_GET['filter'] === 'stories' ? 'IN' : 'NOT IN',
        ]
      ];

      $query->set('tax_query', $tax_query);
    }
  }

  return $query;
}
add_action('pre_get_posts', __NAMESPACE__ . '\\modify_blog_query');
