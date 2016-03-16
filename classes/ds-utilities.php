<?

class ds_utilities {

    public static function save_meta_field ($post_id, $field_name, $meta_name) {

        $current_value = get_post_meta ($post_id, $meta_name, true);
        $new_value = $_POST[$field_name];

        if ($current_value) {
            if (! $new_value) delete_post_meta ($post_id, $meta_name);
            else update_post_meta ($post_id, $meta_name, $new_value);
        }
        elseif ($new_value) {
            add_post_meta ($post_id, $meta_name, $new_value, true);
        }

    }

    public static function get_staff_items ($type) {

        // load the base staff posts
        $staff = get_posts (array (
            'post_type' => DS_POST_TYPE_NAME,
            'posts_per_page' => -1,
            'orderby' => 'ID', // TODO: Change to load by user-specified order
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => DS_CATEGORY_TYPE_NAME,
                    'field' => 'slug',
                    'terms' => $type
                )
            )
        ));
        if (!$staff) return array ();

        // load meta data for each staff item
        $num_staff = count ($staff);
        for ($i = 0; $i < $num_staff; $i++) {
            $staff[$i]->meta = get_post_meta ($staff[$i]->ID);
            $staff[$i]->thumb = get_the_post_thumbnail ($staff[$i]->ID, 'large');
        }

        return $staff;

    }

}