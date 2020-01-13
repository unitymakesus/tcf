<?php

namespace App;

/**
 * ACF Local JSON
 * @source https://www.advancedcustomfields.com/resources/local-json/
 */
add_filter('acf/settings/save_json', function() {
  return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
  if (is_child_theme()) {
    $paths[] = get_template_directory() . '/acf-json';
  }

  return $paths;
});

/**
 * ACF Theme Options
 */
if ( function_exists('acf_add_options_page') ) {
  acf_add_options_page([
    'page_title' 	=> 'Theme General Settings',
    'menu_title'	=> 'Theme Settings',
    'menu_slug' 	=> 'theme-general-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false,
  ]);

  acf_add_options_sub_page([
    'page_title' 	=> 'County Map Settings',
    'menu_title'	=> 'County Map',
    'parent_slug'	=> 'theme-general-settings',
  ]);

  acf_add_options_sub_page([
    'page_title' 	=> 'Blog / Stories Settings',
    'menu_title'	=> 'Settings',
    'parent_slug'	=> 'edit.php',
  ]);
}

/**
 * Templates and Page IDs without editor
 */
function ea_disable_editor( $id = false ) {

	$excluded_templates = [
		'views/template-awards.blade.php',
		'views/template-events.blade.php',
  ];

	$excluded_ids = [];

	if( empty( $id ) )
		return false;

	$id = intval( $id );
  $template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;
}
add_filter( 'gutenberg_can_edit_post_type', __NAMESPACE__.'\\ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', __NAMESPACE__.'\\ea_disable_gutenberg', 10, 2 );

/**
 * Disable Classic Editor by template
 *
 */
// function ea_disable_classic_editor() {

// 	$screen = get_current_screen();
// 	if( 'page' !== $screen->id || ! isset( $_GET['post']) )
// 		return;

// 	if( ea_disable_editor( $_GET['post'] ) ) {
// 		remove_post_type_support( 'page', 'editor' );
// 	}

// }
// add_action( 'admin_head', __NAMESPACE__.'\\ea_disable_classic_editor' );

/**
 * Init TinyMCE with "paste as text" enabled
 */
function paste_as_text($init) {
	$init['paste_as_text'] = true;

  return $init;
}
add_filter('tiny_mce_before_init', __NAMESPACE__ . '\\paste_as_text');

/**
 * Remove dashboard widgets
 */
function cleanup_dashboard_widgets() {
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
	remove_meta_box('dashboard_activity', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', __NAMESPACE__ . '\\cleanup_dashboard_widgets');

/**
 * Remove welcome panel.
 */
remove_action('welcome_panel', 'wp_welcome_panel');
