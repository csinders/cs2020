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
define( 'DB_NAME', 'wp_cs' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '9P@Rblla-{V5tH9Xs=Mi{Q}W??[ys#?HpA=z*T0O1!M+Z@;sT|u8<&5p9R1F`tEt' );
define( 'SECURE_AUTH_KEY',  'G^}Jx/K9j~{Ix4swL:+;WFZWDh50`[5(:3ICt[YD+Bvj8w=5UYH?TzNP@<v5E[-6' );
define( 'LOGGED_IN_KEY',    '6>C!LguN&z(uf~!#3:|hX~ckYPpwv:IDO/o[pEqge$xT vY?7Dxir;4HR>,w,5)*' );
define( 'NONCE_KEY',        'AI$QZl3,nI&y&5tw:f`$qqK.iJUPW567Q`Q6w=M=$G_5 nP<u1L?2u,)+L=OraB!' );
define( 'AUTH_SALT',        'q1|plz^BTK};9Rr[P}h3oX5:Q%vDGq Nt6lY]!atCY4_-5]s1OvORP}Y[X,c:_SR' );
define( 'SECURE_AUTH_SALT', 'xH7*N/[uQ|I[8BG|sH6M!<@}^IEiad#cAQ@Wz+N{d=KW@B1;#}:BskL*8$3n@6Z}' );
define( 'LOGGED_IN_SALT',   'R]WLZTK2Imv68X=nM=3-t;=lDtl$.yz< 5^/6F5A;{?K!Z&1-zF1#ot<]!J@&#NS' );
define( 'NONCE_SALT',       'R>vAWG78-.]b=LiKm{S|Q pn_HH?cXTcK_,4H;zL%m;P3Rx|zBm^?^2I.!iG|pY0' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
