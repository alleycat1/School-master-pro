<?php
defined('ABSPATH') or die("No script kiddies please!");
global $wpdb;
$si_id = intval(sanitize_text_field($_GET['si_id']));
$table_name = $table_name = $wpdb->prefix . "aps_social_icons";
$icon_sets = $wpdb->get_results("SELECT * FROM $table_name where si_id = $si_id");
if(!empty($icon_sets)){
$icon_set = $icon_sets[0];
$icon_extra = unserialize($icon_set->icon_extra);
//$this->print_array($icon_extra);
?>
<div class="aps-add-set-wrapper">
    <?php if (isset($_GET['message'])) { ?>
        <div class="aps-message aps-message-success updated">
            <p>
                <?php
                _e('Icon Set Updated Successfully','accesspress-social-icons');
                ?>
            </p>
        </div>
    <?php } ?>
    <div class="aps-list-wrapper">
        <div class="aps-panel">
            <!--Panel Head-->
            <?php include('panel-head.php');?>
            <!--Panel Head-->
            <div class="aps-panel-body">
                <h2><?php _e('Edit Social Icons Set', 'accesspress-social-icons'); ?></h2>

                <div class="form-wrap">
                    <form method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
                        <input type="hidden" name="action" value="aps_edit_action"/>
                        <div class="aps-row">
                            <div class="aps-col-half">
                                <div class="aps-row">
                                    <div class="aps-col-full">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Name of Set', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <input type="text" name="set_name" value="<?php echo esc_attr($icon_set->icon_set_name); ?>"/>
                                            </div>
                                            <div class="aps-error"></div>
                                        </div><!--aps-field-wrapper form-field-->
                                    </div>
                                    <div class="aps-col-full">
                                        <div class="aps-group-chooser">
                                            <div class="aps-field-wrapper form-field">
                                                <label><?php _e('Choose Icon Set type', 'accesspress-social-icons'); ?></label>
                                                <div class="aps-field">
                                                    <label class="label-inline"><input type="radio" name="icon_set_type" value="1" <?php if ($icon_extra['icon_set_type'] == 1) { ?>checked="checked"<?php } ?>/><?php _e('Choose icon indiviually', 'accesspress-social-icons'); ?></label>
                                                    <label class="label-inline"><input type="radio" name="icon_set_type" value="2" <?php if ($icon_extra['icon_set_type'] == 2) { ?>checked="checked"<?php } ?>/><?php _e('Choose from available themes', 'accesspress-social-icons'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aps-col-full">
                                        <!--Icon Themes-->
                                        <?php include_once('icon-themes.php'); ?>
                                        <!--Icon Themes-->
                                    </div>
                                    <div class="aps-col-full">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Display', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <label class="label-inline"><input type="radio" name="display" value="horizontal" <?php if ($icon_set->icon_display == 'horizontal') { ?>checked="checked"<?php } ?>/><?php _e('Horizontal', 'accesspress-social-icons'); ?></label>
                                                <label class="label-inline"><input type="radio" name="display" value="vertical" <?php if ($icon_set->icon_display == 'vertical') { ?>checked="checked"<?php } ?>/><?php _e('Vertical', 'accesspress-social-icons'); ?></label>
                                            </div>
                                        </div><!--aps-field-wrapper form-field-->
                                    </div>
                                </div>
                                <div class="aps-row">
                                    <div class="aps-col-half">
                                        <div class="aps-field-wrapper form-field display-horizontal-reference" <?php if ($icon_set->icon_display == 'vertical') { ?>style="display: none"<?php } ?>>
                                            <label><?php _e('Number of Rows', 'accesspress-social-icons') ?></label>
                                            <div class="aps-field">
                                                <input type="number" name="num_rows" value="<?php echo $icon_set->num_rows; ?>" min="1"/>
                                            </div>
                                            <div class="aps-option-note">
                                                <p><?php _e('Please enter the number of rows in number.Default is 1.', 'accesspress-social-icons'); ?></p>
                                            </div>
                                        </div><!--aps-field-wrapper-->
                                    </div>
                                    <div class="aps-col-half">
                                        <div class="aps-field-wrapper display-vertical-reference form-field" <?php if ($icon_set->icon_display == 'horizontal') { ?>style="display: none"<?php } ?>>
                                            <label><?php _e('Number of Columns', 'accesspress-social-icons') ?></label>
                                            <div class="aps-field">
                                                <input type="number" name="num_columns" value='<?php
                                                if (isset($icon_extra['num_columns'])) {
                                                    echo $icon_extra['num_columns'];
                                                }
                                                ?>' min="1"/>
                                            </div>
                                            <div class="aps-option-note">
                                                <p><?php _e('Please enter the number of columns in number.Default is 1.', 'accesspress-social-icons'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aps-col-half">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Margin Between Each Icon', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <input type="number" name="margins" value="<?php echo esc_attr($icon_set->icon_margin); ?>"/>
                                            </div>
                                            <div class="aps-field-note">
                                                <p>
                                                    <?php _e('Please enter the margin for each icon in px.', 'accesspress-social-icons'); ?>
                                                </p>
                                            </div>
                                        </div><!--aps-field-wrapper-->
                                    </div>
                                    <div class="aps-clear"></div>
                                    <div class="aps-col-two-third">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Tooltip', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <label class="label-inline"><input type="radio" name="tooltip" value="1" <?php if ($icon_set->icon_tooltip == 1) { ?>checked="checked"<?php } ?>/><?php _e('Show', 'accesspress-social-icons'); ?></label>
                                                <label class="label-inline"><input type="radio" name="tooltip" value="0" <?php if ($icon_set->icon_tooltip == 0) { ?>checked="checked"<?php } ?>/><?php _e('Don\'t show', 'accesspress-social-icons'); ?></label>
                                            </div>
                                        </div><!--aps-field-wrapper form-field-->
                                    </div>
                                    <div class="aps-clear"></div>
                                    <div class="aps-tooltip-options">
                                        <div class="aps-col-one-third">
                                            <div class="aps-field-wrapper form-field aps-tooltip-reference">
                                                <label><?php _e('Tooltip Bg Color', 'accesspress-social-icons') ?></label>
                                                <div class="aps-field">
                                                    <input type="text" name="tooltip_bg" class="aps-color-picker" value="<?php echo esc_attr($icon_set->tooltip_background); ?>"/>
                                                </div>
                                            </div><!--aps-field-wrapper form-field-->
                                        </div>
                                        <div class="aps-col-one-third">
                                            <div class="aps-field-wrapper form-field aps-tooltip-reference">
                                                <label><?php _e('Tooltip Text Color', 'accesspress-social-icons'); ?></label>
                                                <div class="aps-field">
                                                    <input type="text" name="tooltip_text_color" class="aps-color-picker" value="<?php echo esc_attr($icon_set->tooltip_text_color); ?>"/>
                                                </div>
                                            </div><!--aps-field-wrapper form-field-->
                                        </div>
                                        <div class="aps-col-one-third">
                                            <div class="aps-field-wrapper aps-tooltip-reference form-field">
                                                <label><?php _e('Tooltip Position', 'accesspress-social-icons'); ?></label>
                                                <div class="aps-field">
                                                        <select name="tooltip_position" class="aps-form-control">
                                                            <option value="top" <?php if(isset($icon_extra['tooltip_position']) && $icon_extra['tooltip_position']=='top'){?>selected="selected"<?php }?>><?php _e('Top','accesspress-social-icons');?></option>
                                                            <option value="right" <?php if(isset($icon_extra['tooltip_position']) && $icon_extra['tooltip_position']=='right'){?>selected="selected"<?php }?>><?php _e('Right','accesspress-social-icons');?></option>
                                                            <option value="bottom" <?php if(isset($icon_extra['tooltip_position']) && $icon_extra['tooltip_position']=='bottom'){?>selected="selected"<?php }?>><?php _e('Bottom','accesspress-social-icons');?></option>
                                                            <option value="left" <?php if(isset($icon_extra['tooltip_position']) && $icon_extra['tooltip_position']=='left'){?>selected="selected"<?php }?>><?php _e('Left','accesspress-social-icons');?></option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aps-clear"></div>
                                    <div class="aps-col-half">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Icons Animation', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <select name="icon_animation" class="aps-form-control" id="aps-icon-animation">
                                                    <option value=""><?php _e('No Animation', 'accesspress-social-icons'); ?></option>
                                                    <optgroup label="Attention Seekers">
                                                        <option value="bounce" <?php if ($icon_set->icon_animation == 'bounce') { ?>selected="selected"<?php } ?>>bounce</option>
                                                        <option value="flash" <?php if ($icon_set->icon_animation == 'flash') { ?>selected="selected"<?php } ?>>flash</option>
                                                        <option value="pulse" <?php if ($icon_set->icon_animation == 'pulse') { ?>selected="selected"<?php } ?>>pulse</option>
                                                        <option value="shake" <?php if ($icon_set->icon_animation == 'shake') { ?>selected="selected"<?php } ?>>shake</option>
                                                        <option value="swing" <?php if ($icon_set->icon_animation == 'swing') { ?>selected="selected"<?php } ?>>swing</option>
                                                        <option value="tada" <?php if ($icon_set->icon_animation == 'tada') { ?>selected="selected"<?php } ?>>tada</option>
                                                        
                                                    </optgroup>
                                                    <optgroup label="Bouncing Entrances">
                                                        <option value="bounceIn" <?php if ($icon_set->icon_animation == 'bounceIn') { ?>selected="selected"<?php } ?>>bounceIn</option>
                                                    </optgroup>
                                                    <optgroup label="Fading Entrances">
                                                        <option value="fadeIn" <?php if ($icon_set->icon_animation == 'fadeIn') { ?>selected="selected"<?php } ?>>fadeIn</option>
                                                        <option value="fadeInDown" <?php if ($icon_set->icon_animation == 'fadeInDown') { ?>selected="selected"<?php } ?>>fadeInDown</option>
                                                        <option value="fadeInUp" <?php if ($icon_set->icon_animation == 'fadeInUp') { ?>selected="selected"<?php } ?>>fadeInUp</option>
                                                    </optgroup>
                                                    <optgroup label="Flippers">
                                                        <option value="flip" <?php if ($icon_set->icon_animation == 'flip') { ?>selected="selected"<?php } ?>>flip</option>
                                                        <option value="flipInX" <?php if ($icon_set->icon_animation == 'flipInX') { ?>selected="selected"<?php } ?>>flipInX</option>
                                                        <option value="flipInY" <?php if ($icon_set->icon_animation == 'flipInY') { ?>selected="selected"<?php } ?>>flipInY</option>
                                                    </optgroup>
                                                    <optgroup label="Zoom Entrances">
                                                        <option value="zoomIn" <?php if ($icon_set->icon_animation == 'zoomIn') { ?>selected="selected"<?php } ?>>zoomIn</option>
                                                    </optgroup>
                                                    <?php do_action('apsi_icon_animation_option',$icon_set);?>
                                                </select>
                                            </div>
                                        </div><!--aps-field-wrapper form-field-->
                                    </div>
                                    <div class="aps-col-half">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Opacity on Non Hover', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <select name="opacity_hover" class="aps-form-control">
                                                    <option value="1" <?php selected($icon_set->opacity_hover,1);?>>1</option>
                                                    <option value="0.75" <?php selected($icon_set->opacity_hover,0.75);?>>0.75</option>
                                                    <option value="0.5" <?php selected($icon_set->opacity_hover,0.5);?>>0.5</option>
                                                    <option value="0.25" <?php selected($icon_set->opacity_hover,0.25);?>>0.25</option>
                                                </select>
                                            </div>
                                        </div><!--aps-field-wrapper form-field-->
                                    </div>

                                </div>

                            </div>

                            <div class="aps-col-half">
                                <div class="aps-field-wrapper">
                                    <div class="aps-field">
                                        <div class="aps-preview-holder">
                                            <div class="aps-image-icon-preview">
                                                <?php _e('Icon Preview', 'accesspress-social-icons'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3><?php _e('Icon Lists', 'accesspress-social-icons'); ?></h3>
                                <div class="aps-expander-controls">
                                    <a href="javascript:void(0);" class="aps-icon-theme-expand button button-secondary button-small"><?php _e('Expand All', 'accesspress-social-icons'); ?></a>
                                </div>
                                <div class="aps-icon-list-wrapper">
                                <p style="display: none;"><?php _e('Empty List', 'accesspress-social-icons'); ?></p>
                                    <div class="aps-icon-note"><?php _e('Each Icon will only show up in the frontend if icon link is not empty', 'accesspress-social-icons'); ?></div>
                                    <ul class="aps-icon-list">
                                        <?php
                                        $icon_details = unserialize($icon_set->icon_details);
                                        //$this->print_array($icon_details);
                                        $icon_counter = 0;
                                        $si_id = $_GET['si_id'];
                                        if(!empty($icon_details)):
                                        foreach ($icon_details as $title => $icon_detail) {
                                            $icon_counter++;
                                            $icon_main_class = 'icon-' . $si_id . '-' . $icon_counter;
                                            ?>
                                            <li class="aps-sortable-icons">
                                                <div class="aps-drag-icon"></div>  
                                                <div class="aps-icon-head">
                                                    <span class="aps-icon-name"><?php echo esc_attr($title); ?></span>
                                                    <span class="aps-icon-list-controls">
                                                        <span class="aps-arrow-down aps-arrow button button-secondary" aria-label="expand icons">
                                                            <i class="dashicons dashicons-arrow-down"></i>
                                                        </span>
                                                        <?php if ($icon_extra['icon_set_type'] == 1) { ?>
                                                        <span class="aps-delete-icon button button-secondary" aria-label="delete icons">
                                                            <i class="dashicons dashicons-trash"></i>
                                                        </span>
                                                        <?php }?>
                                                    </span>
                                                </div>
                                                <div class="aps-icon-body" style="display: none;">

                                                    <div class="aps-row">
                                                        <div class="aps-icon-preview <?php echo $icon_main_class;?>">
                                                            <label><?php _e('Icon Preview', 'accesspress-social-icons'); ?></label>
                                                            <img src="<?php echo esc_url_raw($icon_detail['image']); ?>" data-image-name="<?php echo (isset($icon_detail['image_name']))?$icon_detail['image_name']:$title;?>"/>
                                                        </div>
                                                        <div class="aps-col-full">
                                                            <div class="aps-field-wrapper form-field">
                                                                <label><?php _e('Icon Title', 'accesspress-social-icons'); ?></label>
                                                                <div class="aps-field">
                                                                    <input type="text" name="icons[<?php echo esc_attr($title); ?>][title]" value="<?php echo esc_attr($icon_detail['title']); ?>"/>
                                                                </div>
                                                            </div><!--aps-field-wrapper form-field-->
                                                        </div>
                                                        <div class="aps-col-half">
                                                            <div class="aps-field-wrapper form-field">
                                                                <label><?php _e('Icon Width', 'accesspress-social-icons'); ?></label>
                                                                <div class="aps-field">
                                                                    <input type="text" name="icons[<?php echo esc_attr($title); ?>][icon_width]" value="<?php echo esc_attr($icon_detail['icon_width']) ?>" class="aps_theme_icon_width"/>
                                                                </div>
                                                                <div class="aps-option-note">
                                                                    <p><?php _e('Please enter the width for the icon in px.', 'accesspress-social-icons'); ?></p>
                                                                </div>
                                                            </div><!--aps-field-wrapper form-field-->
                                                        </div>
                                                        <div class="aps-col-half">
                                                            <div class="aps-field-wrapper form-field">
                                                                <label><?php _e('Icon Height', 'accesspress-social-icons'); ?></label>
                                                                <div class="aps-field">
                                                                    <input type="text" name="icons[<?php echo esc_attr($title); ?>][icon_height]" value="<?php echo esc_attr($icon_detail['icon_height']) ?>" class="aps_theme_icon_height"/>
                                                                </div>
                                                                <p><?php _e('Please enter the height for the icon in px.', 'accesspress-social-icons'); ?></p>
                                                            </div><!--aps-field-wrapper form-field-->
                                                        </div>
                                                        <div class="aps-col-full">
                                                            <div class="aps-field-wrapper form-field">
                                                                <label><?php _e('Icon Link', 'accesspress-social-icons'); ?></label>
                                                                <div class="aps-field">
                                                                    <input type="text" name="icons[<?php echo esc_attr($title); ?>][link]" value="<?php echo esc_url_raw($icon_detail['link']) ?>"/>
                                                                </div>
                                                            </div><!--aps-field-wrapper form-field-->
                                                        </div>
                                                        <div class="aps-col-half">
                                                            <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][image]" value="<?php echo $icon_detail['image']; ?>"/>
                                                            <div class="aps-field-wrapper form-field">
                                                                <label><?php _e('Tooltip Text', 'accesspress-social-icons'); ?></label>
                                                                <div class="aps-field">
                                                                    <input type="text" name="icons[<?php echo esc_attr($title); ?>][tooltip_text]" value="<?php echo esc_attr($icon_detail['tooltip_text']) ?>"/>
                                                                </div>
                                                            </div><!--aps-field-wrapper form-field-->
                                                        </div>
                                                        <div class="aps-col-half">
                                                            <div class="aps-field-wrapper form-field">
                                                                <label><?php _e('Icon Link Target', 'accesspress-social-icons'); ?></label>
                                                                <div class="aps-field">
                                                                    <select class="aps-form-control" name="icons[<?php echo esc_attr($title); ?>][link_target]">
                                                                        <option value="New Window">New Window</option>
                                                                        <option value="Same Window">Same Window</option>
                                                                    </select>
                                                                </div>
                                                            </div><!--aps-field-wrapper form-field-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="icons[<?php echo $title; ?>][image_name]" value="<?php echo (isset($icon_detail['image_name']))?$icon_detail['image_name']:$title;?>" />
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][image]" value="<?php echo esc_attr($icon_detail['image']) ?>" class="set_image_reference" data-image-name="<?php echo (isset($icon_detail['image_name']))?$icon_detail['image_name']:$title;?>"/>
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][border_type]" value="<?php echo esc_attr($icon_detail['border_type']) ?>"/>
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][border_thickness]" value="<?php echo esc_attr($icon_detail['border_thickness']) ?>"/>
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][border_color]" value="<?php echo esc_attr($icon_detail['border_color']) ?>"/>
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][shadow]" value="<?php echo esc_attr($icon_detail['shadow']) ?>"/>
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][shadow_offset_x]" value="<?php echo esc_attr($icon_detail['shadow_offset_x']) ?>"/>
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][shadow_offset_y]" value="<?php echo esc_attr($icon_detail['shadow_offset_y']) ?>"/>
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][shadow_blur]" value="<?php echo isset($icon_detail['shadow_blur'])?esc_attr($icon_detail['shadow_blur']):''; ?>"/>
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][shadow_color]" value="<?php echo esc_attr($icon_detail['shadow_color']) ?>"/>
                                                <input type="hidden" name="icons[<?php echo esc_attr($title); ?>][padding]" value="<?php echo esc_attr($icon_detail['padding']) ?>"/>
                                                <?php
                                                $border_thickness = str_replace('px', '', $icon_detail['border_thickness']);
                                                $border_thickness = ($border_thickness == '') ? '1' : $border_thickness;
                                                $border_color = ($icon_detail['border_color'] == '') ? '#000' : $icon_detail['border_color'];
                                                $border_type = $icon_detail['border_type'];
                                                $shadow_type = $icon_detail['shadow'];
                                                $offset_x = str_replace('px', '', $icon_detail['shadow_offset_x']);
                                                $offset_x = ($offset_x == '') ? '0' : $offset_x;
                                                $offset_y = str_replace('px', '', $icon_detail['shadow_offset_y']);
                                                $offset_y = ($offset_y == '') ? '0' : $offset_y;
                                                $blur = str_replace('px', '', isset($icon_detail['shadow_blur'])?$icon_detail['shadow_blur']:'');
                                                $blur = ($blur == '') ? '0' : $blur;
                                                $shadow_color = $icon_detail['shadow_color'];
                                                if ($shadow_type != 'no') {
                                                    $shadow = '-moz-box-shadow:' . $offset_x . 'px ' . $offset_y . 'px ' . $blur . 'px ' . '0' . ' ' . $shadow_color . ';';
                                                    $shadow .= '-webkit-box-shadow:' . $offset_x . 'px ' . $offset_y . 'px ' . $blur . 'px ' . '0' . ' ' . $shadow_color . ';';
                                                    $shadow .= 'box-shadow:' . $offset_x . 'px ' . $offset_y . 'px ' . $blur . 'px ' . '0' . ' ' . $shadow_color . ';';
                                                } else {
                                                    $shadow = '';
                                                }

                                                $border = ($icon_detail['border_type'] == 'none') ? '' : "border:{$border_thickness}px $border_type $border_color;";
                                                ?>
                                                <?php
                                                $icon_height = str_replace('px', '', $icon_detail['icon_height']);
                                                $icon_width = str_replace('px', '', $icon_detail['icon_width']);
                                                $padding = str_replace('px', '', $icon_detail['padding']);
                                                $padding = "padding:{$padding}px;";
                                                $icon_style =".$icon_main_class img{height:{$icon_height}px;width:{$icon_width}px;{$border}{$shadow}{$padding}";
                                                ?>
                                                <style><?php echo $icon_style;?></style>
                                            </li>
                                            <?php
                                        }
                                        endif;
                                        ?>
                                    </ul>
                                </div>
                                <!--aps-icon-adder-->
                                <?php include('icon-adder.php') ?>
                                <!--aps-icon-adder-->
                            </div>
                        </div>

                        <div class="aps-field-wrapper form-field">
                            <div class="aps-error aps-main-error"></div>
                            <input type="submit" class="button button-primary" value="<?php _e('Save icon set', 'accesspress-social-icons'); ?>" name="aps_icon_set_submit" id="aps_icon_set_submit"/>
                            <input type="hidden" id="aps-icon-counter" value="<?php echo count($icon_details); ?>"/>
                            <input type="hidden" name="si_id" value="<?php echo $si_id; ?>"/>
                            <input type="hidden" name="current_page" value="<?php echo $this->curPageURL(); ?>"/>
                            <input type="hidden" name="icon_theme_id" id="icon_theme_id" value="<?php echo $icon_extra['icon_theme_id']; ?>"/>
                            
                        </div>
                        <?php wp_nonce_field('aps_edit_action', 'aps_edit_set_nonce'); ?>
                    </form>
                </div>
                <div class="aps-pre-available-icons" style="display: none;">
                </div>
                <div class="aps-font-awesome-icons" style="display:none">
                    <?php include_once('font-awesome-icons.php'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once('promobar.php');
}else{
    _e('No icon set found for this ID','accesspress-social-icons');
}  ?>