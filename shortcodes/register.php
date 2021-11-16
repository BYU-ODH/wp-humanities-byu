<?php

function qualified_post($terms, $dept) {
  // Take the department taxonomy terms of a post and see if $dept is among them
  foreach ($terms as $t) {
    $term_name = $t -> slug;
    if ($term_name == $dept) { return true; }
    else {
      $children_name_array = array();
      $children = get_term_children($term_name, 'persondepartments');
      foreach ($children as $c) {
        $children_name_array[] = $c -> slug;
      }
      return in_array($dept, $children_name_array);
    }
  }
  return false;  
}


function directory_list($atts) {
  wp_enqueue_script('byuh-directory', get_template_directory_uri() . '/resources/js/directory.js', array('jquery'));
return "<div id=\"odh-directory\">Loading Directory</div>";


  
}

add_shortcode('directory','directory_list'); 

function create_imported_posts() {
 $results=array();
 $json=json_decode(file_get_contents("http://humanities.byu.edu/feed/news/json/"));
 foreach ($json as $oldpost) {
	if ((int)date("Y",strtotime($oldpost->fields->publish_date))>2013) {
		$post = array(
		'post_content'   => $oldpost->fields->abstract,
  		'post_title'     => $oldpost->fields->headline,
  		'post_status'    => "publish",
  		'post_date'      => $oldpost->fields->publish_date,
  		'post_category'  => $oldpost->fields->organization // Default empty.
 		); 
		array_push($results,$post);
	}
 }

  return json_encode($results);
}

add_shortcode('new_posts','create_imported_posts');



// display all the reserach areas from the taxonomy on a page 

add_shortcode('research','research_areas_page');

function research_areas_page( $atts )
{
    $atts = shortcode_atts( array(
        'orderby' => 'name',
    ), $atts );

    $args = array(
        'directory' => 'personresearch',
        'orderby' => $atts['orderby'],
    );

    $terms = get_categories($args);

    $output = '';

    // Exit if there are no terms
    if (! $terms) {
        return $output;
    }

    // Start list
    $output .= '<ul id="research">';

    // Add terms
    foreach($terms as $term) {
      $output .= '<li><a href="'. get_term_link($term) .'">'. esc_html($term->cat_name) .'</a>'.' ' .'(' .$term->count .')' .'</li>';
    }

    // End list
    $output .= '</ul>';

    return ($output);

}

add_shortcode('research', 'research_areas_page');

?>
