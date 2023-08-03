<?php
/**
 * Testimonial post/page widget
 *
 * @package enlighten lite
 */
/**
 * Adds enlighten_Testimonial widget.
 */
 if(!function_exists('enlighten_register_recent_news_widget')){
add_action('widgets_init', 'enlighten_register_recent_news_widget');

function enlighten_register_recent_news_widget() {
    register_widget('enlighten_recent_news');
}
}
if(!class_exists('enlighten_recent_news')){
class enlighten_recent_news extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'enlighten_recent_news', esc_html__('Enlighten : Recent News','enlighten'), array(
            'description' => esc_html__('A widget that shows Recent News', 'enlighten')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $categories_list = enlighten_category_list();
        $fields = array(
            // This widget has no title
            // Other fields
            'recent_news_title' => array(
                'enlighten_widgets_name' => 'recent_news_title',
                'enlighten_widgets_title' => esc_html__('Recent News Title', 'enlighten'),
                'enlighten_widgets_field_type' => 'text',
            ),
            'recent_news_cat' => array(
                'enlighten_widgets_name' => 'recent_news_cat',
                'enlighten_widgets_title' => esc_html__('Recent News Category', 'enlighten'),
                'enlighten_widgets_field_type' => 'select',
                'enlighten_widgets_field_options' => $categories_list
            ),
            'recent_news_posts' => array(
                'enlighten_widgets_name' => 'recent_news_posts',
                'enlighten_widgets_title' => esc_html__('Post To Display', 'enlighten'),
                'enlighten_widgets_field_type' => 'number',
            ),
            'recent_news_excerpt_content' => array(
                'enlighten_widgets_name' => 'recent_news_excerpt_content',
                'enlighten_widgets_title' => esc_html__('Excerpt Content', 'enlighten'),
                'enlighten_widgets_field_type' => 'number',
            ),
            'recent_news_image' => array(
                'enlighten_widgets_name' => 'recent_news_image',
                'enlighten_widgets_title' => esc_html__('Hide Image', 'enlighten'),
                'enlighten_widgets_field_type' => 'checkbox',
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
            $enlighten_news_title = $instance['recent_news_title'];
            $enlighten_news_cat = $instance['recent_news_cat'];
            $enlighten_recent_news_posts = $instance['recent_news_posts'];
            $enlighten_excerpt_content = $instance['recent_news_excerpt_content'];
            if($enlighten_excerpt_content == ''){$enlighten_excerpt_content = '20';}
            $enlighten_image_hide = $instance['recent_news_image'];
        ?>

        <div class="footer_RN_wrap">
            <?php if($enlighten_news_title){ ?>
                <div class="rn_title">
                    <?php echo esc_attr($enlighten_news_title); ?>
                     <div class="faq_dot"></div>
                </div>
               
            <?php } ?>
            <?php if($enlighten_news_cat){ ?>
            <div class="rn_post_wrap <?php if($enlighten_image_hide){echo 'no_image';} ?>">
                <?php
                    $enlighten_rn_args = array(
                        'post_type' => 'post',
                        'cat' => $enlighten_news_cat,
                        'order' => 'DESC',
                        'posts_per_page' => $enlighten_recent_news_posts
                    );
                    $enlighten_rn_query = new WP_Query($enlighten_rn_args);
                    if($enlighten_rn_query->have_posts()):
                        while($enlighten_rn_query->have_posts()):
                            $enlighten_rn_query->the_post();
                            ?>
                                <div class="rn_post_loop">
                                    <?php if($enlighten_image_hide == ''){ ?>
                                    <?php 
                                        $enlighten_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'enlighten-footer-recent-news');
                                        $enlighten_image = $enlighten_image_url['0'];
                                    ?>
                                        <?php if($enlighten_image){ ?>
                                            <div class="rn_image"><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($enlighten_image); ?>" /></a></div>
                                        <?php } ?>
                                    <?php } ?>
                                    <div class="title_content_wrap">
                                        <?php if(get_the_title()){ ?>
                                            <div class="tn_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <?php } ?>
                                        <?php if(get_the_content()){ ?>
                                            <div class="rn_content">
                                                <?php echo wp_kses_post(wp_trim_words(get_the_content(),$enlighten_excerpt_content,'...')); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
            <?php } ?>
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