<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_award extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'santoi_award';
    }

    public function get_title()
    {
        return esc_html__('Santoi Award', 'santoi-core');
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
            'counter_secund_title',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'The awards won',
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );
        $this->add_control(
            'counter_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'by our works.',
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'counter_decription',
            [
                'label' => esc_html__('Decription', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => 'Our clients describe us as a product team which creates AI writing tools, by crafting top-notch user experience.',
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
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
                'default' => ' 2021',
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'counter_main_title',
            [
                'label' => esc_html__('Counter Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => 'true',
                'default' => ' Google awards',
                'placeholder' => esc_html__(' Single Click With AI Power', 'textdomain'),
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
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .st2-news-area',
            ]
        );
        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
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
                'name' => 'sub_content_typography',
                'label' => esc_html__('Sub Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} h4 span',
            ]
        );
        $this->add_control(
            'Title_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_content_typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} h2',
            ]
        );
        $this->add_control(
            'decription_text_color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
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
        $this->add_control(
            'Box-Number-color',
            [
                'label' => esc_html__('Box Number Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-awards-info h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Box-Number-typography',
                'label' => esc_html__('Box Number Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-awards-info h4',
            ]
        );
        $this->add_control(
            'Box-Title-color',
            [
                'label' => esc_html__('Box Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-awards-info p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Box-Title-typography',
                'label' => esc_html__('Box Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-awards-info p',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- st2-awards-area Start -->
        <section class="st2-awards-area">
            <div class="container">
                <div class="row st2-995-row">
                    <div class="col-12 col-md-6">
                        <div class="st2-awards-contain">
                            <h4 class="has_text_reveal_anim">
                                <span>
                                   <?php echo $settings['counter_secund_title']; ?>
                                </span>
                            </h4>
                            <h2 class="has_text_reveal_anim"><?php echo $settings['counter_title']; ?></h2>
                            <div class="has_text_move_anim">
                                 <p>
                                <?php echo $settings['counter_decription']; ?>
                            </p>
                            </div>
                           
                            <a class="st1-button-hover-anim-st  st1-button-color has_fade_anim" href="#">
                        <span>
                            <?php echo $settings['counter_button_title']; ?>
                        </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="st2-awards-info-area">
                            <?php


                            foreach ($settings['list'] as $item) {

                                ?>
                                <div class="st2-awards-info">
                                    <h4 class="count has_char_anim">
                                        <?php echo $item['counter_title']; ?>
                                    </h4>
                                     <div class="has_text_move_anim">
                                    <p>
                                        <?php echo $item['counter_main_title']; ?>
                                    </p>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- st2-awards-area ENd -->

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_award());

