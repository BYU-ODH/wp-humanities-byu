<?php

//////////////////////////////////////////////////////
/* CTA */
//////////////////////////////////////////////////////
function cta_button_init() {
  //don't do if user isn't going to see tinymce
  if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') && get_user_option('rich_editing') == 'true') {
    return;
  }

  add_filter("mce_external_plugins", "cta_register_plugin");
  add_filter('mce_buttons', 'cta_add_button');
}
add_action('init', 'cta_button_init');
//
//register tinymce plugin
function cta_register_plugin($plugin_array) {
    $plugin_array['byuh_button_cta'] = get_template_directory_uri() . '/shortcodes/cta.js';
    return $plugin_array;
}

//add button to toolbar
function cta_add_button($buttons) {
    //Add the button ID to the $button array
    $buttons[] = "byuh_button_cta";
    return $buttons;
}

//generate our shortcode html
function shortcode_cta($atts, $content = null ) {
  extract(shortcode_atts(array(
    'href' => '',
  ), $atts));
  return '<a href="' . $href . '" class="cta"><span class="italic underline">' . do_shortcode($content) . '</span><i class="icon byu-icon-arrow-thin-long"></i></a>';
}
add_shortcode('cta', 'shortcode_cta');

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

function make_list($people,$dept) {
  $deptmap=array();
  $colormap=array();
  $block="<div class='directory'>";
  $departmentArgs = array('orderby'=>'ID', 'order'=>'ASC', 'posts_per_page' => -1, 'post_type' => array('department'), 'post_status' => 'publish');
  $departments = get_posts($departmentArgs);
  if ($dept=="all") {
    $block.="<div class='filter-container'>";
    $block.="<div class='filter-label'><span class='current' data-dept='all'>All</span><i class='icon byu-icon-caret-down'></i></div>";
    $block.="<ul>";
    $block.='<li class="filter" data-class="all">All</li>';
  }
  foreach ($departments as $department) {
    if ($dept=="all") {
      // $block.="<li class='filter' data-class='department-".$department->ID."'>".$department->post_title."</li>";
      $block.="<li class='filter' data-class='".$department->ID."'>".$department->post_title."</li>";
    }
    $deptmap[$department->ID]=$department->post_title;
    $colormap[$department->ID]=get_field('color',$department->ID);
  }
  if ($dept=="all") {
    $block.="</ul></div>";
  }
  $block.="<div class='searchfilter-container input-container'>
		<input id='directory-filter' class='search' placeholder='search directory' value='' type='text' />
	</div>";
  $block.="<div class='statusfilter-container'>";
  $block.="<div class='statusfilter' data-class='status-full'> Full-time </div> | ";
  $block.="<div class='statusfilter' data-class='status-visiting'> Visiting </div> | ";  
  $block.="<div class='statusfilter' data-class='status-part'> Adjunct </div> | ";
  $block.="<div class='statusfilter' data-class='status-affiliated'> Affiliated </div> | ";
  $block.="<div class='statusfilter' data-class='status-retired'> Emeriti </div> | ";
  $block.="<div class='statusfilter' data-class='status-staff'> Staff/Administration</div>";
  $block.="</div>";
  $block.="<ul class='directory-list filterable'>";

  $status_map = [
    "full" => "Full-time Faculty",
    "part" => "Part-time/Adjunct Faculty",
    "visiting" => "Visiting Faculty",
    "retired" => "Emeritus Faculty",
    "staff" => "Staff/Administration",
    "stinst" => "Student Instructor",
    "student" => "Student Employee"];

  foreach($people as $post) {
    if ($dept=="all" || qualified_post(wp_get_post_terms($post['ID'], 'persondepartments'), $dept))
    {
      if (in_array($post['status'],array("full","part","emeritus","staff","visiting"))) {
        $imageArr = wp_get_attachment_image_src(get_post_thumbnail_id($post['ID']), 'medium');
        $image_alt = get_post_meta(get_post_thumbnail_id($post['ID']), '_wp_attachment_image_alt', TRUE);
        if (empty($image_alt)) {
          $image_alt = get_the_title($post['ID']);
        }
        $image = $imageArr[0];
        $permalink=get_permalink($post['ID']);
        $color=$colormap[$deptID];
        //print_r($post, false);
        $directory_entry_classes=array("filterable-item", "department-".$post['department'], "status-".$post['status']);
        if ($post['affiliated_faculty']) {
          array_push($directory_entry_classes, "affiliated-".$post['affiliated_department'], "status-affiliated"); 
        }
	$classes=implode(" ", $directory_entry_classes);

        $block.="<li class='$classes'>";
        //$block.="<li class='filterable-item department-".$post['department']." status-".$post['status']."'>";
        //if($image) { $block.="<div style='background-image: url($image); border-color: $color;' class='image-container'></div>"; }
        if($image) { $block.="<div style='border-color: $color;' class='image-container'>
<a href=\"$permalink\">
          <img src='$image' class='directory-portrait' alt='$image_alt' title='$image_alt'>
</a>
          </div>"; }
        $block.="<div class=\"content\">";
	$block.="<a href=\"$permalink\"><h4>".$post['post_title']."</h4></a>";
	$block.="<h5>";
        $block.=$status_map[$post['status']].", ";
	$block.=$deptmap[$post['department']]."</h5>";
        if ($post['affiliated_faculty']) {
          $block.="<h5>Affiliated Faculty, " . $deptmap[$post['affiliated_department']] . "</h5>";
        }

        if (!empty($post['address'])) {
          $block.="<div class=\"link\"><i class=\"icon byu-icon-location\"></i><span>".$post['address']."</span></div>";	
  }
  if (!empty($post['phone'])) {
    $phone = $post['phone'];
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phone) == 10) 
    {
      $phone = '('.substr($phone, 0, 3).')'.substr($phone, 3, 3).'-'.substr($phone,6);
      $block.="<div class=\"link\"><i class=\"icon byu-icon-telephone\"></i><span>".$phone."</span></div>";
    }
    else if (strlen($phone) == 7)
    {
      $phone = '(801)'.substr($phone, 0, 3).'-'.substr($phone,3);
      $block.="<div class=\"link\"><i class=\"icon byu-icon-telephone\"></i><span>".$phone."</span></div>";
    }
  }
        if (!empty($post['email'])) {
          $block.="<div class=\"link\"><i class=\"icon byu-icon-mail\"></i><span><a href='mailto:" . $post['email'] . "'>".$post['email']."</span></div>";
	}
        $block.="<a href=\"mailto:".$post['email']."\"><div class=\"cta\"><span class=\"underline\">Send a Message</span><i class=\"icon byu-icon-arrow-thin-long\"></i>";
        $block.="</div></a></div>"; 
	$block.="</li>";
      }
    }
  } //end foreach
  $block.="</ul>";
  $block.="</div>";
  return $block;
}

