<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Care
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-single-item'); ?>>
	<div class="single-wrap">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-thumb">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
		</div>
		<?php endif; ?>

		<div class="content-wrap">
			
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'education-care' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'education-care' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div><!-- .content-wrap -->
	</div>
</article><!-- #post-## -->
