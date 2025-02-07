<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined('ABSPATH') || die();

class Slider extends BDevs_El_Widget
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
        return 'slider';
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
        return __('Slider', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/slider/';
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
        return 'eicon-slider-full-screen';
    }

    public function get_keywords()
    {
        return ['slider', 'image', 'gallery', 'carousel'];
    }

    // register_content_controls
    protected function register_content_controls()
    {


        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Slides', 'bdevselement'),
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

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'bdevselement'),
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

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Sub Title', 'bdevselement'),
                'default' => __('Subtitle', 'bdevselement'),
                'placeholder' => __('Type subtitle here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_1', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'default' => __('Title Here', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'desc',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Description', 'bdevselement'),
                'default' => __('Here content', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                // 'condition' => [
                //     'design_style' => ['style_1'],
                // ],  
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'video_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Video URL', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('url here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        //button two
        $repeater->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => ['style_1', 'style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'button_icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $repeater->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $repeater->add_control(
            'button_icon_position',
            [
                'label' => __('Icon Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_control(
            'button2_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button 2 Text',
                'placeholder' => __('Type button 2 text here', 'bdevselement'),
                'label_block' => true,
                'condition' => [
                    'field_condition' => 'style_2',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button2_link',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.bdevs.net/',
                'condition' => [
                    'field_condition' => 'style_2',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'button2_icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button2_icon!' => ''];
        } else {
            $repeater->add_control(
                'button2_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition_2 = ['button2_selected_icon[value]!' => ''];
        }

        $repeater->add_control(
            'button2_icon_position',
            [
                'label' => __('Icon Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __('Before', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __('After', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition_2,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'button2_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition_2,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-btn--icon-before .bdevs-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .bdevs-btn--icon-after .bdevs-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        //end button

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
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();
    }

    // register_style_controls
    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Slide Content', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .single-slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .single-slide-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        $this->add_responsive_control(
            'content_height',
            [
                'label' => __('Content Height', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .single-slide-content' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .title',
                //'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Subtitle', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .sub-title',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // description
        $this->add_control(
            '_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('description Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description',
                'selector' => '{{WRAPPER}} .description',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        // button
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_1', 'style_2'],
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-btn',
            ]
        );

        $this->add_control(
            'hr1',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn' => 'background-color: {{VALUE}};',
                ],
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
            'button_hover_color2',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-btn:hover, {{WRAPPER}} .bdevs-el-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // Video button
        $this->start_controls_section(
            '_section_style_videobtn',
            [
                'label' => __('Video', 'bdevselement'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_1', 'style_3'],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'videobutton_typography',
                'selector' => '{{WRAPPER}} .bdevs-el-video',
            ]
        );

        $this->add_control(
            'el-videobtn-width',
            [
                'label' => esc_html__('Width', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'el-videobtn-height',
            [
                'label' => esc_html__('Height', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'el-videobtn-lineheight',
            [
                'label' => esc_html__('Line Height', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'videobutton_border',
                'selector' => '{{WRAPPER}} .bdevs-el-video',
            ]
        );

        $this->add_control(
            'videobutton_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'videobutton_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-el-video',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_videobutton');

        $this->start_controls_tab(
            '_tab_videobutton_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'videobutton_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'videobutton_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_videobutton_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video:hover, {{WRAPPER}} .bdevs-el-video:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'videobutton_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video:hover, {{WRAPPER}} .bdevs-el-video:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'videobutton_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-video:hover, {{WRAPPER}} .bdevs-el-video:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // arrow
        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __('Navigation - Arrow', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => __('Position', 'bdevselement'),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', 'bdevselement'),
                'label_on' => __('Custom', 'bdevselement'),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __('Vertical', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => __('Horizontal', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'array_width',
            [
                'label' => __('Width', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'array_height',
            [
                'label' => __('Height', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'array_line-height',
            [
                'label' => __('Line Height', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs('_tabs_arrow');

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __('Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __('Border Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        // Dots
        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __('Navigation - Dots', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style!' => 'style_1',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => __('Vertical Position', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => __('Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => __('Alignment', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bdevselement'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs('_tabs_dots');
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __('Normal', 'bdevselement'),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __('Hover', 'bdevselement'),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __('Active', 'bdevselement'),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // button
        $this->add_render_attribute('button', 'class', 'bdevs-el-btn bt-btn btn-h-white');
        $this->add_render_attribute('button', 'data-animation', 'fadeInUp');
        $this->add_render_attribute('button', 'data-delay', '.9s');
        $this->add_render_attribute('button', 'data-duration', '.7s');

        // button 2
        $this->add_render_attribute('button2', 'class', 'bdevs-el-btn2 bt-btn bdevs-el-btn bt-btn-sec');
        $this->add_render_attribute('button2', 'data-animation', 'fadeInUp');
        $this->add_render_attribute('button2', 'data-delay', '1.1s');
        $this->add_render_attribute('button2', 'data-duration', '.9s');

        if (empty($settings['slides'])) {
            return;
        }

?>


        <?php if ($settings['design_style'] === 'style_1'): ?>

            <section class="hero-area slider-settings slider-arrow slider-dots">
                <div class="hero-slider">
                    <div class="slider-active">
                        <?php foreach ($settings['slides'] as $slide) :
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (! $image) {
                                $image = $slide['image']['url'];
                            }
                        ?>
                            <div class="single-slider slider-height d-flex align-items-center single-slide-content" data-background="<?php print esc_url($image); ?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-7 col-lg-8 col-md-10">
                                            <div class="hero-text">
                                                <div class="hero-slider-caption ">
                                                    <?php if ($slide['subtitle']) : ?>
                                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">
                                                            <?php echo bdevs_element_kses_basic($slide['subtitle']); ?>
                                                        </h5>
                                                    <?php endif; ?>

                                                    <?php if ($slide['title']) : ?>
                                                        <h1 class="title" data-animation="fadeInUp " data-delay=".4s">
                                                            <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                                        </h1>
                                                    <?php endif; ?>

                                                    <?php if ($slide['desc']) : ?>
                                                        <p class="description" data-animation="fadeInUp" data-delay=".6s">
                                                            <?php echo bdevs_element_kses_basic($slide['desc']); ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="hero-slider-btn">
                                                    <!-- button one  -->
                                                    <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                        printf(
                                                            '<a %1$s href="%3$s">%2$s</a>',
                                                            $this->get_render_attribute_string('button'),
                                                            esc_html($slide['button_text']),
                                                            esc_url($slide['button_link']['url'])
                                                        );
                                                    elseif (empty($slide['button_text']) && (! (empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || ! empty($slide['button_icon']))) : ?>
                                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                        <?php elseif ($slide['button_text'] && (! (empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || ! empty($slide['button_icon']))) :
                                                        if ($slide['button_icon_position'] === 'before') :
                                                            $this->add_render_attribute('button', 'class', 'bt-btn btn-h-white bdevs-btn--icon-before');
                                                            $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($slide['button_text']));
                                                        ?>
                                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?> <?php echo $button_text; ?></a>
                                                        <?php
                                                        else :
                                                            $this->add_render_attribute('button', 'class', 'bt-btn btn-h-white bdevs-btn--icon-after');
                                                            $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($slide['button_text']));
                                                        ?>
                                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php echo $button_text; ?> <?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></a>
                                                    <?php
                                                        endif;
                                                    endif; ?>
                                                    <?php if ($slide['video_url']) : ?>
                                                        <a data-animation="fadeInRight" data-delay="1.0s" href="<?php echo esc_url($slide['video_url']); ?>" class="play-btn popup-video bdevs-el-video"><i class="fas fa-play"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_2') : ?>

            <section class="hero-area">
                <div class="hero-slider">
                    <div class="slider-active">
                        <?php
                        foreach ($settings['slides'] as $slide) :

                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (! $image) {
                                $image = $slide['image']['url'];
                            }

                        ?>
                            <div class="single-slider slider-height slider-height-2  single-slide-content d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-xl-6 col-lg-6 col-md-10">
                                            <div class="hero-text hero-text-2 pt-35">
                                                <div class="hero-slider-caption hero-slider-caption-2">
                                                    <?php if ($slide['title']) : ?>
                                                        <h1 class="white-color title" data-animation="fadeInUp" data-delay=".3s"><?php echo bdevs_element_kses_basic($slide['title']); ?></h1>
                                                    <?php endif; ?>

                                                    <?php if ($slide['desc']) : ?>
                                                        <p class="description" data-animation="fadeInUp" data-delay=".5s"><?php echo bdevs_element_kses_basic($slide['desc']); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="hero-slider-btn">
                                                    <!-- button two  -->
                                                    <?php if ($slide['button2_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                        printf(
                                                            '<a %1$s href="%3$s">%2$s</a>',
                                                            $this->get_render_attribute_string('button2'),
                                                            esc_html($slide['button2_text']),
                                                            esc_url($slide['button2_link']['url'])
                                                        );
                                                    elseif (empty($slide['button2_text']) && (! (empty($slide['button2_selected_icon']) || empty($slide['button2_selected_icon']['value'])) || ! empty($slide['button2_icon']))) : ?>
                                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($slide, 'button2_icon', 'button2_selected_icon'); ?></a>
                                                        <?php elseif ($slide['button2_text'] && (! (empty($slide['button2_selected_icon']) || empty($slide['button2_selected_icon']['value'])) || ! empty($slide['button2_icon']))) :
                                                        if ($slide['button2_icon_position'] === 'before') :
                                                            $this->add_render_attribute('button2', 'class', 'bt-btn bt-btn-secd bdevs-btn--icon-before');
                                                            $button2_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button2_text'), esc_html($slide['button2_text']));
                                                        ?>
                                                            <a <?php $this->print_render_attribute_string('button2'); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon']); ?> <?php echo $button2_text; ?></a>
                                                        <?php
                                                        else :
                                                            $this->add_render_attribute('button2', 'class', ' bt-btn bt-btn-sec bdevs-btn--icon-after');
                                                            $button2_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button2_text'), esc_html($slide['button2_text']));
                                                        ?>
                                                            <a <?php $this->print_render_attribute_string('button2'); ?>><?php echo $button2_text; ?> <?php bdevs_element_render_icon($slide, 'button2_icon', 'button2_selected_icon', ['class' => 'bdevs-btn-icon']); ?></a>
                                                    <?php
                                                        endif;
                                                    endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_3') : ?>

            <section class="hero-area">
                <div class="hero-slider">
                    <div class="slider-fix">
                        <?php foreach ($settings['slides'] as $slide) :
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (! $image) {
                                $image = $slide['image']['url'];
                            }
                        ?>
                            <div class="single-slider slider-height slider-height-3 single-slide-content d-flex align-items-center" data-background="<?php print esc_url($image); ?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-7 col-lg-9">
                                            <div class="hero-text hero-text-box">
                                                <div class="hero-slider-caption ">
                                                    <?php if ($slide['subtitle']) : ?>
                                                        <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></h5>
                                                    <?php endif; ?>

                                                    <?php if ($slide['title']) : ?>
                                                        <h1 class="title" data-animation="fadeInUp" data-delay=".4s"><?php echo bdevs_element_kses_basic($slide['title']); ?></h1>
                                                    <?php endif; ?>

                                                    <?php if ($slide['desc']) : ?>
                                                        <p class="description" data-animation="fadeInUp" data-delay=".6s"><?php echo bdevs_element_kses_basic($slide['desc']); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="hero-slider-btn">
                                                    <!-- button one  -->
                                                    <?php if ($slide['button_text'] && ((empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) && empty($slide['button_icon']))) :
                                                        printf(
                                                            '<a %1$s href="%3$s">%2$s</a>',
                                                            $this->get_render_attribute_string('button'),
                                                            esc_html($slide['button_text']),
                                                            esc_url($slide['button_link']['url'])
                                                        );
                                                    elseif (empty($slide['button_text']) && (! (empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || ! empty($slide['button_icon']))) : ?>
                                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon'); ?></a>
                                                        <?php elseif ($slide['button_text'] && (! (empty($slide['button_selected_icon']) || empty($slide['button_selected_icon']['value'])) || ! empty($slide['button_icon']))) :
                                                        if ($slide['button_icon_position'] === 'before') :
                                                            $this->add_render_attribute('button', 'class', 'bt-btn btn-h-white bdevs-btn--icon-before');
                                                            $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($slide['button_text']));
                                                        ?>
                                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?> <?php echo $button_text; ?></a>
                                                        <?php
                                                        else :
                                                            $this->add_render_attribute('button', 'class', 'bt-btn btn-h-white bdevs-btn--icon-after');
                                                            $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($slide['button_text']));
                                                        ?>
                                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php echo $button_text; ?> <?php bdevs_element_render_icon($slide, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></a>
                                                    <?php
                                                        endif;
                                                    endif; ?>
                                                    <?php if ($slide['video_url']) : ?>
                                                        <a data-animation="fadeInRight" data-delay="1.0s" href="<?php echo esc_url($slide['video_url']); ?>" class="play-btn popup-video bdevs-el-video"><i class="fas fa-play"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
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
