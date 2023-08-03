<?php defined('ABSPATH') or die("No script kiddies please!");?>
<div class="wrap aps-clear">
    <div class="aps-add-set-wrapper">
        <div class="aps-panel">
            <?php include('panel-head.php');?>
            <div class="aps-panel-body">
                <h2><?php _e('Add New Social Icons Set', 'accesspress-social-icons'); ?></h2>
                <div class="form-wrap">
                    <form method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
                        <input type="hidden" name="action" value="aps_add_new_set"/>
                        <div class="aps-row">
                            <div class="aps-col-half">
                                <div class="aps-row">
                                    <div class="aps-col-full">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Name of Set', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <input type="text" name="set_name" placeholder="eg. Header Icons"/>
                                            </div>
                                            <div class="aps-error"></div>
                                        </div><!--aps-field-wrapper-->
                                    </div>
                                    <div class="aps-col-full">
                                        <div class="aps-group-chooser">
                                            <div class="aps-field-wrapper form-field">
                                                <label><?php _e('Choose Icon Set type', 'accesspress-social-icons'); ?></label>
                                                <div class="aps-field">
                                                    <label class="label-inline"><input type="radio" name="icon_set_type" value="1" /><?php _e('Choose icon indiviually', 'accesspress-social-icons'); ?></label>
                                                    <label class="label-inline"><input type="radio" name="icon_set_type" value="2" /><?php _e('Choose from available themes', 'accesspress-social-icons'); ?></label>
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
                                                <label class="label-inline"><input type="radio" name="display" value="horizontal" checked="checked"/><?php _e('Horizontal', 'accesspress-social-icons'); ?></label>
                                                <label class="label-inline"><input type="radio" name="display" value="vertical" /><?php _e('Vertical', 'accesspress-social-icons'); ?></label>
                                            </div>
                                        </div><!--aps-field-wrapper-->
                                    </div>
                                </div>
                                <div class="aps-row">
                                    <div class="aps-col-half">
                                        <div class="aps-field-wrapper display-horizontal-reference form-field">
                                            <label><?php _e('Number of Rows', 'accesspress-social-icons') ?></label>
                                            <div class="aps-field">
                                                <input type="number" name="num_rows" min="1"/>
                                            </div>
                                            <div class="aps-option-note">
                                                <p><?php _e('Please enter the number of rows in number.Default is 1.', 'accesspress-social-icons'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aps-col-half">
                                        <div class="aps-field-wrapper display-vertical-reference form-field" style="display: none">
                                            <label><?php _e('Number of Columns', 'accesspress-social-icons') ?></label>
                                            <div class="aps-field">
                                                <input type="number" name="num_columns" min="1"/>
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
                                                <input type="text" name="margins"/>
                                            </div>
                                            <div class="aps-field-note">
                                                <p><?php _e('Please enter the margin for each icon in px.', 'accesspress-social-icons'); ?></p>
                                            </div>
                                        </div><!--aps-field-wrapper-->
                                    </div>
                                    <div class="aps-clear"></div>
                                    <div class="aps-col-two-third">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Tooltip', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <label class="label-inline"><input type="radio" name="tooltip" value="1" checked="checked"/><?php _e('Show', 'accesspress-social-icons'); ?></label>
                                                <label class="label-inline"><input type="radio" name="tooltip" value="0" /><?php _e('Don\'t show', 'accesspress-social-icons'); ?></label>
                                            </div>
                                        </div><!--aps-field-wrapper-->
                                    </div>
                                    <div class="aps-clear"></div>
                                    <div class="aps-tooltip-options">
                                        <div class="aps-col-one-third">
                                            <div class="aps-field-wrapper aps-tooltip-reference form-field">
                                                <label><?php _e('Tooltip Bg Color', 'accesspress-social-icons') ?></label>
                                                <div class="aps-field">
                                                    <input type="text" name="tooltip_bg" class="aps-color-picker"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="aps-col-one-third">
                                            <div class="aps-field-wrapper aps-tooltip-reference form-field">
                                                <label><?php _e('Tooltip Text Color', 'accesspress-social-icons'); ?></label>
                                                <div class="aps-field">
                                                    <input type="text" name="tooltip_text_color" class="aps-color-picker"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="aps-col-one-third">
                                            <div class="aps-field-wrapper aps-tooltip-reference form-field">
                                                <label><?php _e('Tooltip Position', 'accesspress-social-icons'); ?></label>
                                                <div class="aps-field">
                                                    <select name="tooltip_position" class="aps-form-control">
                                                            <option value="top"><?php _e('Top','accesspress-social-icons');?></option>
                                                            <option value="right"><?php _e('Right','accesspress-social-icons');?></option>
                                                            <option value="bottom" selected="selected"><?php _e('Bottom','accesspress-social-icons');?></option>
                                                            <option value="left"><?php _e('Left','accesspress-social-icons');?></option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aps-clear"></div>
                                    <div class="aps-col-half">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Icons Hover Animation', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <select name="icon_animation" class="aps-form-control" id="aps-icon-animation">
                                                    <option value=""><?php _e('No Animation', 'accesspress-social-icons'); ?></option>
                                                    <optgroup label="Attention Seekers">
                                                        <option value="bounce">bounce</option>
                                                        <option value="flash">flash</option>
                                                        <option value="pulse">pulse</option>
                                                        <option value="shake">shake</option>
                                                        <option value="swing">swing</option>
                                                        <option value="tada">tada</option>
                                                    </optgroup>
                                                    <optgroup label="Bouncing Entrances">
                                                        <option value="bounceIn">bounceIn</option>
                                                    </optgroup>
                                                    <optgroup label="Fading Entrances">
                                                        <option value="fadeIn">fadeIn</option>
                                                        <option value="fadeInDown">fadeInDown</option>
                                                        <option value="fadeInUp">fadeInUp</option>
                                                    </optgroup>
                                                    <optgroup label="Flippers">
                                                        <option value="flip">flip</option>
                                                        <option value="flipInX">flipInX</option>
                                                        <option value="flipInY">flipInY</option>
                                                    </optgroup>
                                                    <optgroup label="Zoom Entrances">
                                                        <option value="zoomIn">zoomIn</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div><!--aps-field-wrapper-->
                                    </div>
                                    <div class="aps-col-half">
                                        <div class="aps-field-wrapper form-field">
                                            <label><?php _e('Opacity on Non Hover', 'accesspress-social-icons'); ?></label>
                                            <div class="aps-field">
                                                <select name="opacity_hover" class="aps-form-control">
                                                    <option value="1">1</option>
                                                    <option value="0.75">0.75</option>
                                                    <option value="0.5">0.5</option>
                                                    <option value="0.25">0.25</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>

                                
                                <div class="aps-clear"></div>
                            </div><!--end .aps-col-half-->
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
                                    <a href="javascript:void(0);" class="aps-icon-theme-expand button button-secondary button-small" style="display:none"><?php _e('Expand All', 'accesspress-social-icons'); ?></a>
                                </div>
                                <div class="aps-icon-list-wrapper">
                                    <p><?php _e('Empty List', 'accesspress-social-icons'); ?></p>
                                    <div class="aps-icon-note" style="display: none"><?php _e('Each Icon will only show up in the frontend if icon link is not empty', 'accesspress-social-icons'); ?></div>
                                    <ul class="aps-icon-list">
                                    </ul>
                                </div>
                                <!--Icon Adder-->
                                <?php include_once('icon-adder.php'); ?>
                                <!--aps-icon-adder-->  
                            </div>
                        </div>

                        <div class="aps-field-wrapper form-field">
                            <div class="aps-error aps-main-error"></div>
                            <input type="submit" class="button button-primary" value="<?php _e('Save icon set', 'accesspress-social-icons'); ?>" name="aps_icon_set_submit" id="aps_icon_set_submit"/>
                            <input type="hidden" id="aps-icon-counter" value="0"/>
                            <input type="hidden" id="aps-icon-group-type" name="icon_group_type" />
                            <input type="hidden" name="icon_theme_id" id="icon_theme_id"/>
                            <input type="hidden" name="icon_theme_type" value="icon_theme_type"/>
                        </div><!--aps-field-wrapper-->
                        <?php wp_nonce_field('aps_add_new_set', 'aps_add_set_nonce'); ?>
                    </form>
                </div>
                <div class="aps-pre-available-icons" style="display: none;">
                </div>

            </div>
        </div>       
    </div>
    <?php include_once('promobar.php'); ?>
</div>