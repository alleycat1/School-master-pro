<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package enlighten
 */

get_header();

        ?>
<div  class="ak-container">
	<div id="primary" class="content-area right">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : 
			
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			?>
				<?php get_template_part( 'template-parts/content', '' ); ?>
			<?php
			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
    <div id="secondary" class="right_right">
        <?php
            get_sidebar();
        ?>
    </div>
</div>
<?php
get_footer();
