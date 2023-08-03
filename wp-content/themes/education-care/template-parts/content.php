<?php
/**
 * Template part for displaying posts
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
	        <header class="entry-header">

	            <div class="entry-meta">
	                <span class="day"><?php echo esc_html( get_the_date('d') ); ?></span>
	                <span class="month"><?php echo esc_html( get_the_date('M') ); ?></span>
	            </div>

	        </header>

	        <?php
	        if ( is_single() ) :
	        	the_title( '<h2 class="entry-title">', '</h2>' );
	        else :
	        	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	        endif; ?>

	        <footer class="entry-footer">
	        	<?php printf( esc_html_x( 'By %s', 'post author', 'education-care' ), '<span class="byline"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' ); ?>
	            

	            <?php 
	            /* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'education-care' ) );
				if ( $categories_list && education_care_categorized_blog() ) {
					printf( '<span class="categories">%1$s</span>', $categories_list ); // WPCS: XSS OK.
				} ?>
	        </footer>

	        <div class="entry-content">
	            
	        	<?php
	        		the_content( sprintf(
	        			/* translators: %s: Name of current post. */
	        			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'education-care' ), array( 'span' => array( 'class' => array() ) ) ),
	        			the_title( '<span class="screen-reader-text">"', '"</span>', false )
	        		) );

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
