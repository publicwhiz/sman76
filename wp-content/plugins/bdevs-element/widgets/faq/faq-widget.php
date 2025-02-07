<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined('ABSPATH') || die();

class FAQ extends BDevs_El_Widget
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
        return 'faq';
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
        return __('FAQ', 'bdevselement');
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
        return 'eicon-edit';
    }

    public function get_keywords()
    {
        return ['services', 'tab'];
    }

    // register_content_controls
    protected function register_content_controls()
    {

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title ', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
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
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __('Heading Sub Text', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'desccription',
            [
                'label' => __('Desccription', 'bdevselement'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Heading Desccription Text', 'bdevselement'),
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
            '_section_image',
            [
                'label' => __('Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tab_big_image',
            [
                'label' => __('Big Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'tab_small_image',
            [
                'label' => __('Small Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'tab_shape_image',
            [
                'label' => __('Shape Image', 'bdevselement'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Faq List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_image',
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

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'tab_image_size',
                'default' => 'small',
                'separator' => 'none',
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
                'show_label' => false,
                'default' => __('Content Here', 'bdevselement'),
                'placeholder' => __('Type subtitle here', 'bdevselement'),
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
                    '{{WRAPPER}} .bdevs-el-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // title
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
                    '{{WRAPPER}} .bdevs-el-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-title',
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

        // Faq Content
        $this->start_controls_section(
            '_box_section_style_content',
            [
                'label' => __('Faq Content', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Box Title
        $this->add_control(
            '_box_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            '_box_content_padding',
            [
                'label' => __('Title Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            '_box_content_border-radius',
            [
                'label' => __('Title Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_content_background',
                'selector' => '{{WRAPPER}} .bdevs-box-title',
                'exclude' => [
                    'image'
                ]
            ]
        );

        $this->add_responsive_control(
            '_box_title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_box_title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'boxtitle',
                'selector' => '{{WRAPPER}} .bdevs-box-title',
                //'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        // description
        $this->add_control(
            '_box_content_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            '_box_card_body_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            '_box_card_body_border-radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_card_body_background',
                'selector' => '{{WRAPPER}} .bdevs-box-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        $this->add_responsive_control(
            '_box_description_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_box_description_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'boxdescription',
                'selector' => '{{WRAPPER}} .bdevs-box-content p',
                //'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_2', 'class', 'section-title bdevs-el-title ');
        $title = bdevs_element_kses_basic($settings['title']);

        // img 
        $tab_big_image = wp_get_attachment_image_url(!empty($settings['tab_big_image']['id']), !empty($settings['tab_big_image_size']));
        if (! $tab_big_image) {
            $tab_big_image = $settings['tab_big_image']['url'];
        }

        // img small
        $tab_small_image = wp_get_attachment_image_url(!empty($settings['tab_small_image']['id']), !empty($settings['tab_big_image_size']));
        if (! $tab_small_image) {
            $tab_small_image = $settings['tab_small_image']['url'];
        }

        // img small
        $tab_shape_image = wp_get_attachment_image_url(!empty($settings['tab_shape_image']['id']), !empty($settings['tab_big_image_size']));
        if (! $tab_shape_image) {
            $tab_shape_image = $settings['tab_shape_image']['url'];
        }


        if (empty($settings['slides'])) {
            return;
        }

?>

        <div class="section-faq-area bdevs-el-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-4 d-lg-none d-xl-block">
                        <div class="faq-left-box pos-rel mb-200">
                            <?php if ($tab_big_image) : ?>
                                <div class="faq-left-img">
                                    <img src="<?php print esc_url($tab_big_image); ?>" alt="">
                                </div>
                            <?php endif; ?>

                            <?php if ($tab_small_image) : ?>
                                <div class="faq-pos-front">
                                    <img src="<?php print esc_url($tab_small_image); ?>" alt="">
                                </div>
                            <?php endif; ?>

                            <?php if ($tab_shape_image) : ?>
                                <div class="faq-back-shape">
                                    <img src="<?php print esc_url($tab_shape_image); ?>" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="about-title mb-45">
                            <?php if ($settings['sub_title']) : ?>
                                <h5 class="sub-title bdevs-el-sub-title"><?php echo bdevs_element_kses_intermediate($settings['sub_title']); ?></h5>
                            <?php endif; ?>
                            <?php printf(
                                '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title_2'),
                                $title
                            ); ?>
                            <?php if ($settings['desccription']) : ?>
                                <p class="bdevs-el-des"><?php echo bdevs_element_kses_intermediate($settings['desccription']); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="faq-right-box">
                            <div id="accordion" class="mt-40">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    // img 
                                    $tab_image = wp_get_attachment_image_url(!empty($slide['tab_image']['id']), !empty($slide['tab_image_size']));
                                    if (! $tab_image) {
                                        $tab_image = $slide['tab_image']['url'];
                                    }

                                    // active class
                                    $collapsed_tab = ($id == 0) ? '' : 'collapsed';
                                    $area_expanded = ($id == 0) ? 'true' : 'false';
                                    $active_show_tab = ($id == 0) ? 'show' : '';
                                ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?php echo esc_attr($id); ?>">
                                            <h5 class="mb-0">
                                                <a href="#" class="bdevs-box-title btn-link <?php echo esc_attr($collapsed_tab); ?>" data-toggle="collapse" data-target="#collapse<?php echo esc_attr($id); ?>"
                                                    aria-expanded="false" aria-controls="collapse<?php echo esc_attr($id); ?>">
                                                    <?php echo bdevs_element_kses_basic($slide['tab_title']); ?>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse<?php echo esc_attr($id); ?>" class="collapse <?php echo esc_attr($active_show_tab); ?>" aria-labelledby="heading<?php echo esc_attr($id); ?>" data-parent="#accordion">
                                            <div class="card-body bdevs-box-content">
                                                <p><?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php

    }
}
