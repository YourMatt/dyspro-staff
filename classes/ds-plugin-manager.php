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

    // create the taxonomy for categorization of staff members
    function register_staff_taxonomy () {

        $taxonomy_labels = array (
            'name' => 'Staff Types',
            'singular_name' => 'Staff Type',
            'search_items' => 'Search Staff Types',
            'all_items' => 'All Staff Types',
            'edit_item' => 'Edit Staff Type',
            'update_item' => 'Update Staff Type',
            'add_new_item' => 'Add Staff Type',
            'new_item_name' => 'New Staff Type',
            'menu_name' => 'Staff Types'
        );

        $taxonomy_options = array (
            'hierarchical' => true,
            'labels' => $taxonomy_labels,
            'show_ui' => true,
            'show_admin_column' => false,
            'show_tagcloud' => false
        );

        register_taxonomy (DS_CATEGORY_TYPE_NAME, DS_POST_TYPE_NAME, $taxonomy_options);

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
                    'slug'=> 'staff',
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
                    'editor'
                ),
                'taxonomies' => array (DS_CATEGORY_TYPE_NAME)
            )
        );

    }

}