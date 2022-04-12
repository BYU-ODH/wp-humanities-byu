<?php

// function odh_populate_specialties_taxonomy ( $tax ) {
//     $terms = array(
// 	'American studies' => array(),
// 	'Computational linguistics' => array(),
// 	'Computer assisted learning' => array(),
// 	'Corpus linguistics' => array(),
// 	'Digital humanities' => array(),
//   'Linguistics' => array(),
//  	'Twentieth century' => array(),
//  	'Twenty-first century' => array(),
// 	'Young adult ' => array());
//     echo "<script>console.log('in odh_populate_specialties_taxonomy , getting terms from $tax');</script>";

//     foreach ( $terms as $parent => $children ) {
//         $inserted_parent = wp_insert_term(
//             $parent,
//             $tax
//         );
//         foreach ($children as $child) {
//             wp_insert_term(
//                 $child,
//                 $tax,
//                 array(
//                     'parent' => $inserted_parent['term_id']
//                 )
//             );
//         }
//     }
// }

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
                'name'  => _x( 'Specialty', 'taxonomy general name' ),
                'singular_name'		=> __( 'Specialty', 'taxonomy singular name' ),
                'search_items'		=> __( 'Search Specialty' ),
                'all_items'		=> __( 'All Specialties' ),
                'parent_item'		=> null,
                'parent_item_colon'	=> null,
                'edit_item'		=> __( 'Edit Specialty' ),
                'update_item'		=> __( 'Update Specialty' ),
                'add_new_item'		=> __( 'Add New Specialty' ),
                'new_item_name'		=> __( 'New Specialty Name' ),
                'menu_name'		=> __( 'Specialty' ),
                'separate_items_with_commas' => __( 'Separate specialty areas with commas' ),
                'add_or_remove_items' => __( 'Add or remove specialty area' ),
                'choose_from_most_used' => __( 'Choose from the most used specialty areas' ),
            ),
            'hierarchical' => false,
            'show_admin_column' => true,
            'rewrite' => true,
            'query_var' => true,
	    'show_in_rest' => true
        )
    );
}

function byuh_init () {
    /* Disable for production reboot */
    activate_personresearch_tax();
    register_activation_hook( __FILE__, 'activate_personresearch_tax' );
   
}
add_action('init', 'byuh_init');

/* Person ACF settings */
// these can be exported from ACF, but they must wait until they are done/correct, as they override dev efforts
