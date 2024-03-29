<?php
/**
 *
 * The template for displaying pages
 *
 * Used in page.php and page templates
 *
 * @package Septera
 */
?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="schema-image">
			<?php cryout_featured_hook(); ?>
		</div>
		<div class="article-inner">
			<header>
				<?php
					the_title( '<h2 class="entry-title singular-title" ' . cryout_schema_microdata( 'entry-title', 0 ) . '>', '</h2>' ); ?>
			   <span class="entry-meta" >
					<?php septera_posted_edit(); ?>
				</span>
			</header>

			<?php cryout_singular_before_inner_hook();  ?>

			<div class="entry-content" <?php cryout_schema_microdata( 'text' ); ?>>
			    <?php
			    the_content();
			    get_template_part('template-parts/flexible-content');
			    ?>
			    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'septera' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->

		</div><!-- .article-inner -->
	</article><!-- #post-## -->
	<?php comments_template( '/comments.php', true ); ?>

<?php endwhile; ?>
