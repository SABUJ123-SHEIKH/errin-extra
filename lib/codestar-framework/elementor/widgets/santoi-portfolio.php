<?php

/**
 * @author Teconcetheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class santoi_portfolio extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'santoi_portfolio';
    }

    public function get_title() {
        return esc_html__('Santoi Portfolio', 'santoi-core');
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
                'label' => esc_html__('Widget Style Section', 'woodly-core'),
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
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Latest Insigths', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2', 'style_3', 'style_4', 'style_5'],
                ],
            ]
        );
        $this->add_control(
            'decription_title',
            [
                'label' => esc_html__('Decription Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('LATEST PORTFOLIO', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),

            ]
        );

        $this->add_control(
            'item_per_page',
            [
                'label' => __('Number of Post to Show', 'nikstore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,

            ]
        );
       
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read Details', 'textdomain'),
                'placeholder' => esc_html__('Type your button title here', 'textdomain'),
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
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'backgroundblog',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .santoi-portfolio-section',
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
                    '{{WRAPPER}} .st1-portfolio-contain h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Title-typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-portfolio-contain h4',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Description-style',
            [
                'label' => esc_html__('Description Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_2'],
                ],
            ]
        );
        $this->add_control(
            'Description-color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st1-portfolio-contain p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Description-typography',
                'label' => esc_html__('Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st1-portfolio-contain p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Post-style',
            [
                'label' => esc_html__('Post Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Container-BG-color',
            [
                'label' => esc_html__('Container BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .Container BG Color' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Post-box-Hover-border-color',
            [
                'label' => esc_html__('Post Box Hover Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vr5-blog-card:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => ['style_2'],
                ],
            ]
        );
        $this->add_control(
            'Meta-options',
            [
                'label' => esc_html__('Meta Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Meta-color',
            [
                'label' => esc_html__('Meta Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Meta-typography',
                'label' => esc_html__('Meta Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-news-box span',
            ]
        );

        $this->add_control(
            'Post-Title-options',
            [
                'label' => esc_html__('Post Title Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Post-Title-color',
            [
                'label' => esc_html__('Post Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box h4 a' => 'color: {{VALUE}}!important',

                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Post-Title-typography',
                'label' => esc_html__('Post Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-news-box h4 a',
            ]
        );
        $this->add_control(
            'Post-Title-Hover-color',
            [
                'label' => esc_html__('Post Title Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box h4 a' => 'color: {{VALUE}}!important',

                ],
            ]
        );

        $this->add_control(
            'Post-Description-options',
            [
                'label' => esc_html__('Post Description Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',

            ]
        );
        $this->add_control(
            'Post-Description-color',
            [
                'label' => esc_html__('Post Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box p' => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Post-Description-typography',
                'label' => esc_html__('Post Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-news-box p',

            ]
        );

        $this->add_control(
            'Post-Button-options',
            [
                'label' => esc_html__('Post Button Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Post-Button-color',
            [
                'label' => esc_html__('Post Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Post-Button-typography',
                'label' => esc_html__('Post Button Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .st2-news-box a',
            ]
        );
        $this->add_control(
            'Post-Button-BG-color',
            [
                'label' => esc_html__('Post Button BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box a' => 'background-color: {{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            'Post-Button-Hover-color',
            [
                'label' => esc_html__('Post Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Post-Button-Hover-bg-color',
            [
                'label' => esc_html__('Post Button Hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .st2-news-box a:hvoer' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $item_per_page = $settings['item_per_page'];

        $post_args = array(
            'post_type' => 'portfolio',
            'post_status' => 'publish',
            'posts_per_page' => $item_per_page,
        );


        $the_query = new \WP_Query($post_args);


        if ('style_1' == $settings['Widget-Style']) {
            santoi_portfolio_style_1($settings, $the_query);
        } elseif ('style_2' == $settings['Widget-Style']) {
            santoi_portfolio_style_2($settings, $the_query);
        } elseif ('style_3' == $settings['Widget-Style']) {
            santoi_portfolio_style_3($settings, $the_query);
        }
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \santoi_portfolio());

