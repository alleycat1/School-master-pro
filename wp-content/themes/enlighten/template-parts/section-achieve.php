<?php
$enlighten_enable_achieve = get_theme_mod('enlighten_enable_achieve');
$enlighten_achieve_title = get_theme_mod('enlighten_achieve_title');
$enlighten_achieve_title_sub = get_theme_mod('enlighten_achieve_title_sub');

$enlighten_image_1 = get_theme_mod('enlighten_achieve_image_one');
$enlighten_fa_icon_1 = get_theme_mod('enlighten_achieve_fa_one');
$enlighten_archive_count_1 = get_theme_mod('enlighten_achieve_count_one');
$enlighten_achieve_title_1 = get_theme_mod('enlighten_achieve_title_one');

$enlighten_image_2 = get_theme_mod('enlighten_achieve_image_two');
$enlighten_fa_icon_2 = get_theme_mod('enlighten_achieve_fa_two');
$enlighten_archive_count_2 = get_theme_mod('enlighten_achieve_count_two');
$enlighten_achieve_title_2 = get_theme_mod('enlighten_achieve_title_two');

$enlighten_image_3 = get_theme_mod('enlighten_achieve_image_three');
$enlighten_fa_icon_3 = get_theme_mod('enlighten_achieve_fa_three');
$enlighten_archive_count_3 = get_theme_mod('enlighten_achieve_count_three');
$enlighten_achieve_title_3 = get_theme_mod('enlighten_achieve_title_three');

$enlighten_image_4 = get_theme_mod('enlighten_achieve_image_four');
$enlighten_fa_icon_4 = get_theme_mod('enlighten_achieve_fa_four');
$enlighten_archive_count_4 = get_theme_mod('enlighten_achieve_count_four');
$enlighten_achieve_title_4 = get_theme_mod('enlighten_achieve_title_four');
?>

<div class="ak-container">
    <?php
    if($enlighten_achieve_title || $enlighten_achieve_title_sub){
        ?>
        <div class="effect_title">
        <div class="after-effet1"></div>
            <div class="section_content_wrap">
                <div class="section_title">
                    <?php if($enlighten_achieve_title){ ?>
                        <span class="title_one wow fadeInUp"><?php echo esc_html($enlighten_achieve_title); ?></span>
                    <?php } ?>
                    <?php if($enlighten_achieve_title_sub){ ?>
                        <span class="title_two wow fadeInUp"><?php echo esc_html($enlighten_achieve_title_sub); ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="wrap_counter clearfix">
        <?php if($enlighten_image_1 || $enlighten_fa_icon_1 || $enlighten_archive_count_1 || $enlighten_achieve_title_1){ ?>
            <div class="counter_one_wrap wow fadeInUp">
            <?php if($enlighten_image_1 || $enlighten_fa_icon_1){ ?>
                    <div class="image_wrap_fa">
                        <?php if($enlighten_image_1){ ?>
                            <div class="counter_image"><img src="<?php echo esc_url($enlighten_image_1); ?>" /></div>
                        <?php } 
                        else{ ?>
                        <?php if($enlighten_fa_icon_1){ ?>
                            <span class="fa_icon_counter"><i class="<?php echo enlighten_escape_fa($enlighten_fa_icon_1); ?>"></i></span>
                        <?php }
                        } ?>
                    </div>
            <?php } ?>
            <?php if($enlighten_archive_count_1){ ?>
                <span class="counter_count"><?php echo absint($enlighten_archive_count_1); ?></span>
            <?php } ?>
            <?php if($enlighten_achieve_title_1){ ?>
                <span class="counter_title"><?php echo esc_html($enlighten_achieve_title_1); ?></span>
            <?php } ?>
            </div>
        <?php } ?>
        <?php if($enlighten_image_2 || $enlighten_fa_icon_2 || $enlighten_archive_count_2 || $enlighten_achieve_title_2){ ?>
            <div class="counter_two_wrap wow fadeInUp">
            <?php if($enlighten_image_2 || $enlighten_fa_icon_2){ ?>
                    <div class="image_wrap_fa">
                        <?php if($enlighten_image_2){ ?>
                            <div class="counter_image"><img src="<?php echo esc_url($enlighten_image_2); ?>" /></div>
                        <?php } 
                        else{?>
                        <?php if($enlighten_fa_icon_2){ ?>
                            <span class="fa_icon_counter"><i class="<?php echo enlighten_escape_fa($enlighten_fa_icon_2); ?>"></i></span>
                        <?php }
                        } ?>
                    </div>
            <?php } ?>
            <?php if($enlighten_archive_count_2){ ?>
                <span class="counter_count"><?php echo absint($enlighten_archive_count_2); ?></span>
            <?php } ?>
            <?php if($enlighten_achieve_title_2){ ?>
                <span class="counter_title"><?php echo esc_html($enlighten_achieve_title_2); ?></span>
            <?php } ?>
            </div>
        <?php } ?>
        <?php if($enlighten_image_3 || $enlighten_fa_icon_3 || $enlighten_archive_count_3 || $enlighten_achieve_title_3){ ?>
            <div class="counter_three_wrap wow fadeInUp">
            <?php if($enlighten_image_3 || $enlighten_fa_icon_3){ ?>
                    <div class="image_wrap_fa">
                        <?php if($enlighten_image_3){ ?>
                            <div class="counter_image"><img src="<?php echo esc_url($enlighten_image_3); ?>" /></div>
                        <?php }
                        else{ ?>
                        <?php if($enlighten_fa_icon_3){ ?>
                            <span class="fa_icon_counter"><i class="<?php echo enlighten_escape_fa($enlighten_fa_icon_3); ?>"></i></span>
                        <?php }
                        } ?>
                    </div>
            <?php } ?>
            <?php if($enlighten_archive_count_3){ ?>
                <span class="counter_count"><?php echo absint($enlighten_archive_count_3); ?></span>
            <?php } ?>
            <?php if($enlighten_achieve_title_3){ ?>
                <span class="counter_title"><?php echo esc_html($enlighten_achieve_title_3); ?></span>
            <?php } ?>
            </div>
        <?php } ?>
        
        <?php if($enlighten_image_4 || $enlighten_fa_icon_4 || $enlighten_archive_count_4 || $enlighten_achieve_title_4){ ?>
            <div class="counter_fout_wrap wow fadeInUp">
            <?php if($enlighten_image_4 || $enlighten_fa_icon_4){ ?>
                    <div class="image_wrap_fa">
                        <?php if($enlighten_image_4){ ?>
                            <div class="counter_image"><img src="<?php echo esc_url($enlighten_image_4); ?>" /></div>
                        <?php } 
                        else{ ?>
                        <?php if($enlighten_fa_icon_4){ ?>
                            <span class="fa_icon_counter"><i class="<?php echo enlighten_escape_fa($enlighten_fa_icon_4); ?>"></i></span>
                        <?php }
                        } ?>
                    </div>
            <?php } ?>
            <?php if($enlighten_archive_count_4){ ?>
                <span class="counter_count"><?php echo absint($enlighten_archive_count_4); ?></span>
            <?php } ?>
            <?php if($enlighten_achieve_title_4){ ?>
                <span class="counter_title"><?php echo esc_html($enlighten_achieve_title_4); ?></span>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>