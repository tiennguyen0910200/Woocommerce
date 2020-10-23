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
define( 'DB_NAME', 'woocommerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'MvaX}z)oA+j,vn.0hIrEnEeQ-!|IgWBq|&wV;tJ/K#qZ)|*)~=g]ccn+pAh<#AK<' );
define( 'SECURE_AUTH_KEY',  '!*/0o9.7FnB}g%uxbEZAwWBK43+#:kx}I-v&##;wm2Nb,0yv?r@-^]Q7r(mcya+R' );
define( 'LOGGED_IN_KEY',    '4=EEjD?l5~.ly:,;vU;G9b_m#}a[A)6=vt^l&5$wkJ%CxWHnYa#WJ&ZP%=8$X*g ' );
define( 'NONCE_KEY',        '|[1F)Lqe7X= MNfY(b.R@`/qF]hJXIy=Hl-RpU7w@WTJ#-_8^OY:6lvtEG5{HQ1V' );
define( 'AUTH_SALT',        'vrRN+!w=jy(fd4|c]auXO4F7KTVoHh,V<}tM_E].R#^~|E7iL}%Qqm/BZ :Iv#s ' );
define( 'SECURE_AUTH_SALT', 'JvC-K*3 {{!LfpNNN?!s||el+k1i^IxhOK-,cP+G5r<uHYSf$vq(%39N@GD]#f)U' );
define( 'LOGGED_IN_SALT',   ']S@BVhbL%+I/?R#zr{*Y,;/m^Sx-ApI,6}Qma=Wbqn=_PEC$vc}tT}r,X<3i@-9F' );
define( 'NONCE_SALT',       'h?^.u/ _+!7@&-K<MK1cenA9KJSY6~dv~b@J5v[_pS36!;L_:h=z^nq};t=.wh$V' );

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
