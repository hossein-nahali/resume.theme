<?php
/**
 * Skills Widget for Elementor
 *
 * @package Resume_Theme
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Skills_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'skills';
    }

    public function get_title()
    {
        return esc_html__('Skills', 'resume-theme');
    }

    public function get_icon()
    {
        return 'eicon-skill-bar';
    }

    public function get_categories()
    {
        return ['resume-theme'];
    }

    public function get_keywords()
    {
        return ['skills', 'abilities', 'stack', 'tools'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'resume-theme'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => esc_html__('Section Title', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Skills',
                'placeholder' => esc_html__('Enter section title', 'resume-theme'),
            ]
        );

        // فقط یک ریپیتر ساده
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'skill_item_icon',
            [
                'label' => esc_html__('Icon/Image', 'resume-theme'),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => get_template_directory_uri() . '/src/img/logos/JavaScript.svg'],
            ]
        );

        $repeater->add_control(
            'skill_item_name',
            [
                'label' => esc_html__('Item Name', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'JavaScript',
                'placeholder' => esc_html__('Enter item name', 'resume-theme'),
            ]
        );

        $this->add_control(
            'skills',
            [
                'label' => esc_html__('Skills', 'resume-theme'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'skill_group_title' => 'Developer',
                        'skill_item_name' => 'React',
                        'skill_item_icon' => ['url' => get_template_directory_uri() . '/src/img/logos/React-Dark.svg'],
                    ],
                    [
                        'skill_group_title' => 'Developer',
                        'skill_item_name' => 'Next',
                        'skill_item_icon' => ['url' => get_template_directory_uri() . '/src/img/logos/NextJS-Dark.svg'],
                    ],
                    [
                        'skill_group_title' => 'Tools',
                        'skill_item_name' => 'Postman',
                        'skill_item_icon' => ['url' => get_template_directory_uri() . '/src/img/logos/Postman.svg'],
                    ],
                ],
                'title_field' => '{{{ skill_group_title }}} - {{{ skill_item_name }}}',
            ]
        );

        $this->end_controls_section();

        // بقیه استایل‌ها همون قبلی می‌مونه
        $this->start_controls_section(
            'group_style_section',
            [
                'label' => esc_html__('Group & Items', 'resume-theme'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'group_title_typography',
                'label' => esc_html__('Group Title Typography', 'resume-theme'),
                'selector' => '{{WRAPPER}} .skills-list .title-skill h4',
            ]
        );

        $this->add_control(
            'group_title_color',
            [
                'label' => esc_html__('Group Title Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#E2E6EE',
                'selectors' => [
                    '{{WRAPPER}} .skills-list .title-skill h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_text_typography',
                'label' => esc_html__('Item Text Typography', 'resume-theme'),
                'selector' => '{{WRAPPER}} .skills-container ul li p',
            ]
        );

        $this->add_control(
            'item_text_color',
            [
                'label' => esc_html__('Item Text Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#E2E6EE',
                'selectors' => [
                    '{{WRAPPER}} .skills-container ul li p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    public function register_widget()
    {
        Plugin::instance()->widgets_manager->register_widget_type($this);
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (empty($settings['skills'])) {
            return;
        }

        // گروه‌بندی بر اساس group_title
        $grouped = [];
        foreach ($settings['skills'] as $skill) {
            $grouped[$skill['skill_group_title']][] = $skill;
        }
        ?>
        <div class="skills">
            <ul class="skills-list">
                <?php foreach ($grouped as $group_title => $items): ?>
                    <li class="skill">
                        <div class="title-skill">
                            <h4><?php echo esc_html($settings['section_title']); ?></h4>
                        </div>
                        <div class="skills-container">
                            <ul>
                                <?php foreach ($items as $item): ?>
                                    <li>
                                        <img src="<?php echo esc_url(!empty($item['skill_item_icon']['url']) ? $item['skill_item_icon']['url'] : get_template_directory_uri() . '/src/img/logos/JavaScript.svg'); ?>" alt="<?php echo esc_attr($item['skill_item_name']); ?>">
                                        <p><?php echo esc_html($item['skill_item_name']); ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }

    protected function content_template()
    {
        ?>
        <div class="skills">
            <ul class="skills-list">
                <#
                var grouped = {};
                _.each(settings.skills, function(skill) {
                if (!grouped[skill.skill_group_title]) {
                grouped[skill.skill_group_title] = [];
                }
                grouped[skill.skill_group_title].push(skill);
                });
                _.each(grouped, function(items, group_title) { #>
                <li class="skill">
                    <div class="title-skill">
                        <h4>{{{ settings.section_title }}}</h4>
                    </div>
                    <div class="skills-container">
                        <ul>
                            <# _.each(items, function(item) { #>
                            <li>
                                <# if (item.skill_item_icon && item.skill_item_icon.url) { #>
                                <img src="{{ item.skill_item_icon.url }}" alt="{{ item.skill_item_name }}">
                                <# } #>
                                <p>{{{ item.skill_item_name }}}</p>
                            </li>
                            <# }); #>
                        </ul>
                    </div>
                </li>
                <# }); #>
            </ul>
        </div>
        <?php
    }
}

(new Skills_Widget())->register_widget();
