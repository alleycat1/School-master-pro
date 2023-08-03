<?php
function enlighten_sanitize_checkbox($input){
    if ( $input == 1 ) {
            return 1;
        } else {
            return '';
        }
}
function enlighten_sanitize_textarea($input){
    return wp_kses_post( force_balance_tags( $input ) );
}

function enlighten_sanitize_fa($input){
    
    $fa_variable = array(
        'i' => array(
            'class' =>array(),
            'aria-hidden' => array()
        )
    );
    
    return wp_kses($input,$fa_variable);
}
function enlighten_sanitize_menu_alignment($input){
    $menu_alignment =  array(
            '' => '--Choose--',
            'left' => 'Left',
            'center' => 'Center',
            'right' => 'Right'
    );
    if(array_key_exists($input,$menu_alignment))
    {
        return $input;
    }
    else
    {
        return '';
    }
}

function enlighten_category_list_sanitize($input){
    $categories_list = enlighten_category_list();
    if(array_key_exists($input,$categories_list))
    {
        return $input;
    }
    else{
        return '';
    }
}
