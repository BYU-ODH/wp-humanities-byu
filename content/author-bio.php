<?php
/**
 *
 * The template for displaying author biography
 *
 * Used in single.php and arhive.php (author archives only)
 *
 * @package Septera
 */

$septera_heading_tag = ( is_single() ) ? 'h4' : 'h1';
?>
<section id="author-info" <?php cryout_schema_microdata( 'author' ); ?>>

	<<?php echo $septera_heading_tag ?> class="page-title">
		<?php echo __( 'Author:', 'septera' ) . ' <span' . cryout_schema_microdata( 'author-name', 0) . '>' . esc_attr( get_the_author() ) . '</span>'; ?>
	</<?php echo $septera_heading_tag ?>>

	<?php if ( get_the_author_meta( 'description' ) ) : ?>
		<div id="author-avatar" <?php cryout_schema_microdata( 'image' );?>>
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'septera_author_bio_avatar_size', 80 ), '', '', array( 'extra_attr' => cryout_schema_microdata( 'url', 0) ) ); ?>
		</div><!-- #author-avatar -->

		<div id="author-description"  <?php cryout_schema_microdata( 'author-description' ); ?>>

			<span><?php the_author_meta( 'description' ); ?></span>
			<?php if ( is_single() ) { ?>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"  <?php cryout_schema_microdata( 'author-url' ); ?>>
						<?php printf( __( 'View all posts by ', 'septera' ) . '%s <span class="meta-nav">&rarr;</span>', get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			<?php } ?>

		</div><!-- #author-description -->
	<?php endif; ?>

</section><!-- #author-info -->
