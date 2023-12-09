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
define( 'AUTH_KEY',         'I<YokIG@iMO3=2[zUd;.@W.!1:5h+wNu:yD,t|VqRbSpxPQvu,-<$B-BGMAvg8Ww' );
define( 'SECURE_AUTH_KEY',  '&j%}rD NAT`a1zl[#yNa[`w*?{`Fkj>v<[,5<5+#.~mv,^64kt3cQQ!8?o6~.tbl' );
define( 'LOGGED_IN_KEY',    ';Au=V$%qGYBW].E)mCb/<|:cCnvuYC/Ouw/B{APbKIoV&0cq/W45x)B3%2l=y2Kq' );
define( 'NONCE_KEY',        'j7S7.}h?S?HhnAd#y7sx&NvrL~ZCvxCb7<>Zr[&|LL~y1}2F>#Tf_72`$ j@Kf21' );
define( 'AUTH_SALT',        'cFbJ:~E#tNH`V788I4S9/T67BvQ3=X%]%FOA@!MxL.hxh MSK%<*`^^FKI:h+:?_' );
define( 'SECURE_AUTH_SALT', '|S4jCO><OIWeKJ[A!J{7JU&E+lM=[:*L=d88,E,;DnB5FYte9R:u$i ]sTSAE?d2' );
define( 'LOGGED_IN_SALT',   'if8&vBiVQm/}so*Sb4&$zmCgl.vnu:FbSd93u-F%Km$)UrZBXt)XBd[dF9Q$ma}u' );
define( 'NONCE_SALT',       'Vyb^Zb0+}uT@uo`DF7#R,FYkpEh]SSU1q}_Ef5j^5_(>hy|qAa9!V`2@eDKSi9Nv' );

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
