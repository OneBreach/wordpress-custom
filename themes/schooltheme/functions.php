<?php
function firstTheme_style()
{
    wp_enqueue_style('core', 'style.css', false);
}
add_action('wp_enqueue_scripts', 'firstTheme_style');

function mijn_menu_registreren()
{
    register_nav_menus(array(
        'links_menu' => __('Links Menu', 'mijn_thema'),
        'footer_menu' => __('Footer Menu', 'mijn_thema'),
    ));
}
add_action('init', 'mijn_menu_registreren');


//footer function 
function customizer_footer_settings($wp_customize)
{
    $wp_customize->add_section('footer_settings', array(
        'title'    => __('Footer Settings', 'your-theme-textdomain'),
        'priority' => 120,
    ));

    $wp_customize->add_setting('footer_twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_twitter_url', array(
        'label'   => __('Twitter URL', 'your-theme-textdomain'),
        'section' => 'footer_settings',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('footer_facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_facebook_url', array(
        'label'   => __('Facebook URL', 'your-theme-textdomain'),
        'section' => 'footer_settings',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('footer_instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_instagram_url', array(
        'label'   => __('Instagram URL', 'your-theme-textdomain'),
        'section' => 'footer_settings',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('footer_rss_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('footer_rss_url', array(
        'label'   => __('RSS URL', 'your-theme-textdomain'),
        'section' => 'footer_settings',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('footer_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('footer_email', array(
        'label'   => __('Email Address', 'your-theme-textdomain'),
        'section' => 'footer_settings',
        'type'    => 'email',
    ));
}
add_action('customize_register', 'customizer_footer_settings');


function load_font_awesome()
{
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'load_font_awesome');

// function load_js_files()
// {
//     wp_enqueue_script('main.js', get_template_directory_uri() . 'assets/js/main.js', array(), false, true);
//     wp_enqueue_script('browser.min.js', get_template_directory_uri() . 'assets/js/browser.min.js', array(), false, true);
//     wp_enqueue_script('jquery.min.js', get_template_directory_uri() . 'assets/js/jquery.min.js', array(), false, true);
//     wp_enqueue_script('breakpoints.min.js', get_template_directory_uri() . 'assets/js/breakpoints.min.js', array(), false, true);
//     wp_enqueue_script('util.js', get_template_directory_uri() . 'assets/js/util.js', array(), false, true);
// }

// add_action('wp_enqueue_scripts', 'load_js_files');
