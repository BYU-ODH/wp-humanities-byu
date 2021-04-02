<?php

function cmpdates($a, $b) {
    if ($a->post_date == $b->post_date) {
        return 0;
    }
    return ($a->post_date < $b->post_date) ? 1 : -1;
}


$flex_content = get_field('flexible_content');

if ($flex_content) {
	foreach ($flex_content as $section) {
		$contentType = $section['acf_fc_layout'];
		?>


		<!-- DEFAULT CONTENT -->
		<?php if ($contentType === "default_content") { ?>
			<section class="wrapper">
				<div class="text-content">
					<?php echo $section['content']; ?>
				</div><!-- .text-content -->
			</section>
		<?php } ?>


		<!-- 1-4 GRID LINK LIST -->
		<?php
		if ($contentType === '1-4_grid_link_list') {
			$links = $section['grid_link_list_items'];

			if ($links) {
				?>
				<section class="wrapper">
					<ul class="color-list box-grid-1-4 group">
						<?php foreach ($links as $l) { ?>
							<li style="background-image: url(<?php echo $l['image']; ?>);">
								<a href="<?php echo $l['link']; ?>">
									<div class="color-container">
										<div class="content">
											<div>
												<h3 class="caps"><?php echo $l['title']; ?></h3>
											</div>
											<p><?php echo $l['description']; ?></p><i class="icon byu-icon-arrow-long"></i>
										</div>
									</div>
								</a>
							</li>
						<?php } ?>
					</ul>
				</section>
			<?php } // if $links
		} // if $contentType
		?>


		<!-- GRID QUICK LINKS -->
		<?php
		if ($contentType === 'grid_quick_links') {
			$recent_posts = $section['grid_quick_links_items']; ?>

			<section class="<?php echo $section['background_color'] ? 'background-color' : ''; ?>" style="background-color: <?php echo $section['background_color']; ?>">
				<div class="wrapper">
					<header>
						<h2 class="break"><?php echo $section['title']; ?></h2>
					</header>
					<div class="quick-links full group">

						<?php
						$grid_quick_links_counter = 0;
						foreach($recent_posts as $post) {
							$grid_quick_links_counter++;
							setup_postdata($post);

							$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
							$categories = wp_get_post_categories($post->ID);
							$type = 'news';
							$last = '';

							if ($grid_quick_links_counter % 3 === 0) {
								$last = 'last';
							}

							if ($categories) {
								$type = strtolower(get_category($categories[0])->name);
							} ?>
							<a href="<?php the_permalink(); ?>" class="quick-link <?php echo $last; ?>">
								<div style="background-image: url(<?php echo $image[0]; ?>)" class="image-container"></div>
								<div class="text-content">
									<h4><?php the_title(); ?></h4><i class="icon byu-icon-<?php echo $type; ?>"></i>
									<p><?php the_excerpt(); ?></p><i class="icon byu-icon-arrow-long"></i>
								</div>
							</a>
							<?php wp_reset_postdata(); ?>
						<?php } //end foreach ?>

					</div><!-- end .quick-links -->
				</div><!-- end .wrapper -->
			</section><!-- end section -->

		<?php } //end if $contentType
		?>

		<!-- GRID NEWS LINKS -->
		<?php
		if ($contentType === 'grid_news_links') {
			$recent_posts = $section['grid_news_links_items']; 
			usort($recent_posts,cmpdates); ?>
			<section class="<?php echo $section['background_color'] ? 'background-color' : ''; ?>" style="background-color: <?php echo $section['background_color']; ?>">
				<div class="wrapper">
					<div class="quick-links full group">

						<?php
						$grid_quick_links_counter = 0;
						foreach($recent_posts as $post) {
							$grid_quick_links_counter++;
							setup_postdata($post);

							$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
							$categories = wp_get_post_categories($post->ID);
							$type = 'news';
							$last = '';

							if ($grid_quick_links_counter % 3 === 0) {
								$last = 'last';
							}

							if ($categories) {
								$type = strtolower(get_category($categories[0])->name);
							} ?>
							<a href="<?php the_permalink(); ?>" class="quick-link <?php echo $last; ?>">
								<div style="background-image: url(<?php echo $image[0]; ?>)" class="image-container"></div>
								<div class="text-content">
									<h4><?php the_title(); ?></h4><i class="icon byu-icon-<?php echo $type; ?>"></i>
									<p><?php the_excerpt(); ?></p><i class="icon byu-icon-arrow-long"></i>
								</div>
							</a>
							<?php wp_reset_postdata(); ?>
						<?php } //end foreach ?>

					</div><!-- end .quick-links -->
				</div><!-- end .wrapper -->
			</section><!-- end section --> 

		<?php } //end if $contentType
		?>


		<!-- PROGRAM GRID -->
		<?php
		if ($contentType === 'program_grid') {
			$grid_items = $section['program_grid_items']; ?>

			<section class="wrapper">

				<?php if ($section['show_filters']) {
					$pcategories = get_terms('pcategory'); ?>

					<div class="filter-container">
						<div class="filter-label"><span class="current">All</span><i class="icon byu-icon-caret-down"></i></div>
						<ul>
							<li class="filter" data-class="filterable-item">All</li>
							<?php foreach ($pcategories as $pcategory) { ?>
								<li class="filter" data-class="pcategory-<?php echo $pcategory->term_id; ?>"><?php echo $pcategory->name; ?></li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>

				<ul class="color-list box-grid-4 group filterable">
					<?php
					foreach($grid_items as $post) {
						setup_postdata($post);
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

						$pcategories = wp_get_post_terms($post->ID, 'pcategory', array("fields" => "ids"));
						$classes = array();
						foreach ($pcategories as $pcategory) {
							array_push($classes, 'pcategory-'.$pcategory);
						}
						?>
						<li class="filterable-item <?php echo join(" ", $classes); ?> flip-container">
							<div class="flipper">
								<div style="background-image: url(<?php echo $image[0]; ?>);" class="flipper-front bg-image">
									<h3 class="caps"><?php the_title(); ?></h3>
								</div>
								<div class="flipper-back">
									<div class="content">
										<p><?php the_excerpt(); ?></p>
										<div class="cta">
											<a href="<?php the_field('home_page_link'); ?>">
												<span class="italic underline">Learn More</span><i class="icon byu-icon-arrow-thin-long"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<?php wp_reset_postdata();
					} //end foreach $grid_items ?>
				</ul>

			</section><!-- end .wrapper -->
		<?php } //end if $contentType
		?>


		<!-- DEPARTMENT SOCIAL LIST -->
		<?php
		if ($contentType === 'department_social_list') {
			$list_items = $section['department_list_items']; ?>

			<section class="social-list wrapper">

				<ul class="social">
					<?php
					foreach($list_items as $post) {
						setup_postdata($post); ?>
						<li>
							<div class="image-container" style="background-color: <?php the_field('color'); ?>"></div>
							<div class="content">
								<h4><?php the_title(); ?></h4>
								<?php if (get_field('facebook')) { ?>
									<a href="<?php the_field('facebook'); ?>" class="link"><i class="icon byu-icon-facebook"></i><span>Facebook</span></a>
								<?php } ?>
								<?php if (get_field('twitter')) { ?>
									<a href="<?php the_field('twitter'); ?>" class="link"><i class="icon byu-icon-twitter"></i><span>Twitter</span></a>
								<?php } ?>
								<?php if (get_field('youtube')) { ?>
									<a href="<?php the_field('youtube'); ?>" class="link"><i class="icon byu-icon-youtube-square"></i><span>YouTube</span></a>
								<?php } ?>
								<?php if (get_field('instagram')) { ?>
									<a href="<?php the_field('instagram'); ?>" class="link"><i class="icon byu-icon-instagram"></i><span>Instagram</span></a>
								<?php } ?>
							</div>
						</li>
						<?php wp_reset_postdata();
					} //end foreach $grid_items ?>
				</ul>

			</section><!-- end .wrapper -->
		<?php } //end if $contentType
		?>


		<!-- DEPARTMENT GRID -->
		<?php
		if ($contentType === 'department_grid') {
			$grid_items = $section['department_grid_items']; ?>

			<section class="wrapper">

				<?php if ($section['show_filters']) {
					$dcategories = get_terms('dcategory'); ?>

					<div class="filter-container">
						<div class="filter-label"><span class="current">All</span><i class="icon byu-icon-caret-down"></i></div>
						<ul>
							<li class="filter" data-class="all">All</li>
							<?php foreach ($dcategories as $dcategory) { ?>
								<li class="filter" data-class="dcategory-<?php echo $dcategory->term_id; ?>"><?php echo $dcategory->name; ?></li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>

				<ul class="box-grid-4 group filterable">
					<?php
					foreach($grid_items as $post) {
						setup_postdata($post);
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

						$dcategories = wp_get_post_terms($post->ID, 'dcategory', array("fields" => "ids"));
						$classes = array();
						foreach ($dcategories as $dcategory) {
							array_push($classes, 'dcategory-'.$dcategory);
						}
						?>
						<li class="flip-container filterable-item <?php echo join(" ",$classes); ?>">
							<div class="flipper">
								<div class="flipper-front" style="background-image: url(<?php echo $image[0]; ?>);">
									<h3 class="caps"><?php the_title(); ?></h3>
								</div>
								<div class="flipper-back">
									<h4><?php the_title(); ?></h4>
									<div class="content">
										<ul>
											<?php if (get_field('office')) { ?>
												<li><?php the_field('office'); ?></a></li>
											<?php } ?>
											<?php if (get_field('phone')) { ?>
												<li><?php the_field('phone'); ?></a></li>
											<?php } ?>
											<?php if (get_field('facebook')) { ?>
												<li><a href="<?php the_field('facebook'); ?>">Facebook</a></li>
											<?php } ?>
											<?php if (get_field('twitter')) { ?>
												<li><a href="<?php the_field('twitter'); ?>">Twitter</a></li>
											<?php } ?>
											<?php if (get_field('youtube')) { ?>
												<li><a href="<?php the_field('youtube'); ?>">YouTube</a></li>
											<?php } ?>
											<?php if (get_field('instagram')) { ?>
												<li><a href="<?php the_field('instagram'); ?>"></i> Instagram</a></li>
											<?php } ?>
											<?php if (get_field('home_page_link')) { ?>
												<li><a href="<?php the_field('home_page_link'); ?>" target="_blank"></i> Home Page</a></li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<?php wp_reset_postdata();
					} //end foreach $grid_items ?>
				</ul>

			</section><!-- end .wrapper/filterable -->
		<?php } //end if $contentType
		?>


		<!-- QUOTE -->
		<?php
		if ($contentType === 'quote') { ?>
			<section style="background-image: url(<?php echo $section['background_image']; ?>)" class="message quote">
				<div class="wrapper">
					<div class="message-container">
						<i class="icon byu-icon-quote"></i>
						<p><?php echo $section['content']; ?></p>
						<p class="author"><?php echo $section['author']; ?></p>
					</div>
				</div>
			</section>
		<?php } // end if $contentType
		?>


		<!-- DIVIDER -->
		<?php
		if ($contentType === 'divider') { ?>
			<section style="background-image: url(<?php echo $section['background_image']; ?>)" class="message">
				<div class="wrapper">
					<div class="message-container">
						<h1><?php echo $section['title']; ?></h1>
						<p><?php echo $section['content']; ?></p>
						<a href="<?php echo $section['link']; ?>">
							<div class="cta">
								<span class="underline"><?php echo $section['link_text']; ?></span><i class="icon byu-icon-arrow-thin-long"></i>
							</div>
						</a>
					</div>
				</div>
			</section>
		<?php } // end if $contentType
		?>


		<!-- EMBEDDED CONTENT -->
		<?php
		if ($contentType === 'embedded_content') { ?>
			<section class="wrapper">
				<div class="<?php echo $section['type']; ?>-container">
					<?php echo $section['content']; ?>
				</div>
			</section>
		<?php } //end if $contentType
		?>


		<!-- MAGAZINE CAROUSEL -->
		<?php
		if ($contentType === 'magazine_carousel') {
			$carousel_items = $section['magazine_carousel_items']; ?>

			<section>
				<div class="wrapper">
					<header>
						<h2 class="break"><?php echo $section['title']; ?></h2>
					</header>
				</div>
				<div class="carousel">
					<div class="owl-carousel">

						<?php
						foreach($carousel_items as $post) {
							setup_postdata($post);
							$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
							<div class="item magazine">
								<div style="background-image: url(<?php echo $image[0]; ?>);" class="image-container"></div>
								<a href="<?php the_permalink(); ?>">
									<div class="preview-text">
										<h4><?php the_title(); ?></h4><i class="icon byu-icon-arrow-long"></i>
									</div>
								</a>
							</div>
							<?php wp_reset_postdata();
						} //end foreach $grid_items ?>

					</div><!-- end .owl-carousel -->
				</div><!-- end .carousel -->
				<script>
					jQuery('.owl-carousel').owlCarousel({
						center: true,
						items:7,
						loop:true,
						margin:0,
						autoWidth: true,
						nav: true
					});
				</script>
			</section>
		<?php } //end if $contentType
		?>


		<!-- PAGE PREVIEW LIST -->
		<?php
		if ($contentType === 'page_preview_list') {
			$links = $section['page_preview_links']; ?>

			<section class="wrapper pagePreviewList">
				<?php foreach ($links as $link) { ?>
					<div class="page-preview-item group">
						<div style="background-image: url(<?php echo $link['image']; ?>)" class="image-container"></div>
						<div class="text-content">
							<h4><?php echo $link['title']; ?></h4>
							<p><?php echo $link['description']; ?></p>
							<a href="<?php echo $link['link']; ?>">
								<div class="cta"><span class="underline"><?php echo $link['link_text']; ?></span><i class="icon byu-icon-arrow-thin-long"></i></div>
							</a>
						</div>
					</div>
				<?php } ?>
			</section>
		<?php } // if $contentType ?>


		<!-- MEDIA LIST -->
		<?php
		if ($contentType === 'media_list') {
			$list_sections = $section['list_sections'];

			if ($list_sections) { ?>

				<section class="media wrapper">
				<?php if ($section['title']) { ?>
					<header>
						<h1 class="break"><?php echo $section['title']; ?></h1>
					</header>
				<?php } ?>

				<?php foreach ($list_sections as $list_section) { ?>
				  <div class="media-header">
				    <div class="icon-container">
                                      <?php
                                      $list_icon = $list_section['list_icon'];
                                      if ($list_icon) {
                                        $insert_icon = "<img src='$list_icon'>"; // default (font icon) has a font-size of 33px
                                      } else {
                                        $insert_icon = "<i class='icon byu-icon-events'></i>";
                                      }
                                      echo $insert_icon;
?>
						</div>
						<div class="title">
							<?php if ($list_section['view_all_link']) { ?>
								<a href="<?php echo $list_section['view_all_link']; ?>">
									<div class="cta"><span class="underline">View All</span><i class="icon byu-icon-arrow-thin-long"></i></div>
								</a>
							<?php } ?>
					<?php $type = $list_section["type"]; ?>
							<h2 class="caps"><?php echo $list_section["title"]; ?></h2>
						</div>
					</div>


					<?php if ($type === 'documents') { ?>
						<ul class="media-list files">
							<?php
							$media_items = $list_section['documents'];

							foreach ($media_items as $post) {
								setup_postdata($post);
								$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

								<li>
									<h3 class="caps">
										<a href="<?php echo wp_get_attachment_url($post->ID); ?>">
											<?php the_title(); ?><span class="line">|</span><span class="info"><?php echo get_post_mime_type(); ?></span>
										</a>
									</h3>
									<div class="options">
										<a href="<?php echo wp_get_attachment_url($post->ID); ?>"><i class="icon byu-icon-download"></i></a>
										<a href=""><i class="icon byu-icon-share"></i></a>
									</div>
								</li>

								<?php wp_reset_postdata();
							}
							?>
						</ul><!-- end .files -->
					<?php } // end if documents ?>


					<?php if ($type === 'youtube') { ?>
						<?php $listID = 'list_'.rand(0,1000); ?>
						<script>
							jQuery(document).ready(function($) {
								var username = "<?php echo $list_section['youtube_channel_username']; ?>",
									apiKey = "<?php the_field('google_api_key', 'option'); ?>",
									count = "<?php echo $list_section['youtube_video_count']; ?>";

								//get the channel id
								$.get('https://www.googleapis.com/youtube/v3/channels?part=snippet&forUsername='+username+'&key='+apiKey, function (data) {
									var channelID = data.items[0].id;

									//search the channel's videos
									$.get('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='+channelID+'&maxResults='+count+'&key='+apiKey, function (data) {
										var videos = data.items;

										$('#<?php echo $listID; ?> .loading').hide();

										$.each(videos, function (key, video) {
											$('#<?php echo $listID; ?>').append(''+
												'<li class="byuLightbox" style="background-image: url('+video.snippet.thumbnails.high.url+');" data-youtube-id="'+video.id.videoId+'">'+
												'<div class="color-container">'+
												'<div class="content">'+
												'<div>'+
												'<h3 class="caps">'+video.snippet.title+'</h3>'+
												'</div>'+
												'<p>'+video.snippet.description.substr(0, 60)+'...</p><i class="icon byu-icon-arrow-long"></i>'+
												'</div>'+
												'</div>'+
												'</li>'
											);
										});
									});
								}).fail(function (data) {
									console.error('Could not connect to YouTube: ', data);
									$('#<?php echo $listID; ?> .loading').text('Could not connect to YouTube');
								});

							});
						</script>

						<ul class="media-list color-list box-grid-4 group" id="<?php echo $listID; ?>">
							<!-- items added via js -->
							<h3 class="loading" style="padding: 40px 0 80px;">Loading Videos...</h3>
						</ul>

					<?php } ?>


					<?php if ($type === 'audio') { ?>

						<ul class="files media-list">
							<?php
							$audio_files = $list_section['audio_files'];

							foreach ($audio_files as $post) {
								setup_postdata($post);

								$audioFile = wp_get_attachment_url($post->ID);
								?>

								<li class="audio audio-player" data-file="<?php echo $audioFile; ?>">
									<div class="container">
										<div class="audioPlay play-button"><i class="icon byu-icon-play"></i></div>
										<div class="audioPause play-button" style="display: none;"><i class="icon byu-icon-pause"></i></div>
										<h3 class="caps">
											<?php the_title(); ?><span class="line">|</span>
											<span class="info"></span>
										</h3>
										<div class="options">
											<a href="<?php echo $audioFile; ?>"><i class="icon byu-icon-download"></i></a>
											<a href=""><i class="icon byu-icon-share"></i></a>
										</div>
									</div>
									<div class="progress-bar">
										<div class="time"></div>
									</div>
								</li>

								<?php wp_reset_postdata();
							}
							?>
						</ul>

					<?php } ?>


					<?php if ($type === 'photos') { ?>

						<ul class="media-list color-list box-grid-4 group">
							<?php
							$photos = $list_section['photos'];

							foreach ($photos as $photo) { ?>

								<li class="byuLightbox" style="background-image: url('<?php echo $photo['sizes']['large']; ?>');" data-image="<?php echo $photo['url']; ?>">
									<div class="color-container">
										<div class="content">
											<div>
												<h3 class="caps"><?php echo $photo['title']; ?></h3>
											</div>
											<p><?php echo $photo['caption']; ?></p><i class="icon byu-icon-arrow-long"></i>
										</div>
									</div>
								</li>

							<?php } ?>
						</ul>

					<?php } ?>
					     

				<?php } // end foreach $list_sections
			} // end if $list_sections ?>
			</section><!-- end .media -->
		<?php } // if $contentType ?>

		<!-- EXPANDED LINKS GRID -->
		<?php
		if ($contentType === 'expanded_link_grid') {
			$people = $section['grid_quick_links_items']; ?>

			<section class="module wrapper administration">

				<ul class="administration-list box-grid-3 group">

					<?php
					foreach($people as $post) {
						setup_postdata($post);

						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
					?>

						<li>
						<?php if (get_post_type()=="attachment") {
							$link = wp_get_attachment_url();
							}
							else {
							$link = get_permalink();
							}
						?>
							<a href="<?php echo $link ?>" class="quick-link <?php echo $last; ?>">
								<div style="background-image: url(<?php echo $image[0]; ?>)" class="image-container"></div>
								<div class="content">
									<h4><?php the_title(); ?></h4><i class="icon byu-icon-<?php echo $type; ?>"></i>
								</div>
							</a>

						</li>

						<?php wp_reset_postdata(); ?>
					<?php } //end foreach ?>

				</ul>
			</section>

		<?php } //end if $contentType
		?>


		<!-- PERSON GRID -->
		<?php
		if ($contentType === 'person_grid') {
			$people = $section['person_grid_items']; ?>

			<section class="module wrapper administration">

				<ul class="administration-list box-grid-3 group">

					<?php
					foreach($people as $post) {
						setup_postdata($post);

						$imageArr = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
						$image = $imageArr[0]; ?>

						<li>
							<a href="<?php the_permalink(); ?>">
								<div style="background-image: url(<?php echo $image; ?>)" class="image-container"></div>
								<div class="content">
									<h3><?php the_title(); ?></h3>
									<h4><span>Title</span> | <?php the_field('position'); ?></h4>

									<?php if (get_field('address')) { ?>
										<p><i class="icon byu-icon-location"></i><?php the_field('address'); ?></p>
									<?php } ?>

									<?php if (get_field('phone')) { ?>
										<p><i class="icon byu-icon-telephone"></i><?php the_field('phone'); ?></p>
									<?php } ?>

									<?php if (get_field('email')) { ?>
										<p><i class="icon byu-icon-mail"></i><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
									<?php } ?>
								</div>
							</a>
						</li>

						<?php wp_reset_postdata(); ?>
					<?php } //end foreach ?>

				</ul>
			</section>

		<?php } //end if $contentType
		?>


		<!-- PERSON LIST -->
		<?php
		if ($contentType === 'person_list') {
			$people = $section['person_list_items']; ?>

			<section class="directory module wrapper">

				<?php
				if ($section['show_filters']) {

					$departmentArgs = array('posts_per_page' => -1, 'post_type' => array('department'), 'post_status' => 'publish');
					$departments = get_posts($departmentArgs);
					?>

					<div class="filter-container">
						<div class="filter-label"><span class="current">All</span><i class="icon byu-icon-caret-down"></i></div>
						<ul>
							<li class="filter" data-class="filterable-item">All</li>
							<?php foreach ($departments as $department) { ?>
								<li class="filter" data-class="department-<?php echo $department->ID; ?>"><?php echo $department->post_title; ?></li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>

				<ul class="directory-list filterable">
					<?php
					foreach($people as $post) {
						setup_postdata($post);

						$imageArr = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
						$image = $imageArr[0];
						if(!file_exists($image))
							$image = "resources/images/Default image/default.jpg";
						$departmentID = get_field('department')->ID;
						?>

						<li class="filterable-item <?php echo 'department-'.$departmentID; ?>">
							<div style="background-image: url(<?php echo $image; ?>); border-color: <?php the_field('color', $departmentID) ?>" class="image-container"></div>
							<div class="content">
								<h4 class="byuLightbox" data-ajax-url="<?php the_permalink(); ?>"><?php the_title(); ?></h4>
								<?php if (get_field('address')) { ?>
									<div class="link"><i class="icon byu-icon-location"></i><span><?php the_field('address'); ?></span></div>
								<?php } ?>

								<?php if (get_field('phone')) { ?>
									<div class="link"><i class="icon byu-icon-telephone"></i><span><?php the_field('phone'); ?></span></div>
								<?php } ?>

								<?php if (get_field('email')) { ?>
									<div class="link"><i class="icon byu-icon-mail"></i><span><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></span></div>
								<?php } ?>

								<?php if (get_field('email')) { ?>
									<a href="mailto:<?php the_field('email'); ?>"><div class="cta"><span class="underline">Send a Message</span><i class="icon byu-icon-arrow-thin-long"></i></div></a>
								<?php } ?>
							</div>
						</li>

						<?php wp_reset_postdata(); ?>
					<?php } //end foreach ?>

				</ul>
			</section>

		<?php } //end if $contentType
		?>

	<?php } //foreach flex_content
} // if flex_content
?>
