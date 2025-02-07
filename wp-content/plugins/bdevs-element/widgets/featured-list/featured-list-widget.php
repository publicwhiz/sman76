<?php

namespace BdevsElement\Widget;


use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined('ABSPATH') || die();

class Featured_List extends BDevs_El_Widget
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
        return 'featured_list';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Featured List', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/icon-box/';
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-preview-medium';
    }

    public function get_keywords()
    {
        return ['featured', 'list', 'icon'];
    }

    protected function register_content_controls()
    {
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_heading',
            [
                'label' => __('Title', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Title',
                'placeholder' => __('Heading Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Heading Sub Title',
                'placeholder' => __('Heading Sub Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->add_control(
            'title_tag_heading',
            [
                'label' => __('Title HTML Tag', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'separator' => 'before',
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
                'default' => 'h3',
                'toggle' => false,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __('Featured List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Features Title', 'bdevselement'),
                'placeholder' => __('Type Icon Box Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __('Icon Description', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'separator' => 'before',
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
                'default' => 'h3',
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
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
                    'style_3' => __('Style 3', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'step_number',
            [
                'label' => __('Step Number', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'step' => 1,
                'max' => 12,
                'default' => 1,
                'description' => __('Type step number', 'bdevselement'),
                'condition' => [
                    'design_style' => 'style_2'
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'shape_image',
            [
                'label' => __('Shape Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'design_style' => 'style_3'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_h_section_style_title',
            [
                'label' => __('Section Title & Desccription', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_h_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_heading_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_heading_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'htitle',
                'selector' => '{{WRAPPER}} .bdevs-gradient-heading',
                //'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'htitle',
                'label' => __('Text Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section-title',
            ]
        );

        $this->add_control(
            'h_heading_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'h_blend_mode',
            [
                'label' => __('Blend Mode', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => __('Normal', 'bdevselement'),
                    'multiply' => 'Multiply',
                    'screen' => 'Screen',
                    'overlay' => 'Overlay',
                    'darken' => 'Darken',
                    'lighten' => 'Lighten',
                    'color-dodge' => 'Color Dodge',
                    'saturation' => 'Saturation',
                    'color' => 'Color',
                    'difference' => 'Difference',
                    'exclusion' => 'Exclusion',
                    'hue' => 'Hue',
                    'luminosity' => 'Luminosity',
                ],
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        $this->add_control(
            '_h_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Content', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_heading_desc_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section-heading p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_heading_desc_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .section-heading p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h_desccription',
                'selector' => '{{WRAPPER}} .section-heading p',
                //'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'h_desccription',
                'label' => __('Text Shadow', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section-heading p',
            ]
        );

        $this->add_control(
            'h_heading_desc_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_icon',
            [
                'label' => __('Icon', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'padding: {{SIZE}}{{UNIT}}',
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 150,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'selector' => '{{WRAPPER}} .icon'
            ]
        );

        $this->add_responsive_control(
            'icon_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .icon'
            ]
        );

        $this->start_controls_tabs('_tabs_icon');

        $this->start_controls_tab(
            '_tab_icon_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_rotate',
            [
                'label' => __('Rotate Icon Box', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'default' => [
                    'unit' => 'deg',
                ],
                'range' => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .bdevselement-icon-box-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'icon_bg_color!' => '',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:hover .icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:hover .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:hover .icon' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_border_border!' => '',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_bg_rotate',
            [
                'label' => __('Rotate Icon Box', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'default' => [
                    'unit' => 'deg',
                ],
                'range' => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover .icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}}:hover .bdevselement-icon-box-icon > i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'icon_bg_color!' => '',
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __('Title', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .title',
                //'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->start_controls_tabs('_tabs_title');

        $this->start_controls_tab(
            '_tab_title_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_title_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}:hover .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_badge',
            [
                'label' => __('Content', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Margin', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'content_border',
                'selector' => '{{WRAPPER}} .content p',
            ]
        );

        $this->add_responsive_control(
            'content_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .content p' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'content_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .content p',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __('Typography', 'bdevselement'),
                'exclude' => [
                    'font_family',
                    'line_height'
                ],
                'default' => [
                    'font_size' => ['']
                ],
                'selector' => '{{WRAPPER}} .content p',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('section_heading', 'class', 'section-title shape');
        $section_heading = bdevs_element_kses_basic($settings['section_heading']);

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'title');

        $this->add_inline_editing_attributes('description', 'none');
        $this->add_render_attribute('description', 'class', 'content-desc');
?>

        <?php if ($settings['design_style'] === 'style_3'): ?>
            <div class="singel-core-feature-box text-center">
                <div class="icon">
                    <?php if ($settings['type'] === 'image' && ($settings['image']['url'] || $settings['image']['id'])) :
                        $this->add_render_attribute('image', 'src', $settings['image']['url']);
                        $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
                        $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
                        $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                    ?>
                        <figure>
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                        </figure>
                    <?php elseif (! empty($settings['icon']) || ! empty($settings['selected_icon']['value'])) : ?>
                        <figure>
                            <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                        </figure>
                    <?php endif; ?>
                </div>
                <div class="content">
                    <?php if ($settings['title']) :
                        printf(
                            '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['title_tag']),
                            $this->get_render_attribute_string('title'),
                            bdevs_element_kses_basic($settings['title'])
                        );
                    endif; ?>

                    <?php if ($settings['shape_image']['url'] || $settings['shape_image']['id']) :
                        $this->add_render_attribute('shape_image', 'src', $settings['shape_image']['url']);
                        $this->add_render_attribute('shape_image', 'alt', Control_Media::get_image_alt($settings['shape_image']));
                        $this->add_render_attribute('shape_image', 'title', Control_Media::get_image_title($settings['shape_image']));
                    ?>
                        <span class="shape">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'full', 'shape_image'); ?>
                        </span>
                    <?php endif; ?>

                    <?php if ($settings['description']) : ?>
                        <p <?php $this->print_render_attribute_string('description'); ?>><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif ($settings['design_style'] === 'style_2'): ?>

            <div class="single-department small-box">
                <div class="thumb">
                    <?php if ($settings['type'] === 'image' && ($settings['image']['url'] || $settings['image']['id'])) :
                        $this->add_render_attribute('image', 'src', $settings['image']['url']);
                        $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
                        $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
                        $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                    ?>
                        <figure>
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                        </figure>
                    <?php elseif (! empty($settings['icon']) || ! empty($settings['selected_icon']['value'])) : ?>
                        <figure>
                            <?php bdevs_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                        </figure>
                    <?php endif; ?>
                    <span class="count bg-4"><?php echo esc_html($settings['step_number']); ?></span>
                </div>
                <div class="content">
                    <?php if ($settings['title']) :
                        printf(
                            '<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['title_tag']),
                            $this->get_render_attribute_string('title'),
                            bdevs_element_kses_basic($settings['title'])
                        );
                    endif; ?>
                    <?php if ($settings['description']) : ?>
                        <p <?php $this->print_render_attribute_string('description'); ?>><?php echo esc_html($settings['description']); ?></p>
                    <?php endif; ?>
                </div>
            </div>


        <?php else: ?>
            <section class="feature-area pb-120">
                <div class="container feature-container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-10 text-center">
                            <div class="section-heading mb-70">
                                <?php printf(
                                    '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag_heading']),
                                    $this->get_render_attribute_string('section_heading'),
                                    $section_heading
                                ); ?>
                                <?php if ($settings['sub_title']) : ?>
                                    <p><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-none-50">
                        <?php
                        foreach ($settings['slides'] as $slide) :
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (! $image) {
                                $image = $slide['image']['url'];
                            }
                        ?>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8 mt-50">
                                <div class="single-feature-box">
                                    <?php if (!empty($image)) : ?>
                                        <div class="icon">
                                            <img src="<?php print $image; ?>" alt="">
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if ($slide['title']) : ?>
                                            <h3 class="title"><?php echo bdevs_element_kses_basic($slide['title']); ?></h3>
                                        <?php endif; ?>
                                        <?php if ($slide['description']) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

<?php
    }
}
