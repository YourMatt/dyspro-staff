<?php
/*
Plugin Name: Dyspro Staff
Plugin URI:
Description: Creates a new staff content type and allows for managing description and photos.
Version: 0.9
Author: Dyspro Media
Author URI: http://dyspromedia.com
*/

// load configuration variables
require_once(dirname(__FILE__) . '/config.php');

// initialize objects
$ds_plugin_manager = new ds_plugin_manager ();
$ds_details_manager = new ds_details_manager ();
$ds_shortcode_manager = new ds_shortcode_manager ();

// add installation script
register_activation_hook (__FILE__, array ($ds_plugin_manager, 'activate'));
register_deactivation_hook(__FILE__, array ($ds_plugin_manager, 'deactivate'));
register_uninstall_hook (__FILE__, array ($ds_plugin_manager, 'uninstall'));

// set up actions
add_action ('init', array ($ds_plugin_manager, 'register_staff_taxonomy'));
add_action ('init', array ($ds_plugin_manager, 'register_staff_post_type'));

// set up shortcodes
add_shortcode ('ds_staff_list', array ($ds_shortcode_manager, 'build_staff_list'));