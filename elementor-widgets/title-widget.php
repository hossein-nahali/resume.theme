<?php
/**
 * Title Widget for Elementor
 *
 * @package Resume_Theme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Title_Widget extends Widget_Base
{
    public function get_name() {
        return 'custom_title';
    }

    public function get_title() {
        return esc_html__('Custom Title', 'resume-theme');
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return ['resume-theme'];
    }

    protected function register_controls() {
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
                'default' => 'Title',
                'placeholder' => esc_html__('Enter section title', 'resume-theme'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'resume-theme'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'resume-theme'),
                'selector' => '{{WRAPPER}} .title h2',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#E2E6EE',
                'selectors' => [
                    '{{WRAPPER}} .title h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    public function register_widget()
    {
        Plugin::instance()->widgets_manager->register_widget_type($this);
    }

    public function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="title">
            <h2><?php echo esc_html($settings['section_title']); ?></h2>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <div class="title">
            <h2>{{{ settings.section_title }}}</h2>
        </div>
        <?php
    }
}

(new Title_Widget())->register_widget();
