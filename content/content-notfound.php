<?php
/**
 * The default template for the not found section
 *
 * @package Septera
 */
?>
<header class="content-search pad-container no-results" <?php cryout_schema_microdata( 'element' ); ?>>

	<h1 class="entry-title" <?php cryout_schema_microdata( 'entry-title' ); ?>><?php _e( 'Nothing Found', 'septera' ); ?></h1>
	<div class="no-results-div">
		<p <?php cryout_schema_microdata( 'text' ); ?>><?php printf( __( 'No search results for: <em>%s</em>', 'septera' ), '<span>' . get_search_query() . '</span>' ); ?></p>
		<?php get_search_form(); ?>
	</div>

</header><!-- not-found -->
