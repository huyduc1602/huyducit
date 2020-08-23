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
define( 'DB_NAME', 'huyduc' );

/** MySQL database username */
define( 'DB_USER', 'huyduc' );

/** MySQL database password */
define( 'DB_PASSWORD', '16022000' );

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
define( 'AUTH_KEY',         ':`Nx;4q+@/{B%?=g7fSiFWSkBKn|x6h/7SJ.{=h?FZ}cdoHuD`CAxnaCeI4qMs!0' );
define( 'SECURE_AUTH_KEY',  '{;34s8OH:rt-Z-nz~fKSlayIvA&8&0i5oHA>lHq@xMEuw&TjMQexlDs8OwFtS-{=' );
define( 'LOGGED_IN_KEY',    'zMrw:}-DBzJ_9Q+[2B:t3.?rUcEUBK;=WMmrk|ch8+a.UwZ=`yeNlH41JEvMa{n^' );
define( 'NONCE_KEY',        '25)pH/Y)R>+esd%m*sr!#52/8LAS$zJWNJoN{le#&lRYqQ012tUN/,l=xTU7w%J&' );
define( 'AUTH_SALT',        'A|SQFjIpqHV/3BCobLQ_UnI^}N0)}8N&IZTO|SnD]=R+S >9.[[f$Z_9<0<huVr*' );
define( 'SECURE_AUTH_SALT', 'E|K6Y1x&I*`0x%fU0=9BwX19^mQTkbF&IC5FYbNLe?8UjI(12;^0+PB?E9KNlS&W' );
define( 'LOGGED_IN_SALT',   'H6X>24~JU(nlGGiFR7jD$%IzDyv?0CnZ7V:>uj2.Kev2Yl}>Re(t)P-WiUF;]h{Z' );
define( 'NONCE_SALT',       ']$H;1PA[W)cQJoG@3rBhI#P]O!|deXB#@Egi-wjT.9}%;(TyWsFVoQ-xzP9VLt)h' );

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
