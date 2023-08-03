<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package enlighten
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(has_post_thumbnail()) : ?>
		<?php $enlighten_img = wp_get_attachment_image_src(get_post_thumbnail_id(),'enlighten-single-page'); 
        $enlighten_img_src = $enlighten_img[0]; ?>
		<div class="post-image-wrap">
			<img src="<?php echo esc_url($enlighten_img_src); ?>" />
		</div>
	<?php endif; ?>
	<div class="post-meta">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta clearfix">
			<div class="post-date">
			<?php enlighten_posted_on(); ?>
			</div>
			<div class="post-comment"><a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i><?php comments_number(0); ?></a></div>
		</div><!-- .entry-meta -->
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'enlighten' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'enlighten' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</div>
	<footer class="entry-footer">
		<?php echo get_the_tag_list('<p>'.__('Tags','enlighten').': ',', ','</p>'); ?>
	</footer><!-- .entry-footer -->