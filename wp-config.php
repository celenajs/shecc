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
define( 'DB_NAME', 'sam_shecc' );

/** MySQL database username */
define( 'DB_USER', 'sam_dev' );

/** MySQL database password */
define( 'DB_PASSWORD', 'S/852*963.' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
//define( 'DB_HOST', '27.111.84.217' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

//SET DEFAULT SITE URL
if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
    define('WP_HOME','http://shecc.local'); 
	define('WP_SITEURL','http://shecc.local');
	define( 'WP_DEBUG', false );
	define( 'WP_DEBUG_LOG', false );
}else{
    define('WP_HOME','http://shecc.createmywordpress.com'); 
    define('WP_SITEURL','http://shecc.createmywordpress.com');
	define( 'WP_DEBUG', false );
	define( 'WP_DEBUG_LOG', false );
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'A.]VdH,O}6*LeT-e*ZFD:o@g`#OXwAgeEnnFic9TfaupABAafT@l4UdX]6~[kPN(');
define('SECURE_AUTH_KEY',  'Zcq0&`n_Qva5$cpV:e&kgbu9MO#-|p)4Edg~M[?Zp3PvcTqXPGtWTts: wz0W!&[');
define('LOGGED_IN_KEY',    '!lU.5?-n1a{W}#b_xBm&2*hLDV0M=&]9 G{sL*v;[.+@#@=AyWLw7a`G7X.^m=$%');
define('NONCE_KEY',        '(Tu~]U?.9(I96dgv?6DLygGDJ}iTXpbPAt_/^v:A>}H5|-+W,eKYfpbPW;?d!8Ql');
define('AUTH_SALT',        '9N4WZ|Vxi#A):G4^rt%EjrLMf|<SF:;7&IV_&&%&|6 T)>LiTcC1XTwh)kxGeR!e');
define('SECURE_AUTH_SALT', 'W=G)jqjQg8/^7+,^O$Yh(yjGR)GvR&K1^`~-1x}IYV+UgWfI:1S(.flR}df<+q#Y');
define('LOGGED_IN_SALT',   'qKsv`Y)6M!v||*y4)*yJ={~MP E+I2XC,|R-7-D|s+9_ rbw+sg8vT[R()ORJ=vK');
define('NONCE_SALT',       '(;w4tr+$J<Tchoy9C[v&.C5Riu4hZXi =FJM-o|K`88f7)Tw|;yI~jF=w{mno|N%');

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
