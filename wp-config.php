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
define('DB_NAME', 'db_school');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '7dOL&XP1yA@1<.pby}UE zF1]vEjou%``N[1_@!8EHO}|QIyl3)?PkNmgEqT-ev+');
define('SECURE_AUTH_KEY',  'a,EDIza{wpB4[%78oC#ht#Lhrz78W,Q>9>Bxhr(U&#We5_Mxzta/eZi6!r%C~yV[');
define('LOGGED_IN_KEY',    'J:F3n}hHMS&hM4=o[NdJ=0V4PBjrIREu`@V| 9eaw&upuH/2[7?{4,B9y{LW7eKU');
define('NONCE_KEY',        'kDV%4+9XgcVd2m7 qOiCffpXO$@,/C:J@.?8^;b:9em9a1S3[]BoT~zB=13K[NbF');
define('AUTH_SALT',        '->AOgO=.1+<zS] RO5iwGi0y=m#;Iciq]~l:ibGtz5InKa@0N!azzCboAUK* Vst');
define('SECURE_AUTH_SALT', ']69-j8L>QE.#)ezP1r/&An_!VuR2^c.o_xqbp:[!M^~_~@V2!UCPd/`s3Ztu6*XB');
define('LOGGED_IN_SALT',   '{VRr1EP7G;|-I*0P>C@}AZ$@BP|Mkdeo`hd*n:t#w!x-0Aqwot,D*E}~.Jq+ku )');
define('NONCE_SALT',       'ngh 9*:_4f1aAuy6I1#-e<B7LW$Z+ 0Ksu!~}Z=tJ6[)AdU`72d1Hda:t]}72Rj8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_school';

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
