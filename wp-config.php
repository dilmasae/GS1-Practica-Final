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
define('DB_NAME', 'gs1');

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
define('AUTH_KEY',         'jf>J=vI{X+%9`k(]U`JuA7#8UO[+oJ+CI$$FE>9v1wztA#1Cp]8;`_{<m.luv#ZQ');
define('SECURE_AUTH_KEY',  'i,kb`^w]*N~0M+nLjTWYC0zS$-Et:D((`)W58AGW[b+^%OP3<7/H#pp3`^F24gJ|');
define('LOGGED_IN_KEY',    '=i)Y*~Ox8{3Mz.%g,]o1xAx> ~2Nq7F]6wX1XQ#PSJ$l3Jqc;e&#!eZ=RTa{1Tzp');
define('NONCE_KEY',        '3:zwi_T0q!Jj{>gFg;Ss1-S1hC^;#alV(Dz HyWLz_w8%of7+qeE?=<!r>[NAskA');
define('AUTH_SALT',        '..(Z6TKs%Aoq47v;6Q/,|rM5T<N)o+6[~o`}>=26)Z92L`?5e[m9JVe)@DlB6*YL');
define('SECURE_AUTH_SALT', '[0#HHjP(Iw&B38x9zw2%1!ngB#9bDaV*N<wQ(6jOzRzS;A43SdW#3csJ-)[1V<wx');
define('LOGGED_IN_SALT',   '3ocfF&}E$-v@@cBY{Jok.@1i&oW!dxoq;zqB9#CGl(Qa^(|eaESRg,[U40m@-u`0');
define('NONCE_SALT',       'b)<5Q_S_cWfCGn!}a,6+].F?gC5lSb;1|[S(SCs=mY!NL#m/v[*WHGi<Ef_hp%dB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gs1_';

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
