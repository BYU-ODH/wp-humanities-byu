<?php
/**
 * @package Cryout Framework
 * @version 0.8.2
 * @revision 20190425
 * @author Cryout Creations - www.cryoutcreations.eu
 */

define('_CRYOUT_FRAMEWORK_VERSION', '0.8.2');

// requirements
if (!defined('_CRYOUT_THEME_REQUIRED_PHP')) define('_CRYOUT_THEME_REQUIRED_PHP', '5.3');
if (!defined('_CRYOUT_THEME_REQUIRED_WP')) define('_CRYOUT_THEME_REQUIRED_WP', '4.1');

// Check if minimum supported PHP version is used
if ( FALSE !== phpversion() && version_compare( phpversion(), _CRYOUT_THEME_REQUIRED_PHP, '<' ) ) {
	require get_template_directory() . '/cryout/back-compat-php.php';
}

// Check if minimum supported WordPress version is used
elseif ( version_compare( $GLOBALS['wp_version'], _CRYOUT_THEME_REQUIRED_WP, '<' ) ) {
	require get_template_directory() . '/cryout/back-compat.php';
} 

// Load everything
require_once(get_template_directory() . "/cryout/prototypes.php");
require_once(get_template_directory() . "/cryout/controls.php");
require_once(get_template_directory() . "/cryout/customizer.php");
require_once(get_template_directory() . "/cryout/ajax.php");
require_once(get_template_directory() . "/cryout/demo.php");

if( is_admin() ) {
	// Admin functionality
	require_once(get_template_directory() . "/cryout/admin-functions.php");
	require_once(get_template_directory() . "/cryout/tgmpa-class.php");
}

// Set up the Theme Customizer settings and controls
// Needs to be included in both dashboard and frontend
add_action( 'customize_register', 'cryout_customizer_extras' );
add_action( 'customize_register', array( 'Cryout_Customizer', 'register' ) );

// FIN!
