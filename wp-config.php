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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Hls)G@7|WN/&^}|G!Ra3+5_.F&,R1-$k{e~9*?,L^as7g[q~PY@Sxrd>DM+004r.' );
define( 'SECURE_AUTH_KEY',  'r;LoVtbl6^V9sU[*$MdIzv^6VxU)1z&t`f:QM&d+2)9vxtiAhSXL_!UM0Q?)R]s+' );
define( 'LOGGED_IN_KEY',    'W?^PR` AhgjEBWz2RB$Xj63Z@>pf5*!lKAZ6oD1Oi[l>%9@!?7uZDg@D]b/d=ti[' );
define( 'NONCE_KEY',        '~[j1QpX.*#^wdQ:1uS{bi~cu))5_e}K!87f}Y~UGo9W8Cr89w2miyME>REL#Q2LY' );
define( 'AUTH_SALT',        ',87zaja_]R*U@k y=)`X$/P7A8|YJ+o7iU`EStFT~rU&[CN/vp|c/kh:j+2WKIBN' );
define( 'SECURE_AUTH_SALT', '#kTouX~-ckPIQB.Xbi(hKOn?UCXMyS5TX(V^5:|$a^p&ZZgT9+*.Id&~7x]CK1p2' );
define( 'LOGGED_IN_SALT',   'I5c[CYA:Xa6.GSk4:wkow=4lD8$@UovbA_+&sHWb[wHIhcOgC_b[ZbD)7.hfSz}u' );
define( 'NONCE_SALT',       'j`R1D*Y1ZD]_d,}CkfWr4}c`*(RZWnYI9yh+F;FW]w^<i]{[`oiR9+WXii`j`R.k' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
