<?php defined('ABSPATH') or die("No script kiddies please!");?>
<div class="aps-theme-chooser" style="display: none;">
    <div class="aps-field-wrapper">
        <div class="aps-png-themes">
            <h3><?php _e('Available Icon Themes', 'accesspress-social-icons'); ?> <img src="<?php echo APS_IMAGE_DIR . '/ajax-loader.gif' ?>" id="aps-icon-theme-loader" style="display: none"/></h3>
            <div class="aps-well">
                <div>
                    <?php for ($i = 1; $i <= 12; $i++) {
                        ?>
                        <label><input type="radio" id="aps-theme-<?php echo $i;?>" value="<?php echo $i;?>" class="aps-theme aps-png-theme" name="aps_icon_theme" <?php if (isset($_GET['action']) && $icon_extra['icon_set_type'] == 2 && $icon_extra['icon_theme_id'] == $i) { ?>checked="checked"<?php } ?>/>Theme <?php echo $i;?></label>
                        <div class="aps-theme-previewbox">
                            <img src="<?php echo APS_IMAGE_DIR . '/preview'.$i.'.jpg' ?>" alt="theme preview" />
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>