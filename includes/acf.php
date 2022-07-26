<?php

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


//person_detail_code:

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
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
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
                'key' => 'field_60c79122b0423',
                'label' => 'Why to call',
                'name' => 'why_to_call',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_60108a6b3ce0a',
                'label' => 'Teaching Experience',
                'name' => 'teaching',
                'type' => 'wysiwyg',
                'instructions' => 'A short description of your teaching philosophy, explain why you like teaching at BYU, or list your teaching accomplishments.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_6011a594483a2',
                'label' => 'Research',
                'name' => 'research',
                'type' => 'wysiwyg',
                'instructions' => 'Describe your research focus or interests.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_6011ab48ae608',
                'label' => 'publications',
                'name' => 'publications',
                'type' => 'wysiwyg',
                'instructions' => 'Enter a bulleted list of your most significant publications.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_6011abd38410b',
                'label' => 'Service',
                'name' => 'service',
                'type' => 'wysiwyg',
                'instructions' => 'Describe you citizenship focus or main accomplishments; consider indicating why university or academic service is important to you.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_6011ac1b96b27',
                'label' => 'Citizenship assignments',
                'name' => 'citizenship_assignments',
                'type' => 'wysiwyg',
                'instructions' => 'Enter a bulleted list of your most significant citizenship assignments.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_6011ac3e0b7c3',
                'label' => 'Professional Website',
                'name' => 'professional_website',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_61f85ff7f06f2',
                'label' => 'Projects',
                'name' => 'projects',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'projects',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'allow_archives' => 1,
                'multiple' => 1,
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
        'show_in_rest' => 0,
    ));
    
    endif;		

// FIN
