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
define('DB_NAME', 'unified');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '7{-R-A_|b~b5:qc;@MXGBeH0h>y6#Yhh/1J(g|K>|4v}6hWAea=UZbn{c*7>GqG~');
define('SECURE_AUTH_KEY',  '~]TPf]W^kre*6jW?$x]}#`YGcsYB|`=~Z<5oDY;gSqvfYm=/ezdRX%`nhW).bBgx');
define('LOGGED_IN_KEY',    'HTl./nOHFp+2oOl/GXg)yLD!iYJsyK7&2&S(!4XlI!MO!@IB>WXJz@D@H8{N2+Bi');
define('NONCE_KEY',        'IBM IsmQLags !n!xB0:&cLM77PPowMO]Co9Eoa%jr2f^*k,:>c9CoZ`K XOR1R?');
define('AUTH_SALT',        'n-NXzA9$w{j@<K8Bf1tX~=Uvn/g?YvvoK,]idCv3c=nOF74`B+_;3xGF]l*m(2uA');
define('SECURE_AUTH_SALT', '.GXa$v{zmtciiW?Ol&BXcro?jxmtYR-} gW&jqY880YKqz4&c4*w!d4.WJa?8.G7');
define('LOGGED_IN_SALT',   'dIh5ISj0bg-`TzscnT-uJ`eW&c@DDk =0UgZ98o&sdo%)zLOQZm)|-P6(K>B0zCW');
define('NONCE_SALT',       'Nedrib-?sTJ<:_LO]QKDRF-$i:)w5TTr~Ev!mmA^g[hY:NJf@xwJ{4=:E)`jh8 /');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'unified_';

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
