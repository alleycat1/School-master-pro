<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Care
 */

get_header(); ?>
<?php if ( true === apply_filters( 'education_care_show_home_page_content', true ) ) : ?>
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
endif;
get_footer();
