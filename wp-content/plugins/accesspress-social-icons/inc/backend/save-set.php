<?php defined('ABSPATH') or die("No script kiddies please!");
/**
 *  Posted Variables
 *  [action] => aps_add_new_set
    [set_name] => Testing Icon
    [display] => horizontal
    [num_rows] => 1
    [margins] => 5
    [tooltip] => 1
    [tooltip_bg] => #000000
    [tooltip_text_color] => #ffffff
    [icon_animation] => animation1
    [opacity_hover] => 0.75
    [icons] => Array
        (
            [Facebook] => Array
                (
                    [title] => Facebook
                    [icon_type] => image-icons
                    [image] => http://192.168.1.70/ultimate-social/wp-content/plugins/accesspress-social/icon-sets/set1/facebook.png
                    [icon_width] => 20
                    [icon_height] => 20
                    [link] => facebook.com
                    [link_target] => New Window
                    [tooltip_text] => Facebook Link
                    [font_icon] => 
                    [icon_size] => 
                    [icon_bg] => 1
                    [icon_bg_color] => 
                    [icon_shape] => square
                    [radius_top_left] => 
                    [radius_top_right] => 
                    [radius_bottom_left] => 
                    [radius_bottom_right] => 
                    [icon_color] => 
                    [icon_bg_color_hover] => 
                    [icon_color_hover] => 
                )

            [Twitter] => Array
                (
                    [title] => Twitter
                    [icon_type] => image-icons
                    [image] => http://192.168.1.70/ultimate-social/wp-content/plugins/accesspress-social/icon-sets/set1/twitter.png
                    [icon_width] => 20
                    [icon_height] => 20
                    [link] => twitter.com
                    [link_target] => New Window
                    [tooltip_text] => Twitter Link
                    [font_icon] => 
                    [icon_size] => 
                    [icon_bg] => 1
                    [icon_bg_color] => 
                    [icon_shape] => square
                    [radius_top_left] => 
                    [radius_top_right] => 
                    [radius_bottom_left] => 
                    [radius_bottom_right] => 
                    [icon_color] => 
                    [icon_bg_color_hover] => 
                    [icon_color_hover] => 
                )

            [Youtube] => Array
                (
                    [title] => Youtube
                    [icon_type] => image-icons
                    [image] => http://192.168.1.70/ultimate-social/wp-content/plugins/accesspress-social/icon-sets/set1/youtube.png
                    [icon_width] => 20
                    [icon_height] => 20
                    [link] => youtube.com
                    [link_target] => New Window
                    [tooltip_text] => Youtube Link
                    [font_icon] => 
                    [icon_size] => 
                    [icon_bg] => 1
                    [icon_bg_color] => 
                    [icon_shape] => square
                    [radius_top_left] => 
                    [radius_top_right] => 
                    [radius_bottom_left] => 
                    [radius_bottom_right] => 
                    [icon_color] => 
                    [icon_bg_color_hover] => 
                    [icon_color_hover] => 
                )

        )

    [aps_icon_background] => 0
    [aps_icon_shape] => square
    [aps_icon_set_submit] => Save icon set
    [aps_add_set_nonce] => 9bbc452ac3
    [_wp_http_referer] => /ultimate-social/wp-admin/admin.php?page=aps-social-add
**/

//$this->print_array($_POST);die();
foreach($_POST as $key=>$val)
{
    if($key=='icons')
    {
        $$key = $val;
    }
    else
    {
        $$key = sanitize_text_field($val);
        
    }
}
foreach($icons as $key=>$val)
{
    $icon_detail_array = array();
    foreach($val as $k=>$v)
    {
        if($k=='image' || $k=='link')
        {
            $icon_detail_array[$k] = esc_url_raw($v);
        }
        else
        {
            $icon_detail_array[$k] = sanitize_text_field($v);
        }
    }
$icons[$key] = $icon_detail_array;
}
$icon_extra = array('icon_set_type'=>$icon_set_type,
                    'icon_theme_id'=>$icon_theme_id,
                    'num_columns'=>$num_columns,
                    'tooltip_position'=>$tooltip_position);
$icon_extra = serialize($icon_extra);
global $wpdb;
$icons = serialize($icons);
$table_name = $wpdb->prefix . "aps_social_icons";
if(isset($si_id))
{
    $wpdb->update( 
	$table_name, 
	array( 
		'icon_set_name' => $set_name,
        'icon_display'=>$display,
        'num_rows' => $num_rows,
        'icon_margin'=>$margins,
        'icon_tooltip'=>$tooltip,
        'tooltip_background'=>$tooltip_bg,
        'tooltip_text_color'=> $tooltip_text_color,
        'opacity_hover'=>$opacity_hover,
        'icon_animation'=>$icon_animation,
        'icon_details'=>$icons,
        'icon_extra'=>$icon_extra 
	),
    array('si_id'=>intval($si_id)), 
	array( 
		'%s',
        '%s',
        '%s',
        '%s',
        '%d', 
		'%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s' 
	),
     array('%d')
);
//$_SESSION['aps_message'] = __('Icon Set Updated Successfully','accesspress-social-icons');
}
else
{
    $wpdb->insert( 
	$table_name, 
array( 
		'icon_set_name' => $set_name,
        'icon_display'=>$display,
        'num_rows' => $num_rows,
        'icon_margin'=>$margins,
        'icon_tooltip'=>$tooltip,
        'tooltip_background'=>$tooltip_bg,
        'tooltip_text_color'=> $tooltip_text_color,
        'opacity_hover'=>$opacity_hover,
        'icon_animation'=>$icon_animation,
        'icon_details'=>$icons,
        'icon_extra'=>$icon_extra 
	),
	array( 
		'%s',
        '%s',
        '%s',
        '%s',
        '%d', 
		'%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%s' 
	)
);
//$_SESSION['aps_message'] = __('Icon Set Saved Successfully','accesspress-social-icons');
}
if(isset($_POST['current_page']))
{
    wp_redirect(sanitize_text_field($_POST['current_page']).'&message=1');
}
else
{
  wp_redirect(admin_url().'admin.php?page=aps-social&message=1');    
}


exit;
