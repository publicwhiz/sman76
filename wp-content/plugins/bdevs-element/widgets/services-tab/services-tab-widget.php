<?php

namespace BdevsElement\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined('ABSPATH') || die();

class Services_Tab extends BDevs_El_Widget
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
        return 'services_tab';
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
        return __('Services TAB', 'bdevselement');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.bdevs.net//widgets/contact-7-form/';
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
        return 'eicon-favorite';
    }

    public function get_keywords()
    {
        return ['services', 'tab'];
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'slider_active',
            [
                'label' => __('Slider active on/off', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'default' => true,
                'condition' => [
                    'design_style' => ['style_3']
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Slides', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
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
                'condition' => [
                    'field_condition' => ['style_1', 'style_2'],
                ],
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
                    'type' => 'image',
                    'field_condition' => ['style_1', 'style_2']
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
                        'type' => 'icon',
                        'field_condition' => ['style_1', 'style_2']
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
                        'type' => 'icon',
                        'field_condition' => ['style_1', 'style_2']
                    ]
                ]
            );
        }

        $repeater->add_control(
            'tab_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_3'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'tab_sub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Sub Title', 'bdevselement'),
                'default' => __('Tab Sub Title', 'bdevselement'),
                'placeholder' => __('Type sub title here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Title', 'bdevselement'),
                'default' => __('Tab Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_content_info',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'default' => __('Content Here', 'bdevselement'),
                'placeholder' => __('Type subtitle here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'default' => __('01', 'bdevselement'),
                'placeholder' => __('Type number here', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_2'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        // Button
        $repeater->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Learn More',
                'placeholder' => __('Type button text here', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label' => __('Button URL', 'bdevselement'),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
                'placeholder' => __('button url', 'bdevselement'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );



        // REPEATER
        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(tab_title || "Carousel Item"); #>',
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
    }

    // register_style_controls
    protected function register_style_controls()
    {
        // list item
        $this->start_controls_section(
            '_section_style_list',
            [
                'label' => __('List Item', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Box Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_border-radius',
            [
                'label' => __('Content Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .bdevs-el-content',
                'exclude' => [
                    'image'
                ]
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

        $this->add_responsive_control(
            'list_icon_width',
            [
                'label' => __('Width', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon,
                        {{WRAPPER}} .bdevs-el-list-icon i' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_icon_height',
            [
                'label' => __('Height', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon,
                    {{WRAPPER}} .bdevs-el-list-icon i' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'list_icon_line-height',
            [
                'label' => __('Line Height', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon,
                        {{WRAPPER}} .bdevs-el-list-icon i' => 'line-height: {{SIZE}}{{UNIT}};',
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

        $this->add_control(
            'icon_background_color',
            [
                'label' => __('Icon Background Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon,
                    {{WRAPPER}} .bdevs-el-list-icon i' => 'background: {{VALUE}};',
                ],
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

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-list-title',
                //'scheme' => Typography::TYPOGRAPHY_3,
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

        $this->add_control(
            'list_title_hvr_color',
            [
                'label' => __('Text Hover Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-title:hover a' => 'color: {{VALUE}};',
                ],
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

        // button
        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'bdevselement'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_2', 'class', 'section-title');

        if (empty($settings['slides'])) {
            return;
        }

?>


        <?php if ($settings['design_style'] === 'style_1') : ?>
            <section class="servcies-area style-1">
                <div class="container">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $id => $slide) :
                            // active class
                            $active_tab = ($id == 0) ? 'active show' : '';
                        ?>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="service-box text-center mb-30 bdevs-el-content">
                                    <div class="service-thumb bdevs-el-list-icon">
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
                                    <div class="service-content">
                                        <?php if (!empty($slide['tab_title'])) : ?>
                                            <h3 class="bdevs-el-list-title"><a href="<?php echo esc_url($slide['button_url']); ?>"><?php echo bdevs_element_kses_basic($slide['tab_title']); ?></a></h3>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['tab_content_info'])) : ?>
                                            <p class="bdevs-el-list-des"><?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?></p>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['button_url'])) : ?>
                                            <a class="service-link bdevs-el-btn" href="<?php echo esc_url($slide['button_url']); ?>"><?php echo bdevs_element_kses_basic($slide['button_text']); ?> <i class="fas fa-angle-double-right"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_2') : ?>

            <section class="servcies-area style-2">
                <div class="container">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $id => $slide) :
                            // active class
                            $active_tab = ($id == 0) ? 'active show' : '';
                        ?>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="service-box service-box-2 mb-30 pos-rel bdevs-el-content">
                                    <div class="service-thumb bdevs-el-list-icon">
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
                                    <div class="service-content service-content-2">
                                        <?php if (!empty($slide['tab_sub_title'])) : ?>
                                            <h6 class="green-color text-up-case letter-spacing mb-20"><?php echo bdevs_element_kses_basic($slide['tab_sub_title']); ?></h6>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['tab_title'])) : ?>
                                            <h3 class="bdevs-el-list-title"><a href="<?php echo esc_url($slide['button_url']); ?>"><?php echo bdevs_element_kses_basic($slide['tab_title']); ?></a></h3>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['tab_content_info'])) : ?>
                                            <p class="bdevs-el-list-des">
                                                <?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['button_url'])) : ?>
                                            <a class="service-link bdevs-el-btn" href="<?php echo esc_url($slide['button_url']); ?>"><i class="fas fa-arrow-right"></i> <?php echo bdevs_element_kses_basic($slide['button_text']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($slide['tab_number'])) : ?>
                                        <div class="service-number">
                                            <h1 class="service-big-number"><?php echo bdevs_element_kses_basic($slide['tab_number']); ?></h1>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_3') :
            $slider_active = !empty($settings['slider_active']) ? 'service-active' : '';
        ?>
            <section class="servcies-area">
                <div class="container">
                    <div class="row <?php echo esc_attr($slider_active); ?>">
                        <?php foreach ($settings['slides'] as $id => $slide) :
                            if (!empty($slide['tab_image']['id'])) {
                                $tab_image = wp_get_attachment_image_url(!empty($slide['tab_image']['id']), !empty($slide['tab_image_size']));
                                if (! $tab_image) {
                                    $tab_image_url = $slide['tab_image']['url'];
                                }
                            }

                            // active class
                            $active_tab = ($id == 0) ? 'active show' : '';
                        ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="service-box-3 mb-30 text-center ">
                                    <?php if (!empty($tab_image_url)) : ?>
                                        <div class="service-thumb bdevs-el-list-icon">
                                            <a href="<?php echo esc_url($slide['button_url']); ?>"><img src="<?php echo esc_url($tab_image_url); ?>" alt="img"></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="service-content-box">
                                        <div class="service-content bdevs-el-content">
                                            <?php if (!empty($slide['tab_title'])) : ?>
                                                <h3 class="bdevs-el-list-title">
                                                    <a href="<?php echo esc_url($slide['button_url']); ?>">
                                                        <?php echo bdevs_element_kses_basic($slide['tab_title']); ?>
                                                    </a>
                                                </h3>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['tab_content_info'])) : ?>
                                                <p class="bdevs-el-list-des">
                                                    <?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($slide['button_url'])) : ?>
                                            <a href="<?php echo esc_url($slide['button_url']); ?>"
                                                class="service-link bdevs-el-btn">
                                                <?php echo bdevs_element_kses_basic($slide['button_text']); ?>
                                            </a>
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
