<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initial OneClick import for this theme
 */
if ( ! class_exists( 'Atomlab_Import' ) ) {
	class Atomlab_Import {

		public function __construct() {
			add_filter( 'insight_core_import_demos', array( $this, 'import_demos' ) );
			add_filter( 'insight_core_import_generate_thumb', array( $this, 'import_generate_thumb' ) );
		}

		public function import_demos() {
			return array(
				'01' => array(
					'screenshot' => ATOMLAB_THEME_URI . '/screenshot.jpg',
					'name'       => ATOMLAB_THEME_NAME,
					'url'        => 'https://www.dropbox.com/s/jpb3rkobs2yidl9/atomlab-insightcore01-1.1.zip?dl=1',
				),
			);
		}

		/**
		 * Generate thumbnail while importing
		 */
		function import_generate_thumb() {
			return false;
		}
	}

	new Atomlab_Import();
}
