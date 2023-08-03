<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Care
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-single-item'); ?>>
	<div class="single-wrap">
		<div class="content-wrap">
	        
	        <?php
	        
	        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	        ?>

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
	        		the_excerpt();
	        	?>
	            
	        </div><!-- .entry-content -->
		</div><!-- .content-wrap -->
	</div>
</article><!-- #post-## -->
