<?php

    //theme options customize contact details
    add_action( 'customize_register', 'adaptive_customize_register' );

    function adaptive_customize_register( $wp_customize ) {

        //Top links
        $wp_customize->add_section( 'adaptive_contact' , array(
            'title'     => __('Contact Details', 'adaptive-framework'),
            'description'   => 'Contact Details',
            'priority' => '36'
        ) );

         //link for Address
        $wp_customize->add_setting( 'adaptive_custom_settings[display_address]' , array(
            'default'   => 'Address',
            'type'  => 'option'
        ) );

        $wp_customize->add_control( 'adaptive_custom_settings[display_address]' , array(
            'label'     => __('Address', 'adaptive-framework'),
            'section'   => 'adaptive_contact',
            'setting'   => 'adaptive_custom_settings[display_address]',
            'type'  => 'text'
        ) );

        //link for Tel
        $wp_customize->add_setting( 'adaptive_custom_settings[display_tel]' , array(
            'default'   => 'Telephone',
            'type'  => 'option'
        ) );

        $wp_customize->add_control( 'adaptive_custom_settings[display_tel]' , array(
            'label'     => __('Tel', 'adaptive-framework'),
            'section'   => 'adaptive_contact',
            'setting'   => 'adaptive_custom_settings[display_tel]',
            'type'  => 'text'
        ) );
		
		
		 //link for Email
        $wp_customize->add_setting( 'adaptive_custom_settings[display_email]' , array(
            'default'   => 'Email',
            'type'  => 'option'
        ) );

        $wp_customize->add_control( 'adaptive_custom_settings[display_email]' , array(
            'label'     => __('Email', 'adaptive-framework'),
            'section'   => 'adaptive_contact',
            'setting'   => 'adaptive_custom_settings[display_email]',
            'type'  => 'text'
        ) );


    }

