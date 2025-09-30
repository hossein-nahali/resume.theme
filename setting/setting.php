<?php
// 1. Register top-level menu for Theme Settings
add_action('admin_menu', function () {
    add_menu_page(
        'Theme Settings',          // Page title
        'Theme Settings',          // Menu title
        'manage_options',          // Capability
        'theme-settings',          // Menu slug
        '',                        // Callback (none, just parent)
        'dashicons-admin-generic', // Icon
        60                         // Position
    );
});

// 2. Register Languages CPT as submenu
add_action('init', function () {
    register_post_type('language', [
        'labels' => [
            'name' => 'Languages',
            'singular_name' => 'Language',
            'add_new' => 'Add New',
            'edit_item' => 'Edit Language',
            'all_items' => 'All Languages',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => 'theme-settings', // <-- اینجا مهمه
        'menu_icon' => 'dashicons-translation',
        'supports' => ['title', 'thumbnail'],
    ]);
});

// 3. Register Socials CPT as submenu
add_action('init', function () {
    register_post_type('social', [
        'labels' => [
            'name' => 'Social Networks',
            'singular_name' => 'Social Network',
            'add_new' => 'Add New',
            'edit_item' => 'Edit Social Network',
            'new_item' => 'New Social Network',
            'view_item' => 'View Social Network',
            'search_items' => 'Search Social Networks',
            'not_found' => 'No Social Networks found',
            'not_found_in_trash' => 'No Social Networks found in Trash',
            'all_items' => 'All Social Networks',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => 'theme-settings', // <-- اینجا هم زیرمجموعه شد
        'menu_icon' => 'dashicons-share',
        'supports' => ['title', 'excerpt', 'thumbnail'],
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => false,
    ]);
});

// 4. Register Information CPT as submenu
add_action('init', function () {
    register_post_type('information', [
        'labels' => [
            'name' => 'Information',
            'singular_name' => 'Information',
            'add_new' => 'Add New',
            'edit_item' => 'Edit Information',
            'new_item' => 'New Information',
            'view_item' => 'View Information',
            'search_items' => 'Search Information',
            'not_found' => 'No Information found',
            'not_found_in_trash' => 'No Information found in Trash',
            'all_items' => 'All Information',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => 'theme-settings', // زیرمجموعه تنظیمات قالب
        'menu_icon' => 'dashicons-info',
        'supports' => ['title', 'excerpt', 'thumbnail'],
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => false,
    ]);
});