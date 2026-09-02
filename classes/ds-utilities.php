<?php

class ds_utilities {

    // staff titles listed in the order they should display, everything else follows
    private static $title_sort_order = array (
        'chair',
        'immediate past',
        'vice chair',
        'treasurer',
        'secretary',
        '',
        'board member'
    );

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

        // sort by title, then by name within each title
        usort ($staff, function ($staff_item1, $staff_item2) {
            $order = self::get_title_sort_position ($staff_item1) - self::get_title_sort_position ($staff_item2);
            if ($order) return $order;
            return strcasecmp ($staff_item1->post_title, $staff_item2->post_title);
        });

        return $staff;

    }

    private static function get_title_sort_position ($staff_item) {

        $title = (isset ($staff_item->meta['_ds_title'][0]) ? strtolower (trim ($staff_item->meta['_ds_title'][0])) : '');

        $position = array_search ($title, self::$title_sort_order, true);

        // titles not in the list sort after all the ones that are
        return ($position === false ? count (self::$title_sort_order) : $position);

    }

}
