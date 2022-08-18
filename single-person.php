<?php
/**
 * The Template for displaying all people pages.
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="text profile module">
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

					<?php if (get_field('address')) { ?>
					<p class="info address"><i class="icon byu-icon-location"></i><span><?php the_field('address'); ?></span></p>
					<?php } ?>

					<?php if (get_field('phone')) { $f_phone = format_phone_num(get_field('phone')); ?>
					
					<p class="info phone"><i class="icon byu-icon-telephone"></i><span><a href="tel:+1<?php echo $f_phone;?>"><?php echo $f_phone; ?></a></span></p>
					<?php } ?>
		
					<?php if (get_field('email')) { ?>
					<p class="info email"><i class="icon byu-icon-mail"></i><span><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></span></p>
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
							"publications"=>"Selected Publications", 
							"service"=>"Service", 
							"citizenship_assignments"=>"Citizenship assignments", 
							"professional_website"=>"Professional Website");
						foreach($person_details as $field => $label) {
							$f = get_field($field);
							if ($f) {
							echo "<div class='personal-info-box'><h3 class='label $field'>$label</h3>";
							echo "<p>"
							. get_field($field)
							. "</p></div>";
							}
						}
						
						?>
						<!-- End Directory Details -->
						
						<!-- Research Projects Someone is On -->
						<?php
						$currentPageUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						
						$params = array(
							'orderby' => 't.post_title ASC',    
							'limit' => -1
							);
						
						$mypod = pods( 'projects' , $params);

						$live_projects = array();
						$intake_projects = array();
						$archived_projects = array();
						$noStatus_projects = array();

						while ( $mypod -> fetch() ) {

							$intake_status = $mypod -> field('intake_status_date');
							$live_status = $mypod -> field('live_status_date');
							$archived_status = $mypod -> field('archived_status_date');

							$status_css_class = get_status_style($archived_status, $live_status, $intake_status);

							$id = $mypod -> field('id');
							$permalink = get_permalink($id);
							$personnel = $mypod -> field('project_personnel.ID');

							foreach ($personnel as $person) {
								$link = get_permalink($person);
								
								if($link == $currentPageUrl && $status_css_class == "liveStatus") {
									$live_project = '<li>' . '<a class="' . $status_css_class . '" href="' . $permalink . '">' . $mypod->display('post_title') . '</a>' . '</li>';
									$live_projects[] = $live_project; 
								}
								elseif($link == $currentPageUrl && $status_css_class == "intakeStatus") {
									$intake_project = '<li>' . '<a class="' . $status_css_class . '" href="' . $permalink . '">' . $mypod->display('post_title') . '</a>' . '</li>';
									$intake_projects[] = $intake_project; 
								}
								elseif($link == $currentPageUrl && $status_css_class == "archivedStatus") {
									$archived_project = '<li>' . '<a class="' . $status_css_class . '" href="' . $permalink . '">' . $mypod->display('post_title') . '</a>' . '</li>';
									$archived_projects[] = $archived_project;
								}
								elseif($link == $currentPageUrl && $status_css_class == "unknownStatus") {
									$noStatus_project = '<li>' . '<a class="' . $status_css_class . '" href="' . $permalink . '">' . $mypod->display('post_title') . '</a>' . '</li>';
									$noStatus_projects[] = $noStatus_project;
								}
								else {
									continue;
								}
							}
						}
						if (!empty($live_projects) || !empty($intake_projects) || !empty($archived_projects) || !empty($noStatus_projects)) {
							echo "<div class='personal-info-box'><h3 class='label projects'>Projects</h3>";
								if (!empty($live_projects)) {
									echo "<h5 class='projectStatus liveStatus'>Live </h5>";
									echo "<ul>";
									foreach ($live_projects as $live_p) {
										echo $live_p;
									}
									echo "</ul>";
								}
								if (!empty($intake_projects)) {
									echo "<h5 class='projectStatus intakeStatus'>Intake </h5>";
									echo "<ul>";
									foreach ($intake_projects as $intake_p) {
										echo $intake_p;
									}
									echo "</ul>";
								}
								if (!empty($archived_projects)) {
									echo "<h5 class='projectStatus archivedStatus'>Archived </h5>";
									echo "<ul>";
									foreach ($archived_projects as $archived_p) {
										echo $archived_p;
									}
									echo "</ul>";
								}
								if (!empty($noStatus_projects)) {
									echo "<h5 class='projectStatus unknownStatus'>Others</h5>";
									echo "<ul>";
									foreach ($noStatus_projects as $noStatus_p) {
										echo $noStatus_p;
									}
									echo "</ul>";
								}
							echo "</div>";
						}
						?>
						<!-- End Research Projects -->
						
				</div>
			</div>
		</div>
    </div>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
