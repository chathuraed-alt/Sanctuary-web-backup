<?php

//custom post News
function my_custom_post_news() {

    $labels = array(
        'name'               => _x( 'News', 'post type general name' ),
        'singular_name'      => _x( 'News', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'news' ),
        'add_new_item'       => __( 'Add New News' ),
        'edit_item'          => __( 'Edit News' ),
        'new_item'           => __( 'New News' ),
        'all_items'          => __( 'All News' ),
        'view_item'          => __( 'View News' ),
        'search_items'       => __( 'Search News' ),
        'not_found'          => __( 'No News found' ),
        'not_found_in_trash' => __( 'No News found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'News'
    );

    $args = array(
        'label'               => __( 'news', 'sanctuaryholdings' ),
        'description'         => __( 'Holds our News Image data', 'sanctuaryholdings' ),
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
        'menu_icon'           => 'dashicons-id-alt',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'news', $args );

}

add_action( 'init', 'my_custom_post_news',0 );

// Meta boxes
add_filter( 'rwmb_meta_boxes', 'news_register_meta_boxes' );

/*
 * Register meta boxes
 *
 * @return void
 */
function news_register_meta_boxes( $meta_boxes )
{
    $prefix = 'news_bio_';

    $meta_boxes[] = array(

        'id' => 'standard',

        'title' => __( 'News Image', 'rwmb' ),

        'pages' => array( 'news' ),

        'context' => 'normal',

        'priority' => 'high',

        'autosave' => true,

        'fields' => array(

           

        ),

    );


    return $meta_boxes;
}