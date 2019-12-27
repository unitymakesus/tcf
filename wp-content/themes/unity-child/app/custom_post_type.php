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
      'editor',
      'revisions',
      'page-attributes',
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
    'menu_position' => 20,
    'menu_icon' => 'dashicons-calendar',
    'capability_type' => 'page',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'revisions',
      'page-attributes',
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
    'show_in_nav_menus' => false,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-awards',
    'capability_type' => 'page',
		'hierarchical' => false,
		'show_in_rest' => true,
    'supports' => array(
      'title',
      'revisions',
    ),
    'has_archive' => false,
  );
  register_post_type( 'award', $argsAwards );
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
		'show_in_nav_menus' => false,
		'hierarchical' => true,
		'rewrite' => false
	);
  register_taxonomy('simple-team-category', 'simple-team', $argsTeamCategories);

  $argsEventCategories = array(
		'labels' => array(
			'name' => __( 'Categories' ),
			'singular_name' => __( 'Category' )
		),
		'publicly_queryable' => true,
		'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'hierarchical' => true,
		'rewrite' => false
	);
  register_taxonomy('event_category', 'event', $argsEventCategories);

  $argsEventCategories = array(
		'labels' => array(
			'name' => __( 'Categories' ),
			'singular_name' => __( 'Category' )
		),
		'publicly_queryable' => true,
		'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'hierarchical' => true,
		'rewrite' => false
	);
  register_taxonomy('event_category', 'event', $argsEventCategories);

  $argsAwardCategories = array(
		'labels' => array(
			'name' => __( 'Categories' ),
			'singular_name' => __( 'Category' )
		),
		'publicly_queryable' => true,
		'show_ui' => true,
    'show_admin_column' => true,
		'show_in_nav_menus' => false,
		'hierarchical' => true,
		'rewrite' => false
	);
	register_taxonomy('award_category', 'award', $argsAwardCategories);
}
add_action( 'init', __NAMESPACE__.'\\create_taxonomies' );
