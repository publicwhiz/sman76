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

class Fact extends BDevs_El_Widget
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
        return 'fact';
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
        return __('Fact', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/fact/';
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
        return 'eicon-save-o';
    }

    public function get_keywords()
    {
        return ['fact', 'image', 'counter'];
    }

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
                    'style_5' => __('Style 5', 'bdevselement'),
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
            '_section_slides',
            [
                'label' => __('Fact List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'type',
            [
                'label' => __('Media Type', 'bdevselement'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'bdevselement'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'bdevselement'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_group_control(
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
                ],
                'condition' => [
                    'type' => 'image'
                ]
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
                        'type' => 'icon'
                    ]
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
                    ],
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Number', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Subtitle', 'bdevselement'),
                'placeholder' => __('Type sub title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'description',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'label' => __('Description', 'bdevselement'),
                'placeholder' => __('Type description here', 'bdevselement'),
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
                'title_field' => '<# print(subtitle || "Carousel Item"); #>',
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
            '_section_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_5']
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

    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __('Box Item', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .bdevs-slick-item',
            ]
        );

        $this->add_responsive_control(
            'item_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->add_responsive_control(
            'item_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-slick-item',
                'exclude' => [
                    'image'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Slide Content', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .bdevs-slick-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .bdevs-slick-title',
                //'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        // number
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Number', 'bdevselement'),
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
                    '{{WRAPPER}} .bdevs-slick-number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .bdevs-slick-number',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // desc
        $this->add_control(
            '_heading_desc',
            [
                'label' => __('Description', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-slick-desc',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_responsive_control(
            'desc_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // icon
        $this->add_control(
            '_heading_icon',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('icon', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'icon_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-slick-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon',
                'selector' => '{{WRAPPER}} .bdevs-slick-icon i',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title_2', 'class', 'section-title white-color');
        $this->add_render_attribute('title', 'class', 'title');

        // button
        if (!empty($settings['button_link'])) {
            $this->add_inline_editing_attributes('button_text', 'none');
            $this->add_render_attribute('button_text', 'class', 'bdevs-btn-text');
            $this->add_render_attribute('button', 'class', 'bdevs-btn bt-btn');
            $this->add_link_attributes('button', $settings['button_link']);
        }

        $this->add_inline_editing_attributes('description', 'intermediate');
        $this->add_render_attribute('description', 'class', 'bdevs-card-text');

        if (empty($settings['slides'])) {
            return;
        }
?>

        <?php if ($settings['design_style'] === 'style_1'): ?>
            <section class="counter-wraper">
                <div class="container">
                    <div class="row justify-content-center">
                        <?php foreach ($settings['slides'] as $slide) : ?>
                            <div class="col-lg-3 col-md-3">
                                <div class="single-couter counter-box text-center mb-30 bdevs-slick-item">
                                    <div class="counter-icon bdevs-slick-icon">
                                        <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                            $this->get_render_attribute_string('image');
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                            <figure>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                            </figure>
                                        <?php elseif (! empty($slide['icon']) || ! empty($slide['selected_icon']['value'])) : ?>
                                            <figure>
                                                <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                            </figure>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($slide['number'])) : ?>
                                        <h1 class="bdevs-slick-number "><span class="counter"><?php echo bdevs_element_kses_basic($slide['number']); ?> </span>+</h1>
                                    <?php endif; ?>

                                    <?php if (!empty($slide['subtitle'])) : ?>
                                        <h6 class="bdevs-slick-title"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></h6>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['description'])) : ?>
                                        <p class="bdevs-slick-desc"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_2'): ?>
            <section class="fact-area">
                <div class="container">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $slide) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-couter bdevs-slick-item counter-box counter-box-white text-center mb-30">
                                    <div class="counter-icon bdevs-slick-icon">
                                        <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                            $this->get_render_attribute_string('image');
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                            <figure>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                            </figure>
                                        <?php elseif (! empty($slide['icon']) || ! empty($slide['selected_icon']['value'])) : ?>
                                            <figure>
                                                <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                            </figure>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($slide['number'])) : ?>
                                        <h1 class="bdevs-slick-number"><span class="counter"><?php echo bdevs_element_kses_basic($slide['number']); ?> </span>+</h1>
                                    <?php endif; ?>

                                    <?php if (!empty($slide['subtitle'])) : ?>
                                        <h6 class="bdevs-slick-title c-sub-title pb-20"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></h6>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['description'])) : ?>
                                        <div class="counter-text mt-10">
                                            <p class="bdevs-slick-desc"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_3'): ?>
            <section class="counter-wraper">
                <div class="container">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $slide) : ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-couter single-couter-2 bdevs-slick-item mb-30">
                                    <div class="counter-icon bdevs-slick-icon">
                                        <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                            $this->get_render_attribute_string('image');
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                            <figure>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                            </figure>
                                        <?php elseif (! empty($slide['icon']) || ! empty($slide['selected_icon']['value'])) : ?>
                                            <figure>
                                                <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                            </figure>
                                        <?php endif; ?>
                                    </div>
                                    <div class="counter-text-box">
                                        <?php if (!empty($slide['number'])) : ?>
                                            <h1 class="bdevs-slick-number"><span class="counter"><?php echo bdevs_element_kses_basic($slide['number']); ?> </span>+</h1>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['subtitle'])) : ?>
                                            <h3 class="bdevs-slick-title"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></h3>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['description'])) : ?>
                                            <p class="bdevs-slick-desc"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_4'): ?>
            <section class="counter-wraper">
                <div class="container">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $slide) : ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-couter single-couter-2 mb-30 bdevs-slick-item">
                                    <div class="counter-icon bdevs-slick-icon">
                                        <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                            $this->get_render_attribute_string('image');
                                            $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                            <figure>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                            </figure>
                                        <?php elseif (! empty($slide['icon']) || ! empty($slide['selected_icon']['value'])) : ?>
                                            <figure>
                                                <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                            </figure>
                                        <?php endif; ?>
                                    </div>
                                    <div class="counter-text-box">
                                        <?php if (!empty($slide['number'])) : ?>
                                            <h1 class="bdevs-slick-number"><span class="counter"><?php echo bdevs_element_kses_basic($slide['number']); ?> </span>+</h1>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['subtitle'])) : ?>
                                            <h3 class="bdevs-slick-title"><?php echo bdevs_element_kses_basic($slide['subtitle']); ?></h3>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['description'])) : ?>
                                            <p class="bdevs-slick-desc"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_5'): ?>
            <section class="fact-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-10">
                            <div class="section-title pos-rel mb-45">
                                <div class="section-text section-text-white pos-rel">
                                    <?php if ($settings['sub_title']) : ?>
                                        <h5 class="sub-title"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                                    <?php endif; ?>
                                    <?php if ($settings['title']) : ?>
                                        <?php printf(
                                            '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title_2'),
                                            bdevs_element_kses_basic($settings['title'])
                                        );
                                        ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="section-button section-button-left mb-30">
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
                        <div class="col-lg-6 col-lg-6 col-md-8">
                            <div class="cta-satisfied">
                                <?php foreach ($settings['slides'] as $slide) : ?>
                                    <div class="single-satisfiedv bdevs-slick-item mb-50">
                                        <?php if (!empty($slide['number'])) : ?>
                                            <h1 class="bdevs-slick-number"><?php echo bdevs_element_kses_basic($slide['number']); ?></h1>
                                        <?php endif; ?>

                                        <h5 class="bdevs-slick-title bdevs-slick-icon">
                                            <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                                $this->get_render_attribute_string('image');
                                                $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                            ?>
                                                <figure>
                                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                                </figure>
                                            <?php elseif (! empty($slide['icon']) || ! empty($slide['selected_icon']['value'])) : ?>

                                                <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>

                                            <?php endif; ?>

                                            <?php if (!empty($slide['subtitle'])) : ?>
                                                <?php echo bdevs_element_kses_basic($slide['subtitle']); ?>
                                            <?php endif; ?>
                                        </h5>
                                        <?php if (!empty($slide['description'])) : ?>
                                            <p class="bdevs-slick-desc"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

<?php
    }
}
