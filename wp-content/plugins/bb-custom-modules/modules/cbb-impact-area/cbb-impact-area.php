<?php

/**
 * @class CbbImpactAreaModule
 */
class CbbImpactAreaModule extends FLBuilderModule {
	/**
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct([
			'name'        => __( 'Impact Area', 'cbb' ),
			'description' => __( 'Display a special call to action for an impact area.', 'cbb' ),
			'category'    => __( 'Custom', 'cbb' ),
			'dir'         => CBB_MODULES_DIR . 'modules/cbb-impact-area/',
			'url'         => CBB_MODULES_URL . 'modules/cbb-impact-area/',
			'icon'        => 'card.svg',
		]);

		/**
		 * Enqueue assets.
		 */
		// $this->add_css( 'cbb-impact-area', CBB_MODULES_URL . 'dist/styles/cbb-impact-area.css' );
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
FLBuilder::register_module( 'CbbImpactAreaModule', [
	'cbb-figure-card-general' => [
		'title' => __( 'General', 'cbb' ),
		'sections' => [
			'cbb-figure-card-style' => [
				'title' => __('Style', 'cbb'),
				'fields' => [
					'color_palette' => [
						'type'    => 'select',
						'label'   => __('Color Palette', 'cbb'),
						'default' => 'teal',
						'options' => [
							'teal'   => __('Teal', 'cbb'),
							'green'  => __('Green', 'cbb'),
							'orange' => __('Orange', 'cbb'),
							'brown'  => __('Brown', 'cbb'),
							'grey'   => __('Grey', 'cbb'),
						],
					],
				]
			],
			'cbb-figure-card-content' => [
				'title' => __( 'Content', 'cbb' ),
				'fields' => [
					'title' => [
						'type' => 'text',
						'label' => __('Title', 'cbb'),
					],
					'link' => [
						'type' => 'link',
						'label' => __('Link', 'cbb'),
					],
					'impact_icon' => [
						'type'  => 'photo',
						'label' => __('Impact Icon', 'cbb'),
					],
					'background_image' => [
						'type'        => 'photo',
						'label'       => __('Background Image', 'cbb'),
						'help'        => __( 'Recommended image size: 600x400', 'cbb' ),
					],
				]
			],
		]
	]
] );
