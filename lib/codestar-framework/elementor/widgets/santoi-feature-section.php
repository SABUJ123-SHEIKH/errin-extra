<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_feature_section extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi-feature-section';
    }

    public function get_title() {
        return esc_html__('Santoi Feature Section', 'santoi-core');
    }

    public function get_icon() {
        return 'teconce-custom-icon';
    }

    public function get_categories() {
        return ['santoi-ele-widgets-cat'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section-Content',
            [
                'label' => esc_html__('Section Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section-title',
            [
                'label' => esc_html__('Section Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Start Catching', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'section-subtitle',
            [
                'label' => esc_html__('Section Subtitle', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Interface Trends', 'textdomain'),
                'placeholder' => esc_html__('Type your subtitle here', 'textdomain'),
            ]
        );
        $this->add_control(
            'section-info',
            [
                'label' => esc_html__('Section Info', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Track your entire project from start to finish with beautiful views that make project planning a breeze manage your resources.', 'textdomain'),
                'placeholder' => esc_html__('Type your info here', 'textdomain'),
            ]
        );
        $this->add_control(
            'button-title',
            [
                'label' => esc_html__('Button Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Features', 'textdomain'),
                'placeholder' => esc_html__('Type your Button title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'button-link',
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
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'box_title',
            [
                'label' => esc_html__('Box Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Effortless Invoicing', 'textdomain'),
                'placeholder' => esc_html__('Type your Box title here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'box_info',
            [
                'label' => esc_html__('Box Info', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('The uncomplicated invoice generator to let you create your first invoice professionally.', 'textdomain'),
                'placeholder' => esc_html__('Type your Box info here', 'textdomain'),
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Box List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'box_title' => esc_html__('Effortless Invoicing', 'textdomain'),
                    ],
                    [
                        'box_title' => esc_html__('Automation At Its Best', 'textdomain'),
                    ],
                    [
                        'box_title' => esc_html__('Save With Cloud', 'textdomain'),
                    ],
                    [
                        'box_title' => esc_html__('3M+ Subscribers', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ box_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section-style',
            [
                'label' => esc_html__('Section Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Section-Padding',
            [
                'label' => esc_html__('Section Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .st1-about-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'label' => esc_html__('Section Background', 'textdomain'),
                'name' => 'background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .st1-about-area',
                'exclude' => ['image']
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-Title-style',
            [
                'label' => esc_html__('Section Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Section-Title-color',
            [
                'label' => esc_html__('Section Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-contain h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-about-contain h2',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-Sub-Title-style',
            [
                'label' => esc_html__('Section Sub Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Section-Sub-Title-color',
            [
                'label' => esc_html__('Section Sub Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} span.st1-about-contain-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Sub-Title-typography',
                'label' => esc_html__('Section Sub Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} span.st1-about-contain-subtitle',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-Description-style',
            [
                'label' => esc_html__('Section Description Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Description-color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Description-typography',
                'label' => esc_html__('Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-about-contain p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Button-style',
            [
                'label' => esc_html__('Button Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'style-tabs' );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'Button-color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-contain a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Button-typography',
                'label' => esc_html__('Button Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-about-contain a',
            ]
        );
        $this->add_control(
            'Button-Background--color',
            [
                'label' => esc_html__('Button Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-contain a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Border-Radius',
            [
                'label' => esc_html__('Button Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .st1-about-contain a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        /*END STYLE NORMAL TAB*/
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'Button-Hover-color',
            [
                'label' => esc_html__('Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-button-color:hover span' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'Button-hover-BG-color',
            [
                'label' => esc_html__('Button hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-button-color::before' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_tab();
        /*END STYLE HOVER TAB*/
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'Box-style',
            [
                'label' => esc_html__('Box Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Box-Title-color',
            [
                'label' => esc_html__('Box Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-contain-box-text h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Box-Title-typography',
                'label' => esc_html__('Box Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-about-contain-box-text h4',
            ]
        );
        $this->add_control(
            'Box-Description-color',
            [
                'label' => esc_html__('Box Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-about-contain-box-text p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Box-Description-typography',
                'label' => esc_html__('Box Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-about-contain-box-text p',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- about-area Start -->
        <section class="st1-about-area">
            <div class="container st1-about-area-container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="st1-about-contain">
                            <h2 class="has_text_reveal_anim">
                                <?php echo $settings['section-title']; ?>
                            </h2>
                            <span class="st1-about-contain-subtitle  has_text_reveal_anim"><?php echo $settings['section-subtitle']; ?></span>
                            <div class="has_text_move_anim">
                            <p>
                                <?php echo $settings['section-info']; ?>
                            </p>
                            </div>
                            <?php if($settings['button-title']) { ?>
                            <div class="has_fade_anim" data-fade-from="left">
                                <a class="st1-button-hover-anim-st st1-button-color" href="<?php echo $settings['button-link']['url']; ?>">
                                    <span><?php echo $settings['button-title']; ?></span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="st1-about-contain-box">
                            <?php foreach ($settings['list'] as $item) { ?>
                                <div class="st1-about-contain-box-text">
                                    <h4 class="has_text_reveal_anim">
                                        <?php echo $item['box_title']; ?>
                                    </h4>
                                    <div class="has_text_move_anim">
                                        <p>
                                            <?php echo $item['box_info']; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area End -->
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_feature_section());

