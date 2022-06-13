<?php
/**
 * The template for displaying the landing page/blog posts
 * The functions used here can be found in includes/landing-page.php
 *
 * @package Septera
 */

$septera_landingpage = cryout_get_option( 'septera_landingpage' );

if ( is_page() && ! $septera_landingpage ) { 
	load_template( get_page_template() );
	return true;
}

if ( 'posts' == get_option( 'show_on_front' ) ) {
	include( get_home_template() );
} else {

	get_header();
	?>

    <div id="container" class="septera-landing-page one-column">
		<main id="main" role="main" class="main">
		<?php

		if ( $septera_landingpage ) {
			get_template_part( apply_filters('septera_landingpage_main_template', 'content/landing-page' ) );
		} else {
			septera_lpindex();
		}
		?>
		</main><!-- #main -->
		<?php if ( ! $septera_landingpage ) { septera_get_sidebar(); } ?>
	</div><!-- #container -->

<!--Add posts to home page-->
<section class="blog text-content" >
	<h1><a href="blog/">Blog</a></h1> <!-- This links expects you to be at the front page -->
	<!--Post container, sets space for the posts to display-->
	<div class="homePostContainer">
		<!--Inner container to align post content with flex-->
		<div class="homePostInner">
			<ul>
			<?php 
			// WP Query Parameters to get blog posts
			$the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 5) ); ?>
			
			<?php // Start of WP Query
			while ($the_query -> have_posts()) : $the_query -> the_post(); 
			// Display the Post Title with Hyperlink
			?>
			
			<article class="homePostSingle">
				<!--gets the post id which will help get the thumbnail/image-->
				<?php $post_id = get_the_ID();?>
				<div class="homePostIMG"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'object-fit_cover' ) );?></a></div>
				<div class="homePostText">
					<li><a class="homePagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li>
					<li><span class="homePostDate"><?php echo get_the_date( 'F j, Y', $post_id )?></span>&nbsp;/
						<span class="homePostAuthor"><?php the_author_posts_link(); ?></span>
						
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
							}
						?>
					</li>
					<li><?php 
					// Display the Post Excerpt
					the_excerpt(__('(more…)')); ?></li>
				</div>
			</article>
			<hr class="homePostLine">
			
			<?php 
				// Repeat the process and reset once it hits the limit
				endwhile;
				wp_reset_postdata();
			?>
			</ul>	
			
		</div>
	</div>
	
</section>
<!--end of post content-->

	<?php get_footer();

} //else !posts


