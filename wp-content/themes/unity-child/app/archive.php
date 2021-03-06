<?php

namespace App;

/**
 * Update the archive title.
 */
add_filter('get_the_archive_title', function ($title) {
  if (is_post_type_archive('press') || is_post_type_archive('newsletter')) {
    return __('Press / Media', 'sage');
  }

  return $title;
});

/**
 * Custom query args for archives.
 */
function modify_blog_query($query) {
	if (!is_admin() && $query->is_main_query()) {
    if (is_tax()) {
      return $query;
    }

    /**
     * Main blog (+ stories).
     */
    if ($query->is_home()) {
      $orderby = [
        'date' => 'DESC',
        'ID'   => 'ASC'
      ];

      $query->set('orderby', $orderby);

      if (isset($_GET['filter'])) {
        $tax_query = [
          [
            'taxonomy' => 'tcf_post_type',
            'field'    => 'slug',
            'terms'    => $_GET['filter'],
          ]
        ];

        $query->set('tax_query', $tax_query);
      }
    }

    /**
     * Press + Newsletters.
     */
    if (is_post_type_archive('press')) {
      $query->set('posts_per_page', -1);
      $query->set('post_type', ['press', 'newsletter']);

      if (isset($_GET['filter'])) {
        if ($_GET['filter'] === 'newsletter') {
            $query->set('post_type', ['newsletter']);
        } else {
            $query->set('post_type', ['press']);
            $tax_query = [
                [
                    'taxonomy' => 'press_category',
                    'field'    => 'slug',
                    'terms'    => 'publications',
                    'operator' => $_GET['filter'] === 'media' ? 'IN' : 'NOT IN',
                ],
            ];
        }

        $query->set('tax_query', $tax_query);
      }
    }
  }
  return $query;
}
add_action('pre_get_posts', __NAMESPACE__ . '\\modify_blog_query');
