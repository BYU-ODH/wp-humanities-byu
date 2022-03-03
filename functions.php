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
require_once( get_template_directory() . "/includes/acf.php" );			// ACF (persons, etc)

// Frontend side
require_once( get_template_directory() . "/includes/setup.php" );       	// Setup and init theme
require_once( get_template_directory() . "/includes/styles.php" );      	// Register and enqeue css styles and scripts
require_once( get_template_directory() . "/includes/loop.php" );        	// Loop functions
require_once( get_template_directory() . "/includes/comments.php" );    	// Comment functions
require_once( get_template_directory() . "/includes/core.php" );        	// Core functions
require_once( get_template_directory() . "/includes/hooks.php" );       	// Hooks
require_once( get_template_directory() . "/includes/meta.php" );        	// Custom Post Metas
require_once( get_template_directory() . "/includes/byuh_news.php" );	// Landing Page News
require_once( get_template_directory() . "/includes/landing-page.php" );	// Landing Page outputs


///////////////////////////////////////
// SCRIPTS & STYLES for directory
///////////////////////////////////////
function byuh_scripts_styles() {
    global $wp_styles;

    // Fonts
    wp_enqueue_style('byuh-fonts', get_template_directory_uri() . '/resources/css/fonts/fonts.css');
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style('byuRingSide', 'https://cdn.byu.edu/theme-fonts/1.x.x/ringside/fonts.css');
    wp_enqueue_style('byuPublicSans', 'https://cdn.byu.edu/theme-fonts/1.x.x/public-sans/fonts.css');

    //style for directory
    wp_enqueue_style('byuh-directory', get_template_directory_uri() . '/resources/css/directory.css');
    //scripts for directory
    wp_enqueue_script('byuh-script', get_template_directory_uri() . '/resources/js/script.js', array('jquery'));
    wp_enqueue_script('byuh-filters', get_template_directory_uri() . '/resources/js/filters.js', array('jquery'));
    //wp_enqueue_script('byuh-directory', get_template_directory_uri() . '/resources/js/directory.js', array('jquery'));
  
  //jQuery
    wp_enqueue_script('jquery');

}
add_action('wp_enqueue_scripts', 'byuh_scripts_styles');

function humanities_menu() {
    register_nav_menu( 'humanities-menu',__('Humanities Menu' ));
}
add_action( 'init', 'humanities_menu' );

function mobile_menu() {
    register_nav_menu( 'mobile-menu',__('Mobile Menu' ));
}
add_action( 'init', 'mobile_menu');

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


