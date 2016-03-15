<?

class ds_details_manager {

    private $nonce_action = 'ds_details';

    public function __construct () {

        // add save callbacks
        add_action ('save_post', array ($this, 'save_details_meta_form'));

    }

    // Administration forms
    function add_meta_boxes () {

        // add scripts and styles for the meta boxes
        wp_enqueue_style ('ds_details_css', DS_BASE_WEB_PATH . 'content/css/meta.css');

        // create the location meta box
        add_meta_box (
            'details',
            'Detail Information',
            array ($this, 'build_details_meta_form'),
            DS_POST_TYPE_NAME
        );

    }

    function build_details_meta_form ($post) {

        // create the nonce
        wp_nonce_field ($this->nonce_action, 'ds_details_nonce');

        // load current values
        $staff_data = get_metadata ('post', $post->ID);

        // add the form contents
        include (DS_BASE_PATH . "/content/meta-details.php");

    }

    function save_details_meta_form ($post_id) {

        // verify the nonce
        if (! wp_verify_nonce ($_POST['ds_details_nonce'], $this->nonce_action)) return $post_id;

        // save the contact data to meta fields
        ds_utilities::save_meta_field ($post_id, 'staff_title', '_ds_title');

        return $post_id;

    }

}
