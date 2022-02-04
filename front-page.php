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
<div class="homePostContainer">
	<div class="homePostInner">
		<ul>
		<?php 
		// Define our WP Query Parameters
		$the_query = new WP_Query( array('post_type' => 'post') ); ?>
		
		<?php 
		// Start our WP Query
		while ($the_query -> have_posts()) : $the_query -> the_post(); 
		// Display the Post Title with Hyperlink
		?>
		
		<li><a class="homePagePost" href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
		
		<li><?php 
		// Display the Post Excerpt
		the_excerpt(__('(more…)')); ?></li>
		
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
