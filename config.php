<?php
global $wpdb;

// define paths
define ('DS_BASE_PATH', dirname (__FILE__));
define ('DS_BASE_WEB_PATH', plugin_dir_url ( __FILE__ ));

// define roles
define ('DS_POST_TYPE_NAME', 'ds_staff');
define ('DS_CATEGORY_TYPE_NAME', 'ds_staff_type');

// database tables - will use meta system so all of these can be removed later
define ('DS_TABLE_POSTS', $wpdb->prefix . 'posts');

// set plugin settings
define ('DS_ADMIN_LINK_POSITION', 23);

// load support files
require_once (DS_BASE_PATH . '/classes/ds-utilities.php');
require_once (DS_BASE_PATH . '/classes/ds-plugin-manager.php');
require_once (DS_BASE_PATH . '/classes/ds-details-manager.php');
require_once (DS_BASE_PATH . '/classes/ds-shortcode-manager.php');