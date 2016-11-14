<?php

/**
 * 
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
add_action( 'customize_register', 'latelierdunsouhait_customize_register', 11 );
function latelierdunsouhait_customize_register( $wp_customize ) {
    
    // Add company section -----------------------------------------------------
    
    $wp_customize->add_section( 'company', array(
        'title' => 'Informations de contact',
    ) );

    $wp_customize->add_setting( 'company_phone', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'company_phone', array(
        'label'     => 'Numéro de téléphone',
        'section'   => 'company',
        'settings'  => 'company_phone',
    ) ) );

    // Add socials section -----------------------------------------------------
    
    $wp_customize->add_section( 'socials', array(
        'title' => 'Réseaux sociaux',
    ) );

    $wp_customize->add_setting( 'social_facebook', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    // $wp_customize->add_setting( 'social_twitter', array(
    //     'type'      => 'option',
    //     'transport' => 'postMessage',
    // ) );
    $wp_customize->add_setting( 'social_instagram', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_setting( 'social_pinterest', array(
        'type'      => 'option',
        'transport' => 'postMessage',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_facebook', array(
        'label'     => 'Facebook',
        'section'   => 'socials',
        'settings'  => 'social_facebook',
        'type'      => 'url',
    ) ) );

    // $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_twitter', array(
    //     'label'     => 'Twitter',
    //     'section'   => 'socials',
    //     'settings'  => 'social_twitter',
    //     'type'      => 'url',
    // ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_instagram', array(
        'label'     => 'Instagram',
        'section'   => 'socials',
        'settings'  => 'social_instagram',
        'type'      => 'url',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_pinterest', array(
        'label'     => 'Pinterest',
        'section'   => 'socials',
        'settings'  => 'social_pinterest',
        'type'      => 'url',
    ) ) );
}