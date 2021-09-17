<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Septera
 *
 */

get_header();

function fill_bucket() {
    $bucket= array();
    while (have_posts() ) {
	the_post();
	$mainpost=get_post(get_the_ID());
	$metapost=get_post_meta(get_the_ID());
	$bucket[]=array($mainpost,$metapost);
	}
    return $bucket;
}


?>

<!--style to fix alignment of people-->
<style>
article{
	position: relative;
	width: 445px;
	height: 606px;
	padding: 10px;
}
</style>

	<div id="container" class="<?php echo septera_get_layout_class(); ?>">
		<main id="main" role="main" class="main">
			<?php cryout_before_content_hook(); ?>

			<?php if ( have_posts() ) : ?>

				<header class="page-header pad-container" <?php cryout_schema_microdata( 'element' ); ?>>
				<?php
						// Load custom header if author
						if (is_author()) {
							get_template_part( 'content/author-bio' );
						// Default for all archives
						} else {
							the_archive_title( '<h1 class="page-title" ' . cryout_schema_microdata('entry-title', 0) . '>', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						}
					?>
				</header><!-- .page-header -->

				<div id="content-masonry" class="content-masonry " <?php cryout_schema_microdata( 'blog' ); ?>>
					<?php
					$faclist = fill_bucket();
					echo make_list($faclist, 'all');
					// print_r($faclist);
					?>
				</div><!--content-masonry-->
				<!--not really nessessary-->
				<?php septera_pagination();

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content/content', 'notfound' );
			endif;

			cryout_after_content_hook(); ?>

		</main><!-- #main -->

		<?php septera_get_sidebar(); ?>
	</div><!-- #container -->

<?php get_footer(); ?>
