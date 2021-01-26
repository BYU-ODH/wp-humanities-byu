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

///////////////////////////////////////
// SCRIPTS & STYLES for directory
///////////////////////////////////////
function byuh_scripts_styles() {
    global $wp_styles;

    // Fonts
    wp_enqueue_style('byuh-fonts', get_template_directory_uri() . '/resources/css/fonts/fonts.css');
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );


    //style for directory
    wp_enqueue_style('byuh-byulightbox', get_template_directory_uri() . '/resources/css/byu-lightbox.css');
    wp_enqueue_style('byuh-directory', get_template_directory_uri() . '/resources/css/directory.css');
    //scripts for directory
    wp_enqueue_script('byuh-byulightbox', get_template_directory_uri() . '/resources/js/byu-lightbox.js', array('jquery'));
    wp_enqueue_script('byuh-script', get_template_directory_uri() . '/resources/js/script.js', array('jquery'));
    wp_enqueue_script('byuh-filters', get_template_directory_uri() . '/resources/js/filters.js', array('jquery'));
    //jQuery
    wp_enqueue_script('jquery');

}
add_action('wp_enqueue_scripts', 'byuh_scripts_styles');

function humanities_menu() {
    register_nav_menu( 'humanities-menu',__('Humanities Menu' ));
}
add_action( 'init', 'humanities_menu' );

function byuh_populate_depts_taxonomy ( $tax ) {
    $terms = array(
        'Asian and Near Eastern Languages' => array("Arabic", "Chinese", "Hebrew", "Japanese", "Korean"),
        'Comparative Arts and Letters' => array("Art History", "Comparative Studies", "Interdisciplinary Humanities", "Classics", "Comparative Literature", "Scandinavian Studies"),
        'English' => array(),
        'French and Italian' => array("French", "Italian"),
        'German and Russian' => array("German", "Russian"),
        'Linguistics and English Language' => array("Editing", "Linguistics", "English Language", "TESOL"),
        'Philosophy' => array(),
        'Spanish and Portuguese' => array("Spanish", "Portuguese"),
        'American Studies' => array(),
        'Center for Language Studies' => array(),
        'Humanities Advisement and Careers' => array(),
        'Humanities Center' => array(),
        'Office of Digital Humanities' => array(),
        'Women\'s Studies' => array(),
        'Writing Center' => array(),
        'Center for Language Studies' => array(),		 
        'Humanities Administration' => array()		 
    );
    //echo "<script>console.log('in byuh_populate_depts_taxonomy, getting terms from $tax');</script>";

    foreach ( $terms as $parent => $children ) {
        //echo "<script>console.log('\tAdding term: $parent');</script>";
        $inserted_parent = wp_insert_term(
            $parent,
            $tax
        );
        foreach ($children as $child) {
            //echo "<script>console.log('\t\tAdding term: $child (p: ${inserted_parent['term_id']})');</script>";
            wp_insert_term(
                $child,
                $tax,
                array(
                    'parent' => $inserted_parent['term_id']
                )
            );
        }
    }
}

function byuh_populate_research_taxonomy ( $tax ) {
    $terms = array(
	'Adaptation' => array(),
	'Aesthetics' => array(),
	'Africa' => array(),
	'African American' => array(),
	'American studies' => array(),
	'Antiquity' => array(),
	'Applied linguistics' => array(),
	'Art History' => array(),
	'Asia' => array(),
	'Baroque' => array(),
	'Bilingualism' => array(),
	'Britain' => array(),
	'Classical' => array(),
	'Comedy' => array(),
	'Composition' => array(),
	'Computational linguistics' => array(),
	'Computer assisted learning' => array(),
	'Contemporary' => array(),
	'Corpus linguistics' => array(),
	'Creative writing' => array(),
	'Critical theory' => array(),
	'Cultural studies' => array(),
	'Deconstruction' => array(),
	'Digital humanities' => array(),
	'Editing & publishing' => array(),
	'Eighteenth century' => array(),
	'English teaching' => array(),
	'Environment' => array(),
	'Epistemology' => array(),
	'Ethics' => array(),
	'Europe' => array(),
	'Fantastic literature' => array(),
	'Feminism' => array(),
	'Film' => array(),
	'Gender studies' => array(),
	'Gothic' => array(),
	'Historical linguistics' => array(),
	'Indigenous languages' => array(),
	'Intercultural competence' => array(),
	'L2 education' => array(),
	'L2 testing' => array(),
	'Latin America' => array(),
	'Latinx' => array(),
	'Linguistics' => array(),
	'Literacy development' => array(),
	'Localization' => array(),
	'Masculinity' => array(),
	'Media studies' => array(),
	'Medieval' => array(),
	'Metaphysics' => array(),
	'Modernism' => array(),
	'Mormonism' => array(),
	'Morpho-syntax' => array(),
	'Music' => array(),
	'Neurolinguistics' => array(),
	'Nineteenth century' => array(),
	'Novel' => array(),
	'Philosophy' => array(),
	'Phonetics & phonology' => array(),
	'Photography' => array(),
	'Poetry' => array(),
	'Postcolonialism' => array(),
	'Pre-columbian' => array(),
	'Professional writing' => array(),
	'Psycholinguistics' => array(),
	'Realism' => array(),
	'Religion' => array(),
	'Renaissance' => array(),
	'Rhetoric' => array(),
	'Romanticism' => array(),
	'Satire' => array(),
	'Scandinavia' => array(),
	'Seventeenth century' => array(),
	'Short story' => array(),
	'Sixteenth century' => array(),
	'Sociolinguistics' => array(),
	'South America' => array(),
	'Sports and games' => array(),
	'TESOL' => ARRAY(),
	'Theater' => array(),
	'Theory' => array(),
	'Translation' => array(),
	'Twentieth century' => array(),
	'Twenty-first century' => array(),
	'Victorian' => array(),
	'Women’s studies' => array(),
	'Young adult ' => array())};
    //echo "<script>console.log('in byuh_populate_depts_taxonomy, getting terms from $tax');</script>";

    foreach ( $terms as $parent => $children ) {
        //echo "<script>console.log('\tAdding term: $parent');</script>";
        $inserted_parent = wp_insert_term(
            $parent,
            $tax
        );
        foreach ($children as $child) {
            //echo "<script>console.log('\t\tAdding term: $child (p: ${inserted_parent['term_id']})');</script>";
            wp_insert_term(
                $child,
                $tax,
                array(
                    'parent' => $inserted_parent['term_id']
                )
            );
        }
    }
}

