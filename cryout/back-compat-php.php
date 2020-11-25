<?php
/**
 * Prevents the theme from running on unsupported PHP versions, as 
 * it relies on functions and functionality introduced in newer versions.
 *
 * @package Cryout Framework
 */

/**
 * The actual version requirement nag
 * 
 * @since Cryout Framework 0.7.8
 */
function cryout_compat_php_notice_text() {
	return sprintf( __( '<strong>%1$s requires at least PHP version %2$s. Your site is running version %3$s.</strong><br>The theme will not be able to function correctly on the curent setup. Please upgrade or change the hosting provider.', 'cryout' ), ucwords(preg_replace('/[^a-z0-9]/i',' ',_CRYOUT_THEME_NAME)), _CRYOUT_THEME_REQUIRED_PHP, phpversion() );
}

/**
 * Prints an error nag after an unsuccessful attempt to switch to
 * the theme on unsupported PHP versions.
 *
 * @since Cryout Framework 0.7.8
 */
function cryout_compat_php_upgrade_notice() {
	printf( '<div class="notice notice-error"><br><p>%s</p><br></div>', cryout_compat_php_notice_text() );
}
add_action( 'admin_notices', 'cryout_compat_php_upgrade_notice' );

/**
 * Prevent the Customizer from being loaded on unsupported PHP versions.
 *
* @since Cryout Framework 0.7.8
 */
function cryout_compat_php_customize_notice() {
	wp_die( cryout_compat_php_notice_text(), '', array( 'back_link' => true, ) );
}
add_action( 'load-customize.php', 'cryout_compat_php_customize_notice' );

/**
 * Prevent the Theme Preview from being loaded on unsupported PHP versions.
 *
* @since Cryout Framework 0.7.8
 */
function cryout_compat_php_preview_notice() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( cryout_compat_php_notice_text() );
	}
}
add_action( 'template_redirect', 'cryout_compat_php_preview_notice' );

// FIN