<?php
/**
 * Resume Theme functions and definitions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function resume_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Add custom logo support
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'resume-theme'),
    ));
}
add_action('after_setup_theme', 'resume_theme_setup');

/**
 * Enqueue scripts and styles
 */
function resume_theme_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('resume-theme-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '5.3.8');
    
    // Enqueue Swiper CSS
    wp_enqueue_style('swiper', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.css', array(), '12.0.2');
    
    // Enqueue custom CSS
    wp_enqueue_style('resume-custom-style', get_template_directory_uri() . '/src/css/style.css', array('bootstrap'), '1.0.0');
    
    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array(), '5.3.8', true);
    
    // Enqueue Swiper JS
    wp_enqueue_script('swiper', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.js', array(), '12.0.2', true);
    
    // Enqueue custom JS
    wp_enqueue_script('resume-custom-script', get_template_directory_uri() . '/src/js/global.js', array('bootstrap', 'swiper'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'resume_theme_scripts');

/**
 * Customizer additions
 */
function resume_theme_customize_register($wp_customize) {
    
    // Profile Section
    $wp_customize->add_section('profile_section', array(
        'title'    => __('Profile Information', 'resume-theme'),
        'priority' => 30,
    ));
    
    // Profile Name
    $wp_customize->add_setting('profile_name', array(
        'default'           => 'Hossein Nahali',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('profile_name', array(
        'label'   => __('Full Name', 'resume-theme'),
        'section' => 'profile_section',
        'type'    => 'text',
    ));
    
    // Profile Title
    $wp_customize->add_setting('profile_title', array(
        'default'           => 'Front-End Developer',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('profile_title', array(
        'label'   => __('Job Title', 'resume-theme'),
        'section' => 'profile_section',
        'type'    => 'text',
    ));
    
    // Profile Image
    $wp_customize->add_setting('profile_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'profile_image', array(
        'label'   => __('Profile Image', 'resume-theme'),
        'section' => 'profile_section',
    )));
    
    // Contact Section
    $wp_customize->add_section('contact_section', array(
        'title'    => __('Contact Information', 'resume-theme'),
        'priority' => 31,
    ));
    
    // Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'nahali.dev@gmail.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Email Address', 'resume-theme'),
        'section' => 'contact_section',
        'type'    => 'email',
    ));
    
    // Phone
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '(+98) 936 907 9925',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label'   => __('Phone Number', 'resume-theme'),
        'section' => 'contact_section',
        'type'    => 'text',
    ));
    
    // Address
    $wp_customize->add_setting('contact_address', array(
        'default'           => 'Iran, Esfahan',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label'   => __('Address', 'resume-theme'),
        'section' => 'contact_section',
        'type'    => 'text',
    ));
    
    // Social Media Section
    $wp_customize->add_section('social_section', array(
        'title'    => __('Social Media', 'resume-theme'),
        'priority' => 32,
    ));
    
    // LinkedIn
    $wp_customize->add_setting('linkedin_url', array(
        'default'           => 'https://linkedin.com/in/nahali',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('linkedin_url', array(
        'label'   => __('LinkedIn URL', 'resume-theme'),
        'section' => 'social_section',
        'type'    => 'url',
    ));
    
    $wp_customize->add_setting('linkedin_username', array(
        'default'           => 'nahali',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('linkedin_username', array(
        'label'   => __('LinkedIn Username', 'resume-theme'),
        'section' => 'social_section',
        'type'    => 'text',
    ));
    
    // Telegram
    $wp_customize->add_setting('telegram_url', array(
        'default'           => 'https://t.me/nahali_dev2',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('telegram_url', array(
        'label'   => __('Telegram URL', 'resume-theme'),
        'section' => 'social_section',
        'type'    => 'url',
    ));
    
    $wp_customize->add_setting('telegram_username', array(
        'default'           => '@nahali_dev2',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('telegram_username', array(
        'label'   => __('Telegram Username', 'resume-theme'),
        'section' => 'social_section',
        'type'    => 'text',
    ));
    
    // Instagram
    $wp_customize->add_setting('instagram_url', array(
        'default'           => 'https://instagram.com/hosseinnahali',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('instagram_url', array(
        'label'   => __('Instagram URL', 'resume-theme'),
        'section' => 'social_section',
        'type'    => 'url',
    ));
    
    $wp_customize->add_setting('instagram_username', array(
        'default'           => '@hosseinNahali',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('instagram_username', array(
        'label'   => __('Instagram Username', 'resume-theme'),
        'section' => 'social_section',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'resume_theme_customize_register');

/**
 * Set default theme mods
 */
function resume_theme_default_mods() {
    $defaults = array(
        'profile_name' => 'Hossein Nahali',
        'profile_title' => 'Front-End Developer',
        'contact_email' => 'nahali.dev@gmail.com',
        'contact_phone' => '(+98) 936 907 9925',
        'contact_address' => 'Iran, Esfahan',
        'linkedin_url' => 'https://linkedin.com/in/nahali',
        'linkedin_username' => 'nahali',
        'telegram_url' => 'https://t.me/nahali_dev2',
        'telegram_username' => '@nahali_dev2',
        'instagram_url' => 'https://instagram.com/hosseinnahali',
        'instagram_username' => '@hosseinNahali',
    );
    
    foreach ($defaults as $key => $value) {
        if (get_theme_mod($key) === false) {
            set_theme_mod($key, $value);
        }
    }
}
add_action('after_setup_theme', 'resume_theme_default_mods');

/**
 * Add custom body classes
 */
function resume_theme_body_classes($classes) {
    // Add a class for the resume theme
    $classes[] = 'resume-theme';
    return $classes;
}
add_filter('body_class', 'resume_theme_body_classes');


const resume_theme = __FILE__;
define( "resume_theme_uri", plugin_dir_url( __FILE__ ) );

if ( ! class_exists( 'resume_theme\Autoload', false ) ) {
    include( plugin_dir_path( __FILE__ ) . 'classes/core/Autoload.php' );
}


/**
 * Check if Elementor is installed and activated
 */
function resume_theme_require_elementor() {
    if (!did_action('elementor/loaded')) {
        add_action('admin_notices', 'resume_theme_elementor_not_loaded');
        return false;
    }
    return true;
}
add_action('init', 'resume_theme_require_elementor');

/**
 * Admin notice for missing Elementor
 */
function resume_theme_elementor_not_loaded() {
    $class = 'notice notice-warning';
    $message = esc_html__('Resume Theme requires Elementor plugin to be installed and activated.', 'resume-theme');
    printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
}
?>