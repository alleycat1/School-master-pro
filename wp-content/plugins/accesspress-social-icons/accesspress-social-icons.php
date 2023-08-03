<?php
defined('ABSPATH') or die("No script kiddies please!");
/**
 * Plugin Name:AccessPress Social Icons
 * Plugin URI: https://accesspressthemes.com/wordpress-plugins/accesspress-social-icons/
 * Description: A plugin to add social icons in your site wherever you want dynamically with handful of configurable settings.
 * Version:1.6.8
 * Author:AccessPress Themes
 * Author URI:http://accesspressthemes.com/
 * Text Domain: accesspress-social-icons
 * Domain Path: /languages/
 * License:GPLv2 or later
 * */

/**
 * Register of widgets
 * */
include_once('inc/backend/widgets.php');
if (!class_exists('APS_Class')) {

    class APS_Class {
         /**
         * Initialization of plugin from constructor
         * */
        function __construct() {
            $this->define_constants();
            register_activation_hook(__FILE__, array($this, 'plugin_activation')); //calls plugin activation function
            add_action('init', array($this, 'plugin_text_domain')); //loads text domain for translation ready
            add_action('wp_enqueue_scripts', array($this, 'register_frontend_assets'));//registers assets for frontend
            add_action('admin_menu', array($this, 'add_aps_menu')); //adds plugin menu in wp-admin
            add_action('admin_enqueue_scripts', array($this, 'register_admin_assets')); //registers all the assets required for wp-admin
            add_action('admin_post_aps_add_new_set', array($this, 'aps_add_new_set')); //add new set action
            add_action('admin_post_aps_edit_action', array($this, 'aps_edit_action')); //icon set edit action
            add_action('admin_post_aps_delete_action', array($this, 'aps_delete_action')); //icon set delete action
            add_action('admin_post_aps_copy_action', array($this, 'aps_copy_action')); //icon set copy action
            add_shortcode('aps-social', array($this, 'aps_social_shortcode')); //adds the aps-social shortcode
            add_action('wp_ajax_aps_icon_list_action', array($this, 'aps_icon_list_action')); //admin ajax action for icon listing 
            add_action('wp_ajax_nopriv_aps_icon_list_action', array($this, 'no_permission')); //action for unauthenticate admin ajax call
            add_action('wp_ajax_get_theme_icons', array($this, 'get_theme_icons')); //admin ajax for getting theme icons
            add_action('wp_ajax_nopriv_get_theme_icons', array($this, 'no_permission')); //ajax action for unathenticate admin ajax call
            add_action('widgets_init', array($this, 'register_aps_widget')); //register aps widget
            add_filter('apsi_image_url',array($this,'check_url'));
            
        }
        
        /**
         * Declartion of necessary constants for plugin
         * 
         * Previously declare outside the class
         * 
         * @since 1.6.3
         * 
         * */ 
        function define_constants(){
           
            if (!defined('APS_IMAGE_DIR')) {
                define('APS_IMAGE_DIR', plugin_dir_url(__FILE__) . 'images');
            }
            if (!defined('APS_JS_DIR')) {
                define('APS_JS_DIR', plugin_dir_url(__FILE__) . 'js');
            }
            if (!defined('APS_CSS_DIR')) {
                define('APS_CSS_DIR', plugin_dir_url(__FILE__) . 'css');
            }
            
            /**
             * @since 1.5.3
             * 
             * */
             defined('APSI_PLUGIN_URL') or define('APSI_PLUGIN_URL',plugin_dir_url(__FILE__));
             
            if (!defined('APS_ICONS_DIR')) {
                /**
                 * apsi_icons_sets_directory filter
                 * 
                 * since @1.5.2
                 * 
                 * Can be hooked to change http to https
                 * 
                 * */
                define('APS_ICONS_DIR', apply_filters('apsi_icon_sets_directory',plugin_dir_url(__FILE__) . 'icon-sets')); 
            }
            if (!defined('APS_LANG_DIR')) {
                define('APS_LANG_DIR', basename( dirname( __FILE__ ) ) . '/languages');
            }
            if(!defined('APS_VERSION'))
            {
                define('APS_VERSION','1.6.8');
            }
        }

        //called when plugin is activated
        function plugin_activation() {
            include_once('inc/backend/activation.php');
        }

        //loads the text domain for translation
        function plugin_text_domain() {
            load_plugin_textdomain('accesspress-social-icons', FALSE, APS_LANG_DIR);
        }

        //adds plugin menu in wp-admin
        function add_aps_menu() {
            add_menu_page('AccessPress Social', 'AccessPress <br/> Social Icons', 'manage_options', 'aps-social', array($this, 'main_page'), APS_IMAGE_DIR . '/si-icon.png');
            add_submenu_page('aps-social', __('Social Icons','accesspress-social-icons'), __('Social Icons','accesspress-social-icons'), 'manage_options', 'aps-social', array($this, 'main_page'));
            add_submenu_page('aps-social', __('Add New Set','accesspress-social-icons'), __('Add New Set','accesspress-social-icons'), 'manage_options', 'aps-social-add', array($this, 'add_new_set'));
            add_submenu_page('aps-social', __('How to use','accesspress-social-icons'), __('How to use','accesspress-social-icons'), 'manage_options', 'aps-social-how-to-use', array($this, 'how_to_use'));
            add_submenu_page('aps-social', __('About','accesspress-social-icons'), __('About','accesspress-social-icons'), 'manage_options', 'aps-about', array($this, 'about'));
            add_submenu_page('aps-social', __('More WordPress Resources','accesspress-social-icons'), __('More WordPress Resources','accesspress-social-icons'), 'manage_options', 'aps-more-wp-resources', array($this, 'wp_resources'));
        }

        //plugin's main page
        function main_page() {
            include_once('inc/backend/main-page.php');
        }

        //Add new set of social icons
        function add_new_set() {
            include_once('inc/backend/add-new-set.php');
        }
        
        function wp_resources(){
            include_once('inc/backend/wp-resources.php');
        }

        //registers all the js and css in wp-admin
        function register_admin_assets() {
            //including the scripts in the plugins pages only
            if (isset($_GET['page']) && ($_GET['page'] == 'aps-social' || $_GET['page'] == 'aps-social-add' || $_GET['page'] == 'aps-about'|| $_GET['page'] == 'aps-social-how-to-use' || $_GET['page'] == 'aps-more-wp-resources')) {
                $aps_script_variable = array('icon_preview' => __('Icon Preview', 'accesspress-social-icons'),
                    'icon_link' => __('Icon Link', 'accesspress-social-icons'),
                    'icon_link_target' => __('Icon Link Target','accesspress-social-icons'),
                    'icon_delete_confirm' => __('Are you sure you want to delete this icon from this list?', 'accesspress-social-icons'),
                    'set_name_required_message' => __('Please enter the name for the set', 'accesspress-social-icons'),
                    'min_icon_required_message' => __('Please add at least one icon in the set', 'accesspress-social-icons'),
                    'ajax_url' => admin_url() . 'admin-ajax.php',
                    'ajax_nonce' => wp_create_nonce('aps-ajax-nonce'),
                    'icon_warning' => __('Are you sure you want to discard the icons added previously?', 'accesspress-social-icons'),
                    'icon_collapse' => __('Collapse All', 'accesspress-social-icons'),
                    'icon_expand' => __('Expand All', 'accesspress-social-icons'));
                /**
                 * Backend CSS
                 * */
                wp_enqueue_style('aps-admin-css', APS_CSS_DIR . '/backend.css',false,APS_VERSION); //registering plugin admin css
                wp_enqueue_style('aps-animate-css', APS_CSS_DIR . '/animate.css',false,APS_VERSION); //animate.css library
                wp_enqueue_style('thickbox'); //for including wp thickbox css
                wp_enqueue_style('wp-color-picker'); //for including color picker css
                

                /**
                 * Backend JS
                 * */
                wp_enqueue_script('media-upload'); //for uploading image using wp native uploader
                wp_enqueue_script('thickbox'); //for uploading image using wp native uploader + thickbox 
                wp_enqueue_script('aps-admin-js', APS_JS_DIR . '/backend.js', array('jquery', 'jquery-ui-sortable', 'wp-color-picker'),APS_VERSION);//registering plugin's admin js
                wp_localize_script('aps-admin-js', 'aps_script_variable', $aps_script_variable); //localization of php variable in aps-admin-js
            }
        }

        //registers all the assets for frontend
        function register_frontend_assets() {
            /**
             * Frontend Style
             * */
            wp_enqueue_style('aps-animate-css', APS_CSS_DIR . '/animate.css',false,APS_VERSION);//registering animate.css
            wp_enqueue_style('aps-frontend-css', APS_CSS_DIR . '/frontend.css',false,APS_VERSION); //registering frontend css
            
            /**
             * Frontend JS
             * */
            wp_enqueue_script('aps-frontend-js', APS_JS_DIR . '/frontend.js', array('jquery'),APS_VERSION);//registering frontend js 
        }

        //action to save the set in db
        function aps_add_new_set() {
            if (isset($_POST['aps_add_set_nonce'], $_POST['aps_icon_set_submit']) && wp_verify_nonce($_POST['aps_add_set_nonce'], 'aps_add_new_set')) {
                include_once('inc/backend/save-set.php');
            } else {
                die('No script kiddies please!');
            }
        }

        //prints the array in pre format
        function print_array($array) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }

        

        //Icon set delete section
        function aps_delete_action() {
            if (isset($_GET['action'], $_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'aps-delete-nonce')) {
                include_once('inc/backend/delete-icon-set.php');
            } else {
                die('No script kiddies please!');
            }
        }
        //Icon set copy section
        function aps_copy_action() {
            if (isset($_GET['action'], $_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'aps-copy-nonce')) {
                include_once('inc/backend/copy-icon-set.php');
            } else {
                die('No script kiddies please!');
            }
        }
        

        //Icon set edit action
        function aps_edit_action() {

            if (isset($_POST['aps_edit_set_nonce'], $_POST['aps_icon_set_submit']) && wp_verify_nonce($_POST['aps_edit_set_nonce'], 'aps_edit_action')) {
                include_once('inc/backend/save-set.php');
            } else {
                die('No script kiddies please!');
            }
        }

        
        

        //shortcode function
        function aps_social_shortcode($atts) {
            if (isset($atts['id'])) {
                //return (print_r($atts,true));
                ob_start();
                include('inc/frontend/shortcode.php');
                $html = ob_get_contents();
                ob_get_clean();
                return $html;
            }
        }

        //lists the available icons 
        function aps_icon_list_action() {
            if (wp_verify_nonce($_POST['_wpnonce'], 'aps-ajax-nonce')) {
                $plugin_path = plugin_dir_path(__FILE__);
                
                for ($i = 1; $i <= 12; $i++) {
                    $icon_set_image_array = array();
                    ?>
                    <div class="aps-set-wrapper" id="aps-set-<?php echo $i; ?>">
                        <h3>Set <?php echo $i; ?></h3>
                        <div class="aps-row">
                            <?php
                            $handle = opendir(dirname(realpath(__FILE__)) . '/icon-sets/png/set' . $i);
                            while ($file = readdir($handle)) {
                                $filename_array = explode('.', $file);
                                $filename = ucfirst($filename_array[0]);
                                $ext = end($filename_array);
                                if ($file !== '.' && $file !== '..' && $ext == 'png') {
                                    $icon_set_image_array[] = $file;


                                   
                                }//if close
                            }//while close
                            if (count($icon_set_image_array) > 0) {
                                natsort($icon_set_image_array);
                                foreach ($icon_set_image_array as $file) {
                                    $filename_array = explode('.', $file);
                                    $filename = ucfirst($filename_array[0]);
                                    ?>
                                    <div class="aps-col-one-fourth">
                                        <div class="aps-set-image-wrapper">
                                            <a href='javascript:void(0);'>
                                                <img src="<?php echo APS_ICONS_DIR . '/png/set' . $i . '/' . $file; ?>" alt="<?php echo $filename; ?>" title="<?php echo $filename; ?>"/>
                                                <span class="aps-set-image-title"><?php echo $filename; ?></span>
                                            </a>
                                        </div>
                                    </div>
                            <?php
                        }
                    }
                    
                    ?>
                        </div>
                    </div><!--aps-set-wrapper-->
                    <div class="clear"></div>
                    <?php
                }
                die();
            } else {
                die('No script kiddies please!');
            }
        }

        //lists the icons of specific theme
        function get_theme_icons() {

            if (wp_verify_nonce($_POST['_wpnonce'], 'aps-ajax-nonce')) {
                $plugin_path = plugin_dir_path(__FILE__);
                $sub_folder = sanitize_text_field($_POST['sub_folder']);
                $folder = sanitize_text_field($_POST['folder']);
                $handle = opendir(dirname(realpath(__FILE__)) . '/icon-sets/' . $sub_folder . '/' . $folder);
                $icon_counter = 0;
                $set_image_array = array();
                while ($file = readdir($handle)) {
                    $filename_array = explode('.', $file);
                    $filename = ucfirst($filename_array[0]);
                    $ext = end($filename_array);
                    if ($file !== '.' && $file !== '..' && $ext == 'png') {
                        $icon_counter++;
                        $set_image_array[] = $file;
                    }
                }

                if (count($set_image_array) > 0) {
                    natsort($set_image_array);
                    $image_url_array = array();
                    foreach ($set_image_array as $file) {
                        $filename_array = explode('.', $file);
                        $filename = ucfirst($filename_array[0]);
                        if($_POST['url_only']=='yes')
                        {
                         $image_url_array[$filename] = APS_ICONS_DIR . '/' . $sub_folder . '/' . $folder . '/' . $file; 
                        }
                        else
                        {
                            include('inc/backend/theme-icon-set.php');
                        }
                        
                    }
                    if($_POST['url_only']=='yes')
                    {
                        die(json_encode($image_url_array));
                    }
                }
            } else {
                die('No script kiddies please');
            }
            die();
        }

        //prevents unauthorized ajax call
        function no_permission() {
            die('No script kiddies please!');
        }

        //returns the current page url
        function curPageURL() {
            $pageURL = 'http';
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                $pageURL .= "s";
            }
            $pageURL .= "://";
            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            }
            return $pageURL;
        }

        //registers the APS widget
        function register_aps_widget() {
            register_widget('APS_Widget');
        }

        //returns total number of displaying icons
        function get_total_display_icons($icons)
        {
            $counter = 0;
            foreach($icons as $icon)
            {
                if($icon['link']!='')
                {
                    $counter++;
                }
            }
            return $counter;
        }
        
        //about section
        function about()
        {
            include('inc/backend/about.php');
        }
        
        //how to use section
        function how_to_use()
        {
            include('inc/backend/how-to-use.php');
        }
        
        /**
         * @since 1.5.3
         * 
         * Checks the URL of the image and matches with current site URL
         *  
         * */
         function check_url($image_url){
            if (strpos($image_url, '/icon-sets/') !== false){
                    $image_url_array = explode('/icon-sets/',$image_url);
                    $plugin_icon_url = APS_ICONS_DIR;
                    //echo $image_url_array[1];
                    $actual_image_url = $plugin_icon_url.'/'.$image_url_array[1];
                    return $actual_image_url;
                
            }else{
                return $image_url;
            }
            
            
         }

    }

    //APS_Class termination

    $aps_object = new APS_Class();
}// class exists condition check
 
 