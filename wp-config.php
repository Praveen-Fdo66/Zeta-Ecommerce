<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'zeta' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wTNQ(,iWlnz=Vyqb`Gvv=HUZ]LYr{;cJ@7LTi#1rUKFgo]c}my[)w01)l>o%v?= ' );
define( 'SECURE_AUTH_KEY',  'g_PtGrYPxpgz%-h:ZP^gnXR8c{;atEVlp;g+qEe_ve3nkF:ZbR)0~]&&x{d^GSO_' );
define( 'LOGGED_IN_KEY',    '%~iAceTZuTv*8&_ef3Vp1.gSOiJt(?Nc|gq~TK, w?6P[/k]Lsdkc.-U0K4+L<v/' );
define( 'NONCE_KEY',        'HXt.X41FnSc&yu*N|ykELTIM`~8$P<&B#M?#^&HxT,D(Z4Nc3wzu4kZY0y~q!YcQ' );
define( 'AUTH_SALT',        'IQ6%f a;Z3-4PDS6D~:@#rv_~ 36rf4)E63z:%1VGd:yn>}a_X_oAB^Nt$%OL2^k' );
define( 'SECURE_AUTH_SALT', 'd#^kZg*`->d7/LiT%PQ]*[2 %kuQo69;#e/}V!>cuvay+,Rihf6J.-]AWt~T2=m?' );
define( 'LOGGED_IN_SALT',   'aL,K:7?npo3x2QDvC}xzYV1(31cU_,:$d4<8Zhs;fr9TVn#`$3z?}w`_Oz*Y<*&P' );
define( 'NONCE_SALT',       'C/JX=dWM1Y4Z{.2no^@o1mN0aQa1b4B#wSN3%$fO]VgKo*::rCTXpOE1,h)6+LSw' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
