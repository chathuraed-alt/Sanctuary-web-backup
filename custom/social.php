<?php
    //theme options customize header social media links
    add_action( 'customize_register', 'adaptive_customize_register_social' );

    function adaptive_customize_register_social( $wp_customize ) {

        //Top links
        $wp_customize->add_section( 'adaptive_link_social' , array(
            'title'     => __('Social Media Links', 'adaptive-framework'),
            'description'   => 'Allow you to link the social media links',
            'priority' => '36'
        ) );
		 //link for instagram
        $wp_customize->add_setting( 'adaptive_custom_settings[display_instagram_link]' , array(
            'default'   => 'https://www.instagram.com/',
            'type'  => 'option'
        ) );

        $wp_customize->add_control( 'adaptive_custom_settings[display_instagram_link]' , array(
            'label'     => __('Instagram', 'adaptive-framework'),
            'section'   => 'adaptive_link_social',
            'setting'   => 'adaptive_custom_settings[display_instagram_link]',
            'type'  => 'text'
        ) );


        //link for facebook
        $wp_customize->add_setting( 'adaptive_custom_settings[display_facebook_link]' , array(
            'default'   => 'https://www.facebook.com/',
            'type'  => 'option'
        ) );

        $wp_customize->add_control( 'adaptive_custom_settings[display_facebook_link]' , array(
            'label'     => __('Facebook', 'adaptive-framework'),
            'section'   => 'adaptive_link_social',
            'setting'   => 'adaptive_custom_settings[display_facebook_link]',
            'type'  => 'text'
        ) );

       

    }