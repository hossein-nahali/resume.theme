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

        // Inner repeater: items under each skill group
        $item_repeater = new \Elementor\Repeater();

        $item_repeater->add_control(
            'skill_item_icon',
            [
                'label' => esc_html__('Icon/Image', 'resume-theme'),
                'type' => Controls_Manager::MEDIA,
                'default' => [ 'url' => get_template_directory_uri() . '/src/img/logos/JavaScript.svg' ],
            ]
        );

        $item_repeater->add_control(
            'skill_item_name',
            [
                'label' => esc_html__('Item Name', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'JavaScript',
                'placeholder' => esc_html__('Enter item name', 'resume-theme'),
            ]
        );

        // Outer repeater: groups (li.skill)
        $group_repeater = new \Elementor\Repeater();

        $group_repeater->add_control(
            'skill_group_title',
            [
                'label' => esc_html__('Group Title', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Developer',
                'placeholder' => esc_html__('Enter group title', 'resume-theme'),
            ]
        );

        $group_repeater->add_control(
            'skill_group_items',
            [
                'label' => esc_html__('Group Items', 'resume-theme'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $item_repeater->get_controls(),
                'default' => [
                    [ 'skill_item_name' => 'React', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/React-Dark.svg' ] ],
                    [ 'skill_item_name' => 'Next', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/NextJS-Dark.svg' ] ],
                    [ 'skill_item_name' => 'JavaScript', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/JavaScript.svg' ] ],
                    [ 'skill_item_name' => 'TypeScript', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/TypeScript.svg' ] ],
                ],
                'title_field' => '{{{ skill_item_name }}}',
            ]
        );

        $this->add_control(
            'skill_groups',
            [
                'label' => esc_html__('Skill Groups', 'resume-theme'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $group_repeater->get_controls(),
                'default' => [
                    [
                        'skill_group_title' => 'Developer',
                        'skill_group_items' => [
                            [ 'skill_item_name' => 'React', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/React-Dark.svg' ] ],
                            [ 'skill_item_name' => 'Next', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/NextJS-Dark.svg' ] ],
                            [ 'skill_item_name' => 'JavaScript', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/JavaScript.svg' ] ],
                            [ 'skill_item_name' => 'TypeScript', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/TypeScript.svg' ] ],
                        ]
                    ],
                    [
                        'skill_group_title' => 'Tools',
                        'skill_group_items' => [
                            [ 'skill_item_name' => 'Postman', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/Postman.svg' ] ],
                            [ 'skill_item_name' => 'Pnpm', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/Pnpm-Dark.svg' ] ],
                            [ 'skill_item_name' => 'Figma', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/Figma-Dark.svg' ] ],
                            [ 'skill_item_name' => 'Xd', 'skill_item_icon' => [ 'url' => get_template_directory_uri() . '/src/img/logos/XD.svg' ] ],
                        ]
                    ],
                ],
                'title_field' => '{{{ skill_group_title }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'container_section',
            [
                'label' => esc_html__('Container', 'resume-theme'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'container_background',
                'label' => esc_html__('Background', 'resume-theme'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .skills',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'label' => esc_html__('Border', 'resume-theme'),
                'selector' => '{{WRAPPER}} .skills',
            ]
        );

        $this->add_control(
            'container_border_radius',
            [
                'label' => esc_html__('Border Radius', 'resume-theme'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .skills' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'container_shadow',
                'label' => esc_html__('Box Shadow', 'resume-theme'),
                'selector' => '{{WRAPPER}} .skills',
            ]
        );

        $this->add_control(
            'container_padding',
            [
                'label' => esc_html__('Padding', 'resume-theme'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .skills' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'container_margin',
            [
                'label' => esc_html__('Margin', 'resume-theme'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .skills' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

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

        if (empty($settings['skill_groups'])) {
            return;
        }
        ?>
        <div class="skills">
            <div class="title">
                <h2><?php echo esc_html($settings['section_title']); ?></h2>
            </div>
            <ul class="skills-list">
                <?php foreach ($settings['skill_groups'] as $group): ?>
                    <li class="skill">
                        <div class="title-skill">
                            <h4><?php echo esc_html($group['skill_group_title']); ?></h4>
                        </div>
                        <div class="skills-container">
                            <ul>
                                <?php if (!empty($group['skill_group_items'])): foreach ($group['skill_group_items'] as $item): ?>
                                    <li>
                                        <img src="<?php echo esc_url(!empty($item['skill_item_icon']['url']) ? $item['skill_item_icon']['url'] : get_template_directory_uri() . '/src/img/logos/JavaScript.svg'); ?>" alt="<?php echo esc_attr($item['skill_item_name']); ?>">
                                        <p><?php echo esc_html($item['skill_item_name']); ?></p>
                                    </li>
                                <?php endforeach; endif; ?>
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
            <div class="title">
                <h2>{{{ settings.section_title }}}</h2>
            </div>
            <ul class="skills-list">
                <# _.each(settings.skill_groups, function(group) { #>
                <li class="skill">
                    <div class="title-skill">
                        <h4>{{{ group.skill_group_title }}}</h4>
                    </div>
                    <div class="skills-container">
                        <ul>
                            <# _.each(group.skill_group_items, function(item){ #>
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