function byuh_setup() {

    // Department
    /* $department_labels = array(
     *     'name' 								=> __('Department', 'byuh'),
     *     'singular_name' 			=> __('Department', 'byuh'),
     *     'add_new' 						=> __('Add New', 'byuh'),
     *     'add_new_item' 				=> __('Add New', 'byuh'),
     *     'edit_item' 					=> __('Edit', 'byuh'),
     *     'new_item' 						=> __('New', 'byuh'),
     *     'all_items' 					=> __('All', 'byuh'),
     *     'view_item' 					=> __('View', 'byuh'),
     *     'search_items' 				=> __('Search', 'byuh'),
     *     'not_found' 					=> __('Nothing found', 'byuh'),
     *     'not_found_in_trash' 	=> __('Nothing found in Trash', 'byuh'), 
     *     'parent_item_colon' 	=> '',
     *     'menu_name' 					=> __('Departments', 'byuh'),
     * );

     * $department_args = array(
     *     'labels' 							=> $department_labels,
     *     'public' 							=> true,
     *     'publicly_queryable' 	=> true,
     *     'show_ui' 						=> true, 
     *     'show_in_menu' 				=> true, 
     *     'query_var' 					=> true,
     *     'rewrite' 						=> array( 'slug' => __('department', 'byuh') ),
     *     'capability_type' 		=> 'page',
     *     'has_archive' 				=> false, 
     *     'hierarchical' 				=> true,
     *     'menu_position' 			=> 20,
     *     'supports' 						=> array('title', 'thumbnail', 'excerpt'),
     *     'menu_icon'           => 'dashicons-feedback'
     * ); 
     * register_post_type('department', $department_args);
     */

    // Person
    $person_labels = array(
        'name'                => __('Person', 'byuh'),
        'singular_name'       => __('Person', 'byuh'),
        'add_new'             => __('Add New', 'byuh'),
        'add_new_item'        => __('Add New', 'byuh'),
        'edit_item'           => __('Edit', 'byuh'),
        'new_item'            => __('New', 'byuh'),
        'all_items'           => __('All', 'byuh'),
        'view_item'           => __('View', 'byuh'),
        'search_items'        => __('Search', 'byuh'),
        'not_found'           => __('Nothing found', 'byuh'),
        'not_found_in_trash'  => __('Nothing found in Trash', 'byuh'), 
        'parent_item_colon'   => '',
        'menu_name'           => __('People', 'byuh')
    );

    $person_args = array(
        'labels'              => $person_labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true, 
        'show_in_menu'        => true, 
        'query_var'           => true,
        'rewrite'             => array( 'slug' => __('person', 'byuh') ),
        //			       'capability_type'     => 'page',
        // Customized by TSA 2015.09.22
        'capability_type'     => 'page',
        'has_archive'         => false, 
        'hierarchical'        => false,
        'menu_position'       => 20,
        'supports'            => array('title', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-businessman',

        // For the REST API v2
        'show_in_rest'       => true,
  	'rest_base'          => 'people',
  	'rest_controller_class' => 'WP_REST_Posts_Controller'

    ); 
    register_post_type('person', $person_args);

    //Custom Blog Post Type, separate from posts

    $blog_labels = array(
        'name'                => __('Blog', 'byuh'),
        'singular_name'       => __('Blog', 'byuh'),
        'add_new'             => __('Add New', 'byuh'),
        'add_new_item'        => __('Add New', 'byuh'),
        'edit_item'           => __('Edit', 'byuh'),
        'new_item'            => __('New', 'byuh'),
        'all_items'           => __('All', 'byuh'),
        'view_item'           => __('View', 'byuh'),
        'search_items'        => __('Search', 'byuh'),
        'not_found'           => __('Nothing found', 'byuh'),
        'not_found_in_trash'  => __('Nothing found in Trash', 'byuh'), 
        'parent_item_colon'   => '',
        'menu_name'           => __('Blogs', 'byuh')
    );

    $blog_args = array(
        'labels'              => $blog_labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true, 
        'show_in_menu'        => true, 
        'query_var'           => true,
        'rewrite'             => array( 'slug' => __('blog', 'byuh') ),
        //			       'capability_type'     => 'page',
        // Customized by TSA 2015.09.22
        'capability_type'     => 'page',
        'has_archive'         => false, 
        'hierarchical'        => false,
        'menu_position'       => 20,
        'supports'            => array('title', 'thumbnail', 'excerpt'),
        'menu_icon'           => 'dashicons-feedback',

        // For the REST API v2
        'show_in_rest'       => true,
  	'rest_base'          => 'blogs',
  	'rest_controller_class' => 'WP_REST_Posts_Controller'
    ); 
    register_post_type('blog', $blog_args);

}
add_action('init', 'byuh_setup');




/*********************/
/* Custom Taxonomies */
/*********************/

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
	$netid = get_field('netid', $personid);
    }
}
//Edit blog by id

$post_id = get_the_ID();

function get_edit_blog_by_postid ($post_id) {
    // get the "Blog" page
    
    $args = array(
	'posts_per_page'	=> 1,
        'post_type'	=> 'blog',
        'meta_key'	=> 'postid',
        'meta_value'	=> $post_id
    );
    $blogs = get_posts( $args );
    foreach ($blogs as $blog) {
	$blogid = $blog->ID;
	return get_edit_post_link($blogid, '&');
    }
    return null;
}


add_filter( 'get_custom_logo', 'byu_logo' );
// Filter the output of logo to fix Googles Error about itemprop logo
function byu_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="https://byu.edu" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
		     esc_url( home_url( '/' ) ),
		     wp_get_attachment_image( $custom_logo_id, 'full', false, array(
			 'class'    => 'custom-logo',
		     ) )
    );
    return $html;   
}

//code to set the default number of posts per page

add_action( 'pre_get_posts',  'set_posts_per_page'  );
function set_posts_per_page( $query ) {

    global $wp_the_query;

    if ( ( ! is_admin() ) && ( $query === $wp_the_query ) 
      && ( $query->is_search() || $query->is_archive()) ) {
	$query->set( 'posts_per_page', 40 );
    }

    return $query;
}

function format_phone_num ($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phone) == 10) 
    {
	$phone = '('.substr($phone, 0, 3).')'.substr($phone, 3, 3).'-'.substr($phone,6);
    }
    else if (strlen($phone) == 7)
    {
	$phone = '(801)'.substr($phone, 0, 3).'-'.substr($phone,3); 
    }
    else{
        $phone = "Invalid Number";
    }
    return $phone;
}

function format_phone_block ($phone) {
    $phone = format_phone_num($phone);

    $block = '';
    
    $block.="<div class=\"link phone\"><a href='tel:+1".$phone."'><span>".$phone."</span></a></div>";
    
    return $block;
}

function posts_orderby_lastname ($orderby_statement) 
{
    $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
}
add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
$loop = new WP_Query(
    array (
        'post_type' => 'person'
    )
);



// FIN