function byuh_init () {
    byuh_do_caps( 'add_cap' );
    /* Disable for production reboot */
    //byuh_clear_taxonomy ( 'personresearch' );
    byuh_populate_research_taxonomy ('personresearch');
  //byuh_clear_taxonomy ( 'persondepartments' );
  //byuh_populate_depts_taxonomy ( 'persondepartments' );
}
add_action('after_switch_theme', 'byuh_init');


function byuh_setup() {

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
        'capability_type'     => array('person','people'),
        'capabilities' => array(
          // meta caps (don't assign these to roles)
          'edit_post'              => 'edit_person',
          'read_post'              => 'read_person',
          'delete_post'            => 'delete_person',

          // primitive/meta caps
          'create_posts'           => 'create_people',

          // primitive caps used outside of map_meta_cap()
          'edit_posts'             => 'edit_people',
          'edit_others_posts'      => 'manage_people',
          'publish_posts'          => 'manage_people',
          'read_private_posts'     => 'read',

          // primitive caps used inside of map_meta_cap()
          'read'                   => 'read',
          'delete_posts'           => 'manage_people',
          'delete_private_posts'   => 'manage_people',
          'delete_published_posts' => 'manage_people',
            'delete_others_posts'    => 'manage_people',
            'edit_private_posts'     => 'edit_people',
            'edit_published_posts'   => 'edit_people'

        ),
        'map_meta_cap' => true,
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
}
add_action('init', 'byuh_setup');

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
function activate_personresearch_tax() {
    create_personresearch_tax();
    flush_rewrite_rules();
}

function create_personresearch_tax() {
    register_taxonomy(
        'personresearch',
        'person',
        array(
            'labels' => array(
                'name'  => _x( 'Research', 'taxonomy general name' ),
                'singular_name'		=> __( 'Research', 'taxonomy singular name' ),
                'search_items'		=> __( 'Search Research' ),
                'all_items'		=> __( 'All Research' ),
                'parent_item'		=> __( 'Parent Research' ),
                'parent_item_colon'	=> __( 'Parent Research:' ),
                'edit_item'		=> __( 'Edit Research' ),
                'update_item'		=> __( 'Update Research' ),
                'add_new_item'		=> __( 'Add New Research' ),
                'new_item_name'		=> __( 'New Research Name' ),
                'menu_name'		=> __( 'Research' ),
                'separate_items_with_commas' => __( 'Separate research areas with commas' ),
                'add_or_remove_items' => __( 'Add or remove research area' ),
                'choose_from_most_used' => __( 'Choose from the most used research areas' ),
            ),
            'capabilities' => array(
                'manage_terms' => 'manage_presearch',
                'edit_terms' => 'edit_presearch',
                'assign_terms' => 'assign_presearch'
                /* 'edit_terms' => 'edit_presearch' */
            ),
            'hierarchical' => false,
            'show_admin_column' => true,
            'rewrite' => true,
            'query_var' => true,
	    'show_in_rest' => true
        )
    );
}

add_action('init', 'create_personresearch_tax');
register_activation_hook( __FILE__, 'activate_personresearch_tax' );

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
                'singular_name'		=> __( 'Department', 'taxonomy singular name' ),
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
