<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initial setup for this theme
 */
class Atomlab_Init {

	protected static $instance = null;

	private function __construct() {
		// Add theme supports.
		add_action( 'after_setup_theme', array( $this, 'setup' ) );

		// Core filters.
		add_filter( 'insight_core_info', array( $this, 'core_info' ) );

		// Add backwards compatibility for older versions for title tag feature.
		if ( ! function_exists( '_wp_render_title_tag' ) ) {
			add_action( 'wp_head', array( $this, 'render_title' ) );
		}
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	function render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @access public
	 */
	public function setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'atomlab', ATOMLAB_THEME_DIR . '/languages' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'atomlab' ),
		) );

		// Adjust the content-width.
		$GLOBALS['content_width'] = apply_filters( 'content_width', 640 );

		/*
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */

		add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'video', 'audio', 'quote', 'link' ) );

		/*
		 * Set up the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background', apply_filters( 'custom_background_args', array(
			'default-color' => '#ffffff',
			'default-image' => '',
		) ) );

		// Support editor style.
		add_editor_style( array( 'editor-style.css' ) );

		add_theme_support( 'custom-header' );

		/*
		 * Support woocommerce
		 */
		add_theme_support( 'woocommerce' );

		/*
		 * Support selective refresh for widget
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Optimize speed for homepage
		 */
		add_theme_support( 'woo_speed' );

		// Add supports from core.
		add_theme_support( 'insight-core' );
		add_theme_support( 'insight-detect' );
		add_theme_support( 'insight-user-social-networks' );
		add_theme_support( 'insight-kungfu' );
		add_theme_support( 'insight-metabox' );
		add_theme_support( 'insight-megamenu' );
		add_theme_support( 'insight-footer' );
		add_theme_support( 'insight-sidebar' );
		add_theme_support( 'insight-portfolio' );
		add_theme_support( 'insight-testimonial' );
		add_theme_support( 'insight-swatches' );
	}

	/**
	 * Core info
	 *
	 * @param $info
	 *
	 * @return mixed
	 */
	function core_info( $info ) {
		$info['icon']    = ATOMLAB_THEME_URI . '/assets/admin/images/logo.png';
		$info['tf']      = 'https://themeforest.net/item/atomlab-multipurpose-startup-wordpress-theme/20939963';
		$info['docs']    = 'http://document.thememove.com/atomlab';
		$info['update']  = 'http://atomlab.thememove.com/data/core';
		$info['api']     = 'http://atomlab.thememove.com/data/core';
		$info['child']   = 'https://www.dropbox.com/s/tfdsx6c7b3cs9qx/atomlab-child-1.0.0.zip?dl=1';
		$info['support'] = 'http://support.thememove.com';
		$info['desc']    = esc_html__( 'Thank you for using our theme, please reward it a full five-star &#9733;&#9733;&#9733;&#9733;&#9733; rating.', 'atomlab' );

		return $info;
	}
}