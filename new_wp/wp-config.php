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
define( 'DB_NAME', 'extreme1_wwpp' );

/** MySQL database username */
define( 'DB_USER', 'extreme1_add' );

/** MySQL database password */
define( 'DB_PASSWORD', 'sadam666' );

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
define( 'AUTH_KEY',         '$$pIi>|$mC9FAIDC?tonbqPJ;p+gcyzi3V_#3_s9?r`/9`uG2IMvYz(gffyIh<Fp' );
define( 'SECURE_AUTH_KEY',  'QP`F^_>&i7k`T]w$%,>/%b;?XpI3SluA;hW!I{aM3`~&[l:9|GQju9Bc)SI`syEi' );
define( 'LOGGED_IN_KEY',    '@Rp1/?M>JT1r:|pk7YfiemE)D8:i.RFf9M+:M*;C~/b=r2# ZDdDG0|L}V~o5SGL' );
define( 'NONCE_KEY',        ';NT0U[~o5Q{UTriylHsEdZ/#e|3CjDRkurmn{-ZRF2>kyPC-ND$[xgYdYz3)~_Ln' );
define( 'AUTH_SALT',        'j?zUaa2YHe_=i^lLXCPAj]C^F^9ELpV_xz Y__On*GM8mC`Jl7o3(@5l_3)G%~S#' );
define( 'SECURE_AUTH_SALT', 'xtU;L.=r>0nWU^+Mspgp#>qAV4&QSFv%JiJq6uI(%M9Y!4l_W5VWhKWqtD,U;!y%' );
define( 'LOGGED_IN_SALT',   'XJjd39NGs:9n^`l(YT]L<p(,Km#^gQFgnU)m%dEpXx^,;tbT|!QU-@1Q*qttt:r~' );
define( 'NONCE_SALT',       'cvfay(G|MjH!{JJ,&J[9:<om3`5FC;p~vg/wF{xdF5:j[/p|LVp}Cr4@J* !)#/#' );

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

// Query Monitor plugin
define( 'QM_DARK_MODE', true );





/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );


// If you trust that your authors won’t get themselves into trouble,
// you can disable the blocking of script tags from within JavaScript.
// In wp-config.php within your root web directory, you’ll need to
// enable custom tags by adding the following line of code:
// define( 'CUSTOM_TAGS', true );
