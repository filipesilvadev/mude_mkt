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
define( 'DB_NAME', 'digi3949_mudemkt' );

/** MySQL database username */
define( 'DB_USER', 'digi3949_mudemkt' );

/** MySQL database password */
define( 'DB_PASSWORD', 'fellipow@007_eloa' );

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
define( 'AUTH_KEY',         '&)Q1v=_:(AThe6+;`%T5P$[sCF3HwRSS>b}0D?Wv{e}( G]@9A1N:G{jyf2c.3*:' );
define( 'SECURE_AUTH_KEY',  '#a ~tnq[)76$w[{GGpJTZfWp5Kyv$<(TB.=?I7N-)e RN4+|Tn$*|rtK%/LeV)sL' );
define( 'LOGGED_IN_KEY',    'kQ[p,Bfijn3Y~CJV2HzX{L8sb^K42:4Gl1FoN~eYmBIFui>jt+NcB<C^C^O#g+s1' );
define( 'NONCE_KEY',        'A0e[K8tdb;{;%gU+nNtoHJHAj.tXMxGupF2&-[/:uel^A-V(j0(rFRjAIn-EKc`}' );
define( 'AUTH_SALT',        'um{]6fzG$L)!K5-!!l)7GR2*656at2C!oYjzD*IIEnP+|sT*zU) PAZM5=)A^.O$' );
define( 'SECURE_AUTH_SALT', 'vP1]8H0+}[-(MX:Q~MsQpmtl$/AN]r4b=DR1Vb{WU:O93CVVs,A}Y?[.j*Pq&8lF' );
define( 'LOGGED_IN_SALT',   'bNX2d_GGrX@}x}!{o;W)!Hex17qGnajr)X6u)+`,k6]7((au a!~}a4A3x V7r`E' );
define( 'NONCE_SALT',       '{L}oA4[rftK[zjK%wyyba#h|<:|EF7?t47e&1V[q~/(=sxnp,#rpax>zv#xNP#}n' );

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
