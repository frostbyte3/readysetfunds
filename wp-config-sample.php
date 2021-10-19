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

require_once(__DIR__ . '/vendor/autoload.php');
(new \Dotenv\Dotenv(__DIR__.'/'))->load();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv("DB_NAME"));

/** MySQL database username */
define( 'DB_USER', getenv("DB_USER"));

/** MySQL database password */
define( 'DB_PASSWORD', getenv("DB_PASSWORD"));

/** MySQL hostname */
define( 'DB_HOST', getenv("DB_HOST"));

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'e07a5839b29972722594bc3600e5f70cf89d3363');
define( 'SECURE_AUTH_KEY',  'a274565aad0768d44db0778f6cd0346e878c774e');
define( 'LOGGED_IN_KEY',    'a0dc685a5a6ab3eef11f25794bf6b7c62751162f');
define( 'NONCE_KEY',        '50d692792ddc8c7f32a28d72785a3b7e414d76c6');
define( 'AUTH_SALT',        'c5fa665f0cfa3433577d44e3767c3e31eec7d66c');
define( 'SECURE_AUTH_SALT', 'af85cd58494593606a33ec43d6a6da8514c6630e');
define( 'LOGGED_IN_SALT',   '6beb43ca5784fa7a72c58c3b3cba1f98ac6a08af');
define( 'NONCE_SALT',       '25ff1dd56c618a6aa976b9f7ff812b63484a9789');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
