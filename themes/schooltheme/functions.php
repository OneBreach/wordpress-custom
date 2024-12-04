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
?>