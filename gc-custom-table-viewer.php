<?php
/*
 * Plugin Name: GC Custom Table Viewer from Custom Post Types and Custom fiels
 * Description: This plugin allows you to create a custom table from custom post types and custom fields
 *
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_get_field_groups')) {
    # require_once all the files in the inc folder
    foreach (glob(plugin_dir_path(__FILE__) . "inc/*.php") as $filename) {
        require_once $filename;
    }

    # Create custom post type to create new table
    add_action('init', 'gc_table_create_post_type');
    function gc_table_create_post_type()
    {
        register_post_type('gc_table',
            array(
                'labels' => array(
                    'name' => __('Tables'),
                    'singular_name' => __('Table')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'tables'),
                'supports' => array('title'),
            )
        );
    }

    # add short code that takes post id as parameter
    add_shortcode('gc_custom_table', 'gc_custom_table_shortcode');
    function gc_custom_table_shortcode($attr)
    {
        # get id from shortcode
        $id = $attr['id'];
        $table = '<div id="table-content">';
        $table .= '<input type="text" id="gc-table-search" placeholder="Search" value="" style="margin-left: auto; margin-bottom:10px; float:right" />';
        $table .= gc_custom_table_generate($id);
        $table .= '</div>';
        # return the table
        return $table;
    }

}else{
    # show wordpress alert to Install Advanced Custom Fields plugin
    add_action('admin_notices', 'gc_custom_table_plugin_notice');
    function gc_custom_table_plugin_notice()
    {
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php _e('Please install Advanced Custom Fields plugin to use GC Custom Table Viewer plugin', 'sample-text-domain'); ?></p>
        </div>
        <?php
    }
}
