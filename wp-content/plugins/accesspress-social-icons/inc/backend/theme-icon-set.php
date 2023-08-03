<?php defined('ABSPATH') or die("No script kiddies please!");?>
<li class="aps-sortable-icons">
    <div class="aps-drag-icon"></div>  
    <div class="aps-icon-head">
        <span class="aps-icon-name"><?php echo esc_attr($filename); ?></span>
        <span class="aps-icon-list-controls">
            <span class="aps-arrow-down aps-arrow button button-secondary" aria-label="expand icons">
                <i class="dashicons dashicons-arrow-down"></i>
            </span>
        </span>
    </div>
    <div class="aps-icon-body" style="display: none;">
        <div class="aps-row">
            <div class="aps-col-full">
                <div class="aps-icon-preview form-field">
                    <label><?php _e('Icon Preview', 'accesspress-social-icons'); ?></label>
                    <img src="<?php echo APS_ICONS_DIR . '/' . $sub_folder . '/' . $folder . '/' . $file; ?>" data-image-name="<?php echo $filename?>"/>
                </div>

                <div class="aps-field-wrapper form-field">
                    <label><?php _e('Icon Title', 'accesspress-social-icons'); ?></label>
                    <div class="aps-field">
                        <input type="text" name="icons[<?php echo $filename; ?>][title]" placeholder="eg. facebook" />
                    </div>
                </div><!--aps-field-wrapper-->
                <?php if ($sub_folder == 'svg') { ?>
                <div class="aps-field-wrapper form-field">
                    <label><?php _e('Icon Background Color', 'accesspress-social-icons'); ?></label>
                    <div class="aps-field">
                        <input type="text" name="icons[<?php echo $filename; ?>][icon_bg_color]" class="aps-color-picker"/>
                    </div>
                </div><!--aps-field-wrapper-->
                <?php } ?>
            </div>
            <div class="aps-col-half">
                <div class="aps-field-wrapper form-field">
                    <label><?php _e('Icon Width', 'accesspress-social-icons'); ?></label>
                    <div class="aps-field">
                        <input type="text" name="icons[<?php echo $filename; ?>][icon_width]" class="aps_theme_icon_width" placeholder="eg. 32px"/>
                    </div>
                    <div class="aps-option-note">
                        <p><?php _e('Please enter the width for the icon in px.', 'accesspress-social-icons'); ?></p>
                    </div>
                </div><!--aps-field-wrapper-->
            </div>
            <div class="aps-col-half">
                <div class="aps-field-wrapper form-field">
                    <label><?php _e('Icon Height', 'accesspress-social-icons'); ?></label>
                    <div class="aps-field">
                        <input type="text" name="icons[<?php echo $filename; ?>][icon_height]" class="aps_theme_icon_height" placeholder="eg. 32px" />
                    </div>
                    <div class="aps-option-note"><p><?php _e('Please enter the height for the icon in px.', 'accesspress-social-icons'); ?></p></div>
                </div><!--aps-field-wrapper-->
            </div>
            <div class="aps-col-full">
                <div class="aps-field-wrapper form-field">
                    <label><?php _e('Icon Link', 'accesspress-social-icons'); ?></label>
                    <div class="aps-field">
                        <input type="text" name="icons[<?php echo $filename; ?>][link]" placeholder="eg. https://www.facebook.com" />
                    </div>
                </div><!--aps-field-wrapper-->
            </div>
            <div class="aps-col-half">
                <div class="aps-field-wrapper form-field">
                    <label><?php _e('Tooltip Text', 'accesspress-social-icons'); ?></label>
                    <div class="aps-field">
                        <input type="text" name="icons[<?php echo $filename; ?>][tooltip_text]" placeholder="your tooltip text"/>
                    </div>
                </div><!--aps-field-wrapper-->
            </div>
            <div class="aps-col-half">
                <div class="aps-field-wrapper form-field">
                    <label><?php _e('Icon Link Target', 'accesspress-social-icons'); ?></label>
                    <div class="aps-field">
                        <select name="icons[<?php echo $filename; ?>][link_target]" class="aps-form-control">
                            <option value="New Window">New Window</option>
                            <option value="Same Window">Same Window</option>
                        </select>
                    </div>
                </div><!--aps-field-wrapper-->  
            </div>
        </div>
    </div>
    <input type="hidden" name="icons[<?php echo $filename; ?>][image_name]" value="<?php echo $filename?>" />
    <input type="hidden" name="icons[<?php echo $filename; ?>][image]" value="<?php echo APS_ICONS_DIR . '/' . $sub_folder . '/' . $folder . '/' . $file; ?>" class="set_image_reference" data-image-name="<?php echo $filename;?>"/>
    <input type="hidden" name="icons[<?php echo $filename; ?>][border_type]" value="none"/>
    <input type="hidden" name="icons[<?php echo $filename; ?>][border_thickness]" value="0"/>
    <input type="hidden" name="icons[<?php echo $filename; ?>][border_color]" value=""/>
    <input type="hidden" name="icons[<?php echo $filename; ?>][shadow]" value="yes"/>
    <input type="hidden" name="icons[<?php echo $filename; ?>][shadow_offset_x]" value="0"/>
    <input type="hidden" name="icons[<?php echo $filename; ?>][shadow_offset_y]" value="0"/>
    <input type="hidden" name="icons[<?php echo $filename; ?>][blur]" value="0"/>
    <input type="hidden" name="icons[<?php echo $filename; ?>][shadow_color]" value=""/>
    <input type="hidden" name="icons[<?php echo $filename; ?>][padding]" value="0"/>
    
</li>