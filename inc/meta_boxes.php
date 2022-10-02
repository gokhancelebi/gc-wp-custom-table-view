<?php


# create select box to select post type for the table
add_action( 'add_meta_boxes', 'gc_table_add_meta_box' );
function gc_table_add_meta_box() {
    add_meta_box(
        'gc_table_post_type',
        __( 'Post Type', 'gc_table_textdomain' ),
        'gc_table_post_type_meta_box_callback',
        'gc_table'
    );
    # add another field for listing limit
    add_meta_box(
        'gc_table_post_limit',
        __( 'Post Limit', 'gc_table_textdomain' ),
        'gc_table_post_limit_meta_box_callback',
        'gc_table'
    );
    # add new meta box to show table shortcode if post is saved
    add_meta_box(
        'gc_table_shortcode',
        __( 'Shortcode', 'gc_table_textdomain' ),
        'gc_table_shortcode_meta_box_callback',
        'gc_table'
    );
}

function gc_table_shortcode_meta_box_callback(){
    global $post;
    $id = $post->ID;
    if (get_current_screen()->action != "add"){
        echo '<input type="text" value="[gc_custom_table id='.$id.']" readonly style="width:100%" />';
    }
}

function gc_table_post_limit_meta_box_callback(){
    global $post;
    $post_limit = get_post_meta($post->ID, 'gc_table_post_limit', true);
    if (!$post_limit) {
        $post_limit = 10;
    }
    echo '<label>Post Limit</label> ';
    echo '<input type="number" name="gc_table_post_limit" value="'.$post_limit.'" />';
}


function gc_table_post_type_meta_box_callback(){
    $post_types = get_post_types( array( 'public' => true ), 'objects' );
    $post_type = get_post_meta( get_the_ID(), 'gc_table_post_type', true );
    echo '<select name="gc_table_post_type">';
    foreach ( $post_types as $post_type_item ) {
        echo '<option value="' . $post_type_item->name . '" ' . selected( $post_type, $post_type_item->name, false ) . '>' . $post_type_item->label . '</option>';
    }
    echo '</select>';
}
