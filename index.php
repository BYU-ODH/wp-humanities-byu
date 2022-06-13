	<?php
	/**
	 * The main template file.
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @package Septera
	 */
	get_header();
	?>

<div id="container" class="<?php echo septera_get_layout_class(); ?>">
	<main id="main" role="main" class="main">
		<?php cryout_before_content_hook(); ?>
		<?php if ( have_posts() ) : ?>
		<section class="blog text-content">
			<h1>Blog</h1>
			<div <?php cryout_schema_microdata( 'blog' ); ?>>
				<div class="homePostContainer">
					<div class="homePostInner">
						<ul>
							<!-- Start the Loop  -->
							<?php while ( have_posts() ) : the_post(); ?>
							<article class="homePostSingle">
								<!--gets the post id which will help get the thumbnail/image-->
								<?php $post_id = get_the_ID();?>
								<div class="homePostIMG"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'object-fit_cover' ) );?></a></div>
								<div class="homePostText">
									<li><a class="homePagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									<li><span class="homePostDate"><?php echo get_the_date( 'F j, Y', $post_id )?></span>&nbsp;/<span class="homePostAuthor"><?php the_author_posts_link(); ?></span>
											<!--<a href="#" title="Visit in Directory"><i class="fa fa-user" aria-hidden="true"></i></a>-->
										<?php
											$post_categories = wp_get_post_categories( $post_id, array( 'fields' => 'all' ) );
											$cats = array();
											$cats_display = array();	
												if( $post_categories ){ // Always Check before loop!
													print("<div class='post_categories'>");
													foreach($post_categories as $c){
														$cats[] = array( 'name' => $c->name, 'slug' => $c->slug );
														$cats_display[] = sprintf("<a href=%s>%s</a>", esc_url( get_category_link( $c->term_id ) ), $c->name );
													}
													print(implode(", ", $cats_display));
													print("</div>"); 
													} ?>
									</li>
										<!-- // Display the Post Excerpt -->
									<li><?php the_excerpt(__('(more…)')); ?></li>
								</div>
							</article>
							<hr class="homePostLine">
							<!-- // get_template_part( 'content/content', get_post_format());
							get_template_part( 'content/content', 'excerpt'); -->
							<?php	endwhile; ?>
						</ul>
				</div>
			</div> <!-- content-masonry -->
		</section>
				
	<?php septera_pagination(); ?>
	<?php else : get_template_part( 'content/content', 'notfound' ); endif; ?>
	<?php cryout_after_content_hook(); ?>
				
	</main><!-- #main -->
	<?php septera_get_sidebar(); ?>
</div><!-- #container -->

	<?php get_footer();
