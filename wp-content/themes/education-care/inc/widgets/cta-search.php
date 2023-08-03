<?php
/**
 * Call to action widget with search form
 *
 * @package Education_Care
 */

if ( ! class_exists( 'Education_Care_CTA_Search_Widget' ) ) :

	/**
	 * CTA widget class.
	 *
	 * @since 1.0.0
	 */
	class Education_Care_CTA_Search_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'education-care-cta-search',
				'description' => esc_html__( 'Call to action widget with search form', 'education-care' ),
			);
			parent::__construct( 'call-to-action-search', esc_html__( 'EC: CTA and Search', 'education-care' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {
			$title       	= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$main_text 		= ! empty( $instance['main_text'] ) ? esc_html( $instance['main_text'] ) : '';
			$main_content 	= ! empty( $instance['main_content'] ) ? esc_html( $instance['main_content'] ) : '';
			$bg_pic  	 	= ! empty( $instance['bg_pic'] ) ? esc_url( $instance['bg_pic'] ) : '';
			$show_search    = ! empty( $instance['show_search'] ) ? $instance['show_search'] : 0;

			// Add background image.
			$background_style = '';
			$widget_class     = '';
			
			if ( ! empty( $bg_pic ) ) {
				
				$background_style .= 'style="background: url('.esc_url( $bg_pic ).') top center no-repeat; background-size: cover;background-attachment: fixed;"';

				$widget_class = 'with-bg';
			}

			echo $args['before_widget']; ?>

			<section id="education-find-course" class="education-find-course-section overlay-area <?php echo $widget_class; ?>" <?php echo $background_style; ?>>

				<div id="find-courses" class="find-course-wrapper">

				<div class="container">

					<?php

					if ( ! empty( $title ) ) {
						echo '<span>'.esc_html( $title ).'</span>';
					} 

					if ( ! empty( $main_text ) ) {
						echo '<h2>'.esc_html( $main_text ).'</h2>';
					}  

					if ( ! empty( $main_content ) ) {
						echo '<p>'.esc_html( $main_content ).'</p>';
					}  

					if ( 1 == $show_search ) :  
						get_search_form();
					endif; ?>

				</div>

				</div>

			</section><!-- #education-find-course -->

			<?php
			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['title'] 			= sanitize_text_field( $new_instance['title'] );
			$instance['main_text'] 		= sanitize_text_field( $new_instance['main_text'] );
			$instance['main_content'] 	= sanitize_text_field( $new_instance['main_content'] );
			$instance['bg_pic']  	 	= esc_url_raw( $new_instance['bg_pic'] );
			$instance['show_search']    = (bool) $new_instance['show_search'] ? 1 : 0;

			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array(
				'title'       => '',
				'main_text'   => '',
				'main_content'=> '',
				'bg_pic'      => '',
				'show_search' => 1,
			) );

			$bg_pic = '';

            if ( ! empty( $instance['bg_pic'] ) ) {

                $bg_pic = $instance['bg_pic'];

            }

            $wrap_style = '';

            if ( empty( $bg_pic ) ) {

                $wrap_style = ' style="display:none;" ';
            }

            $image_status = false;

            if ( ! empty( $bg_pic ) ) {
                $image_status = true;
            }

            $delete_button = 'display:none;';

            if ( true === $image_status ) {
                $delete_button = 'display:inline-block;';
            }
			?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'education-care' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'main_text' ) ); ?>"><strong><?php esc_html_e( 'Main Text:', 'education-care' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'main_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'main_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['main_text'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'main_content' ) ); ?>"><strong><?php esc_html_e( 'Content:', 'education-care' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'main_content' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'main_content' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['main_content'] ); ?>" />
			</p>

			<div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>">
                    <strong><?php esc_html_e( 'Background Image:', 'education-care' ); ?></strong>
                </label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'bg_pic' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>" value="<?php echo esc_url( $instance['bg_pic'] ); ?>" />
                <div class="ec-preview-wrap" <?php echo $wrap_style; ?>>
                    <img src="<?php echo esc_url( $bg_pic ); ?>" alt="<?php esc_attr_e( 'Preview', 'education-care' ); ?>" />
                </div><!-- .rtam-preview-wrap -->
                <input type="button" class="select-img button button-primary" value="<?php esc_html_e( 'Upload', 'education-care' ); ?>" data-uploader_title="<?php esc_html_e( 'Select Background Image', 'education-care' ); ?>" data-uploader_main_text="<?php esc_html_e( 'Choose Image', 'education-care' ); ?>" />
                <input type="button" value="<?php echo esc_attr_x( 'X', 'Remove Button', 'education-care' ); ?>" class="button button-secondary btn-image-remove" style="<?php echo esc_attr( $delete_button ); ?>" />
            </div>

            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance['show_search'] ); ?> id="<?php echo $this->get_field_id( 'show_search' ); ?>" name="<?php echo $this->get_field_name( 'show_search' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'show_search' ); ?>"><?php esc_html_e( 'Show Search Form', 'education-care' ); ?></label>
            </p>
		<?php
		} 
	
	}

endif;