function register_my_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'your-theme-textdomain'),
    ));
}
add_action('after_setup_theme', 'register_my_menus');
