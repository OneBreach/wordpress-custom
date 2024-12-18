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
function customizer_footer_settings( $wp_customize ) {
    $wp_customize->add_section( 'footer_settings', array(
        'title'    => __( 'Footer Settings', 'your-theme-textdomain' ),
        'priority' => 120,
    ) );

    $wp_customize->add_setting( 'footer_twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'footer_twitter_url', array(
        'label'   => __( 'Twitter URL', 'your-theme-textdomain' ),
        'section' => 'footer_settings',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'footer_facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'footer_facebook_url', array(
        'label'   => __( 'Facebook URL', 'your-theme-textdomain' ),
        'section' => 'footer_settings',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'footer_instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'footer_instagram_url', array(
        'label'   => __( 'Instagram URL', 'your-theme-textdomain' ),
        'section' => 'footer_settings',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'footer_rss_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'footer_rss_url', array(
        'label'   => __( 'RSS URL', 'your-theme-textdomain' ),
        'section' => 'footer_settings',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'footer_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'footer_email', array(
        'label'   => __( 'Email Address', 'your-theme-textdomain' ),
        'section' => 'footer_settings',
        'type'    => 'email',
    ) );
}
// add custom sidebar widget 
function theme_widgets_init() {
    // Registreer een widget area (sidebar)
    register_sidebar( array(
        'name'          => 'Sidebar 1', // De naam van de sidebar
        'id'            => 'sidebar-1', // De id van de sidebar
        'before_widget' => '<section class="widget">', // Het openen van elke widget
        'after_widget'  => '</section>', // Het sluiten van elke widget
        'before_title'  => '<h2 class="widget-title">', // Het openen van de titel
        'after_title'   => '</h2>', // Het sluiten van de titel
    ) );
}
add_action( 'widgets_init', 'theme_widgets_init' );




add_action( 'customize_register', 'customizer_footer_settings' );
?>
