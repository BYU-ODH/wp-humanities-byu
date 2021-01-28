<?php

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
	'TESOL' => array(),
	'Theater' => array(),
	'Theory' => array(),
	'Translation' => array(),
	'Twentieth century' => array(),
	'Twenty-first century' => array(),
	'Victorian' => array(),
	'Women’s studies' => array(),
	'Young adult ' => array());
    echo "<script>console.log('in byuh_populate_research_taxonomy, getting terms from $tax');</script>";

    foreach ( $terms as $parent => $children ) {
        echo "<script>console.log('\tAdding term: $parent');</script>";
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

function byuh_init () {
    //byuh_do_caps( 'add_cap' );
    /* Disable for production reboot */
    //byuh_clear_taxonomy ( 'personresearch' );
    activate_personresearch_tax();
    register_activation_hook( __FILE__, 'activate_personresearch_tax' );
    byuh_populate_research_taxonomy ('personresearch');
  //byuh_clear_taxonomy ( 'persondepartments' );
  //byuh_populate_depts_taxonomy ( 'persondepartments' );
}
//add_action('after_switch_theme', 'byuh_init');
add_action('init', 'byuh_init');






/* Person ACF settings */
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5c892f4f8dffb',
	'title' => 'Person Details',
	'fields' => array(
		array(
			'key' => 'field_55df5fc2c481c',
			'label' => 'NetID',
			'name' => 'netid',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'NetID',
			'prepend' => '',
			'append' => '',
			'formatting' => 'html',
			'maxlength' => '',
		),
		array(
			'key' => 'field_53ec25130ad61',
			'label' => 'Department',
			'name' => 'department',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'department',
			),
			'taxonomy' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array(
			'key' => 'field_53ec1c188571e',
			'label' => 'Title/Position',
			'name' => 'position',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5428f4ec30e3f',
			'label' => 'Status',
			'name' => 'status',
			'type' => 'radio',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'full' => 'Full-time Faculty',
				'part' => 'Part-time/Adjunct Faculty',
				'visiting' => 'Visiting Faculty',
				'retired' => 'Emeritus Faculty',
				'staff' => 'Staff/Administration',
				'stinst' => 'Student Instructor',
				'student' => 'Student Employee',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'full',
			'layout' => 'vertical',
			'allow_null' => 0,
			'return_format' => 'value',
		),
		array(
			'key' => 'field_53ec1c3e8571f',
			'label' => 'Address/Office',
			'name' => 'address',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array(
			'key' => 'field_53ec1c4d85720',
			'label' => 'Phone Number',
			'name' => 'phone',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '(###)###-####',
			'prepend' => '',
			'append' => '',
			'maxlength' => 12,
		),
		array(
			'key' => 'field_53ec1c5e85721',
			'label' => 'Email',
			'name' => 'email',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_53ec1c8085722',
			'label' => 'Schedule',
			'name' => 'schedule',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'row_min' => '',
			'row_limit' => '',
			'layout' => 'table',
			'button_label' => 'Add New',
			'min' => 0,
			'max' => 0,
			'collapsed' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_53ec1ca785723',
					'label' => 'Name',
					'name' => 'name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array(
					'key' => 'field_53ec1ccd85724',
					'label' => 'Days/Times',
					'name' => 'times',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'eg: MWF 10:00-10:50',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array(
					'key' => 'field_53ec1ce685725',
					'label' => 'Location',
					'name' => 'location',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'eg: B101 JFSB',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_587e979bf2a47',
			'label' => 'Display CV',
			'name' => 'cv-choice',
			'type' => 'radio',
			'instructions' => 'Choose the CV to be displayed; by default, BYU Faculty Profile will be queried.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'up' => 'Upload Custom CV',
				'none' => 'Do not display CV',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => 'none',
			'layout' => 'vertical',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_587e986cf2a48',
			'label' => 'Upload CV',
			'name' => 'uploaded_cv',
			'type' => 'file',
			'instructions' => 'Upload custom CV',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_587e979bf2a47',
						'operator' => '==',
						'value' => 'up',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'uploadedTo',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_589c16f3d0d55',
			'label' => 'Affiliated Faculty?',
			'name' => 'affiliated_faculty',
			'type' => 'true_false',
			'instructions' => 'Is this user an affiliated faculty in one of the departments?',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_589c1713d0d56',
			'label' => 'Affiliated Department',
			'name' => 'affiliated_department',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_589c16f3d0d55',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'department',
			),
			'taxonomy' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array(
			'key' => 'field_60124af023ef6',
			'label' => 'Research Areas',
			'name' => 'research_areas',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'personresearch',
			'field_type' => 'checkbox',
			'add_term' => 0,
			'save_terms' => 1,
			'load_terms' => 0,
			'return_format' => 'id',
			'multiple' => 0,
			'allow_null' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'person',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
