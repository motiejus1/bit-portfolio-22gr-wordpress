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

 function bit_portfolio_customizer_header_section($wp_customize) {

    $wp_customize->add_section('bit_portfolio_header_settings', array(
        'title' => __('Header settings', 'bit-portfolio'),
        'priority' => 101
    ));

    //Logo 

    $wp_customize->add_setting('bit_portfolio_logo_text', array(
        'default' => 'Logo',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_logo_text', array(
        'label' => 'Logo text',
        'description' => 'Change default logo',
        'section' => 'bit_portfolio_header_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //Header copyright text before

    $wp_customize->add_setting('bit_portfolio_copyright_text_before_date', array(
        'default' => 'Copyright',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_copyright_text_before_date', array(
        'label' => 'Copyright text before date',
        'description' => 'Change copyright text',
        'section' => 'bit_portfolio_header_settings',
        'type' => 'text',
        'priority' => 11,
    )));

    //Header copyright text after

    $wp_customize->add_setting('bit_portfolio_copyright_text_after_date', array(
        'default' => 'All rights reserved | This template is made with ',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_copyright_text_after_date', array(
        'label' => 'Copyright text',
        'description' => 'Change copyright text after date',
        'section' => 'bit_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));

    //Link target

    $wp_customize->add_setting('bit_portfolio_header_links_target', array(
        'default' => true,
        'sanitize_callback' => ''
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_header_links_target', array(
        'label' => 'Open in the new tab?',
        'description' => 'Choose how social links open same page/new page',
        'section' => 'bit_portfolio_header_settings',
        'type' => 'checkbox',
        'priority' => 12,
    )));


    //Facebook

    $wp_customize->add_setting('bit_portfolio_item_facebook', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_item_facebook', array(
        'label' => 'Facebook url',
        'description' => 'Facebook url',
        'section' => 'bit_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));

    //Twitter

    $wp_customize->add_setting('bit_portfolio_item_twitter', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_item_twitter', array(
        'label' => 'Twitter url',
        'description' => 'Twitter url',
        'section' => 'bit_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));

    //Instagram

    $wp_customize->add_setting('bit_portfolio_item_instagram', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_item_instagram', array(
        'label' => 'Instagram url',
        'description' => 'Instagram url',
        'section' => 'bit_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));
    //Linkedin

    $wp_customize->add_setting('bit_portfolio_item_linkedin', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_item_linkedin', array(
        'label' => 'Linkedin url',
        'description' => 'Linkedin url',
        'section' => 'bit_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));

}


function bit_portfolio_customizer_footer_section($wp_customize) {

    $wp_customize->add_section('bit_portfolio_footer_settings', array(
        'title' => __('Footer settings', 'bit-portfolio'),
        'priority' => 102
    ));

 //Menu #1 title 

        $wp_customize->add_setting('bit_portfolio_footer_menu_first_title', array(
            'default' => 'Category',
            'sanitize_callback' => ''
        ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_footer_menu_first_title', array(
        'label' => 'Menu #1 title',
        'description' => 'Menu #1 title',
        'section' => 'bit_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));

 //Menu #2 title 

    $wp_customize->add_setting('bit_portfolio_footer_menu_second_title', array(
        'default' => 'Archives',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_footer_menu_second_title', array(
        'label' => 'Menu #2 title',
        'description' => 'Menu #2 title',
        'section' => 'bit_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));

// Contact title

    $wp_customize->add_setting('bit_portfolio_footer_contact_title', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_footer_contact_title', array(
        'label' => 'Contact title',
        'description' => 'Contact title',
        'section' => 'bit_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));



    //Contact address

    $wp_customize->add_setting('bit_portfolio_footer_contact_address', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_footer_contact_address', array(
        'label' => 'Contact address',
        'description' => 'Contact address',
        'section' => 'bit_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //Contact phone
    $wp_customize->add_setting('bit_portfolio_footer_contact_phone', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_footer_contact_phone', array(
        'label' => 'Contact phone',
        'description' => 'Contact phone',
        'section' => 'bit_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));
    //Contact email

    $wp_customize->add_setting('bit_portfolio_footer_contact_email', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_footer_contact_email', array(
        'label' => 'Contact email',
        'description' => 'Contact email',
        'section' => 'bit_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));


    //Copyright text before date
    $wp_customize->add_setting('bit_portfolio_footer_copyright_before', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_footer_copyright_before', array(
        'label' => 'Copyright before',
        'description' => 'Copyright before',
        'section' => 'bit_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));



    //Copyright text after date

    //Copyright text before date
    $wp_customize->add_setting('bit_portfolio_footer_copyright_after', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_footer_copyright_after', array(
        'label' => 'Copyright after',
        'description' => 'Copyright after',
        'section' => 'bit_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));
}

function bit_portfolio_customizer_404_section($wp_customize) {
    $wp_customize->add_section('bit_portfolio_404_settings', array(
        'title' => __('404 settings', 'bit-portfolio'),
        'priority' => 102
    ));

    //404 Page title
     

    $wp_customize->add_setting('bit_portfolio_404_page_title', array(
        'default' => '404',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_404_page_title', array(
        'label' => '404 page title',
        'description' => 'Change 404 page title',
        'section' => 'bit_portfolio_404_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //404 Page Description
    $wp_customize->add_setting('bit_portfolio_404_page_description', array(
        'default' => 'Something went wrong, page not found',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_404_page_description', array(
        'label' => '404 page description',
        'description' => 'Change 404 page description',
        'section' => 'bit_portfolio_404_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //404 Page Link Text
    $wp_customize->add_setting('bit_portfolio_404_page_link_text', array(
        'default' => 'Go back to Home',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_portfolio_404_page_link_text', array(
        'label' => '404 page link text',
        'description' => 'Change 404 page link text',
        'section' => 'bit_portfolio_404_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //404 Page background image

    $wp_customize->add_setting('bit_portfolio_404_background_image', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bit_portfolio_404_background_image', array(
        'label' => 'Backround Image',
        'description' => 'Choose 404 background image',
        'section' => 'bit_portfolio_404_settings'
    )));

}



add_action('customize_register', 'bit_portfolio_customizer_header_section');
add_action('customize_register', 'bit_portfolio_customizer_footer_section');
add_action('customize_register', 'bit_portfolio_customizer_404_section');
