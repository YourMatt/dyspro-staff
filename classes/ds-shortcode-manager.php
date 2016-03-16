<?

class ds_shortcode_manager {

    public function build_staff_list ($atts) {

        $staff_list = '';
        $staff_items = ds_utilities::get_staff_items ($atts['type']);

        // return if no staff items if none found
        if (!$staff_items) {
            return $staff_list;
        }

        // display all staff items
        foreach ($staff_items as $staff_item) {

            // add the staff item
            $staff_list .= '<p>' . $staff_item->thumb . '</p>';
            $staff_list .= '<h3>' . $staff_item->post_title . '</h3>';
            if ($staff_item->meta['_ds_title'])
                $staff_list .= '<p><strong>' . $staff_item->meta['_ds_title'][0] . '</strong></p>';
            $staff_list .= '<p>' . $staff_item->post_content . '</p>';

        }

        return $staff_list;

    }

}