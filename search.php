<?php
/**
 * The template for displaying Search results pages.
 *
 * @package Septera
 */

get_header(); ?>

	<div id="container" class="<?php echo septera_get_layout_class(); ?>">
		<main id="main" role="main" class="main">
			<?php cryout_before_content_hook(); ?>

			<?php if ( have_posts() ) : ?>

				<header class="page-header content-search pad-container" <?php cryout_schema_microdata( 'element' ); ?>>
					<h1 class="page-title" <?php cryout_schema_microdata( 'entry-title' ); ?>>
						<?php printf( __( 'Search Results for: %s', 'septera' ), '<strong>' . get_search_query() . '</strong>' ); ?>
					</h1>
				</header>
				<div class="homePostContainer">
				<div class=" homePostInner" <?php cryout_schema_microdata( 'blog' ); ?>>
					<?php /* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'content/content', 'search' );
					endwhile;
					?>
				</div><!--content-masonry-->
				</div>
				<?php

				septera_pagination();

			else :

				get_template_part( 'content/content', 'notfound' );
				?> <div id="content-masonry"></div> <?php

				cryout_empty_page_hook();

			endif; ?>

			<?php cryout_after_content_hook(); ?>
		</main><!-- #main -->

		<?php septera_get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
