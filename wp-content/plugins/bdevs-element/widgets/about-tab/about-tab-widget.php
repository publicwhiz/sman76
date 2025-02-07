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

class about_Tab extends BDevs_El_Widget
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
        return 'about-tab';
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
        return __('About TAB', 'bdevselement');
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
        return ['about', 'tab'];
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_about_shape_image',
            [
                'label' => __('Shape Image', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_shape_image',
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
            '_section_slides',
            [
                'label' => __('Slides', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
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
                    'default' => 'fa fa-smile-o',
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
            'tab_image',
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
            'tab_content_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Content Image', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
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
            'tab_content_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Content Title', 'bdevselement'),
                'default' => __('Tab Content Title', 'bdevselement'),
                'placeholder' => __('Type content here', 'bdevselement'),
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

        $this->add_responsive_control(
            '_box_content_padding',
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
            '_box_content_border-radius',
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
                'name' => 'box_content_background',
                'selector' => '{{WRAPPER}} .bdevs-box-content',
                'exclude' => [
                    'image'
                ]
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

        // Box icon
        $this->add_control(
            '_box_heading_icon',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Icon', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            '_box_icon_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-icon i' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_box_icon_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-box-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'boxicon',
                'selector' => '{{WRAPPER}} .bdevs-box-icon i',
                //'scheme' => Typography::TYPOGRAPHY_2,
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


        <?php if ($settings['design_style'] === 'style_1') :
            // bg_image
            $bg_shape_image = wp_get_attachment_image_url($settings['bg_shape_image']['id'], $settings['thumbnail_size']);
            if (! $bg_shape_image) {
                $bg_shape_image = $settings['bg_shape_image']['url'];
            }

        ?>
            <section class="analysis-area pos-rel pt-120 pb-90 bdevs-el-content">
                <?php if (!empty($bg_shape_image)) : ?>
                    <div class="analysis-bg-icon">
                        <img src="<?php print esc_url($bg_shape_image); ?>" alt="img">
                    </div>
                <?php endif; ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <ul class="nav nav-pills mb-65" id="pills-tab" role="tablist">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    $tab_image = wp_get_attachment_image_url(!empty($slide['tab_image']['id']), !empty($slide['tab_image_size']));
                                    if (! $tab_image) {
                                        $tab_image_url = $slide['tab_image']['url'];
                                    }

                                    $tab_content_image = wp_get_attachment_image_url(!empty($slide['tab_content_image']['id']), !empty($slide['tab_image_size']));
                                    if (! $tab_image) {
                                        $tab_content_image_url = $slide['tab_content_image']['url'];
                                    }

                                    // active class
                                    $active_tab_menu = ($id == 0) ? 'active' : '';
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link bdevs-box-content bdevs-box-icon <?php echo esc_attr($active_tab_menu); ?>" id="pills-home-<?php echo esc_attr($id); ?>" data-toggle="pill" href="#pills-<?php echo esc_attr($id); ?>" role="tab" aria-controls="pills-<?php echo esc_attr($id); ?>" aria-selected="true">
                                            <?php if (! empty($slide['icon']) || ! empty($slide['selected_icon']['value'])) : ?>
                                                <?php bdevs_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                            <?php endif; ?>
                                            <h6 class=" bdevs-box-title  "><?php echo bdevs_element_kses_basic($slide['tab_title']); ?></h6>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tab-content" id="pills-tabContent">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    $tab_image = wp_get_attachment_image_url(!empty($slide['tab_image']['id']), !empty($slide['tab_image_size']));
                                    if (! $tab_image) {
                                        $tab_image_url = $slide['tab_image']['url'];
                                    }

                                    $tab_content_image = wp_get_attachment_image_url(!empty($slide['tab_content_image']['id']), !empty($slide['tab_image_size']));
                                    if (! $tab_image) {
                                        $tab_content_image_url = $slide['tab_content_image']['url'];
                                    }

                                    // active class
                                    $active_tab = ($id == 0) ? 'show active' : '';
                                ?>
                                    <div class="tab-pane fade <?php echo esc_attr($active_tab); ?>" id="pills-<?php echo esc_attr($id); ?>" role="tabpanel" aria-labelledby="pills-home-<?php echo esc_attr($id); ?>">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-8">
                                                <div class="section-title pos-rel mb-40">
                                                    <div class="section-text section-text-white section-text-green pos-rel">
                                                        <?php if (!empty($slide['tab_sub_title'])) : ?>
                                                            <h5 class="bdevs-el-sub-title"><?php echo bdevs_element_kses_basic($slide['tab_sub_title']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($slide['tab_content_title'])) : ?>
                                                            <h1 class="white-color bdevs-el-title"><?php echo bdevs_element_kses_basic($slide['tab_content_title']); ?></h1>
                                                        <?php endif; ?>
                                                        <?php if (!empty($slide['tab_content_info'])) : ?>
                                                            <p class="bdevs-el-des"><?php echo bdevs_element_kses_basic($slide['tab_content_info']); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if (!empty($slide['button_url'])) : ?>
                                                    <div class="section-button section-button-left mb-30">
                                                        <a data-animation="fadeInLeft" data-delay=".6s" href="<?php echo esc_url($slide['button_url']); ?>"
                                                            class="bt-btn bdevs-el-btn"><?php echo bdevs_element_kses_basic($slide['button_text']); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($tab_content_image_url)) : ?>
                                                <div class="col-xl-6 col-lg-4">
                                                    <div class="analysis-chart mb-30">
                                                        <img src="<?php echo esc_url($tab_content_image_url); ?>" alt="img">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif ($settings['design_style'] === 'style_2') : ?>


        <?php endif; ?>


<?php

    }
}
