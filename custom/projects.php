<?php

//custom post Projects
function my_custom_post_projects() {

    $labels = array(
        'name'               => _x( 'Projects', 'post type general name' ),
        'singular_name'      => _x( 'Project', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'projects' ),
        'add_new_item'       => __( 'Add New Project' ),
        'edit_item'          => __( 'Edit Projects' ),
        'new_item'           => __( 'New Project' ),
        'all_items'          => __( 'All Projects' ),
        'view_item'          => __( 'View Projects' ),
        'search_items'       => __( 'Search Projects' ),
        'not_found'          => __( 'No Projects found' ),
        'not_found_in_trash' => __( 'No Projects found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Projects'
    );

    $args = array(
        'label'               => __( 'projects', 'sanctuaryholdings' ),
        'description'         => __( 'Holds our Projects Image data', 'sanctuaryholdings' ),
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
        'menu_icon'           => 'dashicons-admin-home',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'projects', $args );

}

add_action( 'init', 'my_custom_post_projects',0 );

// Meta boxes
add_filter( 'rwmb_meta_boxes', 'projects_register_meta_boxes' );

/*
 * Register meta boxes
 *
 * @return void
 */
function projects_register_meta_boxes( $meta_boxes )
{
    $prefix = 'projects_bio_';

    $meta_boxes[] = array(

        'id' => 'standard',

        'title' => __( 'Projects Image', 'rwmb' ),

        'pages' => array( 'projects' ),

        'context' => 'normal',

        'priority' => 'high',

        'autosave' => true,

        'fields' => array(

           

        ),

    );


    return $meta_boxes;
}