<?php
/**
 * Functions file - Calls all other required files
 *
 * PLEASE DO NOT EDIT THEME FILES DIRECTLY
 * unless you are prepared to lose all changes on the next update
 *
 * @package Septera
 */

// theme identification and options management - do NOT edit unless you know what you are doing
define ( "_CRYOUT_THEME_NAME", "septera" );
define ( "_CRYOUT_THEME_VERSION", "1.5.0" );

// prefixes for theme options and functions
define ( '_CRYOUT_THEME_SLUG', 'septera' );
define ( '_CRYOUT_THEME_PREFIX', 'septera' );

require_once( get_template_directory() . "/cryout/framework.php" );		// Framework
require_once( get_template_directory() . "/admin/defaults.php" );		// Options Defaults
require_once( get_template_directory() . "/admin/main.php" );			// Admin side

// Frontend side
require_once( get_template_directory() . "/includes/setup.php" );       	// Setup and init theme
require_once( get_template_directory() . "/includes/styles.php" );      	// Register and enqeue css styles and scripts
require_once( get_template_directory() . "/includes/loop.php" );        	// Loop functions
require_once( get_template_directory() . "/includes/comments.php" );    	// Comment functions
require_once( get_template_directory() . "/includes/core.php" );        	// Core functions
require_once( get_template_directory() . "/includes/hooks.php" );       	// Hooks
require_once( get_template_directory() . "/includes/meta.php" );        	// Custom Post Metas
require_once( get_template_directory() . "/includes/landing-page.php" );	// Landing Page outputs

//Script for Directory Plugin
function byuh_scripts_styles() {
    global $wp_styles; 

    //style for directory
    wp_enqueue_style('byuh-byulightbox', get_template_directory_uri() . '/css/byu-lightbox.css');
    //scripts for directory
    wp_enqueue_script('byuh-byulightbox', get_template_directory_uri() . '/resources/js/byu-lightbox.js', array('jquery'));
    wp_enqueue_script('byuh-script', get_template_directory_uri() . '/js/script.js', array('jquery'));
    wp_enqueue_script('jquery');

}
add_action('wp_enqueue_scripts', 'byuh_scripts_styles');

function register_my_menu() {
    register_nav_menu( 'additional-menu',__('Additional Menu' ));
}
add_action( 'init', 'register_my_menu' );

//Shortcodes
include_once('shortcodes/register.php');

///////////////////////////////////////
// Custom JSON API Plugin fields
///////////////////////////////////////
function return_acf_fields ($postray, $postdat, $context) {
    $acf_fields = array();

    $acf_fields['flexible_content'] = get_field('flexible_content', $postdat['ID']);

    //Staff specific fields
    //Update if:
    //ACF field names are changed
    //New ACF fields are added
    if ($postdat['post_type'] === 'person') {
        $acf_fields['department'] = get_field('department', $postdat['ID']);
        $acf_fields['position'] = get_field('position', $postdat['ID']);
        $acf_fields['address'] = get_field('address', $postdat['ID']);
        $acf_fields['phone'] = get_field('phone', $postdat['ID']);
        $acf_fields['email'] = get_field('email', $postdat['ID']);
        $acf_fields['schedule'] = get_field('schedule', $postdat['ID']);
    }

    //TODO: figure out a way to return all ACF fields dynamically despite post type

    return array_merge($postray, $acf_fields);
}
add_filter('json_prepare_post', 'return_acf_fields', 10, 3);

///////////////////////////////////////
// Add Class to Top Level Nav Items //
/////////////////////////////////////
function add_menu_parent_class( $items ) {
    foreach ( $items as $item ) {
        $parent = intval($item->menu_item_parent);
        if ( $parent == 0 && in_array('menu-item-has-children', $item->classes) ) {
            $item->classes[] = 'top-level-nav-item';
        }
    }

    return $items;
}
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );

/*********************/
/* Custom Taxonomies */
/*********************/
add_action('init', 'create_persondepartments_tax');
register_activation_hook( __FILE__, 'activate_persondepartments_tax' );

function activate_persondepartments_tax() {
    create_persondepartments_tax();
    flush_rewrite_rules();
}

function create_persondepartments_tax() {
    register_taxonomy(
        'persondepartments',
        'person',
        array(
            'labels' => array(
                'name'  => _x( 'Departments', 'taxonomy general name' ),
                'singular_name'		=> _x( 'Department', 'taxonomy singular name' ),
                'search_items'		=> __( 'Search Departments' ),
                'all_items'		=> __( 'All Departments' ),
                'parent_item'		=> __( 'Parent Department' ),
                'parent_item_colon'	=> __( 'Parent Department:' ),
                'edit_item'		=> __( 'Edit Department' ),
                'update_item'		=> __( 'Update Department' ),
                'add_new_item'		=> __( 'Add New Department' ),
                'new_item_name'		=> __( 'New Department Name' ),
                'menu_name'		=> __( 'Departments' ),
                'separate_items_with_commas' => __( 'Separate departments with commas' ),
                'add_or_remove_items' => __( 'Add or remove departments' ),
                'choose_from_most_used' => __( 'Choose from the most used departments' ),
            ),
            'capabilities' => array(
                'manage_terms' => 'manage_pdepts',
                'edit_terms' => 'edit_pdepts',
                'assign_terms' => 'assign_pdepts'
                /* 'edit_terms' => 'edit_pdepts' */
            ),
            'hierarchical' => true,
            'show_admin_column' => true,
            'rewrite' => true,
            'query_var' => true,
	    'show_in_rest' => true
        )
    );
}

function get_edit_person_by_netid ($nid) {
	// get the "Person" page where netid = $netid
	$args = array(
		'posts_per_page'	=> 1,
        'post_type'	=> 'person',
        'meta_key'	=> 'netid',
        'meta_value'	=> $nid
	);
	$people = get_posts( $args );
	foreach ($people as $person) {
		$personid = $person->ID;
		return get_edit_post_link($personid, '&');
	}
	return null;
}

function get_person_by_netid ($nid) {
	// get the "Person" page where netid = $netid
	$args = array(
		'posts_per_page'	=> 1,
        'post_type'	=> 'person',
        'meta_key'	=> 'netid',
        'meta_value'	=> $nid
	);
	$people = get_posts( $args );
	foreach ($people as $person) {
		$personid = $person->ID;
		//print_r($person);
		$netid = get_field('netid', $personid);
		//echo "<p>found: <a href='" . get_permalink($personid) . "'>" . $netid . "</a></p>";
		//echo "<p>found: <a href='" . get_edit_post_link($personid) . "'>" . $netid . "</a></p>";
	}
}

// FIN
