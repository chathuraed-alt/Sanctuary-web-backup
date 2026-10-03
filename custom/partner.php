<?php

//custom post Partner
function my_custom_post_partners() {

    $labels = array(
        'name'               => _x( 'Partners', 'post type general name' ),
        'singular_name'      => _x( 'Partners', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'partners' ),
        'add_new_item'       => __( 'Add New Partners' ),
        'edit_item'          => __( 'Edit Partners' ),
        'new_item'           => __( 'New Partners' ),
        'all_items'          => __( 'All Partners' ),
        'view_item'          => __( 'View Partners' ),
        'search_items'       => __( 'Search Partners' ),
        'not_found'          => __( 'No Partners found' ),
        'not_found_in_trash' => __( 'No Partners found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Partners'
    );

    $args = array(
        'label'               => __( 'partners', 'sanctuaryholdings' ),
        'description'         => __( 'Holds our Partners Image data', 'sanctuaryholdings' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', ),
        'taxonomies'          => array( 'category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 10,
        'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'partners', $args );

}

add_action( 'init', 'my_custom_post_partners',0 );

// Meta boxes
add_filter( 'rwmb_meta_boxes', 'partners_register_meta_boxes' );

/*
 * Register meta boxes
 *
 * @return void
 */
function partners_register_meta_boxes( $meta_boxes )
{
    $prefix = 'partners_bio_';

    $meta_boxes[] = array(

        'id' => 'standard',

        'title' => __( 'Partners Image', 'rwmb' ),

        'pages' => array( 'partners' ),

        'context' => 'normal',

        'priority' => 'high',

        'autosave' => true,

        'fields' => array(

           

        ),

    );


    return $meta_boxes;
}