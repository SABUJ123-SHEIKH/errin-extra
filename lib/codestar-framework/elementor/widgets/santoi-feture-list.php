<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_feture_list extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'santoi_feture_list';
    }

    public function get_title()
    {
        return esc_html__('Santoi Feture List', 'santoi-core');
    }

    public function get_icon()
    {
        return 'teconce-custom-icon';
    }

    public function get_categories()
    {
        return ['santoi-ele-widgets-cat'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'Widget-style-left-section',
            [
                'label' => esc_html__('Feture Left Section', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'counter_secund_text',
            [
                'label' => esc_html__('Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'Sintio AI-powered apps.',
                'placeholder' => esc_html__('Sintio AI-powered apps.', 'textdomain'),
            ]
        );
        $this->add_control(
            'one_image',
            [
                'label' => esc_html__('Image One', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'two_image',
            [
                'label' => esc_html__('Image two', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'Three_image',
            [
                'label' => esc_html__('Image Three', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Widget-style-section',
            [
                'label' => esc_html__('Feture Right Section', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'counter_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'Everything you need to know about the AI-powered chatbot',
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'counter_secund_title',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'Our clients describe us as a product team which creates AI writing tools, by crafting top-notch user experience.',
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );


        $this->add_control(
            'counter_button_title',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => ' Start Free Trial',
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'counter_title',
            [
                'label' => esc_html__('Number of Count', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => ' Sintio AI now has a voice',
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-check-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Banner Image List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [

                    ],
                    [

                    ],
                    [

                    ],
                    [

                    ],
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-style',
            [
                'label' => esc_html__('Section Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Section background', 'textdomain'),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .st2-about-area',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section_left_style',
            [
                'label' => esc_html__('Right content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'text_left_color',
            [
                'label' => esc_html__('Sub Title and Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-about-img-area p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sub_left_content_typography',
                'label' => esc_html__('Sub Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-about-img-area p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section_right_style',
            [
                'label' => esc_html__('Left content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Sub Title and Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_content_typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} h4',
            ]
        );
        $this->add_control(
            'decription_text_color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'decription__typography',
                'label' => esc_html__('Decription Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_color_hover',
            [
                'label' => esc_html__('Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .st1-button-color::before , {{WRAPPER}} .st1-button-color:hover span' => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_control(
            'button_color_bg',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_color_bg_hover',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .st1-button-color::before' => 'background-color: {{VALUE}}!important',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section_icon_list_style',
            [
                'label' => esc_html__('Right Icon/content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'icon_text_color',
            [
                'label' => esc_html__('Content Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .st2-about-contain ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content__typography',
                'label' => esc_html__('Content Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-about-contain ul li',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- st2-about-area start -->
        <section class="st2-about-area">
            <div class="container st2-about-container">

                <div class="row st2-995-row gx-5">
                    <div class="col-12 col-md-6 wow fadeInLeft" data-wow-delay="0.40s">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="st2-about-img-area">
                                    <p class="has_char_anim">
                                        <?php echo esc_html($settings['counter_secund_text']); ?>
                                    </p>

                                    <div class="st2-about-img-area-img-one has_fade_anim">

                                        <img src="<?php echo esc_html($settings['one_image']['url']); ?>"
                                             alt="about-img-1.png" data-speed=".9">
                                    </div>
                                    <div class="st2-about-img-area-img-two img_anim_reveal">
                                        <img src="<?php echo esc_html($settings['two_image']['url']); ?>"
                                             alt="about-img-2.png" data-speed=".9">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="st2-about-img-area-img-there img_anim_reveal">
                                    <img src="<?php echo esc_html($settings['Three_image']['url']); ?>"
                                         alt="about-img-3.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="st2-about-contain">
                            <h4 class="has_text_reveal_anim">
                                <?php echo esc_html($settings['counter_title']); ?>
                            </h4>
                            <div class="has_text_move_anim">
                            <p>
                                <?php echo esc_html($settings['counter_secund_title']); ?>
                            </p>
                            </div>
                            <ul>
                                <?php
                                foreach ($settings['list'] as $item) {
                                    ?>
                                    <li class="has_fade_anim">
                            <span>
                                <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                            </span>
                                        <?php echo esc_html($item['counter_title']); ?>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>

                            <a class="st1-button-hover-anim-st  st1-button-color has_fade_anim" href="#">
                        <span>
                             <?php echo esc_html($settings['counter_button_title']); ?>

                        </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- st2-about-area End -->

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_feture_list());

