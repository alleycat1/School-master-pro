<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package enlighten
 */

get_header(); 
$enlighten_post_id = get_the_ID();
$enlighten_page_layout = esc_attr(get_post_meta( $enlighten_post_id, 'enlighten_sidebar_layout', true ));
if($enlighten_page_layout == ''){
    $enlighten_page_layout = 'right';
}
?>
<div class="<?php echo 'ak-container-'.esc_attr($enlighten_page_layout); ?> <?php if($enlighten_page_layout != 'both'){echo 'ak-container';}?>">
     <?php if($enlighten_page_layout !== 'no'){
                if($enlighten_page_layout == 'both' || $enlighten_page_layout == 'left'){?>
                    <div id="secondary" class="<?php echo esc_attr($enlighten_page_layout).'_left' ?> clearfix">
                        <?php
                            get_sidebar('left');
                        ?>
                    </div>
                <?php } ?>
        <?php } ?>
    <div id="primary" class="content-area <?php echo esc_attr($enlighten_page_layout); ?>">
    	<main id="main" class="site-main" role="main">

		<?php
       
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
    </div><!-- #primary -->
    <?php if($enlighten_page_layout !== 'no'){
            if( $enlighten_page_layout == 'both' || $enlighten_page_layout == 'right'){ ?>
                <div id="secondary" class="<?php echo esc_attr($enlighten_page_layout).'_right' ?>">
                    <?php
                        get_sidebar();
                    ?>
                </div>
            <?php } ?>
    <?php } ?>
</div>
<?php
get_footer();
