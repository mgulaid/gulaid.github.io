<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'alimars1_wo3594');

/** MySQL database username */
define('DB_USER', 'alimars1_wo3594');

/** MySQL database password */
define('DB_PASSWORD', 'MaqNzZuHgKFM');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY', 'V&J?HRWM*;saVo>VraEQ!i&(CE|yK*csxwa+IiEz]YxOBKPSwnEj%-rb[LBbd>pNWzwkkil)GbW;VbqcyP<DCbiapKqnhzLYtF)i__b<W)^k{P-IPRF/Krm+WOMTTQvn');
define('SECURE_AUTH_KEY', 'NjxzNH^K{I]dVP^=Z@UVswRPfixr?iR@oSW=k*;{)mcZ|!NPMoVDuid|hP@klkrXz]h]@friy>bc[[E^C]?!MCrn|&Pku+-=brnqTii}L[zMM_N|N>%IviKa)%@B@oT-');
define('LOGGED_IN_KEY', 'yDIz}LU!HZhqtzCqOp+_UJkT;ca]@TqF&Mi=Ipo(tOE>BWeP$ULxXW]gO!?>;;@(<+z-p<+}DN@Me@Wpk<)KnQ^FE@Pu-uDcuJg+z=CFEF^YP{Q^*noJQF<)%N!z]x|-');
define('NONCE_KEY', 'e/n|!B_NQvS=h}(W^Hk&glWt+}WCR=gOS&Z/@C*w@obL>|?h)$+bwzwEzJ;{SkNvwrQo$iK+UcXHn?!NfYTZh>Eqy(*?LKPylreHPpub@>=EE-i(jwa@jM@KJ-cwIiO{');
define('AUTH_SALT', 'LPX+%vkZrfugCvR(Tk&+PQ@yyFbfrn(SRVvXfXpX{gx*mB_KWRy-K+lK]T/o)fCRiE;%@S*&_SlzR%VKtlp%WaN=q/&x}d(S?hgy/s-nF(qhlLwf>^QcKD*V{Xwha}S{');
define('SECURE_AUTH_SALT', '{<QpBwSTkrZ[>jA{KGJjaEqr$zu]Um>*qX+Qfc]K{obS^f$FwYk//iFl(d^ELDQ=V$<DgKXeMKhtTSSPFd/S!X<D|t]@&h%fa/)SC(wxDqJ<<edQ)gH?H[](/yZ+;v]N');
define('LOGGED_IN_SALT', '^Vtfq[aGaxQIrKs[oC^lL]e]T>IBRtD}C_qcwikSdNZRI@ySTbL|$$-h;u|VS/nV^ALzc*%-z^soe=f@aYT)MBIhBmIU})wfB*!KqBFK([CUfn$vDc{W*N{D^y[mib)n');
define('NONCE_SALT', '[vsY(RcZJSyZIP]U*v$l%DRbB+^OU{w&SMeXKUA+@K^gc(yo_eyMknm-UMTOVw<UZxm>^J>SDycoT%/Y{vao=O/J<UuZCv/H=efjvKO_TE;YNsfL?ANX%EyMWPLmeC{/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_wwoa_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
