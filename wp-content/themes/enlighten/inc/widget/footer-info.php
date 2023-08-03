<?php
/**
 * Testimonial post/page widget
 *
 * @package enlighten lite
 */
/**
 * Adds enlighten_Testimonial widget.
 */
 if(!function_exists('enlighten_register_info_widget')){
add_action('widgets_init', 'enlighten_register_info_widget');

function enlighten_register_info_widget() {
    register_widget('enlighten_info');
}
}
if(!class_exists('enlighten_info')){
class enlighten_info extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'enlighten_info', esc_html__('Enlighten : Footer Info','enlighten'), array(
            'description' => esc_html__('A widget that shows information', 'enlighten')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            // This widget has no title
            // Other fields
            'title_info' => array(
                'enlighten_widgets_name' => 'title_info',
                'enlighten_widgets_title' => esc_html__('Info Title', 'enlighten'),
                'enlighten_widgets_field_type' => 'text',
            ),
            'location' => array(
                'enlighten_widgets_name' => 'location',
                'enlighten_widgets_title' => esc_html__('Location', 'enlighten'),
                'enlighten_widgets_field_type' => 'text',
            ),
            'phone' => array(
                'enlighten_widgets_name' => 'phone',
                'enlighten_widgets_title' => esc_html__('Phone', 'enlighten'),
                'enlighten_widgets_field_type' => 'text',
            ),
            'fax' => array(
                'enlighten_widgets_name' => 'fax',
                'enlighten_widgets_title' => esc_html__('Fax', 'enlighten'),
                'enlighten_widgets_field_type' => 'text',
            ),
            'email' => array(
                'enlighten_widgets_name' => 'email',
                'enlighten_widgets_title' => esc_html__('Email', 'enlighten'),
                'enlighten_widgets_field_type' => 'text',
            ),
            
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        echo $before_widget;
        if($instance){
            $enlighten_title_info = $instance['title_info'];
            $enlighten_location = $instance['location'];
            $enlighten_phome = $instance['phone'];
            $enlighten_fax = $instance['fax'];
            $enlighten_email = $instance['email'];
            ?>
                <div class="footer_info_wrap">
                    <?php if($enlighten_title_info){ ?>
                        <div class="footer_widget_title">
                            <?php echo esc_attr($enlighten_title_info); ?>
                            <div class="faq_dot"></div>
                        </div>
                        
                    <?php } ?>
                    <div class="info_wrap">
                        <?php if($enlighten_location){ ?>
                            <div class="location_info">
                                <span class="fa_icon_info"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                <span class="location"><?php echo esc_attr($enlighten_location); ?></span>
                            </div>
                        <?php } ?>
                        <?php if($enlighten_phome){ ?>
                            <div class="phone_info">
                                <span class="fa_icon_info"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <span class="phone"><?php echo esc_attr($enlighten_phome); ?></span>
                            </div>
                        <?php } ?>
                        <?php if($enlighten_fax){ ?>
                            <div class="fax_info">
                                <span class="fa_icon_info"><i class="fa fa-fax" aria-hidden="true"></i></span>
                                <span class="fax"><?php echo esc_attr($enlighten_fax); ?></span>
                            </div>
                        <?php } ?>
                        <?php if($enlighten_email){ ?>
                            <div class="email_info">
                                <span class="fa_icon_info"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                <span class="email"><?php echo esc_attr($enlighten_email); ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
        <?php
        }
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	enlighten_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$enlighten_widgets_name] = enlighten_widgets_updated_field_value($widget_field, $new_instance[$enlighten_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	enlighten_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $enlighten_widgets_field_value = !empty($instance[$enlighten_widgets_name]) ? esc_attr($instance[$enlighten_widgets_name]) : '';
            enlighten_widgets_show_widget_field($this, $widget_field, $enlighten_widgets_field_value);
        }
    }

}
}