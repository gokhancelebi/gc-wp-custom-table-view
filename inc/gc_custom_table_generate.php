<?php
/*
 * This function generates table from post id
 *
 *
 */

function gc_custom_table_generate($id, $page = 1, $order_by = false, $order = false, $search_query = "")
{

    $post_type = get_post_meta($id, 'gc_table_post_type', true);

    if ($order_by == false || $order_by == "") {
        $order_by = "ID";
    }
    if ($order == false || $order == "") {
        $order = "ASC";
    }
    $post_limit = get_post_meta($id, 'gc_table_post_limit', true);
    $post_query = array(
        'post_type' => $post_type,
        'posts_per_page' => $post_limit,
        'paged' => $page,
        'order' => $order,
        'orderby' => $order_by,
        's' => $search_query,
        'post_status' => 'publish'
    );

    $posts = new WP_Query($post_query);
    $posts_count = $posts->found_posts;
    $post_results = $posts->posts;
    # get column names from Advanced Custom Fields plugin based on post_type

    $table = '<table class="gc-custom-table">';
    $table .= '<thead>';
    $table .= '<tr>';
    $post_fields = "";
    if ($posts_count) {
        $field_groups = acf_get_field_groups(array('post_type' => $post_type));
        $post_fields = acf_get_fields($field_groups[0]['key']);
        foreach ($post_fields as $post_field) {
            $table .= '<th class="gc-custom-table-header" data-field="' . $post_field['name'] . '">' . $post_field['label'] . '</th>';
        }
    }

    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';
    if ($posts_count) {
        foreach ($post_results as $post) {
            $table .= '<tr>';
            if ($post_fields != "") {
                foreach ($post_fields as $post_field) {
                    $table .= '<td class="gc-custom-table-cell" data-field="' . $post_field['name'] . '">';
                    $table .= get_field($post_field['name'], $post->ID);
                    $table .= '</td>';
                }
            }
            $table .= '</tr>';
        }
    }

    $table .= '</tbody>';
    $table .= '</table>';
    return $table;

}