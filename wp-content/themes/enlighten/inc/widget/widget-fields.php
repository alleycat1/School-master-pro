<?php

/**
 * @package Enlighten
 */
function enlighten_widgets_show_widget_field($instance = '', $widget_field = '', $athm_field_value = '') {
    // Store Posts in array
    $enlighten_postlist[0] = array(
        'value' => 0,
        'label' => esc_html__('--choose--','enlighten')
    );
    $arg = array('posts_per_page' => -1);
    $enlighten_posts = get_posts($arg);
    foreach ($enlighten_posts as $enlighten_post) :
        $enlighten_postlist[$enlighten_post->ID] = array(
            'value' => $enlighten_post->ID,
            'label' => $enlighten_post->post_title
        );
    endforeach;

    extract($widget_field);

    switch ($enlighten_widgets_field_type) {

        // Standard text field
        case 'text' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>"><?php echo wp_kses_post($enlighten_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($enlighten_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value); ?>" />

                <?php if (isset($enlighten_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($enlighten_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Standard url field
        case 'url' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>"><?php echo wp_kses_post($enlighten_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($enlighten_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value); ?>" />

                <?php if (isset($enlighten_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($enlighten_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Textarea field
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>"><?php echo wp_kses_post($enlighten_widgets_title); ?>:</label>
                <textarea class="widefat" rows="<?php echo $enlighten_widgets_row; ?>" id="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($enlighten_widgets_name)); ?>"><?php echo wp_kses_post($athm_field_value); ?></textarea>
            </p>
            <?php
            break;

        // Checkbox field
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($enlighten_widgets_name)); ?>" type="checkbox" value="1" <?php checked('1', $athm_field_value); ?>/>
                <label for="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>"><?php echo wp_kses_post($enlighten_widgets_title); ?></label>

                <?php if (isset($enlighten_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($enlighten_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Radio fields
        case 'radio' :
            ?>
            <p>
                <?php
                echo wp_kses_post($enlighten_widgets_title);
                echo '<br />';
                foreach ($enlighten_widgets_field_options as $athm_option_name => $athm_option_title) {
                    ?>
                    <input id="<?php echo esc_attr($instance->get_field_id($athm_option_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($enlighten_widgets_name)); ?>" type="radio" value="<?php echo esc_attr($athm_option_name); ?>" <?php checked($athm_option_name, $athm_field_value); ?> />
                    <label for="<?php echo esc_attr($instance->get_field_id($athm_option_name)); ?>"><?php echo wp_kses_post($athm_option_title); ?></label>
                    <br />
                <?php } ?>

                <?php if (isset($enlighten_widgets_description)) { ?>
                    <small><?php echo wp_kses_post($enlighten_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>"><?php echo wp_kses_post($enlighten_widgets_title); ?>:</label>
                <select name="<?php echo esc_attr($instance->get_field_name($enlighten_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>" class="widefat">
                    <?php foreach ($enlighten_widgets_field_options as $athm_option_name => $athm_option_title) { ?>
                        <option value="<?php echo esc_attr($athm_option_name); ?>" id="<?php echo esc_attr($instance->get_field_id($athm_option_name)); ?>" <?php selected($athm_option_name, $athm_field_value); ?>><?php echo wp_kses_post($athm_option_title); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($enlighten_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($enlighten_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'number' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>"><?php echo wp_kses_post($enlighten_widgets_title); ?>:</label><br />
                <input name="<?php echo esc_attr($instance->get_field_name($enlighten_widgets_name)); ?>" type="number" step="1" min="1" id="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>" value="<?php echo wp_kses_post($athm_field_value); ?>" class="small-text" />

                <?php if (isset($enlighten_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($enlighten_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'selectpost' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>"><?php echo wp_kses_post($enlighten_widgets_title); ?>:</label>
                <select name="<?php echo esc_attr($instance->get_field_name($enlighten_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>" class="widefat">
                    <?php foreach ($enlighten_postlist as $enlighten_single_post) { ?>
                        <option value="<?php echo esc_attr($enlighten_single_post['value']); ?>" id="<?php echo esc_attr($instance->get_field_id($enlighten_single_post['label'])); ?>" <?php selected($enlighten_single_post['value'], $athm_field_value); ?>><?php echo wp_kses_post($enlighten_single_post['label']); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($enlighten_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($enlighten_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'upload' :

            $output = '';
            $id = esc_attr($instance->get_field_id($enlighten_widgets_name));
            $class = '';
            $int = '';
            $value = $athm_field_value;
            $name = esc_attr($instance->get_field_name($enlighten_widgets_name));


            if ($value) {
                $class = ' has-file';
                $value = explode('wp-content',$value);
                $value = content_url().$value[1];
            }
            $output .= '<div class="sub-option widget-upload">';
            $output .= '<label for="' . $instance->get_field_id($enlighten_widgets_name) . '">' . $enlighten_widgets_title . '</label><br/>';
            $output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="' . $name . '" value="' . $value . '" placeholder="' . esc_attr__('No file chosen', 'enlighten') . '" />' . "\n";
            if (function_exists('wp_enqueue_media')) {
                    $output .= '<input id="upload-' . $id . '" class="upload-button button" type="button" value="' . esc_attr__('Upload', 'enlighten') . '" />' . "\n";
            } else {
                $output .= '<p><i>' . esc_attr__('Upgrade your version of WordPress for full media support.', 'enlighten') . '</i></p>';
            }

            $output .= '<div class="screenshot team-thumb" id="' . $id . '-image">' . "\n";

            if ($value != '') {
                $remove = '<a class="remove-image">'. esc_attr__('Remove', 'enlighten').'</a>';
                $attachment_id = attachment_url_to_postid($value);
                $image_array = wp_get_attachment_image_src($attachment_id, 'medium');
                $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value);
                if ($image) {
                    $output .= '<img width="276px" src="' . esc_url($image_array[0]) . '" alt="" />' . $remove;
                } else {
                    $parts = explode("/", $value);
                    for ($i = 0; $i < sizeof($parts); ++$i) {
                        $title = $parts[$i];
                    }

                    // No output preview if it's not an image.
                    $output .= '';

                    // Standard generic output if it's not an image.
                    $title = esc_attr__('View File', 'enlighten');
                    $output .= '<div class="no-image"><span class="file_link"><a href="' . esc_url($value) . '" target="_blank" rel="external">' . esc_attr($title) . '</a></span></div>';
                }
            }
            $output .= '</div></div>' . "\n";
            echo $output;
            break;

        case 'icon' :
            add_thickbox();
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>"><?php echo wp_kses_post($enlighten_widgets_title); ?>:</label><br />
                <span class="icon-receiver"><i class="<?php echo esc_attr($athm_field_value); ?>"></i></span>
                <input class="hidden-icon-input" name="<?php echo esc_attr($instance->get_field_name($enlighten_widgets_name)); ?>" type="hidden" id="<?php echo esc_attr($instance->get_field_id($enlighten_widgets_name)); ?>" value="<?php echo esc_attr($athm_field_value); ?>" />

                <?php if (isset($enlighten_widgets_description)) { ?>
                    <br />
                    <small><?php echo wp_kses_post($enlighten_widgets_description); ?></small>
                <?php } ?>
            </p>

            <div id="ap-font-awesome-list">
                <ul class="ap-font-group">
                    <li><i class="fa fa-glass"></i></li>
                    <li><i class="fa fa-music"></i> </li>
                    <li><i class="fa fa-search"></i></li>
                    <li><i class="fa fa-envelope-o"></i> </li>
                    <li><i class="fa fa-heart"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star-o"></i></li>
                    <li><i class="fa fa-user"></i> </li>
                    <li><i class="fa fa-film"></i> </li>
                    <li><i class="fa fa-th-large"></i> </li>
                    <li><i class="fa fa-th"></i> </li>
                    <li><i class="fa fa-th-list"></i> </li>
                    <li><i class="fa fa-check"></i> </li>
                    <li><i class="fa fa-times"></i></li>
                    <li><i class="fa fa-search-plus"></i></li>
                    <li><i class="fa fa-search-minus"></i></li>
                    <li><i class="fa fa-power-off"></i> </li>
                    <li><i class="fa fa-signal"></i> </li>
                    <li><i class="fa fa-cog"></i></li>
                    <li><i class="fa fa-trash-o"></i></li>
                    <li><i class="fa fa-home"></i></li>
                    <li><i class="fa fa-file-o"></i> </li>
                    <li><i class="fa fa-clock-o"></i> </li>
                    <li><i class="fa fa-road"></i> </li>
                    <li><i class="fa fa-download"></i></li>
                    <li><i class="fa fa-arrow-circle-o-down"></i></li>
                    <li><i class="fa fa-arrow-circle-o-up"></i> </li>
                    <li><i class="fa fa-inbox"></i></li>
                    <li><i class="fa fa-play-circle-o"></i> </li>
                    <li><i class="fa fa-repeat"></i> </li>
                    <li><i class="fa fa-refresh"></i> </li>
                    <li><i class="fa fa-list-alt"></i> </li>
                    <li><i class="fa fa-lock"></i> </li>
                    <li><i class="fa fa-flag"></i> </li>
                    <li><i class="fa fa-headphones"></i> </li>
                    <li><i class="fa fa-volume-off"></i> </li>
                    <li><i class="fa fa-volume-down"></i> </li>
                    <li><i class="fa fa-volume-up"></i> </li>
                    <li><i class="fa fa-qrcode"></i></li>
                    <li><i class="fa fa-barcode"></i></li>
                    <li><i class="fa fa-tag"></i> </li>
                    <li><i class="fa fa-tags"></i> </li>
                    <li><i class="fa fa-book"></i> </li>
                    <li><i class="fa fa-bookmark"></i></li>
                    <li><i class="fa fa-print"></i> </li>
                    <li><i class="fa fa-camera"></i> </li>
                    <li><i class="fa fa-font"></i> </li>
                    <li><i class="fa fa-bold"></i> </li>
                    <li><i class="fa fa-italic"></i> </li>
                    <li><i class="fa fa-text-height"></i> </li>
                    <li><i class="fa fa-text-width"></i></li>
                    <li><i class="fa fa-align-left"></i> </li>
                    <li><i class="fa fa-align-center"></i></li>
                    <li><i class="fa fa-align-right"></i> </li>
                    <li><i class="fa fa-align-justify"></i></li>
                    <li><i class="fa fa-list"></i></li>
                    <li><i class="fa fa-outdent"></i></li>
                    <li><i class="fa fa-indent"></i></li>
                    <li><i class="fa fa-video-camera"></i> </li>
                    <li><i class="fa fa-picture-o"></i></li>
                    <li><i class="fa fa-pencil"></i> </li>
                    <li><i class="fa fa-map-marker"></i> </li>
                    <li><i class="fa fa-adjust"></i> </li>
                    <li><i class="fa fa-tint"></i> </li>
                    <li><i class="fa fa-pencil-square-o"></i></li>
                    <li><i class="fa fa-share-square-o"></i> </li>
                    <li><i class="fa fa-check-square-o"></i> </li>
                    <li><i class="fa fa-arrows"></i> </li>
                    <li><i class="fa fa-step-backward"></i> </li>
                    <li><i class="fa fa-fast-backward"></i></li>
                    <li><i class="fa fa-backward"></i> </li>
                    <li><i class="fa fa-play"></i></li>
                    <li><i class="fa fa-pause"></i> </li>
                    <li><i class="fa fa-stop"></i> </li>
                    <li><i class="fa fa-forward"></i> </li>
                    <li><i class="fa fa-fast-forward"></i> </li>
                    <li><i class="fa fa-step-forward"></i></li>
                    <li><i class="fa fa-eject"></i> </li>
                    <li><i class="fa fa-chevron-left"></i> </li>
                    <li><i class="fa fa-chevron-right"></i> </li>
                    <li><i class="fa fa-plus-circle"></i></li>
                    <li><i class="fa fa-minus-circle"></i></li>
                    <li><i class="fa fa-times-circle"></i> </li>
                    <li><i class="fa fa-check-circle"></i> </li>
                    <li><i class="fa fa-question-circle"></i></li> 
                    <li><i class="fa fa-info-circle"></i> </li>
                    <li><i class="fa fa-crosshairs"></i></li>
                    <li><i class="fa fa-times-circle-o"></i> </li>
                    <li><i class="fa fa-check-circle-o"></i> </li>
                    <li><i class="fa fa-ban"></i> </li>
                    <li><i class="fa fa-arrow-left"></i> </li>
                    <li><i class="fa fa-arrow-right"></i> </li>
                    <li><i class="fa fa-arrow-up"></i></li> 
                    <li><i class="fa fa-arrow-down"></i> </li>
                    <li><i class="fa fa-share"></i> </li>
                    <li><i class="fa fa-expand"></i> </li>
                    <li><i class="fa fa-compress"></i> </li>
                    <li><i class="fa fa-plus"></i> </li>
                    <li><i class="fa fa-minus"></i></li>
                    <li><i class="fa fa-asterisk"></i></li>
                    <li><i class="fa fa-exclamation-circle"></i> </li>
                    <li><i class="fa fa-gift"></i> </li>
                    <li><i class="fa fa-leaf"></i> </li>
                    <li><i class="fa fa-fire"></i> </li>
                    <li><i class="fa fa-eye"></i> </li>
                    <li><i class="fa fa-eye-slash"></i> </li>
                    <li><i class="fa fa-exclamation-triangle"></i> </li>
                    <li><i class="fa fa-plane"></i> </li>
                    <li><i class="fa fa-calendar"></i> </li>
                    <li><i class="fa fa-random"></i></li>
                    <li><i class="fa fa-comment"></i> </li>
                    <li><i class="fa fa-magnet"></i></li>
                    <li><i class="fa fa-chevron-up"></i> </li>
                    <li><i class="fa fa-chevron-down"></i> </li>
                    <li><i class="fa fa-retweet"></i> </li>
                    <li><i class="fa fa-shopping-cart"></i> </li>
                    <li><i class="fa fa-folder"></i> </li>
                    <li><i class="fa fa-folder-open"></i> </li>
                    <li><i class="fa fa-arrows-v"></i> </li>
                    <li><i class="fa fa-arrows-h"></i> </li>
                    <li><i class="fa fa-bar-chart"></i></li>
                    <li><i class="fa fa-twitter-square"></i> </li>
                    <li><i class="fa fa-facebook-square"></i> </li>
                    <li><i class="fa fa-camera-retro"></i> </li>
                    <li><i class="fa fa-key"></i> </li>
                    <li><i class="fa fa-cogs"></i> </li>
                    <li><i class="fa fa-comments"></i> </li>
                    <li><i class="fa fa-thumbs-o-up"></i> </li>
                    <li><i class="fa fa-thumbs-o-down"></i> </li>
                    <li><i class="fa fa-star-half"></i></li>
                    <li><i class="fa fa-heart-o"></i></li>
                    <li><i class="fa fa-sign-out"></i></li>
                    <li><i class="fa fa-linkedin-square"></i> </li>
                    <li><i class="fa fa-thumb-tack"></i> </li>
                    <li><i class="fa fa-external-link"></i></li>
                    <li><i class="fa fa-sign-in"></i> </li>
                    <li><i class="fa fa-trophy"></i></li>
                    <li><i class="fa fa-github-square"></i></li>
                    <li><i class="fa fa-upload"></i> </li>
                    <li><i class="fa fa-lemon-o"></i> </li>
                    <li><i class="fa fa-phone"></i> </li>
                    <li><i class="fa fa-square-o"></i> </li>
                    <li><i class="fa fa-bookmark-o"></i> </li>
                    <li><i class="fa fa-phone-square"></i> </li>
                    <li><i class="fa fa-twitter"></i> </li>
                    <li><i class="fa fa-facebook"></i></li>
                    <li><i class="fa fa-github"></i> </li>
                    <li><i class="fa fa-unlock"></i> </li>
                    <li><i class="fa fa-credit-card"></i> </li>
                    <li><i class="fa fa-rss"></i></li>
                    <li><i class="fa fa-hdd-o"></i> </li>
                    <li><i class="fa fa-bullhorn"></i> </li>
                    <li><i class="fa fa-bell"></i></li>
                    <li><i class="fa fa-certificate"></i> </li>
                    <li><i class="fa fa-hand-o-right"></i> </li>
                    <li><i class="fa fa-hand-o-left"></i> </li>
                    <li><i class="fa fa-hand-o-up"></i></li>
                    <li><i class="fa fa-hand-o-down"></i></li>
                    <li><i class="fa fa-arrow-circle-left"></i></li>
                    <li><i class="fa fa-arrow-circle-right"></i> </li>
                    <li><i class="fa fa-arrow-circle-up"></i> </li>
                    <li><i class="fa fa-arrow-circle-down"></i> </li>
                    <li><i class="fa fa-globe"></i></li>
                    <li><i class="fa fa-wrench"></i> </li>
                    <li><i class="fa fa-tasks"></i> </li>
                    <li><i class="fa fa-filter"></i> </li>
                    <li><i class="fa fa-briefcase"></i></li>
                    <li><i class="fa fa-arrows-alt"></i></li>
                    <li><i class="fa fa-users"></i></li>
                    <li><i class="fa fa-link"></i></li>
                    <li><i class="fa fa-cloud"></i> </li>
                    <li><i class="fa fa-flask"></i> </li>
                    <li><i class="fa fa-scissors"></i></li>
                    <li><i class="fa fa-files-o"></i></li>
                    <li><i class="fa fa-paperclip"></i></li>
                    <li><i class="fa fa-floppy-o"></i></li>
                    <li><i class="fa fa-square"></i></li>
                    <li><i class="fa fa-bars"></i></li>
                    <li><i class="fa fa-list-ul"></i> </li>
                    <li><i class="fa fa-list-ol"></i> </li>
                    <li><i class="fa fa-strikethrough"></i> </li>
                    <li><i class="fa fa-underline"></i></li>
                    <li><i class="fa fa-table"></i> </li>
                    <li><i class="fa fa-magic"></i> </li>
                    <li><i class="fa fa-truck"></i> </li>
                    <li><i class="fa fa-pinterest"></i> </li>
                    <li><i class="fa fa-pinterest-square"></i></li>
                    <li><i class="fa fa-google-plus-square"></i></li>
                    <li><i class="fa fa-google-plus"></i> </li>
                    <li><i class="fa fa-money"></i> </li>
                    <li><i class="fa fa-caret-down"></i> </li>
                    <li><i class="fa fa-caret-up"></i></li>
                    <li><i class="fa fa-caret-left"></i></li>
                    <li><i class="fa fa-caret-right"></i> </li>
                    <li><i class="fa fa-columns"></i></li>
                    <li><i class="fa fa-sort"></i> </li>
                    <li><i class="fa fa-sort-desc"></i> </li>
                    <li><i class="fa fa-sort-asc"></i> </li>
                    <li><i class="fa fa-envelope"></i> </li>
                    <li><i class="fa fa-linkedin"></i> </li>
                    <li><i class="fa fa-undo"></i> </li>
                    <li><i class="fa fa-gavel"></i> </li>
                    <li><i class="fa fa-tachometer"></i></li>
                    <li><i class="fa fa-comment-o"></i> </li>
                    <li><i class="fa fa-comments-o"></i> </li>
                    <li><i class="fa fa-bolt"></i></li>
                    <li><i class="fa fa-sitemap"></i> </li>
                    <li><i class="fa fa-umbrella"></i> </li>
                    <li><i class="fa fa-clipboard"></i> </li>
                    <li><i class="fa fa-lightbulb-o"></i> </li>
                    <li><i class="fa fa-exchange"></i> </li>
                    <li><i class="fa fa-cloud-download"></i> </li>
                    <li><i class="fa fa-cloud-upload"></i> </li>
                    <li><i class="fa fa-user-md"></i></li>
                    <li><i class="fa fa-stethoscope"></i> </li>
                    <li><i class="fa fa-suitcase"></i></li>
                    <li><i class="fa fa-bell-o"></i></li>
                    <li><i class="fa fa-coffee"></i> </li>
                    <li><i class="fa fa-cutlery"></i> </li>
                    <li><i class="fa fa-file-text-o"></i></li>
                    <li><i class="fa fa-building-o"></i></li>
                    <li><i class="fa fa-hospital-o"></i> </li>
                    <li><i class="fa fa-ambulance"></i> </li>
                    <li><i class="fa fa-medkit"></i></li>
                    <li><i class="fa fa-fighter-jet"></i> </li>
                    <li><i class="fa fa-beer"></i> </li>
                    <li><i class="fa fa-h-square"></i></li> 
                    <li><i class="fa fa-plus-square"></i> </li>
                    <li><i class="fa fa-angle-double-left"></i> </li>
                    <li><i class="fa fa-angle-double-right"></i> </li>
                    <li><i class="fa fa-angle-double-up"></i> </li>
                    <li><i class="fa fa-angle-double-down"></i> </li>
                    <li><i class="fa fa-angle-left"></i></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li><i class="fa fa-angle-up"></i> </li>
                    <li><i class="fa fa-angle-down"></i> </li>
                    <li><i class="fa fa-desktop"></i></li>
                    <li><i class="fa fa-laptop"></i> </li>
                    <li><i class="fa fa-tablet"></i></li>
                    <li><i class="fa fa-mobile"></i> </li>
                    <li><i class="fa fa-circle-o"></i></li> 
                    <li><i class="fa fa-quote-left"></i></li>
                    <li><i class="fa fa-quote-right"></i> </li>
                    <li><i class="fa fa-spinner"></i> </li>
                    <li><i class="fa fa-circle"></i> </li>
                    <li><i class="fa fa-reply"></i></li> 
                    <li><i class="fa fa-github-alt"></i> </li>
                    <li><i class="fa fa-folder-o"></i></li>
                    <li><i class="fa fa-folder-open-o"></i></li> 
                    <li><i class="fa fa-smile-o"></i></li>
                    <li><i class="fa fa-frown-o"></i></li> 
                    <li><i class="fa fa-meh-o"></i></li>
                    <li><i class="fa fa-gamepad"></i></li>
                    <li><i class="fa fa-keyboard-o"></i> </li>
                    <li><i class="fa fa-flag-o"></i></li>
                    <li><i class="fa fa-flag-checkered"></i> </li>
                    <li><i class="fa fa-terminal"></i> </li>
                    <li><i class="fa fa-code"></i> </li>
                    <li><i class="fa fa-reply-all"></i></li>
                    <li><i class="fa fa-star-half-o"></i></li>
                    <li><i class="fa fa-location-arrow"></i> </li>
                    <li><i class="fa fa-crop"></i></li>
                    <li><i class="fa fa-code-fork"></i> </li>
                    <li><i class="fa fa-chain-broken"></i></li>
                    <li><i class="fa fa-question"></i> </li>
                    <li><i class="fa fa-info"></i> </li>
                    <li><i class="fa fa-exclamation"></i> </li>
                    <li><i class="fa fa-superscript"></i> </li>
                    <li><i class="fa fa-subscript"></i> </li>
                    <li><i class="fa fa-eraser"></i></li>
                    <li><i class="fa fa-puzzle-piece"></i> </li>
                    <li><i class="fa fa-microphone"></i></li>
                    <li><i class="fa fa-microphone-slash"></i></li>
                    <li><i class="fa fa-shield"></i> </li>
                    <li><i class="fa fa-calendar-o"></i> </li>
                    <li><i class="fa fa-fire-extinguisher"></i></li>
                    <li><i class="fa fa-rocket"></i> </li>
                    <li><i class="fa fa-maxcdn"></i> </li>
                    <li><i class="fa fa-chevron-circle-left"></i></li>
                    <li><i class="fa fa-chevron-circle-right"></i> </li>
                    <li><i class="fa fa-chevron-circle-up"></i></li>
                    <li><i class="fa fa-chevron-circle-down"></i> </li>
                    <li><i class="fa fa-html5"></i> </li>
                    <li><i class="fa fa-css3"></i></li>
                    <li><i class="fa fa-anchor"></i> </li>
                    <li><i class="fa fa-unlock-alt"></i> </li>
                    <li><i class="fa fa-bullseye"></i> </li>
                    <li><i class="fa fa-ellipsis-h"></i> </li>
                    <li><i class="fa fa-ellipsis-v"></i> </li>
                    <li><i class="fa fa-rss-square"></i></li>
                    <li><i class="fa fa-play-circle"></i></li>
                    <li><i class="fa fa-ticket"></i> </li>
                    <li><i class="fa fa-minus-square"></i> </li>
                    <li><i class="fa fa-minus-square-o"></i></li>
                    <li><i class="fa fa-level-up"></i> </li>
                    <li><i class="fa fa-level-down"></i></li>
                    <li><i class="fa fa-check-square"></i> </li>
                    <li><i class="fa fa-pencil-square"></i> </li>
                    <li><i class="fa fa-external-link-square"></i></li>
                    <li><i class="fa fa-share-square"></i></li>
                    <li><i class="fa fa-compass"></i></li>
                    <li><i class="fa fa-caret-square-o-down"></i> </li>
                    <li><i class="fa fa-caret-square-o-up"></i></li>
                    <li><i class="fa fa-caret-square-o-right"></i> </li>
                    <li><i class="fa fa-eur"></i> </li>
                    <li><i class="fa fa-gbp"></i> </li>
                    <li><i class="fa fa-usd"></i> </li>
                    <li><i class="fa fa-inr"></i> </li>
                    <li><i class="fa fa-jpy"></i></li>
                    <li><i class="fa fa-rub"></i> </li>
                    <li><i class="fa fa-krw"></i></li>
                    <li><i class="fa fa-btc"></i> </li>
                    <li><i class="fa fa-file"></i> </li>
                    <li><i class="fa fa-file-text"></i></li>
                    <li><i class="fa fa-sort-alpha-asc"></i> </li>
                    <li><i class="fa fa-sort-alpha-desc"></i> </li>
                    <li><i class="fa fa-sort-amount-asc"></i> </li>
                    <li><i class="fa fa-sort-amount-desc"></i></li>
                    <li><i class="fa fa-sort-numeric-asc"></i></li>
                    <li><i class="fa fa-sort-numeric-desc"></i></li>
                    <li><i class="fa fa-thumbs-up"></i> </li>
                    <li><i class="fa fa-thumbs-down"></i> </li>
                    <li><i class="fa fa-youtube-square"></i> </li>
                    <li><i class="fa fa-youtube"></i></li>
                    <li><i class="fa fa-xing"></i></li>
                    <li><i class="fa fa-xing-square"></i> </li>
                    <li><i class="fa fa-youtube-play"></i></li>
                    <li><i class="fa fa-dropbox"></i></li>
                    <li><i class="fa fa-stack-overflow"></i> </li>
                    <li><i class="fa fa-instagram"></i></li>
                    <li><i class="fa fa-flickr"></i> </li>
                    <li><i class="fa fa-adn"></i></li>
                    <li><i class="fa fa-bitbucket"></i></li>
                    <li><i class="fa fa-bitbucket-square"></i> </li>
                    <li><i class="fa fa-tumblr"></i></li>
                    <li><i class="fa fa-tumblr-square"></i></li>
                    <li><i class="fa fa-long-arrow-down"></i></li>
                    <li><i class="fa fa-long-arrow-up"></i> </li>
                    <li><i class="fa fa-long-arrow-left"></i> </li>
                    <li><i class="fa fa-long-arrow-right"></i></li>
                    <li><i class="fa fa-apple"></i> </li>
                    <li><i class="fa fa-windows"></i></li>
                    <li><i class="fa fa-android"></i></li>
                    <li><i class="fa fa-linux"></i></li>
                    <li><i class="fa fa-dribbble"></i></li>
                    <li><i class="fa fa-skype"></i> </li>
                    <li><i class="fa fa-foursquare"></i> </li>
                    <li><i class="fa fa-trello"></i></li>
                    <li><i class="fa fa-female"></i> </li>
                    <li><i class="fa fa-male"></i></li>
                    <li><i class="fa fa-gittip"></i></li>
                    <li><i class="fa fa-sun-o"></i> </li>
                    <li><i class="fa fa-moon-o"></i></li>
                    <li><i class="fa fa-archive"></i> </li>
                    <li><i class="fa fa-bug"></i></li>
                    <li><i class="fa fa-vk"></i> </li>
                    <li><i class="fa fa-weibo"></i></li>
                    <li><i class="fa fa-renren"></i> </li>
                    <li><i class="fa fa-pagelines"></i></li>
                    <li><i class="fa fa-stack-exchange"></i> </li>
                    <li><i class="fa fa-arrow-circle-o-right"></i></li>
                    <li><i class="fa fa-arrow-circle-o-left"></i> </li>
                    <li><i class="fa fa-caret-square-o-left"></i></li>
                    <li><i class="fa fa-dot-circle-o"></i></li>
                    <li><i class="fa fa-wheelchair"></i></li>
                    <li><i class="fa fa-vimeo-square"></i></li>
                    <li><i class="fa fa-try"></i></li>
                    <li><i class="fa fa-plus-square-o"></i> </li>
                    <li><i class="fa fa-space-shuttle"></i> </li>
                    <li><i class="fa fa-slack"></i> </li>
                    <li><i class="fa fa-envelope-square"></i> </li>
                    <li><i class="fa fa-wordpress"></i></li>
                    <li><i class="fa fa-openid"></i></li>
                    <li><i class="fa fa-university"></i> </li>
                    <li><i class="fa fa-graduation-cap"></i> </li>
                    <li><i class="fa fa-yahoo"></i></li>
                    <li><i class="fa fa-google"></i></li>
                    <li><i class="fa fa-reddit"></i></li>
                    <li><i class="fa fa-reddit-square"></i></li>
                    <li><i class="fa fa-stumbleupon-circle"></i> </li>
                    <li><i class="fa fa-stumbleupon"></i></li>
                    <li><i class="fa fa-delicious"></i></li>
                    <li><i class="fa fa-digg"></i></li>
                    <li><i class="fa fa-pied-piper"></i></li>
                    <li><i class="fa fa-pied-piper-alt"></i></li>
                    <li><i class="fa fa-drupal"></i> </li>
                    <li><i class="fa fa-joomla"></i></li>
                    <li><i class="fa fa-language"></i></li>
                    <li><i class="fa fa-fax"></i></li>
                    <li><i class="fa fa-building"></i> </li>
                    <li><i class="fa fa-child"></i> </li>
                    <li><i class="fa fa-paw"></i> </li>
                    <li><i class="fa fa-spoon"></i> </li>
                    <li><i class="fa fa-cube"></i></li>
                    <li><i class="fa fa-cubes"></i></li> 
                    <li><i class="fa fa-behance"></i></li>
                    <li><i class="fa fa-behance-square"></i> </li>
                    <li><i class="fa fa-steam"></i></li>
                    <li><i class="fa fa-steam-square"></i></li>
                    <li><i class="fa fa-recycle"></i></li> 
                    <li><i class="fa fa-car"></i></li>
                    <li><i class="fa fa-taxi"></i> </li>
                    <li><i class="fa fa-tree"></i></li>
                    <li><i class="fa fa-spotify"></i> </li>
                    <li><i class="fa fa-deviantart"></i></li>
                    <li><i class="fa fa-soundcloud"></i> </li>
                    <li><i class="fa fa-database"></i> </li>
                    <li><i class="fa fa-file-pdf-o"></i> </li>
                    <li><i class="fa fa-file-word-o"></i></li>
                    <li><i class="fa fa-file-excel-o"></i> </li>
                    <li><i class="fa fa-file-powerpoint-o"></i></li>
                    <li><i class="fa fa-file-image-o"></i></li>
                    <li><i class="fa fa-file-archive-o"></i></li>
                    <li><i class="fa fa-file-audio-o"></i></li>
                    <li><i class="fa fa-file-video-o"></i> </li>
                    <li><i class="fa fa-file-code-o"></i></li>
                    <li><i class="fa fa-vine"></i></li>
                    <li><i class="fa fa-codepen"></i></li>
                    <li><i class="fa fa-jsfiddle"></i></li>
                    <li><i class="fa fa-life-ring"></i></li>
                    <li><i class="fa fa-circle-o-notch"></i></li>
                    <li><i class="fa fa-rebel"></i></li>
                    <li><i class="fa fa-empire"></i> </li>
                    <li><i class="fa fa-git-square"></i> </li>
                    <li><i class="fa fa-git"></i></li>
                    <li><i class="fa fa-hacker-news"></i></li>
                    <li><i class="fa fa-tencent-weibo"></i></li>
                    <li><i class="fa fa-qq"></i></li>
                    <li><i class="fa fa-weixin"></i></li>
                    <li><i class="fa fa-paper-plane"></i></li>
                    <li><i class="fa fa-paper-plane-o"></i></li>
                    <li><i class="fa fa-history"></i></li>
                    <li><i class="fa fa-circle-thin"></i></li>
                    <li><i class="fa fa-header"></i></li>
                    <li><i class="fa fa-paragraph"></i></li>
                    <li><i class="fa fa-sliders"></i></li>
                    <li><i class="fa fa-share-alt"></i></li>
                    <li><i class="fa fa-share-alt-square"></i></li>
                    <li><i class="fa fa-bomb"></i></li>
                    <li><i class="fa fa-futbol-o"></i></li>
                    <li><i class="fa fa-tty"></i></li>
                    <li><i class="fa fa-binoculars"></i></li>
                    <li><i class="fa fa-plug"></i></li>
                    <li><i class="fa fa-slideshare"></i></li>
                    <li><i class="fa fa-twitch"></i></li>
                    <li><i class="fa fa-yelp"></i></li>
                    <li><i class="fa fa-newspaper-o"></i></li>
                    <li><i class="fa fa-wifi"></i></li>
                    <li><i class="fa fa-calculator"></i></li>
                    <li><i class="fa fa-paypal"></i></li>
                    <li><i class="fa fa-google-wallet"></i></li>
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-discover"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                    <li><i class="fa fa-cc-stripe"></i></li>
                    <li><i class="fa fa-bell-slash"></i></li>
                    <li><i class="fa fa-bell-slash-o"></i></li>
                    <li><i class="fa fa-trash"></i></li>
                    <li><i class="fa fa-copyright"></i></li>
                    <li><i class="fa fa-at"></i></li>
                    <li><i class="fa fa-eyedropper"></i></li>
                    <li><i class="fa fa-paint-brush"></i></li>
                    <li><i class="fa fa-birthday-cake"></i></li>
                    <li><i class="fa fa-area-chart"></i></li>
                    <li><i class="fa fa-pie-chart"></i></li>
                    <li><i class="fa fa-line-chart"></i></li>
                    <li><i class="fa fa-lastfm"></i></li>
                    <li><i class="fa fa-lastfm-square"></i></li>
                    <li><i class="fa fa-toggle-off"></i></li>
                    <li><i class="fa fa-toggle-on"></i></li>
                    <li><i class="fa fa-bicycle"></i></li>
                    <li><i class="fa fa-bus"></i></li>
                    <li><i class="fa fa-ioxhost"></i></li>
                    <li><i class="fa fa-angellist"></i></li>
                    <li><i class="fa fa-cc"></i></li>
                    <li><i class="fa fa-ils"></i></li>
                    <li><i class="fa fa-meanpath"></i></li>
                </ul>
            </div>

            <?php
            break;
    }
}

function enlighten_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    // Allow only integers in number fields
    if ($enlighten_widgets_field_type == 'number') {
        return absint($new_field_value);

        // Allow some tags in textareas
    } elseif ($enlighten_widgets_field_type == 'textarea') {
        // Check if field array specifed allowed tags
        return wp_kses_post($new_field_value);

        // No allowed tags for all other fields
    } elseif ($enlighten_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    } else {
        return wp_kses_post($new_field_value);
    }
}


