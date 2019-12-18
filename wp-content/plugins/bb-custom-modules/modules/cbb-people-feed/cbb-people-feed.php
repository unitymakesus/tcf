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
			'category'    => __( 'Layout', 'cbb' ),
			'dir'         => CBB_MODULES_DIR . 'modules/cbb-people-feed/',
			'url'         => CBB_MODULES_URL . 'modules/cbb-people-feed/',
			'icon'        => 'card.svg',
		]);
  }

  /**
   * Retrieve people posts.
   */
  public function query_people($settings) {
		if (!$settings->type) {
			return;
		}

    $args = [
      'post_type'      => 'simple-team',
      'order'          => 'ASC',
      'orderby'        => 'meta_key',
      'meta_value_num' => 'last_name',
      'posts_per_page' => -1,
    ];

    if ($settings->type) {
      $args['tax_query'] = [
        'taxonomy' => 'simple-team-category',
        'field'    => 'id',
        'terms'    => $settings->type,
      ];
    }

    return get_posts($args);
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
