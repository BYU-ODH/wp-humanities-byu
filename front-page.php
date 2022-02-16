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
		
		<div class="homePostSingle">
			<!--gets the post id which will help get the thumbnail/image-->
			<?php $post_id = get_the_ID();?>
			<div class="homePostIMG"><?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'object-fit_cover' ) );?></div>
			<div class="homePostText">
				<li><a class="homePagePost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<li><p class="homePostAuthor"><?php echo get_the_author(); ?></p></li>
				<li><?php 
				// Display the Post Excerpt
				the_excerpt(__('(more…)')); ?></li>
				<li><p class="homePostAuthor"><?php echo get_the_date( 'F j, Y', $post_id )?></p></li>
			</div>
		</div>
		<hr class="homePostLine">
		
		<?php 
		// Repeat the process and reset once it hits the limit
		endwhile;
		wp_reset_postdata();
		?>
		</ul>	
		
	</div>
</div>
<!--end of post content-->

	<?php get_footer();

} //else !posts
