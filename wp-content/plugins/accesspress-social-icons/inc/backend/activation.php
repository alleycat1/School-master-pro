<?php 
defined('ABSPATH') or die("No script kiddies please!");
global $wpdb;
/**
 * Creating table for storing social icons sets
 * */
$table_name = $wpdb->prefix . 'aps_social_icons';
$sql = "CREATE TABLE IF NOT EXISTS $table_name 
                                    (
                                    si_id INT NOT NULL AUTO_INCREMENT, 
                                    PRIMARY KEY(si_id),
                                    icon_set_name VARCHAR(255),
                                    icon_display VARCHAR(255),
                                    num_rows VARCHAR(255),
                                    icon_margin VARCHAR(255),
                                    icon_tooltip INT NOT NULL,
                                    tooltip_background VARCHAR(255),
                                    tooltip_text_color VARCHAR(255),
                                    icon_animation VARCHAR(255),
                                    opacity_hover VARCHAR(20),
                                    icon_details TEXT,
                                    icon_extra TEXT
                                    )";
$wpdb->query($sql);