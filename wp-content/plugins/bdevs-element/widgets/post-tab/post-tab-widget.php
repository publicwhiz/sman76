<?php

namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use BdevsElementor\Controls\Select2;

defined('ABSPATH') || die();

class Post_Tab extends BDevs_El_Widget
{

	/**
	 * Get widget name.
	 *
	 * Retrieve Bdevs Element widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'post_tab';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title()
	{
		return __('Post Tab', 'bdevselement');
	}

	public function get_custom_help_url()
	{
		return 'http://elementor.bdevs.net//widgets/post-tab/';
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon()
	{
		return 'eicon-post';
	}

	public function get_keywords()
	{
		return ['posts', 'post', 'post-tab', 'tab', 'news'];
	}

	/**
	 * Get a list of All Post Types
	 *
	 * @return array
	 */
	public static function get_post_types()
	{
		$diff_key = [
			'elementor_library' => '',
			'attachment' => '',
			'page' => ''
		];
		$post_types = bdevs_element_get_post_types([], $diff_key);
		return $post_types;
	}

	/**
	 * Get a list of Taxonomy
	 *
	 * @return array
	 */
	public static function get_taxonomies($post_type = '')
	{
		$list = [];
		if ($post_type) {
			$tax = bdevs_element_get_taxonomies(['public' => true, "object_type" => [$post_type]], 'object', true);
			$list[$post_type] = count($tax) !== 0 ? $tax : '';
		} else {
			$list = bdevs_element_get_taxonomies(['public' => true], 'object', true);
		}
		return $list;
	}

