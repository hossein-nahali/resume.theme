<?php

namespace resume_theme;

if (!defined('ABSPATH')) exit; // No direct access allowed

class includeWidgets
{

    static function init()
    {
        self::add_action();
    }

    static function include_widgets()
    {
        $widgets = [
            'experience-widget',
            'latest-projects',
            'skills',
            'title-widget',
            'sidebar-widget',
        ];

        if (class_exists('Elementor\Widget_Base'))
            foreach ($widgets as $widget) {
                include(plugin_dir_path(resume_theme) . "elementor-widgets/{$widget}.php");
            }
    }

    static function add_category_widgets($elements_manager)
    {
        $elements_manager->add_category(
            'setting_theme',
            [
                'title' => __('ویجت های قالب رزومه', 'digisuntech'),
                'icon' => 'fa fa-plug',
            ]
        );

    }

    static function add_action()
    {
        $List = [
            'init' => 'resume_theme\IncludeWidgets::include_widgets',
            'elementor/elements/categories_registered' => 'resume_theme\IncludeWidgets::add_category_widgets',
        ];

        foreach ($List as $key => $value)
            add_action($key, $value);
    }
}

includeWidgets::init();