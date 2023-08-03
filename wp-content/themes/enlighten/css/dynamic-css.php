<?php
function enlighten_dynamic_styles(){
    $header_image = get_header_image();;
    if($header_image){
        ?>
        <style>
.header-banner-container{
    background-image: url(<?php echo esc_url($header_image); ?>);
    background-repeat: no-repeat;
}
        
        </style>
        <?php
    }
    else{
        ?>
        <style>
.header-banner-container{
    background-image: url(<?php echo esc_url(get_template_directory_uri(). '/images/banner.JPG') ?>);
    background-repeat: no-repeat;
}
        </style>
        <?php
    }
    $enlighten_service_bg_image = get_theme_mod('enlighten_service_bg_image');
    if($enlighten_service_bg_image){
        ?>
        <style>
            #section_service{
                background-image: url(<?php echo esc_url($enlighten_service_bg_image); ?>);
                background-repeat: no-repeat;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'enlighten_dynamic_styles', 100);