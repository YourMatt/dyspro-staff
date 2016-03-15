<?

class ds_plugin_manager {

    // holds objects for querying post meta data
    private $details_manager;

    // initialize query objects
    public function __construct () {

        $this->details_manager = new ds_details_manager ();

    }

    // run when activating the plugin
    function activate () {

    }

    // run when deactivating the plugin
    function deactivate () {

    }

    // run when uninstalling the plugin
    function uninstall () {

    }

    // add the staff post type - this is loaded on init
    function register_staff_post_type () {

        register_post_type (
            DS_POST_TYPE_NAME,
            array(
                'labels' => array (
                    'name' => 'Staff Members',
                    'singular_name' => 'Staff Member',
                    'add_new' => 'Add New',
                    'add_new_item' => 'Add New Staff Member',
                    'edit_item' => 'Edit Staff Member'
                ),
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'rewrite' => array (
                    'slug'=> '',
                    'with_front'=> false,
                    'feeds'=> true,
                    'pages'=> true
                ),
                'capability_type' => 'page',
                'has_archive' => false,
                'hierarchical' => true,
                'menu_icon' => 'dashicons-groups',
                'menu_position' => DS_ADMIN_LINK_POSITION,
                'supports' => array (
                    'thumbnail',
                    'title',
                    'editor',
                    'excerpt'
                )
            )
        );

    }

}