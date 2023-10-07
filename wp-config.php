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
define( 'DB_NAME', 'Univers-Viager' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'JU4oaDRLin4LhUbtxkAviWH98fT7k2HEdEHoqmpz6VSAtYOP5ULjEf0zGOuMUXj8' );
define( 'SECURE_AUTH_KEY',  'ilLskr6BihjZOgacHKYHfhgNqFcmhORCHC9qpCQFHX3LqWIjdgxtRKbEq2imwupE' );
define( 'LOGGED_IN_KEY',    'wV8zK5UB3C6c1rlHV78m4V8wImJjb6Z9Qc1LNraGcZkWSMOLYW6GM2iQR64KjFhM' );
define( 'NONCE_KEY',        'lJ3MZiLS7qLFaLu6i05cXdj7Qh8IcJreCtep33Y0FnQHUFwFyAcIPAsr8vMSar8K' );
define( 'AUTH_SALT',        '0HCUPSNV8z3xzRpReNtGHDVQN4IyLadAZgfxTHBt9oQSwOmrbnFhZNVF8vScluz7' );
define( 'SECURE_AUTH_SALT', 'e9gGggoSBCQLUWpfc7RuMUPhf4kBoq1u5q7iiPXUCDxcSP5ifOY8lfA6koyDG4v6' );
define( 'LOGGED_IN_SALT',   '0qd7HrNMPoH2oUgvVntr7OMrSn4KLGsK5aWuJflI76CF01pyD12z9UOKi988BZvW' );
define( 'NONCE_SALT',       'HjZV8x3S8ipbhgMfFN0NncwIProucZgwlBQ15sBXCH8zLvgdLb4xaOOucv6pfofm' );

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
