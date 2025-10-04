<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_button extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi_button';
    }

    public function get_title() {
        return esc_html__('Santoi Button', 'santoi-core');
    }

    public function get_icon() {
        return 'teconce-custom-icon';
    }

    public function get_categories() {
        return ['santoi-ele-widgets-cat'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'Widget-style-section',
            [
                'label' => esc_html__('Widget Style Section', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'Widget-Style',
            [
                'label' => esc_html__('Select Widget Style', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style_1',
                'options' => [
                    'style_1' => esc_html__('Style 1', 'textdomain'),
                    'style_2' => esc_html__('Style 2', 'textdomain'),
                ],
            ]
        );
        $this->end_controls_section();

        /*
         * Content For Style One
         */
        $this->start_controls_section(
            'Slider-Content',
            [
                'label' => esc_html__('Slider Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'offer_badge',
            [
                'label' => esc_html__('Offer Badge', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('save 60% off', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Super Friendly Electronics Store', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'content_img',
            [
                'label' => esc_html__('Content Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'content_text',
            [
                'label' => esc_html__('Content Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Electronics stores are renowned for being the first to
                showcase new gadgets and devices.', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'button-one-options',
            [
                'label' => esc_html__('<--- Button One Options --->', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'btn_one_text',
            [
                'label' => esc_html__('Button One Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore Now', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'btn_one_link',
            [
                'label' => esc_html__('Button One Link', 'textdomain'),
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
        $repeater->add_control(
            'btn_one_icon',
            [
                'label' => esc_html__('Button One Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-solid fa-arrow-right',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'button-two-options',
            [
                'label' => esc_html__('<--- Button Two Options --->', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'btn_two_text',
            [
                'label' => esc_html__('Button Two Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('browse all', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'btn_two_link',
            [
                'label' => esc_html__('Button Two Link', 'textdomain'),
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
        $repeater->add_control(
            'banner_shape',
            [
                'label' => esc_html__('Banner Shape', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'banner_img',
            [
                'label' => esc_html__('Banner Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Hero List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__('Super Friendly Electronics Store', 'textdomain'),
                    ],
                    [
                        'title' => esc_html__('Super Friendly Electronics Store', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Slider-Content-style-two',
            [
                'label' => esc_html__('Slider Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'section_bg',
            [
                'label' => esc_html__('Section BG Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'offer_text_style_two',
            [
                'label' => esc_html__('Offer Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Flat 20% Off', 'textdomain'),
                'placeholder' => esc_html__('Type your offer title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'title_style_two',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Xbox One <br> VR Controller', 'textdomain'),
                'placeholder' => esc_html__('Type your offer title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'sell_price',
            [
                'label' => esc_html__('Sell Price', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('$53.99', 'textdomain'),
                'placeholder' => esc_html__('Type your sell price here', 'textdomain'),
            ]
        );
        $this->add_control(
            'regular_price',
            [
                'label' => esc_html__('Regular Price', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('$69.99', 'textdomain'),
                'placeholder' => esc_html__('Type your Regular price here', 'textdomain'),
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore Now', 'textdomain'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button_link',
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
        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Button Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-solid fa-arrow-right',
                    'library' => 'fa-solid',
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
        $this->add_responsive_control(
            'container-width',
            [
                'label' => esc_html__('Container Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2800,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .custom_container_width' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'Section-BG-color',
            [
                'label' => esc_html__('Section BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-hero-section' => 'background-color: {{VALUE}} !important',
                ],
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'Section-Padding',
            [
                'label' => esc_html__('Section Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .el-hero-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
                    '{{WRAPPER}} .el-hero-section-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Offer-style',
            [
                'label' => esc_html__('Offer Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Offer-color',
            [
                'label' => esc_html__('Offer Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-hero-section .hero-badge' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .el-hero-section-3 .tag-line' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Offer-typography',
                'label' => esc_html__('Offer Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-hero-section .hero-badge,
                {{WRAPPER}} .el-hero-section-3 .tag-line',
            ]
        );
        $this->add_control(
            'Offer-BG-color',
            [
                'label' => esc_html__('Offer BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-hero-section .hero-badge' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Title-style',
            [
                'label' => esc_html__('Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Title-color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-hero-section .hero-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-hero-section-3 .title' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Title-typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-hero-section .hero-title,
                {{WRAPPER}} .el-hero-section-3 .title',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Content-Text-style',
            [
                'label' => esc_html__('Content Text Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'Content-Text-color',
            [
                'label' => esc_html__('Content Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-hero-section .hero-content-wrapper .content-txt' => 'color: {{VALUE}}'
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Content-Text-typography',
                'label' => esc_html__('Content Text Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-hero-section .hero-content-wrapper .content-txt',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Button-One-style',
            [
                'label' => esc_html__('Button One Style', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style-tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'Button-Text-color',
            [
                'label' => esc_html__('Button Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-yellow' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Button-Text-typography',
                'label' => esc_html__('Button Text Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-btn.btn-yellow',
            ]
        );
        $this->add_control(
            'Button-BG-color',
            [
                'label' => esc_html__('Button BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-yellow' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .el-btn.btn-yellow:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Hover-BG-color',
            [
                'label' => esc_html__('Button Hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-yellow:hover' => 'background-color: {{VALUE}}'
                ],
            ]
        );
        $this->end_controls_tab();
        /*END STYLE HOVER TAB*/
        $this->end_controls_tabs();
        $this->end_controls_section();

        /*
         * Style one Button two Style
         */
        $this->start_controls_section(
            'Button-style-two',
            [
                'label' => esc_html__('Button Two Style', 'santoi-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->start_controls_tabs(
            'style-tabs-two'
        );

        $this->start_controls_tab(
            'style_normal_tab_two',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'Button-Text-color-two',
            [
                'label' => esc_html__('Button Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-light-underline' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Button-Text-typography-two',
                'label' => esc_html__('Button Text Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .btn-light-underline',
            ]
        );
        $this->end_controls_tab();
        /*END STYLE NORMAL TAB*/
        $this->start_controls_tab(
            'style_hover_tab_two',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'Button-Hover-color-two',
            [
                'label' => esc_html__('Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-light-underline:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Hover-BG-color-two',
            [
                'label' => esc_html__('Button Hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-light-underline:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        /*END STYLE HOVER TAB*/
        $this->end_controls_tabs();
        $this->end_controls_section();
        /*
         * End Home Four Button One Style
         */

        $this->start_controls_section(
            'Slider-Nav-style',
            [
                'label' => esc_html__('Slider Nav Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'Nav-color',
            [
                'label' => esc_html__('Nav Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-hero-section-slider .slick-dots li button' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-hero-section-slider .slick-dots li button::after' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Sell-Price-style',
            [
                'label' => esc_html__('Sell Price Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'Sell-Price-color',
            [
                'label' => esc_html__('Sell Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-hero-section-3 .current-price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Sell-Price-typography',
                'label' => esc_html__('Sell Price Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-hero-section-3 .current-price',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Regular-Price-style',
            [
                'label' => esc_html__('Regular Price Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'Regular-Price-color',
            [
                'label' => esc_html__('Regular Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-hero-section-3 .old-price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Regular-Price-typography',
                'label' => esc_html__('Regular Price Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-hero-section-3 .old-price',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- Button Start -->
        <a class="st1-button-hover st1-button-color" href="#">
            <span>View All Features</span>
        </a>
        <!-- Button End -->

        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_button());

