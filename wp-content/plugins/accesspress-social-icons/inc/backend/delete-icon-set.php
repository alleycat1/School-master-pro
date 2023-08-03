<?php
defined('ABSPATH') or die("No script kiddies please!");
global $wpdb;
$si_id = intval(sanitize_text_field($_GET['si_id']));
$table_name = $table_name = $wpdb->prefix . "aps_social_icons";
$wpdb->delete( $table_name, array( 'si_id' => $si_id ), array( '%d' ) );
//$_SESSION['aps_message'] = __('Icon set deleted successfully.','accesspress-social-icons');
wp_redirect(admin_url().'admin.php?page=aps-social&message=3');
exit;