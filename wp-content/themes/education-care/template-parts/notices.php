<?php
/**
 * Template part for displaying scrolling notices in header
 *
 * @package Education_Care
 */
?>
<div class="notices-wrap">
	<?php
	$notice_title = education_care_options( 'notice_title' );

	if( !empty( $notice_title ) ){

		echo '<span class="notice-title">'.esc_html( $notice_title ).' : </span>';

	}

	$notice_type = education_care_options( 'notice_type' );
	$notice_cat  = education_care_options( 'notice_category' );

	if( 'latest_posts' == $notice_type ){

		$recent_args = array(
		                    'numberposts' => 5,
		                    'post_status' => 'publish',      
		                );

		$recent_posts = wp_get_recent_posts( $recent_args );

		if( !empty( $recent_posts ) ): ?>

		    <ul id="latest-notices" class="notice-scroll">
		        <?php foreach( $recent_posts as $recent ): ?>

		        <li>
		            <a href="<?php echo esc_url( get_permalink( $recent["ID"] ) ); ?>" title="<?php echo esc_attr( $recent['post_title'] ); ?>"><?php echo esc_attr( $recent['post_title'] ); ?></a>
		        </li>

		        <?php endforeach; ?>

		    </ul>
		    <?php 

		endif; 

	} elseif( 'category_posts' == $notice_type && !empty( $notice_cat ) ){

		$cat_args = array(
		                   'cat'         => absint( $notice_cat ),
		                   'numberposts' => 5,
		                   'post_status' => 'publish',      
		               );

		$cat_query = new WP_Query( $cat_args );

		if( $cat_query->have_posts()){ ?>                              
		   <ul id="latest-notices" class="notice-scroll">

		       <?php 

		       while( $cat_query->have_posts()){

		           $cat_query->the_post(); ?>
		           <li>
		               <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		           </li>
		           <?php 

		       } 

		       wp_reset_postdata(); ?>

		   </ul>

		   <?php 
		}
	} ?>
</div>