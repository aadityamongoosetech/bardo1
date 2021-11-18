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
define('DB_NAME', 'wp_rnouo');

/** MySQL database username */
define('DB_USER', 'wp_os7id');

/** MySQL database password */
define('DB_PASSWORD', '_Qa61r6zhU$#qJCC');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'E)kO8:@5s9/rO6e*]e~xkOF-h-~g7KC@XQNEksGkIHz/|FTe1jc#0a8|MU2/Y~ZS');
define('SECURE_AUTH_KEY', ']H65[9*bw0T6[5wVV&4x(:ZahAMqUX7j*Uz_4WS!87t0Q4N0j;FF[99H182%t_Q5');
define('LOGGED_IN_KEY', '0h|H+CO633@VjBRP]ohTF3Sz;Uou1(uJ2]Qd0h2v7GZX-2NGEeG-v6v9rv+m%6xF');
define('NONCE_KEY', ')q:J&9fw0o27o0|0:m3#me0X3252Kt@](r435|vsN]M1ra5_V6gbd7YI3Z~9+7Q]');
define('AUTH_SALT', '9m#&]Q/wxU_K80X7vg70MxBiiAUvq3/m_@KwXBPXH1#5(ole5PToe680@871@4eW');
define('SECURE_AUTH_SALT', 'K*TK|~09i)k#%0wFM[UJ[3;J~AJX#M[iTyC!VG54Q83/wpFA4978tOw+#(49-_]3');
define('LOGGED_IN_SALT', 'Q3j6_9Ex]Mo!W)Zc8h~~D0Jx2!+tYkwkw34LH095v!+)Z7vzE6p!e1A-N0jR[9vw');
define('NONCE_SALT', 'pi&13B|3-1XU%Wtr7%rG6*qH%(+67uK180G~+5*+_9]8*[+9S1:4mBc&q65(fp4i');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'I52eE_';

define('WP_DEBUG', false);


define('WP_ALLOW_MULTISITE', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
