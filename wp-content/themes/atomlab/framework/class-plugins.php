<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin installation and activation for WordPress themes
 */
if ( ! class_exists( 'Atomlab_Register_Plugins' ) ) {
	class Atomlab_Register_Plugins {

		public function __construct() {
			add_filter( 'insight_core_tgm_plugins', array( $this, 'register_required_plugins' ) );
		}

		public function register_required_plugins() {
			/*
			 * Array of plugin arrays. Required keys are name and slug.
			 * If the source is NOT from the .org repo, then source is also required.
			 */
			$plugins = array(
				array(
					'name'     => esc_html__( 'Insight Core', 'atomlab' ),
					'slug'     => 'insight-core',
					'source'   => 'https://www.dropbox.com/s/mkt3b2gw9p3uik9/insight-core-1.5.3.3.zip?dl=1',
					'version'  => '1.5.3.3',
					'required' => true,
				),
				array(
					'name'     => esc_html__( 'Revolution Slider', 'atomlab' ),
					'slug'     => 'revslider',
					'source'   => 'https://www.dropbox.com/s/w996hylfrkmwkdg/revslider-5.4.7.3.zip?dl=1',
					'version'  => '5.4.7.3',
					'required' => true,
				),
				array(
					'name'     => esc_html__( 'WPBakery Page Builder', 'atomlab' ),
					'slug'     => 'js_composer',
					'source'   => 'https://www.dropbox.com/s/q3vu72o53d5pogc/js_composer-5.4.7.zip?dl=1',
					'version'  => '5.4.7',
					'required' => true,
				),
				array(
					'name'    => esc_html__( 'WPBakery Page Builder (Visual Composer) Clipboard', 'atomlab' ),
					'slug'    => 'vc_clipboard',
					'source'  => 'https://www.dropbox.com/s/blxfmhb3aep0sat/vc_clipboard-4.1.1.zip?dl=1',
					'version' => '4.1.1',
				),
				array(
					'name' => esc_html__( 'Contact Form 7', 'atomlab' ),
					'slug' => 'contact-form-7',
				),
				array(
					'name' => esc_html__( 'MailChimp for WordPress', 'atomlab' ),
					'slug' => 'mailchimp-for-wp',
				),
				array(
					'name' => esc_html__( 'WP-PostViews', 'atomlab' ),
					'slug' => 'wp-postviews',
				),
				array(
					'name' => esc_html__( 'Image Hotspot by DevVN', 'atomlab' ),
					'slug' => 'devvn-image-hotspot',
				),
				array(
					'name' => esc_html__( 'WooCommerce', 'atomlab' ),
					'slug' => 'woocommerce',
				),
				array(
					'name'     => esc_html__( 'YITH WooCommerce Compare', 'atomlab' ),
					'slug'     => 'yith-woocommerce-compare',
					'required' => false,
				),
				array(
					'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'atomlab' ),
					'slug'     => 'yith-woocommerce-wishlist',
					'required' => false,
				),
			);

			return $plugins;
		}

	}

	new Atomlab_Register_Plugins();
}
