<?php

# callback to save post type settings
add_action( 'save_post', 'gc_table_save_post_type' );
function gc_table_save_post_type( $post_id ) {
    if ( array_key_exists( 'gc_table_post_type', $_POST ) ) {
        update_post_meta(
            $post_id,
            'gc_table_post_type',
            $_POST['gc_table_post_type']
        );
    }
    if ( array_key_exists( 'gc_table_post_limit', $_POST ) ) {
        update_post_meta(
            $post_id,
            'gc_table_post_limit',
            $_POST['gc_table_post_limit']
        );
    }
}
