<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_videos extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'santoi_videos';
    }

    public function get_title()
    {
        return esc_html__('Santoi Videos', 'santoi-core');
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
                'label' => esc_html__('Videos Top Section', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_css',
                'label' => esc_html__('Background videos Image ', 'textdomain'),
                'types' => [ 'classic'],
                'selector' => '{{WRAPPER}} .st2-boost-contain-img',
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-play',
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
            'counter_url',
            [
                'label' => esc_html__('Videos Url', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'https://www.youtube.com/watch?v=tW31nUonyTU',
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Widget-style-section',
            [
                'label' => esc_html__('Videos Bottom Section', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'counter_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'Boost Yourself When You Send The Money',
                'placeholder' => esc_html__('Boost Yourself When You Send The Money', 'textdomain'),
            ]
        );
        $this->add_control(
            'counter_secund_title',
            [
                'label' => esc_html__('Decription', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English.',
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
                'placeholder' => esc_html__('  Generate AI Postr', 'textdomain'),
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
        $this->add_responsive_control(
            'Section-Padding',
            [
                'label' => esc_html__('Section Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .st2-boost-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Section background', 'textdomain'),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .st2-boost-area',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section_left_style',
            [
                'label' => esc_html__('Top content', 'textdomain'),
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
            'Section_icon_list_style',
            [
                'label' => esc_html__('Videos Top', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Videos Border Sthyle', 'textdomain'),
                'selector' => '{{WRAPPER}} .your-class',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section_right_style',
            [
                'label' => esc_html__('Bottom content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .st2-boost-contain-box h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-boost-contain-box h4',
            ]
        );
        $this->add_control(
            'description_text_color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .st2-boost-contain-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description__typography',
                'label' => esc_html__('Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-boost-contain-box p',
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

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- st2-boost-area start -->
        <section class="st2-boost-area">
            <div class="container">
                <div class="st2-boost-contain has_fade_anim">
                    <div class="st2-boost-contain-img">
                        <a class="btn video video-popup mfp-iframe" href=" <?php echo esc_html($settings['counter_url']); ?>" data-lity>
                            <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                                            <div class="waves wave-1"></div>
                                            <div class="waves wave-2"></div>
                                            <div class="waves wave-3"></div>
                        </a>
                    </div>

                    <div class="st2-boost-contain-box">
                        <h4 class="has_text_reveal_anim">
                           <?php echo esc_html($settings['counter_title']); ?>
                        </h4>
                        <div class="st2-boost-link has_fade_anim">
                            <a class="st1-button-hover-anim-st  st1-button-color" href="#">
                        <span>
                           <?php echo esc_html($settings['counter_button_title']); ?>
                        </span>
                            </a>
                        </div>
                        <div class="has_text_move_anim">
                            <p>
                                <?php echo esc_html($settings['counter_secund_title']); ?>
                            </p>
                         </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- st2-boost-area End -->

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_videos());

