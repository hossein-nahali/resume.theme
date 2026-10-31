<?php

if (!defined('ABSPATH')) {
    exit;
}

function resume_theme_settings_page() {
    echo '<div class="wrap"><h1>' . esc_html__('Theme Settings', 'resume-theme') . '</h1>';
    echo '<p>' . esc_html__('Use the submenus below to manage Languages, Social Networks, and Information.', 'resume-theme') . '</p></div>';
}

// 1. Register top-level menu for Theme Settings
add_action('admin_menu', function () {
    add_menu_page(
        'Theme Settings',
        'Theme Settings',
        'manage_options',
        'theme-settings',
        'resume_theme_settings_page',
        'dashicons-admin-generic',
        60
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
            'new_item' => 'New Language',
            'view_item' => 'View Language',
            'search_items' => 'Search Languages',
            'not_found' => 'No Languages found',
            'not_found_in_trash' => 'No Languages found in Trash',
            'all_items' => 'All Languages',
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => 'theme-settings',
        'menu_icon' => 'dashicons-translation',
        'supports' => ['title', 'excerpt', 'thumbnail'],
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => false,
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
        'show_in_menu' => 'theme-settings',
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
        'show_in_menu' => 'theme-settings',
        'menu_icon' => 'dashicons-info',
        'supports' => ['title', 'excerpt', 'thumbnail'],
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => false,
    ]);
});

// 5. Add 'link' meta box for Social and Information CPTs
add_action('add_meta_boxes', function () {
    add_meta_box(
        'social_link_meta',
        'Link',
        function ($post) {
            $value = get_post_meta($post->ID, 'link', true);
            wp_nonce_field('save_link_meta', 'link_meta_nonce');
            echo '<label for="link_field">URL</label><br/>';
            echo '<input type="url" id="link_field" name="link_field" value="' . esc_attr($value) . '" style="width:100%" placeholder="https://..." />';
        },
        'social',
        'normal',
        'default'
    );

    add_meta_box(
        'information_link_meta',
        'Link',
        function ($post) {
            $value = get_post_meta($post->ID, 'link', true);
            wp_nonce_field('save_link_meta', 'link_meta_nonce');
            echo '<label for="link_field">URL</label><br/>';
            echo '<input type="url" id="link_field" name="link_field" value="' . esc_attr($value) . '" style="width:100%" placeholder="https://..." />';
        },
        'information',
        'normal',
        'default'
    );
});

// 6. Save 'link' meta for both CPTs
add_action('save_post', function ($post_id) {
    if (!isset($_POST['link_meta_nonce']) || !wp_verify_nonce($_POST['link_meta_nonce'], 'save_link_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['post_type']) && in_array($_POST['post_type'], ['social', 'information'], true)) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        $url = isset($_POST['link_field']) ? esc_url_raw(trim($_POST['link_field'])) : '';
        if ($url) {
            update_post_meta($post_id, 'link', $url);
        } else {
            delete_post_meta($post_id, 'link');
        }
    }
});