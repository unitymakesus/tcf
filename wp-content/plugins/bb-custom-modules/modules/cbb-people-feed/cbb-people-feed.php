<?php

/**
 * @class CbbPeopleFeedModule
 */
class CbbPeopleFeedModule extends FLBuilderModule {
	/**
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct([
			'name'        => __( 'People Feed', 'cbb' ),
			'description' => __( 'Display a feed of people bios by category.', 'cbb' ),
			'category'    => __( 'Custom', 'cbb' ),
			'dir'         => CBB_MODULES_DIR . 'modules/cbb-people-feed/',
			'url'         => CBB_MODULES_URL . 'modules/cbb-people-feed/',
			'icon'        => 'people.svg',
		]);
  }

  /**
   * Retrieve people posts.
   */
  public function query_people($settings) {
		if (empty($settings->category)) {
			return;
		}

    $args = [
      'post_type'      => 'simple-team',
      'order'          => 'ASC',
      'orderby'        => 'meta_value',
      'meta_key'       => 'last_name',
      'posts_per_page' => -1,
    ];

    if (!empty($settings->category)) {
      $args['tax_query'] = [
				[
					'taxonomy' => 'simple-team-category',
					'field'    => 'term_id',
					'terms'    => $settings->category,
				]
      ];
		}

    return get_posts($args);
	}


	/**
	 * Function to get the icon for the Figure Card module
	 *
	 * @method get_icons
	 * @param string $icon gets the icon for the module.
	 */
	public function get_icon( $icon = '' ) {
		// check if $icon is referencing an included icon.
		if ( '' != $icon && file_exists( CBB_MODULES_DIR . 'assets/icons/' . $icon ) ) {
			$path = CBB_MODULES_DIR . 'assets/icons/' . $icon;
		}
		if ( file_exists( $path ) ) {
			return file_get_contents( $path );
		} else {
			return '';
		}
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module( 'CbbPeopleFeedModule', [
	'cbb-people-feed-general' => [
		'title' => __( 'General', 'cbb' ),
		'sections' => [
			'cbb-people-feed-content' => [
				'title' => __( 'Content', 'cbb' ),
				'fields' => [
					'category' => [
						'type'   => 'suggest',
						'label'  => __( 'Category', 'cbb' ),
						'action' => 'fl_as_terms',
						'data'   => 'simple-team-category',
					],
				]
			],
		]
	]
] );
