<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Care
 */

?>				</div><!-- .custom-wrapper -->
			</div><!-- .inner-wrapper -->
        </div><!-- -->
	</div><!-- #content -->

	<?php
	if ( is_active_sidebar( 'footer-1' ) ||
	 is_active_sidebar( 'footer-2' ) ||
	 is_active_sidebar( 'footer-3' ) ||
	 is_active_sidebar( 'footer-4' ) ) :
	?>
		<aside id="footer-widgets" class="widget-area">

		    <div class="container">
		        <div class="inner-wrapper">

		        	<?php
		        		$column_count = 0;
		        		for ( $i = 1; $i <= 4; $i++ ) {
		        			if ( is_active_sidebar( 'footer-' . $i ) ) {
		        				$column_count++;
		        			}
		        		}
		        	 ?>

		        	 <?php
		        	 $column_class = 'widget-column footer-active-' . absint( $column_count );
		        	 for ( $i = 1; $i <= 4 ; $i++ ) {
		        	 	if ( is_active_sidebar( 'footer-' . $i ) ) {
		        	 		?>
		        	 		<div class="<?php echo $column_class; ?>">
		        	 			<?php dynamic_sidebar( 'footer-' . $i ); ?>
		        	 		</div>
		        	 		<?php
		        	 	}
		        	 }
		        	 ?>
		        </div><!-- .inner-wrapper -->
		    </div><!-- .container -->

		</aside><!-- #footer-widgets -->

	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
	
	   <div class="container">

	      <div class="site-info-holder">
	   
	          <?php $copyright_text = education_care_options( 'copyright_text' ); ?>
	          
	          	<div class="copyright">
	          		<?php 
	          		if ( ! empty( $copyright_text ) ) : 

	          			echo wp_kses_data( $copyright_text ); 

	          		endif; ?> 

	          		<?php echo esc_html( 'Theme: ', 'education-care' ); ?><a href="<?php echo esc_url('https://www.preciousthemes.com/downloads/education-care/'); ?>" target="_blank"><?php echo esc_html( 'Education Care', 'education-care' ); ?></a>   
	          	</div><!-- .copyright -->
	          
	          
	          <!-- .copyright -->
	          <div class="site-links">
	          	<?php
	          	if ( has_nav_menu( 'footer' ) ) {
		          	wp_nav_menu(
		          		array(
		          			'theme_location' => 'footer',
		          			'menu_id'        => 'footer-menu',
		          			'depth' 		 => 1,
		          		)
		          	);
	          	}
	          	?>
	                    
	          </div>
	          <!-- .site-info -->
	    </div>
	      
	   </div>
	   
	   <!-- .container -->
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