function directory_list($atts) {
  global $wpdb;
  $attrs = shortcode_atts( array(
    'dept' => 'all'
  ), $atts );
  $querystr = "SELECT $wpdb->posts.ID, $wpdb->posts.post_title, $wpdb->postmeta.meta_key, $wpdb->postmeta.meta_value FROM $wpdb->posts, 
$wpdb->postmeta WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id AND $wpdb->postmeta.meta_key 
IN ('email','phone','department','address','status','affiliated_faculty','affiliated_department') AND $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'person'";
  $personposts = $wpdb->get_results($querystr, OBJECT);
  $faclist=array();
  $faculty=array();
  foreach ($personposts as $meta) {
    if (!array_key_exists($meta->ID,$faculty)) {
      $faculty[$meta->ID]=array('post_title'=>$meta->post_title,'ID'=>$meta->ID);
    }
    $faculty[$meta->ID][$meta->meta_key]=$meta->meta_value;
  }
  foreach ($faculty as $id=>$meta) {
    array_push($faclist,$meta);
  }
  usort($faclist, function($a, $b) {
      $nameparts = explode(" ", trim($a['post_title']));
      $potential = explode(" ", trim($b['post_title']));
      return end($nameparts) < end($potential) ? -1 : 1;
  });
  return make_list($faclist,$attrs['dept']);
  
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
  		//'tags_input'     => [ '<tag>, <tag>, ...' | array ] // Default empty.
 		); 
		array_push($results,$post);
	}
 }

  //return wp_insert_post($post);
  return json_encode($results);
}

add_shortcode('new_posts','create_imported_posts');

?>
