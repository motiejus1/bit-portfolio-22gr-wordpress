<?php
/*
Plugin Name: Bit Portfolio Plugin
Plugin URI: https://motiejus1.github.com/bit-porftolio-plugin
Description: Plugin which is required for our custom theme
Version: 1.0.0
Author: Destytojas
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: bit-portfolio-plugin
*/

//Bit portfolio
//function bit_portfolio_suma()

// Bit darbai
//function bit_darbai_suma()

//ta pati funkcija negali buti deklratuota du kartus
// PHP errora kad funkcija suma jau yra deklrauota


// sukursime savo post type Works
function bit_portfolio_create_post_type_works() {
    register_post_type('works', array(
        'labels' => array(
            'name' => __('Works'),
            'singular_name' => __('Work')
            // kvieciama teksto iregistravimo i sistema funkcija
        ),
        'public' => true,
        'has_archive'=> true, //jinai leidzia kurti musu post type kategorijas,
        'rewrite' => array('slug'=> 'works'), //post type sukuria nuoroda /works
        'show_in_rest' => true
    ));
}

add_action('init', 'bit_portfolio_create_post_type_works');

function bit_portfolio_customize_background_color($wp_customize) {
    //$wp_customize - visi Customize sekcijoje esantys nustatymai

    $wp_customize->add_section('bit_portfolio_bit_colors', array(
        'title' => __('Bit colors'),
        'priority' => 100
    ));

    //Kad cia yra sukuriamas tekstinis laukas
    $wp_customize->add_setting('bit_portofolio_background_color', array(
        'default' => 'red',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portofolio_background_color', array(
        'label' => __("Background color"),
        'description' => __("Enter background color"),
        'section' => 'bit_portfolio_bit_colors',
        'type' => 'text',
        'priority' => 10
    )));

    //sukursime nauja nustatyma kuriame galime pasirinkti spalva

    $wp_customize->add_setting('bit_portfolio_second_background_color', array(
        'default' => '#FFFFFF',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'bit_portfolio_second_background_color', array(
        'label' => 'Second background color',
        'section' => 'bit_portfolio_bit_colors',
        'settings' => 'bit_portfolio_second_background_color'
    )));

    //Kuriame nuotraukos iterpimo lauka

    $wp_customize->add_setting('bit_portfolio_custom_image', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bit_portfolio_custom_image', array(
        'label'=>'Custom Image',
        'description' => 'Select your image',
        'section' => 'bit_portfolio_bit_colors'
    )));

}
 add_action('customize_register', 'bit_portfolio_customize_background_color');