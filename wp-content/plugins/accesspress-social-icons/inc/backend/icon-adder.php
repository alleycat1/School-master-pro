<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<div class="aps-icon-adder" style="display: none;">
    <div class="aps-row">
        <div class="aps-col-full">
            <div class="aps-field-wrapper form-field">
                <label><?php _e('Icon Title', 'accesspress-social-icons'); ?></label>
                <div class="aps-field">
                    <input type="text" id="aps-icon-title" class="required" placeholder="eg. facebook" data-error-msg="<?php _e('Please enter the icon title', 'accesspress-social-icons'); ?>"/>
                </div>
                <div class="aps-error"></div>
            </div><!--aps-field-wrapper-->
        </div>
        
        <div class="aps-col-full">
            <div class="aps-image-icon">
                <div class="aps-field-wrapper form-field">
                    <label><?php _e('Icon Image', 'accesspress-social-icons'); ?></label>
                    <div class="aps-field">
                        <input type="text" id="aps-icon-image" class="required" data-error-msg="<?php _e('Please upload the icon image', 'accesspress-social-icons'); ?>"/>
                        <input type="button" class="button button-secondary" id="aps-icon-chooser" value="<?php _e('Pre available icons', 'accesspress-social-icons'); ?>"/>
                        <input class="button button-primary" id="ap-icon-upload-button" type="button" value="Upload Icon"/>
                        <img src="<?php echo APS_IMAGE_DIR.'/ajax-loader.gif';?>" id="aps-ajax-loader" style="display: none;"/>
                    </div>
                    <div class="aps-error"></div>
                </div><!--aps-field-wrapper-->
               
                <div class="aps-row">
                    <div class="aps-col-half">
                        <div class="aps-field-wrapper form-field">
                            <label><?php _e('Icon Width', 'accesspress-social-icons'); ?></label>
                            <div class="aps-field">
                                <input type="text" id="aps-icon-width" placeholder="eg. 50px"/>
                            </div>
                        </div><!--aps-field-wrapper-->
                    </div>
                    <div class="aps-col-half">
                        <div class="aps-field-wrapper form-field">
                            <label><?php _e('Icon Height', 'accesspress-social-icons'); ?></label>
                            <div class="aps-field">
                                <input type="text" id="aps-icon-height" placeholder="eg. 50px"/>
                            </div>
                        </div><!--aps-field-wrapper-->
                    </div>
                </div>
            </div><!--aps-custom-icon-->
        </div>
        <div class="aps-clear"></div>

        <div class="aps-col-full">
            <div class="aps-row">
                <div class="aps-col-full">
                    <div class="aps-field-wrapper">
                        <label><?php _e('Border Style', 'accesspress-social-icons'); ?></label>                    
                        <div class="aps-field form-field">
                            <select id="aps-border-type" class="aps-form-control">
                                <option value="none">None</option>
                                <option value="dotted">Dotted</option>                            
                                <option value="dashed">Dashed</option>
                                <option value="solid">Solid</option>
                                <option value="double">Double</option>
                                <option value="groove">Groove</option>
                                <option value="ridge">Ridge</option>
                                <option value="inset">Inset</option>
                                <option value="inset">Outset</option>
                            </select>
                        </div>
                    </div>
                </div><!--aps-col-one-third-->
                <div class="aps-border-refernce" style="display:none">
                    <div class="aps-col-one-third">
                        <div class="aps-field-wrapper form-field">
                            <label><?php _e('Border Spacing', 'accesspress-social-icons'); ?></label>                    
                            <div class="aps-field">
                                <input type="text" id="aps-border-spacing" placeholder="<?php _e('eg. 2px', 'accesspress-social-icons'); ?>"/>
                            </div>
                        </div>
                    </div><!--aps-col-one-third-->
                    <div class="aps-col-one-third">
                        <div class="aps-field-wrapper form-field">
                            <label><?php _e('Border Thickness', 'accesspress-social-icons'); ?></label>                    
                            <div class="aps-field">
                                <input type="text" id="aps-border-thickness" placeholder="<?php _e('eg. 2px', 'accesspress-social-icons'); ?>"/>
                            </div>
                        </div>
                    </div><!--aps-col-one-third-->
                    <div class="aps-col-one-third">
                        <div class="aps-field-wrapper form-field">
                            <label><?php _e('Border Color', 'accesspress-social-icons'); ?></label>                    
                            <div class="aps-field">
                                <input type="text" id="aps-border-color"/>
                            </div>
                        </div>
                    </div><!--aps-col-one-third-->
                </div>
            </div>
        </div><!--aps-col-full-->
        <div class="aps-col-full">
            <div class="aps-field-wrapper form-field">
                <label><?php _e('Shadow', 'accesspress-social-icons'); ?></label>
                <div class="aps-field">
                    <label class="label-inline"><input type="radio" name="aps-icon-shadow" value="yes"/>Yes</label>
                    <label class="label-inline"><input type="radio" name="aps-icon-shadow" value="no" checked="checked"/>No</label>
                </div>
            </div>
        </div>
        <div class="aps-col-full aps-shadow-reference" style="display:none;">
            <div class="aps-row">
                <div class="aps-col-one-third">
                    <div class="aps-field-wrapper form-field">
                        <label><?php _e('Offset X', 'accesspress-social-icons'); ?></label>
                        <div class="aps-field">
                            <input type="text" id="aps-shadow-offset-x" placeholder="eg. 1px"/>                        
                        </div>
                    </div>
                </div>
                <div class="aps-col-one-third">
                    <div class="aps-field-wrapper form-field">
                        <label><?php _e('Offset Y', 'accesspress-social-icons'); ?></label>
                        <div class="aps-field">
                            <input type="text" id="aps-shadow-offset-y" placeholder="eg. 1px" />                        
                        </div>
                    </div>
                </div>
                <div class="aps-col-one-third">
                    <div class="aps-field-wrapper form-field">
                        <label><?php _e('Blur', 'accesspress-social-icons'); ?></label>
                        <div class="aps-field">
                            <input type="text" id="aps-shadow-blur" placeholder="eg. 1px"/>                        
                        </div>
                    </div>
                </div>
                <div class="aps-col-half">
                    <div class="aps-field-wrapper form-field">
                        <label><?php _e('Shadow Color', 'accesspress-social-icons'); ?></label>
                        <div class="aps-field">
                            <input type="text" id="aps-shadow-color"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="aps-col-full">
            <div class="aps-field-wrapper form-field">
                <label><?php _e('Icon Link', 'accesspress-social-icons'); ?></label>
                <div class="aps-field">
                    <input type="text" id="aps-icon-link" class="required"  data-error-msg="<?php _e('Please enter the icon link', 'accesspress-social-icons'); ?>" placeholder="https://www.facebook.com/AccessPressThemes"/>
                </div>
                <div class="aps-error"></div>
            </div><!--aps-field-wrapper-->
        </div>
        <div class="aps-col-half">
            <div class="aps-field-wrapper aps-tooltip-reference form-field">
                <label><?php _e('Tooltip Text', 'accesspress-social-icons'); ?></label>
                <div class="aps-field">
                    <input type="text" id="aps-tooltip-text" placeholder="eg. follow us"/>
                </div>
            </div>
        </div>
        <div class="aps-col-half">
            <div class="aps-field-wrapper form-field">
                <label><?php _e('Icon Link Target', 'accesspress-social-icons'); ?></label>
                <div class="aps-field">
                    <select id="aps-icon-link-target" class="aps-form-control">
                        <option value="New Window">New Window</option>
                        <option value="Same Window">Same Window</option>
                    </select> 
                </div>
            </div><!--aps-field-wrapper-->
        </div>
        <div class="aps-col-full">
            <div class="aps-well">
                <div class="aps-field-wrapper form-field">
                    <div class="aps-field">
                        <input type="button" class="button button-secondary" id="aps-icon-add-trigger" value="Add Icon to List"/>
                    </div>
                </div><!--aps-field-wrapper-->
            </div>
        </div>
    </div>
</div>