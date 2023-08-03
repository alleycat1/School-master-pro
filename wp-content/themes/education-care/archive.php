<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Care
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="blog-list" class="blog-wrapper blog-col-2">
			<div class="inner-wrapper">

				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'archive' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
				
			</div>
		</div> <!-- #blog-list -->
	</div><!-- #primary -->

<?php
do_action( 'education_care_action_sidebar' );
get_footer();
