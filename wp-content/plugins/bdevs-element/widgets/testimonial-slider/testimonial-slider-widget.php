<?php

namespace BdevsElement\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined('ABSPATH') || die();

class Testimonial_Slider extends BDevs_El_Widget
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
        return 'testimonial_slider';
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
        return __('Testimonial', 'bdevselement');
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
        return 'eicon-blockquote';
    }

    public function get_keywords()
    {
        return ['slider', 'testimonial', 'gallery', 'carousel'];
    }

    protected function register_content_controls()
    {

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
            'image_quote',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __('Image quote', 'bdevselement'),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_1'],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'message',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Message', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Client Name', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Designation Name', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'company_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Comapany Name', 'bdevselement'),
                'condition' => [
                    'field_condition' => ['style_1'],
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
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => __('Animation Speed', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'max' => 10000,
                'default' => 300,
                'description' => __('Slide speed in milliseconds', 'bdevselement'),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __('Autoplay?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __('Autoplay Speed', 'bdevselement'),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 100,
                'max' => 10000,
                'default' => 3000,
                'description' => __('Autoplay speed in milliseconds', 'bdevselement'),
                'condition' => [
                    'autoplay' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __('Infinite Loop?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __('Vertical Mode?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label' => __('Navigation', 'bdevselement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None', 'bdevselement'),
                    'arrow' => __('Arrow', 'bdevselement'),
                    'dots' => __('Dots', 'bdevselement'),
                    'both' => __('Arrow & Dots', 'bdevselement'),
                ],
                'default' => 'arrow',
                'frontend_available' => true,
                'style_transfer' => true,
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

    // register_style_controls
    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_style_testimonial',
            [
                'label' => __('Testimonial Item', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'testimonial_padding',
            [
                'label' => __('Padding', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_border_radius',
            [
                'label' => __('Border Radius', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'testimonial_box_shadow',
                'selector' => '{{WRAPPER}} .bdevs-testimonial__content',
            ]
        );


        $this->end_controls_section();

        // Testimonial Content
        $this->start_controls_section(
            '_section_style_reviewer',
            [
                'label' => __('Testimonial Content', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Title
        $this->add_control(
            '_heading_title',
            [
                'label' => __('Title', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-testimonial__reviewer-title',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-testimonial__reviewer-desc',
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
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // name
        $this->add_control(
            '_heading_name',
            [
                'label' => __('Name', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-testimonial__reviewer-name',
                //'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        // designation
        $this->add_control(
            '_heading_designation',
            [
                'label' => __('Designation', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-testimonial__reviewer-designation',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // rating
        $this->add_control(
            '_heading_rating',
            [
                'label' => __('Rating', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'rating_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-rating i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'rating_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-testimonial__reviewer-rating i',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        // quote
        $this->add_control(
            '_heading_quote',
            [
                'label' => __('Quote', 'bdevselement'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'quote_width',
            [
                'label' => __('Width', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-quote' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'quote_height',
            [
                'label' => __('Height', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-quote' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'quote_line-height',
            [
                'label' => __('Line Height', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-quote' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'quote_color',
            [
                'label' => __('Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-quote' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'quote_bg',
            [
                'label' => __('Background', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-testimonial__reviewer-quote' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'quote_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-testimonial__reviewer-quote',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (empty($settings['slides'])) {
            return;
        }
?>

        <?php if ($settings['design_style'] == 'style_1'): ?>
            <div class="testimonials-area">
                <div class="container">
                    <div class="custom-row testimonials-activation">
                        <?php foreach ($settings['slides'] as $slide) :
                            // image 
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (! $image) {
                                $image = $slide['image']['url'];
                            }

                            // image 
                            $image_quote = wp_get_attachment_image_url($slide['image_quote']['id'], $settings['thumbnail_size']);
                            if (! $image_quote) {
                                $image_quote = $slide['image_quote']['url'];
                            }
                        ?>
                            <div class="col-xl-12">
                                <div class="testi-box-2 bdevs-testimonial__content">
                                    <div class="test-rating-inner d-flex justify-content-between mb-30 align-items-center pr-15">
                                        <?php if (!empty($image_quote)) : ?>
                                            <div class="testi-quato-icon testi-quato-icon-green  bdevs-testimonial__reviewer-quote m-0">
                                                <img src="<?php print esc_url($image_quote); ?>" alt="img">
                                            </div>
                                        <?php endif; ?>
                                        <div class="testi-rating-list">
                                            <ul class="bdevs-testimonial__reviewer-rating">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="testi-content-2">
                                        <?php if ($slide['title']) : ?>
                                            <h3 class="title bdevs-testimonial__reviewer-title"><?php echo bdevs_element_kses_basic($slide['title']); ?></h3>
                                        <?php endif; ?>
                                        <?php if ($slide['message']) : ?>
                                            <p class="bdevs-testimonial__reviewer-desc"><?php echo bdevs_element_kses_basic($slide['message']); ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="testi-author d-flex align-items-center mt-30">
                                        <?php if (!empty($image)) : ?>
                                            <div class="testi-author-icon-2">
                                                <img src="<?php print esc_url($image); ?>" alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="testi-author-desination-2">
                                            <?php if ($slide['client_name']) : ?>
                                                <h4 class="sub-title bdevs-testimonial__reviewer-name"><?php echo bdevs_element_kses_basic($slide['client_name']); ?></h4>
                                            <?php endif; ?>

                                            <?php if ($slide['designation_name']) : ?>
                                                <span class="bdevs-testimonial__reviewer-designation"><?php echo bdevs_element_kses_basic($slide['designation_name']); ?> <span class="f-500 green-color"><?php echo bdevs_element_kses_basic($slide['company_name']); ?></span></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        <?php elseif ($settings['design_style'] == 'style_2'): ?>
            <section class="review-area membership-review member-ship-map pos-rel pos-rel">
                <div class="container">
                    <div class="test-active owl-carousel">
                        <?php foreach ($settings['slides'] as $slide) :
                            // image 
                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (! $image) {
                                $image = $slide['image']['url'];
                            }
                        ?>
                            <div class="item">
                                <div class="review-box">
                                    <div class="members-rating">
                                        <ul class="bdevs-testimonial__reviewer-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="members-text">
                                        <?php if ($slide['message']) : ?>
                                            <p class="bdevs-testimonial__reviewer-desc"><?php echo bdevs_element_kses_basic($slide['message']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="about-author d-flex align-items-center">
                                        <?php if (!empty($image)) : ?>
                                            <div class="author-ava">
                                                <img src="<?php print esc_url($image); ?>" alt="img">
                                            </div>
                                        <?php endif; ?>
                                        <div class="author-desination author-desination-2">
                                            <?php if ($slide['client_name']) : ?>
                                                <h4 class="sub-title bdevs-testimonial__reviewer-name"><?php echo bdevs_element_kses_basic($slide['client_name']); ?></h4>
                                            <?php endif; ?>
                                            <?php if ($slide['designation_name']) : ?>
                                                <h6 class="bdevs-testimonial__reviewer-designation"><?php echo bdevs_element_kses_basic($slide['designation_name']); ?></h6>
                                            <?php endif; ?>
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
