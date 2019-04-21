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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'obermeier');

/** MySQL database username */
define('DB_USER', 'obermeier');

/** MySQL database password */
define('DB_PASSWORD', 'H!pern()va5113');

/** MySQL hostname */
define('DB_HOST', 'db55.netzone.ch');

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
define('AUTH_KEY',         'a3pgSNG37L8We92xjiXpHGOQNkT9wv2urror0YggUcly5DsRbU2wP4wpVEIaywkV');
define('SECURE_AUTH_KEY',  'eSMwi4JcpayEh6VWrpFQ7kSOyJl9C0pKa5LD15yrO9MI30OtW5UNwPlbKIa8dm4t');
define('LOGGED_IN_KEY',    '4OEJSdGQoAoEG2mXJHp3oLS6b6btsWqrpDQKyUWBS9RNyvX9tjcEHZFi58ppGv26');
define('NONCE_KEY',        '0eyne6yzXzNBGGuJyPZZ8rE0VIg0ssYkN2HWcPw5n284UwJvrSdd2hUgtMItDw6L');
define('AUTH_SALT',        'sTY2THbwvyKYDBFNuGlYwbI5ecDvrEe1vtPV51x7ERmboUklAOZWhmIcSQSLeEyU');
define('SECURE_AUTH_SALT', 'PMpyNBAJJFBPshhrFI01nac2gqw4OyXPe82JMJKo9lubmKgU0CZ3y2sU2IogQzpO');
define('LOGGED_IN_SALT',   'jOW2JbFoNkzSc9Q0jwto2XxPavmyuXb6snj9jA6Nf8srKIUiD27BvyJk9EcOvRVx');
define('NONCE_SALT',       'tsHu8VWlYHnAwxROmigP2ZqlpbzHSl1yjgfdfMjJ3bYdduHpnDhCzaRS0hGGusk3');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ia7e_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
