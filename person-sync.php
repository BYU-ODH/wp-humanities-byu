<?php
/**
 * Template Name: Person Sync
 */

global $wpdb;
if (!empty($_REQUEST['person_id'])) {
	$querystr = "SELECT $wpdb->posts.ID, $wpdb->posts.post_title, $wpdb->postmeta.meta_key, $wpdb->postmeta.meta_value FROM $wpdb->posts, $wpdb->postmeta WHERE $wpdb->posts.ID = {$_REQUEST['person_id']} AND $wpdb->postmeta.meta_key IN ('email','phone','department','address','position','status') AND $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'person'";
}
else {
	$querystr = "SELECT $wpdb->posts.ID, $wpdb->posts.post_title, $wpdb->postmeta.meta_key, $wpdb->postmeta.meta_value FROM $wpdb->posts, $wpdb->postmeta WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id AND $wpdb->postmeta.meta_key IN ('email','phone','department','address','position','status') AND $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'person'";
}
$personposts = $wpdb->get_results($querystr, OBJECT);
$faclist=array();
$faculty=array();
foreach ($personposts as $meta) {
	if (!array_key_exists($meta->ID,$faculty)) {
        	$faculty[$meta->ID]=array('post_title'=>$meta->post_title,'ID'=>$meta->ID);
	}
        $faculty[$meta->ID][$meta->meta_key]=$meta->meta_value;
}

foreach ($faculty as $ID=>$meta) {
	array_push($faclist,$meta);
}

if (!empty($_REQUEST['setNetids'])) {
?>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
faculty=<?php echo json_encode($faclist); ?>;
</script>
</head>
<body>
<div id="content">
<p>For each of the people that appear below, select the netID which belongs to him/her.</p>
<p id="search">
</div>
<script>
$(document).ready(function() {
	idx=0;
	$.ajax({
		async: false,
    		type: "GET",
     		url: "/oldsite/directory/personsearch/",
     		dataType: 'html',
     		data: {"person":faculty[idx].post_title},
     		success: function(dt){
        		names=JSON.parse(dt);
			$('#search').html("<form action='post' method='' id='netid_form'><input type='hidden' name='postid' value='"+faculty[idx].ID+"'/></form>");
			names.forEach(function(v,k) {
				$("#netid_form").append("<input type='radio' name='netid' value='"+v+"'/>"+v+"<br/>");
			});
			$("#netid_form").append("<input type='button' id='send_netid' name='submit' value='add netid'/>");
        	}
	});
});
</script>
</body>
</html>
<?php
}
else {
echo "no";
}
