<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'domainc4_wor1');

/** MySQL database username */
define('DB_USER', 'domainc4_wor1');

/** MySQL database password */
define('DB_PASSWORD', 'vL9qB6ZV');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '#C-5Gs^YH<K+X#1>h>C Xl6/J0(;dyIFKwp-ZyfW6~CqU2;~bFKukJ>7a4YGK]uk');
define('SECURE_AUTH_KEY',  '*Cy|HQW;Pk-wh6-R#B8I5pTxz^pe n=O]vk_a,q7gEAtG+VlAm8sBhBSF$7&Z^+&');
define('LOGGED_IN_KEY',    'dU=|]EUU@w2CuS@s)4p}u:)gj5k9L,|;JgHteA>o^-1bF<@53eJQ m+F+r$s#>J!');
define('NONCE_KEY',        '4??%b.~anKAdC./6i33~S2RugNXC#|K!H<GSx]`:eJi sXvgJ?h@}N+sC&/|.0?L');
define('AUTH_SALT',        'a?H5*Z/0u|z&$C 7XaD`0WQ;->?m~-0!Zols8.wRc0Ktw`zQ+?Q^j-`_dgU:SO6]');
define('SECURE_AUTH_SALT', '3e s#ZV|h Q6DQx7bu/I/4(.CpgaFDq+!/]uPD_(9UFf:n0VC;p|mymijPj$k]f&');
define('LOGGED_IN_SALT',   '5Q[Qljy|%ES]2kL3=1{w+1h1^}_-bY)uKklRkmM6m:|}K~n|F5+C|Rhypn|A:gX&');
define('NONCE_SALT',       '1jx.I#V]9+^z9!}j|S0lgK~<39 rX?Vr]=qr30ecJ?{u>+BQkFo3|8V~UuqhB,;8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ggi_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
