<?php

// function byuh_populate_depts_taxonomy ( $tax ) {
//     $terms = array(
//         'Asian and Near Eastern Languages' => array("Arabic", "Chinese", "Hebrew", "Japanese", "Korean"),
//         'Comparative Arts and Letters' => array("Art History", "Comparative Studies", "Interdisciplinary Humanities", "Classics", "Comparative Literature", "Scandinavian Studies"),
//         'English' => array(),
//         'French and Italian' => array("French", "Italian"),
//         'German and Russian' => array("German", "Russian"),
//         'Linguistics and English Language' => array("Editing", "Linguistics", "English Language", "TESOL"),
//         'Philosophy' => array(),
//         'Spanish and Portuguese' => array("Spanish", "Portuguese"),
//         'American Studies' => array(),
//         'Center for Language Studies' => array(),
//         'Humanities Advisement and Careers' => array(),
//         'Humanities Center' => array(),
//         'Office of Digital Humanities' => array(),
//         'Women\'s Studies' => array(),
//         'Writing Center' => array(),
//         'Center for Language Studies' => array(),		 
//         'Humanities Administration' => array()		 
//     );

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

function byuh_populate_projects_taxonomy ( $tax ) {
    $terms = array(
	// 'Adaptation' => array(),
	// 'Aesthetics' => array(),
	// 'Africa' => array(),
	// 'African American' => array(),
	 'American studies' => array(),
	// 'Antiquity' => array(),
	// 'Applied linguistics' => array(),
	// 'Art History' => array(),
	// 'Asia' => array(),
	// 'Baroque' => array(),
	// 'Bilingualism' => array(),
	// 'Britain' => array(),
	// 'Classical' => array(),
	// 'Comedy' => array(),
	// 'Composition' => array(),
	'Computational linguistics' => array(),
	'Computer assisted learning' => array(),
	// 'Contemporary' => array(),
	'Corpus linguistics' => array(),
	// 'Creative writing' => array(),
	// 'Critical theory' => array(),
	// 'Cultural studies' => array(),
	// 'Deconstruction' => array(),
	 'Digital humanities' => array(),
	// 'Editing & publishing' => array(),
	// 'Eighteenth century' => array(),
	// 'English teaching' => array(),
	// 'Environment' => array(),
	// 'Epistemology' => array(),
	// 'Ethics' => array(),
	// 'Europe' => array(),
	// 'Fantastic literature' => array(),
	// 'Feminism' => array(),
	// 'Film' => array(),
	// 'Gender studies' => array(),
	// 'Gothic' => array(),
// 	'Historical linguistics' => array(),
// 	'Indigenous languages' => array(),
// 	'Intercultural competence' => array(),
// 	'L2 education' => array(),
// 	'L2 testing' => array(),
// 	'Latin America' => array(),
// 	'Latinx' => array(),
'Linguistics' => array(),
// 	'Literacy development' => array(),
// 	'Localization' => array(),
// 	'Masculinity' => array(),
// 	'Media studies' => array(),
// 	'Medieval' => array(),
// 	'Metaphysics' => array(),
// 	'Modernism' => array(),
// 	'Mormonism' => array(),
// 	'Morpho-syntax' => array(),
// 	'Music' => array(),
// 	'Neurolinguistics' => array(),
// 	'Nineteenth century' => array(),
// 	'Novel' => array(),
// 	'Philosophy' => array(),
// 	'Phonetics & phonology' => array(),
// 	'Photography' => array(),
// 	'Poetry' => array(),
// 	'Postcolonialism' => array(),
// 	'Pre-columbian' => array(),
// 	'Professional writing' => array(),
// 	'Psycholinguistics' => array(),
// 	'Realism' => array(),
// 	'Religion' => array(),
// 	'Renaissance' => array(),
// 	'Rhetoric' => array(),
// 	'Romanticism' => array(),
// 	'Satire' => array(),
// 	'Scandinavia' => array(),
// 	'Seventeenth century' => array(),
// 	'Short story' => array(),
// 	'Sixteenth century' => array(),
// 	'Sociolinguistics' => array(),
// 	'South America' => array(),
// 	'Sports and games' => array(),
// 	'TESOL' => array(),
// 	'Theater' => array(),
// 	'Theory' => array(),
// 	'Translation' => array(),
 	'Twentieth century' => array(),
 	'Twenty-first century' => array(),
// 	'Victorian' => array(),
// 	'Women’s studies' => array(),
// 	'Young adult ' => array());
    echo "<script>console.log('in byuh_populate_projects_taxonomy, getting terms from $tax');</script>";

    foreach ( $terms as $parent => $children ) {
        $inserted_parent = wp_insert_term(
            $parent,
            $tax
        );
        foreach ($children as $child) {
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
