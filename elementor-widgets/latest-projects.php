<?php
/**
 * Latest Projects Widget for Elementor
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

class Latest_Projects_Widget extends Widget_Base
{

	/**
	 * Get widget name
	 */
	public function get_name()
	{
		return 'latest-projects';
	}

	/**
	 * Get widget title
	 */
	public function get_title()
	{
		return esc_html__('Latest Projects', 'resume-theme');
	}

	/**
	 * Get widget icon
	 */
	public function get_icon()
	{
		return 'eicon-gallery-grid';
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
		return ['projects', 'portfolio', 'works', 'latest'];
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
				'default' => 'Latest Projects',
				'placeholder' => esc_html__('Enter section title', 'resume-theme'),
			]
		);

		// Source switch
		$this->add_control(
			'source_type',
			[
				'label' => esc_html__('Source', 'resume-theme'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'manual' => esc_html__('Manual (Repeater)', 'resume-theme'),
					'query' => esc_html__('Query (Posts)', 'resume-theme'),
				],
				'default' => 'query',
			]
		);

		// Query Controls (when source = query)
		$this->add_control(
			'posts_per_page',
			[
				'label' => esc_html__('Posts Per Page', 'resume-theme'),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
				'condition' => [
					'source_type' => 'query',
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => esc_html__('Order By', 'resume-theme'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'date' => esc_html__('Date', 'resume-theme'),
					'title' => esc_html__('Title', 'resume-theme'),
					'rand' => esc_html__('Random', 'resume-theme'),
				],
				'default' => 'date',
				'condition' => [
					'source_type' => 'query',
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__('Order', 'resume-theme'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'DESC' => esc_html__('Descending', 'resume-theme'),
					'ASC' => esc_html__('Ascending', 'resume-theme'),
				],
				'default' => 'DESC',
				'condition' => [
					'source_type' => 'query',
				],
			]
		);

		// Categories (from default 'category' taxonomy)
		$cat_options = [];
		$categories = function_exists('get_terms') ? get_terms([
			'taxonomy' => 'category',
			'hide_empty' => false,
		]) : [];
		if (!is_wp_error($categories) && !empty($categories)) {
			foreach ($categories as $cat) {
				$cat_options[$cat->term_id] = $cat->name;
			}
		}

		$this->add_control(
			'include_categories',
			[
				'label' => esc_html__('Categories', 'resume-theme'),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'label_block' => true,
				'options' => $cat_options,
				'condition' => [
					'source_type' => 'query',
				],
			]
		);

		// Manual Repeater (only when source = manual)
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'project_title',
			[
				'label' => esc_html__('Project Title', 'resume-theme'),
				'type' => Controls_Manager::TEXT,
				'default' => 'Project Title',
				'placeholder' => esc_html__('Enter project title', 'resume-theme'),
			]
		);

		$repeater->add_control(
			'project_description',
			[
				'label' => esc_html__('Description', 'resume-theme'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Short description of the project.',
				'placeholder' => esc_html__('Enter project description', 'resume-theme'),
			]
		);

		$repeater->add_control(
			'project_image',
			[
				'label' => esc_html__('Project Image', 'resume-theme'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri() . '/src/img/project/netbee-market.svg',
				],
			]
		);

		$repeater->add_control(
			'project_link',
			[
				'label' => esc_html__('Project Link', 'resume-theme'),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'projects',
			[
				'label' => esc_html__('Projects', 'resume-theme'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'project_title' => 'Ticket Plus',
						'project_description' => 'E-ticketing platform for events with QR validation.',
						'project_image' => [
							'url' => get_template_directory_uri() . '/src/img/project/ticket-plus.svg',
						],
						'project_link' => [
							'url' => '#',
							'is_external' => true,
							'nofollow' => true,
						],
					],
					[
						'project_title' => 'Pay With QR',
						'project_description' => 'Frictionless QR-based payment solution.',
						'project_image' => [
							'url' => get_template_directory_uri() . '/src/img/project/pay-with-qr.svg',
						],
						'project_link' => [
							'url' => '#',
							'is_external' => true,
							'nofollow' => true,
						],
					],
				],
				'title_field' => '{{{ project_title }}}',
				'condition' => [
					'source_type' => 'manual',
				],
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
				'selector' => '{{WRAPPER}} .latest-projects .title h2',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Title Color', 'resume-theme'),
				'type' => Controls_Manager::COLOR,
				'default' => '#E2E6EE',
				'selectors' => [
					'{{WRAPPER}} .latest-projects .title h2' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .latest-projects .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Card Style
		$this->add_control(
			'card_style',
			[
				'label' => esc_html__('Project Card', 'resume-theme'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'card_background',
			[
				'label' => esc_html__('Background Color', 'resume-theme'),
				'type' => Controls_Manager::COLOR,
				'default' => '#2E2E48',
				'selectors' => [
					'{{WRAPPER}} .projects-grid .project-card' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'card_border',
				'label' => esc_html__('Border', 'resume-theme'),
				'selector' => '{{WRAPPER}} .projects-grid .project-card',
			]
		);

		$this->add_control(
			'card_border_radius',
			[
				'label' => esc_html__('Border Radius', 'resume-theme'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .projects-grid .project-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'card_padding',
			[
				'label' => esc_html__('Padding', 'resume-theme'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .projects-grid .project-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'card_margin',
			[
				'label' => esc_html__('Margin', 'resume-theme'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .projects-grid .project-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Text styles
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'project_title_typography',
				'label' => esc_html__('Project Title Typography', 'resume-theme'),
				'selector' => '{{WRAPPER}} .project-card h4',
			]
		);

		$this->add_control(
			'project_title_color',
			[
				'label' => esc_html__('Project Title Color', 'resume-theme'),
				'type' => Controls_Manager::COLOR,
				'default' => '#E2E6EE',
				'selectors' => [
					'{{WRAPPER}} .project-card h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'project_desc_typography',
				'label' => esc_html__('Description Typography', 'resume-theme'),
				'selector' => '{{WRAPPER}} .project-card p',
			]
		);

		$this->add_control(
			'project_desc_color',
			[
				'label' => esc_html__('Description Color', 'resume-theme'),
				'type' => Controls_Manager::COLOR,
				'default' => '#ACB1C3',
				'selectors' => [
					'{{WRAPPER}} .project-card p' => 'color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .latest-projects',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'container_border',
				'label' => esc_html__('Border', 'resume-theme'),
				'selector' => '{{WRAPPER}} .latest-projects',
			]
		);

		$this->add_control(
			'container_border_radius',
			[
				'label' => esc_html__('Border Radius', 'resume-theme'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .latest-projects' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'container_shadow',
				'label' => esc_html__('Box Shadow', 'resume-theme'),
				'selector' => '{{WRAPPER}} .latest-projects',
			]
		);

		$this->add_control(
			'container_padding',
			[
				'label' => esc_html__('Padding', 'resume-theme'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .latest-projects' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .latest-projects' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		$items = [];

		if (isset($settings['source_type']) && $settings['source_type'] === 'query') {
			$args = [
				'post_type' => 'post',
				'posts_per_page' => !empty($settings['posts_per_page']) ? intval($settings['posts_per_page']) : 6,
				'orderby' => !empty($settings['orderby']) ? $settings['orderby'] : 'date',
				'order' => !empty($settings['order']) ? $settings['order'] : 'DESC',
				'ignore_sticky_posts' => true,
			];

			if (!empty($settings['include_categories'])) {
				$args['tax_query'] = [
					[
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => array_map('intval', (array)$settings['include_categories']),
					],
				];
			}

			$query = new \WP_Query($args);

			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
					$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
					if (!$thumbnail_url) {
						$thumbnail_url = get_template_directory_uri() . '/src/img/project/ticket-plus.svg';
					}
					$items[] = [
						'title' => get_the_title(),
						'description' => wp_strip_all_tags(get_the_excerpt()),
						'image' => $thumbnail_url,
						'link' => get_permalink(),
						'is_external' => false,
						'nofollow' => false,
					];
				}
				wp_reset_postdata();
			}
		} else {
			if (!empty($settings['projects'])) {
				foreach ($settings['projects'] as $project) {
					$items[] = [
						'title' => $project['project_title'],
						'description' => $project['project_description'],
						'image' => !empty($project['project_image']['url']) ? $project['project_image']['url'] : get_template_directory_uri() . '/src/img/project/ticket-plus.svg',
						'link' => isset($project['project_link']['url']) ? $project['project_link']['url'] : '#',
						'is_external' => !empty($project['project_link']['is_external']),
						'nofollow' => !empty($project['project_link']['nofollow']),
					];
				}
			}
		}

		if (empty($items)) {
			return;
		}
		?>
		<div class="latest-projects">
			<div class="title">
				<h2><?php echo esc_html($settings['section_title']); ?></h2>
			</div>
			<div class="project-slider">
				<ul>
					<?php foreach ($items as $item): ?>
						<?php
						$link = isset($item['link']) ? $item['link'] : '#';
						$target = !empty($item['is_external']) ? ' target="_blank"' : '';
						$rel = ' rel="' . (!empty($item['nofollow']) ? 'nofollow' : 'noopener') . '"';
						?>
						<li>
							<article>
								<img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?> project">
								<div class="project-info">
									<h3>
										<a href="<?php echo esc_url($link); ?>"<?php echo $target; ?><?php echo $rel; ?>>
											<?php echo esc_html($item['title']); ?>
										</a>
									</h3>
									<p><?php echo esc_html($item['description']); ?></p>
									<?php if ($link !== '#'): ?>
										<a href="<?php echo esc_url($link); ?>"<?php echo $target; ?><?php echo $rel; ?>>
											<img src="<?php echo get_template_directory_uri(); ?>/src/img/link.svg" alt="link">
											<span><?php echo esc_html(parse_url($link, PHP_URL_HOST)); ?></span>
										</a>
									<?php endif; ?>
								</div>
							</article>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php
	}

	/**
	 * Render widget output in the editor
	 */
	protected function content_template()
	{
		?>
		<div class="latest-projects">
			<div class="title">
				<h2>{{{ settings.section_title }}}</h2>
			</div>
			<div class="project-slider">
				<ul>
					<#
					var items = [];
					if (settings.source_type === 'manual') {
						items = settings.projects || [];
					} else {
						items = settings.projects || [];
					}
					_.each(items, function(project) { #>
					<li>
						<article>
							<# if (project.project_image && project.project_image.url) { #>
							<img src="{{ project.project_image.url }}" alt="{{ project.project_title }} project">
							<# } #>
							<div class="project-info">
								<h3>
									<a href="{{ project.project_link && project.project_link.url || '#' }}" {{ project.project_link && project.project_link.is_external ? 'target\="_blank"' : '' }} rel="{{ project.project_link && project.project_link.nofollow ? 'nofollow' : 'noopener' }}">
										{{{ project.project_title }}}
									</a>
								</h3>
								<p>{{{ project.project_description }}}</p>
								<# if (project.project_link && project.project_link.url && project.project_link.url !== '#') { #>
								<a href="{{ project.project_link.url }}" {{ project.project_link.is_external ? 'target\="_blank"' : '' }} rel="{{ project.project_link.nofollow ? 'nofollow' : 'noopener' }}">
									<img src="<?php echo get_template_directory_uri(); ?>/src/img/link.svg" alt="link">
									<span>{{ project.project_link.url.replace(/^https?:\/\//,'').replace(/\/.*$/,'') }}</span>
								</a>
								<# } #>
							</div>
						</article>
					</li>
					<# }); #>
				</ul>
			</div>
		</div>
		<?php
	}
}

(new Latest_Projects_Widget())->register_widget();
