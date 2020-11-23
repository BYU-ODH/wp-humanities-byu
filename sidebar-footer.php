<?php
/**
 * The Footer widget areas.
 *
 * @package Septera
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if ( ! is_active_sidebar( 'footer-widget-area' ) ) {
		return;
	}
	
	// If we get this far, we have widgets. Let do this.
	if ( is_active_sidebar( 'footer-widget-area' ) ) {
		dynamic_sidebar( 'footer-widget-area' );
	}
