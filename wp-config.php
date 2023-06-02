<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'project2' );

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
define( 'AUTH_KEY',         'LKd[NGkbO=4z9;GGxxw<]IJyV@F7TW_<N2w=P[8*Gsg4*n:A Y3KNwY/~)hIz&5B' );
define( 'SECURE_AUTH_KEY',  '/T4Znce-sP,;XCcvd:~#.$hy%Ma`ng(8CI%pb6~2?cQwcxTsLB *i1 W]+r%L+mH' );
define( 'LOGGED_IN_KEY',    'SbQ2Zi!i}cvfC}]5:Z4;2.jn6lbfw`+?c!t)&8A7tXE2~#!igzy$oBOT)-QJ.&R=' );
define( 'NONCE_KEY',        '~0&UI ^0p.,!L^5J><r*3`JE%4PEf3T-OzX>b(HnT1H+%tvKv0}f6Xg*d}(V(B5P' );
define( 'AUTH_SALT',        'S#j`RJzVIomwIT>03E0#TJlLs=|2xC.4g!,6}^Xvn^dt:pp7`SI=mro@TcgO3x1V' );
define( 'SECURE_AUTH_SALT', 'KZKp@&(pR^+{Rt|7Ru!kRA%<OtRRhwl<uuzrmJf8e3/WQo/WAH[?Ke_aL<CDUu6v' );
define( 'LOGGED_IN_SALT',   'o}fGvb|W BQ,*nto<Zey(!3W`RR#4Phj`EFalWl,o@Q!`~1-`OoL6Or;!auA`>Q[' );
define( 'NONCE_SALT',       ':P#?>g9-!W.9#;O54kUvYf|{FoN9{$HmU LV&BEH@=NB[<3*BkSywm|UZN/FiAkJ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
