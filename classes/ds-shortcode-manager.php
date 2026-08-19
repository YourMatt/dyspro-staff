<?php

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

            $title = (isset ($staff_item->meta['_ds_title'][0]) ? $staff_item->meta['_ds_title'][0] : '');
            $start_date = (isset ($staff_item->meta['_ds_start_date'][0]) ? $staff_item->meta['_ds_start_date'][0] : '');
            $company = (isset ($staff_item->meta['_ds_company'][0]) ? $staff_item->meta['_ds_company'][0] : '');
            $committees = (isset ($staff_item->meta['_ds_committee'][0]) ? $staff_item->meta['_ds_committee'][0] : '');

            // everyone is a board member, so only call it out for those without another title
            $title_suffix = '';
            if ($start_date) {
                $title_suffix = ($title == 'Board Member' ? '' : '- Board Member ') . 'since ' . $start_date;
            }

            // add the staff item
            $staff_list .= '<div class="staff-member">';
            $staff_list .= '<div class="thumb">' . $staff_item->thumb . '</div>';
            $staff_list .= '<div class="bio">';
            $staff_list .= '<h3>' . $staff_item->post_title . '</h3>';
            if ($company)
                $staff_list .= '<h4>' . $company . '</h4>';
            if ($title)
                $staff_list .= '<h4>' . trim ($title . ' ' . $title_suffix) . '</h4>';
            if ($committees)
                $staff_list .= '<h4>' . $committees . ' Committee</h4>';
            $staff_list .= '<p>' . nl2br ($staff_item->post_content) . '</p>';
            $staff_list .= '</div>';
            $staff_list .= '</div>';

        }

        return $staff_list;

    }

}
