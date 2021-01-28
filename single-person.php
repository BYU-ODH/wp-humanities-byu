<?php
/**
 * The Template for displaying all people pages.
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="text profile module">
	<?php /*get_template_part('template-parts/page-header');*/ ?>

	<div class="profile-content">
	    <div class="text-content group wrapper">
		<?php
		$profileImageArr = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
		$profileImage = $profileImageArr[0];
		if( $profileImage ) { ?>
		    <div class="image-container"><img src="<?php echo $profileImage; ?>"></div>
		<?php } ?>
		<div class="content">
                    <?php $page_link = get_page_link(); ?>
			<h2><?php the_title(); ?></h2>
			<h3 class="caps">
			    <?php if (get_field('position')) { ?>
				<?php the_field('position'); ?>,
			    <?php } ?>
			    <?php  $d=get_field_object('department'); echo $d['value']->post_title;  ?> 
			</h3>

		    <?php if (get_field('address')) { ?>
			<p class="info"><i class="icon byu-icon-location"></i><span><?php the_field('address'); ?></span></p>
		    <?php } ?>

		    <?php if (get_field('phone')) { ?>
			<p class="info"><i class="icon byu-icon-telephone"></i><span><?php the_field('phone'); ?></span></p>
		    <?php } ?>
 
 		    <?php if (get_field('email')) { ?>
			<p class="info"><i class="icon byu-icon-mail"></i><span><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></span></p>
		    <?php } ?>

		    <!-- Curriculum Vitae -->
		    <!-- Don't display if hidden with "none" -->
		    <?php
		    $cv_choice = get_field('cv-choice');
		    $cv_empty = (empty($cv_choice))? "empty!" : "not empty.";
		    echo "<script>console.log('CV choice is: >> $cv_choice << \t empty: $cv_empty');</script>";
		    
		    switch ($cv_choice){
			case "":
			case "up":
			    $cv_url = get_field('uploaded_cv');
			    break;
			    
			default: // case if "none" or otherwise
			    $cv_url = false;
		    };
		    if ($cv_url) {
		    ?>
			<p class="info"><i class="icon byu-icon-directory"></i><span><a href="<?php echo $cv_url ?>">Curriculum Vitae</a></span></p>
		    <?php 
		    } 
		    ?>
			<?php
			$all_terms = '';
			$all_terms .= get_the_term_list( $post->ID, 'personresearch', '', ', ', ', ' );
			if ( $all_terms ) {
			?>
			    <p class="info research_areas"><i class="icon byu-icon-research"></i><span>Research Areas: </span><span class='research_areas_list'>
				<?php
				echo rtrim( $all_terms, ', ' );
				} // endif $all_terms
			?>
<!-- Directory Details -->
				<?php
				$person_details = array(
				    "teaching"=>"Teaching Experience", 
				    "research"=>"Research", 
				    "publications"=>"Publications", 
				    "service"=>"Service", 
				    "citizenship_assignments"=>"Citizenship assignments", 
				    "professional_website"=>"Professional Website");
				foreach($person_details as $field => $label) {
				    $f = get_field($field);
				    if ($f) {
					echo "<h3 class='label $field'>$label</h3>";
					echo "<p class='$field_content'>"
					   . get_field($field)
					   . "</p>";
				    }
				}
				
				?>
				<!-- End Directory Details -->

			<?php if (get_field('schedule')) { ?>
			    <div class="row">
				<?php foreach (get_field('schedule') as $s) { ?>
				    <div class="class-info">
					<?php echo $s['name']; ?><br>
					<?php echo $s['times']; ?><br>
					<?php echo $s['location']; ?>
				    </div>
				<?php } ?>
			    </div>
			<?php } ?>
		</div>
	    </div>
	    
	    <?php
	    // Not allowing exceptions in the data
	    // get_template_part('template-parts/flexible-content'); */

	    ?>
	</div>
    </div>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
