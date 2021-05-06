<?php

namespace App;

function create_post_type() {
  $argsTeam = array(
    'labels' => array(
				'name' => 'People',
				'singular_name' => 'Person',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Person',
				'edit' => 'Edit',
				'edit_item' => 'Edit Person',
				'new_item' => 'New Person',
				'view_item' => 'View Person',
				'search_items' => 'Search People',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-groups',
    'capability_type' => 'page',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'revisions',
      'thumbnail'
    ),
    'has_archive' => false,
    'rewrite' => array(
      'slug' => 'people'
    )
  );
  register_post_type( 'simple-team', $argsTeam );

  $argsEvents = array(
    'labels' => array(
				'name' => 'Events',
				'singular_name' => 'Event',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Event',
				'edit' => 'Edit',
				'edit_item' => 'Edit Event',
				'new_item' => 'New Event',
				'view_item' => 'View Event',
				'search_items' => 'Search Events',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => false,
    'show_in_rest' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-calendar',
    'capability_type' => 'page',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'revisions',
      'thumbnail',
    ),
    'has_archive' => false,
  );
  register_post_type( 'event', $argsEvents );

  $argsAwards = array(
    'labels' => array(
				'name' => 'Awards',
				'singular_name' => 'Award',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Award',
				'edit' => 'Edit',
				'edit_item' => 'Edit Award',
				'new_item' => 'New Award',
				'view_item' => 'View Award',
				'search_items' => 'Search Awards',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
    ),
    'public' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-awards',
    'capability_type' => 'page',
		'hierarchical' => false,
		'show_in_rest' => true,
    'supports' => array(
			'title',
			'editor',
      'revisions',
    ),
    'has_archive' => false,
  );
	register_post_type( 'award', $argsAwards );

	$argsPress = array(
    'labels' => array(
				'name' => 'Press',
				'singular_name' => 'Press',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Press',
				'edit' => 'Edit',
				'edit_item' => 'Edit Press',
				'new_item' => 'New Press',
				'view_item' => 'View Press',
				'search_items' => 'Search Press',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
    ),
    'public' => false,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-clipboard',
    'capability_type' => 'page',
		'hierarchical' => false,
		'show_in_rest' => true,
    'supports' => array(
			'title',
			'editor',
			'revisions',
			'thumbnail',
    ),
    'has_archive' => true,
  );
  register_post_type( 'press', $argsPress );

    $argsNewsletter = array(
        'labels' => array(
            'name'               => 'Newsletters',
            'singular_name'      => 'Newsletter',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Newsletter',
            'edit'               => 'Edit',
            'edit_item'          => 'Edit Newsletter',
            'new_item'           => 'New Newsletter',
            'view_item'          => 'View Newsletter',
            'search_items'       => 'Search Newsletter',
            'not_found'          => 'Nothing found in the Database.',
            'not_found_in_trash' => 'Nothing found in Trash',
            'parent_item_colon'  => ''
        ),
        'public'             => true,
        'publicly_queryable' => false,
        'has_archive'        => false,
        'show_ui'            => true,
        'show_in_nav_menus'  => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-megaphone',
        'capability_type'    => 'page',
        'hierarchical'       => false,
        'show_in_rest'       => true,
        'supports'            => array(
            'title',
            'editor',
            'thumbnail',
        ),
    );
    register_post_type( 'newsletter', $argsNewsletter );
}
add_action( 'init', __NAMESPACE__.'\\create_post_type' );

function create_taxonomies() {

	$argsTeamCategories = array(
		'labels' => array(
			'name' => __( 'Categories' ),
			'singular_name' => __( 'Category' )
		),
		'publicly_queryable' => true,
		'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'rewrite' => false
	);
  register_taxonomy('simple-team-category', 'simple-team', $argsTeamCategories);

  $argsEventCategories = array(
		'labels' => array(
			'name' => __( 'Categories' ),
			'singular_name' => __( 'Category' )
		),
		'publicly_queryable' => false,
		'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_in_rest' => true,
		'hierarchical' => true,
		'rewrite' => false
	);
  register_taxonomy('event_category', 'event', $argsEventCategories);

  $argsAwardCategories = array(
		'labels' => array(
			'name' => __( 'Categories' ),
			'singular_name' => __( 'Category' )
		),
		'publicly_queryable' => false,
		'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_in_rest' => true,
		'hierarchical' => true,
		'rewrite' => false
	);
	register_taxonomy('award_category', 'award', $argsAwardCategories);

	$argsPressCategories = array(
		'labels' => array(
			'name' => __( 'Categories' ),
			'singular_name' => __( 'Category' )
		),
		'publicly_queryable' => false,
		'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_in_rest' => true,
		'hierarchical' => true,
		'rewrite' => false
	);
	register_taxonomy('press_category', 'press', $argsPressCategories);

	$argsTypes = array(
		'labels' => array(
			'name' => __( 'Types' ),
			'singular_name' => __( 'Type' )
		),
		'publicly_queryable' => false,
		'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'show_in_rest' => true,
		'hierarchical' => true,
		'rewrite' => false,
	);
	register_taxonomy('tcf_post_type', 'post', $argsTypes);
}
add_action( 'init', __NAMESPACE__.'\\create_taxonomies' );

/**
 * Redirect all single Press posts to the archive template.
 */
add_action('template_redirect', function () {
    if (!is_singular('press')) {
        return;
    }

    wp_redirect(get_post_type_archive_link('press'), 301);
    exit;
});
