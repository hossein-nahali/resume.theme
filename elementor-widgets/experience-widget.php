<?php
/**
 * Experience Widget for Elementor
 *
 * @package Resume_Theme
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Experience_Widget extends Widget_Base
{

    /**
     * Get widget name
     */
    public function get_name()
    {
        return 'experience-widget';
    }

    /**
     * Get widget title
     */
    public function get_title()
    {
        return esc_html__('Experience Section', 'resume-theme');
    }

    /**
     * Get widget icon
     */
    public function get_icon()
    {
        return 'eicon-time-line';
    }

    /**
     * Get widget categories
     */
    public function get_categories()
    {
        return ['resume-theme'];
    }

    /**
     * Get widget keywords
     */
    public function get_keywords()
    {
        return ['experience', 'resume', 'timeline', 'work', 'job'];
    }

    /**
     * Register widget controls
     */
    protected function register_controls()
    {

        // Content Section
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
                'default' => 'Experience',
                'placeholder' => esc_html__('Enter section title', 'resume-theme'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'company_name',
            [
                'label' => esc_html__('Company Name', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Company Name',
                'placeholder' => esc_html__('Enter company name', 'resume-theme'),
            ]
        );

        $repeater->add_control(
            'position',
            [
                'label' => esc_html__('Position', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Job Position',
                'placeholder' => esc_html__('Enter job position', 'resume-theme'),
            ]
        );

        $repeater->add_control(
            'period',
            [
                'label' => esc_html__('Period', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => '2023 - Present',
                'placeholder' => esc_html__('Enter work period', 'resume-theme'),
            ]
        );

        $repeater->add_control(
            'location',
            [
                'label' => esc_html__('Location', 'resume-theme'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Remote',
                'placeholder' => esc_html__('Enter work location', 'resume-theme'),
            ]
        );

        $repeater->add_control(
            'company_logo',
            [
                'label' => esc_html__('Company Logo', 'resume-theme'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/src/img/netbee.svg',
                ],
            ]
        );

        $repeater->add_control(
            'is_current',
            [
                'label' => esc_html__('Current Position', 'resume-theme'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'resume-theme'),
                'label_off' => esc_html__('No', 'resume-theme'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'experiences',
            [
                'label' => esc_html__('Experience Items', 'resume-theme'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'company_name' => 'Netbee',
                        'position' => 'Front-End Developer',
                        'period' => 'Present',
                        'location' => 'Iran, Esfahan',
                        'company_logo' => [
                            'url' => get_template_directory_uri() . '/src/img/netbee.svg',
                        ],
                        'is_current' => 'yes',
                    ],
                    [
                        'company_name' => 'Self-Employed',
                        'position' => 'Front-End Developer (Freelance)',
                        'period' => '2021 - 2023',
                        'location' => 'Remote',
                        'company_logo' => [
                            'url' => get_template_directory_uri() . '/src/img/freelance.png',
                        ],
                        'is_current' => 'no',
                    ],
                ],
                'title_field' => '{{{ company_name }}}',
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'resume-theme'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Title Style
        $this->add_control(
            'title_style',
            [
                'label' => esc_html__('Title', 'resume-theme'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'resume-theme'),
                'selector' => '{{WRAPPER}} .experience .title h2',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#E2E6EE',
                'selectors' => [
                    '{{WRAPPER}} .experience .title h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_margin',
            [
                'label' => esc_html__('Title Margin', 'resume-theme'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .experience .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Item Style
        $this->add_control(
            'item_style',
            [
                'label' => esc_html__('Experience Item', 'resume-theme'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'item_background',
            [
                'label' => esc_html__('Background Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#2E2E48',
                'selectors' => [
                    '{{WRAPPER}} .experience-list li' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'current_item_background',
            [
                'label' => esc_html__('Current Item Background', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#312163',
                'selectors' => [
                    '{{WRAPPER}} .experience-list li.present' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'label' => esc_html__('Border', 'resume-theme'),
                'selector' => '{{WRAPPER}} .experience-list li',
            ]
        );

        $this->add_control(
            'item_border_radius',
            [
                'label' => esc_html__('Border Radius', 'resume-theme'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .experience-list li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'resume-theme'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .experience-list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'item_margin',
            [
                'label' => esc_html__('Margin', 'resume-theme'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .experience-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Company Name Style
        $this->add_control(
            'company_name_style',
            [
                'label' => esc_html__('Company Name', 'resume-theme'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'company_name_typography',
                'label' => esc_html__('Company Name Typography', 'resume-theme'),
                'selector' => '{{WRAPPER}} .development-info .info h4',
            ]
        );

        $this->add_control(
            'company_name_color',
            [
                'label' => esc_html__('Company Name Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#E2E6EE',
                'selectors' => [
                    '{{WRAPPER}} .development-info .info h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Position Style
        $this->add_control(
            'position_style',
            [
                'label' => esc_html__('Position', 'resume-theme'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'label' => esc_html__('Position Typography', 'resume-theme'),
                'selector' => '{{WRAPPER}} .development-info .info p',
            ]
        );

        $this->add_control(
            'position_color',
            [
                'label' => esc_html__('Position Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ACB1C3',
                'selectors' => [
                    '{{WRAPPER}} .development-info .info p' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Period Style
        $this->add_control(
            'period_style',
            [
                'label' => esc_html__('Period', 'resume-theme'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'period_typography',
                'label' => esc_html__('Period Typography', 'resume-theme'),
                'selector' => '{{WRAPPER}} .experience-status',
            ]
        );

        $this->add_control(
            'period_color',
            [
                'label' => esc_html__('Period Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#D9DFE8',
                'selectors' => [
                    '{{WRAPPER}} .experience-status' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'current_period_background',
            [
                'label' => esc_html__('Current Period Background', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#5531A7',
                'selectors' => [
                    '{{WRAPPER}} .experience-list li.present .experience-status' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'current_period_color',
            [
                'label' => esc_html__('Current Period Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#EFE2F9',
                'selectors' => [
                    '{{WRAPPER}} .experience-list li.present .experience-status' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Location Style
        $this->add_control(
            'location_style',
            [
                'label' => esc_html__('Location', 'resume-theme'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'location_typography',
                'label' => esc_html__('Location Typography', 'resume-theme'),
                'selector' => '{{WRAPPER}} .experience-location span',
            ]
        );

        $this->add_control(
            'location_color',
            [
                'label' => esc_html__('Location Color', 'resume-theme'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ACB1C3',
                'selectors' => [
                    '{{WRAPPER}} .experience-location span' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Logo Style
        $this->add_control(
            'logo_style',
            [
                'label' => esc_html__('Company Logo', 'resume-theme'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'logo_width',
            [
                'label' => esc_html__('Logo Width', 'resume-theme'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .development-info img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'logo_height',
            [
                'label' => esc_html__('Logo Height', 'resume-theme'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .development-info img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'logo_border_radius',
            [
                'label' => esc_html__('Logo Border Radius', 'resume-theme'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .development-info img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Container Style
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
                'selector' => '{{WRAPPER}} .experience',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'label' => esc_html__('Border', 'resume-theme'),
                'selector' => '{{WRAPPER}} .experience',
            ]
        );

        $this->add_control(
            'container_border_radius',
            [
                'label' => esc_html__('Border Radius', 'resume-theme'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .experience' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'container_shadow',
                'label' => esc_html__('Box Shadow', 'resume-theme'),
                'selector' => '{{WRAPPER}} .experience',
            ]
        );

        $this->add_control(
            'container_padding',
            [
                'label' => esc_html__('Padding', 'resume-theme'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .experience' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .experience' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (empty($settings['experiences'])) {
            return;
        }
        ?>
        <div class="experience">
            <div class="title">
                <h2><?php echo esc_html($settings['section_title']); ?></h2>
            </div>
            <ul class="experience-list">
                <?php foreach ($settings['experiences'] as $index => $experience): ?>
                    <?php
                    $is_current = $experience['is_current'] === 'yes';
                    $logo_url = !empty($experience['company_logo']['url']) ? $experience['company_logo']['url'] : get_template_directory_uri() . '/src/img/netbee.svg';
                    ?>
                    <li class="<?php echo $is_current ? 'present' : ''; ?>">
                        <div class="development-info">
                            <img src="<?php echo esc_url($logo_url); ?>"
                                 alt="<?php echo esc_attr($experience['company_name']); ?>">
                            <div class="info">
                                <p><?php echo esc_html($experience['position']); ?></p>
                                <h4><?php echo esc_html($experience['company_name']); ?></h4>
                            </div>
                        </div>
                        <div class="experience-info">
                            <span class="experience-status"><?php echo esc_html($experience['period']); ?></span>
                            <?php if (esc_html($experience['location'])) { ?>
                                <div class="experience-location">
                                    <img src="<?php echo get_template_directory_uri(); ?>/src/img/location-2.svg"
                                         alt="location">
                                    <span><?php echo esc_html($experience['location']); ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }

    /**
     * Render widget output in the editor
     */
    protected function content_template()
    {
        ?>
        <div class="experience">
            <div class="title">
                <h2>{{{ settings.section_title }}}</h2>
            </div>
            <ul class="experience-list">
                <# _.each(settings.experiences, function(experience, index) { #>
                <li class="{{ experience.is_current === 'yes' ? 'present' : '' }}">
                    <div class="development-info">
                        <# if (experience.company_logo.url) { #>
                        <img src="{{ experience.company_logo.url }}" alt="{{ experience.company_name }}">
                        <# } #>
                        <div class="info">
                            <p>{{{ experience.position }}}</p>
                            <h4>{{{ experience.company_name }}}</h4>
                        </div>
                    </div>
                    <div class="experience-info">
                        <span class="experience-status">{{{ experience.period }}}</span>
                        <# if (experience.location) { #>
                        <div class="experience-location">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/location-2.svg"
                                 alt="location">
                            <span>{{{ experience.location }}}</span>
                        </div>
                        <# } #>
                    </div>
                </li>
                <# }); #>
            </ul>
        </div>
        <?php
    }
}

