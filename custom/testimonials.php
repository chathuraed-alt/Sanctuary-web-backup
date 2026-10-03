<?php

//custom post Testimonials
function my_custom_post_testimonial() {

    $labels = array(
        'name'               => _x( 'Testimonial', 'post type general name' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'Testimonial' ),
        'add_new_item'       => __( 'Add New Testimonial' ),
        'edit_item'          => __( 'Edit Testimonial' ),
        'new_item'           => __( 'New Testimonial' ),
        'all_items'          => __( 'All Testimonials' ),
        'view_item'          => __( 'View Testimonials' ),
        'search_items'       => __( 'Search Testimonials' ),
        'not_found'          => __( 'No Testimonials found' ),
        'not_found_in_trash' => __( 'No Testimonials found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Testimonials'
    );

    $args = array(
        'label'               => __( 'testimonial', 'sanctuaryholdings' ),
        'description'         => __( 'Holds our Testimonial data', 'hat' ),
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
        'menu_icon'           => 'dashicons-format-quote',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    register_post_type( 'testimonial', $args );

}

add_action( 'init', 'my_custom_post_testimonial',0 );

// Meta boxes
add_filter( 'rwmb_meta_boxes', 'testimonial_register_meta_boxes' );

/*
 * Register meta boxes
 *
 * @return void
 */
function testimonial_register_meta_boxes( $meta_boxes )
{
    $prefix = 'testimonial_bio_';

    $meta_boxes[] = array(

        'id' => 'standard',

        'title' => __( 'testimonial', 'rwmb' ),

        'pages' => array( 'testimonial' ),

        'context' => 'normal',

        'priority' => 'high',

        'autosave' => true,

        'fields' => array(

           

        ),

    );


    return $meta_boxes;
}