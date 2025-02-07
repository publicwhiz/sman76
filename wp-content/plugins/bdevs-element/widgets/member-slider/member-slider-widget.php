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

class Member_Slider extends BDevs_El_Widget
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
        return 'member_slider';
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
        return __('Member Slider', 'bdevselement');
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
        return 'eicon-lock-user';
    }

    public function get_keywords()
    {
        return ['slider', 'memeber', 'gallery', 'carousel'];
    }


    protected function register_content_controls()
    {
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Members List', 'bdevselement'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs(
            '_tab_style_member_box_slider'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => __('Information', 'bdevselement'),
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
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'bdevselement'),
                'default' => __('BDevs Member Title', 'bdevselement'),
                'placeholder' => __('Type title here', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __('Job Title', 'bdevselement'),
                'default' => __('BDevs Officer', 'bdevselement'),
                'placeholder' => __('Type designation here', 'bdevselement'),
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
                'show_label' => true,
                'label' => __('Short Bio', 'bdevselement'),
                'placeholder' => __('Write Something about cool member', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'slide_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __('Type link here', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => __('Links', 'bdevselement'),
            ]
        );

        $repeater->add_control(
            'show_social',
            [
                'label' => __('Show Options?', 'bdevselement'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'bdevselement'),
                'label_off' => __('No', 'bdevselement'),
                'return_value' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'web_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Website Address', 'bdevselement'),
                'placeholder' => __('Add your profile link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'email_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Email', 'bdevselement'),
                'placeholder' => __('Add your email link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'phone_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Phone', 'bdevselement'),
                'placeholder' => __('Add your phone link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'facebook_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Facebook', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Add your facebook link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'twitter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Twitter', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Add your twitter link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'instagram_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Instagram', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Add your instagram link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'linkedin_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('LinkedIn', 'bdevselement'),
                'default' => __('#', 'bdevselement'),
                'placeholder' => __('Add your linkedin link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'youtube_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Youtube', 'bdevselement'),
                'placeholder' => __('Add your youtube link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'googleplus_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Google Plus', 'bdevselement'),
                'placeholder' => __('Add your Google Plus link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'flickr_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Flickr', 'bdevselement'),
                'placeholder' => __('Add your flickr link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'vimeo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Vimeo', 'bdevselement'),
                'placeholder' => __('Add your vimeo link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'behance_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Behance', 'bdevselement'),
                'placeholder' => __('Add your hehance link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'dribble_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Dribbble', 'bdevselement'),
                'placeholder' => __('Add your dribbble link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'pinterest_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Pinterest', 'bdevselement'),
                'placeholder' => __('Add your pinterest link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'gitub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __('Github', 'bdevselement'),
                'placeholder' => __('Add your github link', 'bdevselement'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        // REPEATER
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
                'selectors' => [
                    '{{WRAPPER}} .single-carousel-item' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        // Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __('Settings', 'bdevselement'),
                'tab'   => Controls_Manager::TAB_CONTENT,
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

        $this->end_controls_section();
    }

    // register_style_controls
    protected function register_style_controls()
    {
        // list item
        $this->start_controls_section(
            '_section_style_list',
            [
                'label' => __('Team Member Box', 'bdevselement'),
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

        // list title
        $this->add_control(
            'list_title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'bdevselement'),
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


        // Designation
        $this->add_control(
            'list_des_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Designation', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'list_desg_spacing',
            [
                'label' => __('Bottom Spacing', 'bdevselement'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-des' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
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

        // Description
        $this->add_control(
            'list_descrip_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'bdevselement'),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'list_descrip_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-descrip' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_descrip_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-list-descrip',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        // social
        $this->start_controls_section(
            '_section_style_social',
            [
                'label' => __('Social', 'bdevselement'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Spacing', 'bdevselement'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .bdevs-el-list-icon a' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .bdevs-el-list-icon a' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .bdevs-el-list-icon a' => 'line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_icon_typography',
                'label' => __('Typography', 'bdevselement'),
                'selector' => '{{WRAPPER}} .bdevs-el-list-icon a',
                //'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'social_border',
                'selector' => '{{WRAPPER}} .bdevs-el-list-icon a',
            ]
        );

        $this->add_control(
            'list_icon_color',
            [
                'label' => __('Text Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_background',
                'selector' => '{{WRAPPER}} .bdevs-el-list-icon a',
                'exclude' => [
                    'image'
                ]
            ]
        );

        $this->add_control(
            'list_icon_hvr_color',
            [
                'label' => __('Text Hover Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'list_border_hvr_color',
            [
                'label' => __('Border Hover Color', 'bdevselement'),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .bdevs-el-list-icon a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_hvr_background',
                'selector' => '{{WRAPPER}} .bdevs-el-list-icon a:hover',
                'exclude' => [
                    'image'
                ]
            ]
        );
        $this->end_controls_section();
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'team-title bdevs-el-list-title');
        $this->add_render_attribute('name', 'class', 'name');


        $this->add_inline_editing_attributes('description', 'intermediate');
        $this->add_render_attribute('description', 'class', 'bdevs-card-text bdevs-el-list-des');

        if (empty($settings['slides'])) {
            return;
        }
?>

        <?php if ($settings['design_style'] === 'style_1'):
            $slider_active = !empty($settings['slider_active']) ? 'team-active' : '';
        ?>
            <section class="team-area">
                <div class="container">
                    <div class="row <?php echo esc_attr($slider_active); ?>">
                        <?php foreach ($settings['slides'] as $slide) :
                            $title = bdevs_element_kses_basic($slide['title']);
                            $slide_url = esc_url($slide['slide_url']);

                            if (!empty($slide['image']['id'])) {
                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                                if (! $image) {
                                    $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '';
                                }
                            }
                        ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="team-box text-center mb-30 bdevs-el-content">
                                    <?php if (!empty($image)) : ?>
                                        <div class="team-thumb mb-35 pos-rel">
                                            <img src="<?php print esc_url($image); ?>" alt="img">
                                        </div>
                                    <?php endif; ?>
                                    <div class="team-content">
                                        <?php printf(
                                            '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            $title,
                                            $slide_url
                                        ); ?>
                                        <?php if (!empty($slide['designation'])) : ?>
                                            <h6 class="designation bdevs-el-list-des"><?php echo bdevs_element_kses_basic($slide['designation']); ?></h6>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['description'])) : ?>
                                            <p><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                        <?php endif; ?>
                                        <!-- socials -->
                                        <?php if (!empty($slide['show_social'])) : ?>
                                            <div class="social-links bdevs-el-list-icon">
                                                <?php if (!empty($slide['web_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['web_title']); ?>"><i class="far fa-globe"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['email_title'])) : ?>
                                                    <a href="mailto:<?php echo esc_url($slide['email_title']); ?>"><i class="fal fa-envelope"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['phone_title'])) : ?>
                                                    <a href="tell:<?php echo esc_url($slide['phone_title']); ?>"><i class="fas fa-phone"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['facebook_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['facebook_title']); ?>"><i class="fab fa-facebook-f"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['twitter_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['twitter_title']); ?>"><i class="fab fa-twitter"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['instagram_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['instagram_title']); ?>"><i class="fab fa-instagram"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['linkedin_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['linkedin_title']); ?>"><i class="fab fa-linkedin-in"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['youtube_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['youtube_title']); ?>"><i class="fab fa-youtube"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['googleplus_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['googleplus_title']); ?>"><i class="fab fa-google-plus-g"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['flickr_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['flickr_title']); ?>"><i class="fab fa-flickr"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['vimeo_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['vimeo_title']); ?>"><i class="fab fa-vimeo-v"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['behance_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['behance_title']); ?>"><i class="fab fa-behance"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['dribble_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['dribble_title']); ?>"><i class="fab fa-dribbble"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['pinterest_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['pinterest_title']); ?>"><i class="fab fa-pinterest-p"></i></a>
                                                <?php endif; ?>

                                                <?php if (!empty($slide['gitub_title'])) : ?>
                                                    <a href="<?php echo esc_url($slide['gitub_title']); ?>"><i class="fab fa-github"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- style 2 -->
        <?php elseif ($settings['design_style'] === 'style_2'): ?>
            <section class="team-area">
                <div class="container">
                    <div class="row">
                        <?php foreach ($settings['slides'] as $slide) :
                            $title = bdevs_element_kses_basic($slide['title']);
                            $slide_url = esc_url($slide['slide_url']);

                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (! $image) {
                                $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '';
                            }
                        ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="team-wrapper team-box-2 text-center mb-30 bdevs-el-content">
                                    <div class="team-thumb">
                                        <?php if (!empty($image)) : ?>
                                            <img src="<?php print esc_url($image); ?>" alt="">
                                        <?php endif; ?>
                                        <?php if (!empty($slide['show_social'])) : ?>
                                            <div class="team-social-profile">
                                                <ul class="bdevs-el-list-icon">
                                                    <?php if (!empty($slide['web_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['web_title']); ?>"><i class="far fa-globe"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['email_title'])) : ?>
                                                        <li><a href="mailto:<?php echo esc_url($slide['email_title']); ?>"><i class="fal fa-envelope"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['phone_title'])) : ?>
                                                        <li><a href="tell:<?php echo esc_url($slide['phone_title']); ?>"><i class="fas fa-phone"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['facebook_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['facebook_title']); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['twitter_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['twitter_title']); ?>"><i class="fab fa-twitter"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['instagram_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['instagram_title']); ?>"><i class="fab fa-instagram"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['linkedin_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['linkedin_title']); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['youtube_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['youtube_title']); ?>"><i class="fab fa-youtube"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['googleplus_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['googleplus_title']); ?>"><i class="fab fa-google-plus-g"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['flickr_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['flickr_title']); ?>"><i class="fab fa-flickr"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['vimeo_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['vimeo_title']); ?>"><i class="fab fa-vimeo-v"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['behance_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['behance_title']); ?>"><i class="fab fa-behance"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['dribble_title'])) : ?>
                                                        <li> <a href="<?php echo esc_url($slide['dribble_title']); ?>"><i class="fab fa-dribbble"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['pinterest_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['pinterest_title']); ?>"><i class="fab fa-pinterest-p"></i></a></li>
                                                    <?php endif; ?>

                                                    <?php if (!empty($slide['gitub_title'])) : ?>
                                                        <li><a href="<?php echo esc_url($slide['gitub_title']); ?>"><i class="fab fa-github"></i></a></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="team-member-info mt-35 mb-25">
                                        <?php printf(
                                            '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            $title,
                                            $slide_url
                                        ); ?>
                                        <?php if (!empty($slide['designation'])) : ?>
                                            <h6 class="f-500 text-up-case letter-spacing bdevs-el-list-des pink-color designation"><?php echo bdevs_element_kses_basic($slide['designation']); ?></h6>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['description'])) : ?>
                                            <p class="mt-15 bdevs-el-list-descrip"><?php echo bdevs_element_kses_basic($slide['description']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- style 2 -->
        <?php elseif ($settings['design_style'] === 'style_3'): ?>
            <section class="our-expert-area our-expert-area-2 our-expert-area-3">
                <div class="container">
                    <div class="row mt-none-30 team-center-active">
                        <?php foreach ($settings['slides'] as $slide) :
                            $title = bdevs_element_kses_basic($slide['title']);
                            $slide_url = esc_url($slide['slide_url']);

                            $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            if (! $image) {
                                $image = $slide['image']['url'];
                            }

                        ?>
                            <div class="col-xl-4 col-lg-6 col-sm-12 mt-30">
                                <div class="single-carousel-item bdevs-el-content">
                                    <div class="thumb">
                                        <?php if (!empty($image)) : ?>
                                            <img src="<?php print esc_url($image); ?>" alt="">
                                        <?php endif; ?>

                                        <?php if (!empty($badge_image)) : ?>
                                            <span class="icon">
                                                <img src="<?php print esc_url($badge_image); ?>" alt="">
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <?php printf(
                                            '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                            tag_escape($settings['title_tag']),
                                            $this->get_render_attribute_string('title'),
                                            $title,
                                            $slide_url
                                        ); ?>

                                        <span class="bdevs-el-list-des sub-title">
                                            <?php echo bdevs_element_kses_basic($slide['designation']); ?>
                                        </span>

                                        <p class="bdevs-el-list-descrip">
                                            <?php echo bdevs_element_kses_basic($slide['description']); ?>
                                        </p>
                                    </div>
                                    <!-- socials -->
                                    <?php if (!empty($slide['show_social'])) : ?>
                                        <div class="social-links bdevs-el-list-icon">
                                            <?php if (!empty($slide['web_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['web_title']); ?>"><i class="far fa-globe"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['email_title'])) : ?>
                                                <a href="mailto:<?php echo esc_url($slide['email_title']); ?>"><i class="fal fa-envelope"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['phone_title'])) : ?>
                                                <a href="tell:<?php echo esc_url($slide['phone_title']); ?>"><i class="fas fa-phone"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['facebook_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['facebook_title']); ?>"><i class="fab fa-facebook-f"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['twitter_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['twitter_title']); ?>"><i class="fab fa-twitter"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['instagram_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['instagram_title']); ?>"><i class="fab fa-instagram"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['linkedin_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['linkedin_title']); ?>"><i class="fab fa-linkedin-in"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['youtube_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['youtube_title']); ?>"><i class="fab fa-youtube"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['googleplus_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['googleplus_title']); ?>"><i class="fab fa-google-plus-g"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['flickr_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['flickr_title']); ?>"><i class="fab fa-flickr"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['vimeo_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['vimeo_title']); ?>"><i class="fab fa-vimeo-v"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['behance_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['behance_title']); ?>"><i class="fab fa-behance"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['dribble_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['dribble_title']); ?>"><i class="fab fa-dribbble"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['pinterest_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['pinterest_title']); ?>"><i class="fab fa-pinterest-p"></i></a>
                                            <?php endif; ?>

                                            <?php if (!empty($slide['gitub_title'])) : ?>
                                                <a href="<?php echo esc_url($slide['gitub_title']); ?>"><i class="fab fa-github"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
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
