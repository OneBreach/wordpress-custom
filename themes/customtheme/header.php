<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Voeg Tailwind CSS via CDN toe -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header bg-gray-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <h1 class="site-title text-2xl">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-gray-400"><?php bloginfo('name'); ?></a>
                    </h1>
                <?php endif; ?>
                <p class="site-description text-sm"><?php bloginfo('description'); ?></p>
            </div>
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'menu flex space-x-4',
                    'container'      => false,
                ));
                ?>
            </nav>
        </div>
    </header>
