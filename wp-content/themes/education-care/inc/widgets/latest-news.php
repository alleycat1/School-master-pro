<?php
/**
 * Latest news widget
 *
 * @package Education_Care
 */

if ( ! class_exists( 'Education_Care_Latest_News_Widget' ) ) :

	/**
	 * Latest News widget class.
	 *
	 * @since 1.0.0
	 */
	class Education_Care_Latest_News_Widget extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => 'education-care-latest-news',
				'description' => esc_html__( 'Latest News Widget', 'education-care' ),
    		);

			parent::__construct( 'ec-latest-news', esc_html__( 'EC: Latest News', 'education-care' ), $opts );
	    }


	    function widget( $args, $instance ) {

			$title             = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$post_category     = ! empty( $instance['post_category'] ) ? $instance['post_category'] : 0;
			$exclude_categories = !empty( $instance[ 'exclude_categories' ] ) ? esc_attr( $instance[ 'exclude_categories' ] ) : '';
			$post_column       = ! empty( $instance['post_column'] ) ? $instance['post_column'] : 3;
			$post_number       = ! empty( $instance['post_number'] ) ? $instance['post_number'] : 3;
			$show_date    	   = ! empty( $instance['show_date'] ) ? $instance['show_date'] : 0;
			$show_excerpt      = ! empty( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : 0;
			$featured_image    = ! empty( $instance['featured_image'] ) ? $instance['featured_image'] : 'education-care-custom';


	        echo $args['before_widget']; ?>

	        <section id="education-blog" class="education-blog-section">
	        	<div id="news" class="latest-news-wrapper news-col-<?php echo esc_attr( $post_column ); ?>">
	        		<div class="container">
				        <?php 

				        if ( $title ) { ?>

                            <div class="section-title">
                                <h2><?php echo esc_html( $title ); ?></h2>
                            </div><!-- .section-title -->

	                    <?php }

				        $query_args = array(
						        	'posts_per_page' 		=> esc_attr( $post_number ),
						        	'no_found_rows'  		=> true,
						        	'post__not_in'          => get_option( 'sticky_posts' ),
						        	'ignore_sticky_posts'   => true,
						        );

				        if ( absint( $post_category ) > 0 ) {
				        	$query_args['cat'] = absint( $post_category );
				        }

				        if ( !empty( $exclude_categories ) ) {

				        	$exclude_ids = explode(',', $exclude_categories);

				        	$query_args['category__not_in'] = $exclude_ids;

				        }

				        $all_posts = new WP_Query( $query_args );

				        if ( $all_posts->have_posts() ) :?>

					        <div class="inner-wrapper">

								<?php while ( $all_posts->have_posts() ) :

	                                $all_posts->the_post(); ?>

					                <div class="latest-news-item">
						                <div class="news-inner">
							                <?php if ( has_post_thumbnail() ) :  ?>
							                  <div class="latest-news-thumb">
							                    <a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail( esc_attr($featured_image) ); ?>
							                    </a>
							                  </div><!-- .latest-news-thumb -->
							                <?php endif; ?>

							                <div class="latest-news-description">
							                	<?php if( 1 == $show_date ){ ?>
							                		<span class="posted-date"><?php echo get_the_date(); ?></span>
							                	<?php } ?>
								                <h3 class="lates-news-title">
								                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								                </h3><!-- .latest-news-title -->
							                  	<?php 
							                  	if( 1 == $show_excerpt ){
							                  		$content = education_care_get_the_excerpt( 15 );
													echo $content ? wpautop( wp_kses_post( $content ) ) : '';
												} 
												 ?>
							                </div><!-- .latest-news-description -->
						                </div>
					                </div>

								<?php endwhile; 

	                            wp_reset_postdata(); ?>

					        <div><!-- .inner-wrapper -->

				        <?php endif; ?>

	        		</div><!-- .container -->
	        	</div><!-- #news -->
	        </section><!-- #education-blog -->

	        <?php
	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;
			$instance['title']          	= sanitize_text_field( $new_instance['title'] );
			$instance['post_category']  	= absint( $new_instance['post_category'] );
			$instance['exclude_categories'] = sanitize_text_field( $new_instance['exclude_categories'] );
			$instance['post_number']    	= absint( $new_instance['post_number'] );
			$instance['post_column']    	= absint( $new_instance['post_column'] );
			$instance['show_date']    		= (bool) $new_instance['show_date'] ? 1 : 0;
			$instance['show_excerpt']    	= (bool) $new_instance['show_excerpt'] ? 1 : 0;
			$instance['featured_image']     = esc_attr( $new_instance['featured_image'] );


	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
				'title'          		=> '',
				'post_category'  		=> '',
				'exclude_categories' 	=> '',
				'post_column'    		=> 3,
				'post_number'    		=> 3,
				'show_date' 			=> 1,
				'show_excerpt' 			=> 1,
				'featured_image'        => 'education-care-custom',

	        ) );
	        ?>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'education-care' ); ?></strong></label>
	          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	        </p>
	        <p>
	          <label for="<?php echo  esc_attr( $this->get_field_id( 'post_category' ) ); ?>"><strong><?php esc_html_e( 'Select Category:', 'education-care' ); ?></strong></label>
				<?php
	            $cat_args = array(
	                'orderby'         => 'name',
	                'hide_empty'      => 0,
	                'class' 		  => 'widefat',
	                'taxonomy'        => 'category',
	                'name'            => $this->get_field_name( 'post_category' ),
	                'id'              => $this->get_field_id( 'post_category' ),
	                'selected'        => absint( $instance['post_category'] ),
	                'show_option_all' => esc_html__( 'All Categories','education-care' ),
	              );
	            wp_dropdown_categories( $cat_args );
				?>
	        </p>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>"><strong><?php esc_html_e( 'Number of Posts:', 'education-care' ); ?></strong></label>
	          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo  esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" value="<?php echo esc_attr( $instance['post_number'] ); ?>" min="1" />
	        </p>
            <p>
            	<label for="<?php echo esc_attr( $this->get_field_id( 'exclude_categories' ) ); ?>"><strong><?php esc_html_e( 'Exclude Categories:', 'education-care' ); ?></strong></label>
            	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'exclude_categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'exclude_categories' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['exclude_categories'] ); ?>" />
    	        <small>
    	        	<?php esc_html_e('Enter category id seperated with comma. Posts from these categories will be excluded from latest post listing.', 'education-care'); ?>	
    	        </small>
            </p>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'post_column' ) ); ?>"><strong><?php esc_html_e( 'Number of Columns:', 'education-care' ); ?></strong></label>
				<?php
	            $this->dropdown_post_columns( array(
					'id'       => $this->get_field_id( 'post_column' ),
					'name'     => $this->get_field_name( 'post_column' ),
					'selected' => absint( $instance['post_column'] ),
					)
	            );
				?>
	        </p>

	        <p>
	            <input class="checkbox" type="checkbox" <?php checked( $instance['show_date'] ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
	            <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html_e( 'Show Posted Date', 'education-care' ); ?></label>
	        </p>

	        <p>
	            <input class="checkbox" type="checkbox" <?php checked( $instance['show_excerpt'] ); ?> id="<?php echo $this->get_field_id( 'show_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'show_excerpt' ); ?>" />
	            <label for="<?php echo $this->get_field_id( 'show_excerpt' ); ?>"><?php esc_html_e( 'Show Excerpt', 'education-care' ); ?></label>
	        </p>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'featured_image' ) ); ?>"><strong><?php esc_html_e( 'Select Image Size:', 'education-care' ); ?></strong></label>
	            <?php
	            $this->dropdown_image_sizes( array(
	                'id'       => $this->get_field_id( 'featured_image' ),
	                'name'     => $this->get_field_name( 'featured_image' ),
	                'selected' => esc_attr( $instance['featured_image'] ),
	                )
	            );
	            ?>
	        </p>
	        <?php
	    }

	    function dropdown_post_columns( $args ) {
			$defaults = array(
		        'id'       => '',
		        'name'     => '',
		        'selected' => 0,
			);

			$r = wp_parse_args( $args, $defaults );
			$output = '';

			$choices = array(
				'2' => 2,
				'3' => 3,
				'4' => 4,
			);

			if ( ! empty( $choices ) ) {

				$output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "'>\n";
				foreach ( $choices as $key => $choice ) {
					$output .= '<option value="' . esc_attr( $key ) . '" ';
					$output .= selected( $r['selected'], $key, false );
					$output .= '>' . esc_html( $choice ) . '</option>\n';
				}
				$output .= "</select>\n";
			}

			echo $output;
	    }

	    function dropdown_image_sizes( $args ) {
	        $defaults = array(
	            'id'       => '',
	            'class'    => 'widefat',
	            'name'     => '',
	            'selected' => 0,
	        );

	        $r = wp_parse_args( $args, $defaults );
	        $output = '';

	        $choices = array(
	            'education-care-custom' 	=> esc_html__( 'Education Care Custom', 'education-care' ),
	            'thumbnail'         		=> esc_html__( 'Thumbnail', 'education-care' ),
	            'medium'            		=> esc_html__( 'Medium', 'education-care' ),
	            'large'             		=> esc_html__( 'Large', 'education-care' ),
	            'full'              		=> esc_html__( 'Full', 'education-care' ),
	        );

	        if ( ! empty( $choices ) ) {

	            $output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "' class='" . esc_attr( $r['class'] ) . "'>\n";
	            foreach ( $choices as $key => $choice ) {
	                $output .= '<option value="' . esc_attr( $key ) . '" ';
	                $output .= selected( $r['selected'], $key, false );
	                $output .= '>' . esc_html( $choice ) . '</option>\n';
	            }
	            $output .= "</select>\n";
	        }

	        echo $output;
	    }

	}

endif;