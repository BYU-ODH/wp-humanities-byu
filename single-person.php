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

						$projects = array();
						// $intake_dates = array();
						// $live_dates = array();
						// $archived_dates = array();

						function get_status_style($archive_status_date, $live_status_date, $intake_status_date) {
							if (!empty($archive_status_date)) {
								"archivedStatus";
							}
							elseif (!empty($live_status_date)) {
								"liveStatus";
							}
							elseif (!empty($intake_status_date)) {
								"intakeStatus";
							}
							else {
								"unknownStatus";
							}
						}


						while ( $mypod -> fetch() ) {

							$intake_status = $mypod -> field('intake_status_date');
							// $intake_dates[] = $intake_status;

							// foreach ($intake_dates as $intake_date) {
							// 	print_r($intake_date . '<br />');
							// }

							$live_status = $mypod -> field('live_status_date');
							// $live_dates[] = $live_status;

							// foreach ($live_dates as $live_date) {
							// 	print_r($live_date . '<br />');
							// }

							$archived_status = $mypod -> field('archived_status_date');
							// $archived_dates[] = $archived_status;

							// foreach ($archived_dates as $archived_date) {
							// 	print_r($archived_date . '<br />');
							// }

							$status_css_class = get_status_style($archived_status, $live_status, $intake_status);

							$id = $mypod -> field('id');
							$permalink = get_permalink($id);
							$personnel = $mypod -> field('project_personnel.ID');

							foreach ($personnel as $person) {
								$link = get_permalink($person);
								
								if($link == $currentPageUrl) {
									$project = '<li>' . '<a class="' . $status_css_class . '" href="' . $permalink . '">' . $mypod->display('post_title') . '</a>' . '</li>';
									$projects[] = $project; 
								}
							}
						}
						if (!empty($projects)) {
							echo "<div class='personal-info-box'><h3 class='label projects'>Projects</h3>";
								foreach ($projects as $p) {
									echo $p;
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
