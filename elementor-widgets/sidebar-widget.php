<?php
/**
 * Sidebar Widget for Elementor
 *
 * @package Resume_Theme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Sidebar_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'sidebar-widget';
    }

    public function get_title()
    {
        return esc_html__('Sidebar', 'resume-theme');
    }

    public function get_icon()
    {
        return 'eicon-sidebar';
    }

    public function get_categories()
    {
        return ['resume-theme'];
    }

    protected function register_controls()
    {
        // Profile
        $this->start_controls_section(
            'section_profile',
            [
                'label' => esc_html__('Profile', 'resume-theme'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'profile_image',
            [
                'label' => esc_html__('Profile Image', 'resume-theme'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/src/img/me.jpg',
                ],
            ]
        );

        $this->add_control(
            'profile_name',
            [
                'label' => esc_html__('Name', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => get_theme_mod('profile_name', 'Hossein Nahali'),
            ]
        );

        $this->add_control(
            'profile_title',
            [
                'label' => esc_html__('Title', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => get_theme_mod('profile_title', 'Front-End Developer'),
            ]
        );

        $this->end_controls_section();

        // Contact
        $this->start_controls_section(
            'section_contact',
            [
                'label' => esc_html__('Contact', 'resume-theme'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_email',
            [
                'label' => esc_html__('Email', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => get_theme_mod('contact_email', 'nahali.dev@gmail.com'),
            ]
        );

        $this->add_control(
            'contact_phone',
            [
                'label' => esc_html__('Phone', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => get_theme_mod('contact_phone', '(+98) 936 907 9925'),
            ]
        );

        $this->add_control(
            'contact_address',
            [
                'label' => esc_html__('Address', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => get_theme_mod('contact_address', 'Iran, Esfahan'),
            ]
        );

        $this->end_controls_section();

        // Socials
        $this->start_controls_section(
            'section_socials',
            [
                'label' => esc_html__('Socials', 'resume-theme'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_socials',
            [
                'label' => esc_html__('Show Socials', 'resume-theme'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'resume-theme'),
                'label_off' => esc_html__('Hide', 'resume-theme'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'social_label',
            [
                'label' => esc_html__('Label', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Linkedin',
            ]
        );

        $repeater->add_control(
            'social_username',
            [
                'label' => esc_html__('Username', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'nahali',
            ]
        );

        $repeater->add_control(
            'social_url',
            [
                'label' => esc_html__('URL', 'resume-theme'),
                'type' => Controls_Manager::URL,
                'default' => [ 'url' => '' ],
            ]
        );

        $repeater->add_control(
            'social_icon',
            [
                'label' => esc_html__('Icon', 'resume-theme'),
                'type' => Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/src/img/linkedin.svg' ],
            ]
        );

        $this->add_control(
            'socials',
            [
                'label' => esc_html__('Social Items', 'resume-theme'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_label' => 'Linkedin',
                        'social_username' => get_theme_mod('linkedin_username', 'nahali'),
                        'social_url' => [ 'url' => get_theme_mod('linkedin_url') ],
                        'social_icon' => [ 'url' => get_template_directory_uri() . '/src/img/linkedin.svg' ],
                    ],
                    [
                        'social_label' => 'Telegram',
                        'social_username' => get_theme_mod('telegram_username', '@nahali_dev2'),
                        'social_url' => [ 'url' => get_theme_mod('telegram_url') ],
                        'social_icon' => [ 'url' => get_template_directory_uri() . '/src/img/telegram.svg' ],
                    ],
                    [
                        'social_label' => 'Instagram',
                        'social_username' => get_theme_mod('instagram_username', '@hosseinNahali'),
                        'social_url' => [ 'url' => get_theme_mod('instagram_url') ],
                        'social_icon' => [ 'url' => get_template_directory_uri() . '/src/img/instagram.svg' ],
                    ],
                ],
                'title_field' => '{{{ social_label }}}',
                'condition' => [ 'show_socials' => 'yes' ],
            ]
        );

        $this->end_controls_section();

        // Languages
        $this->start_controls_section(
            'section_languages',
            [
                'label' => esc_html__('Languages', 'resume-theme'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'languages_title',
            [
                'label' => esc_html__('Section Title', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Languages',
            ]
        );

        $lang_repeater = new \Elementor\Repeater();

        $lang_repeater->add_control(
            'language_icon',
            [
                'label' => esc_html__('Icon', 'resume-theme'),
                'type' => Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/src/img/en.svg' ],
            ]
        );

        $lang_repeater->add_control(
            'language_name',
            [
                'label' => esc_html__('Name', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'English',
            ]
        );

        $lang_repeater->add_control(
            'language_level',
            [
                'label' => esc_html__('Level', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Professional working',
            ]
        );

        $this->add_control(
            'languages',
            [
                'label' => esc_html__('Language Items', 'resume-theme'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $lang_repeater->get_controls(),
                'default' => [
                    [
                        'language_icon' => [ 'url' => get_template_directory_uri() . '/src/img/en.svg' ],
                        'language_name' => 'English',
                        'language_level' => 'Professional working',
                    ],
                ],
                'title_field' => '{{{ language_name }}}',
            ]
        );

        $this->end_controls_section();

        // Style controls kept minimal to follow theme styles
        $this->start_controls_section(
            'section_style_texts',
            [
                'label' => esc_html__('Texts', 'resume-theme'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typo',
                'selector' => '{{WRAPPER}} .sidebar .name h1',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'selector' => '{{WRAPPER}} .sidebar .name p',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $profile_img = !empty($settings['profile_image']['url']) ? $settings['profile_image']['url'] : get_template_directory_uri() . '/src/img/me.jpg';
        ?>
        <aside class="sidebar">
            <div class="bg-sidebar">
                <span class="rectangle-1"></span>
                <span class="rectangle-2"></span>
                <span class="rectangle-3"></span>
                <span class="rectangle-4"></span>
                <span class="rectangle-5"></span>
                <span class="rectangle-6"></span>
                <span class="rectangle-7"></span>
            </div>
            <div class="profile">
                <img src="<?php echo esc_url($profile_img); ?>" alt="profile">
                <div class="name">
                    <h1><?php echo esc_html($settings['profile_name']); ?></h1>
                    <p><?php echo esc_html($settings['profile_title']); ?></p>
                </div>
            </div>
            <ul class="information">
                <?php if (!empty($settings['contact_email'])): ?>
                <li>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/mail.svg" alt="mail">
                    </div>
                    <div class="content">
                        <span><?php echo esc_html__('Email', 'resume-theme'); ?></span>
                        <a href="mailto:<?php echo esc_attr($settings['contact_email']); ?>"><?php echo esc_html($settings['contact_email']); ?></a>
                    </div>
                </li>
                <?php endif; ?>
                <?php if (!empty($settings['contact_phone'])): ?>
                <li>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/phone.svg" alt="phone">
                    </div>
                    <div class="content">
                        <span><?php echo esc_html__('Phone', 'resume-theme'); ?></span>
                        <a href="tel:<?php echo esc_attr($settings['contact_phone']); ?>"><?php echo esc_html($settings['contact_phone']); ?></a>
                    </div>
                </li>
                <?php endif; ?>
                <?php if (!empty($settings['contact_address'])): ?>
                <li>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/location.svg" alt="location">
                    </div>
                    <div class="content">
                        <span><?php echo esc_html__('Address', 'resume-theme'); ?></span>
                        <p><?php echo esc_html($settings['contact_address']); ?></p>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
            <?php if ('yes' === $settings['show_socials'] && !empty($settings['socials'])): ?>
            <div class="socials">
                <h3><?php echo esc_html__('Socials', 'resume-theme'); ?></h3>
                <ul>
                    <?php foreach ($settings['socials'] as $social): ?>
                        <?php if (!empty($social['social_url']['url'])): ?>
                        <li>
                            <a href="<?php echo esc_url($social['social_url']['url']); ?>">
                                <div class="icon">
                                    <?php if (!empty($social['social_icon']['url'])): ?>
                                        <img src="<?php echo esc_url($social['social_icon']['url']); ?>" alt="<?php echo esc_attr($social['social_label']); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="content">
                                    <span><?php echo esc_html($social['social_label']); ?></span>
                                    <p><?php echo esc_html($social['social_username']); ?></p>
                                </div>
                            </a>
                        </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <?php if (!empty($settings['languages'])): ?>
            <div class="languages">
                <h3><?php echo esc_html($settings['languages_title']); ?></h3>
                <ul>
                    <?php foreach ($settings['languages'] as $lang): ?>
                    <li>
                        <div class="icon">
                            <?php if (!empty($lang['language_icon']['url'])): ?>
                            <img src="<?php echo esc_url($lang['language_icon']['url']); ?>" alt="<?php echo esc_attr($lang['language_name']); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <span><?php echo esc_html($lang['language_name']); ?></span>
                            <p><?php echo esc_html($lang['language_level']); ?></p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </aside>
        <?php
    }

    protected function content_template()
    {
        ?>
        <aside class="sidebar">
            <div class="bg-sidebar">
                <span class="rectangle-1"></span>
                <span class="rectangle-2"></span>
                <span class="rectangle-3"></span>
                <span class="rectangle-4"></span>
                <span class="rectangle-5"></span>
                <span class="rectangle-6"></span>
                <span class="rectangle-7"></span>
            </div>
            <div class="profile">
                <# if (settings.profile_image && settings.profile_image.url) { #>
                <img src="{{ settings.profile_image.url }}" alt="profile">
                <# } #>
                <div class="name">
                    <h1>{{{ settings.profile_name }}}</h1>
                    <p>{{{ settings.profile_title }}}</p>
                </div>
            </div>
            <ul class="information">
                <# if (settings.contact_email) { #>
                <li>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/mail.svg" alt="mail">
                    </div>
                    <div class="content">
                        <span><?php echo esc_html__('Email', 'resume-theme'); ?></span>
                        <a href="mailto:{{ settings.contact_email }}">{{ settings.contact_email }}</a>
                    </div>
                </li>
                <# } #>
                <# if (settings.contact_phone) { #>
                <li>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/phone.svg" alt="phone">
                    </div>
                    <div class="content">
                        <span><?php echo esc_html__('Phone', 'resume-theme'); ?></span>
                        <a href="tel:{{ settings.contact_phone }}">{{ settings.contact_phone }}</a>
                    </div>
                </li>
                <# } #>
                <# if (settings.contact_address) { #>
                <li>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/location.svg" alt="location">
                    </div>
                    <div class="content">
                        <span><?php echo esc_html__('Address', 'resume-theme'); ?></span>
                        <p>{{ settings.contact_address }}</p>
                    </div>
                </li>
                <# } #>
            </ul>
            <# if (settings.show_socials === 'yes' && settings.socials && settings.socials.length) { #>
            <div class="socials">
                <h3><?php echo esc_html__('Socials', 'resume-theme'); ?></h3>
                <ul>
                    <# _.each(settings.socials, function(social){ if (social.social_url && social.social_url.url) { #>
                    <li>
                        <a href="{{ social.social_url.url }}">
                            <div class="icon">
                                <# if (social.social_icon && social.social_icon.url) { #>
                                <img src="{{ social.social_icon.url }}" alt="{{ social.social_label }}">
                                <# } #>
                            </div>
                            <div class="content">
                                <span>{{ social.social_label }}</span>
                                <p>{{ social.social_username }}</p>
                            </div>
                        </a>
                    </li>
                    <# } }); #>
                </ul>
            </div>
            <# } #>
            <# if (settings.languages && settings.languages.length) { #>
            <div class="languages">
                <h3>{{ settings.languages_title }}</h3>
                <ul>
                    <# _.each(settings.languages, function(lang){ #>
                    <li>
                        <div class="icon">
                            <# if (lang.language_icon && lang.language_icon.url) { #>
                            <img src="{{ lang.language_icon.url }}" alt="{{ lang.language_name }}">
                            <# } #>
                        </div>
                        <div class="content">
                            <span>{{ lang.language_name }}</span>
                            <p>{{ lang.language_level }}</p>
                        </div>
                    </li>
                    <# }); #>
                </ul>
            </div>
            <# } #>
        </aside>
        <?php
    }
}



