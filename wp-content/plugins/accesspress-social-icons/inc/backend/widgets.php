<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php 
/**
 * Adds Foo_Widget widget.
 */
class APS_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'apsi_widget', // Base ID
			__('AccessPress Social Icons', 'accesspress-social-icons'), // Name
			array( 'description' => __( 'AccessPress Social Icon Widget', 'accesspress-social-icons' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	
     	        echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		if($instance['si_id']!='')
        {
            $si_id = $instance['si_id'];
            echo do_shortcode('[aps-social id="'.$si_id.'"]');
        }
        echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	   	if ( isset( $instance[ 'title' ] ) ) {
		  	$title = $instance[ 'title' ];
		}
        else {
			$title = '';
		}
        if(isset($instance['si_id']))
        {
            $si_id = $instance['si_id'];
        }
        else
        {
            $si_id = '';
        }
		global $wpdb; 
      $table_name = $table_name = $wpdb->prefix . "aps_social_icons";
      $icon_sets = $wpdb->get_results("SELECT * FROM $table_name");
		?>
		<p>
        
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'accesspress-social-icons'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p>
          <label for="<?php echo $this->get_field_id('si_id');?>"><?php _e('Icon set','accesspress-social-icons')?></label>
          <select name="<?php echo $this->get_field_name('si_id');?>" id="<?php echo $this->get_field_id('si_id');?>" class="widefat">
            <option value=""><?php _e('Choose Icon Set','accesspress-social-icons');?></option>
            <?php foreach($icon_sets as $icon_set){
                ?>
                <option value="<?php echo $icon_set->si_id;?>" <?php if($si_id==$icon_set->si_id){?>selected="selected"<?php }?>><?php echo $icon_set->icon_set_name;?></option>
                <?php 
            }?>
          </select>
        </p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
	   //die(print_r($new_instance));
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['si_id'] = (!empty($new_instance['si_id']))?$new_instance['si_id']:'';    
		return $instance;
	}
    

} // class Foo_Widget
//function register_foo_widget() {
//    register_widget( 'Foo_Widget' );
//}
//add_action( 'widgets_init', 'register_foo_widget' );
?>