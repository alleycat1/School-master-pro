<?php defined('ABSPATH') or die("No script kiddies please!");?>
<div class="aps-social-icon-wrapper">
    <?php
    $icon_counter = 0;
    $group_icon_counter = 0;
    $total_display_icons = $this->get_total_display_icons($icon_details);
    $total_rows = ($icon_set->num_rows == '') ? 1 : $icon_set->num_rows;
    $total_columns = ($icon_extra['num_columns'] == '') ? 1 : $icon_extra['num_columns'];
    if ($icon_set->icon_display == 'horizontal') {
        $icons_per_division = $total_display_icons / $total_rows;
        if ($total_display_icons % $total_rows != 0) {
            $icons_per_division = intval($icons_per_division) + 1;
        }
    } else {
        $icons_per_division = $total_display_icons / $total_columns;
        if ($total_display_icons % $total_columns != 0) {
            $icons_per_division = intval($icons_per_division) + 1;
        }
    }


    foreach ($icon_details as $title => $icon) {


        if ($icon['link'] != '') {
            $icon_style = '<style class="aps-icon-front-style">';
            $icon_counter++;
            $group_icon_counter++;
            if ($group_icon_counter == 1) {
                ?>
                <div class="<?php echo $icon_position_class; ?>">
                    <?php
                }
                $icon_main_class = 'icon-' . $si_id . '-' . $icon_counter;
                foreach ($icon as $key => $val) {
                    ${$key} = $val;
                }
                $link_target = ($icon['link_target'] == 'New Window') ? 'target="_blank"' : '';
                $tooltip_text = ($icon['tooltip_text'] == '') ? esc_attr($title) : esc_attr($icon['tooltip_text']);
                ?>
                <div class="aps-each-icon <?php echo $icon_main_class; ?>" style='margin:<?php echo str_replace('px', '', $icon_set->icon_margin); ?>px;' data-aps-tooltip='<?php echo $tooltip_text ?>' data-aps-tooltip-enabled="<?php echo $icon_set->icon_tooltip; ?>" data-aps-tooltip-bg="<?php echo $tooltip_bg = ($icon_set->tooltip_background == '') ? '#000' : $icon_set->tooltip_background; ?>" data-aps-tooltip-color="<?php echo ($icon_set->tooltip_text_color == '') ? '#fff' : $icon_set->tooltip_text_color; ?>">
                    <a href="<?php echo $icon['link'] ?>" <?php echo $link_target; ?> class="<?php echo apply_filters('apsi_icon_class','aps-icon-link');?> animated <?php echo ($icon_set->icon_tooltip == 1) ? 'aps-tooltip' : ''; ?>" data-animation-class="<?php echo $icon_set->icon_animation; ?>">
                        <?php
                        $border_thickness = str_replace('px', '', $icon['border_thickness']);
                        $border_thickness = ($border_thickness == '') ? '1' : $border_thickness;
                        $border_color = ($icon['border_color'] == '') ? '#000' : $icon['border_color'];
                        $border_type = $icon['border_type'];
                        $shadow_type = $icon['shadow'];
                        $offset_x = str_replace('px', '', $icon['shadow_offset_x']);
                        $offset_x = ($offset_x == '') ? '0' : $offset_x;
                        $offset_y = str_replace('px', '', $icon['shadow_offset_y']);
                        $offset_y = ($offset_y == '') ? '0' : $offset_y;
                        $blur = str_replace('px', '', isset($icon['shadow_blur'])?$icon['shadow_blur']:0);
                        $blur = ($blur == '') ? '0' : $blur;
                        $shadow_color = $icon['shadow_color'];
                        if ($shadow_type != 'no') {
                            $shadow = '-moz-box-shadow:' . $offset_x . 'px ' . $offset_y . 'px ' . $blur . 'px ' . '0' . ' ' . $shadow_color . ';';
                            $shadow .= '-webkit-box-shadow:' . $offset_x . 'px ' . $offset_y . 'px ' . $blur . 'px ' . '0' . ' ' . $shadow_color . ';';
                            $shadow .= 'box-shadow:' . $offset_x . 'px ' . $offset_y . 'px ' . $blur . 'px ' . '0' . ' ' . $shadow_color . ';';
                        } else {
                            $shadow = '';
                        }

                        $border = ($icon['border_type'] == 'none') ? '' : "border:{$border_thickness}px $border_type $border_color;";
                        ?>
                        <img src="<?php echo apply_filters('apsi_image_url',$icon['image']); ?>" alt="<?php echo esc_attr($title);?>"/>
                        <?php
                        $icon_height = str_replace('px', '', $icon['icon_height']);
                        $icon_width = str_replace('px', '', $icon['icon_width']);
                        $padding = str_replace('px', '', $icon['padding']);
                        $padding = "padding:{$padding}px;";
                        $icon_style .=".$icon_main_class img{height:{$icon_height}px;width:{$icon_width}px;opacity:{$icon_opacity};{$border}{$shadow}{$padding}}";
                        $icon_style .=".$icon_main_class .aps-icon-tooltip:before{border-color:$tooltip_bg}";
                        //if($icon[''])
                        ?>
                    </a>
                    <span class="aps-icon-tooltip aps-icon-tooltip-<?php echo $icon_extra['tooltip_position']; ?>" style="display: none;"></span>
                    <?php
                    $icon_style = apply_filters('apsi_icon_style',$icon_style);                    
                    $icon_style .='</style>';
                    echo $icon_style
                    ?>
                </div>
                <?php if ($group_icon_counter == $icons_per_division) {
                    ?>
                </div>
                <?php
                $group_icon_counter = 0;
            }
            ?>

            <?php
        }//if icon has link check
    }//foreach close
    if ($icon_set->icon_display == 'horizontal') {
        if ($total_display_icons % $total_rows != 0) {
            echo "</div>";//extra div closing if the division is not exact
        }
    } else {
        $icons_per_division = $total_display_icons / $total_columns;
        if ($total_display_icons % $total_columns != 0) {
            echo "</div>";//extra div closing if the division is not exact
        }
    }
    ?>
</div>