<?php

namespace BdevsElement\Widget;

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

class About extends BDevs_El_Widget
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
        return 'about';
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
        return __('About', 'bdevselement');
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
        return 'eicon-single-post';
    }

    public function get_keywords()
    {
        return ['info', 'blurb', 'box', 'about', 'content'];
    }

    /**
     * Register content related controls
     */
    protected function register_content_controls()
    {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Design Style', 'bdevselement'),
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
                    'style_4' => __('Style 4', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('bdevs Info Box Sub Title', 'bdevselement'),
                'placeholder' => __('Type Info Box Sub Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
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
            'sort_description',
            [
                'label' => __('Sort Description', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('bdevs info box sort description goes here', 'bdevselement'),
                'placeholder' => __('Type info box sort description', 'bdevselement'),
                'rows' => 5,
                'condition' => [
                    'design_style' => 'style_1'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'exp_text',
            [
                'label' => __('Experience Text', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Text here', 'bdevselement'),
                'placeholder' => __('Type exp text', 'bdevselement'),
                'rows' => 5,
                'condition' => [
                    'design_style' => 'style_1'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'exp_number',
            [
                'label' => __('Experience Number', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXT,
                'default' => __('25', 'bdevselement'),
                'placeholder' => __('Type number text', 'bdevselement'),
                'rows' => 5,
                'condition' => [
                    'design_style' => 'style_1'
                ],
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
            '_section_about_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
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

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_about_video',
            [
                'label' => __('Video', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_3'
                ],
            ]
        );

        $this->add_control(
            'video_url',
            [
                'label' => __('Video URL', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Type Video URL Here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_profile',
            [
                'label' => __('Profile', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_1'
                ],
            ]
        );

        $this->add_control(
            'profile_image',
            [
                'label' => __('Profile Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'profile_thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => __('Name', 'bdevselement'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Name Here', 'bdevselement'),
                'placeholder' => __('Type Name Title', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'designation',
            [
                'label' => __('Designation', 'bdevselement'),
                'description' => bdevs_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('designation', 'bdevselement'),
                'placeholder' => __('Type designation', 'bdevselement'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'sign_image',
            [
                'label' => __('Signature Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'sign_thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'sign_position',
            [
                'label' => __('Signature Position', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bdevselement'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => __('Top', 'bdevselement'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => __('Right', 'bdevselement'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'top',
                'prefix_class' => 'bdevs-sign--',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'name_tag',
            [
                'label' => __('Name HTML Tag', 'bdevselement'),
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
                'default' => 'h4',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'profile_align',
            [
                'label' => __('Profile Alignment', 'bdevselement'),
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
            '_section_features_list',
            [
                'label' => __('Features List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2', 'style_3', 'style_4']
                ],
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
                    'style_4' => __('Style 4', 'bdevselement'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'field_condition' => ['style_3', 'style_4']
                    ],

                ]
            );
        } else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'condition' => [
                        'field_condition' => ['style_3', 'style_4']
                    ],
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ]
                ]
            );
        }

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_2', 'style_3']
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
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'description',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Description', 'bdevselement'),
                'placeholder' => __('Type sub description here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_1', 'style_2', 'style_3']
                ],
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
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_about_list',
            [
                'label' => __('About List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_2'
                ],
            ]
        );

        $repeater = new Repeater();

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'bdevselement'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => bdevs_element_get_bdevs_element_icons(),
                    'default' => 'fa fa-smile-o'

                ]
            );
        } else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ]
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title & Subtitle', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->add_control(
            'ab_slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_3_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_4'
                ],
            ]
        );

        $this->add_control(
            'button_3_text',
            [
                'label' => __('Button Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', 'bdevselement'),
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_3_url',
            [
                'label' => __('Button URL', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2']
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Button Text', 'bdevselement'),
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'bdevselement'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('http://elementor.bdevs.net/', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if (bdevs_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
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
            $this->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
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
                'default' => 'after',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __('Icon Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10
                ],
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .btn--icon-before .btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn--icon-after .btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Register styles related controls
     */
    protected function register_style_controls()
    {

        // Title & Description style
        $this->start_controls_section(
            '_section_title_style',
            [
                'label' => __('Title & Description', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Box Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .about-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_heading',
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
                    '{{WRAPPER}} .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .section-title',
                //'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        // Subtitle
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
                    '{{WRAPPER}} .bdevs-el-sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-el-sub-title',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // Description
        $this->add_control(
            'description_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-des' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-des' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-des',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        // list item
        $this->start_controls_section(
            '_section_style_list',
            [
                'label' => __('List Item', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // list icon
        $this->add_control(
            'list_icon_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('List Icon', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'list_icon_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'list_icon_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon,
                        {{WRAPPER}} .bdevs-el-list-icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_icon_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-list-icon,
                    {{WRAPPER}} .bdevs-el-list-icon i',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // list title
        $this->add_control(
            'list_title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('List Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'list_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'list_title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-list-title',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // list des
        $this->add_control(
            'list_des_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('List Description', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'list_des_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-des' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_des_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-list-des',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        // profile
        $this->start_controls_section(
            '_section_style_profile',
            [
                'label' => __('Profile', 'bdevselement'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'design_style' => ['style_1', 'style_2'],
                ],
            ]
        );

        // profile title
        $this->add_control(
            'profile_title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Profile Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'profile_title_spacing_radius',
            [
                'label' => __('Spacing', 'bdevselement'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-profile-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'profile_title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-profile-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'profile_title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-profile-title',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // profile des
        $this->add_control(
            'profile_des_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('profile Designation', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'profile_des_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-profile-deg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'profile_des_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-profile-deg',
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
                    'design_style' => ['style_2', 'style_4'],
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
                    'design_style' => ['style_3'],
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
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'section-title');

        $this->add_inline_editing_attributes('name', 'basic');
        $this->add_render_attribute('name', 'class', 'name bdevs-el-profile-title');

        // button
        if (!empty($settings['button_link'])) {
            $this->add_inline_editing_attributes('button_text', 'none');
            $this->add_render_attribute('button_text', 'class', 'bdevs-btn-text bdevs-el-btn');
            $this->add_render_attribute('button', 'class', 'bdevs-btn bt-btn bdevs-el-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }

        $this->add_inline_editing_attributes('description', 'intermediate');
        $this->add_render_attribute('description', 'class', 'bdevs-infobox-text');

?>

        <?php if ($settings['design_style'] === 'style_1'):
            // bg_image
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if (! $bg_image) {
                $bg_image = $settings['bg_image']['url'];
            }
        ?>

            <section class="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5">
                            <div class="about-left-side pos-rel mb-30">
                                <?php if (!empty($bg_image)) : ?>
                                    <div class="about-front-img">
                                        <img src="<?php print esc_url($bg_image); ?>" alt="home">
                                    </div>
                                <?php endif; ?>

                                <?php if ($settings['exp_text']) : ?>
                                    <div class="about-exp">
                                        <div class="exp-icon bdevs-el-list-icon">
                                            <i class="fal fa-hospital"></i>
                                        </div>
                                        <div class="exp-content">
                                            <h2 class="exp-title bdevs-el-list-title"><span class="counter"><?php echo bdevs_element_kses_intermediate($settings['exp_number']); ?></span> +</h2>
                                            <p class="bdevs-el-list-des"><?php echo bdevs_element_kses_intermediate($settings['exp_text']); ?></p>
                                        </div>
                                        <div class="exp-dots">
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="about-right-side pt-30 mb-30">
                                <div class="about-title mb-20">
                                    <?php if ($settings['sub_title']) : ?>
                                        <h5 class="sub-title bdevs-el-sub-title"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                    <?php endif; ?>
                                    <?php if ($settings['title']) : ?>
                                        <?php printf(
                                            '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            bdevs_element_kses_basic($settings['title'])
                                        );
                                        ?>
                                    <?php endif; ?>
                                </div>
                                <div class="about-text">
                                    <?php if ($settings['sort_description']) : ?>
                                        <p class="bdevs-el-des about-quote">
                                            <?php echo bdevs_element_kses_intermediate($settings['sort_description']); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if ($settings['description']) : ?>
                                        <p class="bdevs-el-des"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                    <?php endif; ?>
                                    <br>
                                </div>

                                <div class="about-author d-flex align-items-center">
                                    <?php if ($settings['profile_image']['url'] || $settings['profile_image']['id']) :
                                        $this->add_render_attribute('profile_image', 'src', $settings['profile_image']['url']);
                                        $this->add_render_attribute('profile_image', 'alt', Control_Media::get_image_alt($settings['profile_image']));
                                        $this->add_render_attribute('profile_image', 'title', Control_Media::get_image_title($settings['profile_image']));
                                    ?>
                                        <div class="author-ava">
                                            <figure>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'profile_thumbnail', 'profile_image'); ?>
                                            </figure>
                                        </div>
                                    <?php endif; ?>

                                    <div class="author-desination">
                                        <?php if ($settings['name']) :
                                            printf(
                                                '<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape($settings['name_tag']),
                                                $this->get_render_attribute_string('name'),
                                                bdevs_element_kses_basic($settings['name'])
                                            );
                                        endif; ?>
                                        <?php if ($settings['designation']) : ?>
                                            <h6 class="bdevs-el-profile-deg"><?php echo bdevs_element_kses_intermediate($settings['designation']); ?></h6>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_2'):
            // bg_image
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if (! $bg_image) {
                $bg_image = $settings['bg_image']['url'];
            }

        ?>

            <section class="about-area about-area-mid">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="row ab-f-row">
                                <?php foreach ($settings['slides'] as $slide) :
                                    $title = bdevs_element_kses_basic($slide['title']);

                                    if (!empty($slide['image']['id'])) {
                                        $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                        if (! $image) {
                                            $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '';
                                        }
                                    }
                                ?>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="feature-box mb-40">
                                            <?php if (!empty($image)) : ?>
                                                <div class="feature-small-icon bdevs-el-list-icon mb-35">
                                                    <img src="<?php print esc_url($image); ?>" alt="img">
                                                </div>
                                            <?php endif; ?>
                                            <div class="feature-small-content">
                                                <?php if (!empty($slide['title'])) : ?>
                                                    <h3 class="bdevs-el-list-title"><?php echo bdevs_element_kses_basic($slide['title']); ?></h3>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['description'])) : ?>
                                                    <p class="bdevs-el-list-des"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-11">
                            <div class="about-right-side pt-25 mb-30">
                                <div class="about-title mb-20">
                                    <?php if ($settings['sub_title']) : ?>
                                        <h5 class="bdevs-el-sub-title sub-title"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                    <?php endif; ?>
                                    <?php if ($settings['title']) : ?>
                                        <?php printf(
                                            '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            bdevs_element_kses_basic($settings['title'])
                                        );
                                        ?>
                                    <?php endif; ?>
                                </div>
                                <div class="about-text">
                                    <?php if ($settings['description']) : ?>
                                        <p class="bdevs-el-list-des"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                    <?php endif; ?>
                                    <br>
                                </div>
                                <div class="about-text-list mb-40">
                                    <ul>
                                        <?php foreach ($settings['ab_slides'] as $slide) : ?>
                                            <li class="bdevs-el-list-icon">
                                                <?php if (! empty($slide['icon']) || ! empty($slide['selected_icon']['value'])) : ?>
                                                    <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                                <?php endif; ?>
                                                <?php if ($slide['title']) : ?>
                                                    <span class="bdevs-el-profile-title"><?php echo bdevs_element_kses_basic($slide['title']); ?></span>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="button-area">
                                    <!-- button one  -->
                                    <?php if ($settings['button_text'] && ((empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) && empty($settings['button_icon']))) :
                                        $this->add_render_attribute('button', 'class', 'bt-btn site-btn-border');
                                        printf(
                                            '<a %1$s>%2$s</a>',
                                            $this->get_render_attribute_string('button'),
                                            esc_html($settings['button_text'])
                                        );
                                    elseif (empty($settings['button_text']) && (! (empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || ! empty($settings['button_icon']))) : ?>
                                        <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon'); ?></a>
                                        <?php elseif ($settings['button_text'] && (! (empty($settings['button_selected_icon']) || empty($settings['button_selected_icon']['value'])) || ! empty($settings['button_icon']))) :
                                        if ($settings['button_icon_position'] === 'before') :
                                            $this->add_render_attribute('button', 'class', 'bt-btn site-btn-border bdevs-btn--icon-before');
                                            $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($settings['button_text']));
                                        ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?> <?php echo $button_text; ?></a>
                                        <?php
                                        else :
                                            $this->add_render_attribute('button', 'class', 'bt-btn bdevs-btn--icon-after');
                                            $button_text = sprintf('<span %1$s>%2$s</span>', $this->get_render_attribute_string('button_text'), esc_html($settings['button_text']));
                                        ?>
                                            <a <?php $this->print_render_attribute_string('button'); ?>><?php echo $button_text; ?> <?php bdevs_element_render_icon($settings, 'button_icon', 'button_selected_icon', ['class' => 'bdevs-btn-icon']); ?></a>
                                    <?php
                                        endif;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_3'):
            // bg_image
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if (! $bg_image) {
                $bg_image = $settings['bg_image']['url'];
            }

        ?>
            <section class="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5">
                            <div class="about-left-side pos-rel mb-30">
                                <?php if (!empty($bg_image)) : ?>
                                    <div class="about-front-img pos-rel">
                                        <img src="<?php print esc_url($bg_image); ?>" alt="img">

                                        <?php if ($settings['video_url']) : ?>
                                            <a class="popup-video bdevs-el-video about-video-btn white-video-btn" href="<?php echo esc_url($settings['video_url']); ?>"><i class="fas fa-play"></i></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="about-right-side pt-30 mb-30">
                                <div class="about-title mb-20">
                                    <?php if ($settings['sub_title']) : ?>
                                        <h5 class="bdevs-el-sub-title sub-title"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                    <?php endif; ?>
                                    <?php if ($settings['title']) : ?>
                                        <?php printf(
                                            '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            bdevs_element_kses_basic($settings['title'])
                                        );
                                        ?>
                                    <?php endif; ?>
                                </div>
                                <?php if ($settings['description']) : ?>
                                    <div class="about-text mb-50">
                                        <p class="bdevs-el-des"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                    </div>
                                <?php endif; ?>

                                <div class="our-destination">
                                    <?php foreach ($settings['slides'] as $slide) :
                                        $title = bdevs_element_kses_basic($slide['title']);

                                        if (!empty($slide['image']['id'])) {
                                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                            if (! $image) {
                                                $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '';
                                            }
                                        }
                                    ?>
                                        <div class="single-item mb-30">
                                            <div class="mv-icon f-left bdevs-el-list-icon">
                                                <?php if (! empty($slide['icon']) || ! empty($slide['selected_icon']['value'])) : ?>
                                                    <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="mv-title fix">
                                                <?php if (!empty($slide['title'])) : ?>
                                                    <h3 class="bdevs-el-list-title"><?php echo bdevs_element_kses_basic($slide['title']); ?></h3>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['description'])) : ?>
                                                    <p class="bdevs-el-list-des"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_4'):
            // bg_image
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
            if (! $bg_image) {
                $bg_image = $settings['bg_image']['url'];
            }

        ?>
            <section class="appoinment-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="appoinment-box white">
                                <div class="appoinment-content">
                                    <?php if ($settings['sub_title']) : ?>
                                        <span class="small-text bdevs-el-sub-title"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></span>
                                    <?php endif; ?>
                                    <?php if ($settings['title']) : ?>
                                        <?php printf(
                                            '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            bdevs_element_kses_basic($settings['title'])
                                        );
                                        ?>
                                    <?php endif; ?>
                                    <?php if ($settings['description']) : ?>
                                        <p class="bdevs-el-des"><?php echo bdevs_element_kses_intermediate($settings['description']); ?></p>
                                    <?php endif; ?>

                                    <ul class="professinals-list pt-30">
                                        <?php foreach ($settings['slides'] as $slide) :
                                            $title = bdevs_element_kses_basic($slide['title']);

                                            if (!empty($slide['image']['id'])) {
                                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                                if (! $image) {
                                                    $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '';
                                                }
                                            }
                                        ?>
                                            <li class="bdevs-el-list-icon bdevs-el-list-title">
                                                <?php if (! empty($slide['icon']) || ! empty($slide['selected_icon']['value'])) : ?>
                                                    <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                                <?php endif; ?>
                                                <?php if (!empty($slide['title'])) : ?>
                                                    <?php echo bdevs_element_kses_basic($slide['title']); ?>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>

                                <?php if ($settings['button_3_url']) : ?>
                                    <a href="<?php echo esc_url($settings['button_3_url']); ?>" class="bt-btn bdevs-el-btn w-100 rounded-0 mt-40"><?php echo bdevs_element_kses_intermediate($settings['button_3_text']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

<?php
    }
}
