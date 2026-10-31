<?php

namespace resume_theme;

if (!defined('ABSPATH')) {
    exit;
}

class Include_Widgets
{
    /**
     * @return string[]
     */
    private static function widget_files()
    {
        return [
            'experience-widget',
            'latest-projects',
            'skills',
            'title-widget',
            'sidebar-widget',
        ];
    }

    /**
     * Register widgets with Elementor (supports current and legacy APIs).
     *
     * @param \Elementor\Widgets_Manager $widgets_manager
     */
    public static function register_widgets($widgets_manager)
    {
        $base = get_template_directory() . '/elementor-widgets/';

        foreach (self::widget_files() as $widget) {
            $path = $base . $widget . '.php';
            if (!is_readable($path)) {
                continue;
            }
            require_once $path;
        }

        $classes = [
            'Experience_Widget',
            'Latest_Projects_Widget',
            'Skills_Widget',
            'Title_Widget',
            'Sidebar_Widget',
        ];

        foreach ($classes as $class) {
            if (!class_exists($class)) {
                continue;
            }
            self::register_with_manager($widgets_manager, new $class());
        }
    }

    /**
     * @param \Elementor\Widgets_Manager $widgets_manager
     * @param \Elementor\Widget_Base     $instance
     */
    private static function register_with_manager($widgets_manager, $instance)
    {
        if (method_exists($widgets_manager, 'register')) {
            $widgets_manager->register($instance);
            return;
        }

        if (method_exists($widgets_manager, 'register_widget_type')) {
            $widgets_manager->register_widget_type($instance);
        }
    }

    public static function add_category_widgets($elements_manager)
    {
        $elements_manager->add_category(
            'setting_theme',
            [
                'title' => __('ویجت های قالب رزومه', 'resume-theme'),
                'icon'  => 'fa fa-plug',
            ]
        );
    }

    public static function init()
    {
        add_action('elementor/widgets/register', [self::class, 'register_widgets']);
        add_action('elementor/elements/categories_registered', [self::class, 'add_category_widgets']);
    }
}

Include_Widgets::init();
