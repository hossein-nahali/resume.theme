<?php

namespace resume_theme;

if (!defined('ABSPATH')) exit; // No direct access allowed
class Autoload
{

    static function init()
    {
        // Load add action
        self::add_action();

        // Includes
        self::includes();
    }

    static function language()
    {
        load_theme_textdomain('resume_theme', get_template_directory() . '/languages');
    }

    static function add_action()
    {
        $list = [
            'after_setup_theme' => [
                'resume_theme\Autoload::add_theme_support',
                'resume_theme\Autoload::add_img_size',
                'resume_theme\Autoload::register_nav_menu',
                'resume_theme\Autoload::language',
            ],
        ];

        foreach ($list as $key => $value)
            foreach ($value as $functions)
                add_action($key, $functions);

    }


    static function add_theme_support()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_theme_support('custom-logo', array(
            'height' => 130,
            'width' => 66,
            'flex-height' => true,
            'flex-width' => true,
        ));
    }

    static function add_img_size()
    {
        add_image_size('logo', 130, 66, true);
        add_image_size('product-box-e', 195, 185, true);
        add_image_size('product-box', 392, 300, true);
        add_image_size('blog-list-box', 412, 300, true);
        add_image_size('large-blog', 530, 260, true);
        add_image_size('sales-form', 540, 560, true);
        add_image_size('small-blog', 210, 140, true);
        add_image_size('professor', 340, 400, true);
        add_image_size('single', 1300, 600, true);
    }

    static function register_nav_menu()
    {
        register_nav_menus(array(
            'primary_menu' => __('منوی اصلی', 'digisuntech'),
        ));
    }

    static function includes()
    {
        $list = [
            'elementor-widgets/include-widgets',
            'setting/setting',
        ];

        foreach ($list as $item) {
            include(plugin_dir_path(resume_theme) . "{$item}.php");
        }
    }

}

Autoload::init();
