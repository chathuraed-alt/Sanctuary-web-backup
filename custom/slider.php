<?php

//custom post Slider images
function my_custom_post_product() {

    $labels = array(
        'name'               => _x( 'Slider Image', 'post type general name' ),
        'singular_name'      => _x( 'Slider', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'book' ),
        'add_new_item'       => __( 'Add New Slider Image' ),
        'edit_item'          => __( 'Edit Slider Image' ),
        'new_item'           => __( 'New Slider Image' ),
        'all_items'          => __( 'All Images' ),
        'view_item'          => __( 'View Images' ),
        'search_items'       => __( 'Search Images' ),
        'not_found'          => __( 'No Images found' ),
        'not_found_in_trash' => __( 'No Images found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Slider'
    );

    $args = array(
        'label'               => __( 'slider', 'alameda' ),
        'description'         => __( 'Holds our Slider Image data', 'alameda' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', ),
        'taxonomies'          => array( 'category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 10,
        'menu_icon'           => 'dashicons-format-image',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'slider', $args );

}

add_action( 'init', 'my_custom_post_product',0 );

// Meta boxes
add_filter( 'rwmb_meta_boxes', 'slider_register_meta_boxes' );

/*
 * Register meta boxes
 *
 * @return void
 */
function slider_register_meta_boxes( $meta_boxes )
{
    $prefix = 'slider_bio_';

    $meta_boxes[] = array(

        'id' => 'standard',

        'title' => __( 'Slider Image', 'rwmb' ),

        'pages' => array( 'slider' ),

        'context' => 'normal',

        'priority' => 'high',

        'autosave' => true,

        'fields' => array(

           

        ),

    );


    return $meta_boxes;
}