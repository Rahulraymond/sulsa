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
define( 'DB_NAME', 'sulsa' );

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
define( 'AUTH_KEY',         'ft~17y</}0|aC!mw*uc*LUcNEcA<oK16 g5`,Za2^H]1O?]F{K4Ulf3&rz?uI[% ' );
define( 'SECURE_AUTH_KEY',  'Uroqji{u`o;xn8Wr5Y,Lso/sj:ip!jqrX*5JNGc/l?4;V64DU!rb4d?!W/~s_,0b' );
define( 'LOGGED_IN_KEY',    '-4COX9J6Lp^>f98^75>dF$pWor^Hw<:s!nTDSzV}#zhp|<orXV-O-5&M1?@(j0G,' );
define( 'NONCE_KEY',        '~bBTp2;sVu6s6N>y5v5%-{O51SmcKWfv[mTy=7U,DP+@# ^<567&~OiN<<uA3T|D' );
define( 'AUTH_SALT',        'afV]:mPd5q~c[F.qi=m_CpCU:S>S57b#9~<ij{8gk+fO@$GF92ri/<ICR^vf[|9]' );
define( 'SECURE_AUTH_SALT', 'hCXw@:f:,7M IT<H&^j7$w|L|J0OKW$OfL)jVb1Mx%vo?CC HkyO?!D?3T_h-2bN' );
define( 'LOGGED_IN_SALT',   '_H~Y:Ey|rA:Aiy=$NP]jwMfz6~ DW.8DT/N{C`Ow)i~?O*i#^qtVeAD)!tea?5Xu' );
define( 'NONCE_SALT',       '>#nB!8&Y1(i^}UVj5eM JkSl]jzn%9)T=>f}0Yn/i&MP$n!8O!*RHHW@ tC`8cX[' );

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
