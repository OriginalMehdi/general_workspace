<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'charity');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost:3308');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         's]4Y=oL1E@[&YM Hxa)_&78s1Tu5FGU7;%,59yS*g]{qTI@fnh]41>OqQkj`7R8u');
define('SECURE_AUTH_KEY',  'FKn|`= BhOYj/=:c vRz~;~,f.qAy!Wn[gTI&O={cstrHxhcxjZf,/xl16_~&E+d');
define('LOGGED_IN_KEY',    '[jj-vQLFXU6S5(h@TAszsRN~CZC|_*t8aXo%P]-Z0:j)4]AA&FmzQ/&[5gv3;yM,');
define('NONCE_KEY',        'Z! Tun%k]LoAR4+lzQ+R<|&R@+A)31 n58!FF8->LF-ua*j#aqfIqXjJS;l+=Of^');
define('AUTH_SALT',        '[4]YkkIrX~+GKtvAg1%Ju[4ec1@aG?(7RNKlDoG(P&)/l*]QIB42bMmw *AUr7CD');
define('SECURE_AUTH_SALT', ')gc3daq4, ,oQaDp/9|kp]Q&T^.Qd1CO76P&Wq`=QlSR03v?]hYP#8$-#m:P`&j3');
define('LOGGED_IN_SALT',   '6){^{V<9~9VRxr>U>9NHr!){93j*Q0QH-<]lFY=~[1r)-S8Ls0P9Bps42SPYHfxu');
define('NONCE_SALT',       '#,98{s+~1ckgR# %^PcwB+K;^[,,lj{.Uk,R)?63@7h8 O}?DX&iOc//j_8SEC!m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '64M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
