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
							<?php get_template_part('content/content', 'blog'); ?>
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