	protected function register_content_controls()
	{
		$this->start_controls_section(
			'_section_title',
			[
				'label' => __('Title & Description', 'bdevselement'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('Title', 'bdevselement'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => __('bdevs Info Box Title', 'bdevselement'),
				'placeholder' => __('Type Info Box Title', 'bdevselement'),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __('Description', 'bdevselement'),
				'description' => bdevs_element_get_allowed_html_desc('intermediate'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __('bdevs info box description goes here', 'bdevselement'),
				'placeholder' => __('Type info box description', 'bdevselement'),
				'rows' => 5,
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => __('Title HTML Tag', 'bdevselement'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'h1'  => [
						'title' => __('H1', 'bdevselement'),
						'icon' => 'eicon-editor-h1'
					],
					'h2'  => [
						'title' => __('H2', 'bdevselement'),
						'icon' => 'eicon-editor-h2'
					],
					'h3'  => [
						'title' => __('H3', 'bdevselement'),
						'icon' => 'eicon-editor-h3'
					],
					'h4'  => [
						'title' => __('H4', 'bdevselement'),
						'icon' => 'eicon-editor-h4'
					],
					'h5'  => [
						'title' => __('H5', 'bdevselement'),
						'icon' => 'eicon-editor-h5'
					],
					'h6'  => [
						'title' => __('H6', 'bdevselement'),
						'icon' => 'eicon-editor-h6'
					]
				],
				'default' => 'h1',
				'toggle' => false,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __('Alignment', 'bdevselement'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', 'bdevselement'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', 'bdevselement'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', 'bdevselement'),
						'icon' => 'fa fa-align-right',
					],
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_post_tab_query',
			[
				'label' => __('Query', 'bdevselement'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_type',
			[
				'label' => __('Source', 'bdevselement'),
				'type' => Controls_Manager::SELECT,
				'options' => $this->get_post_types(),
				'default' => key($this->get_post_types()),
			]
		);

		foreach (self::get_post_types() as $key => $value) {
			$taxonomy = self::get_taxonomies($key);
			if (! $taxonomy[$key])
				continue;
			$this->add_control(
				'tax_type_' . $key,
				[
					'label' => __('Taxonomies', 'bdevselement'),
					'type' => Controls_Manager::SELECT,
					'options' => $taxonomy[$key],
					'default' => key($taxonomy[$key]),
					'condition' => [
						'post_type' => $key
					],
				]
			);

			foreach ($taxonomy[$key] as $tax_key => $tax_value) {

				$this->add_control(
					'tax_ids_' . $tax_key,
					[
						'label' => __('Select ', 'bdevselement') . $tax_value,
						'label_block' => true,
						'type' => 'bdevselement-select2',
						'multiple' => true,
						'placeholder' => 'Search ' . $tax_value,
						'data_options' => [
							'tax_id' => $tax_key,
							'action' => 'bdevs_element_post_tab_select_query'
						],
						'condition' => [
							'post_type' => $key,
							'tax_type_' . $key => $tax_key
						],
						'render_type' => 'template',
					]
				);
			}
		}

		$this->add_control(
			'item_limit',
			[
				'label' => __('Item Limit', 'bdevselement'),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
				'dynamic' => ['active' => true],
			]
		);

		$this->end_controls_section();

		//Settings
		$this->start_controls_section(
			'_section_settings',
			[
				'label' => __('Settings', 'bdevselement'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'design_style',
			[
				'label' => __('Design Style', 'bdevselement'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style_1' => __('Style 1', 'bdevselement'),
					'style_2' => __('Style 2', 'bdevselement'),
				],
				'default' => 'style_1',
				'frontend_available' => true,
				'style_transfer' => true,
			]
		);

		$this->end_controls_section();
	}

	protected function register_style_controls()
	{

		$this->start_controls_section(
			'_section_post_tab_filter',
			[
				'label' => __('Tab', 'bdevselement'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'tab_margin_btm',
			[
				'label' => __('Margin Bottom', 'bdevselement'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'filter_pos' => 'top',
				],
			]
		);

		$this->add_responsive_control(
			'tab_padding',
			[
				'label' => __('Padding', 'bdevselement'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tab_shadow',
				'label' => __('Box Shadow', 'bdevselement'),
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'tab_border',
				'label' => __('Border', 'bdevselement'),
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter',
			]
		);

		$this->add_responsive_control(
			'tab_item',
			[
				'label' => __('Tab Item', 'bdevselement'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'tab_item_margin',
			[
				'label' => __('Margin', 'bdevselement'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tab_item_padding',
			[
				'label' => __('Padding', 'bdevselement'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->start_controls_tabs('tab_item_tabs');
		$this->start_controls_tab(
			'tab_item_normal_tab',
			[
				'label' => __('Normal', 'bdevselement'),
			]
		);

		$this->add_control(
			'tab_item_color',
			[
				'label' => __('Color', 'bdevselement'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'tab_item_background',
				'label' => __('Background', 'bdevselement'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_item_hover_tab',
			[
				'label' => __('Hover', 'bdevselement'),
			]
		);

		$this->add_control(
			'tab_item_hvr_color',
			[
				'label' => __('Color', 'bdevselement'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li.active' => 'color: {{VALUE}}',
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li:hover' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'tab_item_hvr_background',
				'label' => __('Background', 'bdevselement'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li.active,{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_item_typography',
				'label' => __('Typography', 'bdevselement'),
				//'scheme' => Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'tab_item_border',
				'label' => __('Border', 'bdevselement'),
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li',
			]
		);

		$this->add_responsive_control(
			'tab_item_border_radius',
			[
				'label' => __('Border Radius', 'bdevselement'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-filter li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();

		//Column
		$this->start_controls_section(
			'_section_post_tab_column',
			[
				'label' => __('Column', 'bdevselement'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'post_item_space',
			[
				'label' => __('Space Between', 'bdevselement'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'post_item_margin_btm',
			[
				'label' => __('Margin Bottom', 'bdevselement'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'post_item_padding',
			[
				'label' => __('Padding', 'bdevselement'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'post_item_background',
				'label' => __('Background', 'bdevselement'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'post_item_box_shadow',
				'label' => __('Box Shadow', 'bdevselement'),
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_item_border',
				'label' => __('Border', 'bdevselement'),
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner',
			]
		);

		$this->add_responsive_control(
			'post_item_border_radius',
			[
				'label' => __('Border Radius', 'bdevselement'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_section();

		//Content Style
		$this->start_controls_section(
			'_section_post_tab_content',
			[
				'label' => __('Content', 'bdevselement'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'post_content_image',
			[
				'label' => __('Image', 'bdevselement'),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'post_item_content_img_margin_btm',
			[
				'label' => __('Margin Bottom', 'bdevselement'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner .bdevselement-post-tab-thumb' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_boder',
				'label' => __('Border', 'bdevselement'),
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner .bdevselement-post-tab-thumb img',
			]
		);

		$this->add_responsive_control(
			'image_boder_radius',
			[
				'label' => __('Border Radius', 'bdevselement'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner .bdevselement-post-tab-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'post_content_title',
			[
				'label' => __('Title', 'bdevselement'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'post_content_margin_btm',
			[
				'label' => __('Margin Bottom', 'bdevselement'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner .bdevselement-post-tab-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'bdevselement'),
				//'scheme' => Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner .bdevselement-post-tab-title',
			]
		);

		$this->start_controls_tabs('title_tabs');
		$this->start_controls_tab(
			'title_normal_tab',
			[
				'label' => __('Normal', 'bdevselement'),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Color', 'bdevselement'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner .bdevselement-post-tab-title a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'title_hover_tab',
			[
				'label' => __('Hover', 'bdevselement'),
			]
		);

		$this->add_control(
			'title_hvr_color',
			[
				'label' => __('Color', 'bdevselement'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-item-inner .bdevselement-post-tab-title a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'post_content_meta',
			[
				'label' => __('Meta', 'bdevselement'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => __('Typography', 'bdevselement'),
				//'scheme' => Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-meta span',
			]
		);

		$this->start_controls_tabs('meta_tabs');
		$this->start_controls_tab(
			'meta_normal_tab',
			[
				'label' => __('Normal', 'bdevselement'),
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => __('Color', 'bdevselement'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-meta span' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-meta span a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'meta_hover_tab',
			[
				'label' => __('Hover', 'bdevselement'),
			]
		);

		$this->add_control(
			'meta_hvr_color',
			[
				'label' => __('Color', 'bdevselement'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-meta span:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-meta span:hover a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'meta__margin',
			[
				'label' => __('Margin', 'bdevselement'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-meta span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'post_content_excerpt',
			[
				'label' => __('Excerpt', 'bdevselement'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'excerpt' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'label' => __('Typography', 'bdevselement'),
				//'scheme' => Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-excerpt p',
				'condition' => [
					'excerpt' => 'yes',
				],
			]
		);

		$this->add_control(
			'excerpt_color',
			[
				'label' => __('Color', 'bdevselement'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-excerpt p' => 'color: {{VALUE}};',
				],
				'condition' => [
					'excerpt' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'excerpt_margin_top',
			[
				'label' => __('Margin Top', 'bdevselement'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .bdevselement-post-tab .bdevselement-post-tab-excerpt' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'excerpt' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{

		$settings = $this->get_settings_for_display();
		if (! $settings['post_type'])
			return;

		$taxonomy = $settings['tax_type_' . $settings['post_type']];
		$terms_ids = $settings['tax_ids_' . $taxonomy];
		$terms_args = [
			'taxonomy' => $taxonomy,
			'hide_empty' => true,
			'include' => $terms_ids,
			'orderby' => 'term_id',
		];
		$filter_list = get_terms($terms_args);

		$post_args = [
			'post_status' => 'publish',
			'post_type' => $settings['post_type'],
			'posts_per_page' => $settings['item_limit'],
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field' => 'term_id',
					'terms' => $terms_ids ? $terms_ids : '',
				),
			),
		];

		$posts = get_posts($post_args);

		$query_settings = [
			'post_type' => $settings['post_type'],
			'taxonomy' => $taxonomy,
			'item_limit' => $settings['item_limit'],
		];
		$query_settings = json_encode($query_settings, true);

		$event = 'click';




		$wrapper_class = [
			'portfolio-area',

		];
		$this->add_render_attribute('wrapper', 'class', $wrapper_class);
		$this->add_render_attribute('wrapper', 'data-query-args', $query_settings);
		$this->add_render_attribute('wrapper', 'data-event', $event);
		$this->add_render_attribute('project-filter', 'class', ['portfolio-filter mb-40']);
		$this->add_render_attribute('project-body', 'class', ['row row-portfolio']);
		$i = 1;

		if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'):
			if (!empty($terms_ids) && count($posts) !== 0) : ?>
				<section <?php $this->print_render_attribute_string('wrapper'); ?>>
					<div class="container">
						<div class="row">
							<!-- START PORTFOLIO FILTER AREA -->
							<div class="col-12">
								<div class="text-center">
									<div <?php $this->print_render_attribute_string('project-filter'); ?>>
										<?php foreach ($filter_list as $list): ?>
											<?php if ($i === 1): $i++; ?>
												<button class="active" data-filter="*"><?php echo esc_html('Show All'); ?></button>
												<button data-filter=".<?php echo esc_attr($list->slug); ?>"><?php echo esc_html($list->name); ?></button>
											<?php else: ?>
												<button data-filter=".<?php echo esc_attr($list->slug); ?>"><?php echo esc_html($list->name); ?></button>
											<?php endif; ?>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<!-- END PORTFOLIO FILTER AREA -->
						</div>
						<div id="portfolio-grid" <?php $this->print_render_attribute_string('project-body'); ?>>
							<div class="col-lg-4 col-md-6 grid-sizer"></div>

							<?php foreach ($posts as $post):
								$item_classes = '';
								$item_cat_names = '';
								$item_cats = get_the_terms($post->ID, $taxonomy);
								if (!empty($item_cats)):
									$count = count($item_cats) - 1;
									foreach ($item_cats as $key => $item_cat) {
										$item_classes .= $item_cat->slug . ' ';
										$item_cat_names .= ($count > $key) ? $item_cat->name  . ', ' : $item_cat->name;
									}
								endif;
							?>
								<div class="col-lg-4 col-md-6 grid-item <?php echo $item_classes; ?>">
									<div class="portfolio-item mb-30">
										<div class="portfolio-wrapper">
											<?php if (has_post_thumbnail($post->ID)): ?>
												<div class="portfolio-image">
													<?php echo get_the_post_thumbnail($post->ID, 'medinet-case-thumb'); ?>
													<div class="view-icon">
														<a class="popup-image" href="<?php echo get_the_post_thumbnail_url($post->ID); ?>">
															<i class="fas fa-plus"></i>
														</a>
													</div>
												</div>
											<?php endif; ?>
											<div class="portfolio-caption">
												<h4 class="title"><a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"> <?php echo esc_html($post->post_title); ?></a></h4>
												<p><?php echo esc_html($item_cat_names); ?></p>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>

						</div>
					</div>
				</section>

			<?php
			else:
				printf(
					'%1$s',
					__('No  Posts  Found', 'bdevselement')
				);
			endif;

		else:
			if (count($posts) !== 0) : ?>
				<section <?php $this->print_render_attribute_string('wrapper'); ?>>
					<div class="container">
						<div class="row">
							<!-- START PORTFOLIO FILTER AREA -->
							<div class="col-12">
								<div class="text-center">
									<div <?php $this->print_render_attribute_string('project-filter'); ?>>
										<?php foreach ($filter_list as $list): ?>
											<?php if ($i === 1): $i++; ?>
												<button class="active" data-filter="*"><?php echo esc_html('Show All'); ?></button>
												<button data-filter=".<?php echo esc_attr($list->slug); ?>"><?php echo esc_html($list->name); ?></button>
											<?php else: ?>
												<button data-filter=".<?php echo esc_attr($list->slug); ?>"><?php echo esc_html($list->name); ?></button>
											<?php endif; ?>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<!-- END PORTFOLIO FILTER AREA -->
						</div>
						<div id="portfolio-grid" <?php $this->print_render_attribute_string('project-body'); ?>>
							<div class="col-lg-6 col-md-6 grid-sizer"></div>

							<?php foreach ($posts as $post):
								$item_classes = '';
								$item_cat_names = '';
								$item_cats = get_the_terms($post->ID, $taxonomy);
								if (!empty($item_cats)):
									$count = count($item_cats) - 1;
									foreach ($item_cats as $key => $item_cat) {
										$item_classes .= $item_cat->slug . ' ';
										$item_cat_names .= ($count > $key) ? $item_cat->name  . ', ' : $item_cat->name;
									}
								endif;
							?>
								<div class="col-lg-6 col-md-6 grid-item <?php echo $item_classes; ?>">
									<div class="portfolio-item mb-30">
										<div class="portfolio-wrapper">
											<?php if (has_post_thumbnail($post->ID)): ?>
												<div class="portfolio-image">
													<?php echo get_the_post_thumbnail($post->ID, 'medinet-case-thumb'); ?>
													<div class="view-icon">
														<a class="popup-image" href="<?php echo get_the_post_thumbnail_url($post->ID); ?>">
															<i class="fas fa-plus"></i>
														</a>
													</div>
												</div>
											<?php endif; ?>
											<div class="portfolio-caption">
												<h4 class="title"><a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"> <?php echo esc_html($post->post_title); ?></a></h4>
												<p><?php echo esc_html($item_cat_names); ?></p>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>

						</div>
					</div>
				</section>

<?php else:
				printf(
					'%1$s',
					__('No  Posts  Found', 'bdevselement')
				);
			endif;
		endif;
	}
}
