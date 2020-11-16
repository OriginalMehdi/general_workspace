<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue child scripts
 */
if ( ! function_exists( 'atomlab_child_enqueue_scripts' ) ) {
	function atomlab_child_enqueue_scripts() {
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG == true ? '' : '.min';

		wp_enqueue_style( 'atomlab-style', ATOMLAB_THEME_URI . "/style{$min}.css" );
	}
}
add_action( 'wp_enqueue_scripts', 'atomlab_child_enqueue_scripts' );
