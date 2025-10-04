<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_trial extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'santoi_trial';
    }

    public function get_title()
    {
        return esc_html__('Santoi Trial', 'santoi-core');
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
            'Widget-style-section',
            [
                'label' => esc_html__('Widget Style Section', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'counter_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'Lets Start Generate Content Free For 30 Days Trial',
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Middle Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'counter_secund_title',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => ' Start Free Trial',
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );
        $this->add_control(
            'website_link',
            [
                'label' => esc_html__('Button Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
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
                    '{{WRAPPER}} .st2-trial-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_trial',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .st2-trial-area',
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} h4' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} h4',
            ]
        );
        $this->add_responsive_control(
            'Title-width',
            [
                'label' => esc_html__('Title Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .st2-trial-contain h4' => 'width: {{SIZE}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .st1-button-color::before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_color_bg',
            [
                'label' => esc_html__('Button Bg Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_color_bg_hover',
            [
                'label' => esc_html__('Button Bg Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,

                'selectors' => [
                    '{{WRAPPER}} .st1-button-color::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- st2-trial-area start -->
        <section class="st2-trial-area">

            <div class="container">
                <div class="row st2-trial-row">
                    <div class="col-12 col-md-6">
                        <div class="st2-trial-contain has_fade_anim">
                            <h4>
                                <?php echo $settings['counter_title']; ?>

                            </h4>

                            <a class="st1-button-hover-anim-st st1-button-color"
                               href="<?php echo $settings['website_link']['url']; ?>">
                        <span>
                            <?php echo $settings['counter_secund_title']; ?>
                        </span>
                            </a>
                        </div>

                    </div>
                    <div class="col-12 col-md-6">
                        <div class="st2-trial-img">
                            <div class="st2-trial-img-1 img_anim_reveal">
                                <img src="<?php echo $settings['image']['url']; ?>" alt="Trial-2" data-speed=".7">
                                <?php

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- st2-trial-area End -->

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_trial());

