<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Theme functions for X.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Set Paths
//   02. Require Files
// =============================================================================

// Set Paths
// =============================================================================

$func_path = 'framework/functions';
$glob_path = 'framework/functions/global';
$admn_path = 'framework/functions/global/admin';
$tmgp_path = 'framework/functions/global/admin/tmg';
$eque_path = 'framework/functions/global/enqueue';



// Require Files
// =============================================================================

//
// Helpers, conditionals, and stack data.
//

require_once( $glob_path . '/debug.php' );
require_once( $glob_path . '/helper.php' );
require_once( $glob_path . '/conditionals.php' );
require_once( $glob_path . '/stack-data.php' );


//
// Admin.
//

require_once( $admn_path . '/thumbnails/setup.php' );
require_once( $admn_path . '/setup.php' );
require_once( $admn_path . '/meta/setup.php' );
require_once( $admn_path . '/sidebars.php' );
require_once( $admn_path . '/widgets.php' );
require_once( $admn_path . '/custom-post-types.php' );
require_once( $admn_path . '/customizer/setup.php' );

if ( X_VISUAL_COMOPSER_IS_ACTIVE ) {
  require_once( $admn_path . '/visual-composer.php' );
}


//
// TMG plugin activation.
//

require_once( $tmgp_path . '/activation.php' );
require_once( $tmgp_path . '/registration.php' );
require_once( $tmgp_path . '/updates.php' );


//
// Enqueue styles and scripts.
//

require_once( $eque_path . '/styles.php' );
require_once( $eque_path . '/scripts.php' );


//
// Global functions.
//

require_once( $glob_path . '/featured.php' );
require_once( $glob_path . '/pagination.php' );
require_once( $glob_path . '/navbar.php' );
require_once( $glob_path . '/breadcrumbs.php' );
require_once( $glob_path . '/classes.php' );
require_once( $glob_path . '/portfolio.php' );
require_once( $glob_path . '/social.php' );
require_once( $glob_path . '/content.php' );
require_once( $glob_path . '/remove.php' );

if ( X_BBPRESS_IS_ACTIVE ) {
  require_once( $glob_path . '/bbpress.php' );
}

if ( X_BUDDYPRESS_IS_ACTIVE ) {
  require_once( $glob_path . '/buddypress.php' );
}

if ( X_WOOCOMMERCE_IS_ACTIVE ) {
  require_once( $glob_path . '/woocommerce.php' );
}


//
// Stack specific functions.
//

require_once( $func_path . '/integrity.php' );
require_once( $func_path . '/renew.php' );
require_once( $func_path . '/icon.php' );
require_once( $func_path . '/ethos.php' );